@extends('layouts.admin')

@section('title', 'Parent Portal Invitations')

@push('styles')
<style>
.inv-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 20px;
}
.inv-panel-header {
    padding: 16px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.inv-panel-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }
.inv-filter { padding: 20px 22px; }
.inv-filter .form-label { font-size: .68rem; font-weight: 700; text-transform: uppercase; letter-spacing: .4px; color: #94a3b8; margin-bottom: 5px; }
.inv-filter .form-control,
.inv-filter .form-select {
    font-size: .84rem; border: 1px solid #e5e7eb; border-radius: 8px;
    padding: 9px 12px; height: auto; background: #fafafa; color: #374151;
}
.inv-filter .form-control:focus,
.inv-filter .form-select:focus { border-color: #7c3aed; box-shadow: 0 0 0 3px rgba(124,58,237,.08); background: #fff; outline: none; }
.inv-table th {
    font-size: .66rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; background: #fafafa;
    border-bottom: 1px solid #f0f0f0; padding: 10px 16px;
}
.inv-table td { padding: 13px 16px; vertical-align: middle; border-bottom: 1px solid #f8f8f8; font-size: .85rem; }
.inv-table tbody tr:last-child td { border-bottom: none; }
.inv-table tbody tr:hover td { background: #fafcff; }
.inv-pill { font-size: .68rem; font-weight: 700; border-radius: 20px; padding: 3px 10px; display: inline-block; white-space: nowrap; }
</style>
@endpush

@section('content')

{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <ul style="list-style:none;padding:0;margin:0 0 8px;display:flex;gap:6px;font-size:.76rem;color:#adb5bd;">
            <li><a href="{{ route('admin.parent-portal.index') }}" style="color:#0077B6;text-decoration:none;">Parent Portal</a></li>
            <li>/ Invitations</li>
        </ul>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-paper-plane me-2" style="color:#7c3aed;font-size:1.1rem;"></i>Portal Invitations
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Track all parent portal invitation emails</p>
    </div>
    <a href="{{ route('admin.parent-portal.index') }}"
       class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
        <i class="fas fa-arrow-left me-1"></i>Back to Portal
    </a>
</div>

{{-- Flash --}}
@if(session('success'))
<div style="background:#f0fdf4;border:1px solid #86efac;border-radius:12px;padding:13px 18px;font-size:.84rem;color:#16a34a;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif
@if(session('error'))
<div style="background:#fef2f2;border:1px solid #fca5a5;border-radius:12px;padding:13px 18px;font-size:.84rem;color:#ef4444;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
</div>
@endif

{{-- Stats --}}
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value" style="color:#7c3aed;">{{ $stats['total'] }}</div>
                    <div class="label">Total Sent</div>
                </div>
                <div class="icon" style="background:#f5f3ff;color:#7c3aed;"><i class="fas fa-paper-plane"></i></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value" style="color:#d97706;">{{ $stats['pending'] }}</div>
                    <div class="label">Pending</div>
                </div>
                <div class="icon" style="background:#fffbeb;color:#d97706;"><i class="fas fa-clock"></i></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-success">{{ $stats['accepted'] }}</div>
                    <div class="label">Accepted</div>
                </div>
                <div class="icon bg-success bg-opacity-10 text-success"><i class="fas fa-check-circle"></i></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-danger">{{ $stats['expired'] }}</div>
                    <div class="label">Expired</div>
                </div>
                <div class="icon bg-danger bg-opacity-10 text-danger"><i class="fas fa-calendar-times"></i></div>
            </div>
        </div>
    </div>
</div>

{{-- Filter --}}
<div class="inv-panel">
    <div class="inv-panel-header">
        <h6><i class="fas fa-filter me-2" style="color:#94a3b8;"></i>Filter Invitations</h6>
        @if(request()->hasAny(['search','status']))
            <a href="{{ route('admin.parent-portal.invitations') }}"
               class="btn btn-sm rounded-pill px-3" style="background:#fee2e2;color:#ef4444;border:none;font-size:.75rem;">
                <i class="fas fa-times me-1"></i>Clear
            </a>
        @endif
    </div>
    <div class="inv-filter">
        <form method="GET" action="{{ route('admin.parent-portal.invitations') }}">
            <div class="row g-3 align-items-end">
                <div class="col-md-6">
                    <label class="form-label">Search by Email</label>
                    <input type="text" name="search" class="form-control"
                           placeholder="Email address…" value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="">All</option>
                        <option value="pending"  {{ request('status') === 'pending'  ? 'selected' : '' }}>Pending</option>
                        <option value="accepted" {{ request('status') === 'accepted' ? 'selected' : '' }}>Accepted</option>
                        <option value="expired"  {{ request('status') === 'expired'  ? 'selected' : '' }}>Expired</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-sm w-100 rounded-pill text-white" style="background:#7c3aed;padding:9px;">
                        <i class="fas fa-search me-1"></i>Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Table --}}
<div class="inv-panel">
    <div class="inv-panel-header">
        <h6>
            <i class="fas fa-list me-2" style="color:#94a3b8;"></i>Invitations
            <span class="ms-2 rounded-pill px-2 py-1" style="background:#f5f3ff;color:#7c3aed;font-size:.72rem;font-weight:700;vertical-align:middle;">
                {{ $invitations->total() }}
            </span>
        </h6>
    </div>
    <div class="table-responsive">
        <table class="table inv-table mb-0">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Sent By</th>
                    <th>Sent</th>
                    <th>Expires / Accepted</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($invitations as $inv)
                @php
                    $isPending  = !$inv->accepted_at && $inv->expires_at->isFuture();
                    $isAccepted = (bool)$inv->accepted_at;
                    $isExpired  = !$inv->accepted_at && $inv->expires_at->isPast();
                    $parentUser = \App\Models\User::withTrashed()->where('email', $inv->email)->first();
                @endphp
                <tr>
                    <td>
                        <div class="fw-semibold" style="color:#1a1f2e;">{{ $inv->email }}</div>
                        @if($parentUser)
                            <div style="font-size:.74rem;color:#94a3b8;">{{ $parentUser->name }}</div>
                        @endif
                    </td>
                    <td>
                        @if($isAccepted)
                            <span class="inv-pill" style="background:#dcfce7;color:#16a34a;">
                                <i class="fas fa-check me-1"></i>Accepted
                            </span>
                        @elseif($isPending)
                            <span class="inv-pill" style="background:#fffbeb;color:#d97706;">
                                <i class="fas fa-clock me-1"></i>Pending
                            </span>
                        @else
                            <span class="inv-pill" style="background:#fee2e2;color:#ef4444;">
                                <i class="fas fa-calendar-times me-1"></i>Expired
                            </span>
                        @endif
                    </td>
                    <td style="font-size:.82rem;color:#374151;">
                        {{ $inv->invitedBy?->name ?? '—' }}
                    </td>
                    <td style="font-size:.8rem;color:#94a3b8;">
                        {{ $inv->created_at->format('d M Y') }}
                    </td>
                    <td style="font-size:.8rem;color:#94a3b8;">
                        @if($isAccepted)
                            <span style="color:#16a34a;">{{ $inv->accepted_at->format('d M Y H:i') }}</span>
                        @else
                            {{ $inv->expires_at->format('d M Y') }}
                            @if($isExpired)
                                <span style="color:#ef4444;font-size:.72rem;display:block;">Expired</span>
                            @endif
                        @endif
                    </td>
                    <td class="text-end">
                        <div class="d-flex gap-1 justify-content-end">
                            @if($isPending)
                            <form method="POST" action="{{ route('admin.parent-portal.cancel-invite', $inv->id) }}">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm rounded-pill px-2"
                                        style="background:#fef2f2;color:#ef4444;border:1px solid #fca5a5;font-size:.74rem;"
                                        data-confirm="Cancel this invitation to {{ $inv->email }}?"
                                        data-confirm-title="Cancel Invitation"
                                        data-confirm-icon="✉️"
                                        data-confirm-btn="Cancel Invite"
                                        data-confirm-color="#ef4444">
                                    <i class="fas fa-times me-1"></i>Cancel
                                </button>
                            </form>
                            @endif
                            @if($parentUser)
                            <a href="{{ route('admin.parent-portal.show', $parentUser->id) }}"
                               class="btn btn-sm rounded-pill px-2"
                               style="background:#eff6ff;color:#3b82f6;border:1px solid #bfdbfe;font-size:.74rem;">
                                <i class="fas fa-user me-1"></i>Account
                            </a>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <i class="fas fa-paper-plane fa-3x text-muted opacity-25 mb-3 d-block"></i>
                        <p class="text-muted mb-0">No invitations found.</p>
                        @if(request()->hasAny(['search','status']))
                            <a href="{{ route('admin.parent-portal.invitations') }}" class="btn btn-sm btn-outline-secondary mt-2">Clear filters</a>
                        @endif
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($invitations->hasPages())
    <div class="px-4 py-3 border-top">{{ $invitations->links() }}</div>
    @endif
</div>

@endsection

