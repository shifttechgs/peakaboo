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
<section id="teachers" class="space space-extra-bottom" style="background-color: #f9f6f2; position: relative; overflow: hidden;">

    <!-- Decorative Background Elements -->
    <div style="position: absolute; top: 50px; right: -50px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(209, 129, 9, 0.08) 0%, transparent 70%); border-radius: 50%; pointer-events: none;"></div>
    <div style="position: absolute; bottom: 100px; left: -80px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(12, 80, 142, 0.06) 0%, transparent 70%); border-radius: 50%; pointer-events: none;"></div>

    <div class="container" style="position: relative; z-index: 2;">

        <!-- Section Header -->
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="vs-title title-anime animation-style2">
                    <div class="title-anime__wrap">
                        <span class="vs-title__sub">The Heart of Peekaboo</span>
                        <h2 class="vs-title__main">Meet Our <span>Dedicated Teachers</span></h2>
                    </div>
                </div>
                <p style="color: #666; font-size: 17px; line-height: 1.7; max-width: 650px; margin: 20px auto 0;">
                    Our qualified educators bring years of experience, genuine warmth, and a passion for early childhood development. Every teacher is vetted, trained, and committed to nurturing your child's unique potential.
                </p>
            </div>
        </div>

        <!-- Teachers Grid -->
        <div class="row gy-4 gx-4 justify-content-center">

            <!-- Teacher Card 1 -->
            <div class="col-lg-3 col-md-6">
                <div class="teacher-card wow animate__fadeInUp" data-wow-delay="0.15s" style="background: white; border-radius: 20px; padding: 30px; box-shadow: 0 8px 30px rgba(0,0,0,0.08); transition: all 0.4s ease; position: relative; overflow: hidden; height: 100%;"
                     onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 16px 48px rgba(12,80,142,0.15)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 30px rgba(0,0,0,0.08)';">

                    <div style="position: absolute; top: 0; right: 0; width: 80px; height: 80px; background: linear-gradient(135deg, rgba(12,80,142,0.1), transparent); border-radius: 0 20px 0 100%;"></div>

                    <div style="position: relative; margin-bottom: 20px; display: flex; justify-content: center;">
                        <div style="position: relative;">
                            <img src="{{ asset('assets/img/teachers/teacher-1.jpg') }}"
                                 alt="Miss Sarah - Lead Preschool Teacher"
                                 style="width: 140px; height: 140px; border-radius: 50%; object-fit: cover; border: 5px solid #f9f6f2; box-shadow: 0 8px 24px rgba(0,0,0,0.1);"
                                 onerror="this.src='https://ui-avatars.com/api/?name=Sarah+M&size=140&background=0c508e&color=fff&bold=true'">

                            <div style="position: absolute; bottom: 5px; right: 5px; background: linear-gradient(135deg, #D18109, #ffa726); width: 38px; height: 38px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(209,129,9,0.4); border: 3px solid white;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                                    <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div style="text-align: center;">
                        <h3 style="color: #4A2559; font-size: 20px; font-weight: 700; margin-bottom: 8px;">Miss Sarah</h3>
                        <p style="color: #0c508e; font-size: 13px; font-weight: 600; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px;">Lead Preschool Teacher</p>
                        <p style="color: #999; font-size: 12px; margin-bottom: 15px; line-height: 1.5;">ECD Level 5 · 12+ Years</p>

                        <div style="width: 50px; height: 3px; background: linear-gradient(90deg, #0c508e, #D18109); margin: 15px auto; border-radius: 2px;"></div>

                        <div style="background: #f9f6f2; padding: 12px; border-radius: 12px; border-left: 3px solid #0c508e; margin-top: 15px;">
                            <p style="color: #666; font-size: 13px; line-height: 1.6; margin: 0; font-style: italic;">
                                "Every child is capable of amazing things!"
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Teacher Card 2 -->
            <div class="col-lg-3 col-md-6">
                <div class="teacher-card wow animate__fadeInUp" data-wow-delay="0.25s" style="background: white; border-radius: 20px; padding: 30px; box-shadow: 0 8px 30px rgba(0,0,0,0.08); transition: all 0.4s ease; position: relative; overflow: hidden; height: 100%;"
                     onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 16px 48px rgba(12,80,142,0.15)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 30px rgba(0,0,0,0.08)';">

                    <div style="position: absolute; top: 0; right: 0; width: 80px; height: 80px; background: linear-gradient(135deg, rgba(112,22,126,0.1), transparent); border-radius: 0 20px 0 100%;"></div>

                    <div style="position: relative; margin-bottom: 20px; display: flex; justify-content: center;">
                        <div style="position: relative;">
                            <img src="{{ asset('assets/img/teachers/teacher-2.jpg') }}"
                                 alt="Teacher Thandi - Baby Room Specialist"
                                 style="width: 140px; height: 140px; border-radius: 50%; object-fit: cover; border: 5px solid #f9f6f2; box-shadow: 0 8px 24px rgba(0,0,0,0.1);"
                                 onerror="this.src='https://ui-avatars.com/api/?name=Thandi+K&size=140&background=70167E&color=fff&bold=true'">

                            <div style="position: absolute; bottom: 5px; right: 5px; background: linear-gradient(135deg, #70167E, #9c27b0); width: 38px; height: 38px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(112,22,126,0.4); border: 3px solid white;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                                    <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div style="text-align: center;">
                        <h3 style="color: #4A2559; font-size: 20px; font-weight: 700; margin-bottom: 8px;">Teacher Thandi</h3>
                        <p style="color: #0c508e; font-size: 13px; font-weight: 600; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px;">Baby Room Specialist</p>
                        <p style="color: #999; font-size: 12px; margin-bottom: 15px; line-height: 1.5;">ECD Level 4 · First Aid · 8+ Years</p>

                        <div style="width: 50px; height: 3px; background: linear-gradient(90deg, #70167E, #D18109); margin: 15px auto; border-radius: 2px;"></div>

                        <div style="background: #f9f6f2; padding: 12px; border-radius: 12px; border-left: 3px solid #70167E; margin-top: 15px;">
                            <p style="color: #666; font-size: 13px; line-height: 1.6; margin: 0; font-style: italic;">
                                "I treat each baby as if they were my own."
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Teacher Card 3 -->
            <div class="col-lg-3 col-md-6">
                <div class="teacher-card wow animate__fadeInUp" data-wow-delay="0.35s" style="background: white; border-radius: 20px; padding: 30px; box-shadow: 0 8px 30px rgba(0,0,0,0.08); transition: all 0.4s ease; position: relative; overflow: hidden; height: 100%;"
                     onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 16px 48px rgba(12,80,142,0.15)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 30px rgba(0,0,0,0.08)';">

                    <div style="position: absolute; top: 0; right: 0; width: 80px; height: 80px; background: linear-gradient(135deg, rgba(209,129,9,0.1), transparent); border-radius: 0 20px 0 100%;"></div>

                    <div style="position: relative; margin-bottom: 20px; display: flex; justify-content: center;">
                        <div style="position: relative;">
                            <img src="{{ asset('assets/img/teachers/teacher-3.jpg') }}"
                                 alt="Miss Lerato - Grade R Teacher"
                                 style="width: 140px; height: 140px; border-radius: 50%; object-fit: cover; border: 5px solid #f9f6f2; box-shadow: 0 8px 24px rgba(0,0,0,0.1);"
                                 onerror="this.src='https://ui-avatars.com/api/?name=Lerato+N&size=140&background=D18109&color=fff&bold=true'">

                            <div style="position: absolute; bottom: 5px; right: 5px; background: linear-gradient(135deg, #0c508e, #1976d2); width: 38px; height: 38px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(12,80,142,0.4); border: 3px solid white;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                                    <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div style="text-align: center;">
                        <h3 style="color: #4A2559; font-size: 20px; font-weight: 700; margin-bottom: 8px;">Miss Lerato</h3>
                        <p style="color: #0c508e; font-size: 13px; font-weight: 600; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px;">Grade R Teacher</p>
                        <p style="color: #999; font-size: 12px; margin-bottom: 15px; line-height: 1.5;">B.Ed Foundation · CAPS · 10+ Years</p>

                        <div style="width: 50px; height: 3px; background: linear-gradient(90deg, #D18109, #0c508e); margin: 15px auto; border-radius: 2px;"></div>

                        <div style="background: #f9f6f2; padding: 12px; border-radius: 12px; border-left: 3px solid #D18109; margin-top: 15px;">
                            <p style="color: #666; font-size: 13px; line-height: 1.6; margin: 0; font-style: italic;">
                                "Seeing them confident and ready makes it all worthwhile!"
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Teacher Card 4 - Toddler Class -->
            <div class="col-lg-3 col-md-6">
                <div class="teacher-card wow animate__fadeInUp" data-wow-delay="0.45s" style="background: white; border-radius: 20px; padding: 30px; box-shadow: 0 8px 30px rgba(0,0,0,0.08); transition: all 0.4s ease; position: relative; overflow: hidden; height: 100%;"
                     onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 16px 48px rgba(12,80,142,0.15)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 30px rgba(0,0,0,0.08)';">

                    <div style="position: absolute; top: 0; right: 0; width: 80px; height: 80px; background: linear-gradient(135deg, rgba(209,129,9,0.1), transparent); border-radius: 0 20px 0 100%;"></div>

                    <div style="position: relative; margin-bottom: 20px; display: flex; justify-content: center;">
                        <div style="position: relative;">
                            <img src="{{ asset('assets/img/teachers/teacher-4.jpg') }}"
                                 alt="Teacher Nomsa - Toddler Class Teacher"
                                 style="width: 140px; height: 140px; border-radius: 50%; object-fit: cover; border: 5px solid #f9f6f2; box-shadow: 0 8px 24px rgba(0,0,0,0.1);"
                                 onerror="this.src='https://ui-avatars.com/api/?name=Nomsa+D&size=140&background=D18109&color=fff&bold=true'">

                            <div style="position: absolute; bottom: 5px; right: 5px; background: linear-gradient(135deg, #D18109, #ff9800); width: 38px; height: 38px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(209,129,9,0.4); border: 3px solid white;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                                    <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div style="text-align: center;">
                        <h3 style="color: #4A2559; font-size: 20px; font-weight: 700; margin-bottom: 8px;">Teacher Nomsa</h3>
                        <p style="color: #0c508e; font-size: 13px; font-weight: 600; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px;">Toddler Class Teacher</p>
                        <p style="color: #999; font-size: 12px; margin-bottom: 15px; line-height: 1.5;">ECD Level 4 · Child Dev · 9+ Years</p>

                        <div style="width: 50px; height: 3px; background: linear-gradient(90deg, #D18109, #70167E); margin: 15px auto; border-radius: 2px;"></div>

                        <div style="background: #f9f6f2; padding: 12px; border-radius: 12px; border-left: 3px solid #D18109; margin-top: 15px;">
                            <p style="color: #666; font-size: 13px; line-height: 1.6; margin: 0; font-style: italic;">
                                "Toddlers are full of wonder! I love guiding them as they explore."
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Teacher Qualifications Banner -->
        <div class="row mt-5">
            <div class="col-lg-10 mx-auto">
                <div style="background: linear-gradient(135deg, rgba(12,80,142,0.08), rgba(209,129,9,0.08)); border-radius: 16px; padding: 30px 40px; border: 2px solid rgba(12,80,142,0.1);">
                    <div class="row align-items-center gy-3">
                        <div class="col-lg-8">
                            <h4 style="color: #4A2559; font-size: 20px; font-weight: 700; margin-bottom: 10px;">Every Teacher is Qualified, Vetted & Passionate</h4>
                            <p style="color: #666; font-size: 15px; margin: 0; line-height: 1.6;">
                                All our educators hold recognized ECD qualifications, undergo police clearance checks, and complete ongoing professional development. Your child's safety and growth are in expert, caring hands.
                            </p>
                        </div>
                        <div class="col-lg-4 text-center text-lg-end">
                            <div style="display: inline-flex; gap: 15px; flex-wrap: wrap; justify-content: center;">
                                <div style="text-align: center;">
                                    <div style="color: #0c508e; font-size: 28px; font-weight: 700; margin-bottom: 2px;">100%</div>
                                    <div style="color: #999; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Qualified</div>
                                </div>
                                <div style="text-align: center;">
                                    <div style="color: #0c508e; font-size: 28px; font-weight: 700; margin-bottom: 2px;">100%</div>
                                    <div style="color: #999; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Vetted</div>
                                </div>
                                <div style="text-align: center;">
                                    <div style="color: #0c508e; font-size: 28px; font-weight: 700; margin-bottom: 2px;">10+</div>
                                    <div style="color: #999; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Avg Years</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
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
