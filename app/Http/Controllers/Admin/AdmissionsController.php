<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Data\MockData;

class AdmissionsController extends Controller
{
    public function index()
    {
        return view('admin.admissions.index', [
            'applications' => MockData::applications(),
            'stats' => MockData::dashboardStats(),
        ]);
    }

    public function show($id)
    {
        $applications = MockData::applications();
        $application = collect($applications)->firstWhere('id', $id) ?? $applications[0];

        return view('admin.admissions.show', [
            'application' => $application,
        ]);
    }

    public function approve($id)
    {
        return redirect()->route('admin.admissions.index')->with('success', 'Application approved successfully');
    }

    public function reject($id)
    {
        return redirect()->route('admin.admissions.index')->with('success', 'Application rejected');
    }

    public function waitlist($id)
    {
        return redirect()->route('admin.admissions.index')->with('success', 'Application added to waiting list');
    }

    public function addNotes($id)
    {
        return redirect()->back()->with('success', 'Notes added successfully');
    }
}
