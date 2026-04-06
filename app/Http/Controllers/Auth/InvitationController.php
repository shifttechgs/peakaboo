<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\InvitationMail;
use App\Mail\OnboardingMail;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class InvitationController extends Controller
{
    public function send(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'role'  => ['required', 'in:parent,teacher,admin,child'],
        ]);

        $invitation = Invitation::create([
            'email'      => $request->email,
            'role'       => $request->role,
            'token'      => Str::random(64),
            'invited_by' => Auth::id(),
            'expires_at' => now()->addDays(7),
        ]);

        Mail::to($invitation->email)->queue(new InvitationMail($invitation));

        return back()->with('success', "Invitation sent to {$invitation->email}.");
    }

    public function accept(string $token): View|RedirectResponse
    {
        $invitation = Invitation::valid()->where('token', $token)
            ->with('application')
            ->first();

        if (! $invitation) {
            return redirect()->route('login')
                ->withErrors(['token' => 'This invitation link is invalid or has expired.']);
        }

        return view('auth.accept-invite', compact('invitation', 'token'));
    }

    public function register(Request $request, string $token): RedirectResponse
    {
        $invitation = Invitation::valid()->where('token', $token)
            ->with('application')
            ->first();

        if (! $invitation) {
            return redirect()->route('login')
                ->withErrors(['token' => 'This invitation link is invalid or has expired.']);
        }

        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name'              => $request->name,
            'email'             => $invitation->email,
            'password'          => Hash::make($request->password),
            'email_verified_at' => now(),
            'phone'             => $invitation->application?->mother_cell,
        ]);

        $user->assignRole($invitation->role);

        $invitation->update(['accepted_at' => now()]);

        // ── Back-fill application.parent_user_id ────────────────────────
        if ($invitation->application_id && $invitation->application) {
            $invitation->application->update(['parent_user_id' => $user->id]);

            // ── Create child user from application data ─────────────────
            if ($invitation->application->status === 'approved') {
                $invitation->application->createChildUser();
            }
        }

        Auth::login($user);

        // Send welcome/onboarding email to new parents
        if ($invitation->role === 'parent') {
            try {
                Mail::to($user->email)->send(new OnboardingMail($user));
            } catch (\Exception $e) {
                Log::error('OnboardingMail failed', ['user' => $user->id, 'error' => $e->getMessage()]);
            }
        }

        return match ($invitation->role) {
            'admin'   => redirect()->route('admin.dashboard'),
            'teacher' => redirect()->route('teacher.dashboard'),
            'child'   => redirect()->route('child.dashboard'),
            default   => redirect()->route('parent.dashboard'),
        };
    }
}
