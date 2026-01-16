@extends('layouts.public')

@section('title', 'Peekaboo Daycare & Preschool')
@section('description', 'Licensed daycare in Parklands, Cape Town. A safe, loving space where little minds grow. Baby Room to Grade R.')

@section('content')
<!-- Hero -->
<section class="vs-hero overflow-hidden z-index-common parallax-wrap">
    <div class="vs-hero__ele1">
        <img class="parallax-element" src="{{ asset('assets/img/hero/h1-ele-1-1.svg') }}" alt="ele">
    </div>
    <div class="swiper vs-hero__active--zoom">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="vs-hero__bg vs-hero__bg--zoom" data-bg-src="{{ asset('assets/img/hero/banner-1-1.jpg') }}"></div>
                <div class="container container--custom">
                    <div class="vs-hero__content">
                        <div class="vs-hero__shape">
                            <div class="vs-hero__shape--bg vs-hero__anim" data-bg-src="{{ asset('assets/img/hero/hero-shape-1.svg') }}"></div>
                            <span class="vs-hero__title--sub vs-hero__anim">
                                <img src="{{ asset('assets/img/icons/hero-star-icon.svg') }}" alt="hero star icon">
                                fun happens!
                            </span>
                            <h1 class="vs-hero__title--main vs-hero__anim">
                                A Safe, Loving <span>Space</span> Where Little Minds Grow
                            </h1>
                            <p class="vs-hero__desc vs-hero__anim">
                                Licensed daycare with Christian values since 2010
                            </p>
                            <a href="{{ route('enrol.index') }}" class="vs-btn vs-hero__btn vs-hero__anim"><span class="vs-btn__border"></span>Apply Now</a>
                            <img class="vs-hero__character vs-hero__anim" src="{{ asset('assets/img/hero/hero-character-1.png') }}" alt="Hero Character">
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="vs-hero__bg vs-hero__bg--zoom" data-bg-src="{{ asset('assets/img/hero/banner-1-2.jpg') }}"></div>
                <div class="container container--custom">
                    <div class="vs-hero__content">
                        <div class="vs-hero__shape">
                            <div class="vs-hero__shape--bg vs-hero__anim" data-bg-src="{{ asset('assets/img/hero/hero-shape-1.svg') }}"></div>
                            <span class="vs-hero__title--sub vs-hero__anim">
                                <img src="{{ asset('assets/img/icons/hero-star-icon.svg') }}" alt="hero star icon">
                                Enrolling for 2026!
                            </span>
                            <h1 class="vs-hero__title--main vs-hero__anim">
                                Where Learning <span>Feels</span> Like Play
                            </h1>
                            <p class="vs-hero__desc vs-hero__anim">
                                Baby Room to Grade R in Parklands, Cape Town
                            </p>
                            <a href="{{ route('book-tour') }}" class="vs-btn vs-hero__btn vs-hero__anim"><span class="vs-btn__border"></span>Book a Tour</a>
                            <img class="vs-hero__character vs-hero__anim" src="{{ asset('assets/img/hero/hero-character-1.png') }}" alt="Hero Character">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="vs-hero__direction">
            <div class="vs-swiper-button-next">
                <i class="fa-solid fa-arrow-right"></i>
            </div>
            <div class="vs-swiper-button-prev">
                <i class="fa-solid fa-arrow-left"></i>
            </div>
        </div>
    </div>
    <div class="vs-balls vs-balls--screen" data-balls-bottom="-6px" data-balls-color="#f6f1e4"></div>
</section>
<!-- Hero End -->

