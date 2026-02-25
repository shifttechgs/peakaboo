@extends('layouts.admin')

@section('title', 'All Leads')

@section('content')
<div class="page-title d-flex justify-content-between align-items-center">
    <div>
        <h1>All Leads</h1>
        <p>{{ $leads->total() }} lead{{ $leads->total() !== 1 ? 's' : '' }} found</p>
    </div>
    <a href="{{ route('admin.crm.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="fas fa-chart-bar me-1"></i> Dashboard
    </a>
</div>

{{-- Filter Bar --}}
<div class="admin-table mb-4">
    <div class="p-4">
        <form method="GET" action="{{ route('admin.crm.leads') }}">
            <div class="row g-3 align-items-end">
                <div class="col-md-2">
                    <label class="form-label small fw-semibold">Status</label>
                    <select name="status" class="form-select form-select-sm">
                        <option value="">All Statuses</option>
                        @foreach(\App\Models\Lead::STATUSES as $s)
                            <option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>
                                {{ ucwords(str_replace('_', ' ', $s)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-semibold">Source</label>
                    <select name="source" class="form-select form-select-sm">
                        <option value="">All Sources</option>
                        @foreach(['google','facebook','instagram','referral','other'] as $src)
                            <option value="{{ $src }}" {{ request('source') === $src ? 'selected' : '' }}>
                                {{ ucfirst($src) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-semibold">Age Group</label>
                    <select name="child_age" class="form-select form-select-sm">
                        <option value="">All Ages</option>
                        @foreach(['0-1 years','1-2 years','2-3 years','3-4 years','4-5 years','5-6 years'] as $age)
                            <option value="{{ $age }}" {{ request('child_age') === $age ? 'selected' : '' }}>
                                {{ $age }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Search</label>
                    <input type="text" name="search" class="form-control form-control-sm"
                           placeholder="Name, email, phone, reference…"
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-admin btn-admin-primary btn-sm flex-grow-1">
                        <i class="fas fa-search me-1"></i> Filter
                    </button>
                    @if(request()->hasAny(['status','source','child_age','search']))
                        <a href="{{ route('admin.crm.leads') }}" class="btn btn-outline-secondary btn-sm">✕</a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Leads Table --}}
<div class="admin-table">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Lead</th>
                    <th>Child</th>
                    <th>Tour Date</th>
                    <th>Source</th>
                    <th>Days Old</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leads as $lead)
                <tr class="{{ $lead->isOverdue() ? 'table-warning' : '' }}">
                    <td><code class="text-primary">{{ $lead->reference }}</code></td>
                    <td>
                        <div class="fw-semibold">{{ $lead->name }}</div>
                        <small><a href="mailto:{{ $lead->email }}" class="text-muted">{{ $lead->email }}</a></small><br>
                        <small class="text-muted">{{ $lead->phone }}</small>
                    </td>
                    <td>
                        <div>{{ $lead->child_name }}</div>
                        <span class="badge bg-light text-dark" style="font-size:0.7rem;">{{ $lead->child_age }}</span>
                    </td>
                    <td>
                        <div>{{ $lead->preferred_date->format('d M Y') }}</div>
                        <small class="text-muted">{{ $lead->preferred_time }}</small>
                    </td>
                    <td>
                        @if($lead->source)
                            @php
                                $sourceBadge = match($lead->source) {
                                    'google'    => 'bg-danger',
                                    'facebook'  => 'bg-primary',
                                    'instagram' => 'bg-warning text-dark',
                                    'referral'  => 'bg-success',
                                    default     => 'bg-secondary',
                                };
                            @endphp
                            <span class="badge {{ $sourceBadge }}">{{ ucfirst($lead->source) }}</span>
                        @else
                            <span class="text-muted small">—</span>
                        @endif
                    </td>
                    <td>
                        @php $daysOld = (int) $lead->created_at->diffInDays(now()); @endphp
                        <span class="{{ $lead->isOverdue() ? 'text-danger fw-bold' : 'text-muted' }}">
                            {{ $daysOld === 0 ? 'Today' : $daysOld . 'd' }}
                            @if($lead->isOverdue()) <i class="fas fa-exclamation-triangle ms-1"></i> @endif
                        </span>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.crm.leads.status', $lead->id) }}" class="d-inline">
                            @csrf
                            <select name="status" class="form-select form-select-sm"
                                    style="min-width:135px;" onchange="this.form.submit()">
                                @foreach(\App\Models\Lead::STATUSES as $s)
                                    <option value="{{ $s }}" {{ $lead->status === $s ? 'selected' : '' }}>
                                        {{ ucwords(str_replace('_', ' ', $s)) }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td>
                        <div class="d-flex gap-1 flex-wrap">
                            <a href="{{ route('admin.crm.leads.show', $lead->id) }}"
                               class="btn btn-sm btn-outline-primary">View</a>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->phone) }}"
                               target="_blank" class="btn btn-sm btn-outline-success"
                               title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                            <a href="mailto:{{ $lead->email }}"
                               class="btn btn-sm btn-outline-secondary"
                               title="Email"><i class="fas fa-envelope"></i></a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted py-5">
                        <i class="fas fa-search fa-2x mb-3 d-block"></i>
                        No leads found matching your filters.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($leads->hasPages())
    <div class="p-4 border-top">
        {{ $leads->links() }}
    </div>
    @endif
</div>
@endsection
