@extends('layouts.portal')

@section('title', 'My Children')
@section('portal-name', 'Parent Portal')
@section('page-title', 'My Children')

@section('sidebar-nav')
@include('parent.partials.sidebar')
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
                    @php
                        $stColors = ['approved'=>['bg-success','text-white'],'pending'=>['bg-warning','text-dark'],'under_review'=>['',''],'waitlist'=>['bg-secondary','text-white'],'rejected'=>['bg-danger','text-white']];
                        [$stBg,$stTxt] = $stColors[$child['status']] ?? ['bg-secondary','text-white'];
                    @endphp
                    <span class="badge {{ $stBg }} {{ $stTxt }}">{{ $child['status_label'] }}</span>
                    <div class="mt-3">
                        <span class="badge bg-{{ $child['attendance_today'] == 'Present' ? 'success' : 'warning' }} px-3 py-2">
                            <i class="fas fa-{{ $child['attendance_today'] == 'Present' ? 'check' : 'clock' }} me-1"></i>
                            {{ $child['attendance_today'] }} Today
                        </span>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('parent.children.show', $child['id']) }}" class="btn btn-sm btn-portal btn-portal-primary rounded-pill px-4">
                            <i class="fas fa-eye me-1"></i> View Full Details
                        </a>
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
                            <tr>
                                <td class="text-muted">Fee Option</td>
                                <td class="fw-semibold">{{ $child['fee_option'] ?? '—' }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Reference</td>
                                <td class="fw-semibold"><code style="color:#0077B6;">{{ $child['reference'] ?? '—' }}</code></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Start Date</td>
                                <td class="fw-semibold">{{ $child['start_date'] ?? '—' }}</td>
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
