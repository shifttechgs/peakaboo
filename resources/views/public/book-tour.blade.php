@extends('layouts.public')

@section('title', 'Book a School Tour — Peekaboo Daycare Parklands, Cape Town')
@section('description', 'Book a free tour at Peekaboo Daycare in Parklands, Cape Town. Visit our facilities, meet our qualified teachers, and see our CAPS-aligned programmes in action. Tours available weekdays.')
@section('keywords', 'book daycare tour Parklands Cape Town, visit preschool Cape Town, school tour Peekaboo Daycare, childcare tour Cape Town northside, book tour preschool Parklands')
@section('canonical', route('book-tour'))
@section('og_title', 'Book a Free School Tour — Peekaboo Daycare Parklands, Cape Town')
@section('og_description', 'Visit Peekaboo Daycare in Parklands, Cape Town. Tour our facilities, meet teachers, see our CAPS programmes. Book your free tour today.')

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "WebPage",
  "@@id": "{{ route('book-tour') }}#webpage",
  "url": "{{ route('book-tour') }}",
  "name": "Book a School Tour — Peekaboo Daycare Parklands, Cape Town",
  "description": "Book a free tour at Peekaboo Daycare in Parklands, Cape Town.",
  "isPartOf": {"@@id": "{{ url('/') }}/#website"},
  "breadcrumb": {
    "@@type": "BreadcrumbList",
    "itemListElement": [
      {"@@type": "ListItem", "position": 1, "name": "Home", "item": "{{ route('home') }}"},
      {"@@type": "ListItem", "position": 2, "name": "Book a Tour", "item": "{{ route('book-tour') }}"}
    ]
  }
}
</script>
@endpush

@section('content')
<style>
/* ============================================================
   BOOK A TOUR — High-Converting Landing Page
============================================================ */

/* ── Hero ── */
.pb-tour-hero {
    background: var(--color-surface);
    padding: 72px 0 80px;
    position: relative;
    overflow: hidden;
}
.pb-tour-hero__breadcrumb {
    list-style: none;
    padding: 0;
    margin: 0 0 24px;
    display: flex;
    gap: 8px;
    font-family: var(--font-body);
    font-size: 16px;
    color: var(--color-muted);
}
.pb-tour-hero__breadcrumb a {
    color: var(--color-primary);
    text-decoration: none;
}
.pb-tour-hero__breadcrumb li + li::before {
    content: '/';
    margin-right: 8px;
    color: var(--color-muted);
}
.pb-tour-hero__badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: var(--font-body);
    font-size: 13px;
    font-weight: 700;
    color: var(--color-warm);
    background: var(--color-warm-lt);
    padding: 8px 18px;
    border-radius: var(--radius-pill);
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 1px;
}
.pb-tour-hero__title {
    font-family: var(--font-heading);
    font-size: clamp(2.2rem, 4vw, 3.5rem);
    font-weight: 800;
    color: var(--color-text);
    margin: 0 0 20px;
    line-height: 1.12;
}
.pb-tour-hero__title span {
    color: var(--color-primary);
}
.pb-tour-hero__desc {
    font-family: var(--font-body);
    font-size: 17px;
    color: var(--color-body);
    line-height: 1.75;
    max-width: 540px;
    margin-bottom: 40px;
}
.pb-tour-hero__stats {
    display: flex;
    flex-wrap: wrap;
    gap: 32px;
}
.pb-tour-hero__stat {
    display: flex;
    align-items: center;
    gap: 12px;
}
.pb-tour-hero__stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.pb-tour-hero__stat-icon i {
    font-size: 18px;
    color: var(--color-primary);
}
.pb-tour-hero__stat-number {
    font-family: var(--font-heading);
    font-size: 22px;
    font-weight: 800;
    color: var(--color-text);
    display: block;
    line-height: 1.1;
}
.pb-tour-hero__stat-label {
    font-family: var(--font-body);
    font-size: 13px;
    color: var(--color-muted);
    display: block;
}
/* Hero image */
.pb-tour-hero__img-wrap {
    position: relative;
}
.pb-tour-hero__img {
    width: 100%;
    border-radius: var(--radius-lg);
    object-fit: cover;
    aspect-ratio: 4/3;
}
.pb-tour-hero__img-badge {
    position: absolute;
    bottom: -16px;
    left: 24px;
    background: #fff;
    border-radius: var(--radius-md);
    padding: 16px 22px;
    display: flex;
    align-items: center;
    gap: 12px;
    animation: floatBadge 3s ease-in-out infinite alternate;
}
@@keyframes floatBadge {
    from { transform: translateY(0); }
    to   { transform: translateY(-8px); }
}
.pb-tour-hero__img-badge-number {
    font-family: var(--font-heading);
    font-size: 1.6rem;
    font-weight: 800;
    color: var(--color-primary);
    line-height: 1;
}
.pb-tour-hero__img-badge-text {
    font-family: var(--font-body);
    font-size: 12px;
    font-weight: 600;
    color: var(--color-muted);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    line-height: 1.3;
}

