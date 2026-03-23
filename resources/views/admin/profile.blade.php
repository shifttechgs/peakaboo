@extends('layouts.admin')

@section('title', 'My Profile')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Admin</a>
    <span class="separator"><i class="fas fa-chevron-right"></i></span>
    <span class="current">Profile</span>
@endsection

@push('styles')
<style>
    .profile-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
    }
    @media (max-width: 768px) {
        .profile-grid { grid-template-columns: 1fr; }
    }

    .profile-card {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #eaedf0;
        overflow: hidden;
    }

    .profile-card-header {
        padding: 20px 24px 16px;
        border-bottom: 1px solid #f1f3f5;
    }
    .profile-card-header h3 {
        font-size: .9375rem;
        font-weight: 700;
        color: var(--text);
        margin: 0 0 2px;
    }
    .profile-card-header p {
        font-size: .8125rem;
        color: var(--text-secondary);
        margin: 0;
    }

    .profile-card-body {
        padding: 24px;
    }

    /* avatar section */
    .profile-avatar-section {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 28px;
        padding-bottom: 24px;
        border-bottom: 1px solid #f1f3f5;
    }
    .profile-avatar {
        width: 64px;
        height: 64px;
        border-radius: 16px;
        background: linear-gradient(135deg, var(--primary) 0%, #00B4D8 100%);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 700;
        flex-shrink: 0;
    }
    .profile-avatar-info h4 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--text);
        margin: 0 0 2px;
    }
    .profile-avatar-info span {
        font-size: .8125rem;
        color: var(--text-secondary);
    }
    .profile-avatar-info .role-badge {
        display: inline-block;
        padding: 2px 10px;
        border-radius: 6px;
        font-size: .7rem;
        font-weight: 600;
        background: #f0f7ff;
        color: var(--primary);
        margin-top: 4px;
    }

    /* form */
    .pf-group {
        margin-bottom: 20px;
    }
    .pf-label {
        display: block;
        font-size: .8125rem;
        font-weight: 500;
        color: var(--text);
        margin-bottom: 6px;
    }
    .pf-input {
        display: block;
        width: 100%;
        height: 42px;
        padding: 0 12px;
        font-family: inherit;
        font-size: .875rem;
        color: var(--text);
        background: #fff;
        border: 1px solid #e3e5e8;
        border-radius: 8px;
        outline: none;
        transition: border-color .15s, box-shadow .15s;
    }
    .pf-input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(0,119,182,.08);
    }
    .pf-input::placeholder {
        color: #a3acb9;
    }
    .pf-input[readonly] {
        background: var(--bg);
        color: var(--text-secondary);
        cursor: default;
    }

    .pf-input-wrap {
        position: relative;
    }
    .pf-input-wrap .pf-input {
        padding-right: 42px;
    }
    .pf-pw-toggle {
        position: absolute;
        right: 1px;
        top: 1px;
        bottom: 1px;
        width: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: none;
        border: none;
        cursor: pointer;
        color: #a3acb9;
        border-radius: 0 7px 7px 0;
        transition: color .15s;
    }
    .pf-pw-toggle:hover { color: var(--text-secondary); }
    .pf-pw-toggle svg { width: 16px; height: 16px; }
    .pf-pw-toggle .eye-off { display: none; }
    .pf-pw-toggle.active .eye-on { display: none; }
    .pf-pw-toggle.active .eye-off { display: block; }

    .pf-hint {
        font-size: .75rem;
        color: #a3acb9;
        margin-top: 6px;
    }

    .pf-save {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 9px 20px;
        font-family: inherit;
        font-size: .84rem;
        font-weight: 600;
        color: #fff;
        background: var(--primary);
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background .15s, box-shadow .15s;
    }
    .pf-save:hover {
        background: var(--primary-dark);
        box-shadow: 0 4px 12px rgba(0,119,182,.2);
    }

    /* meta info */
    .profile-meta {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .profile-meta-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: .8125rem;
    }
    .profile-meta-item .label {
        color: var(--text-secondary);
    }
    .profile-meta-item .value {
        font-weight: 600;
        color: var(--text);
    }
</style>
@endpush

@section('content')
<div class="page-title">
    <h1>My Profile</h1>
    <p>Manage your personal information and security settings.</p>
</div>

{{-- Avatar section --}}
<div class="profile-card mb-4">
    <div class="profile-card-body">
        <div class="profile-avatar-section" style="margin-bottom:0; padding-bottom:0; border-bottom:none;">
            <div class="profile-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
            <div class="profile-avatar-info">
                <h4>{{ $user->name }}</h4>
                <span>{{ $user->email }}</span>
                <br>
                <span class="role-badge">{{ ucfirst($user->getRoleNames()->first() ?? 'User') }}</span>
            </div>
        </div>
    </div>
