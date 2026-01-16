@extends('layouts.portal')

@section('title', 'Statements')
@section('portal-name', 'Parent Portal')
@section('page-title', 'Account Statements')

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
<a href="{{ route('parent.fees') }}" class="nav-link">
    <i class="fas fa-file-invoice-dollar"></i> Fee Schedule
</a>
<a href="{{ route('parent.statements') }}" class="nav-link active">
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
<!-- Account Summary -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="portal-card h-100">
            <div class="portal-card-body text-center">
                <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fas fa-wallet fa-2x text-success"></i>
                </div>
                <h6 class="text-muted mb-1">Current Balance</h6>
                <div class="h3 fw-bold {{ $accountSummary['balance'] > 0 ? 'text-danger' : 'text-success' }}">
                    R {{ number_format(abs($accountSummary['balance']), 2) }}
                    @if($accountSummary['balance'] < 0)
                    <small class="badge bg-success">Credit</small>
                    @elseif($accountSummary['balance'] > 0)
                    <small class="badge bg-danger">Outstanding</small>
                    @else
                    <small class="badge bg-success">Paid</small>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="portal-card h-100">
            <div class="portal-card-body text-center">
                <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fas fa-calendar-check fa-2x text-primary"></i>
                </div>
                <h6 class="text-muted mb-1">Last Payment</h6>
                <div class="h3 fw-bold text-primary">R {{ number_format($accountSummary['last_payment'], 2) }}</div>
                <small class="text-muted">{{ $accountSummary['last_payment_date'] ?? 'Jan 5, 2026' }}</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="portal-card h-100">
            <div class="portal-card-body text-center">
                <div class="rounded-circle bg-warning bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fas fa-clock fa-2x text-warning"></i>
                </div>
                <h6 class="text-muted mb-1">Next Due Date</h6>
                <div class="h3 fw-bold text-warning">{{ $accountSummary['next_due'] }}</div>
                <small class="text-muted">Monthly fee: R {{ number_format($accountSummary['monthly_fee'], 2) }}</small>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="portal-card mb-4">
    <div class="portal-card-body">
        <div class="row g-3">
            <div class="col-md-4">
                <button class="btn btn-portal btn-portal-primary w-100" data-bs-toggle="modal" data-bs-target="#uploadPopModal">
                    <i class="fas fa-upload me-2"></i> Upload Proof of Payment
                </button>
            </div>
            <div class="col-md-4">
                <a href="#" class="btn btn-outline-primary w-100">
                    <i class="fas fa-download me-2"></i> Download Current Statement
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="btn btn-outline-secondary w-100">
                    <i class="fas fa-envelope me-2"></i> Email Statement
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Statement -->
<div class="portal-card mb-4">
    <div class="portal-card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-file-invoice me-2"></i> Statement - {{ date('F Y') }}</span>
        <select class="form-select form-select-sm w-auto">
            <option>January 2026</option>
            <option>December 2025</option>
            <option>November 2025</option>
        </select>
    </div>
    <div class="portal-card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="bg-light">
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Reference</th>
                        <th class="text-end">Debit</th>
                        <th class="text-end">Credit</th>
                        <th class="text-end">Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $balance = 0;
                        $transactions = [
                            ['date' => '2026-01-01', 'desc' => 'Monthly Fee - January', 'ref' => 'INV-2026-001', 'debit' => 4200, 'credit' => 0],
                            ['date' => '2026-01-01', 'desc' => 'Snack Box - January', 'ref' => 'INV-2026-001', 'debit' => 400, 'credit' => 0],
                            ['date' => '2026-01-05', 'desc' => 'Payment Received - Thank You', 'ref' => 'EFT-123456', 'debit' => 0, 'credit' => 4600],
                        ];
                    @endphp
                    @foreach($transactions as $txn)
                    @php
                        $balance = $balance + $txn['debit'] - $txn['credit'];
                    @endphp
                    <tr>
                        <td>{{ date('d M Y', strtotime($txn['date'])) }}</td>
                        <td>{{ $txn['desc'] }}</td>
                        <td><code>{{ $txn['ref'] }}</code></td>
                        <td class="text-end {{ $txn['debit'] > 0 ? 'text-danger' : '' }}">
                            {{ $txn['debit'] > 0 ? 'R ' . number_format($txn['debit'], 2) : '-' }}
                        </td>
                        <td class="text-end {{ $txn['credit'] > 0 ? 'text-success' : '' }}">
                            {{ $txn['credit'] > 0 ? 'R ' . number_format($txn['credit'], 2) : '-' }}
                        </td>
                        <td class="text-end fw-bold {{ $balance > 0 ? 'text-danger' : ($balance < 0 ? 'text-success' : '') }}">
                            R {{ number_format(abs($balance), 2) }} {{ $balance < 0 ? 'CR' : '' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-light">
                    <tr>
                        <td colspan="5" class="text-end fw-bold">Current Balance:</td>
                        <td class="text-end fw-bold {{ $balance > 0 ? 'text-danger' : 'text-success' }}">
                            R {{ number_format(abs($balance), 2) }} {{ $balance < 0 ? 'CR' : ($balance == 0 ? '(Paid)' : '') }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- Payment History -->
<div class="portal-card">
    <div class="portal-card-header">
        <i class="fas fa-history me-2"></i> Payment History
    </div>
    <div class="portal-card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="bg-light">
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Reference</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paymentHistory ?? [] as $payment)
                    <tr>
                        <td>{{ $payment['date'] }}</td>
                        <td class="fw-bold text-success">R {{ number_format($payment['amount'], 2) }}</td>
                        <td>{{ $payment['method'] }}</td>
                        <td><code>{{ $payment['reference'] }}</code></td>
                        <td><span class="badge bg-success">{{ $payment['status'] }}</span></td>
                    </tr>
                    @endforeach
                    @if(empty($paymentHistory))
                    <tr>
                        <td>05 Jan 2026</td>
                        <td class="fw-bold text-success">R 4,600.00</td>
                        <td>EFT</td>
                        <td><code>EFT-123456</code></td>
                        <td><span class="badge bg-success">Confirmed</span></td>
                    </tr>
                    <tr>
                        <td>03 Dec 2025</td>
                        <td class="fw-bold text-success">R 4,600.00</td>
                        <td>EFT</td>
                        <td><code>EFT-122345</code></td>
                        <td><span class="badge bg-success">Confirmed</span></td>
                    </tr>
                    <tr>
                        <td>02 Nov 2025</td>
                        <td class="fw-bold text-success">R 4,600.00</td>
                        <td>EFT</td>
                        <td><code>EFT-121234</code></td>
                        <td><span class="badge bg-success">Confirmed</span></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Upload POP Modal -->
<div class="modal fade" id="uploadPopModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Upload Proof of Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Payment Amount</label>
                        <div class="input-group">
                            <span class="input-group-text">R</span>
                            <input type="number" class="form-control" placeholder="0.00" step="0.01">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Payment Date</label>
                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Bank Reference</label>
                        <input type="text" class="form-control" placeholder="Enter bank reference">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Upload POP</label>
                        <input type="file" class="form-control" accept="image/*,.pdf">
                        <small class="text-muted">Accepted: JPG, PNG, PDF (max 5MB)</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-portal btn-portal-primary">
                    <i class="fas fa-upload me-2"></i> Submit POP
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
