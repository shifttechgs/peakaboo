@extends('layouts.portal')

@section('title', 'Students')
@section('portal-name', 'Teacher Portal')
@section('page-title', 'My Students')

@section('sidebar-nav')
<a href="{{ route('teacher.dashboard') }}" class="nav-link">
    <i class="fas fa-home"></i> Dashboard
</a>
<a href="{{ route('teacher.attendance') }}" class="nav-link">
    <i class="fas fa-clipboard-check"></i> Attendance
</a>
<a href="{{ route('teacher.class') }}" class="nav-link">
    <i class="fas fa-chalkboard-teacher"></i> My Class
</a>
<a href="{{ route('teacher.students') }}" class="nav-link active">
    <i class="fas fa-users"></i> Students
</a>
<a href="{{ route('teacher.updates') }}" class="nav-link">
    <i class="fas fa-comment-dots"></i> Daily Updates
</a>
<a href="{{ route('teacher.gallery') }}" class="nav-link">
    <i class="fas fa-camera"></i> Photo Gallery
</a>

<div class="nav-section-title">Account</div>
<a href="{{ route('teacher.profile') }}" class="nav-link">
    <i class="fas fa-user-cog"></i> Profile
</a>
@endsection

@section('content')
<!-- Search & Filter -->
<div class="portal-card mb-4">
    <div class="portal-card-body">
        <div class="row g-3 align-items-center">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search students...">
                </div>
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option value="">All Students</option>
                    <option>Present Today</option>
                    <option>Absent Today</option>
                    <option>Has Allergies</option>
                </select>
            </div>
            <div class="col-md-3 text-end">
                <button class="btn btn-outline-secondary">
                    <i class="fas fa-download me-2"></i> Export List
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Students Grid -->
<div class="row g-4">
    @php
        $students = [
            ['name' => 'Emma Thompson', 'age' => 4, 'attendance' => 98, 'parent' => 'Sarah Thompson', 'phone' => '082 898 9967', 'allergies' => 'Shellfish', 'status' => 'present'],
            ['name' => 'Liam Johnson', 'age' => 3, 'attendance' => 95, 'parent' => 'Michael Johnson', 'phone' => '083 123 4567', 'allergies' => 'Peanuts', 'status' => 'present'],
            ['name' => 'Ava Williams', 'age' => 4, 'attendance' => 92, 'parent' => 'Jennifer Williams', 'phone' => '082 234 5678', 'allergies' => 'None', 'status' => 'absent'],
            ['name' => 'Noah Brown', 'age' => 3, 'attendance' => 97, 'parent' => 'David Brown', 'phone' => '084 345 6789', 'allergies' => 'Bee stings', 'status' => 'present'],
            ['name' => 'Sophia Davis', 'age' => 4, 'attendance' => 90, 'parent' => 'Emily Davis', 'phone' => '082 456 7890', 'allergies' => 'None', 'status' => 'present'],
            ['name' => 'Oliver Wilson', 'age' => 3, 'attendance' => 96, 'parent' => 'James Wilson', 'phone' => '083 567 8901', 'allergies' => 'None', 'status' => 'present'],
        ];
    @endphp
    @foreach($students as $student)
    <div class="col-md-6 col-lg-4">
        <div class="portal-card h-100">
            <div class="portal-card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="d-flex gap-3">
                        <div class="rounded-circle bg-{{ $student['status'] == 'present' ? 'success' : 'danger' }} bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fas fa-user fa-lg text-{{ $student['status'] == 'present' ? 'success' : 'danger' }}"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">{{ $student['name'] }}</h6>
                            <small class="text-muted">Age {{ $student['age'] }}</small>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#studentModal"><i class="fas fa-eye me-2"></i> View Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-comment me-2"></i> Message Parent</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-alt me-2"></i> Learning Journal</a></li>
                        </ul>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between text-muted small mb-1">
                        <span>Attendance</span>
                        <span class="fw-semibold">{{ $student['attendance'] }}%</span>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-success" style="width: {{ $student['attendance'] }}%"></div>
                    </div>
                </div>

                <div class="border-top pt-3">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="fas fa-user-tie text-muted"></i>
                        <small class="text-muted">{{ $student['parent'] }}</small>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="fas fa-phone text-muted"></i>
                        <small class="text-muted">{{ $student['phone'] }}</small>
                    </div>
                    @if($student['allergies'] != 'None')
                    <div class="d-flex align-items-center gap-2">
                        <i class="fas fa-exclamation-triangle text-danger"></i>
                        <small class="text-danger fw-semibold">{{ $student['allergies'] }}</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Student Profile Modal -->
<div class="modal fade" id="studentModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Student Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    <div class="col-md-4 text-center">
                        <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                            <i class="fas fa-user fa-3x text-success"></i>
                        </div>
                        <h5 class="fw-bold">Emma Thompson</h5>
                        <p class="text-muted">Age 4 | Preschool</p>
                        <div class="d-grid gap-2">
                            <button class="btn btn-sm btn-portal btn-portal-primary">
                                <i class="fas fa-comment me-2"></i> Message Parent
                            </button>
                            <button class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-file-alt me-2"></i> Learning Journal
                            </button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="fw-bold mb-3">Personal Information</h6>
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td class="text-muted" width="40%">Date of Birth:</td>
                                <td class="fw-semibold">March 15, 2021</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Enrollment Date:</td>
                                <td class="fw-semibold">January 2025</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Attendance Rate:</td>
                                <td class="fw-semibold">98%</td>
                            </tr>
                        </table>

                        <h6 class="fw-bold mb-3 mt-4">Parent Details</h6>
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td class="text-muted" width="40%">Mother:</td>
                                <td class="fw-semibold">Sarah Thompson</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Phone:</td>
                                <td class="fw-semibold">082 898 9967</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Email:</td>
                                <td class="fw-semibold">sarah@email.com</td>
                            </tr>
                        </table>

                        <h6 class="fw-bold mb-3 mt-4">Medical Information</h6>
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Severe Allergy:</strong> Shellfish
                        </div>
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td class="text-muted" width="40%">Medical Conditions:</td>
                                <td class="fw-semibold">None</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Dietary Requirements:</td>
                                <td class="fw-semibold">None</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
