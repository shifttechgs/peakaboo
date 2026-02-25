@extends('layouts.admin')

@section('title', 'Lead — ' . $lead->reference)

@section('content')
<div class="page-title d-flex justify-content-between align-items-center">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1" style="font-size:0.82rem;">
                <li class="breadcrumb-item"><a href="{{ route('admin.crm.index') }}">CRM</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.crm.leads') }}">Leads</a></li>
                <li class="breadcrumb-item active">{{ $lead->reference }}</li>
            </ol>
        </nav>
        <h1>{{ $lead->name }}</h1>
        <p><code>{{ $lead->reference }}</code> &bull; Submitted {{ $lead->created_at->format('d M Y H:i') }}</p>
    </div>
    <a href="{{ route('admin.crm.leads') }}" class="btn btn-outline-secondary btn-sm">
        <i class="fas fa-arrow-left me-1"></i> Back to Leads
    </a>
</div>

<div class="row g-4">

    {{-- Left: Lead Info --}}
    <div class="col-lg-7">
        <div class="admin-table p-4 mb-4">
            <h6 class="fw-bold text-uppercase text-muted mb-3" style="font-size:0.75rem;letter-spacing:1px;">Lead Information</h6>

            <div class="row g-3">
                <div class="col-sm-6">
                    <label class="small text-muted">Full Name</label>
                    <div class="fw-semibold">{{ $lead->name }}</div>
                </div>
                <div class="col-sm-6">
                    <label class="small text-muted">Email</label>
                    <div>
                        <a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="small text-muted">Phone</label>
                    <div class="d-flex align-items-center gap-2">
                        <a href="tel:{{ $lead->phone }}">{{ $lead->phone }}</a>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->phone) }}"
                           target="_blank" class="btn btn-sm btn-success py-0 px-2" style="font-size:0.75rem;">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="small text-muted">Source</label>
                    <div>
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
                            <span class="text-muted">Not specified</span>
                        @endif
                    </div>
                </div>
            </div>

            <hr class="my-3">

            <h6 class="fw-bold text-uppercase text-muted mb-3" style="font-size:0.75rem;letter-spacing:1px;">Child Details</h6>
            <div class="row g-3">
                <div class="col-sm-6">
                    <label class="small text-muted">Child's Name</label>
                    <div class="fw-semibold">{{ $lead->child_name }}</div>
                </div>
                @if($lead->child_nickname)
                <div class="col-sm-6">
                    <label class="small text-muted">Nickname</label>
                    <div>{{ $lead->child_nickname }}</div>
                </div>
                @endif
                <div class="col-sm-6">
                    <label class="small text-muted">Age Group</label>
                    <div><span class="badge bg-light text-dark">{{ $lead->child_age }}</span></div>
                </div>
            </div>

            <hr class="my-3">

            <h6 class="fw-bold text-uppercase text-muted mb-3" style="font-size:0.75rem;letter-spacing:1px;">Tour Preference</h6>
            <div class="row g-3">
                <div class="col-sm-6">
                    <label class="small text-muted">Preferred Date</label>
                    <div class="fw-semibold">{{ $lead->preferred_date->format('l, d F Y') }}</div>
                </div>
                <div class="col-sm-6">
                    <label class="small text-muted">Preferred Time</label>
                    <div class="fw-semibold">{{ $lead->preferred_time }}</div>
                </div>
                <div class="col-sm-6">
                    <label class="small text-muted">Days Since Submitted</label>
                    @php $daysOld = (int) $lead->created_at->diffInDays(now()); @endphp
                    <div class="{{ $lead->isOverdue() ? 'text-danger fw-bold' : '' }}">
                        {{ $daysOld === 0 ? 'Today' : $daysOld . ($daysOld === 1 ? ' day' : ' days') . ' ago' }}
                        @if($lead->isOverdue()) <span class="badge bg-danger ms-1">Overdue</span> @endif
                    </div>
                </div>
            </div>

            @if($lead->message)
            <hr class="my-3">
            <label class="small text-muted">Message from Lead</label>
            <div class="bg-light rounded p-3 mt-1" style="font-size:0.9rem;">{{ $lead->message }}</div>
            @endif

            @if($lead->notes)
            <hr class="my-3">
            <label class="small text-muted">Internal Notes</label>
            <div class="bg-warning bg-opacity-10 border border-warning border-opacity-25 rounded p-3 mt-1" style="font-size:0.9rem;">
                {{ $lead->notes }}
            </div>
            @endif
        </div>
    </div>

    {{-- Right: Action Panels --}}
    <div class="col-lg-5">

        {{-- Status Panel --}}
        <div class="admin-table p-4 mb-3">
            <h6 class="fw-bold mb-3">
                <i class="fas fa-tag me-2 text-primary"></i>Update Status
            </h6>
            <form method="POST" action="{{ route('admin.crm.leads.status', $lead->id) }}">
                @csrf
                <div class="mb-3">
                    <select name="status" class="form-select">
                        @foreach(\App\Models\Lead::STATUSES as $s)
                            <option value="{{ $s }}" {{ $lead->status === $s ? 'selected' : '' }}>
                                {{ ucwords(str_replace('_', ' ', $s)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-admin btn-admin-primary w-100">
                    Update Status
                </button>
            </form>
        </div>

        {{-- Tour Confirmation Panel --}}
        @if(in_array($lead->status, ['contacted', 'new', 'tour_scheduled']))
        <div class="admin-table p-4 mb-3" style="border-left: 3px solid #17a2b8;">
            <h6 class="fw-bold mb-2">
                <i class="fas fa-calendar-check me-2 text-info"></i>Tour Actions
            </h6>
            <p class="small text-muted mb-3">
                Send a tour confirmation email to {{ $lead->name }} and update status to <strong>Tour Scheduled</strong>.
            </p>
            <form method="POST" action="{{ route('admin.crm.leads.notify-tour', $lead->id) }}">
                @csrf
                <button type="submit" class="btn btn-info text-white w-100"
                        onclick="return confirm('Send tour confirmation email to {{ $lead->email }}?')">
                    <i class="fas fa-paper-plane me-2"></i>Send Tour Confirmation
                </button>
            </form>
        </div>
        @endif

        {{-- Post-Tour Actions Panel --}}
        @if($lead->status === 'tour_completed')
        <div class="admin-table p-4 mb-3" style="border-left: 3px solid #28a745;">
            <h6 class="fw-bold mb-2">
                <i class="fas fa-graduation-cap me-2 text-success"></i>Post-Tour Actions
            </h6>
            <p class="small text-muted mb-3">Tour is complete — what's the next step for {{ $lead->child_name }}?</p>

            <form method="POST" action="{{ route('admin.crm.leads.start-enrol', $lead->id) }}" class="mb-2">
                @csrf
                <button type="submit" class="btn btn-success w-100"
                        onclick="return confirm('Send enrolment invitation to {{ $lead->email }}?')">
                    <i class="fas fa-user-plus me-2"></i>Start Enrolment
                    <small class="d-block opacity-75" style="font-size:0.72rem;">Emails enrolment form link</small>
                </button>
            </form>

            <form method="POST" action="{{ route('admin.crm.leads.waitlist', $lead->id) }}">
                @csrf
                <button type="submit" class="btn btn-warning w-100">
                    <i class="fas fa-clock me-2"></i>Add to Waitlist
                </button>
            </form>
        </div>
        @endif

        {{-- Internal Notes Panel --}}
        <div class="admin-table p-4 mb-3">
            <h6 class="fw-bold mb-3">
                <i class="fas fa-sticky-note me-2 text-warning"></i>Internal Notes
            </h6>
            <form method="POST" action="{{ route('admin.crm.leads.notes', $lead->id) }}">
                @csrf
                <div class="mb-3">
                    <textarea name="notes" class="form-control" rows="4"
                              placeholder="Add internal notes about this lead…">{{ old('notes', $lead->notes) }}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-warning w-100">
                    <i class="fas fa-save me-2"></i>Save Notes
                </button>
            </form>
        </div>

        {{-- Tasks Panel --}}
        <div class="admin-table p-4">
            <h6 class="fw-bold mb-3">
                <i class="fas fa-tasks me-2 text-secondary"></i>Tasks
                @if($tasks->where('completed', false)->count() > 0)
                    <span class="badge bg-warning ms-1">{{ $tasks->where('completed', false)->count() }}</span>
                @endif
            </h6>

            {{-- Quick-add task --}}
            <form method="POST" action="{{ route('admin.tasks.store') }}" class="mb-3">
                @csrf
                <input type="hidden" name="lead_id" value="{{ $lead->id }}">
                <div class="row g-2">
                    <div class="col-8">
                        <input type="text" name="title" class="form-control form-control-sm"
                               placeholder="Add a task…" required>
                    </div>
                    <div class="col-4">
                        <input type="date" name="due_date" class="form-control form-control-sm">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-sm btn-outline-secondary w-100">
                            <i class="fas fa-plus me-1"></i> Add Task
                        </button>
                    </div>
                </div>
            </form>

            @forelse($tasks as $task)
            <div class="d-flex align-items-start gap-2 py-2 {{ !$loop->last ? 'border-bottom' : '' }}
                        {{ $task->isOverdue() ? 'text-danger' : '' }}">
                <form method="POST" action="{{ route('admin.tasks.toggle', $task->id) }}" class="pt-1">
                    @csrf @method('PATCH')
                    <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent"
                            style="line-height:1;">
                        <i class="fas fa-{{ $task->completed ? 'check-circle text-success' : 'circle text-muted' }}"></i>
                    </button>
                </form>
                <div class="flex-grow-1 small">
                    <span class="{{ $task->completed ? 'text-decoration-line-through text-muted' : '' }}">
                        {{ $task->title }}
                    </span>
                    @if($task->due_date)
                        <span class="d-block {{ $task->isOverdue() ? 'text-danger' : 'text-muted' }}" style="font-size:0.75rem;">
                            {{ $task->due_date->format('d M Y') }}
                        </span>
                    @endif
                </div>
                <form method="POST" action="{{ route('admin.tasks.destroy', $task->id) }}">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent text-muted"
                            onclick="return confirm('Delete this task?')" style="line-height:1;">
                        <i class="fas fa-times"></i>
                    </button>
                </form>
            </div>
            @empty
            <p class="text-muted small text-center py-2">No tasks yet.</p>
            @endforelse
        </div>

    </div>
</div>
@endsection
