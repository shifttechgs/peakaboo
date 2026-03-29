@extends('layouts.admin')

@section('title', 'Lead Pipeline')

@push('styles')
<style>
/* ── Page header ─────────────────────────────────────────────────────── */
.crm-header { margin-bottom: 28px; }
.crm-header h4 { font-size: 1.35rem; font-weight: 800; color: #1a1f2e; margin: 0 0 4px; }
.crm-header p  { font-size: .86rem; color: #6c757d; margin: 0; }

/* ── Panel (reuse dashboard pattern) ─────────────────────────────────── */
.crm-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden;
}
.crm-panel-header {
    padding: 18px 24px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.crm-panel-header h6 { margin: 0; font-weight: 700; font-size: .93rem; color: #1a1f2e; }
.crm-panel-body { padding: 22px 24px; }

/* ── Pipeline stat tiles ─────────────────────────────────────────────── */
.crm-pipeline {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 0;
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0;
    overflow: hidden;
    margin-bottom: 28px;
}
.crm-pipe-tile {
    padding: 20px 16px 22px;
    text-decoration: none; display: block;
    border-right: 1px solid #f3f4f6;
    position: relative; transition: background .15s;
}
.crm-pipe-tile:last-child { border-right: none; }
.crm-pipe-tile:hover { background: #fafbff; }
.crm-pipe-tile__val {
    font-size: 2rem; font-weight: 800; line-height: 1;
    margin-bottom: 5px;
}
.crm-pipe-tile__label {
    font-size: .68rem; font-weight: 700; color: #6c757d;
    text-transform: uppercase; letter-spacing: .4px;
}
.crm-pipe-tile__sub {
    font-size: .65rem; color: #adb5bd; margin-top: 4px;
}
.crm-pipe-tile__dot {
    position: absolute; top: 16px; right: 12px;
    width: 9px; height: 9px; border-radius: 50%;
}
.crm-pipe-tile__dot::before,
.crm-pipe-tile__dot::after {
    content: '';
    position: absolute;
    inset: 0; border-radius: 50%;
    background: inherit;
    animation: crm-ripple 2s ease-out infinite;
}
.crm-pipe-tile__dot::after { animation-delay: .7s; }
@keyframes crm-ripple {
    0%   { transform: scale(1);   opacity: .7; }
    100% { transform: scale(3.2); opacity: 0;  }
}

/* ── Source breakdown rows ───────────────────────────────────────────── */
.src-row {
    display: flex; align-items: center; gap: 14px;
    padding: 11px 0; border-bottom: 1px solid #f3f4f6; text-decoration: none;
    transition: background .12s; border-radius: 8px; margin: 0 -8px; padding-left: 8px; padding-right: 8px;
}
.src-row:last-child { border-bottom: none; }
.src-row:hover { background: #fafbff; }
.src-row__icon {
    width: 36px; height: 36px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: .95rem; flex-shrink: 0;
}
.src-row__name {
    font-size: .84rem; font-weight: 700; color: #1a1f2e; line-height: 1.2;
}
.src-row__sub {
    font-size: .7rem; color: #adb5bd; margin-top: 1px;
}
.src-row__bar-track {
    flex: 1; background: #f3f4f6; border-radius: 6px; height: 6px; overflow: hidden;
}
.src-row__bar-fill {
    height: 6px; border-radius: 6px;
    transition: width .6s cubic-bezier(.4,0,.2,1);
}
.src-row__count {
    font-size: .92rem; font-weight: 800; color: #1a1f2e;
    min-width: 28px; text-align: right;
}
.src-row__pct {
    font-size: .7rem; font-weight: 700; min-width: 36px;
    text-align: right;
}

/* ── Stacked mini-bar (top of card) ─────────────────────────────────── */
.crm-source-stack {
    display: flex; border-radius: 8px; overflow: hidden; height: 8px; margin-bottom: 20px;
}
.crm-source-stack-seg { transition: opacity .2s; }
.crm-source-stack-seg:hover { opacity: .8; }

/* ── Conversion widget ───────────────────────────────────────────────── */
.crm-conv-rate {
    font-size: 3rem; font-weight: 800; color: #16a34a; line-height: 1;
}
.crm-conv-bar-track {
    background: #f3f4f6; border-radius: 6px; height: 8px; overflow: hidden; margin: 10px 0 6px;
}
.crm-conv-bar-fill { height: 8px; border-radius: 6px; }
.crm-conv-stat { font-size: .8rem; font-weight: 700; }
.crm-conv-stat-label { font-size: .72rem; color: #adb5bd; margin-top: 1px; }

/* ── Recent leads table ──────────────────────────────────────────────── */
.crm-table th {
    font-size: .68rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; background: #fafafa;
    border-bottom: 1px solid #f0f0f0; padding: 10px 16px;
}
.crm-table td {
    padding: 13px 16px; vertical-align: middle;
    border-bottom: 1px solid #f8f8f8; font-size: .86rem;
}
.crm-table tbody tr:last-child td { border-bottom: none; }
.crm-table tbody tr:hover td { background: #fafcff; transition: background .12s; }

/* ── Source & status pills ───────────────────────────────────────────── */
.src-pill, .st-pill {
    font-size: .7rem; font-weight: 700; border-radius: 20px;
    padding: 3px 10px; display: inline-block;
}
</style>
@endpush

@section('content')

{{-- ── Page Header ────────────────────────────────────────────────────── --}}
<div class="d-flex justify-content-between align-items-center crm-header">
    <div>
        <h4><i class="fas fa-funnel-dollar me-2" style="color:#3b82f6;font-size:1.1rem;"></i>Lead Pipeline</h4>
        <p>Manage enquiries and convert leads to enrolments</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.crm.leads.create') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
            <i class="fas fa-plus me-1"></i>Add Lead
        </a>
        <a href="{{ route('admin.crm.kanban') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">
            <i class="fas fa-columns me-1"></i>Kanban
        </a>
        <a href="{{ route('admin.crm.leads') }}" class="btn btn-sm rounded-pill px-3 text-white" style="background:#0077B6;">
            <i class="fas fa-list me-1"></i>All Leads
        </a>
    </div>
</div>

{{-- ── Pipeline Strip ──────────────────────────────────────────────────── --}}
@php
    $pipeConfig = [
        ['key'=>'new',            'label'=>'New',           'sub'=>'Awaiting contact',  'color'=>'#3b82f6', 'status'=>'new'],
        ['key'=>'contacted',      'label'=>'Contacted',     'sub'=>'In dialogue',       'color'=>'#d97706', 'status'=>'contacted'],
        ['key'=>'tour_scheduled', 'label'=>'Tour Booked',   'sub'=>'Date confirmed',    'color'=>'#0097a7', 'status'=>'tour_scheduled'],
        ['key'=>'tour_completed', 'label'=>'Tour Done',     'sub'=>'Awaiting decision', 'color'=>'#7c3aed', 'status'=>'tour_completed'],
        ['key'=>'converted',      'label'=>'Converted',     'sub'=>'Enrolled',          'color'=>'#16a34a', 'status'=>'converted'],
        ['key'=>'waitlist',       'label'=>'Waitlist',      'sub'=>'Holding',           'color'=>'#6c757d', 'status'=>'waitlist'],
        ['key'=>'overdue',        'label'=>'Overdue',       'sub'=>'>3 days no contact','color'=>'#ef4444', 'status'=>'new'],
    ];
@endphp
<div class="crm-pipeline">
    @foreach($pipeConfig as $tile)
    <a href="{{ route('admin.crm.leads', ['status' => $tile['status']]) }}" class="crm-pipe-tile">
        @if(($stats[$tile['key']] ?? 0) > 0 && in_array($tile['key'], ['new','overdue']))
            <div class="crm-pipe-tile__dot" style="background:{{ $tile['color'] }};"></div>
        @endif
        <div class="crm-pipe-tile__val" style="color:{{ ($stats[$tile['key']] ?? 0) === 0 ? '#d1d5db' : $tile['color'] }};">
            {{ $stats[$tile['key']] ?? 0 }}
        </div>
        <div class="crm-pipe-tile__label">{{ $tile['label'] }}</div>
        <div class="crm-pipe-tile__sub">{{ $tile['sub'] }}</div>
    </a>
    @endforeach
</div>

{{-- ── Analytics Row ───────────────────────────────────────────────────── --}}
<div class="row g-4 mb-4">

    {{-- Source Breakdown --}}
    <div class="col-lg-7">
        <div class="crm-panel h-100">
            <div class="crm-panel-header">
                <h6><i class="fas fa-chart-bar me-2" style="color:#3b82f6;"></i>Leads by Source</h6>
                @if(isset($total) && $total > 0)
                <span style="font-size:.72rem;color:#adb5bd;font-weight:600;">{{ $total }} total</span>
                @endif
            </div>
            <div class="crm-panel-body">
                @php
                    $sourceConfig = [
                        'google'    => ['color'=>'#ef4444', 'bg'=>'#fee2e2', 'icon'=>'fab fa-google',    'label'=>'Google'],
                        'facebook'  => ['color'=>'#3b82f6', 'bg'=>'#dbeafe', 'icon'=>'fab fa-facebook-f','label'=>'Facebook'],
                        'instagram' => ['color'=>'#f59e0b', 'bg'=>'#fef3c7', 'icon'=>'fab fa-instagram', 'label'=>'Instagram'],
                        'referral'  => ['color'=>'#16a34a', 'bg'=>'#dcfce7', 'icon'=>'fas fa-user-friends','label'=>'Referral'],
                        'other'     => ['color'=>'#6c757d', 'bg'=>'#f3f4f6', 'icon'=>'fas fa-ellipsis-h','label'=>'Other'],
                        'unknown'   => ['color'=>'#d1d5db', 'bg'=>'#f9fafb', 'icon'=>'fas fa-question',  'label'=>'Unknown'],
                    ];
                    $total = $sourceStats->sum();
                    $maxCount = $sourceStats->max() ?: 1;
                @endphp

                @if($total > 0)
                    {{-- Mini stacked bar at top --}}
                    <div class="crm-source-stack mb-4">
                        @foreach($sourceStats as $source => $count)
                        @php $cfg = $sourceConfig[$source] ?? $sourceConfig['other']; @endphp
                        <div class="crm-source-stack-seg"
                             style="width:{{ ($count/$total)*100 }}%;background:{{ $cfg['color'] }};"
                             title="{{ $cfg['label'] }}: {{ $count }}"></div>
                        @endforeach
                    </div>

                    {{-- Per-source rows --}}
                    @foreach($sourceStats->sortDesc() as $source => $count)
                    @php
                        $cfg = $sourceConfig[$source] ?? $sourceConfig['other'];
                        $pct = $total > 0 ? round(($count / $total) * 100) : 0;
                        $barW = $maxCount > 0 ? round(($count / $maxCount) * 100) : 0;
                    @endphp
                    <a href="{{ route('admin.crm.leads', ['source' => $source === 'unknown' ? '' : $source]) }}"
                       class="src-row">
                        <div class="src-row__icon" style="background:{{ $cfg['bg'] }};">
                            <i class="{{ $cfg['icon'] }}" style="color:{{ $cfg['color'] }};"></i>
                        </div>
                        <div style="min-width:80px;">
                            <div class="src-row__name">{{ $cfg['label'] }}</div>
                            <div class="src-row__sub">{{ $pct }}% of total</div>
                        </div>
                        <div class="src-row__bar-track">
                            <div class="src-row__bar-fill" style="width:{{ $barW }}%;background:{{ $cfg['color'] }};"></div>
                        </div>
                        <div class="src-row__count" style="color:{{ $cfg['color'] }};">{{ $count }}</div>
                    </a>
                    @endforeach

                @else
                    <div class="text-center py-5">
                        <div style="font-size:2rem;margin-bottom:10px;">📊</div>
                        <div style="font-weight:600;color:#1a1f2e;font-size:.9rem;">No source data yet</div>
                        <div style="font-size:.8rem;color:#adb5bd;margin-top:4px;">Data will appear as leads come in</div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Conversion Funnel --}}
    <div class="col-lg-5">
        <div class="crm-panel h-100">
            <div class="crm-panel-header">
                <h6><i class="fas fa-funnel-dollar me-2" style="color:#16a34a;"></i>Conversion</h6>
            </div>
            <div class="crm-panel-body">
                @if($conversionStats['total'] > 0)
                @php
                    $convRate = round(($conversionStats['converted'] / $conversionStats['total']) * 100);
                    $lostRate = round(($conversionStats['lost']      / $conversionStats['total']) * 100);
                @endphp
                <div class="text-center mb-4">
                    <div class="crm-conv-rate">{{ $convRate }}%</div>
                    <div style="font-size:.78rem;color:#adb5bd;margin-top:4px;">overall conversion rate</div>
                </div>
                <div class="row g-3 text-center mb-3">
                    <div class="col-4">
                        <div class="crm-conv-stat" style="color:#1a1f2e;">{{ $conversionStats['total'] }}</div>
                        <div class="crm-conv-stat-label">Total</div>
                    </div>
                    <div class="col-4">
                        <div class="crm-conv-stat" style="color:#16a34a;">{{ $conversionStats['converted'] }}</div>
                        <div class="crm-conv-stat-label">Converted</div>
                    </div>
                    <div class="col-4">
                        <div class="crm-conv-stat" style="color:#ef4444;">{{ $conversionStats['lost'] }}</div>
                        <div class="crm-conv-stat-label">Lost</div>
                    </div>
                </div>
                <div class="crm-conv-bar-track">
                    <div class="d-flex h-100">
                        <div class="crm-conv-bar-fill" style="width:{{ $convRate }}%;background:#16a34a;"></div>
                        <div class="crm-conv-bar-fill" style="width:{{ $lostRate }}%;background:#ef4444;"></div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-1">
                    <span style="font-size:.68rem;color:#16a34a;font-weight:700;">{{ $convRate }}% converted</span>
                    <span style="font-size:.68rem;color:#ef4444;font-weight:700;">{{ $lostRate }}% lost</span>
                </div>
                @else
                <div class="text-center py-4">
                    <div style="font-size:1.6rem;margin-bottom:8px;">🎯</div>
                    <div style="font-size:.85rem;color:#adb5bd;">No conversion data yet</div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- ── Recent Leads ────────────────────────────────────────────────────── --}}
<div class="crm-panel">
    <div class="crm-panel-header">
        <h6><i class="fas fa-users me-2" style="color:#0097a7;"></i>Recent Leads</h6>
        <a href="{{ route('admin.crm.leads') }}"
           class="btn btn-sm btn-outline-secondary rounded-pill px-3" style="font-size:.75rem;">View All →</a>
    </div>
    <div class="table-responsive">
        <table class="table crm-table mb-0">
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Lead</th>
                    <th>Child</th>
                    <th>Source</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($recent as $lead)
                <tr>
                    <td><code style="font-size:.78rem;color:#0077B6;">{{ $lead->reference }}</code></td>
                    <td>
                        <div class="fw-semibold" style="color:#1a1f2e;">{{ $lead->name }}</div>
                        <div style="font-size:.75rem;color:#adb5bd;">{{ $lead->email }}</div>
                    </td>
                    <td>
                        <div style="color:#374151;">{{ $lead->child_name }}</div>
                        <span class="rounded-pill px-2" style="background:#f3f4f6;color:#6c757d;font-size:.68rem;font-weight:600;">{{ $lead->child_age }}</span>
                    </td>
                    <td>
                        @php
                            $srcMap = [
                                'google'    => ['#fee2e2','#ef4444'],
                                'facebook'  => ['#dbeafe','#3b82f6'],
                                'instagram' => ['#fef3c7','#d97706'],
                                'referral'  => ['#dcfce7','#16a34a'],
                                'other'     => ['#f3f4f6','#6c757d'],
                            ];
                            [$srcBg, $srcClr] = $srcMap[$lead->source] ?? ['#f3f4f6','#6c757d'];
                        @endphp
                        @if($lead->source)
                            <span class="src-pill" style="background:{{ $srcBg }};color:{{ $srcClr }};">{{ ucfirst($lead->source) }}</span>
                        @else
                            <span style="color:#adb5bd;font-size:.8rem;">—</span>
                        @endif
                    </td>
                    <td>
                        @php
                            $stMap = [
                                'new'            => ['#dbeafe','#3b82f6'],
                                'contacted'      => ['#fef3c7','#d97706'],
                                'tour_scheduled' => ['#e0f7fa','#0097a7'],
                                'tour_completed' => ['#f5f3ff','#7c3aed'],
                                'converted'      => ['#dcfce7','#16a34a'],
                                'waitlist'       => ['#f3f4f6','#6c757d'],
                                'lost'           => ['#fee2e2','#ef4444'],
                            ];
                            [$stBg, $stClr] = $stMap[$lead->status] ?? ['#f3f4f6','#6c757d'];
                        @endphp
                        <span class="st-pill" style="background:{{ $stBg }};color:{{ $stClr }};">
                            {{ ucwords(str_replace('_', ' ', $lead->status)) }}
                        </span>
                    </td>
                    <td style="color:#adb5bd;font-size:.8rem;">{{ $lead->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.crm.leads.show', $lead->id) }}"
                           class="btn btn-sm py-1 px-3 rounded-pill"
                           style="background:#eff6ff;color:#3b82f6;border:1px solid #dbeafe;font-size:.74rem;">
                            View →
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <div style="font-size:2rem;margin-bottom:8px;">📭</div>
                        <div class="fw-semibold" style="color:#1a1f2e;font-size:.9rem;">No leads yet</div>
                        <div style="font-size:.8rem;color:#adb5bd;margin-top:4px;">Tour bookings will appear here automatically</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