/* ── Form Section ── */
.pb-tour {
    padding: 100px 0 80px;
}

/* Form card */
.pb-tour-form {
    background: var(--color-surface);
    border-radius: var(--radius-lg);
    padding: 48px;
}
.pb-tour-form__header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 32px;
}
.pb-tour-form__title {
    font-family: var(--font-heading);
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--color-text);
    margin: 0;
}
.pb-tour-form__free {
    font-family: var(--font-body);
    font-size: 13px;
    font-weight: 700;
    color: var(--color-success);
    background: rgba(46,125,50,0.08);
    padding: 6px 16px;
    border-radius: var(--radius-pill);
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.pb-tour-form .form-label {
    font-family: var(--font-body);
    font-size: 15px;
    font-weight: 600;
    color: var(--color-text);
    margin-bottom: 8px;
    display: block;
}
.pb-tour-form .form-control,
.pb-tour-form .form-select {
    font-family: var(--font-body);
    font-size: 16px;
    border: 1px solid #e0e4e8;
    border-radius: var(--radius-sm);
    padding: 14px 18px;
    height: auto;
    background: #fff;
    color: var(--color-text);
    transition: border-color 0.25s;
    width: 100%;
}
.pb-tour-form .form-control:focus,
.pb-tour-form .form-select:focus {
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(0,119,182,0.08);
    outline: none;
}
.pb-tour-form .form-control::placeholder {
    color: var(--color-muted);
    font-size: 15px;
}
.pb-tour-form textarea.form-control {
    min-height: 120px;
}
.pb-tour-form .text-danger {
    color: var(--color-error) !important;
}

/* ── Date Picker ── */
.pb-date-picker {
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.pb-date-picker__nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 4px;
}
.pb-date-picker__month {
    font-family: var(--font-heading);
    font-size: 15px;
    font-weight: 800;
    color: var(--color-text);
    letter-spacing: 0.3px;
}
.pb-date-picker__arrow {
    width: 30px;
    height: 30px;
    border: 1px solid #e0e4e8;
    border-radius: 50%;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: border-color 0.2s, background 0.2s;
    color: var(--color-muted);
    font-size: 12px;
}
.pb-date-picker__arrow:hover {
    border-color: var(--color-primary);
    color: var(--color-primary);
    background: rgba(0,119,182,0.04);
}
.pb-date-picker__grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
}
.pb-date-picker__day-header {
    font-family: var(--font-body);
    font-size: 10px;
    font-weight: 700;
    color: var(--color-muted);
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 4px 0;
}
.pb-date-picker__day {
    aspect-ratio: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    font-family: var(--font-body);
    font-size: 13px;
    font-weight: 600;
    color: var(--color-text);
    cursor: pointer;
    border: 1px solid transparent;
    background: transparent;
    transition: background 0.15s, border-color 0.15s, color 0.15s;
    line-height: 1;
    padding: 0;
    min-height: 34px;
}
.pb-date-picker__day:hover:not(.pb-date-picker__day--disabled):not(.pb-date-picker__day--empty) {
    background: rgba(0,119,182,0.06);
    border-color: var(--color-primary);
    color: var(--color-primary);
}
.pb-date-picker__day--selected {
    background: var(--color-primary) !important;
    border-color: var(--color-primary) !important;
    color: #fff !important;
    font-weight: 700;
}
.pb-date-picker__day--today:not(.pb-date-picker__day--selected) {
    border-color: var(--color-primary);
    color: var(--color-primary);
}
.pb-date-picker__day--disabled {
    color: #d0d5dd;
    cursor: not-allowed;
    background: transparent;
}
.pb-date-picker__day--empty {
    cursor: default;
}
.pb-date-picker__day--weekend:not(.pb-date-picker__day--disabled) {
    color: #ccc;
    cursor: not-allowed;
}

