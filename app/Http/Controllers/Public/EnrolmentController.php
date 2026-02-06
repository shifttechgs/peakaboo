<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Data\MockData;
use App\Mail\EnrolmentApplicationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class EnrolmentController extends Controller
{
    public function index()
    {
        return view('public.enrol.index', [
            'business' => MockData::businessInfo(),
            'fees' => MockData::fees(),
            'programs' => MockData::programs(),
        ]);
    }

    public function form()
    {
        return view('public.enrol.form', [
            'business' => MockData::businessInfo(),
            'fees' => MockData::fees(),
            'programs' => MockData::programs(),
        ]);
    }

    public function saveStep()
    {
        return response()->json(['success' => true, 'message' => 'Progress saved']);
    }

    public function submit(Request $request)
    {
        // Log what we received
        \Log::info('Enrolment form submitted', [
            'all_data' => $request->except(['_token']),
            'has_files' => $request->hasFile('birth_certificate') || $request->hasFile('clinic_card')
        ]);

        // Validate the form data
        $validated = $request->validate([
            'start_date' => 'required|date',
            'program' => 'required|string',
            'program_name' => 'required|string',
            'fee_option' => 'required|string',
            'fee_option_name' => 'required|string',
            'snack_box' => 'nullable|string',
            'child_name' => 'required|string|max:255',
            'child_nickname' => 'nullable|string|max:255',
            'child_dob' => 'required|date',
            'child_gender' => 'required|in:male,female',
            'child_id' => 'required|string|max:255',
            'child_language' => 'required|string|max:255',
            'child_religion' => 'nullable|string|max:255',
            'previous_school' => 'nullable|string|max:255',
            'has_second_child' => 'nullable|string',
            'child2_name' => 'nullable|string|max:255',
            'child2_nickname' => 'nullable|string|max:255',
            'child2_dob' => 'nullable|date',
            'child2_gender' => 'nullable|in:male,female',
            'child2_id' => 'nullable|string|max:255',
            'mother_name' => 'required|string|max:255',
            'mother_id' => 'required|string|max:255',
            'mother_cell' => 'required|string|max:255',
            'mother_work' => 'nullable|string|max:255',
            'mother_email' => 'required|email|max:255',
            'mother_occupation' => 'nullable|string|max:255',
            'father_name' => 'required|string|max:255',
            'father_id' => 'required|string|max:255',
            'father_cell' => 'required|string|max:255',
            'father_work' => 'nullable|string|max:255',
            'father_email' => 'nullable|email|max:255',
            'father_occupation' => 'nullable|string|max:255',
            'home_tel' => 'nullable|string|max:255',
            'home_address' => 'required|string',
            'emergency_name' => 'required|string|max:255',
            'emergency_tel' => 'required|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'doctor_tel' => 'required|string|max:255',
            'medical_aid' => 'nullable|string|max:255',
            'medical_aid_number' => 'nullable|string|max:255',
            'allergies' => 'nullable|string',
            'medical_info' => 'nullable|string',
            'operations' => 'nullable|string',
            'diseases' => 'nullable|string',
            'other_details' => 'nullable|string',
            'consent_fees' => 'nullable|string',
            'consent_medical' => 'nullable|string',
            'consent_indemnity' => 'nullable|string',
            'consent_photos' => 'nullable|string',
            'consent_sleepover' => 'nullable|string',
            'consent_popia' => 'nullable|string',
            'signature' => 'required|string|max:255',
            'signature_date' => 'required|date',
            'birth_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'clinic_card' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'parent_ids' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'proof_address' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);


       // dd($validated);

        // Generate unique application ID
        $applicationId = 'APP-' . date('Y') . '-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);

        // Handle file uploads and collect document information
        $documents = [];
        $uploadedFiles = ['birth_certificate', 'clinic_card', 'parent_ids', 'proof_address'];

        foreach ($uploadedFiles as $fileField) {
            if ($request->hasFile($fileField)) {
                $file = $request->file($fileField);
                $fileName = $fileField . '_' . $applicationId . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('enrolments/' . $applicationId, $fileName, 'public');

                $documents[] = [
                    'name' => $fileName,
                    'path' => storage_path('app/public/' . $filePath),
                    'mime' => $file->getMimeType(),
                ];
            }
        }

        // Generate PDF
        $pdf = Pdf::loadView('pdf.enrolment-application', [
            'data' => $validated,
            'applicationId' => $applicationId,
        ]);

        // Save PDF temporarily
        $pdfFileName = 'Application-' . $applicationId . '.pdf';
        $pdfPath = storage_path('app/public/enrolments/' . $applicationId . '/' . $pdfFileName);

        // Ensure directory exists
        if (!file_exists(dirname($pdfPath))) {
            mkdir(dirname($pdfPath), 0755, true);
        }

        $pdf->save($pdfPath);

        // Send email to admin
        $emailSent = false;
        $emailError = null;

        try {
            \Log::info('Attempting to send enrolment email', [
                'application_id' => $applicationId,
                'to_email' => config('mail.contact_email'),
                'pdf_path' => $pdfPath,
                'documents_count' => count($documents)
            ]);

            Mail::to(config('mail.contact_email'))
                ->send(new EnrolmentApplicationMail($validated, $applicationId, $pdfPath, $documents));

            $emailSent = true;
            \Log::info('Enrolment email sent successfully', ['application_id' => $applicationId]);

        } catch (\Exception $e) {
            // Log detailed error
            \Log::error('Failed to send enrolment email', [
                'application_id' => $applicationId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            $emailError = $e->getMessage();
        }

        return redirect()->route('enrol.thank-you')
            ->with([
                'application_id' => $applicationId,
                'email_sent' => $emailSent,
                'email_error' => $emailError
            ]);
    }

    public function thankYou()
    {
        return view('public.enrol.thank-you', [
            'business' => MockData::businessInfo(),
            'applicationId' => session('application_id', 'APP-2026-001'),
        ]);
    }

    public function status($id)
    {
        $applications = MockData::applications();
        $application = collect($applications)->firstWhere('id', $id) ?? $applications[0];

        return view('public.enrol.status', [
            'business' => MockData::businessInfo(),
            'application' => $application,
        ]);
    }
}
