@extends('layouts.admin')

@section('title', 'Parent Portal — ' . $parent->name)

@push('styles')
<style>
.ppv-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 20px;
}
.ppv-panel.accent-blue   { border-left: 3px solid #3b82f6; }
.ppv-panel.accent-green  { border-left: 3px solid #16a34a; }
.ppv-panel.accent-violet { border-left: 3px solid #7c3aed; }
.ppv-panel.accent-teal   { border-left: 3px solid #0097a7; }
.ppv-panel.accent-amber  { border-left: 3px solid #d97706; }
.ppv-panel.accent-red    { border-left: 3px solid #ef4444; }
.ppv-panel-header {
    padding: 15px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.ppv-panel-header h6 { margin: 0; font-weight: 700; font-size: .88rem; color: #1a1f2e; }
.ppv-panel-body { padding: 22px; }
.ppv-field-label { font-size:.67rem;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:#adb5bd;margin-bottom:3px; }
.ppv-field-val   { font-size:.88rem;color:#1a1f2e;font-weight:600; }
.ppv-field-val a { color:#0077B6;text-decoration:none; }
.ppv-field-val a:hover { text-decoration:underline; }
.ppv-divider     { height:1px;background:#f3f4f6;margin:18px 0; }
.ppv-section-label { font-size:.64rem;font-weight:800;text-transform:uppercase;letter-spacing:1px;color:#adb5bd;margin-bottom:14px; }
.ppv-pill { font-size:.7rem;font-weight:700;border-radius:20px;padding:3px 10px;display:inline-block; }
.ppv-btn {
    display:flex;align-items:center;justify-content:center;gap:8px;
    width:100%;padding:11px 16px;border-radius:10px;
    font-size:.84rem;font-weight:700;cursor:pointer;
    border:none;transition:all .2s;text-decoration:none;margin-bottom:8px;
}
.ppv-btn:last-child { margin-bottom:0; }
.ppv-btn-primary { background:#0077B6;color:#fff; }
.ppv-btn-primary:hover { background:#005f93;color:#fff; }
.ppv-btn-violet  { background:#7c3aed;color:#fff; }
.ppv-btn-violet:hover  { background:#6d28d9;color:#fff; }
.ppv-btn-success { background:#16a34a;color:#fff; }
.ppv-btn-success:hover { background:#15803d;color:#fff; }
.ppv-btn-danger  { background:#fef2f2;color:#ef4444;border:1.5px solid #fca5a5; }
.ppv-btn-danger:hover  { background:#fee2e2; }
.ppv-btn-ghost   { background:#f3f4f6;color:#374151;border:1.5px solid #e5e7eb; }
.ppv-btn-ghost:hover   { background:#e5e7eb; }
.ppv-app-row {
    display:flex;align-items:center;gap:14px;
    padding:13px 0;border-bottom:1px solid #f8f8f8;
}
.ppv-app-row:last-child { border-bottom:none; }
.ppv-timeline { position:relative;padding-left:28px; }
.ppv-timeline::before {
    content:'';position:absolute;left:6px;top:6px;bottom:6px;
    width:2px;background:#f3f4f6;
}
.ppv-tl-item { position:relative;padding-bottom:18px; }
.ppv-tl-item:last-child { padding-bottom:0; }
.ppv-tl-dot {
    position:absolute;left:-26px;top:4px;
    width:12px;height:12px;border-radius:50%;
    border:2px solid transparent;
}
.ppv-tl-label { font-size:.82rem;font-weight:600;color:#1a1f2e; }
.ppv-tl-label.muted { color:#adb5bd;font-weight:500; }
.ppv-tl-meta  { font-size:.72rem;color:#adb5bd;margin-top:1px; }
.ppv-invite-block {
    background:#f5f3ff;border:1px solid #ede9fe;border-radius:12px;
    padding:16px;display:flex;align-items:flex-start;gap:12px;
}
</style>
@endpush

@section('content')

{{-- Breadcrumb + Header --}}
<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <ul style="list-style:none;padding:0;margin:0 0 8px;display:flex;gap:6px;font-size:.76rem;color:#adb5bd;">
            <li><a href="{{ route('admin.parent-portal.index') }}" style="color:#0077B6;text-decoration:none;">Parent Portal</a></li>
            <li>/ {{ $parent->name }}</li>
        </ul>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            {{ $parent->name }}
            <span class="ppv-pill ms-2"
                  style="background:{{ $parent->trashed() ? '#fee2e2' : '#dcfce7' }};color:{{ $parent->trashed() ? '#ef4444' : '#16a34a' }};font-size:.72rem;">
                {{ $parent->trashed() ? 'Deactivated' : 'Active' }}
            </span>
        </h4>
        <p style="font-size:.82rem;color:#adb5bd;margin:0;">
            Parent Portal Account &bull; {{ $parent->applications->count() }} application{{ $parent->applications->count() !== 1 ? 's' : '' }}
        </p>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        @if($parent->phone)
        @php $wa = '27' . ltrim(preg_replace('/[^0-9]/', '', $parent->phone), '0'); @endphp
        <a href="https://wa.me/{{ $wa }}" target="_blank"
           class="btn btn-sm rounded-pill px-3" style="background:#f0fdf4;color:#16a34a;border:1px solid #dcfce7;">
            <i class="fab fa-whatsapp me-1"></i>WhatsApp
        </a>
        @endif
        <a href="{{ route('admin.users.edit', $parent->id) }}"
           class="btn btn-sm btn-outline-primary rounded-pill px-3">
            <i class="fas fa-edit me-1"></i>Edit
        </a>
        <a href="{{ route('admin.parent-portal.index') }}"
           class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
            <i class="fas fa-arrow-left me-1"></i>Back
        </a>
    </div>
</div>

{{-- Flash --}}
@if(session('success'))
<div style="background:#f0fdf4;border:1px solid #86efac;border-radius:12px;padding:12px 18px;font-size:.84rem;color:#16a34a;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif
@if(session('error'))
<div style="background:#fef2f2;border:1px solid #fca5a5;border-radius:12px;padding:12px 18px;font-size:.84rem;color:#ef4444;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
</div>
@endif

<div class="row g-4">

    {{-- ── Left: Account Info + Enrolments + Timeline ──────────────────── --}}
    <div class="col-lg-7">

        {{-- Account Info --}}
        <div class="ppv-panel accent-blue">
            <div class="ppv-panel-header">
                <h6><i class="fas fa-user me-2" style="color:#3b82f6;"></i>Account Information</h6>
                <a href="{{ route('admin.users.edit', $parent->id) }}"
                   style="font-size:.76rem;color:#0077B6;text-decoration:none;">
                    <i class="fas fa-edit me-1"></i>Edit
                </a>
            </div>
            <div class="ppv-panel-body">
                <div class="ppv-section-label">Contact Details</div>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="ppv-field-label">Full Name</div>
                        <div class="ppv-field-val">{{ $parent->name }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ppv-field-label">Account Status</div>
                        <div class="ppv-field-val">
                            <span class="ppv-pill" style="background:{{ $parent->trashed() ? '#fee2e2' : '#dcfce7' }};color:{{ $parent->trashed() ? '#ef4444' : '#16a34a' }};">
                                {{ $parent->trashed() ? 'Deactivated' : 'Active' }}
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ppv-field-label">Email</div>
                        <div class="ppv-field-val"><a href="mailto:{{ $parent->email }}">{{ $parent->email }}</a></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ppv-field-label">Phone</div>
                        <div class="ppv-field-val">
                            @if($parent->phone)
                                <a href="tel:{{ $parent->phone }}">{{ $parent->phone }}</a>
                            @else
                                <span style="color:#d1d5db;">—</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="ppv-divider"></div>
                <div class="ppv-section-label">Portal Access</div>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="ppv-field-label">Email Verified</div>
                        <div class="ppv-field-val">
                            @if($parent->email_verified_at)
                                <span style="color:#16a34a;"><i class="fas fa-check-circle me-1"></i>{{ $parent->email_verified_at->format('d M Y') }}</span>
                            @else
                                <span style="color:#d97706;"><i class="fas fa-exclamation-circle me-1"></i>Not verified</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ppv-field-label">Role</div>
                        <div class="ppv-field-val">
                            <span class="ppv-pill" style="background:#f5f3ff;color:#7c3aed;">
                                {{ ucfirst($parent->roles->first()?->name ?? 'parent') }}
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ppv-field-label">Account Created</div>
                        <div class="ppv-field-val">{{ $parent->created_at->format('d F Y') }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ppv-field-label">User ID</div>
                        <div class="ppv-field-val" style="color:#adb5bd;">#{{ $parent->id }}</div>
                    </div>
                </div>

                {{-- Pending invitation notice --}}
                @if($pendingInvite)
                <div class="ppv-divider"></div>
                <div class="ppv-invite-block">
                    <div style="width:36px;height:36px;border-radius:10px;background:#7c3aed;color:#fff;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fas fa-envelope" style="font-size:.8rem;"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div style="font-size:.82rem;font-weight:700;color:#4c1d95;">Pending Invitation</div>
                        <div style="font-size:.76rem;color:#6d28d9;margin-top:2px;">
                            Sent to {{ $pendingInvite->email }} — expires {{ $pendingInvite->expires_at->format('d M Y') }}
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.parent-portal.resend-invite', $parent->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-sm rounded-pill px-3"
                                style="background:#7c3aed;color:#fff;border:none;font-size:.74rem;white-space:nowrap;">
                            <i class="fas fa-redo me-1"></i>Resend
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>

        {{-- Enrolment Applications --}}
        <div class="ppv-panel accent-teal">
            <div class="ppv-panel-header">
                <h6><i class="fas fa-file-alt me-2" style="color:#0097a7;"></i>Enrolment Applications</h6>
                <span class="ppv-pill" style="background:#e0f7fa;color:#0097a7;">{{ $parent->applications->count() }}</span>
            </div>
            <div class="ppv-panel-body" style="padding-top:8px;padding-bottom:8px;">
                @forelse($parent->applications as $app)
                @php
                    $stC = ['approved'=>['#dcfce7','#16a34a'],'rejected'=>['#fee2e2','#ef4444'],'pending'=>['#fff7ed','#d97706'],'under_review'=>['#f5f3ff','#7c3aed'],'waitlist'=>['#f3f4f6','#6c757d']];
                    [$stBg,$stClr] = $stC[$app->status] ?? ['#f3f4f6','#6c757d'];
                @endphp
                <div class="ppv-app-row">
                    <div style="width:38px;height:38px;border-radius:10px;background:#e0f7fa;color:#0097a7;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fas fa-child"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="fw-semibold" style="font-size:.88rem;color:#1a1f2e;">{{ $app->child_name }}</div>
                        <div style="font-size:.74rem;color:#adb5bd;margin-top:1px;">
                            {{ $app->program_name }} &middot; <code style="font-size:.72rem;color:#0077B6;">{{ $app->reference }}</code>
                        </div>
                    </div>
                    <div class="text-end me-2" style="flex-shrink:0;">
                        <span class="ppv-pill" style="background:{{ $stBg }};color:{{ $stClr }};">{{ $app->statusLabel() }}</span>
                        <div style="font-size:.7rem;color:#adb5bd;margin-top:3px;">{{ $app->start_date->format('d M Y') }}</div>
                    </div>
                    <div class="d-flex flex-column gap-1" style="flex-shrink:0;">
                        <a href="{{ route('admin.admissions.show', $app->id) }}"
                           class="btn btn-sm rounded-pill px-3"
                           style="background:#eff6ff;color:#3b82f6;border:1px solid #bfdbfe;font-size:.74rem;white-space:nowrap;">
                            <i class="fas fa-eye me-1"></i>View
                        </a>
                        @if(!$app->invited_at && $app->status === 'approved')
                        <form method="POST" action="{{ route('admin.parent-portal.send-invite-app', $app->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-sm rounded-pill px-2 w-100"
                                    style="background:#f5f3ff;color:#7c3aed;border:1px solid #ede9fe;font-size:.72rem;">
                                <i class="fas fa-paper-plane me-1"></i>Invite
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
                @empty
                <div style="padding:24px 0;text-align:center;">
                    <div style="font-size:.84rem;color:#adb5bd;">No enrolment applications linked.</div>
                </div>
                @endforelse
            </div>
        </div>

        {{-- Portal Access Timeline --}}
        <div class="ppv-panel accent-violet">
            <div class="ppv-panel-header">
                <h6><i class="fas fa-history me-2" style="color:#7c3aed;"></i>Portal Access History</h6>
            </div>
            <div class="ppv-panel-body">
                <div class="ppv-timeline">
                    <div class="ppv-tl-item">
                        <div class="ppv-tl-dot" style="background:#0077B6;border-color:#0077B6;"></div>
                        <div class="ppv-tl-label">Account Created</div>
                        <div class="ppv-tl-meta">{{ $parent->created_at->format('d M Y, H:i') }}</div>
                    </div>
                    @if($parent->email_verified_at)
                    <div class="ppv-tl-item">
                        <div class="ppv-tl-dot" style="background:#16a34a;border-color:#16a34a;"></div>
                        <div class="ppv-tl-label">Email Verified</div>
                        <div class="ppv-tl-meta">{{ $parent->email_verified_at->format('d M Y, H:i') }}</div>
                    </div>
                    @else
                    <div class="ppv-tl-item">
                        <div class="ppv-tl-dot" style="background:#e5e7eb;border-color:#e5e7eb;"></div>
                        <div class="ppv-tl-label muted">Email Not Yet Verified</div>
                        <div class="ppv-tl-meta">Parent hasn't clicked the verification link</div>
                    </div>
                    @endif
                    @if($pendingInvite)
                    <div class="ppv-tl-item">
                        <div class="ppv-tl-dot" style="background:#7c3aed;border-color:#7c3aed;"></div>
                        <div class="ppv-tl-label" style="color:#7c3aed;">Invitation Pending</div>
                        <div class="ppv-tl-meta">Expires {{ $pendingInvite->expires_at->format('d M Y') }}</div>
                    </div>
                    @endif
                    @if($parent->trashed())
                    <div class="ppv-tl-item">
                        <div class="ppv-tl-dot" style="background:#ef4444;border-color:#ef4444;"></div>
                        <div class="ppv-tl-label" style="color:#ef4444;">Account Deactivated</div>
                        <div class="ppv-tl-meta">{{ $parent->deleted_at->format('d M Y, H:i') }}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

    {{-- ── Right: Actions ─────────────────────────────────────────────────── --}}
    <div class="col-lg-5">

        {{-- Portal Preview --}}
        <div class="ppv-panel accent-blue" style="border-left-color:#0077B6;">
            <div class="ppv-panel-header">
                <h6><i class="fas fa-desktop me-2" style="color:#0077B6;"></i>Portal Preview</h6>
            </div>
            <div class="ppv-panel-body">
                <p style="font-size:.82rem;color:#6c757d;margin-bottom:14px;">Preview the parent portal as this parent would see it.</p>
                <a href="{{ route('parent.dashboard') }}" target="_blank" class="ppv-btn ppv-btn-primary">
                    <i class="fas fa-external-link-alt"></i>Open Parent Portal
                </a>
                <a href="{{ route('parent.children') }}" target="_blank" class="ppv-btn ppv-btn-ghost">
                    <i class="fas fa-child"></i>View Children Page
                </a>
                <a href="{{ route('parent.fees') }}" target="_blank" class="ppv-btn ppv-btn-ghost">
                    <i class="fas fa-credit-card"></i>View Fees Page
                </a>
            </div>
        </div>

        {{-- Invitation Management --}}
        <div class="ppv-panel accent-violet">
            <div class="ppv-panel-header">
                <h6><i class="fas fa-paper-plane me-2" style="color:#7c3aed;"></i>Portal Invitation</h6>
            </div>
            <div class="ppv-panel-body">
                <p style="font-size:.82rem;color:#6c757d;margin-bottom:14px;">
                    Send or re-send the portal access invitation email to this parent.
                </p>
                <form method="POST" action="{{ route('admin.parent-portal.resend-invite', $parent->id) }}">
                    @csrf
                    <button type="submit" class="ppv-btn ppv-btn-violet">
                        <i class="fas fa-paper-plane"></i>
                        {{ $pendingInvite ? 'Resend Invitation' : 'Send Portal Invitation' }}
                    </button>
                </form>
                <a href="{{ route('admin.parent-portal.invitations') }}" class="ppv-btn ppv-btn-ghost">
                    <i class="fas fa-list"></i>All Invitations
                </a>
            </div>
        </div>

        {{-- Account Actions --}}
        <div class="ppv-panel accent-{{ $parent->trashed() ? 'green' : 'red' }}">
            <div class="ppv-panel-header">
                <h6><i class="fas fa-bolt me-2" style="color:{{ $parent->trashed() ? '#16a34a' : '#ef4444' }};"></i>Account Actions</h6>
            </div>
            <div class="ppv-panel-body">
                <a href="mailto:{{ $parent->email }}" class="ppv-btn ppv-btn-primary">
                    <i class="fas fa-envelope"></i>Send Email
                </a>
                @if($parent->phone)
                @php $wa2 = '27' . ltrim(preg_replace('/[^0-9]/', '', $parent->phone), '0'); @endphp
                <a href="https://wa.me/{{ $wa2 }}" target="_blank" class="ppv-btn ppv-btn-success">
                    <i class="fab fa-whatsapp"></i>WhatsApp
                </a>
                @endif
                <a href="{{ route('admin.users.edit', $parent->id) }}" class="ppv-btn ppv-btn-ghost">
                    <i class="fas fa-user-edit"></i>Edit Account Details
                </a>
                <a href="{{ route('admin.parents.show', $parent->id) }}" class="ppv-btn ppv-btn-ghost">
                    <i class="fas fa-users"></i>View in Parents Module
                </a>

                <div style="height:1px;background:#f3f4f6;margin:14px 0;"></div>

                @if($parent->trashed())
                <form method="POST" action="{{ route('admin.parent-portal.activate', $parent->id) }}">
                    @csrf
                    <button type="submit" class="ppv-btn ppv-btn-success w-100" style="border:none;">
                        <i class="fas fa-check-circle"></i>Reactivate Account
                    </button>
                </form>
                @else
                <form method="POST" action="{{ route('admin.parent-portal.deactivate', $parent->id) }}">
                    @csrf @method('DELETE')
                    <button type="submit" class="ppv-btn ppv-btn-danger w-100"
                            data-confirm="This will disable {{ $parent->name }}'s portal access. Are you sure?"
                            data-confirm-title="Deactivate Portal Access"
                            data-confirm-icon="🔒"
                            data-confirm-btn="Deactivate"
                            data-confirm-color="#ef4444">
                        <i class="fas fa-ban"></i>Deactivate Portal Access
                    </button>
                </form>
                @endif

                <form method="POST" action="{{ route('admin.parent-portal.reset-password', $parent->id) }}" class="mt-2">
                    @csrf
                    <button type="submit" class="ppv-btn ppv-btn-ghost w-100"
                            data-confirm="This will generate a temporary password for {{ $parent->name }}. Continue?"
                            data-confirm-title="Reset Password"
                            data-confirm-icon="🔑"
                            data-confirm-btn="Reset"
                            data-confirm-color="#d97706">
                        <i class="fas fa-key"></i>Reset Password
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection

