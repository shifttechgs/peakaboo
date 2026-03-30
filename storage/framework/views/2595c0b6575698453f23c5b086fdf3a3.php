<!--==============================
    Mobile Menu
============================== -->
<div class="vs-menu-wrapper">
    <div class="vs-menu-area text-center">
        <div class="mobile-logo">
            <a href="<?php echo e(route('home')); ?>"><img style="height: 70px" src="<?php echo e(asset('assets/img/peekaboo/logo.png')); ?>" alt="Peekaboo Daycare" class="logo"></a>
            <button class="vs-menu-toggle">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>










        <div class="vs-mobile-menu">
            <ul>








                <li>
                    <a class="vs-svg-assets" href="<?php echo e(route('programs')); ?>">
                        Programs
                        <svg xmlns="http://www.w3.org/2000/svg" width="87" height="31" viewBox="0 0 87 31" fill="none">
                            <path d="M0 4.14031C0 1.87713 1.87602 0.0646902 4.13785 0.142684L83.1379 2.86682C85.2921 2.94111 87 4.70896 87 6.86445V25.0909C87 27.2642 85.2647 29.0399 83.0919 29.0898L4.09193 30.9059C1.84739 30.9575 0 29.1521 0 26.907V4.14031Z" fill="#70167E"></path>
                        </svg>
                    </a>
                </li>
                <li>
                    <a class="vs-svg-assets" href="<?php echo e(route('about')); ?>">
                        About
                        <svg xmlns="http://www.w3.org/2000/svg" width="87" height="31" viewBox="0 0 87 31" fill="none">
                            <path d="M0 4.14031C0 1.87713 1.87602 0.0646902 4.13785 0.142684L83.1379 2.86682C85.2921 2.94111 87 4.70896 87 6.86445V25.0909C87 27.2642 85.2647 29.0399 83.0919 29.0898L4.09193 30.9059C1.84739 30.9575 0 29.1521 0 26.907V4.14031Z" fill="#70167E"></path>
                        </svg>
                    </a>
                </li>
                <li>
                    <a class="vs-svg-assets" href="<?php echo e(route('fees')); ?>">
                        Fees
                        <svg xmlns="http://www.w3.org/2000/svg" width="87" height="31" viewBox="0 0 87 31" fill="none">
                            <path d="M0 4.14031C0 1.87713 1.87602 0.0646902 4.13785 0.142684L83.1379 2.86682C85.2921 2.94111 87 4.70896 87 6.86445V25.0909C87 27.2642 85.2647 29.0399 83.0919 29.0898L4.09193 30.9059C1.84739 30.9575 0 29.1521 0 26.907V4.14031Z" fill="#70167E"></path>
                        </svg>
                    </a>
                </li>
                <li>
                    <a class="vs-svg-assets" href="<?php echo e(route('contact')); ?>">
                        Contact
                        <svg xmlns="http://www.w3.org/2000/svg" width="87" height="31" viewBox="0 0 87 31" fill="none">
                            <path d="M0 4.14031C0 1.87713 1.87602 0.0646902 4.13785 0.142684L83.1379 2.86682C85.2921 2.94111 87 4.70896 87 6.86445V25.0909C87 27.2642 85.2647 29.0399 83.0919 29.0898L4.09193 30.9059C1.84739 30.9575 0 29.1521 0 26.907V4.14031Z" fill="#70167E"></path>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        <!-- ── Mobile Menu CTA Buttons ── -->
        <div style="padding: 20px 20px 0; display: flex; flex-direction: column; gap: 10px;">




            <a href="<?php echo e(route('book-tour')); ?>"
               style="display:flex;align-items:center;justify-content:center;gap:8px;height:52px;border-radius:999px;background:transparent;color:#0077B6;font-family:'Sora',sans-serif;font-size:15px;font-weight:700;text-decoration:none;border:2px solid #0077B6;">
                <i class="fa-regular fa-calendar-check"></i> Book a Tour
            </a>
            <?php if(auth()->guard()->check()): ?>
                <?php
                    $mobilePortalUrl = match(true) {
                        auth()->user()->hasRole('super_admin') => route('admin.dashboard'),
                        auth()->user()->hasRole('admin')       => route('admin.dashboard'),
                        auth()->user()->hasRole('teacher')     => route('teacher.dashboard'),
                        auth()->user()->hasRole('child')       => route('child.dashboard'),
                        default                                => route('parent.dashboard'),
                    };
                ?>
                <a href="<?php echo e($mobilePortalUrl); ?>"
                   style="display:flex;align-items:center;justify-content:center;gap:8px;height:52px;border-radius:999px;background:#f0f9ff;color:#0077B6;font-family:'Sora',sans-serif;font-size:15px;font-weight:700;text-decoration:none;border:2px solid #bae6fd;">
                    <i class="fas fa-th-large"></i> My Portal
                </a>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>"
                   style="display:flex;align-items:center;justify-content:center;gap:8px;height:52px;border-radius:999px;background:#f0f9ff;color:#0077B6;font-family:'Sora',sans-serif;font-size:15px;font-weight:700;text-decoration:none;border:2px solid #bae6fd;">
                    <i class="fas fa-sign-in-alt"></i> Portal Login
                </a>
            <?php endif; ?>
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
            <p class="sidemenu-text sidemenu-text--footer text-center mb-0">Copyright © <?php echo e(date('Y')); ?> <a class="vs-theme-color" href="<?php echo e(route('home')); ?>">Peekaboo Daycare</a>. All rights reserved.</p>
        </div>
    </div>