</div>

<div class="profile-grid">
    {{-- Personal Information --}}
    <div class="profile-card">
        <div class="profile-card-header">
            <h3>Personal Information</h3>
            <p>Update your name, email, and phone number.</p>
        </div>
        <div class="profile-card-body">
            <form method="POST" action="{{ route('admin.profile.update') }}">
                @csrf
                @method('PUT')

                <div class="pf-group">
                    <label class="pf-label" for="name">Full name</label>
                    <input type="text" id="name" name="name" class="pf-input"
                        value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="pf-hint" style="color:var(--danger);">{{ $message }}</div>
                    @enderror
                </div>

                <div class="pf-group">
                    <label class="pf-label" for="email">Email address</label>
                    <input type="email" id="email" name="email" class="pf-input"
                        value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="pf-hint" style="color:var(--danger);">{{ $message }}</div>
                    @enderror
                </div>

                <div class="pf-group">
                    <label class="pf-label" for="phone">Phone number</label>
                    <input type="text" id="phone" name="phone" class="pf-input"
                        placeholder="e.g. 012 345 6789"
                        value="{{ old('phone', $user->phone) }}">
                    @error('phone')
                        <div class="pf-hint" style="color:var(--danger);">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="pf-save">
                    <i class="fas fa-check" style="font-size:.75rem;"></i> Save changes
                </button>
            </form>
        </div>
    </div>

    {{-- Change Password --}}
    <div class="profile-card">
        <div class="profile-card-header">
            <h3>Change Password</h3>
            <p>Ensure your account uses a strong password.</p>
        </div>
        <div class="profile-card-body">
            <form method="POST" action="{{ route('admin.profile.password') }}">
                @csrf
                @method('PUT')

                <div class="pf-group">
                    <label class="pf-label" for="current_password">Current password</label>
                    <div class="pf-input-wrap">
                        <input type="password" id="current_password" name="current_password" class="pf-input"
                            placeholder="Enter current password" required>
                        <button type="button" class="pf-pw-toggle" aria-label="Toggle password visibility">
                            <svg class="eye-on" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            <svg class="eye-off" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                        </button>
                    </div>
                    @error('current_password')
                        <div class="pf-hint" style="color:var(--danger);">{{ $message }}</div>
                    @enderror
                </div>

                <div class="pf-group">
                    <label class="pf-label" for="password">New password</label>
                    <div class="pf-input-wrap">
                        <input type="password" id="password" name="password" class="pf-input"
                            placeholder="At least 8 characters" required minlength="8">
                        <button type="button" class="pf-pw-toggle" aria-label="Toggle password visibility">
                            <svg class="eye-on" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            <svg class="eye-off" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                        </button>
                    </div>
                    @error('password')
                        <div class="pf-hint" style="color:var(--danger);">{{ $message }}</div>
                    @enderror
                </div>

                <div class="pf-group">
                    <label class="pf-label" for="password_confirmation">Confirm new password</label>
                    <div class="pf-input-wrap">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="pf-input"
                            placeholder="Re-enter new password" required>
                        <button type="button" class="pf-pw-toggle" aria-label="Toggle password visibility">
                            <svg class="eye-on" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            <svg class="eye-off" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="pf-save">
                    <i class="fas fa-lock" style="font-size:.75rem;"></i> Update password
                </button>
            </form>
        </div>
    </div>
</div>

{{-- Account Details --}}
<div class="profile-card mt-4" style="max-width:480px;">
    <div class="profile-card-header">
        <h3>Account Details</h3>
    </div>
    <div class="profile-card-body">
        <div class="profile-meta">
            <div class="profile-meta-item">
                <span class="label">User ID</span>
                <span class="value">#{{ $user->id }}</span>
            </div>
            <div class="profile-meta-item">
                <span class="label">Role</span>
                <span class="value">{{ ucfirst($user->getRoleNames()->first() ?? 'User') }}</span>
            </div>
            <div class="profile-meta-item">
                <span class="label">Member since</span>
                <span class="value">{{ $user->created_at->format('d M Y') }}</span>
            </div>
            <div class="profile-meta-item">
                <span class="label">Last updated</span>
                <span class="value">{{ $user->updated_at->format('d M Y, H:i') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.pf-pw-toggle').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var input = btn.parentElement.querySelector('.pf-input');
            var isActive = btn.classList.toggle('active');
            input.type = isActive ? 'text' : 'password';
        });
    });
</script>
@endpush

