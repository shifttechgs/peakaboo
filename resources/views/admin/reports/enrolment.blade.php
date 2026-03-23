@extends('layouts.admin')
@section('title', 'Enrolment Report')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-user-graduate me-2" style="color:#7c3aed;font-size:1.1rem;"></i>Enrolment Report
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Applications, approvals, rejections and programme breakdown</p>
    </div>
    <a href="{{ route('admin.reports.index') }}"
       class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
        <i class="fas fa-arrow-left me-1"></i>Back to Reports
    </a>
</div>
<div style="background:#fff;border-radius:16px;border:1px solid #f0f0f0;box-shadow:0 1px 8px rgba(0,0,0,.07);padding:48px;text-align:center;">
    <div style="width:64px;height:64px;border-radius:16px;background:#f5f3ff;color:#7c3aed;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin:0 auto 20px;">
        <i class="fas fa-tools"></i>
    </div>
    <h5 style="font-weight:800;color:#1a1f2e;margin-bottom:8px;">Coming Soon</h5>
    <p style="color:#94a3b8;font-size:.86rem;margin-bottom:24px;">The detailed enrolment report is under construction.<br>In the meantime, visit Admissions for full application data.</p>
    <a href="{{ route('admin.admissions.index') }}"
       class="btn btn-sm rounded-pill px-4 text-white" style="background:#7c3aed;">
        <i class="fas fa-user-plus me-1"></i>Go to Admissions
    </a>
</div>
@endsection

