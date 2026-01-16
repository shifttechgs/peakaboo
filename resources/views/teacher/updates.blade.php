@extends('layouts.portal')

@section('title', 'Daily Updates')
@section('portal-name', 'Teacher Portal')
@section('page-title', 'Daily Updates')

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
<a href="{{ route('teacher.updates') }}" class="nav-link active">
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
<!-- Quick Send Update -->
<div class="portal-card mb-4">
    <div class="portal-card-header">
        <i class="fas fa-paper-plane me-2"></i> Send Daily Update
    </div>
    <div class="portal-card-body">
        <form>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Select Student</label>
                    <select class="form-select" id="studentSelect">
                        <option value="">Choose student...</option>
                        <option value="all">All Students</option>
                        <option>Emma Thompson</option>
                        <option>Liam Johnson</option>
                        <option>Ava Williams</option>
                        <option>Noah Brown</option>
                        <option>Sophia Davis</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Update Type</label>
                    <select class="form-select">
                        <option value="daily">Daily Report</option>
                        <option value="incident">Incident Report</option>
                        <option value="achievement">Achievement</option>
                        <option value="reminder">Reminder</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Message</label>
                    <textarea class="form-control" rows="4" placeholder="What would you like to tell the parents today?"></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Mood Today</label>
                    <div class="btn-group w-100" role="group">
                        <input type="radio" class="btn-check" name="mood" id="happy" autocomplete="off">
                        <label class="btn btn-outline-success" for="happy">
                            <i class="fas fa-smile me-2"></i> Happy
                        </label>

                        <input type="radio" class="btn-check" name="mood" id="okay" autocomplete="off">
                        <label class="btn btn-outline-warning" for="okay">
                            <i class="fas fa-meh me-2"></i> Okay
                        </label>

                        <input type="radio" class="btn-check" name="mood" id="upset" autocomplete="off">
                        <label class="btn btn-outline-danger" for="upset">
                            <i class="fas fa-frown me-2"></i> Upset
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Attach Photo (Optional)</label>
                    <input type="file" class="form-control" accept="image/*">
                </div>
                <div class="col-12">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ate_well">
                                <label class="form-check-label" for="ate_well">
                                    <i class="fas fa-utensils me-2"></i> Ate Well
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="napped">
                                <label class="form-check-label" for="napped">
                                    <i class="fas fa-bed me-2"></i> Napped
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="played_well">
                                <label class="form-check-label" for="played_well">
                                    <i class="fas fa-running me-2"></i> Played Well
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-portal btn-portal-primary">
                        <i class="fas fa-paper-plane me-2"></i> Send Update
                    </button>
                    <button type="button" class="btn btn-outline-secondary">
                        <i class="fas fa-save me-2"></i> Save as Template
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Update Templates -->
<div class="portal-card mb-4">
    <div class="portal-card-header">
        <i class="fas fa-file-alt me-2"></i> Quick Templates
    </div>
    <div class="portal-card-body">
        <div class="row g-3">
            @php
                $templates = [
                    ['title' => 'Great Day', 'text' => '[Child] had a wonderful day today! Participated well in all activities and played nicely with friends.', 'icon' => 'smile', 'color' => 'success'],
                    ['title' => 'Needs Rest', 'text' => '[Child] seems a bit tired today. Please ensure they get good rest tonight.', 'icon' => 'bed', 'color' => 'warning'],
                    ['title' => 'Minor Injury', 'text' => '[Child] had a small bump/scrape during play. We cleaned and treated it. All good now!', 'icon' => 'band-aid', 'color' => 'danger'],
                    ['title' => 'Achievement', 'text' => 'So proud! [Child] achieved [milestone] today. Well done!', 'icon' => 'star', 'color' => 'primary'],
                ];
            @endphp
            @foreach($templates as $template)
            <div class="col-md-6 col-lg-3">
                <div class="border rounded p-3 text-center cursor-pointer" onclick="useTemplate('{{ $template['text'] }}')">
                    <div class="rounded-circle bg-{{ $template['color'] }} bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-2" style="width: 45px; height: 45px;">
                        <i class="fas fa-{{ $template['icon'] }} text-{{ $template['color'] }}"></i>
                    </div>
                    <div class="fw-semibold small">{{ $template['title'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Recent Updates -->
<div class="portal-card">
    <div class="portal-card-header">
        <i class="fas fa-history me-2"></i> Recent Updates
    </div>
    <div class="portal-card-body p-0">
        @php
            $recentUpdates = [
                ['student' => 'Emma Thompson', 'message' => 'Emma had a fantastic day painting sea creatures! She was very creative and focused.', 'time' => '2 hours ago', 'mood' => 'happy'],
                ['student' => 'Liam Johnson', 'message' => 'Liam needs to bring spare clothes tomorrow. Had a little accident during water play.', 'time' => '3 hours ago', 'mood' => 'okay'],
                ['student' => 'Noah Brown', 'message' => 'Noah shared his toys beautifully with the other children today. Great progress!', 'time' => 'Yesterday', 'mood' => 'happy'],
                ['student' => 'Sophia Davis', 'message' => 'Sophia had a good nap and ate all her lunch. Active afternoon of outdoor play.', 'time' => 'Yesterday', 'mood' => 'happy'],
            ];
        @endphp
        @foreach($recentUpdates as $update)
        <div class="p-3 border-bottom">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="d-flex gap-2 align-items-center">
                    <div class="rounded-circle bg-{{ $update['mood'] == 'happy' ? 'success' : 'warning' }} bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                        <i class="fas fa-{{ $update['mood'] == 'happy' ? 'smile' : 'meh' }} text-{{ $update['mood'] == 'happy' ? 'success' : 'warning' }}"></i>
                    </div>
                    <div>
                        <div class="fw-semibold small">{{ $update['student'] }}</div>
                    </div>
                </div>
                <small class="text-muted">{{ $update['time'] }}</small>
            </div>
            <p class="mb-0 small">{{ $update['message'] }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
function useTemplate(text) {
    const textarea = document.querySelector('textarea');
    textarea.value = text;
    textarea.focus();
}
</script>
@endpush

@push('styles')
<style>
    .cursor-pointer {
        cursor: pointer;
    }
    .cursor-pointer:hover {
        background: #f8f9fa;
    }
</style>
@endpush
