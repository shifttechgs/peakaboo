@extends('layouts.portal')

@section('title', 'My Class')
@section('portal-name', 'Teacher Portal')
@section('page-title', 'My Class')

@section('sidebar-nav')
<a href="{{ route('teacher.dashboard') }}" class="nav-link">
    <i class="fas fa-home"></i> Dashboard
</a>
<a href="{{ route('teacher.attendance') }}" class="nav-link">
    <i class="fas fa-clipboard-check"></i> Attendance
</a>
<a href="{{ route('teacher.class') }}" class="nav-link active">
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
<a href="{{ route('teacher.profile') }}" class="nav-link">
    <i class="fas fa-user-cog"></i> Profile
</a>
@endsection

@section('content')
<!-- Class Info -->
<div class="portal-card mb-4" style="background: linear-gradient(135deg, #B5D8EB 0%, #FFB5BA 100%);">
    <div class="portal-card-body">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="fw-bold mb-2">{{ $teacher['class'] ?? 'Preschool' }} Class</h4>
                <p class="mb-2">Teacher: {{ $teacher['name'] ?? 'Sarah van der Merwe' }} | Age Group: 3-4 years</p>
                <div class="d-flex gap-3">
                    <div><i class="fas fa-users me-2"></i>16 Students</div>
                    <div><i class="fas fa-chart-line me-2"></i>87% Average Attendance</div>
                </div>
            </div>
            <div class="col-md-4 text-end d-none d-md-block">
                <i class="fas fa-chalkboard-teacher fa-4x opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<!-- Today's Schedule -->
<div class="portal-card mb-4">
    <div class="portal-card-header">
        <i class="fas fa-clock me-2"></i> Today's Schedule
    </div>
    <div class="portal-card-body">
        <div class="row g-3">
            @php
                $schedule = [
                    ['time' => '07:30 - 08:30', 'activity' => 'Arrival & Free Play', 'icon' => 'clock', 'color' => 'primary'],
                    ['time' => '08:30 - 09:00', 'activity' => 'Morning Circle Time', 'icon' => 'users', 'color' => 'success'],
                    ['time' => '09:00 - 10:00', 'activity' => 'Learning Activities', 'icon' => 'book', 'color' => 'info'],
                    ['time' => '10:00 - 10:30', 'activity' => 'Snack & Outdoor Play', 'icon' => 'apple-alt', 'color' => 'warning'],
                    ['time' => '10:30 - 11:30', 'activity' => 'Creative Arts', 'icon' => 'palette', 'color' => 'danger'],
                    ['time' => '11:30 - 12:00', 'activity' => 'Story Time', 'icon' => 'book-reader', 'color' => 'secondary'],
                    ['time' => '12:00 - 13:00', 'activity' => 'Lunch & Quiet Time', 'icon' => 'utensils', 'color' => 'success'],
                    ['time' => '13:00 - 14:00', 'activity' => 'Nap Time', 'icon' => 'bed', 'color' => 'primary'],
                    ['time' => '14:00 - 15:00', 'activity' => 'Afternoon Activities', 'icon' => 'running', 'color' => 'info'],
                    ['time' => '15:00 - 15:30', 'activity' => 'Afternoon Snack', 'icon' => 'cookie', 'color' => 'warning'],
                    ['time' => '15:30 - 17:30', 'activity' => 'Free Play & Home Time', 'icon' => 'home', 'color' => 'danger'],
                ];
            @endphp
            @foreach($schedule as $item)
            <div class="col-md-6 col-lg-4">
                <div class="border rounded p-3 d-flex gap-3 align-items-center">
                    <div class="rounded-circle bg-{{ $item['color'] }} bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; flex-shrink: 0;">
                        <i class="fas fa-{{ $item['icon'] }} text-{{ $item['color'] }}"></i>
                    </div>
                    <div>
                        <div class="fw-semibold">{{ $item['activity'] }}</div>
                        <small class="text-muted">{{ $item['time'] }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- This Week's Theme -->
<div class="portal-card mb-4">
    <div class="portal-card-header">
        <i class="fas fa-lightbulb me-2"></i> This Week's Learning Theme
    </div>
    <div class="portal-card-body">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h5 class="fw-bold mb-2">Ocean & Sea Creatures</h5>
                <p class="mb-3">This week we're exploring the wonders of the ocean! Children will learn about different sea creatures, their habitats, and the importance of caring for our oceans.</p>
                <h6 class="fw-bold mb-2">Planned Activities:</h6>
                <ul class="mb-0">
                    <li>Create ocean dioramas using recycled materials</li>
                    <li>Learn sea creature songs and movements</li>
                    <li>Read "Rainbow Fish" and "Commotion in the Ocean"</li>
                    <li>Make jellyfish crafts with paper plates</li>
                    <li>Water play with toy sea animals</li>
                </ul>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('assets/img/peekaboo/logo.png') }}" alt="Ocean Theme" class="img-fluid" style="max-height: 150px; opacity: 0.7;">
            </div>
        </div>
    </div>
