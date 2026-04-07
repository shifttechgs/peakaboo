@extends('layouts.public')

@section('title', 'Peekaboo Daycare & Preschool — Parklands, Cape Town | Childcare 3 Months–Grade R')
@section('description', 'Trusted daycare & preschool in Parklands, Cape Town. CAPS-aligned curriculum, qualified teachers, Christian values. Ages 3 months to Grade R. Half-day from R3,800/mo. Book a tour today.')
@section('keywords', 'daycare Parklands Cape Town, preschool Parklands Cape Town, nursery school Parklands, childcare Cape Town northside, daycare near me Parklands, Christian preschool Parklands, baby room daycare Cape Town, Grade R Parklands, CAPS preschool Cape Town, Peekaboo Daycare')
@section('canonical', route('home'))
@section('og_title', 'Peekaboo Daycare & Preschool — Parklands, Cape Town')
@section('og_description', 'Trusted daycare & preschool in Parklands, Cape Town. CAPS-aligned, qualified teachers, Christian values. Ages 3 months to Grade R.')

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "WebPage",
  "@@id": "{{ route('home') }}#webpage",
  "url": "{{ route('home') }}",
  "name": "Peekaboo Daycare & Preschool — Parklands, Cape Town",
  "description": "Trusted daycare & preschool in Parklands, Cape Town. CAPS-aligned curriculum, qualified teachers, Christian values. Ages 3 months to Grade R.",
  "isPartOf": {"@@id": "{{ url('/') }}/#website"},
  "about": {"@@id": "{{ url('/') }}/#organization"},
  "breadcrumb": {
    "@@type": "BreadcrumbList",
    "itemListElement": [{"@@type": "ListItem", "position": 1, "name": "Home", "item": "{{ route('home') }}"}]
  },
  "speakable": {
    "@@type": "SpeakableSpecification",
    "cssSelector": [".ed-hero-2-content h1", ".ed-hero-2-text"]
  }
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    {"@@type": "Question", "name": "What ages does Peekaboo Daycare accept?", "acceptedAnswer": {"@@type": "Answer", "text": "Peekaboo Daycare accepts children from 3 months to Grade R (approximately 6 years old) in Parklands, Cape Town."}},
    {"@@type": "Question", "name": "What are Peekaboo's operating hours?", "acceptedAnswer": {"@@type": "Answer", "text": "We are open Monday to Friday from 06:00 to 18:00. Half-day options end at 12:00 (babies–3 years) or 13:00 (4 years–Grade R)."}},
    {"@@type": "Question", "name": "Does Peekaboo follow the CAPS curriculum?", "acceptedAnswer": {"@@type": "Answer", "text": "Yes. Our Grade R programme follows the CAPS (Curriculum and Assessment Policy Statement) curriculum, ensuring full school readiness for Grade 1."}},
    {"@@type": "Question", "name": "How much does daycare at Peekaboo cost?", "acceptedAnswer": {"@@type": "Answer", "text": "Half-day care starts at R3,800/month and full-day care at R4,200/month. An optional snack box is R400/month. There are no hidden costs."}},
    {"@@type": "Question", "name": "Where is Peekaboo Daycare located?", "acceptedAnswer": {"@@type": "Answer", "text": "We are located at 139B Humewood Drive, Parklands, 7441, Cape Town — serving families in Parklands, Blouberg, Table View, and Sunningdale."}}
  ]
}
</script>
@endpush

@section('content')
<!-- ========== HERO SECTION ==========
     All CSS lives in assets/css/edunity-hero.css (exact Edunity source)
     HTML mirrors index-4-one-page.html structure with Peekaboo content
========================================= -->

<section class="ed-hero-2-area ed-hero-2-bg fix p-relative" id="home">

  {{-- Decorative background shapes (animated, z-index:-1) --}}
{{--  <div class="ed-hero-2-shape-1">--}}
{{--    <img src="{{ asset('assets/img/hero/shape-2-1.png') }}" alt="">--}}
{{--  </div>--}}
  <div class="ed-hero-2-shape-2 d-none d-md-block">
    <img src="{{ asset('assets/img/hero/shape-2-2.png') }}" alt="">
  </div>
  <div class="ed-hero-2-shape-3">
    <img src="{{ asset('assets/img/hero/shape-2-4.png') }}" alt="">
  </div>
  <div class="ed-hero-2-shape-4">
    <img src="{{ asset('assets/img/hero/shape-2-3.png') }}" alt="">
  </div>
  <div class="ed-hero-2-shape-5">
    <img src="{{ asset('assets/img/hero/shape-2-3.png') }}" alt="">
  </div>

  <div class="container">
    <div class="row align-items-center">

      {{-- ── Left: Content ── --}}
      <div class="col-xxl-6 col-xl-5 col-lg-6">
        <div class="ed-hero-2-content">

          {{-- Peekaboo enrolment pill (above title) --}}
          <span class="pb-hero-enrol-pill wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".1s">
            <i class="fa-solid fa-star"></i> Now Enrolling for 2026
          </span>

          {{-- Main heading — exact Edunity structure, pb-5 spacing --}}
          <h1 class="ed-slider-title pb-5 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
            Where Learning <br>
            Feels Safe & Happy.
          </h1>

          {{-- Lead paragraph --}}
          <div class="ed-hero-2-text mb-30 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
            <p>Trusted care for children aged 3 months to Grade R,<br>
              in the heart of Parklands, Cape Town.</p>
          </div>

          {{-- CTA row --}}
          <div class="ed-hero-2-button-wrapper wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
            <div class="ed-hero-2-button d-flex align-items-center flex-wrap">

              <a class="ed-btn-radius" href="{{ route('enrol.index') }}">
                Enrol Now
              </a>

              <a class="ed-btn-radius ed-btn-radius--outline" href="{{ route('book-tour') }}">
                <i class="fa-regular fa-calendar-check"></i> Book a Tour
              </a>

            </div>
          </div>

          {{-- Trust checkmarks (Peekaboo-specific, styled in edunity-hero.css) --}}
          <div class="pb-hero-trust wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
            <span class="pb-hero-trust__item">
              <i class="fa-solid fa-circle-check"></i> Registered Daycare
            </span>
            <span class="pb-hero-trust__item">
              <i class="fa-solid fa-circle-check"></i> CAPS Aligned
            </span>
            <span class="pb-hero-trust__item">
              <i class="fa-solid fa-circle-check"></i> {{ date('Y') - 2010 }}+ Years Experience
            </span>
          </div>

        </div>
      </div>{{-- /col Left --}}

      {{-- ── Right: Images + floating badges (exact Edunity structure) ── --}}
      <div class="col-xxl-6 col-xl-7 col-lg-6">
        <div class="ed-hero-2-right p-relative">

          {{-- Main image (left, larger) — orange blob via ::after --}}
          <div class="ed-hero-2-thumb style-1">
            <img src="{{ asset('assets/img/hero/thumb-2-1.png') }}"
                 alt="Happy child at Peekaboo Daycare">
          </div>

          {{-- Secondary image (right, smaller, absolute bottom-right) — teal blob --}}
          <div class="ed-hero-2-thumb style-2">
            <img src="{{ asset('assets/img/hero/thumb-2-2.png') }}"
                 alt="Learning at Peekaboo">
          </div>

          {{-- Floating badge: family count — bottom-left, jumpTwo bob --}}
          <div class="ed-hero-thumb-student d-none d-md-flex align-items-center">
            <span><i>150+</i><br>Happy Families</span>
            <img src="{{ asset('assets/img/hero/student.png') }}" alt="">
          </div>

          {{-- Floating badge: Google rating — top-right, ittranslateX2 drift --}}
          <div class="ed-hero-thumb-courses d-none d-md-block">
            <i>4.9 <span style="color:#FC9F0B;font-size:16px;letter-spacing:1px;">&#9733;&#9733;&#9733;&#9733;<span style="opacity:0.4;">&#9733;</span></span></i>
            <span>Google Rating</span>
          </div>

          {{-- Inner decorative shape (swings, inside image area) --}}
          <div class="ed-hero-2-shape-6">
            <img src="{{ asset('assets/img/hero/shape-2-5.png') }}" alt="">
          </div>

        </div>
      </div>{{-- /col Right --}}

    </div>
  </div>

</section>
<!-- Hero End -->

