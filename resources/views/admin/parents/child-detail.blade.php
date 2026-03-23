@extends('layouts.admin')

@section('title', 'Child — ' . $child->name)

@push('styles')
<style>
.info-row { display: flex; gap: 8px; padding: 10px 0; border-bottom: 1px solid #f5f6f8; }
.info-row:last-child { border-bottom: none; }
.info-label { font-size: .8rem; color: #9b9baa; min-width: 140px; flex-shrink: 0; font-weight: 600; }
.info-value { font-size: .88rem; color: #2d2d3a; font-weight: 500; }
.section-header { font-size: .7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #9b9baa; margin-bottom: 14px; padding-bottom: 8px; border-bottom: 1px solid #f0f0f5; }
.pnl { background: #fff; border-radius: 16px; box-shadow: 0 1px 8px rgba(0,0,0,.07); border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 20px; }
.pnl-body { padding: 24px; }
</style>
@endpush

@section('content')

{{-- Breadcrumb / Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <nav aria-label="breadcrumb" style="font-size:.82rem;">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="{{ route('admin.parents.index') }}">Parents</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.parents.children') }}">Children</a></li>
                <li class="breadcrumb-item active">{{ $child->name }}</li>
            </ol>
        </nav>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0;">{{ $child->name }}</h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">
            @if($latestApp)
                {{ $latestApp->program_name }} · Enrolled {{ $child->created_at->format('d M Y') }}
            @else
                Child Account
            @endif
        </p>
    </div>
    <a href="{{ route('admin.parents.children') }}"
       class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
        <i class="fas fa-arrow-left me-1"></i>Back
    </a>
</div>

<div class="row g-4">
    {{-- Left column --}}
    <div class="col-lg-7">

        {{-- Child profile --}}
        <div class="pnl">
            <div class="pnl-body">
                <div class="d-flex align-items-center gap-4 mb-4">
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                         style="width:72px;height:72px;font-size:1.8rem;background:#16a34a;flex-shrink:0;">
                        {{ strtoupper(substr($child->name, 0, 1)) }}
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">{{ $child->name }}</h5>
                        <div class="d-flex gap-2 flex-wrap">
                            @if($latestApp && $latestApp->program_name)
                                <span style="font-size:.75rem;font-weight:700;border-radius:20px;padding:3px 10px;background:#eff6ff;color:#3b82f6;">
                                    {{ $latestApp->program_name }}
                                </span>
                            @endif
                            @if($latestApp && $latestApp->fee_option_name)
                                <span style="font-size:.75rem;font-weight:700;border-radius:20px;padding:3px 10px;background:#fef3c7;color:#d97706;">
                                    {{ $latestApp->fee_option_name }}
                                </span>
                            @endif
                            <span style="font-size:.75rem;font-weight:700;border-radius:20px;padding:3px 10px;
                                background:{{ $child->trashed() ? '#fee2e2' : '#dcfce7' }};
                                color:{{ $child->trashed() ? '#ef4444' : '#16a34a' }};">
                                {{ $child->trashed() ? 'Deactivated' : 'Active' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="section-header"><i class="fas fa-child me-2"></i>Account Details</div>
                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-value">{{ $child->email }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Account Created</span>
                    <span class="info-value">{{ $child->created_at->format('d F Y') }}</span>
                </div>
                @if($latestApp)
                <div class="info-row">
                    <span class="info-label">Programme</span>
                    <span class="info-value">{{ $latestApp->program_name ?? '—' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Fee Option</span>
                    <span class="info-value">{{ $latestApp->fee_option_name ?? '—' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Start Date</span>
                    <span class="info-value">
                        {{ $latestApp->start_date ? $latestApp->start_date->format('d F Y') : '—' }}
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Snack Box</span>
                    <span class="info-value">{{ $latestApp->snack_box ? 'Yes' : 'No' }}</span>
                </div>
                @endif
            </div>
        </div>

        {{-- Enrolment Application --}}
        @if($latestApp)
        <div class="pnl">
            <div class="pnl-body">
                <div class="section-header"><i class="fas fa-file-alt me-2"></i>Enrolment Application</div>
                <div class="info-row">
                    <span class="info-label">Reference</span>
                    <span class="info-value">{{ $latestApp->reference }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Child Name</span>
                    <span class="info-value">{{ $latestApp->child_name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Date of Birth</span>
                    <span class="info-value">
                        {{ $latestApp->child_dob ? $latestApp->child_dob->format('d F Y') : '—' }}
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Gender</span>
                    <span class="info-value">{{ $latestApp->child_gender ? ucfirst($latestApp->child_gender) : '—' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Status</span>
                    <span class="info-value">
                        <span style="font-size:.75rem;font-weight:700;border-radius:20px;padding:3px 10px;
                            background:{{ $latestApp->status === 'approved' ? '#dcfce7' : ($latestApp->status === 'rejected' ? '#fee2e2' : '#fef3c7') }};
                            color:{{ $latestApp->status === 'approved' ? '#16a34a' : ($latestApp->status === 'rejected' ? '#ef4444' : '#d97706') }};">
                            {{ $latestApp->statusLabel() }}
                        </span>
                    </span>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.admissions.show', $latestApp->id) }}"
                       class="btn btn-sm rounded-pill px-3" style="background:#eff6ff;color:#3b82f6;border:1px solid #bfdbfe;">
                        <i class="fas fa-external-link-alt me-1"></i>View Full Application
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>

    {{-- Right column --}}
    <div class="col-lg-5">

        {{-- Parent/Guardian --}}
        <div class="pnl">
            <div class="pnl-body">
                <div class="section-header"><i class="fas fa-user me-2"></i>Parent / Guardian</div>
                @if($parent)
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                         style="width:48px;height:48px;font-size:1.1rem;background:#0077B6;flex-shrink:0;">
                        {{ strtoupper(substr($parent->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="fw-semibold" style="font-size:.9rem;">{{ $parent->name }}</div>
                        <div class="text-muted small">Primary Guardian</div>
                    </div>
                </div>
                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-value"><a href="mailto:{{ $parent->email }}">{{ $parent->email }}</a></span>
                </div>
                @if($parent->phone)
                <div class="info-row">
                    <span class="info-label">Phone</span>
                    <span class="info-value"><a href="tel:{{ $parent->phone }}">{{ $parent->phone }}</a></span>
                </div>
                @endif
                <div class="d-flex gap-2 mt-3 flex-wrap">
                    <a href="{{ route('admin.parents.show', $parent->id) }}"
                       class="btn btn-sm rounded-pill px-3" style="background:#eff6ff;color:#3b82f6;border:1px solid #bfdbfe;font-size:.76rem;">
                        <i class="fas fa-eye me-1"></i>Parent Profile
                    </a>
                    @if($parent->phone)
                    <a href="https://wa.me/27{{ ltrim(str_replace([' ','-'], '', $parent->phone), '0') }}"
                       target="_blank" class="btn btn-sm btn-success rounded-pill px-3" style="font-size:.76rem;">
                        <i class="fab fa-whatsapp me-1"></i>WhatsApp
                    </a>
                    @endif
                </div>
                @elseif($latestApp)
                <div class="info-row">
                    <span class="info-label">Mother</span>
                    <span class="info-value">{{ $latestApp->mother_name ?: '—' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Mother Email</span>
                    <span class="info-value">
                        @if($latestApp->mother_email)
                            <a href="mailto:{{ $latestApp->mother_email }}">{{ $latestApp->mother_email }}</a>
                        @else —
                        @endif
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Father</span>
                    <span class="info-value">{{ $latestApp->father_name ?: '—' }}</span>
                </div>
                @else
                <p class="text-muted small mb-0">No linked parent account found.</p>
                @endif
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="pnl">
            <div class="pnl-body">
                <div class="section-header"><i class="fas fa-bolt me-2"></i>Quick Actions</div>
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.users.edit', $child->id) }}"
                       class="btn btn-sm btn-outline-primary rounded-pill">
                        <i class="fas fa-user-edit me-1"></i>Edit Account
                    </a>
                    @if($latestApp)
                    <a href="{{ route('admin.admissions.show', $latestApp->id) }}"
                       class="btn btn-sm btn-outline-secondary rounded-pill">
                        <i class="fas fa-file-alt me-1"></i>View Application
                    </a>
                    @endif
                    <a href="{{ route('admin.parents.children') }}"
                       class="btn btn-sm btn-outline-success rounded-pill">
                        <i class="fas fa-child me-1"></i>Back to Children
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

