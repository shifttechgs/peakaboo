<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Data\MockData;
use App\Mail\ContactFormMail;
use App\Mail\TourBookingMail;
use Illuminate\Http\Request;
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
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'child_name' => 'required|string|max:255',
            'child_nickname' => 'nullable|string|max:255',
            'child_age' => 'required|string',
            'preferred_date' => 'required|date',
            'preferred_time' => 'required|string',
            'message' => 'nullable|string|max:2000',
            'source' => 'nullable|string|max:100',
        ]);

        // Generate unique booking ID
        $bookingId = 'TOUR-' . date('Y') . '-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);

        // Send email to admin
        $emailSent = false;
        $emailError = null;

        try {
            \Log::info('Attempting to send tour booking email', [
                'booking_id' => $bookingId,
                'to_email' => config('mail.contact_email'),
            ]);

            Mail::to(config('mail.contact_email'))
                ->send(new TourBookingMail($validated, $bookingId));

            $emailSent = true;
            \Log::info('Tour booking email sent successfully', ['booking_id' => $bookingId]);

        } catch (\Exception $e) {
            // Log detailed error
            \Log::error('Failed to send tour booking email', [
                'booking_id' => $bookingId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            $emailError = $e->getMessage();
        }

        return redirect()->route('book-tour')
            ->with([
                'success' => 'Tour booking request received! We will contact you within 24 hours to confirm your appointment.',
                'booking_id' => $bookingId,
                'email_sent' => $emailSent,
                'email_error' => $emailError
            ]);
    }
}
