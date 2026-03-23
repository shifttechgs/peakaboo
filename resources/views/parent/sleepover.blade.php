@extends('layouts.portal')

@section('title', 'Sleepover')
@section('portal-name', 'Parent Portal')
@section('page-title', 'Sleepover')

@section('sidebar-nav')
@include('parent.partials.sidebar')
@endsection

@section('content')
<div class="portal-card mb-4" style="background: linear-gradient(135deg, #ede9fe 0%, #c4b5fd 100%);">
    <div class="portal-card-body py-4">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-circle bg-white d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                <i class="fas fa-moon fa-lg" style="color:#7c3aed;"></i>
            </div>
            <div>
                <h4 class="mb-1 fw-bold" style="color:#4c1d95;">Sleepover Night</h4>
                <p class="mb-0" style="color:#4c1d95;opacity:.75;">Book your child for a fun supervised sleepover at Peekaboo!</p>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success d-flex align-items-center gap-2 mb-4" style="border-radius:12px;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

{{-- Info notice --}}
<div class="portal-card mb-4">
    <div class="portal-card-body">
        <div class="d-flex gap-3 align-items-start">
            <div class="rounded d-flex align-items-center justify-content-center" style="width:42px;height:42px;background:#f5f3ff;flex-shrink:0;">
                <i class="fas fa-info-circle" style="color:#7c3aed;"></i>
            </div>
            <div style="font-size:.86rem;color:#374151;">
                <strong>How it works:</strong> Select an upcoming sleepover date below and choose which child to register.
                A confirmation will be sent to your email once your spot is secured. Sleepovers run from <strong>17:00 Friday</strong>
                until <strong>08:00 Saturday</strong> morning. All activities are fully supervised by our staff.
                <span style="color:#7c3aed;font-weight:600;">Children must be 3 years or older to participate.</span>
            </div>
        </div>
    </div>
</div>

{{-- Upcoming sleepovers --}}
<div class="row g-4">
    @forelse($sleepovers as $sleepover)
    <div class="col-md-6 col-lg-4">
        <div class="portal-card h-100">
            <div class="portal-card-body d-flex flex-column">
                {{-- Theme badge --}}
                <div class="mb-3">
                    <span class="badge rounded-pill px-3 py-2" style="background:#f5f3ff;color:#7c3aed;font-size:.76rem;font-weight:700;">
                        <i class="fas fa-star me-1"></i> {{ $sleepover['theme'] }}
                    </span>
                </div>

                {{-- Title --}}
                <h5 class="fw-bold mb-2">{{ $sleepover['title'] }}</h5>
                <p class="text-muted mb-3" style="font-size:.86rem;">{{ $sleepover['description'] }}</p>

                {{-- Details --}}
                <div class="mb-3" style="font-size:.84rem;">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="fas fa-calendar-day" style="width:18px;color:#7c3aed;"></i>
                        <span><strong>{{ $sleepover['date'] }}</strong> ({{ $sleepover['day'] }})</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="fas fa-clock" style="width:18px;color:#7c3aed;"></i>
                        <span>{{ $sleepover['time'] }}</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="fas fa-tag" style="width:18px;color:#7c3aed;"></i>
                        <span><strong>R{{ number_format($sleepover['cost']) }}</strong> per child</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="fas fa-users" style="width:18px;color:#7c3aed;"></i>
                        <span>{{ $sleepover['spots_left'] }} spots remaining</span>
                    </div>
                </div>

                {{-- Apply form --}}
                <div class="mt-auto pt-3" style="border-top:1px solid #f3f4f6;">
                    @if($children->count())
                    <form method="POST" action="{{ route('parent.sleepover.apply') }}">
                        @csrf
                        <input type="hidden" name="sleepover_id" value="{{ $sleepover['id'] }}">
                        <select name="child_id" class="form-select form-select-sm mb-2" style="border-radius:8px;font-size:.82rem;">
                            @foreach($children as $child)
                                @if($child['status'] === 'approved')
                                <option value="{{ $child['id'] }}">{{ $child['name'] }} ({{ $child['age'] }})</option>
                                @endif
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm rounded-pill w-100 text-white" style="background:#7c3aed;">
                            <i class="fas fa-paper-plane me-1"></i> Apply for Sleepover
                        </button>
                    </form>
                    @else
                    <div class="text-center py-2">
                        <small class="text-muted">No eligible children for sleepover booking.</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="portal-card">
            <div class="portal-card-body text-center py-5">
                <i class="fas fa-moon fa-3x text-muted opacity-25 mb-3"></i>
                <h5 class="text-muted">No upcoming sleepovers</h5>
                <p class="text-muted mb-0">Check back soon — we'll announce new sleepover dates on the portal.</p>
            </div>
        </div>
    </div>
    @endforelse
</div>

{{-- What to bring --}}
<div class="portal-card mt-4">
    <div class="portal-card-header">
        <i class="fas fa-suitcase me-2" style="color:#7c3aed;"></i> What to Bring
    </div>
    <div class="portal-card-body">
        <div class="row g-3">
            @foreach([
                ['Pyjamas & change of clothes', 'fa-tshirt'],
                ['Sleeping bag or blanket', 'fa-bed'],
                ['Toothbrush & toiletries', 'fa-pump-soap'],
                ['Favourite teddy or comfort item', 'fa-teddy-bear'],
                ['Any medications (labelled)', 'fa-pills'],
                ['Labelled water bottle', 'fa-glass-water'],
            ] as [$item, $icon])
            <div class="col-md-4 col-sm-6">
                <div class="d-flex align-items-center gap-3 p-3 rounded" style="background:#f8f9fa;">
                    <i class="fas {{ $icon }}" style="color:#7c3aed;width:20px;text-align:center;"></i>
                    <span style="font-size:.86rem;">{{ $item }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

