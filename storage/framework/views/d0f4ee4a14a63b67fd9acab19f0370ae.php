<?php $__env->startSection('title', 'About Peekaboo Daycare — Trusted Preschool Parklands, Cape Town Since 2010'); ?>
<?php $__env->startSection('description', 'Established in 2010, Peekaboo Daycare in Parklands, Cape Town has been a trusted home away from home for 150+ families. CAPS-aligned, Christian values, qualified teachers. Meet our team.'); ?>
<?php $__env->startSection('keywords', 'about Peekaboo Daycare Parklands, trusted preschool Cape Town, CAPS daycare Cape Town, Christian preschool Parklands Cape Town, daycare established 2010, qualified teachers daycare Parklands'); ?>
<?php $__env->startSection('canonical', route('about')); ?>
<?php $__env->startSection('og_title', 'About Peekaboo Daycare — Trusted Preschool in Parklands, Cape Town Since 2010'); ?>
<?php $__env->startSection('og_description', 'For 15+ years Peekaboo Daycare has been a trusted partner for 150+ families in Parklands, Cape Town. CAPS curriculum, Christian values, qualified teachers.'); ?>

<?php $__env->startPush('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "AboutPage",
  "@id": "<?php echo e(route('about')); ?>#webpage",
  "url": "<?php echo e(route('about')); ?>",
  "name": "About Peekaboo Daycare — Trusted Preschool in Parklands, Cape Town Since 2010",
  "description": "Established in 2010, Peekaboo Daycare in Parklands, Cape Town has been a trusted home away from home for 150+ families.",
  "isPartOf": {"@id": "<?php echo e(url('/')); ?>/#website"},
  "about": {"@id": "<?php echo e(url('/')); ?>/#organization"},
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      {"@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo e(route('home')); ?>"},
      {"@type": "ListItem", "position": 2, "name": "About Us", "item": "<?php echo e(route('about')); ?>"}
    ]
  }
}
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<section class="pb-page-hero fix p-relative">
<style>
.pb-page-hero {
    background: var(--color-surface);
    padding: 80px 0 72px;
    overflow: hidden; position: relative;
}
.pb-page-hero__shape-1 {
    position: absolute; top: -60px; right: -80px; opacity: .3; z-index: 0;
    animation: itswing 4s ease-in-out infinite alternate;
    transform-origin: top right;
}
.pb-page-hero__shape-2 {
    position: absolute; bottom: -30px; left: -50px; opacity: .2; z-index: 0;
    animation: itswing 6s ease-in-out infinite alternate;
}
@keyframes itswing {
    0%   { transform: rotate(0deg); }
    100% { transform: rotate(6deg); }
}
.pb-page-hero__breadcrumb {
    list-style: none; padding: 0; margin: 0 0 20px;
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap;
    font-family: var(--font-body); font-size: 14px;
}
.pb-page-hero__breadcrumb li { color: var(--color-muted); }
.pb-page-hero__breadcrumb a { color: var(--color-primary); text-decoration: none; transition: color .25s; }
.pb-page-hero__breadcrumb a:hover { color: var(--color-primary-dk); }
.pb-page-hero__breadcrumb li + li::before { content: '/'; margin-right: 6px; color: var(--color-muted); }

