@extends('layouts.public')

@section('title', ($program['name'] ?? 'Program') . ' - Peekaboo Daycare & Preschool')
@section('description', 'Learn about the ' . ($program['name'] ?? '') . ' programme at Peekaboo Daycare in Parklands, Cape Town. ' . ($program['description'] ?? ''))

@section('content')
<style>
/* ============================================================
   PROGRAM DETAIL PAGE
============================================================ */
.pb-page-header {
    background: var(--color-surface); padding: 64px 0 56px;
}
.pb-page-header__title {
    font-family: var(--font-heading); font-size: clamp(2rem,4vw,3rem); font-weight: 800;
    color: var(--color-text); margin: 0 0 12px;
}
.pb-page-header__breadcrumb {
    list-style: none; padding: 0; margin: 0; display: flex; gap: 8px; flex-wrap: wrap;
    font-family: var(--font-body); font-size: 16px; color: var(--color-muted);
}
.pb-page-header__breadcrumb a { color: var(--color-primary); text-decoration: none; }
.pb-page-header__breadcrumb li + li::before { content: '/'; margin-right: 8px; color: var(--color-muted); }

/* ── Main Content ── */
.pb-prog-detail { padding: 90px 0 100px; background: #fff; }

.pb-prog-detail__photo {
    border-radius: var(--radius-lg); overflow: hidden; margin-bottom: 32px;
}
.pb-prog-detail__photo img {
    width: 100%; height: 420px; object-fit: cover; display: block;
}

.pb-prog-detail__badge {
    display: inline-flex; align-items: center; gap: 8px;
    font-family: var(--font-body); font-size: 12px; font-weight: 700;
    letter-spacing: 1.5px; text-transform: uppercase;
    padding: 7px 18px; border-radius: var(--radius-pill); margin-bottom: 16px;
}
.pb-prog-detail__age {
    font-family: var(--font-heading); font-size: 13px; font-weight: 700;
    color: var(--color-muted); letter-spacing: 1px; text-transform: uppercase;
    margin-bottom: 12px; display: block;
}
.pb-prog-detail__title {
    font-family: var(--font-heading); font-size: clamp(2rem,3.5vw,2.8rem); font-weight: 900;
    color: var(--color-text); line-height: 1.15; margin-bottom: 24px;
}
.pb-prog-detail__desc {
    font-family: var(--font-body); font-size: 17px; color: var(--color-body); line-height: 1.85; margin-bottom: 32px;
}

/* Meta chips */
.pb-prog-detail__meta { display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 36px; }
.pb-prog-detail__chip {
    display: inline-flex; align-items: center; gap: 8px;
    font-family: var(--font-body); font-size: 14px; font-weight: 600;
    color: var(--color-text); background: var(--color-surface);
    padding: 10px 20px; border-radius: var(--radius-pill);
}

/* Features */
.pb-prog-detail__features-title {
    font-family: var(--font-heading); font-size: 18px; font-weight: 800;
    color: var(--color-text); margin-bottom: 18px;
}
.pb-prog-detail__features {
    list-style: none; padding: 0; margin: 0 0 36px;
    display: grid; grid-template-columns: 1fr 1fr; gap: 12px 24px;
}
@media (max-width: 575px) { .pb-prog-detail__features { grid-template-columns: 1fr; } }
.pb-prog-detail__features li {
    display: flex; align-items: center; gap: 10px;
    font-family: var(--font-body); font-size: 15px; color: var(--color-body);
}
.pb-prog-detail__features li i { font-size: 14px; flex-shrink: 0; }

/* Sidebar card */
.pb-prog-detail__sidebar {
    background: var(--color-surface); border-radius: var(--radius-lg); padding: 36px 32px;
    position: sticky; top: 100px;
}
.pb-prog-detail__sidebar-title {
    font-family: var(--font-heading); font-size: 20px; font-weight: 800;
    color: var(--color-text); margin-bottom: 24px;
}
.pb-prog-detail__sidebar-row {
    display: flex; align-items: flex-start; gap: 14px; margin-bottom: 20px;
    padding-bottom: 20px; border-bottom: 1px solid #e8eaed;
}
.pb-prog-detail__sidebar-row:last-of-type { border-bottom: none; margin-bottom: 24px; }
.pb-prog-detail__sidebar-icon {
    width: 44px; height: 44px; border-radius: var(--radius-sm);
    background: #fff; display: flex; align-items: center; justify-content: center;
    font-size: 18px; flex-shrink: 0;
}
.pb-prog-detail__sidebar-label {
    font-family: var(--font-body); font-size: 12px; font-weight: 600;
    text-transform: uppercase; letter-spacing: 1px; color: var(--color-muted); display: block; margin-bottom: 4px;
}
.pb-prog-detail__sidebar-val {
    font-family: var(--font-body); font-size: 15px; font-weight: 600; color: var(--color-text);
}
.pb-prog-detail__sidebar-cta {
    display: block; text-align: center;
    font-family: var(--font-heading); font-size: 16px; font-weight: 800;
    background: var(--color-primary); color: #fff; padding: 16px;
    border-radius: var(--radius-pill); text-decoration: none; margin-bottom: 12px;
    transition: all 0.3s;
}
.pb-prog-detail__sidebar-cta:hover { background: var(--color-primary-dk); color: #fff; transform: translateY(-2px); }
.pb-prog-detail__sidebar-cta-outline {
    display: block; text-align: center;
    font-family: var(--font-heading); font-size: 15px; font-weight: 700;
    background: transparent; color: var(--color-primary); padding: 14px;
    border-radius: var(--radius-pill); border: 2px solid var(--color-primary);
    text-decoration: none; transition: all 0.3s;
}
.pb-prog-detail__sidebar-cta-outline:hover { background: var(--color-primary); color: #fff; }

/* Other programs */
.pb-other-programs { background: var(--color-surface); padding: 80px 0 90px; }
.pb-prog-mini-card {
    background: #fff; border-radius: var(--radius-md); overflow: hidden;
    display: flex; align-items: center; gap: 0; text-decoration: none;
    transition: transform 0.3s; height: 100%;
}
.pb-prog-mini-card:hover { transform: translateY(-4px); }
.pb-prog-mini-card__photo { width: 100px; flex-shrink: 0; height: 100%; min-height: 100px; }
.pb-prog-mini-card__photo img { width: 100%; height: 100%; object-fit: cover; display: block; }
.pb-prog-mini-card__body { padding: 16px 20px; }
.pb-prog-mini-card__name {
    font-family: var(--font-heading); font-size: 16px; font-weight: 800;
    color: var(--color-text); margin-bottom: 4px;
}
.pb-prog-mini-card__age {
    font-family: var(--font-body); font-size: 13px; color: var(--color-muted);
}
</style>

@php
$colours = [
    'baby-room'   => ['badge_bg' => 'rgba(0,119,182,0.1)',   'badge_txt' => 'var(--color-primary)',  'icon_bg' => 'var(--color-primary)',  'icon' => 'fa-baby',           'check' => 'var(--color-primary)'],
    'toddlers'    => ['badge_bg' => 'rgba(209,129,9,0.1)',   'badge_txt' => 'var(--color-warm)',     'icon_bg' => 'var(--color-warm)',     'icon' => 'fa-child-reaching', 'check' => 'var(--color-warm)'],
    'preschool'   => ['badge_bg' => 'rgba(112,22,126,0.1)',  'badge_txt' => 'var(--color-accent)',   'icon_bg' => 'var(--color-accent)',   'icon' => 'fa-palette',        'check' => 'var(--color-accent)'],
    'kindergarten'=> ['badge_bg' => 'rgba(46,125,50,0.1)',   'badge_txt' => 'var(--color-success)',  'icon_bg' => 'var(--color-success)',  'icon' => 'fa-graduation-cap', 'check' => 'var(--color-success)'],
];
$c = $colours[$program['id']] ?? $colours['preschool'];
$classImages = [
    'baby-room'    => 'assets/img/class/class-1-1.jpg',
    'toddlers'     => 'assets/img/class/class-details-big-image-1.jpg',
    'preschool'    => 'assets/img/class/class-1-3.jpg',
    'kindergarten' => 'assets/img/class/class-1-4.jpg',
];
$photo = asset($classImages[$program['id']] ?? 'assets/img/class/class-1-3.jpg');
@endphp

<!-- Page Header -->
<div class="pb-page-header">
    <div class="container">
        <h1 class="pb-page-header__title">{{ $program['name'] }}</h1>
        <ul class="pb-page-header__breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('programs') }}">Programs</a></li>
            <li>{{ $program['name'] }}</li>
        </ul>
    </div>
</div>

<!-- Program Detail -->
<section class="pb-prog-detail">
    <div class="container">
        <div class="row gx-5">
            <!-- Left: Main Content -->
            <div class="col-lg-8 wow itfadeLeft">
                <div class="pb-prog-detail__photo">
                    <img src="{{ $photo }}" alt="{{ $program['name'] }} at Peekaboo Daycare">
                </div>

                <span class="pb-prog-detail__badge" style="background:{{ $c['badge_bg'] }};color:{{ $c['badge_txt'] }};">
                    <i class="fa-solid {{ $c['icon'] }}"></i> {{ $program['name'] }}
                </span>
                <span class="pb-prog-detail__age">Age Group: {{ $program['age'] }}</span>
                <h1 class="pb-prog-detail__title">{{ $program['name'] }}</h1>
                <p class="pb-prog-detail__desc">{{ $program['description'] }}</p>
                <p class="pb-prog-detail__desc">At Peekaboo, this programme is delivered by qualified educators in a safe, stimulating environment where your child feels loved and inspired every single day. We maintain small group sizes to ensure each child receives the individual attention they deserve.</p>

                <div class="pb-prog-detail__meta">
                    <span class="pb-prog-detail__chip"><i class="fa-solid fa-users" style="color:{{ $c['check'] }}"></i> 1:{{ $program['ratio'] ?? '6' }} ratio</span>
                    <span class="pb-prog-detail__chip"><i class="fa-solid fa-child" style="color:{{ $c['check'] }}"></i> Max {{ $program['capacity'] ?? 12 }} children</span>
                    <span class="pb-prog-detail__chip"><i class="fa-solid fa-certificate" style="color:{{ $c['check'] }}"></i> Qualified educators</span>
                    <span class="pb-prog-detail__chip"><i class="fa-solid fa-book" style="color:{{ $c['check'] }}"></i> CAPS aligned</span>
                </div>

                <h3 class="pb-prog-detail__features-title">What Your Child Will Experience</h3>
                <ul class="pb-prog-detail__features">
                    @foreach($program['features'] as $feature)
                    <li>
                        <i class="fa-solid fa-circle-check" style="color:{{ $c['check'] }}"></i>
                        {{ $feature }}
                    </li>
                    @endforeach
                    <li><i class="fa-solid fa-circle-check" style="color:{{ $c['check'] }}"></i>Daily parent communication</li>
                    <li><i class="fa-solid fa-circle-check" style="color:{{ $c['check'] }}"></i>Regular progress updates</li>
                    <li><i class="fa-solid fa-circle-check" style="color:{{ $c['check'] }}"></i>Healthy snacks & meals</li>
                    <li><i class="fa-solid fa-circle-check" style="color:{{ $c['check'] }}"></i>Safe outdoor play area</li>
                </ul>

                <!-- A Day in the Life -->
                <div style="background:var(--color-surface);border-radius:var(--radius-md);padding:32px 28px;margin-top:8px;">
                    <h3 style="font-family:var(--font-heading);font-size:18px;font-weight:800;color:var(--color-text);margin-bottom:20px;"><i class="fa-solid fa-clock" style="color:{{ $c['check'] }};margin-right:8px;"></i>A Typical Day</h3>
                    <div style="display:grid;grid-template-columns:auto 1fr;gap:10px 16px;font-family:var(--font-body);font-size:15px;color:var(--color-body);align-items:center;">
                        <span style="font-weight:700;color:{{ $c['check'] }};white-space:nowrap;">06:00 – 07:30</span><span>Early drop-off &amp; free play</span>
                        <span style="font-weight:700;color:{{ $c['check'] }};white-space:nowrap;">07:30 – 08:30</span><span>Circle time, morning greetings &amp; prayer</span>
                        <span style="font-weight:700;color:{{ $c['check'] }};white-space:nowrap;">08:30 – 09:00</span><span>Morning snack</span>
                        <span style="font-weight:700;color:{{ $c['check'] }};white-space:nowrap;">09:00 – 11:00</span><span>Structured learning activities</span>
                        <span style="font-weight:700;color:{{ $c['check'] }};white-space:nowrap;">11:00 – 11:30</span><span>Outdoor play &amp; gross motor skills</span>
                        <span style="font-weight:700;color:{{ $c['check'] }};white-space:nowrap;">11:30 – 12:30</span><span>Lunch &amp; social time</span>
                        <span style="font-weight:700;color:{{ $c['check'] }};white-space:nowrap;">12:30 – 14:00</span><span>Rest / quiet time (full day)</span>
                        <span style="font-weight:700;color:{{ $c['check'] }};white-space:nowrap;">14:00 – 16:00</span><span>Afternoon activities &amp; creative play</span>
                        <span style="font-weight:700;color:{{ $c['check'] }};white-space:nowrap;">16:00 – 18:00</span><span>Afternoon snack &amp; parent pick-up</span>
                    </div>
                </div>
            </div>

            <!-- Right: Sidebar -->
            <div class="col-lg-4 wow itfadeRight">
                <div class="pb-prog-detail__sidebar">
                    <h3 class="pb-prog-detail__sidebar-title">Programme Details</h3>

                    <div class="pb-prog-detail__sidebar-row">
                        <div class="pb-prog-detail__sidebar-icon"><i class="fa-solid fa-child" style="color:{{ $c['check'] }}"></i></div>
                        <div>
                            <span class="pb-prog-detail__sidebar-label">Age Group</span>
                            <span class="pb-prog-detail__sidebar-val">{{ $program['age'] }}</span>
                        </div>
                    </div>

                    <div class="pb-prog-detail__sidebar-row">
                        <div class="pb-prog-detail__sidebar-icon"><i class="fa-solid fa-users" style="color:{{ $c['check'] }}"></i></div>
                        <div>
                            <span class="pb-prog-detail__sidebar-label">Class Size</span>
                            <span class="pb-prog-detail__sidebar-val">Max {{ $program['capacity'] ?? 12 }} · Ratio 1:{{ $program['ratio'] ?? '6' }}</span>
                        </div>
                    </div>

                    <div class="pb-prog-detail__sidebar-row">
                        <div class="pb-prog-detail__sidebar-icon"><i class="fa-solid fa-clock" style="color:{{ $c['check'] }}"></i></div>
                        <div>
                            <span class="pb-prog-detail__sidebar-label">Hours</span>
                            <span class="pb-prog-detail__sidebar-val">Half Day: 06:00–12:00/13:00<br>Full Day: 06:00–18:00</span>
                        </div>
                    </div>

                    <div class="pb-prog-detail__sidebar-row">
                        <div class="pb-prog-detail__sidebar-icon"><i class="fa-solid fa-graduation-cap" style="color:{{ $c['check'] }}"></i></div>
                        <div>
                            <span class="pb-prog-detail__sidebar-label">Curriculum</span>
                            <span class="pb-prog-detail__sidebar-val">CAPS Aligned, Play-Based</span>
                        </div>
                    </div>

                    <div class="pb-prog-detail__sidebar-row">
                        <div class="pb-prog-detail__sidebar-icon"><i class="fa-solid fa-rand-sign" style="color:{{ $c['check'] }}"></i></div>
                        <div>
                            <span class="pb-prog-detail__sidebar-label">Fees From</span>
                            <span class="pb-prog-detail__sidebar-val">R3,800/month (Half Day)<br>R4,200/month (Full Day)</span>
                        </div>
                    </div>

                    <a href="{{ route('enrol.index') }}" class="pb-prog-detail__sidebar-cta">
                        <i class="fa-solid fa-pen-to-square"></i> Enrol Now
                    </a>
                    <a href="{{ route('book-tour') }}" class="pb-prog-detail__sidebar-cta-outline">
                        <i class="fa-regular fa-calendar-check"></i> Book a Tour
                    </a>

                    <div style="margin-top:20px;padding-top:20px;border-top:1px solid #e8eaed;text-align:center;">
                        <a href="https://wa.me/27828989967?text=Hi!%20I%27d%20like%20to%20ask%20about%20the%20{{ urlencode($program['name']) }}%20programme." target="_blank" rel="noopener" style="display:inline-flex;align-items:center;gap:8px;font-family:var(--font-body);font-size:14px;font-weight:700;color:#25D366;text-decoration:none;">
                            <i class="fa-brands fa-whatsapp" style="font-size:20px;"></i> Ask us on WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Other Programs -->
<section class="pb-other-programs">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center wow itfadeUp">
                <h2 style="font-family:var(--font-heading);font-size:clamp(1.6rem,2.5vw,2rem);font-weight:900;color:var(--color-text);margin-bottom:8px;">Explore Our Other Programmes</h2>
            </div>
        </div>
        <div class="row gx-3 gy-3 justify-content-center">
            @foreach($programs as $p)
            @if($p['id'] !== $program['id'])
            <div class="col-lg-3 col-md-6 d-flex wow itfadeUp">
                <a href="{{ route('program.detail', $p['id']) }}" class="pb-prog-mini-card w-100">
                    <div class="pb-prog-mini-card__photo">
                        @php
                        $imgs = ['baby-room'=>'assets/img/class/class-1-1.jpg','toddlers'=>'assets/img/class/class-details-big-image-1.jpg','preschool'=>'assets/img/class/class-1-3.jpg','kindergarten'=>'assets/img/class/class-1-4.jpg'];
                        @endphp
                        <img src="{{ asset($imgs[$p['id']] ?? 'assets/img/class/class-1-3.jpg') }}" alt="{{ $p['name'] }}">
                    </div>
                    <div class="pb-prog-mini-card__body">
                        <p class="pb-prog-mini-card__name">{{ $p['name'] }}</p>
                        <span class="pb-prog-mini-card__age">{{ $p['age'] }}</span>
                    </div>
                </a>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

@endsection

