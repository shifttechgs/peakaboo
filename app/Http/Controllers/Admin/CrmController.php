<?php

namespace App\Http\Controllers\Admin;

use App\Exports\LeadsExport;
use App\Http\Controllers\Controller;
use App\Mail\EnrolmentStartMail;
use App\Mail\TourConfirmationMail;
use App\Models\Lead;
use App\Models\LeadActivity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

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

        // Source analytics
        $sourceStats = Lead::selectRaw('COALESCE(source, "unknown") as source, COUNT(*) as count')
            ->groupBy('source')
            ->pluck('count', 'source');

        // Conversion stats
        $conversionStats = [
            'total'     => Lead::count(),
            'converted' => Lead::where('status', 'converted')->count(),
            'lost'      => Lead::where('status', 'lost')->count(),
        ];

        return view('admin.crm.index', compact('stats', 'recent', 'sourceStats', 'conversionStats'));
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
        if ($request->filled('assigned_to')) {
            $query->where('assigned_to', $request->assigned_to);
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

        $leads = $query->with('assignee', 'application')->latest()->paginate(25)->withQueryString();
        $adminUsers = User::role(['super_admin', 'admin'])->orderBy('name')->pluck('name', 'id');

        return view('admin.crm.leads', compact('leads', 'adminUsers'));
    }

    /** Show form to manually create a lead from admin. */
    public function createLead()
    {
        return view('admin.crm.lead-create');
    }

    /** Store a manually created lead. */
    public function storeLead(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'phone'          => 'required|string|max:50',
            'child_name'     => 'required|string|max:255',
            'child_nickname' => 'nullable|string|max:255',
            'child_age'      => 'required|string',
            'preferred_date' => 'required|date',
            'preferred_time' => 'required|string',
            'source'         => 'nullable|in:' . implode(',', Lead::SOURCES),
            'message'        => 'nullable|string|max:2000',
            'status'         => 'required|in:' . implode(',', Lead::STATUSES),
            'follow_up_date' => 'nullable|date',
            'assigned_to'    => 'nullable|exists:users,id',
        ]);

        $year = now()->year;
        $count = Lead::withTrashed()->whereYear('created_at', $year)->count() + 1;
        $validated['reference'] = 'TOUR-' . $year . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);
        $validated['last_activity_at'] = now();

        $lead = Lead::create($validated);

        $this->logActivity($lead, 'created', 'Lead created manually by admin');

        return redirect()->route('admin.crm.leads.show', $lead)
            ->with('success', "Lead created for {$lead->name}");
    }

    /** Set / update the follow-up date for a lead. */
    public function setFollowUpDate(Request $request, Lead $lead)
    {
        $request->validate([
            'follow_up_date' => 'required|date',
        ]);

        $lead->update(['follow_up_date' => $request->follow_up_date]);
        $lead->touchActivity();

        $this->logActivity($lead, 'note', 'Follow-up date set to ' . $request->follow_up_date);

        return redirect()->back()->with('success', 'Follow-up date saved');
    }

    public function showLead(Lead $lead)
    {
        $lead->load('assignee', 'application');
        $tasks = $lead->tasks()->orderBy('completed')->orderBy('due_date')->get();
        $allLeads = Lead::orderBy('name')->pluck('name', 'id');
        $activities = $lead->activities()->with('user')->latest()->get();
        $adminUsers = User::role(['super_admin', 'admin'])->orderBy('name')->pluck('name', 'id');

        return view('admin.crm.lead-detail', compact('lead', 'tasks', 'allLeads', 'activities', 'adminUsers'));
    }

    public function editLead(Lead $lead)
    {
        return view('admin.crm.lead-edit', compact('lead'));
    }

    public function updateLead(Request $request, Lead $lead)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|max:255',
            'phone'           => 'required|string|max:50',
            'child_name'      => 'required|string|max:255',
            'child_nickname'  => 'nullable|string|max:255',
            'child_age'       => 'required|string',
            'preferred_date'  => 'required|date',
            'preferred_time'  => 'required|string',
            'source'          => 'nullable|string',
            'message'         => 'nullable|string',
            'follow_up_date'  => 'nullable|date',
        ]);

        // Track which fields changed
        $changes = [];
        foreach ($validated as $key => $value) {
            $old = $key === 'preferred_date' ? $lead->preferred_date->format('Y-m-d') : $lead->$key;
            if ((string) $old !== (string) $value) {
                $changes[$key] = ['from' => $old, 'to' => $value];
            }
        }

        $lead->update($validated);

        if (!empty($changes)) {
            $this->logActivity($lead, 'edited', 'Lead details updated', ['changes' => $changes]);
        }

        return redirect()->route('admin.crm.leads.show', $lead)
            ->with('success', 'Lead details updated successfully');
    }

    public function destroyLead(Lead $lead)
    {
        $leadName = $lead->name;
        $lead->delete(); // Soft delete — tasks and activity history are preserved

        return redirect()->route('admin.crm.leads')
            ->with('success', "{$leadName} has been archived");
    }

    public function restoreLead(int $id)
    {
        $lead = Lead::withTrashed()->findOrFail($id);
        $lead->restore();

        return redirect()->route('admin.crm.leads.show', $lead)
            ->with('success', "{$lead->name} has been restored");
    }

    public function forceDeleteLead(int $id)
    {
        $lead = Lead::withTrashed()->findOrFail($id);
        $leadName = $lead->name;
        $lead->tasks()->delete();
        $lead->activities()->delete();
        $lead->forceDelete();

        return redirect()->route('admin.crm.leads')
            ->with('success', "{$leadName} has been permanently deleted");
    }

    public function updateLeadStatus(Request $request, Lead $lead)
    {
        $request->validate([
            'status' => 'required|in:' . implode(',', Lead::STATUSES),
        ]);

        $previousStatus = $lead->status;
        $newStatus = $request->status;

        $timestamps = ['last_activity_at' => now()];
        if ($newStatus === 'converted' && ! $lead->converted_at) {
            $timestamps['converted_at'] = now();
        }
        if ($newStatus === 'tour_scheduled' && ! $lead->tour_scheduled_at) {
            $timestamps['tour_scheduled_at'] = now();
        }

        $lead->update(array_merge(['status' => $newStatus], $timestamps));

        $fromLabel = ucwords(str_replace('_', ' ', $previousStatus));
        $toLabel   = ucwords(str_replace('_', ' ', $newStatus));
        $message   = "Status updated to {$toLabel}";

        $this->logActivity($lead, 'status_change', "Status changed from {$fromLabel} to {$toLabel}", [
            'from' => $previousStatus,
            'to'   => $newStatus,
        ]);

        if ($newStatus === 'tour_scheduled' && $previousStatus !== 'tour_scheduled') {
            try {
                Mail::to($lead->email)->send(new TourConfirmationMail($lead));
                $message = "Status updated and tour confirmation sent to {$lead->name}";
                $this->logActivity($lead, 'email_sent', 'Tour confirmation email sent', ['email_type' => 'TourConfirmationMail']);
            } catch (\Exception $e) {
                Log::error('TourConfirmationMail failed', ['lead' => $lead->id, 'error' => $e->getMessage()]);
            }
        }

        if ($newStatus === 'converted' && $previousStatus !== 'converted') {
            if ($lead->application()->exists()) {
                $message = "Status updated (application already received — no email sent)";
            } else {
                $token = Str::random(64);
                $lead->update(['enrolment_token' => $token]);
                $enrolUrl = route('enrol.form', ['token' => $token]);
                try {
                    Mail::to($lead->email)->send(new EnrolmentStartMail($lead, $enrolUrl));
                    $message = "Status updated and enrolment invitation sent to {$lead->name}";
                    $this->logActivity($lead, 'email_sent', 'Enrolment invitation email sent', ['email_type' => 'EnrolmentStartMail']);
                } catch (\Exception $e) {
                    Log::error('EnrolmentStartMail failed', ['lead' => $lead->id, 'error' => $e->getMessage()]);
                }
            }
        }

        return redirect()->back()->with('success', $message);
    }

    public function addLeadNotes(Request $request, Lead $lead)
    {
        $request->validate(['notes' => 'required|string']);

        $oldNotes = $lead->notes;
        $lead->update(['notes' => $request->notes, 'last_activity_at' => now()]);

        $this->logActivity($lead, 'note', 'Internal notes updated', [
            'from' => $oldNotes,
            'to'   => $request->notes,
        ]);

        return redirect()->back()->with('success', 'Notes saved successfully');
    }

    /** Set / update the actual scheduled tour date & time. */
    public function updateTourDate(Request $request, Lead $lead)
    {
        $request->validate([
            'tour_date' => 'required|date',
            'tour_time' => 'required|string|max:50',
        ]);

        $tourDatetime    = \Carbon\Carbon::parse($request->tour_date . ' ' . $request->tour_time);
        $previousStatus  = $lead->status;
        $statusChanged   = $previousStatus !== 'tour_scheduled';

        $lead->update([
            'tour_scheduled_at' => $tourDatetime,
            'preferred_date'    => $tourDatetime->toDateString(),
            'preferred_time'    => $request->tour_time,
            'status'            => 'tour_scheduled',
            'last_activity_at'  => now(),
        ]);

        $this->logActivity($lead, 'note', 'Tour date set to ' . $tourDatetime->format('d M Y \a\t H:i'), [
            'tour_date' => $tourDatetime->toDateTimeString(),
        ]);

        if ($statusChanged) {
            $fromLabel = ucwords(str_replace('_', ' ', $previousStatus));
            $this->logActivity($lead, 'status_change', "Status changed from {$fromLabel} to Tour Scheduled", [
                'from' => $previousStatus,
                'to'   => 'tour_scheduled',
            ]);
        }

        return redirect()->back()->with('success', 'Tour date set and status updated to Tour Scheduled.');
    }

    public function notifyTour(Lead $lead)
    {
        $previousStatus = $lead->status;
        $lead->update([
            'status'             => 'tour_scheduled',
            'tour_scheduled_at'  => $lead->tour_scheduled_at ?? now(),
            'last_activity_at'   => now(),
        ]);

        $this->logActivity($lead, 'status_change', 'Status changed to Tour Scheduled', [
            'from' => $previousStatus,
            'to'   => 'tour_scheduled',
        ]);

        try {
            Mail::to($lead->email)->send(new TourConfirmationMail($lead));
            $this->logActivity($lead, 'email_sent', 'Tour confirmation email sent', ['email_type' => 'TourConfirmationMail']);
        } catch (\Exception $e) {
            Log::error('TourConfirmationMail failed', ['lead' => $lead->id, 'error' => $e->getMessage()]);
        }

        return redirect()->back()->with('success', "Tour confirmation sent to {$lead->name}");
    }

    public function startEnrol(Lead $lead)
    {
        // Guard: if already converted AND an application already exists, don't re-send
        if ($lead->status === 'converted' && $lead->application()->exists()) {
            return redirect()->back()->with('info', "An application already exists for {$lead->name}. No email sent.");
        }

        $previousStatus = $lead->status;

        // Generate a unique one-time token for this lead's enrolment URL
        $token = Str::random(64);

        $lead->update([
            'status'           => 'converted',
            'enrolment_token'  => $token,
        ]);

        $this->logActivity($lead, 'status_change', 'Status changed to Converted', [
            'from' => $previousStatus,
            'to'   => 'converted',
        ]);

        // Build the pre-filled enrolment URL with the token
        $enrolUrl = route('enrol.form', ['token' => $token]);

        try {
            Mail::to($lead->email)->send(new EnrolmentStartMail($lead, $enrolUrl));
            $this->logActivity($lead, 'email_sent', 'Enrolment invitation email sent', [
                'email_type' => 'EnrolmentStartMail',
                'enrol_url'  => $enrolUrl,
            ]);
        } catch (\Exception $e) {
            Log::error('EnrolmentStartMail failed', ['lead' => $lead->id, 'error' => $e->getMessage()]);
        }

        return redirect()->back()->with('success', "Enrolment invitation sent to {$lead->name}");
    }

    public function addToWaitlist(Lead $lead)
    {
        $previousStatus = $lead->status;
        $lead->update(['status' => 'waitlist']);

        $this->logActivity($lead, 'status_change', 'Status changed to Waitlist', [
            'from' => $previousStatus,
            'to'   => 'waitlist',
        ]);

        return redirect()->back()->with('success', "{$lead->name} added to waitlist");
    }

    // Fix #17: one-click "Mark Contacted" action
    public function markContacted(Lead $lead)
    {
        if ($lead->status !== 'new') {
            return redirect()->back()->with('info', 'Lead is already past the New stage');
        }

        $lead->update(['status' => 'contacted', 'last_activity_at' => now()]);

        $this->logActivity($lead, 'status_change', 'Status changed from New to Contacted', [
            'from' => 'new',
            'to'   => 'contacted',
        ]);

        return redirect()->back()->with('success', "{$lead->name} marked as contacted");
    }

    public function markLost(Request $request, Lead $lead)
    {
        $request->validate([
            'lost_reason' => 'required|string|in:' . implode(',', array_keys(Lead::LOST_REASONS)),
        ]);

        $previousStatus = $lead->status;
        $lead->update([
            'status'           => 'lost',
            'lost_reason'      => $request->lost_reason,
            'last_activity_at' => now(),
        ]);

        $reasonLabel = Lead::LOST_REASONS[$request->lost_reason];
        $this->logActivity($lead, 'status_change', "Marked as Lost: {$reasonLabel}", [
            'from'        => $previousStatus,
            'to'          => 'lost',
            'lost_reason' => $reasonLabel,
        ]);

        return redirect()->back()->with('success', "{$lead->name} marked as lost ({$reasonLabel})");
    }

    public function kanban()
    {
        $kanbanStatuses = ['new', 'contacted', 'tour_scheduled', 'tour_completed', 'converted'];

        $columns = [];
        foreach ($kanbanStatuses as $status) {
            $columns[$status] = Lead::where('status', $status)
                ->with('assignee', 'application')
                ->latest()
                ->limit(30)
                ->get();
        }

        $hiddenCounts = [
            'waitlist' => Lead::where('status', 'waitlist')->count(),
            'lost'     => Lead::where('status', 'lost')->count(),
        ];

        return view('admin.crm.kanban', compact('columns', 'hiddenCounts'));
    }

    public function ajaxUpdateStatus(Request $request, Lead $lead)
    {
        $request->validate([
            'status' => 'required|in:' . implode(',', Lead::STATUSES),
        ]);

        $previousStatus = $lead->status;
        if ($previousStatus === $request->status) {
            return response()->json(['success' => true, 'message' => 'No change']);
        }

        $lead->update(['status' => $request->status]);

        $fromLabel = ucwords(str_replace('_', ' ', $previousStatus));
        $toLabel = ucwords(str_replace('_', ' ', $request->status));

        $this->logActivity($lead, 'status_change', "Status changed from {$fromLabel} to {$toLabel}", [
            'from' => $previousStatus,
            'to'   => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => "Moved {$lead->name} to {$toLabel}",
        ]);
    }

    public function export(Request $request)
    {
        $filename = 'leads-' . now()->format('Y-m-d') . '.xlsx';

        return Excel::download(
            new LeadsExport(
                status:      $request->input('status'),
                source:      $request->input('source'),
                child_age:   $request->input('child_age'),
                assigned_to: $request->filled('assigned_to') ? (int) $request->input('assigned_to') : null,
                search:      $request->input('search'),
            ),
            $filename
        );
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'lead_ids'   => 'required|array',
            'lead_ids.*' => 'exists:leads,id',
            'action'     => 'required|string',
        ]);

        $leads = Lead::whereIn('id', $request->lead_ids)->get();
        $count = $leads->count();

        if ($request->action === 'delete') {
            foreach ($leads as $lead) {
                $lead->delete(); // Soft delete — tasks and history are preserved
            }
            return redirect()->back()->with('success', "{$count} lead(s) archived");
        }

        if (in_array($request->action, Lead::STATUSES)) {
            foreach ($leads as $lead) {
                $previousStatus = $lead->status;
                $lead->update(['status' => $request->action]);
                $fromLabel = ucwords(str_replace('_', ' ', $previousStatus));
                $toLabel = ucwords(str_replace('_', ' ', $request->action));
                $this->logActivity($lead, 'status_change', "Bulk: Status changed from {$fromLabel} to {$toLabel}", [
                    'from' => $previousStatus,
                    'to'   => $request->action,
                ]);
            }
            $statusLabel = ucwords(str_replace('_', ' ', $request->action));
            return redirect()->back()->with('success', "{$count} lead(s) updated to {$statusLabel}");
        }

        return redirect()->back()->with('error', 'Unknown action');
    }

    public function assignLead(Request $request, Lead $lead)
    {
        $request->validate([
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $oldAssignee = $lead->assignee?->name ?? 'Unassigned';
        $lead->update(['assigned_to' => $request->assigned_to ?: null]);
        $newAssignee = $lead->fresh()->assignee?->name ?? 'Unassigned';

        if ($oldAssignee !== $newAssignee) {
            // Fix #8: use 'assigned' type (not 'status_change') for proper timeline icon
            $this->logActivity($lead, 'assigned', "Assigned from {$oldAssignee} to {$newAssignee}", [
                'from' => $oldAssignee,
                'to'   => $newAssignee,
            ]);
        }

        return redirect()->back()->with('success', "Lead assigned to {$newAssignee}");
    }

    private function logActivity(Lead $lead, string $type, string $description, array $metadata = []): void
    {
        LeadActivity::create([
            'lead_id'     => $lead->id,
            'user_id'     => auth()->id(),
            'type'        => $type,
            'description' => $description,
            'metadata'    => $metadata ?: null,
        ]);

        // Keep last_activity_at in sync without bumping updated_at
        $lead->timestamps = false;
        $lead->update(['last_activity_at' => now()]);
        $lead->timestamps = true;
    }
}
