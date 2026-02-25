@extends('layouts.admin')

@section('title', 'Application — ' . $application->reference)

@push('styles')
<style>
    .section-header {
        font-size: 0.7rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: 1px; color: #9b9baa; margin-bottom: 14px; padding-bottom: 8px;
        border-bottom: 1px solid #f0f0f5;
    }
    .info-row { display: flex; gap: 8px; padding: 7px 0; border-bottom: 1px solid #f8f8fa; }
    .info-row:last-child { border-bottom: none; }
    .info-label { font-size: 0.8rem; color: #9b9baa; min-width: 130px; flex-shrink: 0; }
    .info-value { font-size: 0.88rem; color: #2d2d3a; font-weight: 500; }
    .doc-btn { display: flex; align-items: center; gap: 10px; padding: 10px 14px;
        background: #f8f9fa; border-radius: 8px; text-decoration: none; color: #333;
        border: 1px solid #e9ecef; transition: all 0.15s; margin-bottom: 8px; }
    .doc-btn:hover { background: #e8f0f8; border-color: #0c508e; color: #0c508e; }
    .doc-btn .doc-icon { width: 32px; height: 32px; border-radius: 6px; background: #0c508e;
        display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .doc-btn .doc-icon i { color: white; font-size: 0.8rem; }
    .doc-missing { opacity: 0.45; pointer-events: none; }
    .timeline-item { display: flex; gap: 12px; padding: 8px 0; }
    .timeline-dot { width: 10px; height: 10px; border-radius: 50%; margin-top: 5px; flex-shrink: 0; }
    .consent-check { display: flex; align-items: center; gap: 8px; padding: 6px 0; }
</style>
@endpush

@section('content')
<div class="page-title d-flex justify-content-between align-items-center">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1" style="font-size:0.82rem;">
                <li class="breadcrumb-item"><a href="{{ route('admin.admissions.index') }}">Admissions</a></li>
                <li class="breadcrumb-item active">{{ $application->reference }}</li>
            </ol>
        </nav>
        <h1>{{ $application->child_name }}</h1>
        <p><code>{{ $application->reference }}</code> &bull; Submitted {{ $application->created_at->format('d M Y H:i') }}</p>
    </div>
    <a href="{{ route('admin.admissions.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="fas fa-arrow-left me-1"></i> Back
    </a>
</div>

<div class="row g-4">

{{-- ═══ LEFT COLUMN: Application Data ═══ --}}
<div class="col-lg-7">

    {{-- Program --}}
    <div class="admin-table p-4 mb-3">
        <div class="section-header"><i class="fas fa-graduation-cap me-2"></i>Programme Selection</div>
        <div class="info-row"><span class="info-label">Programme</span><span class="info-value">{{ $application->program_name }}</span></div>
        <div class="info-row"><span class="info-label">Fee Option</span><span class="info-value">{{ $application->fee_option_name }}</span></div>
        <div class="info-row"><span class="info-label">Start Date</span><span class="info-value">{{ $application->start_date->format('d F Y') }}</span></div>
        <div class="info-row"><span class="info-label">Snack Box</span><span class="info-value">{{ $application->snack_box ? 'Yes (+R400/month)' : 'No' }}</span></div>
    </div>

    {{-- Child --}}
    <div class="admin-table p-4 mb-3">
        <div class="section-header"><i class="fas fa-child me-2"></i>Child Information</div>
        <div class="info-row"><span class="info-label">Full Name</span><span class="info-value">{{ $application->child_name }}</span></div>
        @if($application->child_nickname)
        <div class="info-row"><span class="info-label">Nickname</span><span class="info-value">{{ $application->child_nickname }}</span></div>
        @endif
        <div class="info-row"><span class="info-label">Date of Birth</span><span class="info-value">{{ $application->child_dob->format('d F Y') }} (Age: {{ $application->child_dob->age }})</span></div>
        <div class="info-row"><span class="info-label">Gender</span><span class="info-value">{{ ucfirst($application->child_gender) }}</span></div>
        <div class="info-row"><span class="info-label">ID Number</span><span class="info-value">{{ $application->child_id_number ?? '—' }}</span></div>
        <div class="info-row"><span class="info-label">Home Language</span><span class="info-value">{{ $application->child_language ?? '—' }}</span></div>
        @if($application->formValue('child_religion'))
        <div class="info-row"><span class="info-label">Religion</span><span class="info-value">{{ $application->formValue('child_religion') }}</span></div>
        @endif
        @if($application->formValue('previous_school'))
        <div class="info-row"><span class="info-label">Previous School</span><span class="info-value">{{ $application->formValue('previous_school') }}</span></div>
        @endif

        {{-- Second child --}}
        @if($application->formValue('has_second_child') === 'yes' && $application->formValue('child2_name'))
        <div class="mt-3 pt-2" style="border-top:1px dashed #e0e0e0;">
            <div class="section-header" style="margin-top:0;">Second Child</div>
            <div class="info-row"><span class="info-label">Full Name</span><span class="info-value">{{ $application->formValue('child2_name') }}</span></div>
            <div class="info-row"><span class="info-label">Date of Birth</span><span class="info-value">{{ $application->formValue('child2_dob') }}</span></div>
            <div class="info-row"><span class="info-label">Gender</span><span class="info-value">{{ ucfirst($application->formValue('child2_gender') ?? '') }}</span></div>
        </div>
        @endif
    </div>

    {{-- Parents --}}
    <div class="admin-table p-4 mb-3">
        <div class="section-header"><i class="fas fa-users me-2"></i>Parent / Guardian Information</div>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="fw-semibold small mb-2 text-muted">Mother / Guardian 1</div>
                <div class="info-row"><span class="info-label">Full Name</span><span class="info-value">{{ $application->mother_name }}</span></div>
                <div class="info-row"><span class="info-label">ID Number</span><span class="info-value">{{ $application->formValue('mother_id', '—') }}</span></div>
                <div class="info-row"><span class="info-label">Cell</span><span class="info-value"><a href="tel:{{ $application->mother_cell }}">{{ $application->mother_cell }}</a></span></div>
                <div class="info-row"><span class="info-label">Email</span><span class="info-value"><a href="mailto:{{ $application->mother_email }}">{{ $application->mother_email }}</a></span></div>
                @if($application->formValue('mother_occupation'))
                <div class="info-row"><span class="info-label">Occupation</span><span class="info-value">{{ $application->formValue('mother_occupation') }}</span></div>
                @endif
            </div>
            @if($application->father_name)
            <div class="col-md-6">
                <div class="fw-semibold small mb-2 text-muted">Father / Guardian 2</div>
                <div class="info-row"><span class="info-label">Full Name</span><span class="info-value">{{ $application->father_name }}</span></div>
                <div class="info-row"><span class="info-label">ID Number</span><span class="info-value">{{ $application->formValue('father_id', '—') }}</span></div>
                @if($application->father_cell)
                <div class="info-row"><span class="info-label">Cell</span><span class="info-value"><a href="tel:{{ $application->father_cell }}">{{ $application->father_cell }}</a></span></div>
                @endif
                @if($application->father_email)
                <div class="info-row"><span class="info-label">Email</span><span class="info-value"><a href="mailto:{{ $application->father_email }}">{{ $application->father_email }}</a></span></div>
                @endif
            </div>
            @endif
        </div>
        @if($application->formValue('home_address'))
        <div class="mt-3 pt-2" style="border-top:1px solid #f0f0f5;">
            <div class="info-row"><span class="info-label">Home Address</span><span class="info-value">{{ $application->formValue('home_address') }}</span></div>
            @if($application->formValue('home_tel'))
            <div class="info-row"><span class="info-label">Home Tel</span><span class="info-value">{{ $application->formValue('home_tel') }}</span></div>
            @endif
        </div>
        @endif
    </div>

    {{-- Medical & Emergency --}}
    <div class="admin-table p-4 mb-3">
        <div class="section-header"><i class="fas fa-heartbeat me-2"></i>Medical & Emergency</div>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="fw-semibold small mb-2 text-muted">Emergency Contact</div>
                <div class="info-row"><span class="info-label">Name</span><span class="info-value">{{ $application->formValue('emergency_name', '—') }}</span></div>
                <div class="info-row"><span class="info-label">Tel</span><span class="info-value">{{ $application->formValue('emergency_tel', '—') }}</span></div>
            </div>
            <div class="col-md-6">
                <div class="fw-semibold small mb-2 text-muted">Doctor</div>
                <div class="info-row"><span class="info-label">Name</span><span class="info-value">{{ $application->formValue('doctor_name', '—') }}</span></div>
                <div class="info-row"><span class="info-label">Tel</span><span class="info-value">{{ $application->formValue('doctor_tel', '—') }}</span></div>
            </div>
        </div>
        @if($application->formValue('medical_aid'))
        <div class="mt-2">
            <div class="info-row"><span class="info-label">Medical Aid</span><span class="info-value">{{ $application->formValue('medical_aid') }} {{ $application->formValue('medical_aid_number') ? '— ' . $application->formValue('medical_aid_number') : '' }}</span></div>
        </div>
        @endif
        @foreach(['allergies' => 'Allergies', 'operations' => 'Operations', 'diseases' => 'Diseases', 'other_details' => 'Other Details'] as $key => $label)
            @if($application->formValue($key))
            <div class="info-row"><span class="info-label">{{ $label }}</span><span class="info-value">{{ $application->formValue($key) }}</span></div>
            @endif
        @endforeach
    </div>

    {{-- Consents --}}
    <div class="admin-table p-4 mb-3">
        <div class="section-header"><i class="fas fa-file-signature me-2"></i>Consents & Signature</div>
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
        <div class="row g-2">
            @foreach($consents as $key => $label)
            <div class="col-6">
                <div class="consent-check">
                    @if($application->formValue($key))
                        <i class="fas fa-check-circle text-success"></i>
                    @else
                        <i class="fas fa-times-circle text-danger"></i>
                    @endif
                    <span class="small">{{ $label }}</span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-3 pt-2" style="border-top:1px solid #f0f0f5;">
            <div class="info-row"><span class="info-label">Signed by</span><span class="info-value">{{ $application->formValue('signature') }}</span></div>
            <div class="info-row"><span class="info-label">Signature Date</span><span class="info-value">{{ $application->formValue('signature_date') }}</span></div>
        </div>
    </div>

</div>

{{-- ═══ RIGHT COLUMN: Admin Actions ═══ --}}
<div class="col-lg-5">

    {{-- Status Panel --}}
    <div class="admin-table p-4 mb-3">
        <div class="section-header"><i class="fas fa-tag me-2"></i>Application Status</div>

        {{-- Timeline --}}
        <div class="mb-3">
            @php
                $timeline = [
                    ['label' => 'Submitted',    'date' => $application->created_at, 'done' => true],
                    ['label' => 'Under Review', 'date' => $application->reviewed_at, 'done' => $application->reviewed_at],
                    ['label' => 'Decision',     'date' => $application->approved_at ?? $application->rejected_at, 'done' => in_array($application->status, ['approved','rejected','waitlist'])],
                    ['label' => 'Invited',      'date' => $application->invited_at, 'done' => $application->invited_at],
                ];
            @endphp
            @foreach($timeline as $step)
            <div class="timeline-item">
                <div class="timeline-dot" style="background: {{ $step['done'] ? '#28a745' : '#dee2e6' }};"></div>
                <div class="small" style="line-height:1.4;">
                    <span class="{{ $step['done'] ? 'fw-semibold' : 'text-muted' }}">{{ $step['label'] }}</span>
                    @if($step['date'])
                        <span class="text-muted d-block" style="font-size:0.75rem;">{{ $step['date']->format('d M Y H:i') }}</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        @php
            $badgeClass = match($application->status) {
                'pending'      => 'bg-warning text-dark',
                'under_review' => 'bg-info',
                'approved'     => 'bg-success',
                'waitlist'     => 'bg-secondary',
                'rejected'     => 'bg-danger',
                default        => 'bg-secondary',
            };
        @endphp
        <div class="text-center mb-3">
            <span class="badge {{ $badgeClass }} px-3 py-2" style="font-size:0.85rem;">
                {{ $application->statusLabel() }}
            </span>
        </div>

        {{-- Action Buttons --}}
        @if($application->isActionable())
        <div class="d-grid gap-2">
            <form action="{{ route('admin.admissions.approve', $application->id) }}" method="POST">
                @csrf
                <button class="btn btn-success w-100">
                    <i class="fas fa-check me-2"></i>Approve Application
                </button>
            </form>
            <form action="{{ route('admin.admissions.waitlist', $application->id) }}" method="POST">
                @csrf
                <button class="btn btn-outline-secondary w-100">
                    <i class="fas fa-clock me-2"></i>Add to Waitlist
                </button>
            </form>
            <button class="btn btn-outline-danger w-100" data-bs-toggle="modal" data-bs-target="#rejectModal">
                <i class="fas fa-times me-2"></i>Reject
            </button>
        </div>
        @endif

        @if($application->status === 'approved' && !$application->invited_at)
        <div class="d-grid mt-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inviteModal">
                <i class="fas fa-paper-plane me-2"></i>Send Portal Invitation
            </button>
        </div>
        @endif

        @if($application->invited_at)
        <div class="alert alert-success py-2 mt-2 mb-0 small">
            <i class="fas fa-check-circle me-1"></i>
            Portal invitation sent on {{ $application->invited_at->format('d M Y H:i') }}
        </div>
        @endif

        @if($application->parentUser)
        <div class="alert alert-info py-2 mt-2 mb-0 small">
            <i class="fas fa-user-check me-1"></i>
            Parent registered: <strong>{{ $application->parentUser->name }}</strong>
        </div>
        @endif
    </div>

    {{-- Documents --}}
    <div class="admin-table p-4 mb-3">
        <div class="section-header"><i class="fas fa-folder-open me-2"></i>Documents</div>
        @php
            $docTypes = [
                'pdf'               => ['label' => 'Application PDF', 'icon' => 'fa-file-pdf'],
                'birth_certificate' => ['label' => 'Birth Certificate', 'icon' => 'fa-baby'],
                'clinic_card'       => ['label' => 'Clinic / Road to Health Card', 'icon' => 'fa-notes-medical'],
                'parent_ids'        => ['label' => 'Parent IDs', 'icon' => 'fa-id-card'],
                'proof_address'     => ['label' => 'Proof of Address', 'icon' => 'fa-home'],
            ];
        @endphp
        @foreach($docTypes as $type => $meta)
            @php
                $exists = $type === 'pdf'
                    ? (bool) $application->pdf_path
                    : $application->hasDocument($type);
            @endphp
            @if($exists)
            <a href="{{ route('admin.admissions.document', [$application->id, $type]) }}"
               class="doc-btn" target="_blank">
                <div class="doc-icon"><i class="fas {{ $meta['icon'] }}"></i></div>
                <div class="flex-grow-1">
                    <div class="fw-semibold small">{{ $meta['label'] }}</div>
                    <div style="font-size:0.72rem;color:#6c757d;">Click to download</div>
                </div>
                <i class="fas fa-download text-muted"></i>
            </a>
            @else
            <div class="doc-btn doc-missing">
                <div class="doc-icon" style="background:#adb5bd;"><i class="fas {{ $meta['icon'] }}"></i></div>
                <div class="flex-grow-1">
                    <div class="fw-semibold small">{{ $meta['label'] }}</div>
                    <div style="font-size:0.72rem;color:#adb5bd;">Not uploaded</div>
                </div>
                <i class="fas fa-minus text-muted"></i>
            </div>
            @endif
        @endforeach
    </div>

    {{-- Notes --}}
    <div class="admin-table p-4 mb-3">
        <div class="section-header"><i class="fas fa-sticky-note me-2"></i>Internal Notes</div>
        <form action="{{ route('admin.admissions.notes', $application->id) }}" method="POST">
            @csrf
            <textarea name="admin_notes" class="form-control mb-3" rows="4"
                      placeholder="Add internal notes about this application…">{{ old('admin_notes', $application->admin_notes) }}</textarea>
            <button type="submit" class="btn btn-outline-warning w-100">
                <i class="fas fa-save me-2"></i>Save Notes
            </button>
        </form>
    </div>

    {{-- Quick contact --}}
    <div class="admin-table p-4">
        <div class="section-header"><i class="fas fa-address-book me-2"></i>Quick Contact</div>
        <div class="d-flex flex-column gap-2">
            <a href="mailto:{{ $application->mother_email }}" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-envelope me-2"></i>Email {{ $application->mother_name }}
            </a>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $application->mother_cell) }}"
               target="_blank" class="btn btn-outline-success btn-sm">
                <i class="fab fa-whatsapp me-2"></i>WhatsApp {{ $application->mother_cell }}
            </a>
            @if($application->father_cell)
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $application->father_cell) }}"
               target="_blank" class="btn btn-outline-success btn-sm">
                <i class="fab fa-whatsapp me-2"></i>WhatsApp {{ $application->father_name }}
            </a>
            @endif
        </div>
    </div>

</div>
</div>

{{-- Reject Modal --}}
@if($application->isActionable())
<div class="modal fade" id="rejectModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger"><i class="fas fa-times-circle me-2"></i>Reject Application</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.admissions.reject', $application->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p class="text-muted small">Rejecting application for <strong>{{ $application->child_name }}</strong>.</p>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Reason (optional, saved to notes)</label>
                        <textarea name="reason" class="form-control" rows="3"
                                  placeholder="e.g. No capacity for the requested start date…"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger">Confirm Rejection</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

{{-- Invite Modal --}}
@if($application->status === 'approved' && !$application->invited_at)
<div class="modal fade" id="inviteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-paper-plane me-2 text-primary"></i>Send Portal Invitation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.admissions.invite', $application->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p class="text-muted small mb-3">
                        An invitation email will be sent with a link to set up their parent portal account.
                        The link is valid for <strong>7 days</strong>.
                    </p>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Parent Email</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ $application->mother_email }}" required>
                    </div>
                    <div class="alert alert-info py-2 small">
                        <i class="fas fa-info-circle me-1"></i>
                        After registering, the parent will automatically receive a welcome email
                        with instructions for using the portal.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fas fa-paper-plane me-1"></i> Send Invitation
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
