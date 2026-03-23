@extends('layouts.admin')

@section('title', 'Tasks')

@section('content')
<div class="page-title d-flex justify-content-between align-items-center">
    <div>
        <h1>Tasks</h1>
        <p>Admin to-do list — linked to leads where applicable</p>
    </div>
</div>

{{-- Stats Row --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="value text-dark">{{ $stats['total'] }}</div>
            <div class="label">Total</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="value text-info">{{ $stats['due_today'] }}</div>
            <div class="label">Due Today</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="value text-danger">{{ $stats['overdue'] }}</div>
            <div class="label">Overdue</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="value text-success">{{ $stats['completed'] }}</div>
            <div class="label">Completed</div>
        </div>
    </div>
</div>

{{-- Quick-Add Form --}}
<div class="admin-table p-4 mb-4">
    <h6 class="fw-bold mb-3"><i class="fas fa-plus-circle me-2 text-primary"></i>Add Task</h6>
    <form method="POST" action="{{ route('admin.tasks.store') }}">
        @csrf
        <div class="row g-3 align-items-end">
            <div class="col-md-5">
                <input type="text" name="title" class="form-control" placeholder="Task title…" required
                       value="{{ old('title') }}">
            </div>
            <div class="col-md-2">
                <input type="date" name="due_date" class="form-control" value="{{ old('due_date') }}">
            </div>
            <div class="col-md-3">
                <select name="lead_id" class="form-select">
                    <option value="">No linked lead</option>
                    @foreach($leads as $id => $name)
                        <option value="{{ $id }}" {{ old('lead_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-admin btn-admin-primary w-100">
                    <i class="fas fa-plus me-1"></i> Add Task
                </button>
            </div>
        </div>
        <div class="mt-2">
            <input type="text" name="description" class="form-control form-control-sm"
                   placeholder="Description (optional)" value="{{ old('description') }}">
        </div>
    </form>
</div>

{{-- Pending Tasks --}}
<div class="admin-table mb-4">
    <div class="p-4 pb-2">
        <h5 class="fw-bold mb-0">Pending Tasks <span class="badge bg-warning text-dark ms-2">{{ $pending->count() }}</span></h5>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>Task</th>
                    <th>Due Date</th>
                    <th>Lead</th>
                    <th style="width:100px;"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($pending as $task)
                <tr style="{{ $task->isOverdue() ? 'border-left: 3px solid var(--danger);' : '' }}">
                    <td>
                        <form method="POST" action="{{ route('admin.tasks.toggle', $task->id) }}">
                            @csrf @method('PATCH')
                            <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent"
                                    title="Mark complete">
                                <i class="fas fa-circle text-muted fa-lg"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <div class="fw-semibold {{ $task->isOverdue() ? 'text-danger' : '' }}">{{ $task->title }}</div>
                        @if($task->description)
                            <small class="text-muted">{{ $task->description }}</small>
                        @endif
                    </td>
                    <td>
                        @if($task->due_date)
                            <span class="{{ $task->isOverdue() ? 'text-danger fw-bold' : 'text-muted' }}">
                                {{ $task->due_date->format('d M Y') }}
                                @if($task->isOverdue())
                                    <i class="fas fa-exclamation-triangle ms-1"></i>
                                @endif
                            </span>
                        @else
                            <span class="text-muted small">No due date</span>
                        @endif
                    </td>
                    <td>
                        @if($task->lead)
                            <a href="{{ route('admin.crm.leads.show', $task->lead_id) }}"
                               class="badge bg-info text-decoration-none">
                                <i class="fas fa-link me-1"></i>{{ $task->lead->name }}
                            </a>
                        @else
                            <span class="text-muted small">—</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <button type="button" class="btn btn-sm btn-outline-primary"
                                    data-bs-toggle="modal" data-bs-target="#editTask{{ $task->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form method="POST" action="{{ route('admin.tasks.destroy', $task->id) }}">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Delete this task?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-5">
                        <i class="fas fa-check-circle fa-2x mb-3 d-block text-success"></i>
                        All caught up! No pending tasks.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Completed Tasks (collapsible) --}}
@if($completed->count() > 0)
<div class="admin-table">
    <div class="p-4 pb-2">
        <button class="btn btn-link text-muted p-0 fw-bold text-decoration-none"
                type="button" data-bs-toggle="collapse" data-bs-target="#completedTasks">
            <i class="fas fa-chevron-down me-2"></i>
            Completed Tasks (last {{ $completed->count() }})
        </button>
    </div>
    <div class="collapse" id="completedTasks">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    @foreach($completed as $task)
                    <tr class="text-muted">
                        <td style="width:40px;">
                            <form method="POST" action="{{ route('admin.tasks.toggle', $task->id) }}">
                                @csrf @method('PATCH')
                                <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent" title="Reopen">
                                    <i class="fas fa-check-circle text-success fa-lg"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <span class="text-decoration-line-through">{{ $task->title }}</span>
                        </td>
                        <td>
                            @if($task->completed_at)
                                <small>Done {{ $task->completed_at->format('d M Y') }}</small>
                            @endif
                        </td>
                        <td>
                            @if($task->lead)
                                <span class="badge bg-light text-dark">{{ $task->lead->name }}</span>
                            @endif
                        </td>
                        <td style="width:100px;">
                            <div class="d-flex gap-1">
                                <button type="button" class="btn btn-sm btn-outline-primary"
                                        data-bs-toggle="modal" data-bs-target="#editTask{{ $task->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form method="POST" action="{{ route('admin.tasks.destroy', $task->id) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Delete?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

{{-- Edit Task Modals --}}
@foreach($pending->merge($completed) as $task)
<div class="modal fade" id="editTask{{ $task->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.tasks.update', $task->id) }}">
                @csrf @method('PUT')
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">Edit Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" name="description" class="form-control" value="{{ $task->description }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Due Date</label>
                        <input type="date" name="due_date" class="form-control"
                               value="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}">
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Linked Lead</label>
                        <select name="lead_id" class="form-select">
                            <option value="">No linked lead</option>
                            @foreach($leads as $id => $name)
                                <option value="{{ $id }}" {{ $task->lead_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-admin btn-admin-primary">
                        <i class="fas fa-save me-1"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection
