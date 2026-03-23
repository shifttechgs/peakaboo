@extends('layouts.portal')

@section('title', 'Dashboard')
@section('portal-name', 'Parent Portal')
@section('page-title', 'Dashboard')

@section('sidebar-nav')
@include('parent.partials.sidebar')
@endsection

@section('header-actions')
<a href="{{ route('parent.messages') }}" class="position-relative text-muted">
    <i class="fas fa-bell fa-lg"></i>
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
</a>
@endsection

@push('styles')
<style>
.attention-card {
    border-radius: 14px; padding: 18px 20px; display: flex; align-items: flex-start; gap: 14px;
    margin-bottom: 12px; border: 1px solid transparent;
}
.attention-card.warning { background: #fffbeb; border-color: #fde68a; }
.attention-card.danger  { background: #fef2f2; border-color: #fca5a5; }
.attention-card.info    { background: #eff6ff; border-color: #bfdbfe; }
.attention-icon { width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1rem; }
.attention-card.warning .attention-icon { background:#fde68a;color:#92400e; }
.attention-card.danger .attention-icon  { background:#fca5a5;color:#991b1b; }
.attention-card.info .attention-icon    { background:#bfdbfe;color:#1e40af; }
</style>
@endpush

@section('content')
{{-- Welcome Banner --}}
<div class="portal-card mb-4" style="background: linear-gradient(135deg, #B5D8EB 0%, #FFB5BA 100%);">
    <div class="portal-card-body">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h3 class="mb-2">Good {{ date('H') < 12 ? 'Morning' : (date('H') < 17 ? 'Afternoon' : 'Evening') }}, {{ $parent->name }}!</h3>
                <p class="mb-0 opacity-75">Welcome to your Peekaboo parent portal. Stay connected with your child's day.</p>
            </div>
            <div class="col-md-4 text-end d-none d-md-block">
                <img src="{{ asset('assets/img/peekaboo/logo.png') }}" alt="Peekaboo" style="height: 60px; opacity: 0.8;">
            </div>
        </div>
    </div>
</div>

{{-- ── Needs Attention ─────────────────────────────────────────────────── --}}
@if(isset($attentionItems) && $attentionItems->count())
<div class="portal-card mb-4">
    <div class="portal-card-header">
        <i class="fas fa-bell me-2 text-danger"></i> Needs Your Attention
    </div>
    <div class="portal-card-body pb-2">
        @foreach($attentionItems as $item)
        <div class="attention-card {{ $item['type'] }}">
            <div class="attention-icon"><i class="fas {{ $item['icon'] }}"></i></div>
            <div class="flex-grow-1">
                <div class="fw-bold mb-1" style="font-size:.92rem;">{{ $item['title'] }}</div>
                <div style="font-size:.84rem;color:#374151;">{{ $item['message'] }}</div>
            </div>
            @if(!empty($item['action']))
            <a href="{{ $item['action'] }}" class="btn btn-sm btn-portal btn-portal-primary rounded-pill px-3" style="white-space:nowrap;flex-shrink:0;">
                {{ $item['action_label'] ?? 'View' }} <i class="fas fa-arrow-right ms-1" style="font-size:.7rem;"></i>
            </a>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endif

{{-- ── Children Cards ──────────────────────────────────────────────────── --}}
@if($children->count())
<div class="row g-4 mb-4">
    @foreach($children as $child)
    <div class="col-md-6">
        <div class="child-card">
            <div class="d-flex justify-content-between align-items-start">
                <div class="d-flex gap-3">
                    <div class="rounded-circle bg-white d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="fas fa-child fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h4 class="mb-1">{{ $child['name'] }}</h4>
                        <p class="mb-1"><strong>{{ $child['program'] }}</strong></p>
                        <small class="opacity-75">Age: {{ $child['age'] }} &bull; {{ $child['gender'] }}</small>
                    </div>
                </div>
                @php
                    $stColors = ['approved'=>['#dcfce7','#16a34a'],'pending'=>['#fff7ed','#d97706'],'under_review'=>['#f5f3ff','#7c3aed'],'waitlist'=>['#f3f4f6','#6c757d'],'rejected'=>['#fee2e2','#ef4444']];
                    [$stBg,$stC] = $stColors[$child['status']] ?? ['#f3f4f6','#6c757d'];
                @endphp
                <span class="badge rounded-pill px-3 py-2" style="background:{{ $stBg }};color:{{ $stC }};font-weight:700;font-size:.72rem;">
                    {{ $child['status_label'] }}
                </span>
            </div>
            <hr class="my-3 opacity-25">
            <div class="row text-center">
                <div class="col-4">
                    <div class="fw-bold">{{ $child['attendance_rate'] }}</div>
                    <small class="opacity-75">Attendance</small>
                </div>
                <div class="col-4">
                    <div class="fw-bold">{{ $child['fee_option'] }}</div>
                    <small class="opacity-75">Fee Plan</small>
                </div>
                <div class="col-4">
                    <div class="fw-bold">{{ $child['teacher'] }}</div>
                    <small class="opacity-75">Teacher</small>
                </div>
            </div>
            <div class="mt-3 text-end">
                <a href="{{ route('parent.children.show', $child['id']) }}" class="btn btn-sm btn-outline-dark rounded-pill px-3">
                    <i class="fas fa-eye me-1"></i> View Details
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="portal-card mb-4">
    <div class="portal-card-body text-center py-5">
        <i class="fas fa-child fa-3x text-muted opacity-25 mb-3"></i>
        <h5 class="text-muted">No children enrolled yet</h5>
        <p class="text-muted">Your children's information will appear here once an application is submitted and approved.</p>
    </div>
</div>
@endif

{{-- ── Quick Actions & Announcements ──────────────────────────────────── --}}
<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <div class="portal-card h-100">
            <div class="portal-card-header">
                <i class="fas fa-bolt me-2 text-warning"></i> Quick Actions
            </div>
            <div class="portal-card-body">
                <div class="row g-3">
                    <div class="col-6">
                        <a href="{{ route('parent.fees.statements') }}" class="quick-action">
                            <div class="icon bg-primary bg-opacity-10"><i class="fas fa-file-invoice text-primary"></i></div>
                            <div><div class="fw-semibold">View Statement</div><small class="text-muted">Current balance</small></div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('parent.documents') }}" class="quick-action">
                            <div class="icon bg-success bg-opacity-10"><i class="fas fa-folder-open text-success"></i></div>
                            <div><div class="fw-semibold">Documents</div><small class="text-muted">Vault & uploads</small></div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('parent.reports') }}" class="quick-action">
                            <div class="icon bg-info bg-opacity-10"><i class="fas fa-chart-line text-info"></i></div>
                            <div><div class="fw-semibold">School Reports</div><small class="text-muted">Term results</small></div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('parent.sleepover') }}" class="quick-action">
                            <div class="icon" style="background:rgba(124,58,237,.1);"><i class="fas fa-moon" style="color:#7c3aed;"></i></div>
                            <div><div class="fw-semibold">Sleepover</div><small class="text-muted">Apply now</small></div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('parent.activities') }}" class="quick-action">
                            <div class="icon bg-warning bg-opacity-10"><i class="fas fa-running text-warning"></i></div>
                            <div><div class="fw-semibold">Activities</div><small class="text-muted">Register child</small></div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('parent.messages') }}" class="quick-action">
                            <div class="icon bg-danger bg-opacity-10"><i class="fas fa-comment-dots text-danger"></i></div>
                            <div><div class="fw-semibold">Message Teacher</div><small class="text-muted">Send a note</small></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="portal-card h-100">
            <div class="portal-card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-bullhorn me-2 text-primary"></i> Announcements</span>
                <a href="{{ route('parent.newsletters') }}" class="small text-primary">View All</a>
            </div>
            <div class="portal-card-body p-0">
                @foreach($announcements as $ann)
                <div class="p-3 border-bottom">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="badge bg-{{ $ann['type'] == 'warning' ? 'warning text-dark' : ($ann['type'] == 'info' ? 'info' : 'secondary') }}">
                            {{ ucfirst($ann['type']) }}
                        </span>
                        <small class="text-muted">{{ $ann['date'] }}</small>
                    </div>
                    <h6 class="mb-1">{{ $ann['title'] }}</h6>
                    <p class="small text-muted mb-0">{{ Str::limit($ann['message'], 120) }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- ── Upcoming Events & Account Summary ──────────────────────────────── --}}