/* Time slot cards */
.pb-time-slot {
    border: 1px solid #e0e4e8;
    border-radius: var(--radius-md);
    padding: 14px 16px;
    cursor: pointer;
    background: #fff;
    transition: border-color 0.25s, background 0.25s;
    display: flex;
    align-items: center;
    gap: 12px;
    height: 100%;
}
.pb-time-slot:hover {
    border-color: var(--color-primary);
}
.pb-time-slot:has(input:checked) {
    border-color: var(--color-primary);
    background: rgba(0,119,182,0.04);
}
.pb-time-slot input[type="radio"] {
    width: 18px;
    height: 18px;
    border: 2px solid #d0d5dd;
    cursor: pointer;
    accent-color: var(--color-primary);
    flex-shrink: 0;
}
.pb-time-slot__label {
    font-family: var(--font-body);
    font-size: 15px;
    font-weight: 700;
    color: var(--color-text);
    display: block;
    cursor: pointer;
}
.pb-time-slot__time {
    font-family: var(--font-body);
    font-size: 13px;
    color: var(--color-muted);
    display: block;
    margin-top: 1px;
}

/* Submit button */
.pb-tour-form__btn {
    font-family: var(--font-body);
    font-size: 16px;
    font-weight: 700;
    background: var(--color-primary);
    color: #fff;
    border: none;
    border-radius: var(--radius-pill);
    padding: 18px 48px;
    cursor: pointer;
    transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    width: 100%;
    justify-content: center;
    box-shadow: 0 4px 18px rgba(0,119,182,0.25);
}
.pb-tour-form__btn:hover {
    background: var(--color-primary-dk);
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(0,119,182,0.35);
}
.pb-tour-form__note {
    font-family: var(--font-body);
    font-size: 13px;
    color: var(--color-muted);
    text-align: center;
    margin: 14px 0 0;
}
.pb-tour-form__note i {
    color: var(--color-success);
    margin-right: 4px;
}

/* ── Sidebar ── */
.pb-tour-sidebar {
    position: sticky;
    top: 120px;
}
.pb-tour-sidebar__card {
    background: var(--color-surface);
    border-radius: var(--radius-lg);
    padding: 40px 36px;
    margin-bottom: 24px;
}
.pb-tour-sidebar__title {
    font-family: var(--font-heading);
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--color-text);
    margin-bottom: 24px;
}

/* What to expect list */
.pb-tour-sidebar__list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.pb-tour-sidebar__list li {
    font-family: var(--font-body);
    font-size: 15px;
    color: var(--color-body);
    padding: 10px 0;
    display: flex;
    align-items: flex-start;
    gap: 12px;
    border-bottom: 1px solid rgba(0,0,0,0.04);
}
.pb-tour-sidebar__list li:last-child { border-bottom: none; }
.pb-tour-sidebar__list li i {
    color: var(--color-primary);
    font-size: 14px;
    width: 20px;
    text-align: center;
    flex-shrink: 0;
    margin-top: 3px;
}

/* Social proof card */
.pb-tour-proof {
    background: var(--color-surface);
    border-radius: var(--radius-lg);
    padding: 40px 36px;
    margin-bottom: 24px;
    text-align: center;
}
.pb-tour-proof__stars {
    color: #FC9F0B;
    font-size: 18px;
    letter-spacing: 2px;
    margin-bottom: 14px;
}
.pb-tour-proof__quote {
    font-family: var(--font-body);
    font-size: 15px;
    font-style: italic;
    color: var(--color-body);
    line-height: 1.7;
    margin-bottom: 16px;
}
.pb-tour-proof__author {
    font-family: var(--font-body);
    font-size: 13px;
    font-weight: 700;
    color: var(--color-text);
}
.pb-tour-proof__source {
    font-family: var(--font-body);
    font-size: 12px;
    color: var(--color-muted);
}

