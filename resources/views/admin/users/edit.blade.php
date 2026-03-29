@extends('layouts.admin')

@section('title', 'Edit User')

@push('styles')
<style>
.uf-card {
    background:#fff; border-radius:16px;
    box-shadow:0 1px 8px rgba(0,0,0,.07);
    border:1px solid #f0f0f0; overflow:hidden;
}
.uf-card-header {
    padding:20px 28px 18px;
    border-bottom:1px solid #f3f4f6;
    display:flex; align-items:center; gap:12px;
}
.uf-card-header-icon {
    width:40px; height:40px; border-radius:10px;
    background:#eff6ff; display:flex; align-items:center; justify-content:center;
    font-size:1rem; color:#3b82f6; flex-shrink:0;
}
.uf-card-body { padding:28px; }
.uf-label {
    font-size:.7rem; font-weight:700; text-transform:uppercase;
    letter-spacing:.5px; color:#94a3b8; margin-bottom:6px; display:block;
}
.uf-control {
    font-size:.87rem; border:1px solid #e5e7eb; border-radius:10px;
    padding:10px 14px; background:#fafafa; color:#374151;
    transition:border-color .2s,box-shadow .2s; width:100%;
}
.uf-control:focus {
    border-color:#0077B6; box-shadow:0 0 0 3px rgba(0,119,182,.08);
    background:#fff; outline:none;
}
.uf-control.is-invalid { border-color:#ef4444; }
.uf-divider { border-color:#f3f4f6; margin:24px 0; }
.uf-section-label {
    font-size:.7rem; font-weight:700; text-transform:uppercase;
    letter-spacing:.5px; color:#cbd5e1; margin-bottom:20px;
    display:flex; align-items:center; gap:8px;
}
.uf-section-label::after {
    content:''; flex:1; height:1px; background:#f3f4f6;
}
.uf-hint { font-size:.75rem; color:#94a3b8; margin-top:5px; }
</style>
@endpush

@section('content')

{{-- ── Page Header ──────────────────────────────────────────────────── --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-user-edit me-2" style="color:#0077B6;font-size:1.1rem;"></i>Edit User
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Updating details for <strong style="color:#1a1f2e;">{{ $user->name }}</strong></p>
    </div>
    <a href="{{ route('admin.users.index') }}"
       class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#6c757d;">
        <i class="fas fa-arrow-left me-1"></i>Back to Users
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-7">

        {{-- ── User identity badge ── --}}
        @php
            $roleColors = ['admin'=>'#ef4444','teacher'=>'#0097a7','parent'=>'#16a34a','child'=>'#d97706','super_admin'=>'#1a1f2e'];
            $currentRole = $user->getRoleNames()->first() ?? 'parent';
            $badgeBg = $roleColors[$currentRole] ?? '#6c757d';
        @endphp
        <div style="background:#fff;border-radius:16px;border:1px solid #f0f0f0;padding:16px 22px;margin-bottom:16px;display:flex;align-items:center;gap:14px;box-shadow:0 1px 8px rgba(0,0,0,.05);">
            <div style="width:44px;height:44px;border-radius:50%;background:{{ $badgeBg }};display:flex;align-items:center;justify-content:center;font-size:.9rem;font-weight:800;color:#fff;flex-shrink:0;">
                {{ strtoupper(substr($user->name,0,1)) }}
            </div>
            <div>
                <div style="font-weight:700;color:#1a1f2e;font-size:.95rem;">{{ $user->name }}</div>
                <div style="font-size:.77rem;color:#94a3b8;">{{ $user->email }} · Joined {{ $user->created_at->format('d M Y') }}</div>
            </div>
            <span style="margin-left:auto;font-size:.68rem;font-weight:700;border-radius:20px;padding:4px 12px;background:{{ $badgeBg }};color:#fff;">
                {{ ucfirst(str_replace('_',' ',$currentRole)) }}
            </span>
        </div>

        <div class="uf-card">
            <div class="uf-card-header">
                <div class="uf-card-header-icon"><i class="fas fa-user-edit"></i></div>
                <div>
                    <div style="font-weight:700;font-size:.95rem;color:#1a1f2e;">Update User Details</div>
                    <div style="font-size:.78rem;color:#94a3b8;">Fields marked <span style="color:#ef4444;">*</span> are required</div>
                </div>
            </div>
            <div class="uf-card-body">
                <form method="POST" action="{{ route('admin.users.update', $user) }}">
                    @csrf
                    @method('PUT')

                    {{-- ── Identity ── --}}
                    <div class="uf-section-label">Identity</div>
                    <div class="mb-4">
                        <label class="uf-label">Full Name <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="name" class="uf-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div style="font-size:.76rem;color:#ef4444;margin-top:4px;"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="uf-label">Email Address <span style="color:#ef4444;">*</span></label>
                        <input type="email" name="email" class="uf-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div style="font-size:.76rem;color:#ef4444;margin-top:4px;"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- ── Password ── --}}
                    @if(in_array($currentRole, ['parent', 'child']))
                    {{-- Parents & children manage their own passwords -- admin sends a reset link instead --}}
                    <div class="uf-section-label">Password</div>
                    <div class="mb-4">
                        <div style="background:#fafafa;border:1px solid #e5e7eb;border-radius:12px;padding:14px 18px;display:flex;align-items:center;gap:14px;">
                            <div style="width:36px;height:36px;border-radius:10px;background:#eff6ff;color:#3b82f6;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="fas fa-lock" style="font-size:.85rem;"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div style="font-size:.84rem;font-weight:600;color:#374151;">Password managed by user</div>
                                <div style="font-size:.75rem;color:#94a3b8;">Admins cannot view or set passwords for parents and children. Send a reset link instead.</div>
                            </div>
                            <a href="{{ route('password.email') }}?email={{ urlencode($user->email) }}"
                               class="btn btn-sm rounded-pill px-3" style="background:#eff6ff;color:#3b82f6;border:1px solid #bfdbfe;font-size:.76rem;white-space:nowrap;">
                                <i class="fas fa-envelope me-1"></i>Send Reset Link
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="uf-section-label">Change Password</div>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="uf-label">New Password</label>
                            <input type="password" name="password" class="uf-control @error('password') is-invalid @enderror"
                                   placeholder="Leave blank to keep current">
                            @error('password')
                                <div style="font-size:.76rem;color:#ef4444;margin-top:4px;"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="uf-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="uf-control"
                                   placeholder="Leave blank to keep current">
                        </div>
                    </div>
                    @endif

                    {{-- ── Role & Contact ── --}}
                    <div class="uf-section-label">Role &amp; Contact</div>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="uf-label">Role <span style="color:#ef4444;">*</span></label>
                            <select name="role" class="uf-control @error('role') is-invalid @enderror" required>
                                <option value="">— Select role —</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role }}"
                                        {{ old('role', $user->getRoleNames()->first()) === $role ? 'selected' : '' }}>
                                        {{ ucfirst(str_replace('_',' ',$role)) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <div style="font-size:.76rem;color:#ef4444;margin-top:4px;"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="uf-label">Phone <span style="color:#94a3b8;">(optional)</span></label>
                            <input type="text" name="phone" class="uf-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone', $user->phone) }}" placeholder="+60 12-345 6789">
                            @error('phone')
                                <div style="font-size:.76rem;color:#ef4444;margin-top:4px;"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="uf-divider">

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-sm rounded-pill px-4 text-white" style="background:#0077B6;padding:10px 20px;">
                            <i class="fas fa-save me-2"></i>Save Changes
                        </button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-sm rounded-pill px-4" style="background:#f3f4f6;color:#6c757d;padding:10px 20px;">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