<div class="row g-4">
    <div class="col-lg-6">
        <div class="portal-card">
            <div class="portal-card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-calendar-day me-2 text-info"></i> Upcoming Events</span>
                <a href="{{ route('parent.calendar') }}" class="small text-primary">View Calendar</a>
            </div>
            <div class="portal-card-body p-0">
                @foreach($upcomingEvents as $event)
                <div class="d-flex gap-3 p-3 border-bottom">
                    <div class="text-center bg-primary bg-opacity-10 rounded p-2" style="min-width: 50px;">
                        <div class="fw-bold text-primary">{{ date('d', strtotime($event['date'])) }}</div>
                        <small class="text-muted">{{ date('M', strtotime($event['date'])) }}</small>
                    </div>
                    <div>
                        <h6 class="mb-1">{{ $event['title'] }}</h6>
                        <small class="text-muted"><i class="fas fa-clock me-1"></i> {{ $event['time'] }}</small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="portal-card">
            <div class="portal-card-header">
                <i class="fas fa-wallet me-2 text-success"></i> Account Summary
            </div>
            <div class="portal-card-body">
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <span class="text-muted">Monthly Fees</span>
                    <span class="fw-bold">R {{ number_format($accountSummary['monthly_fee'], 2) }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <span class="text-muted">Last Payment</span>
                    <span class="fw-bold text-success">R {{ number_format($accountSummary['last_payment'], 2) }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <span class="text-muted">Current Balance</span>
                    <span class="fw-bold {{ $accountSummary['balance'] > 0 ? 'text-danger' : 'text-success' }}">
                        R {{ number_format($accountSummary['balance'], 2) }}
                    </span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <span class="text-muted">Next Payment Due</span>
                    <span class="fw-semibold">{{ $accountSummary['next_due'] }}</span>
                </div>
                @if(isset($accountSummary['next_due_days']) && $accountSummary['next_due_days'] <= 7)
                <div class="alert alert-warning py-2 px-3 mb-3" style="border-radius:10px;font-size:.84rem;">
                    <i class="fas fa-exclamation-triangle me-1"></i> Payment due in <strong>{{ $accountSummary['next_due_days'] }} day(s)</strong>
                </div>
                @endif
                <a href="{{ route('parent.fees.statements') }}" class="btn btn-portal btn-portal-primary w-100">
                    <i class="fas fa-download me-2"></i> Download Statement
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Upload POP Modal --}}
<div class="modal fade" id="uploadPopModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:16px;">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Upload Proof of Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('parent.fees.upload-pop') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Payment Amount</label>
                        <div class="input-group"><span class="input-group-text">R</span><input type="number" name="amount" class="form-control" placeholder="0.00" step="0.01"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Payment Date</label>
                        <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Bank Reference</label>
                        <input type="text" name="reference" class="form-control" placeholder="Enter bank reference">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Upload POP</label>
                        <input type="file" name="pop_file" class="form-control" accept="image/*,.pdf">
                        <small class="text-muted">Accepted: JPG, PNG, PDF (max 5MB)</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-portal btn-portal-primary"><i class="fas fa-upload me-2"></i> Submit POP</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
