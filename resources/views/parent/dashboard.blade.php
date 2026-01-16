@extends('layouts.portal')

@section('title', 'Dashboard')
@section('portal-name', 'Parent Portal')
@section('page-title', 'Dashboard')

@section('sidebar-nav')
<a href="{{ route('parent.dashboard') }}" class="nav-link active">
    <i class="fas fa-home"></i> Dashboard
</a>
<a href="{{ route('parent.children') }}" class="nav-link">
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
    <span class="badge bg-danger ms-auto">2</span>
</a>

<div class="nav-section-title">Account</div>
<a href="{{ route('parent.profile') }}" class="nav-link">
    <i class="fas fa-user-cog"></i> Profile
</a>
@endsection

@section('header-actions')
<a href="{{ route('parent.messages') }}" class="position-relative text-muted">
    <i class="fas fa-bell fa-lg"></i>
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
</a>
@endsection

@section('content')
<!-- Welcome Banner -->
<div class="portal-card mb-4" style="background: linear-gradient(135deg, #B5D8EB 0%, #FFB5BA 100%);">
    <div class="portal-card-body">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h3 class="mb-2">Good {{ date('H') < 12 ? 'Morning' : (date('H') < 17 ? 'Afternoon' : 'Evening') }}, {{ $parent['name'] }}!</h3>
                <p class="mb-0 opacity-75">Welcome to your Peekaboo parent portal. Stay connected with your child's day.</p>
            </div>
            <div class="col-md-4 text-end d-none d-md-block">
                <img src="{{ asset('assets/img/peekaboo/logo.png') }}" alt="Peekaboo" style="height: 60px; opacity: 0.8;">
            </div>
        </div>
    </div>
</div>

<!-- Children Cards -->
<div class="row g-4 mb-4">
    @foreach($children as $child)
    <div class="col-md-6">
        <div class="child-card">
            <div class="d-flex justify-content-between align-items-start">
                <div class="d-flex gap-3">
                    <div class="rounded-circle bg-white d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="fas fa-child fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h4 class="mb-1">{{ $child['name'] }}</h4>
                        <p class="mb-1"><strong>{{ $child['program'] }}</strong></p>
                        <small class="opacity-75">Age: {{ $child['age'] }}</small>
                    </div>
                </div>
                <span class="badge bg-{{ $child['attendance_today'] == 'Present' ? 'success' : 'warning' }}">
                    {{ $child['attendance_today'] }}
                </span>
            </div>
            <hr class="my-3 opacity-25">
            <div class="row text-center">
                <div class="col-4">
                    <div class="fw-bold">{{ $child['attendance_rate'] }}</div>
                    <small class="opacity-75">Attendance</small>
                </div>
                <div class="col-4">
                    <div class="fw-bold">{{ $child['days_this_month'] }}</div>
                    <small class="opacity-75">Days This Month</small>
                </div>
                <div class="col-4">
                    <div class="fw-bold">{{ $child['teacher'] }}</div>
                    <small class="opacity-75">Teacher</small>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Quick Actions & Announcements -->
