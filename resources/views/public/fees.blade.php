@extends('layouts.public')

@section('title', 'Daycare Fees & Pricing 2026 — Peekaboo Preschool Parklands, Cape Town')
@section('description', 'Transparent daycare fees at Peekaboo Parklands, Cape Town. Half-day from R3,800/month, full-day from R4,200/month. Optional snack box R400/month. No hidden costs. Sibling discounts available.')
@section('keywords', 'daycare fees Parklands 2026, preschool pricing Cape Town, childcare costs Parklands, full day daycare cost Cape Town, half day preschool fees Cape Town, affordable daycare Cape Town, how much does daycare cost Cape Town, Peekaboo Daycare fees')
@section('canonical', route('fees'))
@section('og_title', 'Daycare Fees & Pricing 2026 — Peekaboo Preschool Parklands, Cape Town')
@section('og_description', 'Transparent pricing at Peekaboo Daycare Parklands. Half-day from R3,800/mo, Full-day from R4,200/mo. No hidden costs. Sibling discounts available.')

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "WebPage",
  "@@id": "{{ route('fees') }}#webpage",
  "url": "{{ route('fees') }}",
  "name": "Daycare Fees & Pricing 2026 — Peekaboo Preschool Parklands, Cape Town",
  "description": "Transparent daycare fees at Peekaboo Daycare in Parklands, Cape Town. Half-day from R3,800/month, full-day R4,200/month.",
  "isPartOf": {"@@id": "{{ url('/') }}/#website"},
  "breadcrumb": {
    "@@type": "BreadcrumbList",
    "itemListElement": [
      {"@@type": "ListItem", "position": 1, "name": "Home", "item": "{{ route('home') }}"},
      {"@@type": "ListItem", "position": 2, "name": "Fees & Pricing", "item": "{{ route('fees') }}"}
    ]
  }
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "PriceSpecification",
  "name": "Peekaboo Daycare Fee Structure 2026",
  "description": "Monthly childcare fees at Peekaboo Daycare & Preschool, Parklands Cape Town",
  "priceCurrency": "ZAR",
  "eligibleQuantity": {"@@type": "QuantitativeValue", "unitText": "per month"}
}
</script>
@endpush

@section('content')

{{-- ══════════════════════════════════════════════════
     PAGE HERO — matches Programs & About page style
     ══════════════════════════════════════════════════ --}}
<section class="pb-page-hero fix p-relative">
<style>
.pb-page-hero { background:var(--color-surface);padding:80px 0 72px;overflow:hidden;position:relative; }
.pb-page-hero__shape-1 { position:absolute;top:-60px;right:-80px;opacity:.3;z-index:0;animation:itswing 4s ease-in-out infinite alternate;transform-origin:top right; }
.pb-page-hero__shape-2 { position:absolute;bottom:-30px;left:-50px;opacity:.2;z-index:0;animation:itswing 6s ease-in-out infinite alternate; }
@@keyframes itswing { 0%{transform:rotate(0deg);}100%{transform:rotate(6deg);} }
.pb-page-hero__breadcrumb { list-style:none;padding:0;margin:0 0 20px;display:flex;align-items:center;gap:6px;flex-wrap:wrap;font-family:var(--font-body);font-size:14px; }
.pb-page-hero__breadcrumb li { color:var(--color-muted); }
.pb-page-hero__breadcrumb a { color:var(--color-primary);text-decoration:none;transition:color .25s; }
.pb-page-hero__breadcrumb a:hover { color:var(--color-primary-dk); }
.pb-page-hero__breadcrumb li + li::before { content:'/';margin-right:6px;color:var(--color-muted); }

