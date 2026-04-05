@extends('layouts.admin')
@section('title', 'Attendance Report')

@push('styles')
<style>
.rpt-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 24px;
}
.rpt-panel-header {
    padding: 15px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.rpt-panel-header h6 { margin: 0; font-weight: 700; font-size: .88rem; color: #1a1f2e; }
.rpt-panel-body { padding: 22px; }

/* Stat tiles */
.rpt-stat-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 16px; margin-bottom: 24px; }
.rpt-stat {
    background: #fff; border-radius: 14px; border: 1px solid #f0f0f0;
    box-shadow: 0 1px 6px rgba(0,0,0,.06); padding: 18px 20px;
}
.rpt-stat-val { font-size: 1.8rem; font-weight: 800; color: #1a1f2e; line-height: 1; }
.rpt-stat-lbl { font-size: .67rem; font-weight: 700; text-transform: uppercase; letter-spacing: .5px; color: #adb5bd; margin-top: 5px; }
.rpt-stat-sub { font-size: .74rem; color: #94a3b8; margin-top: 3px; }

/* Bar chart */
.bar-chart { display: flex; align-items: flex-end; gap: 6px; height: 120px; padding-bottom: 4px; }
.bar-wrap { flex: 1; display: flex; flex-direction: column; align-items: center; gap: 4px; height: 100%; justify-content: flex-end; }
.bar { width: 100%; border-radius: 5px 5px 0 0; min-height: 3px; transition: opacity .15s; }
.bar:hover { opacity: .8; }
.bar-lbl { font-size: .6rem; color: #adb5bd; white-space: nowrap; }
.bar-val { font-size: .65rem; font-weight: 700; color: #374151; }

/* Progress rows */
.prog-row { display: flex; align-items: center; gap: 12px; margin-bottom: 12px; }
.prog-row:last-child { margin-bottom: 0; }
.prog-label { font-size: .82rem; font-weight: 600; color: #374151; min-width: 120px; flex-shrink: 0; }
.prog-bar-wrap { flex: 1; height: 8px; background: #f3f4f6; border-radius: 4px; overflow: hidden; }
.prog-bar { height: 100%; border-radius: 4px; }
.prog-count { font-size: .78rem; font-weight: 700; color: #374151; min-width: 42px; text-align: right; flex-shrink: 0; }

/* Table */
.rpt-table { width: 100%; border-collapse: collapse; font-size: .82rem; }
.rpt-table th { padding: 10px 14px; text-align: left; font-size: .67rem; font-weight: 700; text-transform: uppercase; letter-spacing: .5px; color: #adb5bd; border-bottom: 2px solid #f3f4f6; white-space: nowrap; }
.rpt-table td { padding: 11px 14px; border-bottom: 1px solid #f8f9fa; color: #374151; vertical-align: middle; }
.rpt-table tr:last-child td { border-bottom: none; }
.rpt-table tr:hover td { background: #fafafa; }
.rpt-pill { font-size: .68rem; font-weight: 700; border-radius: 20px; padding: 3px 9px; display: inline-block; }

/* Week calendar strip */
.week-strip { display: flex; gap: 8px; }
.week-day {
    flex: 1; text-align: center; padding: 14px 8px;
    border-radius: 12px; border: 1px solid #f0f0f0;
    background: #fafafa; transition: all .15s;
}
.week-day--today { border-color: #0097a7; background: #e0f7fa; }
.week-day--future { opacity: .45; }
.week-day__name { font-size: .63rem; font-weight: 800; text-transform: uppercase; letter-spacing: .5px; color: #adb5bd; }
.week-day__date { font-size: .72rem; color: #6c757d; margin-top: 2px; }
.week-day__rate { font-size: 1.35rem; font-weight: 800; line-height: 1; margin-top: 6px; }

/* Donut-style gauge */
.gauge-ring {
    width: 100px; height: 100px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 12px;
}
.gauge-inner {
    width: 72px; height: 72px; border-radius: 50%;
    background: #fff; display: flex; align-items: center;
    justify-content: center; flex-direction: column;
}
.gauge-val { font-size: 1.2rem; font-weight: 800; line-height: 1; }
.gauge-lbl { font-size: .58rem; font-weight: 700; text-transform: uppercase; letter-spacing: .3px; color: #adb5bd; margin-top: 2px; }

/* Class card */
.class-card {
    background: #fafafa; border-radius: 12px; border: 1px solid #f0f0f0;
    padding: 16px; margin-bottom: 12px; transition: all .15s;
}
.class-card:last-child { margin-bottom: 0; }
.class-card:hover { border-color: #e0f7fa; background: #f7fffe; }
.class-card__name { font-size: .88rem; font-weight: 700; color: #1a1f2e; }
.class-card__teacher { font-size: .72rem; color: #94a3b8; }
.class-card__stats { display: flex; gap: 16px; margin-top: 10px; }
.class-card__stat-val { font-size: 1rem; font-weight: 800; line-height: 1; }
.class-card__stat-lbl { font-size: .6rem; font-weight: 700; text-transform: uppercase; letter-spacing: .3px; color: #adb5bd; margin-top: 2px; }
</style>
@endpush

@section('content')

{{-- Header --}}
<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-clipboard-check me-2" style="color:#0097a7;font-size:1.1rem;"></i>Attendance Report
        </h4>
        <p style="font-size:.84rem;color:#94a3b8;margin:0;">Daily attendance patterns, absenteeism and class occupancy &mdash; {{ now()->format('l, d F Y') }}</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.staff.classes') }}"
           class="btn btn-sm rounded-pill px-3" style="background:#e0f7fa;color:#0097a7;border:1px solid #b2ebf2;font-size:.8rem;">
            <i class="fas fa-chalkboard-teacher me-1"></i>Class Overview
        </a>
        <a href="{{ route('admin.reports.index') }}"
           class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;font-size:.8rem;">
            <i class="fas fa-arrow-left me-1"></i>Back
        </a>
    </div>
</div>

{{-- ── Stat tiles ───────────────────────────────────────────────────────── --}}
<div class="rpt-stat-grid">
    <div class="rpt-stat">
        <div class="rpt-stat-val" style="color:#0097a7;">{{ $totalEnrolled }}</div>
        <div class="rpt-stat-lbl">Total Enrolled</div>
        <div class="rpt-stat-sub">Across all classes</div>
    </div>
    <div class="rpt-stat">
        <div class="rpt-stat-val" style="color:#16a34a;">{{ $presentToday }}</div>
        <div class="rpt-stat-lbl">Present Today</div>
        <div class="rpt-stat-sub">Checked in</div>
    </div>
    <div class="rpt-stat">
        <div class="rpt-stat-val" style="color:#ef4444;">{{ $absentToday }}</div>
        <div class="rpt-stat-lbl">Absent Today</div>
        <div class="rpt-stat-sub">Not checked in</div>
    </div>
    <div class="rpt-stat">
        <div class="rpt-stat-val" style="color:#d97706;">{{ $lateToday }}</div>
        <div class="rpt-stat-lbl">Late Arrivals</div>
        <div class="rpt-stat-sub">After 08:30</div>
    </div>
    <div class="rpt-stat">
        <div class="rpt-stat-val" style="color:{{ $todayRate >= 85 ? '#16a34a' : ($todayRate >= 70 ? '#d97706' : '#ef4444') }};">{{ $todayRate }}%</div>
        <div class="rpt-stat-lbl">Today's Rate</div>
        <div class="rpt-stat-sub">Attendance</div>
    </div>
    <div class="rpt-stat">
        <div class="rpt-stat-val" style="color:#7c3aed;">{{ $occupancyRate }}%</div>
        <div class="rpt-stat-lbl">Occupancy</div>
        <div class="rpt-stat-sub">Enrolled / capacity</div>
    </div>
</div>

{{-- ── This week strip ──────────────────────────────────────────────────── --}}
<div class="rpt-panel">
    <div class="rpt-panel-header">
        <h6><i class="fas fa-calendar-week me-2" style="color:#0097a7;"></i>This Week's Attendance</h6>
        <span style="font-size:.72rem;color:#94a3b8;">{{ now()->startOfWeek()->format('d M') }} – {{ now()->endOfWeek()->format('d M Y') }}</span>
    </div>
    <div class="rpt-panel-body">
        <div class="week-strip">
            @foreach($weekDays as $wd)
            @php
                $isToday = $wd['date']->isToday();
                $isFuture = $wd['date']->isAfter(today());
                $rateColor = $wd['rate'] !== null
                    ? ($wd['rate'] >= 90 ? '#16a34a' : ($wd['rate'] >= 80 ? '#d97706' : '#ef4444'))
                    : '#d1d5db';
            @endphp
            <div class="week-day {{ $isToday ? 'week-day--today' : '' }} {{ $isFuture ? 'week-day--future' : '' }}">
                <div class="week-day__name">{{ $wd['day'] }}</div>
                <div class="week-day__date">{{ $wd['label'] }}</div>
                <div class="week-day__rate" style="color:{{ $rateColor }};">
                    {{ $wd['rate'] !== null ? $wd['rate'].'%' : '—' }}
                </div>
            </div>
            @endforeach
        </div>
        @php $avgWeek = round($avgWeeklyRate); @endphp
        <div style="margin-top:16px;padding-top:14px;border-top:1px solid #f3f4f6;display:flex;align-items:center;justify-content:space-between;">
            <span style="font-size:.78rem;color:#94a3b8;">Weekly average</span>
            <span style="font-size:1.1rem;font-weight:800;color:{{ $avgWeek >= 90 ? '#16a34a' : ($avgWeek >= 80 ? '#d97706' : '#ef4444') }};">{{ $avgWeek }}%</span>
        </div>
    </div>
</div>

<div class="row g-4">
<div class="col-lg-8">

    {{-- Monthly trend --}}
    <div class="rpt-panel">
        <div class="rpt-panel-header">
            <h6><i class="fas fa-chart-bar me-2" style="color:#0097a7;"></i>Monthly Attendance Rate — Last 12 Months</h6>
        </div>
        <div class="rpt-panel-body">
            @php $maxRate = 100; @endphp
            <div class="bar-chart">
                @foreach($monthlyTrend as $month => $rate)
                @php
                    $pct = round(($rate / $maxRate) * 100);
                    $barColor = $month === now()->format('Y-m') ? '#0097a7' : '#b2ebf2';
                @endphp
                <div class="bar-wrap" title="{{ \Carbon\Carbon::createFromFormat('Y-m', $month)->format('M Y') }}: {{ $rate }}%">
                    <div class="bar-val">{{ $rate }}%</div>
                    <div class="bar" style="height:{{ max(20, $pct) }}%;background:{{ $barColor }};"></div>
                    <div class="bar-lbl">{{ \Carbon\Carbon::createFromFormat('Y-m', $month)->format('M') }}</div>
                </div>
                @endforeach
            </div>
            <div style="margin-top:12px;padding-top:12px;border-top:1px solid #f3f4f6;display:flex;gap:24px;font-size:.76rem;color:#94a3b8;">
                <span><span style="display:inline-block;width:10px;height:10px;border-radius:3px;background:#0097a7;margin-right:5px;"></span>Current month</span>
                <span><span style="display:inline-block;width:10px;height:10px;border-radius:3px;background:#b2ebf2;margin-right:5px;"></span>Previous months</span>
                <span style="margin-left:auto;font-weight:700;color:#374151;">12-month avg: <span style="color:#0097a7;">{{ round($avgMonthlyRate) }}%</span></span>
            </div>
        </div>
    </div>

    {{-- Today's register --}}
    <div class="rpt-panel">
        <div class="rpt-panel-header">
            <h6><i class="fas fa-list-check me-2" style="color:#0097a7;"></i>Today's Register — {{ now()->format('d M Y') }}</h6>
            <span style="font-size:.72rem;font-weight:700;color:{{ $todayRate >= 85 ? '#16a34a' : '#d97706' }};">
                {{ $presentToday + $lateToday }}/{{ $totalEnrolled }} present
            </span>
        </div>
        <div style="overflow-x:auto;">
            <table class="rpt-table">
                <thead>
                    <tr>
                        <th>Child</th>
                        <th>Class</th>
                        <th>Status</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $stColors = [
                            'present' => ['#dcfce7','#16a34a'],
                            'absent'  => ['#fee2e2','#ef4444'],
                            'late'    => ['#fff7ed','#d97706'],
                        ];
                    @endphp
                    @forelse($todayAttendance as $record)
                    @php [$sBg, $sClr] = $stColors[$record['status']] ?? ['#f3f4f6','#6c757d']; @endphp
                    <tr>
                        <td style="font-weight:600;color:#1a1f2e;">{{ $record['child_name'] }}</td>
                        <td style="color:#6c757d;">{{ $record['class'] }}</td>
                        <td><span class="rpt-pill" style="background:{{ $sBg }};color:{{ $sClr }};">{{ ucfirst($record['status']) }}</span></td>
                        <td style="color:{{ $record['check_in'] ? '#374151' : '#d1d5db' }};">{{ $record['check_in'] ?? '—' }}</td>
                        <td style="color:{{ $record['check_out'] ? '#374151' : '#d1d5db' }};">{{ $record['check_out'] ?? '—' }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="5" style="text-align:center;color:#94a3b8;padding:24px;">No attendance records for today.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
<div class="col-lg-4">

    {{-- Overall rate gauge --}}
    <div class="rpt-panel">
        <div class="rpt-panel-header">
            <h6><i class="fas fa-tachometer-alt me-2" style="color:#0097a7;"></i>Today's Overview</h6>
        </div>
        <div class="rpt-panel-body text-center">
            @php
                $gaugeColor = $todayRate >= 90 ? '#16a34a' : ($todayRate >= 80 ? '#d97706' : '#ef4444');
                $deg = round(($todayRate / 100) * 360);
            @endphp
            <div class="gauge-ring" style="background: conic-gradient({{ $gaugeColor }} {{ $deg }}deg, #f3f4f6 {{ $deg }}deg);">
                <div class="gauge-inner">
                    <div class="gauge-val" style="color:{{ $gaugeColor }};">{{ $todayRate }}%</div>
                    <div class="gauge-lbl">Present</div>
                </div>
            </div>
            <div style="display:flex;justify-content:center;gap:20px;margin-top:8px;">
                <div>
                    <div style="font-size:1.1rem;font-weight:800;color:#16a34a;">{{ $presentToday }}</div>
                    <div style="font-size:.6rem;font-weight:700;text-transform:uppercase;letter-spacing:.3px;color:#adb5bd;">Present</div>
                </div>
                <div style="width:1px;background:#f0f0f0;"></div>
                <div>
                    <div style="font-size:1.1rem;font-weight:800;color:#ef4444;">{{ $absentToday }}</div>
                    <div style="font-size:.6rem;font-weight:700;text-transform:uppercase;letter-spacing:.3px;color:#adb5bd;">Absent</div>
                </div>
                <div style="width:1px;background:#f0f0f0;"></div>
                <div>
                    <div style="font-size:1.1rem;font-weight:800;color:#d97706;">{{ $lateToday }}</div>
                    <div style="font-size:.6rem;font-weight:700;text-transform:uppercase;letter-spacing:.3px;color:#adb5bd;">Late</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Class breakdown --}}
    <div class="rpt-panel">
        <div class="rpt-panel-header">
            <h6><i class="fas fa-school me-2" style="color:#0097a7;"></i>Class Breakdown</h6>
        </div>
        <div class="rpt-panel-body" style="padding:16px 22px;">
            @php
                $classColors = [
                    'Baby Room'  => '#f472b6',
                    'Toddlers'   => '#fb923c',
                    'Preschool'  => '#60a5fa',
                    'Grade R'    => '#34d399',
                ];
            @endphp
            @foreach($classSummary as $cls)
            @php $clsColor = $classColors[$cls['name']] ?? '#0097a7'; @endphp
            <div class="class-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="class-card__name">{{ $cls['name'] }}</div>
                        <div class="class-card__teacher">{{ $cls['teacher'] }}</div>
                    </div>
                    <span style="font-size:.82rem;font-weight:800;color:{{ $cls['rate'] >= 90 ? '#16a34a' : ($cls['rate'] >= 75 ? '#d97706' : '#ef4444') }};">
                        {{ $cls['rate'] }}%
                    </span>
                </div>
                <div style="margin-top:8px;">
                    <div style="height:6px;background:#f3f4f6;border-radius:3px;overflow:hidden;">
                        <div style="height:100%;width:{{ $cls['rate'] }}%;background:{{ $clsColor }};border-radius:3px;"></div>
                    </div>
                </div>
                <div class="class-card__stats">
                    <div>
                        <div class="class-card__stat-val" style="color:#16a34a;">{{ $cls['present'] }}</div>
                        <div class="class-card__stat-lbl">Present</div>
                    </div>
                    <div>
                        <div class="class-card__stat-val" style="color:#ef4444;">{{ $cls['absent'] }}</div>
                        <div class="class-card__stat-lbl">Absent</div>
                    </div>
                    <div>
                        <div class="class-card__stat-val" style="color:#6c757d;">{{ $cls['enrolled'] }}</div>
                        <div class="class-card__stat-lbl">Enrolled</div>
                    </div>
                    <div>
                        <div class="class-card__stat-val" style="color:#adb5bd;">{{ $cls['capacity'] }}</div>
                        <div class="class-card__stat-lbl">Capacity</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Frequently absent --}}
    @if($frequentlyAbsent->count())
    <div class="rpt-panel">
        <div class="rpt-panel-header">
            <h6><i class="fas fa-exclamation-triangle me-2" style="color:#ef4444;"></i>Frequently Absent</h6>
            <span style="font-size:.68rem;font-weight:700;color:#ef4444;">This month</span>
        </div>
        <div class="rpt-panel-body" style="padding:12px 22px;">
            @foreach($frequentlyAbsent as $child)
            <div style="display:flex;align-items:center;justify-content:space-between;padding:10px 0;{{ !$loop->last ? 'border-bottom:1px solid #f8f9fa;' : '' }}">
                <div>
                    <div style="font-size:.82rem;font-weight:600;color:#1a1f2e;">{{ $child['name'] }}</div>
                    <div style="font-size:.72rem;color:#94a3b8;">{{ $child['class'] }} &bull; {{ $child['days_absent'] }} days absent</div>
                </div>
                <span style="font-size:.78rem;font-weight:800;color:{{ $child['rate'] >= 80 ? '#d97706' : '#ef4444' }};">{{ $child['rate'] }}%</span>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Capacity overview --}}
    <div class="rpt-panel">
        <div class="rpt-panel-header">
            <h6><i class="fas fa-building me-2" style="color:#7c3aed;"></i>Capacity Overview</h6>
        </div>
        <div class="rpt-panel-body">
            @php $totalCap = collect($classes)->sum('capacity'); @endphp
            @foreach($classes as $cls)
            @php
                $capPct = $cls['capacity'] > 0 ? round($cls['enrolled'] / $cls['capacity'] * 100) : 0;
                $capClr = $capPct >= 90 ? '#ef4444' : ($capPct >= 70 ? '#d97706' : '#16a34a');
            @endphp
            <div class="prog-row">
                <div class="prog-label" style="font-size:.78rem;">{{ $cls['name'] }}</div>
                <div class="prog-bar-wrap">
                    <div class="prog-bar" style="width:{{ $capPct }}%;background:{{ $capClr }};"></div>
                </div>
                <div class="prog-count" style="font-size:.72rem;">{{ $cls['enrolled'] }}/{{ $cls['capacity'] }}</div>
            </div>
            @endforeach
            <div style="margin-top:14px;padding-top:12px;border-top:1px solid #f3f4f6;display:flex;align-items:center;justify-content:space-between;">
                <span style="font-size:.78rem;color:#94a3b8;">Total occupancy</span>
                <span style="font-size:.88rem;font-weight:800;color:{{ $occupancyRate >= 90 ? '#ef4444' : ($occupancyRate >= 70 ? '#d97706' : '#16a34a') }};">{{ $occupancyRate }}%</span>
            </div>
        </div>
    </div>

</div>
</div>

@endsection

