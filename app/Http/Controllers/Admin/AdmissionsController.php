<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvitationMail;
use App\Models\Application;
use App\Models\Child;
use App\Models\Invitation;
use App\Models\User;
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

        // ── CSV Export ────────────────────────────────────────────────────
        if ($request->get('export') === 'csv') {
            $rows = (clone $query)->with('lead')->latest()->get();
            $filename = 'admissions_' . now()->format('Y-m-d') . '.csv';
            $headers = [
                'Content-Type'        => 'text/csv',
                'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            ];
            $callback = function () use ($rows) {
                $handle = fopen('php://output', 'w');
                fputcsv($handle, ['Reference', 'Child Name', 'Child DOB', 'Programme', 'Fee Option', 'Start Date', 'Status', 'Parent Name', 'Parent Email', 'Parent Cell', 'Source', 'Documents', 'Created At']);
                foreach ($rows as $app) {
                    fputcsv($handle, [
                        $app->reference,
                        $app->child_name,
                        $app->child_dob?->format('Y-m-d'),
                        $app->program_name,
                        $app->fee_option,
                        $app->start_date?->format('Y-m-d'),
                        $app->statusLabel(),
                        $app->mother_name,
                        $app->mother_email,
                        $app->mother_cell,
                        $app->lead?->source ?? '',
                        $app->documentsCount(),
                        $app->created_at->format('Y-m-d H:i'),
                    ]);
                }
                fclose($handle);
            };
            return response()->stream($callback, 200, $headers);
        }

        $applications = $query->with('lead')->latest()->paginate(25)->withQueryString();

        $stats = [
            'total'        => Application::count(),
            'pending'      => Application::where('status', 'pending')->count(),
            'under_review' => Application::where('status', 'under_review')->count(),
            'approved'     => Application::where('status', 'approved')->count(),
            'waitlist'     => Application::where('status', 'waitlist')->count(),
            'rejected'     => Application::where('status', 'rejected')->count(),
            'this_month'   => Application::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count(),
            'actionable'   => Application::whereIn('status', ['pending', 'under_review'])->count(),
        ];

        return view('admin.admissions.index', compact('applications', 'stats'));
    }

    public function show($id)
    {
        $application = Application::with(['lead', 'child'])->findOrFail($id);

        // Auto-mark as under_review when admin opens it
        if ($application->status === 'pending') {
            $application->update(['status' => 'under_review', 'reviewed_at' => now()]);
        }

        return view('admin.admissions.show', compact('application'));
    }

    public function approve(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        // Create the canonical Child record if not already linked
        if (! $application->child_id) {
            $child = Child::create([
                'child_number'   => Child::generateChildNumber($application->child_name),
                'name'           => $application->child_name,
                'nickname'       => $application->child_nickname,
                'dob'            => $application->child_dob,
                'gender'         => $application->child_gender,
                'id_number'      => $application->child_id_number,
                'language'       => $application->child_language,
                'documents'      => $application->documents,
                'parent_user_id' => $application->parent_user_id, // null until parent accepts invite
            ]);

            $application->child_id = $child->id;
        }

        $application->update([
            'status'      => 'approved',
            'approved_at' => now(),
            'child_id'    => $application->child_id,
        ]);

        // If parent already linked, create the child portal user immediately
        if ($application->parent_user_id) {
            $application->createChildUser();
        }

        // ── Auto-send portal invitation on approval ──────────────────────
        $email = $application->mother_email;
        $inviteMessage = '';

        if ($email) {
            $existingUser = User::where('email', $email)->first();

            if ($existingUser) {
                // Parent already has an account — link directly, no invitation needed
                if (! $existingUser->hasRole('parent')) {
                    $existingUser->assignRole('parent');
                }
                // Backfill phone from application if missing
                if (! $existingUser->phone && $application->mother_cell) {
                    $existingUser->update(['phone' => $application->mother_cell]);
                }
                $application->update([
                    'parent_user_id' => $existingUser->id,
                    'invited_at'     => now(),
                ]);
                // Back-fill child record with parent link
                if ($application->child_id) {
                    Child::where('id', $application->child_id)
                        ->whereNull('parent_user_id')
                        ->update(['parent_user_id' => $existingUser->id]);
                }
                $application->createChildUser();
                $inviteMessage = " Linked to existing account for {$existingUser->name}.";
            } else {
                // Invalidate any previous pending invitation for this application
                Invitation::where('email', $email)
                    ->whereNull('accepted_at')
                    ->where('application_id', $application->id)
                    ->delete();

                $invitation = Invitation::create([
                    'email'          => $email,
                    'role'           => 'parent',
                    'token'          => Str::random(64),
                    'invited_by'     => Auth::id(),
                    'application_id' => $application->id,
                    'expires_at'     => now()->addDays(7),
                ]);

                Mail::to($invitation->email)->send(new InvitationMail($invitation));

                $application->update(['invited_at' => now()]);
                $inviteMessage = " Portal invitation sent to {$email}.";
            }
        }

        return redirect()->back()->with('success', "Application for {$application->child_name} has been approved.{$inviteMessage}");
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
            'email' => ['required', 'email'],
        ]);

        $email = $request->email;

        // ── Case 1: parent already has a user account ─────────────────────
        $existingUser = User::where('email', $email)->first();
        if ($existingUser) {
            // Ensure they have the parent role
            if (! $existingUser->hasRole('parent')) {
                $existingUser->assignRole('parent');
            }
            // Link application directly — no invitation needed
            $application->update([
                'parent_user_id' => $existingUser->id,
                'invited_at'     => now(),
            ]);

            // Back-fill child record with parent link
            if ($application->child_id) {
                Child::where('id', $application->child_id)
                    ->whereNull('parent_user_id')
                    ->update(['parent_user_id' => $existingUser->id]);
            }

            // Create child user from application data
            $application->createChildUser();

            return redirect()->back()->with('success',
                "Linked to existing account for {$existingUser->name}. No invitation email needed."
            );
        }

        // ── Case 2: resend — invalidate any previous pending invitation ──
        Invitation::where('email', $email)
            ->whereNull('accepted_at')
            ->where('application_id', $application->id)
            ->delete();

        $invitation = Invitation::create([
            'email'          => $email,
            'role'           => 'parent',
            'token'          => Str::random(64),
            'invited_by'     => Auth::id(),
            'application_id' => $application->id,
            'expires_at'     => now()->addDays(7),
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
            // Prefer child record documents (updated by parent portal uploads),
            // fall back to original application documents from submission.
            $childDocs = $application->child?->documents ?? [];
            $appDocs   = $application->documents ?? [];
            $path = $childDocs[$type] ?? $appDocs[$type] ?? null;
        }

        if (!$path || !Storage::disk('public')->exists($path)) {
            return redirect()->back()->with('error', 'Document not found on server.');
        }

        $mime     = Storage::disk('public')->mimeType($path);
        $filename = basename($path);

        return response()->stream(
            fn () => fpassthru(Storage::disk('public')->readStream($path)),
            200,
            [
                'Content-Type'        => $mime,
                'Content-Disposition' => "inline; filename=\"{$filename}\"",
            ]
        );
    }
}
