@extends('layouts.portal')

@section('title', 'Document Vault')
@section('portal-name', 'Parent Portal')
@section('page-title', 'Document Vault')

@section('sidebar-nav')
@include('parent.partials.sidebar')
@endsection

@section('content')
<div class="portal-card mb-4" style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);">
    <div class="portal-card-body py-4">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-circle bg-white d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                <i class="fas fa-folder-open fa-lg text-success"></i>
            </div>
            <div>
                <h4 class="mb-1 fw-bold">Document Vault</h4>
                <p class="mb-0 opacity-75">All your uploaded documents in one place — certificates, medical records & more.</p>
            </div>
        </div>
    </div>
</div>

@if(count($documents) > 0)
    @php $grouped = collect($documents)->groupBy('child_name'); @endphp
    @foreach($grouped as $childName => $docs)
    <div class="portal-card mb-4">
        <div class="portal-card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-child me-2 text-primary"></i> {{ $childName }}</span>
            <span class="badge bg-primary rounded-pill">{{ count($docs) }} document{{ count($docs) !== 1 ? 's' : '' }}</span>
        </div>
        <div class="portal-card-body p-0">
            @foreach($docs as $doc)
            <div class="d-flex align-items-center gap-3 px-4 py-3 border-bottom">
                <div class="rounded bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width:42px;height:42px;flex-shrink:0;">
                    @php
                        $ext = pathinfo($doc['path'], PATHINFO_EXTENSION);
                        $icon = match($ext) { 'pdf' => 'fa-file-pdf text-danger', 'jpg','jpeg','png' => 'fa-file-image text-info', default => 'fa-file text-secondary' };
                    @endphp
                    <i class="fas {{ $icon }}"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="fw-semibold" style="font-size:.9rem;">{{ $doc['label'] }}</div>
                    <small class="text-muted">Uploaded {{ $doc['uploaded_at'] }} &bull; Ref: {{ $doc['reference'] }}</small>
                </div>
                <a href="{{ asset('storage/' . $doc['path']) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                    <i class="fas fa-download me-1"></i> View
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
@else
    <div class="portal-card">
        <div class="portal-card-body text-center py-5">
            <i class="fas fa-folder-open fa-3x text-muted opacity-25 mb-3"></i>
            <h5 class="text-muted">No documents uploaded yet</h5>
            <p class="text-muted mb-0">Documents uploaded during enrolment (birth certificate, clinic card, etc.) will appear here.</p>
        </div>
    </div>
@endif

{{-- Document types legend --}}
<div class="portal-card mt-4">
    <div class="portal-card-header">
        <i class="fas fa-info-circle me-2 text-info"></i> Document Types
    </div>
    <div class="portal-card-body">
        <div class="row g-3">
            @foreach([
                ['Birth Certificate', 'fa-file-alt', '#3b82f6'],
                ['Clinic / Immunisation Card', 'fa-syringe', '#16a34a'],
                ['Medical Certificate', 'fa-heartbeat', '#ef4444'],
                ['Parent ID Document', 'fa-id-card', '#7c3aed'],
                ['Proof of Residence', 'fa-home', '#d97706'],
                ['School Reports', 'fa-graduation-cap', '#0097a7'],
            ] as [$label, $icon, $color])
            <div class="col-md-4 col-sm-6">
                <div class="d-flex align-items-center gap-3 p-2">
                    <i class="fas {{ $icon }}" style="color:{{ $color }};width:20px;text-align:center;"></i>
                    <span style="font-size:.86rem;">{{ $label }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

