@extends('layouts.public')

@section('title', 'Peekaboo Daycare & Preschool - Parklands, Cape Town')
@section('description', 'Safe, trusted childcare for 3 months to Grade R in Parklands, Cape Town. Qualified teachers, CAPS curriculum, Christian values. Book your tour today.')

@section('content')
<style>
/* Global 18px paragraph override for home page */
.vs-hero__desc,
.vs-about__text,
.vs-service__text,
.vs-class__text,
.vs-class__age { font-size: 17px !important; }
</style>
<!-- ========== HERO SECTION ========== -->
<section class="vs-hero overflow-hidden z-index-common parallax-wrap">
    <div class="vs-hero__ele1">
        <img class="parallax-element" src="{{ asset('assets/img/hero/h1-ele-1-1.svg') }}" alt="decorative element">
    </div>
    <div class="swiper vs-hero__active--zoom">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="vs-hero__bg vs-hero__bg--zoom" data-bg-src="{{ asset('assets/img/hero/banner-1-1.jpg') }}"></div>
                <div class="container container--custom">
                    <div class="vs-hero__content">
                        <div class="vs-hero__shape" style="  display: flex; flex-direction: column; justify-content: center;">
                            <div class="vs-hero__shape--bg vs-hero__anim" data-bg-src="{{ asset('assets/img/hero/hero-shape-1.svg') }}" ></div><br><br>
                            <span class="vs-hero__title--sub vs-hero__anim"
                                  style="
        background: #0c508e;
        color: white;
        padding: 10px 20px;
        border-radius: 25px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        font-size: 14px;
       box-shadow: 0 4px 15px rgba(209, 129, 9, 0.4);

        width: fit-content;
        white-space: nowrap;
      ">

    Now Enrolling for 2026
</span>

                            <h3 class="vs-hero__title--main vs-hero__anim">
                                Where Learning Feels<span> Safe & Happy.</span>
                            </h3>
                            <p class="vs-hero__desc vs-hero__anim">
                                Trusted care for children aged 3 months to Grade R in the heart of Parklands
                            </p>
                            <div class="d-flex gap-2 gap-md-3 justify-content-center justify-content-md-start mb-4 vs-hero__anim" style="flex-wrap: nowrap;">
                                <a href="{{ route('book-tour') }}" class="vs-btn vs-hero__btn" style="white-space: nowrap;"><span class="vs-btn__border"></span>Book a Tour</a>
                                <a href="https://wa.me/27828989967?text=Hi!%20I'd%20like%20to%20enquire%20about%20Peekaboo%20Daycare." class="vs-btn style4 vs-hero__btn" target="_blank" rel="noopener" style="white-space: nowrap;"><span class="vs-btn__border"></span>WhatsApp Us</a>
                            </div>
{{--                            <div class="vs-hero__trust-indicators vs-hero__anim" style="display: flex; flex-wrap: wrap; gap: 10px 15px; font-size: 13px; color: #4A2559; font-weight: 600; justify-content: center; text-align: center;">--}}
{{--                                <span style="white-space: nowrap;"><i class="fa-solid fa-check-circle" style="color: #0c508e; margin-right: 5px;"></i>Registered Daycare</span>--}}
{{--                                <span style="white-space: nowrap;"><i class="fa-solid fa-check-circle" style="color: #0c508e; margin-right: 5px;"></i>CAPS Aligned</span>--}}
{{--                                <span style="white-space: nowrap;"><i class="fa-solid fa-check-circle" style="color: #0c508e; margin-right: 5px;"></i>{{ date('Y') - 2010 }}+ Years Experience</span>--}}
{{--                            </div>--}}
                            <img class="vs-hero__character vs-hero__anim" src="{{ asset('assets/img/hero/hero-character-1.png') }}" alt="Happy Child Character">
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="vs-hero__bg vs-hero__bg--zoom" data-bg-src="{{ asset('assets/img/hero/banner-1-2.jpg') }}"></div>
                <div class="container container--custom">
                    <div class="vs-hero__content">
                        <div class="vs-hero__shape" style="  display: flex; flex-direction: column; justify-content: center;">
                            <div class="vs-hero__shape--bg vs-hero__anim" data-bg-src="{{ asset('assets/img/hero/hero-shape-1.svg') }}" ></div><br><br>
                            <span class="vs-hero__title--sub vs-hero__anim"
                                  style="
        background: #0c508e;
        color: white;
        padding: 10px 20px;
        border-radius: 25px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        font-size: 14px;
       box-shadow: 0 4px 15px rgba(209, 129, 9, 0.4);

        width: fit-content;
        white-space: nowrap;
      ">

    Now Enrolling for 2026
</span>

                            <h3 class="vs-hero__title--main vs-hero__anim">
                                Give Your Child a <span>Confident</span> Start.
                            </h3>
                            <p class="vs-hero__desc vs-hero__anim">
                                From Baby Room to Grade R — every stage nurtured with care in Parklands
                            </p>
                            <div class="d-flex gap-2 gap-md-3 justify-content-center justify-content-md-start mb-4 vs-hero__anim" style="flex-wrap: nowrap;">
                                <a href="{{ route('book-tour') }}" class="vs-btn vs-hero__btn" style="white-space: nowrap;"><span class="vs-btn__border"></span>Book a Tour</a>
                                <a href="https://wa.me/27828989967?text=Hi!%20I'd%20like%20to%20enquire%20about%20Peekaboo%20Daycare." class="vs-btn style4 vs-hero__btn" target="_blank" rel="noopener" style="white-space: nowrap;"><span class="vs-btn__border"></span>WhatsApp Us</a>
                            </div>

                            <img class="vs-hero__character vs-hero__anim" src="{{ asset('assets/img/hero/hero-character-1.png') }}" alt="Happy Child Character">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="vs-hero__direction">
            <div class="vs-swiper-button-next" aria-label="Next slide">
                <i class="fa-solid fa-arrow-right"></i>
            </div>
            <div class="vs-swiper-button-prev" aria-label="Previous slide">
                <i class="fa-solid fa-arrow-left"></i>
            </div>
        </div>
    </div>
    <div class="vs-balls vs-balls--screen" data-balls-bottom="-6px" data-balls-color="#f6f1e4"></div>
</section>
<!-- Hero End -->

<!-- ========== SAFETY & PEACE OF MIND SECTION ========== -->
<section class="vs-service--area animation-active z-index-common space overflow-hidden" data-bg-src="{{ asset('assets/img/service/service-bg.png') }}">
    <img src="{{ asset('assets/img/elements/service-ele-1.svg') }}" alt="decorative element" class="vs-service--ele1 wow animate__fadeInLeft" data-wow-delay="0.25s">
    <img src="{{ asset('assets/img/elements/service-ele-2.svg') }}" alt="decorative element" class="vs-service--ele2 wow animate__fadeInRight" data-wow-delay="0.45s">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="vs-title text-center title-anime animation-style2">
                    <div class="title-anime__wrap">
                        <span class="vs-title__sub">Your Peace of Mind Matters</span>
                        <h2 class="vs-title__main">Keeping Your Child <span>Safe & Happy</span></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gx-3 gy-4 justify-content-center mt-4">
            <div class="col-lg-3 col-md-6 d-flex">
                <div class="vs-service wow animate__fadeInUp" data-wow-delay="0.25s" style="display: flex; flex-direction: column; height: 100%; width: 100%;">
                    <div class="vs-service__figure">
                        <div class="vs-service__image--link">
                            <img class="vs-service__image" src="{{ asset('assets/img/service/s-1-2.jpg') }}" alt="Secure Premises">
                        </div>
                    </div>
                    <div class="vs-service__content" style="flex-grow: 1; display: flex; flex-direction: column;">
                        <div class="vs-service__header">
                            <span class="vs-service__icon">
                                <img src="{{ asset('assets/img/icons/service-icon-1-2.svg') }}" alt="security icon">
                            </span>
                        </div>
                        <h3 class="vs-service__heading">Secure Premises</h3>
                        <p class="vs-service__text" style="flex-grow: 1;">CCTV surveillance and controlled access so you know your child is safe every moment of the day.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 d-flex">
                <div class="vs-service wow animate__fadeInUp" data-wow-delay="0.35s" style="display: flex; flex-direction: column; height: 100%; width: 100%;">
                    <div class="vs-service__figure">
                        <div class="vs-service__image--link">
                            <img class="vs-service__image" src="{{ asset('assets/img/service/s-1-1.jpg') }}" alt="Qualified Teachers">
                        </div>
                    </div>
                    <div class="vs-service__content" style="flex-grow: 1; display: flex; flex-direction: column;">
                        <div class="vs-service__header">
                            <span class="vs-service__icon">
                                <img src="{{ asset('assets/img/icons/service-icon-1-1.svg') }}" alt="teacher icon">
                            </span>
                        </div>
                        <h3 class="vs-service__heading">Qualified & Vetted Teachers</h3>
                        <p class="vs-service__text" style="flex-grow: 1;">Trained ECD professionals who are background-checked and passionate about early childhood development.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 d-flex">
                <div class="vs-service wow animate__fadeInUp" data-wow-delay="0.45s" style="display: flex; flex-direction: column; height: 100%; width: 100%;">
                    <div class="vs-service__figure">
                        <div class="vs-service__image--link">
                            <img class="vs-service__image" src="{{ asset('assets/img/service/s-1-4.jpg') }}" alt="Healthy Meals">
                        </div>
                    </div>
                    <div class="vs-service__content" style="flex-grow: 1; display: flex; flex-direction: column;">
                        <div class="vs-service__header">
                            <span class="vs-service__icon">
                                <img src="{{ asset('assets/img/icons/service-icon-1-3.svg') }}" alt="nutrition icon">
                            </span>
                        </div>
                        <h3 class="vs-service__heading">Healthy Meals Daily</h3>
                        <p class="vs-service__text" style="flex-grow: 1;">Nutritious, balanced meals prepared fresh on-site — one less thing for busy parents to worry about.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 d-flex">
                <div class="vs-service wow animate__fadeInUp" data-wow-delay="0.55s" style="display: flex; flex-direction: column; height: 100%; width: 100%;">
                    <div class="vs-service__figure">
                        <div class="vs-service__image--link">
                            <img class="vs-service__image" src="{{ asset('assets/img/service/s-1-3.jpg') }}" alt="Parent Communication">
                        </div>
                    </div>
                    <div class="vs-service__content" style="flex-grow: 1; display: flex; flex-direction: column;">
                        <div class="vs-service__header">
                            <span class="vs-service__icon">
                                <img src="{{ asset('assets/img/icons/service-icon-1-3.svg') }}" alt="communication icon">
                            </span>
                        </div>
                        <h3 class="vs-service__heading">Daily Parent Updates</h3>
                        <p class="vs-service__text" style="flex-grow: 1;">Stay connected with real-time updates, photos, and messages about your child's day and progress.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Safety & Peace of Mind Section End -->

