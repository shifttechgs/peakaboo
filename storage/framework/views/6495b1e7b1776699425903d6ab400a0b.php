<footer class="pb-footer">
<style>
/* ============================================================
   FOOTER — Peekaboo (Premium On-brand)
============================================================ */
.pb-footer {
    background: var(--color-text);
    color: rgba(255,255,255,0.7);
    position: relative;
    overflow: hidden;
}

/* ── Main footer ── */
.pb-footer__main {
    padding: 70px 0 50px;
}
.pb-footer__logo {
    max-height: 70px;
    margin-bottom: 20px;
}
.pb-footer__desc {
    font-family: var(--font-body);
    font-size: 14px; line-height: 1.8;
    color: rgba(255,255,255,0.6);
    margin-bottom: 24px; max-width: 320px;
}
.pb-footer__social {
    display: flex; gap: 10px;
}
.pb-footer__social a {
    width: 40px; height: 40px;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
    color: rgba(255,255,255,0.65);
    display: flex; align-items: center; justify-content: center;
    font-size: 15px; text-decoration: none;
    transition: background 0.3s, color 0.3s, transform 0.3s;
}
.pb-footer__social a:hover {
    background: var(--color-primary);
    color: #fff;
    transform: translateY(-3px);
}

/* Widget titles */
.pb-footer__title {
    font-family: var(--font-heading);
    font-size: 18px; font-weight: 800;
    color: #fff;
    margin-bottom: 24px;
    position: relative;
    padding-bottom: 14px;
}
.pb-footer__title::after {
    content: '';
    position: absolute; bottom: 0; left: 0;
    width: 30px; height: 3px;
    background: var(--color-primary);
    border-radius: 2px;
}

/* Link lists */
.pb-footer__links {
    list-style: none; padding: 0; margin: 0;
}
.pb-footer__links li {
    margin-bottom: 12px;
}
.pb-footer__links a {
    font-family: var(--font-body);
    font-size: 14px;
    color: rgba(255,255,255,0.6);
    text-decoration: none;
    display: inline-flex; align-items: center; gap: 8px;
    transition: color 0.25s, gap 0.25s;
}
.pb-footer__links a::before {
    content: '';
    width: 6px; height: 6px;
    border-radius: 50%;
    background: rgba(255,255,255,0.2);
    flex-shrink: 0;
    transition: background 0.25s;
}
.pb-footer__links a:hover {
    color: #fff; gap: 12px;
}
.pb-footer__links a:hover::before {
    background: var(--color-primary);
}