/* Process steps */
.pb-tour-process {
    background: var(--color-surface);
    border-radius: var(--radius-lg);
    padding: 40px 36px;
    margin-bottom: 24px;
}
.pb-tour-process__title {
    font-family: var(--font-heading);
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--color-text);
    margin-bottom: 24px;
}
.pb-tour-process__step {
    display: flex;
    gap: 14px;
    margin-bottom: 16px;
}
.pb-tour-process__step:last-child { margin-bottom: 0; }
.pb-tour-process__number {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: var(--color-primary);
    color: #fff;
    font-family: var(--font-heading);
    font-size: 13px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.pb-tour-process__text {
    font-family: var(--font-body);
    font-size: 14px;
    color: var(--color-body);
    line-height: 1.5;
    padding-top: 4px;
}
.pb-tour-process__text strong {
    color: var(--color-text);
    display: block;
    font-size: 15px;
}

/* Help card */
.pb-tour-help {
    background: var(--color-text);
    border-radius: var(--radius-lg);
    padding: 40px 36px;
    text-align: center;
}
.pb-tour-help__title {
    font-family: var(--font-heading);
    font-size: 1.5rem;
    font-weight: 800;
    color: #fff;
    margin-bottom: 10px;
}
.pb-tour-help__desc {
    font-family: var(--font-body);
    font-size: 15px;
    color: rgba(255,255,255,0.6);
    line-height: 1.7;
    margin-bottom: 24px;
}
.pb-tour-help__btn {
    display: block;
    width: 100%;
    font-family: var(--font-body);
    font-size: 15px;
    font-weight: 600;
    padding: 14px;
    border-radius: var(--radius-pill);
    text-decoration: none;
    text-align: center;
    transition: background 0.3s;
    margin-bottom: 12px;
}
.pb-tour-help__btn:last-child { margin-bottom: 0; }
.pb-tour-help__btn--phone {
    background: var(--color-primary);
    color: #fff;
}
.pb-tour-help__btn--phone:hover {
    background: var(--color-primary-dk);
    color: #fff;
}
.pb-tour-help__btn--whatsapp {
    background: var(--color-whatsapp);
    color: #fff;
}
.pb-tour-help__btn--whatsapp:hover {
    background: #1ebd5a;
    color: #fff;
}

/* ── Alerts ── */
.pb-tour .alert {
    border-radius: var(--radius-md);
    border: none;
    padding: 16px 20px;
    font-family: var(--font-body);
    font-size: 15px;
    font-weight: 500;
    margin-bottom: 24px;
}
.pb-tour .alert-danger {
    background: rgba(220,53,69,0.08);
    border-left: 4px solid var(--color-error);
    color: var(--color-error);
}

/* ── Confirmation Modal ── */
.pb-modal .modal-content {
    border: none;
    border-radius: var(--radius-lg);
    overflow: hidden;
}
.pb-modal__header {
    background: var(--color-text);
    padding: 40px 36px 32px;
    text-align: center;
}
.pb-modal__icon {
    width: 56px;
    height: 56px;
    background: var(--color-warm);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 18px;
}
.pb-modal__icon i {
    color: #fff;
    font-size: 1.3rem;
}
.pb-modal__title {
    font-family: var(--font-heading);
    color: #fff;
    font-weight: 800;
    font-size: 1.5rem;
    margin: 0 0 8px;
}
.pb-modal__subtitle {
    font-family: var(--font-body);
    color: rgba(255,255,255,0.6);
    font-size: 15px;
    margin: 0;
}
.pb-modal__body {
    background: #fff;
    padding: 32px 36px 36px;
}
.pb-modal__ref {
    background: var(--color-text);
    border-radius: var(--radius-md);
    padding: 18px 24px;
    text-align: center;
    margin-bottom: 28px;
}
.pb-modal__ref-label {
    font-family: var(--font-body);
    font-size: 11px;
    font-weight: 700;
    color: rgba(255,255,255,0.5);
    text-transform: uppercase;
    letter-spacing: 1.5px;
    display: block;
    margin-bottom: 6px;
}
.pb-modal__ref-code {
    font-family: 'Courier New', monospace;
    font-size: 1.6rem;
    font-weight: 700;
    color: var(--color-warm);
    letter-spacing: 3px;
}
.pb-modal__steps {
    margin-bottom: 28px;
}
.pb-modal__step {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 11px 0;
    border-bottom: 1px solid #f0f1f3;
}
.pb-modal__step:last-child { border-bottom: none; }
.pb-modal__step-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--color-warm);
    flex-shrink: 0;
}
.pb-modal__step-text {
    font-family: var(--font-body);
    font-size: 15px;
    color: var(--color-body);
}
.pb-modal__btn {
    width: 100%;
    padding: 16px;
    border: none;
    border-radius: var(--radius-pill);
    background: var(--color-primary);
    color: #fff;
    font-family: var(--font-body);
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.3s;
}
.pb-modal__btn:hover {
    background: var(--color-primary-dk);
}

