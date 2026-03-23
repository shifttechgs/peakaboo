@extends('layouts.admin')

@section('title', 'Edit Lead — ' . $lead->reference)

@push('styles')
<style>
/* ── reuse lead-form design system ──────────────────────────────────── */
.lf-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden;
    margin-bottom: 20px;
}
.lf-panel-header {
    padding: 16px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; gap: 10px;
}
.lf-panel-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }
.lf-panel-icon {
    width: 30px; height: 30px; border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: .78rem; flex-shrink: 0;
}
.lf-panel-body { padding: 22px; }
.lf-label {
    font-size: .72rem; font-weight: 700; color: #6c757d;
    margin-bottom: 6px; display: block; text-transform: uppercase; letter-spacing: .4px;
}
.lf-control, .lf-select {
    font-size: .88rem; border: 1.5px solid #e5e7eb;
    border-radius: 10px; padding: 10px 14px; background: #fafafa;
    color: #374151; transition: border-color .2s, box-shadow .2s; width: 100%;
    appearance: auto;
}
.lf-control:focus, .lf-select:focus {
    border-color: #0077B6; box-shadow: 0 0 0 3px rgba(0,119,182,.08);
    background: #fff; outline: none;
}
.lf-control::placeholder { color: #d1d5db; }
.lf-control.is-invalid, .lf-select.is-invalid { border-color: #ef4444; }
.lf-feedback { font-size: .74rem; color: #ef4444; margin-top: 4px; }
.lf-hint     { font-size: .72rem; color: #adb5bd; margin-top: 5px; }
textarea.lf-control { min-height: 90px; resize: vertical; }
.lf-divider  { height: 1px; background: #f3f4f6; margin: 4px 0 18px; }
.lf-btn {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    padding: 11px 20px; border-radius: 10px;
    font-size: .88rem; font-weight: 700; cursor: pointer;
    border: none; transition: all .2s; text-decoration: none; white-space: nowrap;
}
.lf-btn-primary { background: #0077B6; color: #fff; }
.lf-btn-primary:hover { background: #005f93; color: #fff; }
.lf-btn-ghost   { background: #f3f4f6; color: #374151; border: 1.5px solid #e5e7eb; }
.lf-btn-ghost:hover { background: #e5e7eb; }
.lf-btn-danger  { background: #fee2e2; color: #ef4444; border: 1.5px solid #fecaca; }
.lf-btn-danger:hover { background: #fecaca; }
</style>
@endpush

@section('content')

{{-- ── Page Header ────────────────────────────────────────────────────── --}}
<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <ul style="list-style:none;padding:0;margin:0 0 8px;display:flex;gap:4px;font-size:.76rem;color:#adb5bd;flex-wrap:wrap;">
            <li><a href="{{ route('admin.crm.index') }}" style="color:#0077B6;text-decoration:none;">Lead Pipeline</a></li>
            <li>/ <a href="{{ route('admin.crm.leads') }}" style="color:#0077B6;text-decoration:none;">Leads</a></li>
            <li>/ <a href="{{ route('admin.crm.leads.show', $lead->id) }}" style="color:#0077B6;text-decoration:none;">{{ $lead->reference }}</a></li>
            <li>/ Edit</li>
        </ul>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-edit me-2" style="color:#0077B6;font-size:1.1rem;"></i>Edit Lead
            <code style="font-size:.82rem;color:#0077B6;font-weight:700;margin-left:6px;">{{ $lead->reference }}</code>
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Update contact details, tour preference and pipeline data</p>
    </div>
    <a href="{{ route('admin.crm.leads.show', $lead->id) }}"
       class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
        <i class="fas fa-arrow-left me-1"></i>Back to Lead
    </a>
</div>

<form method="POST" action="{{ route('admin.crm.leads.update', $lead->id) }}">
    @csrf
    @method('PUT')

    <div class="row g-4">

        {{-- ════ LEFT — Contact · Child ════ --}}
        <div class="col-lg-6">

            {{-- Contact --}}
            <div class="lf-panel">
                <div class="lf-panel-header">
                    <div class="lf-panel-icon" style="background:#eff6ff;color:#3b82f6;">
                        <i class="fas fa-user"></i>
                    </div>
                    <h6>Contact Information</h6>
                </div>
                <div class="lf-panel-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="lf-label">Full Name <span style="color:#ef4444;">*</span></label>
                            <input type="text" name="name" id="name"
                                   class="lf-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $lead->name) }}" required>
                            @error('name')<div class="lf-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="lf-label">Email <span style="color:#ef4444;">*</span></label>
                            <input type="email" name="email" id="email"
                                   class="lf-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $lead->email) }}" required>
                            @error('email')<div class="lf-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="lf-label">Phone <span style="color:#ef4444;">*</span></label>
                            <input type="text" name="phone" id="phone"
                                   class="lf-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone', $lead->phone) }}" required>
                            @error('phone')<div class="lf-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="lf-label">Source</label>
                            <select name="source" id="source" class="lf-select">
                                <option value="">Not specified</option>
                                @foreach(\App\Models\Lead::SOURCES as $src)
                                    <option value="{{ $src }}" {{ old('source', $lead->source) === $src ? 'selected' : '' }}>
                                        {{ ucfirst($src) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Child --}}
            <div class="lf-panel">
                <div class="lf-panel-header">
                    <div class="lf-panel-icon" style="background:#f0fdf4;color:#16a34a;">
                        <i class="fas fa-child"></i>
                    </div>
                    <h6>Child Details</h6>
                </div>
                <div class="lf-panel-body">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="lf-label">Child's Name <span style="color:#ef4444;">*</span></label>
                            <input type="text" name="child_name" id="child_name"
                                   class="lf-control @error('child_name') is-invalid @enderror"
                                   value="{{ old('child_name', $lead->child_name) }}" required>
                            @error('child_name')<div class="lf-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="lf-label">Nickname <span style="color:#adb5bd;font-weight:400;">optional</span></label>
                            <input type="text" name="child_nickname" id="child_nickname" class="lf-control"
                                   value="{{ old('child_nickname', $lead->child_nickname) }}">
                        </div>
                        <div class="col-12">
                            <label class="lf-label">Age Group <span style="color:#ef4444;">*</span></label>
                            <select name="child_age" id="child_age"
                                    class="lf-select @error('child_age') is-invalid @enderror" required>
                                @foreach(['0-1 years','1-2 years','2-3 years','3-4 years','4-5 years','5-6 years'] as $age)
                                    <option value="{{ $age }}" {{ old('child_age', $lead->child_age) === $age ? 'selected' : '' }}>
                                        {{ $age }}
                                    </option>
                                @endforeach
                            </select>
                            @error('child_age')<div class="lf-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- ════ RIGHT — Tour · Pipeline · Actions ════ --}}
        <div class="col-lg-6">

            {{-- Tour Preference --}}
            <div class="lf-panel">
                <div class="lf-panel-header">
                    <div class="lf-panel-icon" style="background:#e0f7fa;color:#0097a7;">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h6>Tour Preference</h6>
                </div>
                <div class="lf-panel-body">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="lf-label">Preferred Date <span style="color:#ef4444;">*</span></label>
                            <input type="date" name="preferred_date" id="preferred_date"
                                   class="lf-control @error('preferred_date') is-invalid @enderror"
                                   value="{{ old('preferred_date', $lead->preferred_date->format('Y-m-d')) }}" required>
                            @error('preferred_date')<div class="lf-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="lf-label">Preferred Time <span style="color:#ef4444;">*</span></label>
                            <select name="preferred_time" id="preferred_time"
                                    class="lf-select @error('preferred_time') is-invalid @enderror" required>
                                @foreach(['09:00','10:00','11:00','14:00','15:00'] as $time)
                                    <option value="{{ $time }}" {{ old('preferred_time', $lead->preferred_time) === $time ? 'selected' : '' }}>
                                        {{ $time }}
                                    </option>
                                @endforeach
                            </select>
                            @error('preferred_time')<div class="lf-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="lf-label">Message <span style="color:#adb5bd;font-weight:400;">optional</span></label>
                            <textarea name="message" id="message" class="lf-control" rows="3">{{ old('message', $lead->message) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pipeline --}}
            <div class="lf-panel" style="border-left:3px solid #0077B6;">
                <div class="lf-panel-header">
                    <div class="lf-panel-icon" style="background:#eff6ff;color:#0077B6;">
                        <i class="fas fa-funnel-dollar"></i>
                    </div>
                    <h6>Pipeline</h6>
                </div>
                <div class="lf-panel-body">
                    <label class="lf-label">Follow-up Date</label>
                    <input type="date" name="follow_up_date" id="follow_up_date" class="lf-control"
                           value="{{ old('follow_up_date', $lead->follow_up_date?->format('Y-m-d')) }}">
                    <div class="lf-hint">When should this lead be contacted next?</div>
                </div>
            </div>

            {{-- Action bar --}}
            <div class="d-flex justify-content-between align-items-center gap-2 mt-2">
                <button type="button" class="lf-btn lf-btn-danger"
                        data-bs-toggle="modal" data-bs-target="#deleteLeadModal">
                    <i class="fas fa-trash"></i>Delete
                </button>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.crm.leads.show', $lead->id) }}" class="lf-btn lf-btn-ghost">
                        Cancel
                    </a>
                    <button type="submit" class="lf-btn lf-btn-primary">
                        <i class="fas fa-save"></i>Save Changes
                    </button>
                </div>
            </div>

        </div>
    </div>
</form>

{{-- ── Delete Modal ─────────────────────────────────────────────────────── --}}
<div class="modal fade" id="deleteLeadModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border:none;border-radius:16px;overflow:hidden;">
            <div class="modal-header border-0" style="padding:20px 24px 0;">
                <h5 class="modal-title fw-bold" style="font-size:.95rem;color:#1a1f2e;">
                    <i class="fas fa-archive me-2" style="color:#ef4444;"></i>Archive Lead
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:16px 24px;">
                <p style="font-size:.86rem;color:#374151;margin-bottom:8px;">
                    Are you sure you want to archive <strong>{{ $lead->name }}</strong>?
                </p>
                <p style="font-size:.8rem;color:#adb5bd;margin:0;">
                    <code style="color:#0077B6;">{{ $lead->reference }}</code> — the lead will be archived and can be restored later if needed.
                </p>
            </div>
            <div class="modal-footer border-0" style="padding:0 24px 20px;gap:8px;">
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3"
                        data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('admin.crm.leads.destroy', $lead->id) }}" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm rounded-pill px-3"
                            style="background:#ef4444;color:#fff;border:none;">
                        <i class="fas fa-archive me-1"></i>Archive Lead
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
