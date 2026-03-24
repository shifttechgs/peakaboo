@extends('layouts.public')

@section('title', 'Enrol Your Child — Peekaboo Daycare Parklands, Cape Town | Apply Online')
@section('description', 'Enrol your child at Peekaboo Daycare & Preschool in Parklands, Cape Town. Simple online application — takes 10 minutes. Accepting applications for 2026. Ages 3 months to Grade R.')
@section('keywords', 'enrol preschool Parklands 2026, daycare application Cape Town, register child daycare Parklands, enrol kindergarten Cape Town, preschool enrolment Cape Town northside')
@section('canonical', route('enrol.index'))
@section('og_title', 'Enrol Your Child — Peekaboo Daycare Parklands, Cape Town')
@section('og_description', 'Apply online in 10 minutes. Peekaboo Daycare in Parklands, Cape Town is now accepting enrolments for 2026. Ages 3 months to Grade R.')

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "WebPage",
  "@@id": "{{ route('enrol.index') }}#webpage",
  "url": "{{ route('enrol.index') }}",
  "name": "Enrol Your Child — Peekaboo Daycare Parklands, Cape Town",
  "description": "Enrol your child at Peekaboo Daycare in Parklands, Cape Town. Online application open for 2026.",
  "isPartOf": {"@@id": "{{ url('/') }}/#website"},
  "breadcrumb": {
    "@@type": "BreadcrumbList",
    "itemListElement": [
      {"@@type": "ListItem", "position": 1, "name": "Home", "item": "{{ route('home') }}"},
      {"@@type": "ListItem", "position": 2, "name": "Enrol Now", "item": "{{ route('enrol.index') }}"}
    ]
  }
}
</script>
@endpush

@section('content')
<style>
/* ============================================================
   ENROL LANDING — Lean, high-converting gateway
============================================================ */

.pb-enrol-hero {
    background: var(--color-surface);
    padding: 72px 0 80px;
    position: relative;
    overflow: hidden;
}
.pb-enrol-hero__breadcrumb {
    list-style: none;
    padding: 0;
    margin: 0 0 24px;
    display: flex;
    gap: 8px;
    font-family: var(--font-body);
    font-size: 16px;
    color: var(--color-muted);
}
.pb-enrol-hero__breadcrumb a {
    color: var(--color-primary);
    text-decoration: none;
}
.pb-enrol-hero__breadcrumb li + li::before {
    content: '/';
    margin-right: 8px;
    color: var(--color-muted);
}
.pb-enrol-hero__badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: var(--font-body);
    font-size: 13px;
    font-weight: 700;
    color: var(--color-warm);
    background: var(--color-warm-lt);
    padding: 8px 18px;
    border-radius: var(--radius-pill);
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 1px;
}
.pb-enrol-hero__title {
    font-family: var(--font-heading);
    font-size: clamp(2.2rem, 4vw, 3.5rem);
    font-weight: 800;
    color: var(--color-text);
    margin: 0 0 20px;
    line-height: 1.12;
}
.pb-enrol-hero__title span {
    color: var(--color-primary);
}
.pb-enrol-hero__desc {
    font-family: var(--font-body);
    font-size: 17px;
    color: var(--color-body);
    line-height: 1.75;
    max-width: 520px;
    margin-bottom: 36px;
}
.pb-enrol-hero__cta {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: var(--font-body);
    font-size: 16px;
    font-weight: 700;
    background: var(--color-primary);
    color: #fff;
    padding: 18px 44px;
    border-radius: var(--radius-pill);
    text-decoration: none;
    transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
    box-shadow: 0 4px 18px rgba(0,119,182,0.25);
}
.pb-enrol-hero__cta:hover {
    background: var(--color-primary-dk);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(0,119,182,0.35);
}

/* ── Checklist (inline, compact) ── */
.pb-enrol-checklist {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.pb-enrol-checklist li {
    font-family: var(--font-body);
    font-size: 15px;
    color: var(--color-body);
    display: flex;
    align-items: center;
    gap: 10px;
}
.pb-enrol-checklist li i {
    color: var(--color-success);
    font-size: 14px;
    flex-shrink: 0;
}

/* ── Right-side card ── */
.pb-enrol-ready {
    background: #fff;
    border-radius: var(--radius-lg);
    padding: 40px 36px;
}
.pb-enrol-ready__title {
    font-family: var(--font-heading);
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--color-text);
    margin: 0 0 20px;
}
.pb-enrol-ready__footer {
    font-family: var(--font-body);
    font-size: 14px;
    color: var(--color-muted);
    margin-top: 20px;
    padding-top: 16px;
    border-top: 1px solid rgba(0,0,0,0.06);
}
.pb-enrol-ready__footer i {
    color: var(--color-success);
    margin-right: 4px;
}

/* ── Responsive ── */
@media (max-width: 991px) {
    .pb-enrol-hero { padding: 56px 0 48px; }
    .pb-enrol-ready { margin-top: 16px; }
}
@media (max-width: 575px) {
    .pb-enrol-ready { padding: 28px 20px; }
}
</style>

    <div class="pb-enrol-hero">
        <div class="container">
            <ul class="pb-enrol-hero__breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Enrol</li>
            </ul>
            <div class="row align-items-center gy-4">

                <!-- Left — Headline + CTA -->
                <div class="col-lg-7 wow itfadeUp" data-wow-duration=".9s">
                    <span class="pb-enrol-hero__badge">
                        <i class="fa-solid fa-heart"></i> Limited Spaces for {{ date('Y') }}
                    </span>
                    <h1 class="pb-enrol-hero__title">Begin Your Child's <span>Journey With Us</span></h1>
                    <p class="pb-enrol-hero__desc">Our simple 7-step form takes about 10 minutes. Your progress saves automatically — come back anytime to finish.</p>

                    <a href="{{ route('enrol.form') }}" class="pb-enrol-hero__cta">
                        <i class="fa-solid fa-paper-plane"></i> Start Application Now
                    </a>
                </div>

                <!-- Right — Compact "have ready" card -->
                <div class="col-lg-5 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".15s">
                    <div class="pb-enrol-ready">
                        <h4 class="pb-enrol-ready__title"><i class="fa-solid fa-clipboard-list" style="color: var(--color-primary); margin-right: 8px;"></i>Have Ready</h4>
                        <ul class="pb-enrol-checklist">
                            <li><i class="fa-solid fa-check"></i> Child's full name, DOB & ID number</li>
                            <li><i class="fa-solid fa-check"></i> Both parents' contact details & IDs</li>
                            <li><i class="fa-solid fa-check"></i> Medical aid & doctor information</li>
                            <li><i class="fa-solid fa-check"></i> Documents — <em>optional, can send later</em></li>
                        </ul>
                        <p class="pb-enrol-ready__footer">
                            <i class="fa-solid fa-lock"></i> Your information is secure & confidential
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
