@extends('layouts.portal')

@section('title', 'My Gallery')
@section('portal-name', 'My Portal')
@section('page-title', 'My Gallery')

@section('sidebar-nav')
<a href="{{ route('child.dashboard') }}" class="nav-link">
    <i class="fas fa-home"></i> Dashboard
</a>
<a href="{{ route('child.schedule') }}" class="nav-link">
    <i class="fas fa-calendar-alt"></i> My Schedule
</a>
<a href="{{ route('child.gallery') }}" class="nav-link active">
    <i class="fas fa-images"></i> My Gallery
</a>
<a href="{{ route('child.updates') }}" class="nav-link">
    <i class="fas fa-star"></i> My Updates
</a>
@endsection

@section('content')
<div class="portal-card">
    <div class="portal-card-body">
        <h5 class="fw-bold mb-4"><i class="fas fa-images me-2 text-warning"></i> My Photos &amp; Memories</h5>
        <div class="text-center py-5">
            <div class="rounded-circle bg-warning bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="fas fa-camera fa-2x text-warning"></i>
            </div>
            <p class="text-muted mb-0">Photos from your teachers will appear here.</p>
        </div>
    </div>
</div>
@endsection
