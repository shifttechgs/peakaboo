@extends('layouts.admin')

@section('title', 'Admissions')

@section('content')
<div class="page-title d-flex justify-content-between align-items-start">
    <div>
        <h1>Admissions</h1>
        <p>Manage enrolment applications</p>
    </div>
</div>

{{-- Stats --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-md">
        <a href="{{ route('admin.admissions.index', ['status' => 'pending']) }}" class="text-decoration-none">
            <div class="stat-card text-center">
                <div class="value text-warning">{{ $stats['pending'] }}</div>
                <div class="label">Pending</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-md">
        <a href="{{ route('admin.admissions.index', ['status' => 'under_review']) }}" class="text-decoration-none">
            <div class="stat-card text-center">
                <div class="value text-info">{{ $stats['under_review'] }}</div>
                <div class="label">Under Review</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-md">
        <a href="{{ route('admin.admissions.index', ['status' => 'approved']) }}" class="text-decoration-none">
            <div class="stat-card text-center">
                <div class="value text-success">{{ $stats['approved'] }}</div>
                <div class="label">Approved</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-md">
        <a href="{{ route('admin.admissions.index', ['status' => 'waitlist']) }}" class="text-decoration-none">
            <div class="stat-card text-center">
                <div class="value text-secondary">{{ $stats['waitlist'] }}</div>
                <div class="label">Waitlist</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-md">
        <a href="{{ route('admin.admissions.index', ['status' => 'rejected']) }}" class="text-decoration-none">
            <div class="stat-card text-center">
                <div class="value text-danger">{{ $stats['rejected'] }}</div>
                <div class="label">Rejected</div>
            </div>
        </a>
    </div>
</div>

{{-- Filters --}}
<div class="admin-table mb-4">
    <div class="p-4">
        <form method="GET" action="{{ route('admin.admissions.index') }}">
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label small fw-semibold">Status</label>
                    <select name="status" class="form-select form-select-sm">
                        <option value="">All Statuses</option>
                        @foreach(\App\Models\Application::STATUS_LABELS as $val => $label)
                            <option value="{{ $val }}" {{ request('status') === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-semibold">Program</label>
                    <select name="program" class="form-select form-select-sm">
                        <option value="">All Programs</option>
                        @foreach(\App\Models\Application::PROGRAMS as $val => $label)
                            <option value="{{ $val }}" {{ request('program') === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Search</label>
                    <input type="text" name="search" class="form-control form-control-sm"
                           placeholder="Child name, parent name, email, reference…"
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-admin btn-admin-primary btn-sm flex-grow-1">
                        <i class="fas fa-search me-1"></i> Filter
                    </button>
                    @if(request()->hasAny(['status','program','search']))
                        <a href="{{ route('admin.admissions.index') }}" class="btn btn-outline-secondary btn-sm">✕</a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Applications Table --}}
<div class="admin-table">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Child</th>
                    <th>Parent</th>
                    <th>Program</th>
                    <th>Start Date</th>
                    <th>Documents</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $app)
                <tr>
                    <td>
                        <code class="text-primary fw-bold">{{ $app->reference }}</code>
                        <div class="small text-muted">{{ $app->created_at->format('d M Y') }}</div>
                    </td>
                    <td>
                        <div class="fw-semibold">{{ $app->child_name }}</div>
                        <small class="text-muted">DOB: {{ $app->child_dob->format('d M Y') }}</small><br>
                        <span class="badge bg-light text-dark" style="font-size:0.7rem;">{{ $app->program_name }}</span>
                    </td>
                    <td>
                        <div>{{ $app->mother_name }}</div>
                        <small><a href="tel:{{ $app->mother_cell }}" class="text-muted">{{ $app->mother_cell }}</a></small><br>
                        <small><a href="mailto:{{ $app->mother_email }}" class="text-muted">{{ $app->mother_email }}</a></small>
                    </td>
                    <td>
                        <div>{{ $app->program_name }}</div>
                        <small class="text-muted">{{ ucfirst($app->fee_option) }}</small>
                    </td>
                    <td>{{ $app->start_date->format('d M Y') }}</td>
                    <td>
                        @php $docCount = $app->documentsCount(); @endphp
                        @if($docCount >= 3)
                            <span class="text-success fw-semibold"><i class="fas fa-check-circle me-1"></i>{{ $docCount }}/4</span>
                        @elseif($docCount > 0)
                            <span class="text-warning"><i class="fas fa-exclamation-circle me-1"></i>{{ $docCount }}/4</span>
                        @else
                            <span class="text-danger"><i class="fas fa-times-circle me-1"></i>None</span>
                        @endif
                    </td>
                    <td>
                        @php
                            $badgeClass = match($app->status) {
                                'pending'      => 'bg-warning text-dark',
                                'under_review' => 'bg-info',
                                'approved'     => 'bg-success',
                                'waitlist'     => 'bg-secondary',
                                'rejected'     => 'bg-danger',
                                default        => 'bg-secondary',
                            };
                        @endphp
                        <span class="badge {{ $badgeClass }}">{{ $app->statusLabel() }}</span>
                        @if($app->invited_at)
                            <div class="small text-muted mt-1"><i class="fas fa-paper-plane me-1"></i>Invited</div>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-1 flex-wrap">
                            <a href="{{ route('admin.admissions.show', $app->id) }}"
                               class="btn btn-sm btn-outline-primary">View</a>

                            @if($app->isActionable())
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                    Action
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <form action="{{ route('admin.admissions.approve', $app->id) }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item text-success"><i class="fas fa-check me-2"></i>Approve</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ route('admin.admissions.waitlist', $app->id) }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item text-info"><i class="fas fa-clock me-2"></i>Waitlist</button>
                                        </form>
                                    </li>
                                    <li>
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal"
                                                data-bs-target="#rejectModal{{ $app->id }}">
                                            <i class="fas fa-times me-2"></i>Reject
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            @endif

                            @if($app->status === 'approved' && !$app->invited_at)
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#inviteModal{{ $app->id }}">
                                <i class="fas fa-paper-plane me-1"></i>Invite
                            </button>
                            @endif
                        </div>
                    </td>
                </tr>

                {{-- Reject Modal --}}
                @if($app->isActionable())
                <div class="modal fade" id="rejectModal{{ $app->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger"><i class="fas fa-times-circle me-2"></i>Reject Application</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('admin.admissions.reject', $app->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <p class="text-muted small">Rejecting application for <strong>{{ $app->child_name }}</strong>.</p>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold small">Reason (optional, saved to notes)</label>
                                        <textarea name="reason" class="form-control" rows="3" placeholder="e.g. No capacity for the requested start date…"></textarea>
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
                @if($app->status === 'approved' && !$app->invited_at)
                <div class="modal fade" id="inviteModal{{ $app->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="fas fa-paper-plane me-2 text-primary"></i>Send Portal Invitation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('admin.admissions.invite', $app->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <p class="text-muted small mb-3">
                                        An email will be sent to the parent with a link to set up their portal account.
                                        The link expires in <strong>7 days</strong>.
                                    </p>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold small">Parent Email</label>
                                        <input type="email" name="email" class="form-control"
                                               value="{{ $app->mother_email }}" required>
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

                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted py-5">
                        <i class="fas fa-inbox fa-2x mb-3 d-block"></i>
                        No applications found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($applications->hasPages())
    <div class="p-4 border-top">
        {{ $applications->links() }}
    </div>
    @endif
</div>
@endsection
