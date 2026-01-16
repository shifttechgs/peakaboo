@extends('layouts.portal')

@section('title', 'Fee Schedule')
@section('portal-name', 'Parent Portal')
@section('page-title', 'Fee Schedule')

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
<a href="{{ route('parent.fees') }}" class="nav-link active">
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
<!-- Your Current Fees -->
<div class="portal-card mb-4">
    <div class="portal-card-header">
        <i class="fas fa-user-circle me-2"></i> Your Current Fees
    </div>
    <div class="portal-card-body">
        <div class="table-responsive">
            <table class="table table-borderless mb-0">
                <thead class="bg-light">
                    <tr>
                        <th>Child</th>
                        <th>Program</th>
                        <th>Fee Type</th>
                        <th class="text-end">Monthly Fee</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($children as $child)
                    <tr>
                        <td class="fw-semibold">{{ $child['name'] }}</td>
                        <td>{{ $child['program'] }}</td>
                        <td>{{ $child['fee_type'] ?? 'Full Day' }}</td>
                        <td class="text-end fw-bold">R {{ number_format($child['monthly_fee'] ?? 4200, 2) }}</td>
                    </tr>
                    @endforeach
                    <tr class="border-top">
                        <td colspan="3" class="text-end fw-bold">Total Monthly:</td>
                        <td class="text-end fw-bold text-primary h5 mb-0">R {{ number_format(collect($children)->sum('monthly_fee') ?: 4200, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Fee Schedule 2026 -->
<div class="portal-card mb-4">
    <div class="portal-card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-calendar-alt me-2"></i> 2026 Fee Schedule</span>
        <a href="#" class="btn btn-sm btn-outline-primary">
            <i class="fas fa-download me-1"></i> Download PDF
        </a>
    </div>
    <div class="portal-card-body">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="border rounded p-4 h-100">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="fw-bold mb-1">Half Day</h5>
                            <small class="text-muted">07:30 - 13:00</small>
                        </div>
                        <span class="badge bg-primary px-3 py-2">Popular</span>
                    </div>
                    <div class="h2 fw-bold text-primary mb-3">R 3,800<small class="text-muted fw-normal">/month</small></div>
                    <ul class="list-unstyled text-muted mb-0">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Morning care (07:30 - 13:00)</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Morning snack included</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> All learning activities</li>
                        <li><i class="fas fa-check text-success me-2"></i> Qualified teachers</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="border rounded p-4 h-100 bg-primary bg-opacity-5">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="fw-bold mb-1">Full Day</h5>
                            <small class="text-muted">07:30 - 17:30</small>
                        </div>
                        <span class="badge bg-success px-3 py-2">Best Value</span>
                    </div>
                    <div class="h2 fw-bold text-primary mb-3">R 4,200<small class="text-muted fw-normal">/month</small></div>
                    <ul class="list-unstyled text-muted mb-0">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Full day care (07:30 - 17:30)</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> All meals included</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Afternoon nap/rest time</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> All learning activities</li>
                        <li><i class="fas fa-check text-success me-2"></i> Qualified teachers</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Additional Services -->
<div class="portal-card mb-4">
    <div class="portal-card-header">
        <i class="fas fa-plus-circle me-2"></i> Additional Services
    </div>
    <div class="portal-card-body">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="border rounded p-3 text-center h-100">
                    <div class="rounded-circle bg-warning bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-apple-alt fa-2x text-warning"></i>
                    </div>
                    <h6 class="fw-bold">Snack Box</h6>
                    <div class="h4 text-primary fw-bold">R 400<small class="text-muted fw-normal">/month</small></div>
                    <p class="small text-muted">Daily healthy snacks prepared fresh</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border rounded p-3 text-center h-100">
                    <div class="rounded-circle bg-info bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-umbrella-beach fa-2x text-info"></i>
                    </div>
                    <h6 class="fw-bold">Holiday Care</h6>
                    <div class="h4 text-primary fw-bold">R 250<small class="text-muted fw-normal">/day</small></div>
                    <p class="small text-muted">School holiday supervision & activities</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border rounded p-3 text-center h-100">
                    <div class="rounded-circle bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-futbol fa-2x text-danger"></i>
                    </div>
                    <h6 class="fw-bold">Extra Murals</h6>
                    <div class="h4 text-primary fw-bold">Varies</div>
                    <p class="small text-muted">Swimming, soccer, ballet, and more</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Payment Information -->
<div class="portal-card">
    <div class="portal-card-header">
        <i class="fas fa-credit-card me-2"></i> Payment Information
    </div>
    <div class="portal-card-body">
        <div class="row g-4">
            <div class="col-md-6">
                <h6 class="fw-bold mb-3">Bank Details</h6>
                <div class="bg-light rounded p-3">
                    <table class="table table-sm table-borderless mb-0">
                        <tr>
                            <td class="text-muted">Bank:</td>
                            <td class="fw-semibold">First National Bank</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Account Name:</td>
                            <td class="fw-semibold">Peekaboo Daycare</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Account Number:</td>
                            <td class="fw-semibold">62123456789</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Branch Code:</td>
                            <td class="fw-semibold">250655</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Reference:</td>
                            <td class="fw-semibold text-primary">Child's Name + Surname</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h6 class="fw-bold mb-3">Important Notes</h6>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        Fees are due by the <strong>1st of each month</strong>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        Late payments attract a <strong>10% penalty</strong>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        1 month notice required for withdrawal
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        Annual registration fee: <strong>R 500</strong>
                    </li>
                    <li>
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        <strong>10% sibling discount</strong> available
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
