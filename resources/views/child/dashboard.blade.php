@extends('layouts.portal')

@section('title', 'Dashboard')
@section('portal-name', 'My Portal')
@section('page-title', 'My Dashboard')

@section('sidebar-nav')
<a href="{{ route('child.dashboard') }}" class="nav-link active">
    <i class="fas fa-home"></i> Dashboard
</a>
<a href="{{ route('child.schedule') }}" class="nav-link">
    <i class="fas fa-calendar-alt"></i> My Schedule
</a>
<a href="{{ route('child.gallery') }}" class="nav-link">
    <i class="fas fa-images"></i> My Gallery
</a>
<a href="{{ route('child.updates') }}" class="nav-link">
    <i class="fas fa-star"></i> My Updates
</a>
@endsection

@section('content')
<!-- Welcome Banner -->
<div class="portal-card mb-4" style="background: linear-gradient(135deg, #FFB5BA 0%, #FFDDB5 100%);">
    <div class="portal-card-body">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h3 class="mb-2">
                    {{ date('H') < 12 ? '🌞 Good Morning' : (date('H') < 17 ? '☀️ Good Afternoon' : '🌙 Good Evening') }},
                    {{ $child->name ?? 'Friend' }}!
                </h3>
                <p class="mb-0">Welcome to your Peekaboo portal! Today is {{ date('l, F j, Y') }}</p>
            </div>
            <div class="col-md-4 text-end d-none d-md-block">
                <img src="{{ asset('assets/img/peekaboo/logo.png') }}" alt="Peekaboo" style="height: 60px; opacity: 0.8;">
            </div>
        </div>
    </div>
</div>

<!-- Quick Links -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <a href="{{ route('child.schedule') }}" class="text-decoration-none">
            <div class="portal-card h-100 text-center">
                <div class="portal-card-body py-4">
                    <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px;">
                        <i class="fas fa-calendar-alt fa-2x text-primary"></i>
                    </div>
                    <div class="fw-bold">My Schedule</div>
                    <small class="text-muted">View your daily timetable</small>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('child.gallery') }}" class="text-decoration-none">
            <div class="portal-card h-100 text-center">
                <div class="portal-card-body py-4">
                    <div class="rounded-circle bg-warning bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px;">
                        <i class="fas fa-images fa-2x text-warning"></i>
                    </div>
                    <div class="fw-bold">My Gallery</div>
                    <small class="text-muted">See your photos and memories</small>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('child.updates') }}" class="text-decoration-none">
            <div class="portal-card h-100 text-center">
                <div class="portal-card-body py-4">
                    <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px;">
                        <i class="fas fa-star fa-2x text-success"></i>
                    </div>
                    <div class="fw-bold">My Updates</div>
                    <small class="text-muted">Your daily notes from teachers</small>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- Today's Schedule Preview -->
<div class="portal-card">
    <div class="portal-card-body">
        <h5 class="fw-bold mb-3"><i class="fas fa-clock me-2 text-primary"></i> Today's Activities</h5>
        <div class="list-group list-group-flush">
            <div class="list-group-item d-flex align-items-center px-0 py-3 border-top-0">
                <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width: 42px; height: 42px; min-width: 42px;">
                    <i class="fas fa-apple-alt text-primary"></i>
                </div>
                <div>
                    <div class="fw-semibold">Morning Snack</div>
                    <small class="text-muted">09:00 – 09:15</small>
                </div>
            </div>
            <div class="list-group-item d-flex align-items-center px-0 py-3">
                <div class="rounded-circle bg-warning bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width: 42px; height: 42px; min-width: 42px;">
                    <i class="fas fa-palette text-warning"></i>
                </div>
                <div>
                    <div class="fw-semibold">Arts &amp; Crafts</div>
                    <small class="text-muted">09:15 – 10:00</small>
                </div>
            </div>
            <div class="list-group-item d-flex align-items-center px-0 py-3">
                <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width: 42px; height: 42px; min-width: 42px;">
                    <i class="fas fa-running text-success"></i>
                </div>
                <div>
                    <div class="fw-semibold">Outdoor Play</div>
                    <small class="text-muted">10:00 – 10:45</small>
                </div>
            </div>
            <div class="list-group-item d-flex align-items-center px-0 py-3">
                <div class="rounded-circle bg-info bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width: 42px; height: 42px; min-width: 42px;">
                    <i class="fas fa-book-open text-info"></i>
                </div>
                <div>
                    <div class="fw-semibold">Story Time</div>
                    <small class="text-muted">11:00 – 11:30</small>
                </div>
            </div>
            <div class="list-group-item d-flex align-items-center px-0 py-3">
                <div class="rounded-circle bg-danger bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width: 42px; height: 42px; min-width: 42px;">
                    <i class="fas fa-utensils text-danger"></i>
                </div>
                <div>
                    <div class="fw-semibold">Lunch</div>
                    <small class="text-muted">12:00 – 12:30</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
