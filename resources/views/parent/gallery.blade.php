@extends('layouts.portal')

@section('title', 'Photo Gallery')
@section('portal-name', 'Parent Portal')
@section('page-title', 'Photo Gallery')

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
<a href="{{ route('parent.newsletters') }}" class="nav-link">
    <i class="fas fa-newspaper"></i> Newsletters
</a>
<a href="{{ route('parent.gallery') }}" class="nav-link active">
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
<!-- Filters -->
<div class="portal-card mb-4">
    <div class="portal-card-body">
        <div class="row g-3 align-items-center">
            <div class="col-md-3">
                <select class="form-select">
                    <option value="">All Children</option>
                    @foreach($children as $child)
                    <option value="{{ $child['id'] ?? $loop->index }}">{{ $child['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option value="">All Classes</option>
                    <option>Baby Room</option>
                    <option>Toddlers</option>
                    <option>Preschool</option>
                    <option>Grade R</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option value="">All Events</option>
                    <option>Daily Activities</option>
                    <option>Special Events</option>
                    <option>Outings</option>
                    <option>Birthdays</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="month" class="form-control" value="{{ date('Y-m') }}">
            </div>
        </div>
    </div>
</div>

<!-- Photo Albums -->
@foreach($albums as $album)
<div class="portal-card mb-4">
    <div class="portal-card-header d-flex justify-content-between align-items-center">
        <div>
            <span class="fw-bold">{{ $album['title'] }}</span>
            <span class="badge bg-secondary ms-2">{{ $album['photo_count'] }} photos</span>
        </div>
        <small class="text-muted">{{ $album['date'] }}</small>
    </div>
    <div class="portal-card-body">
        <div class="row g-3">
            @foreach($album['photos'] as $photo)
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="d-block position-relative" data-bs-toggle="modal" data-bs-target="#photoModal">
                    <div class="ratio ratio-1x1">
                        <img src="{{ asset($photo['src']) }}"
                             alt="{{ $photo['caption'] ?? 'Photo' }}"
                             class="rounded"
                             style="object-fit: cover;">
                    </div>
                    <div class="position-absolute bottom-0 start-0 end-0 p-2 text-white text-center" style="background: linear-gradient(transparent, rgba(0,0,0,0.7)); border-radius: 0 0 8px 8px;">
                        <small>{{ $photo['caption'] ?? '' }}</small>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @if($album['photo_count'] > 6)
        <div class="text-center mt-3">
            <a href="#" class="btn btn-outline-primary btn-sm">
                View All {{ $album['photo_count'] }} Photos <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
        @endif
    </div>
</div>
@endforeach

<!-- Photo Modal -->
<div class="modal fade" id="photoModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0 position-relative">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3 bg-white rounded-circle p-2" data-bs-dismiss="modal"></button>
                <img src="{{ asset('assets/img/testimonial/testi-1-1.jpg') }}" alt="Photo" class="w-100 rounded">
                <div class="p-3 bg-light">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1">Art Class Fun</h6>
                            <small class="text-muted">Preschool - January 10, 2026</small>
                        </div>
                        <div class="btn-group">
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-download"></i> Download
                            </a>
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-share"></i> Share
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Download All Section -->
<div class="portal-card">
    <div class="portal-card-body text-center py-4">
        <i class="fas fa-download fa-3x text-primary mb-3"></i>
        <h5>Download All Photos</h5>
        <p class="text-muted mb-3">Download all photos of your child from this month as a ZIP file</p>
        <button class="btn btn-portal btn-portal-primary">
            <i class="fas fa-file-archive me-2"></i> Download January 2026 Photos
        </button>
    </div>
</div>
@endsection

@push('styles')
<style>
    .ratio img:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }
</style>
@endpush
