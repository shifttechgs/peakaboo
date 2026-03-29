@extends('layouts.public')

@section('title', 'Programmes — Baby Room to Grade R | Peekaboo Daycare Parklands, Cape Town')
@section('description', 'From Baby Room (3 months) to Grade R — discover age-appropriate programmes at Peekaboo Daycare in Parklands, Cape Town. CAPS-aligned, qualified teachers, low child-to-teacher ratios.')
@section('keywords', 'preschool programmes Cape Town, baby room daycare Parklands, toddler programme Cape Town, Grade R Parklands Cape Town, CAPS Grade R preschool, infant care Cape Town, nursery school programmes Parklands')
@section('canonical', route('programs'))
@section('og_title', 'Programmes — Baby Room to Grade R | Peekaboo Daycare Parklands')
@section('og_description', 'From Baby Room (3 months) to Grade R — age-appropriate programmes at Peekaboo Daycare Parklands, Cape Town. CAPS-aligned, low child-to-teacher ratios.')

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "WebPage",
  "@@id": "{{ route('programs') }}#webpage",
  "url": "{{ route('programs') }}",
  "name": "Programmes — Baby Room to Grade R | Peekaboo Daycare Parklands, Cape Town",
  "description": "From Baby Room (3 months) to Grade R — discover age-appropriate programmes at Peekaboo Daycare in Parklands, Cape Town.",
  "isPartOf": {"@@id": "{{ url('/') }}/#website"},
  "breadcrumb": {
    "@@type": "BreadcrumbList",
    "itemListElement": [
      {"@@type": "ListItem", "position": 1, "name": "Home", "item": "{{ route('home') }}"},
      {"@@type": "ListItem", "position": 2, "name": "Programmes", "item": "{{ route('programs') }}"}
    ]
  }
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "ItemList",
  "name": "Peekaboo Daycare Programmes",
  "description": "All programmes offered at Peekaboo Daycare & Preschool in Parklands, Cape Town",
  "itemListElement": [
    {"@@type": "ListItem", "position": 1, "name": "Baby Room (3 months – 18 months)", "url": "{{ route('program.detail', 'baby-room') }}"},
    {"@@type": "ListItem", "position": 2, "name": "Toddlers (18 months – 3 years)", "url": "{{ route('program.detail', 'toddlers') }}"},
    {"@@type": "ListItem", "position": 3, "name": "Preschool (3 – 4 years)", "url": "{{ route('program.detail', 'preschool') }}"},
    {"@@type": "ListItem", "position": 4, "name": "Grade R / Kindergarten (5 – 6 years)", "url": "{{ route('program.detail', 'kindergarten') }}"}
  ]
}
</script>
@endpush

@section('content')

{{-- ══════════════════════════════════════════════════
     PAGE HERO — surface bg, shapes, Edunity CTA btns
     ══════════════════════════════════════════════════ --}}
<section class="pb-page-hero fix p-relative">
<style>
.pb-page-hero {
    background: var(--color-surface);
    padding: 80px 0 72px;
    overflow: hidden; position: relative;
}
.pb-page-hero__shape-1 {
    position: absolute; top: -60px; right: -80px; opacity: .3; z-index: 0;
    animation: itswing 4s ease-in-out infinite alternate;
    transform-origin: top right;
}
.pb-page-hero__shape-2 {
    position: absolute; bottom: -30px; left: -50px; opacity: .2; z-index: 0;
    animation: itswing 6s ease-in-out infinite alternate;
}
@@keyframes itswing {
    0%   { transform: rotate(0deg); }
    100% { transform: rotate(6deg); }
}
.pb-page-hero__breadcrumb {
    list-style: none; padding: 0; margin: 0 0 20px;
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap;
    font-family: var(--font-body); font-size: 14px;
}
.pb-page-hero__breadcrumb li { color: var(--color-muted); }
.pb-page-hero__breadcrumb a { color: var(--color-primary); text-decoration: none; transition: color .25s; }
.pb-page-hero__breadcrumb a:hover { color: var(--color-primary-dk); }
.pb-page-hero__breadcrumb li + li::before { content: '/'; margin-right: 6px; color: var(--color-muted); }

/* Programme chips — right column */
.pb-prog-chips { display: flex; flex-direction: column; gap: 16px; padding-left: 20px; }
@@media (max-width:991px) { .pb-prog-chips { padding-left: 0; margin-top: 44px; flex-direction: row; flex-wrap: wrap; } }

