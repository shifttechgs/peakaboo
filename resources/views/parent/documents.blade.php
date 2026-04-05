@extends('layouts.portal')

@section('title', 'Document Vault')
@section('portal-name', 'Parent Portal')
@section('page-title', 'Document Vault')

@section('sidebar-nav')
@include('parent.partials.sidebar')
@endsection

@push('styles')
<style>
/* ─── Page header ──────────────────────────────────────────────────────── */
.micro-label {
    font-size: .63rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: 1.1px; color: #adb5bd; margin-bottom: 12px;
}

/* ─── Summary tiles ────────────────────────────────────────────────────── */
.summary-bar {
    background: #fff; border-radius: 16px;
    border: 1px solid #f0f0f0; box-shadow: 0 1px 8px rgba(0,0,0,.06);
    display: flex; overflow: hidden; margin-bottom: 24px;
}
.summary-tile {
    flex: 1; padding: 18px 16px 20px; text-align: center;
    border-right: 1px solid #f3f4f6;
}
.summary-tile:last-child { border-right: none; }
.st-val { font-size: 1.6rem; font-weight: 800; line-height: 1; color: #1a1f2e; }
.st-lbl { font-size: .67rem; font-weight: 600; text-transform: uppercase;
          letter-spacing: .5px; color: #94a3b8; margin-top: 5px; }
.st-val.good { color: #16a34a; }
.st-val.warn { color: #d97706; }
.st-val.bad  { color: #ef4444; }

/* ─── Panel ────────────────────────────────────────────────────────────── */
.panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.06);
    border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 20px;
}
.panel-header {
    padding: 15px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.panel-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }

/* ─── Child header strip ───────────────────────────────────────────────── */
.child-strip {
    padding: 16px 22px;
    background: linear-gradient(135deg, #f0f9ff 0%, #fef1f2 100%);
    border-bottom: 1px solid #f0f0f0;
    display: flex; align-items: center; gap: 14px;
    position: relative;
}
.child-strip::after {
    content: ''; position: absolute; bottom: 0; left: 22px; right: 22px; height: 2px;
    background: linear-gradient(90deg, #0077B6, #00B4D8, #FFB5BA); border-radius: 2px;
}
.child-strip-avatar {
    width: 40px; height: 40px; border-radius: 10px;
    background: #fff; display: flex; align-items: center; justify-content: center;
    font-size: 1rem; font-weight: 800; color: #0077B6;
    box-shadow: 0 2px 8px rgba(0,119,182,.15); flex-shrink: 0;
}
.progress-pill {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 4px 11px; border-radius: 999px; font-size: .72rem; font-weight: 700;
}
.progress-pill.complete { background: #dcfce7; color: #16a34a; }
.progress-pill.partial  { background: #fff7ed; color: #d97706; }
.progress-pill.empty    { background: #fee2e2; color: #b91c1c; }

/* ─── Document row ─────────────────────────────────────────────────────── */
.doc-row {
    display: flex; align-items: center; gap: 14px;
    padding: 13px 22px; border-bottom: 1px solid #f9fafb;
    transition: background .12s;
}
.doc-row:last-child { border-bottom: none; }
.doc-row:hover { background: #fafbfc; }
.doc-icon {
    width: 38px; height: 38px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: .85rem; flex-shrink: 0;
}
.doc-icon.pdf      { background: #fee2e2; color: #dc2626; }
.doc-icon.image    { background: #dbeafe; color: #2563eb; }
.doc-icon.uploaded { background: #dcfce7; color: #16a34a; }
.doc-icon.missing  { background: #f3f4f6; color: #d1d5db; }
.doc-body { flex: 1; min-width: 0; }
.doc-name  { font-size: .85rem; font-weight: 700; color: #1a1f2e; line-height: 1.2; }
.doc-meta  { font-size: .73rem; color: #94a3b8; margin-top: 2px; }
.doc-actions { display: flex; align-items: center; gap: 8px; flex-shrink: 0; }

/* ─── Status badge ─────────────────────────────────────────────────────── */
.status-pill {
    font-size: .69rem; font-weight: 700; border-radius: 999px; padding: 3px 10px;
}
.status-pill.uploaded { background: #dcfce7; color: #16a34a; }
.status-pill.missing  { background: #f3f4f6; color: #94a3b8; }

/* ─── Upload btn ───────────────────────────────────────────────────────── */
.btn-upload {
    font-size: .75rem; font-weight: 600; padding: 5px 13px; border-radius: 999px;
    background: #f0f9ff; color: #0077B6; border: 1.5px solid #bae6fd;
    text-decoration: none; cursor: pointer; transition: all .15s;
}
.btn-upload:hover { background: #0077B6; color: #fff; border-color: #0077B6; }

/* ─── Progress bar ─────────────────────────────────────────────────────── */
.doc-progress-track { background: #f3f4f6; border-radius: 4px; height: 4px; flex: 1; overflow: hidden; }
.doc-progress-fill  { height: 4px; border-radius: 4px; background: linear-gradient(90deg, #0077B6, #00B4D8); }
</style>
@endpush

@section('content')

{{-- ── Page header ──────────────────────────────────────────────────────── --}}
<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <div style="font-size:1.1rem;font-weight:800;color:#1a1f2e;letter-spacing:-.2px;">Document Vault</div>
        <div style="font-size:.82rem;color:#94a3b8;margin-top:2px;">
            Upload and manage required documents for each child
        </div>
    </div>
    <a href="{{ route('parent.dashboard') }}"
       class="btn btn-sm rounded-pill px-3"
       style="background:#f0f9ff;color:#0077B6;border:1.5px solid #bae6fd;font-weight:600;font-size:.8rem;">
        <i class="fas fa-arrow-left me-1"></i> Dashboard
    </a>
</div>

@php
    $totalDocs    = collect($childDocs)->sum('total');
    $totalUploaded = collect($childDocs)->sum('uploaded');
    $totalMissing  = $totalDocs - $totalUploaded;
@endphp

{{-- ── Summary bar ──────────────────────────────────────────────────────── --}}
<div class="summary-bar">
    <div class="summary-tile">
        <div class="st-val">{{ count($childDocs) }}</div>
        <div class="st-lbl">{{ Str::plural('Child', count($childDocs)) }}</div>
    </div>
    <div class="summary-tile">
        <div class="st-val">{{ $totalDocs }}</div>
        <div class="st-lbl">Required</div>
    </div>
    <div class="summary-tile">
        <div class="st-val good">{{ $totalUploaded }}</div>
        <div class="st-lbl">Uploaded</div>
    </div>
    <div class="summary-tile">
        <div class="st-val {{ $totalMissing > 0 ? 'bad' : 'good' }}">{{ $totalMissing }}</div>
        <div class="st-lbl">Missing</div>
    </div>
</div>

{{-- ── Per-child document panels ────────────────────────────────────────── --}}
@forelse($childDocs as $entry)
@php
    $pct       = $entry['total'] > 0 ? round($entry['uploaded'] / $entry['total'] * 100) : 0;
    $pillClass = $entry['uploaded'] === $entry['total'] ? 'complete' : ($entry['uploaded'] > 0 ? 'partial' : 'empty');
@endphp
<div class="panel">

    {{-- Child strip --}}
    <div class="child-strip">
        <div class="child-strip-avatar">{{ strtoupper(substr($entry['child_name'], 0, 1)) }}</div>
        <div class="flex-grow-1">
            <div style="font-weight:800;font-size:.92rem;color:#1a1f2e;">{{ $entry['child_name'] }}</div>
            <div style="font-size:.74rem;color:#64748b;">Ref: {{ $entry['reference'] }}</div>
        </div>
        <div class="d-flex align-items-center gap-3">
            <div class="d-flex align-items-center gap-2" style="min-width:120px;">
                <div class="doc-progress-track">
                    <div class="doc-progress-fill" style="width:{{ $pct }}%;"></div>
                </div>
                <span style="font-size:.72rem;font-weight:700;color:#64748b;white-space:nowrap;">{{ $pct }}%</span>
            </div>
            <span class="progress-pill {{ $pillClass }}">
                <i class="fas fa-{{ $pillClass === 'complete' ? 'check-circle' : ($pillClass === 'partial' ? 'exclamation-circle' : 'times-circle') }}"></i>
                {{ $entry['uploaded'] }} / {{ $entry['total'] }}
            </span>
        </div>
    </div>

    {{-- Doc rows --}}
    @foreach($entry['docs'] as $doc)
    @php
        $iconClass = 'missing';
        if ($doc['uploaded']) {
            $iconClass = in_array($doc['ext'], ['jpg','jpeg','png','webp']) ? 'image' : 'pdf';
        }
        $docIcons = [
            'birth_certificate' => 'fa-baby',
            'clinic_card'       => 'fa-syringe',
            'parent_ids'        => 'fa-id-card',
            'proof_address'     => 'fa-home',
        ];
        $docIcon = $docIcons[$doc['type']] ?? 'fa-file';
    @endphp
    <div class="doc-row">
        <div class="doc-icon {{ $iconClass }}">
            <i class="fas {{ $doc['uploaded'] ? ($iconClass === 'image' ? 'fa-file-image' : 'fa-file-pdf') : $docIcon }}"></i>
        </div>
        <div class="doc-body">
            <div class="doc-name">{{ $doc['label'] }}</div>
            @if($doc['uploaded'])
                <div class="doc-meta">
                    <i class="fas fa-check-circle me-1" style="color:#16a34a;font-size:.65rem;"></i>
                    Uploaded {{ $doc['uploaded_at'] }}
                    &bull; {{ strtoupper($doc['ext']) }}
                </div>
            @else
                <div class="doc-meta">Not yet uploaded</div>
            @endif
        </div>
        <div class="doc-actions">
            @if($doc['uploaded'])
                <span class="status-pill uploaded"><i class="fas fa-check me-1" style="font-size:.6rem;"></i> Uploaded</span>
                <a href="{{ route('parent.documents.view', [$entry['app_id'], $doc['type']]) }}" target="_blank" class="btn-upload">
                    <i class="fas fa-eye me-1"></i> View
                </a>
                <button type="button" class="btn-upload"
                        data-bs-toggle="modal" data-bs-target="#uploadModal"
                        data-app="{{ $entry['app_id'] }}"
                        data-type="{{ $doc['type'] }}"
                        data-label="{{ $doc['label'] }}"
                        title="Replace document">
                    <i class="fas fa-redo me-1"></i> Replace
                </button>
            @else
                <span class="status-pill missing">Missing</span>
                <button type="button" class="btn-upload"
                        data-bs-toggle="modal" data-bs-target="#uploadModal"
                        data-app="{{ $entry['app_id'] }}"
                        data-type="{{ $doc['type'] }}"
                        data-label="{{ $doc['label'] }}">
                    <i class="fas fa-upload me-1"></i> Upload
                </button>
            @endif
        </div>
    </div>
    @endforeach

</div>
@empty
<div style="background:#fff;border-radius:16px;border:1px solid #f0f0f0;padding:60px 30px;text-align:center;">
    <div style="width:60px;height:60px;background:#f0f9ff;border-radius:15px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
        <i class="fas fa-folder-open fa-xl" style="color:#bae6fd;"></i>
    </div>
    <div style="font-weight:700;color:#1a1f2e;margin-bottom:6px;">No applications found</div>
    <p style="font-size:.84rem;color:#94a3b8;margin:0;">Document upload will be available once an application is submitted.</p>
</div>
@endforelse

{{-- ── Upload Modal ──────────────────────────────────────────────────────── --}}
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:16px;border:1px solid #f0f0f0;box-shadow:0 8px 40px rgba(0,0,0,.12);">
            <div class="modal-header" style="border-bottom:1px solid #f3f4f6;padding:18px 24px;">
                <h6 class="modal-title fw-bold" id="uploadModalLabel">Upload Document</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('parent.documents.upload') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="app_id"   id="modalAppId">
                <input type="hidden" name="doc_type" id="modalDocType">
                <div class="modal-body" style="padding:22px 24px;">
                    <div class="mb-3 p-3 rounded" style="background:#f0f9ff;border:1px solid #bae6fd;">
                        <div style="font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:#0077B6;margin-bottom:2px;">Document</div>
                        <div style="font-size:.9rem;font-weight:700;color:#1a1f2e;" id="modalDocLabel">—</div>
                    </div>
                    <div class="mb-1">
                        <label class="form-label fw-semibold" style="font-size:.84rem;">Select File</label>
                        <input type="file" name="file" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                        <div class="form-text" style="font-size:.74rem;">Accepted: PDF, JPG, PNG &mdash; max 5 MB</div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top:1px solid #f3f4f6;padding:14px 24px;gap:8px;">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm rounded-pill px-4"
                            style="background:#0077B6;color:#fff;border:none;font-weight:600;">
                        <i class="fas fa-upload me-1"></i> Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.getElementById('uploadModal').addEventListener('show.bs.modal', function (e) {
    const btn = e.relatedTarget;
    document.getElementById('modalAppId').value    = btn.dataset.app;
    document.getElementById('modalDocType').value  = btn.dataset.type;
    document.getElementById('modalDocLabel').textContent = btn.dataset.label;
});
</script>
@endpush
