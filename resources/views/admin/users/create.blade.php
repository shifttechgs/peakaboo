@extends('layouts.admin')

@section('title', 'Create User')

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
</style>
@endpush

@section('content')

{{-- ── Page Header ──────────────────────────────────────────────────── --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-user-plus me-2" style="color:#0077B6;font-size:1.1rem;"></i>Create User
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Add a new portal user and assign their role</p>
    </div>
    <a href="{{ route('admin.users.index') }}"
       class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#6c757d;">
        <i class="fas fa-arrow-left me-1"></i>Back to Users
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="uf-card">
            <div class="uf-card-header">
                <div class="uf-card-header-icon"><i class="fas fa-user-circle"></i></div>
                <div>
                    <div style="font-weight:700;font-size:.95rem;color:#1a1f2e;">New User Details</div>
                    <div style="font-size:.78rem;color:#94a3b8;">Fields marked <span style="color:#ef4444;">*</span> are required</div>
                </div>
            </div>
            <div class="uf-card-body">
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf

                    {{-- ── Identity ── --}}
                    <div class="uf-section-label">Identity</div>
                    <div class="mb-4">
                        <label class="uf-label">Full Name <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="name" class="uf-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" placeholder="e.g. Jane Smith" required>
                        @error('name')
                            <div style="font-size:.76rem;color:#ef4444;margin-top:4px;"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="uf-label">Email Address <span style="color:#ef4444;">*</span></label>
                        <input type="email" name="email" class="uf-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" placeholder="jane@example.com" required>
                        @error('email')
                            <div style="font-size:.76rem;color:#ef4444;margin-top:4px;"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- ── Password ── --}}
                    <div class="uf-section-label">Password</div>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="uf-label">Password <span style="color:#ef4444;">*</span></label>
                            <input type="password" name="password" class="uf-control @error('password') is-invalid @enderror"
                                   placeholder="Min. 8 characters" required>
                            @error('password')
                                <div style="font-size:.76rem;color:#ef4444;margin-top:4px;"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="uf-label">Confirm Password <span style="color:#ef4444;">*</span></label>
                            <input type="password" name="password_confirmation" class="uf-control" required>
                        </div>
                    </div>

                    {{-- ── Role & Contact ── --}}
                    <div class="uf-section-label">Role &amp; Contact</div>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="uf-label">Role <span style="color:#ef4444;">*</span></label>
                            <select name="role" class="uf-control @error('role') is-invalid @enderror" required>
                                <option value="">— Select role —</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role }}" {{ old('role') === $role ? 'selected' : '' }}>
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
                                   value="{{ old('phone') }}" placeholder="+60 12-345 6789">
                            @error('phone')
                                <div style="font-size:.76rem;color:#ef4444;margin-top:4px;"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="uf-divider">

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-sm rounded-pill px-4 text-white" style="background:#0077B6;padding:10px 20px;">
                            <i class="fas fa-user-plus me-2"></i>Create User
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
