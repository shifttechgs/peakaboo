@extends('layouts.admin')

@section('title', 'Parent — ' . $parent->name)

@push('styles')
<style>
.info-row { display: flex; gap: 8px; padding: 10px 0; border-bottom: 1px solid #f5f6f8; }
.info-row:last-child { border-bottom: none; }
.info-label { font-size: .8rem; color: #9b9baa; min-width: 140px; flex-shrink: 0; font-weight: 600; }
.info-value { font-size: .88rem; color: #2d2d3a; font-weight: 500; }
.section-header { font-size: .7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #9b9baa; margin-bottom: 14px; padding-bottom: 8px; border-bottom: 1px solid #f0f0f5; }
.pnl { background: #fff; border-radius: 16px; box-shadow: 0 1px 8px rgba(0,0,0,.07); border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 20px; }
.pnl-body { padding: 24px; }
.app-row { padding: 14px 0; border-bottom: 1px solid #f5f6f8; display: flex; align-items: center; gap: 14px; }
.app-row:last-child { border-bottom: none; }
</style>
@endpush

@section('content')

{{-- Breadcrumb / Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <nav aria-label="breadcrumb" style="font-size:.82rem;">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="{{ route('admin.parents.index') }}">Parents</a></li>
                <li class="breadcrumb-item active">{{ $parent->name }}</li>
            </ol>
        </nav>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0;">{{ $parent->name }}</h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Parent / Guardian Profile</p>
    </div>
    <a href="{{ route('admin.parents.index') }}"
       class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
        <i class="fas fa-arrow-left me-1"></i>Back
    </a>
</div>

<div class="row g-4">
    {{-- Profile card --}}
    <div class="col-lg-7">
        <div class="pnl">
            <div class="pnl-body">
                <div class="d-flex align-items-center gap-4 mb-4">
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                         style="width:72px;height:72px;font-size:1.8rem;background:#0077B6;flex-shrink:0;">
                        {{ strtoupper(substr($parent->name, 0, 1)) }}
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">{{ $parent->name }}</h5>
                        <span style="font-size:.75rem;font-weight:700;border-radius:20px;padding:3px 10px;
                            background:{{ $parent->trashed() ? '#fee2e2' : '#dcfce7' }};
                            color:{{ $parent->trashed() ? '#ef4444' : '#16a34a' }};">
                            {{ $parent->trashed() ? 'Deactivated' : 'Active' }}
                        </span>
                    </div>
                </div>

                <div class="section-header"><i class="fas fa-address-card me-2"></i>Contact Details</div>
                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-value"><a href="mailto:{{ $parent->email }}">{{ $parent->email }}</a></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Phone</span>
                    <span class="info-value">
                        @if($parent->phone)
                            <a href="tel:{{ $parent->phone }}">{{ $parent->phone }}</a>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Account Created</span>
                    <span class="info-value">{{ $parent->created_at->format('d F Y') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Last Updated</span>
                    <span class="info-value">{{ $parent->updated_at->format('d F Y') }}</span>
                </div>

                <div class="d-flex gap-2 mt-4 flex-wrap">
                    <a href="mailto:{{ $parent->email }}"
                       class="btn btn-sm rounded-pill px-3 text-white" style="background:#0077B6;">
                        <i class="fas fa-envelope me-1"></i>Email
                    </a>
                    @if($parent->phone)
                    <a href="https://wa.me/27{{ ltrim(str_replace([' ','-'], '', $parent->phone), '0') }}"
                       target="_blank" class="btn btn-sm btn-success rounded-pill px-3">
                        <i class="fab fa-whatsapp me-1"></i>WhatsApp
                    </a>
                    @endif
                    <a href="{{ route('admin.users.edit', $parent->id) }}"
                       class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
                        <i class="fas fa-edit me-1"></i>Edit Account
                    </a>
                </div>
            </div>
        </div>

        {{-- Applications --}}
        @if($parent->applications->count())
        <div class="pnl">
            <div class="pnl-body">
                <div class="section-header"><i class="fas fa-file-alt me-2"></i>Enrolment Applications ({{ $parent->applications->count() }})</div>
                @foreach($parent->applications as $app)
                <div class="app-row">
                    <div style="width:38px;height:38px;border-radius:10px;background:#eff6ff;color:#3b82f6;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fas fa-child" style="font-size:.9rem;"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="fw-semibold" style="font-size:.88rem;color:#1a1f2e;">{{ $app->child_name }}</div>
                        <div style="font-size:.76rem;color:#94a3b8;">
                            {{ $app->program_name }} · {{ $app->reference }}
                        </div>
                    </div>
                    <div class="text-end">
                        <span style="font-size:.68rem;font-weight:700;border-radius:20px;padding:3px 10px;display:inline-block;
                            background:{{ $app->status === 'approved' ? '#dcfce7' : ($app->status === 'rejected' ? '#fee2e2' : '#fef3c7') }};
                            color:{{ $app->status === 'approved' ? '#16a34a' : ($app->status === 'rejected' ? '#ef4444' : '#d97706') }};">
                            {{ $app->statusLabel() }}
                        </span>
                        <div style="font-size:.72rem;color:#94a3b8;margin-top:3px;">
                            {{ $app->created_at->format('d M Y') }}
                        </div>
                    </div>
                    <a href="{{ route('admin.admissions.show', $app->id) }}"
                       class="btn btn-sm rounded-pill px-2"
                       style="background:#eff6ff;color:#3b82f6;border:1px solid #bfdbfe;font-size:.73rem;white-space:nowrap;">
                        View
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    {{-- Message / Quick actions --}}
    <div class="col-lg-5">
        <div class="pnl">
            <div class="pnl-body">
                <div class="section-header"><i class="fas fa-paper-plane me-2"></i>Send Message</div>
                <form method="POST" action="{{ route('admin.parents.message', $parent->id) }}">
                    @csrf
                    <textarea name="message" class="form-control mb-3" rows="5"
                              placeholder="Type a message to this parent…"
                              style="font-size:.85rem;border:1px solid #e5e7eb;border-radius:10px;resize:none;"></textarea>
                    <button type="submit" class="btn btn-sm w-100 rounded-pill text-white" style="background:#0077B6;padding:9px;">
                        <i class="fas fa-paper-plane me-1"></i>Send Message
                    </button>
                </form>
            </div>
        </div>

        <div class="pnl">
            <div class="pnl-body">
                <div class="section-header"><i class="fas fa-bolt me-2"></i>Quick Actions</div>
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.users.edit', $parent->id) }}"
                       class="btn btn-sm btn-outline-primary rounded-pill">
                        <i class="fas fa-user-edit me-1"></i>Edit User Account
                    </a>
                    <a href="{{ route('admin.parents.children') }}"
                       class="btn btn-sm btn-outline-success rounded-pill">
                        <i class="fas fa-child me-1"></i>View All Children
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

