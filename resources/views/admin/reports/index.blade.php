@extends('layouts.admin')

@section('title', 'Reports')

@section('content')
<div class="page-title">
    <h1>Reports & Analytics</h1>
    <p>Insights and data visualization</p>
</div>

<!-- Quick Stats -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card bg-primary bg-opacity-10">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="value text-primary">{{ $stats['total_enrolled'] }}</div>
                    <div class="label">Total Enrolled</div>
                </div>
                <i class="fas fa-users fa-2x text-primary opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card bg-success bg-opacity-10">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="value text-success">R {{ number_format($stats['monthly_revenue'], 0) }}</div>
                    <div class="label">Monthly Revenue</div>
                </div>
                <i class="fas fa-money-bill-wave fa-2x text-success opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card bg-warning bg-opacity-10">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="value text-warning">{{ $stats['pending_applications'] }}</div>
                    <div class="label">Pending Applications</div>
                </div>
                <i class="fas fa-file-alt fa-2x text-warning opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card bg-info bg-opacity-10">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="value text-info">{{ $stats['avg_attendance'] }}%</div>
                    <div class="label">Avg. Attendance</div>
                </div>
                <i class="fas fa-chart-line fa-2x text-info opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<!-- Report Types -->
<div class="row g-4">
    <div class="col-md-6 col-lg-4">
        <div class="admin-table h-100">
            <div class="p-4 text-center">
                <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <i class="fas fa-user-graduate fa-2x text-primary"></i>
                </div>
                <h5 class="fw-bold mb-2">Enrolment Report</h5>
                <p class="text-muted small mb-3">Applications, conversions, and waiting lists</p>
                <a href="{{ route('admin.reports.enrolment') }}" class="btn btn-admin btn-admin-primary w-100">
                    <i class="fas fa-chart-bar me-2"></i> View Report
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="admin-table h-100">
            <div class="p-4 text-center">
                <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <i class="fas fa-money-bill-wave fa-2x text-success"></i>
                </div>
                <h5 class="fw-bold mb-2">Payment Report</h5>
                <p class="text-muted small mb-3">Revenue, outstanding fees, and trends</p>
                <a href="{{ route('admin.reports.payments') }}" class="btn btn-admin btn-admin-success w-100">
                    <i class="fas fa-chart-line me-2"></i> View Report
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="admin-table h-100">
            <div class="p-4 text-center">
                <div class="rounded-circle bg-info bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <i class="fas fa-clipboard-check fa-2x text-info"></i>
                </div>
                <h5 class="fw-bold mb-2">Attendance Report</h5>
                <p class="text-muted small mb-3">Daily attendance patterns and trends</p>
                <a href="{{ route('admin.reports.attendance') }}" class="btn btn-admin btn-admin-info w-100">
                    <i class="fas fa-chart-area me-2"></i> View Report
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Export Options -->
<div class="admin-table mt-4">
    <div class="p-4 border-bottom">
        <h5 class="mb-0 fw-bold">Export Data</h5>
    </div>
    <div class="p-4">
        <div class="row g-3">
            <div class="col-md-4">
                <button class="btn btn-outline-primary w-100">
                    <i class="fas fa-file-excel me-2"></i> Export to Excel
                </button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-outline-danger w-100">
                    <i class="fas fa-file-pdf me-2"></i> Export to PDF
                </button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-outline-secondary w-100">
                    <i class="fas fa-file-csv me-2"></i> Export to CSV
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
