@extends('layouts.portal')

@section('title', 'Extra Murals')
@section('portal-name', 'Parent Portal')
@section('page-title', 'Extra Mural Activities')

@section('sidebar-nav')
@include('parent.partials.sidebar')
@endsection

@section('content')
<!-- Current Enrollments -->
<div class="portal-card mb-4">
    <div class="portal-card-header">
        <i class="fas fa-star me-2"></i> Current Activities
    </div>
    <div class="portal-card-body">
        @php
            $enrolled = [
                ['child' => 'Emma Thompson', 'activity' => 'Swimming Lessons', 'day' => 'Wednesdays', 'time' => '14:00 - 14:45', 'fee' => 450, 'status' => 'active'],
                ['child' => 'Emma Thompson', 'activity' => 'Ballet', 'day' => 'Fridays', 'time' => '15:00 - 15:45', 'fee' => 400, 'status' => 'active'],
            ];
        @endphp
        @if(count($enrolled) > 0)
        <div class="row g-3">
            @foreach($enrolled as $enroll)
            <div class="col-md-6">
                <div class="border rounded p-3">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 class="fw-bold mb-0">{{ $enroll['activity'] }}</h6>
                        <span class="badge bg-success">Active</span>
                    </div>
                    <p class="text-muted small mb-2">{{ $enroll['child'] }}</p>
                    <div class="mb-2">
                        <small class="text-muted d-block"><i class="fas fa-calendar me-2"></i>{{ $enroll['day'] }}</small>
                        <small class="text-muted d-block"><i class="fas fa-clock me-2"></i>{{ $enroll['time'] }}</small>
                        <small class="text-muted d-block"><i class="fas fa-credit-card me-2"></i>R {{ number_format($enroll['fee'], 2) }}/month</small>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-secondary flex-grow-1">View Details</button>
                        <button class="btn btn-sm btn-outline-danger">Cancel</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-4">
            <i class="fas fa-running fa-3x text-muted mb-3"></i>
            <p class="text-muted">No extra mural activities enrolled yet</p>
        </div>
        @endif
    </div>
</div>

