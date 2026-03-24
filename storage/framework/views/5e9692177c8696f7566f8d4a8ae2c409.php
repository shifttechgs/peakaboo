<?php $__env->startSection('title', 'Gallery — Peekaboo Daycare & Preschool Parklands, Cape Town'); ?>
<?php $__env->startSection('description', 'Take a peek inside Peekaboo Daycare in Parklands, Cape Town. See our bright classrooms, safe outdoor play areas, activities, and happy children learning every day.'); ?>
<?php $__env->startSection('keywords', 'daycare gallery Parklands, preschool photos Cape Town, Peekaboo Daycare classrooms, childcare facility Cape Town photos'); ?>
<?php $__env->startSection('canonical', route('gallery')); ?>
<?php $__env->startSection('og_title', 'Gallery — Peekaboo Daycare Parklands, Cape Town'); ?>
<?php $__env->startSection('og_description', 'Take a peek inside Peekaboo Daycare — bright classrooms, safe outdoor areas, activities and happy children in Parklands, Cape Town.'); ?>

<?php $__env->startPush('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ImageGallery",
  "@id": "<?php echo e(route('gallery')); ?>#webpage",
  "url": "<?php echo e(route('gallery')); ?>",
  "name": "Peekaboo Daycare Gallery — Parklands, Cape Town",
  "description": "Photos of Peekaboo Daycare & Preschool in Parklands, Cape Town — classrooms, outdoor areas, and learning activities.",
  "isPartOf": {"@id": "<?php echo e(url('/')); ?>/#website"},
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      {"@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo e(route('home')); ?>"},
      {"@type": "ListItem", "position": 2, "name": "Gallery", "item": "<?php echo e(route('gallery')); ?>"}
    ]
  }
}
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<style>
/* ============================================================
   GALLERY PAGE
============================================================ */
.pb-page-header {
    background: var(--color-surface); padding: 64px 0 56px;
}
.pb-page-header__title {
    font-family: var(--font-heading); font-size: clamp(2rem,4vw,3rem); font-weight: 800;
    color: var(--color-text); margin: 0 0 12px;
}
.pb-page-header__breadcrumb {
    list-style: none; padding: 0; margin: 0; display: flex; gap: 8px;
    font-family: var(--font-body); font-size: 16px; color: var(--color-muted);
}
.pb-page-header__breadcrumb a { color: var(--color-primary); text-decoration: none; }
.pb-page-header__breadcrumb li + li::before { content: '/'; margin-right: 8px; color: var(--color-muted); }

/* ── Gallery grid ── */
.pb-gallery-page { padding: 90px 0 100px; background: #fff; }

.pb-gallery__filter {
    display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin-bottom: 48px;
}
.pb-gallery__filter-btn {
    font-family: var(--font-body); font-size: 14px; font-weight: 700;
    padding: 10px 24px; border-radius: var(--radius-pill); border: 2px solid #e0e4e8;
    background: transparent; color: var(--color-body); cursor: pointer;
    transition: all 0.25s;
}
.pb-gallery__filter-btn.active,
.pb-gallery__filter-btn:hover {
    background: var(--color-primary); border-color: var(--color-primary); color: #fff;
}

.pb-gallery__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
}
@media(max-width: 991px) { .pb-gallery__grid { grid-template-columns: repeat(2, 1fr); } }
@media(max-width: 575px)  { .pb-gallery__grid { grid-template-columns: 1fr; } }

.pb-gallery__item {
    position: relative; border-radius: var(--radius-md); overflow: hidden;
    aspect-ratio: 4/3; cursor: pointer;
}
.pb-gallery__item--tall { aspect-ratio: 3/4; }
.pb-gallery__item--wide {
    grid-column: span 2;
    aspect-ratio: 16/9;
}
.pb-gallery__item img {
    width: 100%; height: 100%; object-fit: cover; display: block;
    transition: transform 0.55s ease;
}
.pb-gallery__item:hover img { transform: scale(1.06); }
.pb-gallery__item-overlay {
    position: absolute; inset: 0;
    background: rgba(14,42,70,0);
    display: flex; align-items: center; justify-content: center;
    transition: background 0.35s;
}
.pb-gallery__item:hover .pb-gallery__item-overlay { background: rgba(14,42,70,0.45); }
.pb-gallery__item-zoom {
    width: 52px; height: 52px; border-radius: 50%;
    background: rgba(255,255,255,0.15); backdrop-filter: blur(4px);
    border: 2px solid rgba(255,255,255,0.6);
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 20px;
    transform: scale(0.6); opacity: 0; transition: transform 0.3s, opacity 0.3s;
}
.pb-gallery__item:hover .pb-gallery__item-zoom { transform: scale(1); opacity: 1; }

