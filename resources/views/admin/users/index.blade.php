@extends('layouts.admin')

@section('title', 'Users & Access')

@push('styles')
<style>
/* ── Panel ───────────────────────────────────────────────────────────── */
.usr-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden;
    margin-bottom: 20px;
}
.usr-panel-header {
    padding: 16px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.usr-panel-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }

/* ── Filter ──────────────────────────────────────────────────────────── */
.usr-filter { padding: 20px 22px; }
.usr-filter .form-label { font-size: .68rem; font-weight: 700; text-transform: uppercase; letter-spacing: .4px; color: #94a3b8; margin-bottom: 5px; }
.usr-filter .form-control,
.usr-filter .form-select {
    font-size: .84rem; border: 1px solid #e5e7eb; border-radius: 8px;
    padding: 9px 12px; height: auto; background: #fafafa; color: #374151; transition: border-color .2s;
}
.usr-filter .form-control:focus,
.usr-filter .form-select:focus { border-color: #0077B6; box-shadow: 0 0 0 3px rgba(0,119,182,.08); background: #fff; outline: none; }

/* ── Table ───────────────────────────────────────────────────────────── */
.usr-table th {
    font-size: .66rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; background: #fafafa;
    border-bottom: 1px solid #f0f0f0; padding: 10px 16px;
}
.usr-table td { padding: 13px 16px; vertical-align: middle; border-bottom: 1px solid #f8f8f8; font-size: .85rem; }
.usr-table tbody tr:last-child td { border-bottom: none; }
.usr-table tbody tr:hover td { background: #fafcff; transition: background .1s; }
.usr-table tbody tr.deactivated td { opacity: .6; }

/* ── Avatar ──────────────────────────────────────────────────────────── */
.usr-avatar {
    width: 36px; height: 36px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: .8rem; font-weight: 800; color: #fff; flex-shrink: 0;
}

/* ── Role + status pills ─────────────────────────────────────────────── */
.usr-pill {
    font-size: .68rem; font-weight: 700; border-radius: 20px;
    padding: 3px 10px; display: inline-block; white-space: nowrap;
}

/* ── Dropdown ────────────────────────────────────────────────────────── */
.usr-dropdown {
    border-radius: 12px !important; border: 1px solid #f0f0f0 !important;
    box-shadow: 0 4px 20px rgba(0,0,0,.1) !important; font-size: .82rem;
    min-width: 170px;
}
</style>
@endpush

@section('content')

{{-- ── Page Header ─────────────────────────────────────────────────────── --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-users-cog me-2" style="color:#0077B6;font-size:1.1rem;"></i>Users &amp; Access
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Manage portal users, roles and account status</p>
    </div>
    <a href="{{ route('admin.users.create') }}"
       class="btn btn-sm rounded-pill px-3 text-white" style="background:#0077B6;">
        <i class="fas fa-user-plus me-1"></i>Add User
    </a>
</div>

{{-- ── Flash Messages ───────────────────────────────────────────────────── --}}
@if(session('success'))
<div style="background:#f0fdf4;border:1px solid #86efac;border-radius:12px;padding:13px 18px;font-size:.84rem;color:#16a34a;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif
@if(session('error'))
<div style="background:#fee2e2;border:1px solid #fca5a5;border-radius:12px;padding:13px 18px;font-size:.84rem;color:#ef4444;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
</div>
@endif

{{-- ── Stat Cards ───────────────────────────────────────────────────────── --}}
@php
    $newThis  = $stats['new_this_month'];
    $newLast  = $stats['new_last_month'];
    if ($newLast > 0) {
        $growthPct = round((($newThis - $newLast) / $newLast) * 100);
    } elseif ($newThis > 0) {
        $growthPct = 100;
    } else {
        $growthPct = 0;
    }
    $growthUp = $growthPct >= 0;
@endphp

<div class="row g-4 mb-4">
    {{-- Total Users --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-primary">{{ $stats['total'] }}</div>
                    <div class="label">Total Users</div>
                </div>
                <div class="icon bg-primary bg-opacity-10 text-primary">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="mt-2 small">
                <span class="{{ $growthUp ? 'text-success' : 'text-danger' }}">
                    <i class="fas fa-arrow-{{ $growthUp ? 'up' : 'down' }} me-1"></i>{{ abs($growthPct) }}%
                </span>
                <span class="text-muted">vs last month</span>
            </div>
        </div>
    </div>

    {{-- Admins --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-danger">{{ $stats['admins'] }}</div>
                    <div class="label">Admins</div>
                </div>
                <div class="icon bg-danger bg-opacity-10 text-danger">
                    <i class="fas fa-user-shield"></i>
                </div>
            </div>
            <div class="mt-2 small text-muted">
                {{ $stats['active'] }} active · {{ $stats['inactive'] }} deactivated
            </div>
        </div>
    </div>

    {{-- Teachers --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value" style="color:#0097a7;">{{ $stats['teachers'] }}</div>
                    <div class="label">Teachers</div>
                </div>
                <div class="icon" style="background:#e0f7fa;color:#0097a7;">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
            </div>
            <div class="mt-2 small text-muted">{{ $newThis }} new user{{ $newThis !== 1 ? 's' : '' }} this month</div>
        </div>
    </div>

    {{-- Families --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-success">{{ $stats['families'] }}</div>
                    <div class="label">Parents &amp; Children</div>
                </div>
                <div class="icon bg-success bg-opacity-10 text-success">
                    <i class="fas fa-heart"></i>
                </div>
            </div>
            <div class="mt-2 small text-muted">{{ $stats['parents'] }} parents · {{ $stats['children'] }} children</div>
        </div>
    </div>
</div>

{{-- ── Filter Panel ─────────────────────────────────────────────────────── --}}
<div class="usr-panel">
    <div class="usr-panel-header">
        <h6><i class="fas fa-filter me-2" style="color:#94a3b8;"></i>Filter Users</h6>
        @if(request()->hasAny(['role','status','search']))
            <a href="{{ route('admin.users.index') }}"
               class="btn btn-sm rounded-pill px-3" style="background:#fee2e2;color:#ef4444;border:none;font-size:.75rem;">
                <i class="fas fa-times me-1"></i>Clear
            </a>
        @endif
    </div>
    <div class="usr-filter">
        <form method="GET" action="{{ route('admin.users.index') }}">
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select">
                        <option value="">All Roles</option>
                        <option value="admin"      {{ request('role') === 'admin'      ? 'selected' : '' }}>Admin</option>
                        <option value="teacher"    {{ request('role') === 'teacher'    ? 'selected' : '' }}>Teacher</option>
                        <option value="parent"     {{ request('role') === 'parent'     ? 'selected' : '' }}>Parent</option>
                        <option value="child"      {{ request('role') === 'child'      ? 'selected' : '' }}>Child</option>
                        <option value="super_admin"{{ request('role') === 'super_admin'? 'selected' : '' }}>Super Admin</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="">All Statuses</option>
                        <option value="active"      {{ request('status') === 'active'      ? 'selected' : '' }}>Active</option>
                        <option value="deactivated" {{ request('status') === 'deactivated' ? 'selected' : '' }}>Deactivated</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Search</label>
                    <input type="text" name="search" class="form-control"
                           placeholder="Name or email…" value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-sm w-100 rounded-pill text-white" style="background:#0077B6;padding:9px;">
                        <i class="fas fa-search me-1"></i>Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- ── Users Table ──────────────────────────────────────────────────────── --}}
@php
    $roleMap = [
        'super_admin' => ['bg'=>'#1a1f2e','color'=>'#fff',     'label'=>'Super Admin'],
        'admin'       => ['bg'=>'#fee2e2','color'=>'#ef4444',  'label'=>'Admin'],
        'teacher'     => ['bg'=>'#e0f7fa','color'=>'#0097a7',  'label'=>'Teacher'],
        'parent'      => ['bg'=>'#dcfce7','color'=>'#16a34a',  'label'=>'Parent'],
        'child'       => ['bg'=>'#fef3c7','color'=>'#d97706',  'label'=>'Child'],
    ];
    $avatarColors = [
        'super_admin' => '#1a1f2e',
        'admin'       => '#ef4444',
        'teacher'     => '#0097a7',
        'parent'      => '#16a34a',
        'child'       => '#d97706',
    ];
@endphp
<div class="usr-panel">
    <div class="table-responsive">
        <table class="table usr-table mb-0">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Role</th>
                    <th>Phone</th>
                    <th>Joined</th>
                    <th>Status</th>
                    <th style="width:50px;"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                @php
                    $role = $user->getRoleNames()->first() ?? 'parent';
                    $rm   = $roleMap[$role] ?? ['bg'=>'#f3f4f6','color'=>'#6c757d','label'=>ucfirst($role)];
                    $avatarBg = $avatarColors[$role] ?? '#6c757d';
                @endphp
                <tr class="{{ $user->trashed() ? 'deactivated' : '' }}">
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <div class="usr-avatar" style="background:{{ $avatarBg }};">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="fw-semibold" style="color:#1a1f2e;">{{ $user->name }}</div>
                                <div style="font-size:.74rem;color:#adb5bd;">{{ $user->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="usr-pill" style="background:{{ $rm['bg'] }};color:{{ $rm['color'] }};">
                            {{ $rm['label'] }}
                        </span>
                    </td>
                    <td style="color:#6c757d;font-size:.83rem;">{{ $user->phone ?? '—' }}</td>
                    <td style="color:#adb5bd;font-size:.8rem;">{{ $user->created_at->format('d M Y') }}</td>
                    <td>
                        @if($user->trashed())
                            <span class="usr-pill" style="background:#fee2e2;color:#ef4444;">Deactivated</span>
                        @else
                            <span class="usr-pill" style="background:#dcfce7;color:#16a34a;">Active</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm py-1 px-2"
                                    style="background:#f3f4f6;border:1px solid #e5e7eb;color:#6c757d;"
                                    data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end usr-dropdown">
                                @if(!$user->trashed())
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.users.edit', $user) }}"
                                           style="color:#3b82f6;">
                                            <i class="fas fa-edit me-2"></i>Edit
                                        </a>
                                    </li>
                                    @if($user->id !== auth()->id())
                                        <li><hr class="dropdown-divider my-1"></li>
                                        <li>
                                            <a class="dropdown-item" href="#" style="color:#d97706;"
                                               onclick="confirmAction('deactivate-{{ $user->id }}','Deactivate {{ addslashes($user->name) }}?','This will deactivate their account and prevent login.')">
                                                <i class="fas fa-user-slash me-2"></i>Deactivate
                                            </a>
                                            <form id="deactivate-{{ $user->id }}" method="POST"
                                                  action="{{ route('admin.users.destroy', $user) }}" class="d-none">
                                                @csrf @method('DELETE')
                                            </form>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" style="color:#ef4444;"
                                               onclick="confirmAction('force-delete-{{ $user->id }}','Permanently delete {{ addslashes($user->name) }}?','This action cannot be undone.')">
                                                <i class="fas fa-trash me-2"></i>Delete Permanently
                                            </a>
                                            <form id="force-delete-{{ $user->id }}" method="POST"
                                                  action="{{ route('admin.users.force-delete', $user->id) }}" class="d-none">
                                                @csrf @method('DELETE')
                                            </form>
                                        </li>
                                    @endif
                                @else
                                    <li>
                                        <a class="dropdown-item" href="#" style="color:#16a34a;"
                                           onclick="confirmAction('restore-{{ $user->id }}','Restore {{ addslashes($user->name) }}?','This will re-activate their account.')">
                                            <i class="fas fa-undo me-2"></i>Restore
                                        </a>
                                        <form id="restore-{{ $user->id }}" method="POST"
                                              action="{{ route('admin.users.restore', $user->id) }}" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <a class="dropdown-item" href="#" style="color:#ef4444;"
                                           onclick="confirmAction('force-delete-{{ $user->id }}','Permanently delete {{ addslashes($user->name) }}?','This action cannot be undone.')">
                                            <i class="fas fa-trash me-2"></i>Delete Permanently
                                        </a>
                                        <form id="force-delete-{{ $user->id }}" method="POST"
                                              action="{{ route('admin.users.force-delete', $user->id) }}" class="d-none">
                                            @csrf @method('DELETE')
                                        </form>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <div style="font-size:2rem;margin-bottom:10px;">👥</div>
                        <div class="fw-semibold" style="color:#1a1f2e;font-size:.9rem;">No users found</div>
                        <div style="font-size:.8rem;color:#adb5bd;margin-top:4px;">Try adjusting your filters</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($users->hasPages())
    <div class="p-4" style="border-top:1px solid #f3f4f6;">
        {{ $users->links() }}
    </div>
    @endif
</div>

{{-- ── Confirm Modal ────────────────────────────────────────────────────── --}}
<div class="modal fade" id="confirmModal" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content" style="border:none;border-radius:16px;overflow:hidden;">
            <div class="modal-body text-center" style="padding:28px 24px 20px;">
                <div style="width:48px;height:48px;border-radius:50%;background:#fee2e2;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;">
                    <i class="fas fa-exclamation-triangle" style="color:#ef4444;font-size:1.1rem;"></i>
                </div>
                <div class="fw-bold mb-2" id="confirmTitle" style="font-size:.95rem;color:#1a1f2e;">Are you sure?</div>
                <p class="mb-4" id="confirmBody" style="font-size:.82rem;color:#6c757d;"></p>
                <div class="d-flex gap-2 justify-content-center">
                    <button class="btn btn-sm rounded-pill px-3 btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-sm rounded-pill px-3" id="confirmBtn"
                            style="background:#ef4444;color:#fff;border:none;">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    let pendingFormId = null;
    const modal = new bootstrap.Modal(document.getElementById('confirmModal'));

    function confirmAction(formId, title, body) {
        pendingFormId = formId;
        document.getElementById('confirmTitle').textContent = title;
        document.getElementById('confirmBody').textContent = body;
        modal.show();
    }

    document.getElementById('confirmBtn').addEventListener('click', function () {
        if (pendingFormId) document.getElementById(pendingFormId).submit();
    });
</script>
@endpush
