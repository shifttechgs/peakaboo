@extends('layouts.admin')

@section('title', 'Payments')

@push('styles')
<style>
.stat-card {
    background:#fff; border-radius:14px; border:1px solid #f0f0f0;
    box-shadow:0 1px 6px rgba(0,0,0,.05); padding:20px 22px;
}
.stat-val { font-size:clamp(1.1rem, 2.5vw, 1.6rem); font-weight:800; line-height:1; color:#1a1f2e; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
.stat-lbl { font-size:.68rem; font-weight:700; text-transform:uppercase; letter-spacing:.5px; color:#94a3b8; margin-top:5px; }
.stat-val.warn { color:#d97706; }
.stat-val.good { color:#16a34a; }
.stat-val.bad  { color:#ef4444; }

.panel { background:#fff; border-radius:14px; border:1px solid #f0f0f0; box-shadow:0 1px 6px rgba(0,0,0,.05); overflow:hidden; margin-bottom:24px; }
.panel-header { padding:14px 22px; border-bottom:1px solid #f3f4f6; display:flex; align-items:center; justify-content:space-between; }
.panel-header h6 { margin:0; font-weight:700; font-size:.9rem; color:#1a1f2e; }

.pop-table th { font-size:.67rem; font-weight:700; text-transform:uppercase; letter-spacing:.4px; color:#adb5bd; background:#fafafa; border-bottom:1px solid #f0f0f0; padding:10px 18px; border-top:none; }
.pop-table td { padding:13px 18px; vertical-align:middle; font-size:.84rem; color:#374151; border-bottom:1px solid #f9fafb; }
.pop-table tbody tr:last-child td { border-bottom:none; }
.pop-table tbody tr:hover td { background:#fafcff; }

.status-pill { font-size:.67rem; font-weight:700; border-radius:999px; padding:3px 10px; }
.status-pill.pending  { background:#fff7ed; color:#d97706; }
.status-pill.verified { background:#dcfce7; color:#16a34a; }
.status-pill.rejected { background:#fee2e2; color:#ef4444; }

.action-btn { font-size:.74rem; font-weight:600; border-radius:999px; padding:5px 14px; border:none; cursor:pointer; }
.btn-verify { background:#dcfce7; color:#16a34a; }
.btn-verify:hover { background:#16a34a; color:#fff; }
.btn-reject { background:#fee2e2; color:#ef4444; }
.btn-reject:hover { background:#ef4444; color:#fff; }
</style>
@endpush

@section('content')

{{-- Header --}}
<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <div style="font-size:1.1rem;font-weight:800;color:#1a1f2e;">Payments</div>
        <div style="font-size:.82rem;color:#94a3b8;margin-top:2px;">Review proof-of-payment submissions from parents</div>
    </div>
    <button type="button" class="btn btn-sm rounded-pill px-4"
            style="background:#0077B6;color:#fff;border:none;font-weight:600;font-size:.8rem;"
            data-bs-toggle="modal" data-bs-target="#recordPaymentModal">
        <i class="fas fa-plus me-1"></i> Record Payment
    </button>
</div>

@if(session('success'))
<div class="alert alert-success rounded-3 border-0 mb-4" style="background:#dcfce7;color:#16a34a;font-size:.84rem;font-weight:600;">
    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger rounded-3 border-0 mb-4" style="background:#fee2e2;color:#ef4444;font-size:.84rem;font-weight:600;">
    <i class="fas fa-times-circle me-2"></i>{{ session('error') }}
</div>
@endif

{{-- Stats --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-val {{ $stats['pending_count'] > 0 ? 'warn' : 'good' }}">{{ $stats['pending_count'] }}</div>
            <div class="stat-lbl">Pending Review</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-val good">{{ $stats['verified_month'] }}</div>
            <div class="stat-lbl">Verified This Month</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-val">R {{ number_format($stats['collected_month'], 0) }}</div>
            <div class="stat-lbl">Collected This Month</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-val {{ $stats['total_outstanding'] > 0 ? 'bad' : 'good' }}">R {{ number_format($stats['total_outstanding'], 0) }}</div>
            <div class="stat-lbl">Outstanding</div>
        </div>
    </div>
</div>

{{-- POP Review Queue --}}
<div class="panel">
    <div class="panel-header">
        <h6><i class="fas fa-inbox me-2" style="color:#d97706;"></i> Pending POP Submissions</h6>
        <div style="display:flex;gap:8px;">
            <a href="{{ route('admin.payments.outstanding') }}" class="btn btn-sm rounded-pill px-3" style="background:#f0f9ff;color:#0077B6;border:1.5px solid #bae6fd;font-size:.78rem;font-weight:600;">
                <i class="fas fa-exclamation-circle me-1"></i> Outstanding
            </a>
            <a href="{{ route('admin.payments.statements') }}" class="btn btn-sm rounded-pill px-3" style="background:#f8faff;color:#64748b;border:1.5px solid #e2e8f0;font-size:.78rem;font-weight:600;">
                <i class="fas fa-list me-1"></i> All Verified
            </a>
        </div>
    </div>

    @if($pending->isEmpty())
    <div style="padding:48px 24px;text-align:center;">
        <div style="width:52px;height:52px;background:#dcfce7;border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;">
            <i class="fas fa-check-circle fa-lg" style="color:#16a34a;"></i>
        </div>
        <div style="font-weight:700;color:#1a1f2e;margin-bottom:4px;">All caught up!</div>
        <div style="font-size:.82rem;color:#94a3b8;">No pending proof-of-payment submissions.</div>
    </div>
    @else
    <table class="table pop-table mb-0">
        <thead>
            <tr>
                <th>Parent</th>
                <th>Child</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>EFT Reference</th>
                <th>Submitted</th>
                <th>POP</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pending as $pmt)
            <tr>
                <td>
                    <div style="font-weight:700;color:#1a1f2e;">{{ $pmt->parentUser?->name ?? '—' }}</div>
                    <div style="font-size:.73rem;color:#94a3b8;">{{ $pmt->parentUser?->email }}</div>
                </td>
                <td>
                    @if($pmt->child)
                        <div style="font-weight:600;">{{ $pmt->child->name }}</div>
                        <code style="font-size:.72rem;color:#0077B6;">{{ $pmt->child->child_number }}</code>
                    @elseif($pmt->application)
                        <div style="font-weight:600;">{{ $pmt->application->child_name }}</div>
                        <code style="font-size:.72rem;color:#94a3b8;">{{ $pmt->application->reference }}</code>
                    @else
                        <span style="color:#94a3b8;">—</span>
                    @endif
                </td>
                <td><strong style="color:#1a1f2e;">R {{ number_format($pmt->amount, 2) }}</strong></td>
                <td style="color:#64748b;">{{ $pmt->payment_date->format('d M Y') }}</td>
                <td><code style="font-size:.78rem;color:#374151;">{{ $pmt->reference }}</code></td>
                <td style="color:#94a3b8;font-size:.78rem;">{{ $pmt->created_at->format('d M Y H:i') }}</td>
                <td>
                    @if($pmt->pop_path)
                        <a href="{{ Storage::disk('public')->url($pmt->pop_path) }}" target="_blank"
                           class="btn btn-sm rounded-pill px-3"
                           style="background:#f0f9ff;color:#0077B6;border:1.5px solid #bae6fd;font-size:.74rem;font-weight:600;">
                            <i class="fas fa-eye me-1"></i> View
                        </a>
                    @else
                        <span style="color:#d1d5db;font-size:.78rem;">No file</span>
                    @endif
                </td>
                <td class="text-center">
                    <div style="display:flex;gap:6px;justify-content:center;">
                        {{-- Verify --}}
                        <button type="button" class="action-btn btn-verify"
                                data-bs-toggle="modal"
                                data-bs-target="#verifyModal"
                                data-payment-id="{{ $pmt->id }}"
                                data-child="{{ $pmt->child?->name ?? $pmt->application?->child_name ?? '' }}"
                                data-amount="{{ number_format($pmt->amount, 2) }}"
                                data-ref="{{ $pmt->reference }}">
                            <i class="fas fa-check me-1"></i> Verify
                        </button>
                        {{-- Reject --}}
                        <button type="button" class="action-btn btn-reject"
                                data-bs-toggle="modal"
                                data-bs-target="#rejectModal"
                                data-payment-id="{{ $pmt->id }}"
                                data-child="{{ $pmt->child?->name ?? $pmt->application?->child_name ?? '' }}"
                                data-amount="{{ number_format($pmt->amount, 2) }}">
                            <i class="fas fa-times me-1"></i> Reject
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if($pending->hasPages())
    <div style="padding:14px 20px;border-top:1px solid #f3f4f6;background:#fafafa;">
        {{ $pending->links() }}
    </div>
    @endif
    @endif
</div>

{{-- Verify Modal --}}
<div class="modal fade" id="verifyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:16px;border:1px solid #f0f0f0;">
            <div class="modal-header" style="border-bottom:1px solid #f3f4f6;padding:18px 24px;">
                <h6 class="modal-title fw-bold" style="color:#16a34a;"><i class="fas fa-check-circle me-2"></i>Verify Payment</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="verifyForm" method="POST" action="">
                @csrf
                <div class="modal-body" style="padding:22px 24px;">
                    <div class="p-3 rounded mb-3" style="background:#f0fdf4;border:1px solid #bbf7d0;">
                        <div style="font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:#16a34a;margin-bottom:6px;">Payment Summary</div>
                        <div style="display:flex;justify-content:space-between;align-items:center;">
                            <div>
                                <div style="font-size:.9rem;font-weight:700;color:#1a1f2e;" id="verifyChild"></div>
                                <code style="font-size:.75rem;color:#64748b;" id="verifyRef"></code>
                            </div>
                            <div style="font-size:1.3rem;font-weight:800;color:#16a34a;">R<span id="verifyAmount"></span></div>
                        </div>
                    </div>
                    <div>
                        <label class="form-label fw-semibold" style="font-size:.84rem;">Note <span style="color:#94a3b8;font-weight:400;">(optional)</span></label>
                        <input type="text" name="admin_note" class="form-control form-control-sm"
                               placeholder="e.g. EFT confirmed on bank statement"
                               style="border-color:#e0eeff;">
                    </div>
                </div>
                <div class="modal-footer" style="border-top:1px solid #f3f4f6;padding:14px 24px;gap:8px;">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm rounded-pill px-4" style="background:#16a34a;color:#fff;border:none;font-weight:600;">
                        <i class="fas fa-check me-1"></i> Confirm Verification
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Reject Modal --}}
<div class="modal fade" id="rejectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:16px;border:1px solid #f0f0f0;">
            <div class="modal-header" style="border-bottom:1px solid #f3f4f6;padding:18px 24px;">
                <h6 class="modal-title fw-bold">Reject Payment</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="rejectForm" method="POST" action="">
                @csrf
                <div class="modal-body" style="padding:22px 24px;">
                    <p style="font-size:.84rem;color:#374151;" id="rejectDesc">Rejecting payment for <strong id="rejectChild"></strong> of R<strong id="rejectAmount"></strong>.</p>
                    <div class="mb-1">
                        <label class="form-label fw-semibold" style="font-size:.84rem;">Reason <span style="color:#ef4444;">*</span></label>
                        <textarea name="admin_note" class="form-control" rows="3"
                                  placeholder="e.g. Reference number did not match, amount incorrect..."
                                  style="font-size:.84rem;" required></textarea>
                        <div class="form-text" style="font-size:.73rem;">The reason will be recorded and visible to admin only.</div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top:1px solid #f3f4f6;padding:14px 24px;gap:8px;">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm rounded-pill px-4" style="background:#ef4444;color:#fff;border:none;font-weight:600;">
                        <i class="fas fa-times me-1"></i> Reject Payment
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Record Payment Modal --}}
<div class="modal fade" id="recordPaymentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:16px;border:1px solid #f0f0f0;">
            <div class="modal-header" style="border-bottom:1px solid #f3f4f6;padding:18px 24px;">
                <h6 class="modal-title fw-bold">Record Manual Payment</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.payments.record') }}">
                @csrf
                <div class="modal-body" style="padding:22px 24px;">
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:.84rem;">Child / Application</label>
                        <select name="application_id" class="form-select form-select-sm" required style="border-color:#e0eeff;">
                            <option value="">— Select child —</option>
                            @foreach(\App\Models\Application::with('child')->where('status','approved')->orderBy('child_name')->get() as $app)
                            <option value="{{ $app->id }}">
                                {{ $app->child_name }}
                                @if($app->child) ({{ $app->child->child_number }}) @endif
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label fw-semibold" style="font-size:.84rem;">Amount (R)</label>
                            <input type="number" name="amount" class="form-control form-control-sm" step="0.01" min="1" required style="border-color:#e0eeff;">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold" style="font-size:.84rem;">Payment Date</label>
                            <input type="date" name="payment_date" class="form-control form-control-sm" value="{{ date('Y-m-d') }}" required style="border-color:#e0eeff;">
                        </div>
                    </div>
                    <div class="mt-2">
                        <label class="form-label fw-semibold" style="font-size:.84rem;">EFT Reference</label>
                        <input type="text" name="reference" class="form-control form-control-sm" placeholder="e.g. PBK-BAT-0001" style="border-color:#e0eeff;font-family:monospace;" required>
                    </div>
                    <div class="mt-2">
                        <label class="form-label fw-semibold" style="font-size:.84rem;">Note (optional)</label>
                        <input type="text" name="admin_note" class="form-control form-control-sm" placeholder="e.g. Cash payment received at office" style="border-color:#e0eeff;">
                    </div>
                </div>
                <div class="modal-footer" style="border-top:1px solid #f3f4f6;padding:14px 24px;gap:8px;">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm rounded-pill px-4" style="background:#0077B6;color:#fff;border:none;font-weight:600;">
                        <i class="fas fa-check me-1"></i> Record & Verify
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.getElementById('verifyModal').addEventListener('show.bs.modal', function (e) {
    const btn = e.relatedTarget;
    document.getElementById('verifyChild').textContent  = btn.dataset.child;
    document.getElementById('verifyAmount').textContent = btn.dataset.amount;
    document.getElementById('verifyRef').textContent    = btn.dataset.ref;
    document.getElementById('verifyForm').action =
        '/admin/payments/' + btn.dataset.paymentId + '/verify';
});

document.getElementById('rejectModal').addEventListener('show.bs.modal', function (e) {
    const btn = e.relatedTarget;
    document.getElementById('rejectChild').textContent  = btn.dataset.child;
    document.getElementById('rejectAmount').textContent = btn.dataset.amount;
    document.getElementById('rejectForm').action =
        '/admin/payments/' + btn.dataset.paymentId + '/reject';
});
</script>
@endpush
