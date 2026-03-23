@extends('layouts.admin')

@section('title', 'Parents & Families')

@push('styles')
<style>
.p-pill {
    font-size: .68rem; font-weight: 700; border-radius: 20px;
    padding: 3px 10px; display: inline-block; white-space: nowrap;
}
.pnl {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 20px;
}
.pnl-header {
    padding: 16px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.pnl-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }
.p-filter { padding: 20px 22px; }
.p-filter .form-label { font-size: .68rem; font-weight: 700; text-transform: uppercase; letter-spacing: .4px; color: #94a3b8; margin-bottom: 5px; }
.p-filter .form-control,
.p-filter .form-select {
    font-size: .84rem; border: 1px solid #e5e7eb; border-radius: 8px;
    padding: 9px 12px; height: auto; background: #fafafa; color: #374151; transition: border-color .2s;
}
.p-filter .form-control:focus,
.p-filter .form-select:focus { border-color: #0077B6; box-shadow: 0 0 0 3px rgba(0,119,182,.08); background: #fff; outline: none; }
.p-table th {
    font-size: .66rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; background: #fafafa;
    border-bottom: 1px solid #f0f0f0; padding: 10px 16px;
}
.p-table td { padding: 13px 16px; vertical-align: middle; border-bottom: 1px solid #f8f8f8; font-size: .85rem; }
.p-table tbody tr:last-child td { border-bottom: none; }
.p-table tbody tr:hover td { background: #fafcff; }
.p-avatar {
    width: 36px; height: 36px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: .8rem; font-weight: 800; color: #fff; flex-shrink: 0;
    background: #0077B6;
}
</style>
@endpush

@section('content')

{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-users me-2" style="color:#16a34a;font-size:1.1rem;"></i>Parents &amp; Families
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Manage enrolled families and parent accounts</p>
    </div>
    <a href="{{ route('admin.parents.children') }}"
       class="btn btn-sm rounded-pill px-3" style="background:#16a34a;color:#fff;">
        <i class="fas fa-child me-1"></i>View Children
    </a>
</div>

{{-- Flash --}}
@if(session('success'))
<div style="background:#f0fdf4;border:1px solid #86efac;border-radius:12px;padding:13px 18px;font-size:.84rem;color:#16a34a;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

{{-- Stats --}}
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-primary">{{ $stats['total_parents'] }}</div>
                    <div class="label">Total Parents</div>
                </div>
                <div class="icon bg-primary bg-opacity-10 text-primary"><i class="fas fa-user-friends"></i></div>
            </div>
            <div class="mt-2 small text-muted">{{ $stats['active_parents'] }} active accounts</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-success">{{ $stats['total_children'] }}</div>
                    <div class="label">Children</div>
                </div>
                <div class="icon bg-success bg-opacity-10 text-success"><i class="fas fa-child"></i></div>
            </div>
            <div class="mt-2 small text-muted">Across all programmes</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value" style="color:#0097a7;">{{ $stats['total_apps'] }}</div>
                    <div class="label">Approved Enrolments</div>
                </div>
                <div class="icon" style="background:#e0f7fa;color:#0097a7;"><i class="fas fa-clipboard-check"></i></div>
            </div>
            <div class="mt-2 small text-muted">Completed applications</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-danger">{{ $stats['total_parents'] - $stats['active_parents'] }}</div>
                    <div class="label">Inactive Accounts</div>
                </div>
                <div class="icon bg-danger bg-opacity-10 text-danger"><i class="fas fa-user-slash"></i></div>
            </div>
            <div class="mt-2 small text-muted">Deactivated parents</div>
        </div>
    </div>
</div>

{{-- Filter --}}
<div class="pnl">
    <div class="pnl-header">
        <h6><i class="fas fa-filter me-2" style="color:#94a3b8;"></i>Filter Parents</h6>
        @if(request()->hasAny(['search','status']))
            <a href="{{ route('admin.parents.index') }}"
               class="btn btn-sm rounded-pill px-3" style="background:#fee2e2;color:#ef4444;border:none;font-size:.75rem;">
                <i class="fas fa-times me-1"></i>Clear
            </a>
        @endif
    </div>
    <div class="p-filter">
        <form method="GET" action="{{ route('admin.parents.index') }}">
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
                        <option value="active"   {{ request('status') === 'active'   ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
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
<div class="pnl">
    <div class="pnl-header">
        <h6><i class="fas fa-list me-2" style="color:#94a3b8;"></i>
            Parents
            <span class="ms-2 rounded-pill px-2 py-1" style="background:#e0f7fa;color:#0097a7;font-size:.72rem;font-weight:700;vertical-align:middle;">
                {{ $parents->total() }}
            </span>
        </h6>
    </div>
    <div class="table-responsive">
        <table class="table p-table mb-0">
            <thead>
                <tr>
                    <th>Parent</th>
                    <th>Contact</th>
                    <th>Applications</th>
                    <th>Status</th>
                    <th>Joined</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($parents as $parent)
                @php
                    $initial  = strtoupper(substr($parent->name, 0, 1));
                    $isActive = !$parent->trashed();
                    $appCount = $parent->applications->count();
                @endphp
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-avatar">{{ $initial }}</div>
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
                            <span class="p-pill" style="background:#e0f7fa;color:#0097a7;">
                                <i class="fas fa-file-alt me-1"></i>{{ $appCount }}
                            </span>
                        @else
                            <span style="color:#d1d5db;font-size:.78rem;">None</span>
                        @endif
                    </td>
                    <td>
                        @if($isActive)
                            <span class="p-pill" style="background:#dcfce7;color:#16a34a;">Active</span>
                        @else
                            <span class="p-pill" style="background:#fee2e2;color:#ef4444;">Deactivated</span>
                        @endif
                    </td>
                    <td style="font-size:.8rem;color:#94a3b8;">
                        {{ $parent->created_at->format('d M Y') }}
                    </td>
                    <td class="text-end">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('admin.parents.show', $parent->id) }}"
                               class="btn btn-sm rounded-pill px-3"
                               style="background:#eff6ff;color:#3b82f6;border:1px solid #bfdbfe;font-size:.76rem;">
                                <i class="fas fa-eye me-1"></i>View
                            </a>
                            @if($parent->email)
                            <a href="mailto:{{ $parent->email }}"
                               class="btn btn-sm rounded-pill px-2"
                               style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;font-size:.76rem;"
                               title="Email parent">
                                <i class="fas fa-envelope"></i>
                            </a>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <i class="fas fa-user-friends fa-3x text-muted opacity-25 mb-3 d-block"></i>
                        <p class="text-muted mb-0">No parents found.</p>
                        @if(request()->hasAny(['search','status']))
                            <a href="{{ route('admin.parents.index') }}" class="btn btn-sm btn-outline-secondary mt-2">Clear filters</a>
                        @endif
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($parents->hasPages())
    <div class="px-4 py-3 border-top">
        {{ $parents->links() }}
    </div>
    @endif
</div>

@endsection