<!-- Available Activities -->
<div class="portal-card">
    <div class="portal-card-header">
        <i class="fas fa-list me-2"></i> Available Activities
    </div>
    <div class="portal-card-body">
        <div class="row g-4">
            @php
                $activities = [
                    ['name' => 'Swimming Lessons', 'icon' => 'swimming-pool', 'color' => 'info', 'age' => '3-6 years', 'day' => 'Wednesdays', 'time' => '14:00 - 14:45', 'fee' => 450, 'spots' => 3, 'description' => 'Professional swimming instruction focusing on water safety and basic strokes'],
                    ['name' => 'Soccer Stars', 'icon' => 'futbol', 'color' => 'success', 'age' => '4-6 years', 'day' => 'Tuesdays', 'time' => '15:00 - 15:45', 'fee' => 350, 'spots' => 5, 'description' => 'Fun introduction to soccer with qualified coaches'],
                    ['name' => 'Ballet', 'icon' => 'music', 'color' => 'danger', 'age' => '3-6 years', 'day' => 'Fridays', 'time' => '15:00 - 15:45', 'fee' => 400, 'spots' => 2, 'description' => 'Classical ballet taught by experienced dance instructor'],
                    ['name' => 'Art & Craft', 'icon' => 'palette', 'color' => 'warning', 'age' => '3-6 years', 'day' => 'Thursdays', 'time' => '14:30 - 15:15', 'fee' => 300, 'spots' => 8, 'description' => 'Creative arts and crafts session with various mediums'],
                    ['name' => 'Mini Gymnastics', 'icon' => 'child', 'color' => 'primary', 'age' => '4-6 years', 'day' => 'Mondays', 'time' => '14:00 - 14:45', 'fee' => 400, 'spots' => 0, 'description' => 'Age-appropriate gymnastics and movement'],
                    ['name' => 'Music & Movement', 'icon' => 'drum', 'color' => 'secondary', 'age' => '2-5 years', 'day' => 'Wednesdays', 'time' => '15:00 - 15:30', 'fee' => 280, 'spots' => 6, 'description' => 'Musical exploration and rhythm activities'],
                ];
            @endphp
            @foreach($activities as $activity)
            <div class="col-md-6 col-lg-4">
                <div class="border rounded p-4 h-100 d-flex flex-column">
                    <div class="text-center mb-3">
                        <div class="rounded-circle bg-{{ $activity['color'] }} bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                            <i class="fas fa-{{ $activity['icon'] }} fa-2x text-{{ $activity['color'] }}"></i>
                        </div>
                        <h5 class="fw-bold mb-1">{{ $activity['name'] }}</h5>
                        <small class="text-muted">{{ $activity['age'] }}</small>
                    </div>
                    <p class="small text-muted mb-3">{{ $activity['description'] }}</p>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between small mb-1">
                            <span class="text-muted"><i class="fas fa-calendar me-1"></i>{{ $activity['day'] }}</span>
                        </div>
                        <div class="d-flex justify-content-between small mb-1">
                            <span class="text-muted"><i class="fas fa-clock me-1"></i>{{ $activity['time'] }}</span>
                        </div>
                        <div class="d-flex justify-content-between small">
                            <span class="text-muted"><i class="fas fa-users me-1"></i>{{ $activity['spots'] > 0 ? $activity['spots'] . ' spots left' : 'Fully booked' }}</span>
                        </div>
                    </div>
                    <div class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted small">Per month</span>
                            <span class="h5 fw-bold mb-0 text-{{ $activity['color'] }}">R {{ number_format($activity['fee'], 0) }}</span>
                        </div>
                        @if($activity['spots'] > 0)
                        <button class="btn btn-portal btn-portal-primary w-100" data-bs-toggle="modal" data-bs-target="#enrollModal">
                            <i class="fas fa-plus me-2"></i> Enroll Now
                        </button>
                        @else
                        <button class="btn btn-outline-secondary w-100" data-bs-toggle="modal" data-bs-target="#waitlistModal">
                            <i class="fas fa-list me-2"></i> Join Waitlist
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Enroll Modal -->
<div class="modal fade" id="enrollModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Enroll in Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Select Child</label>
                        <select class="form-select" required>
                            <option value="">Choose child...</option>
                            @foreach($children as $child)
                            <option value="{{ $child['id'] ?? $loop->index }}">{{ $child['name'] }} ({{ $child['age'] }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Activity</label>
                        <input type="text" class="form-control" value="Swimming Lessons" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Start Date</label>
                        <input type="date" class="form-control" min="{{ date('Y-m-d', strtotime('next monday')) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Medical Information</label>
                        <textarea class="form-control" rows="2" placeholder="Any relevant medical conditions or allergies..."></textarea>
                    </div>
                    <div class="bg-light rounded p-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Monthly Fee:</span>
                            <span class="fw-bold">R 450.00</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Registration:</span>
                            <span class="fw-bold">R 100.00</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold">First Payment:</span>
                            <span class="fw-bold text-primary">R 550.00</span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-portal btn-portal-primary">
                    <i class="fas fa-check me-2"></i> Confirm Enrollment
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Waitlist Modal -->
<div class="modal fade" id="waitlistModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Join Waitlist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i> This activity is currently full. We'll notify you as soon as a spot becomes available.
                </div>
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Select Child</label>
                        <select class="form-select" required>
                            <option value="">Choose child...</option>
                            @foreach($children as $child)
                            <option value="{{ $child['id'] ?? $loop->index }}">{{ $child['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Activity</label>
                        <input type="text" class="form-control" value="Mini Gymnastics" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-portal btn-portal-primary">
                    <i class="fas fa-list me-2"></i> Join Waitlist
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
