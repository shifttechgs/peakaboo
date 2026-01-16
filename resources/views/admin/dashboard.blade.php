@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="page-title d-flex justify-content-between align-items-start">
    <div>
        <h1>Dashboard</h1>
        <p>Welcome back! Here's what's happening at Peekaboo today.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.reports.index') }}" class="btn btn-outline-secondary btn-admin">
            <i class="fas fa-download me-2"></i> Export Report
        </a>
        <a href="{{ route('admin.admissions.index') }}" class="btn btn-admin btn-admin-primary">
            <i class="fas fa-plus me-2"></i> New Application
        </a>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-primary">{{ $stats['total_enrolled'] }}</div>
                    <div class="label">Total Enrolled</div>
                </div>
                <div class="icon bg-primary bg-opacity-10 text-primary">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="mt-3 small">
                <span class="text-success"><i class="fas fa-arrow-up"></i> 12%</span>
                <span class="text-muted">vs last month</span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-warning">{{ $stats['new_applications'] }}</div>
                    <div class="label">New Applications</div>
                </div>
                <div class="icon bg-warning bg-opacity-10 text-warning">
                    <i class="fas fa-file-alt"></i>
                </div>
            </div>
            <div class="mt-3 small">
                <span class="text-muted">{{ $stats['pending_applications'] }} pending review</span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-success">R{{ number_format($stats['monthly_revenue']) }}</div>
                    <div class="label">Monthly Revenue</div>
                </div>
                <div class="icon bg-success bg-opacity-10 text-success">
                    <i class="fas fa-rand-sign"></i>
                </div>
            </div>
            <div class="mt-3 small">
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> R{{ number_format($stats['outstanding_fees']) }}</span>
                <span class="text-muted">outstanding</span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-info">{{ $stats['attendance_today'] }}/{{ $stats['total_enrolled'] }}</div>
                    <div class="label">Today's Attendance</div>
                </div>
                <div class="icon bg-info bg-opacity-10 text-info">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="mt-3 small">
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-info" style="width: {{ ($stats['attendance_today'] / $stats['total_enrolled']) * 100 }}%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Applications -->
    <div class="col-lg-8">
        <div class="admin-table">
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Recent Applications</h5>
                <a href="{{ route('admin.admissions.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Child</th>
                            <th>Program</th>
                            <th>Source</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $app)
                        <tr>
                            <td><code>{{ $app['id'] }}</code></td>
                            <td>
                                <div class="fw-semibold">{{ $app['child_name'] }}</div>
                                <small class="text-muted">{{ $app['parent_name'] }}</small>
                            </td>
                            <td>{{ $app['program'] }}</td>
                            <td>
                                @if($app['source'] == 'Facebook')
                                <i class="fab fa-facebook text-primary me-1"></i>
                                @elseif($app['source'] == 'WhatsApp')
                                <i class="fab fa-whatsapp text-success me-1"></i>
                                @elseif($app['source'] == 'Website')
                                <i class="fas fa-globe text-info me-1"></i>
                                @else
                                <i class="fas fa-user-friends text-secondary me-1"></i>
                                @endif
                                {{ $app['source'] }}
                            </td>
                            <td><span class="status-badge status-{{ $app['status'] }}">{{ ucfirst(str_replace('_', ' ', $app['status'])) }}</span></td>
                            <td>
                                <a href="{{ route('admin.admissions.show', $app['id']) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Announcements -->
    <div class="col-lg-4">
        <!-- Class Overview -->
        <div class="admin-table mb-4">
            <div class="p-4 border-bottom">
                <h5 class="mb-0 fw-bold">Class Overview</h5>
            </div>
            <div class="p-4">
                @foreach($classes as $class)
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <div class="fw-semibold">{{ $class['name'] }}</div>
                        <small class="text-muted">{{ $class['teacher'] }}</small>
                    </div>
                    <div class="text-end">
                        <span class="badge {{ $class['enrolled'] >= $class['capacity'] ? 'bg-danger' : 'bg-success' }}">
                            {{ $class['enrolled'] }}/{{ $class['capacity'] }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Recent Announcements -->
        <div class="admin-table">
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Announcements</h5>
                <a href="{{ route('admin.communication.announcements') }}" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="p-4">
                @foreach($announcements as $announcement)
                <div class="d-flex gap-3 mb-3">
                    <div class="flex-shrink-0">
                        @if($announcement['type'] == 'info')
                        <div class="rounded-circle bg-info bg-opacity-10 text-info d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                            <i class="fas fa-info"></i>
                        </div>
                        @elseif($announcement['type'] == 'warning')
                        <div class="rounded-circle bg-warning bg-opacity-10 text-warning d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                            <i class="fas fa-exclamation"></i>
                        </div>
                        @else
                        <div class="rounded-circle bg-success bg-opacity-10 text-success d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                            <i class="fas fa-check"></i>
                        </div>
                        @endif
                    </div>
                    <div>
                        <div class="fw-semibold">{{ $announcement['title'] }}</div>
                        <small class="text-muted">{{ $announcement['date'] }}</small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Second Row -->
<div class="row g-4 mt-2">
    <!-- Recent Payments -->
    <div class="col-lg-6">
        <div class="admin-table">
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Recent Payments</h5>
                <a href="{{ route('admin.payments.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Child</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment['child_name'] }}</td>
                            <td class="fw-semibold">R{{ number_format($payment['amount']) }}</td>
                            <td>{{ date('d M', strtotime($payment['date'])) }}</td>
                            <td>
                                @if($payment['status'] == 'confirmed')
                                <span class="badge bg-success">Confirmed</span>
                                @else
                                <span class="badge bg-warning">Pending</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- New Leads -->
    <div class="col-lg-6">
        <div class="admin-table">
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">New Leads</h5>
                <a href="{{ route('admin.crm.leads') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Source</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leads as $lead)
                        <tr>
                            <td>
                                <div class="fw-semibold">{{ $lead['name'] }}</div>
                                <small class="text-muted">{{ $lead['child_age'] }}</small>
                            </td>
                            <td>
                                @if(str_contains($lead['source'], 'Facebook'))
                                <i class="fab fa-facebook text-primary me-1"></i>
                                @elseif(str_contains($lead['source'], 'WhatsApp'))
                                <i class="fab fa-whatsapp text-success me-1"></i>
                                @else
                                <i class="fas fa-globe text-info me-1"></i>
                                @endif
                                {{ $lead['source'] }}
                            </td>
                            <td>
                                @php
                                $leadStatusColors = ['new' => 'primary', 'contacted' => 'info', 'tour_scheduled' => 'warning', 'converted' => 'success'];
                                @endphp
                                <span class="badge bg-{{ $leadStatusColors[$lead['status']] ?? 'secondary' }}">{{ ucfirst(str_replace('_', ' ', $lead['status'])) }}</span>
                            </td>
                            <td>
                                <a href="tel:{{ $lead['phone'] }}" class="btn btn-sm btn-outline-success me-1" title="Call">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead['phone']) }}" class="btn btn-sm btn-outline-success" title="WhatsApp" target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Today's Attendance Quick View -->
<div class="row g-4 mt-2">
    <div class="col-12">
        <div class="admin-table">
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Today's Attendance</h5>
                <span class="text-muted">{{ date('l, d F Y') }}</span>
            </div>
            <div class="p-4">
                <div class="row g-3">
                    @foreach($attendance as $record)
                    <div class="col-md-4 col-lg-2">
                        <div class="border rounded p-3 text-center {{ $record['status'] == 'present' ? 'border-success bg-success bg-opacity-10' : 'border-danger bg-danger bg-opacity-10' }}">
                            <div class="fw-semibold">{{ $record['child_name'] }}</div>
                            <small class="text-muted">{{ $record['class'] }}</small>
                            <div class="mt-2">
                                @if($record['status'] == 'present')
                                <span class="badge bg-success">
                                    <i class="fas fa-check me-1"></i> {{ $record['check_in'] }}
                                </span>
                                @else
                                <span class="badge bg-danger">
                                    <i class="fas fa-times me-1"></i> Absent
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
