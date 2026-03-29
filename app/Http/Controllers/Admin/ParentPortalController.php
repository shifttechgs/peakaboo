<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvitationMail;
use App\Models\Application;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ParentPortalController extends Controller
{
    // ── Index: overview dashboard ────────────────────────────────────────────

    public function index(Request $request)
    {
        $query = User::withTrashed()
            ->with('roles', 'applications')
            ->whereHas('roles', fn($q) => $q->where('name', 'parent'));

        if ($request->filled('search')) {
            $term = '%' . $request->search . '%';
            $query->where(fn($q) => $q
                ->where('name', 'LIKE', $term)
                ->orWhere('email', 'LIKE', $term)
                ->orWhere('phone', 'LIKE', $term));
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->whereNull('deleted_at');
            } elseif ($request->status === 'inactive') {
                $query->whereNotNull('deleted_at');
            } elseif ($request->status === 'unverified') {
                $query->whereNull('email_verified_at');
            }
        }

        $portals = $query->orderByDesc('created_at')->paginate(20)->withQueryString();

        $stats = [
            'total'       => User::withTrashed()->whereHas('roles', fn($q) => $q->where('name', 'parent'))->count(),
            'active'      => User::whereHas('roles', fn($q) => $q->where('name', 'parent'))->count(),
            'inactive'    => User::onlyTrashed()->whereHas('roles', fn($q) => $q->where('name', 'parent'))->count(),
            'unverified'  => User::whereHas('roles', fn($q) => $q->where('name', 'parent'))->whereNull('email_verified_at')->count(),
            'pending_inv' => Invitation::where('role', 'parent')->whereNull('accepted_at')->where('expires_at', '>', now())->count(),
        ];

        return view('admin.parent-portal.index', compact('portals', 'stats'));
    }

    // ── Show individual parent portal account ────────────────────────────────

    public function show($id)
    {
        $parent = User::withTrashed()
            ->with('roles', 'applications')
            ->findOrFail($id);

        // Pending invitations for this email
        $pendingInvite = Invitation::where('email', $parent->email)
            ->where('role', 'parent')
            ->whereNull('accepted_at')
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        return view('admin.parent-portal.show', compact('parent', 'pendingInvite'));
    }

    // ── Pending invitations ──────────────────────────────────────────────────

    public function invitations(Request $request)
    {
        $query = Invitation::with('invitedBy')->where('role', 'parent');

        if ($request->filled('search')) {
            $term = '%' . $request->search . '%';
            $query->where('email', 'LIKE', $term);
        }

        if ($request->filled('status')) {
            if ($request->status === 'pending') {
                $query->whereNull('accepted_at')->where('expires_at', '>', now());
            } elseif ($request->status === 'accepted') {
                $query->whereNotNull('accepted_at');
            } elseif ($request->status === 'expired') {
                $query->whereNull('accepted_at')->where('expires_at', '<=', now());
            }
        }

        $invitations = $query->orderByDesc('created_at')->paginate(25)->withQueryString();

        $stats = [
            'total'    => Invitation::where('role', 'parent')->count(),
            'pending'  => Invitation::where('role', 'parent')->whereNull('accepted_at')->where('expires_at', '>', now())->count(),
            'accepted' => Invitation::where('role', 'parent')->whereNotNull('accepted_at')->count(),
            'expired'  => Invitation::where('role', 'parent')->whereNull('accepted_at')->where('expires_at', '<=', now())->count(),
        ];

        return view('admin.parent-portal.invitations', compact('invitations', 'stats'));
    }

    // ── Re-send portal invitation ────────────────────────────────────────────

    public function resendInvite(Request $request, $id)
    {
        $parent = User::withTrashed()->findOrFail($id);

        // Expire any existing pending invite
        Invitation::where('email', $parent->email)
            ->whereNull('accepted_at')
            ->update(['expires_at' => now()]);

        $invitation = Invitation::create([
            'email'      => $parent->email,
            'token'      => Str::random(40),
            'role'       => 'parent',
            'invited_by' => Auth::id(),
            'expires_at' => now()->addDays(7),
        ]);

        try {
            Mail::to($parent->email)->send(new InvitationMail($invitation));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Could not send invitation email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Portal invitation re-sent to ' . $parent->email);
    }

    // ── Send invitation to an application parent ─────────────────────────────

    public function sendInviteToApp(Request $request, $appId)
    {
        $app = Application::findOrFail($appId);

        $email = $app->mother_email ?: $app->father_email;
        $name  = $app->mother_name  ?: $app->father_name;

        if (! $email) {
            return redirect()->back()->with('error', 'No parent email found on application.');
        }

        // Check if parent account already exists
        if (User::where('email', $email)->exists()) {
            return redirect()->back()->with('error', 'A portal account already exists for ' . $email);
        }

        // Expire existing pending invites
        Invitation::where('email', $email)->whereNull('accepted_at')->update(['expires_at' => now()]);

        $invitation = Invitation::create([
            'email'      => $email,
            'token'      => Str::random(40),
            'role'       => 'parent',
            'invited_by' => Auth::id(),
            'expires_at' => now()->addDays(7),
        ]);

        try {
            Mail::to($email)->send(new InvitationMail($invitation));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Could not send invitation: ' . $e->getMessage());
        }

        // Mark invited_at on the application
        $app->update(['invited_at' => now()]);

        return redirect()->back()->with('success', 'Portal invitation sent to ' . $email);
    }

    // ── Activate / Restore a deactivated parent ──────────────────────────────

    public function activate($id)
    {
        $parent = User::withTrashed()->whereHas('roles', fn($q) => $q->where('name', 'parent'))->findOrFail($id);
        $parent->restore();

        return redirect()->back()->with('success', $parent->name . '\'s account has been reactivated.');
    }

    // ── Deactivate a parent account ──────────────────────────────────────────

    public function deactivate($id)
    {
        $parent = User::whereHas('roles', fn($q) => $q->where('name', 'parent'))->findOrFail($id);
        $parent->delete();

        return redirect()->back()->with('success', $parent->name . '\'s account has been deactivated.');
    }

    // ── Reset parent's password (generate temp) ──────────────────────────────

    public function resetPassword(Request $request, $id)
    {
        $parent = User::withTrashed()->findOrFail($id);

        $temp = Str::random(10);
        $parent->password = Hash::make($temp);
        $parent->save();

        return redirect()->back()->with('success', 'Password reset. Temporary password: ' . $temp);
    }

    // ── Cancel / expire a pending invitation ─────────────────────────────────

    public function cancelInvite($inviteId)
    {
        $invite = Invitation::where('role', 'parent')->findOrFail($inviteId);
        $invite->update(['expires_at' => now()]);

        return redirect()->back()->with('success', 'Invitation to ' . $invite->email . ' has been cancelled.');
    }

    // ── Manually create a parent portal account ──────────────────────────────

    public function storeAccount(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:30',
        ]);

        // Create the user with a random unusable password — they must use invitation to set password
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make(Str::random(32)),
        ]);

        $user->assignRole('parent');

        // Optionally send invitation immediately
        if ($request->boolean('send_invite')) {
            Invitation::where('email', $user->email)->whereNull('accepted_at')->update(['expires_at' => now()]);

            $invitation = Invitation::create([
                'email'      => $user->email,
                'token'      => Str::random(40),
                'role'       => 'parent',
                'invited_by' => Auth::id(),
                'expires_at' => now()->addDays(7),
            ]);

            try {
                Mail::to($user->email)->send(new InvitationMail($invitation));
            } catch (\Exception $e) {
                // Account created, email failed — non-fatal
            }
        }

        return redirect()->route('admin.parent-portal.show', $user->id)
            ->with('success', 'Parent portal account created for ' . $user->name);
    }
}