<!-- ========== TRUST STRIP — Infinite Scroll Marquee ========== -->
<div id="safety" class="pb-trust">
<style>
/* ============================================================
   TRUST STRIP — Premium edge-to-edge marquee
============================================================ */
.pb-trust {
    background: linear-gradient(135deg, #0a2540 0%, #0E2A46 40%, #0c3a5e 100%);
    padding: 0;
    overflow: hidden;
    position: relative;
    border-bottom: 3px solid rgba(0,119,182,0.3);
}
.pb-trust::before,
.pb-trust::after {
    content: '';
    position: absolute;
    top: 0; bottom: 0;
    width: 100px;
    z-index: 2;
    pointer-events: none;
}
.pb-trust::before {
    left: 0;
    background: linear-gradient(to right, #0E2A46, transparent);
}
.pb-trust::after {
    right: 0;
    background: linear-gradient(to left, #0c3a5e, transparent);
}

.pb-trust__track {
    display: flex;
    width: max-content;
    animation: trust-scroll 32s linear infinite;
}
.pb-trust__track:hover { animation-play-state: paused; }

@@keyframes trust-scroll {
    from { transform: translateX(0); }
    to   { transform: translateX(-50%); }
}

.pb-trust__item {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 22px 24px;
    white-space: nowrap;
    flex-shrink: 0;
    position: relative;
}
.pb-trust__icon {
    width: 44px; height: 44px;
    border-radius: 12px;
    background: rgba(0,119,182,0.25);
    border: 1px solid rgba(0,119,182,0.35);
    display: flex; align-items: center; justify-content: center;
    font-size: 18px;
    color: #5bb8f5;
    flex-shrink: 0;
    transition: transform 0.3s, background 0.3s;
}
.pb-trust__item:hover .pb-trust__icon {
    transform: scale(1.08);
    background: rgba(0,119,182,0.4);
}
.pb-trust__body {
    display: flex;
    flex-direction: column;
}
.pb-trust__stat {
    font-family: var(--font-heading);
    font-size: 17px; font-weight: 800;
    color: #fff;
    line-height: 1.1;
}
.pb-trust__label {
    font-family: var(--font-body);
    font-size: 11px; font-weight: 500;
    color: rgba(255,255,255,0.5);
    letter-spacing: 0.5px;
    margin-top: 2px;
}

/* Separator */
.pb-trust__sep {
    display: flex;
    align-items: center;
    padding: 0 8px;
    flex-shrink: 0;
}
.pb-trust__sep-line {
    width: 1px; height: 28px;
    background: rgba(255,255,255,0.1);
}
</style>

    <div class="pb-trust__track">
        <!-- Set 1 -->
        <div class="pb-trust__item">
            <span class="pb-trust__icon"><i class="fa-solid fa-shield-halved"></i></span>
            <span class="pb-trust__body">
                <span class="pb-trust__stat">24/7</span>
                <span class="pb-trust__label">CCTV &amp; Secure Access</span>
            </span>
        </div>
        <span class="pb-trust__sep"><span class="pb-trust__sep-line"></span></span>
        <div class="pb-trust__item">
            <span class="pb-trust__icon"><i class="fa-solid fa-chalkboard-user"></i></span>
            <span class="pb-trust__body">
                <span class="pb-trust__stat">100%</span>
                <span class="pb-trust__label">Qualified &amp; Vetted Staff</span>
            </span>
        </div>
        <span class="pb-trust__sep"><span class="pb-trust__sep-line"></span></span>
        <div class="pb-trust__item">
            <span class="pb-trust__icon"><i class="fa-solid fa-apple-whole"></i></span>
            <span class="pb-trust__body">
                <span class="pb-trust__stat">Fresh Daily</span>
                <span class="pb-trust__label">Healthy Meals On-Site</span>
            </span>
        </div>
        <span class="pb-trust__sep"><span class="pb-trust__sep-line"></span></span>
        <div class="pb-trust__item">
            <span class="pb-trust__icon"><i class="fa-solid fa-comments"></i></span>
            <span class="pb-trust__body">
                <span class="pb-trust__stat">Daily Updates</span>
                <span class="pb-trust__label">Photos &amp; Progress Reports</span>
            </span>
        </div>
        <span class="pb-trust__sep"><span class="pb-trust__sep-line"></span></span>
        <div class="pb-trust__item">
            <span class="pb-trust__icon"><i class="fa-solid fa-star"></i></span>
            <span class="pb-trust__body">
                <span class="pb-trust__stat">4.9 ★</span>
                <span class="pb-trust__label">Google Reviews</span>
            </span>
        </div>
        <span class="pb-trust__sep"><span class="pb-trust__sep-line"></span></span>
        <div class="pb-trust__item">
            <span class="pb-trust__icon"><i class="fa-solid fa-heart"></i></span>
            <span class="pb-trust__body">
                <span class="pb-trust__stat">150+</span>
                <span class="pb-trust__label">Happy Families</span>
            </span>
        </div>
        <span class="pb-trust__sep"><span class="pb-trust__sep-line"></span></span>
        <!-- Set 2 (duplicate for seamless loop) -->
        <div class="pb-trust__item">
            <span class="pb-trust__icon"><i class="fa-solid fa-shield-halved"></i></span>
            <span class="pb-trust__body">
                <span class="pb-trust__stat">24/7</span>
                <span class="pb-trust__label">CCTV &amp; Secure Access</span>
            </span>
        </div>
        <span class="pb-trust__sep"><span class="pb-trust__sep-line"></span></span>
        <div class="pb-trust__item">
            <span class="pb-trust__icon"><i class="fa-solid fa-chalkboard-user"></i></span>
            <span class="pb-trust__body">
                <span class="pb-trust__stat">100%</span>
                <span class="pb-trust__label">Qualified &amp; Vetted Staff</span>
            </span>
        </div>
        <span class="pb-trust__sep"><span class="pb-trust__sep-line"></span></span>
        <div class="pb-trust__item">
            <span class="pb-trust__icon"><i class="fa-solid fa-apple-whole"></i></span>
            <span class="pb-trust__body">
                <span class="pb-trust__stat">Fresh Daily</span>
                <span class="pb-trust__label">Healthy Meals On-Site</span>
            </span>
        </div>
        <span class="pb-trust__sep"><span class="pb-trust__sep-line"></span></span>
        <div class="pb-trust__item">
            <span class="pb-trust__icon"><i class="fa-solid fa-comments"></i></span>
            <span class="pb-trust__body">
                <span class="pb-trust__stat">Daily Updates</span>
                <span class="pb-trust__label">Photos &amp; Progress Reports</span>
            </span>
        </div>
        <span class="pb-trust__sep"><span class="pb-trust__sep-line"></span></span>
        <div class="pb-trust__item">
            <span class="pb-trust__icon"><i class="fa-solid fa-star"></i></span>
            <span class="pb-trust__body">
                <span class="pb-trust__stat">4.9 ★</span>
                <span class="pb-trust__label">Google Reviews</span>
            </span>
        </div>
        <span class="pb-trust__sep"><span class="pb-trust__sep-line"></span></span>
        <div class="pb-trust__item">
            <span class="pb-trust__icon"><i class="fa-solid fa-heart"></i></span>
            <span class="pb-trust__body">
                <span class="pb-trust__stat">150+</span>
                <span class="pb-trust__label">Happy Families</span>
            </span>
        </div>
        <span class="pb-trust__sep"><span class="pb-trust__sep-line"></span></span>
    </div>
</div>
<!-- Trust Strip End -->

<!-- ========== WHY PARENTS CHOOSE US SECTION ========== -->
<!-- ========== ABOUT / WHY PARENTS CHOOSE US ==========
     Layout mirrors Edunity index-4 .it-about-5-area / .ed-about-4-wrap
     CSS lives in assets/css/edunity-hero.css
======================================================== -->
<div id="about" class="it-about-5-area fix ed-about-4-wrap p-relative pb-120">

  {{-- Animated background shapes --}}
  <div class="it-about-5-shape-4 d-none d-md-block">
    <img src="{{ asset('assets/img/about/shape-5-4.png') }}" alt="">
  </div>
  <div class="it-about-5-shape-5 d-none d-xl-block">
    <img src="{{ asset('assets/img/about/shape-4-4.png') }}" alt="">
  </div>

  <div class="container">
    <div class="row align-items-center">

      {{-- Left: stacked image column --}}
      <div class="col-xl-6 col-lg-6 wow itfadeLeft" data-wow-duration=".9s" data-wow-delay=".5s">
        <div class="ed-hero-thumb-wrap text-center text-md-end p-relative">

          {{-- Main portrait image --}}
          <div class="ed-hero-thumb-main p-relative">
            <img src="{{ asset('assets/img/about/about-4-1.png') }}" alt="Children at Peekaboo Daycare">
            <div class="ed-hero-thumb-shape-1 d-none d-md-block">
              <img src="{{ asset('assets/img/about/shape-4-1.png') }}" alt="">
            </div>
          </div>

          {{-- Overlapping small image --}}
          <div class="ed-hero-thumb-sm p-relative">
            <img src="{{ asset('assets/img/about/about-4-2.png') }}" alt="Happy children at Peekaboo">
            <div class="ed-hero-thumb-shape-1">
              <img src="{{ asset('assets/img/about/shape-4-2.png') }}" alt="">
            </div>
          </div>

          {{-- Animated decorative shapes --}}
          <div class="ed-hero-thumb-shape-2">
            <img src="{{ asset('assets/img/about/shape-4-3.png') }}" alt="">
          </div>
          <div class="ed-hero-thumb-shape-3">
            <img src="{{ asset('assets/img/hero/shape-1-2.png') }}" alt="">
          </div>
          <div class="ed-hero-thumb-shape-4">
            <img src="{{ asset('assets/img/hero/shape-1-3.png') }}" alt="">
          </div>

          {{-- Floating badge --}}
          <div class="ed-hero-thumb-student d-none d-md-flex align-items-center">
            <span><i>{{ date('Y') - 2010 }}+</i><br>Years of Care</span>
            <img src="{{ asset('assets/img/hero/student.png') }}" alt="">
          </div>

        </div>
      </div>

      {{-- Right: text content --}}
      <div class="col-xl-6 col-lg-6 wow itfadeRight" data-wow-duration=".9s" data-wow-delay=".7s">
        <div class="it-about-5-right">

          <div class="it-about-5-title-box pb-10">
            <span class="it-section-subtitle-5 orange">
              <i class="fa-light fa-book"></i> Why Parents Choose Us
            </span>
            <h4 class="ed-section-title orange">
              It's our passion to care for <br> children at <span>Peekaboo.</span>
            </h4>
          </div>

          <div class="it-about-5-text mb-30">
            <p>Since 2010, we've been more than just a daycare — a trusted partner in your child's early years, offering peace of mind and a foundation for lifelong learning.</p>
          </div>

          <div class="it-about-5-content">
            <div class="row">
              <div class="col-xl-6 col-lg-6">
                <div class="it-about-5-list list-style-1 mb-20">
                  <ul>
                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Qualified Educators</li>
                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Safety &amp; Security</li>
                  </ul>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6">
                <div class="it-about-5-list list-style-2 mb-20">
                  <ul>
                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Play-Based Learning</li>
                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Homelike Environment</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="it-feature-button">
            <a class="ed-btn-radius" href="{{ route('book-tour') }}">
              Book a Tour
            </a>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>
<!-- Why Parents Choose Us Section End -->

<!-- ========== PROGRAMS & AGE GROUPS SECTION ========== -->
<section id="programs" class="pb-programs">
<style>
/* ============================================================
   PROGRAMS — pb-programs
============================================================ */
.pb-programs {
    background-color: var(--color-surface);
    padding: 100px 0 110px;
    position: relative;
    overflow: hidden;
}
.pb-programs__sub {
    font-family: var(--font-body);
    font-size: 13px; font-weight: 700;
    letter-spacing: 2px; text-transform: uppercase;
    color: var(--color-warm);
    display: block; margin-bottom: 12px;
}
.pb-programs__heading {
    font-family: var(--font-heading);
    font-size: clamp(30px, 4vw, 46px); font-weight: 900;
    color: var(--color-text); line-height: 1.1; margin-bottom: 0;
}
.pb-programs__heading span { color: var(--color-primary); }

/* Card */
.pb-prog-card {
    background: #fff;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    position: relative;
    height: 100%;
    display: flex; flex-direction: column;
    transition: transform 0.38s cubic-bezier(0.22,0.61,0.36,1),
                box-shadow 0.38s cubic-bezier(0.22,0.61,0.36,1);
}
.pb-prog-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
}

/* Coloured top accent bar */
.pb-prog-card__bar {
    height: 5px; width: 100%;
    flex-shrink: 0;
}

/* Photo */
.pb-prog-card__photo {
    position: relative; height: 220px; overflow: hidden;
}
.pb-prog-card__photo img {
    width: 100%; height: 100%;
    object-fit: cover; display: block;
    transition: transform 0.55s ease;
}
.pb-prog-card:hover .pb-prog-card__photo img { transform: scale(1.06); }

/* Age pill */
.pb-prog-card__age-pill {
    position: absolute; bottom: 14px; left: 14px;
    padding: 5px 14px;
    border-radius: var(--radius-pill);
    font-family: var(--font-body);
    font-size: 12px; font-weight: 700;
    color: #fff; letter-spacing: 0.3px;
    backdrop-filter: blur(4px);
}

/* Body */
.pb-prog-card__body {
    padding: 24px 24px 20px;
    flex-grow: 1; display: flex; flex-direction: column;
}
.pb-prog-card__icon-wrap {
    width: 52px; height: 52px;
    border-radius: 50%;
    display: inline-flex; align-items: center; justify-content: center;
    margin-bottom: 14px; flex-shrink: 0;
}
.pb-prog-card__icon-wrap i { font-size: 22px; color: #fff; }
.pb-prog-card__title {
    font-family: var(--font-heading);
    font-size: 21px; font-weight: 900;
    color: var(--color-text); margin-bottom: 10px;
}
.pb-prog-card__desc {
    font-family: var(--font-body);
    font-size: 14px; color: var(--color-text-muted);
    line-height: 1.72; flex-grow: 1; margin-bottom: 20px;
}
.pb-prog-card__ratio {
    display: inline-flex; align-items: center; gap: 7px;
    font-family: var(--font-body);
    font-size: 12px; font-weight: 700;
    padding: 5px 14px;
    border-radius: var(--radius-pill);
    border: 1.5px solid currentColor;
    margin-bottom: 20px;
}
.pb-prog-card__cta {
    display: block; text-align: center;
    font-family: var(--font-heading); font-size: 14px; font-weight: 800;
    color: #fff; padding: 12px 24px;
    border-radius: var(--radius-pill);
    text-decoration: none;
    transition: filter 0.25s ease, transform 0.25s ease;
    margin-top: auto;
}
.pb-prog-card__cta:hover { filter: brightness(1.10); transform: translateY(-2px); color: #fff; }

/* Per-card colours */
.pb-prog-card--blue  .pb-prog-card__bar    { background: var(--color-primary); }
.pb-prog-card--blue  .pb-prog-card__age-pill { background: rgba(0,119,182,0.80); }
.pb-prog-card--blue  .pb-prog-card__icon-wrap { background: var(--color-primary); }
.pb-prog-card--blue  .pb-prog-card__ratio  { color: var(--color-primary); }
.pb-prog-card--blue  .pb-prog-card__cta    { background: var(--color-primary); }

.pb-prog-card--warm  .pb-prog-card__bar    { background: var(--color-warm); }
.pb-prog-card--warm  .pb-prog-card__age-pill { background: rgba(209,129,9,0.80); }
.pb-prog-card--warm  .pb-prog-card__icon-wrap { background: var(--color-warm); }
.pb-prog-card--warm  .pb-prog-card__ratio  { color: var(--color-warm); }
.pb-prog-card--warm  .pb-prog-card__cta    { background: var(--color-warm); }

.pb-prog-card--accent .pb-prog-card__bar   { background: var(--color-accent); }
.pb-prog-card--accent .pb-prog-card__age-pill { background: rgba(112,22,126,0.80); }
.pb-prog-card--accent .pb-prog-card__icon-wrap { background: var(--color-accent); }
.pb-prog-card--accent .pb-prog-card__ratio { color: var(--color-accent); }
.pb-prog-card--accent .pb-prog-card__cta   { background: var(--color-accent); }

.pb-prog-card--green .pb-prog-card__bar    { background: var(--color-success); }
.pb-prog-card--green .pb-prog-card__age-pill { background: rgba(46,125,50,0.80); }
.pb-prog-card--green .pb-prog-card__icon-wrap { background: var(--color-success); }
.pb-prog-card--green .pb-prog-card__ratio  { color: var(--color-success); }
.pb-prog-card--green .pb-prog-card__cta    { background: var(--color-success); }
</style>

    <div class="container">
        <!-- Section Header -->
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5 wow itfadeUp">
                <span class="pb-programs__sub">Programs &amp; Age Groups</span>
                <h2 class="pb-programs__heading">The Right Program for <span>Your Child's Age</span></h2>
            </div>
        </div>

        <!-- Cards row -->
        <div class="row gx-4 gy-4">

            <!-- Baby Room -->
            <div class="col-lg-3 col-md-6 d-flex wow itfadeUp" data-wow-delay="0.10s">
                <div class="pb-prog-card pb-prog-card--blue w-100">
                    <div class="pb-prog-card__bar"></div>
                    <div class="pb-prog-card__photo">
                        <img src="{{ asset('assets/img/class/class-1-1.jpg') }}" alt="Baby Room" loading="lazy">
                        <span class="pb-prog-card__age-pill">0 – 18 months</span>
                    </div>
                    <div class="pb-prog-card__body">
                        <div class="pb-prog-card__icon-wrap"><i class="fa-solid fa-baby"></i></div>
                        <h3 class="pb-prog-card__title">Baby Room</h3>
                        <p class="pb-prog-card__desc">Your baby's first safe space away from home — loving care, sensory development, and nurturing routines designed for the youngest explorers.</p>
                        <span class="pb-prog-card__ratio"><i class="fa-solid fa-users"></i> 1:4 ratio</span>
                        <a href="{{ route('enrol.index') }}" class="pb-prog-card__cta">Enrol Now</a>
                    </div>
                </div>
            </div>

            <!-- Toddlers -->
            <div class="col-lg-3 col-md-6 d-flex wow itfadeUp" data-wow-delay="0.20s">
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
                        <a href="{{ route('enrol.index') }}" class="pb-prog-card__cta">Enrol Now</a>
                    </div>
                </div>
            </div>

            <!-- Preschool -->
            <div class="col-lg-3 col-md-6 d-flex wow itfadeUp" data-wow-delay="0.30s">
                <div class="pb-prog-card pb-prog-card--accent w-100">
                    <div class="pb-prog-card__bar"></div>
                    <div class="pb-prog-card__photo">
                        <img src="{{ asset('assets/img/class/class-1-3.jpg') }}" alt="Preschool" loading="lazy">
                        <span class="pb-prog-card__age-pill">3 – 4 years</span>
                    </div>
                    <div class="pb-prog-card__body">
                        <div class="pb-prog-card__icon-wrap"><i class="fa-solid fa-palette"></i></div>
                        <h3 class="pb-prog-card__title">Preschool</h3>
                        <p class="pb-prog-card__desc">Building independence and curiosity — creative learning, problem-solving, and early literacy skills that spark a lifelong love of discovery.</p>
                        <span class="pb-prog-card__ratio"><i class="fa-solid fa-users"></i> 1:8 ratio</span>
                        <a href="{{ route('enrol.index') }}" class="pb-prog-card__cta">Enrol Now</a>
                    </div>
                </div>
            </div>

            <!-- Grade R -->
            <div class="col-lg-3 col-md-6 d-flex wow itfadeUp" data-wow-delay="0.40s">
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
                        <a href="{{ route('enrol.index') }}" class="pb-prog-card__cta">Enrol Now</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- View All Programs link -->
        <div class="row mt-5 wow itfadeUp">
            <div class="col-12 text-center">
                <a href="{{ route('programs') }}" style="display:inline-flex;align-items:center;gap:10px;font-family:var(--font-body);font-size:16px;font-weight:700;color:var(--color-primary);text-decoration:none;border:2px solid var(--color-primary);padding:14px 40px;border-radius:var(--radius-pill);transition:all 0.3s;" onmouseover="this.style.background='var(--color-primary)';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='var(--color-primary)'">
                    Explore All Programs <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Programs Section End -->

<!-- ========== FEES SECTION ========== -->
<section id="fees" class="pb-fees">
<style>
/* ============================================================
   FEES — pb-fees
============================================================ */
.pb-fees {
    background-color: #fff;
    padding: 100px 0 110px;
    position: relative;
    overflow: hidden;
}
.pb-fees__sub {
    font-family: var(--font-body);
    font-size: 13px; font-weight: 700;
    letter-spacing: 2px; text-transform: uppercase;
    color: var(--color-warm);
    display: block; margin-bottom: 12px;
}
.pb-fees__heading {
    font-family: var(--font-heading);
    font-size: clamp(30px, 4vw, 46px); font-weight: 900;
    color: var(--color-text); line-height: 1.1; margin-bottom: 0;
}
.pb-fees__heading span { color: var(--color-primary); }

/* Card */
.pb-fee-card {
    background: #fff;
    border-radius: var(--radius-lg);
    padding: 40px 32px 36px;
    box-shadow: var(--shadow-md);
    position: relative;
    height: 100%;
    display: flex; flex-direction: column;
    transition: transform 0.32s ease, box-shadow 0.32s ease;
}
.pb-fee-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-lg);
}
.pb-fee-card--popular {
    border: 2px solid var(--color-primary);
}
.pb-fee-card__badge {
    position: absolute;
    top: -16px; left: 50%; transform: translateX(-50%);
    background: var(--color-primary); color: #fff;
    font-family: var(--font-heading); font-size: 12px; font-weight: 800;
    padding: 5px 20px; border-radius: var(--radius-pill);
    white-space: nowrap; letter-spacing: 0.5px;
}
.pb-fee-card__title {
    font-family: var(--font-heading);
    font-size: 18px; font-weight: 800;
    color: var(--color-text-muted);
    text-transform: uppercase; letter-spacing: 1px;
    margin-bottom: 20px; text-align: center;
}
.pb-fee-card__price-wrap {
    text-align: center; margin-bottom: 28px;
}
.pb-fee-card__price {
    font-family: var(--font-heading);
    font-size: 52px; font-weight: 900;
    color: var(--color-primary); line-height: 1;
}
.pb-fee-card__price-period {
    font-family: var(--font-body);
    font-size: 14px; color: var(--color-text-muted);
    display: block; margin-top: 4px;
}
.pb-fee-card__divider {
    height: 1px; background: #eef0f2; margin-bottom: 24px;
}
.pb-fee-card__features {
    list-style: none; padding: 0; margin: 0 0 28px;
    flex-grow: 1;
}
.pb-fee-card__features li {
    display: flex; align-items: flex-start; gap: 12px;
    font-family: var(--font-body);
    font-size: 14px; color: var(--color-text-muted);
    margin-bottom: 12px; line-height: 1.5;
}
.pb-fee-card__features li i {
    color: var(--color-primary); font-size: 15px;
    flex-shrink: 0; margin-top: 1px;
}

.pb-fee-card__cta-solid {
    display: block; text-align: center;
    font-family: var(--font-heading); font-size: 15px; font-weight: 800;
    background: var(--color-primary); color: #fff;
    padding: 14px 28px; border-radius: var(--radius-pill);
    text-decoration: none;
    transition: background 0.25s, transform 0.25s, box-shadow 0.25s;
    box-shadow: 0 5px 18px rgba(0,119,182,0.28);
}
.pb-fee-card__cta-solid:hover {
    background: var(--color-primary-dk); color: #fff;
    transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,119,182,0.36);
}
.pb-fee-card__cta-outline {
    display: block; text-align: center;
    font-family: var(--font-heading); font-size: 15px; font-weight: 700;
    background: transparent; color: var(--color-primary);
    padding: 13px 28px; border-radius: var(--radius-pill);
    border: 2px solid var(--color-primary);
    text-decoration: none;
    transition: background 0.25s, color 0.25s, transform 0.25s;
}
.pb-fee-card__cta-outline:hover {
    background: var(--color-primary); color: #fff;
    transform: translateY(-2px);
}

/* Footer note */
.pb-fees__note {
    font-family: var(--font-body);
    font-size: 14px; color: var(--color-text);
    text-align: center; margin-top: 40px;
    background: #F5F6F8;
    padding: 18px 28px;
    border-radius: 12px;
    display: inline-block;
}
.pb-fees__note-wrap { text-align: center; }
.pb-fees__note a {
    color: #25D366; font-weight: 700; text-decoration: none;
}
.pb-fees__note a:hover { text-decoration: underline; }
</style>

    <div class="container">
        <!-- Section Header -->
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5 wow itfadeUp">
                <span class="pb-fees__sub">Investment in Your Child's Future</span>
                <h2 class="pb-fees__heading">Transparent <span>Pricing</span></h2>
            </div>
        </div>

        <!-- Pricing cards -->
        <div class="row gx-4 gy-5 justify-content-center">

            <!-- Half Day -->
            <div class="col-lg-4 col-md-6 d-flex wow itfadeUp" data-wow-delay="0.10s">
                <div class="pb-fee-card w-100">
                    <h3 class="pb-fee-card__title">Half Day</h3>
                    <div class="pb-fee-card__price-wrap">
                        <span class="pb-fee-card__price">R3,800</span>
                        <span class="pb-fee-card__price-period">per month</span>
                    </div>
                    <div class="pb-fee-card__divider"></div>
                    <ul class="pb-fee-card__features">
                        <li><i class="fa-solid fa-circle-check"></i> Qualified teachers</li>
                        <li><i class="fa-solid fa-circle-check"></i> Nutritious meals included</li>
                        <li><i class="fa-solid fa-circle-check"></i> Safe, supervised environment</li>
                        <li><i class="fa-solid fa-circle-check"></i> 06:00–12:00 (babies–3yr)</li>
                        <li><i class="fa-solid fa-circle-check"></i> 06:00–13:00 (4yr–Gr.R)</li>
                    </ul>
                    <a href="{{ route('book-tour') }}" class="pb-fee-card__cta-outline">Book a Tour</a>
                </div>
            </div>

            <!-- Full Day — popular -->
            <div class="col-lg-4 col-md-6 d-flex wow itfadeUp" data-wow-delay="0.20s">
                <div class="pb-fee-card pb-fee-card--popular w-100">
                    <div class="pb-fee-card__badge">Most Popular</div>
                    <h3 class="pb-fee-card__title" style="color:var(--color-primary);">Full Day</h3>
                    <div class="pb-fee-card__price-wrap">
                        <span class="pb-fee-card__price">R4,200</span>
                        <span class="pb-fee-card__price-period">per month</span>
                    </div>
                    <div class="pb-fee-card__divider"></div>
                    <ul class="pb-fee-card__features">
                        <li><i class="fa-solid fa-circle-check"></i> All Half Day features</li>
                        <li><i class="fa-solid fa-circle-check"></i> Extended afternoon hours</li>
                        <li><i class="fa-solid fa-circle-check"></i> Afternoon activities &amp; rest</li>
                        <li><i class="fa-solid fa-circle-check"></i> 06:00–18:00 all age groups</li>
                    </ul>
                    <a href="{{ route('enrol.index') }}" class="pb-fee-card__cta-solid">Enrol Now</a>
                </div>
            </div>

            <!-- Snack Box add-on -->
            <div class="col-lg-4 col-md-6 d-flex wow itfadeUp" data-wow-delay="0.30s">
                <div class="pb-fee-card w-100">
                    <h3 class="pb-fee-card__title">Snack Box</h3>
                    <div class="pb-fee-card__price-wrap">
                        <span class="pb-fee-card__price" style="font-size:40px;">R400</span>
                        <span class="pb-fee-card__price-period">per month · add-on</span>
                    </div>
                    <div class="pb-fee-card__divider"></div>
                    <ul class="pb-fee-card__features">
                        <li><i class="fa-solid fa-circle-check"></i> Morning snack included</li>
                        <li><i class="fa-solid fa-circle-check"></i> Afternoon snack included</li>
                        <li><i class="fa-solid fa-circle-check"></i> Nutritionist approved menu</li>
                        <li><i class="fa-solid fa-circle-check"></i> Add to any package</li>
                    </ul>
                    <a href="https://wa.me/27828989967?text=Hi!%20I'd%20like%20to%20ask%20about%20the%20Snack%20Box%20add-on." class="pb-fee-card__cta-outline" target="_blank" rel="noopener">Ask About This</a>
                </div>
            </div>

        </div>

        <!-- Footer note -->
        <div class="pb-fees__note-wrap wow itfadeUp" data-wow-delay="0.35s">
            <p class="pb-fees__note">
                <i class="fa-solid fa-info-circle" style="color:var(--color-primary);margin-right:6px;"></i>
                Registration Fee: <strong>R500 (non-refundable)</strong> &nbsp;·&nbsp;
                <a href="https://wa.me/27828989967?text=Hi!%20I'd%20like%20to%20ask%20about%20fees%20and%20registration." target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i> Chat to us on WhatsApp</a>
            </p>
        </div>
        <div class="text-center mt-4 wow itfadeUp" data-wow-delay="0.4s">
            <a href="{{ route('fees') }}" style="display:inline-flex;align-items:center;gap:10px;font-family:var(--font-body);font-size:15px;font-weight:700;color:var(--color-primary);text-decoration:none;border:2px solid var(--color-primary);padding:13px 36px;border-radius:var(--radius-pill);transition:all 0.3s;" onmouseover="this.style.background='var(--color-primary)';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='var(--color-primary)'">
                View Full Fee Schedule <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

    </div>
</section>
<!-- Fees Section End -->

<!-- ========== TRUST & ACTION BANNER ========== -->
<section class="pb-trust-banner">
<style>
/* ============================================================
   TRUST & ACTION BANNER — Premium Post-Pricing Conversion
============================================================ */
.pb-trust-banner {
    position: relative;
    padding: 0;
    overflow: hidden;
}
.pb-trust__bg {
    position: relative;
    min-height: 420px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-size: cover;
    background-position: center 30%;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
/* Multi-layer overlay for depth */
.pb-trust__bg::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        linear-gradient(180deg, rgba(2,30,60,0.92) 0%, rgba(0,80,140,0.70) 40%, rgba(2,30,60,0.88) 100%),
        radial-gradient(ellipse at 20% 80%, rgba(0,119,182,0.25) 0%, transparent 60%),
        radial-gradient(ellipse at 80% 20%, rgba(244,162,97,0.1) 0%, transparent 50%);
    z-index: 1;
}

/* Floating decorative shapes */
.pb-trust__shape {
    position: absolute;
    border-radius: 50%;
    z-index: 1;
    pointer-events: none;
}
.pb-trust__shape--1 {
    width: 400px; height: 400px;
    top: -120px; right: -80px;
    background: radial-gradient(circle, rgba(244,162,97,0.08) 0%, transparent 70%);
    animation: pbTrustFloat 8s ease-in-out infinite alternate;
}
.pb-trust__shape--2 {
    width: 300px; height: 300px;
    bottom: -80px; left: -60px;
    background: radial-gradient(circle, rgba(0,119,182,0.1) 0%, transparent 70%);
    animation: pbTrustFloat 10s ease-in-out infinite alternate-reverse;
}
.pb-trust__shape--3 {
    width: 120px; height: 120px;
    top: 20%; left: 8%;
    border: 1px solid rgba(255,255,255,0.06);
    animation: pbTrustSpin 20s linear infinite;
}
.pb-trust__shape--4 {
    width: 80px; height: 80px;
    bottom: 25%; right: 10%;
    border: 1px solid rgba(244,162,97,0.08);
    animation: pbTrustSpin 15s linear infinite reverse;
}
@@keyframes pbTrustFloat {
    0% { transform: translate(0, 0) scale(1); }
    100% { transform: translate(-20px, 20px) scale(1.05); }
}
@@keyframes pbTrustSpin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}



