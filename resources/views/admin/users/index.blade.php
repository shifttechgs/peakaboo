@extends('layouts.admin')

@section('title', 'Users & Access')

@section('content')
<div class="page-title d-flex justify-content-between align-items-start">
    <div>
        <h1>Users & Access</h1>
        <p>Manage all portal users, roles, and account status.</p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="btn btn-admin btn-admin-primary">
        <i class="fas fa-user-plus me-2"></i> Add User
    </a>
</div>

{{-- Flash Messages --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- Stats Row --}}
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center gap-3">
                <div class="icon" style="background:#e3f2fd;">
                    <i class="fas fa-users" style="color:#0077B6;"></i>
                </div>
                <div>
                    <div class="value">{{ $stats['total'] }}</div>
                    <div class="label">Total Users</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center gap-3">
                <div class="icon" style="background:#fde8e8;">
                    <i class="fas fa-user-shield" style="color:#dc3545;"></i>
                </div>
                <div>
                    <div class="value">{{ $stats['admins'] }}</div>
                    <div class="label">Admins</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center gap-3">
                <div class="icon" style="background:#e3f2fd;">
                    <i class="fas fa-chalkboard-teacher" style="color:#0077B6;"></i>
                </div>
                <div>
                    <div class="value">{{ $stats['teachers'] }}</div>
                    <div class="label">Teachers</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center gap-3">
                <div class="icon" style="background:#e8f5e9;">
                    <i class="fas fa-heart" style="color:#28a745;"></i>
                </div>
                <div>
                    <div class="value">{{ $stats['families'] }}</div>
                    <div class="label">Parents & Children</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Filter Bar --}}
<div class="admin-table mb-4 p-3">
    <form method="GET" action="{{ route('admin.users.index') }}" class="row g-3 align-items-end">
        <div class="col-md-3">
            <label class="form-label small fw-semibold text-muted">Role</label>
            <select name="role" class="form-select form-select-sm">
                <option value="">All Roles</option>
                <option value="admin"   {{ request('role') === 'admin'   ? 'selected' : '' }}>Admin</option>
                <option value="teacher" {{ request('role') === 'teacher' ? 'selected' : '' }}>Teacher</option>
                <option value="parent"  {{ request('role') === 'parent'  ? 'selected' : '' }}>Parent</option>
                <option value="child"   {{ request('role') === 'child'   ? 'selected' : '' }}>Child</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label small fw-semibold text-muted">Status</label>
            <select name="status" class="form-select form-select-sm">
                <option value="">All Status</option>
                <option value="active"      {{ request('status') === 'active'      ? 'selected' : '' }}>Active</option>
                <option value="deactivated" {{ request('status') === 'deactivated' ? 'selected' : '' }}>Deactivated</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label small fw-semibold text-muted">Search</label>
            <input type="text" name="search" class="form-control form-control-sm"
                   placeholder="Name or email…" value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-admin btn-admin-primary w-100" style="padding: 7px 12px;">
                <i class="fas fa-search me-1"></i> Apply
            </button>
        </div>
    </form>
</div>

{{-- Users Table --}}
<div class="admin-table">
    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Role</th>
                <th>Phone</th>
                <th>Joined</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr class="{{ $user->trashed() ? 'table-secondary' : '' }}">
                <td>
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold flex-shrink-0"
                             style="width:38px;height:38px;font-size:14px;background:{{ ['admin'=>'#dc3545','teacher'=>'#0077B6','parent'=>'#28a745','child'=>'#ffc107'][$user->getRoleNames()->first() ?? 'parent'] ?? '#6c757d' }};">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="fw-semibold">{{ $user->name }}</div>
                            <small class="text-muted">{{ $user->email }}</small>
                        </div>
                    </div>
                </td>
                <td>
                    @php $role = $user->getRoleNames()->first() @endphp
                    @if($role === 'admin')
                        <span class="badge bg-danger">Admin</span>
                    @elseif($role === 'teacher')
                        <span class="badge bg-primary">Teacher</span>
                    @elseif($role === 'parent')
                        <span class="badge bg-success">Parent</span>
                    @elseif($role === 'child')
                        <span class="badge bg-warning text-dark">Child</span>
                    @elseif($role === 'super_admin')
                        <span class="badge bg-dark">Super Admin</span>
                    @else
                        <span class="badge bg-secondary">—</span>
                    @endif
                </td>
                <td>{{ $user->phone ?? '—' }}</td>
                <td>{{ $user->created_at->format('d M Y') }}</td>
                <td>
                    @if($user->trashed())
                        <span class="status-badge" style="background:#f8d7da;color:#721c24;">Deactivated</span>
                    @else
                        <span class="status-badge" style="background:#d4edda;color:#155724;">Active</span>
                    @endif
                </td>
                <td class="text-end">
                    <div class="dropdown">
                        <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if(!$user->trashed())
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.users.edit', $user) }}">
                                        <i class="fas fa-edit me-2 text-primary"></i> Edit
                                    </a>
                                </li>
                                @if($user->id !== auth()->id())
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item text-warning" href="#"
                                           onclick="confirmAction('deactivate-{{ $user->id }}', 'Deactivate {{ addslashes($user->name) }}?', 'This will deactivate their account. They won\'t be able to log in.')">
                                            <i class="fas fa-user-slash me-2"></i> Deactivate
                                        </a>
                                        <form id="deactivate-{{ $user->id }}" method="POST"
                                              action="{{ route('admin.users.destroy', $user) }}" class="d-none">
                                            @csrf @method('DELETE')
                                        </form>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="#"
                                           onclick="confirmAction('force-delete-{{ $user->id }}', 'Permanently delete {{ addslashes($user->name) }}?', 'This action cannot be undone.')">
                                            <i class="fas fa-trash me-2"></i> Delete Permanently
                                        </a>
                                        <form id="force-delete-{{ $user->id }}" method="POST"
                                              action="{{ route('admin.users.force-delete', $user->id) }}" class="d-none">
                                            @csrf @method('DELETE')
                                        </form>
                                    </li>
                                @endif
                            @else
                                <li>
                                    <a class="dropdown-item text-success" href="#"
                                       onclick="confirmAction('restore-{{ $user->id }}', 'Restore {{ addslashes($user->name) }}?', 'This will re-activate their account.')">
                                        <i class="fas fa-undo me-2"></i> Restore
                                    </a>
                                    <form id="restore-{{ $user->id }}" method="POST"
                                          action="{{ route('admin.users.restore', $user->id) }}" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger" href="#"
                                       onclick="confirmAction('force-delete-{{ $user->id }}', 'Permanently delete {{ addslashes($user->name) }}?', 'This action cannot be undone.')">
                                        <i class="fas fa-trash me-2"></i> Delete Permanently
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
                <td colspan="6" class="text-center py-5 text-muted">
                    <i class="fas fa-users fa-2x mb-3 d-block"></i>
                    No users found matching your filters.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if($users->hasPages())
    <div class="px-4 py-3 border-top">
        {{ $users->links() }}
    </div>
    @endif
</div>

{{-- Confirmation Modal --}}
<div class="modal fade" id="confirmModal" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <i class="fas fa-exclamation-triangle fa-2x text-warning mb-3"></i>
                <h6 class="fw-bold" id="confirmTitle">Are you sure?</h6>
                <p class="text-muted small mb-4" id="confirmBody"></p>
                <div class="d-flex gap-2 justify-content-center">
                    <button class="btn btn-sm btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-sm btn-danger" id="confirmBtn">Confirm</button>
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
        if (pendingFormId) {
            document.getElementById(pendingFormId).submit();
        }
    });
</script>
@endpush
