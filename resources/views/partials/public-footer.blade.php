<div class="vs-footer bg-title">
    <div class="vs-footer__top z-index-common space-extra-top space-extra-bottom">
        <img src="{{ asset('assets/img/footer/footer-element-1.png') }}" alt="Footer Element" class="vs-footer__ele1 wow animate__fadeInLeft" data-wow-delay="0.25s">
        <img src="{{ asset('assets/img/footer/footer-element-2.png') }}" alt="Footer Element" class="vs-footer__ele2">
        <img src="{{ asset('assets/img/footer/footer-element-3.png') }}" alt="Footer Element" class="vs-footer__ele3 wow animate__fadeInRight" data-wow-delay="0.35s">
        <div class="vs-balls vs-balls--screen" data-balls-top="-6px" data-balls-color="#ffffff"></div>
        <div class="container">
            <div class="row gy-4 gx-xxl-5">
                <div class="col-lg-4 col-md-6 wow animate__fadeInUp" data-wow-delay="0.25s">
                    <div class="vs-footer__widget">
                        <div class="vs-footer__logo text-center text-md-start mb-25">
                            <a href="{{ route('home') }}" class="vs-footer__logo-link">
                                <img src="{{ asset('assets/img/peekaboo/logo.png') }}" alt="Peekaboo Daycare" style="max-height: 80px;">
                            </a>
                        </div>
                        <p class="vs-footer__desc text-center text-md-start">
                            A safe, loving space where little minds grow. Licensed daycare nurturing children from infancy to Grade R with Christian values.
                        </p>
                        <div class="icon-call justify-content-center justify-content-md-start pt-10 mb-10">
                            <span class="icon-call__icon"><i class="fa-solid fa-phone-rotary"></i></span>
                            <div class="icon-call__content">
                                <span class="icon-call__title">call support</span>
                                <a href="tel:0215574999" class="icon-call__number">021 557 4999</a>
                            </div>
                        </div>
                        <div class="social-style social-style--version2 w-100 justify-content-center justify-content-md-start pt-25">
                            <span class="social-style__label">follow us :</span>
                            <a href="https://facebook.com/peekaboodaycare" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://wa.me/27828989967" target="_blank"><i class="fab fa-whatsapp"></i></a>
                            <a href="mailto:peekaboodaycare@telkomsa.net"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow animate__fadeInUp" data-wow-delay="0.35s">
                    <div class="vs-footer__widget">
                        <h3 class="vs-footer__title">Quick Links</h3>
                        <div class="vs-footer__menu">
                            <ul class="vs-footer__menu--list">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('home') }}#programs">Programs</a></li>
                                <li><a href="{{ route('home') }}#about">About Us</a></li>
                                <li><a href="{{ route('home') }}#fees">Fees</a></li>
                                <li><a href="{{ route('home') }}#contact">Contact</a></li>
                            </ul>
                            <ul class="vs-footer__menu--list">
                                <li><a href="{{ route('enrol.index') }}">Apply Now</a></li>
                                <li><a href="{{ route('book-tour') }}">Book a Tour</a></li>
                                <li><a href="{{ route('admin.dashboard') }}">Admin Portal</a></li>
                                <li><a href="{{ route('teacher.dashboard') }}">Teacher Portal</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow animate__fadeInUp" data-wow-delay="0.45s">
                    <div class="vs-footer__widget">
                        <h3 class="vs-footer__title">Contact Info</h3>
                        <div class="vs-footer__contact">
                            <p class="vs-footer__contact-item" style="color: white">
                                <i class="fas fa-map-marker-alt"></i>
                                139B Humewood Drive, Parklands, 7441, Cape Town
                            </p>
                            <p class="vs-footer__contact-item" >
                                <i class="fas fa-phone-alt"></i>
                                <a href="tel:0215574999"  style="color: white">021 557 4999</a> / <a href="tel:0828989967"  style="color: white">082 898 9967</a>
                            </p>
                            <p class="vs-footer__contact-item"  style="color: white">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:peekaboodaycare@telkomsa.net"  style="color: white">peekaboodaycare@telkomsa.net</a>
                            </p>
                            <p class="vs-footer__contact-item"  style="color: white">
                                <i class="fas fa-clock"></i>
                                Monday - Friday: 06:00 - 18:00
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="vs-footer__bottom bg-theme-color-1">
        <div class="container">
            <div class="row gy-3 gx-5 align-items-center justify-content-center justify-content-lg-between flex-column-reverse flex-lg-row">
                <div class="col-md-auto">
                    <p class="vs-footer__copyright mb-0">
                        Copyright © <span id="currentYear">{{ date('Y') }}</span>
                        <a href="{{ route('home') }}">Peekaboo Daycare & Preschool</a>. All rights reserved.
                    </p>
                </div>
                <div class="col-md-auto">
                    <ul class="vs-footer__bottom--menu">

                        <li><a href="https://shifttechgs.com/">Designed By ShiftTech</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