<!-- ========== WHY PARENTS CHOOSE US SECTION ========== -->
<section id="about" class="vs-about--section space space-extra-bottom z-index-common parallax-wrap overflow-hidden" data-bg-src="{{ asset('assets/img/about/vs-about-h1-bg.png') }}">
    <img src="{{ asset('assets/img/about/vs-about-h1-ele-4.png') }}" alt="decorative element" class="vs-about--ele1 wow animate__fadeInUp" data-wow-delay="0.35s">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-30 wow animate__fadeInUp" data-wow-delay="0.25s">
                <div class="vs-about--image">
                    <div class="vs-about--image__figure1 wow animate__fadeInUp" data-wow-delay="0.25s">
                        <img src="{{ asset('assets/img/about/vs-about-h1-1.jpg') }}" alt="Children learning at Peekaboo" width="198" height="214" loading="lazy">
                    </div>
                    <div class="vs-about--image__figure2 wow animate__fadeInUp" data-wow-delay="0.35s">
                        <img src="{{ asset('assets/img/about/vs-about-h1-2.jpg') }}" alt="Happy children playing" width="400" height="461" loading="lazy">
                    </div>
                    <div class="vs-about--image__ele1 parallax-element" data-move="80">
                        <img src="{{ asset('assets/img/about/vs-about-h1-ele-1.svg') }}" alt="decorative element">
                    </div>
                    <div class="vs-about--image__ele2 parallax-element" data-move="50">
                        <img src="{{ asset('assets/img/about/vs-about-h1-ele-2.svg') }}" alt="decorative element">
                    </div>
                    <div class="vs-about--image__ele3 wow animate__zoomIn" data-wow-delay="0.55s"></div>
                    <div class="vs-about--yoe">
                        <span class="vs-about--yoe__number">
                            {{ date('Y') - 2010 }}+
                        </span>
                        <span class="vs-about--yoe__text">years of experience</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-30 wow animate__fadeInUp" data-wow-delay="0.45s">
                <div class="vs-about--right">
                    <div class="vs-title title-anime animation-style2">
                        <div class="title-anime__wrap">
                            <span class="vs-title__sub">Why Parents Choose Us</span>
                            <h2 class="vs-title__main">
                                What Makes <span>Peekaboo</span> Different
                            </h2>
                        </div>
                    </div>
                    <div class="vs-about--story">
                        <p class="vs-about__text vs-text mb-25">Since 2010, we've been more than just a daycare — we're a trusted partner in your child's early years, offering peace of mind and a foundation for lifelong learning.</p>
                        <ul class="mb-35" style="list-style: none !important; padding-left: 0; margin-left: 0;">
                            <li style="margin-bottom: 20px; list-style: none !important;">
                                <h3 class="vs-service__heading" style="display: block; margin-bottom: 5px;"><i class="fa-solid fa-heart" style="color: #0c508e; margin-right: 8px;"></i> Small Class Sizes</h3>

                                <span style="color: #666;">Your child receives individual attention and care, not lost in a crowd.</span>
                            </li>
                            <li style="margin-bottom: 20px; list-style: none !important;">
                                <h3 class="vs-service__heading" style="display: block; margin-bottom: 5px;"><i class="fa-solid fa-graduation-cap" style="color: #0c508e; margin-right: 8px;"></i>CAPS Curriculum</h3>
                                <span style="color: #666;">School readiness you can trust — your child will start Grade 1 confident and prepared.</span>
                            </li>
                            <li style="margin-bottom: 20px; list-style: none !important;">
                                <h3 class="vs-service__heading" style="display: block; margin-bottom: 5px;"><i class="fa-solid fa-palette" style="color: #0c508e; margin-right: 8px;"></i>Play-Based Learning</h3>
                                <span style="color: #666;">Joyful learning through creativity, exploration, and discovery — childhood as it should be.</span>
                            </li>
                            <li style="margin-bottom: 20px; list-style: none !important;">
                                <h3 class="vs-service__heading" style="display: block; margin-bottom: 5px;"><i class="fa-solid fa-calendar-check" style="color: #0c508e; margin-right: 8px;"></i>Structured Routines</h3>
                                <span style="color: #666;">Children thrive on predictability — our daily routines create stability and comfort.</span>
                            </li>
                        </ul>
                        <a href="{{ route('book-tour') }}" class="vs-btn"><span class="vs-btn__border"></span>Book a Tour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Why Parents Choose Us Section End -->

<!-- ========== MEET OUR TEACHERS SECTION ========== -->
<section id="teachers" class="space space-extra-bottom">
<style>
/* ============================================================
   TEACHERS SECTION — Peekaboo
   Editorial portrait bento + infinite marquee team strip
============================================================ */

#teachers {
    background-color: #f9f6f2;
    position: relative;
    overflow: hidden;
}

/* Ambient colour blobs */
#teachers .t-blob {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    z-index: 0;
}
#teachers .t-blob--a {
    top: -140px; right: -140px;
    width: 520px; height: 520px;
    background: radial-gradient(circle at 60% 40%, rgba(209,129,9,0.10), transparent 62%);
}
#teachers .t-blob--b {
    bottom: 60px; left: -160px;
    width: 500px; height: 500px;
    background: radial-gradient(circle at 40% 60%, rgba(12,80,142,0.08), transparent 62%);
}

/* ── PORTRAIT CARD ───────────────────────────────── */
.t-card {
    position: relative;
    border-radius: 22px;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.45s cubic-bezier(0.22,0.61,0.36,1),
                box-shadow  0.45s cubic-bezier(0.22,0.61,0.36,1);
}

/* Photo container */
.t-card__photo {
    position: relative;
    display: block;
    overflow: hidden;
}
.t-card--tall .t-card__photo { aspect-ratio: 3 / 4.3; }
.t-card--mid  .t-card__photo { aspect-ratio: 3 / 3.5; }

.t-card__photo img {
    width: 100%; height: 100%;
    object-fit: cover; display: block;
    transition: transform 0.65s cubic-bezier(0.22,0.61,0.36,1);
}

/* Gradient info overlay */
.t-card__overlay {
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 50px 20px 20px;
    transition: padding-bottom 0.35s ease;
}

.t-card__role {
    font-family: "Roboto", sans-serif;
    font-size: 10px; font-weight: 700;
    letter-spacing: 1.3px; text-transform: uppercase;
    color: rgba(255,255,255,0.78);
    margin: 0 0 5px; display: block;
}
.t-card__name {
    font-family: "Baloo 2", sans-serif;
    font-weight: 800; color: #fff;
    font-size: 19px; margin: 0; line-height: 1.2;
}
.t-card--tall .t-card__name { font-size: 22px; }

.t-card__quals {
    font-family: "Roboto", sans-serif;
    font-size: 12px; color: rgba(255,255,255,0.65);
    margin: 7px 0 0; display: block;
    opacity: 0; transform: translateY(7px);
    transition: opacity 0.35s ease 0.06s, transform 0.35s ease 0.06s;
}

