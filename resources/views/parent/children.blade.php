@extends('layouts.portal')

@section('title', 'My Children')
@section('portal-name', 'Parent Portal')
@section('page-title', 'My Children')

@section('sidebar-nav')
@include('parent.partials.sidebar')
@endsection

@push('styles')
<style>
/* ─── Child card ───────────────────────────────────────────────────────── */
.child-card {
    background: #fff; border-radius: 16px;
    border: 1px solid #f0f0f0;
    box-shadow: 0 1px 8px rgba(0,0,0,.06);
    overflow: hidden; margin-bottom: 20px;
}
.child-card-top {
    padding: 22px 26px 18px;
    background: linear-gradient(135deg, #f0f9ff 0%, #fef1f2 100%);
    border-bottom: 1px solid #f0f0f0;
    position: relative;
}
.child-card-top::after {
    content: '';
    position: absolute; bottom: 0; left: 26px; right: 26px; height: 2px;
    background: linear-gradient(90deg, #0077B6, #00B4D8, #FFB5BA);
    border-radius: 2px;
}
.child-avatar {
    width: 56px; height: 56px; border-radius: 14px;
    background: #fff; display: flex; align-items: center; justify-content: center;
    font-size: 1.4rem; font-weight: 800; color: #0077B6;
    box-shadow: 0 2px 10px rgba(0,119,182,.15);
    border: 2px solid #fff; flex-shrink: 0;
}

/* ─── Stats strip ──────────────────────────────────────────────────────── */
.child-stats { display: flex; border-bottom: 1px solid #f3f4f6; }
.child-stat {
    flex: 1; padding: 13px 12px 15px; text-align: center;
    border-right: 1px solid #f3f4f6;
}
.child-stat:last-child { border-right: none; }
.cs-val { font-size: 1rem; font-weight: 800; color: #1a1f2e; line-height: 1; }
.cs-lbl { font-size: .61rem; font-weight: 600; text-transform: uppercase;
          letter-spacing: .4px; color: #94a3b8; margin-top: 4px; }

/* ─── Body grid ────────────────────────────────────────────────────────── */
.child-body { padding: 20px 26px; }

/* ─── Info rows ────────────────────────────────────────────────────────── */
.info-row {
    display: flex; align-items: baseline; gap: 10px;
    padding: 7px 0; border-bottom: 1px solid #f9fafb;
}
.info-row:last-child { border-bottom: none; }
.info-lbl {
    font-size: .7rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .4px; color: #94a3b8; min-width: 130px; flex-shrink: 0;
}
.info-val { font-size: .85rem; font-weight: 600; color: #1a1f2e; }
.info-val.muted { color: #94a3b8; font-weight: 400; font-style: italic; }

/* ─── Section micro-label ──────────────────────────────────────────────── */
.micro-label {
    font-size: .63rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: 1.1px; color: #adb5bd; margin-bottom: 12px;
}

/* ─── Doc badge ────────────────────────────────────────────────────────── */
.doc-badge {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 4px 10px; border-radius: 999px; font-size: .72rem; font-weight: 700;
}
.doc-badge.complete { background: #dcfce7; color: #16a34a; }
.doc-badge.partial  { background: #fff7ed; color: #d97706; }
.doc-badge.empty    { background: #fee2e2; color: #b91c1c; }

/* ─── Footer ───────────────────────────────────────────────────────────── */
.child-card-footer {
    padding: 14px 26px; border-top: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
    background: #fafbfc;
}
</style>
@endpush

@section('content')

{{-- ── Header ───────────────────────────────────────────────────────────── --}}
<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <div style="font-size:1.1rem;font-weight:800;color:#1a1f2e;letter-spacing:-.2px;">My Children</div>
        <div style="font-size:.82rem;color:#94a3b8;margin-top:2px;">
            {{ $children->count() }} {{ Str::plural('child', $children->count()) }} on record
        </div>
    </div>
    <a href="{{ route('parent.dashboard') }}"
       class="btn btn-sm rounded-pill px-3"
       style="background:#f0f9ff;color:#0077B6;border:1.5px solid #bae6fd;font-weight:600;font-size:.8rem;">
        <i class="fas fa-arrow-left me-1"></i> Dashboard
    </a>
</div>

@if($children->count())

    @foreach($children as $child)
    @php
        $stColors = [
            'approved'     => ['#dcfce7','#16a34a'],
            'pending'      => ['#fff7ed','#d97706'],
            'under_review' => ['#f5f3ff','#7c3aed'],
            'waitlist'     => ['#f3f4f6','#6c757d'],
            'rejected'     => ['#fee2e2','#ef4444'],
        ];
        [$stBg,$stC] = $stColors[$child['status']] ?? ['#f3f4f6','#6c757d'];

        $requiredDocCount = 4;
        $uploadedCount = collect(['birth_certificate','clinic_card','parent_ids','proof_address'])
            ->filter(fn($k) => !empty(($child['documents'] ?? [])[$k]))->count();
        $docClass = $uploadedCount === $requiredDocCount ? 'complete' : ($uploadedCount > 0 ? 'partial' : 'empty');
    @endphp

    <div class="child-card">

        {{-- Top bar --}}
        <div class="child-card-top">
            <div class="d-flex align-items-center gap-3">
                <div class="child-avatar">{{ strtoupper(substr($child['name'], 0, 1)) }}</div>
                <div class="flex-grow-1">
                    <div style="font-size:1.05rem;font-weight:800;color:#1a1f2e;line-height:1.2;">
                        {{ $child['name'] }}
                        @if($child['nickname'])
                            <span style="font-size:.78rem;color:#64748b;font-weight:500;margin-left:4px;">"{{ $child['nickname'] }}"</span>
                        @endif
                    </div>
                    <div style="font-size:.78rem;color:#64748b;margin-top:2px;">
                        {{ $child['program'] }}
                        @if($child['dob'] !== '—') &bull; Born {{ $child['dob'] }} @endif
                        &bull; {{ $child['gender'] }}
                    </div>
                </div>
                <span class="badge rounded-pill px-3 py-2"
                      style="background:{{ $stBg }};color:{{ $stC }};font-weight:700;font-size:.7rem;white-space:nowrap;">
                    {{ $child['status_label'] }}
                </span>
            </div>
        </div>

        {{-- Stats strip --}}
        <div class="child-stats">
            <div class="child-stat">
                <div class="cs-val">{{ $child['age_years'] !== null ? $child['age_years'] : '—' }}</div>
                <div class="cs-lbl">Age (yrs)</div>
            </div>
            <div class="child-stat">
                <div class="cs-val" style="font-size:.82rem;">{{ $child['fee_option'] }}</div>
                <div class="cs-lbl">Fee Plan</div>
            </div>
            <div class="child-stat">
                <div class="cs-val" style="font-size:.82rem;">{{ $child['start_date'] ?? '—' }}</div>
                <div class="cs-lbl">Start Date</div>
            </div>
            <div class="child-stat">
                <div class="cs-val" style="font-size:.78rem;">{{ $child['reference'] }}</div>
                <div class="cs-lbl">Reference</div>
            </div>
        </div>

        {{-- Body --}}
        <div class="child-body">
            <div class="row g-4">

                {{-- Child info --}}
                <div class="col-md-4">
                    <div class="micro-label"><i class="fas fa-child me-1"></i> Child</div>
                    <div class="info-row">
                        <div class="info-lbl">Full Name</div>
                        <div class="info-val">{{ $child['full_name'] }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-lbl">Date of Birth</div>
                        <div class="info-val">{{ $child['dob'] }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-lbl">Age</div>
                        <div class="info-val">{{ $child['age'] }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-lbl">Gender</div>
                        <div class="info-val">{{ $child['gender'] }}</div>
                    </div>
                    @if($child['language'])
                    <div class="info-row">
                        <div class="info-lbl">Language</div>
                        <div class="info-val">{{ $child['language'] }}</div>
                    </div>
                    @endif
                    @if($child['id_number'])
                    <div class="info-row">
                        <div class="info-lbl">ID / Birth Reg</div>
                        <div class="info-val"><code style="color:#0077B6;font-size:.8rem;">{{ $child['id_number'] }}</code></div>
                    </div>
                    @endif
                </div>

                {{-- Parent contacts --}}
                <div class="col-md-4">
                    <div class="micro-label"><i class="fas fa-users me-1"></i> Contacts</div>
                    @if($child['mother_name'])
                    <div class="mb-3">
                        <div style="font-size:.62rem;text-transform:uppercase;letter-spacing:.6px;color:#94a3b8;font-weight:700;margin-bottom:3px;">Mother</div>
                        <div style="font-size:.85rem;font-weight:700;color:#1a1f2e;">{{ $child['mother_name'] }}</div>
                        @if($child['mother_cell'])
                        <div style="font-size:.78rem;color:#64748b;">
                            <i class="fas fa-phone me-1" style="color:#94a3b8;width:12px;"></i>
                            <a href="tel:{{ $child['mother_cell'] }}" style="color:#0077B6;text-decoration:none;">{{ $child['mother_cell'] }}</a>
                        </div>
                        @endif
                        @if($child['mother_email'])
                        <div style="font-size:.78rem;color:#64748b;">
                            <i class="fas fa-envelope me-1" style="color:#94a3b8;width:12px;"></i>
                            <a href="mailto:{{ $child['mother_email'] }}" style="color:#0077B6;text-decoration:none;">{{ $child['mother_email'] }}</a>
                        </div>
                        @endif
                    </div>
                    @endif
                    @if($child['father_name'])
                    <div>
                        <div style="font-size:.62rem;text-transform:uppercase;letter-spacing:.6px;color:#94a3b8;font-weight:700;margin-bottom:3px;">Father</div>
                        <div style="font-size:.85rem;font-weight:700;color:#1a1f2e;">{{ $child['father_name'] }}</div>
                        @if($child['father_cell'])
                        <div style="font-size:.78rem;color:#64748b;">
                            <i class="fas fa-phone me-1" style="color:#94a3b8;width:12px;"></i>
                            <a href="tel:{{ $child['father_cell'] }}" style="color:#0077B6;text-decoration:none;">{{ $child['father_cell'] }}</a>
                        </div>
                        @endif
                        @if($child['father_email'])
                        <div style="font-size:.78rem;color:#64748b;">
                            <i class="fas fa-envelope me-1" style="color:#94a3b8;width:12px;"></i>
                            <a href="mailto:{{ $child['father_email'] }}" style="color:#0077B6;text-decoration:none;">{{ $child['father_email'] }}</a>
                        </div>
                        @endif
                    </div>
                    @endif
                    @if(!$child['mother_name'] && !$child['father_name'])
                    <div class="info-val muted" style="font-size:.82rem;">No contacts on record.</div>
                    @endif
                </div>

                {{-- Medical + Documents --}}
                <div class="col-md-4">
                    <div class="micro-label"><i class="fas fa-heartbeat me-1"></i> Medical</div>
                    <div class="info-row">
                        <div class="info-lbl">Allergies</div>
                        <div class="info-val {{ !$child['allergies'] ? 'muted' : '' }}">{{ $child['allergies'] ?: 'None recorded' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-lbl">Medical Notes</div>
                        <div class="info-val {{ !$child['medical_notes'] ? 'muted' : '' }}">{{ $child['medical_notes'] ?: 'None recorded' }}</div>
                    </div>

                    <div class="micro-label mt-3"><i class="fas fa-folder-open me-1"></i> Documents</div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="doc-badge {{ $docClass }}">
                            <i class="fas fa-{{ $docClass === 'complete' ? 'check-circle' : ($docClass === 'partial' ? 'exclamation-circle' : 'times-circle') }}"></i>
                            {{ $uploadedCount }} / {{ $requiredDocCount }} uploaded
                        </span>
                        @if($uploadedCount < $requiredDocCount)
                        <a href="{{ route('parent.documents') }}"
                           style="font-size:.74rem;color:#b91c1c;font-weight:600;text-decoration:none;">
                            Upload missing <i class="fas fa-arrow-right ms-1" style="font-size:.6rem;"></i>
                        </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        {{-- Footer --}}
        <div class="child-card-footer">
            <span style="font-size:.76rem;color:#94a3b8;">
                <i class="fas fa-calendar-check me-1"></i> Enrolled {{ $child['enrolled_date'] }}
            </span>
            <a href="{{ route('parent.children.show', $child['id']) }}"
               class="btn btn-sm rounded-pill px-4"
               style="background:#0077B6;color:#fff;border:none;font-weight:600;font-size:.8rem;">
                View Full Profile <i class="fas fa-arrow-right ms-1" style="font-size:.65rem;"></i>
            </a>
        </div>

    </div>
    @endforeach

@else
    <div style="background:#fff;border-radius:16px;border:1px solid #f0f0f0;padding:60px 30px;text-align:center;">
        <div style="width:60px;height:60px;background:#f0f9ff;border-radius:15px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
            <i class="fas fa-child fa-xl" style="color:#bae6fd;"></i>
        </div>
        <div style="font-weight:700;color:#1a1f2e;margin-bottom:6px;">No children on record</div>
        <p style="font-size:.84rem;color:#94a3b8;margin:0;">Your children will appear here once an application is submitted and approved.</p>
    </div>
@endif

@endsection
