@extends('layouts.admin')

@section('title', 'Add Lead')

@push('styles')
<style>
/* ── shared form panel ───────────────────────────────────────────────── */
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

/* ── form controls ───────────────────────────────────────────────────── */
.lf-label {
    font-size: .72rem; font-weight: 700; color: #6c757d;
    margin-bottom: 6px; display: block; text-transform: uppercase;
    letter-spacing: .4px;
}
.lf-control, .lf-select {
    font-size: .88rem; border: 1.5px solid #e5e7eb;
    border-radius: 10px; padding: 10px 14px; background: #fafafa;
    color: #374151; transition: border-color .2s, box-shadow .2s; width: 100%;
    appearance: auto;
}
.lf-control:focus, .lf-select:focus {
    border-color: #0077B6;
    box-shadow: 0 0 0 3px rgba(0,119,182,.08);
    background: #fff; outline: none;
}
.lf-control::placeholder { color: #d1d5db; }
.lf-control.is-invalid, .lf-select.is-invalid { border-color: #ef4444; }
.lf-control.is-invalid:focus, .lf-select.is-invalid:focus {
    box-shadow: 0 0 0 3px rgba(239,68,68,.08);
}
.lf-feedback { font-size: .74rem; color: #ef4444; margin-top: 4px; }
.lf-hint     { font-size: .72rem; color: #adb5bd; margin-top: 5px; }
textarea.lf-control { min-height: 90px; resize: vertical; }

/* ── divider ─────────────────────────────────────────────────────────── */
.lf-divider { height: 1px; background: #f3f4f6; margin: 4px 0 18px; }

/* ── action buttons ──────────────────────────────────────────────────── */
.lf-btn {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    width: 100%; padding: 12px 16px; border-radius: 10px;
    font-size: .88rem; font-weight: 700; cursor: pointer;
    border: none; transition: all .2s; text-decoration: none;
}
.lf-btn + .lf-btn { margin-top: 8px; }
.lf-btn-primary { background: #0077B6; color: #fff; }
.lf-btn-primary:hover { background: #005f93; color: #fff; }
.lf-btn-ghost   { background: #f3f4f6; color: #374151; border: 1.5px solid #e5e7eb; }
.lf-btn-ghost:hover { background: #e5e7eb; }

/* ── info box ────────────────────────────────────────────────────────── */
.lf-info {
    background: #eff6ff; border: 1px solid #dbeafe;
    border-radius: 12px; padding: 14px 16px;
    font-size: .82rem; color: #3b82f6; line-height: 1.5;
}
.lf-info strong { color: #1e40af; }

/* ── validation error alert ──────────────────────────────────────────── */
.lf-errors {
    background: #fee2e2; border: 1px solid #fecaca;
    border-radius: 12px; padding: 14px 18px;
    font-size: .84rem; color: #dc2626;
    margin-bottom: 24px;
}
.lf-errors ul { margin: 6px 0 0; padding-left: 18px; }
</style>
@endpush

@section('content')

{{-- ── Page Header ────────────────────────────────────────────────────── --}}
<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <ul style="list-style:none;padding:0;margin:0 0 8px;display:flex;gap:6px;font-size:.76rem;color:#adb5bd;">
            <li><a href="{{ route('admin.crm.index') }}" style="color:#0077B6;text-decoration:none;">Lead Pipeline</a></li>
            <li style="margin-left:2px;">/ <a href="{{ route('admin.crm.leads') }}" style="color:#0077B6;text-decoration:none;margin-left:4px;">Leads</a></li>
            <li style="margin-left:6px;">/ Add Lead</li>
        </ul>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-user-plus me-2" style="color:#0077B6;font-size:1.1rem;"></i>Add Lead
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Manually capture a new enquiry into the lead pipeline</p>
    </div>
    <a href="{{ route('admin.crm.leads') }}"
       class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
        <i class="fas fa-arrow-left me-1"></i>Back to Leads
    </a>
</div>

{{-- ── Validation Errors ───────────────────────────────────────────────── --}}
@if($errors->any())
<div class="lf-errors">
    <strong><i class="fas fa-exclamation-circle me-2"></i>Please fix the following errors:</strong>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('admin.crm.leads.store') }}">
    @csrf
    <div class="row g-4">

        {{-- ════ LEFT — Contact · Child · Tour ════ --}}
        <div class="col-lg-7">

            {{-- Parent / Contact --}}
            <div class="lf-panel">
                <div class="lf-panel-header">
                    <div class="lf-panel-icon" style="background:#eff6ff;color:#3b82f6;">
                        <i class="fas fa-user"></i>
                    </div>
                    <h6>Parent / Contact</h6>
                </div>
                <div class="lf-panel-body">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="lf-label">Full Name <span style="color:#ef4444;">*</span></label>
                            <input type="text" name="name"
                                   class="lf-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" required autofocus>
                            @error('name')<div class="lf-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="lf-label">Phone <span style="color:#ef4444;">*</span></label>
                            <input type="text" name="phone"
                                   class="lf-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone') }}" placeholder="082 000 0000" required>
                            @error('phone')<div class="lf-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="lf-label">Email <span style="color:#ef4444;">*</span></label>
                            <input type="email" name="email"
                                   class="lf-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required>
                            @error('email')<div class="lf-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="lf-label">Source</label>
                            <select name="source" class="lf-select">
                                <option value="">Not specified</option>
                                @foreach(\App\Models\Lead::SOURCES as $src)
                                    <option value="{{ $src }}" {{ old('source') === $src ? 'selected' : '' }}>
                                        {{ ucfirst($src) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Child Details --}}
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
                            <input type="text" name="child_name"
                                   class="lf-control @error('child_name') is-invalid @enderror"
                                   value="{{ old('child_name') }}" required>
                            @error('child_name')<div class="lf-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="lf-label">Nickname <span style="color:#adb5bd;font-weight:400;">optional</span></label>
                            <input type="text" name="child_nickname" class="lf-control"
                                   value="{{ old('child_nickname') }}" placeholder="What do they go by?">
                        </div>
                        <div class="col-sm-6">
                            <label class="lf-label">Age Group <span style="color:#ef4444;">*</span></label>
                            <select name="child_age" class="lf-select @error('child_age') is-invalid @enderror" required>
                                <option value="">Select age…</option>
                                @foreach(['0-1 years','1-2 years','2-3 years','3-4 years','4-5 years','5-6 years'] as $age)
                                    <option value="{{ $age }}" {{ old('child_age') === $age ? 'selected' : '' }}>{{ $age }}</option>
                                @endforeach
                            </select>
                            @error('child_age')<div class="lf-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>

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
                            <input type="date" name="preferred_date"
                                   class="lf-control @error('preferred_date') is-invalid @enderror"
                                   value="{{ old('preferred_date', now()->addDays(3)->format('Y-m-d')) }}" required>
                            @error('preferred_date')<div class="lf-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="lf-label">Preferred Time <span style="color:#ef4444;">*</span></label>
                            <select name="preferred_time" class="lf-select @error('preferred_time') is-invalid @enderror" required>
                                @foreach(['09:00' => '09:00 – 10:00', '10:00' => '10:00 – 11:00'] as $time => $label)
                                    <option value="{{ $time }}" {{ old('preferred_time') === $time ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('preferred_time')<div class="lf-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="lf-label">Notes / Message <span style="color:#adb5bd;font-weight:400;">optional</span></label>
                            <textarea name="message" class="lf-control"
                                      placeholder="Any context from the initial conversation…">{{ old('message') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ════ RIGHT — Pipeline · Assignment · Actions ════ --}}
        <div class="col-lg-5">

            {{-- Pipeline --}}
            <div class="lf-panel" style="border-left:3px solid #0097a7;">
                <div class="lf-panel-header">
                    <div class="lf-panel-icon" style="background:#e0f7fa;color:#0097a7;">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h6>Automation</h6>
                </div>
                <div class="lf-panel-body">
                    <div style="background:#f0fdfa;border:1px solid #ccfbf1;border-radius:10px;padding:14px 16px;">
                        <div style="font-size:.78rem;font-weight:700;color:#0097a7;margin-bottom:6px;">
                            <i class="fas fa-check-circle me-1"></i>What happens when you create this lead:
                        </div>
                        <ul style="font-size:.78rem;color:#374151;margin:0;padding-left:18px;line-height:1.8;">
                            <li>Status set to <strong>Tour Scheduled</strong></li>
                            <li>Tour confirmation email sent to parent</li>
                            <li>Activity logged automatically</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Assignment --}}
            <div class="lf-panel">
                <div class="lf-panel-header">
                    <div class="lf-panel-icon" style="background:#f5f3ff;color:#7c3aed;">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h6>Assignment</h6>
                </div>
                <div class="lf-panel-body">
                    <label class="lf-label">Assign To</label>
                    <select name="assigned_to" class="lf-select">
                        <option value="">Unassigned</option>
                        @foreach(\App\Models\User::role(['super_admin','admin'])->orderBy('name')->get() as $u)
                            <option value="{{ $u->id }}" {{ old('assigned_to') == $u->id ? 'selected' : '' }}>
                                {{ $u->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Info note --}}
            <div class="lf-info mb-4">
                <i class="fas fa-info-circle me-2"></i>
                <strong>Manual lead</strong> — a reference number will be auto-generated and the full activity timeline will be preserved from creation.
            </div>

            {{-- Submit --}}
            <button type="submit" class="lf-btn lf-btn-primary">
                <i class="fas fa-plus"></i>Create Lead
            </button>
            <a href="{{ route('admin.crm.leads') }}" class="lf-btn lf-btn-ghost">
                Cancel
            </a>

        </div>
    </div>
</form>

@endsection