</div>

<!-- Important Information -->
<div class="row g-4">
    <div class="col-lg-6">
        <div class="portal-card h-100">
            <div class="portal-card-header">
                <i class="fas fa-exclamation-triangle me-2 text-warning"></i> Important Alerts
            </div>
            <div class="portal-card-body p-0">
                <div class="p-3 border-bottom">
                    <div class="d-flex gap-2">
                        <i class="fas fa-allergies text-danger"></i>
                        <div>
                            <div class="fw-semibold">Severe Allergies (3)</div>
                            <small class="text-muted">Liam - Peanuts | Emma - Shellfish | Noah - Bee stings</small>
                        </div>
                    </div>
                </div>
                <div class="p-3 border-bottom">
                    <div class="d-flex gap-2">
                        <i class="fas fa-medkit text-danger"></i>
                        <div>
                            <div class="fw-semibold">Medical Conditions (2)</div>
                            <small class="text-muted">Sophia - Asthma (inhaler in office) | Oliver - Eczema</small>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <div class="d-flex gap-2">
                        <i class="fas fa-carrot text-success"></i>
                        <div>
                            <div class="fw-semibold">Dietary Requirements (4)</div>
                            <small class="text-muted">Isabella - Vegetarian | James - Halaal | Ava - Lactose free</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="portal-card h-100">
            <div class="portal-card-header">
                <i class="fas fa-calendar-alt me-2 text-primary"></i> Upcoming Events
            </div>
            <div class="portal-card-body p-0">
                <div class="p-3 border-bottom">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fw-semibold">Field Trip - Aquarium</div>
                            <small class="text-muted">Friday, Jan 24 | Permission slips required</small>
                        </div>
                        <span class="badge bg-primary">This Week</span>
                    </div>
                </div>
                <div class="p-3 border-bottom">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fw-semibold">Parent-Teacher Meetings</div>
                            <small class="text-muted">Wednesday, Jan 29 | 4:00pm - 6:00pm</small>
                        </div>
                        <span class="badge bg-warning">Next Week</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fw-semibold">Dress Up Day - Ocean Costumes</div>
                            <small class="text-muted">Friday, Jan 31 | Optional</small>
                        </div>
                        <span class="badge bg-info">Coming Up</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Class Resources -->
<div class="portal-card mt-4">
    <div class="portal-card-header">
        <i class="fas fa-folder me-2"></i> Class Resources
    </div>
    <div class="portal-card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <a href="#" class="text-decoration-none">
                    <div class="border rounded p-3 text-center">
                        <i class="fas fa-file-pdf fa-2x text-danger mb-2"></i>
                        <div class="small fw-semibold">Curriculum Guide</div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="text-decoration-none">
                    <div class="border rounded p-3 text-center">
                        <i class="fas fa-file-alt fa-2x text-primary mb-2"></i>
                        <div class="small fw-semibold">Lesson Plans</div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="text-decoration-none">
                    <div class="border rounded p-3 text-center">
                        <i class="fas fa-file-excel fa-2x text-success mb-2"></i>
                        <div class="small fw-semibold">Class List</div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="text-decoration-none">
                    <div class="border rounded p-3 text-center">
                        <i class="fas fa-file-image fa-2x text-warning mb-2"></i>
                        <div class="small fw-semibold">Activity Sheets</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
