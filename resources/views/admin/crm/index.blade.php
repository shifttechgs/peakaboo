@extends('layouts.admin')

@section('title', 'CRM')

@section('content')
<div class="page-title">
    <h1>CRM & Leads</h1>
    <p>Manage enquiries and convert leads to enrollments</p>
</div>

<!-- Stats -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card bg-primary bg-opacity-10">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="value text-primary">{{ collect($leads)->where('status', 'new')->count() }}</div>
                    <div class="label">New Leads</div>
                </div>
                <i class="fas fa-user-plus fa-2x text-primary opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card bg-warning bg-opacity-10">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="value text-warning">{{ collect($leads)->where('status', 'contacted')->count() }}</div>
                    <div class="label">In Progress</div>
                </div>
                <i class="fas fa-comment-dots fa-2x text-warning opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card bg-success bg-opacity-10">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="value text-success">{{ collect($leads)->where('status', 'tour_booked')->count() }}</div>
                    <div class="label">Tours Booked</div>
                </div>
                <i class="fas fa-calendar-check fa-2x text-success opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card bg-info bg-opacity-10">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="value text-info">{{ collect($leads)->where('status', 'converted')->count() }}</div>
                    <div class="label">Converted</div>
                </div>
                <i class="fas fa-check-circle fa-2x text-info opacity-50"></i>
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
                    <option value="new">New</option>
                    <option value="contacted">Contacted</option>
                    <option value="tour_booked">Tour Booked</option>
                    <option value="converted">Converted</option>
                    <option value="lost">Lost</option>
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
                <label class="form-label small fw-semibold">Date Range</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-3">
                <button class="btn btn-admin btn-admin-primary w-100">
                    <i class="fas fa-filter me-2"></i> Apply Filters
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Leads Table -->
<div class="admin-table">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Child Age</th>
                    <th>Source</th>
                    <th>Status</th>
                    <th>Last Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leads as $lead)
                <tr>
                    <td>
                        <div class="fw-semibold">{{ date('d M Y', strtotime($lead['created_at'])) }}</div>
                        <small class="text-muted">{{ date('H:i', strtotime($lead['created_at'])) }}</small>
                    </td>
                    <td class="fw-semibold">{{ $lead['name'] }}</td>
                    <td>
                        <div>{{ $lead['phone'] }}</div>
                        <small class="text-muted">{{ $lead['email'] }}</small>
                    </td>
                    <td>{{ $lead['child_age'] }}</td>
                    <td>
                        @if($lead['source'] == 'Facebook')
                        <span class="badge bg-primary"><i class="fab fa-facebook me-1"></i> Facebook</span>
                        @elseif($lead['source'] == 'WhatsApp')
                        <span class="badge bg-success"><i class="fab fa-whatsapp me-1"></i> WhatsApp</span>
                        @elseif($lead['source'] == 'Website')
                        <span class="badge bg-info"><i class="fas fa-globe me-1"></i> Website</span>
                        @else
                        <span class="badge bg-secondary"><i class="fas fa-user-friends me-1"></i> {{ $lead['source'] }}</span>
                        @endif
                    </td>
                    <td><span class="status-badge status-{{ $lead['status'] }}">{{ ucfirst(str_replace('_', ' ', $lead['status'])) }}</span></td>
                    <td>{{ $lead['last_contact'] }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                Actions
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> View Details</a></li>
                                <li><a class="dropdown-item" href="mailto:{{ $lead['email'] }}"><i class="fas fa-envelope me-2"></i> Email</a></li>
                                <li><a class="dropdown-item" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead['phone']) }}" target="_blank"><i class="fab fa-whatsapp me-2"></i> WhatsApp</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-success" href="#"><i class="fas fa-check me-2"></i> Mark as Converted</a></li>
                                <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-times me-2"></i> Mark as Lost</a></li>
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
