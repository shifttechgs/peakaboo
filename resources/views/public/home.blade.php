@extends('layouts.public')

@section('title', 'Peekaboo Daycare & Preschool - Parklands, Cape Town')
@section('description', 'Safe, trusted childcare for 3 months to Grade R in Parklands, Cape Town. Qualified teachers, CAPS curriculum, Christian values. Book your tour today.')

@section('content')
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
    font-size: 15px; color: #5b5a7b;
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
                <p style="font-family:'Roboto',sans-serif;color:#5b5a7b;font-size:16px;line-height:1.75;max-width:590px;margin:16px auto 0;">
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
                <p class="text-center mb-40" style="color: #666; font-size: 16px; max-width: 700px; margin-left: auto; margin-right: auto;">
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
<section class="space space-extra-bottom" style="background-color: #f9f6f2;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="vs-title text-center title-anime animation-style2 mb-50">
                    <div class="title-anime__wrap">
                        <span class="vs-title__sub">What Parents Say</span>
                        <h2 class="vs-title__main">Trusted by Families Across <span>Table View & Beyond </span></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex">
                <div class="vs-testimonial wow animate__fadeInUp" data-wow-delay="0.25s" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); display: flex; flex-direction: column; width: 100%;">
                    <div style="margin-bottom: 15px;">
                        <i class="fa-solid fa-star" style="color: #FFC107;"></i>
                        <i class="fa-solid fa-star" style="color: #FFC107;"></i>
                        <i class="fa-solid fa-star" style="color: #FFC107;"></i>
                        <i class="fa-solid fa-star" style="color: #FFC107;"></i>
                        <i class="fa-solid fa-star" style="color: #FFC107;"></i>
                    </div>
                    <p style="color: #666; font-size: 15px; line-height: 1.7; margin-bottom: 20px; flex-grow: 1;">
                        "Best Daycare and School in the area. Babies to Grade R. They offer so much more than child care. Most of the staff have been on staff for over 10 years, low staff churn is always a good indicator of a well run business. But this is like family, well run but so caring and always going the extra mile for the little ones. They have a packed year of events, and activities for kids all ages. They also offer a wide range of extra murals. Two amazing annual events is the sports day and concert. They do kiddies picnics and sleep overs too. Thank you Peekaboo"
                    </p>
                    <div>
                        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                            <div style="width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(135deg, #0c508e, #D18109); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 20px;">
                                M
                            </div>
                            <div>
                                <strong style="color: #4A2559; display: block;">Melissa Ingram</strong>
                                <span style="color: #999; font-size: 13px;">Local Guide · 24 reviews · 24 photos</span>
                            </div>
                        </div>
                        <span style="color: #999; font-size: 13px; font-style: italic;">Posted a month ago</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 d-flex">
                <div class="vs-testimonial wow animate__fadeInUp" data-wow-delay="0.35s" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); display: flex; flex-direction: column; width: 100%;">
                    <div style="margin-bottom: 15px;">
                        <i class="fa-solid fa-star" style="color: #FFC107;"></i>
                        <i class="fa-solid fa-star" style="color: #FFC107;"></i>
                        <i class="fa-solid fa-star" style="color: #FFC107;"></i>
                        <i class="fa-solid fa-star" style="color: #FFC107;"></i>
                        <i class="fa-solid fa-star" style="color: #FFC107;"></i>
                    </div>
                    <p style="color: #666; font-size: 15px; line-height: 1.7; margin-bottom: 20px; flex-grow: 1;">
                        "When my daughter started at the school, the teachers went the extra mile with helping me transition her into the school. They are always eager to answer any questions and are so sweet to the children. If I have to send my daughter somewhere for the day, I'm glad it's here. Raising children takes a village and this is my village."
                    </p>
                    <div>
                        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                            <div style="width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(135deg, #0c508e, #D18109); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 20px;">
                                S
                            </div>
                            <div>
                                <strong style="color: #4A2559; display: block;">Sandy Jenkins</strong>
                                <span style="color: #999; font-size: 13px;">2 reviews</span>
                            </div>
                        </div>
                        <span style="color: #999; font-size: 13px; font-style: italic;">Posted a month ago</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
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
                    <p class="text-center mb-40" style="color: #666; font-size: 16px; line-height: 1.7;">
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
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1Content" aria-expanded="true" aria-controls="faq1Content" style="background: white; color: #4A2559; font-weight: 600; padding: 20px 25px; font-size: 16px;">
                                What are your operating hours?
                            </button>
                        </h3>
                        <div id="faq1Content" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="padding: 20px 25px; background: #fdfcfa; color: #666;">
                                We're open Monday to Friday from 06:00 to 18:00. We understand that working parents need flexible hours, and we're here to support you.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item wow animate__fadeInUp" data-wow-delay="0.25s" style="border: 1px solid #e8e2d8; border-radius: 10px; margin-bottom: 15px; overflow: hidden;">
                        <h3 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2Content" aria-expanded="false" aria-controls="faq2Content" style="background: white; color: #4A2559; font-weight: 600; padding: 20px 25px; font-size: 16px;">
                                What safety protocols do you have in place?
                            </button>
                        </h3>
                        <div id="faq2Content" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="padding: 20px 25px; background: #fdfcfa; color: #666;">
                                Your child's safety is our priority. We have 24/7 CCTV monitoring, controlled access entry, qualified first-aid trained staff, secure outdoor play areas, and strict pick-up/drop-off protocols.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item wow animate__fadeInUp" data-wow-delay="0.35s" style="border: 1px solid #e8e2d8; border-radius: 10px; margin-bottom: 15px; overflow: hidden;">
                        <h3 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3Content" aria-expanded="false" aria-controls="faq3Content" style="background: white; color: #4A2559; font-weight: 600; padding: 20px 25px; font-size: 16px;">
                                Are meals provided?
                            </button>
                        </h3>
                        <div id="faq3Content" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="padding: 20px 25px; background: #fdfcfa; color: #666;">
                                Yes! We provide nutritious, balanced meals and snacks prepared fresh daily on-site. Our menu is designed to be healthy, varied, and child-friendly. Special dietary requirements can be accommodated.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item wow animate__fadeInUp" data-wow-delay="0.45s" style="border: 1px solid #e8e2d8; border-radius: 10px; margin-bottom: 15px; overflow: hidden;">
                        <h3 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4Content" aria-expanded="false" aria-controls="faq4Content" style="background: white; color: #4A2559; font-weight: 600; padding: 20px 25px; font-size: 16px;">
                                How do I register my child?
                            </button>
                        </h3>
                        <div id="faq4Content" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="padding: 20px 25px; background: #fdfcfa; color: #666;">
                                Registration is simple. First, book a tour to visit our facilities and meet our team. Then, complete the online application form or contact us directly. We'll guide you through the enrollment process and answer any questions you have.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item wow animate__fadeInUp" data-wow-delay="0.55s" style="border: 1px solid #e8e2d8; border-radius: 10px; margin-bottom: 15px; overflow: hidden;">
                        <h3 class="accordion-header" id="faq5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5Content" aria-expanded="false" aria-controls="faq5Content" style="background: white; color: #4A2559; font-weight: 600; padding: 20px 25px; font-size: 16px;">
                                Is your curriculum aligned with CAPS?
                            </button>
                        </h3>
                        <div id="faq5Content" class="accordion-collapse collapse" aria-labelledby="faq5" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="padding: 20px 25px; background: #fdfcfa; color: #666;">
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
