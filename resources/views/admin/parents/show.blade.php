@extends('layouts.admin')

@section('title', 'Parent — ' . $parent->name)

@push('styles')
<style>
.pp-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 20px;
}
.pp-panel-header {
    padding: 15px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.pp-panel-header h6 { margin: 0; font-weight: 700; font-size: .88rem; color: #1a1f2e; }
.pp-panel-body { padding: 22px; }

.pp-field-label {
    font-size: .67rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; margin-bottom: 3px;
}
.pp-field-val { font-size: .88rem; color: #1a1f2e; font-weight: 600; }
.pp-field-val a { color: #0077B6; text-decoration: none; }
.pp-field-val a:hover { text-decoration: underline; }

.pp-divider { height: 1px; background: #f3f4f6; margin: 18px 0; }
.pp-section-label {
    font-size: .64rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: 1px; color: #adb5bd; margin-bottom: 14px;
}

.pp-app-row {
    display: flex; align-items: center; gap: 14px;
    padding: 13px 0; border-bottom: 1px solid #f8f8f8;
}
.pp-app-row:last-child { border-bottom: none; }

.pp-btn {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    width: 100%; padding: 11px 16px; border-radius: 10px;
    font-size: .84rem; font-weight: 700; cursor: pointer;
    border: none; transition: all .2s; text-decoration: none; margin-bottom: 8px;
}
.pp-btn:last-child { margin-bottom: 0; }
.pp-btn-primary { background: #0077B6; color: #fff; }
.pp-btn-primary:hover { background: #005f93; color: #fff; }
.pp-btn-success { background: #16a34a; color: #fff; }
.pp-btn-success:hover { background: #15803d; color: #fff; }
.pp-btn-ghost { background: #f3f4f6; color: #374151; border: 1.5px solid #e5e7eb; }
.pp-btn-ghost:hover { background: #e5e7eb; }

.pp-pill {
    font-size: .7rem; font-weight: 700; border-radius: 20px;
    padding: 3px 10px; display: inline-block;
}

.pp-textarea {
    font-size: .84rem; border: 1.5px solid #e5e7eb; border-radius: 10px;
    padding: 10px 14px; background: #fafafa; color: #374151;
    transition: border-color .2s; width: 100%; resize: vertical; min-height: 96px;
}
.pp-textarea:focus { border-color: #0077B6; box-shadow: 0 0 0 3px rgba(0,119,182,.08); background: #fff; outline: none; }
</style>
@endpush

@section('content')

{{-- ── Page Header ─────────────────────────────────────────────────────── --}}
<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <ul style="list-style:none;padding:0;margin:0 0 8px;display:flex;gap:6px;font-size:.76rem;color:#adb5bd;">
            <li><a href="{{ route('admin.parents.index') }}" style="color:#0077B6;text-decoration:none;">Parents &amp; Families</a></li>
            <li>/ {{ $parent->name }}</li>
        </ul>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            {{ $parent->name }}
            <span class="pp-pill ms-2"
                  style="background:{{ $parent->trashed() ? '#fee2e2' : '#dcfce7' }};color:{{ $parent->trashed() ? '#ef4444' : '#16a34a' }};font-size:.72rem;">
                {{ $parent->trashed() ? 'Deactivated' : 'Active' }}
            </span>
        </h4>
        <p style="font-size:.82rem;color:#adb5bd;margin:0;">
            Parent / Guardian &bull; {{ $parent->applications->count() }} application{{ $parent->applications->count() !== 1 ? 's' : '' }}
        </p>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        @if($parent->phone)
        <div class="dropdown">
            <button class="btn btn-sm rounded-pill px-3 dropdown-toggle"
                    style="background:#f0fdf4;color:#16a34a;border:1px solid #dcfce7;"
                    data-bs-toggle="dropdown">
                <i class="fab fa-whatsapp me-1"></i>WhatsApp
            </button>
            <ul class="dropdown-menu dropdown-menu-end" style="border-radius:12px;border:1px solid #f0f0f0;box-shadow:0 4px 20px rgba(0,0,0,.1);font-size:.82rem;">
                @php $wa = '27' . ltrim(preg_replace('/[^0-9]/', '', $parent->phone), '0'); @endphp
                <li><a class="dropdown-item" href="https://wa.me/{{ $wa }}" target="_blank"><i class="fab fa-whatsapp me-2 text-success"></i>Open Chat</a></li>
            </ul>
        </div>
        @endif
        <a href="{{ route('admin.users.edit', $parent->id) }}"
           class="btn btn-sm btn-outline-primary rounded-pill px-3">
            <i class="fas fa-edit me-1"></i>Edit
        </a>
        <a href="{{ route('admin.parents.index') }}"
           class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
            <i class="fas fa-arrow-left me-1"></i>Back
        </a>
    </div>
</div>

{{-- ── Flash ─────────────────────────────────────────────────────────────── --}}
@if(session('success'))
<div style="background:#f0fdf4;border:1px solid #86efac;border-radius:12px;padding:12px 18px;font-size:.84rem;color:#16a34a;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<div class="row g-4">

    {{-- ── Left column ──────────────────────────────────────────────────── --}}
    <div class="col-lg-7">

        {{-- Parent Info --}}
        <div class="pp-panel">
            <div class="pp-panel-header">
                <h6><i class="fas fa-user me-2" style="color:#3b82f6;"></i>Parent Information</h6>
            </div>
            <div class="pp-panel-body">
                <div class="pp-section-label">Contact Details</div>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="pp-field-label">Full Name</div>
                        <div class="pp-field-val">{{ $parent->name }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="pp-field-label">Account Status</div>
                        <div class="pp-field-val">
                            <span class="pp-pill" style="background:{{ $parent->trashed() ? '#fee2e2' : '#dcfce7' }};color:{{ $parent->trashed() ? '#ef4444' : '#16a34a' }};">
                                {{ $parent->trashed() ? 'Deactivated' : 'Active' }}
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="pp-field-label">Email</div>
                        <div class="pp-field-val"><a href="mailto:{{ $parent->email }}">{{ $parent->email }}</a></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="pp-field-label">Phone</div>
                        <div class="pp-field-val">
                            @if($parent->phone)
                                <a href="tel:{{ $parent->phone }}">{{ $parent->phone }}</a>
                            @else
                                <span style="color:#d1d5db;">—</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="pp-divider"></div>
                <div class="pp-section-label">Account</div>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="pp-field-label">Member Since</div>
                        <div class="pp-field-val">{{ $parent->created_at->format('d F Y') }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="pp-field-label">Email Verified</div>
                        <div class="pp-field-val">
                            @if($parent->email_verified_at)
                                <span style="color:#16a34a;"><i class="fas fa-check-circle me-1"></i>{{ $parent->email_verified_at->format('d M Y') }}</span>
                            @else
                                <span style="color:#d97706;"><i class="fas fa-exclamation-circle me-1"></i>Not verified</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="pp-field-label">Role</div>
                        <div class="pp-field-val">
                            <span class="pp-pill" style="background:#eff6ff;color:#3b82f6;">
                                {{ ucfirst($parent->roles->first()?->name ?? 'parent') }}
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="pp-field-label">User ID</div>
                        <div class="pp-field-val" style="color:#adb5bd;">#{{ $parent->id }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Enrolment Applications --}}
        <div class="pp-panel">
            <div class="pp-panel-header">
                <h6><i class="fas fa-file-alt me-2" style="color:#0097a7;"></i>Enrolment Applications</h6>
                <span class="pp-pill" style="background:#e0f7fa;color:#0097a7;">{{ $parent->applications->count() }}</span>
            </div>
            <div class="pp-panel-body" style="padding-top:8px;padding-bottom:8px;">
                @forelse($parent->applications as $app)
                @php
                    $stC = ['approved'=>['#dcfce7','#16a34a'],'rejected'=>['#fee2e2','#ef4444'],'pending'=>['#fff7ed','#d97706'],'under_review'=>['#f5f3ff','#7c3aed'],'waitlist'=>['#f3f4f6','#6c757d']];
                    [$stBg,$stClr] = $stC[$app->status] ?? ['#f3f4f6','#6c757d'];
                @endphp
                <div class="pp-app-row">
                    <div style="width:38px;height:38px;border-radius:10px;background:#e0f7fa;color:#0097a7;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fas fa-child"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="fw-semibold" style="font-size:.88rem;color:#1a1f2e;">{{ $app->child_name }}</div>
                        <div style="font-size:.74rem;color:#adb5bd;margin-top:1px;">
                            {{ $app->program_name }} &middot; <code style="font-size:.72rem;color:#0077B6;">{{ $app->reference }}</code>
                        </div>
                    </div>
                    <div class="text-end me-2" style="flex-shrink:0;">
                        <span class="pp-pill" style="background:{{ $stBg }};color:{{ $stClr }};">{{ $app->statusLabel() }}</span>
                        <div style="font-size:.7rem;color:#adb5bd;margin-top:3px;">{{ $app->start_date->format('d M Y') }}</div>
                    </div>
                    <a href="{{ route('admin.admissions.show', $app->id) }}"
                       class="btn btn-sm rounded-pill px-3"
                       style="background:#eff6ff;color:#3b82f6;border:1px solid #bfdbfe;font-size:.74rem;white-space:nowrap;flex-shrink:0;">
                        <i class="fas fa-eye me-1"></i>View
                    </a>
                </div>
                @empty
                <div style="padding:28px 0;text-align:center;">
                    <div style="font-size:.84rem;color:#adb5bd;">No enrolment applications.</div>
                </div>
                @endforelse
            </div>
        </div>

    </div>

    {{-- ── Right column ──────────────────────────────────────────────────── --}}
    <div class="col-lg-5">

        {{-- Send Message --}}
        <div class="pp-panel">
            <div class="pp-panel-header">
                <h6><i class="fas fa-paper-plane me-2" style="color:#7c3aed;"></i>Send Message</h6>
            </div>
            <div class="pp-panel-body">
                <form method="POST" action="{{ route('admin.parents.message', $parent->id) }}">
                    @csrf
                    <div class="pp-section-label">Message to {{ $parent->name }}</div>
                    <textarea name="message" class="pp-textarea mb-3"
                              placeholder="Type a message…"></textarea>
                    <button type="submit" class="pp-btn pp-btn-primary">
                        <i class="fas fa-paper-plane"></i>Send Message
                    </button>
                </form>
            </div>
        </div>

        {{-- Actions --}}
        <div class="pp-panel">
            <div class="pp-panel-header">
                <h6><i class="fas fa-bolt me-2" style="color:#16a34a;"></i>Actions</h6>
            </div>
            <div class="pp-panel-body">
                <a href="mailto:{{ $parent->email }}" class="pp-btn pp-btn-primary">
                    <i class="fas fa-envelope"></i>Send Email
                </a>
                @if($parent->phone)
                @php $wa = '27' . ltrim(preg_replace('/[^0-9]/', '', $parent->phone), '0'); @endphp
                <a href="https://wa.me/{{ $wa }}" target="_blank" class="pp-btn pp-btn-success">
                    <i class="fab fa-whatsapp"></i>WhatsApp
                </a>
                @endif
                <a href="{{ route('admin.users.edit', $parent->id) }}" class="pp-btn pp-btn-ghost">
                    <i class="fas fa-user-edit"></i>Edit Account
                </a>
                <a href="{{ route('admin.parents.children') }}" class="pp-btn pp-btn-ghost">
                    <i class="fas fa-child"></i>View All Children
                </a>
                <a href="{{ route('admin.parents.index') }}" class="pp-btn pp-btn-ghost">
                    <i class="fas fa-arrow-left"></i>Back to Parents
                </a>
            </div>
        </div>

    </div>
</div>

@endsection