/* ── Responsive ── */
@media (max-width: 991px) {
    .pb-tour-hero { padding: 56px 0 48px; }
    .pb-tour { padding: 70px 0 50px; }
    .pb-tour-form { padding: 36px 28px; }
    .pb-tour-sidebar { position: static; }
}
@media (max-width: 575px) {
    .pb-tour-hero__stats { gap: 20px; }
    .pb-tour-form { padding: 28px 20px; }
    .pb-tour-sidebar__card,
    .pb-tour-proof,
    .pb-tour-process,
    .pb-tour-help { padding: 32px 24px; }
}
@media (max-width: 768px) {
    .pb-tour-form .form-control,
    .pb-tour-form .form-select {
        font-size: 16px;
    }
}
</style>

    <!-- Hero — Sell the Visit -->
    <div class="pb-tour-hero">
        <div class="container">
            <ul class="pb-tour-hero__breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Book a Tour</li>
            </ul>
            <div class="row align-items-center gy-4">
                <div class="col-lg-7 wow itfadeUp" data-wow-duration=".9s">
                    <span class="pb-tour-hero__badge">
                        <i class="fa-solid fa-calendar-check"></i> Free — No Obligation
                    </span>
                    <h1 class="pb-tour-hero__title">See Why Families <span>Choose Peekaboo</span></h1>
                    <p class="pb-tour-hero__desc">Walk through our classrooms, meet the teachers who'll care for your child, and experience the Peekaboo difference first-hand. Most parents enrol within a week of visiting.</p>

                    <div class="pb-tour-hero__stats">
                        <div class="pb-tour-hero__stat">
                            <div class="pb-tour-hero__stat-icon">
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div>
                                <span class="pb-tour-hero__stat-number">4.9/5</span>
                                <span class="pb-tour-hero__stat-label">Google Rating</span>
                            </div>
                        </div>
                        <div class="pb-tour-hero__stat">
                            <div class="pb-tour-hero__stat-icon">
                                <i class="fa-solid fa-heart"></i>
                            </div>
                            <div>
                                <span class="pb-tour-hero__stat-number">{{ date('Y') - 2010 }}+</span>
                                <span class="pb-tour-hero__stat-label">Years of Care</span>
                            </div>
                        </div>
                        <div class="pb-tour-hero__stat">
                            <div class="pb-tour-hero__stat-icon">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div>
                                <span class="pb-tour-hero__stat-number">150+</span>
                                <span class="pb-tour-hero__stat-label">Happy Families</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".2s">
                    <div class="pb-tour-hero__img-wrap">
                        <img src="{{ asset('assets/img/class/class-1-1.jpg') }}" alt="Children enjoying arts and crafts at Peekaboo Daycare" class="pb-tour-hero__img">
                        <div class="pb-tour-hero__img-badge">
                            <span class="pb-tour-hero__img-badge-number">R0</span>
                            <span class="pb-tour-hero__img-badge-text">Tour is<br>completely free</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form + Sidebar -->
    <section class="pb-tour">
        <div class="container">
            <div class="row gx-5">

                <!-- Form Column -->
                <div class="col-lg-8 mb-4 wow itfadeUp" data-wow-duration=".9s">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0" style="padding-left: 20px;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="pb-tour-form">
                        <div class="pb-tour-form__header">
                            <h2 class="pb-tour-form__title">Request Your Tour</h2>
                            <span class="pb-tour-form__free"><i class="fa-solid fa-clock"></i> Takes 2 min to complete</span>
                        </div>

                        <form action="{{ route('book-tour.submit') }}" method="POST">
                            @csrf
                            <div class="row g-4">

                                <!-- Parent Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Parent/Guardian Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="e.g. Sarah Johnson" required>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="082 000 0000" required>
                                </div>

                                <!-- Email -->
                                <div class="col-12">
                                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
                                </div>

                                <!-- Child Name -->
                                <div class="col-md-8">
                                    <label class="form-label">Child's Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="child_name" value="{{ old('child_name') }}" required>
                                </div>

                                <!-- Nickname -->
                                <div class="col-md-4">
                                    <label class="form-label">Nickname</label>
                                    <input type="text" class="form-control" name="child_nickname" value="{{ old('child_nickname') }}">
                                </div>

                                <!-- Child Age -->
                                <div class="col-md-6">
                                    <label class="form-label">Child's Age <span class="text-danger">*</span></label>
                                    <select class="form-select" name="child_age" required>
                                        <option value="">Select age range...</option>
                                        <option value="0-1" {{ old('child_age') == '0-1' ? 'selected' : '' }}>0–1 year (Baby Room)</option>
                                        <option value="1-3" {{ old('child_age') == '1-3' ? 'selected' : '' }}>1–3 years (Toddlers)</option>
                                        <option value="3-4" {{ old('child_age') == '3-4' ? 'selected' : '' }}>3–4 years (Preschool)</option>
                                        <option value="5-6" {{ old('child_age') == '5-6' ? 'selected' : '' }}>5–6 years (Grade R)</option>
                                    </select>
                                </div>

                                <!-- Preferred Date -->
                                <div class="col-12">
                                    <label class="form-label">Preferred Date <span class="text-danger">*</span></label>
                                    <input type="hidden" name="preferred_date" id="preferred_date_input" value="{{ old('preferred_date') }}" required>
                                    <div class="pb-date-picker" id="pbDatePicker" style="background:#fff; border:1px solid #e0e4e8; border-radius:10px; padding:16px 20px;">
                                        <div class="pb-date-picker__nav">
                                            <button type="button" class="pb-date-picker__arrow" id="pbDatePrev"><i class="fa-solid fa-chevron-left"></i></button>
                                            <span class="pb-date-picker__month" id="pbDateMonth">—</span>
                                            <button type="button" class="pb-date-picker__arrow" id="pbDateNext"><i class="fa-solid fa-chevron-right"></i></button>
                                        </div>
                                        <div class="pb-date-picker__grid" id="pbDateGrid"></div>
                                    </div>
                                </div>

                                <!-- Preferred Time -->
                                <div class="col-12">
                                    <label class="form-label">Preferred Time <span class="text-danger">*</span></label>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="pb-time-slot">
                                                <input type="radio" name="preferred_time" value="09:00" {{ old('preferred_time', '09:00') == '09:00' ? 'checked' : '' }}>
                                                <span>
                                                    <span class="pb-time-slot__label">Morning</span>
                                                    <span class="pb-time-slot__time">09:00 – 10:00</span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="pb-time-slot">
                                                <input type="radio" name="preferred_time" value="11:00" {{ old('preferred_time') == '11:00' ? 'checked' : '' }}>
                                                <span>
                                                    <span class="pb-time-slot__label">Late Morning</span>
                                                    <span class="pb-time-slot__time">11:00 – 12:00</span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="pb-time-slot">
                                                <input type="radio" name="preferred_time" value="14:00" {{ old('preferred_time') == '14:00' ? 'checked' : '' }}>
                                                <span>
                                                    <span class="pb-time-slot__label">Afternoon</span>
                                                    <span class="pb-time-slot__time">14:00 – 15:00</span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Message -->
                                <div class="col-12">
                                    <label class="form-label">Questions or Special Requirements?</label>
                                    <textarea class="form-control" name="message" rows="4" placeholder="Tell us anything you'd like to know or see during your visit...">{{ old('message') }}</textarea>
                                </div>

                                <!-- Source -->
                                <div class="col-12">
                                    <label class="form-label">How did you hear about us?</label>
                                    <select class="form-select" name="source">
                                        <option value="">Select...</option>
                                        <option value="facebook" {{ old('source') == 'facebook' ? 'selected' : '' }}>Facebook</option>
                                        <option value="google" {{ old('source') == 'google' ? 'selected' : '' }}>Google Search</option>
                                        <option value="instagram" {{ old('source') == 'instagram' ? 'selected' : '' }}>Instagram</option>
                                        <option value="referral" {{ old('source') == 'referral' ? 'selected' : '' }}>Friend/Family Referral</option>
                                        <option value="other" {{ old('source') == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>

                                <!-- Submit -->
                                <div class="col-12 mt-2">
                                    <button type="submit" class="pb-tour-form__btn">
                                        <i class="fa-regular fa-calendar-check"></i> Book My Free Tour
                                    </button>
                                    <p class="pb-tour-form__note">
                                        <i class="fa-solid fa-lock"></i> No commitment required — we'll confirm within 24 hours
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Sidebar — Trust & Process -->
                <div class="col-lg-4 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".15s">
                    <div class="pb-tour-sidebar">

                        <!-- Social Proof -->
                        <div class="pb-tour-proof">
                            <div class="pb-tour-proof__stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                            <p class="pb-tour-proof__quote">"From the moment we walked in, we knew this was the right place. The teachers are incredible and our daughter loves going every morning."</p>
                            <span class="pb-tour-proof__author">Megan D.</span><br>
                            <span class="pb-tour-proof__source">Google Review</span>
                        </div>

                        <!-- What to Expect -->
                        <div class="pb-tour-sidebar__card">
                            <h3 class="pb-tour-sidebar__title">Your Tour Includes</h3>
                            <ul class="pb-tour-sidebar__list">
                                <li><i class="fa-solid fa-check"></i> 30–45 minute guided walkthrough</li>
                                <li><i class="fa-solid fa-check"></i> Meet the teachers for your child's age group</li>
                                <li><i class="fa-solid fa-check"></i> See classrooms and outdoor play areas</li>
                                <li><i class="fa-solid fa-check"></i> Review curriculum, fees and daily schedule</li>
                                <li><i class="fa-solid fa-check"></i> Ask any questions — no pressure</li>
                            </ul>
                        </div>

                        <!-- How It Works -->
                        <div class="pb-tour-process">
                            <h3 class="pb-tour-process__title">How It Works</h3>
                            <div class="pb-tour-process__step">
                                <span class="pb-tour-process__number">1</span>
                                <span class="pb-tour-process__text"><strong>Submit this form</strong>Takes less than 2 minutes</span>
                            </div>
                            <div class="pb-tour-process__step">
                                <span class="pb-tour-process__number">2</span>
                                <span class="pb-tour-process__text"><strong>We confirm your slot</strong>Via call or WhatsApp within 24hrs</span>
                            </div>
                            <div class="pb-tour-process__step">
                                <span class="pb-tour-process__number">3</span>
                                <span class="pb-tour-process__text"><strong>Visit & fall in love</strong>See why 150+ families trust us</span>
                            </div>
                        </div>

                        <!-- Need Help -->
                        <div class="pb-tour-help">
                            <h3 class="pb-tour-help__title">Prefer to Call?</h3>
                            <p class="pb-tour-help__desc">Our team is happy to schedule your tour over the phone or WhatsApp.</p>
                            <a href="tel:0215574999" class="pb-tour-help__btn pb-tour-help__btn--phone">
                                <i class="fa-solid fa-phone"></i>&ensp;021 557 4999
                            </a>
                            <a href="https://wa.me/27828989967" target="_blank" rel="noopener" class="pb-tour-help__btn pb-tour-help__btn--whatsapp">
                                <i class="fa-brands fa-whatsapp"></i>&ensp;WhatsApp Us
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Confirmation Modal -->
    @if(session('success'))
    <div class="modal fade pb-modal" id="bookingConfirmModal" tabindex="-1" aria-labelledby="bookingConfirmLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
            <div class="modal-content">

                <div class="pb-modal__header">
                    <div class="pb-modal__icon">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <h4 class="pb-modal__title" id="bookingConfirmLabel">Tour Request Received!</h4>
                    <p class="pb-modal__subtitle">We'll confirm your appointment within 24 hours</p>
                </div>

                <div class="pb-modal__body">
                    @if(session('booking_id'))
                    <div class="pb-modal__ref">
                        <span class="pb-modal__ref-label">Booking Reference</span>
                        <span class="pb-modal__ref-code">{{ session('booking_id') }}</span>
                    </div>
                    @endif

                    <div class="pb-modal__steps">
                        <div class="pb-modal__step">
                            <span class="pb-modal__step-dot"></span>
                            <span class="pb-modal__step-text">Confirmation email sent to you</span>
                        </div>
                        <div class="pb-modal__step">
                            <span class="pb-modal__step-dot"></span>
                            <span class="pb-modal__step-text">Our team has been notified</span>
                        </div>
                        <div class="pb-modal__step">
                            <span class="pb-modal__step-dot"></span>
                            <span class="pb-modal__step-text">We'll call to confirm your date & time</span>
                        </div>
                    </div>

                    <button type="button" class="pb-modal__btn" data-bs-dismiss="modal">
                        Perfect, thank you!
                    </button>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new bootstrap.Modal(document.getElementById('bookingConfirmModal'), { backdrop: 'static' }).show();
        });
    </script>
    @endpush
    @endif

