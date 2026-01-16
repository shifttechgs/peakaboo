<!--==============================
    Mobile Menu
============================== -->
<div class="vs-menu-wrapper">
    <div class="vs-menu-area text-center">
        <div class="mobile-logo">
            <a href="{{ route('home') }}"><img style="height: 70px" src="{{ asset('assets/img/peekaboo/logo.png') }}" alt="Peekaboo Daycare" class="logo"></a>
            <button class="vs-menu-toggle">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="vs-header__right pt-4">
            <button class="sideMenuToggler" type="button">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.4307 36H4.16306C1.86757 36 0 34.1324 0 31.8369V23.5693C0 21.2738 1.86757 19.4062 4.16306 19.4062H12.4307C14.7262 19.4062 16.5938 21.2738 16.5938 23.5693V31.8369C16.5938 34.1324 14.7262 36 12.4307 36ZM13.7812 23.5693C13.7812 22.8246 13.1754 22.2188 12.4307 22.2188H4.16306C3.41838 22.2188 2.8125 22.8246 2.8125 23.5693V31.8369C2.8125 32.5816 3.41838 33.1875 4.16306 33.1875H12.4307C13.1754 33.1875 13.7812 32.5816 13.7812 31.8369V23.5693Z" fill="#4A2559"></path>
                    <path d="M31.7812 36H23.625C21.2988 36 19.4062 34.1075 19.4062 31.7812V23.625C19.4062 21.2988 21.2988 19.4062 23.625 19.4062H31.7812C34.1075 19.4062 36 21.2988 36 23.625V31.7812C36 34.1075 34.1075 36 31.7812 36ZM33.1875 23.625C33.1875 22.8496 32.5567 22.2188 31.7812 22.2188H23.625C22.8496 22.2188 22.2188 22.8496 22.2188 23.625V31.7812C22.2188 32.5567 22.8496 33.1875 23.625 33.1875H31.7812C32.5567 33.1875 33.1875 32.5567 33.1875 31.7812V23.625Z" fill="#D18109"></path>
                    <path d="M12.4307 16.5938H4.16306C1.86757 16.5938 0 14.7262 0 12.4307V4.16306C0 1.86757 1.86757 0 4.16306 0H12.4307C14.7262 0 16.5938 1.86757 16.5938 4.16306V12.4307C16.5938 14.7262 14.7262 16.5938 12.4307 16.5938ZM13.7812 4.16306C13.7812 3.41838 13.1754 2.8125 12.4307 2.8125H4.16306C3.41838 2.8125 2.8125 3.41838 2.8125 4.16306V12.4307C2.8125 13.1754 3.41838 13.7812 4.16306 13.7812H12.4307C13.1754 13.7812 13.7812 13.1754 13.7812 12.4307V4.16306Z" fill="#D18109"></path>
                    <path d="M31.7812 16.5938H23.625C21.2988 16.5938 19.4062 14.7012 19.4062 12.375V4.21875C19.4062 1.89253 21.2988 0 23.625 0H31.7812C34.1075 0 36 1.89253 36 4.21875V12.375C36 14.7012 34.1075 16.5938 31.7812 16.5938ZM33.1875 4.21875C33.1875 3.44334 32.5567 2.8125 31.7812 2.8125H23.625C22.8496 2.8125 22.2188 3.44334 22.2188 4.21875V12.375C22.2188 13.1504 22.8496 13.7812 23.625 13.7812H31.7812C32.5567 13.7812 33.1875 13.1504 33.1875 12.375V4.21875Z" fill="#4A2559"></path>
                </svg>
            </button>
        </div>
        <div class="vs-mobile-menu">
            <ul>
                <li>
                    <a class="vs-svg-assets" href="{{ route('home') }}">
                        HOME
                        <svg xmlns="http://www.w3.org/2000/svg" width="87" height="31" viewBox="0 0 87 31" fill="none">
                            <path d="M0 4.14031C0 1.87713 1.87602 0.0646902 4.13785 0.142684L83.1379 2.86682C85.2921 2.94111 87 4.70896 87 6.86445V25.0909C87 27.2642 85.2647 29.0399 83.0919 29.0898L4.09193 30.9059C1.84739 30.9575 0 29.1521 0 26.907V4.14031Z" fill="#70167E"></path>
                        </svg>
                    </a>
                </li>
                <li>
                    <a class="vs-svg-assets" href="{{ route('home') }}#programs">
                        Programs
                        <svg xmlns="http://www.w3.org/2000/svg" width="87" height="31" viewBox="0 0 87 31" fill="none">
                            <path d="M0 4.14031C0 1.87713 1.87602 0.0646902 4.13785 0.142684L83.1379 2.86682C85.2921 2.94111 87 4.70896 87 6.86445V25.0909C87 27.2642 85.2647 29.0399 83.0919 29.0898L4.09193 30.9059C1.84739 30.9575 0 29.1521 0 26.907V4.14031Z" fill="#70167E"></path>
                        </svg>
                    </a>
                </li>
                <li>
                    <a class="vs-svg-assets" href="{{ route('home') }}#about">
                        About
                        <svg xmlns="http://www.w3.org/2000/svg" width="87" height="31" viewBox="0 0 87 31" fill="none">
                            <path d="M0 4.14031C0 1.87713 1.87602 0.0646902 4.13785 0.142684L83.1379 2.86682C85.2921 2.94111 87 4.70896 87 6.86445V25.0909C87 27.2642 85.2647 29.0399 83.0919 29.0898L4.09193 30.9059C1.84739 30.9575 0 29.1521 0 26.907V4.14031Z" fill="#70167E"></path>
                        </svg>
                    </a>
                </li>
                <li>
                    <a class="vs-svg-assets" href="{{ route('home') }}#fees">
                        Fees
                        <svg xmlns="http://www.w3.org/2000/svg" width="87" height="31" viewBox="0 0 87 31" fill="none">
                            <path d="M0 4.14031C0 1.87713 1.87602 0.0646902 4.13785 0.142684L83.1379 2.86682C85.2921 2.94111 87 4.70896 87 6.86445V25.0909C87 27.2642 85.2647 29.0399 83.0919 29.0898L4.09193 30.9059C1.84739 30.9575 0 29.1521 0 26.907V4.14031Z" fill="#70167E"></path>
                        </svg>
                    </a>
                </li>
                <li>
                    <a class="vs-svg-assets" href="{{ route('home') }}#contact">
                        Contact
                        <svg xmlns="http://www.w3.org/2000/svg" width="87" height="31" viewBox="0 0 87 31" fill="none">
                            <path d="M0 4.14031C0 1.87713 1.87602 0.0646902 4.13785 0.142684L83.1379 2.86682C85.2921 2.94111 87 4.70896 87 6.86445V25.0909C87 27.2642 85.2647 29.0399 83.0919 29.0898L4.09193 30.9059C1.84739 30.9575 0 29.1521 0 26.907V4.14031Z" fill="#70167E"></path>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        <div class="px-20 py-20">
            <div class="sidemenu-contact style2">
                <ul>
                    <li>
                        <a href="tel:0215574999" class="sidemenu-link">021 557 4999 / 082 898 9967</a>
                    </li>
                    <li>
                        <a href="mailto:peekaboodaycare@telkomsa.net" class="sidemenu-link">peekaboodaycare@telkomsa.net</a>
                    </li>
                    <li>
                        <a href="https://maps.google.com/?q=139B+Humewood+Drive+Parklands+Cape+Town" target="_blank">139B Humewood Drive, Parklands, 7441, Cape Town</a>
                    </li>
                </ul>
            </div>
            <div class="footer-social mb-20">
                <a href="https://facebook.com/peekaboodaycare" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://wa.me/27828989967" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <a href="mailto:peekaboodaycare@telkomsa.net"><i class="fas fa-envelope"></i></a>
            </div>
            <p class="sidemenu-text sidemenu-text--footer text-center mb-0">Copyright © {{ date('Y') }} <a class="vs-theme-color" href="{{ route('home') }}">Peekaboo Daycare</a>. All rights reserved.</p>
        </div>
    </div>
