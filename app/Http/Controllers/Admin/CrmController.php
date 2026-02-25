<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\EnrolmentStartMail;
use App\Mail\TourConfirmationMail;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CrmController extends Controller
{
    public function index()
    {
        $stats = [];
        foreach (Lead::STATUSES as $status) {
            $stats[$status] = Lead::where('status', $status)->count();
        }
        $stats['overdue'] = Lead::whereIn('status', ['new', 'contacted'])
            ->where('created_at', '<', now()->subDays(3))
            ->count();

        $recent = Lead::latest()->limit(5)->get();

        return view('admin.crm.index', compact('stats', 'recent'));
    }

    public function leads(Request $request)
    {
        $query = Lead::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('source')) {
            $query->where('source', $request->source);
        }
        if ($request->filled('child_age')) {
            $query->where('child_age', $request->child_age);
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('reference', 'like', "%{$search}%");
            });
        }

        $leads = $query->latest()->paginate(25)->withQueryString();

        return view('admin.crm.leads', compact('leads'));
    }

    public function showLead($id)
    {
        $lead = Lead::findOrFail($id);
        $tasks = $lead->tasks()->orderBy('completed')->orderBy('due_date')->get();
        $allLeads = Lead::orderBy('name')->pluck('name', 'id');

        return view('admin.crm.lead-detail', compact('lead', 'tasks', 'allLeads'));
    }

    public function updateLeadStatus(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);
        $request->validate([
            'status' => 'required|in:' . implode(',', Lead::STATUSES),
        ]);

        $previousStatus = $lead->status;
        $lead->update(['status' => $request->status]);

        $message = 'Status updated to ' . ucwords(str_replace('_', ' ', $request->status));

        if ($request->status === 'tour_scheduled' && $previousStatus !== 'tour_scheduled') {
            try {
                Mail::to($lead->email)->send(new TourConfirmationMail($lead));
                $message = "Status updated and tour confirmation sent to {$lead->name}";
            } catch (\Exception $e) {
                \Log::error('TourConfirmationMail failed', ['lead' => $lead->id, 'error' => $e->getMessage()]);
            }
        }

        if ($request->status === 'converted' && $previousStatus !== 'converted') {
            try {
                Mail::to($lead->email)->send(new EnrolmentStartMail($lead));
                $message = "Status updated and enrolment invitation sent to {$lead->name}";
            } catch (\Exception $e) {
                \Log::error('EnrolmentStartMail failed', ['lead' => $lead->id, 'error' => $e->getMessage()]);
            }
        }

        return redirect()->back()->with('success', $message);
    }

    public function addLeadNotes(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);
        $request->validate(['notes' => 'required|string']);

        $lead->update(['notes' => $request->notes]);

        return redirect()->back()->with('success', 'Notes saved successfully');
    }

    public function notifyTour($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->update(['status' => 'tour_scheduled']);

        try {
            Mail::to($lead->email)->send(new TourConfirmationMail($lead));
        } catch (\Exception $e) {
            \Log::error('TourConfirmationMail failed', ['lead' => $lead->id, 'error' => $e->getMessage()]);
        }

        return redirect()->back()->with('success', "Tour confirmation sent to {$lead->name}");
    }

    public function startEnrol($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->update(['status' => 'converted']);

        try {
            Mail::to($lead->email)->send(new EnrolmentStartMail($lead));
        } catch (\Exception $e) {
            \Log::error('EnrolmentStartMail failed', ['lead' => $lead->id, 'error' => $e->getMessage()]);
        }

        return redirect()->back()->with('success', "Enrolment invitation sent to {$lead->name}");
    }

    public function addToWaitlist($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->update(['status' => 'waitlist']);

        return redirect()->back()->with('success', "{$lead->name} added to waitlist");
    }
}
