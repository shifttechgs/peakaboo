@extends('layouts.admin')

@section('title', 'Audit Log')

@section('content')
<div class="page-title d-flex justify-content-between align-items-start">
    <div>
        <h1>Audit Log</h1>
        <p>Track all system activities and changes</p>
    </div>
    <button class="btn btn-outline-secondary btn-admin">
        <i class="fas fa-download me-2"></i> Export Log
    </button>
</div>

<!-- Filters -->
<div class="admin-table mb-4">
    <div class="p-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label small fw-semibold">User</label>
                <select class="form-select">
                    <option value="">All Users</option>
                    <option>Sarah van der Merwe</option>
                    <option>Thandi Nkosi</option>
                    <option>System</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Action Type</label>
                <select class="form-select">
                    <option value="">All Actions</option>
                    <option>Application</option>
                    <option>Payment</option>
                    <option>Attendance</option>
                    <option>Communication</option>
                    <option>Settings</option>
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

<!-- Audit Log Table -->
<div class="admin-table">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>User</th>
                    <th>Action</th>
                    <th>Details</th>
                    <th>IP Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td>
                        <div class="fw-semibold">{{ date('d M Y', strtotime($log['timestamp'])) }}</div>
                        <small class="text-muted">{{ date('H:i:s', strtotime($log['timestamp'])) }}</small>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            @if($log['user'] == 'System')
                            <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                <i class="fas fa-robot text-secondary"></i>
                            </div>
                            @else
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                <i class="fas fa-user text-primary"></i>
                            </div>
                            @endif
                            <span>{{ $log['user'] }}</span>
                        </div>
                    </td>
                    <td>
                        @if(str_contains($log['action'], 'Approved'))
                        <span class="badge bg-success">{{ $log['action'] }}</span>
                        @elseif(str_contains($log['action'], 'Updated'))
                        <span class="badge bg-info">{{ $log['action'] }}</span>
                        @elseif(str_contains($log['action'], 'Automated'))
                        <span class="badge bg-warning">{{ $log['action'] }}</span>
                        @else
                        <span class="badge bg-primary">{{ $log['action'] }}</span>
                        @endif
                    </td>
                    <td>{{ $log['details'] }}</td>
                    <td><code>192.168.1.{{ rand(1, 254) }}</code></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="p-4 border-top">
        <nav>
            <ul class="pagination mb-0 justify-content-center">
                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection
