@extends('layouts.admin')

@section('title', 'CRM & Leads')

@section('content')
<div class="page-title d-flex justify-content-between align-items-center">
    <div>
        <h1>CRM & Leads</h1>
        <p>Manage enquiries and convert leads to enrolments</p>
    </div>
    <a href="{{ route('admin.crm.leads') }}" class="btn btn-admin btn-admin-primary">
        <i class="fas fa-list me-2"></i> All Leads
    </a>
</div>

{{-- Pipeline Cards --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3 col-xl">
        <a href="{{ route('admin.crm.leads', ['status' => 'new']) }}" class="text-decoration-none">
            <div class="stat-card text-center">
                <div class="value text-primary">{{ $stats['new'] }}</div>
                <div class="label">New</div>
                <div class="mt-2"><span class="badge bg-primary">new</span></div>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3 col-xl">
        <a href="{{ route('admin.crm.leads', ['status' => 'contacted']) }}" class="text-decoration-none">
            <div class="stat-card text-center">
                <div class="value text-warning">{{ $stats['contacted'] }}</div>
                <div class="label">Contacted</div>
                <div class="mt-2"><span class="badge bg-warning text-dark">contacted</span></div>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3 col-xl">
        <a href="{{ route('admin.crm.leads', ['status' => 'tour_scheduled']) }}" class="text-decoration-none">
            <div class="stat-card text-center">
                <div class="value text-info">{{ $stats['tour_scheduled'] }}</div>
                <div class="label">Tour Scheduled</div>
                <div class="mt-2"><span class="badge bg-info">scheduled</span></div>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3 col-xl">
        <a href="{{ route('admin.crm.leads', ['status' => 'tour_completed']) }}" class="text-decoration-none">
            <div class="stat-card text-center">
                <div class="value" style="color:#6f42c1;">{{ $stats['tour_completed'] }}</div>
                <div class="label">Tour Done</div>
                <div class="mt-2"><span class="badge" style="background:#6f42c1;">completed</span></div>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3 col-xl">
        <a href="{{ route('admin.crm.leads', ['status' => 'converted']) }}" class="text-decoration-none">
            <div class="stat-card text-center">
                <div class="value text-success">{{ $stats['converted'] }}</div>
                <div class="label">Converted</div>
                <div class="mt-2"><span class="badge bg-success">converted</span></div>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3 col-xl">
        <a href="{{ route('admin.crm.leads', ['status' => 'waitlist']) }}" class="text-decoration-none">
            <div class="stat-card text-center">
                <div class="value text-secondary">{{ $stats['waitlist'] }}</div>
                <div class="label">Waitlist</div>
                <div class="mt-2"><span class="badge bg-secondary">waitlist</span></div>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3 col-xl">
        <a href="{{ route('admin.crm.leads', ['status' => 'new']) }}" class="text-decoration-none">
            <div class="stat-card text-center border border-danger border-opacity-25">
                <div class="value text-danger">{{ $stats['overdue'] }}</div>
                <div class="label">Overdue (&gt;3 days)</div>
                <div class="mt-2"><span class="badge bg-danger">overdue</span></div>
            </div>
        </a>
    </div>
</div>

{{-- Recent Leads --}}
<div class="admin-table">
    <div class="p-4 pb-2 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Recent Leads</h5>
        <a href="{{ route('admin.crm.leads') }}" class="btn btn-sm btn-outline-secondary">View All →</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Name</th>
                    <th>Child Age</th>
                    <th>Source</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($recent as $lead)
                <tr>
                    <td><code>{{ $lead->reference }}</code></td>
                    <td>
                        <div class="fw-semibold">{{ $lead->name }}</div>
                        <small class="text-muted">{{ $lead->email }}</small>
                    </td>
                    <td><span class="badge bg-light text-dark">{{ $lead->child_age }}</span></td>
                    <td>
                        @if($lead->source)
                            @php
                                $sourceBadge = match($lead->source) {
                                    'google'    => 'bg-danger',
                                    'facebook'  => 'bg-primary',
                                    'instagram' => 'bg-warning text-dark',
                                    'referral'  => 'bg-success',
                                    default     => 'bg-secondary',
                                };
                            @endphp
                            <span class="badge {{ $sourceBadge }}">{{ ucfirst($lead->source) }}</span>
                        @else
                            <span class="text-muted small">—</span>
                        @endif
                    </td>
                    <td>
                        @php
                            $statusBadge = match($lead->status) {
                                'new'            => 'bg-primary',
                                'contacted'      => 'bg-warning text-dark',
                                'tour_scheduled' => 'bg-info',
                                'tour_completed' => '',
                                'converted'      => 'bg-success',
                                'waitlist'       => 'bg-secondary',
                                'lost'           => 'bg-danger',
                                default          => 'bg-secondary',
                            };
                            $statusStyle = $lead->status === 'tour_completed' ? 'background:#6f42c1;color:white;' : '';
                        @endphp
                        <span class="badge {{ $statusBadge }}" style="{{ $statusStyle }}">
                            {{ ucwords(str_replace('_', ' ', $lead->status)) }}
                        </span>
                    </td>
                    <td><small class="text-muted">{{ $lead->created_at->format('d M Y') }}</small></td>
                    <td>
                        <a href="{{ route('admin.crm.leads.show', $lead->id) }}" class="btn btn-sm btn-outline-primary">View →</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-5">
                        <i class="fas fa-inbox fa-2x mb-3 d-block"></i>
                        No leads yet. They'll appear here when tour bookings are submitted.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