<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <div class="portal-card h-100">
            <div class="portal-card-header">
                <i class="fas fa-bolt me-2 text-warning"></i> Quick Actions
            </div>
            <div class="portal-card-body">
                <div class="row g-3">
                    <div class="col-6">
                        <a href="{{ route('parent.statements') }}" class="quick-action">
                            <div class="icon bg-primary bg-opacity-10">
                                <i class="fas fa-file-invoice text-primary"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">View Statement</div>
                                <small class="text-muted">Current balance</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="#" class="quick-action" data-bs-toggle="modal" data-bs-target="#uploadPopModal">
                            <div class="icon bg-success bg-opacity-10">
                                <i class="fas fa-upload text-success"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">Upload POP</div>
                                <small class="text-muted">Proof of payment</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('parent.holiday-care') }}" class="quick-action">
                            <div class="icon bg-info bg-opacity-10">
                                <i class="fas fa-umbrella-beach text-info"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">Holiday Care</div>
                                <small class="text-muted">Book dates</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('parent.messages') }}" class="quick-action">
                            <div class="icon bg-danger bg-opacity-10">
                                <i class="fas fa-comment-dots text-danger"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">Message Teacher</div>
                                <small class="text-muted">Send a note</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="portal-card h-100">
            <div class="portal-card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-bullhorn me-2 text-primary"></i> Announcements</span>
                <a href="#" class="small text-primary">View All</a>
            </div>
            <div class="portal-card-body p-0">
                @foreach($announcements as $announcement)
                <div class="p-3 border-bottom">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="badge bg-{{ $announcement['type'] == 'important' ? 'danger' : ($announcement['type'] == 'event' ? 'primary' : 'secondary') }}">
                            {{ ucfirst($announcement['type']) }}
                        </span>
                        <small class="text-muted">{{ $announcement['date'] }}</small>
                    </div>
                    <h6 class="mb-1">{{ $announcement['title'] }}</h6>
                    <p class="small text-muted mb-0">{{ Str::limit($announcement['content'], 100) }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Upcoming Events & Fee Summary -->
<div class="row g-4">
    <div class="col-lg-6">
        <div class="portal-card">
            <div class="portal-card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-calendar-day me-2 text-info"></i> Upcoming Events</span>
                <a href="{{ route('parent.calendar') }}" class="small text-primary">View Calendar</a>
            </div>
            <div class="portal-card-body p-0">
                @foreach($upcomingEvents as $event)
                <div class="d-flex gap-3 p-3 border-bottom">
                    <div class="text-center bg-primary bg-opacity-10 rounded p-2" style="min-width: 50px;">
                        <div class="fw-bold text-primary">{{ date('d', strtotime($event['date'])) }}</div>
                        <small class="text-muted">{{ date('M', strtotime($event['date'])) }}</small>
                    </div>
                    <div>
                        <h6 class="mb-1">{{ $event['title'] }}</h6>
                        <small class="text-muted">
                            <i class="fas fa-clock me-1"></i> {{ $event['time'] }}
                        </small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="portal-card">
            <div class="portal-card-header">
                <i class="fas fa-wallet me-2 text-success"></i> Account Summary
            </div>
            <div class="portal-card-body">
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <span class="text-muted">Monthly Fees</span>
                    <span class="fw-bold">R {{ number_format($accountSummary['monthly_fee'], 2) }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <span class="text-muted">Last Payment</span>
                    <span class="fw-bold text-success">R {{ number_format($accountSummary['last_payment'], 2) }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <span class="text-muted">Current Balance</span>
                    <span class="fw-bold {{ $accountSummary['balance'] > 0 ? 'text-danger' : 'text-success' }}">
                        R {{ number_format($accountSummary['balance'], 2) }}
                    </span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-muted">Next Payment Due</span>
                    <span class="fw-semibold">{{ $accountSummary['next_due'] }}</span>
                </div>
                <div class="mt-4">
                    <a href="{{ route('parent.statements') }}" class="btn btn-portal btn-portal-primary w-100">
                        <i class="fas fa-download me-2"></i> Download Statement
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Gallery -->
<div class="portal-card mt-4">
    <div class="portal-card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-images me-2 text-warning"></i> Recent Photos</span>
        <a href="{{ route('parent.gallery') }}" class="small text-primary">View All</a>
    </div>
    <div class="portal-card-body">
        <div class="row g-3">
            @for($i = 1; $i <= 6; $i++)
            <div class="col-4 col-md-2">
                <div class="ratio ratio-1x1">
                    <img src="{{ asset('assets/img/testimonial/testi-1-' . (($i % 3) + 1) . '.jpg') }}"
                         alt="Gallery"
                         class="rounded"
                         style="object-fit: cover;">
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>

<!-- Upload POP Modal -->
<div class="modal fade" id="uploadPopModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Upload Proof of Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Payment Amount</label>
                        <div class="input-group">
                            <span class="input-group-text">R</span>
                            <input type="number" class="form-control" placeholder="0.00" step="0.01">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Payment Date</label>
                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Bank Reference</label>
                        <input type="text" class="form-control" placeholder="Enter bank reference">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Upload POP</label>
                        <input type="file" class="form-control" accept="image/*,.pdf">
                        <small class="text-muted">Accepted: JPG, PNG, PDF (max 5MB)</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Notes (Optional)</label>
                        <textarea class="form-control" rows="2" placeholder="Any additional information..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-portal btn-portal-primary">
                    <i class="fas fa-upload me-2"></i> Submit POP
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