/* Right column quick-fact chips */
.pb-fees-hero-chips { display:flex;flex-direction:column;gap:16px;padding-left:20px; }
@@media(max-width:991px){ .pb-fees-hero-chips{padding-left:0;margin-top:44px;flex-direction:row;flex-wrap:wrap;} }
.pb-fees-hero-chip { display:flex;align-items:center;gap:16px;background:#fff;border-radius:var(--radius-md);padding:16px 24px;min-width:240px;transition:transform .3s ease; }
.pb-fees-hero-chip:hover { transform:translateX(6px); }
.pb-fees-hero-chip__icon { width:52px;height:52px;border-radius:14px;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:22px;color:#fff; }
.pb-fees-hero-chip__price { font-family:var(--font-heading);font-size:1.5rem;font-weight:900;color:var(--color-text);line-height:1;display:block; }
.pb-fees-hero-chip__label { font-family:var(--font-body);font-size:13px;color:var(--color-muted); }
</style>

    <div class="pb-page-hero__shape-1 d-none d-lg-block">
        <img src="{{ asset('assets/img/about/shape-4-4.png') }}" alt="" style="width:280px;">
    </div>
    <div class="pb-page-hero__shape-2 d-none d-lg-block">
        <img src="{{ asset('assets/img/hero/shape-2-3.png') }}" alt="" style="width:200px;">
    </div>

    <div class="container" style="position:relative;z-index:2;">
        <div class="row align-items-center">

            {{-- Left — copy + CTAs --}}
            <div class="col-lg-6 wow itfadeLeft" data-wow-duration=".9s" data-wow-delay=".1s">
                <ul class="pb-page-hero__breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Fees</li>
                </ul>
                <span class="it-section-subtitle-5 orange" style="margin-bottom:18px;display:inline-flex;align-items:center;gap:8px;">
                    <i class="fa-solid fa-circle-check"></i> No Hidden Costs
                </span>
                <h1 class="ed-slider-title" style="font-size:clamp(2.2rem,4.5vw,3.5rem);margin-bottom:22px;">
                    Clear, Honest <span style="color:var(--color-primary)">Pricing</span>
                </h1>
                <div class="ed-hero-2-text mb-30">
                    <p>We believe parents deserve total transparency. All-inclusive monthly rates with no surprise extras — what you see is exactly what you pay.</p>
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

            {{-- Right — at-a-glance price chips --}}
            <div class="col-lg-6 wow itfadeRight" data-wow-duration=".9s" data-wow-delay=".3s">
                <div class="pb-fees-hero-chips">
                    <div class="pb-fees-hero-chip">
                        <span class="pb-fees-hero-chip__icon" style="background:var(--color-accent)"><i class="fa-solid fa-sun"></i></span>
                        <span>
                            <span class="pb-fees-hero-chip__price">R3,800 <span style="font-size:.9rem;font-weight:600;color:var(--color-muted)">/month</span></span>
                            <span class="pb-fees-hero-chip__label">Half Day · 06:00–12:00/13:00</span>
                        </span>
                    </div>
                    <div class="pb-fees-hero-chip">
                        <span class="pb-fees-hero-chip__icon" style="background:var(--color-primary)"><i class="fa-solid fa-star"></i></span>
                        <span>
                            <span class="pb-fees-hero-chip__price">R4,200 <span style="font-size:.9rem;font-weight:600;color:var(--color-muted)">/month</span></span>
                            <span class="pb-fees-hero-chip__label">Full Day · 06:00–18:00 (Most Popular)</span>
                        </span>
                    </div>
                    <div class="pb-fees-hero-chip">
                        <span class="pb-fees-hero-chip__icon" style="background:var(--color-warm)"><i class="fa-solid fa-apple-whole"></i></span>
                        <span>
                            <span class="pb-fees-hero-chip__price">R400 <span style="font-size:.9rem;font-weight:600;color:var(--color-muted)">/month</span></span>
                            <span class="pb-fees-hero-chip__label">Snack Box · morning &amp; afternoon snacks</span>
                        </span>
                    </div>
                    <div class="pb-fees-hero-chip">
                        <span class="pb-fees-hero-chip__icon" style="background:var(--color-success)"><i class="fa-solid fa-file-invoice-dollar"></i></span>
                        <span>
                            <span class="pb-fees-hero-chip__price">R500 <span style="font-size:.9rem;font-weight:600;color:var(--color-muted)">once-off</span></span>
                            <span class="pb-fees-hero-chip__label">Registration fee · secures your child's place</span>
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════════
     MAIN PRICING CARDS — exact home pb-fee-card CSS
     ══════════════════════════════════════════════════ --}}
