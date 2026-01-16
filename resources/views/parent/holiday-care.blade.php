@extends('layouts.portal')

@section('title', 'Holiday Care')
@section('portal-name', 'Parent Portal')
@section('page-title', 'Holiday Care')

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
<a href="{{ route('parent.holiday-care') }}" class="nav-link active">
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
<!-- Info Banner -->
<div class="portal-card mb-4" style="background: linear-gradient(135deg, #B5D8EB 0%, #FFB5BA 100%);">
    <div class="portal-card-body">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h5 class="fw-bold mb-2">School Holiday Care Programme</h5>
                <p class="mb-2">We provide safe, fun supervision during school holidays so you can work with peace of mind. Activities include arts & crafts, outdoor play, movies, and special outings.</p>
                <p class="mb-0"><strong>Rate:</strong> R250 per day | <strong>Hours:</strong> 07:30 - 17:30</p>
            </div>
            <div class="col-md-4 text-end d-none d-md-block">
                <i class="fas fa-umbrella-beach fa-5x opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<!-- Your Bookings -->
<div class="portal-card mb-4">
    <div class="portal-card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-calendar-check me-2"></i> Your Bookings</span>
        <button class="btn btn-sm btn-portal btn-portal-primary" data-bs-toggle="modal" data-bs-target="#bookHolidayModal">
            <i class="fas fa-plus me-1"></i> New Booking
        </button>
    </div>
    <div class="portal-card-body">
        @php
            $bookings = [
                ['child' => 'Emma Thompson', 'dates' => 'April 7-11, 2026', 'days' => 5, 'amount' => 1250, 'status' => 'confirmed'],
                ['child' => 'Emma Thompson', 'dates' => 'April 14-18, 2026', 'days' => 5, 'amount' => 1250, 'status' => 'confirmed'],
            ];
        @endphp
        @if(count($bookings) > 0)
        <div class="table-responsive">
            <table class="table">
                <thead class="bg-light">
                    <tr>
                        <th>Child</th>
                        <th>Dates</th>
                        <th>Days</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td class="fw-semibold">{{ $booking['child'] }}</td>
                        <td>{{ $booking['dates'] }}</td>
                        <td>{{ $booking['days'] }} days</td>
                        <td class="fw-bold">R {{ number_format($booking['amount'], 2) }}</td>
                        <td>
                            <span class="badge bg-{{ $booking['status'] == 'confirmed' ? 'success' : 'warning' }}">
                                {{ ucfirst($booking['status']) }}
                            </span>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                    Actions
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> View Details</a></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-times me-2"></i> Cancel Booking</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
            <p class="text-muted">No holiday care bookings yet</p>
            <button class="btn btn-portal btn-portal-primary" data-bs-toggle="modal" data-bs-target="#bookHolidayModal">
                Book Holiday Care
            </button>
        </div>
        @endif
    </div>
</div>

<!-- Available Dates -->
<div class="portal-card">
    <div class="portal-card-header">
        <i class="fas fa-calendar-alt me-2"></i> 2026 School Holidays
    </div>
    <div class="portal-card-body">
        <div class="row g-4">
            @php
                $holidays = [
                    ['name' => 'Autumn Break', 'dates' => 'March 27 - April 18', 'status' => 'booking_open', 'spots' => 8],
                    ['name' => 'Winter Break', 'dates' => 'June 22 - July 10', 'status' => 'booking_open', 'spots' => 12],
                    ['name' => 'Spring Break', 'dates' => 'September 28 - October 2', 'status' => 'coming_soon', 'spots' => null],
                    ['name' => 'Summer Break', 'dates' => 'December 7 - January 8', 'status' => 'coming_soon', 'spots' => null],
                ];
            @endphp
            @foreach($holidays as $holiday)
            <div class="col-md-6">
                <div class="border rounded p-4 h-100">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h6 class="fw-bold mb-1">{{ $holiday['name'] }}</h6>
                            <p class="text-muted mb-0">{{ $holiday['dates'] }}</p>
                        </div>
                        @if($holiday['status'] == 'booking_open')
                        <span class="badge bg-success">Open</span>
                        @else
                        <span class="badge bg-secondary">Coming Soon</span>
                        @endif
                    </div>
                    @if($holiday['spots'])
                    <div class="mb-3">
                        <small class="text-muted">Available Spots:</small>
                        <div class="progress mt-1" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: {{ ($holiday['spots'] / 15) * 100 }}%"></div>
                        </div>
                        <small class="text-muted">{{ $holiday['spots'] }}/15 spots remaining</small>
                    </div>
                    @endif
                    <button class="btn btn-{{ $holiday['status'] == 'booking_open' ? 'portal btn-portal-primary' : 'outline-secondary disabled' }} w-100" {{ $holiday['status'] == 'booking_open' ? 'data-bs-toggle=modal data-bs-target=#bookHolidayModal' : '' }}>
                        @if($holiday['status'] == 'booking_open')
                        <i class="fas fa-calendar-plus me-2"></i> Book Now
                        @else
                        Bookings Opening Soon
                        @endif
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Book Holiday Modal -->
<div class="modal fade" id="bookHolidayModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Book Holiday Care</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Select Child</label>
                            <select class="form-select" required>
                                <option value="">Choose child...</option>
                                @foreach($children as $child)
                                <option value="{{ $child['id'] ?? $loop->index }}">{{ $child['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Holiday Period</label>
                            <select class="form-select" required>
                                <option value="">Select period...</option>
                                <option value="autumn">Autumn Break (Mar 27 - Apr 18)</option>
                                <option value="winter">Winter Break (Jun 22 - Jul 10)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Number of Days</label>
                            <input type="number" class="form-control" min="1" max="15" value="5" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Select Specific Dates</label>
                            <div class="border rounded p-3 bg-light">
                                <div class="row g-2">
                                    <div class="col-6 col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="date1">
                                            <label class="form-check-label" for="date1">Mon, Apr 7</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="date2">
                                            <label class="form-check-label" for="date2">Tue, Apr 8</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="date3">
                                            <label class="form-check-label" for="date3">Wed, Apr 9</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="date4">
                                            <label class="form-check-label" for="date4">Thu, Apr 10</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Special Requirements (Optional)</label>
                            <textarea class="form-control" rows="3" placeholder="Any allergies, dietary requirements, or special notes..."></textarea>
                        </div>
                        <div class="col-12 bg-light rounded p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Days:</span>
                                <span class="fw-semibold">5 days</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Rate per day:</span>
                                <span class="fw-semibold">R 250.00</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <span class="fw-bold">Total Amount:</span>
                                <span class="fw-bold text-primary h5 mb-0">R 1,250.00</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-portal btn-portal-primary">
                    <i class="fas fa-check me-2"></i> Confirm Booking
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