.pb-prog-chip {
    display: flex; align-items: center; gap: 16px;
    background: #fff; border-radius: var(--radius-md);
    padding: 16px 24px; min-width: 250px;
    transition: transform .3s ease;
}
.pb-prog-chip:hover { transform: translateX(6px); }
.pb-prog-chip__icon {
    width: 52px; height: 52px; border-radius: 14px; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; color: #fff;
}
.pb-prog-chip__name { font-family: var(--font-heading); font-size: 16px; font-weight: 800; color: var(--color-text); display: block; margin-bottom: 2px; }
.pb-prog-chip__age  { font-family: var(--font-body); font-size: 13px; color: var(--color-muted); }
</style>

    <div class="pb-page-hero__shape-1 d-none d-lg-block">
        <img src="{{ asset('assets/img/about/shape-4-4.png') }}" alt="" style="width:280px;">
    </div>
    <div class="pb-page-hero__shape-2 d-none d-lg-block">
        <img src="{{ asset('assets/img/hero/shape-2-3.png') }}" alt="" style="width:200px;">
    </div>

    <div class="container" style="position:relative;z-index:2;">
        <div class="row align-items-center">

            <div class="col-lg-6 wow itfadeLeft" data-wow-duration=".9s" data-wow-delay=".1s">
                <ul class="pb-page-hero__breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Programs</li>
                </ul>
                <span class="it-section-subtitle-5 orange" style="margin-bottom:18px;display:inline-flex;align-items:center;gap:8px;">
                    <i class="fa-solid fa-star"></i> 3 Months – Grade R
                </span>
                <h1 class="ed-slider-title" style="font-size:clamp(2.2rem,4.5vw,3.5rem);margin-bottom:22px;">
                    The Right Program<br>for <span style="color:var(--color-primary)">Every Age</span>
                </h1>
                <div class="ed-hero-2-text mb-30">
                    <p>Each of our four programmes is carefully designed to match your child's developmental stage — nurturing curiosity, confidence, and a lifelong love of learning.</p>
                </div>
                <div class="ed-hero-2-button-wrapper">
                    <div class="ed-hero-2-button d-flex align-items-center flex-wrap">
                        <a class="ed-btn-radius" href="{{ route('enrol.index') }}">Enrol Now</a>
                        <a class="ed-btn-radius ed-btn-radius--outline" href="{{ route('book-tour') }}">
                            <i class="fa-regular fa-calendar-check"></i> Book a Tour
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 wow itfadeRight" data-wow-duration=".9s" data-wow-delay=".3s">
                <div class="pb-prog-chips">
                    <div class="pb-prog-chip">
                        <span class="pb-prog-chip__icon" style="background:var(--color-primary)"><i class="fa-solid fa-baby"></i></span>
                        <span>
                            <span class="pb-prog-chip__name">Baby Room</span>
                            <span class="pb-prog-chip__age">3 months – 18 months &nbsp;·&nbsp; 1:4 ratio</span>
                        </span>
                    </div>
                    <div class="pb-prog-chip">
                        <span class="pb-prog-chip__icon" style="background:var(--color-warm)"><i class="fa-solid fa-child-reaching"></i></span>
                        <span>
                            <span class="pb-prog-chip__name">Toddlers</span>
                            <span class="pb-prog-chip__age">18 months – 3 years &nbsp;·&nbsp; 1:6 ratio</span>
                        </span>
                    </div>
                    <div class="pb-prog-chip">
                        <span class="pb-prog-chip__icon" style="background:var(--color-accent)"><i class="fa-solid fa-palette"></i></span>
                        <span>
                            <span class="pb-prog-chip__name">Preschool</span>
                            <span class="pb-prog-chip__age">3 – 4 years &nbsp;·&nbsp; 1:8 ratio</span>
                        </span>
                    </div>
                    <div class="pb-prog-chip">
                        <span class="pb-prog-chip__icon" style="background:var(--color-success)"><i class="fa-solid fa-graduation-cap"></i></span>
                        <span>
                            <span class="pb-prog-chip__name">Grade R</span>
                            <span class="pb-prog-chip__age">5 – 6 years &nbsp;·&nbsp; 1:10 ratio</span>
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════════
     OVERVIEW CARDS — exact pb-prog-card from home
     ══════════════════════════════════════════════════ --}}
