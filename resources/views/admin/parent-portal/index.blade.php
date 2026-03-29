@extends('layouts.admin')

@section('title', 'Parent Portal Management')

@push('styles')
<style>
.pp-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 20px;
}
.pp-panel-header {
    padding: 16px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.pp-panel-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }
.pp-filter { padding: 20px 22px; }
.pp-filter .form-label { font-size: .68rem; font-weight: 700; text-transform: uppercase; letter-spacing: .4px; color: #94a3b8; margin-bottom: 5px; }
.pp-filter .form-control,
.pp-filter .form-select {
    font-size: .84rem; border: 1px solid #e5e7eb; border-radius: 8px;
    padding: 9px 12px; height: auto; background: #fafafa; color: #374151; transition: border-color .2s;
}
.pp-filter .form-control:focus,
.pp-filter .form-select:focus { border-color: #0077B6; box-shadow: 0 0 0 3px rgba(0,119,182,.08); background: #fff; outline: none; }
.pp-table th {
    font-size: .66rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; background: #fafafa;
    border-bottom: 1px solid #f0f0f0; padding: 10px 16px;
}
.pp-table td { padding: 13px 16px; vertical-align: middle; border-bottom: 1px solid #f8f8f8; font-size: .85rem; }
.pp-table tbody tr:last-child td { border-bottom: none; }
.pp-table tbody tr:hover td { background: #fafcff; }
.pp-avatar {
    width: 38px; height: 38px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: .82rem; font-weight: 800; color: #fff; flex-shrink: 0;
    background: linear-gradient(135deg, #0077B6 0%, #0097a7 100%);
}
.pp-pill {
    font-size: .68rem; font-weight: 700; border-radius: 20px;
    padding: 3px 10px; display: inline-block; white-space: nowrap;
}
.pp-quick-action {
    display: inline-flex; align-items: center; justify-content: center;
    width: 30px; height: 30px; border-radius: 8px; border: 1px solid transparent;
    font-size: .74rem; text-decoration: none; transition: all .15s; cursor: pointer;
    background: none;
}
.pp-quick-action:hover { transform: translateY(-1px); box-shadow: 0 2px 6px rgba(0,0,0,.1); }
</style>
@endpush

@section('content')

{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-door-open me-2" style="color:#7c3aed;font-size:1.1rem;"></i>Parent Portal
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Manage parent portal accounts, access & invitations</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.parent-portal.invitations') }}"
           class="btn btn-sm rounded-pill px-3" style="background:#f5f3ff;color:#7c3aed;border:1px solid #ede9fe;">
            <i class="fas fa-envelope me-1"></i>Invitations
            @if($stats['pending_inv'] > 0)
                <span class="ms-1 badge rounded-pill" style="background:#7c3aed;color:#fff;font-size:.64rem;">{{ $stats['pending_inv'] }}</span>
            @endif
        </a>
        <button class="btn btn-sm rounded-pill px-3 text-white" style="background:#0077B6;"
                data-bs-toggle="modal" data-bs-target="#createAccountModal">
            <i class="fas fa-plus me-1"></i>Add Account
        </button>
    </div>
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
                    <div class="value" style="color:#0077B6;">{{ $stats['total'] }}</div>
                    <div class="label">Total Accounts</div>
                </div>
                <div class="icon" style="background:#eff6ff;color:#0077B6;"><i class="fas fa-users"></i></div>
            </div>
            <div class="mt-2 small text-muted">All parent portal accounts</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-success">{{ $stats['active'] }}</div>
                    <div class="label">Active</div>
                </div>
                <div class="icon bg-success bg-opacity-10 text-success"><i class="fas fa-user-check"></i></div>
            </div>
            <div class="mt-2 small text-muted">Can log in to portal</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value" style="color:#d97706;">{{ $stats['unverified'] }}</div>
                    <div class="label">Unverified Email</div>
                </div>
                <div class="icon" style="background:#fffbeb;color:#d97706;"><i class="fas fa-envelope-open"></i></div>
            </div>
            <div class="mt-2 small text-muted">Haven't verified email yet</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value" style="color:#7c3aed;">{{ $stats['pending_inv'] }}</div>
                    <div class="label">Pending Invites</div>
                </div>
                <div class="icon" style="background:#f5f3ff;color:#7c3aed;"><i class="fas fa-paper-plane"></i></div>
            </div>
            <div class="mt-2 small text-muted">Awaiting acceptance</div>
        </div>
    </div>
</div>

{{-- Filter --}}
<div class="pp-panel">
    <div class="pp-panel-header">
        <h6><i class="fas fa-filter me-2" style="color:#94a3b8;"></i>Filter Accounts</h6>
        @if(request()->hasAny(['search','status']))
            <a href="{{ route('admin.parent-portal.index') }}"
               class="btn btn-sm rounded-pill px-3" style="background:#fee2e2;color:#ef4444;border:none;font-size:.75rem;">
                <i class="fas fa-times me-1"></i>Clear
            </a>
        @endif
    </div>
    <div class="pp-filter">
        <form method="GET" action="{{ route('admin.parent-portal.index') }}">
            <div class="row g-3 align-items-end">
                <div class="col-md-6">
                    <label class="form-label">Search</label>
                    <input type="text" name="search" class="form-control"
                           placeholder="Name, email or phone…" value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="">All</option>
                        <option value="active"     {{ request('status') === 'active'     ? 'selected' : '' }}>Active</option>
                        <option value="inactive"   {{ request('status') === 'inactive'   ? 'selected' : '' }}>Deactivated</option>
                        <option value="unverified" {{ request('status') === 'unverified' ? 'selected' : '' }}>Unverified Email</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-sm w-100 rounded-pill text-white" style="background:#0077B6;padding:9px;">
                        <i class="fas fa-search me-1"></i>Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Table --}}
<div class="pp-panel">
    <div class="pp-panel-header">
        <h6>
            <i class="fas fa-list me-2" style="color:#94a3b8;"></i>Portal Accounts
            <span class="ms-2 rounded-pill px-2 py-1" style="background:#f5f3ff;color:#7c3aed;font-size:.72rem;font-weight:700;vertical-align:middle;">
                {{ $portals->total() }}
            </span>
        </h6>
        <a href="{{ route('parent.dashboard') }}" target="_blank"
           class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;font-size:.76rem;">
            <i class="fas fa-external-link-alt me-1"></i>Preview Portal
        </a>
    </div>
    <div class="table-responsive">
        <table class="table pp-table mb-0">
            <thead>
                <tr>
                    <th>Parent</th>
                    <th>Contact</th>
                    <th>Children / Apps</th>
                    <th>Email Verified</th>
                    <th>Status</th>
                    <th>Joined</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($portals as $parent)
                @php
                    $initial  = strtoupper(substr($parent->name, 0, 1));
                    $isActive = !$parent->trashed();
                    $appCount = $parent->applications->count();
                    $colors   = ['#0077B6','#7c3aed','#16a34a','#0097a7','#d97706','#ef4444'];
                    $color    = $colors[crc32($parent->name) % count($colors)];
                @endphp
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <div class="pp-avatar" style="background:{{ $color }};">{{ $initial }}</div>
                            <div>
                                <div class="fw-semibold" style="color:#1a1f2e;">{{ $parent->name }}</div>
                                <div style="font-size:.76rem;color:#94a3b8;">{{ $parent->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($parent->phone)
                            <span style="font-size:.83rem;color:#374151;">
                                <i class="fas fa-phone me-1 text-muted" style="font-size:.7rem;"></i>{{ $parent->phone }}
                            </span>
                        @else
                            <span style="color:#d1d5db;font-size:.78rem;">—</span>
                        @endif
                    </td>
                    <td>
                        @if($appCount > 0)
                            <span class="pp-pill" style="background:#e0f7fa;color:#0097a7;">
                                <i class="fas fa-child me-1"></i>{{ $appCount }} app{{ $appCount !== 1 ? 's' : '' }}
                            </span>
                        @else
                            <span style="color:#d1d5db;font-size:.78rem;">No apps</span>
                        @endif
                    </td>
                    <td>
                        @if($parent->email_verified_at)
                            <span style="color:#16a34a;font-size:.8rem;">
                                <i class="fas fa-check-circle me-1"></i>{{ $parent->email_verified_at->format('d M Y') }}
                            </span>
                        @else
                            <span class="pp-pill" style="background:#fffbeb;color:#d97706;">Unverified</span>
                        @endif
                    </td>
                    <td>
                        @if($isActive)
                            <span class="pp-pill" style="background:#dcfce7;color:#16a34a;">Active</span>
                        @else
                            <span class="pp-pill" style="background:#fee2e2;color:#ef4444;">Deactivated</span>
                        @endif
                    </td>
                    <td style="font-size:.8rem;color:#94a3b8;">{{ $parent->created_at->format('d M Y') }}</td>
                    <td class="text-end">
                        <div class="d-flex gap-1 justify-content-end">
                            <a href="{{ route('admin.parent-portal.show', $parent->id) }}"
                               class="pp-quick-action" style="background:#eff6ff;color:#3b82f6;border-color:#bfdbfe;" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if($isActive)
                            <form method="POST" action="{{ route('admin.parent-portal.deactivate', $parent->id) }}">
                                @csrf @method('DELETE')
                                <button type="submit" class="pp-quick-action"
                                        style="background:#fef2f2;color:#ef4444;border-color:#fca5a5;"
                                        title="Deactivate"
                                        data-confirm="Deactivate {{ $parent->name }}'s portal access?"
                                        data-confirm-title="Deactivate Account"
                                        data-confirm-icon="🔒"
                                        data-confirm-btn="Deactivate"
                                        data-confirm-color="#ef4444">
                                    <i class="fas fa-ban"></i>
                                </button>
                            </form>
                            @else
                            <form method="POST" action="{{ route('admin.parent-portal.activate', $parent->id) }}">
                                @csrf
                                <button type="submit" class="pp-quick-action"
                                        style="background:#f0fdf4;color:#16a34a;border-color:#86efac;"
                                        title="Reactivate">
                                    <i class="fas fa-check-circle"></i>
                                </button>
                            </form>
                            @endif
                            <form method="POST" action="{{ route('admin.parent-portal.resend-invite', $parent->id) }}">
                                @csrf
                                <button type="submit" class="pp-quick-action"
                                        style="background:#f5f3ff;color:#7c3aed;border-color:#ede9fe;"
                                        title="Resend Invitation">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <i class="fas fa-door-open fa-3x text-muted opacity-25 mb-3 d-block"></i>
                        <p class="text-muted mb-0">No parent portal accounts found.</p>
                        @if(request()->hasAny(['search','status']))
                            <a href="{{ route('admin.parent-portal.index') }}" class="btn btn-sm btn-outline-secondary mt-2">Clear filters</a>
                        @endif
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($portals->hasPages())
    <div class="px-4 py-3 border-top">{{ $portals->links() }}</div>
    @endif
</div>

{{-- ── Create Account Modal ──────────────────────────────────────────────── --}}
<div class="modal fade" id="createAccountModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:480px;">
        <div class="modal-content" style="border:none;border-radius:16px;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,.15);">
            <div class="modal-header" style="border-bottom:1px solid #f3f4f6;padding:20px 24px;">
                <h5 class="modal-title" style="font-weight:700;font-size:.95rem;color:#1a1f2e;">
                    <i class="fas fa-user-plus me-2" style="color:#0077B6;"></i>Create Parent Portal Account
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.parent-portal.store') }}">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label" style="font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#94a3b8;">Full Name *</label>
                        <input type="text" name="name" class="form-control" required
                               style="border-radius:10px;font-size:.85rem;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#94a3b8;">Email Address *</label>
                        <input type="email" name="email" class="form-control" required
                               style="border-radius:10px;font-size:.85rem;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#94a3b8;">Phone Number</label>
                        <input type="text" name="phone" class="form-control"
                               style="border-radius:10px;font-size:.85rem;">
                    </div>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="send_invite" value="1" id="sendInviteCheck" checked>
                        <label class="form-check-label" for="sendInviteCheck" style="font-size:.84rem;color:#374151;">
                            Send portal invitation email immediately
                        </label>
                    </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0 gap-2">
                    <button type="button" class="btn rounded-pill px-4"
                            style="background:#f3f4f6;color:#374151;font-size:.84rem;border:none;"
                            data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn rounded-pill px-4 text-white"
                            style="background:#0077B6;font-size:.84rem;border:none;">
                        <i class="fas fa-user-plus me-1"></i>Create Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

