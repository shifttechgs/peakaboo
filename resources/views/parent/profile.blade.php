@extends('layouts.portal')

@section('title', 'Profile')
@section('portal-name', 'Parent Portal')
@section('page-title', 'My Profile')

@section('sidebar-nav')
@include('parent.partials.sidebar')
@endsection

@push('styles')
<style>
/* ─── Micro label ──────────────────────────────────────────────────────── */
.micro-label {
    font-size:.63rem; font-weight:800; text-transform:uppercase;
    letter-spacing:1.1px; color:#adb5bd; margin-bottom:12px;
}

/* ─── Panel ────────────────────────────────────────────────────────────── */
.panel {
    background:#fff; border-radius:16px;
    box-shadow:0 1px 8px rgba(0,0,0,.06);
    border:1px solid #f0f0f0; overflow:hidden; margin-bottom:24px;
}
.panel-header {
    padding:15px 22px; border-bottom:1px solid #f3f4f6;
    display:flex; align-items:center; justify-content:space-between;
}
.panel-header h6 { margin:0; font-weight:700; font-size:.9rem; color:#1a1f2e; }

/* ─── Avatar ────────────────────────────────────────────────────────────── */
.profile-avatar {
    width:72px; height:72px; border-radius:18px;
    background:linear-gradient(135deg,#0077B6,#00B4D8);
    display:flex; align-items:center; justify-content:center;
    font-size:1.8rem; font-weight:800; color:#fff;
    box-shadow:0 4px 16px rgba(0,119,182,.25); flex-shrink:0;
}

/* ─── Form fields ──────────────────────────────────────────────────────── */
.field-lbl {
    font-size:.72rem; font-weight:700; text-transform:uppercase;
    letter-spacing:.5px; color:#94a3b8; margin-bottom:5px;
}
.form-control-premium {
    border:1.5px solid #e0eeff; border-radius:10px;
    font-size:.875rem; padding:9px 13px; color:#1a1f2e;
    transition:border-color .15s, box-shadow .15s;
}
.form-control-premium:focus {
    border-color:#0077B6; box-shadow:0 0 0 3px rgba(0,119,182,.08);
    outline:none;
}
.form-control-premium::placeholder { color:#cbd5e1; }

/* ─── Stat tiles ───────────────────────────────────────────────────────── */
.stat-row { display:flex; border-top:1px solid #f3f4f6; }
.stat-tile {
    flex:1; padding:16px 18px; text-align:center;
    border-right:1px solid #f3f4f6;
}
.stat-tile:last-child { border-right:none; }
.st-val { font-size:1.4rem; font-weight:800; color:#1a1f2e; line-height:1; }
.st-lbl { font-size:.64rem; font-weight:700; text-transform:uppercase;
          letter-spacing:.5px; color:#94a3b8; margin-top:4px; }
.st-val.good { color:#16a34a; }
.st-val.bad  { color:#ef4444; }

/* ─── Info row ─────────────────────────────────────────────────────────── */
.info-row {
    display:flex; align-items:center; gap:12px;
    padding:11px 22px; border-bottom:1px solid #f9fafb;
    font-size:.84rem;
}
.info-row:last-child { border-bottom:none; }
.info-icon {
    width:32px; height:32px; border-radius:9px;
    display:flex; align-items:center; justify-content:center;
    font-size:.78rem; flex-shrink:0;
    background:#f0f9ff; color:#0077B6;
}
.info-lbl { font-size:.7rem; font-weight:700; text-transform:uppercase;
            letter-spacing:.4px; color:#94a3b8; }
.info-val { font-size:.86rem; font-weight:600; color:#1a1f2e; }

/* ─── Quick action link ────────────────────────────────────────────────── */
.qa-link {
    display:flex; align-items:center; gap:12px;
    padding:12px 18px; border-radius:12px;
    text-decoration:none; color:#374151; font-size:.84rem;
    font-weight:600; transition:background .12s;
    border:1.5px solid #f0f0f0;
}
.qa-link:hover { background:#f0f9ff; border-color:#bae6fd; color:#0077B6; }
.qa-icon {
    width:34px; height:34px; border-radius:9px;
    display:flex; align-items:center; justify-content:center;
    font-size:.8rem; flex-shrink:0; background:#f0f9ff; color:#0077B6;
}
</style>
@endpush

@section('content')

{{-- ── Page header ──────────────────────────────────────────────────────── --}}
<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <div style="font-size:1.1rem;font-weight:800;color:#1a1f2e;letter-spacing:-.2px;">My Profile</div>
        <div style="font-size:.82rem;color:#94a3b8;margin-top:2px;">Manage your account details and security</div>
    </div>
    <a href="{{ route('parent.dashboard') }}"
       class="btn btn-sm rounded-pill px-3"
       style="background:#f0f9ff;color:#0077B6;border:1.5px solid #bae6fd;font-weight:600;font-size:.8rem;">
        <i class="fas fa-arrow-left me-1"></i> Dashboard
    </a>
</div>

@if(session('success'))
<div class="alert border-0 rounded-3 mb-4" style="background:#f0fdf4;color:#16a34a;font-size:.84rem;font-weight:600;padding:12px 18px;">
    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
</div>
@endif
@if($errors->any())
<div class="alert border-0 rounded-3 mb-4" style="background:#fef2f2;color:#ef4444;font-size:.84rem;font-weight:600;padding:12px 18px;">
    <i class="fas fa-exclamation-circle me-2"></i>{{ $errors->first() }}
</div>
@endif

<div class="row g-4">

    {{-- ── Left column ──────────────────────────────────────────────────── --}}
    <div class="col-lg-8">

        {{-- Profile hero --}}
        <div class="panel" style="overflow:visible;">
            <div style="height:5px;background:linear-gradient(90deg,#0077B6,#00B4D8,#FFB5BA);border-radius:16px 16px 0 0;"></div>
            <div style="padding:22px 24px;display:flex;align-items:center;gap:20px;">
                <div class="profile-avatar">{{ strtoupper(mb_substr($parent->name, 0, 1)) }}</div>
                <div class="flex-grow-1">
                    <div style="font-size:1.1rem;font-weight:800;color:#1a1f2e;letter-spacing:-.2px;">{{ $parent->name }}</div>
                    <div style="font-size:.8rem;color:#94a3b8;margin-top:2px;">{{ $parent->email }}</div>
                    <div style="margin-top:8px;display:flex;gap:8px;flex-wrap:wrap;">
                        <span style="font-size:.67rem;font-weight:700;background:#f0f9ff;color:#0077B6;border-radius:999px;padding:3px 11px;border:1px solid #bae6fd;">
                            <i class="fas fa-user me-1"></i> Parent
                        </span>
                        <span style="font-size:.67rem;font-weight:700;background:#dcfce7;color:#16a34a;border-radius:999px;padding:3px 11px;">
                            <i class="fas fa-check-circle me-1"></i> Active
                        </span>
                        <span style="font-size:.67rem;font-weight:700;background:#f8faff;color:#64748b;border-radius:999px;padding:3px 11px;border:1px solid #e2e8f0;">
                            <i class="fas fa-calendar me-1"></i> Member since {{ $parent->created_at->format('M Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Personal information --}}
        <div class="micro-label"><i class="fas fa-user me-1"></i> Personal Information</div>
        <div class="panel">
            <div class="panel-header">
                <h6>Account Details</h6>
                <span style="font-size:.73rem;color:#94a3b8;">Changes apply immediately</span>
            </div>
            <div style="padding:22px 24px;">
                <form method="POST" action="{{ route('parent.profile.update') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="field-lbl">Full Name</div>
                            <input type="text" name="name"
                                   class="form-control form-control-premium @error('name') is-invalid @enderror"
                                   value="{{ old('name', $parent->name) }}" required>
                            @error('name')<div class="invalid-feedback" style="font-size:.74rem;">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <div class="field-lbl">Email Address</div>
                            <input type="email" name="email"
                                   class="form-control form-control-premium @error('email') is-invalid @enderror"
                                   value="{{ old('email', $parent->email) }}" required>
                            @error('email')<div class="invalid-feedback" style="font-size:.74rem;">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <div class="field-lbl">Phone Number</div>
                            <input type="tel" name="phone"
                                   class="form-control form-control-premium @error('phone') is-invalid @enderror"
                                   value="{{ old('phone', $parent->phone) }}"
                                   placeholder="e.g. 082 123 4567">
                            @error('phone')<div class="invalid-feedback" style="font-size:.74rem;">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 pt-1">
                            <button type="submit"
                                    class="btn btn-sm rounded-pill px-4"
                                    style="background:#0077B6;color:#fff;border:none;font-weight:600;font-size:.84rem;">
                                <i class="fas fa-save me-1"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Change password --}}
        <div class="micro-label"><i class="fas fa-lock me-1"></i> Security</div>
        <div class="panel">
            <div class="panel-header">
                <h6>Change Password</h6>
            </div>
            <div style="padding:22px 24px;">
                <form method="POST" action="{{ route('parent.profile.update') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="field-lbl">Current Password</div>
                            <input type="password" name="current_password"
                                   class="form-control form-control-premium"
                                   placeholder="Enter current password">
                        </div>
                        <div class="col-md-6">
                            <div class="field-lbl">New Password</div>
                            <input type="password" name="password"
                                   class="form-control form-control-premium"
                                   placeholder="Min. 8 characters">
                        </div>
                        <div class="col-md-6">
                            <div class="field-lbl">Confirm New Password</div>
                            <input type="password" name="password_confirmation"
                                   class="form-control form-control-premium"
                                   placeholder="Repeat new password">
                        </div>
                        <div class="col-12 pt-1">
                            <button type="submit"
                                    class="btn btn-sm rounded-pill px-4"
                                    style="background:#f8faff;color:#374151;border:1.5px solid #e2e8f0;font-weight:600;font-size:.84rem;">
                                <i class="fas fa-key me-1"></i> Update Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    {{-- ── Right column ─────────────────────────────────────────────────── --}}
    <div class="col-lg-4">

        {{-- Account overview --}}
        <div class="micro-label"><i class="fas fa-chart-pie me-1"></i> Account Overview</div>
        <div class="panel" style="margin-bottom:24px;">
            <div style="padding:18px 22px 14px;">
                <div style="font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:#94a3b8;margin-bottom:2px;">Account</div>
                <div style="font-size:.92rem;font-weight:800;color:#1a1f2e;">{{ $parent->name }}</div>
            </div>
            <div class="stat-row">
                <div class="stat-tile">
                    <div class="st-val">{{ $children->where('status','approved')->count() }}</div>
                    <div class="st-lbl">Enrolled</div>
                </div>
                <div class="stat-tile">
                    <div class="st-val">{{ $children->whereIn('status',['pending','under_review'])->count() }}</div>
                    <div class="st-lbl">Pending</div>
                </div>
                <div class="stat-tile">
                    <div class="st-val">{{ $children->count() }}</div>
                    <div class="st-lbl">Total</div>
                </div>
            </div>
        </div>

        {{-- Enrolled children --}}
        @if($children->count())
        <div class="micro-label"><i class="fas fa-child me-1"></i> My Children</div>
        <div class="panel">
            @foreach($children as $child)
            <div class="info-row">
                <div class="info-icon">{{ strtoupper(mb_substr($child['name'], 0, 1)) }}</div>
                <div class="flex-grow-1">
                    <div class="info-val">{{ $child['name'] }}</div>
                    @if($child['child_number'])
                        <div class="info-lbl"><code style="font-size:.7rem;color:#0077B6;">{{ $child['child_number'] }}</code></div>
                    @endif
                </div>
                <span style="font-size:.67rem;font-weight:700;border-radius:999px;padding:3px 9px;
                      background:{{ $child['status']==='approved' ? '#dcfce7' : '#fff7ed' }};
                      color:{{ $child['status']==='approved' ? '#16a34a' : '#d97706' }};">
                    {{ $child['status_label'] }}
                </span>
            </div>
            @endforeach
        </div>
        @endif

        {{-- Quick actions --}}
        <div class="micro-label"><i class="fas fa-bolt me-1"></i> Quick Actions</div>
        <div style="display:flex;flex-direction:column;gap:10px;">
            <a href="{{ route('parent.fees.statements') }}" class="qa-link">
                <div class="qa-icon"><i class="fas fa-receipt"></i></div>
                View Statement
            </a>
            <a href="{{ route('parent.documents') }}" class="qa-link">
                <div class="qa-icon"><i class="fas fa-folder-open"></i></div>
                Document Vault
            </a>
            <a href="{{ route('parent.children') }}" class="qa-link">
                <div class="qa-icon"><i class="fas fa-child"></i></div>
                My Children
            </a>
        </div>

    </div>
</div>

@endsection
