@extends('layouts.portal')

@section('title', 'Fee Schedule')
@section('portal-name', 'Parent Portal')
@section('page-title', 'Fee Schedule')

@section('sidebar-nav')
@include('parent.partials.sidebar')
@endsection

@push('styles')
<style>
/* ─── Micro label ──────────────────────────────────────────────────────── */
.micro-label {
    font-size: .63rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: 1.1px; color: #adb5bd; margin-bottom: 12px;
}

/* ─── Panel ────────────────────────────────────────────────────────────── */
.panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.06);
    border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 24px;
}
.panel-header {
    padding: 15px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.panel-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }

/* ─── Summary stat bar ─────────────────────────────────────────────────── */
.summary-bar {
    background: #fff; border-radius: 16px;
    border: 1px solid #f0f0f0; box-shadow: 0 1px 8px rgba(0,0,0,.06);
    display: flex; overflow: hidden; margin-bottom: 24px;
}
.summary-tile {
    flex: 1; padding: 18px 16px 20px; text-align: center;
    border-right: 1px solid #f3f4f6; text-decoration: none; display: block;
    transition: background .12s;
}
.summary-tile:last-child { border-right: none; }
.summary-tile:hover { background: #fafbff; }
.st-val { font-size: 1.5rem; font-weight: 800; line-height: 1; color: #1a1f2e; }
.st-lbl { font-size: .67rem; font-weight: 600; text-transform: uppercase;
          letter-spacing: .5px; color: #94a3b8; margin-top: 5px; }
.st-sub { font-size: .68rem; color: #adb5bd; margin-top: 3px; }
.st-val.good { color: #16a34a; }
.st-val.warn { color: #d97706; }
.st-val.bad  { color: #ef4444; }

/* ─── Fee table ────────────────────────────────────────────────────────── */
.fee-table th {
    font-size: .68rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; background: #fafafa;
    border-bottom: 1px solid #f0f0f0; padding: 11px 20px; border-top: none;
}
.fee-table td {
    padding: 13px 20px; vertical-align: middle;
    border-bottom: 1px solid #f8f8f8; font-size: .86rem;
}
.fee-table tbody tr:last-child td { border-bottom: none; }
.fee-table tbody tr:hover td { background: #fafcff; transition: background .1s; }
.fee-total-row td {
    padding: 14px 20px; background: #f8faff !important;
    border-top: 2px solid #e0eeff !important; border-bottom: none !important;
}

/* ─── Plan cards ───────────────────────────────────────────────────────── */
.plan-card {
    border-radius: 14px; border: 1.5px solid #f0f0f0;
    padding: 24px; height: 100%; position: relative; overflow: hidden;
    transition: border-color .15s, box-shadow .15s;
}
.plan-card:hover { border-color: #bae6fd; box-shadow: 0 4px 20px rgba(0,119,182,.08); }
.plan-card.featured {
    border-color: #0077B6;
    background: linear-gradient(135deg, #f0f9ff 0%, #fef9f0 100%);
}
.plan-card.featured::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
    background: linear-gradient(90deg, #0077B6, #00B4D8);
}
.plan-badge {
    font-size: .67rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: .6px; padding: 4px 10px; border-radius: 999px;
}
.plan-price {
    font-size: 2rem; font-weight: 800; color: #1a1f2e; line-height: 1;
    margin: 16px 0 4px;
}
.plan-price span { font-size: .9rem; font-weight: 400; color: #94a3b8; }
.plan-time { font-size: .78rem; color: #64748b; margin-bottom: 20px; }
.plan-feature {
    display: flex; align-items: center; gap: 10px;
    font-size: .82rem; color: #374151; padding: 5px 0;
    border-bottom: 1px solid #f3f4f6;
}
.plan-feature:last-child { border-bottom: none; }
.plan-feature i { color: #16a34a; font-size: .7rem; flex-shrink: 0; }

/* ─── Service card ─────────────────────────────────────────────────────── */
.service-card {
    border-radius: 14px; border: 1.5px solid #f0f0f0;
    padding: 20px; height: 100%;
    transition: border-color .15s, box-shadow .15s;
}
.service-card:hover { border-color: #bae6fd; box-shadow: 0 4px 16px rgba(0,119,182,.07); }
.service-icon {
    width: 46px; height: 46px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; margin-bottom: 14px;
}
.service-price {
    font-size: 1.3rem; font-weight: 800; color: #0077B6; margin: 6px 0 4px;
}

/* ─── Bank details ─────────────────────────────────────────────────────── */
.bank-row {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 0; border-bottom: 1px solid #f9fafb;
}
.bank-row:last-child { border-bottom: none; }
.bank-lbl { font-size: .7rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: .4px; color: #94a3b8; min-width: 130px; flex-shrink: 0; }
.bank-val { font-size: .87rem; font-weight: 600; color: #1a1f2e; }

/* ─── Notice row ───────────────────────────────────────────────────────── */
.notice-row {
    display: flex; align-items: flex-start; gap: 10px;
    padding: 9px 0; border-bottom: 1px solid #f9fafb; font-size: .83rem;
}
.notice-row:last-child { border-bottom: none; }
.notice-row i { color: #0077B6; margin-top: 2px; flex-shrink: 0; width: 16px; text-align: center; }
</style>
@endpush

@section('content')

{{-- ── Page header ──────────────────────────────────────────────────────── --}}
<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <div style="font-size:1.1rem;font-weight:800;color:#1a1f2e;letter-spacing:-.2px;">Fee Schedule</div>
        <div style="font-size:.82rem;color:#94a3b8;margin-top:2px;">
            {{ now()->format('F Y') }} &mdash; billing overview and 2026 rate card
        </div>
    </div>
    <a href="{{ route('parent.fees.statements') }}"
       class="btn btn-sm rounded-pill px-3"
       style="background:#0077B6;color:#fff;border:none;font-weight:600;font-size:.8rem;">
        <i class="fas fa-receipt me-1"></i> View Statement
    </a>
</div>

{{-- ── Account summary bar ───────────────────────────────────────────────── --}}
<div class="summary-bar">
    <div class="summary-tile">
        <div class="st-val">R {{ number_format($feeSummary['monthly_fee'], 0) }}</div>
        <div class="st-lbl">Monthly Total</div>
        <div class="st-sub">Current plan</div>
    </div>
    <div class="summary-tile">
        <div class="st-val good">R {{ number_format($feeSummary['last_payment'], 0) }}</div>
        <div class="st-lbl">Last Payment</div>
        <div class="st-sub">{{ $feeSummary['last_payment_date'] ?? '—' }}</div>
    </div>
    <div class="summary-tile">
        <div class="st-val {{ $feeSummary['balance'] > 0 ? 'bad' : 'good' }}">
            R {{ number_format($feeSummary['balance'], 0) }}
        </div>
        <div class="st-lbl">Balance</div>
        <div class="st-sub">{{ $feeSummary['balance'] > 0 ? 'Outstanding' : 'Up to date' }}</div>
    </div>
    <div class="summary-tile">
        <div class="st-val {{ isset($feeSummary['next_due_days']) && $feeSummary['next_due_days'] <= 7 ? 'warn' : '' }}"
             style="font-size:1rem;">
            {{ $feeSummary['next_due'] }}
        </div>
        <div class="st-lbl">Next Due</div>
        <div class="st-sub">
            @if(isset($feeSummary['next_due_days']) && $feeSummary['next_due_days'] >= 0)
                in {{ $feeSummary['next_due_days'] }} day(s)
            @else &mdash; @endif
        </div>
    </div>
</div>

{{-- ── Your current fees ────────────────────────────────────────────────── --}}
<div class="micro-label"><i class="fas fa-user-circle me-1"></i> Your Current Fees</div>
<div class="panel">
    <div class="panel-header">
        <h6>Monthly Breakdown per Child</h6>
        <span style="font-size:.75rem;color:#94a3b8;">{{ now()->format('F Y') }}</span>
    </div>
    <table class="table fee-table mb-0">
        <thead>
            <tr>
                <th>Child</th>
                <th>Programme</th>
                <th>Plan</th>
                <th class="text-end">Base Fee</th>
                <th class="text-end">Snack Box</th>
                <th class="text-end">Total / Month</th>
            </tr>
        </thead>
        <tbody>
            @forelse($feeLines as $line)
            <tr>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        <div style="width:30px;height:30px;border-radius:8px;background:#f0f9ff;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:.8rem;color:#0077B6;flex-shrink:0;">
                            {{ strtoupper(substr($line['name'], 0, 1)) }}
                        </div>
                        <span style="font-weight:700;color:#1a1f2e;">{{ $line['name'] }}</span>
                    </div>
                </td>
                <td style="color:#64748b;">{{ $line['program'] }}</td>
                <td>
                    <span style="background:#f0f9ff;color:#0077B6;font-size:.72rem;font-weight:700;padding:3px 9px;border-radius:999px;">
                        {{ $line['fee_option'] }}
                    </span>
                </td>
                <td class="text-end" style="font-weight:600;">R {{ number_format($line['base_fee'], 2) }}</td>
                <td class="text-end">
                    @if($line['snack_box'])
                        <span style="color:#16a34a;font-weight:600;">R {{ number_format($line['snack_fee'], 2) }}</span>
                    @else
                        <span style="color:#d1d5db;">—</span>
                    @endif
                </td>
                <td class="text-end">
                    <span style="font-size:.95rem;font-weight:800;color:#1a1f2e;">R {{ number_format($line['total'], 2) }}</span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-4" style="color:#94a3b8;font-size:.85rem;">
                    No active enrolments found.
                </td>
            </tr>
            @endforelse
        </tbody>
        @if($feeLines->count())
        <tfoot>
            <tr class="fee-total-row">
                <td colspan="4" class="text-end" style="font-size:.78rem;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:#94a3b8;">
                    Monthly Total
                </td>
                <td colspan="2" class="text-end">
                    <span style="font-size:1.1rem;font-weight:800;color:#0077B6;">
                        R {{ number_format($feeLines->sum('total'), 2) }}
                    </span>
                </td>
            </tr>
        </tfoot>
        @endif
    </table>
</div>

{{-- ── 2026 Rate card ────────────────────────────────────────────────────── --}}
<div class="micro-label"><i class="fas fa-tags me-1"></i> 2026 Rate Card</div>
<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="plan-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div style="font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:#94a3b8;">Option A</div>
                    <div style="font-size:1.1rem;font-weight:800;color:#1a1f2e;margin-top:2px;">Half Day</div>
                </div>
                <span class="plan-badge" style="background:#f0f9ff;color:#0077B6;">06:00 – 13:00</span>
            </div>
            <div class="plan-price">R 3,800 <span>/ month</span></div>
            <div class="plan-time">Excludes lunch &bull; Snack box available separately</div>
            <div>
                <div class="plan-feature"><i class="fas fa-check-circle"></i> Morning care (06:00 – 13:00)</div>
                <div class="plan-feature"><i class="fas fa-check-circle"></i> Morning snack included</div>
                <div class="plan-feature"><i class="fas fa-check-circle"></i> Full CAPS learning programme</div>
                <div class="plan-feature"><i class="fas fa-check-circle"></i> Qualified & registered teachers</div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="plan-card featured">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div style="font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:#0077B6;">Option B</div>
                    <div style="font-size:1.1rem;font-weight:800;color:#1a1f2e;margin-top:2px;">Full Day</div>
                </div>
                <span class="plan-badge" style="background:#dcfce7;color:#16a34a;">06:00 – 18:00</span>
            </div>
            <div class="plan-price">R 4,200 <span>/ month</span></div>
            <div class="plan-time">All meals included &bull; 06:00 – 18:00</div>
            <div>
                <div class="plan-feature"><i class="fas fa-check-circle"></i> Full day care (06:00 – 18:00)</div>
                <div class="plan-feature"><i class="fas fa-check-circle"></i> Breakfast, lunch & afternoon snack</div>
                <div class="plan-feature"><i class="fas fa-check-circle"></i> Afternoon rest / nap time</div>
                <div class="plan-feature"><i class="fas fa-check-circle"></i> Full CAPS learning programme</div>
                <div class="plan-feature"><i class="fas fa-check-circle"></i> Qualified & registered teachers</div>
            </div>
        </div>
    </div>
</div>

{{-- ── Additional services ──────────────────────────────────────────────── --}}
<div class="micro-label"><i class="fas fa-plus-circle me-1"></i> Additional Services</div>
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="service-card">
            <div class="service-icon" style="background:#fff7ed;">
                <i class="fas fa-apple-alt" style="color:#d97706;"></i>
            </div>
            <div style="font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.6px;color:#94a3b8;">Add-on</div>
            <div style="font-size:.95rem;font-weight:800;color:#1a1f2e;margin-top:2px;">Snack Box</div>
            <div class="service-price">R 400 <span style="font-size:.8rem;font-weight:400;color:#94a3b8;">/ month</span></div>
            <div style="font-size:.78rem;color:#64748b;margin-top:4px;">Daily healthy snacks prepared fresh each morning</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="service-card">
            <div class="service-icon" style="background:#eff6ff;">
                <i class="fas fa-umbrella-beach" style="color:#2563eb;"></i>
            </div>
            <div style="font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.6px;color:#94a3b8;">Seasonal</div>
            <div style="font-size:.95rem;font-weight:800;color:#1a1f2e;margin-top:2px;">Holiday Care</div>
            <div class="service-price">R 250 <span style="font-size:.8rem;font-weight:400;color:#94a3b8;">/ day</span></div>
            <div style="font-size:.78rem;color:#64748b;margin-top:4px;">School holiday supervision & themed activities</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="service-card">
            <div class="service-icon" style="background:#fdf4ff;">
                <i class="fas fa-futbol" style="color:#7c3aed;"></i>
            </div>
            <div style="font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.6px;color:#94a3b8;">Weekly</div>
            <div style="font-size:.95rem;font-weight:800;color:#1a1f2e;margin-top:2px;">Extra Murals</div>
            <div class="service-price" style="font-size:1.1rem;">From R 200</div>
            <div style="font-size:.78rem;color:#64748b;margin-top:4px;">Swimming, soccer, ballet, art & more</div>
        </div>
    </div>
</div>

{{-- ── Payment info ──────────────────────────────────────────────────────── --}}
<div class="micro-label"><i class="fas fa-credit-card me-1"></i> Payment Information</div>
<div class="row g-3">
    <div class="col-md-6">
        <div class="panel" style="margin-bottom:0;">
            <div class="panel-header">
                <h6><i class="fas fa-university me-2" style="color:#0077B6;"></i> Bank Details</h6>
                <button type="button" onclick="copyBankDetails()"
                        style="font-size:.74rem;font-weight:600;color:#0077B6;background:none;border:none;cursor:pointer;padding:0;">
                    <i class="fas fa-copy me-1"></i> Copy
                </button>
            </div>
            <div style="padding: 6px 22px 14px;">
                <div class="bank-row">
                    <div class="bank-lbl">Bank</div>
                    <div class="bank-val">First National Bank (FNB)</div>
                </div>
                <div class="bank-row">
                    <div class="bank-lbl">Account Name</div>
                    <div class="bank-val">Peekaboo Daycare</div>
                </div>
                <div class="bank-row">
                    <div class="bank-lbl">Account Number</div>
                    <div class="bank-val" id="accNum" style="font-family:monospace;letter-spacing:.5px;">62123456789</div>
                </div>
                <div class="bank-row">
                    <div class="bank-lbl">Branch Code</div>
                    <div class="bank-val" style="font-family:monospace;">250655</div>
                </div>
                <div class="bank-row">
                    <div class="bank-lbl">Reference</div>
                    <div class="bank-val">
                        @if($children->count())
                            <span style="color:#0077B6;font-family:monospace;letter-spacing:.5px;">
                                {{ $children->first()['child_number'] ?? $children->first()['reference'] }}
                            </span>
                        @else
                            <span style="color:#0077B6;">Your Child Number</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel" style="margin-bottom:0;">
            <div class="panel-header">
                <h6><i class="fas fa-info-circle me-2" style="color:#0077B6;"></i> Important Notes</h6>
            </div>
            <div style="padding: 6px 22px 14px;">
                <div class="notice-row">
                    <i class="fas fa-calendar-check"></i>
                    <span>Fees are due by the <strong>1st of each month</strong></span>
                </div>
                <div class="notice-row">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Late payments attract a <strong>10% penalty fee</strong></span>
                </div>
                <div class="notice-row">
                    <i class="fas fa-clock"></i>
                    <span><strong>1 month written notice</strong> required for withdrawal</span>
                </div>
                <div class="notice-row">
                    <i class="fas fa-file-invoice"></i>
                    <span>Annual registration fee: <strong>R 500</strong> (once-off)</span>
                </div>
                <div class="notice-row">
                    <i class="fas fa-users"></i>
                    <span><strong>10% sibling discount</strong> applied automatically</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function copyBankDetails() {
    const text = `Bank: First National Bank (FNB)\nAccount Name: Peekaboo Daycare\nAccount Number: 62123456789\nBranch Code: 250655`;
    navigator.clipboard.writeText(text).then(() => {
        const btn = event.currentTarget;
        btn.innerHTML = '<i class="fas fa-check me-1"></i> Copied!';
        btn.style.color = '#16a34a';
        setTimeout(() => {
            btn.innerHTML = '<i class="fas fa-copy me-1"></i> Copy';
            btn.style.color = '#0077B6';
        }, 2000);
    });
}
</script>
@endpush