<!-- Vs Service Area -->
<section class="vs-service--area animation-active z-index-common space overflow-hidden" data-bg-src="{{ asset('assets/img/service/service-bg.png') }}">
    <img src="{{ asset('assets/img/elements/service-ele-1.svg') }}" alt="elements1" class="vs-service--ele1 wow animate__fadeInLeft" data-wow-delay="0.25s">
    <img src="{{ asset('assets/img/elements/service-ele-2.svg') }}" alt="elements1" class="vs-service--ele2 wow animate__fadeInRight" data-wow-delay="0.45s">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="vs-title text-center title-anime animation-style2">
                    <div class="title-anime__wrap">
                        <span class="vs-title__sub">Why Choose Us</span>
                        <h2 class="vs-title__main">Nurturing <span>Every Child</span></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="z-index-common">
            <div class="row justify-content-center swiper vs-carousel vs-carousel--service z-index-common pl-0" data-xl="3" data-loop="true" data-autoplay-delay="6000" data-nav-next=".nav-next-2" data-nav-prev=".nav-prev-1">
                <div class="swiper-wrapper">
                    <div class="col-lg-4 col-md-6 swiper-slide">
                        <div class="vs-service wow animate__fadeInUp" data-wow-delay="0.25s">
                            <div class="vs-service__figure">
                                <a href="{{ route('home') }}#programs" class="vs-service__image--link">
                                    <img class="vs-service__image" src="{{ asset('assets/img/service/s-1-1.jpg') }}" alt="vs service image">
                                </a>
                            </div>
                            <div class="vs-service__content">
                                <div class="vs-service__header">
                                    <span class="vs-service__icon">
                                        <img src="{{ asset('assets/img/icons/service-icon-1-1.svg') }}" alt="service icon">
                                    </span>
                                </div>
                                <a class="vs-service__heading--link" href="{{ route('home') }}#programs">
                                    <h3 class="vs-service__heading">Qualified Teachers</h3>
                                </a>
                                <a href="{{ route('home') }}#programs" class="vs-service__link">
                                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.39045 17.9495L17.6245 3.81022L11.9467 3.41092C11.6162 3.39253 11.307 3.24133 11.0897 2.99157C10.3795 2.16137 11.0268 0.887081 12.116 0.97149L20.7679 1.567C21.4447 1.61318 21.9555 2.20013 21.9077 2.87686L21.3019 11.5281C21.2154 13.1944 18.7024 13.0128 18.8562 11.3514L19.2524 5.64459L3.0003 19.7995C2.48691 20.2625 1.69228 20.2096 1.24372 19.6835C0.800172 19.1667 0.86807 18.3864 1.39045 17.9495Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 swiper-slide">
                        <div class="vs-service wow animate__fadeInUp" data-wow-delay="0.35s">
                            <div class="vs-service__figure">
                                <a href="{{ route('home') }}#about" class="vs-service__image--link">
                                    <img class="vs-service__image" src="{{ asset('assets/img/service/s-1-2.jpg') }}" alt="vs service image">
                                </a>
                            </div>
                            <div class="vs-service__content">
                                <div class="vs-service__header">
                                    <span class="vs-service__icon">
                                        <img src="{{ asset('assets/img/icons/service-icon-1-2.svg') }}" alt="service icon">
                                    </span>
                                </div>
                                <a class="vs-service__heading--link" href="{{ route('home') }}#about">
                                    <h3 class="vs-service__heading">CCTV Security</h3>
                                </a>
                                <a href="{{ route('home') }}#about" class="vs-service__link">
                                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.39045 17.9495L17.6245 3.81022L11.9467 3.41092C11.6162 3.39253 11.307 3.24133 11.0897 2.99157C10.3795 2.16137 11.0268 0.887081 12.116 0.97149L20.7679 1.567C21.4447 1.61318 21.9555 2.20013 21.9077 2.87686L21.3019 11.5281C21.2154 13.1944 18.7024 13.0128 18.8562 11.3514L19.2524 5.64459L3.0003 19.7995C2.48691 20.2625 1.69228 20.2096 1.24372 19.6835C0.800172 19.1667 0.86807 18.3864 1.39045 17.9495Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 swiper-slide">
                        <div class="vs-service wow animate__fadeInUp" data-wow-delay="0.45s">
                            <div class="vs-service__figure">
                                <a href="{{ route('home') }}#programs" class="vs-service__image--link">
                                    <img class="vs-service__image" src="{{ asset('assets/img/service/s-1-3.jpg') }}" alt="vs service image">
                                </a>
                            </div>
                            <div class="vs-service__content">
                                <div class="vs-service__header">
                                    <span class="vs-service__icon">
                                        <img src="{{ asset('assets/img/icons/service-icon-1-3.svg') }}" alt="service icon">
                                    </span>
                                </div>
                                <a class="vs-service__heading--link" href="{{ route('home') }}#programs">
                                    <h3 class="vs-service__heading">CAPS Curriculum</h3>
                                </a>
                                <a href="{{ route('home') }}#programs" class="vs-service__link">
                                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.39045 17.9495L17.6245 3.81022L11.9467 3.41092C11.6162 3.39253 11.307 3.24133 11.0897 2.99157C10.3795 2.16137 11.0268 0.887081 12.116 0.97149L20.7679 1.567C21.4447 1.61318 21.9555 2.20013 21.9077 2.87686L21.3019 11.5281C21.2154 13.1944 18.7024 13.0128 18.8562 11.3514L19.2524 5.64459L3.0003 19.7995C2.48691 20.2625 1.69228 20.2096 1.24372 19.6835C0.800172 19.1667 0.86807 18.3864 1.39045 17.9495Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 swiper-slide">
                        <div class="vs-service wow animate__fadeInUp" data-wow-delay="0.55s">
                            <div class="vs-service__figure">
                                <a href="{{ route('home') }}#about" class="vs-service__image--link">
                                    <img class="vs-service__image" src="{{ asset('assets/img/service/s-1-4.jpg') }}" alt="vs service image">
                                </a>
                            </div>
                            <div class="vs-service__content">
                                <div class="vs-service__header">
                                    <span class="vs-service__icon">
                                        <img src="{{ asset('assets/img/icons/service-icon-1-3.svg') }}" alt="service icon">
                                    </span>
                                </div>
                                <a class="vs-service__heading--link" href="{{ route('home') }}#about">
                                    <h3 class="vs-service__heading">Healthy Meals</h3>
                                </a>
                                <a href="{{ route('home') }}#about" class="vs-service__link">
                                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.39045 17.9495L17.6245 3.81022L11.9467 3.41092C11.6162 3.39253 11.307 3.24133 11.0897 2.99157C10.3795 2.16137 11.0268 0.887081 12.116 0.97149L20.7679 1.567C21.4447 1.61318 21.9555 2.20013 21.9077 2.87686L21.3019 11.5281C21.2154 13.1944 18.7024 13.0128 18.8562 11.3514L19.2524 5.64459L3.0003 19.7995C2.48691 20.2625 1.69228 20.2096 1.24372 19.6835C0.800172 19.1667 0.86807 18.3864 1.39045 17.9495Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-prev-1">
                <svg width="57" height="20" viewBox="0 0 57 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask0_318_7638" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="57" height="20">
                        <rect width="57" height="20" transform="matrix(-1 0 0 1 57 0)" fill="url(#pattern0_318_7638)" />
                    </mask>
                    <g mask="url(#mask0_318_7638)">
                        <rect width="84" height="42" transform="matrix(-1 0 0 1 70 -14)" fill="currentColor" />
                    </g>
                </svg>
            </div>
            <div class="nav-next-2">
                <svg width="57" height="20" viewBox="0 0 57 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask0_318_7635" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="57" height="20">
                        <rect width="57" height="20" fill="url(#pattern0_318_7635)" />
                    </mask>
                    <g mask="url(#mask0_318_7635)">
                        <rect x="-13" y="-14" width="84" height="42" fill="currentColor" />
                    </g>
                </svg>
            </div>
        </div>
    </div>
