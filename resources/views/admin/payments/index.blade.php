@extends('layouts.admin')

@section('title', 'Payments')

@push('styles')
<style>
    .payment-method-badge {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 4px 10px; border-radius: 8px; font-size: 0.75rem; font-weight: 600;
    }
    .method-eft { background: #e3f2fd; color: #0d47a1; }
    .method-cash { background: #e8f5e9; color: #1b5e20; }
    .method-card { background: #f3e5f5; color: #4a148c; }
    .method-pop { background: #fff8e1; color: #f57f17; }
</style>
@endpush

@section('content')
<div class="page-title d-flex justify-content-between align-items-start">
    <div>
        <h1>Payments</h1>
        <p>Fee collection, POP confirmations and financial overview</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.payments.outstanding') }}" class="btn btn-outline-danger btn-admin">
            <i class="fas fa-exclamation-circle me-2"></i> Outstanding
        </a>
        <a href="{{ route('admin.payments.statements') }}" class="btn btn-outline-secondary btn-admin">
            <i class="fas fa-file-invoice me-2"></i> Statements
        </a>
        <button class="btn btn-admin btn-admin-primary" data-bs-toggle="modal" data-bs-target="#recordPaymentModal">
            <i class="fas fa-plus me-2"></i> Record Payment
        </button>
    </div>
</div>

{{-- Stats --}}
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-success">R{{ number_format($stats['confirmed_payments']) }}</div>
                    <div class="label">Confirmed This Month</div>
                </div>
                <div class="icon bg-success bg-opacity-10 text-success"><i class="fas fa-check-circle"></i></div>
            </div>
            <div class="mt-2 small">
                <span class="text-success"><i class="fas fa-arrow-up me-1"></i>8.5%</span>
                <span class="text-muted">vs last month</span>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-warning">R{{ number_format($stats['pending_payments']) }}</div>
                    <div class="label">Pending Confirmation</div>
                </div>
                <div class="icon bg-warning bg-opacity-10 text-warning"><i class="fas fa-clock"></i></div>
            </div>
            <div class="mt-2 small text-muted">{{ collect($payments)->where('status', 'pending')->count() }} payments pending</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-danger">R{{ number_format($stats['outstanding_fees']) }}</div>
                    <div class="label">Outstanding Fees</div>
                </div>
                <div class="icon bg-danger bg-opacity-10 text-danger"><i class="fas fa-exclamation-triangle"></i></div>
            </div>
            <div class="mt-2 small text-muted">{{ collect($children)->where('balance', '>', 0)->count() }} families overdue</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-primary">R{{ number_format($stats['monthly_revenue']) }}</div>
                    <div class="label">Expected Monthly</div>
                </div>
                <div class="icon bg-primary bg-opacity-10 text-primary"><i class="fas fa-coins"></i></div>
            </div>
            <div class="mt-2 small text-muted">{{ collect($children)->count() }} enrolled families</div>
        </div>
    </div>
</div>

<div class="row g-4">
    {{-- Payments Table --}}
    <div class="col-lg-8">
        <div class="admin-table">
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Payment Transactions</h5>
                <div class="d-flex gap-2 align-items-center">
                    <select class="form-select form-select-sm" style="width:130px;" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="pending">Pending</option>
                    </select>
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-download me-1"></i> Export
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Reference</th>
                            <th>Child</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Method</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td><code>{{ $payment['id'] }}</code></td>
                            <td>
                                <div class="fw-semibold">{{ $payment['child_name'] }}</div>
                                @if(isset($payment['notes']))
                                    <small class="text-muted">{{ $payment['notes'] }}</small>
                                @endif
                            </td>
                            <td class="fw-bold">R{{ number_format($payment['amount']) }}</td>
                            <td>{{ \Carbon\Carbon::parse($payment['date'])->format('d M Y') }}</td>
                            <td>
                                @php
                                    $methodClasses = ['EFT' => 'method-eft', 'Cash' => 'method-cash', 'Card' => 'method-card', 'POP Upload' => 'method-pop'];
                                    $methodIcons = ['EFT' => 'fa-university', 'Cash' => 'fa-money-bill', 'Card' => 'fa-credit-card', 'POP Upload' => 'fa-file-upload'];
                                @endphp
                                <span class="payment-method-badge {{ $methodClasses[$payment['method']] ?? 'bg-secondary text-white' }}">
                                    <i class="fas {{ $methodIcons[$payment['method']] ?? 'fa-money-bill' }}"></i>
                                    {{ $payment['method'] }}
                                </span>
                            </td>
                            <td>
                                @if($payment['status'] === 'confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                            <td class="text-end">
                                @if($payment['status'] === 'pending')
                                <form method="POST" action="{{ route('admin.payments.confirm', $payment['id']) }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success" title="Confirm payment">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                @endif
                                <button class="btn btn-sm btn-outline-secondary ms-1" title="Download receipt">
                                    <i class="fas fa-file-pdf"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Outstanding Summary --}}
    <div class="col-lg-4">
        <div class="admin-table mb-4">
            <div class="p-4 border-bottom">
                <h5 class="mb-0 fw-bold text-danger"><i class="fas fa-exclamation-circle me-2"></i>Outstanding Accounts</h5>
            </div>
            @php $overdueChildren = collect($children)->where('balance', '>', 0); @endphp
            @forelse($overdueChildren as $child)
            <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-danger bg-opacity-10 text-danger d-flex align-items-center justify-content-center fw-bold"
                         style="width:38px;height:38px;font-size:0.85rem;">
                        {{ strtoupper(substr($child['name'], 0, 1)) }}
                    </div>
                    <div>
                        <div class="fw-semibold small">{{ $child['name'] }}</div>
                        <div class="small text-muted">{{ $child['parent_name'] }}</div>
                    </div>
                </div>
                <div class="text-end">
                    <div class="text-danger fw-bold small">R{{ number_format($child['balance']) }}</div>
                    <a href="https://wa.me/27{{ ltrim(str_replace(' ', '', $child['parent_phone']), '0') }}" target="_blank" class="btn btn-sm btn-success mt-1" style="padding:2px 8px;font-size:0.7rem;">
                        <i class="fab fa-whatsapp me-1"></i>Remind
                    </a>
                </div>
            </div>
            @empty
            <div class="p-4 text-center text-muted">
                <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                <p class="mb-0 small">All accounts up to date!</p>
            </div>
            @endforelse
            <div class="p-3">
                <a href="{{ route('admin.payments.outstanding') }}" class="btn btn-outline-danger w-100 btn-sm">
                    View All Outstanding
                </a>
            </div>
        </div>

        {{-- Collection Rate --}}
        <div class="admin-table p-4">
            <h6 class="fw-bold mb-3"><i class="fas fa-chart-pie me-2 text-primary"></i>Collection Rate</h6>
            @php
                $total = $stats['monthly_revenue'];
                $collected = $stats['confirmed_payments'];
                $pct = $total > 0 ? round(($collected / $total) * 100) : 0;
            @endphp
            <div class="text-center mb-3">
                <div class="fw-bold text-primary" style="font-size:2.5rem;">{{ $pct }}%</div>
                <div class="small text-muted">of expected fees collected</div>
            </div>
            <div class="progress mb-3" style="height: 12px; border-radius: 6px;">
                <div class="progress-bar bg-primary" style="width: {{ $pct }}%; border-radius: 6px;"></div>
            </div>
            <div class="row text-center small">
                <div class="col-4">
                    <div class="fw-bold text-success">R{{ number_format($collected) }}</div>
                    <div class="text-muted">Collected</div>
                </div>
                <div class="col-4">
                    <div class="fw-bold text-danger">R{{ number_format($stats['outstanding_fees']) }}</div>
                    <div class="text-muted">Outstanding</div>
                </div>
                <div class="col-4">
                    <div class="fw-bold text-primary">R{{ number_format($total) }}</div>
                    <div class="text-muted">Expected</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Record Payment Modal --}}
<div class="modal fade" id="recordPaymentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold"><i class="fas fa-plus-circle me-2 text-primary"></i>Record Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.payments.record') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Child / Family</label>
                        <select name="child_id" class="form-select" required>
                            <option value="">Select child…</option>
                            @foreach($children as $child)
                            <option value="{{ $child['id'] }}">{{ $child['name'] }} ({{ $child['parent_name'] }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold">Amount (R)</label>
                            <input type="number" name="amount" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold">Date</label>
                            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Payment Method</label>
                        <select name="method" class="form-select" required>
                            <option>EFT</option>
                            <option>Cash</option>
                            <option>Card</option>
                            <option>POP Upload</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Reference</label>
                        <input type="text" name="reference" class="form-control" placeholder="Payment reference">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Notes (optional)</label>
                        <textarea name="notes" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="d-flex gap-2 justify-content-end">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-admin btn-admin-primary">Record Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

