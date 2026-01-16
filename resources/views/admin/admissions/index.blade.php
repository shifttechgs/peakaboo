@extends('layouts.admin')

@section('title', 'Admissions')

@section('content')
<div class="page-title d-flex justify-content-between align-items-start">
    <div>
        <h1>Admissions</h1>
        <p>Manage applications and enrollments</p>
    </div>
</div>

<!-- Stats -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card bg-warning bg-opacity-10">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="value text-warning">{{ collect($applications)->where('status', 'pending')->count() }}</div>
                    <div class="label">Pending Review</div>
                </div>
                <i class="fas fa-clock fa-2x text-warning opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card bg-success bg-opacity-10">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="value text-success">{{ collect($applications)->where('status', 'approved')->count() }}</div>
                    <div class="label">Approved</div>
                </div>
                <i class="fas fa-check-circle fa-2x text-success opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card bg-info bg-opacity-10">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="value text-info">{{ collect($applications)->where('status', 'waiting_list')->count() }}</div>
                    <div class="label">Waiting List</div>
                </div>
                <i class="fas fa-list fa-2x text-info opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card bg-danger bg-opacity-10">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="value text-danger">{{ collect($applications)->where('status', 'rejected')->count() }}</div>
                    <div class="label">Rejected</div>
                </div>
                <i class="fas fa-times-circle fa-2x text-danger opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="admin-table mb-4">
    <div class="p-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Status</label>
                <select class="form-select">
                    <option value="">All Statuses</option>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="waiting_list">Waiting List</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Program</label>
                <select class="form-select">
                    <option value="">All Programs</option>
                    <option value="baby-room">Baby Room</option>
                    <option value="toddlers">Toddlers</option>
                    <option value="preschool">Preschool</option>
                    <option value="grade-r">Grade R</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Source</label>
                <select class="form-select">
                    <option value="">All Sources</option>
                    <option value="website">Website</option>
                    <option value="facebook">Facebook</option>
                    <option value="whatsapp">WhatsApp</option>
                    <option value="referral">Referral</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-admin btn-admin-primary w-100">
                    <i class="fas fa-filter me-2"></i> Apply Filters
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Applications Table -->
<div class="admin-table">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Child Details</th>
                    <th>Parent</th>
                    <th>Program</th>
                    <th>Fee Option</th>
                    <th>Source</th>
                    <th>Documents</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $app)
                <tr>
                    <td>
                        <code class="fw-bold">{{ $app['id'] }}</code>
                        <div class="small text-muted">{{ date('d M Y', strtotime($app['submitted_at'])) }}</div>
                    </td>
                    <td>
                        <div class="fw-semibold">{{ $app['child_name'] }}</div>
                        <div class="small text-muted">DOB: {{ date('d M Y', strtotime($app['child_dob'])) }}</div>
                    </td>
                    <td>
                        <div>{{ $app['parent_name'] }}</div>
                        <div class="small">
                            <a href="tel:{{ $app['parent_phone'] }}" class="text-muted">{{ $app['parent_phone'] }}</a>
                        </div>
                    </td>
                    <td>{{ $app['program'] }}</td>
                    <td>{{ $app['fee_option'] }}</td>
                    <td>
                        @if($app['source'] == 'Facebook')
                        <span class="badge bg-primary"><i class="fab fa-facebook me-1"></i> Facebook</span>
                        @elseif($app['source'] == 'WhatsApp')
                        <span class="badge bg-success"><i class="fab fa-whatsapp me-1"></i> WhatsApp</span>
                        @elseif($app['source'] == 'Website')
                        <span class="badge bg-info"><i class="fas fa-globe me-1"></i> Website</span>
                        @else
                        <span class="badge bg-secondary"><i class="fas fa-user-friends me-1"></i> {{ $app['source'] }}</span>
                        @endif
                    </td>
                    <td>
                        @if($app['documents_complete'])
                        <span class="text-success"><i class="fas fa-check-circle"></i> Complete</span>
                        @else
                        <span class="text-warning"><i class="fas fa-exclamation-circle"></i> Pending</span>
                        @endif
                    </td>
                    <td><span class="status-badge status-{{ $app['status'] }}">{{ ucfirst(str_replace('_', ' ', $app['status'])) }}</span></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                Actions
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('admin.admissions.show', $app['id']) }}"><i class="fas fa-eye me-2"></i> View Details</a></li>
                                @if($app['status'] == 'pending')
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('admin.admissions.approve', $app['id']) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-success"><i class="fas fa-check me-2"></i> Approve</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('admin.admissions.waitlist', $app['id']) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-info"><i class="fas fa-list me-2"></i> Add to Waitlist</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('admin.admissions.reject', $app['id']) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger"><i class="fas fa-times me-2"></i> Reject</button>
                                    </form>
                                </li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="mailto:{{ $app['parent_email'] }}"><i class="fas fa-envelope me-2"></i> Email Parent</a></li>
                                <li><a class="dropdown-item" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $app['parent_phone']) }}" target="_blank"><i class="fab fa-whatsapp me-2"></i> WhatsApp</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