</section>
<!-- Vs Service Area End -->

<!-- About -->
<section id="about" class="vs-about--section space space-extra-bottom z-index-common parallax-wrap overflow-hidden" data-bg-src="{{ asset('assets/img/about/vs-about-h1-bg.png') }}">
    <img src="{{ asset('assets/img/about/vs-about-h1-ele-4.png') }}" alt="elements" class="vs-about--ele1 wow animate__fadeInUp" data-wow-delay="0.35s">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-30 wow animate__fadeInUp" data-wow-delay="0.25s">
                <div class="vs-about--image">
                    <div class="vs-about--image__figure1 wow animate__fadeInUp" data-wow-delay="0.25s">
                        <img src="{{ asset('assets/img/about/vs-about-h1-1.jpg') }}" alt="about image" width="198" height="214" loading="lazy">
                    </div>
                    <div class="vs-about--image__figure2 wow animate__fadeInUp" data-wow-delay="0.35s">
                        <img src="{{ asset('assets/img/about/vs-about-h1-2.jpg') }}" alt="about image" width="400" height="461" loading="lazy">
                    </div>
                    <div class="vs-about--image__ele1 parallax-element" data-move="80">
                        <img src="{{ asset('assets/img/about/vs-about-h1-ele-1.svg') }}" alt="elements">
                    </div>
                    <div class="vs-about--image__ele2 parallax-element" data-move="50">
                        <img src="{{ asset('assets/img/about/vs-about-h1-ele-2.svg') }}" alt="elements">
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
                            <span class="vs-title__sub">About Peekaboo</span>
                            <h2 class="vs-title__main">
                                Learning <span>Opportunity</span> For Kids
                            </h2>
                        </div>
                    </div>
                    <div class="vs-about--story">
                        <div class="vs-about--story__tab mb-30">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="history-tab" data-bs-toggle="tab" data-bs-target="#history-tab-pane" type="button" role="tab" aria-controls="history-tab-pane" aria-selected="true">
                                        our history
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="mission-tab" data-bs-toggle="tab" data-bs-target="#mission-tab-pane" type="button" role="tab" aria-controls="mission-tab-pane" aria-selected="false">
                                        our mission
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="values-tab" data-bs-toggle="tab" data-bs-target="#values-tab-pane" type="button" role="tab" aria-controls="values-tab-pane" aria-selected="false">
                                        our values
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="history-tab-pane" role="tabpanel" aria-labelledby="history-tab" tabindex="0">
                                <p class="vs-about__text vs-text">Since 2010, Peekaboo Daycare has been a trusted second home for children in Parklands. We combine a nurturing environment with quality early childhood education, guided by Christian values.</p>
                                <ul class="vs-list pt-15 mb-35">
                                    <li>Licensed & Registered Daycare</li>
                                    <li>Qualified ECD Teachers</li>
                                    <li>Christian Values Foundation</li>
                                </ul>
                                <a href="{{ route('enrol.index') }}" class="vs-btn"><span class="vs-btn__border"></span>Apply Now</a>
                            </div>
                            <div class="tab-pane fade" id="mission-tab-pane" role="tabpanel" aria-labelledby="mission-tab" tabindex="0">
                                <p class="vs-about__text vs-text">To provide a safe, loving space where every child can thrive, learn, and grow through age-appropriate activities and Christian values.</p>
                                <ul class="vs-list pt-15 mb-35">
                                    <li>Individual Attention for Every Child</li>
                                    <li>CAPS-Based Curriculum</li>
                                    <li>School Readiness Programs</li>
                                </ul>
                                <a href="{{ route('book-tour') }}" class="vs-btn"><span class="vs-btn__border"></span>Book a Tour</a>
                            </div>
                            <div class="tab-pane fade" id="values-tab-pane" role="tabpanel" aria-labelledby="values-tab" tabindex="0">
                                <p class="vs-about__text vs-text">We believe in nurturing the whole child - emotionally, socially, physically, and spiritually in a caring Christian environment.</p>
                                <ul class="vs-list pt-15 mb-35">
                                    <li>Love & Compassion</li>
                                    <li>Excellence in Education</li>
                                    <li>Family Partnership</li>
                                </ul>
                                <a href="{{ route('home') }}#contact" class="vs-btn"><span class="vs-btn__border"></span>contact us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About End -->