</div>

<!--==============================
    Offcanvas Sidebar
============================== -->
<div class="sidemenu-wrapper">
    <div class="sidemenu-content">
        <div class="sidemenu-logo sidemenu-item">
            <a href="{{ route('home') }}"><img  src="{{ asset('assets/img/peekaboo/logo.png') }}" alt="Peekaboo Daycare" class="logo"></a>
            <button class="closeButton sideMenuCls">X</button>
        </div>
        <hr class="sidemenu-hr sidemenu-item">
        <div class="sidemenu-inner">
            <div class="sidemenu-body">
                <p class="sidemenu-item text-white mb-30">A safe, loving space where little minds grow. Licensed daycare nurturing children from infancy to Grade R with Christian values.</p>
                <h4 class="sidemenu-subtitle sidemenu-item">CONTACT US</h4>
                <div class="sidemenu-contact">
                    <ul>
                        <li class="sidemenu-item">
                            <a href="tel:0215574999" class="sidemenu-link">021 557 4999 / 082 898 9967</a>
                        </li>
                        <li class="sidemenu-item">
                            <a href="mailto:peekaboodaycare@telkomsa.net" class="sidemenu-link">peekaboodaycare@telkomsa.net</a>
                        </li>
                        <li class="sidemenu-item">
                            <a href="https://maps.google.com/?q=139B+Humewood+Drive+Parklands+Cape+Town" target="_blank">139B Humewood Drive, Parklands, 7441, Cape Town</a>
                        </li>
                    </ul>
                </div>
                <h4 class="sidemenu-subtitle style2 text-uppercase sidemenu-item">Gallery</h4>
                <div class="sidebar-gallery sidemenu-item">
                    @foreach(['gal-1-1', 'gal-1-2', 'gal-1-3', 'gal-1-4', 'gal-1-5', 'gal-1-6'] as $index => $img)
                    <div class="gallery-thumb">
                        <img src="{{ asset('assets/img/gallery/' . $img . '.jpg') }}" alt="Gallery Image" class="w-100">
                        <a href="{{ asset('assets/img/gallery/' . $img . '.jpg') }}" class="popup-image gal-btn"><i class="fal fa-plus"></i></a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="sidemenu-footer">
                <hr class="sidemenu-hr sidemenu-item">
                <div class="footer-social sidemenu-item">
                    <span>follow us on :</span>
                    <a href="https://facebook.com/peekaboodaycare" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://wa.me/27828989967" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    <a href="mailto:peekaboodaycare@telkomsa.net"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
    Header
