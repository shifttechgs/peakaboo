@extends('layouts.portal')

@section('title', 'Activities')
@section('portal-name', 'Parent Portal')
@section('page-title', 'Activities')

@section('sidebar-nav')
@include('parent.partials.sidebar')
@endsection

@section('content')
<div class="portal-card mb-4" style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);">
    <div class="portal-card-body py-4">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-circle bg-white d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                <i class="fas fa-running fa-lg text-warning"></i>
            </div>
            <div>
                <h4 class="mb-1 fw-bold" style="color:#92400e;">Extra-Mural Activities</h4>
                <p class="mb-0" style="color:#92400e;opacity:.75;">Browse available activities and register your child.</p>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success d-flex align-items-center gap-2 mb-4" style="border-radius:12px;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

{{-- Currently enrolled --}}
@php $enrolled = collect($activities)->where('enrolled', true); @endphp
@if($enrolled->count())
<div class="portal-card mb-4">
    <div class="portal-card-header">
        <i class="fas fa-check-circle me-2 text-success"></i> Currently Enrolled
    </div>
    <div class="portal-card-body p-0">
        @foreach($enrolled as $act)
        <div class="d-flex align-items-center gap-3 px-4 py-3 border-bottom">
            <div class="rounded d-flex align-items-center justify-content-center" style="width:45px;height:45px;background:#dcfce7;flex-shrink:0;">
                <i class="fas {{ $act['icon'] }}" style="color:#16a34a;"></i>
            </div>
            <div class="flex-grow-1">
                <div class="fw-bold" style="font-size:.92rem;">{{ $act['name'] }}</div>
                <small class="text-muted">{{ $act['day'] }} &bull; {{ $act['time'] }}</small>
            </div>
            <span class="badge bg-success rounded-pill px-3 py-2">Enrolled</span>
            <span class="fw-bold" style="color:#16a34a;">R{{ number_format($act['cost']) }}/mo</span>
        </div>
        @endforeach
    </div>
</div>
@endif

{{-- Available activities --}}
<div class="portal-card">
    <div class="portal-card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-list me-2 text-primary"></i> Available Activities</span>
        <span class="badge bg-primary rounded-pill">{{ count($activities) }} available</span>
    </div>
    <div class="portal-card-body">
        <div class="row g-4">
            @foreach($activities as $act)
            <div class="col-md-6 col-lg-4">
                <div class="rounded-3 p-4 h-100 d-flex flex-column" style="background:#f8f9fa;border:1px solid #e5e7eb;">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="rounded d-flex align-items-center justify-content-center" style="width:48px;height:48px;background:{{ $act['enrolled'] ? '#dcfce7' : '#eff6ff' }};flex-shrink:0;">
                            <i class="fas {{ $act['icon'] }}" style="color:{{ $act['enrolled'] ? '#16a34a' : '#3b82f6' }};font-size:1.1rem;"></i>
                        </div>
                        <div>
                            <div class="fw-bold" style="font-size:.92rem;">{{ $act['name'] }}</div>
                            <small class="text-muted">{{ $act['day'] }}</small>
                        </div>
                    </div>
                    <div class="mb-3" style="font-size:.84rem;color:#6c757d;">
                        <div class="mb-1"><i class="fas fa-clock me-1" style="width:16px;"></i> {{ $act['time'] }}</div>
                        <div><i class="fas fa-tag me-1" style="width:16px;"></i> R{{ number_format($act['cost']) }} / month</div>
                    </div>
                    <div class="mt-auto">
                        @if($act['enrolled'])
                            <span class="btn btn-sm btn-success rounded-pill w-100 disabled">
                                <i class="fas fa-check me-1"></i> Enrolled
                            </span>
                        @else
                            <form method="POST" action="{{ route('parent.activities.register') }}">
                                @csrf
                                <input type="hidden" name="activity_id" value="{{ $act['id'] }}">
                                @if($children->count())
                                <select name="child_id" class="form-select form-select-sm mb-2" style="border-radius:8px;font-size:.82rem;">
                                    @foreach($children as $child)
                                        @if($child['status'] === 'approved')
                                        <option value="{{ $child['id'] }}">{{ $child['name'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @endif
                                <button type="submit" class="btn btn-sm btn-portal btn-portal-primary rounded-pill w-100">
                                    <i class="fas fa-plus me-1"></i> Register
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

