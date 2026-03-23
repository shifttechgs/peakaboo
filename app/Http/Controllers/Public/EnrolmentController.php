<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Data\MockData;
use App\Mail\ApplicationReceivedMail;
use App\Mail\EnrolmentApplicationMail;
use App\Models\Application;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class EnrolmentController extends Controller
{
    public function index()
    {
        return view('public.enrol.index', [
            'business' => MockData::businessInfo(),
            'fees'     => MockData::fees(),
            'programs' => MockData::programs(),
        ]);
    }

    /**
     * Show the enrolment form.
     * If a valid ?token= is present, resolve the lead, store pre-fill data in session,
     * and clear the token so repeated visits work but the link stays single-use conceptually.
     */
    public function form(Request $request)
    {
        $prefill = null;

        if ($request->filled('token')) {
            $lead = Lead::where('enrolment_token', $request->token)
                        ->where('status', 'converted')
                        ->first();

            if ($lead) {
                // Store token + lead id in session so submit() can link them
                session([
                    'enrol_lead_id'    => $lead->id,
                    'enrol_lead_token' => $request->token,
                ]);

                // Build pre-fill array from lead data
                $prefill = [
                    'child_name'  => $lead->child_name,
                    'child_nickname' => $lead->child_nickname ?? '',
                    'mother_name' => $lead->name,
                    'mother_email'=> $lead->email,
                    'mother_cell' => $lead->phone,
                ];
            }
        }

        return view('public.enrol.form', [
            'business' => MockData::businessInfo(),
            'fees'     => MockData::fees(),
            'programs' => MockData::programs(),
            'prefill'  => $prefill,
        ]);
    }

    public function saveStep()
    {
        return response()->json(['success' => true, 'message' => 'Progress saved']);
    }

    public function submit(Request $request)
    {
        Log::info('Enrolment form submitted', [
            'all_data' => $request->except(['_token']),
            'has_files' => $request->hasFile('birth_certificate') || $request->hasFile('clinic_card'),
        ]);

        $validated = $request->validate([
            'start_date'        => 'required|date',
            'program'           => 'required|string',
            'program_name'      => 'required|string',
            'fee_option'        => 'required|string',
            'fee_option_name'   => 'required|string',
            'snack_box'         => 'nullable|string',
            'child_name'        => 'required|string|max:255',
            'child_nickname'    => 'nullable|string|max:255',
            'child_dob'         => 'required|date',
            'child_gender'      => 'required|in:male,female',
            'child_id'          => 'required|string|max:255',
            'child_language'    => 'required|string|max:255',
            'child_religion'    => 'nullable|string|max:255',
            'previous_school'   => 'nullable|string|max:255',
            'has_second_child'  => 'nullable|string',
            'child2_name'       => 'nullable|string|max:255',
            'child2_nickname'   => 'nullable|string|max:255',
            'child2_dob'        => 'nullable|date',
            'child2_gender'     => 'nullable|in:male,female',
            'child2_id'         => 'nullable|string|max:255',
            'mother_name'       => 'required|string|max:255',
            'mother_id'         => 'required|string|max:255',
            'mother_cell'       => 'required|string|max:255',
            'mother_work'       => 'nullable|string|max:255',
            'mother_email'      => 'required|email|max:255',
            'mother_occupation' => 'nullable|string|max:255',
            'father_name'       => 'required|string|max:255',
            'father_id'         => 'required|string|max:255',
            'father_cell'       => 'required|string|max:255',
            'father_work'       => 'nullable|string|max:255',
            'father_email'      => 'nullable|email|max:255',
            'father_occupation' => 'nullable|string|max:255',
            'home_tel'          => 'nullable|string|max:255',
            'home_address'      => 'required|string',
            'emergency_name'    => 'required|string|max:255',
            'emergency_tel'     => 'required|string|max:255',
            'doctor_name'       => 'required|string|max:255',
            'doctor_tel'        => 'required|string|max:255',
            'medical_aid'       => 'nullable|string|max:255',
            'medical_aid_number'=> 'nullable|string|max:255',
            'allergies'         => 'nullable|string',
            'medical_info'      => 'nullable|string',
            'operations'        => 'nullable|string',
            'diseases'          => 'nullable|string',
            'other_details'     => 'nullable|string',
            'consent_fees'      => 'nullable|string',
            'consent_medical'   => 'nullable|string',
            'consent_indemnity' => 'nullable|string',
            'consent_photos'    => 'nullable|string',
            'consent_sleepover' => 'nullable|string',
            'consent_popia'     => 'nullable|string',
            'signature'         => 'required|string|max:255',
            'signature_date'    => 'required|date',
            'birth_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'clinic_card'       => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'parent_ids'        => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'proof_address'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        // Resolve the linked lead from the session token (set when the form was opened)
        $leadId = null;
        if (session('enrol_lead_id') && session('enrol_lead_token')) {
            $lead = Lead::where('id', session('enrol_lead_id'))
                        ->where('enrolment_token', session('enrol_lead_token'))
                        ->first();
            if ($lead) {
                $leadId = $lead->id;
                // Clear the token — it's single-use
                $lead->update(['enrolment_token' => null]);
                session()->forget(['enrol_lead_id', 'enrol_lead_token']);
            }
        }

        // Handle file uploads
        $documentPaths  = [];
        $emailDocuments = [];
        $uploadedFields = ['birth_certificate', 'clinic_card', 'parent_ids', 'proof_address'];

        // We need the applicationId for file naming — generate it inside the transaction below
        // so we use a placeholder directory initially (moved after we have the real ref)
        $tempId = 'TEMP-' . uniqid();

        foreach ($uploadedFields as $field) {
            if ($request->hasFile($field)) {
                $file     = $request->file($field);
                $fileName = $field . '_' . $tempId . '.' . $file->getClientOriginalExtension();
                $relPath  = $file->storeAs('enrolments/' . $tempId, $fileName, 'public');
                $documentPaths[$field] = $relPath;
                $emailDocuments[] = [
                    'name' => $fileName,
                    'path' => storage_path('app/public/' . $relPath),
                    'mime' => $file->getMimeType(),
                ];
            }
        }

        // Generate PDF (also with temp id, renamed after)
        $pdfTempDir  = storage_path('app/public/enrolments/' . $tempId);
        $pdfTempFile = $pdfTempDir . '/Application-' . $tempId . '.pdf';
        if (!file_exists($pdfTempDir)) {
            mkdir($pdfTempDir, 0755, true);
        }
        Pdf::loadView('pdf.enrolment-application', ['data' => $validated, 'applicationId' => $tempId])
           ->save($pdfTempFile);

        // Persist to database inside a transaction to prevent duplicate APP references
        $application = DB::transaction(function () use ($validated, $leadId, $tempId, $documentPaths) {
            $year          = date('Y');
            $nextNum       = Application::whereYear('created_at', $year)->lockForUpdate()->count() + 1;
            $applicationId = 'APP-' . $year . '-' . str_pad($nextNum, 3, '0', STR_PAD_LEFT);

            // Rename the temp upload directory to the real application reference
            $oldDir = storage_path('app/public/enrolments/' . $tempId);
            $newDir = storage_path('app/public/enrolments/' . $applicationId);
            if (file_exists($oldDir)) {
                rename($oldDir, $newDir);
            }

            // Update document paths to use the real applicationId
            $finalDocPaths = [];
            foreach ($documentPaths as $field => $relPath) {
                $finalDocPaths[$field] = str_replace($tempId, $applicationId, $relPath);
            }

            $pdfRelPath = 'enrolments/' . $applicationId . '/Application-' . $applicationId . '.pdf';

            return Application::create([
                'reference'       => $applicationId,
                'status'          => 'pending',
                'lead_id'         => $leadId,
                'start_date'      => $validated['start_date'],
                'program'         => $validated['program'],
                'program_name'    => $validated['program_name'],
                'fee_option'      => $validated['fee_option'],
                'fee_option_name' => $validated['fee_option_name'],
                'snack_box'       => isset($validated['snack_box']) && $validated['snack_box'] === 'on',
                'child_name'      => $validated['child_name'],
                'child_nickname'  => $validated['child_nickname'] ?? null,
                'child_dob'       => $validated['child_dob'],
                'child_gender'    => $validated['child_gender'],
                'child_id_number' => $validated['child_id'] ?? null,
                'child_language'  => $validated['child_language'] ?? null,
                'mother_name'     => $validated['mother_name'],
                'mother_email'    => $validated['mother_email'],
                'mother_cell'     => $validated['mother_cell'],
                'father_name'     => $validated['father_name'] ?? null,
                'father_email'    => $validated['father_email'] ?? null,
                'father_cell'     => $validated['father_cell'] ?? null,
                'form_data'       => $validated,
                'documents'       => $finalDocPaths ?: null,
                'pdf_path'        => $pdfRelPath,
            ]);
        });

        // Resolve final paths for email attachments
        $finalEmailDocs = array_map(function ($doc) use ($tempId, $application) {
            $doc['path'] = str_replace($tempId, $application->reference, $doc['path']);
            $doc['name'] = str_replace($tempId, $application->reference, $doc['name']);
            return $doc;
        }, $emailDocuments);

        $pdfPath = storage_path('app/public/enrolments/' . $application->reference . '/Application-' . $application->reference . '.pdf');

        // Send acknowledgement to parent
        try {
            Mail::to($application->mother_email)->send(new ApplicationReceivedMail($application));
        } catch (\Exception $e) {
            Log::error('ApplicationReceivedMail failed', ['app' => $application->id, 'error' => $e->getMessage()]);
        }

        // Send full application to admin with PDF + docs
        $emailSent  = false;
        $emailError = null;
        try {
            Mail::to(config('mail.contact_email'))
                ->send(new EnrolmentApplicationMail($validated, $application->reference, $pdfPath, $finalEmailDocs));
            $emailSent = true;
        } catch (\Exception $e) {
            Log::error('EnrolmentApplicationMail failed', [
                'application_id' => $application->reference,
                'error'          => $e->getMessage(),
            ]);
            $emailError = $e->getMessage();
        }

        return redirect()->route('enrol.thank-you')->with([
            'application_id' => $application->reference,
            'email_sent'     => $emailSent,
            'email_error'    => $emailError,
        ]);
    }

    public function thankYou()
    {
        return view('public.enrol.thank-you', [
            'business'      => MockData::businessInfo(),
            'applicationId' => session('application_id', 'APP-' . date('Y') . '-001'),
        ]);
    }

    public function status($id)
    {
        $application = Application::where('reference', $id)->first();

        if (!$application) {
            return view('public.enrol.status', [
                'business'    => MockData::businessInfo(),
                'application' => null,
                'notFound'    => true,
            ]);
        }

        return view('public.enrol.status', [
            'business'    => MockData::businessInfo(),
            'application' => $application,
            'notFound'    => false,
        ]);
    }
}