/* Stat chips — right column */
.pb-about-hero-stats { display: flex; flex-direction: column; gap: 16px; padding-left: 20px; }
@media (max-width: 991px) { .pb-about-hero-stats { padding-left: 0; margin-top: 44px; flex-direction: row; flex-wrap: wrap; } }
.pb-about-hero-stat {
    display: flex; align-items: center; gap: 16px;
    background: #fff; border-radius: var(--radius-md);
    padding: 16px 24px; min-width: 240px;
    transition: transform .3s ease;
}
.pb-about-hero-stat:hover { transform: translateX(6px); }
.pb-about-hero-stat__icon {
    width: 52px; height: 52px; border-radius: 14px; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; color: #fff;
}
.pb-about-hero-stat__num  { font-family: var(--font-heading); font-size: 1.7rem; font-weight: 900; color: var(--color-text); line-height: 1; display: block; }
.pb-about-hero-stat__label { font-family: var(--font-body); font-size: 13px; color: var(--color-muted); }
</style>

    <div class="pb-page-hero__shape-1 d-none d-lg-block">
        <img src="<?php echo e(asset('assets/img/about/shape-4-4.png')); ?>" alt="" style="width:280px;">
    </div>
    <div class="pb-page-hero__shape-2 d-none d-lg-block">
        <img src="<?php echo e(asset('assets/img/hero/shape-2-3.png')); ?>" alt="" style="width:200px;">
    </div>

    <div class="container" style="position:relative;z-index:2;">
        <div class="row align-items-center">

            
            <div class="col-lg-6 wow itfadeLeft" data-wow-duration=".9s" data-wow-delay=".1s">
                <ul class="pb-page-hero__breadcrumb">
                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li>About Us</li>
                </ul>
                <span class="it-section-subtitle-5 orange" style="margin-bottom:18px;display:inline-flex;align-items:center;gap:8px;">
                    <i class="fa-light fa-book"></i> Established 2010
                </span>
                <h1 class="ed-slider-title" style="font-size:clamp(2.2rem,4.5vw,3.5rem);margin-bottom:22px;">
                    A Trusted Home<br><span style="color:var(--color-primary)">Away From Home</span>
                </h1>
                <div class="ed-hero-2-text mb-30">
                    <p>For <?php echo e(date('Y') - 2010); ?>+ years we've been more than just a daycare —  a trusted partner for families in Parklands, Cape Town, where every child is known, loved, and celebrated.</p>
                </div>
                <div class="ed-hero-2-button-wrapper">
                    <div class="ed-hero-2-button d-flex align-items-center flex-wrap">
                        <a class="ed-btn-radius" href="<?php echo e(route('book-tour')); ?>">Book a Tour</a>
                        <a class="ed-btn-radius ed-btn-radius--outline" href="<?php echo e(route('enrol.index')); ?>">
                            <i class="fa-solid fa-pen-to-square"></i> Enrol Now
                        </a>
                    </div>
                </div>
            </div>

            
            <div class="col-lg-6 wow itfadeRight" data-wow-duration=".9s" data-wow-delay=".3s">
                <div class="pb-about-hero-stats">
                    <div class="pb-about-hero-stat">
                        <span class="pb-about-hero-stat__icon" style="background:var(--color-primary)"><i class="fa-solid fa-calendar-check"></i></span>
                        <span>
                            <span class="pb-about-hero-stat__num"><?php echo e(date('Y') - 2010); ?>+ Years</span>
                            <span class="pb-about-hero-stat__label">of trusted early childhood care</span>
                        </span>
                    </div>
                    <div class="pb-about-hero-stat">
                        <span class="pb-about-hero-stat__icon" style="background:var(--color-warm)"><i class="fa-solid fa-heart"></i></span>
                        <span>
                            <span class="pb-about-hero-stat__num">150+ Families</span>
                            <span class="pb-about-hero-stat__label">who trust us every single day</span>
                        </span>
                    </div>
                    <div class="pb-about-hero-stat">
                        <span class="pb-about-hero-stat__icon" style="background:var(--color-accent)"><i class="fa-solid fa-chalkboard-user"></i></span>
                        <span>
                            <span class="pb-about-hero-stat__num">27 Staff</span>
                            <span class="pb-about-hero-stat__label">100% qualified & police-cleared</span>
                        </span>
                    </div>
                    <div class="pb-about-hero-stat">
                        <span class="pb-about-hero-stat__icon" style="background:var(--color-success)"><i class="fa-solid fa-star"></i></span>
                        <span>
                            <span class="pb-about-hero-stat__num">4.9 ★ Google</span>
                            <span class="pb-about-hero-stat__label">rated by real Peekaboo families</span>
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<div class="it-about-5-area fix ed-about-4-wrap p-relative pb-120" style="padding-top:110px;">

    <div class="it-about-5-shape-4 d-none d-md-block">
        <img src="<?php echo e(asset('assets/img/about/shape-5-4.png')); ?>" alt="">
    </div>
    <div class="it-about-5-shape-5 d-none d-xl-block">
        <img src="<?php echo e(asset('assets/img/about/shape-4-4.png')); ?>" alt="">
    </div>

    <div class="container">
        <div class="row align-items-center">

            
            <div class="col-xl-6 col-lg-6 wow itfadeLeft" data-wow-duration=".9s" data-wow-delay=".5s">
                <div class="ed-hero-thumb-wrap text-center text-md-end p-relative">
                    <div class="ed-hero-thumb-main p-relative">
                        <img src="<?php echo e(asset('assets/img/about/about-4-1.png')); ?>" alt="Children at Peekaboo Daycare">
                        <div class="ed-hero-thumb-shape-1 d-none d-md-block">
                            <img src="<?php echo e(asset('assets/img/about/shape-4-1.png')); ?>" alt="">
                        </div>
                    </div>
                    <div class="ed-hero-thumb-sm p-relative">
                        <img src="<?php echo e(asset('assets/img/about/about-4-2.png')); ?>" alt="Happy children at Peekaboo">
                        <div class="ed-hero-thumb-shape-1">
                            <img src="<?php echo e(asset('assets/img/about/shape-4-2.png')); ?>" alt="">
                        </div>
                    </div>
                    <div class="ed-hero-thumb-shape-2">
                        <img src="<?php echo e(asset('assets/img/about/shape-4-3.png')); ?>" alt="">
                    </div>
                    <div class="ed-hero-thumb-shape-3">
                        <img src="<?php echo e(asset('assets/img/hero/shape-1-2.png')); ?>" alt="">
                    </div>
                    <div class="ed-hero-thumb-shape-4">
                        <img src="<?php echo e(asset('assets/img/hero/shape-1-3.png')); ?>" alt="">
                    </div>
                    <div class="ed-hero-thumb-student d-none d-md-flex align-items-center">
                        <span><i><?php echo e(date('Y') - 2010); ?>+</i><br>Years of Care</span>
                        <img src="<?php echo e(asset('assets/img/hero/student.png')); ?>" alt="">
                    </div>
                </div>
            </div>

            
            <div class="col-xl-6 col-lg-6 wow itfadeRight" data-wow-duration=".9s" data-wow-delay=".7s">
                <div class="it-about-5-right">
                    <div class="it-about-5-title-box pb-10">
                        <span class="it-section-subtitle-5 orange">
                            <i class="fa-light fa-book"></i> Our Story
                        </span>
                        <h2 class="ed-section-title orange">
                            Founded with love. <br>Built on <span>trust.</span>
                        </h2>
                    </div>
                    <div class="it-about-5-text mb-30">
                        <p>Peekaboo Daycare & Preschool was founded in 2010 with a simple but powerful vision: to create a safe, nurturing environment where every child feels loved, valued, and inspired to learn. Over <?php echo e(date('Y') - 2010); ?> years on, that vision drives everything we do.</p>
                        <p style="margin-top:14px;">Nestled in the heart of Parklands, Cape Town, we welcome children from 3 months through to Grade R — guiding each one through the most formative years of their life with qualified educators, a warm Christian ethos, and a curriculum that celebrates every stage of development.</p>
                    </div>
                    <div class="it-about-5-content">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="it-about-5-list list-style-1 mb-20">
                                    <ul>
                                        <li><i class="fa-sharp fa-solid fa-circle-check"></i>Qualified Educators</li>
                                        <li><i class="fa-sharp fa-solid fa-circle-check"></i>Safety &amp; Security</li>
                                        <li><i class="fa-sharp fa-solid fa-circle-check"></i>Christian Values</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="it-about-5-list list-style-2 mb-20">
                                    <ul>
                                        <li><i class="fa-sharp fa-solid fa-circle-check"></i>Play-Based Learning</li>
                                        <li><i class="fa-sharp fa-solid fa-circle-check"></i>CAPS Aligned</li>
                                        <li><i class="fa-sharp fa-solid fa-circle-check"></i>Homelike Environment</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="it-feature-button">
                        <a class="ed-btn-radius" href="<?php echo e(route('book-tour')); ?>">Book a Tour</a>
                        <a class="ed-btn-radius ed-btn-radius--outline" href="<?php echo e(route('enrol.index')); ?>">
                            <i class="fa-solid fa-pen-to-square"></i> Enrol Now
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<div class="ed-funfact-area ed-funfact-wrap p-relative pb-90" style="padding-top:80px;">
    <div class="ed-funfact-shape-1 d-none d-xl-block">
        <img src="<?php echo e(asset('assets/img/about/shape-1-5.png')); ?>" alt="">
    </div>
    <div class="container container-3">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 mb-30 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".1s">
                <div class="it-funfact-item text-center border-style-1">
                    <div class="it-funfact-icon mb-30"><span><i class="flaticon-teacher"></i></span></div>
                    <div class="it-funfact-content">
                        <h6><i class="purecounter" data-purecounter-duration="1" data-purecounter-end="150">0</i>+</h6>
                        <span>Happy Families</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-30 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                <div class="it-funfact-item text-center border-style-1">
                    <div class="it-funfact-icon mb-30"><span><i class="flaticon-class"></i></span></div>
                    <div class="it-funfact-content">
                        <h6><i class="purecounter" data-purecounter-duration="1" data-purecounter-end="<?php echo e(date('Y') - 2010); ?>">0</i>+</h6>
                        <span>Years Experience</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-30 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
                <div class="it-funfact-item text-center border-style-1">
                    <div class="it-funfact-icon mb-30"><span><i class="flaticon-completed-task"></i></span></div>
                    <div class="it-funfact-content">
                        <h6><i class="purecounter" data-purecounter-duration="1" data-purecounter-end="27">0</i></h6>
                        <span>Staff Members</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-30 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
                <div class="it-funfact-item text-center">
                    <div class="it-funfact-icon mb-30"><span><i class="flaticon-customer-review"></i></span></div>
                    <div class="it-funfact-content">
                        <h6>4.9 ★</h6>
                        <span>Google Rating</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="pb-daily" style="background:var(--color-surface);padding:110px 0 100px;position:relative;overflow:hidden;">
