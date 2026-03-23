@extends('layouts.portal')

@section('title', $child['name'] . ' — My Children')
@section('portal-name', 'Parent Portal')
@section('page-title', $child['name'])

@section('sidebar-nav')
@include('parent.partials.sidebar')
@endsection

@push('styles')
<style>
.cd-info-row { display:flex;gap:8px;padding:9px 0;border-bottom:1px solid #f3f4f6; }
.cd-info-row:last-child { border-bottom:none; }
.cd-info-label { font-size:.78rem;color:#94a3b8;min-width:140px;flex-shrink:0;font-weight:600; }
.cd-info-val   { font-size:.88rem;color:#1a1f2e;font-weight:600; }
</style>
@endpush

@section('content')

{{-- Breadcrumb --}}
<div class="mb-3">
    <small>
        <a href="{{ route('parent.children') }}" class="text-primary text-decoration-none">My Children</a>
        <span class="text-muted mx-1">/</span>
        <span class="text-muted">{{ $child['name'] }}</span>
    </small>
</div>

{{-- ── Child Header Card ─────────────────────────────────────────────────── --}}
<div class="child-card mb-4">
    <div class="d-flex justify-content-between align-items-start">
        <div class="d-flex gap-3 align-items-center">
            <div class="rounded-circle bg-white d-flex align-items-center justify-content-center" style="width:70px;height:70px;">
                <i class="fas fa-child fa-2x text-primary"></i>
            </div>
            <div>
                <h3 class="mb-1 fw-bold">{{ $child['name'] }}</h3>
                <div class="mb-1"><strong>{{ $child['program'] }}</strong> &bull; {{ $child['fee_option'] }}</div>
                <small class="opacity-75">{{ $child['age'] }} &bull; {{ $child['gender'] }} &bull; DOB: {{ $child['dob'] }}</small>
            </div>
        </div>
        @php
            $stColors = ['approved'=>['#dcfce7','#16a34a'],'pending'=>['#fff7ed','#d97706'],'under_review'=>['#f5f3ff','#7c3aed'],'waitlist'=>['#f3f4f6','#6c757d'],'rejected'=>['#fee2e2','#ef4444']];
            [$stBg,$stC] = $stColors[$child['status']] ?? ['#f3f4f6','#6c757d'];
        @endphp
        <span class="badge rounded-pill px-3 py-2" style="background:{{ $stBg }};color:{{ $stC }};font-weight:700;font-size:.76rem;">
            {{ $child['status_label'] }}
        </span>
    </div>
    <hr class="my-3 opacity-25">
    <div class="row text-center">
        <div class="col-3">
            <div class="fw-bold">{{ $child['attendance_rate'] }}</div>
            <small class="opacity-75">Attendance</small>
        </div>
        <div class="col-3">
            <div class="fw-bold">{{ $child['days_this_month'] }}</div>
            <small class="opacity-75">Days This Month</small>
        </div>
        <div class="col-3">
            <div class="fw-bold">{{ $child['teacher'] }}</div>
            <small class="opacity-75">Teacher</small>
        </div>
        <div class="col-3">
            <div class="fw-bold">{{ $child['reference'] }}</div>
            <small class="opacity-75">Reference</small>
        </div>
    </div>
</div>

<div class="row g-4">

    {{-- ── Left Column ────────────────────────────────────────────────────── --}}
    <div class="col-lg-7">

        {{-- Enrolment Details --}}
        <div class="portal-card mb-4">
            <div class="portal-card-header">
                <i class="fas fa-clipboard-check me-2 text-primary"></i> Enrolment Information
            </div>
            <div class="portal-card-body">
                <div class="cd-info-row">
                    <div class="cd-info-label">Application Ref</div>
                    <div class="cd-info-val"><code style="color:#0077B6;">{{ $child['reference'] }}</code></div>
                </div>
                <div class="cd-info-row">
                    <div class="cd-info-label">Programme</div>
                    <div class="cd-info-val">{{ $child['program'] }}</div>
                </div>
                <div class="cd-info-row">
                    <div class="cd-info-label">Fee Option</div>
                    <div class="cd-info-val">{{ $child['fee_option'] }}</div>
                </div>
                <div class="cd-info-row">
                    <div class="cd-info-label">Snack Box</div>
                    <div class="cd-info-val">
                        @if($child['snack_box'])
                            <span class="badge bg-success rounded-pill px-2"><i class="fas fa-check me-1"></i> Yes</span>
                        @else
                            <span class="text-muted">No</span>
                        @endif
                    </div>
                </div>
                <div class="cd-info-row">
                    <div class="cd-info-label">Start Date</div>
                    <div class="cd-info-val">{{ $child['start_date'] ?? '—' }}</div>
                </div>
                <div class="cd-info-row">
                    <div class="cd-info-label">Enrolled Since</div>
                    <div class="cd-info-val">{{ $child['enrolled_date'] }}</div>
                </div>
                <div class="cd-info-row">
                    <div class="cd-info-label">Status</div>
                    <div class="cd-info-val">
                        <span class="badge rounded-pill px-3" style="background:{{ $stBg }};color:{{ $stC }};">
                            {{ $child['status_label'] }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Child Info --}}
        <div class="portal-card mb-4">
            <div class="portal-card-header">
                <i class="fas fa-child me-2 text-info"></i> Child Details
            </div>
            <div class="portal-card-body">
                <div class="cd-info-row">
                    <div class="cd-info-label">Full Name</div>
                    <div class="cd-info-val">{{ $child['full_name'] }}</div>
                </div>
                <div class="cd-info-row">
                    <div class="cd-info-label">Date of Birth</div>
                    <div class="cd-info-val">{{ $child['dob'] }}</div>
                </div>
                <div class="cd-info-row">
                    <div class="cd-info-label">Age</div>
                    <div class="cd-info-val">{{ $child['age'] }}</div>
                </div>
                <div class="cd-info-row">
                    <div class="cd-info-label">Gender</div>
                    <div class="cd-info-val">{{ $child['gender'] }}</div>
                </div>
                <div class="cd-info-row">
                    <div class="cd-info-label">Class Teacher</div>
                    <div class="cd-info-val">{{ $child['teacher'] }}</div>
                </div>
            </div>
        </div>

        {{-- Medical Information --}}
        <div class="portal-card mb-4">
            <div class="portal-card-header">
                <i class="fas fa-heartbeat me-2 text-danger"></i> Medical Information
            </div>
            <div class="portal-card-body">
                <div class="cd-info-row">
                    <div class="cd-info-label">Allergies</div>
                    <div class="cd-info-val">{{ $child['allergies'] ?: 'None recorded' }}</div>
                </div>
                <div class="cd-info-row">
                    <div class="cd-info-label">Medical Notes</div>
                    <div class="cd-info-val">{{ $child['medical_notes'] ?: 'None recorded' }}</div>
                </div>
            </div>
        </div>

        {{-- Uploaded Documents --}}
        @if(count($child['documents'] ?? []) > 0)
        <div class="portal-card mb-4">
            <div class="portal-card-header">
                <i class="fas fa-folder-open me-2 text-success"></i> Uploaded Documents
            </div>
            <div class="portal-card-body p-0">
                @foreach($child['documents'] as $type => $path)
                @if($path)
                <div class="d-flex align-items-center gap-3 px-4 py-3 border-bottom">
                    <div class="rounded bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width:38px;height:38px;flex-shrink:0;">
                        <i class="fas fa-file text-primary" style="font-size:.8rem;"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="fw-semibold" style="font-size:.86rem;">{{ ucfirst(str_replace('_', ' ', $type)) }}</div>
                    </div>
                    <a href="{{ asset('storage/' . $path) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3" style="font-size:.78rem;">
                        <i class="fas fa-eye me-1"></i> View
                    </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        @endif

    </div>

    {{-- ── Right Column ───────────────────────────────────────────────────── --}}
    <div class="col-lg-5">

        {{-- This Month's Attendance --}}
        <div class="portal-card mb-4">
            <div class="portal-card-header">
                <i class="fas fa-calendar-check me-2 text-success"></i> This Month's Attendance
            </div>
            <div class="portal-card-body">
                <div class="row g-3 text-center mb-3">
                    <div class="col-4">
                        <div class="bg-success bg-opacity-10 rounded p-3">
                            <div class="h4 fw-bold text-success mb-0">{{ $child['days_this_month'] }}</div>
                            <small class="text-muted">Present</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="bg-warning bg-opacity-10 rounded p-3">
                            <div class="h4 fw-bold text-warning mb-0">{{ $child['absent_days'] }}</div>
                            <small class="text-muted">Absent</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="bg-primary bg-opacity-10 rounded p-3">
                            <div class="h4 fw-bold text-primary mb-0">{{ $child['attendance_rate'] }}</div>
                            <small class="text-muted">Rate</small>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 rounded" style="background:#f8f9fa;">
                    <span style="font-size:.86rem;">Today's Status</span>
                    <span class="badge bg-{{ $child['attendance_today'] === 'Present' ? 'success' : 'warning' }} rounded-pill px-3 py-2">
                        <i class="fas fa-{{ $child['attendance_today'] === 'Present' ? 'check' : 'clock' }} me-1"></i>
                        {{ $child['attendance_today'] }}
                    </span>
                </div>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="portal-card mb-4">
            <div class="portal-card-header">
                <i class="fas fa-bolt me-2 text-warning"></i> Quick Actions
            </div>
            <div class="portal-card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('parent.reports') }}" class="quick-action">
                        <div class="icon bg-info bg-opacity-10"><i class="fas fa-chart-line text-info"></i></div>
                        <div><div class="fw-semibold">View School Report</div><small class="text-muted">Latest term report</small></div>
                    </a>
                    <a href="{{ route('parent.activities') }}" class="quick-action">
                        <div class="icon bg-warning bg-opacity-10"><i class="fas fa-running text-warning"></i></div>
                        <div><div class="fw-semibold">Register for Activities</div><small class="text-muted">Extra-murals & more</small></div>
                    </a>
                    <a href="{{ route('parent.sleepover') }}" class="quick-action">
                        <div class="icon" style="background:rgba(124,58,237,.1);"><i class="fas fa-moon" style="color:#7c3aed;"></i></div>
                        <div><div class="fw-semibold">Apply for Sleepover</div><small class="text-muted">Upcoming sleepover nights</small></div>
                    </a>
                    <a href="{{ route('parent.documents') }}" class="quick-action">
                        <div class="icon bg-success bg-opacity-10"><i class="fas fa-folder-open text-success"></i></div>
                        <div><div class="fw-semibold">Document Vault</div><small class="text-muted">Certificates & records</small></div>
                    </a>
                    <a href="{{ route('parent.messages') }}" class="quick-action">
                        <div class="icon bg-danger bg-opacity-10"><i class="fas fa-comment-dots text-danger"></i></div>
                        <div><div class="fw-semibold">Message Teacher</div><small class="text-muted">Send {{ $child['teacher'] }} a note</small></div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