.pb-trust__content {
    position: relative;
    z-index: 3;
    text-align: center;
    padding: 60px 20px 56px;
    max-width: 880px;
    margin: 0 auto;
}

/* Badge */
.pb-trust__badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border: 1px solid rgba(255,255,255,0.1);
    padding: 10px 24px;
    border-radius: 50px;
    margin-bottom: 22px;
    color: rgba(255,255,255,0.85);
    font-family: var(--font-body);
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
}
.pb-trust__badge i {
    color: var(--color-warm, #F4A261);
    font-size: 13px;
}

/* Headline */
.pb-trust__heading {
    font-family: var(--font-heading);
    font-size: clamp(34px, 5vw, 54px);
    font-weight: 900;
    color: #fff;
    line-height: 1.12;
    margin: 0 0 14px;
    letter-spacing: -0.5px;
}
.pb-trust__heading span {
    background: linear-gradient(135deg, var(--color-warm, #F4A261), #f7c99a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.pb-trust__sub {
    font-family: var(--font-body);
    font-size: 17px;
    color: rgba(255,255,255,0.7);
    line-height: 1.7;
    margin: 0 auto 32px;
    max-width: 580px;
}

/* ── Trust signals as glass cards ── */
.pb-trust__signals {
    display: flex;
    justify-content: center;
    gap: 16px;
    margin-bottom: 32px;
    flex-wrap: wrap;
}
.pb-trust__signal {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 18px;
    padding: 18px 24px 16px;
    min-width: 140px;
    transition: all 0.35s ease;
}
.pb-trust__signal:hover {
    background: rgba(255,255,255,0.1);
    border-color: rgba(244,162,97,0.2);
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.15);
}
.pb-trust__signal-icon {
    width: 42px; height: 42px;
    border-radius: 12px;
    background: linear-gradient(135deg, rgba(244,162,97,0.15), rgba(244,162,97,0.05));
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 4px;
}
.pb-trust__signal-icon i {
    color: var(--color-warm, #F4A261);
    font-size: 18px;
}
.pb-trust__signal-value {
    font-family: var(--font-heading);
    font-size: 24px;
    font-weight: 800;
    color: #fff;
    line-height: 1;
}
.pb-trust__signal-stars {
    display: flex;
    gap: 3px;
    margin-top: 2px;
}
.pb-trust__signal-stars i {
    color: #FFD700;
    font-size: 12px;
}
.pb-trust__signal-label {
    font-family: var(--font-body);
    font-size: 12px;
    color: rgba(255,255,255,0.5);
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

/* Divider */
.pb-trust__divider {
    width: 60px; height: 3px;
    background: linear-gradient(90deg, transparent, rgba(244,162,97,0.5), transparent);
    margin: 0 auto 28px;
    border-radius: 2px;
}

/* CTA buttons */
.pb-trust__actions {
    display: flex;
    justify-content: center;
    gap: 16px;
    flex-wrap: wrap;
}
.pb-trust__cta-primary {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: var(--font-body);
    font-size: 15px;
    font-weight: 700;
    color: var(--color-text, #1a1a2e);
    background: #fff;
    padding: 16px 42px;
    border-radius: 50px;
    text-decoration: none;
    transition: all 0.35s ease;
    box-shadow: 0 6px 24px rgba(0,0,0,0.15);
    letter-spacing: 0.3px;
}
.pb-trust__cta-primary:hover {
    background: var(--color-warm, #F4A261);
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 12px 40px rgba(244,162,97,0.3);
}
.pb-trust__cta-primary i {
    font-size: 13px;
    transition: transform 0.3s ease;
}
.pb-trust__cta-primary:hover i {
    transform: translateX(4px);
}

.pb-trust__cta-whatsapp {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: var(--font-body);
    font-size: 15px;
    font-weight: 700;
    color: rgba(255,255,255,0.9);
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(8px);
    border: 1.5px solid rgba(255,255,255,0.15);
    padding: 15px 38px;
    border-radius: 50px;
    text-decoration: none;
    transition: all 0.35s ease;
    letter-spacing: 0.3px;
}
.pb-trust__cta-whatsapp:hover {
    background: #25D366;
    border-color: #25D366;
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 10px 32px rgba(37,211,102,0.3);
}
.pb-trust__cta-whatsapp i { font-size: 20px; }

/* Responsive */
@@media (max-width: 991px) {
    .pb-trust__bg { background-attachment: scroll; }
}
@@media (max-width: 767px) {
    .pb-trust__bg { min-height: auto; }
    .pb-trust__content { padding: 48px 16px 44px; }
    .pb-trust__signals { gap: 10px; }
    .pb-trust__signal { padding: 14px 16px 12px; min-width: 120px; border-radius: 14px; }
    .pb-trust__signal-icon { width: 36px; height: 36px; border-radius: 10px; }
    .pb-trust__signal-icon i { font-size: 15px; }
    .pb-trust__signal-value { font-size: 20px; }
    .pb-trust__sub { font-size: 15px; margin-bottom: 24px; }
    .pb-trust__cta-primary { padding: 13px 30px; font-size: 14px; }
    .pb-trust__cta-whatsapp { padding: 12px 26px; font-size: 14px; }
}
@@media (max-width: 480px) {
    .pb-trust__content { padding: 40px 14px 36px; }
    .pb-trust__signals { gap: 8px; }
    .pb-trust__signal { min-width: 105px; padding: 14px 12px 12px; }
    .pb-trust__signal-value { font-size: 18px; }
    .pb-trust__signal-label { font-size: 10px; }
    .pb-trust__actions { flex-direction: column; align-items: center; }
    .pb-trust__shape--1, .pb-trust__shape--2 { display: none; }
}
</style>

    <div class="pb-trust__bg" style="background-image: url('{{ asset('assets/img/school/olympics/peekaboo-056.jpeg') }}');">

        <!-- Floating decorative shapes -->
        <div class="pb-trust__shape pb-trust__shape--1"></div>
        <div class="pb-trust__shape pb-trust__shape--2"></div>
        <div class="pb-trust__shape pb-trust__shape--3"></div>
        <div class="pb-trust__shape pb-trust__shape--4"></div>

        <div class="pb-trust__content wow itfadeUp" data-wow-duration=".9s">

            <!-- Badge -->
            <div class="pb-trust__badge">
                <i class="fa-solid fa-shield-check"></i>
                Trusted by Parklands Families Since 2010
            </div>

            <!-- Headline -->
            <h2 class="pb-trust__heading">
                Join <span>150+</span> Happy Families<br>in Parklands
            </h2>
            <p class="pb-trust__sub">
                Parents choose Peekaboo because they see the difference — confident, happy children who love coming to school every day.
            </p>

            <!-- Trust Signals -->
            <div class="pb-trust__signals">
                <div class="pb-trust__signal wow itfadeUp" data-wow-delay="0.1s">
                    <div class="pb-trust__signal-icon">
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <span class="pb-trust__signal-value">4.9</span>
                    <div class="pb-trust__signal-stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <span class="pb-trust__signal-label">Google Rating</span>
                </div>
                <div class="pb-trust__signal wow itfadeUp" data-wow-delay="0.2s">
                    <div class="pb-trust__signal-icon">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <span class="pb-trust__signal-value">{{ date('Y') - 2010 }}+</span>
                    <span class="pb-trust__signal-label">Years Experience</span>
                </div>
                <div class="pb-trust__signal wow itfadeUp" data-wow-delay="0.3s">
                    <div class="pb-trust__signal-icon">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>
                    <span class="pb-trust__signal-value">27</span>
                    <span class="pb-trust__signal-label">Qualified Staff</span>
                </div>
                <div class="pb-trust__signal wow itfadeUp" data-wow-delay="0.4s">
                    <div class="pb-trust__signal-icon">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <span class="pb-trust__signal-value">100%</span>
                    <span class="pb-trust__signal-label">Love &amp; Care</span>
                </div>
            </div>

            <!-- Divider -->
            <div class="pb-trust__divider"></div>

            <!-- CTAs -->
            <div class="pb-trust__actions">
                <a href="{{ route('book-tour') }}" class="pb-trust__cta-primary">
                    Book a Tour <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a href="https://wa.me/27828989967?text=Hi!%20I'd%20like%20to%20learn%20more%20about%20Peekaboo%20Day%20Care." class="pb-trust__cta-whatsapp" target="_blank" rel="noopener">
                    <i class="fa-brands fa-whatsapp"></i> Chat With Us
                </a>
            </div>

        </div>
    </div>

</section>
<!-- Trust Banner End -->

<!-- ========== TESTIMONIALS SECTION ========== -->
<div id="testimonials" class="it-testimonial-area ed-testimonial-style-2 ed-testimonial-style-3 pb-120 fix p-relative" style="padding-top: 110px; background-color: #F0EDE8;">
   <div class="ed-testimonial-shape-1">
      <img src="{{ asset('assets/img/testimonial/shape-4-1.png') }}" alt="">
   </div>
   <div class="ed-testimonial-shape-2 d-none d-xxl-block">
      <img src="{{ asset('assets/img/testimonial/shape-5-3.png') }}" alt="">
   </div>
   <div class="container container-3">
      <div class="it-testimonial-title-wrap" style="margin-bottom: 60px;">
         <div class="row align-items-end">
            <div class="col-lg-6">
               <div class="it-testimonial-title-box">
                  <span class="pb-fees__sub">Testimonials</span>
                  <h4 class="ed-section-title">What Parents Say</h4>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="ed-testimonial-nav">
                   <button class="ed-testimonial-prev">
                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M9.57031 5.92969L3.50031 11.9997L9.57031 18.0697" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                           <path d="M20.5 12H3.67" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                       </svg>
                   </button>
                   <button class="ed-testimonial-next">
                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M14.4297 5.92969L20.4997 11.9997L14.4297 18.0697" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                           <path d="M3.5 12H20.33" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                       </svg>
                   </button>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xl-12">
            <div class="ed-testimonial-wrapper p-relative">
               <div class="swiper-container ed-testimonial-active">
                  <div class="swiper-wrapper">

                     <!-- Melissa Ingram -->
                     <div class="swiper-slide">
                        <div class="ed-testimonial-item p-relative">
                           <div class="ed-testimonial-ratting">
                              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                           </div>
                           <div class="ed-testimonial-text">
                              <p>"Best Daycare and School in the area. They offer so much more than child care. Most of the staff have been on staff for over 10 years — low staff churn is always a good indicator of a well run business."</p>
                           </div>
                           <div class="ed-testimonial-author-box d-flex align-items-center">
                              <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#0077B6,#1a7fcf);">M</div>
                              <div>
                                 <h5>Melissa Ingram</h5>
                                 <span>Local Guide · 24 reviews</span>
                              </div>
                           </div>
                        </div>
                     </div>

                     <!-- Dominique Warr -->
                     <div class="swiper-slide">
                        <div class="ed-testimonial-item p-relative">
                           <div class="ed-testimonial-ratting">
                              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                           </div>
                           <div class="ed-testimonial-text">
                              <p>"Peekaboo is more than a daycare — it's truly a family. Both my children have been there since they were 9 months old and the teachers and management have helped me navigate being a mom, through thick and thin."</p>
                           </div>
                           <div class="ed-testimonial-author-box d-flex align-items-center">
                              <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#D18109,#f5a623);">D</div>
                              <div>
                                 <h5>Dominique Warr</h5>
                                 <span>Local Guide · 6 reviews</span>
                              </div>
                           </div>
                        </div>
                     </div>

                     <!-- Kelly Fortune -->
                     <div class="swiper-slide">
                        <div class="ed-testimonial-item p-relative">
                           <div class="ed-testimonial-ratting">
                              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                           </div>
                           <div class="ed-testimonial-text">
                              <p>"The family vibe, friendly faces, and staff who've been together for YEARS is all a parent can ask for. Most days I get waved goodbye, tear-free. At times she even cries to stay — that says it all!"</p>
                           </div>
                           <div class="ed-testimonial-author-box d-flex align-items-center">
                              <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#70167E,#9c2aac);">K</div>
                              <div>
                                 <h5>Kelly Fortune</h5>
                                 <span>2 reviews</span>
                              </div>
                           </div>
                        </div>
                     </div>

                     <!-- Sandy Jenkins -->
                     <div class="swiper-slide">
                        <div class="ed-testimonial-item p-relative">
                           <div class="ed-testimonial-ratting">
                              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                           </div>
                           <div class="ed-testimonial-text">
                              <p>"When my daughter started, the teachers went the extra mile helping us transition. They are always eager to answer any questions and are so sweet to the children. Raising children takes a village — and this is my village."</p>
                           </div>
                           <div class="ed-testimonial-author-box d-flex align-items-center">
                              <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#0077B6,#70167E);">S</div>
                              <div>
                                 <h5>Sandy Jenkins</h5>
                                 <span>2 reviews</span>
                              </div>
                           </div>
                        </div>
                     </div>

                     <!-- Ingrid Martheze -->
                     <div class="swiper-slide">
                        <div class="ed-testimonial-item p-relative">
                           <div class="ed-testimonial-ratting">
                              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                           </div>
                           <div class="ed-testimonial-text">
                              <p>"The best Daycare and pre-school in the area! The staff are incredible, kind and caring, and the teachers always go above and beyond! Highly recommend to anyone!"</p>
                           </div>
                           <div class="ed-testimonial-author-box d-flex align-items-center">
                              <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#D18109,#70167E);">I</div>
                              <div>
                                 <h5>Ingrid Martheze</h5>
                                 <span>1 review</span>
                              </div>
                           </div>
                        </div>
                     </div>

                     <!-- Anandi Piek -->
                     <div class="swiper-slide">
                        <div class="ed-testimonial-item p-relative">
                           <div class="ed-testimonial-ratting">
                              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                           </div>
                           <div class="ed-testimonial-text">
                              <p>"After an unfortunate experience elsewhere, we found Peekaboo — best decision we ever made. The classes are stunning and the playground is any child's dream. Honestly could not be happier!"</p>
                           </div>
                           <div class="ed-testimonial-author-box d-flex align-items-center">
                              <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#1a7fcf,#70167E);">A</div>
                              <div>
                                 <h5>Anandi Piek</h5>
                                 <span>Local Guide · 26 reviews</span>
                              </div>
                           </div>
                        </div>
                     </div>

                     <!-- Loren Williamson -->
                     <div class="swiper-slide">
                        <div class="ed-testimonial-item p-relative">
                           <div class="ed-testimonial-ratting">
                              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                           </div>
                           <div class="ed-testimonial-text">
                              <p>"Really an amazing daycare! Friendly staff. We were so worried about our little one adjusting to crèche, but she did perfectly fine with the help of the lovely staff. Best decision we ever made."</p>
                           </div>
                           <div class="ed-testimonial-author-box d-flex align-items-center">
                              <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#9c2aac,#D18109);">L</div>
                              <div>
                                 <h5>Loren Williamson</h5>
                                 <span>2 reviews</span>
                              </div>
                           </div>
                        </div>
                     </div>

                     <!-- Prosper Tinarwo -->
                     <div class="swiper-slide">
                        <div class="ed-testimonial-item p-relative">
                           <div class="ed-testimonial-ratting">
                              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                           </div>
                           <div class="ed-testimonial-text">
                              <p>"We couldn't have asked for a better daycare. It's affordable, welcoming, and the environment is warm and nurturing. The staff are truly incredible — caring, attentive, and professional."</p>
                           </div>
                           <div class="ed-testimonial-author-box d-flex align-items-center">
                              <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#2E7D32,#0077B6);">P</div>
                              <div>
                                 <h5>Prosper Tinarwo</h5>
                                 <span>2 reviews · 1 photo</span>
                              </div>
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Testimonials Section End -->

<!-- ========== MEET OUR TEACHERS SECTION ========== -->
<section id="teachers" class="pb-teachers">
<style>
/* ============================================================
   TEACHERS SECTION — Peekaboo (Edunity-inspired)
============================================================ */

#teachers {
    background-color: #fff;
    padding: 110px 0 100px;
    position: relative;
    overflow: hidden;
}
.pb-teachers__sub {
    font-family: var(--font-body);
    font-size: 13px; font-weight: 700;
    letter-spacing: 2px; text-transform: uppercase;
    color: var(--color-warm);
    display: block; margin-bottom: 12px;
}
.pb-teachers__heading {
    font-family: var(--font-heading);
    font-size: clamp(30px, 4vw, 46px); font-weight: 900;
    color: var(--color-text); line-height: 1.1; margin-bottom: 20px;
}
.pb-teachers__heading span { color: var(--color-primary); }
.pb-teachers__lead {
    font-family: var(--font-body);
    color: var(--color-text-muted); font-size: 17px;
    line-height: 1.75; max-width: 590px; margin: 0 auto;
}

/* Decorative shape */
.pb-teachers__shape {
    position: absolute;
    top: 4%; right: -1%;
    z-index: 0;
    animation: itswing-2 3s forwards infinite alternate;
    transform-origin: bottom right;
}
@@keyframes itswing-2 {
    0%   { transform: rotate(0deg); }
    100% { transform: rotate(5deg); }
}

/* ── EDUNITY-STYLE TEAM CARD ─────────────────────── */
.ed-team-item {
    padding: 10px;
    border-radius: 5px;
    background: #fff;
    box-shadow: 0 0 30px 0 rgba(0,0,0,0.06);
    transition: box-shadow 0.3s, transform 0.3s;
}
.ed-team-item:hover {
    box-shadow: 0 8px 40px 0 rgba(0,0,0,0.12);
    transform: translateY(-4px);
}
.ed-team-item:hover .ed-team-thumb img {
    transform: scale(1.08);
}
.ed-team-thumb {
    border-radius: 5px 5px 0 0;
    overflow: hidden;
}
.ed-team-thumb img {
    border-radius: 5px 5px 0 0;
    width: 100%;
    transition: transform 0.5s ease;
}
.ed-team-content {
    padding: 20px 15px 15px;
    position: relative;
}
.ed-team-author-box {
    text-align: center;
}
.ed-team-title {
    font-family: var(--font-heading);
    color: var(--color-text);
    font-weight: 700;
    font-size: 20px;
    margin-bottom: 4px;
}
.ed-team-author-box span {
    font-family: var(--font-body);
    color: var(--color-warm);
    font-size: 14px;
}
.ed-team-author-box .ed-team-quals {
    display: block;
    font-family: var(--font-body);
    color: var(--color-text-muted);
    font-size: 12px;
    margin-top: 4px;
}

/* Swiper navigation arrows */
.ed-team-arrow-box {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 15px;
}
.ed-team-arrow-box button {
    font-size: 24px;
    height: 52px;
    width: 52px;
    border-radius: 50%;
    border: 1px solid var(--color-primary);
    color: var(--color-primary);
    background: transparent;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s;
    cursor: pointer;
}
.ed-team-arrow-box button:hover {
    color: #fff;
    background-color: var(--color-primary);
}

/* ── FULL TEAM MARQUEE ───────────────────────────── */
.t-team-header {
    display: flex; align-items: center; gap: 18px;
    margin: 72px 0 22px;
}
.t-team-header::before,
.t-team-header::after {
    content: ''; flex: 1; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(74,37,89,0.2), transparent);
}
.t-team-label {
    font-family: var(--font-body);
    font-size: 18px; font-weight: 600;
    color: var(--color-text); white-space: nowrap;
    letter-spacing: 0.5px;
}

.t-marquee-wrap {
    overflow: hidden;
    position: relative;
    margin-bottom: 12px;
}
.t-marquee-wrap::before,
.t-marquee-wrap::after {
    content: ''; position: absolute;
    top: 0; bottom: 0; width: 110px;
    z-index: 2; pointer-events: none;
}
.t-marquee-wrap::before { left: 0;  background: linear-gradient(to right, #fff, transparent); }
.t-marquee-wrap::after  { right: 0; background: linear-gradient(to left,  #fff, transparent); }

.t-marquee {
    display: flex; gap: 22px;
    width: max-content; padding: 10px 0;
}
.t-marquee--fwd { animation: t-fwd 38s linear infinite; }
.t-marquee--rev { animation: t-rev 44s linear infinite; }
.t-marquee-wrap:hover .t-marquee { animation-play-state: paused; }

@@keyframes t-fwd { from { transform: translateX(0);    } to { transform: translateX(-50%); } }
@@keyframes t-rev { from { transform: translateX(-50%); } to { transform: translateX(0);    } }

.t-bubble {
    width: 170px; height: 170px;
    border-radius: 50%; overflow: hidden; flex-shrink: 0;
    border: 5px solid #fff;
    box-shadow: 0 6px 20px rgba(0,0,0,0.13);
    transition: transform 0.28s ease, box-shadow 0.28s ease;
    cursor: pointer;
}
.t-bubble:hover {
    transform: scale(1.10) translateY(-5px);
    box-shadow: 0 14px 36px rgba(12,80,142,0.26);
}
.t-bubble img { width: 100%; height: 100%; object-fit: cover; display: block; }
.t-marquee--rev .t-bubble { width: 150px; height: 150px; }

/* ── QUALIFICATIONS BANNER ───────────────────────── */
.t-qual {
    margin-top: 60px;
    background: #fff; border-radius: 20px;
    padding: 36px 44px 36px 50px;
    position: relative; overflow: hidden;
    box-shadow: 0 6px 32px rgba(12,80,142,0.07);
    border: 1px solid rgba(12,80,142,0.08);
}
.t-qual::before {
    content: ''; position: absolute;
    left: 0; top: 0; bottom: 0; width: 6px;
    background: linear-gradient(to bottom, #0c508e 0%, #D18109 50%, #4A2559 100%);
    border-radius: 20px 0 0 20px;
}
.t-qual__title {
    font-family: var(--font-heading);
    font-size: 20px; font-weight: 800;
    color: var(--color-text); margin: 0 0 10px;
}
.t-qual__body {
    font-family: var(--font-body);
    font-size: 16px; color: var(--color-text-muted);
    line-height: 1.72; margin: 0;
}
.t-stats {
    display: flex; align-items: center;
    justify-content: center; flex-wrap: wrap;
}
.t-stat { text-align: center; padding: 8px 22px; }
.t-stat__num {
    font-family: var(--font-heading);
    font-size: 34px; font-weight: 900;
    color: var(--color-primary); line-height: 1;
    display: block; margin-bottom: 4px;
}
.t-stat__label {
    font-family: var(--font-body);
    font-size: 10.5px; font-weight: 700;
    letter-spacing: 1.1px; text-transform: uppercase;
    color: var(--color-text-muted); display: block;
}
.t-stat-sep { width: 1px; height: 44px; background: rgba(12,80,142,0.12); flex-shrink: 0; }

/* ── RESPONSIVE ──────────────────────────────────── */
@@media (max-width: 991px) {
    .t-qual { padding: 28px 28px 28px 38px; }
    .ed-team-arrow-box { display: none; }
}
@@media (max-width: 575px) {
    .t-bubble { width: 120px; height: 120px; }
    .t-marquee--rev .t-bubble { width: 106px; height: 106px; }
    .t-qual { padding: 22px 18px 22px 28px; }
    .t-stat { padding: 6px 14px; }
    .t-stat__num { font-size: 26px; }
    .t-team-label { font-size: 15px; }
    .t-team-header { margin-top: 52px; }
    .ed-team-title { font-size: 17px; }
}
</style>

    <!-- Decorative swinging shape -->
    <div class="pb-teachers__shape d-none d-md-block">
        <img src="{{ asset('assets/img/about/shape-4-4.png') }}" alt="">
    </div>

    <div class="container" style="position:relative;z-index:2;">

        <!-- Section Header with Swiper Arrows -->
        <div class="row align-items-center mb-5 wow itfadeUp">
            <div class="col-xl-6">
                <span class="pb-teachers__sub">The Heart of Peekaboo</span>
                <h2 class="pb-teachers__heading">Meet Our <span>Dedicated</span> Teachers</h2>
            </div>
            <div class="col-xl-6">
            </div>
        </div>

        <!-- Management Team — Edunity-style Swiper Carousel -->
        <div class="ed-team-wrapper wow itfadeUp" data-wow-delay="0.1s">
            <div class="swiper-container ed-team-active">
                <div class="swiper-wrapper">
                    <!-- Slide 1 — Director -->
                    <div class="swiper-slide">
                        <div class="ed-team-item">
                            <div class="ed-team-thumb fix">
                                <img src="{{ asset('assets/img/peekaboo_staff/1.png') }}" alt="Peekaboo Director">
                            </div>
                            <div class="ed-team-content">
                                <div class="ed-team-author-box">
                                    <h4 class="ed-team-title">Peekaboo Director</h4>
                                    <span>Director &amp; Principal</span>
                                    <span class="ed-team-quals">Founder · ECD Champion</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 — Management -->
                    <div class="swiper-slide">
                        <div class="ed-team-item">
                            <div class="ed-team-thumb fix">
                                <img src="{{ asset('assets/img/peekaboo_staff/2.png') }}" alt="Peekaboo Management">
                            </div>
                            <div class="ed-team-content">
                                <div class="ed-team-author-box">
                                    <h4 class="ed-team-title">Peekaboo Management</h4>
                                    <span>Management</span>
                                    <span class="ed-team-quals">Leading with Heart &amp; Vision</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 — Management -->
                    <div class="swiper-slide">
                        <div class="ed-team-item">
                            <div class="ed-team-thumb fix">
                                <img src="{{ asset('assets/img/peekaboo_staff/3.png') }}" alt="Peekaboo Management">
                            </div>
                            <div class="ed-team-content">
                                <div class="ed-team-author-box">
                                    <h4 class="ed-team-title">Peekaboo Management</h4>
                                    <span>Management</span>
                                    <span class="ed-team-quals">Operations &amp; Care Quality</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Management Team -->

        <!-- Full Team Marquee Strip -->
        <div class="wow itfadeUp" data-wow-delay="0.2s">

            <div class="t-team-header">
                <span class="t-team-label">Meet the Rest of Our Wonderful Team</span>
            </div>

            <!-- Row 1 — forward scroll (images 4–15, duplicated for seamless loop) -->
            <div class="t-marquee-wrap">
                <div class="t-marquee t-marquee--fwd">
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/4.png') }}"  alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/5.png') }}"  alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/6.png') }}"  alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/7.png') }}"  alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/8.png') }}"  alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/9.png') }}"  alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/10.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/11.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/12.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/13.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/14.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/15.png') }}" alt="Peekaboo staff member"></div>
                    <!-- duplicate set for seamless infinite loop -->
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/4.png') }}"  alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/5.png') }}"  alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/6.png') }}"  alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/7.png') }}"  alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/8.png') }}"  alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/9.png') }}"  alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/10.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/11.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/12.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/13.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/14.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/15.png') }}" alt="Peekaboo staff member"></div>
                </div>
            </div>

            <!-- Row 2 — reverse scroll (images 16–27, duplicated for seamless loop) -->
            <div class="t-marquee-wrap">
                <div class="t-marquee t-marquee--rev">
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/16.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/17.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/18.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/19.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/20.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/21.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/22.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/23.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/24.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/25.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/26.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/27.png') }}" alt="Peekaboo staff member"></div>
                    <!-- duplicate set for seamless infinite loop -->
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/16.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/17.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/18.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/19.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/20.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/21.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/22.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/23.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/24.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/25.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/26.png') }}" alt="Peekaboo staff member"></div>
                    <div class="t-bubble"><img src="{{ asset('assets/img/peekaboo_staff/27.png') }}" alt="Peekaboo staff member"></div>
                </div>
            </div>

        </div>
        <!-- / Team marquee -->

        <!-- Qualifications Banner -->
        <div class="t-qual wow itfadeUp" data-wow-delay="0.25s">
            <div class="row align-items-center gy-4">
                <div class="col-lg-7">
                    <h4 class="t-qual__title">Every Teacher is Qualified, Vetted &amp; Passionate</h4>
                    <p class="t-qual__body">All our educators hold recognized ECD qualifications, undergo police clearance checks, and commit to ongoing professional development. Your child's safety and growth are in expert, caring hands.</p>
                </div>
                <div class="col-lg-5">
                    <div class="t-stats">
                        <div class="t-stat">
                            <span class="t-stat__num">100%</span>
                            <span class="t-stat__label">Qualified</span>
                        </div>
                        <div class="t-stat-sep"></div>
                        <div class="t-stat">
                            <span class="t-stat__num">100%</span>
                            <span class="t-stat__label">Vetted</span>
                        </div>
                        <div class="t-stat-sep"></div>
                        <div class="t-stat">
                            <span class="t-stat__num">10+</span>
                            <span class="t-stat__label">Avg. Years</span>
                        </div>
                        <div class="t-stat-sep"></div>
                        <div class="t-stat">
                            <span class="t-stat__num">27</span>
                            <span class="t-stat__label">Staff Members</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /container -->

