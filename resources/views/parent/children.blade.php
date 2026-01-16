@extends('layouts.portal')

@section('title', 'My Children')
@section('portal-name', 'Parent Portal')
@section('page-title', 'My Children')

@section('sidebar-nav')
<a href="{{ route('parent.dashboard') }}" class="nav-link">
    <i class="fas fa-home"></i> Dashboard
</a>
<a href="{{ route('parent.children') }}" class="nav-link active">
    <i class="fas fa-child"></i> My Children
</a>
<a href="{{ route('parent.calendar') }}" class="nav-link">
    <i class="fas fa-calendar-alt"></i> Calendar
</a>
<a href="{{ route('parent.newsletters') }}" class="nav-link">
    <i class="fas fa-newspaper"></i> Newsletters
</a>
<a href="{{ route('parent.gallery') }}" class="nav-link">
    <i class="fas fa-images"></i> Photo Gallery
</a>

<div class="nav-section-title">Billing</div>
<a href="{{ route('parent.fees') }}" class="nav-link">
    <i class="fas fa-file-invoice-dollar"></i> Fee Schedule
</a>
<a href="{{ route('parent.statements') }}" class="nav-link">
    <i class="fas fa-receipt"></i> Statements
</a>

<div class="nav-section-title">Services</div>
<a href="{{ route('parent.holiday-care') }}" class="nav-link">
    <i class="fas fa-umbrella-beach"></i> Holiday Care
</a>
<a href="{{ route('parent.extra-murals') }}" class="nav-link">
    <i class="fas fa-futbol"></i> Extra Murals
</a>
<a href="{{ route('parent.snack-box') }}" class="nav-link">
    <i class="fas fa-apple-alt"></i> Snack Box
</a>

<div class="nav-section-title">Communication</div>
<a href="{{ route('parent.messages') }}" class="nav-link">
    <i class="fas fa-comments"></i> Messages
</a>

<div class="nav-section-title">Account</div>
<a href="{{ route('parent.profile') }}" class="nav-link">
    <i class="fas fa-user-cog"></i> Profile
</a>
@endsection

@section('content')
@foreach($children as $child)
<div class="portal-card mb-4">
    <div class="portal-card-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="text-center mb-4 mb-lg-0">
                    <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 120px; height: 120px;">
                        <i class="fas fa-child fa-4x text-primary"></i>
                    </div>
                    <h4 class="mb-1">{{ $child['name'] }}</h4>
                    <span class="badge bg-primary">{{ $child['program'] }}</span>
                    <div class="mt-3">
                        <span class="badge bg-{{ $child['attendance_today'] == 'Present' ? 'success' : 'warning' }} px-3 py-2">
                            <i class="fas fa-{{ $child['attendance_today'] == 'Present' ? 'check' : 'clock' }} me-1"></i>
                            {{ $child['attendance_today'] }} Today
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="text-muted mb-3">Child Information</h6>
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td class="text-muted" width="40%">Full Name</td>
                                <td class="fw-semibold">{{ $child['full_name'] ?? $child['name'] }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Date of Birth</td>
                                <td class="fw-semibold">{{ $child['dob'] }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Age</td>
                                <td class="fw-semibold">{{ $child['age'] }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Class</td>
                                <td class="fw-semibold">{{ $child['program'] }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Teacher</td>
                                <td class="fw-semibold">{{ $child['teacher'] }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted mb-3">This Month</h6>
                        <div class="row g-3 text-center">
                            <div class="col-4">
                                <div class="bg-success bg-opacity-10 rounded p-3">
                                    <div class="h4 fw-bold text-success mb-0">{{ $child['days_this_month'] }}</div>
                                    <small class="text-muted">Days Present</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="bg-warning bg-opacity-10 rounded p-3">
                                    <div class="h4 fw-bold text-warning mb-0">{{ $child['absent_days'] ?? 1 }}</div>
                                    <small class="text-muted">Days Absent</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="bg-primary bg-opacity-10 rounded p-3">
                                    <div class="h4 fw-bold text-primary mb-0">{{ $child['attendance_rate'] }}</div>
                                    <small class="text-muted">Attendance</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="text-muted mb-3">Medical Information</h6>
                        <div class="bg-light rounded p-3">
                            <div class="mb-2">
                                <small class="text-muted">Allergies</small>
                                <div class="fw-semibold">{{ $child['allergies'] ?? 'None recorded' }}</div>
                            </div>
                            <div class="mb-2">
                                <small class="text-muted">Medical Conditions</small>
                                <div class="fw-semibold">{{ $child['medical_conditions'] ?? 'None recorded' }}</div>
                            </div>
                            <div>
                                <small class="text-muted">Dietary Requirements</small>
                                <div class="fw-semibold">{{ $child['dietary'] ?? 'None recorded' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted mb-3">Emergency Contacts</h6>
                        <div class="bg-light rounded p-3">
                            @foreach($child['emergency_contacts'] ?? [['name' => 'Primary Contact', 'phone' => '082 898 9967', 'relation' => 'Parent']] as $contact)
                            <div class="d-flex justify-content-between align-items-center {{ !$loop->last ? 'mb-2 pb-2 border-bottom' : '' }}">
                                <div>
                                    <div class="fw-semibold">{{ $contact['name'] }}</div>
                                    <small class="text-muted">{{ $contact['relation'] }}</small>
                                </div>
                                <a href="tel:{{ $contact['phone'] }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-phone"></i>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Quick Actions -->
<div class="portal-card">
    <div class="portal-card-header">Quick Actions</div>
    <div class="portal-card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <a href="{{ route('parent.messages') }}" class="quick-action">
                    <div class="icon bg-primary bg-opacity-10">
                        <i class="fas fa-envelope text-primary"></i>
                    </div>
                    <div>
                        <div class="fw-semibold">Message Teacher</div>
                        <small class="text-muted">Send a note</small>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="quick-action">
                    <div class="icon bg-warning bg-opacity-10">
                        <i class="fas fa-user-edit text-warning"></i>
                    </div>
                    <div>
                        <div class="fw-semibold">Update Info</div>
                        <small class="text-muted">Edit details</small>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="quick-action">
                    <div class="icon bg-danger bg-opacity-10">
                        <i class="fas fa-calendar-times text-danger"></i>
                    </div>
                    <div>
                        <div class="fw-semibold">Report Absence</div>
                        <small class="text-muted">Notify school</small>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('parent.gallery') }}" class="quick-action">
                    <div class="icon bg-success bg-opacity-10">
                        <i class="fas fa-images text-success"></i>
                    </div>
                    <div>
                        <div class="fw-semibold">View Photos</div>
                        <small class="text-muted">Gallery</small>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
