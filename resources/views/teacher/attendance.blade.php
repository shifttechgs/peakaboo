@extends('layouts.portal')

@section('title', 'Attendance')
@section('portal-name', 'Teacher Portal')
@section('page-title', 'Attendance Register')

@section('sidebar-nav')
<a href="{{ route('teacher.dashboard') }}" class="nav-link">
    <i class="fas fa-home"></i> Dashboard
</a>
<a href="{{ route('teacher.attendance') }}" class="nav-link active">
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
<a href="{{ route('teacher.gallery') }}" class="nav-link">
    <i class="fas fa-camera"></i> Photo Gallery
</a>

<div class="nav-section-title">Account</div>
<a href="{{ route('teacher.profile') }}" class="nav-link">
    <i class="fas fa-user-cog"></i> Profile
</a>
@endsection

@section('content')
<!-- Date Selector -->
<div class="portal-card mb-4">
    <div class="portal-card-body">
        <div class="row align-items-center g-3">
            <div class="col-md-6">
                <div class="input-group">
                    <button class="btn btn-outline-secondary" onclick="changeDate(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <input type="date" class="form-control text-center" value="{{ date('Y-m-d') }}" id="attendanceDate">
                    <button class="btn btn-outline-secondary" onclick="changeDate(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-6 text-md-end">
                <button class="btn btn-outline-secondary me-2">
                    <i class="fas fa-download me-2"></i> Export
                </button>
                <button class="btn btn-portal btn-portal-primary">
                    <i class="fas fa-save me-2"></i> Save Attendance
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Summary Stats -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="border rounded p-3 text-center">
            <div class="h2 fw-bold text-success mb-1">14</div>
            <small class="text-muted">Present</small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="border rounded p-3 text-center">
            <div class="h2 fw-bold text-danger mb-1">2</div>
            <small class="text-muted">Absent</small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="border rounded p-3 text-center">
            <div class="h2 fw-bold text-warning mb-1">1</div>
            <small class="text-muted">Late</small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="border rounded p-3 text-center">
            <div class="h2 fw-bold text-primary mb-1">87%</div>
            <small class="text-muted">Attendance Rate</small>
        </div>
    </div>
</div>

<!-- Attendance Register -->
<div class="portal-card">
    <div class="portal-card-header">
        <i class="fas fa-clipboard-list me-2"></i> {{ $teacher['class'] ?? 'Preschool' }} Register
    </div>
    <div class="portal-card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="bg-light">
                    <tr>
                        <th width="5%">#</th>
                        <th>Student Name</th>
                        <th width="15%">Status</th>
                        <th width="15%">Check In</th>
                        <th width="15%">Check Out</th>
                        <th width="20%">Notes</th>
                        <th width="10%">Mood</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $students = [
                            ['name' => 'Emma Thompson', 'checkin' => '07:45', 'checkout' => null, 'status' => 'present'],
                            ['name' => 'Liam Johnson', 'checkin' => '08:15', 'checkout' => null, 'status' => 'present'],
                            ['name' => 'Ava Williams', 'checkin' => null, 'checkout' => null, 'status' => 'absent'],
                            ['name' => 'Noah Brown', 'checkin' => '07:30', 'checkout' => null, 'status' => 'present'],
                            ['name' => 'Sophia Davis', 'checkin' => '09:15', 'checkout' => null, 'status' => 'late'],
                            ['name' => 'Oliver Wilson', 'checkin' => '08:00', 'checkout' => null, 'status' => 'present'],
                            ['name' => 'Isabella Martinez', 'checkin' => '07:50', 'checkout' => null, 'status' => 'present'],
                            ['name' => 'James Taylor', 'checkin' => '08:30', 'checkout' => null, 'status' => 'present'],
                            ['name' => 'Charlotte Anderson', 'checkin' => '07:35', 'checkout' => null, 'status' => 'present'],
                            ['name' => 'Benjamin Thomas', 'checkin' => null, 'checkout' => null, 'status' => 'absent'],
                        ];
                    @endphp
                    @foreach($students as $index => $student)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="fw-semibold">{{ $student['name'] }}</td>
                        <td>
                            <select class="form-select form-select-sm">
                                <option value="present" {{ $student['status'] == 'present' ? 'selected' : '' }}>Present</option>
                                <option value="absent" {{ $student['status'] == 'absent' ? 'selected' : '' }}>Absent</option>
                                <option value="late" {{ $student['status'] == 'late' ? 'selected' : '' }}>Late</option>
                                <option value="half_day">Half Day</option>
                            </select>
                        </td>
                        <td>
                            <input type="time" class="form-control form-control-sm" value="{{ $student['checkin'] }}">
                        </td>
                        <td>
                            <input type="time" class="form-control form-control-sm" value="{{ $student['checkout'] }}">
                        </td>
                        <td>
                            <input type="text" class="form-control form-control-sm" placeholder="Add note...">
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <input type="radio" class="btn-check" name="mood{{ $index }}" id="happy{{ $index }}" autocomplete="off">
                                <label class="btn btn-outline-success" for="happy{{ $index }}" title="Happy">
                                    <i class="fas fa-smile"></i>
                                </label>

                                <input type="radio" class="btn-check" name="mood{{ $index }}" id="okay{{ $index }}" autocomplete="off">
                                <label class="btn btn-outline-warning" for="okay{{ $index }}" title="Okay">
                                    <i class="fas fa-meh"></i>
                                </label>

                                <input type="radio" class="btn-check" name="mood{{ $index }}" id="sad{{ $index }}" autocomplete="off">
                                <label class="btn btn-outline-danger" for="sad{{ $index }}" title="Upset">
                                    <i class="fas fa-frown"></i>
                                </label>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Weekly Overview -->
<div class="portal-card mt-4">
    <div class="portal-card-header">
        <i class="fas fa-chart-line me-2"></i> This Week's Overview
    </div>
    <div class="portal-card-body">
        <div class="table-responsive">
            <table class="table table-sm text-center mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="text-start">Student</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Rate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(array_slice($students, 0, 5) as $student)
                    <tr>
                        <td class="text-start fw-semibold">{{ $student['name'] }}</td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-{{ $student['status'] == 'present' ? 'check text-success' : 'times text-danger' }}"></i></td>
                        <td><span class="badge bg-success">100%</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function changeDate(days) {
    const dateInput = document.getElementById('attendanceDate');
    const currentDate = new Date(dateInput.value);
    currentDate.setDate(currentDate.getDate() + days);
    dateInput.value = currentDate.toISOString().split('T')[0];
}
</script>
@endpush