</section>
<!-- Teachers Section End -->

<!-- ========== A TYPICAL DAY AT PEEKABOO SECTION ========== -->
<section id="gallery" class="pb-daily">
<style>
/* ============================================================
   DAILY LIFE SECTION — Peekaboo (Premium Timeline)
============================================================ */
.pb-daily {
    background-color: var(--color-surface);
    padding: 110px 0 100px;
    position: relative;
    overflow: hidden;
}
.pb-daily__sub {
    font-family: var(--font-body);
    font-size: 13px; font-weight: 700;
    letter-spacing: 2px; text-transform: uppercase;
    color: var(--color-warm);
    display: block; margin-bottom: 12px;
}
.pb-daily__heading {
    font-family: var(--font-heading);
    font-size: clamp(30px, 4vw, 46px); font-weight: 900;
    color: var(--color-text); line-height: 1.1; margin-bottom: 18px;
}
.pb-daily__heading span { color: var(--color-primary); }
.pb-daily__lead {
    font-family: var(--font-body);
    color: var(--color-text-muted); font-size: 17px;
    line-height: 1.75; max-width: 620px; margin: 0 auto;
}

/* ── Timeline connector ── */
.pb-daily__timeline {
    position: relative;
    margin-top: 60px;
}
.pb-daily__timeline::before {
    content: '';
    position: absolute;
    top: 40px; left: 50%;
    transform: translateX(-50%);
    width: 2px; height: calc(100% - 80px);
    background: linear-gradient(to bottom, var(--color-primary), var(--color-warm), var(--color-accent));
    opacity: 0.2;
    display: none;
}

