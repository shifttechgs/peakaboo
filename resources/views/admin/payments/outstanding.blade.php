@extends('layouts.admin')

@section('title', 'Outstanding Payments')

@section('content')

<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <div style="font-size:1.1rem;font-weight:800;color:#1a1f2e;">Outstanding Payments</div>
        <div style="font-size:.82rem;color:#94a3b8;margin-top:2px;">
            Enrolled children with no verified payment for {{ \Carbon\Carbon::parse($currentMonth)->format('F Y') }}
        </div>
    </div>
    <a href="{{ route('admin.payments.index') }}" class="btn btn-sm rounded-pill px-3"
       style="background:#f0f9ff;color:#0077B6;border:1.5px solid #bae6fd;font-weight:600;font-size:.8rem;">
        <i class="fas fa-arrow-left me-1"></i> Back to Payments
    </a>
</div>

<div style="background:#fff;border-radius:14px;border:1px solid #f0f0f0;box-shadow:0 1px 6px rgba(0,0,0,.05);overflow:hidden;">
    @if($outstanding->isEmpty())
    <div style="padding:48px 24px;text-align:center;">
        <div style="width:52px;height:52px;background:#dcfce7;border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;">
            <i class="fas fa-check-circle fa-lg" style="color:#16a34a;"></i>
        </div>
        <div style="font-weight:700;color:#1a1f2e;margin-bottom:4px;">All paid up!</div>
        <div style="font-size:.82rem;color:#94a3b8;">Every enrolled child has a verified payment for this month.</div>
    </div>
    @else
    <table class="table mb-0" style="font-size:.84rem;">
        <thead>
            <tr style="background:#fafafa;">
                <th style="padding:11px 20px;font-size:.67rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#adb5bd;border-bottom:1px solid #f0f0f0;border-top:none;">Child</th>
                <th style="padding:11px 20px;font-size:.67rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#adb5bd;border-bottom:1px solid #f0f0f0;border-top:none;">Child Number</th>
                <th style="padding:11px 20px;font-size:.67rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#adb5bd;border-bottom:1px solid #f0f0f0;border-top:none;">Parent</th>
                <th style="padding:11px 20px;font-size:.67rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#adb5bd;border-bottom:1px solid #f0f0f0;border-top:none;" class="text-end">Amount Due</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outstanding as $row)
            <tr>
                <td style="padding:13px 20px;font-weight:700;color:#1a1f2e;border-bottom:1px solid #f9fafb;">{{ $row['child_name'] }}</td>
                <td style="padding:13px 20px;border-bottom:1px solid #f9fafb;">
                    <code style="font-size:.78rem;color:#0077B6;">{{ $row['child_number'] }}</code>
                </td>
                <td style="padding:13px 20px;border-bottom:1px solid #f9fafb;">
                    <div style="color:#374151;">{{ $row['parent_name'] }}</div>
                    <div style="font-size:.73rem;color:#94a3b8;">{{ $row['parent_email'] }}</div>
                </td>
                <td style="padding:13px 20px;border-bottom:1px solid #f9fafb;" class="text-end">
                    <span style="font-weight:700;color:#ef4444;">R {{ number_format($row['fee'], 2) }}</span>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-end" style="padding:12px 20px;font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#94a3b8;background:#f8faff;border-top:2px solid #e0eeff;">
                    Total Outstanding
                </td>
                <td class="text-end" style="padding:12px 20px;background:#f8faff;border-top:2px solid #e0eeff;">
                    <span style="font-size:1rem;font-weight:800;color:#ef4444;">
                        R {{ number_format($totalOutstanding, 2) }}
                    </span>
                </td>
            </tr>
        </tfoot>
    </table>
    @if($outstanding->hasPages())
    <div style="padding:14px 20px;border-top:1px solid #f3f4f6;background:#fafafa;">
        {{ $outstanding->links() }}
    </div>
    @endif
    @endif
</div>

@endsection
