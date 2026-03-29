@extends('layouts.admin')

@section('title', 'Audit Log')

@push('styles')
<style>
.al-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 20px;
}
.al-panel-header {
    padding: 16px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.al-panel-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }
.al-table th {
    font-size: .66rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; background: #fafafa;
    border-bottom: 1px solid #f0f0f0; padding: 10px 16px;
}
.al-table td { padding: 13px 16px; vertical-align: middle; border-bottom: 1px solid #f8f8f8; font-size: .84rem; }
.al-table tbody tr:last-child td { border-bottom: none; }
.al-table tbody tr:hover td { background: #fafcff; }
.al-avatar {
    width: 34px; height: 34px; border-radius: 50%; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    font-size: .78rem; font-weight: 800; color: #fff;
}
.al-pill {
    font-size: .68rem; font-weight: 700; border-radius: 20px;
    padding: 3px 10px; display: inline-block; white-space: nowrap;
}
</style>
@endpush

@section('content')

{{-- Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-history me-2" style="color:#3b82f6;font-size:1.1rem;"></i>Audit Log
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Recent system activity and user account changes</p>
    </div>
    <a href="{{ route('admin.settings.index') }}"
       class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
        <i class="fas fa-arrow-left me-1"></i>Back to Settings
    </a>
</div>

{{-- Stats --}}
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-primary">{{ $recentUsers->count() }}</div>
                    <div class="label">Recent Events</div>
                </div>
                <div class="icon bg-primary bg-opacity-10 text-primary"><i class="fas fa-list-alt"></i></div>
            </div>
            <div class="mt-2 small text-muted">Last 50 user changes</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-success">{{ $recentUsers->whereNull('deleted_at')->count() }}</div>
                    <div class="label">Active Accounts</div>
                </div>
                <div class="icon bg-success bg-opacity-10 text-success"><i class="fas fa-user-check"></i></div>
            </div>
            <div class="mt-2 small text-muted">Currently enabled</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-danger">{{ $recentUsers->whereNotNull('deleted_at')->count() }}</div>
                    <div class="label">Deactivated</div>
                </div>
                <div class="icon bg-danger bg-opacity-10 text-danger"><i class="fas fa-user-slash"></i></div>
            </div>
            <div class="mt-2 small text-muted">Soft-deleted users</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value" style="color:#7c3aed;">
                        {{ $recentUsers->where('created_at', '>=', now()->subDays(7))->count() }}
                    </div>
                    <div class="label">New This Week</div>
                </div>
                <div class="icon" style="background:#f5f3ff;color:#7c3aed;"><i class="fas fa-user-plus"></i></div>
            </div>
            <div class="mt-2 small text-muted">Created in last 7 days</div>
        </div>
    </div>
</div>

{{-- Notice --}}
<div style="background:#eff6ff;border:1px solid #bfdbfe;border-radius:12px;padding:13px 18px;font-size:.83rem;color:#3b82f6;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
    <i class="fas fa-info-circle"></i>
    <span>A full audit trail table is planned. This view currently shows the most recently modified user accounts as a proxy for activity.</span>
</div>

{{-- Table --}}
<div class="al-panel">
    <div class="al-panel-header">
        <h6><i class="fas fa-list me-2" style="color:#94a3b8;"></i>Recent User Activity</h6>
    </div>
    <div class="table-responsive">
        <table class="table al-table mb-0">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Account Status</th>
                    <th>Created</th>
                    <th>Last Modified</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentUsers as $u)
                @php
                    $initial   = strtoupper(substr($u->name, 0, 1));
                    $isDeleted = !is_null($u->deleted_at);
                    $colors    = ['A','B','C','D','E','F','G','H'];
                    $bgColor   = ['#3b82f6','#16a34a','#0097a7','#d97706','#7c3aed','#ef4444','#0077B6','#e67e22'];
                    $idx       = ord($initial) % 8;
                @endphp
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <div class="al-avatar" style="background:{{ $bgColor[$idx] }}">{{ $initial }}</div>
                            <span class="fw-semibold" style="color:#1a1f2e;">{{ $u->name }}</span>
                        </div>
                    </td>
                    <td style="color:#6c757d;font-size:.82rem;">{{ $u->email }}</td>
                    <td>
                        @if($isDeleted)
                            <span class="al-pill" style="background:#fee2e2;color:#ef4444;">Deactivated</span>
                        @else
                            <span class="al-pill" style="background:#dcfce7;color:#16a34a;">Active</span>
                        @endif
                    </td>
                    <td style="font-size:.8rem;color:#94a3b8;">
                        {{ \Carbon\Carbon::parse($u->created_at)->format('d M Y') }}
                    </td>
                    <td style="font-size:.8rem;color:#94a3b8;">
                        {{ \Carbon\Carbon::parse($u->updated_at)->diffForHumans() }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <i class="fas fa-history fa-3x text-muted opacity-25 mb-3 d-block"></i>
                        <p class="text-muted mb-0">No activity recorded yet.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