============================== -->
<header class="vs-header">
    <!-- Header Element -->
    <div class="vs-balls"></div>
    <!-- Header Top -->
    <div class="vs-header__top">
        <div class="container container--custom">
            <div class="row align-items-center justify-content-between gy-1 text-center text-lg-start">
                <div class="col-lg-auto d-none d-lg-block">
                    <div class="d-flex align-items-center flex-wrap gap-4">
                        <div class="vs-header__info">
                            <i class="fa-solid fa-phone-volume"></i>
                            <span>Phone: <a href="tel:0215574999">021 557 4999 / 082 898 9967</a></span>
                        </div>
                        <div class="vs-header__info">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <span class="text-theme-color5">Opening Time: <a href="tel:06:00-18:00">06:00-18:00</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="social-style">
                        <span class="social-style__label">follow us :</span>
                        <a href="https://facebook.com/peekaboodaycare" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://wa.me/27828989967" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a href="mailto:peekaboodaycare@telkomsa.net"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <div class="sticky-active">
            <div class="container container--custom">
                <div class="row justify-content-between align-items-center">
                    <div class="col">
                        <div class="vs-header__logo">
                            <a href="{{ route('home') }}"><img style="height: 80px" src="{{ asset('assets/img/peekaboo/logo.png') }}" alt="Peekaboo Daycare" class="logo"></a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <nav class="main-menu d-none d-lg-block">
                            <ul>
                                <li>
                                    <a class="vs-svg-assets" href="{{ route('home') }}" style=" color: #0c508e">
                                        HOME

                                    </a>
                                </li>
                                <li>
                                    <a class="vs-svg-assets" href="{{ route('home') }}#programs" style=" color: #0c508e">
                                        Programs

                                    </a>
                                </li>
                                <li>
                                    <a class="vs-svg-assets" href="{{ route('home') }}#about" style=" color: #0c508e">
                                        About

                                    </a>
                                </li>
                                <li>
                                    <a class="vs-svg-assets" href="{{ route('home') }}#fees" style=" color: #0c508e">
                                        Fees

                                    </a>
                                </li>
                                <li>
                                    <a class="vs-svg-assets" href="{{ route('home') }}#contact" style=" color: #0c508e">
                                        Contact

                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-auto">
                        <div class="vs-header__action">
                            <div class="d-none d-xxl-inline-flex">
                                <a href="{{ route('enrol.index') }}" class="vs-btn"><span class="vs-btn__border"></span>Apply Now</a>
                            </div>

                            <div class="d-none d-xxl-inline-flex">
                                <a href="{{ route('admin.dashboard') }}" class="vs-btn"><span class="vs-btn__border"></span>Portal</a>
                            </div>
                            <div class="d-none d-lg-inline-flex align-items-center">
                                <button class="sideMenuToggler">
                                    <svg width="31" height="23" viewBox="0 0 31 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.9165 4.5H28.4165C29.6594 4.5 30.6665 3.49292 30.6665 2.25C30.6665 1.00708 29.6594 0 28.4165 0H2.9165C1.67358 0 0.666504 1.00708 0.666504 2.25C0.666504 3.49292 1.67358 4.5 2.9165 4.5Z" fill="currentColor" />
                                        <path d="M28.4165 9H2.9165C1.67358 9 0.666504 10.0071 0.666504 11.25C0.666504 12.4929 1.67358 13.5 2.9165 13.5H28.4165C29.6594 13.5 30.6665 12.4929 30.6665 11.25C30.6665 10.0071 29.6594 9 28.4165 9Z" fill="currentColor" />
                                        <path d="M28.4165 18H2.9165C1.67358 18 0.666504 19.0071 0.666504 20.25C0.666504 21.4929 1.67358 22.5 2.9165 22.5H28.4165C29.6594 22.5 30.6665 21.4929 30.6665 20.25C30.6665 19.0071 29.6594 18 28.4165 18Z" fill="currentColor" />
                                    </svg>
                                </button>
                            </div>
                            <button class="vs-menu-toggle style2 d-inline-block d-lg-none">
                                <i class="fal fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
