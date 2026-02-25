<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvitationMail;
use App\Models\Application;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdmissionsController extends Controller
{
    public function index(Request $request)
    {
        $query = Application::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('program')) {
            $query->where('program', $request->program);
        }
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('child_name', 'like', "%{$s}%")
                  ->orWhere('mother_name', 'like', "%{$s}%")
                  ->orWhere('mother_email', 'like', "%{$s}%")
                  ->orWhere('mother_cell', 'like', "%{$s}%")
                  ->orWhere('reference', 'like', "%{$s}%");
            });
        }

        $applications = $query->latest()->paginate(25)->withQueryString();

        $stats = [
            'pending'      => Application::where('status', 'pending')->count(),
            'under_review' => Application::where('status', 'under_review')->count(),
            'approved'     => Application::where('status', 'approved')->count(),
            'waitlist'     => Application::where('status', 'waitlist')->count(),
            'rejected'     => Application::where('status', 'rejected')->count(),
        ];

        return view('admin.admissions.index', compact('applications', 'stats'));
    }

    public function show($id)
    {
        $application = Application::findOrFail($id);

        // Auto-mark as under_review when admin opens it
        if ($application->status === 'pending') {
            $application->update(['status' => 'under_review', 'reviewed_at' => now()]);
        }

        return view('admin.admissions.show', compact('application'));
    }

    public function approve(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $application->update([
            'status'      => 'approved',
            'approved_at' => now(),
        ]);

        return redirect()->back()->with('success', "Application for {$application->child_name} has been approved.");
    }

    public function reject(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $request->validate(['reason' => 'nullable|string|max:1000']);

        $notes = $application->admin_notes ?? '';
        if ($request->filled('reason')) {
            $notes .= ($notes ? "\n\n" : '') . 'Rejection reason: ' . $request->reason;
        }

        $application->update([
            'status'      => 'rejected',
            'rejected_at' => now(),
            'admin_notes' => $notes ?: null,
        ]);

        return redirect()->back()->with('success', "Application for {$application->child_name} has been rejected.");
    }

    public function waitlist($id)
    {
        $application = Application::findOrFail($id);
        $application->update(['status' => 'waitlist']);

        return redirect()->back()->with('success', "{$application->child_name} added to the waiting list.");
    }

    public function addNotes(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $request->validate(['admin_notes' => 'required|string|max:5000']);

        $application->update(['admin_notes' => $request->admin_notes]);

        return redirect()->back()->with('success', 'Notes saved successfully.');
    }

    public function sendInvite(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
        ]);

        $invitation = Invitation::create([
            'email'      => $request->email,
            'role'       => 'parent',
            'token'      => Str::random(64),
            'invited_by' => Auth::id(),
            'expires_at' => now()->addDays(7),
        ]);

        Mail::to($invitation->email)->send(new InvitationMail($invitation));

        $application->update(['invited_at' => now()]);

        return redirect()->back()->with('success', "Portal invitation sent to {$invitation->email}.");
    }

    public function downloadDocument($id, string $type)
    {
        $application = Application::findOrFail($id);

        $allowed = ['birth_certificate', 'clinic_card', 'parent_ids', 'proof_address', 'pdf'];

        if (!in_array($type, $allowed)) {
            abort(404);
        }

        if ($type === 'pdf') {
            $path = $application->pdf_path;
        } else {
            $path = ($application->documents ?? [])[$type] ?? null;
        }

        if (!$path || !Storage::disk('public')->exists($path)) {
            return redirect()->back()->with('error', 'Document not found on server.');
        }

        return Storage::disk('public')->download($path);
    }
}