/* ── Activity card ── */
.pb-daily__card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(0,0,0,0.06);
    transition: transform 0.35s ease, box-shadow 0.35s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}
.pb-daily__card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.12);
}

/* Image area */
.pb-daily__thumb {
    position: relative;
    overflow: hidden;
    aspect-ratio: 16 / 10;
}
.pb-daily__thumb img {
    width: 100%; height: 100%;
    object-fit: cover; display: block;
    transition: transform 0.55s cubic-bezier(0.22,0.61,0.36,1);
}
.pb-daily__card:hover .pb-daily__thumb img {
    transform: scale(1.06);
}

/* Time badge */
.pb-daily__time {
    position: absolute;
    top: 14px; left: 14px;
    background: var(--color-primary);
    color: #fff;
    font-family: var(--font-body);
    font-size: 11px; font-weight: 700;
    padding: 5px 14px;
    border-radius: var(--radius-pill);
    letter-spacing: 0.3px;
    box-shadow: 0 2px 10px rgba(0,119,182,0.3);
}

/* Zoom icon */
.pb-daily__zoom {
    position: absolute;
    top: 14px; right: 14px;
    width: 36px; height: 36px;
    border-radius: 50%;
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(6px);
    display: inline-flex; align-items: center; justify-content: center;
    color: var(--color-text); font-size: 14px;
    opacity: 0; transform: scale(0.8);
    transition: opacity 0.3s, transform 0.3s, background 0.3s;
    text-decoration: none;
}
.pb-daily__card:hover .pb-daily__zoom {
    opacity: 1; transform: scale(1);
}
.pb-daily__zoom:hover {
    background: var(--color-primary);
    color: #fff;
}

