@extends('layouts.portal')

@section('title', 'Newsletters')
@section('portal-name', 'Parent Portal')
@section('page-title', 'Newsletters')

@section('sidebar-nav')
<a href="{{ route('parent.dashboard') }}" class="nav-link">
    <i class="fas fa-home"></i> Dashboard
</a>
<a href="{{ route('parent.children') }}" class="nav-link">
    <i class="fas fa-child"></i> My Children
</a>
<a href="{{ route('parent.calendar') }}" class="nav-link">
    <i class="fas fa-calendar-alt"></i> Calendar
</a>
<a href="{{ route('parent.newsletters') }}" class="nav-link active">
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
<div class="row g-4">
    @foreach($newsletters as $newsletter)
    <div class="col-md-6 col-lg-4">
        <div class="portal-card h-100">
            <div class="position-relative">
                <div style="height: 150px; background: linear-gradient(135deg, #B5D8EB 0%, #FFB5BA 100%);" class="d-flex align-items-center justify-content-center">
                    <i class="fas fa-newspaper fa-4x text-white opacity-50"></i>
                </div>
                @if($newsletter['is_new'])
                <span class="badge bg-danger position-absolute top-0 end-0 m-2">New</span>
                @endif
            </div>
            <div class="portal-card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="badge bg-primary">{{ $newsletter['category'] }}</span>
                    <small class="text-muted">{{ $newsletter['date'] }}</small>
                </div>
                <h5 class="fw-bold mb-2">{{ $newsletter['title'] }}</h5>
                <p class="text-muted small mb-3">{{ Str::limit($newsletter['excerpt'], 100) }}</p>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-sm btn-portal btn-portal-primary flex-grow-1" data-bs-toggle="modal" data-bs-target="#newsletterModal{{ $loop->index }}">
                        <i class="fas fa-eye me-1"></i> Read
                    </a>
                    <a href="#" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-download"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Modal -->
    <div class="modal fade" id="newsletterModal{{ $loop->index }}" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(135deg, #B5D8EB 0%, #FFB5BA 100%);">
                    <div>
                        <h5 class="modal-title fw-bold">{{ $newsletter['title'] }}</h5>
                        <small>{{ $newsletter['date'] }}</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        {!! $newsletter['content'] !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-portal btn-portal-primary">
                        <i class="fas fa-download me-2"></i> Download PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Archive Section -->
<div class="portal-card mt-4">
    <div class="portal-card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-archive me-2"></i> Newsletter Archive</span>
        <select class="form-select form-select-sm w-auto">
            <option>2026</option>
            <option>2025</option>
            <option>2024</option>
        </select>
    </div>
    <div class="portal-card-body">
        <div class="row g-3">
            @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $index => $month)
            <div class="col-6 col-md-3 col-lg-2">
                <a href="#" class="d-block text-center p-3 rounded {{ $index < date('n') ? 'bg-light' : 'bg-light opacity-50' }} text-decoration-none">
                    <i class="fas fa-file-pdf fa-2x {{ $index < date('n') ? 'text-danger' : 'text-muted' }} mb-2"></i>
                    <div class="small {{ $index < date('n') ? 'text-dark' : 'text-muted' }}">{{ $month }}</div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
