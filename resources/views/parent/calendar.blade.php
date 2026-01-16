@extends('layouts.portal')

@section('title', 'Calendar')
@section('portal-name', 'Parent Portal')
@section('page-title', 'Calendar & Events')

@section('sidebar-nav')
<a href="{{ route('parent.dashboard') }}" class="nav-link">
    <i class="fas fa-home"></i> Dashboard
</a>
<a href="{{ route('parent.children') }}" class="nav-link">
    <i class="fas fa-child"></i> My Children
</a>
<a href="{{ route('parent.calendar') }}" class="nav-link active">
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
</a>

<div class="nav-section-title">Account</div>
<a href="{{ route('parent.profile') }}" class="nav-link">
    <i class="fas fa-user-cog"></i> Profile
</a>
@endsection

@section('content')
<div class="row g-4">
    <div class="col-lg-8">
        <div class="portal-card">
            <div class="portal-card-header d-flex justify-content-between align-items-center">
                <span>{{ date('F Y') }}</span>
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-outline-secondary"><i class="fas fa-chevron-left"></i></button>
                    <button class="btn btn-outline-secondary"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
            <div class="portal-card-body">
                <!-- Calendar Grid -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr class="text-center bg-light">
                                <th class="text-danger" width="14%">Sun</th>
                                <th width="14%">Mon</th>
                                <th width="14%">Tue</th>
                                <th width="14%">Wed</th>
                                <th width="14%">Thu</th>
                                <th width="14%">Fri</th>
                                <th class="text-danger" width="14%">Sat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $firstDay = date('w', strtotime('first day of this month'));
                                $daysInMonth = date('t');
                                $today = date('j');
                                $day = 1;
                                $events = [
                                    5 => ['type' => 'event', 'title' => 'Parent Meeting'],
                                    12 => ['type' => 'holiday', 'title' => 'School Closed'],
                                    15 => ['type' => 'birthday', 'title' => 'Class Party'],
                                    20 => ['type' => 'event', 'title' => 'Sports Day'],
                                    25 => ['type' => 'payment', 'title' => 'Fees Due'],
                                ];
                            @endphp
                            @for($week = 0; $week < 6; $week++)
                                @if($day <= $daysInMonth)
                                <tr>
                                    @for($weekday = 0; $weekday < 7; $weekday++)
                                        @if(($week == 0 && $weekday < $firstDay) || $day > $daysInMonth)
                                            <td class="bg-light"></td>
                                        @else
                                            <td class="position-relative {{ $day == $today ? 'bg-primary bg-opacity-10' : '' }}" style="height: 80px; vertical-align: top;">
                                                <div class="d-flex justify-content-between">
                                                    <span class="{{ $day == $today ? 'badge bg-primary' : '' }} {{ $weekday == 0 || $weekday == 6 ? 'text-danger' : '' }}">{{ $day }}</span>
                                                </div>
                                                @if(isset($events[$day]))
                                                    <div class="mt-1">
                                                        <span class="badge bg-{{ $events[$day]['type'] == 'holiday' ? 'danger' : ($events[$day]['type'] == 'birthday' ? 'warning' : ($events[$day]['type'] == 'payment' ? 'success' : 'primary')) }} w-100 text-truncate" style="font-size: 0.65rem;">
                                                            {{ $events[$day]['title'] }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </td>
                                            @php $day++; @endphp
                                        @endif
                                    @endfor
                                </tr>
                                @endif
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Legend -->
        <div class="portal-card mb-4">
            <div class="portal-card-header">Legend</div>
            <div class="portal-card-body">
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge bg-primary px-3 py-2">Events</span>
                    <span class="badge bg-danger px-3 py-2">Holidays</span>
                    <span class="badge bg-warning px-3 py-2">Birthdays</span>
                    <span class="badge bg-success px-3 py-2">Payments</span>
                </div>
            </div>
        </div>

        <!-- Upcoming Events -->
        <div class="portal-card">
            <div class="portal-card-header">Upcoming Events</div>
            <div class="portal-card-body p-0">
                @foreach($upcomingEvents as $event)
                <div class="d-flex gap-3 p-3 border-bottom">
                    <div class="text-center bg-{{ $event['type'] == 'holiday' ? 'danger' : 'primary' }} bg-opacity-10 rounded p-2" style="min-width: 50px;">
                        <div class="fw-bold text-{{ $event['type'] == 'holiday' ? 'danger' : 'primary' }}">{{ date('d', strtotime($event['date'])) }}</div>
                        <small class="text-muted">{{ date('M', strtotime($event['date'])) }}</small>
                    </div>
                    <div>
                        <h6 class="mb-1">{{ $event['title'] }}</h6>
                        <small class="text-muted">
                            <i class="fas fa-clock me-1"></i> {{ $event['time'] }}
                        </small>
                        @if(isset($event['description']))
                        <p class="small text-muted mb-0 mt-1">{{ Str::limit($event['description'], 60) }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- School Holidays -->
        <div class="portal-card mt-4">
            <div class="portal-card-header">
                <i class="fas fa-umbrella-beach me-2 text-warning"></i> 2026 Term Dates
            </div>
            <div class="portal-card-body p-0">
                <div class="p-3 border-bottom">
                    <div class="fw-semibold">Term 1</div>
                    <small class="text-muted">14 Jan - 26 Mar 2026</small>
                </div>
                <div class="p-3 border-bottom">
                    <div class="fw-semibold">Term 2</div>
                    <small class="text-muted">7 Apr - 19 Jun 2026</small>
                </div>
                <div class="p-3 border-bottom">
                    <div class="fw-semibold">Term 3</div>
                    <small class="text-muted">14 Jul - 25 Sep 2026</small>
                </div>
                <div class="p-3">
                    <div class="fw-semibold">Term 4</div>
                    <small class="text-muted">6 Oct - 4 Dec 2026</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