<!-- Class -->
<section id="programs" class="vs-class--area space-extra-top space-extra-bottom z-index-common overflow-hidden" data-bg-src="{{ asset('assets/img/class/class-bg.png') }}">
    <div class="vs-class--ele1 vs-x-anim">
        <img src="{{ asset('assets/img/class/class-ele1.png') }}" alt="class Element">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="vs-title text-center title-anime animation-style2">
                    <div class="title-anime__wrap">
                        <span class="vs-title__sub">Our Programs</span>
                        <h2 class="vs-title__main">Nurturing Every <span>Stage of Growth</span></h2>
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
                                <a class="vs-class__figure--link" href="{{ route('home') }}#programs">
                                    <img class="vs-class__figure--img" src="{{ asset('assets/img/class/class-1-1.jpg') }}" alt="Class Details">
                                    <div class="vs-class__icon--wrap">
                                        <span class="vs-class__icon vs-class__icon--color1">
                                            <img src="{{ asset('assets/img/icons/h1-class-icon-1.svg') }}" alt="Class Icon">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="vs-class__content">
                                <a class="vs-class__heading--link" href="{{ route('home') }}#programs">
                                    <h3 class="vs-class__heading">Baby Room</h3>
                                </a>
                                <p class="vs-class__text">
                                    Loving care for our youngest learners (3 months - 18 months) with qualified caregivers.
                                </p>
                            </div>
                            <div class="vs-class__bottom">
                                <a href="{{ route('home') }}#contact" class="vs-class__link">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide wow animate__fadeInUp" data-wow-delay="0.45s">
                        <div class="vs-class">
                            <div class="vs-class__figure">
                                <a class="vs-class__figure--link" href="{{ route('home') }}#programs">
                                    <img class="vs-class__figure--img" src="{{ asset('assets/img/class/class-1-2.jpg') }}" alt="Class Details">
                                    <div class="vs-class__icon--wrap">
                                        <span class="vs-class__icon vs-class__icon--color2">
                                            <img src="{{ asset('assets/img/icons/h1-class-icon-2.svg') }}" alt="Class Icon">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="vs-class__content">
                                <a class="vs-class__heading--link" href="{{ route('home') }}#programs">
                                    <h3 class="vs-class__heading">Toddlers</h3>
                                </a>
                                <p class="vs-class__text">
                                    Active exploration and discovery for toddlers (18 months - 3 years) in a safe space.
                                </p>
                            </div>
                            <div class="vs-class__bottom">
                                <a href="{{ route('home') }}#contact" class="vs-class__link">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide wow animate__fadeInUp" data-wow-delay="0.65s">
                        <div class="vs-class">
                            <div class="vs-class__figure">
                                <a class="vs-class__figure--link" href="{{ route('home') }}#programs">
                                    <img class="vs-class__figure--img" src="{{ asset('assets/img/class/class-1-3.jpg') }}" alt="Class Details">
                                    <div class="vs-class__icon--wrap">
                                        <span class="vs-class__icon vs-class__icon--color3">
                                            <img src="{{ asset('assets/img/icons/h1-class-icon-3.svg') }}" alt="Class Icon">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="vs-class__content">
                                <a class="vs-class__heading--link" href="{{ route('home') }}#programs">
                                    <h3 class="vs-class__heading">Preschool</h3>
                                </a>
                                <p class="vs-class__text">
                                    Structured learning and play for preschoolers (3-4 years) with CAPS curriculum.
                                </p>
                            </div>
                            <div class="vs-class__bottom">
                                <a href="{{ route('home') }}#contact" class="vs-class__link">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide wow animate__fadeInUp" data-wow-delay="0.85s">
                        <div class="vs-class">
                            <div class="vs-class__figure">
                                <a class="vs-class__figure--link" href="{{ route('home') }}#programs">
                                    <img class="vs-class__figure--img" src="{{ asset('assets/img/class/class-1-4.jpg') }}" alt="Class Details">
                                    <div class="vs-class__icon--wrap">
                                        <span class="vs-class__icon vs-class__icon--color4">
                                            <img src="{{ asset('assets/img/icons/h1-class-icon-4.svg') }}" alt="Class Icon">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="vs-class__content">
                                <a class="vs-class__heading--link" href="{{ route('home') }}#programs">
                                    <h3 class="vs-class__heading">Grade R</h3>
                                </a>
                                <p class="vs-class__text">
                                    Complete school readiness program for 5-6 year olds preparing for Grade 1.
                                </p>
                            </div>
                            <div class="vs-class__bottom">
                                <a href="{{ route('home') }}#contact" class="vs-class__link">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center pt-50">
                <button id="swiper-button-prev" class="vs-slider__button">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button id="swiper-button-next" class="vs-slider__button">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>