<section id="overview" style="background:var(--color-surface);padding:100px 0 110px;position:relative;overflow:hidden;">
<style>
/* reuse home-page card CSS verbatim */
.pb-programs__sub { font-family:var(--font-body);font-size:13px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--color-warm);display:block;margin-bottom:12px; }
.pb-programs__heading { font-family:var(--font-heading);font-size:clamp(30px,4vw,46px);font-weight:900;color:var(--color-text);line-height:1.1;margin-bottom:0; }
.pb-programs__heading span { color:var(--color-primary); }
.pb-prog-card { background:#fff;border-radius:var(--radius-lg);overflow:hidden;position:relative;height:100%;display:flex;flex-direction:column;transition:transform .38s cubic-bezier(.22,.61,.36,1); }
.pb-prog-card:hover { transform:translateY(-8px); }
.pb-prog-card__bar { height:5px;width:100%;flex-shrink:0; }
.pb-prog-card__photo { position:relative;height:220px;overflow:hidden; }
.pb-prog-card__photo img { width:100%;height:100%;object-fit:cover;display:block;transition:transform .55s ease; }
.pb-prog-card:hover .pb-prog-card__photo img { transform:scale(1.06); }
.pb-prog-card__age-pill { position:absolute;bottom:14px;left:14px;padding:5px 14px;border-radius:var(--radius-pill);font-family:var(--font-body);font-size:12px;font-weight:700;color:#fff;backdrop-filter:blur(4px); }
.pb-prog-card__body { padding:24px 24px 20px;flex-grow:1;display:flex;flex-direction:column; }
.pb-prog-card__icon-wrap { width:52px;height:52px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;margin-bottom:14px;flex-shrink:0; }
.pb-prog-card__icon-wrap i { font-size:22px;color:#fff; }
.pb-prog-card__title { font-family:var(--font-heading);font-size:21px;font-weight:900;color:var(--color-text);margin-bottom:10px; }
.pb-prog-card__desc { font-family:var(--font-body);font-size:14px;color:var(--color-body);line-height:1.72;flex-grow:1;margin-bottom:20px; }
.pb-prog-card__ratio { display:inline-flex;align-items:center;gap:7px;font-family:var(--font-body);font-size:12px;font-weight:700;padding:5px 14px;border-radius:var(--radius-pill);border:1.5px solid currentColor;margin-bottom:20px; }
.pb-prog-card__cta { display:block;text-align:center;font-family:var(--font-heading);font-size:14px;font-weight:800;color:#fff;padding:12px 24px;border-radius:var(--radius-pill);text-decoration:none;transition:filter .25s ease,transform .25s ease;margin-top:auto; }
.pb-prog-card__cta:hover { filter:brightness(1.1);transform:translateY(-2px);color:#fff; }
.pb-prog-card--blue  .pb-prog-card__bar,.pb-prog-card--blue  .pb-prog-card__cta { background:var(--color-primary); }
.pb-prog-card--blue  .pb-prog-card__age-pill { background:rgba(0,119,182,.80); }
.pb-prog-card--blue  .pb-prog-card__icon-wrap { background:var(--color-primary); }
.pb-prog-card--blue  .pb-prog-card__ratio { color:var(--color-primary); }
.pb-prog-card--warm  .pb-prog-card__bar,.pb-prog-card--warm  .pb-prog-card__cta { background:var(--color-warm); }
.pb-prog-card--warm  .pb-prog-card__age-pill { background:rgba(209,129,9,.80); }
.pb-prog-card--warm  .pb-prog-card__icon-wrap { background:var(--color-warm); }
.pb-prog-card--warm  .pb-prog-card__ratio { color:var(--color-warm); }
.pb-prog-card--accent .pb-prog-card__bar,.pb-prog-card--accent .pb-prog-card__cta { background:var(--color-accent); }
.pb-prog-card--accent .pb-prog-card__age-pill { background:rgba(112,22,126,.80); }
.pb-prog-card--accent .pb-prog-card__icon-wrap { background:var(--color-accent); }
.pb-prog-card--accent .pb-prog-card__ratio { color:var(--color-accent); }
.pb-prog-card--green .pb-prog-card__bar,.pb-prog-card--green .pb-prog-card__cta { background:var(--color-success); }
.pb-prog-card--green .pb-prog-card__age-pill { background:rgba(46,125,50,.80); }
.pb-prog-card--green .pb-prog-card__icon-wrap { background:var(--color-success); }
.pb-prog-card--green .pb-prog-card__ratio { color:var(--color-success); }
</style>

    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center wow itfadeUp">
                <span class="pb-programs__sub">Programs &amp; Age Groups</span>
                <h2 class="pb-programs__heading">A Programme Built for <span>Every Child</span></h2>
            </div>
        </div>
        <div class="row gx-4 gy-4">
            <div class="col-lg-3 col-md-6 d-flex wow itfadeUp" data-wow-delay=".10s">
                <div class="pb-prog-card pb-prog-card--blue w-100">
                    <div class="pb-prog-card__bar"></div>
                    <div class="pb-prog-card__photo">
                        <img src="{{ asset('assets/img/class/class-1-1.jpg') }}" alt="Baby Room" loading="lazy">
                        <span class="pb-prog-card__age-pill">3 – 18 months</span>
                    </div>
                    <div class="pb-prog-card__body">
                        <div class="pb-prog-card__icon-wrap"><i class="fa-solid fa-baby"></i></div>
                        <h3 class="pb-prog-card__title">Baby Room</h3>
                        <p class="pb-prog-card__desc">Your baby's first safe space away from home — loving care, sensory development, and nurturing routines for the youngest explorers.</p>
                        <span class="pb-prog-card__ratio"><i class="fa-solid fa-users"></i> 1:4 ratio</span>
                        <a href="#baby-room" class="pb-prog-card__cta">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 d-flex wow itfadeUp" data-wow-delay=".20s">
                <div class="pb-prog-card pb-prog-card--warm w-100">
                    <div class="pb-prog-card__bar"></div>
                    <div class="pb-prog-card__photo">
                        <img src="{{ asset('assets/img/class/class-details-big-image-1.jpg') }}" alt="Toddlers" loading="lazy">
                        <span class="pb-prog-card__age-pill">18 months – 3 years</span>
                    </div>
                    <div class="pb-prog-card__body">
                        <div class="pb-prog-card__icon-wrap"><i class="fa-solid fa-child-reaching"></i></div>
                        <h3 class="pb-prog-card__title">Toddlers</h3>
                        <p class="pb-prog-card__desc">Active exploration in a safe environment — building confidence, language, and social skills through purposeful play and gentle guidance.</p>
                        <span class="pb-prog-card__ratio"><i class="fa-solid fa-users"></i> 1:6 ratio</span>
                        <a href="#toddlers" class="pb-prog-card__cta">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 d-flex wow itfadeUp" data-wow-delay=".30s">
                <div class="pb-prog-card pb-prog-card--accent w-100">
                    <div class="pb-prog-card__bar"></div>
                    <div class="pb-prog-card__photo">
                        <img src="{{ asset('assets/img/class/class-1-3.jpg') }}" alt="Preschool" loading="lazy">
                        <span class="pb-prog-card__age-pill">3 – 4 years</span>
                    </div>
                    <div class="pb-prog-card__body">
                        <div class="pb-prog-card__icon-wrap"><i class="fa-solid fa-palette"></i></div>
                        <h3 class="pb-prog-card__title">Preschool</h3>
                        <p class="pb-prog-card__desc">Building independence and curiosity — creative learning and early literacy skills that spark a lifelong love of discovery.</p>
                        <span class="pb-prog-card__ratio"><i class="fa-solid fa-users"></i> 1:8 ratio</span>
                        <a href="#preschool" class="pb-prog-card__cta">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 d-flex wow itfadeUp" data-wow-delay=".40s">
                <div class="pb-prog-card pb-prog-card--green w-100">
                    <div class="pb-prog-card__bar"></div>
                    <div class="pb-prog-card__photo">
                        <img src="{{ asset('assets/img/class/class-1-4.jpg') }}" alt="Grade R" loading="lazy">
                        <span class="pb-prog-card__age-pill">5 – 6 years</span>
                    </div>
                    <div class="pb-prog-card__body">
                        <div class="pb-prog-card__icon-wrap"><i class="fa-solid fa-graduation-cap"></i></div>
                        <h3 class="pb-prog-card__title">Grade R</h3>
                        <p class="pb-prog-card__desc">Fully prepared for big school — CAPS-aligned curriculum, confidence-building, and a deep love for learning that lasts a lifetime.</p>
                        <span class="pb-prog-card__ratio"><i class="fa-solid fa-users"></i> 1:10 ratio</span>
                        <a href="#grade-r" class="pb-prog-card__cta">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════════
     PROGRAMME DEEP-DIVES
     Mirrors .it-about-5-area layout from home page
     ══════════════════════════════════════════════════ --}}
<style>
/* Deep-dive sections */
.pb-prog-detail-section { padding:100px 0;position:relative;overflow:hidden; }
.pb-prog-detail-section--white   { background:#fff; }
.pb-prog-detail-section--surface { background:var(--color-surface); }
.pb-prog-detail-section__shape { position:absolute;z-index:0;opacity:.22; }

/* Photo wrap — mirrors ed-hero-thumb-wrap */
.pb-prog-img-wrap { position:relative;border-radius:var(--radius-lg);overflow:visible; }
.pb-prog-img-main { border-radius:var(--radius-lg);overflow:hidden;box-shadow:0 24px 60px rgba(14,42,70,.11); }
.pb-prog-img-main img { width:100%;height:460px;object-fit:cover;display:block;transition:transform .6s ease; }
.pb-prog-img-wrap:hover .pb-prog-img-main img { transform:scale(1.04); }

/* Floating badge — mirrors ed-hero-thumb-student */
.pb-prog-float {
    position:absolute;bottom:-22px;left:-20px;
    background:#fff;border-radius:var(--radius-md);
    padding:14px 22px;box-shadow:0 8px 32px rgba(14,42,70,.13);
    display:flex;align-items:center;gap:14px;min-width:190px;z-index:3;
}
@@media(max-width:575px){ .pb-prog-float { left:12px;bottom:-16px;padding:10px 14px;min-width:0; } }
.pb-prog-float__icon { width:46px;height:46px;border-radius:12px;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:20px;color:#fff; }
.pb-prog-float__num  { font-family:var(--font-heading);font-size:1.55rem;font-weight:900;color:var(--color-text);line-height:1;display:block; }
.pb-prog-float__lbl  { font-family:var(--font-body);font-size:12px;font-weight:500;color:var(--color-muted); }

/* Stat strip — mirrors ed-funfact items */
.pb-prog-stats {
    display:flex;flex-wrap:wrap;gap:0;
    background:var(--color-card);border-radius:var(--radius-md);
    overflow:hidden;margin-bottom:28px;
}
.pb-prog-stat { flex:1;min-width:100px;text-align:center;padding:18px 12px;border-right:1px solid rgba(14,42,70,.07); }
.pb-prog-stat:last-child { border-right:none; }
.pb-prog-stat__num { font-family:var(--font-heading);font-size:1.75rem;font-weight:900;line-height:1;display:block;margin-bottom:3px; }
.pb-prog-stat__lbl { font-family:var(--font-body);font-size:10px;font-weight:700;letter-spacing:1px;text-transform:uppercase;color:var(--color-muted);display:block; }

/* Feature list — mirrors it-about-5-list */
.pb-prog-feat { list-style:none;padding:0;margin:0 0 32px;columns:2;column-gap:24px; }
@@media(max-width:575px){ .pb-prog-feat { columns:1; } }
.pb-prog-feat li { display:flex;align-items:center;gap:10px;font-family:var(--font-body);font-size:15px;color:var(--color-body);margin-bottom:12px;break-inside:avoid; }
.pb-prog-feat li i { font-size:14px;flex-shrink:0; }
</style>


{{-- 1. BABY ROOM --}}
<section class="pb-prog-detail-section pb-prog-detail-section--white" id="baby-room">
    <div class="pb-prog-detail-section__shape d-none d-xl-block" style="top:-50px;right:-60px;animation:itswing 5s ease-in-out infinite alternate;transform-origin:top right;">
        <img src="{{ asset('assets/img/about/shape-5-4.png') }}" alt="" style="width:240px;">
    </div>
    <div class="container" style="position:relative;z-index:2;">
        <div class="row align-items-center gx-5 gy-5">
            {{-- Photo --}}
            <div class="col-lg-6 wow itfadeLeft" data-wow-duration=".9s" data-wow-delay=".3s">
                <div class="pb-prog-img-wrap">
                    <div class="pb-prog-img-main">
                        <img src="{{ asset('assets/img/class/class-1-1.jpg') }}" alt="Baby Room at Peekaboo Daycare">
                    </div>
                    <div class="pb-prog-float">
                        <span class="pb-prog-float__icon" style="background:var(--color-primary)"><i class="fa-solid fa-users"></i></span>
                        <span>
                            <span class="pb-prog-float__num">1:4</span>
                            <span class="pb-prog-float__lbl">Teacher Ratio</span>
                        </span>
                    </div>
                </div>
            </div>
            {{-- Content --}}
            <div class="col-lg-6 wow itfadeRight" data-wow-duration=".9s" data-wow-delay=".5s">
                <div class="it-about-5-title-box pb-10">
                    <span class="it-section-subtitle-5 orange">
                        <i class="fa-solid fa-baby"></i> Baby Room &nbsp;·&nbsp; 3 months – 18 months
                    </span>
                    <h2 class="ed-section-title">A Loving Start for <span>Your Littlest One</span></h2>
                </div>
                <div class="it-about-5-text mb-20">
                    <p>Our Baby Room is a warm, nurturing sanctuary where every baby's earliest experiences are filled with love, security, and gentle stimulation. We respect each baby's unique routine — sleep, feeding, and play — so they feel completely at home from day one.</p>
                </div>
                <div class="pb-prog-stats mb-20">
                    <div class="pb-prog-stat"><span class="pb-prog-stat__num" style="color:var(--color-primary)">1:4</span><span class="pb-prog-stat__lbl">Ratio</span></div>
                    <div class="pb-prog-stat"><span class="pb-prog-stat__num" style="color:var(--color-primary)">8</span><span class="pb-prog-stat__lbl">Max Babies</span></div>
                    <div class="pb-prog-stat"><span class="pb-prog-stat__num" style="color:var(--color-primary)">100%</span><span class="pb-prog-stat__lbl">Qualified</span></div>
                    <div class="pb-prog-stat"><span class="pb-prog-stat__num" style="color:var(--color-primary)">Daily</span><span class="pb-prog-stat__lbl">Updates</span></div>
                </div>
                <div class="it-about-5-content">
                    <div class="row">
                        <div class="col-6">
                            <div class="it-about-5-list list-style-1 mb-20">
                                <ul>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Individual routines</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Sensory play</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Tummy time</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="it-about-5-list list-style-2 mb-20">
                                <ul>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Sleep respected</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Daily updates</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Hygienic &amp; safe</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="it-feature-button">
                    <a class="ed-btn-radius" href="{{ route('enrol.index') }}">Enrol Now</a>
                    <a class="ed-btn-radius ed-btn-radius--outline" href="{{ route('book-tour') }}">
                        <i class="fa-regular fa-calendar-check"></i> Book a Tour
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- 2. TODDLERS --}}
<section class="pb-prog-detail-section pb-prog-detail-section--surface" id="toddlers">
    <div class="pb-prog-detail-section__shape d-none d-xl-block" style="bottom:-40px;left:-40px;transform:scaleX(-1);animation:itswing 6s ease-in-out infinite alternate;">
        <img src="{{ asset('assets/img/hero/shape-2-3.png') }}" alt="" style="width:200px;">
    </div>
    <div class="container" style="position:relative;z-index:2;">
        <div class="row align-items-center gx-5 gy-5 flex-lg-row-reverse">
            {{-- Photo --}}
            <div class="col-lg-6 wow itfadeRight" data-wow-duration=".9s" data-wow-delay=".3s">
                <div class="pb-prog-img-wrap">
                    <div class="pb-prog-img-main">
                        <img src="{{ asset('assets/img/class/class-details-big-image-1.jpg') }}" alt="Toddlers at Peekaboo Daycare">
                    </div>
                    <div class="pb-prog-float">
                        <span class="pb-prog-float__icon" style="background:var(--color-warm)"><i class="fa-solid fa-users"></i></span>
                        <span><span class="pb-prog-float__num">1:6</span><span class="pb-prog-float__lbl">Teacher Ratio</span></span>
                    </div>
                </div>
            </div>
            {{-- Content --}}
            <div class="col-lg-6 wow itfadeLeft" data-wow-duration=".9s" data-wow-delay=".5s">
                <div class="it-about-5-title-box pb-10">
                    <span class="it-section-subtitle-5 orange">
                        <i class="fa-solid fa-child-reaching"></i> Toddlers &nbsp;·&nbsp; 18 months – 3 years
                    </span>
                    <h2 class="ed-section-title orange">Explore, Discover &amp; <span>Grow Bold</span></h2>
                </div>
                <div class="it-about-5-text mb-20">
                    <p>This is the age of big curiosity and even bigger energy. Our Toddler programme channels that natural drive into meaningful, play-based learning — building language, social skills, and the first sparks of independence.</p>
                </div>
                <div class="pb-prog-stats mb-20">
                    <div class="pb-prog-stat"><span class="pb-prog-stat__num" style="color:var(--color-warm)">1:6</span><span class="pb-prog-stat__lbl">Ratio</span></div>
                    <div class="pb-prog-stat"><span class="pb-prog-stat__num" style="color:var(--color-warm)">12</span><span class="pb-prog-stat__lbl">Max Children</span></div>
                    <div class="pb-prog-stat"><span class="pb-prog-stat__num" style="color:var(--color-warm)">Play</span><span class="pb-prog-stat__lbl">Based</span></div>
                    <div class="pb-prog-stat"><span class="pb-prog-stat__num" style="color:var(--color-warm)">Daily</span><span class="pb-prog-stat__lbl">Updates</span></div>
                </div>
                <div class="it-about-5-content">
                    <div class="row">
                        <div class="col-6">
                            <div class="it-about-5-list list-style-1 mb-20">
                                <ul>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Potty training support</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Language development</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Creative arts &amp; crafts</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="it-about-5-list list-style-2 mb-20">
                                <ul>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Outdoor play daily</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Music &amp; movement</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Social skills</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="it-feature-button">
                    <a class="ed-btn-radius" href="{{ route('enrol.index') }}">Enrol Now</a>
                    <a class="ed-btn-radius ed-btn-radius--outline" href="{{ route('book-tour') }}">
                        <i class="fa-regular fa-calendar-check"></i> Book a Tour
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- 3. PRESCHOOL --}}
<section class="pb-prog-detail-section pb-prog-detail-section--white" id="preschool">
    <div class="pb-prog-detail-section__shape d-none d-xl-block" style="top:-40px;right:-40px;animation:itswing 4s ease-in-out infinite alternate;transform-origin:top right;">
        <img src="{{ asset('assets/img/about/shape-4-4.png') }}" alt="" style="width:240px;">
    </div>
    <div class="container" style="position:relative;z-index:2;">
        <div class="row align-items-center gx-5 gy-5">
            {{-- Photo --}}
            <div class="col-lg-6 wow itfadeLeft" data-wow-duration=".9s" data-wow-delay=".3s">
                <div class="pb-prog-img-wrap">
                    <div class="pb-prog-img-main">
                        <img src="{{ asset('assets/img/class/class-1-3.jpg') }}" alt="Preschool at Peekaboo Daycare">
                    </div>
                    <div class="pb-prog-float">
                        <span class="pb-prog-float__icon" style="background:var(--color-accent)"><i class="fa-solid fa-users"></i></span>
                        <span><span class="pb-prog-float__num">1:8</span><span class="pb-prog-float__lbl">Teacher Ratio</span></span>
                    </div>
                </div>
            </div>
            {{-- Content --}}
            <div class="col-lg-6 wow itfadeRight" data-wow-duration=".9s" data-wow-delay=".5s">
                <div class="it-about-5-title-box pb-10">
                    <span class="it-section-subtitle-5 orange">
                        <i class="fa-solid fa-palette"></i> Preschool &nbsp;·&nbsp; 3 – 4 years
                    </span>
                    <h2 class="ed-section-title">Sparking Creativity &amp; <span>Lifelong Curiosity</span></h2>
                </div>
                <div class="it-about-5-text mb-20">
                    <p>Our Preschool blends structured learning with imaginative play to develop pre-reading, number, and social skills — building the confidence and creativity your child needs to thrive in school and in life.</p>
                </div>
                <div class="pb-prog-stats mb-20">
                    <div class="pb-prog-stat"><span class="pb-prog-stat__num" style="color:var(--color-accent)">1:8</span><span class="pb-prog-stat__lbl">Ratio</span></div>
                    <div class="pb-prog-stat"><span class="pb-prog-stat__num" style="color:var(--color-accent)">15</span><span class="pb-prog-stat__lbl">Max Children</span></div>
                    <div class="pb-prog-stat"><span class="pb-prog-stat__num" style="color:var(--color-accent)">CAPS</span><span class="pb-prog-stat__lbl">Aligned</span></div>
                    <div class="pb-prog-stat"><span class="pb-prog-stat__num" style="color:var(--color-accent)">Term</span><span class="pb-prog-stat__lbl">Reports</span></div>
                </div>
                <div class="it-about-5-content">
                    <div class="row">
                        <div class="col-6">
                            <div class="it-about-5-list list-style-1 mb-20">
                                <ul>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Pre-reading skills</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Number concepts</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Science exploration</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="it-about-5-list list-style-2 mb-20">
                                <ul>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Social development</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Fine motor skills</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Creative arts</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="it-feature-button">
                    <a class="ed-btn-radius" href="{{ route('enrol.index') }}">Enrol Now</a>
                    <a class="ed-btn-radius ed-btn-radius--outline" href="{{ route('book-tour') }}">
                        <i class="fa-regular fa-calendar-check"></i> Book a Tour
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- 4. GRADE R --}}
<section class="pb-prog-detail-section pb-prog-detail-section--surface" id="grade-r">
    <div class="pb-prog-detail-section__shape d-none d-xl-block" style="bottom:-40px;right:-40px;animation:itswing 5s ease-in-out infinite alternate;">
        <img src="{{ asset('assets/img/hero/shape-2-4.png') }}" alt="" style="width:220px;">
    </div>
    <div class="container" style="position:relative;z-index:2;">
        <div class="row align-items-center gx-5 gy-5 flex-lg-row-reverse">
            {{-- Photo --}}
            <div class="col-lg-6 wow itfadeRight" data-wow-duration=".9s" data-wow-delay=".3s">
                <div class="pb-prog-img-wrap">
                    <div class="pb-prog-img-main">
                        <img src="{{ asset('assets/img/class/class-1-4.jpg') }}" alt="Grade R at Peekaboo Daycare">
                    </div>
                    <div class="pb-prog-float">
                        <span class="pb-prog-float__icon" style="background:var(--color-success)"><i class="fa-solid fa-graduation-cap"></i></span>
                        <span><span class="pb-prog-float__num">CAPS</span><span class="pb-prog-float__lbl">Curriculum</span></span>
                    </div>
                </div>
            </div>
            {{-- Content --}}
            <div class="col-lg-6 wow itfadeLeft" data-wow-duration=".9s" data-wow-delay=".5s">
                <div class="it-about-5-title-box pb-10">
                    <span class="it-section-subtitle-5 orange">
                        <i class="fa-solid fa-graduation-cap"></i> Grade R &nbsp;·&nbsp; 5 – 6 years
                    </span>
                    <h2 class="ed-section-title orange">Ready for Big School &amp; <span>Beyond</span></h2>
                </div>
                <div class="it-about-5-text mb-20">
                    <p>Our CAPS-aligned Grade R is a comprehensive school-readiness journey. Children leave Peekaboo confident readers, writers, and thinkers — fully prepared and genuinely excited for Grade 1.</p>
                </div>
                <div class="pb-prog-stats mb-20">
                    <div class="pb-prog-stat"><span class="pb-prog-stat__num" style="color:var(--color-success)">1:10</span><span class="pb-prog-stat__lbl">Ratio</span></div>
                    <div class="pb-prog-stat"><span class="pb-prog-stat__num" style="color:var(--color-success)">20</span><span class="pb-prog-stat__lbl">Max Children</span></div>
                    <div class="pb-prog-stat"><span class="pb-prog-stat__num" style="color:var(--color-success)">CAPS</span><span class="pb-prog-stat__lbl">Curriculum</span></div>
                    <div class="pb-prog-stat"><span class="pb-prog-stat__num" style="color:var(--color-success)">Term</span><span class="pb-prog-stat__lbl">Reports</span></div>
                </div>
                <div class="it-about-5-content">
                    <div class="row">
                        <div class="col-6">
                            <div class="it-about-5-list list-style-1 mb-20">
                                <ul>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Full CAPS curriculum</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Reading &amp; writing</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Mathematics foundations</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="it-about-5-list list-style-2 mb-20">
                                <ul>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Life skills &amp; values</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Readiness assessment</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Term reports issued</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="it-feature-button">
                    <a class="ed-btn-radius" href="{{ route('enrol.index') }}">Enrol Now</a>
                    <a class="ed-btn-radius ed-btn-radius--outline" href="{{ route('book-tour') }}">
                        <i class="fa-regular fa-calendar-check"></i> Book a Tour
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════════
     TESTIMONIALS — exact home structure + classes
     ══════════════════════════════════════════════════ --}}
