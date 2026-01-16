@extends('layouts.portal')

@section('title', 'Profile')
@section('portal-name', 'Teacher Portal')
@section('page-title', 'My Profile')

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
<a href="{{ route('teacher.students') }}" class="nav-link">
    <i class="fas fa-users"></i> Students
</a>
<a href="{{ route('teacher.updates') }}" class="nav-link">
    <i class="fas fa-comment-dots"></i> Daily Updates
</a>
<a href="{{ route('teacher.gallery') }}" class="nav-link">
    <i class="fas fa-camera"></i> Photo Gallery
</a>

<div class="nav-section-title">Account</div>
<a href="{{ route('teacher.profile') }}" class="nav-link active">
    <i class="fas fa-user-cog"></i> Profile
</a>
@endsection

@section('content')
<div class="row g-4">
    <div class="col-lg-8">
        <!-- Personal Information -->
        <div class="portal-card mb-4">
            <div class="portal-card-header">
                <i class="fas fa-user me-2"></i> Personal Information
            </div>
            <div class="portal-card-body">
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">First Name</label>
                            <input type="text" class="form-control" value="{{ $teacher['first_name'] ?? 'Sarah' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Last Name</label>
                            <input type="text" class="form-control" value="{{ $teacher['last_name'] ?? 'van der Merwe' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email" class="form-control" value="{{ $teacher['email'] ?? 'sarah.vdm@peekaboo.co.za' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Phone Number</label>
                            <input type="tel" class="form-control" value="{{ $teacher['phone'] ?? '082 123 4567' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Address</label>
                            <input type="text" class="form-control mb-2" placeholder="Street address" value="456 Teacher Lane">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Suburb" value="Parklands">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="City" value="Cape Town">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="Postal Code" value="7441">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-portal btn-portal-primary">
                                <i class="fas fa-save me-2"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Professional Information -->
        <div class="portal-card mb-4">
            <div class="portal-card-header">
                <i class="fas fa-briefcase me-2"></i> Professional Information
            </div>
            <div class="portal-card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Job Title</label>
                        <input type="text" class="form-control" value="Preschool Teacher" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Class Assigned</label>
                        <input type="text" class="form-control" value="{{ $teacher['class'] ?? 'Preschool' }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Start Date</label>
                        <input type="text" class="form-control" value="January 2020" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Employee ID</label>
                        <input type="text" class="form-control" value="TCH-2020-001" readonly>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Qualifications</label>
                        <textarea class="form-control" rows="2" readonly>Bachelor of Education in Early Childhood Development
National Diploma in Grade R Teaching</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Change Password -->
        <div class="portal-card">
            <div class="portal-card-header">
                <i class="fas fa-lock me-2"></i> Change Password
            </div>
            <div class="portal-card-body">
                <form>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Current Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">New Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Confirm New Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-portal btn-portal-primary">
                                <i class="fas fa-key me-2"></i> Update Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Profile Summary -->
        <div class="portal-card mb-4">
            <div class="portal-card-body text-center">
                <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                    <i class="fas fa-user fa-3x text-primary"></i>
                </div>
                <h5 class="fw-bold">{{ $teacher['name'] ?? 'Sarah van der Merwe' }}</h5>
                <p class="text-muted mb-3">Preschool Teacher</p>
                <div class="border-top pt-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Member Since:</span>
                        <span class="fw-semibold">Jan 2020</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Class:</span>
                        <span class="fw-semibold">Preschool (3-4 years)</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted small">Students:</span>
                        <span class="fw-semibold">16</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- This Month's Stats -->
        <div class="portal-card mb-4">
            <div class="portal-card-header">
                <i class="fas fa-chart-line me-2"></i> This Month
            </div>
            <div class="portal-card-body">
                <div class="mb-3 pb-3 border-bottom">
                    <div class="d-flex justify-content-between mb-1">
                        <small class="text-muted">Updates Sent</small>
                        <span class="fw-semibold">147</span>
                    </div>
                </div>
                <div class="mb-3 pb-3 border-bottom">
                    <div class="d-flex justify-content-between mb-1">
                        <small class="text-muted">Photos Uploaded</small>
                        <span class="fw-semibold">35</span>
                    </div>
                </div>
                <div class="mb-3 pb-3 border-bottom">
                    <div class="d-flex justify-content-between mb-1">
                        <small class="text-muted">Avg. Class Attendance</small>
                        <span class="fw-semibold">87%</span>
                    </div>
                </div>
                <div>
                    <div class="d-flex justify-content-between mb-1">
                        <small class="text-muted">Parent Messages</small>
                        <span class="fw-semibold">28</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notification Preferences -->
        <div class="portal-card">
            <div class="portal-card-header">
                <i class="fas fa-bell me-2"></i> Notifications
            </div>
            <div class="portal-card-body">
                <div class="mb-3">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="emailNotif" checked>
                        <label class="form-check-label" for="emailNotif">Email Notifications</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="smsNotif">
                        <label class="form-check-label" for="smsNotif">SMS Notifications</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="parentMsg" checked>
                        <label class="form-check-label" for="parentMsg">Parent Messages</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="reminders" checked>
                        <label class="form-check-label" for="reminders">Daily Reminders</label>
                    </div>
                </div>
                <button class="btn btn-sm btn-portal btn-portal-primary w-100">
                    <i class="fas fa-save me-2"></i> Save Preferences
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
