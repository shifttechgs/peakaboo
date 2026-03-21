<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Peekaboo Daycare & Preschool') - A Safe, Loving Space</title>
    <meta name="author" content="Peekaboo Daycare">
    <meta name="description" content="@yield('description', 'Licensed daycare in Parklands, Cape Town. Nurturing children from infancy to Grade R with qualified teachers and Christian values.')">
    <meta name="keywords" content="daycare, preschool, kindergarten, childcare, Cape Town, Parklands">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/peekaboo/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/peekaboo/logo.png') }}">

    <!-- Google Fonts — Brand: Epilogue (headings) + Sora (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@400;500;600;700;800;900&family=Sora:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- All CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon_xoft.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/edunity-hero.css') }}">

    <style>
    :root {
      /* Brand Colors */
      --color-primary:     #0077B6;
      --color-primary-dk:  #0c508e;
      --color-accent:      #70167E;
      --color-warm:        #D18109;
      --color-warm-lt:     #FFF3E0;
      --color-success:     #2E7D32;

      /* Neutrals */
      --color-text:        #0E2A46;
      --color-body:        #4D5756;
      --color-muted:       #6b7280;
      --color-surface:     #F9F6F2;
      --color-card:        #F5F6F8;

      /* Functional */
      --color-error:       #dc3545;
      --color-warning:     #ffc107;
      --color-whatsapp:    #25D366;

      /* Elevation (flat design — modals/dropdowns only) */
      --shadow-modal: 0 8px 40px rgba(0,0,0,.14);

      /* Radii */
      --radius-sm:   6px;
      --radius-md:   12px;
      --radius-lg:   20px;
      --radius-pill:  999px;

      /* Typography */
      --font-heading: 'Epilogue', sans-serif;
      --font-body:    'Sora', sans-serif;
    }

    /* ── Override legacy Toddly template font vars ── */
    :root {
      --vs-title-font: 'Epilogue', sans-serif;
      --vs-body-font:  'Sora', sans-serif;
      --vs-title-color: #0E2A46;
      --vs-body-color:  #4D5756;
    }

    /* ── Global body & paragraph baseline ── */
    body {
      font-family: var(--font-body);
      font-size: 16px;
      color: var(--color-body);
    }
    h1, h2, h3, h4, h5, h6 {
      font-family: var(--font-heading);
      color: var(--color-text);
    }
    p { font-size: 16px; line-height: 1.8; }
    p.lead, .vs-about__text, .vs-service__text,
    .vs-class__text, .vs-class__age,
    .vs-gallery__heading { font-size: 17px !important; }

    /* ── Flat cards — no shadows, no borders, bg contrast only ── */
    .pb-prog-card,
    .pb-fee-card,
    .pb-daily__card,
    .ed-team-item,
    .t-qual,
    .pb-faq__item,
    .pb-faq__item:has(.accordion-button:not(.collapsed)),
    .pb-cta__card,
    .ed-testimonial-item,
    .pb-trust__inner {
        box-shadow: none !important;
        border: none !important;
    }
    .pb-prog-card:hover,
    .pb-fee-card:hover,
    .pb-daily__card:hover,
    .ed-team-item:hover,
    .pb-cta__card:hover {
        box-shadow: none !important;
    }
    .t-bubble, .t-bubble:hover {
        box-shadow: none !important;
        border: none !important;
    }

    /* White section → cards get off-white */
    .ed-team-item,
    .pb-faq__item,
    .pb-fee-card {
        background: var(--color-card) !important;
    }
    /* Cream/surface section → cards stay white (natural contrast) */
    .pb-daily__card,
    .pb-cta__card,
    .pb-prog-card {
        background: #fff !important;
    }
    /* Qualifications banner on white bg */
    .t-qual {
        background: var(--color-card) !important;
    }
    /* Testimonial cards on cream bg — clean white */
    .ed-testimonial-item {
        background: #fff !important;
        border: none !important;
    }
    </style>

    @stack('styles')
</head>
<body>
{{--    <!-- Preloader -->--}}
{{--    <div class="preloader">--}}
{{--        <button class="vs-btn preloaderCls">Cancel Preloader</button>--}}
{{--        <div class="preloader-inner">--}}
{{--            <img src="{{ asset('assets/img/peekaboo/logo.png') }}" alt="Peekaboo Daycare">--}}
{{--            <span class="loader"></span>--}}
{{--        </div>--}}
{{--    </div>--}}

    @include('partials.public-header')

    <main class="vs-main">
        @yield('content')
    </main>

    @include('partials.public-footer')

    <!-- Back To Top Button -->
    <button class="back-to-top" id="backToTop" aria-label="Back to Top">
        <span class="progress-circle">
            <svg viewBox="0 0 100 100">
                <circle class="bg" cx="50" cy="50" r="40"></circle>
                <circle class="progress" cx="50" cy="50" r="40"></circle>
            </svg>
            <span class="progress-percentage" id="progressPercentage">0%</span>
        </span>
    </button>

    <!-- All JS Files -->
    <script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/js/gsap-scroll-to-plugin.js') }}"></script>
    <script src="{{ asset('assets/js/SplitText.js') }}"></script>
    <script src="{{ asset('assets/js/lenis.min.js') }}"></script>
    <script src="{{ asset('assets/js/flipperCount.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/purecounter.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')
</body>
</html>