<div class="it-testimonial-area ed-testimonial-style-2 ed-testimonial-style-3 pb-120 fix p-relative" style="padding-top:110px;background-color:#F0EDE8;">
   <div class="ed-testimonial-shape-1"><img src="{{ asset('assets/img/testimonial/shape-4-1.png') }}" alt=""></div>
   <div class="ed-testimonial-shape-2 d-none d-xxl-block"><img src="{{ asset('assets/img/testimonial/shape-5-3.png') }}" alt=""></div>
   <div class="container container-3">
      <div class="it-testimonial-title-wrap" style="margin-bottom:60px;">
         <div class="row align-items-end">
            <div class="col-lg-6">
               <div class="it-testimonial-title-box">
                  <span class="pb-programs__sub">What Parents Say</span>
                  <h4 class="ed-section-title">Real Words from <span>Real Families</span></h4>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="ed-testimonial-nav">
                  <button class="ed-testimonial-prev"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M9.57031 5.92969L3.50031 11.9997L9.57031 18.0697" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M20.5 12H3.67" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
                  <button class="ed-testimonial-next"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M14.4297 5.92969L20.4997 11.9997L14.4297 18.0697" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.5 12H20.33" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
               </div>
            </div>
         </div>
      </div>
      <div class="row"><div class="col-xl-12">
         <div class="ed-testimonial-wrapper p-relative">
            <div class="swiper-container pb-testi-slider">
               <div class="swiper-wrapper">
                  <div class="swiper-slide"><div class="ed-testimonial-item p-relative">
                     <div class="ed-testimonial-ratting"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                     <div class="ed-testimonial-text"><p>"Best Daycare and School in the area. Most of the staff have been on staff for over 10 years — low staff churn is always a good indicator of a well run business."</p></div>
                     <div class="ed-testimonial-author-box d-flex align-items-center">
                        <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#0077B6,#1a7fcf);">M</div>
                        <div><h5>Melissa Ingram</h5><span>Local Guide · 24 reviews</span></div>
                     </div>
                  </div></div>
                  <div class="swiper-slide"><div class="ed-testimonial-item p-relative">
                     <div class="ed-testimonial-ratting"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                     <div class="ed-testimonial-text"><p>"Peekaboo is more than a daycare — it's truly a family. Both my children have been there since they were 9 months old and the teachers helped me navigate being a mom, through thick and thin."</p></div>
                     <div class="ed-testimonial-author-box d-flex align-items-center">
                        <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#D18109,#f5a623);">D</div>
                        <div><h5>Dominique Warr</h5><span>Local Guide · 6 reviews</span></div>
                     </div>
                  </div></div>
                  <div class="swiper-slide"><div class="ed-testimonial-item p-relative">
                     <div class="ed-testimonial-ratting"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                     <div class="ed-testimonial-text"><p>"The family vibe, friendly faces, and staff who've been together for YEARS is all a parent can ask for. At times she even cries to stay — that says it all!"</p></div>
                     <div class="ed-testimonial-author-box d-flex align-items-center">
                        <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#70167E,#9c2aac);">K</div>
                        <div><h5>Kelly Fortune</h5><span>2 reviews</span></div>
                     </div>
                  </div></div>
                  <div class="swiper-slide"><div class="ed-testimonial-item p-relative">
                     <div class="ed-testimonial-ratting"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                     <div class="ed-testimonial-text"><p>"After an unfortunate experience elsewhere, we found Peekaboo — best decision we ever made. The classes are stunning and the playground is any child's dream!"</p></div>
                     <div class="ed-testimonial-author-box d-flex align-items-center">
                        <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#1a7fcf,#70167E);">A</div>
                        <div><h5>Anandi Piek</h5><span>Local Guide · 26 reviews</span></div>
                     </div>
                  </div></div>
               </div>
            </div>
         </div>
      </div></div>
   </div>