</div>

<!--==============================
    Offcanvas Sidebar
============================== -->
<div class="sidemenu-wrapper">
    <div class="sidemenu-content">
        <div class="sidemenu-logo sidemenu-item">
            <a href="<?php echo e(route('home')); ?>"><img  src="<?php echo e(asset('assets/img/peekaboo/logo.png')); ?>" alt="Peekaboo Daycare" class="logo"></a>
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
                    <?php $__currentLoopData = ['gal-1-1', 'gal-1-2', 'gal-1-3', 'gal-1-4', 'gal-1-5', 'gal-1-6']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="gallery-thumb">
                        <img src="<?php echo e(asset('assets/img/gallery/' . $img . '.jpg')); ?>" alt="Gallery Image" class="w-100">
                        <a href="<?php echo e(asset('assets/img/gallery/' . $img . '.jpg')); ?>" class="popup-image gal-btn"><i class="fal fa-plus"></i></a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <div class="vs-header__logo position-relative" style="padding: 20px 0;">
                            <a href="<?php echo e(route('home')); ?>">
                                <div style="position: relative; display: inline-block;">
                                    <img style="height: 90px; transition: transform 0.4s ease;"
                                         src="<?php echo e(asset('assets/img/peekaboo/logo.png')); ?>"
                                         alt="Peekaboo Daycare"
                                         class="logo"
                                         onmouseover="this.style.transform='translateY(-8px)'"
                                         onmouseout="this.style.transform='translateY(0)'">

                                    <div class="pb-logo-dot" style="top: -10px; left: -15px; width: 25px; height: 25px; background: var(--color-warm); animation-duration: 3s;"></div>
                                    <div class="pb-logo-dot" style="top: 5px; right: -10px; width: 18px; height: 18px; background: var(--color-accent); animation-duration: 4s;"></div>
                                    <div class="pb-logo-dot" style="bottom: 0; left: 10px; width: 20px; height: 20px; background: var(--color-primary); animation-duration: 3.5s;"></div>
                                    <div class="pb-logo-dot" style="bottom: 15px; right: 5px; width: 15px; height: 15px; background: var(--color-warm); animation-duration: 4.5s;"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <nav class="main-menu d-none d-lg-block">
                            <ul>

                                <li><a class="vs-svg-assets <?php echo e(request()->routeIs('programs') || request()->routeIs('program.detail') ? 'active' : ''); ?>" href="<?php echo e(route('programs')); ?>" style="color: var(--color-text, #0E2A46)">Programs</a></li>
                                <li><a class="vs-svg-assets <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>" href="<?php echo e(route('about')); ?>" style="color: var(--color-text, #0E2A46)">About</a></li>
                                <li><a class="vs-svg-assets <?php echo e(request()->routeIs('fees') ? 'active' : ''); ?>" href="<?php echo e(route('fees')); ?>" style="color: var(--color-text, #0E2A46)">Fees</a></li>
                                <li><a class="vs-svg-assets <?php echo e(request()->routeIs('contact') ? 'active' : ''); ?>" href="<?php echo e(route('contact')); ?>" style="color: var(--color-text, #0E2A46)">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-auto">
                        <div class="vs-header__action">
                            <div class="d-none d-xl-inline-flex gap-2 align-items-center">
                                <a href="<?php echo e(route('book-tour')); ?>" class="pb-header-btn pb-header-btn--outline">Book a Tour</a>

                                <?php if(auth()->guard()->check()): ?>
                                    <?php
                                        $portalUrl = match(true) {
                                            auth()->user()->hasRole('super_admin') => route('admin.dashboard'),
                                            auth()->user()->hasRole('admin')       => route('admin.dashboard'),
                                            auth()->user()->hasRole('teacher')     => route('teacher.dashboard'),
                                            auth()->user()->hasRole('child')       => route('child.dashboard'),
                                            default                                => route('parent.dashboard'),
                                        };
                                    ?>
                                    <a href="<?php echo e($portalUrl); ?>" class="pb-header-btn pb-header-btn--portal">
                                        <i class="fas fa-th-large me-1" style="font-size:13px;"></i> Portal
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>" class="pb-header-btn pb-header-btn--portal">
                                        <i class="fas fa-sign-in-alt me-1" style="font-size:13px;"></i> Portal
                                    </a>
                                <?php endif; ?>
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

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }
        .pb-logo-dot {
            position: absolute;
            border-radius: 50%;
            animation: float ease-in-out infinite;
            opacity: 0.85;
        }

        /* ── Tighten header container ── */
        .vs-header .container--custom {
            --vs-main-container: 1280px;
        }

        /* ── Header CTA buttons ── */
        .pb-header-btn {
            display: inline-block;
            padding: 0 28px;
            height: 46px;
            line-height: 42px;
            border-radius: var(--radius-pill, 999px);
            font-family: var(--font-body, 'Sora', sans-serif);
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
            transition: all 0.3s;
            border: 2px solid transparent;
        }
        .pb-header-btn--primary {
            background: var(--color-primary, #0077B6);
            color: #fff;
            border-color: var(--color-primary, #0077B6);
        }
        .pb-header-btn--primary:hover {
            background: var(--color-primary-dk, #0c508e);
            border-color: var(--color-primary-dk, #0c508e);
            color: #fff;
            transform: translateY(-2px);
        }
        .pb-header-btn--outline {
            background: transparent;
            color: var(--color-text, #0E2A46);
            border-color: var(--color-primary, #0077B6);
        }
        .pb-header-btn--outline:hover {
            background: var(--color-primary, #0077B6);
            color: #fff;
            transform: translateY(-2px);
        }
        .pb-header-btn--portal {
            background: #f0f9ff;
            color: var(--color-primary, #0077B6);
            border-color: #bae6fd;
        }
        .pb-header-btn--portal:hover {
            background: var(--color-primary, #0077B6);
            color: #fff;
            border-color: var(--color-primary, #0077B6);
            transform: translateY(-2px);
        }
    </style>
</header>
<?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/partials/public-header.blade.php ENDPATH**/ ?>