<style>
.pb-daily__sub { font-family:var(--font-body);font-size:13px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--color-warm);display:block;margin-bottom:12px; }
.pb-daily__heading { font-family:var(--font-heading);font-size:clamp(30px,4vw,46px);font-weight:900;color:var(--color-text);line-height:1.1;margin-bottom:18px; }
.pb-daily__heading span { color:var(--color-primary); }
.pb-daily__lead { font-family:var(--font-body);color:var(--color-body);font-size:17px;line-height:1.75;max-width:620px;margin:0 auto; }
.pb-daily__card { background:#fff;border-radius:16px;overflow:hidden;transition:transform .35s ease,box-shadow .35s ease;height:100%;display:flex;flex-direction:column; }
.pb-daily__card:hover { transform:translateY(-6px); }
.pb-daily__thumb { position:relative;overflow:hidden;aspect-ratio:16/10; }
.pb-daily__thumb img { width:100%;height:100%;object-fit:cover;display:block;transition:transform .55s cubic-bezier(.22,.61,.36,1); }
.pb-daily__card:hover .pb-daily__thumb img { transform:scale(1.06); }
.pb-daily__time { position:absolute;top:14px;left:14px;background:var(--color-primary);color:#fff;font-family:var(--font-body);font-size:11px;font-weight:700;padding:5px 14px;border-radius:var(--radius-pill);letter-spacing:.3px;box-shadow:0 2px 10px rgba(0,119,182,.3); }
.pb-daily__body { padding:22px 24px 26px;flex:1;display:flex;flex-direction:column; }
.pb-daily__tag { font-family:var(--font-body);font-size:10px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:var(--color-warm);margin-bottom:8px;display:block; }
.pb-daily__title { font-family:var(--font-heading);font-size:20px;font-weight:800;color:var(--color-text);margin:0 0 8px;line-height:1.2; }
.pb-daily__desc { font-family:var(--font-body);font-size:14px;color:var(--color-body);line-height:1.7;margin:0;flex:1; }
</style>

    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center wow itfadeUp">
                <span class="pb-daily__sub">What Guides Us</span>
                <h2 class="pb-daily__heading">Our Core <span>Values</span></h2>
                <p class="pb-daily__lead">Everything at Peekaboo is rooted in these principles — shaping the care and culture your child experiences every single day.</p>
            </div>
        </div>

        <div class="row g-4 mt-2 wow itfadeUp" data-wow-delay=".1s">
            
            <div class="col-lg-3 col-md-6">
                <div class="pb-daily__card">
                    <div class="pb-daily__thumb">
                        <img src="<?php echo e(asset('assets/img/class/class-1-1.jpg')); ?>" alt="Love and belonging at Peekaboo" loading="lazy">
                        <span class="pb-daily__time" style="background:var(--color-primary)"><i class="fa-solid fa-heart"></i> Core Value</span>
                    </div>
                    <div class="pb-daily__body">
                        <span class="pb-daily__tag">Foundation</span>
                        <h4 class="pb-daily__title">Love &amp; Belonging</h4>
                        <p class="pb-daily__desc">Every child deserves to feel unconditionally loved. We create environments where children feel safe and secure to be exactly who they are.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="pb-daily__card">
                    <div class="pb-daily__thumb">
                        <img src="<?php echo e(asset('assets/img/choose/choose-2-1.jpg')); ?>" alt="Safety first at Peekaboo" loading="lazy">
                        <span class="pb-daily__time" style="background:var(--color-warm)"><i class="fa-solid fa-shield-halved"></i> Core Value</span>
                    </div>
                    <div class="pb-daily__body">
                        <span class="pb-daily__tag">Non-Negotiable</span>
                        <h4 class="pb-daily__title">Safety First</h4>
                        <p class="pb-daily__desc">CCTV monitoring, controlled access, thorough background checks, and first-aid trained staff — your child's safety is our highest priority.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="pb-daily__card">
                    <div class="pb-daily__thumb">
                        <img src="<?php echo e(asset('assets/img/class/class-details-big-image-1.jpg')); ?>" alt="Excellence in learning at Peekaboo" loading="lazy">
                        <span class="pb-daily__time" style="background:var(--color-accent)"><i class="fa-solid fa-book-open-reader"></i> Core Value</span>
                    </div>
                    <div class="pb-daily__body">
                        <span class="pb-daily__tag">Educational</span>
                        <h4 class="pb-daily__title">Excellence in Learning</h4>
                        <p class="pb-daily__desc">CAPS-aligned programmes, qualified teachers, and play-based pedagogy that builds genuine confidence and a lifelong love of learning.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="pb-daily__card">
                    <div class="pb-daily__thumb">
                        <img src="<?php echo e(asset('assets/img/about/thumb-4-1.jpg')); ?>" alt="Partnership with parents at Peekaboo" loading="lazy">
                        <span class="pb-daily__time" style="background:var(--color-success)"><i class="fa-solid fa-hands-holding-child"></i> Core Value</span>
                    </div>
                    <div class="pb-daily__body">
                        <span class="pb-daily__tag">Community</span>
                        <h4 class="pb-daily__title">Partnership with Parents</h4>
                        <p class="pb-daily__desc">Daily communication, parent portal access, and an open-door culture ensure you're always a full partner in your child's journey.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section id="teachers" class="pb-teachers">
<style>
#teachers {
    background-color: #fff;
    padding: 110px 0 100px;
    position: relative; overflow: hidden;
}
.pb-teachers__sub { font-family:var(--font-body);font-size:13px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--color-warm);display:block;margin-bottom:12px; }
.pb-teachers__heading { font-family:var(--font-heading);font-size:clamp(30px,4vw,46px);font-weight:900;color:var(--color-text);line-height:1.1;margin-bottom:20px; }
.pb-teachers__heading span { color:var(--color-primary); }
.pb-teachers__lead { font-family:var(--font-body);color:var(--color-body);font-size:17px;line-height:1.75;max-width:590px;margin:0 auto; }
.pb-teachers__shape { position:absolute;top:4%;right:-1%;z-index:0;animation:itswing-2 3s forwards infinite alternate;transform-origin:bottom right; }
@keyframes itswing-2 { 0% { transform:rotate(0deg); } 100% { transform:rotate(5deg); } }