<!-- Class End -->

<!-- Vs Gallery Area -->
<section id="gallery" class="vs-gallery--area space space-extra-bottom overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="vs-title text-center title-anime animation-style2">
                    <div class="title-anime__wrap">
                        <span class="vs-title__sub">A Day at Peekaboo</span>
                        <h2 class="vs-title__main">Learning <span>Through Play</span></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="vs-gallery--row">
            <div class="vs-gallery vs-gallery--col1 wow animate__fadeInUp" data-wow-delay="0.25s">
                <div class="vs-gallery__figure">
                    <a class="vs-gallery__image--link" href="{{ route('home') }}#gallery">
                        <img class="vs-gallery__image" src="{{ asset('assets/img/gallery/gallery-h1-1-1.jpg') }}" alt="Gallery" loading="lazy">
                    </a>
                </div>
                <div class="vs-gallery__hover">
                    <a href="{{ asset('assets/img/gallery/gallery-h1-1-1.jpg') }}" class="vs-gallery__icon popup-image">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="{{ route('home') }}#gallery" class="vs-gallery__cate">
                        Learning
                    </a>
                    <a class="vs-gallery__heading--link" href="{{ route('home') }}#gallery">
                        <h4 class="vs-gallery__heading">Circle Time</h4>
                    </a>
                </div>
            </div>
            <div class="vs-gallery vs-gallery--col2 wow animate__fadeInUp" data-wow-delay="0.35s">
                <div class="vs-gallery__figure">
                    <a class="vs-gallery__image--link" href="{{ route('home') }}#gallery">
                        <img class="vs-gallery__image" src="{{ asset('assets/img/gallery/gallery-h1-1-2.jpg') }}" alt="Gallery" loading="lazy">
                    </a>
                </div>
                <div class="vs-gallery__hover">
                    <a href="{{ asset('assets/img/gallery/gallery-h1-1-2.jpg') }}" class="vs-gallery__icon popup-image">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="{{ route('home') }}#gallery" class="vs-gallery__cate">
                        Play
                    </a>
                    <a class="vs-gallery__heading--link" href="{{ route('home') }}#gallery">
                        <h4 class="vs-gallery__heading">Outdoor Fun</h4>
                    </a>
                </div>
            </div>
            <div class="vs-gallery vs-gallery--col3 wow animate__fadeInUp" data-wow-delay="0.45s">
                <div class="vs-gallery__figure">
                    <a class="vs-gallery__image--link" href="{{ route('home') }}#gallery">
                        <img class="vs-gallery__image" src="{{ asset('assets/img/gallery/gallery-h1-1-3.jpg') }}" alt="Gallery" loading="lazy">
                    </a>
                </div>
                <div class="vs-gallery__hover">
                    <a href="{{ asset('assets/img/gallery/gallery-h1-1-3.jpg') }}" class="vs-gallery__icon popup-image">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="{{ route('home') }}#gallery" class="vs-gallery__cate">
                        Creative
                    </a>
                    <a class="vs-gallery__heading--link" href="{{ route('home') }}#gallery">
                        <h4 class="vs-gallery__heading">Arts & Crafts</h4>
                    </a>
                </div>
            </div>
            <div class="vs-gallery vs-gallery--col4 wow animate__fadeInUp" data-wow-delay="0.55s">
                <div class="vs-gallery__figure">
                    <a class="vs-gallery__image--link" href="{{ route('home') }}#gallery">
                        <img class="vs-gallery__image" src="{{ asset('assets/img/gallery/gallery-h1-1-4.jpg') }}" alt="Gallery" loading="lazy">
                    </a>
                </div>
                <div class="vs-gallery__hover">
                    <a href="{{ asset('assets/img/gallery/gallery-h1-1-4.jpg') }}" class="vs-gallery__icon popup-image">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="{{ route('home') }}#gallery" class="vs-gallery__cate">
                        Events
                    </a>
                    <a class="vs-gallery__heading--link" href="{{ route('home') }}#gallery">
                        <h4 class="vs-gallery__heading">Special Days</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Vs Gallery Area End -->

<!-- Contact CTA -->
<section id="contact" class="vs-cta--area space-extra-top space-extra-bottom parallax-wrap" data-bg-src="{{ asset('assets/img/bg/cta-bg.jpg') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="vs-title text-center title-anime animation-style2 mb-30">
                    <div class="title-anime__wrap">
                        <span class="vs-title__sub ">Get In Touch</span>
                        <h2 class="vs-title__main ">Ready to Start Your Child's Journey?</h2>
                    </div>
                </div>
                <p class=" mb-40">Limited spaces available for 2026. Contact us today to book a tour or apply online.</p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ route('enrol.index') }}" class="vs-btn"><span class="vs-btn__border"></span>Apply Now</a>
                    <a href="{{ route('book-tour') }}" class="vs-btn style4"><span class="vs-btn__border"></span>Book a Tour</a>
                    <a href="https://wa.me/27828989967?text=Hi!%20I'd%20like%20to%20enquire%20about%20Peekaboo%20Daycare." class="vs-btn " target="_blank"><span class="vs-btn__border"></span>WhatsApp Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact CTA End -->

@endsection