/* Years badge pill */
.t-card__badge {
    position: absolute; top: 14px; right: 14px; z-index: 2;
    background: rgba(255,255,255,0.94);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border-radius: 50px; padding: 4px 12px;
    font-family: "Roboto", sans-serif;
    font-size: 11px; font-weight: 700;
    color: #25283e; letter-spacing: 0.2px;
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
    font-family: "Amatic SC", sans-serif;
    font-size: 27px; font-weight: 700;
    color: #4A2559; white-space: nowrap;
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
.t-marquee-wrap::before { left: 0;  background: linear-gradient(to right, #f9f6f2, transparent); }
.t-marquee-wrap::after  { right: 0; background: linear-gradient(to left,  #f9f6f2, transparent); }

.t-marquee {
    display: flex; gap: 22px;
    width: max-content; padding: 10px 0;
}
.t-marquee--fwd { animation: t-fwd 38s linear infinite; }
.t-marquee--rev { animation: t-rev 44s linear infinite; }
.t-marquee-wrap:hover .t-marquee { animation-play-state: paused; }

@keyframes t-fwd { from { transform: translateX(0);    } to { transform: translateX(-50%); } }
@keyframes t-rev { from { transform: translateX(-50%); } to { transform: translateX(0);    } }

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
    font-family: "Baloo 2", sans-serif;
    font-size: 20px; font-weight: 800;
    color: #25283e; margin: 0 0 10px;
}
.t-qual__body {
    font-family: "Roboto", sans-serif;
    font-size: 17px; color: #5b5a7b;
    line-height: 1.72; margin: 0;
}
.t-stats {
    display: flex; align-items: center;
    justify-content: center; flex-wrap: wrap;
}
.t-stat { text-align: center; padding: 8px 22px; }
.t-stat__num {
    font-family: "Baloo 2", sans-serif;
    font-size: 34px; font-weight: 800;
    color: #0c508e; line-height: 1;
    display: block; margin-bottom: 4px;
}
.t-stat__label {
    font-family: "Roboto", sans-serif;
    font-size: 10.5px; font-weight: 700;
    letter-spacing: 1.1px; text-transform: uppercase;
    color: #5b5a7b; display: block;
}
.t-stat-sep { width: 1px; height: 44px; background: rgba(12,80,142,0.12); flex-shrink: 0; }

/* ── RESPONSIVE ──────────────────────────────────── */
@media (max-width: 991px) {
    .t-card--tall .t-card__photo,
    .t-card--mid  .t-card__photo { aspect-ratio: 3 / 3.8; }
    .t-qual { padding: 28px 28px 28px 38px; }
}
@media (max-width: 575px) {
    .t-card--tall .t-card__photo,
    .t-card--mid  .t-card__photo { aspect-ratio: 2 / 3; }
    .t-card__name { font-size: 14px; }
    .t-card--tall .t-card__name { font-size: 15px; }
    .t-card__role { font-size: 9px; }
    .t-card__badge { font-size: 10px; padding: 3px 9px; top: 10px; right: 10px; }
    .t-bubble { width: 120px; height: 120px; }
    .t-marquee--rev .t-bubble { width: 106px; height: 106px; }
    .t-qual { padding: 22px 18px 22px 28px; }
    .t-stat { padding: 6px 14px; }
    .t-stat__num { font-size: 26px; }
    .t-team-label { font-size: 22px; }
    .t-team-header { margin-top: 52px; }
}

/* ── MANAGEMENT TRIO ─────────────────────────────── */
.t-section-divider {
    display: flex; align-items: center; gap: 18px;
    margin: 0 0 28px;
}
.t-section-divider::before,
.t-section-divider::after {
    content: ''; flex: 1; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(12,80,142,0.22), transparent);
}
.t-section-divider--teachers::before,
.t-section-divider--teachers::after {
    background: linear-gradient(90deg, transparent, rgba(74,37,89,0.2), transparent);
}
.t-divider-label {
    font-family: "Amatic SC", sans-serif;
    font-size: 26px; font-weight: 700;
    white-space: nowrap;
}
.t-divider-label--mgmt    { color: #0c508e; }
.t-divider-label--teachers { color: #4A2559; }

.t-mgmt {
    display: grid;
    grid-template-columns: 1fr 1.3fr 1fr;
    gap: 18px;
    align-items: end;
    position: relative; z-index: 2;
    padding-bottom: 14px;
    margin-bottom: 60px;
}
.t-mgmt-slot { position: relative; }

/* Frame colours for management */
.t-mgmt-slot:nth-child(1) .t-card { box-shadow: -10px 10px 0 0 rgba(12,80,142,0.72); }
.t-mgmt-slot:nth-child(2) .t-card { box-shadow:   0 12px 0 0 rgba(209,129,9,0.78); }
.t-mgmt-slot:nth-child(3) .t-card { box-shadow:  10px 10px 0 0 rgba(74,37,89,0.72); }

/* Management hover — lift + deepen frame */
.t-mgmt-slot:nth-child(1):hover .t-card {
    transform: translateY(-5px) translateX(3px);
    box-shadow: -13px 14px 0 0 rgba(12,80,142,0.92), 0 22px 44px rgba(12,80,142,0.13);
}
.t-mgmt-slot:nth-child(2):hover .t-card {
    transform: translateY(-5px);
    box-shadow: 0 16px 0 0 rgba(209,129,9,0.92), 0 22px 44px rgba(209,129,9,0.14);
}
.t-mgmt-slot:nth-child(3):hover .t-card {
    transform: translateY(-5px) translateX(-3px);
    box-shadow: 13px 14px 0 0 rgba(74,37,89,0.92), 0 22px 44px rgba(74,37,89,0.13);
}

/* Management overlay gradients — deeper, more authoritative */
.t-mgmt-slot:nth-child(1) .t-card__overlay {
    background: linear-gradient(to top, rgba(12,80,142,0.95) 0%, rgba(12,80,142,0.45) 42%, transparent 72%);
}
.t-mgmt-slot:nth-child(2) .t-card__overlay {
    background: linear-gradient(to top, rgba(37,40,62,0.96) 0%, rgba(37,40,62,0.42) 42%, transparent 72%);
}
.t-mgmt-slot:nth-child(3) .t-card__overlay {
    background: linear-gradient(to top, rgba(74,37,89,0.95) 0%, rgba(74,37,89,0.45) 42%, transparent 72%);
}

/* Shared hover interactions for management slots */
.t-mgmt-slot:hover .t-card__photo img   { transform: scale(1.06); }
.t-mgmt-slot:hover .t-card__overlay     { padding-bottom: 26px; }
.t-mgmt-slot:hover .t-card__quals       { opacity: 1; transform: translateY(0); }

/* Management card heights */
.t-mgmt .t-card--tall .t-card__photo { aspect-ratio: 3 / 4.2; }
.t-mgmt .t-card--mid  .t-card__photo { aspect-ratio: 3 / 3.7; }

/* Gold badge for management */
.t-card__badge--gold {
    background: linear-gradient(135deg, #D18109, #f5a623);
    color: #fff;
}

/* Responsive — management */
@media (max-width: 575px) {
    .t-mgmt {
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }
    .t-mgmt-slot:nth-child(2) {
        grid-column: 1 / -1;
        max-width: 240px;
        margin: 0 auto;
    }
    .t-mgmt-slot:nth-child(1) .t-card,
    .t-mgmt-slot:nth-child(2) .t-card,
    .t-mgmt-slot:nth-child(3) .t-card { box-shadow: 0 6px 24px rgba(0,0,0,0.12); }
    .t-mgmt-slot:nth-child(1):hover .t-card,
    .t-mgmt-slot:nth-child(2):hover .t-card,
    .t-mgmt-slot:nth-child(3):hover .t-card {
        transform: translateY(-4px);
        box-shadow: 0 14px 36px rgba(0,0,0,0.16);
    }
    .t-mgmt .t-card--tall .t-card__photo,
    .t-mgmt .t-card--mid  .t-card__photo { aspect-ratio: 2 / 3; }
}
</style>

    <!-- Ambient blobs -->
    <div class="t-blob t-blob--a"></div>
    <div class="t-blob t-blob--b"></div>

    <div class="container" style="position:relative;z-index:2;">

        <!-- Section Header -->
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="vs-title title-anime animation-style2">
                    <div class="title-anime__wrap">
                        <span class="vs-title__sub">The Heart of Peekaboo</span>
                        <h2 class="vs-title__main">Meet Our <span>Dedicated</span> Teachers</h2>
                    </div>
                </div>
                <p style="font-family:'Roboto',sans-serif;color:#5b5a7b;font-size:17px;line-height:1.75;max-width:590px;margin:16px auto 0;">
                    Our qualified educators bring expertise, genuine warmth, and a deep passion for early childhood development — each one chosen with care and committed to nurturing your child's unique potential.
                </p>
            </div>
        </div>

        <!-- Management Trio -->
        <div class="t-section-divider wow animate__fadeInUp" data-wow-delay="0.05s">
            <span class="t-divider-label t-divider-label--mgmt">Our Leadership &amp; Management</span>
        </div>

        <div class="t-mgmt wow animate__fadeInUp" data-wow-delay="0.1s">

            <!-- Management 1 — Left -->
            <div class="t-mgmt-slot">
                <div class="t-card t-card--mid">
                    <div class="t-card__photo">
                        <img src="{{ asset('assets/img/peekaboo_staff/2.png') }}" alt="Peekaboo Management">
                        <span class="t-card__badge t-card__badge--gold">Management</span>
                        <div class="t-card__overlay">
                            <span class="t-card__role">Management</span>
                            <h3 class="t-card__name">Peekaboo Management</h3>
                            <span class="t-card__quals">Leading with Heart &amp; Vision</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Management 2 — Centre (Principal / Director) -->
            <div class="t-mgmt-slot">
                <div class="t-card t-card--tall">
                    <div class="t-card__photo">
                        <img src="{{ asset('assets/img/peekaboo_staff/1.png') }}" alt="Peekaboo Director">
                        <span class="t-card__badge t-card__badge--gold">Director</span>
                        <div class="t-card__overlay">
                            <span class="t-card__role">Director &amp; Principal</span>
                            <h3 class="t-card__name">Peekaboo Director</h3>
                            <span class="t-card__quals">Founder · ECD Champion</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Management 3 — Right -->
            <div class="t-mgmt-slot">
                <div class="t-card t-card--mid">
                    <div class="t-card__photo">
                        <img src="{{ asset('assets/img/peekaboo_staff/3.png') }}" alt="Peekaboo Management">
                        <span class="t-card__badge t-card__badge--gold">Management</span>
                        <div class="t-card__overlay">
                            <span class="t-card__role">Management</span>
                            <h3 class="t-card__name">Peekaboo Management</h3>
                            <span class="t-card__quals">Operations &amp; Care Quality</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- / Management Trio -->

        <!-- Full Team Marquee Strip -->
        <div class="wow animate__fadeInUp" data-wow-delay="0.2s">

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
        <div class="t-qual wow animate__fadeInUp" data-wow-delay="0.25s">
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

<!-- ========== PROGRAMS & AGE GROUPS SECTION ========== -->
<section id="programs" class="vs-class--area space-extra-top space-extra-bottom z-index-common overflow-hidden" data-bg-src="{{ asset('assets/img/class/class-bg.png') }}">
    <div class="vs-class--ele1 vs-x-anim">
        <img src="{{ asset('assets/img/class/class-ele1.png') }}" alt="decorative element">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="vs-title text-center title-anime animation-style2">
                    <div class="title-anime__wrap">
                        <span class="vs-title__sub">Programs & Age Groups</span>
                        <h2 class="vs-title__main">The Right Program for <span>Your Child's Age</span></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="z-index-common">
            <div class="vs-carousel vs-carousel--class swiper" data-xl="4" data-lg="3" data-autoplay="false" data-loop="true" data-autoplay-delay="6000" data-nav-next="#swiper-button-next" data-nav-prev="#swiper-button-prev">
                <div class="swiper-wrapper">
                    <div class="swiper-slide wow animate__fadeInUp" data-wow-delay="0.25s">
                        <div class="vs-class">
                            <div class="vs-class__figure">
                                <div class="vs-class__figure--link">
                                    <img class="vs-class__figure--img" src="{{ asset('assets/img/class/class-1-1.jpg') }}" alt="Baby Room Program">
                                    <div class="vs-class__icon--wrap">
                                        <span class="vs-class__icon vs-class__icon--color1">
                                            <img src="{{ asset('assets/img/icons/h1-class-icon-1.svg') }}" alt="Baby icon">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="vs-class__content">
                                <h3 class="vs-class__heading">Baby Room</h3>
                                <p class="vs-class__age" style="color: #0c508e; font-weight: 600; font-size: 14px; margin-bottom: 10px;">3 – 18 months</p>
                                <p class="vs-class__text">
                                    Your baby's first safe space away from home — loving care, sensory development, and nurturing routines.
                                </p>
                            </div>
                            <div class="vs-class__bottom">
                                <a href="{{ route('home') }}#contact" class="vs-class__link" aria-label="Learn more about Baby Room">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide wow animate__fadeInUp" data-wow-delay="0.45s">
                        <div class="vs-class">
                            <div class="vs-class__figure">
                                <div class="vs-class__figure--link">
                                    <img class="vs-class__figure--img" src="{{ asset('assets/img/class/class-1-2.jpg') }}" alt="Toddler Program">
                                    <div class="vs-class__icon--wrap">
                                        <span class="vs-class__icon vs-class__icon--color2">
                                            <img src="{{ asset('assets/img/icons/h1-class-icon-2.svg') }}" alt="Toddler icon">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="vs-class__content">
                                <h3 class="vs-class__heading">Toddlers</h3>
                                <p class="vs-class__age" style="color: #0c508e; font-weight: 600; font-size: 14px; margin-bottom: 10px;">18 months – 3 years</p>
                                <p class="vs-class__text">
                                    Active exploration in a safe environment — building confidence, language, and social skills through play.
                                </p>
                            </div>
                            <div class="vs-class__bottom">
                                <a href="{{ route('home') }}#contact" class="vs-class__link" aria-label="Learn more about Toddler Program">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide wow animate__fadeInUp" data-wow-delay="0.65s">
                        <div class="vs-class">
                            <div class="vs-class__figure">
                                <div class="vs-class__figure--link">
                                    <img class="vs-class__figure--img" src="{{ asset('assets/img/class/class-1-3.jpg') }}" alt="Preschool Program">
                                    <div class="vs-class__icon--wrap">
                                        <span class="vs-class__icon vs-class__icon--color3">
                                            <img src="{{ asset('assets/img/icons/h1-class-icon-3.svg') }}" alt="Preschool icon">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="vs-class__content">
                                <h3 class="vs-class__heading">Preschool</h3>
                                <p class="vs-class__age" style="color: #0c508e; font-weight: 600; font-size: 14px; margin-bottom: 10px;">3 – 4 years</p>
                                <p class="vs-class__text">
                                    Building independence and curiosity — creative learning, problem-solving, and early literacy skills.
                                </p>
                            </div>
                            <div class="vs-class__bottom">
                                <a href="{{ route('home') }}#contact" class="vs-class__link" aria-label="Learn more about Preschool Program">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide wow animate__fadeInUp" data-wow-delay="0.85s">
                        <div class="vs-class">
                            <div class="vs-class__figure">
                                <div class="vs-class__figure--link">
                                    <img class="vs-class__figure--img" src="{{ asset('assets/img/class/class-1-4.jpg') }}" alt="Grade R Program">
                                    <div class="vs-class__icon--wrap">
                                        <span class="vs-class__icon vs-class__icon--color4">
                                            <img src="{{ asset('assets/img/icons/h1-class-icon-4.svg') }}" alt="Grade R icon">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="vs-class__content">
                                <h3 class="vs-class__heading">Grade R</h3>
                                <p class="vs-class__age" style="color: #0c508e; font-weight: 600; font-size: 14px; margin-bottom: 10px;">4 – 5 years</p>
                                <p class="vs-class__text">
                                    Fully prepared for big school — CAPS-aligned curriculum, confidence, and a love for learning.
                                </p>
                            </div>
                            <div class="vs-class__bottom">
                                <a href="{{ route('home') }}#contact" class="vs-class__link" aria-label="Learn more about Grade R Program">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center pt-50">
                <button id="swiper-button-prev" class="vs-slider__button" aria-label="Previous program">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button id="swiper-button-next" class="vs-slider__button" aria-label="Next program">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>
<!-- Programs & Age Groups Section End -->

<!-- ========== A TYPICAL DAY AT PEEKABOO SECTION ========== -->
<section id="gallery" class="vs-gallery--area space space-extra-bottom overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="vs-title text-center title-anime animation-style2">
                    <div class="title-anime__wrap">
                        <span class="vs-title__sub">Daily Life at Peekaboo</span>
                        <h2 class="vs-title__main">A Typical Day <span>at Our School</span></h2>
                    </div>
                </div>
                <p class="text-center mb-40" style="color: #666; font-size: 17px; max-width: 700px; margin-left: auto; margin-right: auto;">
                    From circle time to outdoor play, nutritious meals to creative activities — every moment is designed to nurture curious minds and happy hearts.
                </p>
            </div>
        </div>

        <!-- Gallery Tabs -->
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs justify-content-center mb-40" id="galleryTabs" role="tablist" style="border: none; gap: 15px;">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-gallery" type="button" role="tab" aria-controls="all-gallery" aria-selected="true" style="background: #0c508e; color: white; border: none; border-radius: 25px; padding: 10px 25px; font-weight: 600;">All</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="learning-tab" data-bs-toggle="tab" data-bs-target="#learning-gallery" type="button" role="tab" aria-controls="learning-gallery" aria-selected="false" style="background: #f6f1e4; color: #4A2559; border: none; border-radius: 25px; padding: 10px 25px; font-weight: 600;">Learning</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="play-tab" data-bs-toggle="tab" data-bs-target="#play-gallery" type="button" role="tab" aria-controls="play-gallery" aria-selected="false" style="background: #f6f1e4; color: #4A2559; border: none; border-radius: 25px; padding: 10px 25px; font-weight: 600;">Play</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="creative-tab" data-bs-toggle="tab" data-bs-target="#creative-gallery" type="button" role="tab" aria-controls="creative-gallery" aria-selected="false" style="background: #f6f1e4; color: #4A2559; border: none; border-radius: 25px; padding: 10px 25px; font-weight: 600;">Creative</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="events-tab" data-bs-toggle="tab" data-bs-target="#events-gallery" type="button" role="tab" aria-controls="events-gallery" aria-selected="false" style="background: #f6f1e4; color: #4A2559; border: none; border-radius: 25px; padding: 10px 25px; font-weight: 600;">Events</button>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Tab Content -->
        <div class="tab-content" id="galleryTabContent">
            <!-- All Tab -->
            <div class="tab-pane fade show active" id="all-gallery" role="tabpanel" aria-labelledby="all-tab">
                <div class="vs-gallery--row">
                    <div class="vs-gallery vs-gallery--col1 wow animate__fadeInUp" data-wow-delay="0.25s">
                        <div class="vs-gallery__figure">
                            <div class="vs-gallery__image--link">
                                <img class="vs-gallery__image" src="{{ asset('assets/img/gallery/gallery-h1-1-1.jpg') }}" alt="Circle time learning activities" loading="lazy">
                            </div>
                        </div>
                        <div class="vs-gallery__hover">
                            <a href="{{ asset('assets/img/gallery/gallery-h1-1-1.jpg') }}" class="vs-gallery__icon popup-image" aria-label="View circle time image">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <span class="vs-gallery__cate">Learning</span>
                            <h4 class="vs-gallery__heading">Circle Time</h4>
                        </div>
                    </div>
                    <div class="vs-gallery vs-gallery--col2 wow animate__fadeInUp" data-wow-delay="0.35s">
                        <div class="vs-gallery__figure">
                            <div class="vs-gallery__image--link">
                                <img class="vs-gallery__image" src="{{ asset('assets/img/gallery/gallery-h1-1-2.jpg') }}" alt="Children playing outdoors" loading="lazy">
                            </div>
                        </div>
                        <div class="vs-gallery__hover">
                            <a href="{{ asset('assets/img/gallery/gallery-h1-1-2.jpg') }}" class="vs-gallery__icon popup-image" aria-label="View outdoor play image">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <span class="vs-gallery__cate">Play</span>
                            <h4 class="vs-gallery__heading">Outdoor Fun</h4>
                        </div>
                    </div>
                    <div class="vs-gallery vs-gallery--col3 wow animate__fadeInUp" data-wow-delay="0.45s">
                        <div class="vs-gallery__figure">
                            <div class="vs-gallery__image--link">
                                <img class="vs-gallery__image" src="{{ asset('assets/img/gallery/gallery-h1-1-3.jpg') }}" alt="Arts and crafts activities" loading="lazy">
                            </div>
                        </div>
                        <div class="vs-gallery__hover">
                            <a href="{{ asset('assets/img/gallery/gallery-h1-1-3.jpg') }}" class="vs-gallery__icon popup-image" aria-label="View arts and crafts image">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <span class="vs-gallery__cate">Creative</span>
                            <h4 class="vs-gallery__heading">Arts & Crafts</h4>
                        </div>
                    </div>
                    <div class="vs-gallery vs-gallery--col4 wow animate__fadeInUp" data-wow-delay="0.55s">
                        <div class="vs-gallery__figure">
                            <div class="vs-gallery__image--link">
                                <img class="vs-gallery__image" src="{{ asset('assets/img/gallery/gallery-h1-1-4.jpg') }}" alt="Special events and celebrations" loading="lazy">
                            </div>
                        </div>
                        <div class="vs-gallery__hover">
                            <a href="{{ asset('assets/img/gallery/gallery-h1-1-4.jpg') }}" class="vs-gallery__icon popup-image" aria-label="View special events image">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <span class="vs-gallery__cate">Events</span>
                            <h4 class="vs-gallery__heading">Special Days</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Learning Tab -->
            <div class="tab-pane fade" id="learning-gallery" role="tabpanel" aria-labelledby="learning-tab">
                <div class="vs-gallery--row">
                    <div class="vs-gallery vs-gallery--col1 wow animate__fadeInUp" data-wow-delay="0.25s">
                        <div class="vs-gallery__figure">
                            <div class="vs-gallery__image--link">
                                <img class="vs-gallery__image" src="{{ asset('assets/img/gallery/gallery-h1-1-1.jpg') }}" alt="Circle time learning activities" loading="lazy">
                            </div>
                        </div>
                        <div class="vs-gallery__hover">
                            <a href="{{ asset('assets/img/gallery/gallery-h1-1-1.jpg') }}" class="vs-gallery__icon popup-image" aria-label="View circle time image">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <span class="vs-gallery__cate">Learning</span>
                            <h4 class="vs-gallery__heading">Circle Time</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Play Tab -->
            <div class="tab-pane fade" id="play-gallery" role="tabpanel" aria-labelledby="play-tab">
                <div class="vs-gallery--row">
                    <div class="vs-gallery vs-gallery--col2 wow animate__fadeInUp" data-wow-delay="0.25s">
                        <div class="vs-gallery__figure">
                            <div class="vs-gallery__image--link">
                                <img class="vs-gallery__image" src="{{ asset('assets/img/gallery/gallery-h1-1-2.jpg') }}" alt="Children playing outdoors" loading="lazy">
                            </div>
                        </div>
                        <div class="vs-gallery__hover">
                            <a href="{{ asset('assets/img/gallery/gallery-h1-1-2.jpg') }}" class="vs-gallery__icon popup-image" aria-label="View outdoor play image">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <span class="vs-gallery__cate">Play</span>
                            <h4 class="vs-gallery__heading">Outdoor Fun</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Creative Tab -->
            <div class="tab-pane fade" id="creative-gallery" role="tabpanel" aria-labelledby="creative-tab">
                <div class="vs-gallery--row">
                    <div class="vs-gallery vs-gallery--col3 wow animate__fadeInUp" data-wow-delay="0.25s">
                        <div class="vs-gallery__figure">
                            <div class="vs-gallery__image--link">
                                <img class="vs-gallery__image" src="{{ asset('assets/img/gallery/gallery-h1-1-3.jpg') }}" alt="Arts and crafts activities" loading="lazy">
                            </div>
                        </div>
                        <div class="vs-gallery__hover">
                            <a href="{{ asset('assets/img/gallery/gallery-h1-1-3.jpg') }}" class="vs-gallery__icon popup-image" aria-label="View arts and crafts image">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <span class="vs-gallery__cate">Creative</span>
                            <h4 class="vs-gallery__heading">Arts & Crafts</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Events Tab -->
            <div class="tab-pane fade" id="events-gallery" role="tabpanel" aria-labelledby="events-tab">
                <div class="vs-gallery--row">
                    <div class="vs-gallery vs-gallery--col4 wow animate__fadeInUp" data-wow-delay="0.25s">
                        <div class="vs-gallery__figure">
                            <div class="vs-gallery__image--link">
                                <img class="vs-gallery__image" src="{{ asset('assets/img/gallery/gallery-h1-1-4.jpg') }}" alt="Special events and celebrations" loading="lazy">
                            </div>
                        </div>
                        <div class="vs-gallery__hover">
                            <a href="{{ asset('assets/img/gallery/gallery-h1-1-4.jpg') }}" class="vs-gallery__icon popup-image" aria-label="View special events image">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <span class="vs-gallery__cate">Events</span>
                            <h4 class="vs-gallery__heading">Special Days</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Tab Active State */
#galleryTabs .nav-link.active {
    background: #0c508e !important;
    color: white !important;
}
#galleryTabs .nav-link:not(.active):hover {
    background: #D18109 !important;
    color: white !important;
}
</style>

<!-- A Typical Day Section End -->

<!-- ========== TESTIMONIALS SECTION ========== -->
<section id="testimonials" class="space space-extra-bottom" style="background-color: #f9f6f2; overflow: hidden;">
<style>
/* ============================================================
   TESTIMONIALS — Halo Effect · Cognitive Fluency · Low Load
============================================================ */

/* ── GOOGLE RATING HERO ─────────────────────────────────── */
.tr-google-hero {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 32px;
    flex-wrap: wrap;
    background: white;
    border-radius: 20px;
    padding: 30px 44px;
    margin-bottom: 60px;
    box-shadow: 0 4px 28px rgba(12,80,142,0.09);
    border: 1px solid rgba(12,80,142,0.07);
    max-width: 740px;
    margin-left: auto;
    margin-right: auto;
}
.tr-google-brand {
    display: flex; align-items: center; gap: 12px;
}
.tr-google-brand svg { width: 34px; height: 34px; flex-shrink: 0; }
.tr-google-brand__label {
    font-family: "Roboto", sans-serif;
    font-size: 17px; font-weight: 700;
    color: #25283e; letter-spacing: -0.2px;
    white-space: nowrap;
}
.tr-g-sep {
    width: 1px; height: 48px;
    background: rgba(12,80,142,0.12);
    flex-shrink: 0;
}
.tr-google-score {
    display: flex; flex-direction: column; align-items: center;
}
.tr-google-score__num {
    font-family: "Baloo 2", sans-serif;
    font-size: 46px; font-weight: 800;
    color: #0c508e; line-height: 1;
}
.tr-google-score__stars {
    display: flex; gap: 4px; margin: 4px 0 5px;
}
.tr-google-score__stars i { color: #FFC107; font-size: 15px; }
.tr-google-score__label {
    font-family: "Roboto", sans-serif;
    font-size: 11px; font-weight: 700;
    color: #bbb; letter-spacing: 0.8px; text-transform: uppercase;
    white-space: nowrap;
}
.tr-google-cta {
    display: inline-flex; align-items: center; gap: 8px;
    background: #0c508e; color: white;
    padding: 13px 24px; border-radius: 50px;
    font-family: "Roboto", sans-serif;
    font-size: 13px; font-weight: 700;
    text-decoration: none; white-space: nowrap;
    transition: background 0.25s ease, transform 0.25s ease;
}
.tr-google-cta:hover { background: #0a3f70; color: white; transform: translateY(-2px); }

/* ── MARQUEE ─────────────────────────────────────────────── */
.tr-marquee-wrap {
    overflow: hidden;
    position: relative;
    padding: 12px 0;
}
.tr-marquee-wrap::before,
.tr-marquee-wrap::after {
    content: ''; position: absolute;
    top: 0; bottom: 0; width: 160px;
    z-index: 2; pointer-events: none;
}
.tr-marquee-wrap::before { left: 0;  background: linear-gradient(to right, #f9f6f2, transparent); }
.tr-marquee-wrap::after  { right: 0; background: linear-gradient(to left,  #f9f6f2, transparent); }
.tr-marquee {
    display: flex; gap: 22px;
    width: max-content;
    animation: tr-scroll 56s linear infinite;
}
.tr-marquee-wrap:hover .tr-marquee { animation-play-state: paused; }
@keyframes tr-scroll {
    from { transform: translateX(0); }
    to   { transform: translateX(-50%); }
}

/* ── REVIEW CARD ─────────────────────────────────────────── */
.tr-card {
    background: white;
    border-radius: 18px;
    padding: 26px 26px 22px;
    width: 340px; flex-shrink: 0;
    box-shadow: 0 4px 18px rgba(0,0,0,0.07);
    border: 1px solid rgba(12,80,142,0.06);
    display: flex; flex-direction: column;
    transition: box-shadow 0.3s ease, transform 0.3s ease;
}
.tr-marquee-wrap:hover .tr-card:hover {
    box-shadow: 0 12px 36px rgba(12,80,142,0.14);
    transform: translateY(-4px);
}
.tr-card__head {
    display: flex; align-items: center;
    justify-content: space-between;
    margin-bottom: 14px;
}
.tr-card__g { width: 26px; height: 26px; flex-shrink: 0; }
.tr-card__stars { display: flex; gap: 3px; }
.tr-card__stars i { color: #FFC107; font-size: 13px; }
.tr-card__quote {
    font-family: "Roboto", sans-serif;
    font-size: 18px; color: #555; line-height: 1.75;
    flex-grow: 1; margin-bottom: 18px;
    display: -webkit-box;
    -webkit-line-clamp: 5;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.tr-card__reviewer {
    display: flex; align-items: center; gap: 12px;
    border-top: 1px solid #f0ecec; padding-top: 15px;
}
.tr-card__avatar {
    width: 40px; height: 40px; border-radius: 50%; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    color: white; font-weight: 800; font-size: 16px;
    font-family: "Baloo 2", sans-serif;
}
.tr-av--1 { background: linear-gradient(135deg, #0c508e, #1a7fcf); }
.tr-av--2 { background: linear-gradient(135deg, #D18109, #f5a623); }
.tr-av--3 { background: linear-gradient(135deg, #4A2559, #7a3d93); }
.tr-av--4 { background: linear-gradient(135deg, #0c508e, #4A2559); }
.tr-av--5 { background: linear-gradient(135deg, #D18109, #4A2559); }
.tr-av--6 { background: linear-gradient(135deg, #1a7fcf, #4A2559); }
.tr-av--7 { background: linear-gradient(135deg, #7a3d93, #D18109); }
.tr-card__name {
    font-family: "Roboto", sans-serif;
    font-size: 13px; font-weight: 700;
    color: #25283e; display: block; margin-bottom: 2px;
}
.tr-card__meta {
    font-family: "Roboto", sans-serif;
    font-size: 11.5px; color: #bbb;
}

/* ── SECTION FOOTER ──────────────────────────────────────── */
.tr-footer {
    display: flex; align-items: center;
    justify-content: center; gap: 20px;
    flex-wrap: wrap; margin-top: 50px;
}
.tr-footer__sep { width: 1px; height: 26px; background: rgba(12,80,142,0.14); flex-shrink: 0; }
.tr-footer__link {
    display: inline-flex; align-items: center; gap: 7px;
    font-family: "Roboto", sans-serif;
    font-size: 13px; font-weight: 700;
    color: #0c508e; text-decoration: none;
    transition: color 0.2s ease;
}
.tr-footer__link:hover { color: #D18109; }
.tr-footer__hint {
    font-family: "Roboto", sans-serif;
    font-size: 12px; color: #ccc;
    font-style: italic;
}

/* ── RESPONSIVE ──────────────────────────────────────────── */
@media (max-width: 767px) {
    .tr-google-hero { padding: 22px 24px; gap: 22px; }
    .tr-g-sep { display: none; }
    .tr-google-score__num { font-size: 36px; }
    .tr-card { width: 280px; padding: 20px 20px 18px; }
    .tr-marquee-wrap::before,
    .tr-marquee-wrap::after { width: 60px; }
}
</style>

    <div class="container">

        <!-- Section Header -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="vs-title text-center title-anime animation-style2 mb-50">
                    <div class="title-anime__wrap">
                        <span class="vs-title__sub">What Parents Say</span>
                        <h2 class="vs-title__main">Trusted by Families Across <span>Table View & Beyond</span></h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Google Rating Hero — Halo Effect anchor -->
        <div class="tr-google-hero wow animate__fadeInUp" data-wow-delay="0.2s">
            <div class="tr-google-brand">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                <span class="tr-google-brand__label">Google Reviews</span>
            </div>
            <div class="tr-g-sep"></div>
            <div class="tr-google-score">
                <span class="tr-google-score__num">4.9</span>
                <div class="tr-google-score__stars">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <span class="tr-google-score__label">Based on Google reviews</span>
            </div>
            <div class="tr-g-sep"></div>
            <a href="https://www.google.com/search?sca_esv=5dca0e6f8aa8611e&sxsrf=ANbL-n7wDfh_6uMUfIMccbvfDLI1jjISag:1771527867832&si=AL3DRZEsmMGCryMMFSHJ3StBhOdZ2-6yYkXd_doETEE1OR-qOeTyk0RCu9d8OIuf4nt1ozXztnLQSNeeATznJNbg46WhDYPFuSQtGgk3Wh_GidGJbtfj9IN-RFQteMMTFNWerPrP9D2H3S2Qy0VzjFG6ULO5Q19Syg%3D%3D&q=Peekaboo+Daycare+%26+Preschool+Reviews&sa=X&ved=2ahUKEwi5i5bKn-aSAxVXUGcHHYmoDY0Q0bkNegQIOxAH&biw=1440&bih=778&dpr=2" target="_blank" rel="noopener" class="tr-google-cta">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> Read all reviews
            </a>
        </div>

    </div><!-- /container — marquee is full-width -->

    <!-- ── Marquee strip ── -->
    <div class="tr-marquee-wrap">
        <div class="tr-marquee">

            {{-- ── SET 1 (7 cards) ── --}}

            {{-- Melissa Ingram --}}
            <div class="tr-card">
                <div class="tr-card__head">
                    <svg class="tr-card__g" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <div class="tr-card__stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                </div>
                <p class="tr-card__quote">"Best Daycare and School in the area. Babies to Grade R. They offer so much more than child care. Most of the staff have been on staff for over 10 years — low staff churn is always a good indicator of a well run business. But this is like family, well run but so caring and always going the extra mile for the little ones."</p>
                <div class="tr-card__reviewer">
                    <div class="tr-card__avatar tr-av--1">M</div>
                    <div>
                        <span class="tr-card__name">Melissa Ingram</span>
                        <span class="tr-card__meta">Local Guide · 24 reviews · a month ago</span>
                    </div>
                </div>
            </div>

            {{-- Dominique Warr --}}
            <div class="tr-card">
                <div class="tr-card__head">
                    <svg class="tr-card__g" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <div class="tr-card__stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                </div>
                <p class="tr-card__quote">"Peekaboo is more than a daycare — it's truly a family. Both my children have been there since they were 9 months old and the teachers and management have helped me navigate being a mom, through thick and thin. I would highly recommend."</p>
                <div class="tr-card__reviewer">
                    <div class="tr-card__avatar tr-av--2">D</div>
                    <div>
                        <span class="tr-card__name">Dominique Warr</span>
                        <span class="tr-card__meta">Local Guide · 6 reviews · 3 days ago</span>
                    </div>
                </div>
            </div>

            {{-- Kelly Fortune --}}
            <div class="tr-card">
                <div class="tr-card__head">
                    <svg class="tr-card__g" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <div class="tr-card__stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                </div>
                <p class="tr-card__quote">"Friday old school, Monday Peekaboo — her transition was seamless. The family vibe, friendly faces, and staff who've been together for YEARS is all a parent can ask for. Most days I get waved goodbye, tear-free. At times she even cries to stay — that says it all!"</p>
                <div class="tr-card__reviewer">
                    <div class="tr-card__avatar tr-av--3">K</div>
                    <div>
                        <span class="tr-card__name">Kelly Fortune</span>
                        <span class="tr-card__meta">2 reviews · 3 days ago</span>
                    </div>
                </div>
            </div>

            {{-- Sandy Jenkins --}}
            <div class="tr-card">
                <div class="tr-card__head">
                    <svg class="tr-card__g" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <div class="tr-card__stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                </div>
                <p class="tr-card__quote">"When my daughter started, the teachers went the extra mile helping us transition. They are always eager to answer any questions and are so sweet to the children. Raising children takes a village — and this is my village."</p>
                <div class="tr-card__reviewer">
                    <div class="tr-card__avatar tr-av--4">S</div>
                    <div>
                        <span class="tr-card__name">Sandy Jenkins</span>
                        <span class="tr-card__meta">2 reviews · a month ago</span>
                    </div>
                </div>
            </div>

            {{-- Ingrid Martheze --}}
            <div class="tr-card">
                <div class="tr-card__head">
                    <svg class="tr-card__g" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <div class="tr-card__stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                </div>
                <p class="tr-card__quote">"The best Daycare and pre-school in the area! The staff are incredible, kind and caring, and the teachers always go above and beyond! Highly recommend to anyone!"</p>
                <div class="tr-card__reviewer">
                    <div class="tr-card__avatar tr-av--5">I</div>
                    <div>
                        <span class="tr-card__name">Ingrid Martheze</span>
                        <span class="tr-card__meta">1 review · 3 days ago</span>
                    </div>
                </div>
            </div>

            {{-- Anandi Piek --}}
            <div class="tr-card">
                <div class="tr-card__head">
                    <svg class="tr-card__g" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <div class="tr-card__stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                </div>
                <p class="tr-card__quote">"After an unfortunate experience elsewhere, we found Peekaboo — best decision we ever made. From the office ladies to the class teachers, friendliness is always visible. The classes are stunning and the playground is any child's dream. Honestly could not be happier!"</p>
                <div class="tr-card__reviewer">
                    <div class="tr-card__avatar tr-av--6">A</div>
                    <div>
                        <span class="tr-card__name">Anandi Piek</span>
                        <span class="tr-card__meta">Local Guide · 26 reviews · 2 days ago</span>
                    </div>
                </div>
            </div>

            {{-- Loren Williamson --}}
            <div class="tr-card">
                <div class="tr-card__head">
                    <svg class="tr-card__g" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <div class="tr-card__stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                </div>
                <p class="tr-card__quote">"Really an amazing daycare! Friendly staff. We were so worried about our little one adjusting to crèche, but she did perfectly fine with the help of the lovely staff. Best decision we ever made. Will highly recommend."</p>
                <div class="tr-card__reviewer">
                    <div class="tr-card__avatar tr-av--7">L</div>
                    <div>
                        <span class="tr-card__name">Loren Williamson</span>
                        <span class="tr-card__meta">2 reviews · a day ago</span>
                    </div>
                </div>
            </div>

            {{-- Prosper Tinarwo --}}
            <div class="tr-card">
                <div class="tr-card__head">
                    <svg class="tr-card__g" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <div class="tr-card__stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                </div>
                <p class="tr-card__quote">"We couldn't have asked for a better daycare. It's affordable, welcoming, and the environment is warm and nurturing. The staff are truly incredible — caring, attentive, and professional. You can tell they genuinely love what they do. Highly recommended for any parent looking for a safe and supportive place for their child."</p>
                <div class="tr-card__reviewer">
                    <div class="tr-card__avatar tr-av--1">P</div>
                    <div>
                        <span class="tr-card__name">Prosper Tinarwo</span>
                        <span class="tr-card__meta">2 reviews · 1 photo · 10 minutes ago</span>
                    </div>
                </div>
            </div>

            {{-- ── SET 2 — duplicate for seamless infinite loop ── --}}

            <div class="tr-card">
                <div class="tr-card__head">
                    <svg class="tr-card__g" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <div class="tr-card__stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                </div>
                <p class="tr-card__quote">"Best Daycare and School in the area. Babies to Grade R. They offer so much more than child care. Most of the staff have been on staff for over 10 years — low staff churn is always a good indicator of a well run business. But this is like family, well run but so caring and always going the extra mile for the little ones."</p>
                <div class="tr-card__reviewer">
                    <div class="tr-card__avatar tr-av--1">M</div>
                    <div>
                        <span class="tr-card__name">Melissa Ingram</span>
                        <span class="tr-card__meta">Local Guide · 24 reviews · a month ago</span>
                    </div>
                </div>
            </div>

            <div class="tr-card">
                <div class="tr-card__head">
                    <svg class="tr-card__g" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <div class="tr-card__stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                </div>
                <p class="tr-card__quote">"Peekaboo is more than a daycare — it's truly a family. Both my children have been there since they were 9 months old and the teachers and management have helped me navigate being a mom, through thick and thin. I would highly recommend."</p>
                <div class="tr-card__reviewer">
                    <div class="tr-card__avatar tr-av--2">D</div>
                    <div>
                        <span class="tr-card__name">Dominique Warr</span>
                        <span class="tr-card__meta">Local Guide · 6 reviews · 3 days ago</span>
                    </div>
                </div>
            </div>

            <div class="tr-card">
                <div class="tr-card__head">
                    <svg class="tr-card__g" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <div class="tr-card__stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                </div>
                <p class="tr-card__quote">"Friday old school, Monday Peekaboo — her transition was seamless. The family vibe, friendly faces, and staff who've been together for YEARS is all a parent can ask for. Most days I get waved goodbye, tear-free. At times she even cries to stay — that says it all!"</p>
                <div class="tr-card__reviewer">
                    <div class="tr-card__avatar tr-av--3">K</div>
                    <div>
                        <span class="tr-card__name">Kelly Fortune</span>
                        <span class="tr-card__meta">2 reviews · 3 days ago</span>
                    </div>
                </div>
            </div>

            <div class="tr-card">
                <div class="tr-card__head">
                    <svg class="tr-card__g" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <div class="tr-card__stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                </div>
                <p class="tr-card__quote">"When my daughter started, the teachers went the extra mile helping us transition. They are always eager to answer any questions and are so sweet to the children. Raising children takes a village — and this is my village."</p>
                <div class="tr-card__reviewer">
                    <div class="tr-card__avatar tr-av--4">S</div>
                    <div>
                        <span class="tr-card__name">Sandy Jenkins</span>
                        <span class="tr-card__meta">2 reviews · a month ago</span>
                    </div>
                </div>
            </div>

            <div class="tr-card">
                <div class="tr-card__head">
                    <svg class="tr-card__g" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <div class="tr-card__stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                </div>
                <p class="tr-card__quote">"The best Daycare and pre-school in the area! The staff are incredible, kind and caring, and the teachers always go above and beyond! Highly recommend to anyone!"</p>
                <div class="tr-card__reviewer">
                    <div class="tr-card__avatar tr-av--5">I</div>
                    <div>
                        <span class="tr-card__name">Ingrid Martheze</span>
                        <span class="tr-card__meta">1 review · 3 days ago</span>
                    </div>
                </div>
            </div>

            <div class="tr-card">
                <div class="tr-card__head">
                    <svg class="tr-card__g" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <div class="tr-card__stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                </div>
                <p class="tr-card__quote">"After an unfortunate experience elsewhere, we found Peekaboo — best decision we ever made. From the office ladies to the class teachers, friendliness is always visible. The classes are stunning and the playground is any child's dream. Honestly could not be happier!"</p>
                <div class="tr-card__reviewer">
                    <div class="tr-card__avatar tr-av--6">A</div>
                    <div>
                        <span class="tr-card__name">Anandi Piek</span>
                        <span class="tr-card__meta">Local Guide · 26 reviews · 2 days ago</span>
                    </div>
                </div>
            </div>

            <div class="tr-card">
                <div class="tr-card__head">
                    <svg class="tr-card__g" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <div class="tr-card__stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                </div>
                <p class="tr-card__quote">"Really an amazing daycare! Friendly staff. We were so worried about our little one adjusting to crèche, but she did perfectly fine with the help of the lovely staff. Best decision we ever made. Will highly recommend."</p>
                <div class="tr-card__reviewer">
                    <div class="tr-card__avatar tr-av--7">L</div>
                    <div>
                        <span class="tr-card__name">Loren Williamson</span>
                        <span class="tr-card__meta">2 reviews · a day ago</span>
                    </div>
                </div>
            </div>

            <div class="tr-card">
                <div class="tr-card__head">
                    <svg class="tr-card__g" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <div class="tr-card__stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                </div>
                <p class="tr-card__quote">"We couldn't have asked for a better daycare. It's affordable, welcoming, and the environment is warm and nurturing. The staff are truly incredible — caring, attentive, and professional. You can tell they genuinely love what they do. Highly recommended for any parent looking for a safe and supportive place for their child."</p>
                <div class="tr-card__reviewer">
                    <div class="tr-card__avatar tr-av--1">P</div>
                    <div>
                        <span class="tr-card__name">Prosper Tinarwo</span>
                        <span class="tr-card__meta">2 reviews · 1 photo · 10 minutes ago</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /marquee -->



</section>
<!-- Testimonials Section End -->

<section id="fees" class="space" data-bg-src="{{ asset('assets/img/bg/breadcrumb-bg-1.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="vs-title text-center title-anime animation-style2 mb-50">
                    <div class="title-anime__wrap">
                        <span class="vs-title__sub" style="color: whitesmoke">Investment in Your Child's Future</span>
                        <h2 class="vs-title__main" style="color: white">Transparent <span>Pricing</span></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
                    <p class="text-center mb-40" style="color: #666; font-size: 17px; line-height: 1.7;">
                        We believe in transparent, fair pricing with no hidden fees. Our fees cover nutritious meals, educational materials, and all daily activities.
                    </p>
                    <div class="text-center">
                        <p style="color: #4A2559; font-size: 17px; margin-bottom: 25px;">
                            <i class="fa-solid fa-info-circle" style="color: #0c508e; margin-right: 8px;"></i>
                            Fee structure varies by age group and program. Contact us for detailed pricing and registration information.
                        </p>
                        <div class="d-flex gap-3 justify-content-center flex-wrap">
                            <a href="{{ route('book-tour') }}" class="vs-btn"><span class="vs-btn__border"></span>Book a Tour</a>
                            <a href="https://wa.me/27828989967?text=Hi!%20I'd%20like%20to%20ask%20about%20fees%20and%20registration." class="vs-btn style4" target="_blank" rel="noopener"><span class="vs-btn__border"></span>Ask About Fees</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fees Section End -->

<!-- ========== FAQ SECTION ========== -->
<section id="faq" class="space space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="vs-title text-center title-anime animation-style2 mb-50">
                    <div class="title-anime__wrap">
                        <span class="vs-title__sub">Questions? We Have Answers</span>
                        <h2 class="vs-title__main">Frequently Asked <span>Questions</span></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion accordion-flush" id="faqAccordion">
                    <div class="accordion-item wow animate__fadeInUp" data-wow-delay="0.15s" style="border: 1px solid #e8e2d8; border-radius: 10px; margin-bottom: 15px; overflow: hidden;">
                        <h3 class="accordion-header" id="faq1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1Content" aria-expanded="true" aria-controls="faq1Content" style="background: white; color: #4A2559; font-weight: 600; padding: 20px 25px; font-size: 17px;">
                                What are your operating hours?
                            </button>
                        </h3>
                        <div id="faq1Content" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="padding: 20px 25px; background: #fdfcfa; color: #666; font-size: 17px;">
                                We're open Monday to Friday from 06:00 to 18:00. We understand that working parents need flexible hours, and we're here to support you.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item wow animate__fadeInUp" data-wow-delay="0.25s" style="border: 1px solid #e8e2d8; border-radius: 10px; margin-bottom: 15px; overflow: hidden;">
                        <h3 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2Content" aria-expanded="false" aria-controls="faq2Content" style="background: white; color: #4A2559; font-weight: 600; padding: 20px 25px; font-size: 17px;">
                                What safety protocols do you have in place?
                            </button>
                        </h3>
                        <div id="faq2Content" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="padding: 20px 25px; background: #fdfcfa; color: #666; font-size: 17px;">
                                Your child's safety is our priority. We have 24/7 CCTV monitoring, controlled access entry, qualified first-aid trained staff, secure outdoor play areas, and strict pick-up/drop-off protocols.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item wow animate__fadeInUp" data-wow-delay="0.35s" style="border: 1px solid #e8e2d8; border-radius: 10px; margin-bottom: 15px; overflow: hidden;">
                        <h3 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3Content" aria-expanded="false" aria-controls="faq3Content" style="background: white; color: #4A2559; font-weight: 600; padding: 20px 25px; font-size: 17px;">
                                Are meals provided?
                            </button>
                        </h3>
                        <div id="faq3Content" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="padding: 20px 25px; background: #fdfcfa; color: #666; font-size: 17px;">
                                Yes! We provide nutritious, balanced meals and snacks prepared fresh daily on-site. Our menu is designed to be healthy, varied, and child-friendly. Special dietary requirements can be accommodated.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item wow animate__fadeInUp" data-wow-delay="0.45s" style="border: 1px solid #e8e2d8; border-radius: 10px; margin-bottom: 15px; overflow: hidden;">
                        <h3 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4Content" aria-expanded="false" aria-controls="faq4Content" style="background: white; color: #4A2559; font-weight: 600; padding: 20px 25px; font-size: 17px;">
                                How do I register my child?
                            </button>
                        </h3>
                        <div id="faq4Content" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="padding: 20px 25px; background: #fdfcfa; color: #666; font-size: 17px;">
                                Registration is simple. First, book a tour to visit our facilities and meet our team. Then, complete the online application form or contact us directly. We'll guide you through the enrollment process and answer any questions you have.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item wow animate__fadeInUp" data-wow-delay="0.55s" style="border: 1px solid #e8e2d8; border-radius: 10px; margin-bottom: 15px; overflow: hidden;">
                        <h3 class="accordion-header" id="faq5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5Content" aria-expanded="false" aria-controls="faq5Content" style="background: white; color: #4A2559; font-weight: 600; padding: 20px 25px; font-size: 17px;">
                                Is your curriculum aligned with CAPS?
                            </button>
                        </h3>
                        <div id="faq5Content" class="accordion-collapse collapse" aria-labelledby="faq5" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="padding: 20px 25px; background: #fdfcfa; color: #666; font-size: 17px;">
                                Absolutely. Our preschool and Grade R programs are fully aligned with the CAPS curriculum, ensuring your child is academically prepared and confident when they start Grade 1.
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
<section id="contact" class="vs-cta--area space-extra-top space-extra-bottom parallax-wrap" data-bg-src="{{ asset('assets/img/bg/breadcrumb-bg-2.jpg') }}" style="background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="vs-title text-center title-anime animation-style2 mb-30">
                    <div class="title-anime__wrap">
                        <span class="vs-title__sub text-white" style="opacity: 0.95;">Start Their Journey Today</span>
                        <h2 class="vs-title__main text-white">Give Your Child a <span>Confident Start</span></h2>
                    </div>
                </div>
                <p class="text-white mb-40" style="font-size: 17px; line-height: 1.7; max-width: 600px; margin-left: auto; margin-right: auto;">
                    Every child deserves a safe, nurturing place to learn and grow. Limited spaces available for 2026 — secure your child's place at Peekaboo today.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap mb-4">
                    <a href="{{ route('book-tour') }}" class="vs-btn"><span class="vs-btn__border"></span>Schedule a Visit</a>
                    <a href="https://wa.me/27828989967?text=Hi!%20I'd%20like%20to%20enquire%20about%20Peekaboo%20Daycare." class="vs-btn style4" target="_blank" rel="noopener"><span class="vs-btn__border"></span>Talk to Our Team</a>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; margin-top: 30px; color: white; font-size: 14px;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-phone" style="font-size: 18px;"></i>
                        <a href="tel:0215574999" style="color: white; text-decoration: none;">021 557 4999</a>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-mobile-alt" style="font-size: 18px;"></i>
                        <a href="tel:0828989967" style="color: white; text-decoration: none;">082 898 9967</a>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-map-marker-alt" style="font-size: 18px;"></i>
                        <span>139B Humewood Drive, Parklands</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Final CTA Section End -->

@endsection
