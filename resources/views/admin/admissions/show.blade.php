@extends('layouts.admin')

@section('title', 'Application — ' . $application->reference)

@push('styles')
<style>
/* ── Panel ───────────────────────────────────────────────────────────── */
.app-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden;
    margin-bottom: 20px;
}
.app-panel-header {
    padding: 15px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.app-panel-header h6 { margin: 0; font-weight: 700; font-size: .88rem; color: #1a1f2e; }
.app-panel-body { padding: 20px 22px; }

/* ── Section label ───────────────────────────────────────────────────── */
.app-section-label {
    font-size: .63rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: 1px; color: #adb5bd; margin-bottom: 12px; padding-bottom: 8px;
    border-bottom: 1px solid #f3f4f6;
}

/* ── Field rows ──────────────────────────────────────────────────────── */
.app-row {
    display: flex; gap: 8px; padding: 7px 0;
    border-bottom: 1px solid #f8f8f8;
}
.app-row:last-child { border-bottom: none; }
.app-row-label {
    font-size: .74rem; color: #adb5bd; min-width: 100px;
    flex-shrink: 0; font-weight: 600;
}
.app-row-val {
    font-size: .85rem; color: #1a1f2e; font-weight: 600;
}
.app-row-val a { color: #0077B6; text-decoration: none; }
.app-row-val a:hover { text-decoration: underline; }

/* ── Consent checks ──────────────────────────────────────────────────── */
.app-consent {
    display: flex; align-items: center; gap: 8px;
    padding: 6px 0; font-size: .82rem; color: #374151;
}

/* ── Timeline ────────────────────────────────────────────────────────── */
.app-timeline-step {
    display: flex; gap: 12px; padding: 8px 0;
    position: relative;
}
.app-timeline-step + .app-timeline-step::before {
    content: ''; position: absolute;
    left: 5px; top: -8px; width: 2px; height: 10px;
    background: #f3f4f6;
}
.app-tl-dot {
    width: 12px; height: 12px; border-radius: 50%;
    flex-shrink: 0; margin-top: 3px;
}
.app-tl-label { font-size: .82rem; font-weight: 600; color: #1a1f2e; }
.app-tl-date  { font-size: .72rem; color: #adb5bd; margin-top: 1px; }

/* ── Document buttons ────────────────────────────────────────────────── */
.app-doc-btn {
    display: flex; align-items: center; gap: 12px;
    padding: 11px 14px; background: #fafafa;
    border-radius: 10px; text-decoration: none; color: #374151;
    border: 1px solid #e5e7eb; transition: all .15s; margin-bottom: 8px;
}
.app-doc-btn:last-child { margin-bottom: 0; }
.app-doc-btn:hover { background: #eff6ff; border-color: #bfdbfe; color: #0077B6; }
.app-doc-icon {
    width: 34px; height: 34px; border-radius: 8px;
    background: #0077B6; display: flex; align-items: center;
    justify-content: center; flex-shrink: 0;
}
.app-doc-icon i { color: #fff; font-size: .8rem; }
.app-doc-name { font-size: .82rem; font-weight: 700; color: inherit; }
.app-doc-sub  { font-size: .7rem; color: #adb5bd; margin-top: 1px; }
.app-doc-btn.missing { opacity: .45; pointer-events: none; }
.app-doc-btn.missing .app-doc-icon { background: #d1d5db; }

/* ── Status pill ─────────────────────────────────────────────────────── */
.app-status-pill {
    font-size: .82rem; font-weight: 700; border-radius: 20px;
    padding: 5px 16px; display: inline-block;
}

/* ── Action buttons ──────────────────────────────────────────────────── */
.app-btn {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    width: 100%; padding: 11px 16px; border-radius: 10px;
    font-size: .84rem; font-weight: 700; cursor: pointer;
    border: none; transition: all .2s; text-decoration: none; margin-bottom: 8px;
}
.app-btn:last-child { margin-bottom: 0; }
.app-btn-success { background: #16a34a; color: #fff; }
.app-btn-success:hover { background: #15803d; color: #fff; }
.app-btn-primary { background: #0077B6; color: #fff; }
.app-btn-primary:hover { background: #005f93; color: #fff; }
.app-btn-ghost   { background: #f3f4f6; color: #374151; border: 1.5px solid #e5e7eb; }
.app-btn-ghost:hover { background: #e5e7eb; }
.app-btn-danger  { background: #fee2e2; color: #ef4444; border: 1.5px solid #fecaca; }
.app-btn-danger:hover { background: #fecaca; }

/* ── Contact buttons ─────────────────────────────────────────────────── */
.app-contact-btn {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 14px; border-radius: 10px;
    border: 1.5px solid #e5e7eb; background: #fafafa;
    text-decoration: none; color: #374151; font-size: .83rem; font-weight: 600;
    transition: all .15s; margin-bottom: 8px;
}
.app-contact-btn:last-child { margin-bottom: 0; }
.app-contact-btn:hover { background: #f0fdf4; border-color: #86efac; color: #16a34a; }
.app-contact-btn.email:hover { background: #eff6ff; border-color: #bfdbfe; color: #0077B6; }

/* ── Portal status boxes ─────────────────────────────────────────────── */
.app-portal-box {
    border-radius: 10px; padding: 14px 16px; margin-top: 14px; font-size: .82rem;
}
.app-portal-box--active  { background: #f0fdf4; border: 1px solid #86efac; }
.app-portal-box--pending { background: #fffbeb; border: 1px solid #fde68a; }

/* ── Lead origin card ────────────────────────────────────────────────── */
.app-lead-card {
    background: #f0fdf4; border-radius: 10px; padding: 14px;
    border: 1px solid #dcfce7; margin-bottom: 14px;
}

/* ── Notes textarea ──────────────────────────────────────────────────── */
.app-textarea {
    font-size: .84rem; border: 1.5px solid #e5e7eb;
    border-radius: 10px; padding: 10px 14px; background: #fafafa;
    color: #374151; transition: border-color .2s; width: 100%; resize: vertical; min-height: 96px;
}
.app-textarea:focus { border-color: #0077B6; box-shadow: 0 0 0 3px rgba(0,119,182,.08); background: #fff; outline: none; }
</style>
@endpush

@section('content')

{{-- ── Page Header ─────────────────────────────────────────────────────── --}}
@php
    $stMap = [
        'pending'      => ['#fff7ed','#d97706'],
        'under_review' => ['#f5f3ff','#7c3aed'],
        'approved'     => ['#dcfce7','#16a34a'],
        'waitlist'     => ['#f3f4f6','#6c757d'],
        'rejected'     => ['#fee2e2','#ef4444'],
    ];
    [$stBg,$stClr] = $stMap[$application->status] ?? ['#f3f4f6','#6c757d'];
@endphp
<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <ul style="list-style:none;padding:0;margin:0 0 8px;display:flex;gap:6px;font-size:.76rem;color:#adb5bd;">
            <li><a href="{{ route('admin.admissions.index') }}" style="color:#0077B6;text-decoration:none;">Admissions</a></li>
            <li>/ {{ $application->reference }}</li>
        </ul>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            {{ $application->child_name }}
            <span class="app-status-pill ms-2" style="background:{{ $stBg }};color:{{ $stClr }};font-size:.72rem;">
                {{ $application->statusLabel() }}
            </span>
        </h4>
        <p style="font-size:.82rem;color:#adb5bd;margin:0;">
            <code style="font-size:.78rem;color:#0077B6;">{{ $application->reference }}</code>
            &bull; Submitted {{ $application->created_at->format('d M Y, H:i') }}
        </p>
    </div>
    <a href="{{ route('admin.admissions.index') }}"
       class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
        <i class="fas fa-arrow-left me-1"></i>Back
    </a>
</div>

<div class="row g-4">

{{-- ════ LEFT — Application Data ════ --}}
<div class="col-lg-7">

    {{-- Programme --}}
    <div class="app-panel">
        <div class="app-panel-header">
            <h6><i class="fas fa-graduation-cap me-2" style="color:#7c3aed;"></i>Programme Selection</h6>
        </div>
        <div class="app-panel-body">
            <div class="app-row"><span class="app-row-label">Programme</span><span class="app-row-val">{{ $application->program_name }}</span></div>
            <div class="app-row"><span class="app-row-label">Fee Option</span><span class="app-row-val">{{ $application->fee_option_name }}</span></div>
            <div class="app-row"><span class="app-row-label">Start Date</span><span class="app-row-val">{{ $application->start_date->format('d F Y') }}</span></div>
            <div class="app-row"><span class="app-row-label">Snack Box</span><span class="app-row-val">{{ $application->snack_box ? 'Yes (+R400/month)' : 'No' }}</span></div>
        </div>
    </div>

    {{-- Child --}}
    <div class="app-panel">
        <div class="app-panel-header">
            <h6><i class="fas fa-child me-2" style="color:#0097a7;"></i>Child Information</h6>
        </div>
        <div class="app-panel-body">
            <div class="app-row"><span class="app-row-label">Full Name</span><span class="app-row-val">{{ $application->child_name }}</span></div>
            @if($application->child_nickname)
            <div class="app-row"><span class="app-row-label">Nickname</span><span class="app-row-val">{{ $application->child_nickname }}</span></div>
            @endif
            <div class="app-row"><span class="app-row-label">Date of Birth</span><span class="app-row-val">{{ $application->child_dob->format('d F Y') }} <span style="color:#adb5bd;font-weight:400;">(Age: {{ $application->child_dob->age }})</span></span></div>
            <div class="app-row"><span class="app-row-label">Gender</span><span class="app-row-val">{{ ucfirst($application->child_gender) }}</span></div>
            <div class="app-row"><span class="app-row-label">ID Number</span><span class="app-row-val">{{ $application->child_id_number ?? '—' }}</span></div>
            <div class="app-row"><span class="app-row-label">Home Language</span><span class="app-row-val">{{ $application->child_language ?? '—' }}</span></div>
            @if($application->formValue('child_religion'))
            <div class="app-row"><span class="app-row-label">Religion</span><span class="app-row-val">{{ $application->formValue('child_religion') }}</span></div>
            @endif
            @if($application->formValue('previous_school'))
            <div class="app-row"><span class="app-row-label">Previous School</span><span class="app-row-val">{{ $application->formValue('previous_school') }}</span></div>
            @endif
            @if($application->formValue('has_second_child') === 'yes' && $application->formValue('child2_name'))
            <div class="mt-3 pt-2" style="border-top:1px dashed #e5e7eb;">
                <div class="app-section-label" style="margin-top:0;">Second Child</div>
                <div class="app-row"><span class="app-row-label">Full Name</span><span class="app-row-val">{{ $application->formValue('child2_name') }}</span></div>
                <div class="app-row"><span class="app-row-label">Date of Birth</span><span class="app-row-val">{{ $application->formValue('child2_dob') }}</span></div>
                <div class="app-row"><span class="app-row-label">Gender</span><span class="app-row-val">{{ ucfirst($application->formValue('child2_gender') ?? '') }}</span></div>
            </div>
            @endif
        </div>
    </div>

    {{-- Parents --}}
    <div class="app-panel">
        <div class="app-panel-header">
            <h6><i class="fas fa-users me-2" style="color:#3b82f6;"></i>Parent / Guardian Information</h6>
        </div>
        <div class="app-panel-body">
            <div class="row g-0">
                {{-- Mother --}}
                <div class="{{ $application->father_name ? 'col-md-6' : 'col-12' }}"
                     style="{{ $application->father_name ? 'border-right:1px solid #f3f4f6;' : '' }} padding-right: {{ $application->father_name ? '20px' : '0' }};">
                    <div style="display:flex;align-items:center;gap:8px;margin-bottom:14px;">
                        <div style="width:28px;height:28px;border-radius:8px;background:#fdf2f8;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-female" style="color:#be185d;font-size:.75rem;"></i>
                        </div>
                        <span style="font-size:.67rem;font-weight:800;text-transform:uppercase;letter-spacing:1px;color:#be185d;">Mother / Guardian 1</span>
                    </div>
                    <div class="app-row"><span class="app-row-label">Full Name</span><span class="app-row-val">{{ $application->mother_name }}</span></div>
                    <div class="app-row"><span class="app-row-label">ID Number</span><span class="app-row-val">{{ $application->formValue('mother_id', '—') }}</span></div>
                    <div class="app-row"><span class="app-row-label">Cell</span><span class="app-row-val"><a href="tel:{{ $application->mother_cell }}">{{ $application->mother_cell }}</a></span></div>
                    <div class="app-row"><span class="app-row-label">Email</span><span class="app-row-val"><a href="mailto:{{ $application->mother_email }}">{{ $application->mother_email }}</a></span></div>
                    @if($application->formValue('mother_occupation'))
                    <div class="app-row"><span class="app-row-label">Occupation</span><span class="app-row-val">{{ $application->formValue('mother_occupation') }}</span></div>
                    @endif
                </div>

                {{-- Father --}}
                @if($application->father_name)
                <div class="col-md-6" style="padding-left:20px;">
                    <div style="display:flex;align-items:center;gap:8px;margin-bottom:14px;">
                        <div style="width:28px;height:28px;border-radius:8px;background:#eff6ff;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-male" style="color:#1d4ed8;font-size:.75rem;"></i>
                        </div>
                        <span style="font-size:.67rem;font-weight:800;text-transform:uppercase;letter-spacing:1px;color:#1d4ed8;">Father / Guardian 2</span>
                    </div>
                    <div class="app-row"><span class="app-row-label">Full Name</span><span class="app-row-val">{{ $application->father_name }}</span></div>
                    <div class="app-row"><span class="app-row-label">ID Number</span><span class="app-row-val">{{ $application->formValue('father_id', '—') }}</span></div>
                    @if($application->father_cell)
                    <div class="app-row"><span class="app-row-label">Cell</span><span class="app-row-val"><a href="tel:{{ $application->father_cell }}">{{ $application->father_cell }}</a></span></div>
                    @endif
                    @if($application->father_email)
                    <div class="app-row"><span class="app-row-label">Email</span><span class="app-row-val"><a href="mailto:{{ $application->father_email }}">{{ $application->father_email }}</a></span></div>
                    @endif
                </div>
                @endif
            </div>
            @if($application->formValue('home_address'))
            <div class="mt-3 pt-3" style="border-top:1px solid #f3f4f6;">
                <div class="app-row"><span class="app-row-label">Home Address</span><span class="app-row-val">{{ $application->formValue('home_address') }}</span></div>
                @if($application->formValue('home_tel'))
                <div class="app-row"><span class="app-row-label">Home Tel</span><span class="app-row-val">{{ $application->formValue('home_tel') }}</span></div>
                @endif
            </div>
            @endif
        </div>
    </div>

    {{-- Medical --}}
    <div class="app-panel">
        <div class="app-panel-header">
            <h6><i class="fas fa-heartbeat me-2" style="color:#ef4444;"></i>Medical &amp; Emergency</h6>
        </div>
        <div class="app-panel-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="app-section-label">Emergency Contact</div>
                    <div class="app-row"><span class="app-row-label">Name</span><span class="app-row-val">{{ $application->formValue('emergency_name', '—') }}</span></div>
                    <div class="app-row"><span class="app-row-label">Tel</span><span class="app-row-val">{{ $application->formValue('emergency_tel', '—') }}</span></div>
                </div>
                <div class="col-md-6">
                    <div class="app-section-label">Doctor</div>
                    <div class="app-row"><span class="app-row-label">Name</span><span class="app-row-val">{{ $application->formValue('doctor_name', '—') }}</span></div>
                    <div class="app-row"><span class="app-row-label">Tel</span><span class="app-row-val">{{ $application->formValue('doctor_tel', '—') }}</span></div>
                </div>
            </div>
            @if($application->formValue('medical_aid'))
            <div class="mt-3 pt-2" style="border-top:1px solid #f3f4f6;">
                <div class="app-row"><span class="app-row-label">Medical Aid</span><span class="app-row-val">{{ $application->formValue('medical_aid') }}{{ $application->formValue('medical_aid_number') ? ' — '.$application->formValue('medical_aid_number') : '' }}</span></div>
            </div>
            @endif
            @foreach(['allergies'=>'Allergies','operations'=>'Operations','diseases'=>'Diseases','other_details'=>'Other Details'] as $key => $label)
                @if($application->formValue($key))
                <div class="app-row"><span class="app-row-label">{{ $label }}</span><span class="app-row-val">{{ $application->formValue($key) }}</span></div>
                @endif
            @endforeach
        </div>
    </div>

    {{-- Consents --}}
    <div class="app-panel">
        <div class="app-panel-header">
            <h6><i class="fas fa-file-signature me-2" style="color:#16a34a;"></i>Consents &amp; Signature</h6>
        </div>
        <div class="app-panel-body">
            @php
                $consents = [
                    'consent_fees'      => 'Fee Agreement',
                    'consent_medical'   => 'Medical Treatment',
                    'consent_indemnity' => 'Indemnity Waiver',
                    'consent_photos'    => 'Photography & Media',
                    'consent_sleepover' => 'Sleepover Permission',
                    'consent_popia'     => 'POPIA Consent',
                ];
            @endphp
            <div class="row g-1 mb-3">
                @foreach($consents as $key => $label)
                <div class="col-6">
                    <div class="app-consent">
                        @if($application->formValue($key))
                            <i class="fas fa-check-circle" style="color:#16a34a;font-size:.9rem;"></i>
                        @else
                            <i class="fas fa-times-circle" style="color:#ef4444;font-size:.9rem;"></i>
                        @endif
                        {{ $label }}
                    </div>
                </div>
                @endforeach
            </div>
            <div style="border-top:1px solid #f3f4f6;padding-top:12px;">
                <div class="app-row"><span class="app-row-label">Signed by</span><span class="app-row-val">{{ $application->formValue('signature') }}</span></div>
                <div class="app-row"><span class="app-row-label">Signature Date</span><span class="app-row-val">{{ $application->formValue('signature_date') }}</span></div>
            </div>
        </div>
    </div>

</div>

{{-- ════ RIGHT — Admin Actions ════ --}}
<div class="col-lg-5">

    {{-- Status + Timeline + Actions --}}
    <div class="app-panel">
        <div class="app-panel-header">
            <h6><i class="fas fa-tag me-2" style="color:#7c3aed;"></i>Application Status</h6>
            <span class="app-status-pill" style="background:{{ $stBg }};color:{{ $stClr }};">{{ $application->statusLabel() }}</span>
        </div>
        <div class="app-panel-body">
            {{-- Timeline --}}
            @php
                $timeline = [
                    ['label'=>'Submitted',    'date'=>$application->created_at,                                              'done'=>true],
                    ['label'=>'Under Review', 'date'=>$application->reviewed_at,                                             'done'=>(bool)$application->reviewed_at],
                    ['label'=>'Decision',     'date'=>$application->approved_at ?? $application->rejected_at,                'done'=>in_array($application->status,['approved','rejected','waitlist'])],
                    ['label'=>'Invited',      'date'=>$application->invited_at,                                              'done'=>(bool)$application->invited_at],
                ];
            @endphp
            <div class="mb-4">
                @foreach($timeline as $step)
                <div class="app-timeline-step">
                    <div class="app-tl-dot" style="background:{{ $step['done'] ? '#16a34a' : '#e5e7eb' }};"></div>
                    <div>
                        <div class="app-tl-label" style="{{ $step['done'] ? '' : 'color:#adb5bd;font-weight:400;' }}">{{ $step['label'] }}</div>
                        @if($step['date'])
                            <div class="app-tl-date">{{ $step['date']->format('d M Y, H:i') }}</div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Action buttons --}}
            @if($application->isActionable())
            <form action="{{ route('admin.admissions.approve', $application->id) }}" method="POST" class="mb-0">
                @csrf
                <button class="app-btn app-btn-success"><i class="fas fa-check"></i>Approve Application</button>
            </form>
            <form action="{{ route('admin.admissions.waitlist', $application->id) }}" method="POST" class="mb-0">
                @csrf
                <button class="app-btn app-btn-ghost"><i class="fas fa-clock"></i>Add to Waitlist</button>
            </form>
            <button class="app-btn app-btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">
                <i class="fas fa-times"></i>Reject
            </button>
            @endif

            @if($application->status === 'approved' && !$application->invited_at)
            <button class="app-btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#inviteModal">
                <i class="fas fa-paper-plane"></i>Send Portal Invitation
            </button>
            @endif

            {{-- Portal status --}}
            @if($application->parentUser)
            <div class="app-portal-box app-portal-box--active">
                <div class="d-flex align-items-center gap-2 mb-1">
                    <i class="fas fa-user-check" style="color:#16a34a;"></i>
                    <strong style="color:#16a34a;">Parent portal active</strong>
                </div>
                <div style="font-size:.82rem;color:#374151;">{{ $application->parentUser->name }}</div>
                <div style="font-size:.76rem;color:#adb5bd;">{{ $application->parentUser->email }}</div>
                <button class="app-btn app-btn-ghost mt-3" style="padding:8px;" data-bs-toggle="modal" data-bs-target="#inviteModal">
                    <i class="fas fa-redo"></i>Re-send Invitation
                </button>
            </div>
            @elseif($application->invited_at)
            <div class="app-portal-box app-portal-box--pending">
                <div class="d-flex align-items-center gap-2 mb-1">
                    <i class="fas fa-hourglass-half" style="color:#d97706;"></i>
                    <strong style="color:#d97706;">Invitation pending</strong>
                </div>
                <div style="font-size:.76rem;color:#adb5bd;">Sent {{ $application->invited_at->format('d M Y, H:i') }}</div>
                <div style="font-size:.76rem;color:#adb5bd;margin-top:2px;">Parent has not registered yet</div>
                <button class="app-btn app-btn-ghost mt-3" style="padding:8px;" data-bs-toggle="modal" data-bs-target="#inviteModal">
                    <i class="fas fa-paper-plane"></i>Re-send Invitation
                </button>
            </div>
            @endif
        </div>
    </div>

    {{-- Linked Lead --}}
    @if($application->lead)
    @php
        $lead = $application->lead;
        $ldStMap = ['tour_scheduled'=>['#e0f7fa','#0097a7'],'tour_completed'=>['#f5f3ff','#7c3aed'],'converted'=>['#dcfce7','#16a34a'],'waitlist'=>['#f3f4f6','#6c757d'],'lost'=>['#fee2e2','#ef4444']];
        [$ldBg,$ldClr] = $ldStMap[$lead->status] ?? ['#f3f4f6','#6c757d'];
        $srcMap = ['google'=>['#fee2e2','#ef4444'],'facebook'=>['#dbeafe','#3b82f6'],'instagram'=>['#fef3c7','#d97706'],'referral'=>['#dcfce7','#16a34a'],'other'=>['#f3f4f6','#6c757d']];
        [$sBg,$sClr] = $srcMap[$lead->source] ?? ['#f3f4f6','#6c757d'];
    @endphp
    <div class="app-panel">
        <div class="app-panel-header">
            <h6><i class="fas fa-funnel-dollar me-2" style="color:#16a34a;"></i>Originated from Lead Pipeline</h6>
            <span style="font-size:.68rem;font-weight:700;border-radius:20px;padding:2px 9px;background:{{ $ldBg }};color:{{ $ldClr }};">
                {{ ucwords(str_replace('_',' ',$lead->status)) }}
            </span>
        </div>
        <div class="app-panel-body">
            <div class="app-lead-card">
                <div class="fw-semibold mb-1" style="color:#1a1f2e;">{{ $lead->name }}</div>
                <code style="font-size:.76rem;color:#16a34a;">{{ $lead->reference }}</code>
            </div>
            <div class="app-row"><span class="app-row-label">Phone</span><span class="app-row-val"><a href="tel:{{ $lead->phone }}">{{ $lead->phone }}</a></span></div>
            <div class="app-row"><span class="app-row-label">Source</span><span class="app-row-val">
                @if($lead->source)
                    <span style="font-size:.7rem;font-weight:700;border-radius:20px;padding:2px 8px;background:{{ $sBg }};color:{{ $sClr }};">{{ ucfirst($lead->source) }}</span>
                @else —
                @endif
            </span></div>
            <div class="app-row"><span class="app-row-label">Submitted</span><span class="app-row-val">{{ $lead->created_at->format('d M Y') }}</span></div>
            @if($lead->assignee)
            <div class="app-row"><span class="app-row-label">Assigned to</span><span class="app-row-val">{{ $lead->assignee->name }}</span></div>
            @endif
            <a href="{{ route('admin.crm.leads.show', $lead) }}" class="app-btn app-btn-ghost mt-3" style="margin-bottom:0;">
                <i class="fas fa-external-link-alt"></i>View in Lead Pipeline
            </a>
        </div>
    </div>
    @endif

    {{-- Documents --}}
    <div class="app-panel">
        <div class="app-panel-header">
            <h6><i class="fas fa-folder-open me-2" style="color:#d97706;"></i>Documents</h6>
            @php
                // Merge child record docs over application docs so parent-portal uploads are visible
                $effectiveDocs = array_merge(
                    $application->documents ?? [],
                    $application->child?->documents ?? []
                );
                $dc = count(array_filter($effectiveDocs));
            @endphp
            <span style="font-size:.72rem;font-weight:700;color:{{ $dc >= 3 ? '#16a34a' : ($dc > 0 ? '#d97706' : '#ef4444') }};">{{ $dc }}/4 uploaded</span>
        </div>
        <div class="app-panel-body">
            @php
                $docTypes = [
                    'pdf'               => ['label'=>'Application PDF',              'icon'=>'fa-file-pdf'],
                    'birth_certificate' => ['label'=>'Birth Certificate',            'icon'=>'fa-baby'],
                    'clinic_card'       => ['label'=>'Clinic / Road to Health Card', 'icon'=>'fa-notes-medical'],
                    'parent_ids'        => ['label'=>'Parent IDs',                   'icon'=>'fa-id-card'],
                    'proof_address'     => ['label'=>'Proof of Address',             'icon'=>'fa-home'],
                ];
            @endphp
            @foreach($docTypes as $type => $meta)
            @php
                $exists = $type === 'pdf' ? (bool)$application->pdf_path : !empty($effectiveDocs[$type]);
            @endphp
            @if($exists)
            <a href="{{ route('admin.admissions.document', [$application->id, $type]) }}"
               class="app-doc-btn" target="_blank">
                <div class="app-doc-icon"><i class="fas {{ $meta['icon'] }}"></i></div>
                <div class="flex-grow-1">
                    <div class="app-doc-name">{{ $meta['label'] }}</div>
                    <div class="app-doc-sub">Click to view</div>
                </div>
                <i class="fas fa-eye" style="color:#adb5bd;"></i>
            </a>
            @else
            <div class="app-doc-btn missing">
                <div class="app-doc-icon"><i class="fas {{ $meta['icon'] }}"></i></div>
                <div class="flex-grow-1">
                    <div class="app-doc-name">{{ $meta['label'] }}</div>
                    <div class="app-doc-sub">Not uploaded</div>
                </div>
                <i class="fas fa-minus" style="color:#d1d5db;"></i>
            </div>
            @endif
            @endforeach
        </div>
    </div>

    {{-- Internal Notes --}}
    <div class="app-panel">
        <div class="app-panel-header">
            <h6><i class="fas fa-sticky-note me-2" style="color:#d97706;"></i>Internal Notes</h6>
        </div>
        <div class="app-panel-body">
            <form action="{{ route('admin.admissions.notes', $application->id) }}" method="POST">
                @csrf
                <textarea name="admin_notes" class="app-textarea mb-3"
                          placeholder="Add internal notes about this application…">{{ old('admin_notes', $application->admin_notes) }}</textarea>
                <button type="submit" class="app-btn app-btn-ghost" style="margin-bottom:0;">
                    <i class="fas fa-save"></i>Save Notes
                </button>
            </form>
        </div>
    </div>

    {{-- Quick Contact --}}
    <div class="app-panel">
        <div class="app-panel-header">
            <h6><i class="fas fa-address-book me-2" style="color:#0097a7;"></i>Quick Contact</h6>
        </div>
        <div class="app-panel-body">
            <a href="mailto:{{ $application->mother_email }}" class="app-contact-btn email">
                <i class="fas fa-envelope" style="color:#3b82f6;width:16px;text-align:center;"></i>
                Email {{ $application->mother_name }}
            </a>
            @php
                $waCell = preg_replace('/[^0-9]/','', $application->mother_cell);
                if(str_starts_with($waCell,'0')) $waCell = '27'.substr($waCell,1);
            @endphp
            <a href="https://wa.me/{{ $waCell }}" target="_blank" class="app-contact-btn">
                <i class="fab fa-whatsapp" style="color:#16a34a;width:16px;text-align:center;"></i>
                WhatsApp {{ $application->mother_cell }}
            </a>
            @if($application->father_cell)
            @php
                $waFather = preg_replace('/[^0-9]/','', $application->father_cell);
                if(str_starts_with($waFather,'0')) $waFather = '27'.substr($waFather,1);
            @endphp
            <a href="https://wa.me/{{ $waFather }}" target="_blank" class="app-contact-btn">
                <i class="fab fa-whatsapp" style="color:#16a34a;width:16px;text-align:center;"></i>
                WhatsApp {{ $application->father_name }}
            </a>
            @endif
        </div>
    </div>

</div>
</div>

{{-- ── Reject Modal ─────────────────────────────────────────────────────── --}}
@if($application->isActionable())
<div class="modal fade" id="rejectModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border:none;border-radius:16px;overflow:hidden;">
            <div class="modal-header border-0" style="padding:20px 24px 0;">
                <h5 class="modal-title fw-bold" style="font-size:.95rem;color:#ef4444;">
                    <i class="fas fa-times-circle me-2"></i>Reject Application
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.admissions.reject', $application->id) }}" method="POST">
                @csrf
                <div class="modal-body" style="padding:16px 24px;">
                    <p style="font-size:.84rem;color:#6c757d;margin-bottom:12px;">
                        Rejecting application for <strong style="color:#1a1f2e;">{{ $application->child_name }}</strong>.
                    </p>
                    <label style="font-size:.72rem;font-weight:700;color:#6c757d;text-transform:uppercase;letter-spacing:.4px;margin-bottom:6px;display:block;">Reason <span style="color:#adb5bd;font-weight:400;">optional</span></label>
                    <textarea name="reason" rows="3" class="app-textarea" placeholder="e.g. No capacity for the requested start date…"></textarea>
                </div>
                <div class="modal-footer border-0" style="padding:0 24px 20px;gap:8px;">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm rounded-pill px-3" style="background:#ef4444;color:#fff;border:none;">
                        <i class="fas fa-times me-1"></i>Confirm Rejection
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

{{-- ── Invite Modal ─────────────────────────────────────────────────────── --}}
@if($application->status === 'approved')
<div class="modal fade" id="inviteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border:none;border-radius:16px;overflow:hidden;">
            <div class="modal-header border-0" style="padding:20px 24px 0;">
                <h5 class="modal-title fw-bold" style="font-size:.95rem;color:#1a1f2e;">
                    <i class="fas fa-paper-plane me-2" style="color:#0077B6;"></i>
                    {{ $application->invited_at ? 'Re-send Portal Invitation' : 'Send Portal Invitation' }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.admissions.invite', $application->id) }}" method="POST">
                @csrf
                <div class="modal-body" style="padding:16px 24px;">
                    @if($application->parentUser)
                    <div style="background:#fff7ed;border:1px solid #fde68a;border-radius:10px;padding:12px;font-size:.82rem;color:#d97706;margin-bottom:14px;">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>{{ $application->parentUser->name }}</strong> already has an active portal account.
                    </div>
                    @elseif($application->invited_at)
                    <div style="background:#fff7ed;border:1px solid #fde68a;border-radius:10px;padding:12px;font-size:.82rem;color:#d97706;margin-bottom:14px;">
                        <i class="fas fa-hourglass-half me-2"></i>
                        Invitation sent <strong>{{ $application->invited_at->format('d M Y') }}</strong> — parent has not registered yet. A new link will replace the old one.
                    </div>
                    @else
                    <p style="font-size:.82rem;color:#6c757d;margin-bottom:14px;">
                        An invitation email will be sent with a link to set up the parent portal account. The link is valid for <strong>7 days</strong>.
                    </p>
                    @endif
                    <label style="font-size:.72rem;font-weight:700;color:#6c757d;text-transform:uppercase;letter-spacing:.4px;margin-bottom:6px;display:block;">Parent Email</label>
                    <input type="email" name="email"
                           style="font-size:.84rem;border:1.5px solid #e5e7eb;border-radius:10px;padding:10px 14px;background:#fafafa;width:100%;"
                           value="{{ $application->mother_email }}" required>
                    <div style="font-size:.72rem;color:#adb5bd;margin-top:5px;">Change to use a different address if needed.</div>
                    <div style="background:#eff6ff;border:1px solid #dbeafe;border-radius:10px;padding:12px;font-size:.8rem;color:#3b82f6;margin-top:12px;">
                        <i class="fas fa-info-circle me-2"></i>
                        After registering, the parent receives a welcome onboarding email. This invitation is linked to <strong>{{ $application->child_name }}'s</strong> application.
                    </div>
                </div>
                <div class="modal-footer border-0" style="padding:0 24px 20px;gap:8px;">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm rounded-pill px-3 text-white" style="background:#0077B6;border:none;">
                        <i class="fas fa-paper-plane me-1"></i>{{ $application->invited_at ? 'Re-send Invitation' : 'Send Invitation' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@endsection
