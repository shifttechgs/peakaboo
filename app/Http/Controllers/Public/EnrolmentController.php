<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Data\MockData;

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

    public function submit()
    {
        $applicationId = 'APP-2026-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
        return redirect()->route('enrol.thank-you')->with('application_id', $applicationId);
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
