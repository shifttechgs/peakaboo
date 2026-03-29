@extends('layouts.portal')

@section('title', 'School Reports')
@section('portal-name', 'Parent Portal')
@section('page-title', 'School Reports')

@section('sidebar-nav')
@include('parent.partials.sidebar')
@endsection

@section('content')
<div class="portal-card mb-4" style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);">
    <div class="portal-card-body py-4">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-circle bg-white d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                <i class="fas fa-chart-line fa-lg text-primary"></i>
            </div>
            <div>
                <h4 class="mb-1 fw-bold">School Reports</h4>
                <p class="mb-0 opacity-75">View your child's term reports, progress notes and teacher comments.</p>
            </div>
        </div>
    </div>
</div>

@if(count($reports) > 0)
    @foreach($reports as $report)
    <div class="portal-card mb-4">
        <div class="portal-card-header d-flex justify-content-between align-items-center">
            <span>
                <i class="fas fa-child me-2 text-primary"></i>
                <strong>{{ $report['child_name'] }}</strong>
                <span class="text-muted ms-2" style="font-size:.82rem;">{{ $report['program'] }}</span>
            </span>
            <span class="badge bg-primary rounded-pill px-3">{{ $report['term'] }}</span>
        </div>
        <div class="portal-card-body">
            {{-- Teacher & date --}}
            <div class="d-flex justify-content-between align-items-center mb-4" style="font-size:.86rem;">
                <div class="text-muted">
                    <i class="fas fa-chalkboard-teacher me-1"></i> Teacher: <strong>{{ $report['teacher'] }}</strong>
                </div>
                <div class="text-muted">
                    <i class="fas fa-calendar me-1"></i> {{ $report['date'] }}
                </div>
            </div>

            {{-- Rating areas --}}
            <h6 class="fw-bold mb-3" style="font-size:.84rem;text-transform:uppercase;letter-spacing:.5px;color:#94a3b8;">
                Learning Areas
            </h6>
            <div class="row g-3 mb-4">
                @foreach($report['areas'] as $area)
                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-center p-3 rounded" style="background:#f8f9fa;">
                        <span style="font-size:.88rem;font-weight:600;">{{ $area['area'] }}</span>
                        <span class="badge rounded-pill px-3 py-2" style="background:{{ $area['color'] }}20;color:{{ $area['color'] }};font-weight:700;">
                            {{ $area['rating'] }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Teacher comment --}}
            <div class="p-3 rounded" style="background:#fffbeb;border:1px solid #fde68a;">
                <h6 class="mb-2" style="font-size:.82rem;color:#92400e;font-weight:700;">
                    <i class="fas fa-comment-dots me-1"></i> Teacher's Comment
                </h6>
                <p class="mb-0" style="font-size:.88rem;color:#374151;line-height:1.6;">{{ $report['comment'] }}</p>
            </div>
        </div>
    </div>
    @endforeach
@else
    <div class="portal-card">
        <div class="portal-card-body text-center py-5">
            <i class="fas fa-chart-line fa-3x text-muted opacity-25 mb-3"></i>
            <h5 class="text-muted">No reports available yet</h5>
            <p class="text-muted mb-0">Your child's school reports will appear here when published by teachers at the end of each term.</p>
        </div>
    </div>
@endif
@endsection

