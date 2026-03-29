@extends('layouts.portal')

@section('title', 'My Schedule')
@section('portal-name', 'My Portal')
@section('page-title', 'My Schedule')

@section('sidebar-nav')
<a href="{{ route('child.dashboard') }}" class="nav-link">
    <i class="fas fa-home"></i> Dashboard
</a>
<a href="{{ route('child.schedule') }}" class="nav-link active">
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
<div class="portal-card">
    <div class="portal-card-body">
        <h5 class="fw-bold mb-4"><i class="fas fa-calendar-alt me-2 text-primary"></i> Weekly Schedule</h5>

        @php
        $days = ['Monday','Tuesday','Wednesday','Thursday','Friday'];
        $activities = [
            ['time' => '07:30 – 08:00', 'name' => 'Arrival & Free Play', 'icon' => 'fas fa-door-open', 'color' => 'secondary'],
            ['time' => '08:00 – 09:00', 'name' => 'Circle Time & Learning', 'icon' => 'fas fa-circle', 'color' => 'primary'],
            ['time' => '09:00 – 09:15', 'name' => 'Morning Snack', 'icon' => 'fas fa-apple-alt', 'color' => 'success'],
            ['time' => '09:15 – 10:00', 'name' => 'Arts & Crafts', 'icon' => 'fas fa-palette', 'color' => 'warning'],
            ['time' => '10:00 – 10:45', 'name' => 'Outdoor Play', 'icon' => 'fas fa-running', 'color' => 'info'],
            ['time' => '10:45 – 11:00', 'name' => 'Tidy Up', 'icon' => 'fas fa-broom', 'color' => 'secondary'],
            ['time' => '11:00 – 11:30', 'name' => 'Story Time', 'icon' => 'fas fa-book-open', 'color' => 'primary'],
            ['time' => '11:30 – 12:00', 'name' => 'Sensory / Music', 'icon' => 'fas fa-music', 'color' => 'danger'],
            ['time' => '12:00 – 12:30', 'name' => 'Lunch', 'icon' => 'fas fa-utensils', 'color' => 'success'],
            ['time' => '12:30 – 14:30', 'name' => 'Nap / Quiet Time', 'icon' => 'fas fa-moon', 'color' => 'secondary'],
            ['time' => '14:30 – 15:00', 'name' => 'Afternoon Snack', 'icon' => 'fas fa-cookie', 'color' => 'warning'],
            ['time' => '15:00 – 17:30', 'name' => 'Afternoon Activities & Home Time', 'icon' => 'fas fa-home', 'color' => 'info'],
        ];
        @endphp

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 140px;">Time</th>
                        @foreach($days as $day)
                            <th>{{ $day }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                    <tr>
                        <td class="small text-muted fw-semibold">{{ $activity['time'] }}</td>
                        @foreach($days as $day)
                        <td>
                            <span class="badge bg-{{ $activity['color'] }} bg-opacity-10 text-{{ $activity['color'] }} d-flex align-items-center gap-1" style="font-size: 12px; font-weight: 500;">
                                <i class="{{ $activity['icon'] }}"></i> {{ $activity['name'] }}
                            </span>
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
