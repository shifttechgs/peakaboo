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
    // ──────────────────────────────────────────────────────────────────────
    //  INDEX / LIST / KANBAN
    // ──────────────────────────────────────────────────────────────────────

    public function index()
    {
        $stats = [];
        foreach (Lead::STATUSES as $status) {
            $stats[$status] = Lead::where('status', $status)->count();
        }
        $stats['overdue'] = Lead::where('status', 'tour_scheduled')
            ->where(function ($q) {
                $q->whereNotNull('tour_scheduled_at')->whereDate('tour_scheduled_at', '<', today())
                  ->orWhere(function ($q2) {
                      $q2->whereNull('tour_scheduled_at')->whereDate('preferred_date', '<', today());
                  });
            })
            ->count();

        $recent = Lead::latest()->limit(5)->get();

        $sourceStats = Lead::selectRaw('COALESCE(source, "unknown") as source, COUNT(*) as count')
            ->groupBy('source')
            ->pluck('count', 'source');

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

    public function kanban()
    {
        $kanbanStatuses = ['tour_scheduled', 'tour_completed', 'converted'];

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

    // ──────────────────────────────────────────────────────────────────────
    //  CREATE / SHOW / EDIT / DELETE
    // ──────────────────────────────────────────────────────────────────────

    public function createLead()
    {
        return view('admin.crm.lead-create');
    }

    /** Store a manually created lead — always starts as tour_scheduled. */
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
            'assigned_to'    => 'nullable|exists:users,id',
        ]);

        $year = now()->year;
        $count = Lead::withTrashed()->whereYear('created_at', $year)->count() + 1;
        $validated['reference']        = 'TOUR-' . $year . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);
        $validated['status']           = 'tour_scheduled';
        $validated['last_activity_at'] = now();

        // Set tour_scheduled_at from preferred date + time
        $validated['tour_scheduled_at'] = \Carbon\Carbon::parse(
            $validated['preferred_date'] . ' ' . $validated['preferred_time']
        );

        $lead = Lead::create($validated);

        $this->logActivity($lead, 'created', 'Lead created manually by admin');

        // Auto-send tour confirmation
        $this->sendTourConfirmation($lead);

        return redirect()->route('admin.crm.leads.show', $lead)
            ->with('success', "Lead created — tour confirmation sent to {$lead->name}");
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
        ]);

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
        $lead->delete();

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

    // ──────────────────────────────────────────────────────────────────────
    //  STATUS TRANSITIONS  (the core automation engine)
    // ──────────────────────────────────────────────────────────────────────

    /**
     * Universal status update — handles all transitions + auto-emails.
     * Used by the detail page form, the list page inline select, and bulk actions.
     */
    public function updateLeadStatus(Request $request, Lead $lead)
    {
        $request->validate([
            'status' => 'required|in:' . implode(',', Lead::STATUSES),
        ]);

        $previousStatus = $lead->status;
        $newStatus = $request->status;

        if ($previousStatus === $newStatus) {
            return redirect()->back()->with('info', 'No change — status is already ' . $lead->statusLabel());
        }

        $message = $this->transitionTo($lead, $newStatus);

        return redirect()->back()->with('success', $message);
    }

    /** AJAX version for kanban drag & list inline select. */
    public function ajaxUpdateStatus(Request $request, Lead $lead)
    {
        $request->validate([
            'status' => 'required|in:' . implode(',', Lead::STATUSES),
        ]);

        $previousStatus = $lead->status;
        if ($previousStatus === $request->status) {
            return response()->json(['success' => true, 'message' => 'No change']);
        }

        $message = $this->transitionTo($lead, $request->status);

        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }

    /**
     * Central transition engine — performs status change + auto-emails.
     */
    private function transitionTo(Lead $lead, string $newStatus): string
    {
        $previousStatus = $lead->status;
        $fromLabel = Lead::STATUS_LABELS[$previousStatus] ?? ucwords(str_replace('_', ' ', $previousStatus));
        $toLabel   = Lead::STATUS_LABELS[$newStatus] ?? ucwords(str_replace('_', ' ', $newStatus));

        $timestamps = ['last_activity_at' => now()];

        // ── Tour Scheduled ─────────────────────────────────────────────
        if ($newStatus === 'tour_scheduled') {
            if (! $lead->tour_scheduled_at) {
                $timestamps['tour_scheduled_at'] = \Carbon\Carbon::parse(
                    $lead->preferred_date->format('Y-m-d') . ' ' . $lead->preferred_time
                );
            }

            $lead->update(array_merge(['status' => $newStatus], $timestamps));
            $this->logActivity($lead, 'status_change', "Status changed from {$fromLabel} to {$toLabel}", [
                'from' => $previousStatus, 'to' => $newStatus,
            ]);

            $this->sendTourConfirmation($lead);

            return "Status updated to Tour Scheduled — confirmation sent to {$lead->name}";
        }

        // ── Tour Completed ────────────────────────────────────────────
        if ($newStatus === 'tour_completed') {
            $lead->update(array_merge(['status' => $newStatus], $timestamps));
            $this->logActivity($lead, 'status_change', "Status changed from {$fromLabel} to {$toLabel}", [
                'from' => $previousStatus, 'to' => $newStatus,
            ]);

            return "Tour marked complete for {$lead->name}";
        }

        // ── Converted (auto-send enrolment invitation) ─────────────────
        if ($newStatus === 'converted') {
            $timestamps['converted_at'] = $lead->converted_at ?? now();

            if ($lead->application()->exists()) {
                $lead->update(array_merge(['status' => $newStatus], $timestamps));
                $this->logActivity($lead, 'status_change', "Status changed from {$fromLabel} to Converted", [
                    'from' => $previousStatus, 'to' => $newStatus,
                ]);
                return "Status updated to Converted (application already received — no email sent)";
            }

            $token = Str::random(64);
            $timestamps['enrolment_token'] = $token;
            $lead->update(array_merge(['status' => $newStatus], $timestamps));

            $this->logActivity($lead, 'status_change', "Status changed from {$fromLabel} to Converted", [
                'from' => $previousStatus, 'to' => $newStatus,
            ]);

            $enrolUrl = route('enrol.form', ['token' => $token]);
            try {
                Mail::to($lead->email)->send(new EnrolmentStartMail($lead, $enrolUrl));
                $this->logActivity($lead, 'email_sent', 'Enrolment invitation email sent automatically', [
                    'email_type' => 'EnrolmentStartMail',
                    'enrol_url'  => $enrolUrl,
                ]);
                return "Converted — enrolment invitation sent to {$lead->name}";
            } catch (\Exception $e) {
                Log::error('EnrolmentStartMail failed', ['lead' => $lead->id, 'error' => $e->getMessage()]);
                return "Status updated to Converted (email failed — check logs)";
            }
        }

        // ── Waitlist / Lost / any other ──────────────────────────────
        $lead->update(array_merge(['status' => $newStatus], $timestamps));
        $this->logActivity($lead, 'status_change', "Status changed from {$fromLabel} to {$toLabel}", [
            'from' => $previousStatus, 'to' => $newStatus,
        ]);

        return "Status updated to {$toLabel}";
    }

    // ──────────────────────────────────────────────────────────────────────
    //  SPECIFIC ACTIONS (sidebar buttons on lead-detail)
    // ──────────────────────────────────────────────────────────────────────

    /** Update tour date/time and ensure status is tour_scheduled. */
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

        $this->logActivity($lead, 'note', 'Tour date updated to ' . $tourDatetime->format('d M Y \a\t H:i'), [
            'tour_date' => $tourDatetime->toDateTimeString(),
        ]);

        if ($statusChanged) {
            $fromLabel = Lead::STATUS_LABELS[$previousStatus] ?? ucwords(str_replace('_', ' ', $previousStatus));
            $this->logActivity($lead, 'status_change', "Status changed from {$fromLabel} to Tour Scheduled", [
                'from' => $previousStatus, 'to' => 'tour_scheduled',
            ]);
        }

        // Auto-send tour confirmation email
        $this->sendTourConfirmation($lead);

        return redirect()->back()->with('success', 'Tour date updated — confirmation email sent to ' . $lead->name);
    }

    /** Re-send tour confirmation email without changing anything else. */
    public function notifyTour(Lead $lead)
    {
        $this->sendTourConfirmation($lead);
        return redirect()->back()->with('success', "Tour confirmation re-sent to {$lead->name}");
    }

    /** Manually trigger enrolment email (for re-sends). */
    public function startEnrol(Lead $lead)
    {
        if ($lead->application()->exists()) {
            return redirect()->back()->with('info', "An application already exists for {$lead->name}. No email sent.");
        }

        $message = $this->transitionTo($lead, 'converted');

        return redirect()->back()->with('success', $message);
    }

    public function addToWaitlist(Lead $lead)
    {
        $message = $this->transitionTo($lead, 'waitlist');
        return redirect()->back()->with('success', $message);
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
        $fromLabel = Lead::STATUS_LABELS[$previousStatus] ?? ucwords(str_replace('_', ' ', $previousStatus));
        $this->logActivity($lead, 'status_change', "Marked as Lost from {$fromLabel}: {$reasonLabel}", [
            'from'        => $previousStatus,
            'to'          => 'lost',
            'lost_reason' => $reasonLabel,
        ]);

        return redirect()->back()->with('success', "{$lead->name} marked as lost ({$reasonLabel})");
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

    public function assignLead(Request $request, Lead $lead)
    {
        $request->validate([
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $oldAssignee = $lead->assignee?->name ?? 'Unassigned';
        $lead->update(['assigned_to' => $request->assigned_to ?: null]);
        $newAssignee = $lead->fresh()->assignee?->name ?? 'Unassigned';

        if ($oldAssignee !== $newAssignee) {
            $this->logActivity($lead, 'assigned', "Assigned from {$oldAssignee} to {$newAssignee}", [
                'from' => $oldAssignee,
                'to'   => $newAssignee,
            ]);
        }

        return redirect()->back()->with('success', "Lead assigned to {$newAssignee}");
    }

    // ──────────────────────────────────────────────────────────────────────
    //  BULK & EXPORT
    // ──────────────────────────────────────────────────────────────────────

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
                $lead->delete();
            }
            return redirect()->back()->with('success', "{$count} lead(s) archived");
        }

        if (in_array($request->action, Lead::STATUSES)) {
            foreach ($leads as $lead) {
                $this->transitionTo($lead, $request->action);
            }
            $statusLabel = Lead::STATUS_LABELS[$request->action] ?? ucwords(str_replace('_', ' ', $request->action));
            return redirect()->back()->with('success', "{$count} lead(s) updated to {$statusLabel}");
        }

        return redirect()->back()->with('error', 'Unknown action');
    }

    // ──────────────────────────────────────────────────────────────────────
    //  PRIVATE HELPERS
    // ──────────────────────────────────────────────────────────────────────

    /** Send the tour confirmation email and log it. */
    private function sendTourConfirmation(Lead $lead): void
    {
        try {
            Mail::to($lead->email)->send(new TourConfirmationMail($lead));
            $this->logActivity($lead, 'email_sent', 'Tour confirmation email sent', [
                'email_type' => 'TourConfirmationMail',
            ]);
        } catch (\Exception $e) {
            Log::error('TourConfirmationMail failed', ['lead' => $lead->id, 'error' => $e->getMessage()]);
        }
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

        $lead->timestamps = false;
        $lead->update(['last_activity_at' => now()]);
        $lead->timestamps = true;
    }
}