/* Edunity team card */
.ed-team-item { padding:10px;border-radius:5px;background:#fff;box-shadow:0 0 30px 0 rgba(0,0,0,.06);transition:box-shadow .3s,transform .3s; }
.ed-team-item:hover { box-shadow:0 8px 40px 0 rgba(0,0,0,.12);transform:translateY(-4px); }
.ed-team-item:hover .ed-team-thumb img { transform:scale(1.08); }
.ed-team-thumb { border-radius:5px 5px 0 0;overflow:hidden; }
.ed-team-thumb img { border-radius:5px 5px 0 0;width:100%;transition:transform .5s ease; }
.ed-team-content { padding:20px 15px 15px; }
.ed-team-author-box { text-align:center; }
.ed-team-title { font-family:var(--font-heading);color:var(--color-text);font-weight:700;font-size:20px;margin-bottom:4px; }
.ed-team-author-box span { font-family:var(--font-body);color:var(--color-warm);font-size:14px; }
.ed-team-author-box .ed-team-quals { display:block;font-family:var(--font-body);color:var(--color-body);font-size:12px;margin-top:4px; }

/* Team marquee — exact home structure */
.t-team-header { display:flex;align-items:center;gap:18px;margin:72px 0 22px; }
.t-team-header::before,.t-team-header::after { content:'';flex:1;height:1px;background:linear-gradient(90deg,transparent,rgba(74,37,89,.2),transparent); }
.t-team-label { font-family:var(--font-body);font-size:18px;font-weight:600;color:var(--color-text);white-space:nowrap;letter-spacing:.5px; }
.t-marquee-wrap { overflow:hidden;position:relative;margin-bottom:12px; }
.t-marquee-wrap::before,.t-marquee-wrap::after { content:'';position:absolute;top:0;bottom:0;width:110px;z-index:2;pointer-events:none; }
.t-marquee-wrap::before { left:0;background:linear-gradient(to right,#fff,transparent); }
.t-marquee-wrap::after  { right:0;background:linear-gradient(to left,#fff,transparent); }
.t-marquee { display:flex;gap:22px;width:max-content;padding:10px 0; }
.t-marquee--fwd { animation:t-fwd 38s linear infinite; }
.t-marquee--rev { animation:t-rev 44s linear infinite; }
.t-marquee-wrap:hover .t-marquee { animation-play-state:paused; }
@keyframes t-fwd { from { transform:translateX(0); } to { transform:translateX(-50%); } }
@keyframes t-rev { from { transform:translateX(-50%); } to { transform:translateX(0); } }
.t-bubble { width:170px;height:170px;border-radius:50%;overflow:hidden;flex-shrink:0;border:5px solid #fff;box-shadow:0 6px 20px rgba(0,0,0,.13);transition:transform .28s ease,box-shadow .28s ease;cursor:pointer; }
.t-bubble:hover { transform:scale(1.10) translateY(-5px);box-shadow:0 14px 36px rgba(12,80,142,.26); }
.t-bubble img { width:100%;height:100%;object-fit:cover;display:block; }
.t-marquee--rev .t-bubble { width:150px;height:150px; }

/* Qualifications banner — exact home structure */
.t-qual { margin-top:60px;background:#fff;border-radius:20px;padding:36px 44px 36px 50px;position:relative;overflow:hidden;box-shadow:0 6px 32px rgba(12,80,142,.07);border:1px solid rgba(12,80,142,.08); }
.t-qual::before { content:'';position:absolute;left:0;top:0;bottom:0;width:6px;background:linear-gradient(to bottom,#0c508e 0%,#D18109 50%,#4A2559 100%);border-radius:20px 0 0 20px; }
.t-qual__title { font-family:var(--font-heading);font-size:20px;font-weight:800;color:var(--color-text);margin:0 0 10px; }
.t-qual__body { font-family:var(--font-body);font-size:16px;color:var(--color-body);line-height:1.72;margin:0; }
.t-stats { display:flex;align-items:center;justify-content:center;flex-wrap:wrap; }
.t-stat { text-align:center;padding:8px 22px; }
.t-stat__num { font-family:var(--font-heading);font-size:34px;font-weight:900;color:var(--color-primary);line-height:1;display:block;margin-bottom:4px; }
.t-stat__label { font-family:var(--font-body);font-size:10.5px;font-weight:700;letter-spacing:1.1px;text-transform:uppercase;color:var(--color-body);display:block; }
.t-stat-sep { width:1px;height:44px;background:rgba(12,80,142,.12);flex-shrink:0; }
@media(max-width:575px) { .t-bubble{width:120px;height:120px;} .t-marquee--rev .t-bubble{width:106px;height:106px;} .t-qual{padding:22px 18px 22px 28px;} .t-stat{padding:6px 14px;} .t-stat__num{font-size:26px;} .t-team-label{font-size:15px;} .t-team-header{margin-top:52px;} }
</style>

    <div class="pb-teachers__shape d-none d-md-block">
        <img src="<?php echo e(asset('assets/img/about/shape-4-4.png')); ?>" alt="">
    </div>

    <div class="container" style="position:relative;z-index:2;">

        <div class="row align-items-center mb-5 wow itfadeUp">
            <div class="col-xl-6">
                <span class="pb-teachers__sub">The Heart of Peekaboo</span>
                <h2 class="pb-teachers__heading">Meet Our <span>Dedicated</span> Teachers</h2>
                <p class="pb-teachers__lead">All our educators hold recognised ECD qualifications, undergo police clearance, and commit to ongoing professional development. Your child is in expert, caring hands.</p>
            </div>
        </div>

        
        <div class="ed-team-wrapper wow itfadeUp" data-wow-delay=".1s">
            <div class="swiper-container ed-team-active">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="ed-team-item">
                            <div class="ed-team-thumb fix">
                                <img src="<?php echo e(asset('assets/img/peekaboo_staff/1.png')); ?>" alt="Peekaboo Director">
                            </div>
                            <div class="ed-team-content">
                                <div class="ed-team-author-box">
                                    <h4 class="ed-team-title">Peekaboo Director</h4>
                                    <span>Director &amp; Principal</span>
                                    <span class="ed-team-quals">Founder · ECD Champion</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ed-team-item">
                            <div class="ed-team-thumb fix">
                                <img src="<?php echo e(asset('assets/img/peekaboo_staff/2.png')); ?>" alt="Peekaboo Management">
                            </div>
                            <div class="ed-team-content">
                                <div class="ed-team-author-box">
                                    <h4 class="ed-team-title">Peekaboo Management</h4>
                                    <span>Management</span>
                                    <span class="ed-team-quals">Leading with Heart &amp; Vision</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ed-team-item">
                            <div class="ed-team-thumb fix">
                                <img src="<?php echo e(asset('assets/img/peekaboo_staff/3.png')); ?>" alt="Peekaboo Management">
                            </div>
                            <div class="ed-team-content">
                                <div class="ed-team-author-box">
                                    <h4 class="ed-team-title">Peekaboo Management</h4>
                                    <span>Management</span>
                                    <span class="ed-team-quals">Operations &amp; Care Quality</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="wow itfadeUp" data-wow-delay=".2s">
            <div class="t-team-header">
                <span class="t-team-label">Meet the Rest of Our Wonderful Team</span>
            </div>
            <div class="t-marquee-wrap">
                <div class="t-marquee t-marquee--fwd">
                    <?php $__currentLoopData = range(4,15); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="t-bubble"><img src="<?php echo e(asset('assets/img/peekaboo_staff/'.$n.'.png')); ?>" alt="Peekaboo staff"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = range(4,15); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="t-bubble"><img src="<?php echo e(asset('assets/img/peekaboo_staff/'.$n.'.png')); ?>" alt="Peekaboo staff"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="t-marquee-wrap">
                <div class="t-marquee t-marquee--rev">
                    <?php $__currentLoopData = range(16,27); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="t-bubble"><img src="<?php echo e(asset('assets/img/peekaboo_staff/'.$n.'.png')); ?>" alt="Peekaboo staff"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = range(16,27); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="t-bubble"><img src="<?php echo e(asset('assets/img/peekaboo_staff/'.$n.'.png')); ?>" alt="Peekaboo staff"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        
        <div class="t-qual wow itfadeUp" data-wow-delay=".25s">
            <div class="row align-items-center gy-4">
                <div class="col-lg-7">
                    <h4 class="t-qual__title">Every Teacher is Qualified, Vetted &amp; Passionate</h4>
                    <p class="t-qual__body">All our educators hold recognised ECD qualifications, undergo police clearance checks, and commit to ongoing professional development. Your child's safety and growth are in expert, caring hands.</p>
                </div>
                <div class="col-lg-5">
                    <div class="t-stats">
                        <div class="t-stat"><span class="t-stat__num">100%</span><span class="t-stat__label">Qualified</span></div>
                        <div class="t-stat-sep"></div>
                        <div class="t-stat"><span class="t-stat__num">100%</span><span class="t-stat__label">Vetted</span></div>
                        <div class="t-stat-sep"></div>
                        <div class="t-stat"><span class="t-stat__num">10+</span><span class="t-stat__label">Avg. Years</span></div>
                        <div class="t-stat-sep"></div>
                        <div class="t-stat"><span class="t-stat__num">27</span><span class="t-stat__label">Staff Members</span></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>



<div class="it-testimonial-area ed-testimonial-style-2 ed-testimonial-style-3 pb-120 fix p-relative" style="padding-top:110px;background-color:#F0EDE8;">
    <div class="ed-testimonial-shape-1"><img src="<?php echo e(asset('assets/img/testimonial/shape-4-1.png')); ?>" alt=""></div>
    <div class="ed-testimonial-shape-2 d-none d-xxl-block"><img src="<?php echo e(asset('assets/img/testimonial/shape-5-3.png')); ?>" alt=""></div>
    <div class="container container-3">
        <div class="it-testimonial-title-wrap" style="margin-bottom:60px;">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="it-testimonial-title-box">
                        <span class="pb-daily__sub">What Parents Say</span>
                        <h4 class="ed-section-title">Real Words from <span>Real Families</span></h4>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ed-testimonial-nav">
                        <button class="ed-testimonial-prev"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M9.57031 5.92969L3.50031 11.9997L9.57031 18.0697" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M20.5 12H3.67" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
                        <button class="ed-testimonial-next"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M14.4297 5.92969L20.4997 11.9997L14.4297 18.0697" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.5 12H20.33" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row"><div class="col-xl-12">
            <div class="ed-testimonial-wrapper p-relative">
                <div class="swiper-container pb-about-testi">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><div class="ed-testimonial-item p-relative">
                            <div class="ed-testimonial-ratting"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                            <div class="ed-testimonial-text"><p>"Best Daycare and School in the area. They offer so much more than child care. Most of the staff have been on staff for over 10 years — low staff churn is always a good indicator of a well run business."</p></div>
                            <div class="ed-testimonial-author-box d-flex align-items-center">
                                <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#0077B6,#1a7fcf);">M</div>
                                <div><h5>Melissa Ingram</h5><span>Local Guide · 24 reviews</span></div>
                            </div>
                        </div></div>
                        <div class="swiper-slide"><div class="ed-testimonial-item p-relative">
                            <div class="ed-testimonial-ratting"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                            <div class="ed-testimonial-text"><p>"Peekaboo is more than a daycare — it's truly a family. Both my children have been there since they were 9 months old and the teachers and management have helped me navigate being a mom, through thick and thin."</p></div>
                            <div class="ed-testimonial-author-box d-flex align-items-center">
                                <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#D18109,#f5a623);">D</div>
                                <div><h5>Dominique Warr</h5><span>Local Guide · 6 reviews</span></div>
                            </div>
                        </div></div>
                        <div class="swiper-slide"><div class="ed-testimonial-item p-relative">
                            <div class="ed-testimonial-ratting"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                            <div class="ed-testimonial-text"><p>"The family vibe, friendly faces, and staff who've been together for YEARS is all a parent can ask for. Most days I get waved goodbye, tear-free. At times she even cries to stay — that says it all!"</p></div>
                            <div class="ed-testimonial-author-box d-flex align-items-center">
                                <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#70167E,#9c2aac);">K</div>
                                <div><h5>Kelly Fortune</h5><span>2 reviews</span></div>
                            </div>
                        </div></div>
                        <div class="swiper-slide"><div class="ed-testimonial-item p-relative">
                            <div class="ed-testimonial-ratting"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                            <div class="ed-testimonial-text"><p>"When my daughter started, the teachers went the extra mile helping us transition. They are always eager to answer any questions and are so sweet to the children. Raising children takes a village — this is my village."</p></div>
                            <div class="ed-testimonial-author-box d-flex align-items-center">
                                <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#0077B6,#70167E);">S</div>
                                <div><h5>Sandy Jenkins</h5><span>2 reviews</span></div>
                            </div>
                        </div></div>
                        <div class="swiper-slide"><div class="ed-testimonial-item p-relative">
                            <div class="ed-testimonial-ratting"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                            <div class="ed-testimonial-text"><p>"After an unfortunate experience elsewhere, we found Peekaboo — best decision we ever made. The classes are stunning and the playground is any child's dream. Honestly could not be happier!"</p></div>
                            <div class="ed-testimonial-author-box d-flex align-items-center">
                                <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#1a7fcf,#70167E);">A</div>
                                <div><h5>Anandi Piek</h5><span>Local Guide · 26 reviews</span></div>
                            </div>
                        </div></div>
                        <div class="swiper-slide"><div class="ed-testimonial-item p-relative">
                            <div class="ed-testimonial-ratting"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                            <div class="ed-testimonial-text"><p>"We couldn't have asked for a better daycare. It's affordable, welcoming, and the environment is warm and nurturing. The staff are truly incredible — caring, attentive, and professional."</p></div>
                            <div class="ed-testimonial-author-box d-flex align-items-center">
                                <div class="ed-testimonial-author ed-testimonial-initial mr-15" style="background:linear-gradient(135deg,#2E7D32,#0077B6);">P</div>
                                <div><h5>Prosper Tinarwo</h5><span>2 reviews · 1 photo</span></div>
                            </div>
                        </div></div>
                    </div>
                </div>
            </div>
        </div></div>
    </div>
</div>



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
@keyframes pulse-badge { 0%,100% { transform:scale(1); } 50% { transform:scale(1.05); } }
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
@media(max-width:991px) { .pb-cta__card{margin-top:50px;} .pb-cta__lead{max-width:100%;} }
@media(max-width:575px) { .pb-cta{padding:80px 0;} .pb-cta__card{padding:28px 22px;} .pb-cta__buttons{flex-direction:column;} .pb-cta__btn-primary,.pb-cta__btn-secondary{justify-content:center;width:100%;} }
</style>

    <div class="pb-cta__shape d-none d-lg-block">
        <img src="<?php echo e(asset('assets/img/about/shape-4-4.png')); ?>" alt="">
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
                    <a href="<?php echo e(route('book-tour')); ?>" class="pb-cta__btn-primary">
                        <i class="fa-regular fa-calendar-check"></i> Book a Tour
                    </a>
                    <a href="<?php echo e(route('enrol.index')); ?>" class="pb-cta__btn-secondary">
                        <i class="fa-solid fa-pen-to-square"></i> Enrol Now
                    </a>
                </div>
            </div>

            <div class="col-lg-5 offset-lg-1 wow itfadeUp" data-wow-delay="0.15s">
                <div class="pb-cta__card">
                    <span class="pb-cta__card-badge">Limited Spaces 2026</span>
                    <h3 class="pb-cta__card-title">Get in Touch With Us</h3>
                    <p class="pb-cta__card-desc">Have questions? Reach out anytime — our friendly team is ready to help you through the enrolment process.</p>
                    <div class="pb-cta__card-contacts">
                        <a href="tel:0215574999" class="pb-cta__card-contact">
                            <span class="pb-cta__card-contact-icon"><i class="fa-solid fa-phone"></i></span>
                            <span>
                                <span class="pb-cta__card-contact-label">Call Us</span>
                                <span class="pb-cta__card-contact-value">021 557 4999</span>
                            </span>
                        </a>
                        <a href="https://wa.me/27828989967?text=Hi!%20I'd%20like%20to%20enquire%20about%20Peekaboo%20Daycare." target="_blank" rel="noopener" class="pb-cta__card-contact">
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
                    <a href="<?php echo e(route('book-tour')); ?>" class="pb-cta__card-btn">
                        <i class="fa-regular fa-calendar-check"></i> Book a Tour
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── PureCounter — animates the funfact numbers ───────────────────
    if (typeof PureCounter !== 'undefined') {
        new PureCounter();
    }

    if (document.querySelector('.pb-about-testi')) {
        new Swiper('.pb-about-testi', {
            slidesPerView: 1, spaceBetween: 24, loop: true,
            autoplay: { delay: 5000, disableOnInteraction: false },
            navigation: { prevEl: '.ed-testimonial-prev', nextEl: '.ed-testimonial-next' },
            breakpoints: { 768: { slidesPerView: 2 }, 992: { slidesPerView: 3 } },
        });
    }
});
</script>
<?php $__env->stopPush(); ?>







<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/public/about.blade.php ENDPATH**/ ?>