/* Content area */
.pb-daily__body {
    padding: 22px 24px 26px;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.pb-daily__tag {
    font-family: var(--font-body);
    font-size: 10px; font-weight: 700;
    letter-spacing: 1.5px; text-transform: uppercase;
    color: var(--color-warm);
    margin-bottom: 8px; display: block;
}
.pb-daily__title {
    font-family: var(--font-heading);
    font-size: 20px; font-weight: 800;
    color: var(--color-text);
    margin: 0 0 8px; line-height: 1.2;
}
.pb-daily__desc {
    font-family: var(--font-body);
    font-size: 14px; color: var(--color-text-muted);
    line-height: 1.7; margin: 0;
    flex: 1;
}

/* ── Step number badge ── */
.pb-daily__step {
    position: absolute;
    bottom: 14px; left: 14px;
    width: 32px; height: 32px;
    border-radius: 50%;
    background: #fff;
    color: var(--color-primary);
    font-family: var(--font-heading);
    font-size: 14px; font-weight: 800;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

/* ── Responsive ── */
@@media (max-width: 991px) {
    .pb-daily__title { font-size: 18px; }
    .pb-daily__body { padding: 18px 20px 22px; }
}
@@media (max-width: 575px) {
    .pb-daily__thumb { aspect-ratio: 16 / 9; }
    .pb-daily__title { font-size: 17px; }
    .pb-daily__desc { font-size: 13px; }
}
</style>

    <div class="container">

        <!-- Section Header -->
        <div class="row">
            <div class="col-lg-7 mx-auto text-center wow itfadeUp">
                <span class="pb-daily__sub">Daily Life at Peekaboo</span>
                <h2 class="pb-daily__heading">A Typical Day <span>at Our School</span></h2>
                <p class="pb-daily__lead">From circle time to outdoor play, nutritious meals to creative activities — every moment is designed to nurture curious minds and happy hearts.</p>
            </div>
        </div>

        <!-- Activity Cards -->
        <div class="pb-daily__timeline">
            <div class="row g-4 wow itfadeUp" data-wow-delay="0.1s">

                <!-- Card 1 — Morning Arrival -->
                <div class="col-lg-3 col-md-6">
                    <div class="pb-daily__card">
                        <div class="pb-daily__thumb">
                            <img src="{{ asset('assets/img/gallery/gallery-h1-1-1.jpg') }}" alt="Circle time learning" loading="lazy">
                            <span class="pb-daily__time">06:00 – 08:00</span>
                            <span class="pb-daily__step">1</span>
                            <a href="{{ asset('assets/img/gallery/gallery-h1-1-1.jpg') }}" class="pb-daily__zoom popup-image" aria-label="View image"><i class="fa-solid fa-magnifying-glass"></i></a>
                        </div>
                        <div class="pb-daily__body">
                            <span class="pb-daily__tag">Morning</span>
                            <h4 class="pb-daily__title">Welcome &amp; Circle Time</h4>
                            <p class="pb-daily__desc">Warm welcomes, morning songs, calendar activities and setting intentions for a wonderful day of learning together.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 — Learning Time -->
                <div class="col-lg-3 col-md-6">
                    <div class="pb-daily__card">
                        <div class="pb-daily__thumb">
                            <img src="{{ asset('assets/img/gallery/gallery-h1-1-3.jpg') }}" alt="Arts and crafts" loading="lazy">
                            <span class="pb-daily__time">08:00 – 11:00</span>
                            <span class="pb-daily__step">2</span>
                            <a href="{{ asset('assets/img/gallery/gallery-h1-1-3.jpg') }}" class="pb-daily__zoom popup-image" aria-label="View image"><i class="fa-solid fa-magnifying-glass"></i></a>
                        </div>
                        <div class="pb-daily__body">
                            <span class="pb-daily__tag">Learning</span>
                            <h4 class="pb-daily__title">Creative Arts &amp; Lessons</h4>
                            <p class="pb-daily__desc">Age-appropriate curriculum activities including literacy, numeracy, arts and crafts, and sensory exploration.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 — Outdoor Play -->
                <div class="col-lg-3 col-md-6">
                    <div class="pb-daily__card">
                        <div class="pb-daily__thumb">
                            <img src="{{ asset('assets/img/gallery/gallery-h1-1-2.jpg') }}" alt="Outdoor play" loading="lazy">
                            <span class="pb-daily__time">11:00 – 13:00</span>
                            <span class="pb-daily__step">3</span>
                            <a href="{{ asset('assets/img/gallery/gallery-h1-1-2.jpg') }}" class="pb-daily__zoom popup-image" aria-label="View image"><i class="fa-solid fa-magnifying-glass"></i></a>
                        </div>
                        <div class="pb-daily__body">
                            <span class="pb-daily__tag">Active Play</span>
                            <h4 class="pb-daily__title">Outdoor Fun &amp; Lunch</h4>
                            <p class="pb-daily__desc">Free play on our safe outdoor equipment, followed by nutritious meals prepared fresh on-site by our kitchen team.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 — Afternoon -->
                <div class="col-lg-3 col-md-6">
                    <div class="pb-daily__card">
                        <div class="pb-daily__thumb">
                            <img src="{{ asset('assets/img/gallery/gallery-h1-1-4.jpg') }}" alt="Special events" loading="lazy">
                            <span class="pb-daily__time">13:00 – 18:00</span>
                            <span class="pb-daily__step">4</span>
                            <a href="{{ asset('assets/img/gallery/gallery-h1-1-4.jpg') }}" class="pb-daily__zoom popup-image" aria-label="View image"><i class="fa-solid fa-magnifying-glass"></i></a>
                        </div>
                        <div class="pb-daily__body">
                            <span class="pb-daily__tag">Afternoon</span>
                            <h4 class="pb-daily__title">Rest, Play &amp; Pickup</h4>
                            <p class="pb-daily__desc">Nap time for little ones, story sessions, free play and enrichment activities until parents collect.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- ══════════════════════════════════════════════════════════
             SEE OUR SPACES — Premium Tabbed Gallery
             ══════════════════════════════════════════════════════════ -->
        <div class="row mt-5 pt-4 wow itfadeUp" data-wow-delay="0.2s">
            <div class="col-lg-7 mx-auto text-center mb-2">
                <span class="pb-daily__sub">See Our Spaces</span>
                <h3 class="pb-daily__heading" style="font-size:28px;">Explore <span>Our World</span></h3>
                <p class="pb-daily__lead" style="font-size:15px;">Bright classrooms, safe play areas and nurturing spaces — take a peek inside where your little one will learn, grow and thrive.</p>
            </div>
        </div>

        <!-- Tab Pills -->
        <div class="pb-tabs wow itfadeUp" data-wow-delay="0.25s">
            <div class="pb-tabs__track">
                <button class="pb-tabs__pill is-active" data-filter="all">
                    <i class="fa-solid fa-border-all"></i> All
                </button>
                <button class="pb-tabs__pill" data-filter="classrooms">
                    <i class="fa-solid fa-chalkboard"></i> Classrooms
                </button>
                <button class="pb-tabs__pill" data-filter="baby">
                    <i class="fa-solid fa-baby"></i> Baby Class
                </button>
                <button class="pb-tabs__pill" data-filter="creative">
                    <i class="fa-solid fa-palette"></i> Creative Arts
                </button>
                <button class="pb-tabs__pill" data-filter="events">
                    <i class="fa-solid fa-star"></i> Events
                </button>
                <button class="pb-tabs__pill" data-filter="fun">
                    <i class="fa-solid fa-sun"></i> Fun & Outdoors
                </button>
                <button class="pb-tabs__pill" data-filter="videos">
                    <i class="fa-solid fa-video"></i> Videos
                </button>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="pb-gallery wow itfadeUp" data-wow-delay="0.3s">
            <div class="pb-gallery__grid" id="peekabooGallery">

                @php
                    $basePath = public_path('assets/img/school');
                    $baseUrl  = 'assets/img/school';

                    // ── Category → folder(s) + alt text template + SEO-friendly descriptions ──
                    $categories = [
                        'classrooms' => [
                            'folders' => ['classrooms', 'classroom_fun'],
                            'alts' => [
                                'Children learning in a bright classroom at Peekaboo Day Care Parklands',
                                'Fun classroom activities and group learning at Peekaboo',
                                'Educational play and lessons in a colourful Peekaboo classroom',
                                'Engaging learning environment for children at Peekaboo Cape Town',
                                'Kids enjoying structured classroom activities at Peekaboo Day Care',
                            ],
                        ],
                        'baby' => [
                            'folders' => ['baby_class'],
                            'alts' => [
                                'Nurturing baby class for infants at Peekaboo Day Care Parklands',
                                'Safe and gentle baby room with soft play mats',
                                'Infant development activities at Peekaboo Cape Town',
                                'Little ones exploring sensory play in the baby class',
                                'Caring environment for babies at Peekaboo Day Care',
                            ],
                        ],
                        'creative' => [
                            'folders' => ['coloring_time', 'fun_face-paintings'],
                            'alts' => [
                                'Creative colouring time at Peekaboo Day Care Parklands',
                                'Children painting and creating artwork at Peekaboo',
                                'Fun face painting activities for kids at Peekaboo Cape Town',
                                'Arts and crafts session at Peekaboo Day Care',
                                'Kids expressing creativity through art at Peekaboo',
                            ],
                        ],
                        'events' => [
                            'folders' => ['olympics', 'easter_fun', 'valentine'],
                            'alts' => [
                                'Easter celebration and fun activities at Peekaboo Day Care',
                                'Valentine\'s Day festivities with the children at Peekaboo',
                                'Mini Olympics sports day at Peekaboo Day Care Parklands',
                                'Special event celebrations at Peekaboo Cape Town',
                                'Children enjoying themed event activities at Peekaboo',
                            ],
                        ],
                        'fun' => [
                            'folders' => ['fun_time'],
                            'alts' => [
                                'Fun time and free play at Peekaboo Day Care Parklands',
                                'Happy children playing together at Peekaboo',
                                'Outdoor and indoor fun activities at Peekaboo Cape Town',
                                'Kids enjoying playtime at Peekaboo Day Care',
                                'Active play and laughter at Peekaboo',
                            ],
                        ],
                    ];

                    // Scan each folder and build the gallery items array
                    $galleryItems = [];
                    foreach ($categories as $cat => $config) {
                        $altIndex = 0;
                        $altPool  = $config['alts'];
                        foreach ($config['folders'] as $folder) {
                            $dir = $basePath . DIRECTORY_SEPARATOR . $folder;
                            if (!is_dir($dir)) continue;
                            $files = array_filter(scandir($dir), function($f) {
                                return preg_match('/\.(jpe?g|png|webp)$/i', $f);
                            });
                            sort($files);
                            foreach ($files as $file) {
                                $galleryItems[] = [
                                    'src' => $folder . '/' . $file,
                                    'cat' => $cat,
                                    'alt' => $altPool[$altIndex % count($altPool)],
                                ];
                                $altIndex++;
                            }
                        }
                    }

                    // Add root-level loose images to 'fun' category
                    $rootImages = array_filter(scandir($basePath), function($f) use ($basePath) {
                        return preg_match('/\.(jpe?g|png|webp)$/i', $f) && is_file($basePath . DIRECTORY_SEPARATOR . $f);
                    });
                    sort($rootImages);
                    $funAlts = $categories['fun']['alts'];
                    foreach ($rootImages as $ri => $rootImg) {
                        $galleryItems[] = [
                            'src' => $rootImg,
                            'cat' => 'fun',
                            'alt' => $funAlts[$ri % count($funAlts)],
                        ];
                    }

                    // Shuffle within each category so the "All" view looks varied
                    // Group by category, pick items round-robin for "All" display order
                    $grouped = [];
                    foreach ($galleryItems as $item) {
                        $grouped[$item['cat']][] = $item;
                    }
                    $sortedItems = [];
                    $maxLen = max(array_map('count', $grouped));
                    for ($i = 0; $i < $maxLen; $i++) {
                        foreach ($grouped as $cat => $items) {
                            if (isset($items[$i])) {
                                $sortedItems[] = $items[$i];
                            }
                        }
                    }

                    // ── Videos — from out-door_fun folder + root ──
                    $videoFiles = [];
                    $outdoorDir = $basePath . DIRECTORY_SEPARATOR . 'out-door_fun';
                    if (is_dir($outdoorDir)) {
                        $vids = array_filter(scandir($outdoorDir), fn($f) => preg_match('/\.mp4$/i', $f));
                        sort($vids);
                        foreach ($vids as $v) {
                            $videoFiles[] = 'out-door_fun/' . $v;
                        }
                    }
                    // Root video
                    if (file_exists($basePath . '/school_video.mp4')) {
                        $videoFiles[] = 'school_video.mp4';
                    }

                    $videoAlts = [
                        'Outdoor play and fun activities at Peekaboo Day Care Parklands',
                        'Children enjoying outdoor time at Peekaboo Cape Town',
                        'Active outdoor play at Peekaboo Day Care',
                        'Fun outdoor adventures at Peekaboo',
                        'Kids playing outside at Peekaboo Parklands',
                        'Peekaboo Day Care school tour video',
                        'A day at Peekaboo Day Care Centre',
                    ];
                @endphp

                {{-- Image items (round-robin sorted for variety) --}}
                @foreach($sortedItems as $idx => $item)
                    <a href="{{ asset($baseUrl . '/' . $item['src']) }}"
                       class="pb-gallery__item popup-image"
                       data-category="{{ $item['cat'] }}"
                       title="{{ $item['alt'] }}">
                        <img src="{{ asset($baseUrl . '/' . $item['src']) }}"
                             alt="{{ $item['alt'] }}"
                             loading="lazy"
                             width="400" height="300">
                        <div class="pb-gallery__overlay">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </div>
                    </a>
                @endforeach

                {{-- Video items --}}
                @foreach($videoFiles as $vi => $vidSrc)
                    <div class="pb-gallery__item pb-gallery__item--video"
                         data-category="videos"
                         data-video-src="{{ asset($baseUrl . '/' . $vidSrc) }}">
                        <video class="pb-gallery__thumb-video" muted playsinline preload="metadata">
                            <source src="{{ asset($baseUrl . '/' . $vidSrc) }}#t=0.5" type="video/mp4">
                        </video>
                        <div class="pb-gallery__play-btn">
                            <i class="fa-solid fa-play"></i>
                        </div>
                        <div class="pb-gallery__vid-label"><i class="fa-solid fa-video"></i> Video</div>
                    </div>
                @endforeach

            </div>

            <!-- Pagination Controls -->
            <div class="pb-gallery__pagination" id="galleryPagination">
                <div class="pb-gallery__counter" id="galleryCounter"></div>
                <div class="pb-gallery__nav">
                    <button class="pb-gallery__nav-btn" id="galleryPrev" aria-label="Previous page">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <div class="pb-gallery__dots" id="galleryDots"></div>
                    <button class="pb-gallery__nav-btn" id="galleryNext" aria-label="Next page">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <style>
        /* ══════════════════════════════════════════════════════════
           TABBED GALLERY — Premium Pill Tabs + Filtered Grid
           ══════════════════════════════════════════════════════════ */

        /* ── Tab Pills ── */
        .pb-tabs { text-align: center; margin: 32px 0 40px; }
        .pb-tabs__track {
            display: inline-flex;
            gap: 10px;
            background: #fff;
            padding: 6px;
            border-radius: var(--radius-pill, 50px);
            box-shadow: 0 2px 16px rgba(0,0,0,0.06);
            overflow-x: auto;
            max-width: 100%;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }
        .pb-tabs__track::-webkit-scrollbar { display: none; }

        .pb-tabs__pill {
            font-family: var(--font-body);
            font-size: 13px;
            font-weight: 600;
            padding: 10px 22px;
            border: none;
            border-radius: var(--radius-pill, 50px);
            background: transparent;
            color: var(--color-text-muted, #6b7280);
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }
        .pb-tabs__pill i { font-size: 12px; }
        .pb-tabs__pill:hover {
            color: var(--color-primary, #0077B6);
            background: rgba(0,119,182,0.06);
        }
        .pb-tabs__pill.is-active {
            background: var(--color-primary, #0077B6);
            color: #fff;
            box-shadow: 0 4px 14px rgba(0,119,182,0.3);
        }

        /* ── Gallery Grid ── */
        .pb-gallery__grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }
        .pb-gallery__item {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            display: block;
            aspect-ratio: 4 / 3;
            cursor: pointer;
            transition: opacity 0.4s ease, transform 0.4s ease;
        }
        .pb-gallery__item.is-hidden {
            display: none;
        }
        .pb-gallery__item.is-fading {
            opacity: 0;
            transform: scale(0.95);
        }

        .pb-gallery__item img,
        .pb-gallery__item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.55s cubic-bezier(0.22,0.61,0.36,1);
        }
        .pb-gallery__item:hover img,
        .pb-gallery__item:hover video {
            transform: scale(1.06);
        }

        /* Overlay */
        .pb-gallery__overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 119, 182, 0.0);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.35s ease;
        }
        .pb-gallery__overlay i {
            color: #fff;
            font-size: 24px;
            opacity: 0;
            transform: translateY(8px);
            transition: opacity 0.3s ease, transform 0.3s ease;
            text-shadow: 0 2px 8px rgba(0,0,0,.3);
        }
        .pb-gallery__item:hover .pb-gallery__overlay {
            background: rgba(0, 119, 182, 0.3);
        }
        .pb-gallery__item:hover .pb-gallery__overlay i {
            opacity: 1;
            transform: translateY(0);
        }

        /* Video-specific */
        .pb-gallery__item--video {
            position: relative;
            cursor: pointer;
            background: #0a1628;
        }
        .pb-gallery__thumb-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.55s cubic-bezier(0.22,0.61,0.36,1);
        }
        .pb-gallery__item--video:hover .pb-gallery__thumb-video {
            transform: scale(1.06);
        }
        .pb-gallery__play-btn {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 60px; height: 60px;
            border-radius: 50%;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(8px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 3;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
            box-shadow: 0 4px 24px rgba(0,0,0,0.2);
        }
        .pb-gallery__play-btn i {
            color: var(--color-primary, #0077B6);
            font-size: 22px;
            margin-left: 3px;
            transition: color 0.3s ease;
        }
        .pb-gallery__item--video:hover .pb-gallery__play-btn {
            transform: translate(-50%, -50%) scale(1.12);
            box-shadow: 0 8px 32px rgba(0,119,182,0.4);
            background: var(--color-primary, #0077B6);
        }
        .pb-gallery__item--video:hover .pb-gallery__play-btn i {
            color: #fff;
        }
        /* Pulsing ring effect */
        .pb-gallery__play-btn::before {
            content: '';
            position: absolute;
            inset: -6px;
            border-radius: 50%;
            border: 2px solid rgba(255,255,255,0.4);
            animation: pbPlayPulse 2s ease-in-out infinite;
        }
        @@keyframes pbPlayPulse {
            0%, 100% { transform: scale(1); opacity: 0.6; }
            50% { transform: scale(1.15); opacity: 0; }
        }

        .pb-gallery__vid-label {
            position: absolute;
            bottom: 14px; left: 14px;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(6px);
            color: #fff;
            font-family: var(--font-body);
            font-size: 11px;
            font-weight: 600;
            padding: 5px 14px;
            border-radius: var(--radius-pill, 50px);
            display: inline-flex;
            align-items: center;
            gap: 6px;
            z-index: 3;
        }
        .pb-gallery__vid-label i { font-size: 10px; }

        /* ── Video Modal ── */
        .pb-video-modal {
            position: relative;
            background: #000;
            border-radius: 16px;
            overflow: hidden;
            max-width: 900px;
            width: 92vw;
            margin: 0 auto;
            box-shadow: 0 24px 80px rgba(0,0,0,0.5);
        }
        .pb-video-modal video {
            width: 100%;
            display: block;
            border-radius: 16px;
            max-height: 80vh;
        }
        .pb-video-modal__close {
            position: absolute;
            top: 12px; right: 12px;
            width: 40px; height: 40px;
            border-radius: 50%;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(6px);
            border: none;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            z-index: 4;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease, transform 0.3s ease;
        }
        .pb-video-modal__close:hover {
            background: rgba(255,255,255,0.2);
            transform: scale(1.1);
        }
        /* Magnific overrides for video modal */
        .mfp-video-modal .mfp-content {
            max-width: 900px;
        }
        .mfp-video-modal .mfp-close {
            display: none;
        }
        .mfp-bg.mfp-ready { opacity: .88 !important; background: #0a0a0a !important; }
        .mfp-wrap .mfp-content { padding: 20px; }
        .mfp-inline-holder .mfp-close { display: none !important; }

        /* Pagination area */
        .pb-gallery__pagination {
            text-align: center;
            margin-top: 36px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 16px;
        }
        .pb-gallery__counter {
            font-family: var(--font-body);
            font-size: 13px;
            font-weight: 600;
            color: var(--color-text-muted, #6b7280);
            letter-spacing: 0.3px;
        }
        .pb-gallery__counter strong {
            color: var(--color-primary, #0077B6);
        }

        /* Nav row: prev · dots · next */
        .pb-gallery__nav {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .pb-gallery__nav-btn {
            width: 42px; height: 42px;
            border-radius: 50%;
            border: 2px solid var(--color-primary, #0077B6);
            background: transparent;
            color: var(--color-primary, #0077B6);
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        .pb-gallery__nav-btn:hover:not(:disabled) {
            background: var(--color-primary, #0077B6);
            color: #fff;
            box-shadow: 0 4px 16px rgba(0,119,182,0.3);
        }
        .pb-gallery__nav-btn:disabled {
            opacity: 0.3;
            cursor: default;
            border-color: var(--color-text-muted, #aaa);
            color: var(--color-text-muted, #aaa);
        }

        /* Page dots */
        .pb-gallery__dots {
            display: flex;
            gap: 8px;
            align-items: center;
        }
        .pb-gallery__dot {
            width: 10px; height: 10px;
            border-radius: 50%;
            border: none;
            background: rgba(0,119,182,0.15);
            cursor: pointer;
            padding: 0;
            transition: all 0.3s ease;
        }
        .pb-gallery__dot:hover {
            background: rgba(0,119,182,0.35);
            transform: scale(1.2);
        }
        .pb-gallery__dot.is-active {
            background: var(--color-primary, #0077B6);
            width: 28px;
            border-radius: 5px;
            box-shadow: 0 2px 8px rgba(0,119,182,0.3);
        }
        /* When many pages, collapse middle dots */
        .pb-gallery__dot--ellipsis {
            width: auto; height: auto;
            background: none !important;
            cursor: default;
            font-size: 12px;
            color: var(--color-text-muted, #999);
            letter-spacing: 2px;
            transform: none !important;
            box-shadow: none !important;
            border-radius: 0;
        }

        /* ── Responsive ── */
        @@media (max-width: 1199px) {
            .pb-gallery__grid { grid-template-columns: repeat(3, 1fr); }
        }
        @@media (max-width: 767px) {
            .pb-gallery__grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
            .pb-tabs__track { padding: 4px; gap: 6px; }
            .pb-tabs__pill { padding: 8px 16px; font-size: 12px; }
            .pb-gallery__play-btn { width: 46px; height: 46px; }
            .pb-gallery__play-btn i { font-size: 16px; }
            .pb-gallery__play-btn::before { inset: -4px; }
            .pb-video-modal { border-radius: 10px; }
            .pb-video-modal video { border-radius: 10px; }
            .pb-gallery__nav-btn { width: 36px; height: 36px; font-size: 12px; }
            .pb-gallery__dots { gap: 6px; }
            .pb-gallery__dot { width: 8px; height: 8px; }
            .pb-gallery__dot.is-active { width: 22px; }
        }
        @@media (max-width: 480px) {
            .pb-gallery__grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
            .pb-gallery__item { border-radius: 12px; }
            .pb-tabs__pill { padding: 7px 12px; font-size: 11px; }
            .pb-tabs__pill i { display: none; }
            .pb-gallery__nav { gap: 10px; }
        }
        </style>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const PER_PAGE = 8;
            const gallery = document.getElementById('peekabooGallery');
            const pills = document.querySelectorAll('.pb-tabs__pill');
            const pagination = document.getElementById('galleryPagination');
            const counter = document.getElementById('galleryCounter');
            const dotsWrap = document.getElementById('galleryDots');
            const prevBtn = document.getElementById('galleryPrev');
            const nextBtn = document.getElementById('galleryNext');

            let currentFilter = 'all';
            let currentPage = 1;

            function getFilteredItems(filter) {
                const items = Array.from(gallery.querySelectorAll('.pb-gallery__item'));
                if (filter === 'all') return items;
                return items.filter(item => item.dataset.category === filter);
            }

            function getTotalPages(filtered) {
                return Math.max(1, Math.ceil(filtered.length / PER_PAGE));
            }

            // Build the page dots — show max ~7 dots with ellipsis for large page counts
            function buildDots(totalPages) {
                dotsWrap.innerHTML = '';
                if (totalPages <= 1) return;

                const maxVisible = 7;
                let pages = [];

                if (totalPages <= maxVisible) {
                    for (let i = 1; i <= totalPages; i++) pages.push(i);
                } else {
                    // Always show first, last, current, and neighbors
                    pages.push(1);
                    if (currentPage > 3) pages.push('...');
                    for (let i = Math.max(2, currentPage - 1); i <= Math.min(totalPages - 1, currentPage + 1); i++) {
                        pages.push(i);
                    }
                    if (currentPage < totalPages - 2) pages.push('...');
                    pages.push(totalPages);
                }

                pages.forEach(p => {
                    if (p === '...') {
                        const el = document.createElement('span');
                        el.className = 'pb-gallery__dot pb-gallery__dot--ellipsis';
                        el.textContent = '•••';
                        dotsWrap.appendChild(el);
                    } else {
                        const dot = document.createElement('button');
                        dot.className = 'pb-gallery__dot' + (p === currentPage ? ' is-active' : '');
                        dot.setAttribute('aria-label', 'Page ' + p);
                        dot.addEventListener('click', function() {
                            currentPage = p;
                            render();
                        });
                        dotsWrap.appendChild(dot);
                    }
                });
            }

            function render() {
                const allItems = Array.from(gallery.querySelectorAll('.pb-gallery__item'));
                const filtered = getFilteredItems(currentFilter);
                const total = filtered.length;
                const totalPages = getTotalPages(filtered);

                // Clamp page
                if (currentPage > totalPages) currentPage = totalPages;
                if (currentPage < 1) currentPage = 1;

                const startIdx = (currentPage - 1) * PER_PAGE;
                const endIdx = Math.min(startIdx + PER_PAGE, total);

                // Pause any playing videos
                gallery.querySelectorAll('.pb-gallery__item--video.is-playing').forEach(v => {
                    v.querySelector('video')?.pause();
                    v.classList.remove('is-playing');
                });

                // Hide everything
                allItems.forEach(item => {
                    item.classList.add('is-hidden');
                    item.classList.remove('is-fading');
                });

                // Show only current page items with stagger animation
                filtered.forEach((item, i) => {
                    if (i >= startIdx && i < endIdx) {
                        item.classList.remove('is-hidden');
                        item.classList.add('is-fading');
                        const delay = (i - startIdx) * 50;
                        setTimeout(() => item.classList.remove('is-fading'), 30 + delay);
                    }
                });

                // ── Update pagination UI ──
                if (totalPages <= 1) {
                    pagination.style.display = 'none';
                } else {
                    pagination.style.display = 'flex';

                    // Counter
                    const showStart = startIdx + 1;
                    const showEnd = endIdx;
                    counter.innerHTML = 'Page <strong>' + currentPage + '</strong> of <strong>' + totalPages + '</strong> &nbsp;·&nbsp; ' +
                        showStart + '–' + showEnd + ' of ' + total + ' photos';

                    // Dots
                    buildDots(totalPages);

                    // Prev / Next
                    prevBtn.disabled = (currentPage <= 1);
                    nextBtn.disabled = (currentPage >= totalPages);
                }
            }

            // Tab click — reset to page 1
            pills.forEach(pill => {
                pill.addEventListener('click', function() {
                    pills.forEach(p => p.classList.remove('is-active'));
                    this.classList.add('is-active');
                    currentFilter = this.dataset.filter;
                    currentPage = 1;
                    render();
                });
            });

            // Prev / Next
            prevBtn.addEventListener('click', function() {
                if (currentPage > 1) {
                    currentPage--;
                    render();
                }
            });
            nextBtn.addEventListener('click', function() {
                const filtered = getFilteredItems(currentFilter);
                if (currentPage < getTotalPages(filtered)) {
                    currentPage++;
                    render();
                }
            });

            // Video — open in modal on click
            gallery.querySelectorAll('.pb-gallery__item--video').forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const videoSrc = this.getAttribute('data-video-src');
                    if (!videoSrc) return;

                    $.magnificPopup.open({
                        items: {
                            src: '<div class="pb-video-modal">' +
                                    '<button class="pb-video-modal__close" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>' +
                                    '<video controls autoplay playsinline>' +
                                        '<source src="' + videoSrc + '" type="video/mp4">' +
                                        'Your browser does not support the video tag.' +
                                    '</video>' +
                                 '</div>',
                            type: 'inline'
                        },
                        mainClass: 'mfp-fade mfp-video-modal',
                        removalDelay: 200,
                        closeBtnInside: false,
                        closeOnBgClick: true,
                        callbacks: {
                            open: function() {
                                // Focus the video
                                var vid = document.querySelector('.pb-video-modal video');
                                if (vid) vid.focus();
                            },
                            close: function() {
                                // Pause on close
                                var vid = document.querySelector('.pb-video-modal video');
                                if (vid) { vid.pause(); vid.src = ''; }
                            }
                        }
                    });

                    // Close button handler
                    $(document).off('click.pbVidClose').on('click.pbVidClose', '.pb-video-modal__close', function() {
                        $.magnificPopup.close();
                    });
                });
            });

            // Initial render
            render();
        });
        </script>

    </div>
</section>
<!-- A Typical Day Section End -->


<!-- ========== FAQ SECTION ========== -->
<section id="faq" class="pb-faq">
<style>
/* ============================================================
   FAQ SECTION — Peekaboo (Premium Split Layout)
============================================================ */
.pb-faq {
    background-color: #fff;
    padding: 110px 0 100px;
    position: relative;
    overflow: hidden;
}
.pb-faq__shape {
    position: absolute;
    bottom: 5%; left: -2%;
    z-index: 0;
    animation: itswing-2 3s forwards infinite alternate;
    transform-origin: top left;
    opacity: 0.6;
}

/* ── Left column ── */
.pb-faq__sub {
    font-family: var(--font-body);
    font-size: 13px; font-weight: 700;
    letter-spacing: 2px; text-transform: uppercase;
    color: var(--color-warm);
    display: block; margin-bottom: 12px;
}
.pb-faq__heading {
    font-family: var(--font-heading);
    font-size: clamp(30px, 4vw, 42px); font-weight: 900;
    color: var(--color-text); line-height: 1.1; margin-bottom: 18px;
}
.pb-faq__heading span { color: var(--color-primary); }
.pb-faq__lead {
    font-family: var(--font-body);
    color: var(--color-text-muted); font-size: 16px;
    line-height: 1.75; margin-bottom: 36px;
}

/* Contact prompt card */
.pb-faq__contact {
    background: var(--color-surface);
    border-radius: 16px;
    padding: 28px 30px;
    display: flex;
    align-items: flex-start;
    gap: 16px;
}
.pb-faq__contact-icon {
    width: 48px; height: 48px;
    border-radius: 50%;
    background: var(--color-primary);
    color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; flex-shrink: 0;
}
.pb-faq__contact-title {
    font-family: var(--font-body);
    font-size: 17px; font-weight: 700;
    color: var(--color-text); margin: 0 0 6px;
}
.pb-faq__contact-text {
    font-family: var(--font-body);
    font-size: 14px; color: var(--color-text-muted);
    line-height: 1.6; margin: 0 0 14px;
}
.pb-faq__contact-link {
    display: inline-flex; align-items: center; gap: 10px;
    font-family: var(--font-body);
    font-size: 14px; font-weight: 700;
    color: #fff;
    background: var(--color-whatsapp, #25D366);
    padding: 10px 22px;
    border-radius: var(--radius-pill);
    text-decoration: none;
    transition: background 0.3s, transform 0.3s;
    margin-top: 4px;
}
.pb-faq__contact-link:hover {
    background: #1ebd5a;
    color: #fff;
    transform: translateY(-2px);
}

/* ── Accordion ── */
.pb-faq__item {
    background: #fff;
    border: 1px solid #eaeef3;
    border-radius: 14px;
    margin-bottom: 12px;
    overflow: hidden;
    transition: box-shadow 0.3s ease, border-color 0.3s ease;
}
.pb-faq__item:has(.accordion-button:not(.collapsed)) {
    border-color: var(--color-primary);
    box-shadow: 0 6px 24px rgba(0,119,182,0.08);
}

.pb-faq .accordion .accordion-button.pb-faq__btn {
    font-family: var(--font-body) !important;
    font-size: 17px !important;
    font-weight: 700 !important;
    color: var(--color-text) !important;
    background: #fff !important;
    padding: 20px 24px;
    box-shadow: none !important;
    gap: 14px;
    border-radius: 14px;
}
.pb-faq .accordion .accordion-button.pb-faq__btn:not(.collapsed) {
    color: var(--color-primary) !important;
    background: #fff !important;
}

/* Icon circle */
.pb-faq .accordion-button .pb-faq__icon {
    width: 34px !important; height: 34px !important;
    min-width: 34px;
    border-radius: 50% !important;
    background: var(--color-surface) !important;
    display: inline-flex !important; align-items: center; justify-content: center;
    flex-shrink: 0;
    transition: background 0.3s, color 0.3s;
}
.pb-faq .accordion-button .pb-faq__icon i {
    font-size: 13px !important;
    color: var(--color-primary) !important;
    transition: color 0.3s;
    line-height: 1;
}
.pb-faq .accordion-button:not(.collapsed) .pb-faq__icon {
    background: var(--color-primary) !important;
}
.pb-faq .accordion-button:not(.collapsed) .pb-faq__icon i {
    color: #fff !important;
}

/* Override Bootstrap accordion arrow */
.pb-faq .accordion .accordion-button.pb-faq__btn::after {
    background-image: none !important;
    content: '\f078' !important;
    font-family: 'Font Awesome 6 Pro' !important;
    font-weight: 900 !important;
    font-size: 12px !important;
    color: var(--color-text-muted);
    width: auto; height: auto;
    transition: transform 0.3s ease, color 0.3s ease;
}
.pb-faq .accordion .accordion-button.pb-faq__btn:not(.collapsed)::after {
    content: '\f077' !important;
    color: var(--color-primary);
    transform: none;
}

.pb-faq__body {
    font-family: var(--font-body);
    font-size: 15px; color: var(--color-text-muted);
    line-height: 1.8;
    padding: 0 24px 22px 72px;
}

/* ── Responsive ── */
@@media (max-width: 991px) {
    .pb-faq__contact { margin-bottom: 40px; }
}
@@media (max-width: 575px) {
    .pb-faq__btn { font-size: 15px; padding: 16px 18px; gap: 10px; }
    .pb-faq__body { padding: 0 18px 18px 62px; font-size: 14px; }
    .pb-faq__icon { width: 30px; height: 30px; }
    .pb-faq__icon i { font-size: 11px; }
}
</style>

    <!-- Decorative shape -->
    <div class="pb-faq__shape d-none d-lg-block">
        <img src="{{ asset('assets/img/about/ed-shape-3-1.png') }}" alt="">
    </div>

    <div class="container" style="position:relative;z-index:2;">
        <div class="row gy-5">

            <!-- Left Column — Heading + Contact Card -->
            <div class="col-lg-5 wow itfadeUp">
                <span class="pb-faq__sub">Got Questions?</span>
                <h2 class="pb-faq__heading">Frequently Asked <span>Questions</span></h2>
                <p class="pb-faq__lead">Everything you need to know about Peekaboo — answered clearly and honestly. Can't find what you're looking for? Reach out directly.</p>

                <div class="pb-faq__contact">
                    <div class="pb-faq__contact-icon">
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <div>
                        <h4 class="pb-faq__contact-title">Still Have Questions?</h4>
                        <p class="pb-faq__contact-text">Our friendly team is always happy to chat. Book a tour or send us a message — we'd love to hear from you.</p>
                        <a href="https://wa.me/27832730498?text=Hi%20Peekaboo%2C%20I%20have%20a%20question" class="pb-faq__contact-link" target="_blank" rel="noopener">
                            <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column — Accordion -->
            <div class="col-lg-7">
                <div class="accordion" id="faqAccordion">

                    <div class="pb-faq__item wow itfadeUp" data-wow-delay="0.05s">
                        <h3 class="accordion-header">
                            <button class="accordion-button pb-faq__btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq1Content" aria-expanded="true" aria-controls="faq1Content">
                                <span class="pb-faq__icon"><i class="fa-solid fa-clock"></i></span> What are your operating hours?
                            </button>
                        </h3>
                        <div id="faq1Content" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="pb-faq__body">
                                We're open Monday to Friday from <strong>06:00 to 18:00</strong>. We understand that working parents need flexible hours, and we're here to support you every step of the way.
                            </div>
                        </div>
                    </div>

                    <div class="pb-faq__item wow itfadeUp" data-wow-delay="0.1s">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed pb-faq__btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq2Content" aria-expanded="false" aria-controls="faq2Content">
                                <span class="pb-faq__icon"><i class="fa-solid fa-shield-halved"></i></span> What safety protocols do you have in place?
                            </button>
                        </h3>
                        <div id="faq2Content" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="pb-faq__body">
                                Your child's safety is our priority. We have <strong>24/7 CCTV monitoring</strong>, controlled access entry, qualified first-aid trained staff, secure outdoor play areas, and strict pick-up/drop-off protocols.
                            </div>
                        </div>
                    </div>

                    <div class="pb-faq__item wow itfadeUp" data-wow-delay="0.15s">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed pb-faq__btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq3Content" aria-expanded="false" aria-controls="faq3Content">
                                <span class="pb-faq__icon"><i class="fa-solid fa-utensils"></i></span> Are meals provided?
                            </button>
                        </h3>
                        <div id="faq3Content" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="pb-faq__body">
                                Yes! We provide <strong>nutritious, balanced meals and snacks</strong> prepared fresh daily on-site. Our menu is healthy, varied, and child-friendly. Special dietary requirements can be accommodated.
                            </div>
                        </div>
                    </div>

                    <div class="pb-faq__item wow itfadeUp" data-wow-delay="0.2s">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed pb-faq__btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq4Content" aria-expanded="false" aria-controls="faq4Content">
                                <span class="pb-faq__icon"><i class="fa-solid fa-pen-to-square"></i></span> How do I register my child?
                            </button>
                        </h3>
                        <div id="faq4Content" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="pb-faq__body">
                                Registration is simple. <strong>Book a tour</strong> to visit our facilities and meet our team, then complete the online enrolment form. We'll guide you through the entire process and answer any questions you have.
                            </div>
                        </div>
                    </div>

                    <div class="pb-faq__item wow itfadeUp" data-wow-delay="0.25s">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed pb-faq__btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq5Content" aria-expanded="false" aria-controls="faq5Content">
                                <span class="pb-faq__icon"><i class="fa-solid fa-graduation-cap"></i></span> Is your curriculum aligned with CAPS?
                            </button>
                        </h3>
                        <div id="faq5Content" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="pb-faq__body">
                                Absolutely. Our Preschool and Grade R programs are <strong>fully aligned with the CAPS curriculum</strong>, ensuring your child is academically prepared and confident when they start Grade 1.
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- FAQ Section End -->

<!-- ========== FINAL CTA SECTION ========== -->
<section id="contact" class="pb-cta">
<style>
/* ============================================================
   CTA SECTION — Peekaboo (On-brand Split Layout)
============================================================ */
.pb-cta {
    background: var(--color-surface);
    padding: 110px 0 100px;
    position: relative;
    overflow: hidden;
}

/* ── Left column — copy ── */
.pb-cta__sub {
    font-family: var(--font-body);
    font-size: 13px; font-weight: 700;
    letter-spacing: 2px; text-transform: uppercase;
    color: var(--color-warm);
    display: inline-flex; align-items: center; gap: 8px;
    margin-bottom: 14px;
}
.pb-cta__sub::before {
    content: '';
    width: 28px; height: 2px;
    background: var(--color-warm);
}
.pb-cta__heading {
    font-family: var(--font-heading);
    font-size: clamp(30px, 4vw, 46px); font-weight: 900;
    color: var(--color-text); line-height: 1.1;
    margin-bottom: 18px;
}
.pb-cta__heading span { color: var(--color-primary); }
.pb-cta__lead {
    font-family: var(--font-body);
    font-size: 16px; line-height: 1.8;
    color: var(--color-text-muted);
    margin-bottom: 32px; max-width: 480px;
}

/* Trust indicators */
.pb-cta__trust {
    display: flex; flex-wrap: wrap; gap: 20px;
    margin-bottom: 36px;
}
.pb-cta__trust-item {
    display: flex; align-items: center; gap: 10px;
}
.pb-cta__trust-icon {
    width: 40px; height: 40px;
    border-radius: 50%;
    background: rgba(0,119,182,0.08);
    display: flex; align-items: center; justify-content: center;
    color: var(--color-primary); font-size: 16px;
    flex-shrink: 0;
}
.pb-cta__trust-text {
    font-family: var(--font-body);
    font-size: 13px; font-weight: 600;
    color: var(--color-text);
    line-height: 1.3;
}

/* Buttons */
.pb-cta__buttons {
    display: flex; flex-wrap: wrap; gap: 14px;
}
.pb-cta__btn-primary {
    display: inline-flex; align-items: center; gap: 10px;
    font-family: var(--font-body); font-size: 15px; font-weight: 700;
    background: var(--color-primary); color: #fff;
    padding: 16px 34px; border-radius: var(--radius-pill);
    text-decoration: none; border: none;
    transition: transform 0.28s ease, box-shadow 0.28s ease, background 0.28s;
    box-shadow: 0 4px 18px rgba(0,119,182,0.25);
}
.pb-cta__btn-primary:hover {
    background: var(--color-primary-dk); color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(0,119,182,0.35);
}
.pb-cta__btn-secondary {
    display: inline-flex; align-items: center; gap: 10px;
    font-family: var(--font-body); font-size: 15px; font-weight: 600;
    background: #fff; color: var(--color-text);
    padding: 16px 34px; border-radius: var(--radius-pill);
    border: 2px solid #e2e6ea;
    text-decoration: none;
    transition: all 0.28s ease;
}
.pb-cta__btn-secondary:hover {
    border-color: var(--color-primary); color: var(--color-primary);
    transform: translateY(-3px);
    box-shadow: 0 4px 18px rgba(0,119,182,0.1);
}

/* ── Right column — action card ── */
.pb-cta__card {
    background: #fff;
    border-radius: 20px;
    padding: 44px 40px;
    position: relative;
}
.pb-cta__card-badge {
    position: absolute;
    top: -14px; right: 24px;
    background: var(--color-warm);
    color: #fff;
    font-family: var(--font-body);
    font-size: 12px; font-weight: 700;
    letter-spacing: 1px; text-transform: uppercase;
    padding: 7px 20px;
    border-radius: var(--radius-pill);
    animation: pulse-badge 2s ease-in-out infinite;
}
@@keyframes pulse-badge {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}
.pb-cta__card-title {
    font-family: var(--font-heading);
    font-size: 24px; font-weight: 800;
    color: var(--color-text);
    margin-bottom: 10px;
}
.pb-cta__card-desc {
    font-family: var(--font-body);
    font-size: 16px; color: var(--color-text-muted);
    line-height: 1.7; margin-bottom: 28px;
}

/* Contact rows inside card */
.pb-cta__card-contacts {
    display: flex; flex-direction: column;
    gap: 12px; margin-bottom: 28px;
}
.pb-cta__card-contact {
    display: flex; align-items: center; gap: 14px;
    text-decoration: none;
    padding: 12px 16px;
    background: var(--color-surface);
    border-radius: 12px;
    transition: background 0.25s, transform 0.25s;
}
.pb-cta__card-contact:hover {
    background: rgba(0,119,182,0.05);
    transform: translateX(4px);
}
.pb-cta__card-contact-icon {
    width: 42px; height: 42px;
    border-radius: 50%;
    background: var(--color-primary);
    color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; flex-shrink: 0;
}
.pb-cta__card-contact-icon--whatsapp { background: #25D366; }
.pb-cta__card-contact-icon--location { background: var(--color-warm); }
.pb-cta__card-contact-label {
    font-family: var(--font-body);
    font-size: 13px; font-weight: 600;
    color: var(--color-text-muted);
    text-transform: uppercase; letter-spacing: 1px;
    display: block; margin-bottom: 3px;
}
.pb-cta__card-contact-value {
    font-family: var(--font-heading);
    font-size: 17px; font-weight: 700;
    color: var(--color-text);
    display: block;
}
.pb-cta__card-btn {
    display: block; width: 100%; text-align: center;
    font-family: var(--font-body); font-size: 16px; font-weight: 700;
    background: var(--color-primary); color: #fff;
    padding: 16px; border-radius: var(--radius-pill);
    text-decoration: none; border: none;
    transition: background 0.28s;
}
.pb-cta__card-btn:hover {
    background: var(--color-primary-dk); color: #fff;
}
.pb-cta__card-btn i { margin-right: 6px; }

/* Decorative shape */
.pb-cta__shape {
    position: absolute;
    top: 6%; right: -1%;
    z-index: 0;
    animation: itswing-2 3s forwards infinite alternate;
    transform-origin: bottom right;
    opacity: 0.5;
}

/* ── Responsive ── */
@@media (max-width: 991px) {
    .pb-cta__card { margin-top: 50px; }
    .pb-cta__lead { max-width: 100%; }
}
@@media (max-width: 575px) {
    .pb-cta { padding: 80px 0; }
    .pb-cta__card { padding: 28px 22px; }
    .pb-cta__trust { gap: 16px; }
    .pb-cta__buttons { flex-direction: column; }
    .pb-cta__btn-primary,
    .pb-cta__btn-secondary { justify-content: center; width: 100%; }
}
</style>

    <!-- Decorative shape -->
    <div class="pb-cta__shape d-none d-lg-block">
        <img src="{{ asset('assets/img/about/shape-4-4.png') }}" alt="">
    </div>

    <div class="container" style="position:relative;z-index:2;">
        <div class="row gy-5 align-items-center">

            <!-- Left Column — Copy + Trust + Buttons -->
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

            <!-- Right Column — Action Card -->
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
<!-- Final CTA Section End -->

<!-- ========== MAP ========== -->
<div class="pb-map" id="location">
<style>
.pb-map iframe {
    width: 100%;
    height: 400px;
    border: 0;
    display: block;
    filter: saturate(0.8) contrast(1.05);
}
@@media (max-width: 767px) {
    .pb-map iframe { height: 280px; }
}
</style>
    <iframe src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=139B%20Humewood%20Drive,%20Parklands,%20Cape%20Town&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
            allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>
<!-- Map End -->

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── data-background handler (mirrors Edunity main.js) ────────────
    document.querySelectorAll('[data-background]').forEach(function(el) {
        el.style.backgroundImage = 'url(' + el.getAttribute('data-background') + ')';
    });

    // ── PureCounter init ─────────────────────────────────────────────
    if (typeof PureCounter !== 'undefined') {
        new PureCounter();
    }

    // ── Testimonials Swiper ──────────────────────────────
    if (document.querySelector('.pb-testi-slider')) {
        var testiSwiper = new Swiper('.pb-testi-slider', {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '#testiPagination',
                clickable: true,
            },
            breakpoints: {
                576: { slidesPerView: 1, spaceBetween: 20 },
                768: { slidesPerView: 2, spaceBetween: 22 },
                992: { slidesPerView: 3, spaceBetween: 24 },
            },
        });
    }
});
</script>
@endpush
