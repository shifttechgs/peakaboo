<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Data\MockData;

class CrmController extends Controller
{
    public function index()
    {
        return view('admin.crm.index', [
            'leads' => MockData::leads(),
            'stats' => MockData::dashboardStats(),
        ]);
    }

    public function leads()
    {
        return view('admin.crm.leads', [
            'leads' => MockData::leads(),
        ]);
    }

    public function showLead($id)
    {
        $leads = MockData::leads();
        $lead = collect($leads)->firstWhere('id', $id) ?? $leads[0];

        return view('admin.crm.lead-detail', [
            'lead' => $lead,
        ]);
    }

    public function updateLeadStatus($id)
    {
        return redirect()->back()->with('success', 'Lead status updated');
    }

    public function addLeadNotes($id)
    {
        return redirect()->back()->with('success', 'Notes added successfully');
    }
}
