<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Data\MockData;
use App\Mail\BookingReceivedMail;
use App\Mail\ContactFormMail;
use App\Mail\TourBookingMail;
use App\Models\Lead;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.home', [
            'business' => MockData::businessInfo(),
            'programs' => MockData::programs(),
            'testimonials' => MockData::testimonials(),
            'staff' => MockData::staff(),
            'fees' => MockData::fees(),
            'services' => MockData::services(),
            'faqs' => MockData::faqs(),
            'trustBadges' => MockData::trustBadges(),
        ]);
    }

    public function programs()
    {
        return view('public.programs', [
            'business' => MockData::businessInfo(),
            'programs' => MockData::programs(),
        ]);
    }

    public function programDetail($slug)
    {
        $programs = MockData::programs();
        $program = collect($programs)->firstWhere('id', $slug);

        if (!$program) {
            abort(404);
        }

        return view('public.program-detail', [
            'business' => MockData::businessInfo(),
            'program' => $program,
            'programs' => $programs,
        ]);
    }

    public function about()
    {
        return view('public.about', [
            'business' => MockData::businessInfo(),
            'staff' => MockData::staff(),
        ]);
    }

    public function fees()
    {
        return view('public.fees', [
            'business' => MockData::businessInfo(),
            'fees' => MockData::fees(),
            'faqs' => MockData::faqs(),
        ]);
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:5000',
        ]);

        try {
            Mail::to(config('mail.contact_email', config('mail.from.address')))
                ->send(new ContactFormMail($validated));

            return redirect()->route('contact')->with('success', 'Thank you for your message. We will be in touch soon!');
        } catch (\Exception $e) {
            return redirect()->route('contact')
                ->with('error', 'Sorry, there was an error sending your message. Please try again or contact us directly.')
                ->withInput();
        }
    }

    public function faq()
    {
        return view('public.faq', [
            'business' => MockData::businessInfo(),
            'faqs' => MockData::faqs(),
        ]);
    }

    public function gallery()
    {
        return view('public.gallery', [
            'business' => MockData::businessInfo(),
        ]);
    }

    public function bookTour()
    {
        return view('public.book-tour', [
            'business' => MockData::businessInfo(),
        ]);
    }

    public function submitTour(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'phone'          => 'required|string|max:20',
            'email'          => 'required|email|max:255',
            'child_name'     => 'required|string|max:255',
            'child_nickname' => 'nullable|string|max:255',
            'child_age'      => 'required|string',
            'preferred_date' => 'required|date|after_or_equal:today',  // Fix #6: no past dates
            'preferred_time' => 'required|string',
            'message'        => 'nullable|string|max:2000',
            'source'         => 'nullable|string|max:100',
        ]);

        // Fix #7: Duplicate lead detection — same email with an open (non-terminal) status
        $existing = Lead::where('email', $validated['email'])
            ->whereNotIn('status', ['converted', 'lost'])
            ->first();

        if ($existing) {
            return redirect()->back()
                ->with('info', "We already have a pending booking for this email address (ref: {$existing->reference}). We'll be in touch soon!")
                ->withInput();
        }

        // Generate a unique reference and persist the lead atomically.
        // DB transaction + lockForUpdate prevents duplicate references under concurrent submissions.
        $lead = DB::transaction(function () use ($validated) {
            $year    = date('Y');
            $nextNum = Lead::whereYear('created_at', $year)->lockForUpdate()->count() + 1;
            $reference = 'TOUR-' . $year . '-' . str_pad($nextNum, 3, '0', STR_PAD_LEFT);

            return Lead::create([
                'reference'      => $reference,
                'name'           => $validated['name'],
                'email'          => $validated['email'],
                'phone'          => $validated['phone'],
                'child_name'     => $validated['child_name'],
                'child_nickname' => $validated['child_nickname'] ?? null,
                'child_age'      => $validated['child_age'],
                'preferred_date' => $validated['preferred_date'],
                'preferred_time' => $validated['preferred_time'],
                'message'        => $validated['message'] ?? null,
                'source'         => $validated['source'] ?? null,
                'status'         => 'new',
            ]);
        });

        // Log lead creation activity
        try {
            \App\Models\LeadActivity::create([
                'lead_id'     => $lead->id,
                'user_id'     => null,
                'type'        => 'created',
                'description' => "Lead submitted via tour booking form ({$lead->reference})",
            ]);
        } catch (\Exception $e) {
            Log::warning('Lead activity log failed', ['lead' => $lead->id, 'error' => $e->getMessage()]);
        }

        // Auto-create follow-up task for admin
        try {
            Task::create([
                'title'      => "Follow up with {$lead->name} — tour on {$lead->preferred_date->format('d M')}",
                'due_date'   => $lead->preferred_date->subDay(),
                'lead_id'    => $lead->id,
                'created_by' => \App\Models\User::role('super_admin')->first()?->id ?? \App\Models\User::role('admin')->first()?->id ?? 1,
            ]);
        } catch (\Exception $e) {
            Log::warning('Auto-task creation failed', ['lead' => $lead->id, 'error' => $e->getMessage()]);
        }

        // Send admin notification email
        $emailSent = false;
        $emailError = null;

        try {
            Log::info('Attempting to send tour booking email', [
                'booking_id' => $lead->reference,
                'to_email'   => config('mail.contact_email'),
            ]);

            Mail::to(config('mail.contact_email'))
                ->send(new TourBookingMail($validated, $lead->reference));

            $emailSent = true;
            Log::info('Tour booking email sent successfully', ['booking_id' => $lead->reference]);

        } catch (\Exception $e) {
            Log::error('Failed to send tour booking email', [
                'booking_id' => $lead->reference,
                'error'      => $e->getMessage(),
                'trace'      => $e->getTraceAsString(),
            ]);
            $emailError = $e->getMessage();
        }

        // Send acknowledgement to lead
        try {
            Mail::to($lead->email)->send(new BookingReceivedMail($lead));
        } catch (\Exception $e) {
            Log::error('BookingReceivedMail failed', ['lead' => $lead->id, 'error' => $e->getMessage()]);
        }

        return redirect()->route('book-tour')
            ->with([
                'success'     => 'Tour booking request received! We will contact you within 24 hours to confirm your appointment.',
                'booking_id'  => $lead->reference,
                'email_sent'  => $emailSent,
                'email_error' => $emailError,
            ]);
    }
}