.pb-gallery__caption {
    position: absolute; bottom: 0; left: 0; right: 0;
    background: linear-gradient(to top, rgba(14,42,70,0.85), transparent);
    padding: 32px 16px 14px;
    font-family: var(--font-body); font-size: 13px; font-weight: 600; color: #fff;
    transform: translateY(100%); transition: transform 0.35s;
}
.pb-gallery__item:hover .pb-gallery__caption { transform: translateY(0); }

/* ── CTA ── */
.pb-gallery-cta {
    background: var(--color-surface); padding: 80px 0; text-align: center;
}
.pb-gallery-cta__title {
    font-family: var(--font-heading); font-size: clamp(1.6rem,2.5vw,2.2rem); font-weight: 900;
    color: var(--color-text); margin-bottom: 14px;
}
.pb-gallery-cta__desc {
    font-family: var(--font-body); font-size: 17px; color: var(--color-body);
    max-width: 500px; margin: 0 auto 32px;
}
.pb-gallery-cta__btn {
    display: inline-flex; align-items: center; gap: 10px;
    font-family: var(--font-body); font-size: 15px; font-weight: 700;
    padding: 16px 40px; border-radius: var(--radius-pill); text-decoration: none;
    transition: all 0.3s; margin: 6px;
}
.pb-gallery-cta__btn--primary {
    background: var(--color-primary); color: #fff; border: 2px solid var(--color-primary);
}
.pb-gallery-cta__btn--primary:hover { background: var(--color-primary-dk); border-color: var(--color-primary-dk); color: #fff; transform: translateY(-2px); }
.pb-gallery-cta__btn--outline {
    background: transparent; color: var(--color-text); border: 2px solid var(--color-primary);
}
.pb-gallery-cta__btn--outline:hover { background: var(--color-primary); color: #fff; transform: translateY(-2px); }
</style>

<!-- Page Header -->
<div class="pb-page-header">
    <div class="container">
        <h1 class="pb-page-header__title">Our Gallery</h1>
        <ul class="pb-page-header__breadcrumb">
            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li>Gallery</li>
        </ul>
    </div>
</div>

<!-- Gallery -->
<section class="pb-gallery-page">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-7 mx-auto text-center wow itfadeUp">
                <span style="font-family:var(--font-body);font-size:13px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--color-warm);display:block;margin-bottom:10px;">Take a Peek Inside</span>
                <h2 style="font-family:var(--font-heading);font-size:clamp(1.8rem,3.5vw,2.8rem);font-weight:900;color:var(--color-text);margin-bottom:14px;">A <span style="color:var(--color-primary);">Picture</span> Says It All</h2>
                <p style="font-family:var(--font-body);font-size:17px;color:var(--color-body);line-height:1.8;">From cosy classrooms to outdoor adventures — get a feel for the warm, vibrant environment your child will thrive in.</p>
            </div>
        </div>

        <!-- Gallery Grid — using Magnific Popup for lightbox -->
        <div class="pb-gallery__grid wow itfadeUp">

            <div class="pb-gallery__item pb-gallery__item--wide">
                <a href="<?php echo e(asset('assets/img/gallery/gal-1-1.jpg')); ?>" class="popup-image">
                    <img src="<?php echo e(asset('assets/img/gallery/gal-1-1.jpg')); ?>" alt="Peekaboo Daycare classroom" loading="lazy">
                    <div class="pb-gallery__item-overlay">
                        <span class="pb-gallery__item-zoom"><i class="fal fa-plus"></i></span>
                    </div>
                    <span class="pb-gallery__caption">Our bright, welcoming classrooms</span>
                </a>
            </div>

            <div class="pb-gallery__item">
                <a href="<?php echo e(asset('assets/img/gallery/gal-1-2.jpg')); ?>" class="popup-image">
                    <img src="<?php echo e(asset('assets/img/gallery/gal-1-2.jpg')); ?>" alt="Children playing at Peekaboo" loading="lazy">
                    <div class="pb-gallery__item-overlay">
                        <span class="pb-gallery__item-zoom"><i class="fal fa-plus"></i></span>
                    </div>
                    <span class="pb-gallery__caption">Outdoor play time</span>
                </a>
            </div>

            <div class="pb-gallery__item">
                <a href="<?php echo e(asset('assets/img/gallery/gal-1-3.jpg')); ?>" class="popup-image">
                    <img src="<?php echo e(asset('assets/img/gallery/gal-1-3.jpg')); ?>" alt="Learning at Peekaboo" loading="lazy">
                    <div class="pb-gallery__item-overlay">
                        <span class="pb-gallery__item-zoom"><i class="fal fa-plus"></i></span>
                    </div>
                    <span class="pb-gallery__caption">Creative arts & crafts</span>
                </a>
            </div>

            <div class="pb-gallery__item">
                <a href="<?php echo e(asset('assets/img/gallery/gal-1-4.jpg')); ?>" class="popup-image">
                    <img src="<?php echo e(asset('assets/img/gallery/gal-1-4.jpg')); ?>" alt="Toddlers at Peekaboo" loading="lazy">
                    <div class="pb-gallery__item-overlay">
                        <span class="pb-gallery__item-zoom"><i class="fal fa-plus"></i></span>
                    </div>
                    <span class="pb-gallery__caption">Toddler exploration</span>
                </a>
            </div>

            <div class="pb-gallery__item">
                <a href="<?php echo e(asset('assets/img/gallery/gal-1-5.jpg')); ?>" class="popup-image">
                    <img src="<?php echo e(asset('assets/img/gallery/gal-1-5.jpg')); ?>" alt="Preschool activities" loading="lazy">
                    <div class="pb-gallery__item-overlay">
                        <span class="pb-gallery__item-zoom"><i class="fal fa-plus"></i></span>
                    </div>
                    <span class="pb-gallery__caption">Preschool learning time</span>
                </a>
            </div>

            <div class="pb-gallery__item">
                <a href="<?php echo e(asset('assets/img/gallery/gal-1-6.jpg')); ?>" class="popup-image">
                    <img src="<?php echo e(asset('assets/img/gallery/gal-1-6.jpg')); ?>" alt="Grade R at Peekaboo" loading="lazy">
                    <div class="pb-gallery__item-overlay">
                        <span class="pb-gallery__item-zoom"><i class="fal fa-plus"></i></span>
                    </div>
                    <span class="pb-gallery__caption">Grade R school readiness</span>
                </a>
            </div>

            <div class="pb-gallery__item">
                <a href="<?php echo e(asset('assets/img/gallery/gal-1-1.jpg')); ?>" class="popup-image">
                    <img src="<?php echo e(asset('assets/img/gallery/gal-1-2.jpg')); ?>" alt="Peekaboo Daycare environment" loading="lazy">
                    <div class="pb-gallery__item-overlay">
                        <span class="pb-gallery__item-zoom"><i class="fal fa-plus"></i></span>
                    </div>
                    <span class="pb-gallery__caption">Safe, secure environment</span>
                </a>
            </div>

            <div class="pb-gallery__item pb-gallery__item--wide">
                <a href="<?php echo e(asset('assets/img/gallery/gal-1-3.jpg')); ?>" class="popup-image">
                    <img src="<?php echo e(asset('assets/img/gallery/gal-1-5.jpg')); ?>" alt="Happy children at Peekaboo" loading="lazy">
                    <div class="pb-gallery__item-overlay">
                        <span class="pb-gallery__item-zoom"><i class="fal fa-plus"></i></span>
                    </div>
                    <span class="pb-gallery__caption">Happy, growing children every day</span>
                </a>
            </div>

            <div class="pb-gallery__item">
                <a href="<?php echo e(asset('assets/img/gallery/gal-1-6.jpg')); ?>" class="popup-image">
                    <img src="<?php echo e(asset('assets/img/gallery/gal-1-4.jpg')); ?>" alt="Healthy meals at Peekaboo" loading="lazy">
                    <div class="pb-gallery__item-overlay">
                        <span class="pb-gallery__item-zoom"><i class="fal fa-plus"></i></span>
                    </div>
                    <span class="pb-gallery__caption">Nutritious meals daily</span>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="pb-gallery-cta">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 wow itfadeUp">
                <h2 class="pb-gallery-cta__title">Love What You See?</h2>
                <p class="pb-gallery-cta__desc">Come experience Peekaboo in person — book a free tour and let your child see their new home.</p>
                <div>
                    <a href="<?php echo e(route('book-tour')); ?>" class="pb-gallery-cta__btn pb-gallery-cta__btn--primary">
                        <i class="fa-regular fa-calendar-check"></i> Book a Free Tour
                    </a>
                    <a href="<?php echo e(route('enrol.index')); ?>" class="pb-gallery-cta__btn pb-gallery-cta__btn--outline">
                        <i class="fa-solid fa-pen-to-square"></i> Enrol Now
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
    if (typeof $.fn.magnificPopup !== 'undefined') {
        $('.popup-image').magnificPopup({
            type: 'image',
            gallery: { enabled: true },
            image: { titleSrc: 'title' },
            closeBtnInside: false,
            fixedContentPos: true
        });
    }
});
</script>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/public/gallery.blade.php ENDPATH**/ ?>