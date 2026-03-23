@extends('layouts.admin')

@section('title', 'Lead — ' . $lead->reference)

@push('styles')
<style>
/* ── Breadcrumb & header ────────────────────────────────────────────── */
.ld-header { margin-bottom: 28px; }
.ld-breadcrumb {
    list-style: none; padding: 0; margin: 0 0 8px;
    display: flex; gap: 6px; font-size: .76rem; color: #adb5bd;
}
.ld-breadcrumb a { color: #0077B6; text-decoration: none; }
.ld-breadcrumb a:hover { text-decoration: underline; }
.ld-breadcrumb li + li::before { content: '/'; margin-right: 6px; color: #d1d5db; }
.ld-header h4 { font-size: 1.35rem; font-weight: 800; color: #1a1f2e; margin: 0 0 4px; }
.ld-header p  { font-size: .82rem; color: #adb5bd; margin: 0; }

/* ── Shared panel ───────────────────────────────────────────────────── */
.ld-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden;
    margin-bottom: 20px;
}
.ld-panel-header {
    padding: 16px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.ld-panel-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }
.ld-panel-body { padding: 22px; }

/* accent left-border variant */
.ld-panel.accent-blue   { border-left: 3px solid #3b82f6; }
.ld-panel.accent-green  { border-left: 3px solid #16a34a; }
.ld-panel.accent-amber  { border-left: 3px solid #d97706; }
.ld-panel.accent-teal   { border-left: 3px solid #0097a7; }
.ld-panel.accent-red    { border-left: 3px solid #ef4444; }
.ld-panel.accent-violet { border-left: 3px solid #7c3aed; }

/* ── Field grid inside info panels ─────────────────────────────────── */
.ld-field-label {
    font-size: .67rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; margin-bottom: 3px;
}
.ld-field-val { font-size: .88rem; color: #1a1f2e; font-weight: 600; }
.ld-field-val a { color: #0077B6; text-decoration: none; }
.ld-field-val a:hover { text-decoration: underline; }

/* section divider inside panel */
.ld-divider {
    height: 1px; background: #f3f4f6;
    margin: 18px 0;
}
.ld-section-label {
    font-size: .64rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: 1px; color: #adb5bd; margin-bottom: 14px;
}

/* ── Message / notes boxes ──────────────────────────────────────────── */
.ld-message-box {
    background: #f8fafc; border: 1px solid #e5e7eb;
    border-radius: 10px; padding: 14px 16px;
    font-size: .86rem; color: #374151; line-height: 1.6;
}
.ld-notes-box {
    background: #fffbeb; border: 1px solid #fde68a;
    border-radius: 10px; padding: 14px 16px;
    font-size: .86rem; color: #374151; line-height: 1.6;
}

/* ── Activity timeline ──────────────────────────────────────────────── */
.ld-timeline-item {
    display: flex; gap: 14px;
    padding-bottom: 16px; margin-bottom: 16px;
    border-bottom: 1px solid #f3f4f6;
    position: relative;
}
.ld-timeline-item:last-child { border-bottom: none; padding-bottom: 0; margin-bottom: 0; }
.ld-timeline-icon {
    width: 30px; height: 30px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; font-size: .75rem;
}
.ld-timeline-text { font-size: .84rem; font-weight: 600; color: #1a1f2e; }
.ld-timeline-meta { font-size: .72rem; color: #adb5bd; margin-top: 2px; }
.ld-timeline-changes { margin-top: 6px; display: flex; flex-wrap: wrap; gap: 6px; }
.ld-change-badge {
    font-size: .7rem; background: #f3f4f6; border-radius: 6px;
    padding: 3px 8px; color: #374151;
}

/* ── Sidebar form controls ──────────────────────────────────────────── */
.ld-form-label {
    font-size: .72rem; font-weight: 700; color: #6c757d;
    margin-bottom: 6px; display: block;
}
.ld-form-control, .ld-form-select {
    font-size: .84rem; border: 1.5px solid #e5e7eb;
    border-radius: 10px; padding: 10px 14px; background: #fafafa;
    color: #374151; transition: border-color .2s; width: 100%;
}
.ld-form-control:focus, .ld-form-select:focus {
    border-color: #0077B6;
    box-shadow: 0 0 0 3px rgba(0,119,182,.08);
    background: #fff; outline: none;
}
.ld-form-control::placeholder { color: #d1d5db; }
textarea.ld-form-control { min-height: 100px; resize: vertical; }

/* ── Sidebar action buttons ─────────────────────────────────────────── */
.ld-btn {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    width: 100%; padding: 11px 16px; border-radius: 10px;
    font-size: .84rem; font-weight: 700; cursor: pointer;
    border: none; transition: all .2s; text-decoration: none;
}
.ld-btn-primary   { background: #0077B6; color: #fff; }
.ld-btn-primary:hover { background: #005f93; color: #fff; }
.ld-btn-success   { background: #16a34a; color: #fff; }
.ld-btn-success:hover { background: #15803d; color: #fff; }
.ld-btn-amber     { background: #d97706; color: #fff; }
.ld-btn-amber:hover { background: #b45309; color: #fff; }
.ld-btn-teal      { background: #0097a7; color: #fff; }
.ld-btn-teal:hover { background: #00838f; color: #fff; }
.ld-btn-danger    { background: #ef4444; color: #fff; }
.ld-btn-danger:hover { background: #dc2626; color: #fff; }
.ld-btn-ghost {
    background: #f3f4f6; color: #374151;
    border: 1.5px solid #e5e7eb;
}
.ld-btn-ghost:hover { background: #e5e7eb; }
.ld-btn + .ld-btn  { margin-top: 8px; }

/* ── Linked enrolment card ──────────────────────────────────────────── */
.ld-enrol-card {
    background: #f0fdf4; border-radius: 12px;
    padding: 16px; margin-bottom: 14px;
    border: 1px solid #dcfce7;
}

/* ── Task rows ──────────────────────────────────────────────────────── */
.ld-task-row {
    display: flex; align-items: flex-start; gap: 10px;
    padding: 10px 0; border-bottom: 1px solid #f3f4f6;
}
.ld-task-row:last-child { border-bottom: none; padding-bottom: 0; }
.ld-task-toggle {
    background: none; border: none; padding: 2px; cursor: pointer; flex-shrink: 0; margin-top: 1px;
}
.ld-task-title { font-size: .84rem; color: #374151; }
.ld-task-due   { font-size: .72rem; color: #adb5bd; margin-top: 2px; }

/* ── Pills ──────────────────────────────────────────────────────────── */
.ld-pill {
    font-size: .7rem; font-weight: 700; border-radius: 20px;
    padding: 3px 10px; display: inline-block;
}
</style>
@endpush

@section('content')

{{-- ── Page Header ────────────────────────────────────────────────────── --}}
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
    $daysOld = (int) $lead->created_at->diffInDays(now());
    $waPhone = preg_replace('/[^0-9]/', '', $lead->phone);
    if (str_starts_with($waPhone, '0')) { $waPhone = '27' . substr($waPhone, 1); }
    $waTemplates = [
        'follow_up' => [
            'label' => 'Follow Up',
            'text'  => "Hi {$lead->name}, this is Peekaboo Daycare. Thank you for your interest in our school! We'd love to schedule a tour for {$lead->child_name}. Would the {$lead->preferred_date->format('d M')} at {$lead->preferred_time} still work for you?",
        ],
        'tour_reminder' => [
            'label' => 'Tour Reminder',
            'text'  => "Hi {$lead->name}, just a friendly reminder about your tour at Peekaboo Daycare on {$lead->preferred_date->format('l, d F')} at {$lead->preferred_time}. Please arrive 5 minutes early. We look forward to meeting you and {$lead->child_name}! See you soon.",
        ],
        'post_tour' => [
            'label' => 'Post-Tour',
            'text'  => "Hi {$lead->name}, thank you for visiting Peekaboo Daycare today! We loved meeting {$lead->child_name}. If you have any questions or would like to proceed with enrolment, please don't hesitate to reach out. We'd love to have {$lead->child_name} join our family!",
        ],
        'waitlist' => [
            'label' => 'Waitlist Update',
            'text'  => "Hi {$lead->name}, we wanted to let you know that {$lead->child_name} is on our waitlist. We'll be in touch as soon as a spot opens up. Thank you for your patience!",
        ],
    ];
@endphp

<div class="d-flex justify-content-between align-items-start ld-header">
    <div>
        <ul class="ld-breadcrumb">
            <li><a href="{{ route('admin.crm.index') }}">Lead Pipeline</a></li>
            <li><a href="{{ route('admin.crm.leads') }}">Leads</a></li>
            <li>{{ $lead->reference }}</li>
        </ul>
        <h4>
            {{ $lead->name }}
            <span class="ld-pill ms-2" style="background:{{ $stBg }};color:{{ $stClr }};font-size:.72rem;">
                {{ ucwords(str_replace('_', ' ', $lead->status)) }}
            </span>
            @if($lead->isOverdue())
                <span class="ld-pill ms-1" style="background:#fee2e2;color:#ef4444;font-size:.72rem;">
                    <i class="fas fa-exclamation-triangle me-1"></i>Overdue
                </span>
            @endif
        </h4>
        <p>
            <code style="font-size:.78rem;color:#0077B6;">{{ $lead->reference }}</code>
            &bull; Submitted {{ $lead->created_at->format('d M Y, H:i') }}
        </p>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        {{-- WhatsApp dropdown --}}
        <div class="dropdown">
            <button class="btn btn-sm rounded-pill px-3 dropdown-toggle"
                    style="background:#f0fdf4;color:#16a34a;border:1px solid #dcfce7;"
                    type="button" data-bs-toggle="dropdown">
                <i class="fab fa-whatsapp me-1"></i>WhatsApp
            </button>
            <ul class="dropdown-menu dropdown-menu-end" style="min-width:220px;border-radius:12px;border:1px solid #f0f0f0;box-shadow:0 4px 20px rgba(0,0,0,.1);">
                <li>
                    <a class="dropdown-item small" href="https://wa.me/{{ $waPhone }}" target="_blank">
                        <i class="fab fa-whatsapp me-2 text-success"></i>Open Chat (blank)
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li class="dropdown-header" style="font-size:.68rem;font-weight:800;letter-spacing:.5px;color:#adb5bd;">QUICK TEMPLATES</li>
                @foreach($waTemplates as $key => $tpl)
                <li>
                    <a class="dropdown-item small"
                       href="https://wa.me/{{ $waPhone }}?text={{ urlencode($tpl['text']) }}"
                       target="_blank">
                        <i class="fas fa-comment-dots me-2" style="color:#adb5bd;"></i>{{ $tpl['label'] }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <a href="{{ route('admin.crm.leads.edit', $lead->id) }}"
           class="btn btn-sm btn-outline-primary rounded-pill px-3">
            <i class="fas fa-edit me-1"></i>Edit
        </a>
        <a href="{{ route('admin.crm.index') }}"
           class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
            <i class="fas fa-funnel-dollar me-1"></i>Lead Pipeline
        </a>
    </div>
</div>

<div class="row g-4">

    {{-- ════ LEFT COLUMN — Info + Timeline ════ --}}
    <div class="col-lg-7">

        {{-- ── Lead Information ──────────────────────────────────────── --}}
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6><i class="fas fa-user me-2" style="color:#3b82f6;"></i>Lead Information</h6>
            </div>
            <div class="ld-panel-body">
                <div class="ld-section-label">Contact</div>
                <div class="row g-3 mb-0">
                    <div class="col-sm-6">
                        <div class="ld-field-label">Full Name</div>
                        <div class="ld-field-val">{{ $lead->name }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ld-field-label">Email</div>
                        <div class="ld-field-val"><a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ld-field-label">Phone</div>
                        <div class="ld-field-val"><a href="tel:{{ $lead->phone }}">{{ $lead->phone }}</a></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ld-field-label">Source</div>
                        <div class="ld-field-val">
                            @if($lead->source)
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
                                <span class="ld-pill" style="background:{{ $srcBg }};color:{{ $srcClr }};">{{ ucfirst($lead->source) }}</span>
                            @else
                                <span style="color:#adb5bd;">Not specified</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="ld-divider"></div>
                <div class="ld-section-label">Child Details</div>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="ld-field-label">Child's Name</div>
                        <div class="ld-field-val">{{ $lead->child_name }}</div>
                    </div>
                    @if($lead->child_nickname)
                    <div class="col-sm-6">
                        <div class="ld-field-label">Nickname</div>
                        <div class="ld-field-val">{{ $lead->child_nickname }}</div>
                    </div>
                    @endif
                    <div class="col-sm-6">
                        <div class="ld-field-label">Age Group</div>
                        <div class="ld-field-val">
                            <span class="ld-pill" style="background:#f3f4f6;color:#374151;">{{ $lead->child_age }}</span>
                        </div>
                    </div>
                </div>

                <div class="ld-divider"></div>
                <div class="ld-section-label">Tour Preference</div>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="ld-field-label">Preferred Date</div>
                        <div class="ld-field-val">{{ $lead->preferred_date->format('l, d F Y') }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ld-field-label">Preferred Time</div>
                        <div class="ld-field-val">{{ $lead->preferred_time }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ld-field-label">Days Since Submitted</div>
                        <div class="ld-field-val {{ $lead->isOverdue() ? 'text-danger' : '' }}">
                            {{ $daysOld === 0 ? 'Today' : $daysOld . ($daysOld === 1 ? ' day' : ' days') . ' ago' }}
                            @if($lead->isOverdue())
                                <span class="ld-pill ms-1" style="background:#fee2e2;color:#ef4444;">Overdue</span>
                            @endif
                        </div>
                    </div>
                    @if($lead->follow_up_date)
                    <div class="col-sm-6">
                        <div class="ld-field-label">Follow-up Date</div>
                        <div class="ld-field-val {{ $lead->isFollowUpDue() ? 'text-danger' : '' }}">
                            {{ $lead->follow_up_date->format('d M Y') }}
                            @if($lead->isFollowUpDue())
                                <span class="ld-pill ms-1" style="background:#fee2e2;color:#ef4444;">Due</span>
                            @endif
                        </div>
                    </div>
                    @endif
                    @if($lead->tour_scheduled_at)
                    <div class="col-sm-6">
                        <div class="ld-field-label">Confirmed Tour</div>
                        <div class="ld-field-val" style="color:#0097a7;">
                            {{ $lead->tour_scheduled_at->format('d M Y') }}
                            <span style="color:#adb5bd;font-weight:400;"> at {{ $lead->tour_scheduled_at->format('H:i') }}</span>
                        </div>
                    </div>
                    @endif
                    @if($lead->converted_at)
                    <div class="col-sm-6">
                        <div class="ld-field-label">Converted</div>
                        <div class="ld-field-val" style="color:#16a34a;">
                            {{ $lead->converted_at->format('d M Y') }}
                            <span style="color:#adb5bd;font-weight:400;font-size:.78rem;"> ({{ $lead->daysToConvert() }}d to convert)</span>
                        </div>
                    </div>
                    @endif
                    @if($lead->last_activity_at)
                    <div class="col-sm-6">
                        <div class="ld-field-label">Last Activity</div>
                        <div class="ld-field-val" title="{{ $lead->last_activity_at->format('d M Y H:i') }}">
                            {{ $lead->last_activity_at->diffForHumans() }}
                        </div>
                    </div>
                    @endif
                </div>

                @if($lead->message)
                <div class="ld-divider"></div>
                <div class="ld-section-label">Message from Lead</div>
                <div class="ld-message-box">{{ $lead->message }}</div>
                @endif

                @if($lead->notes)
                <div class="ld-divider"></div>
                <div class="ld-section-label">Internal Notes</div>
                <div class="ld-notes-box">{{ $lead->notes }}</div>
                @endif
            </div>
        </div>

        {{-- ── Activity Timeline ─────────────────────────────────────── --}}
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6><i class="fas fa-history me-2" style="color:#7c3aed;"></i>Activity Timeline</h6>
            </div>
            <div class="ld-panel-body">
                @php
                    $iconConfig = [
                        'created'       => ['bg'=>'#dcfce7','icon'=>'fas fa-plus','color'=>'#16a34a'],
                        'status_change' => ['bg'=>'#dbeafe','icon'=>'fas fa-exchange-alt','color'=>'#3b82f6'],
                        'email_sent'    => ['bg'=>'#e0f7fa','icon'=>'fas fa-envelope','color'=>'#0097a7'],
                        'note'          => ['bg'=>'#fef3c7','icon'=>'fas fa-sticky-note','color'=>'#d97706'],
                        'edited'        => ['bg'=>'#f3f4f6','icon'=>'fas fa-edit','color'=>'#6c757d'],
                        'assigned'      => ['bg'=>'#f5f3ff','icon'=>'fas fa-user-tag','color'=>'#7c3aed'],
                    ];
                @endphp
                @forelse($activities as $activity)
                @php $ic = $iconConfig[$activity->type] ?? ['bg'=>'#f3f4f6','icon'=>'fas fa-circle','color'=>'#adb5bd']; @endphp
                <div class="ld-timeline-item">
                    <div class="ld-timeline-icon" style="background:{{ $ic['bg'] }};">
                        <i class="{{ $ic['icon'] }}" style="color:{{ $ic['color'] }};"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="ld-timeline-text">{{ $activity->description }}</div>
                        <div class="ld-timeline-meta">
                            {{ $activity->created_at->format('d M Y, H:i') }}
                            &mdash; {{ $activity->user ? $activity->user->name : 'System' }}
                        </div>
                        @if($activity->type === 'edited' && !empty($activity->metadata['changes']))
                        <div class="ld-timeline-changes">
                            @foreach($activity->metadata['changes'] as $field => $change)
                            <span class="ld-change-badge">
                                {{ ucwords(str_replace('_', ' ', $field)) }}:
                                <span style="color:#ef4444;">{{ Str::limit($change['from'] ?? '—', 25) }}</span>
                                &rarr;
                                <span style="color:#16a34a;">{{ Str::limit($change['to'] ?? '—', 25) }}</span>
                            </span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="text-center py-4">
                    <div style="font-size:1.6rem;margin-bottom:6px;">📋</div>
                    <div style="font-size:.84rem;color:#adb5bd;">No activity recorded yet</div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- ════ RIGHT COLUMN — Action Panels ════ --}}
    <div class="col-lg-5">

        {{-- ── Status ────────────────────────────────────────────────── --}}
        <div class="ld-panel accent-blue">
            <div class="ld-panel-header">
                <h6><i class="fas fa-tag me-2" style="color:#3b82f6;"></i>Update Status</h6>
            </div>
            <div class="ld-panel-body">
                <form method="POST" action="{{ route('admin.crm.leads.status', $lead->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label class="ld-form-label">Current Status</label>
                        <select name="status" class="ld-form-select">
                            @foreach(\App\Models\Lead::STATUSES as $s)
                                <option value="{{ $s }}" {{ $lead->status === $s ? 'selected' : '' }}>
                                    {{ ucwords(str_replace('_', ' ', $s)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="ld-btn ld-btn-primary">
                        <i class="fas fa-save"></i> Save Status
                    </button>
                </form>
            </div>
        </div>

        {{-- ── Linked Enrolment ──────────────────────────────────────── --}}
        @if($lead->application)
        @php $app = $lead->application; @endphp
        <div class="ld-panel accent-green">
            <div class="ld-panel-header">
                <h6><i class="fas fa-file-alt me-2" style="color:#16a34a;"></i>Enrolment Application</h6>
                @php
                    $appBadgeMap = [
                        'pending'      => ['#fff7ed','#d97706'],
                        'under_review' => ['#e0f7fa','#0097a7'],
                        'approved'     => ['#dcfce7','#16a34a'],
                        'waitlist'     => ['#f3f4f6','#6c757d'],
                        'rejected'     => ['#fee2e2','#ef4444'],
                    ];
                    [$appBg, $appClr] = $appBadgeMap[$app->status] ?? ['#f3f4f6','#6c757d'];
                @endphp
                <span class="ld-pill" style="background:{{ $appBg }};color:{{ $appClr }};">{{ $app->statusLabel() }}</span>
            </div>
            <div class="ld-panel-body">
                <div class="ld-enrol-card">
                    <div class="fw-semibold mb-1" style="color:#1a1f2e;">{{ $app->child_name }}</div>
                    <code style="font-size:.76rem;color:#16a34a;">{{ $app->reference }}</code>
                    <div class="mt-2" style="font-size:.8rem;color:#6c757d;">
                        <i class="fas fa-graduation-cap me-1"></i>{{ $app->program_name }}
                        &bull; {{ ucfirst($app->fee_option) }}
                    </div>
                    <div style="font-size:.8rem;color:#6c757d;margin-top:3px;">
                        <i class="fas fa-calendar me-1"></i>Start {{ $app->start_date->format('d M Y') }}
                    </div>
                    @php $dc = $app->documentsCount(); @endphp
                    <div class="mt-2" style="font-size:.8rem;">
                        <i class="fas fa-folder-open me-1" style="color:#adb5bd;"></i>Documents:
                        <span style="color:{{ $dc >= 3 ? '#16a34a' : ($dc > 0 ? '#d97706' : '#ef4444') }};font-weight:700;">
                            {{ $dc > 0 ? $dc.'/4 uploaded' : 'None uploaded' }}
                        </span>
                    </div>
                </div>
                <a href="{{ route('admin.admissions.show', $app->id) }}" class="ld-btn ld-btn-success">
                    <i class="fas fa-external-link-alt"></i> View Full Application
                </a>
            </div>
        </div>
        @elseif($lead->status === 'converted')
        <div class="ld-panel accent-amber">
            <div class="ld-panel-header">
                <h6><i class="fas fa-file-alt me-2" style="color:#d97706;"></i>Enrolment Application</h6>
            </div>
            <div class="ld-panel-body">
                <p style="font-size:.82rem;color:#6c757d;margin-bottom:14px;">
                    This lead is <strong>Converted</strong> but no application has been received yet.
                </p>
                <form method="POST" action="{{ route('admin.crm.leads.start-enrol', $lead->id) }}">
                    @csrf
                    <button type="submit" class="ld-btn ld-btn-amber"
                            data-confirm="Send a new enrolment invitation link to {{ $lead->email }}?"
                            data-confirm-title="Re-send Enrolment Invitation"
                            data-confirm-icon="📧"
                            data-confirm-btn="Send"
                            data-confirm-color="#d97706">
                        <i class="fas fa-paper-plane"></i>Re-send Enrolment Link
                    </button>
                </form>
            </div>
        </div>
        @endif

        {{-- ── Assign ─────────────────────────────────────────────────── --}}
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6><i class="fas fa-user-tie me-2" style="color:#adb5bd;"></i>Assigned To</h6>
            </div>
            <div class="ld-panel-body">
                <form method="POST" action="{{ route('admin.crm.leads.assign', $lead->id) }}">
                    @csrf
                    <div class="mb-3">
                        <select name="assigned_to" class="ld-form-select">
                            <option value="">Unassigned</option>
                            @foreach($adminUsers as $uid => $uname)
                                <option value="{{ $uid }}" {{ $lead->assigned_to == $uid ? 'selected' : '' }}>
                                    {{ $uname }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="ld-btn ld-btn-ghost">
                        <i class="fas fa-save"></i> Update Assignment
                    </button>
                </form>
            </div>
        </div>

        {{-- ── Follow-up Date ─────────────────────────────────────────── --}}
        <div class="ld-panel {{ $lead->isFollowUpDue() ? 'accent-red' : 'accent-amber' }}">
            <div class="ld-panel-header">
                <h6>
                    <i class="fas fa-calendar-alt me-2" style="color:#d97706;"></i>Follow-up Date
                    @if($lead->isFollowUpDue())
                        <span class="ld-pill ms-1" style="background:#fee2e2;color:#ef4444;font-size:.65rem;">Due</span>
                    @endif
                </h6>
            </div>
            <div class="ld-panel-body">
                <form method="POST" action="{{ route('admin.crm.leads.follow-up', $lead->id) }}">
                    @csrf
                    <div class="mb-3">
                        <input type="date" name="follow_up_date" class="ld-form-control"
                               value="{{ $lead->follow_up_date?->format('Y-m-d') }}">
                        <div style="font-size:.72rem;color:#adb5bd;margin-top:5px;">
                            Set when this lead should next be contacted.
                        </div>
                    </div>
                    <button type="submit" class="ld-btn ld-btn-amber">
                        <i class="fas fa-save"></i> Save Follow-up Date
                    </button>
                </form>
                @if($lead->last_activity_at)
                <div class="mt-3 pt-3" style="border-top:1px solid #f3f4f6;font-size:.76rem;color:#adb5bd;">
                    <i class="fas fa-clock me-1"></i>Last activity {{ $lead->last_activity_at->diffForHumans() }}
                </div>
                @endif
            </div>
        </div>

        {{-- ── First Contact (New only) ───────────────────────────────── --}}
        @if($lead->status === 'new')
        <div class="ld-panel accent-blue">
            <div class="ld-panel-header">
                <h6><i class="fas fa-phone-alt me-2" style="color:#3b82f6;"></i>First Contact</h6>
            </div>
            <div class="ld-panel-body">
                <p style="font-size:.82rem;color:#6c757d;margin-bottom:14px;">
                    Record that you've made first contact with {{ $lead->name }}.
                </p>
                <form method="POST" action="{{ route('admin.crm.leads.mark-contacted', $lead->id) }}">
                    @csrf
                    <button type="submit" class="ld-btn ld-btn-primary">
                        <i class="fas fa-check"></i>Mark as Contacted
                    </button>
                </form>
            </div>
        </div>
        @endif

        {{-- ── Tour Actions ───────────────────────────────────────────── --}}
        @if(in_array($lead->status, ['contacted', 'new', 'tour_scheduled']))
        <div class="ld-panel accent-teal">
            <div class="ld-panel-header">
                <h6><i class="fas fa-calendar-check me-2" style="color:#0097a7;"></i>Tour Actions</h6>
            </div>
            <div class="ld-panel-body">
                <p style="font-size:.82rem;color:#6c757d;margin-bottom:14px;">
                    Set the confirmed tour date and time.
                    @if($lead->status !== 'tour_scheduled')
                        Status will automatically update to <strong>Tour Scheduled</strong>.
                    @endif
                </p>
                <form method="POST" action="{{ route('admin.crm.leads.tour-date', $lead->id) }}" class="mb-3">
                    @csrf
                    <div class="row g-2 mb-3">
                        <div class="col-7">
                            <label class="ld-form-label">Tour Date <span style="color:#ef4444;">*</span></label>
                            <input type="date" name="tour_date" class="ld-form-control"
                                   value="{{ $lead->tour_scheduled_at ? $lead->tour_scheduled_at->format('Y-m-d') : ($lead->preferred_date ? $lead->preferred_date->format('Y-m-d') : '') }}"
                                   required>
                        </div>
                        <div class="col-5">
                            <label class="ld-form-label">Time <span style="color:#ef4444;">*</span></label>
                            <input type="time" name="tour_time" class="ld-form-control"
                                   value="{{ $lead->tour_scheduled_at ? $lead->tour_scheduled_at->format('H:i') : '' }}"
                                   required>
                        </div>
                    </div>
                    <button type="submit" class="ld-btn ld-btn-teal">
                        <i class="fas fa-calendar-alt"></i>
                        {{ $lead->tour_scheduled_at ? 'Update Tour Date' : 'Set Tour Date' }}
                    </button>
                </form>
                <form method="POST" action="{{ route('admin.crm.leads.notify-tour', $lead->id) }}">
                    @csrf
                    <button type="submit" class="ld-btn ld-btn-ghost"
                            data-confirm="Send tour confirmation email to {{ $lead->email }}?"
                            data-confirm-title="Send Confirmation Email"
                            data-confirm-icon="📧"
                            data-confirm-btn="Send Email"
                            data-confirm-color="#0097a7">
                        <i class="fas fa-paper-plane"></i>Send Confirmation Email
                    </button>
                </form>
            </div>
        </div>
        @endif

        {{-- ── Post-Tour Actions ──────────────────────────────────────── --}}
        @if($lead->status === 'tour_completed')
        <div class="ld-panel accent-green">
            <div class="ld-panel-header">
                <h6><i class="fas fa-graduation-cap me-2" style="color:#16a34a;"></i>Post-Tour Actions</h6>
            </div>
            <div class="ld-panel-body">
                <p style="font-size:.82rem;color:#6c757d;margin-bottom:14px;">
                    Tour is complete — what's the next step for {{ $lead->child_name }}?
                </p>
                <form method="POST" action="{{ route('admin.crm.leads.start-enrol', $lead->id) }}" class="mb-0">
                    @csrf
                    <button type="submit" class="ld-btn ld-btn-success"
                            data-confirm="Send enrolment invitation link to {{ $lead->email }}?"
                            data-confirm-title="Start Enrolment"
                            data-confirm-icon="🎓"
                            data-confirm-btn="Send & Enrol"
                            data-confirm-color="#16a34a">
                        <i class="fas fa-user-plus"></i>Start Enrolment
                        <small style="font-size:.72rem;opacity:.8;font-weight:400;">Emails enrolment form link</small>
                    </button>
                </form>
                <form method="POST" action="{{ route('admin.crm.leads.waitlist', $lead->id) }}">
                    @csrf
                    <button type="submit" class="ld-btn ld-btn-amber">
                        <i class="fas fa-clock"></i>Add to Waitlist
                    </button>
                </form>
            </div>
        </div>
        @endif

        {{-- ── Mark as Lost ───────────────────────────────────────────── --}}
        @if(!in_array($lead->status, ['lost', 'converted']))
        <div class="ld-panel accent-red">
            <div class="ld-panel-header">
                <h6><i class="fas fa-times-circle me-2" style="color:#ef4444;"></i>Mark as Lost</h6>
            </div>
            <div class="ld-panel-body">
                <p style="font-size:.82rem;color:#6c757d;margin-bottom:14px;">
                    Record why this lead didn't convert.
                </p>
                <button type="button" class="ld-btn ld-btn-danger" data-bs-toggle="modal" data-bs-target="#markLostModal">
                    <i class="fas fa-times"></i>Mark as Lost…
                </button>
            </div>
        </div>
        @endif

        {{-- ── Lost Reason (if lost) ──────────────────────────────────── --}}
        @if($lead->status === 'lost' && $lead->lost_reason)
        <div class="ld-panel accent-red">
            <div class="ld-panel-body">
                <div class="ld-field-label">Lost Reason</div>
                <div class="ld-field-val" style="color:#ef4444;">
                    <i class="fas fa-times-circle me-1"></i>
                    {{ \App\Models\Lead::LOST_REASONS[$lead->lost_reason] ?? $lead->lost_reason }}
                </div>
            </div>
        </div>
        @endif

        {{-- ── Internal Notes ─────────────────────────────────────────── --}}
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6><i class="fas fa-sticky-note me-2" style="color:#d97706;"></i>Internal Notes</h6>
            </div>
            <div class="ld-panel-body">
                <form method="POST" action="{{ route('admin.crm.leads.notes', $lead->id) }}">
                    @csrf
                    <div class="mb-3">
                        <textarea name="notes" class="ld-form-control" rows="4"
                                  placeholder="Add internal notes about this lead…">{{ old('notes', $lead->notes) }}</textarea>
                    </div>
                    <button type="submit" class="ld-btn ld-btn-ghost">
                        <i class="fas fa-save"></i>Save Notes
                    </button>
                </form>
            </div>
        </div>

        {{-- ── Tasks ──────────────────────────────────────────────────── --}}
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6>
                    <i class="fas fa-tasks me-2" style="color:#6c757d;"></i>Tasks
                    @if($tasks->where('completed', false)->count() > 0)
                        <span class="ld-pill ms-1" style="background:#fef3c7;color:#d97706;font-size:.65rem;">
                            {{ $tasks->where('completed', false)->count() }} open
                        </span>
                    @endif
                </h6>
            </div>
            <div class="ld-panel-body">
                {{-- Quick-add task --}}
                <form method="POST" action="{{ route('admin.tasks.store') }}" class="mb-4">
                    @csrf
                    <input type="hidden" name="lead_id" value="{{ $lead->id }}">
                    <div class="row g-2">
                        <div class="col-8">
                            <input type="text" name="title" class="ld-form-control"
                                   placeholder="Add a task…" required>
                        </div>
                        <div class="col-4">
                            <input type="date" name="due_date" class="ld-form-control">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="ld-btn ld-btn-ghost" style="padding:8px;">
                                <i class="fas fa-plus"></i>Add Task
                            </button>
                        </div>
                    </div>
                </form>

                @forelse($tasks as $task)
                <div class="ld-task-row {{ $task->isOverdue() ? 'text-danger' : '' }}" id="task-row-{{ $task->id }}">
                    <button type="button" class="ld-task-toggle ajax-toggle-task" data-task-id="{{ $task->id }}">
                        <i class="fas fa-{{ $task->completed ? 'check-circle text-success' : 'circle' }}"
                           id="task-icon-{{ $task->id }}"
                           style="{{ $task->completed ? '' : 'color:#d1d5db;' }}" ></i>
                    </button>
                    <div class="flex-grow-1">
                        <div class="ld-task-title {{ $task->completed ? 'text-decoration-line-through text-muted' : '' }}">
                            {{ $task->title }}
                        </div>
                        @if($task->due_date)
                        <div class="ld-task-due {{ $task->isOverdue() ? 'text-danger' : '' }}">
                            {{ $task->due_date->format('d M Y') }}
                        </div>
                        @endif
                    </div>
                    <button type="button" class="btn btn-sm p-0 border-0 bg-transparent"
                            style="color:#adb5bd;"
                            data-bs-toggle="modal" data-bs-target="#editLeadTask{{ $task->id }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="POST" action="{{ route('admin.tasks.destroy', $task->id) }}" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent"
                                style="color:#adb5bd;"
                                data-confirm="This task will be permanently deleted."
                                data-confirm-title="Delete Task"
                                data-confirm-icon="🗑️"
                                data-confirm-btn="Delete"
                                data-confirm-color="#ef4444">
                            <i class="fas fa-times"></i>
                        </button>
                    </form>
                </div>
                @empty
                <div class="text-center py-3" style="font-size:.82rem;color:#adb5bd;">No tasks yet.</div>
                @endforelse
            </div>
        </div>

    </div>
</div>

{{-- ── Edit Task Modals ────────────────────────────────────────────────── --}}
@foreach($tasks as $task)
<div class="modal fade" id="editLeadTask{{ $task->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border:none;border-radius:16px;overflow:hidden;">
            <form method="POST" action="{{ route('admin.tasks.update', $task->id) }}">
                @csrf @method('PUT')
                <div class="modal-header border-0" style="padding:20px 24px 0;">
                    <h5 class="modal-title fw-bold" style="font-size:.95rem;color:#1a1f2e;">Edit Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="padding:20px 24px;">
                    <div class="mb-3">
                        <label class="ld-form-label">Title <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="title" class="ld-form-control" value="{{ $task->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="ld-form-label">Description</label>
                        <input type="text" name="description" class="ld-form-control" value="{{ $task->description }}">
                    </div>
                    <div class="mb-3">
                        <label class="ld-form-label">Due Date</label>
                        <input type="date" name="due_date" class="ld-form-control"
                               value="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}">
                    </div>
                    <input type="hidden" name="lead_id" value="{{ $lead->id }}">
                </div>
                <div class="modal-footer border-0" style="padding:0 24px 20px;">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm rounded-pill px-3 text-white" style="background:#0077B6;">
                        <i class="fas fa-save me-1"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- ── Mark as Lost Modal ──────────────────────────────────────────────── --}}
<div class="modal fade" id="markLostModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border:none;border-radius:16px;overflow:hidden;">
            <form method="POST" action="{{ route('admin.crm.leads.mark-lost', $lead->id) }}">
                @csrf
                <div class="modal-header border-0" style="padding:20px 24px 0;">
                    <h5 class="modal-title fw-bold" style="color:#ef4444;font-size:.95rem;">
                        <i class="fas fa-times-circle me-2"></i>Mark as Lost
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="padding:16px 24px 20px;">
                    <p style="font-size:.82rem;color:#6c757d;margin-bottom:14px;">
                        Select the reason this lead didn't convert to help improve follow-up patterns.
                    </p>
                    <div class="mb-3">
                        <label class="ld-form-label">Reason <span style="color:#ef4444;">*</span></label>
                        <select name="lost_reason" class="ld-form-select" required>
                            <option value="">Select a reason…</option>
                            @foreach(\App\Models\Lead::LOST_REASONS as $key => $label)
                                <option value="{{ $key }}">{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-0" style="padding:0 24px 20px;">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm rounded-pill px-3"
                            style="background:#ef4444;color:#fff;border:none;">
                        <i class="fas fa-times me-1"></i>Mark as Lost
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    document.querySelectorAll('.ajax-toggle-task').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var taskId = this.dataset.taskId;
            var icon   = document.getElementById('task-icon-' + taskId);
            var row    = document.getElementById('task-row-' + taskId);
            var title  = row.querySelector('.ld-task-title');

            fetch('/admin/tasks/' + taskId + '/toggle', {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            }).then(r => r.json()).then(function(data) {
                var done = icon.classList.contains('fa-circle');
                icon.classList.toggle('fa-circle',       !done);
                icon.classList.toggle('fa-check-circle', done);
                icon.classList.toggle('text-success',    done);
                icon.style.color = done ? '' : '#d1d5db';
                if (title) {
                    title.classList.toggle('text-decoration-line-through', done);
                    title.classList.toggle('text-muted', done);
                }
                showToast(done ? 'Task completed' : 'Task reopened');
            }).catch(() => showToast('Failed to toggle task', 'error'));
        });
    });
});
</script>
@endpush