/* Contact info in footer */
.pb-footer__contact-list {
    list-style: none; padding: 0; margin: 0;
}
.pb-footer__contact-item {
    display: flex; align-items: flex-start; gap: 14px;
    margin-bottom: 18px;
    font-family: var(--font-body);
    font-size: 14px; line-height: 1.6;
    color: rgba(255,255,255,0.6);
}
.pb-footer__contact-item i {
    color: #fff;
    font-size: 16px;
    margin-top: 3px;
    flex-shrink: 0;
    width: 18px; text-align: center;
}
.pb-footer__contact-item a {
    color: rgba(255,255,255,0.6);
    text-decoration: none;
    transition: color 0.25s;
}
.pb-footer__contact-item a:hover { color: #fff; }

/* Hours badge */
.pb-footer__hours {
    background: rgba(0,119,182,0.12);
    border: 1px solid rgba(0,119,182,0.2);
    border-radius: 12px;
    padding: 16px 20px;
    margin-top: 8px;
}
.pb-footer__hours-title {
    font-family: var(--font-body);
    font-size: 11px; font-weight: 700;
    text-transform: uppercase; letter-spacing: 1px;
    color: var(--color-primary);
    display: block; margin-bottom: 6px;
}
.pb-footer__hours-text {
    font-family: var(--font-body);
    font-size: 14px; font-weight: 600;
    color: rgba(255,255,255,0.85);
    margin: 0;
}

/* ── Bottom bar ── */
.pb-footer__bottom {
    border-top: 1px solid rgba(255,255,255,0.08);
    padding: 22px 0;
}
.pb-footer__copyright {
    font-family: var(--font-body);
    font-size: 13px;
    color: rgba(255,255,255,0.45);
    margin: 0;
}
.pb-footer__copyright a {
    color: rgba(255,255,255,0.65);
    text-decoration: none;
    transition: color 0.25s;
}
.pb-footer__copyright a:hover { color: #fff; }
.pb-footer__credit {
    font-family: var(--font-body);
    font-size: 13px;
    color: rgba(255,255,255,0.45);
    margin: 0;
}
.pb-footer__credit a {
    color: var(--color-primary);
    text-decoration: none;
    font-weight: 600;
    transition: color 0.25s;
}
.pb-footer__credit a:hover { color: #fff; }

/* ── Responsive ── */
@media(max-width: 991px) {
    .pb-footer__main { padding: 50px 0 30px; }
}
@media(max-width: 575px) {
    .pb-footer__desc { max-width: 100%; }
}
</style>

    <!-- Main Footer -->
    <div class="pb-footer__main">
        <div class="container">
            <div class="row gy-4">

                <!-- Col 1 — Logo + Desc + Social -->
                <div class="col-lg-4 col-md-6">
                    <a href="<?php echo e(route('home')); ?>">
                        <img src="<?php echo e(asset('assets/img/peekaboo/logo.png')); ?>" alt="Peekaboo Daycare" class="pb-footer__logo">
                    </a>
                    <p class="pb-footer__desc">A safe, loving space where little minds grow. Licensed daycare nurturing children from infancy to Grade R with qualified teachers and Christian values.</p>
                    <div class="pb-footer__social">
                        <a href="https://facebook.com/peekaboodaycare" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://wa.me/27828989967" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                        <a href="mailto:peekaboodaycare@telkomsa.net" aria-label="Email"><i class="fa-solid fa-envelope"></i></a>
                    </div>
                </div>

                <!-- Col 2 — Quick Links -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h4 class="pb-footer__title">Quick Links</h4>
                    <ul class="pb-footer__links">
                        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li><a href="<?php echo e(route('programs')); ?>">Programs</a></li>
                        <li><a href="<?php echo e(route('about')); ?>">About Us</a></li>
                        <li><a href="<?php echo e(route('fees')); ?>">Fees</a></li>
                        <li><a href="<?php echo e(route('faq')); ?>">FAQ</a></li>
                    </ul>
                </div>

                <!-- Col 3 — Get Started -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h4 class="pb-footer__title">Get Started</h4>
                    <ul class="pb-footer__links">
                        <li><a href="<?php echo e(route('enrol.index')); ?>">Enrol Now</a></li>
                        <li><a href="<?php echo e(route('book-tour')); ?>">Book a Tour</a></li>
                        <li><a href="<?php echo e(route('contact')); ?>">Contact Us</a></li>
                        <li><a href="<?php echo e(route('admin.dashboard')); ?>">Portal</a></li>
                    </ul>
                </div>

                <!-- Col 4 — Contact + Hours -->
                <div class="col-lg-4 col-md-6">
                    <h4 class="pb-footer__title">Contact Info</h4>
                    <ul class="pb-footer__contact-list">
                        <li class="pb-footer__contact-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>139B Humewood Drive, Parklands, 7441, Cape Town</span>
                        </li>
                        <li class="pb-footer__contact-item">
                            <i class="fa-solid fa-phone"></i>
                            <span><a href="tel:0215574999">021 557 4999</a> / <a href="tel:0828989967">082 898 9967</a></span>
                        </li>
                        <li class="pb-footer__contact-item">
                            <i class="fa-solid fa-envelope"></i>
                            <a href="mailto:peekaboodaycare@telkomsa.net">peekaboodaycare@telkomsa.net</a>
                        </li>
                    </ul>
                    <div class="pb-footer__hours">
                        <span class="pb-footer__hours-title">Operating Hours</span>
                        <p class="pb-footer__hours-text">Monday – Friday: 06:00 – 18:00</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="pb-footer__bottom">
        <div class="container">
            <div class="row gy-2 align-items-center justify-content-between">
                <div class="col-md-auto">
                    <p class="pb-footer__copyright">
                        &copy; <?php echo e(date('Y')); ?> <a href="<?php echo e(route('home')); ?>">Peekaboo Daycare &amp; Preschool</a>. All rights reserved.
                    </p>
                </div>
                <div class="col-md-auto">
                    <p class="pb-footer__credit">
                        Designed by <a href="https://shifttechgs.com/" target="_blank" rel="noopener">ShiftTech</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
<?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/partials/public-footer.blade.php ENDPATH**/ ?>