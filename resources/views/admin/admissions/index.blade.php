@extends('layouts.admin')

@section('title', 'Admissions')

@push('styles')
<style>
/* ── Panel ───────────────────────────────────────────────────────────── */
.adm-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden;
    margin-bottom: 20px;
}
.adm-panel-header {
    padding: 16px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.adm-panel-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }

/* ── Filter form ─────────────────────────────────────────────────────── */
.adm-filter { padding: 20px 22px; }
.adm-filter .form-label { font-size: .68rem; font-weight: 700; text-transform: uppercase; letter-spacing: .4px; color: #94a3b8; margin-bottom: 5px; }
.adm-filter .form-control,
.adm-filter .form-select {
    font-size: .84rem; border: 1px solid #e5e7eb; border-radius: 8px;
    padding: 9px 12px; height: auto; background: #fafafa; color: #374151; transition: border-color .2s;
}
.adm-filter .form-control:focus,
.adm-filter .form-select:focus { border-color: #0077B6; box-shadow: 0 0 0 3px rgba(0,119,182,.08); background: #fff; outline: none; }

/* ── Table ───────────────────────────────────────────────────────────── */
.adm-table th {
    font-size: .66rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; background: #fafafa;
    border-bottom: 1px solid #f0f0f0; padding: 10px 14px;
}
.adm-table td { padding: 13px 14px; vertical-align: middle; border-bottom: 1px solid #f8f8f8; font-size: .84rem; color: #374151; }
.adm-table tbody tr:last-child td { border-bottom: none; }
.adm-table tbody tr:hover td { background: #fafcff; transition: background .1s; }

/* ── Pills ───────────────────────────────────────────────────────────── */
.adm-pill { font-size: .68rem; font-weight: 700; border-radius: 20px; padding: 3px 10px; display: inline-block; white-space: nowrap; }
.adm-src  { font-size: .68rem; font-weight: 700; border-radius: 20px; padding: 2px 8px; display: inline-block; }
</style>
@endpush

@section('content')

{{-- ── Page Header ─────────────────────────────────────────────────────── --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-user-plus me-2" style="color:#7c3aed;font-size:1.1rem;"></i>Admissions
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Manage enrolment applications</p>
    </div>
</div>

{{-- ── Stats ────────────────────────────────────────────────────────────── --}}
<div class="row g-4 mb-4">
    {{-- Total --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value" style="color:#7c3aed;">{{ $stats['total'] }}</div>
                    <div class="label">Total Applications</div>
                </div>
                <div class="icon" style="background:#f5f3ff;color:#7c3aed;">
                    <i class="fas fa-file-alt"></i>
                </div>
            </div>
            <div class="mt-2 small text-muted">{{ $stats['this_month'] }} received this month</div>
        </div>
    </div>

    {{-- Actionable (pending + under review) --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-warning">{{ $stats['actionable'] }}</div>
                    <div class="label">Needs Attention</div>
                </div>
                <div class="icon bg-warning bg-opacity-10 text-warning">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
            <div class="mt-2 small">
                <span class="text-warning fw-semibold">{{ $stats['pending'] }}</span>
                <span class="text-muted"> pending · </span>
                <span class="text-warning fw-semibold">{{ $stats['under_review'] }}</span>
                <span class="text-muted"> in review</span>
            </div>
        </div>
    </div>

    {{-- Approved --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-success">{{ $stats['approved'] }}</div>
                    <div class="label">Approved</div>
                </div>
                <div class="icon bg-success bg-opacity-10 text-success">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="mt-2 small text-muted">Ready to enrol</div>
        </div>
    </div>

    {{-- Waitlist + Rejected --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-danger">{{ $stats['rejected'] }}</div>
                    <div class="label">Rejected</div>
                </div>
                <div class="icon bg-danger bg-opacity-10 text-danger">
                    <i class="fas fa-times-circle"></i>
                </div>
            </div>
            <div class="mt-2 small">
                <span class="text-muted">{{ $stats['waitlist'] }} on </span>
                <span class="fw-semibold" style="color:#6c757d;">waitlist</span>
            </div>
        </div>
    </div>
</div>

{{-- ── Filter Panel ─────────────────────────────────────────────────────── --}}
<div class="adm-panel">
    <div class="adm-panel-header">
        <h6><i class="fas fa-filter me-2" style="color:#94a3b8;"></i>Filter Applications</h6>
        @if(request()->hasAny(['status','program','search']))
            <a href="{{ route('admin.admissions.index') }}"
               class="btn btn-sm rounded-pill px-3" style="background:#fee2e2;color:#ef4444;border:none;font-size:.75rem;">
                <i class="fas fa-times me-1"></i>Clear
            </a>
        @endif
    </div>
    <div class="adm-filter">
        <form method="GET" action="{{ route('admin.admissions.index') }}">
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="">All Statuses</option>
                        @foreach(\App\Models\Application::STATUS_LABELS as $val => $label)
                            <option value="{{ $val }}" {{ request('status') === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Programme</label>
                    <select name="program" class="form-select">
                        <option value="">All Programmes</option>
                        @foreach(\App\Models\Application::PROGRAMS as $val => $label)
                            <option value="{{ $val }}" {{ request('program') === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Search</label>
                    <input type="text" name="search" class="form-control"
                           placeholder="Child name, parent, email, reference…"
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-sm w-100 rounded-pill text-white" style="background:#0077B6;padding:9px;">
                        <i class="fas fa-search me-1"></i>Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- ── Applications Table ───────────────────────────────────────────────── --}}
<div class="adm-panel">
    <div class="table-responsive">
        <table class="table adm-table mb-0">
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Child</th>
                    <th>Parent</th>
                    <th>Programme</th>
                    <th>Start</th>
                    <th>Docs</th>
                    <th>Source</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $app)
                @php
                    $stMap = [
                        'pending'      => ['#fff7ed','#d97706'],
                        'under_review' => ['#f5f3ff','#7c3aed'],
                        'approved'     => ['#dcfce7','#16a34a'],
                        'waitlist'     => ['#f3f4f6','#6c757d'],
                        'rejected'     => ['#fee2e2','#ef4444'],
                    ];
                    [$stBg,$stClr] = $stMap[$app->status] ?? ['#f3f4f6','#6c757d'];
                    $docCount = $app->documentsCount();
                    $srcMap = [
                        'google'    => ['#fee2e2','#ef4444'],
                        'facebook'  => ['#dbeafe','#3b82f6'],
                        'instagram' => ['#fef3c7','#d97706'],
                        'referral'  => ['#dcfce7','#16a34a'],
                        'other'     => ['#f3f4f6','#6c757d'],
                    ];
                @endphp
                <tr>
                    <td>
                        <code style="font-size:.76rem;color:#0077B6;font-weight:700;">{{ $app->reference }}</code>
                        <div style="font-size:.7rem;color:#adb5bd;margin-top:2px;">{{ $app->created_at->format('d M Y') }}</div>
                    </td>
                    <td>
                        <div class="fw-semibold" style="color:#1a1f2e;">{{ $app->child_name }}</div>
                        <div style="font-size:.74rem;color:#adb5bd;">DOB: {{ $app->child_dob->format('d M Y') }}</div>
                    </td>
                    <td>
                        <div style="color:#374151;">{{ $app->mother_name }}</div>
                        <a href="tel:{{ $app->mother_cell }}" style="font-size:.74rem;color:#adb5bd;text-decoration:none;">{{ $app->mother_cell }}</a>
                        <div><a href="mailto:{{ $app->mother_email }}" style="font-size:.74rem;color:#adb5bd;text-decoration:none;">{{ $app->mother_email }}</a></div>
                    </td>
                    <td>
                        <div style="color:#374151;font-weight:600;">{{ $app->program_name }}</div>
                        <div style="font-size:.74rem;color:#adb5bd;">{{ ucfirst($app->fee_option) }}</div>
                    </td>
                    <td style="color:#374151;font-weight:600;font-size:.83rem;">{{ $app->start_date->format('d M Y') }}</td>
                    <td>
                        @if($docCount >= 3)
                            <span style="color:#16a34a;font-size:.8rem;font-weight:700;"><i class="fas fa-check-circle me-1"></i>{{ $docCount }}/4</span>
                        @elseif($docCount > 0)
                            <span style="color:#d97706;font-size:.8rem;font-weight:700;"><i class="fas fa-exclamation-circle me-1"></i>{{ $docCount }}/4</span>
                        @else
                            <span style="color:#ef4444;font-size:.8rem;font-weight:700;"><i class="fas fa-times-circle me-1"></i>None</span>
                        @endif
                    </td>
                    <td>
                        @if($app->lead)
                            @php [$sBg,$sClr] = $srcMap[$app->lead->source] ?? ['#f3f4f6','#6c757d']; @endphp
                            <a href="{{ route('admin.crm.leads.show', $app->lead) }}"
                               title="View in Lead Pipeline — {{ $app->lead->reference }}" style="text-decoration:none;">
                                <span class="adm-src" style="background:{{ $sBg }};color:{{ $sClr }};">{{ ucfirst($app->lead->source ?? 'N/A') }}</span>
                            </a>
                            <div style="font-size:.7rem;color:#adb5bd;margin-top:3px;">
                                <i class="fas fa-link me-1"></i>
                                <a href="{{ route('admin.crm.leads.show', $app->lead) }}" style="color:#adb5bd;text-decoration:none;">{{ $app->lead->reference }}</a>
                            </div>
                        @else
                            <span style="color:#d1d5db;">—</span>
                        @endif
                    </td>
                    <td>
                        <span class="adm-pill" style="background:{{ $stBg }};color:{{ $stClr }};">{{ $app->statusLabel() }}</span>
                        @if($app->invited_at)
                            <div style="font-size:.68rem;color:#adb5bd;margin-top:3px;"><i class="fas fa-paper-plane me-1"></i>Invited</div>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-1 flex-wrap">
                            <a href="{{ route('admin.admissions.show', $app->id) }}"
                               class="btn btn-sm py-1 px-2" style="background:#eff6ff;color:#3b82f6;border:1px solid #dbeafe;font-size:.74rem;">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if($app->isActionable())
                            <div class="dropdown">
                                <button class="btn btn-sm py-1 px-2 dropdown-toggle"
                                        style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;font-size:.74rem;"
                                        data-bs-toggle="dropdown">
                                    Action
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" style="border-radius:12px;border:1px solid #f0f0f0;box-shadow:0 4px 20px rgba(0,0,0,.1);font-size:.82rem;">
                                    <li>
                                        <form action="{{ route('admin.admissions.approve', $app->id) }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item" style="color:#16a34a;"><i class="fas fa-check me-2"></i>Approve</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ route('admin.admissions.waitlist', $app->id) }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item" style="color:#6c757d;"><i class="fas fa-clock me-2"></i>Waitlist</button>
                                        </form>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button class="dropdown-item" style="color:#ef4444;"
                                                data-bs-toggle="modal" data-bs-target="#rejectModal{{ $app->id }}">
                                            <i class="fas fa-times me-2"></i>Reject
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            @if($app->status === 'approved' && !$app->invited_at)
                            <button class="btn btn-sm py-1 px-2"
                                    style="background:#eff6ff;color:#0077B6;border:1px solid #dbeafe;font-size:.74rem;"
                                    data-bs-toggle="modal" data-bs-target="#inviteModal{{ $app->id }}">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                            @endif
                        </div>
                    </td>
                </tr>

                {{-- Reject Modal --}}
                @if($app->isActionable())
                <div class="modal fade" id="rejectModal{{ $app->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:16px;overflow:hidden;">
                            <div class="modal-header border-0" style="padding:20px 24px 0;">
                                <h5 class="modal-title fw-bold" style="font-size:.95rem;color:#ef4444;">
                                    <i class="fas fa-times-circle me-2"></i>Reject Application
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('admin.admissions.reject', $app->id) }}" method="POST">
                                @csrf
                                <div class="modal-body" style="padding:16px 24px;">
                                    <p style="font-size:.84rem;color:#6c757d;margin-bottom:12px;">
                                        Rejecting application for <strong style="color:#1a1f2e;">{{ $app->child_name }}</strong>.
                                    </p>
                                    <label style="font-size:.72rem;font-weight:700;color:#6c757d;text-transform:uppercase;letter-spacing:.4px;margin-bottom:6px;display:block;">Reason <span style="color:#adb5bd;font-weight:400;">optional</span></label>
                                    <textarea name="reason" rows="3" style="font-size:.84rem;border:1.5px solid #e5e7eb;border-radius:10px;padding:10px 14px;background:#fafafa;width:100%;resize:vertical;" placeholder="e.g. No capacity for the requested start date…"></textarea>
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

                {{-- Invite Modal --}}
                @if($app->status === 'approved' && !$app->invited_at)
                <div class="modal fade" id="inviteModal{{ $app->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:16px;overflow:hidden;">
                            <div class="modal-header border-0" style="padding:20px 24px 0;">
                                <h5 class="modal-title fw-bold" style="font-size:.95rem;color:#1a1f2e;">
                                    <i class="fas fa-paper-plane me-2" style="color:#0077B6;"></i>Send Portal Invitation
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('admin.admissions.invite', $app->id) }}" method="POST">
                                @csrf
                                <div class="modal-body" style="padding:16px 24px;">
                                    <p style="font-size:.82rem;color:#6c757d;margin-bottom:14px;">
                                        An email with a portal setup link will be sent. The link expires in <strong>7 days</strong>.
                                    </p>
                                    <label style="font-size:.72rem;font-weight:700;color:#6c757d;text-transform:uppercase;letter-spacing:.4px;margin-bottom:6px;display:block;">Parent Email</label>
                                    <input type="email" name="email"
                                           style="font-size:.84rem;border:1.5px solid #e5e7eb;border-radius:10px;padding:10px 14px;background:#fafafa;width:100%;"
                                           value="{{ $app->mother_email }}" required>
                                </div>
                                <div class="modal-footer border-0" style="padding:0 24px 20px;gap:8px;">
                                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-sm rounded-pill px-3 text-white" style="background:#0077B6;border:none;">
                                        <i class="fas fa-paper-plane me-1"></i>Send Invitation
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif

                @empty
                <tr>
                    <td colspan="9" class="text-center py-5">
                        <div style="font-size:2rem;margin-bottom:10px;">📭</div>
                        <div class="fw-semibold" style="color:#1a1f2e;font-size:.9rem;">No applications found</div>
                        <div style="font-size:.8rem;color:#adb5bd;margin-top:4px;">Try adjusting your filters</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($applications->hasPages())
    <div class="p-4" style="border-top:1px solid #f3f4f6;">
        {{ $applications->links() }}
    </div>
    @endif
</div>

@endsection
