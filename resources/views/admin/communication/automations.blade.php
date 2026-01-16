@extends('layouts.admin')

@section('title', 'Automations')

@section('content')
<div class="page-title d-flex justify-content-between align-items-start">
    <div>
        <h1>Automations</h1>
        <p>Automated workflows that save you time</p>
    </div>
    <button class="btn btn-admin btn-admin-primary" data-bs-toggle="modal" data-bs-target="#newAutomationModal">
        <i class="fas fa-plus me-2"></i> New Automation
    </button>
</div>

<!-- Active Automations -->
<div class="row g-4">
    @foreach($automations as $automation)
    <div class="col-md-6 col-lg-4">
        <div class="admin-table h-100">
            <div class="p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center {{ $automation['status'] == 'active' ? 'bg-success' : 'bg-secondary' }} bg-opacity-10" style="width: 45px; height: 45px;">
                            @if(str_contains(strtolower($automation['name']), 'enquiry'))
                            <i class="fas fa-comment-dots {{ $automation['status'] == 'active' ? 'text-success' : 'text-secondary' }}"></i>
                            @elseif(str_contains(strtolower($automation['name']), 'application'))
                            <i class="fas fa-file-alt {{ $automation['status'] == 'active' ? 'text-success' : 'text-secondary' }}"></i>
                            @elseif(str_contains(strtolower($automation['name']), 'approved'))
                            <i class="fas fa-check-circle {{ $automation['status'] == 'active' ? 'text-success' : 'text-secondary' }}"></i>
                            @elseif(str_contains(strtolower($automation['name']), 'payment'))
                            <i class="fas fa-credit-card {{ $automation['status'] == 'active' ? 'text-success' : 'text-secondary' }}"></i>
                            @elseif(str_contains(strtolower($automation['name']), 'birthday'))
                            <i class="fas fa-birthday-cake {{ $automation['status'] == 'active' ? 'text-success' : 'text-secondary' }}"></i>
                            @elseif(str_contains(strtolower($automation['name']), 'holiday'))
                            <i class="fas fa-umbrella-beach {{ $automation['status'] == 'active' ? 'text-success' : 'text-secondary' }}"></i>
                            @else
                            <i class="fas fa-robot {{ $automation['status'] == 'active' ? 'text-success' : 'text-secondary' }}"></i>
                            @endif
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">{{ $automation['name'] }}</h6>
                            <span class="badge {{ $automation['status'] == 'active' ? 'bg-success' : 'bg-secondary' }} badge-sm">
                                {{ ucfirst($automation['status']) }}
                            </span>
                        </div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" {{ $automation['status'] == 'active' ? 'checked' : '' }}>
                    </div>
                </div>

                <div class="border-start border-3 border-primary ps-3 mb-3">
                    <div class="mb-2">
                        <small class="text-muted text-uppercase fw-semibold">Trigger</small>
                        <div>{{ $automation['trigger'] }}</div>
                    </div>
                    <div>
                        <small class="text-muted text-uppercase fw-semibold">Action</small>
                        <div>{{ $automation['action'] }}</div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center text-muted small">
                    <div>
                        <i class="fas fa-play me-1"></i> {{ $automation['total_runs'] }} runs
                    </div>
                    <div>
                        <i class="fas fa-clock me-1"></i> {{ $automation['last_triggered'] }}
                    </div>
                </div>
            </div>
            <div class="border-top p-3 bg-light">
                <div class="d-flex gap-2">
                    <button class="btn btn-sm btn-outline-primary flex-grow-1">
                        <i class="fas fa-edit me-1"></i> Edit
                    </button>
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-history"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Automation Stats -->
<div class="row g-4 mt-4">
    <div class="col-12">
        <div class="admin-table">
            <div class="p-4 border-bottom">
                <h5 class="mb-0 fw-bold">Automation Performance</h5>
            </div>
            <div class="p-4">
                <div class="row text-center g-4">
                    <div class="col-md-3">
                        <div class="h2 fw-bold text-primary mb-1">{{ array_sum(array_column($automations, 'total_runs')) }}</div>
                        <div class="text-muted">Total Automations Run</div>
                    </div>
                    <div class="col-md-3">
                        <div class="h2 fw-bold text-success mb-1">{{ collect($automations)->where('status', 'active')->count() }}</div>
                        <div class="text-muted">Active Automations</div>
                    </div>
                    <div class="col-md-3">
                        <div class="h2 fw-bold text-info mb-1">~45</div>
                        <div class="text-muted">Hours Saved/Month</div>
                    </div>
                    <div class="col-md-3">
                        <div class="h2 fw-bold text-warning mb-1">98%</div>
                        <div class="text-muted">Success Rate</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Automation Modal -->
<div class="modal fade" id="newAutomationModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Create New Automation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label fw-semibold">Automation Name</label>
                        <input type="text" class="form-control" placeholder="e.g., Welcome New Lead">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Trigger</label>
                        <select class="form-select">
                            <option value="">Select trigger...</option>
                            <option value="new_lead">New lead submitted</option>
                            <option value="application_submitted">Application submitted</option>
                            <option value="application_approved">Application approved</option>
                            <option value="application_rejected">Application rejected</option>
                            <option value="payment_received">Payment received</option>
                            <option value="payment_overdue">Payment overdue</option>
                            <option value="birthday">Child's birthday</option>
                            <option value="scheduled">Scheduled time</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Action</label>
                        <select class="form-select">
                            <option value="">Select action...</option>
                            <option value="send_email">Send email</option>
                            <option value="send_sms">Send SMS</option>
                            <option value="send_whatsapp">Send WhatsApp message</option>
                            <option value="notify_admin">Notify admin</option>
                            <option value="create_task">Create task</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Message Template</label>
                        <textarea class="form-control" rows="4" placeholder="Enter your message template. Use {child_name}, {parent_name}, {amount}, etc. for dynamic content."></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-admin btn-admin-primary">Create Automation</button>
            </div>
        </div>
    </div>
</div>
@endsection
