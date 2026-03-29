@extends('layouts.admin')

@section('title', 'Reports & Analytics')

@push('styles')
<style>
/* ── Panels ──────────────────────────────────────────────────────────── */
.rpt-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden;
    margin-bottom: 20px;
}
.rpt-panel-header {
    padding: 16px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.rpt-panel-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }
.rpt-panel-body { padding: 24px; }

/* ── Report nav cards ────────────────────────────────────────────────── */
.rpt-nav-card {
    background: #fff; border-radius: 16px;
    border: 1px solid #f0f0f0;
    box-shadow: 0 1px 8px rgba(0,0,0,.06);
    padding: 28px 24px;
    display: flex; flex-direction: column; height: 100%;
    transition: transform .15s, box-shadow .15s;
    text-decoration: none; color: inherit;
    position: relative; overflow: hidden;
}
.rpt-nav-card:hover { transform: translateY(-3px); box-shadow: 0 8px 28px rgba(0,0,0,.1); color: inherit; }
.rpt-nav-card__accent { position: absolute; top: 0; left: 0; right: 0; height: 3px; }
.rpt-nav-card__icon {
    width: 52px; height: 52px; border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.2rem; margin-bottom: 18px;
}
.rpt-nav-card__title { font-size: 1rem; font-weight: 800; color: #1a1f2e; margin-bottom: 6px; }
.rpt-nav-card__desc  { font-size: .8rem; color: #94a3b8; flex-grow: 1; margin-bottom: 20px; line-height: 1.5; }
.rpt-nav-card__cta {
    font-size: .76rem; font-weight: 700; border-radius: 20px;
    padding: 6px 16px; display: inline-flex; align-items: center; gap: 6px;
    align-self: flex-start;
}

/* ── Progress bar ────────────────────────────────────────────────────── */
.rpt-bar-row { margin-bottom: 14px; }
.rpt-bar-row:last-child { margin-bottom: 0; }
.rpt-bar-label { font-size: .78rem; font-weight: 600; color: #374151; margin-bottom: 5px; display: flex; justify-content: space-between; }
.rpt-bar-track { height: 8px; background: #f3f4f6; border-radius: 4px; overflow: hidden; }
.rpt-bar-fill  { height: 100%; border-radius: 4px; transition: width .6s ease; }

/* ── Pipeline pill row ───────────────────────────────────────────────── */
.rpt-pipeline {
    display: flex; gap: 0; border-radius: 12px; overflow: hidden;
    border: 1px solid #f0f0f0;
}
.rpt-pipe-seg {
    flex: 1; padding: 14px 16px; text-align: center;
    border-right: 1px solid #f3f4f6; text-decoration: none;
    transition: background .15s;
}
.rpt-pipe-seg:last-child { border-right: none; }
.rpt-pipe-seg:hover { background: #fafbff; }
.rpt-pipe-seg__val   { font-size: 1.5rem; font-weight: 800; line-height: 1; }
.rpt-pipe-seg__label { font-size: .63rem; font-weight: 700; text-transform: uppercase; letter-spacing: .4px; color: #94a3b8; margin-top: 4px; }
</style>
@endpush

@section('content')

{{-- ── Page Header ─────────────────────────────────────────────────────── --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-chart-bar me-2" style="color:#7c3aed;font-size:1.1rem;"></i>Reports &amp; Analytics
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Real-time data across enrolments, leads and users</p>
    </div>
    <span style="font-size:.76rem;color:#94a3b8;background:#f3f4f6;padding:6px 14px;border-radius:20px;">
        <i class="fas fa-calendar-alt me-1"></i>{{ now()->format('d F Y') }}
    </span>
</div>

{{-- ── Top stat cards ───────────────────────────────────────────────────── --}}
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-primary">{{ $stats['apps_total'] }}</div>
                    <div class="label">Total Applications</div>
                </div>
                <div class="icon" style="background:#f5f3ff;color:#7c3aed;">
                    <i class="fas fa-file-alt"></i>
                </div>
            </div>
            <div class="mt-2 small">
                @php
                    $last = $stats['apps_last_month'];
                    $curr = $stats['apps_this_month'];
                    $pct  = $last > 0 ? round((($curr - $last) / $last) * 100) : ($curr > 0 ? 100 : 0);
                    $up   = $pct >= 0;
                @endphp
                <span class="{{ $up ? 'text-success' : 'text-danger' }}">
                    <i class="fas fa-arrow-{{ $up ? 'up' : 'down' }} me-1"></i>{{ abs($pct) }}%
                </span>
                <span class="text-muted">vs last month</span>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-success">{{ $stats['apps_approved'] }}</div>
                    <div class="label">Approved Enrolments</div>
                </div>
                <div class="icon bg-success bg-opacity-10 text-success">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="mt-2 small text-muted">{{ $stats['apps_actionable'] }} still need action</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value" style="color:#0097a7;">{{ $stats['leads_total'] }}</div>
                    <div class="label">Total Leads</div>
                </div>
                <div class="icon" style="background:#e0f7fa;color:#0097a7;">
                    <i class="fas fa-funnel-dollar"></i>
                </div>
            </div>
            <div class="mt-2 small text-muted">
                <span style="color:#0097a7;font-weight:600;">{{ $stats['conversion_rate'] }}%</span> conversion rate
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-primary">{{ $stats['total_parents'] + $stats['total_children'] }}</div>
                    <div class="label">Families in Portal</div>
                </div>
                <div class="icon bg-primary bg-opacity-10 text-primary">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="mt-2 small text-muted">
                {{ $stats['total_parents'] }} parents · {{ $stats['total_children'] }} children
            </div>
        </div>
    </div>
</div>

{{-- ── Middle row: Pipeline + Programme breakdown ───────────────────────── --}}
<div class="row g-4 mb-4">

    {{-- Application pipeline --}}
    <div class="col-lg-7">
        <div class="rpt-panel" style="height:100%;">
            <div class="rpt-panel-header">
                <h6><i class="fas fa-stream me-2" style="color:#94a3b8;"></i>Application Pipeline</h6>
                <a href="{{ route('admin.admissions.index') }}"
                   style="font-size:.74rem;font-weight:700;color:#0077B6;text-decoration:none;">
                    View all <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
            <div class="rpt-panel-body">
                {{-- Pipeline pill strip --}}
                <div class="rpt-pipeline mb-4">
                    @php
                        $pipeSegs = [
                            ['label'=>'Pending',     'val'=>$stats['apps_pending'],    'color'=>'#d97706'],
                            ['label'=>'In Review',   'val'=>$stats['apps_actionable'] - $stats['apps_pending'], 'color'=>'#7c3aed'],
                            ['label'=>'Approved',    'val'=>$stats['apps_approved'],   'color'=>'#16a34a'],
                            ['label'=>'Waitlist',    'val'=>$stats['apps_waitlist'],   'color'=>'#6c757d'],
                            ['label'=>'Rejected',    'val'=>$stats['apps_rejected'],   'color'=>'#ef4444'],
                        ];
                    @endphp
                    @foreach($pipeSegs as $seg)
                    <div class="rpt-pipe-seg">
                        <div class="rpt-pipe-seg__val" style="color:{{ $seg['val'] > 0 ? $seg['color'] : '#d1d5db' }};">
                            {{ $seg['val'] }}
                        </div>
                        <div class="rpt-pipe-seg__label">{{ $seg['label'] }}</div>
                    </div>
                    @endforeach
                </div>

                {{-- This month vs last --}}
                <div style="background:#fafafa;border-radius:12px;padding:14px 18px;display:flex;align-items:center;justify-content:space-between;gap:16px;">
                    <div class="text-center" style="flex:1;">
                        <div style="font-size:1.5rem;font-weight:800;color:#1a1f2e;line-height:1;">{{ $stats['apps_this_month'] }}</div>
                        <div style="font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#94a3b8;margin-top:4px;">This Month</div>
                    </div>
                    <div style="width:1px;height:40px;background:#e5e7eb;"></div>
                    <div class="text-center" style="flex:1;">
                        <div style="font-size:1.5rem;font-weight:800;color:#94a3b8;line-height:1;">{{ $stats['apps_last_month'] }}</div>
                        <div style="font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#94a3b8;margin-top:4px;">Last Month</div>
                    </div>
                    <div style="width:1px;height:40px;background:#e5e7eb;"></div>
                    <div class="text-center" style="flex:1;">
                        <div style="font-size:1.5rem;font-weight:800;{{ $up ? 'color:#16a34a' : 'color:#ef4444' }};line-height:1;">
                            {{ $up ? '+' : '' }}{{ $pct }}%
                        </div>
                        <div style="font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#94a3b8;margin-top:4px;">Change</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Programme breakdown --}}
    <div class="col-lg-5">
        <div class="rpt-panel" style="height:100%;">
            <div class="rpt-panel-header">
                <h6><i class="fas fa-graduation-cap me-2" style="color:#94a3b8;"></i>Applications by Programme</h6>
            </div>
            <div class="rpt-panel-body">
                @php
                    $progColors = [
                        'Baby Room (0–1)'  => '#e74c3c',
                        'Toddlers (1–3)'   => '#e67e22',
                        'Preschool (3–4)'  => '#2ecc71',
                        'Grade R (5–6)'    => '#0077B6',
                    ];
                    $progTotal = array_sum($stats['by_program']) ?: 1;
                @endphp
                @forelse($stats['by_program'] as $prog => $count)
                @php
                    $color = $progColors[$prog] ?? '#6c757d';
                    $pctW  = round($count / $progTotal * 100);
                @endphp
                <div class="rpt-bar-row">
                    <div class="rpt-bar-label">
                        <span>{{ $prog }}</span>
                        <span style="font-weight:800;color:{{ $color }};">{{ $count }}</span>
                    </div>
                    <div class="rpt-bar-track">
                        <div class="rpt-bar-fill" style="width:{{ $pctW }}%;background:{{ $color }};"></div>
                    </div>
                </div>
                @empty
                <div class="text-center py-4">
                    <i class="fas fa-chart-bar fa-2x text-muted opacity-25 mb-2 d-block"></i>
                    <p class="text-muted small mb-0">No programme data yet</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

{{-- ── Lead funnel + User snapshot ─────────────────────────────────────── --}}
<div class="row g-4 mb-4">

    {{-- Lead funnel --}}
    <div class="col-lg-5">
        <div class="rpt-panel" style="height:100%;">
            <div class="rpt-panel-header">
                <h6><i class="fas fa-funnel-dollar me-2" style="color:#94a3b8;"></i>Lead Funnel</h6>
                <a href="{{ route('admin.crm.leads') }}"
                   style="font-size:.74rem;font-weight:700;color:#0077B6;text-decoration:none;">
                    View pipeline <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
            <div class="rpt-panel-body">
                @php
                    $funnelSteps = [
                        ['label' => 'Total Leads',      'val' => $stats['leads_total'],     'color' => '#0097a7', 'bg' => '#e0f7fa'],
                        ['label' => 'New / Uncontacted','val' => $stats['leads_new'],        'color' => '#d97706', 'bg' => '#fff7ed'],
                        ['label' => 'Converted',        'val' => $stats['leads_converted'],  'color' => '#16a34a', 'bg' => '#dcfce7'],
                    ];
                    $funnelMax = max($stats['leads_total'], 1);
                @endphp
                @foreach($funnelSteps as $step)
                @php $w = round($step['val'] / $funnelMax * 100); @endphp
                <div class="rpt-bar-row">
                    <div class="rpt-bar-label">
                        <span style="display:flex;align-items:center;gap:8px;">
                            <span style="width:10px;height:10px;border-radius:50%;background:{{ $step['color'] }};display:inline-block;flex-shrink:0;"></span>
                            {{ $step['label'] }}
                        </span>
                        <span style="font-weight:800;color:{{ $step['color'] }};">{{ $step['val'] }}</span>
                    </div>
                    <div class="rpt-bar-track">
                        <div class="rpt-bar-fill" style="width:{{ $w }}%;background:{{ $step['color'] }};"></div>
                    </div>
                </div>
                @endforeach

                <div style="margin-top:20px;padding-top:16px;border-top:1px solid #f3f4f6;display:flex;align-items:center;justify-content:space-between;">
                    <span style="font-size:.8rem;color:#94a3b8;">Lead → Enrolment rate</span>
                    <span style="font-size:1.25rem;font-weight:800;color:{{ $stats['conversion_rate'] >= 30 ? '#16a34a' : '#d97706' }};">
                        {{ $stats['conversion_rate'] }}%
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- User snapshot --}}
    <div class="col-lg-7">
        <div class="rpt-panel" style="height:100%;">
            <div class="rpt-panel-header">
                <h6><i class="fas fa-users me-2" style="color:#94a3b8;"></i>User Snapshot</h6>
                <a href="{{ route('admin.users.index') }}"
                   style="font-size:.74rem;font-weight:700;color:#0077B6;text-decoration:none;">
                    Manage users <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
            <div class="rpt-panel-body">
                <div class="row g-3">
                    @php
                        $userSnap = [
                            ['label'=>'Parents',  'val'=>$stats['total_parents'],  'icon'=>'fa-user-friends',       'color'=>'#16a34a', 'bg'=>'#dcfce7'],
                            ['label'=>'Children', 'val'=>$stats['total_children'], 'icon'=>'fa-child',              'color'=>'#0097a7', 'bg'=>'#e0f7fa'],
                            ['label'=>'Total Users','val'=>$stats['total_users'],  'icon'=>'fa-users-cog',          'color'=>'#3b82f6', 'bg'=>'#eff6ff'],
                            ['label'=>'Converted Leads','val'=>$stats['leads_converted'], 'icon'=>'fa-check-double','color'=>'#7c3aed', 'bg'=>'#f5f3ff'],
                        ];
                    @endphp
                    @foreach($userSnap as $snap)
                    <div class="col-6">
                        <div style="background:#fafafa;border:1px solid #f0f0f0;border-radius:12px;padding:16px;display:flex;align-items:center;gap:14px;">
                            <div style="width:42px;height:42px;border-radius:12px;background:{{ $snap['bg'] }};color:{{ $snap['color'] }};display:flex;align-items:center;justify-content:center;font-size:.95rem;flex-shrink:0;">
                                <i class="fas {{ $snap['icon'] }}"></i>
                            </div>
                            <div>
                                <div style="font-size:1.4rem;font-weight:800;line-height:1;color:{{ $snap['color'] }};">{{ $snap['val'] }}</div>
                                <div style="font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#94a3b8;margin-top:3px;">{{ $snap['label'] }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ── Report navigation cards ──────────────────────────────────────────── --}}
<div class="row g-4 mb-4">
    <div class="col-md-6 col-lg-4">
        <a href="{{ route('admin.reports.enrolment') }}" class="rpt-nav-card">
            <div class="rpt-nav-card__accent" style="background:#7c3aed;"></div>
            <div class="rpt-nav-card__icon" style="background:#f5f3ff;color:#7c3aed;">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="rpt-nav-card__title">Enrolment Report</div>
            <div class="rpt-nav-card__desc">Applications, approvals, rejections, waitlists and programme breakdowns.</div>
            <span class="rpt-nav-card__cta" style="background:#f5f3ff;color:#7c3aed;">
                <i class="fas fa-chart-bar"></i> View Report
            </span>
        </a>
    </div>
    <div class="col-md-6 col-lg-4">
        <a href="{{ route('admin.reports.payments') }}" class="rpt-nav-card">
            <div class="rpt-nav-card__accent" style="background:#16a34a;"></div>
            <div class="rpt-nav-card__icon" style="background:#dcfce7;color:#16a34a;">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="rpt-nav-card__title">Payment Report</div>
            <div class="rpt-nav-card__desc">Revenue overview, outstanding fees, payment trends and family billing.</div>
            <span class="rpt-nav-card__cta" style="background:#dcfce7;color:#16a34a;">
                <i class="fas fa-chart-line"></i> View Report
            </span>
        </a>
    </div>
    <div class="col-md-6 col-lg-4">
        <a href="{{ route('admin.reports.attendance') }}" class="rpt-nav-card">
            <div class="rpt-nav-card__accent" style="background:#0097a7;"></div>
            <div class="rpt-nav-card__icon" style="background:#e0f7fa;color:#0097a7;">
                <i class="fas fa-clipboard-check"></i>
            </div>
            <div class="rpt-nav-card__title">Attendance Report</div>
            <div class="rpt-nav-card__desc">Daily attendance patterns, absenteeism and class-level occupancy.</div>
            <span class="rpt-nav-card__cta" style="background:#e0f7fa;color:#0097a7;">
                <i class="fas fa-chart-area"></i> View Report
            </span>
        </a>
    </div>
</div>

{{-- ── Export ───────────────────────────────────────────────────────────── --}}
<div class="rpt-panel">
    <div class="rpt-panel-header">
        <h6><i class="fas fa-download me-2" style="color:#94a3b8;"></i>Export Data</h6>
    </div>
    <div class="rpt-panel-body">
        <div class="row g-3">
            <div class="col-md-4">
                <a href="{{ route('admin.crm.leads.export') }}"
                   class="btn btn-sm w-100 rounded-pill"
                   style="background:#dcfce7;color:#16a34a;border:1px solid #bbf7d0;padding:10px;">
                    <i class="fas fa-file-excel me-2"></i>Export Leads to Excel
                </a>
            </div>
            <div class="col-md-4">
                <button class="btn btn-sm w-100 rounded-pill"
                        style="background:#fee2e2;color:#ef4444;border:1px solid #fecaca;padding:10px;"
                        disabled title="Coming soon">
                    <i class="fas fa-file-pdf me-2"></i>Export Report to PDF
                </button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-sm w-100 rounded-pill"
                        style="background:#f3f4f6;color:#6c757d;border:1px solid #e5e7eb;padding:10px;"
                        disabled title="Coming soon">
                    <i class="fas fa-file-csv me-2"></i>Export to CSV
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