<section class="pb-fees" id="pricing" style="background:#fff;padding:100px 0 110px;position:relative;overflow:hidden;">
<style>
/* ── Exact home-page fee card CSS ── */
.pb-fees__sub { font-family:var(--font-body);font-size:13px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--color-warm);display:block;margin-bottom:12px; }
.pb-fees__heading { font-family:var(--font-heading);font-size:clamp(30px,4vw,46px);font-weight:900;color:var(--color-text);line-height:1.1;margin-bottom:0; }
.pb-fees__heading span { color:var(--color-primary); }
.pb-fee-card { background:#fff;border-radius:var(--radius-lg);padding:40px 32px 36px;box-shadow:var(--shadow-md);position:relative;height:100%;display:flex;flex-direction:column;transition:transform .32s ease,box-shadow .32s ease; }
.pb-fee-card:hover { transform:translateY(-6px);box-shadow:var(--shadow-lg); }
.pb-fee-card--popular { border:2px solid var(--color-primary); }
.pb-fee-card__badge { position:absolute;top:-16px;left:50%;transform:translateX(-50%);background:var(--color-primary);color:#fff;font-family:var(--font-heading);font-size:12px;font-weight:800;padding:5px 20px;border-radius:var(--radius-pill);white-space:nowrap;letter-spacing:.5px; }
.pb-fee-card__title { font-family:var(--font-heading);font-size:18px;font-weight:800;color:var(--color-text);text-transform:uppercase;letter-spacing:1px;margin-bottom:20px;text-align:center; }
.pb-fee-card__price-wrap { text-align:center;margin-bottom:28px; }
.pb-fee-card__price { font-family:var(--font-heading);font-size:52px;font-weight:900;color:var(--color-primary);line-height:1; }
.pb-fee-card__price-period { font-family:var(--font-body);font-size:14px;color:var(--color-muted);display:block;margin-top:4px; }
.pb-fee-card__divider { height:1px;background:#eef0f2;margin-bottom:24px; }
.pb-fee-card__features { list-style:none;padding:0;margin:0 0 28px;flex-grow:1; }
.pb-fee-card__features li { display:flex;align-items:flex-start;gap:12px;font-family:var(--font-body);font-size:14px;color:var(--color-body);margin-bottom:12px;line-height:1.5; }
.pb-fee-card__features li i { color:var(--color-primary);font-size:15px;flex-shrink:0;margin-top:1px; }
.pb-fee-card__cta-solid { display:block;text-align:center;font-family:var(--font-heading);font-size:15px;font-weight:800;background:var(--color-primary);color:#fff;padding:14px 28px;border-radius:var(--radius-pill);text-decoration:none;transition:background .25s,transform .25s,box-shadow .25s;box-shadow:0 5px 18px rgba(0,119,182,.28); }
.pb-fee-card__cta-solid:hover { background:var(--color-primary-dk);color:#fff;transform:translateY(-2px);box-shadow:0 8px 24px rgba(0,119,182,.36); }
.pb-fee-card__cta-outline { display:block;text-align:center;font-family:var(--font-heading);font-size:15px;font-weight:700;background:transparent;color:var(--color-primary);padding:13px 28px;border-radius:var(--radius-pill);border:2px solid var(--color-primary);text-decoration:none;transition:background .25s,color .25s,transform .25s; }
.pb-fee-card__cta-outline:hover { background:var(--color-primary);color:#fff;transform:translateY(-2px); }
.pb-fees__note { font-family:var(--font-body);font-size:14px;color:var(--color-text);text-align:center;margin-top:40px;background:#F5F6F8;padding:18px 28px;border-radius:12px;display:inline-block; }
.pb-fees__note-wrap { text-align:center; }
.pb-fees__note a { color:#25D366;font-weight:700;text-decoration:none; }
.pb-fees__note a:hover { text-decoration:underline; }
</style>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5 wow itfadeUp">
                <span class="pb-fees__sub">Investment in Your Child's Future</span>
                <h2 class="pb-fees__heading">Transparent <span>Pricing</span></h2>
                <p style="font-family:var(--font-body);font-size:17px;color:var(--color-body);line-height:1.8;margin-top:14px;">All-inclusive monthly rates — qualified teachers, activities, and a loving environment all covered.</p>
            </div>
        </div>

        <div class="row gx-4 gy-5 justify-content-center">

            {{-- Half Day --}}
            <div class="col-lg-4 col-md-6 d-flex wow itfadeUp" data-wow-delay=".10s">
                <div class="pb-fee-card w-100">
                    <h3 class="pb-fee-card__title">Half Day</h3>
                    <div class="pb-fee-card__price-wrap">
                        <span class="pb-fee-card__price">R3,800</span>
                        <span class="pb-fee-card__price-period">per month</span>
                    </div>
                    <div class="pb-fee-card__divider"></div>
                    <ul class="pb-fee-card__features">
                        <li><i class="fa-solid fa-circle-check"></i> Qualified, dedicated teachers</li>
                        <li><i class="fa-solid fa-circle-check"></i> Morning snack included</li>
                        <li><i class="fa-solid fa-circle-check"></i> All educational activities</li>
                        <li><i class="fa-solid fa-circle-check"></i> Safe, supervised environment</li>
                        <li><i class="fa-solid fa-circle-check"></i> 06:00–12:00 (babies–3 yrs)</li>
                        <li><i class="fa-solid fa-circle-check"></i> 06:00–13:00 (4 yrs–Gr.R)</li>
                    </ul>
                    <a href="{{ route('book-tour') }}" class="pb-fee-card__cta-outline">Book a Tour</a>
                </div>
            </div>

            {{-- Full Day — popular --}}
            <div class="col-lg-4 col-md-6 d-flex wow itfadeUp" data-wow-delay=".20s">
                <div class="pb-fee-card pb-fee-card--popular w-100">
                    <div class="pb-fee-card__badge">Most Popular</div>
                    <h3 class="pb-fee-card__title" style="color:var(--color-primary);">Full Day</h3>
                    <div class="pb-fee-card__price-wrap">
                        <span class="pb-fee-card__price">R4,200</span>
                        <span class="pb-fee-card__price-period">per month</span>
                    </div>
                    <div class="pb-fee-card__divider"></div>
                    <ul class="pb-fee-card__features">
                        <li><i class="fa-solid fa-circle-check"></i> All Half Day features included</li>
                        <li><i class="fa-solid fa-circle-check"></i> Nutritious lunch provided</li>
                        <li><i class="fa-solid fa-circle-check"></i> Afternoon activities &amp; rest</li>
                        <li><i class="fa-solid fa-circle-check"></i> Afternoon snack included</li>
                        <li><i class="fa-solid fa-circle-check"></i> Extended care until 18:00</li>
                        <li><i class="fa-solid fa-circle-check"></i> 06:00–18:00 all age groups</li>
                    </ul>
                    <a href="{{ route('enrol.index') }}" class="pb-fee-card__cta-solid">Enrol Now</a>
                </div>
            </div>

            {{-- Snack Box --}}
            <div class="col-lg-4 col-md-6 d-flex wow itfadeUp" data-wow-delay=".30s">
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
                        <li><i class="fa-solid fa-circle-check"></i> Fresh, healthy daily menu</li>
                        <li><i class="fa-solid fa-circle-check"></i> Nutritionist-approved</li>
                        <li><i class="fa-solid fa-circle-check"></i> Dietary needs accommodated</li>
                        <li><i class="fa-solid fa-circle-check"></i> Add to any package</li>
                    </ul>
                    <a href="https://wa.me/27828989967?text=Hi!%20I'd%20like%20to%20ask%20about%20the%20Snack%20Box%20add-on." target="_blank" rel="noopener" class="pb-fee-card__cta-outline">Ask About This</a>
                </div>
            </div>

        </div>

        {{-- Footer note --}}
        <div class="pb-fees__note-wrap mt-5 wow itfadeUp" data-wow-delay=".35s">
            <p class="pb-fees__note">
                <i class="fa-solid fa-info-circle" style="color:var(--color-primary);margin-right:6px;"></i>
                Registration Fee: <strong>R500 (non-refundable)</strong> &nbsp;·&nbsp; Sibling discounts available &nbsp;·&nbsp;
                <a href="https://wa.me/27828989967?text=Hi!%20I'd%20like%20to%20ask%20about%20fees%20and%20registration." target="_blank" rel="noopener">
                    <i class="fa-brands fa-whatsapp"></i> Chat to us on WhatsApp
                </a>
            </p>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════════
     OPTIONAL EXTRAS — pb-daily__card style from home
     ══════════════════════════════════════════════════ --}}
<section style="background:var(--color-surface);padding:100px 0 110px;position:relative;overflow:hidden;">
<style>
/* Extras use the same pb-daily__card pattern */
.pb-daily__sub { font-family:var(--font-body);font-size:13px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--color-warm);display:block;margin-bottom:12px; }
.pb-daily__heading { font-family:var(--font-heading);font-size:clamp(30px,4vw,46px);font-weight:900;color:var(--color-text);line-height:1.1;margin-bottom:18px; }
.pb-daily__heading span { color:var(--color-primary); }
.pb-daily__lead { font-family:var(--font-body);color:var(--color-body);font-size:17px;line-height:1.75;max-width:620px;margin:0 auto; }

.pb-extra-card { background:#fff;border-radius:var(--radius-lg);padding:40px 32px 36px;box-shadow:var(--shadow-md);position:relative;height:100%;display:flex;flex-direction:column;text-align:center;transition:transform .32s ease,box-shadow .32s ease; }
.pb-extra-card:hover { transform:translateY(-6px);box-shadow:var(--shadow-lg); }
.pb-extra-card__icon { width:72px;height:72px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;margin:0 auto 22px;font-size:28px;color:#fff; }
.pb-extra-card__name { font-family:var(--font-heading);font-size:20px;font-weight:900;color:var(--color-text);margin-bottom:12px; }
.pb_extra-card__desc { font-family:var(--font-body);font-size:14px;color:var(--color-body);line-height:1.75;flex-grow:1;margin-bottom:20px; }
.pb-extra-card__divider { height:1px;background:#eef0f2;margin-bottom:20px; }
.pb-extra-card__price { font-family:var(--font-heading);font-size:2.2rem;font-weight:900;color:var(--color-primary);line-height:1;display:block; }
.pb-extra-card__period { font-family:var(--font-body);font-size:13px;color:var(--color-muted);margin-top:4px;display:block; }
</style>

    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center wow itfadeUp">
                <span class="pb-daily__sub">Optional Extras</span>
                <h2 class="pb-daily__heading">More Ways to <span>Enrich Your Child's Day</span></h2>
                <p class="pb-daily__lead">Flexible add-ons designed around your family's needs.</p>
            </div>
        </div>

        <div class="row gx-4 gy-4 mt-2 justify-content-center">

            {{-- Sleepovers --}}
            <div class="col-lg-3 col-md-6 d-flex wow itfadeUp" data-wow-delay=".10s">
                <div class="pb-extra-card w-100">
                    <span class="pb-extra-card__icon" style="background:var(--color-accent)"><i class="fa-solid fa-moon"></i></span>
                    <h3 class="pb-extra-card__name">Sleepovers</h3>
                    <p class="pb-extra-card__desc">Fun, supervised overnight stays with movies, games, bedtime stories, and all the magic of a Peekaboo sleepover.</p>
                    <div class="pb-extra-card__divider"></div>
                    <span class="pb-extra-card__price">R150</span>
                    <span class="pb-extra-card__period">per night</span>
                </div>
            </div>

            {{-- Holiday Care --}}
            <div class="col-lg-3 col-md-6 d-flex wow itfadeUp" data-wow-delay=".15s">
                <div class="pb-extra-card w-100">
                    <span class="pb-extra-card__icon" style="background:var(--color-warm)"><i class="fa-solid fa-umbrella-beach"></i></span>
                    <h3 class="pb-extra-card__name">Holiday Care</h3>
                    <p class="pb-extra-card__desc">Full-day supervised care during school holidays — special themed activities, outings, and holiday fun all day long.</p>
                    <div class="pb-extra-card__divider"></div>
                    <span class="pb-extra-card__price">R150</span>
                    <span class="pb-extra-card__period">per day</span>
                </div>
            </div>

            {{-- Extra Murals --}}
            <div class="col-lg-3 col-md-6 d-flex wow itfadeUp" data-wow-delay=".20s">
                <div class="pb-extra-card w-100">
                    <span class="pb-extra-card__icon" style="background:var(--color-success)"><i class="fa-solid fa-futbol"></i></span>
                    <h3 class="pb-extra-card__name">Extra Murals</h3>
                    <p class="pb-extra-card__desc">Swimming, ballet, soccer, music and more — enriching activities that develop skills, teamwork and confidence.</p>
                    <div class="pb-extra-card__divider"></div>
                    <span class="pb-extra-card__price" style="font-size:1.3rem;color:var(--color-muted);font-weight:600;">Prices vary</span>
                    <span class="pb-extra-card__period">contact us for schedule</span>
                </div>
            </div>

            {{-- Birthday Parties --}}
            <div class="col-lg-3 col-md-6 d-flex wow itfadeUp" data-wow-delay=".25s">
                <div class="pb-extra-card w-100">
                    <span class="pb-extra-card__icon" style="background:#e91e63"><i class="fa-solid fa-cake-candles"></i></span>
                    <h3 class="pb-extra-card__name">Birthday Parties</h3>
                    <p class="pb-extra-card__desc">Celebrate your child's special day at our venue — a magical party with friends in a safe, familiar space they love.</p>
                    <div class="pb-extra-card__divider"></div>
                    <span class="pb-extra-card__price">R1,500</span>
                    <span class="pb-extra-card__period">from · enquire for packages</span>
                </div>
            </div>

        </div>

        {{-- WhatsApp CTA strip --}}
        <div class="row mt-5 wow itfadeUp" data-wow-delay=".3s">
            <div class="col-12">
                <div style="background:#fff;border-radius:var(--radius-md);padding:28px 36px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:20px;box-shadow:var(--shadow-md);">
                    <div style="display:flex;align-items:center;gap:16px;">
                        <span style="width:52px;height:52px;border-radius:50%;background:#25D366;display:flex;align-items:center;justify-content:center;font-size:22px;color:#fff;flex-shrink:0;"><i class="fa-brands fa-whatsapp"></i></span>
                        <div>
                            <strong style="font-family:var(--font-heading);font-size:17px;color:var(--color-text);display:block;">Interested in an extra?</strong>
                            <span style="font-family:var(--font-body);font-size:14px;color:var(--color-body);">Chat to us on WhatsApp and we'll sort out the details.</span>
                        </div>
                    </div>
                    <a href="https://wa.me/27828989967?text=Hi!%20I'd%20like%20to%20ask%20about%20your%20optional%20extras." target="_blank" rel="noopener"
                       style="display:inline-flex;align-items:center;gap:10px;background:#25D366;color:#fff;font-family:var(--font-body);font-size:15px;font-weight:700;padding:14px 30px;border-radius:var(--radius-pill);text-decoration:none;transition:background .25s,transform .25s;white-space:nowrap;"
                       onmouseover="this.style.background='#1ebd5a';this.style.transform='translateY(-2px)'"
                       onmouseout="this.style.background='#25D366';this.style.transform='translateY(0)'">
                        <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════════
     FEE POLICIES & FAQ — exact pb-faq from home
     ══════════════════════════════════════════════════ --}}
<section class="pb-faq" style="background:#fff;">
<style>
.pb-faq { padding:110px 0 100px;position:relative;overflow:hidden; }
.pb-faq__shape { position:absolute;bottom:5%;left:-2%;z-index:0;animation:itswing-2 3s forwards infinite alternate;transform-origin:top left;opacity:.6; }
@@keyframes itswing-2 { 0%{transform:rotate(0deg);}100%{transform:rotate(5deg);} }
.pb-faq__sub { font-family:var(--font-body);font-size:13px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--color-warm);display:block;margin-bottom:12px; }
.pb-faq__heading { font-family:var(--font-heading);font-size:clamp(30px,4vw,42px);font-weight:900;color:var(--color-text);line-height:1.1;margin-bottom:18px; }
.pb-faq__heading span { color:var(--color-primary); }
.pb-faq__lead { font-family:var(--font-body);color:var(--color-body);font-size:16px;line-height:1.75;margin-bottom:36px; }
.pb-faq__contact { background:var(--color-surface);border-radius:16px;padding:28px 30px;display:flex;align-items:flex-start;gap:16px; }
.pb-faq__contact-icon { width:48px;height:48px;border-radius:50%;background:var(--color-primary);color:#fff;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0; }
.pb-faq__contact-title { font-family:var(--font-body);font-size:17px;font-weight:700;color:var(--color-text);margin:0 0 6px; }
.pb-faq__contact-text { font-family:var(--font-body);font-size:14px;color:var(--color-body);line-height:1.6;margin:0 0 14px; }
.pb-faq__contact-link { display:inline-flex;align-items:center;gap:10px;font-family:var(--font-body);font-size:14px;font-weight:700;color:#fff;background:#25D366;padding:10px 22px;border-radius:var(--radius-pill);text-decoration:none;transition:background .3s,transform .3s;margin-top:4px; }
.pb-faq__contact-link:hover { background:#1ebd5a;color:#fff;transform:translateY(-2px); }
.pb-faq__item { background:#fff;border:1px solid #eaeef3;border-radius:14px;margin-bottom:12px;overflow:hidden;transition:box-shadow .3s ease,border-color .3s ease; }
.pb-faq__item:has(.accordion-button:not(.collapsed)) { border-color:var(--color-primary);box-shadow:0 6px 24px rgba(0,119,182,.08); }
.pb-faq .accordion .accordion-button.pb-faq__btn { font-family:var(--font-body)!important;font-size:17px!important;font-weight:700!important;color:var(--color-text)!important;background:#fff!important;padding:20px 24px;box-shadow:none!important;gap:14px;border-radius:14px; }
.pb-faq .accordion .accordion-button.pb-faq__btn:not(.collapsed) { color:var(--color-primary)!important;background:#fff!important; }
.pb-faq .accordion-button .pb-faq__icon { width:34px!important;height:34px!important;min-width:34px;border-radius:50%!important;background:var(--color-surface)!important;display:inline-flex!important;align-items:center;justify-content:center;flex-shrink:0;transition:background .3s,color .3s; }
.pb-faq .accordion-button .pb-faq__icon i { font-size:13px!important;color:var(--color-primary)!important;transition:color .3s;line-height:1; }
.pb-faq .accordion-button:not(.collapsed) .pb-faq__icon { background:var(--color-primary)!important; }
.pb-faq .accordion-button:not(.collapsed) .pb-faq__icon i { color:#fff!important; }
.pb-faq .accordion .accordion-button.pb-faq__btn::after { background-image:none!important;content:'\f078'!important;font-family:'Font Awesome 6 Pro'!important;font-weight:900!important;font-size:12px!important;color:var(--color-muted);width:auto;height:auto;transition:transform .3s ease,color .3s ease; }
.pb-faq .accordion .accordion-button.pb-faq__btn:not(.collapsed)::after { content:'\f077'!important;color:var(--color-primary);transform:none; }
.pb-faq__body { font-family:var(--font-body);font-size:15px;color:var(--color-body);line-height:1.8;padding:0 24px 22px 72px; }
@@media(max-width:575px){ .pb-faq__body{padding:0 18px 18px 62px;font-size:14px;} }
</style>

    <div class="pb-faq__shape d-none d-lg-block">
        <img src="{{ asset('assets/img/about/ed-shape-3-1.png') }}" alt="">
    </div>

    <div class="container" style="position:relative;z-index:2;">
        <div class="row gy-5">

            {{-- Left — heading + contact card + policy list --}}
            <div class="col-lg-5 wow itfadeUp">
                <span class="pb-faq__sub">Good to Know</span>
                <h2 class="pb-faq__heading">Fee Policies &amp; <span>FAQs</span></h2>
                <p class="pb-faq__lead">Everything you need to know about payments, notice periods, and what's included — answered clearly and honestly.</p>

                {{-- Policy quick list --}}
                <div style="background:var(--color-surface);border-radius:16px;padding:28px 30px;margin-bottom:24px;">
                    <h4 style="font-family:var(--font-heading);font-size:17px;font-weight:800;color:var(--color-text);margin-bottom:18px;display:flex;align-items:center;gap:10px;"><i class="fa-solid fa-circle-info" style="color:var(--color-primary)"></i> Key Policies</h4>
                    <ul style="list-style:none;padding:0;margin:0;">
                        <li style="display:flex;align-items:flex-start;gap:10px;font-family:var(--font-body);font-size:14px;color:var(--color-body);padding:10px 0;border-bottom:1px solid #e8eaed;">
                            <i class="fa-sharp fa-solid fa-circle-check" style="color:var(--color-primary);flex-shrink:0;margin-top:2px;"></i> R500 non-refundable registration fee secures your place
                        </li>
                        <li style="display:flex;align-items:flex-start;gap:10px;font-family:var(--font-body);font-size:14px;color:var(--color-body);padding:10px 0;border-bottom:1px solid #e8eaed;">
                            <i class="fa-sharp fa-solid fa-circle-check" style="color:var(--color-primary);flex-shrink:0;margin-top:2px;"></i> Fees due on the 1st of each month via EFT
                        </li>
                        <li style="display:flex;align-items:flex-start;gap:10px;font-family:var(--font-body);font-size:14px;color:var(--color-body);padding:10px 0;border-bottom:1px solid #e8eaed;">
                            <i class="fa-sharp fa-solid fa-circle-check" style="color:var(--color-primary);flex-shrink:0;margin-top:2px;"></i> Sibling discounts available — ask us for details
                        </li>
                        <li style="display:flex;align-items:flex-start;gap:10px;font-family:var(--font-body);font-size:14px;color:var(--color-body);padding:10px 0;border-bottom:1px solid #e8eaed;">
                            <i class="fa-sharp fa-solid fa-circle-check" style="color:var(--color-primary);flex-shrink:0;margin-top:2px;"></i> Full calendar month's written notice to withdraw
                        </li>
                        <li style="display:flex;align-items:flex-start;gap:10px;font-family:var(--font-body);font-size:14px;color:var(--color-body);padding:10px 0;">
                            <i class="fa-sharp fa-solid fa-circle-check" style="color:var(--color-primary);flex-shrink:0;margin-top:2px;"></i> Annual fee review effective January each year
                        </li>
                    </ul>
                </div>

                <div class="pb-faq__contact">
                    <div class="pb-faq__contact-icon"><i class="fa-solid fa-headset"></i></div>
                    <div>
                        <h4 class="pb-faq__contact-title">Still Have Questions?</h4>
                        <p class="pb-faq__contact-text">Our friendly team is happy to walk you through everything. No question is too small.</p>
                        <a href="https://wa.me/27828989967?text=Hi%20Peekaboo%2C%20I%20have%20a%20question%20about%20fees" class="pb-faq__contact-link" target="_blank" rel="noopener">
                            <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Right — FAQ accordion --}}
            <div class="col-lg-7">
                <div class="accordion" id="feesFaqAccordion">

                    <div class="pb-faq__item wow itfadeUp" data-wow-delay=".05s">
                        <h3 class="accordion-header">
                            <button class="accordion-button pb-faq__btn" type="button" data-bs-toggle="collapse" data-bs-target="#feesFaq1" aria-expanded="true">
                                <span class="pb-faq__icon"><i class="fa-solid fa-file-invoice-dollar"></i></span> When are fees due and how do I pay?
                            </button>
                        </h3>
                        <div id="feesFaq1" class="accordion-collapse collapse show" data-bs-parent="#feesFaqAccordion">
                            <div class="pb-faq__body">Fees are due on the <strong>1st of each month</strong> via EFT (electronic bank transfer). Our banking details are provided upon registration. A R500 non-refundable registration fee is payable once to secure your child's place.</div>
                        </div>
                    </div>

                    <div class="pb-faq__item wow itfadeUp" data-wow-delay=".10s">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed pb-faq__btn" type="button" data-bs-toggle="collapse" data-bs-target="#feesFaq2" aria-expanded="false">
                                <span class="pb-faq__icon"><i class="fa-solid fa-utensils"></i></span> Are meals included in the fees?
                            </button>
                        </h3>
                        <div id="feesFaq2" class="accordion-collapse collapse" data-bs-parent="#feesFaqAccordion">
                            <div class="pb-faq__body">Full Day enrolment includes a <strong>nutritious lunch and afternoon snack</strong>. Half Day includes a morning snack. You can add our Snack Box (R400/month) for morning and afternoon snacks on the Half Day option. All meals are freshly prepared on-site by our kitchen team.</div>
                        </div>
                    </div>

                    <div class="pb-faq__item wow itfadeUp" data-wow-delay=".15s">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed pb-faq__btn" type="button" data-bs-toggle="collapse" data-bs-target="#feesFaq3" aria-expanded="false">
                                <span class="pb-faq__icon"><i class="fa-solid fa-users"></i></span> Do you offer sibling discounts?
                            </button>
                        </h3>
                        <div id="feesFaq3" class="accordion-collapse collapse" data-bs-parent="#feesFaqAccordion">
                            <div class="pb-faq__body">Yes! We offer <strong>sibling discounts</strong> for families with more than one child enrolled. Please contact us directly via WhatsApp or phone to discuss the current discount structure applicable to your family.</div>
                        </div>
                    </div>

                    <div class="pb-faq__item wow itfadeUp" data-wow-delay=".20s">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed pb-faq__btn" type="button" data-bs-toggle="collapse" data-bs-target="#feesFaq4" aria-expanded="false">
                                <span class="pb-faq__icon"><i class="fa-solid fa-file-contract"></i></span> What is the withdrawal / notice policy?
                            </button>
                        </h3>
                        <div id="feesFaq4" class="accordion-collapse collapse" data-bs-parent="#feesFaqAccordion">
                            <div class="pb-faq__body">A full <strong>calendar month's written notice</strong> is required to withdraw your child. Notice cannot be given for November. Fees remain payable during the notice period regardless of attendance. Sick days and public holidays are not deducted from monthly fees.</div>
                        </div>
                    </div>

                    <div class="pb-faq__item wow itfadeUp" data-wow-delay=".25s">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed pb-faq__btn" type="button" data-bs-toggle="collapse" data-bs-target="#feesFaq5" aria-expanded="false">
                                <span class="pb-faq__icon"><i class="fa-solid fa-moon"></i></span> How do Sleepovers and Holiday Care work?
                            </button>
                        </h3>
                        <div id="feesFaq5" class="accordion-collapse collapse" data-bs-parent="#feesFaqAccordion">
                            <div class="pb-faq__body">Sleepovers are <strong>R150 per night</strong> — supervised overnight stays with fun activities, movies, and bedtime stories. Holiday Care is <strong>R150 per day</strong>, offering full-day supervised care with themed activities during school holidays. Both are bookable in advance — contact us to reserve a spot.</div>
                        </div>
                    </div>

                    <div class="pb-faq__item wow itfadeUp" data-wow-delay=".30s">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed pb-faq__btn" type="button" data-bs-toggle="collapse" data-bs-target="#feesFaq6" aria-expanded="false">
                                <span class="pb-faq__icon"><i class="fa-solid fa-calendar-check"></i></span> Are fees charged during school holidays?
                            </button>
                        </h3>
                        <div id="feesFaq6" class="accordion-collapse collapse" data-bs-parent="#feesFaqAccordion">
                            <div class="pb-faq__body">Monthly fees cover <strong>all school holiday periods</strong> — your child's place is held and the monthly rate remains the same year-round. Holiday Care (R150/day) is an optional extra for families wanting additional structured care and activities during holidays.</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════════
     FINAL CTA — exact .pb-cta from home.blade.php
     ══════════════════════════════════════════════════ --}}
<section id="contact" class="pb-cta">
<style>
.pb-cta { background:var(--color-surface);padding:110px 0 100px;position:relative;overflow:hidden; }
.pb-cta__sub { font-family:var(--font-body);font-size:13px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--color-warm);display:inline-flex;align-items:center;gap:8px;margin-bottom:14px; }
.pb-cta__sub::before { content:'';width:28px;height:2px;background:var(--color-warm); }
.pb-cta__heading { font-family:var(--font-heading);font-size:clamp(30px,4vw,46px);font-weight:900;color:var(--color-text);line-height:1.1;margin-bottom:18px; }
.pb-cta__heading span { color:var(--color-primary); }
.pb-cta__lead { font-family:var(--font-body);font-size:16px;line-height:1.8;color:var(--color-body);margin-bottom:32px;max-width:480px; }
.pb-cta__trust { display:flex;flex-wrap:wrap;gap:20px;margin-bottom:36px; }
.pb-cta__trust-item { display:flex;align-items:center;gap:10px; }
.pb-cta__trust-icon { width:40px;height:40px;border-radius:50%;background:rgba(0,119,182,.08);display:flex;align-items:center;justify-content:center;color:var(--color-primary);font-size:16px;flex-shrink:0; }
.pb-cta__trust-text { font-family:var(--font-body);font-size:13px;font-weight:600;color:var(--color-text);line-height:1.3; }
.pb-cta__buttons { display:flex;flex-wrap:wrap;gap:14px; }
.pb-cta__btn-primary { display:inline-flex;align-items:center;gap:10px;font-family:var(--font-body);font-size:15px;font-weight:700;background:var(--color-primary);color:#fff;padding:16px 34px;border-radius:var(--radius-pill);text-decoration:none;border:none;transition:transform .28s ease,box-shadow .28s ease,background .28s;box-shadow:0 4px 18px rgba(0,119,182,.25); }
.pb-cta__btn-primary:hover { background:var(--color-primary-dk);color:#fff;transform:translateY(-3px);box-shadow:0 8px 30px rgba(0,119,182,.35); }
.pb-cta__btn-secondary { display:inline-flex;align-items:center;gap:10px;font-family:var(--font-body);font-size:15px;font-weight:600;background:#fff;color:var(--color-text);padding:16px 34px;border-radius:var(--radius-pill);border:2px solid #e2e6ea;text-decoration:none;transition:all .28s ease; }
.pb-cta__btn-secondary:hover { border-color:var(--color-primary);color:var(--color-primary);transform:translateY(-3px);box-shadow:0 4px 18px rgba(0,119,182,.1); }
.pb-cta__card { background:#fff;border-radius:20px;padding:44px 40px;position:relative; }
.pb-cta__card-badge { position:absolute;top:-14px;right:24px;background:var(--color-warm);color:#fff;font-family:var(--font-body);font-size:12px;font-weight:700;letter-spacing:1px;text-transform:uppercase;padding:7px 20px;border-radius:var(--radius-pill);animation:pulse-badge 2s ease-in-out infinite; }
@@keyframes pulse-badge { 0%,100%{transform:scale(1);}50%{transform:scale(1.05);} }
.pb-cta__card-title { font-family:var(--font-heading);font-size:24px;font-weight:800;color:var(--color-text);margin-bottom:10px; }
.pb-cta__card-desc { font-family:var(--font-body);font-size:16px;color:var(--color-body);line-height:1.7;margin-bottom:28px; }
.pb-cta__card-contacts { display:flex;flex-direction:column;gap:12px;margin-bottom:28px; }
.pb-cta__card-contact { display:flex;align-items:center;gap:14px;text-decoration:none;padding:12px 16px;background:var(--color-surface);border-radius:12px;transition:background .25s,transform .25s; }
.pb-cta__card-contact:hover { background:rgba(0,119,182,.05);transform:translateX(4px); }
.pb-cta__card-contact-icon { width:42px;height:42px;border-radius:50%;background:var(--color-primary);color:#fff;display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0; }
.pb-cta__card-contact-icon--whatsapp { background:#25D366; }
.pb-cta__card-contact-icon--location { background:var(--color-warm); }
.pb-cta__card-contact-label { font-family:var(--font-body);font-size:13px;font-weight:600;color:var(--color-muted);text-transform:uppercase;letter-spacing:1px;display:block;margin-bottom:3px; }
.pb-cta__card-contact-value { font-family:var(--font-heading);font-size:17px;font-weight:700;color:var(--color-text);display:block; }
.pb-cta__card-btn { display:block;width:100%;text-align:center;font-family:var(--font-body);font-size:16px;font-weight:700;background:var(--color-primary);color:#fff;padding:16px;border-radius:var(--radius-pill);text-decoration:none;transition:background .28s; }
.pb-cta__card-btn:hover { background:var(--color-primary-dk);color:#fff; }
.pb-cta__card-btn i { margin-right:6px; }
.pb-cta__shape { position:absolute;top:6%;right:-1%;z-index:0;animation:itswing-2 3s forwards infinite alternate;transform-origin:bottom right;opacity:.5; }
@@media(max-width:991px){ .pb-cta__card{margin-top:50px;} .pb-cta__lead{max-width:100%;} }
@@media(max-width:575px){ .pb-cta{padding:80px 0;} .pb-cta__card{padding:28px 22px;} .pb-cta__buttons{flex-direction:column;} .pb-cta__btn-primary,.pb-cta__btn-secondary{justify-content:center;width:100%;} }
</style>

    <div class="pb-cta__shape d-none d-lg-block">
        <img src="{{ asset('assets/img/about/shape-4-4.png') }}" alt="">
    </div>

    <div class="container" style="position:relative;z-index:2;">
        <div class="row gy-5 align-items-center">

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

            <div class="col-lg-5 offset-lg-1 wow itfadeUp" data-wow-delay="0.15s">
                <div class="pb-cta__card">
                    <span class="pb-cta__card-badge">Limited Spaces 2026</span>
                    <h3 class="pb-cta__card-title">Get in Touch With Us</h3>
                    <p class="pb-cta__card-desc">Have questions about fees or registration? Our friendly team is ready to help.</p>
                    <div class="pb-cta__card-contacts">
                        <a href="tel:0215574999" class="pb-cta__card-contact">
                            <span class="pb-cta__card-contact-icon"><i class="fa-solid fa-phone"></i></span>
                            <span>
                                <span class="pb-cta__card-contact-label">Call Us</span>
                                <span class="pb-cta__card-contact-value">060 793 0520</span>
                            </span>
                        </a>
                        <a href="https://wa.me/27828989967?text=Hi!%20I'd%20like%20to%20enquire%20about%20fees%20at%20Peekaboo%20Daycare." target="_blank" rel="noopener" class="pb-cta__card-contact">
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