@push('scripts')
<script>
(function () {
    const DAY_HEADERS = ['Su','Mo','Tu','We','Th','Fr','Sa'];
    const MONTH_NAMES = ['January','February','March','April','May','June','July','August','September','October','November','December'];

    const input   = document.getElementById('preferred_date_input');
    const grid    = document.getElementById('pbDateGrid');
    const monthEl = document.getElementById('pbDateMonth');
    const prevBtn = document.getElementById('pbDatePrev');
    const nextBtn = document.getElementById('pbDateNext');

    const today = new Date(); today.setHours(0,0,0,0);
    const minDate = new Date(today); minDate.setDate(today.getDate() + 1);

    // Restore old value or start from next month-view containing minDate
    let current = new Date(minDate.getFullYear(), minDate.getMonth(), 1);
    let selected = null;

    const oldVal = input.value;
    if (oldVal) {
        const parts = oldVal.split('-');
        selected = new Date(+parts[0], +parts[1]-1, +parts[2]);
        current  = new Date(selected.getFullYear(), selected.getMonth(), 1);
    }

    function pad(n){ return String(n).padStart(2,'0'); }
    function toISO(d){ return d.getFullYear()+'-'+pad(d.getMonth()+1)+'-'+pad(d.getDate()); }

    function render() {
        monthEl.textContent = MONTH_NAMES[current.getMonth()] + ' ' + current.getFullYear();

        // Disable prev if this month is already the minimum month
        const prevMonth = new Date(current.getFullYear(), current.getMonth() - 1, 1);
        prevBtn.style.opacity = prevMonth < new Date(minDate.getFullYear(), minDate.getMonth(), 1) ? '0.35' : '1';
        prevBtn.style.pointerEvents = prevMonth < new Date(minDate.getFullYear(), minDate.getMonth(), 1) ? 'none' : '';

        grid.innerHTML = '';
        // Day headers
        DAY_HEADERS.forEach(d => {
            const h = document.createElement('div');
            h.className = 'pb-date-picker__day-header';
            h.textContent = d;
            grid.appendChild(h);
        });

        const firstDay = new Date(current.getFullYear(), current.getMonth(), 1).getDay();
        const daysInMonth = new Date(current.getFullYear(), current.getMonth() + 1, 0).getDate();

        // Empty cells before first day
        for (let i = 0; i < firstDay; i++) {
            const e = document.createElement('div');
            e.className = 'pb-date-picker__day pb-date-picker__day--empty';
            grid.appendChild(e);
        }

        for (let d = 1; d <= daysInMonth; d++) {
            const date = new Date(current.getFullYear(), current.getMonth(), d);
            const btn  = document.createElement('div');
            const dow  = date.getDay(); // 0=Sun, 6=Sat
            const isWeekend  = dow === 0 || dow === 6;
            const isPast     = date < minDate;
            const isToday    = toISO(date) === toISO(today);
            const isSelected = selected && toISO(date) === toISO(selected);

            btn.className = 'pb-date-picker__day';
            btn.textContent = d;

            if (isSelected) btn.classList.add('pb-date-picker__day--selected');
            else if (isToday) btn.classList.add('pb-date-picker__day--today');

            if (isPast || isWeekend) {
                btn.classList.add(isPast ? 'pb-date-picker__day--disabled' : 'pb-date-picker__day--weekend');
            } else {
                btn.addEventListener('click', function () {
                    selected = date;
                    input.value = toISO(date);
                    render();
                });
            }
            grid.appendChild(btn);
        }
    }

    prevBtn.addEventListener('click', function () {
        current.setMonth(current.getMonth() - 1);
        render();
    });
    nextBtn.addEventListener('click', function () {
        current.setMonth(current.getMonth() + 1);
        render();
    });

    render();
})();
</script>
@endpush

@endsection