</div>


{{-- ══════════════════════════════════════════════════
     FINAL CTA — exact .pb-cta from home.blade.php
     ══════════════════════════════════════════════════ --}}
<section id="contact" class="pb-cta">
<style>
.pb-cta {
    background: var(--color-surface);
    padding: 110px 0 100px;
    position: relative;
    overflow: hidden;
}
.pb-cta__sub {
    font-family: var(--font-body);
    font-size: 13px; font-weight: 700;
    letter-spacing: 2px; text-transform: uppercase;
    color: var(--color-warm);
    display: inline-flex; align-items: center; gap: 8px;
    margin-bottom: 14px;
}
.pb-cta__sub::before { content: ''; width: 28px; height: 2px; background: var(--color-warm); }
.pb-cta__heading {
    font-family: var(--font-heading);
    font-size: clamp(30px, 4vw, 46px); font-weight: 900;
    color: var(--color-text); line-height: 1.1; margin-bottom: 18px;
}
.pb-cta__heading span { color: var(--color-primary); }
.pb-cta__lead {
    font-family: var(--font-body);
    font-size: 16px; line-height: 1.8;
    color: var(--color-body); margin-bottom: 32px; max-width: 480px;
}
.pb-cta__trust { display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 36px; }
.pb-cta__trust-item { display: flex; align-items: center; gap: 10px; }
.pb-cta__trust-icon {
    width: 40px; height: 40px; border-radius: 50%;
    background: rgba(0,119,182,0.08);
    display: flex; align-items: center; justify-content: center;
    color: var(--color-primary); font-size: 16px; flex-shrink: 0;
}
.pb-cta__trust-text { font-family: var(--font-body); font-size: 13px; font-weight: 600; color: var(--color-text); line-height: 1.3; }
.pb-cta__buttons { display: flex; flex-wrap: wrap; gap: 14px; }
.pb-cta__btn-primary {
    display: inline-flex; align-items: center; gap: 10px;
    font-family: var(--font-body); font-size: 15px; font-weight: 700;
    background: var(--color-primary); color: #fff;
    padding: 16px 34px; border-radius: var(--radius-pill);
    text-decoration: none; border: none;
    transition: transform 0.28s ease, box-shadow 0.28s ease, background 0.28s;
    box-shadow: 0 4px 18px rgba(0,119,182,0.25);
}
.pb-cta__btn-primary:hover { background: var(--color-primary-dk); color: #fff; transform: translateY(-3px); box-shadow: 0 8px 30px rgba(0,119,182,0.35); }
.pb-cta__btn-secondary {
    display: inline-flex; align-items: center; gap: 10px;
    font-family: var(--font-body); font-size: 15px; font-weight: 600;
    background: #fff; color: var(--color-text);
    padding: 16px 34px; border-radius: var(--radius-pill);
    border: 2px solid #e2e6ea; text-decoration: none; transition: all 0.28s ease;
}
.pb-cta__btn-secondary:hover { border-color: var(--color-primary); color: var(--color-primary); transform: translateY(-3px); box-shadow: 0 4px 18px rgba(0,119,182,0.1); }

/* Right card */
.pb-cta__card { background: #fff; border-radius: 20px; padding: 44px 40px; position: relative; }
.pb-cta__card-badge {
    position: absolute; top: -14px; right: 24px;
    background: var(--color-warm); color: #fff;
    font-family: var(--font-body); font-size: 12px; font-weight: 700;
    letter-spacing: 1px; text-transform: uppercase;
    padding: 7px 20px; border-radius: var(--radius-pill);
    animation: pulse-badge 2s ease-in-out infinite;
}
@@keyframes pulse-badge { 0%,100% { transform: scale(1); } 50% { transform: scale(1.05); } }
.pb-cta__card-title { font-family: var(--font-heading); font-size: 24px; font-weight: 800; color: var(--color-text); margin-bottom: 10px; }
.pb-cta__card-desc { font-family: var(--font-body); font-size: 16px; color: var(--color-body); line-height: 1.7; margin-bottom: 28px; }
.pb-cta__card-contacts { display: flex; flex-direction: column; gap: 12px; margin-bottom: 28px; }
.pb-cta__card-contact {
    display: flex; align-items: center; gap: 14px;
    text-decoration: none; padding: 12px 16px;
    background: var(--color-surface); border-radius: 12px;
    transition: background 0.25s, transform 0.25s;
}
.pb-cta__card-contact:hover { background: rgba(0,119,182,0.05); transform: translateX(4px); }
.pb-cta__card-contact-icon {
    width: 42px; height: 42px; border-radius: 50%;
    background: var(--color-primary); color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; flex-shrink: 0;
}
.pb-cta__card-contact-icon--whatsapp { background: #25D366; }
.pb-cta__card-contact-icon--location { background: var(--color-warm); }
.pb-cta__card-contact-label { font-family: var(--font-body); font-size: 13px; font-weight: 600; color: var(--color-muted); text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 3px; }
.pb-cta__card-contact-value { font-family: var(--font-heading); font-size: 17px; font-weight: 700; color: var(--color-text); display: block; }
.pb-cta__card-btn {
    display: block; width: 100%; text-align: center;
    font-family: var(--font-body); font-size: 16px; font-weight: 700;
    background: var(--color-primary); color: #fff;
    padding: 16px; border-radius: var(--radius-pill);
    text-decoration: none; transition: background 0.28s;
}
.pb-cta__card-btn:hover { background: var(--color-primary-dk); color: #fff; }
.pb-cta__card-btn i { margin-right: 6px; }

/* Decorative shape */
.pb-cta__shape { position: absolute; top: 6%; right: -1%; z-index: 0; animation: itswing-2 3s forwards infinite alternate; transform-origin: bottom right; opacity: 0.5; }

@@media (max-width: 991px) { .pb-cta__card { margin-top: 50px; } .pb-cta__lead { max-width: 100%; } }
@@media (max-width: 575px) { .pb-cta { padding: 80px 0; } .pb-cta__card { padding: 28px 22px; } .pb-cta__buttons { flex-direction: column; } .pb-cta__btn-primary, .pb-cta__btn-secondary { justify-content: center; width: 100%; } }
</style>

    <div class="pb-cta__shape d-none d-lg-block">
        <img src="{{ asset('assets/img/about/shape-4-4.png') }}" alt="">
    </div>

    <div class="container" style="position:relative;z-index:2;">
        <div class="row gy-5 align-items-center">

            <!-- Left — Copy + Trust + Buttons -->
            <div class="col-lg-6 wow itfadeUp">
                <span class="pb-cta__sub">Start Their Journey Today</span>
                <h2 class="pb-cta__heading">Give Your Child a <span>Confident Start</span> in Life</h2>
                <p class="pb-cta__lead">Every child deserves a safe, nurturing place to learn and grow. Secure your child's place at Peekaboo — where every day is an adventure in learning.</p>

                <div class="pb-cta__trust">
                    <div class="pb-cta__trust-item">
                        <div class="pb-cta__trust-icon"><i class="fa-solid fa-shield-check"></i></div>
                        <span class="pb-cta__trust-text">Licensed &amp;<br>Registered</span>
                    </div>
                    <div class="pb-cta__trust-item">
                        <div class="pb-cta__trust-icon"><i class="fa-solid fa-star"></i></div>
                        <span class="pb-cta__trust-text">4.9 Google<br>Rating</span>
                    </div>
                    <div class="pb-cta__trust-item">
                        <div class="pb-cta__trust-icon"><i class="fa-solid fa-users"></i></div>
                        <span class="pb-cta__trust-text">150+ Happy<br>Families</span>
                    </div>
                </div>

                <div class="pb-cta__buttons">
                    <a href="{{ route('book-tour') }}" class="pb-cta__btn-primary">
                        <i class="fa-regular fa-calendar-check"></i> Book a Tour
                    </a>
                    <a href="{{ route('enrol.index') }}" class="pb-cta__btn-secondary">
                        <i class="fa-solid fa-pen-to-square"></i> Enrol Now
                    </a>
                </div>
            </div>

            <!-- Right — Action Card -->
            <div class="col-lg-5 offset-lg-1 wow itfadeUp" data-wow-delay="0.15s">
                <div class="pb-cta__card">
                    <span class="pb-cta__card-badge">Limited Spaces 2026</span>
                    <h3 class="pb-cta__card-title">Get in Touch With Us</h3>
                    <p class="pb-cta__card-desc">Have questions? Reach out anytime — our friendly team is ready to help you through the enrolment process.</p>

                    <div class="pb-cta__card-contacts">
                        <a href="tel:0215574999" class="pb-cta__card-contact">
                            <span class="pb-cta__card-contact-icon"><i class="fa-solid fa-phone"></i></span>
                            <span>
                                <span class="pb-cta__card-contact-label">Call Us</span>
                                <span class="pb-cta__card-contact-value">021 557 4999</span>
                            </span>
                        </a>
                        <a href="https://wa.me/27828989967?text=Hi!%20I'd%20like%20to%20enquire%20about%20Peekaboo%20Daycare." target="_blank" rel="noopener" class="pb-cta__card-contact">
                            <span class="pb-cta__card-contact-icon pb-cta__card-contact-icon--whatsapp"><i class="fa-brands fa-whatsapp"></i></span>
                            <span>
                                <span class="pb-cta__card-contact-label">WhatsApp</span>
                                <span class="pb-cta__card-contact-value">082 898 9967</span>
                            </span>
                        </a>
                        <span class="pb-cta__card-contact">
                            <span class="pb-cta__card-contact-icon pb-cta__card-contact-icon--location"><i class="fa-solid fa-location-dot"></i></span>
                            <span>
                                <span class="pb-cta__card-contact-label">Visit Us</span>
                                <span class="pb-cta__card-contact-value">139B Humewood Dr, Parklands</span>
                            </span>
                        </span>
                    </div>

                    <a href="{{ route('book-tour') }}" class="pb-cta__card-btn">
                        <i class="fa-regular fa-calendar-check"></i> Book a Tour
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // data-background handler (mirrors main.js)
    document.querySelectorAll('[data-background]').forEach(function(el) {
        el.style.backgroundImage = 'url(' + el.getAttribute('data-background') + ')';
    });
    // Testimonials Swiper
    if (document.querySelector('.pb-testi-slider')) {
        new Swiper('.pb-testi-slider', {
            slidesPerView: 1, spaceBetween: 24, loop: true,
            autoplay: { delay: 5000, disableOnInteraction: false },
            navigation: { prevEl: '.ed-testimonial-prev', nextEl: '.ed-testimonial-next' },
            breakpoints: { 768: { slidesPerView: 2 }, 992: { slidesPerView: 3 } },
        });
    }
    // Smooth scroll for in-page anchor links
    document.querySelectorAll('a[href^="#"]').forEach(function(a) {
        a.addEventListener('click', function(e) {
            var target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                var top = target.getBoundingClientRect().top + window.scrollY - 100;
                window.scrollTo({ top: top, behavior: 'smooth' });
            }
        });
    });
});
</script>
@endpush









