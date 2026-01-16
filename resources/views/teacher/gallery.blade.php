@extends('layouts.portal')

@section('title', 'Photo Gallery')
@section('portal-name', 'Teacher Portal')
@section('page-title', 'Photo Gallery')

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
<a href="{{ route('teacher.gallery') }}" class="nav-link active">
    <i class="fas fa-camera"></i> Photo Gallery
</a>

<div class="nav-section-title">Account</div>
<a href="{{ route('teacher.profile') }}" class="nav-link">
    <i class="fas fa-user-cog"></i> Profile
</a>
@endsection

@section('content')
<!-- Upload Photos -->
<div class="portal-card mb-4">
    <div class="portal-card-header">
        <i class="fas fa-cloud-upload-alt me-2"></i> Upload Photos
    </div>
    <div class="portal-card-body">
        <form>
            <div class="row g-3">
                <div class="col-12">
                    <div class="border-2 border-dashed rounded p-5 text-center" style="border: 2px dashed #dee2e6;">
                        <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                        <h6>Drag & Drop Photos Here</h6>
                        <p class="text-muted mb-3">or click to browse</p>
                        <input type="file" class="form-control" accept="image/*" multiple>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Album/Category</label>
                    <select class="form-select">
                        <option value="">Select album...</option>
                        <option>Daily Activities</option>
                        <option>Art & Craft</option>
                        <option>Outdoor Play</option>
                        <option>Learning Activities</option>
                        <option>Special Events</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Date</label>
                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Caption (Optional)</label>
                    <input type="text" class="form-control" placeholder="e.g., Ocean art activity - Making jellyfish">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-portal btn-portal-primary">
                        <i class="fas fa-upload me-2"></i> Upload Photos
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Recent Uploads -->
<div class="portal-card mb-4">
    <div class="portal-card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-images me-2"></i> Recent Uploads</span>
        <select class="form-select form-select-sm w-auto">
            <option>This Week</option>
            <option>This Month</option>
            <option>All Time</option>
        </select>
    </div>
    <div class="portal-card-body">
        @php
            $albums = [
                ['title' => 'Ocean Art Activity', 'date' => 'Today', 'photos' => 12],
                ['title' => 'Outdoor Play Time', 'date' => 'Yesterday', 'photos' => 8],
                ['title' => 'Music & Movement', 'date' => 'Jan 15', 'photos' => 15],
            ];
        @endphp
        @foreach($albums as $album)
        <div class="border rounded p-3 mb-3">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h6 class="fw-bold mb-1">{{ $album['title'] }}</h6>
                    <small class="text-muted">{{ $album['date'] }} | {{ $album['photos'] }} photos</small>
                </div>
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i> Edit</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-download me-2"></i> Download All</a></li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Delete</a></li>
                    </ul>
                </div>
            </div>
            <div class="row g-2">
                @for($i = 1; $i <= min($album['photos'], 6); $i++)
                <div class="col-4 col-md-2">
                    <div class="ratio ratio-1x1">
                        <img src="{{ asset('assets/img/testimonial/testi-1-' . (($i % 3) + 1) . '.jpg') }}"
                             alt="Photo"
                             class="rounded"
                             style="object-fit: cover; cursor: pointer;"
                             data-bs-toggle="modal"
                             data-bs-target="#photoModal">
                    </div>
                </div>
                @endfor
            </div>
            @if($album['photos'] > 6)
            <div class="text-center mt-2">
                <small class="text-muted">+{{ $album['photos'] - 6 }} more photos</small>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>

<!-- Gallery Stats -->
<div class="row g-4">
    <div class="col-md-3">
        <div class="portal-card">
            <div class="portal-card-body text-center">
                <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                    <i class="fas fa-images fa-lg text-primary"></i>
                </div>
                <div class="h3 fw-bold mb-0">156</div>
                <small class="text-muted">Total Photos</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="portal-card">
            <div class="portal-card-body text-center">
                <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                    <i class="fas fa-calendar-week fa-lg text-success"></i>
                </div>
                <div class="h3 fw-bold mb-0">35</div>
                <small class="text-muted">This Month</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="portal-card">
            <div class="portal-card-body text-center">
                <div class="rounded-circle bg-warning bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                    <i class="fas fa-folder fa-lg text-warning"></i>
                </div>
                <div class="h3 fw-bold mb-0">12</div>
                <small class="text-muted">Albums</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="portal-card">
            <div class="portal-card-body text-center">
                <div class="rounded-circle bg-info bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                    <i class="fas fa-eye fa-lg text-info"></i>
                </div>
                <div class="h3 fw-bold mb-0">842</div>
                <small class="text-muted">Parent Views</small>
            </div>
        </div>
    </div>
</div>

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
                            <h6 class="mb-1">Ocean Art Activity</h6>
                            <small class="text-muted">Today | 12:45 PM</small>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
