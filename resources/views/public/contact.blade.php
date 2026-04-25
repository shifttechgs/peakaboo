@extends('layouts.public')

@section('title', 'Contact Peekaboo Daycare — Parklands, Cape Town | 021 557 4999')
@section('description', 'Contact Peekaboo Daycare & Preschool in Parklands, Cape Town. Call 021 557 4999 or 082 898 9967, email us, or visit us at 139B Humewood Drive, Parklands. Book a tour today.')
@section('keywords', 'contact daycare Parklands, Peekaboo Daycare contact, preschool Cape Town phone number, childcare Parklands address, daycare near me Parklands contact')
@section('canonical', route('contact'))
@section('og_title', 'Contact Peekaboo Daycare — Parklands, Cape Town')
@section('og_description', 'Get in touch with Peekaboo Daycare in Parklands, Cape Town. Call 021 557 4999, email us, or visit 139B Humewood Drive, Parklands.')

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "ContactPage",
  "@@id": "{{ route('contact') }}#webpage",
  "url": "{{ route('contact') }}",
  "name": "Contact Peekaboo Daycare — Parklands, Cape Town",
  "description": "Contact Peekaboo Daycare & Preschool in Parklands, Cape Town by phone, email, or in person.",
  "isPartOf": {"@@id": "{{ url('/') }}/#website"},
  "breadcrumb": {
    "@@type": "BreadcrumbList",
    "itemListElement": [
      {"@@type": "ListItem", "position": 1, "name": "Home", "item": "{{ route('home') }}"},
      {"@@type": "ListItem", "position": 2, "name": "Contact Us", "item": "{{ route('contact') }}"}
    ]
  }
}
</script>
@endpush

@section('content')
<style>
/* ============================================================
   CONTACT PAGE — Peekaboo (Brand-consistent)
============================================================ */

/* ── Page Header ── */
.pb-page-header {
    background: var(--color-surface);
    padding: 64px 0 56px;
}
.pb-page-header__title {
    font-family: var(--font-heading);
    font-size: 3rem;
    font-weight: 800;
    color: var(--color-text);
    margin: 0 0 12px;
}
.pb-page-header__breadcrumb {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 8px;
    font-family: var(--font-body);
    font-size: 16px;
    color: var(--color-muted);
}
.pb-page-header__breadcrumb a {
    color: var(--color-primary);
    text-decoration: none;
    transition: color 0.25s;
}
.pb-page-header__breadcrumb a:hover { color: var(--color-primary-dk); }
.pb-page-header__breadcrumb li + li::before {
    content: '/';
    margin-right: 8px;
    color: var(--color-muted);
}

/* ── Contact Section ── */
.pb-contact {
    padding: 100px 0 80px;
}
.pb-contact__subtitle {
    font-family: var(--font-body);
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: var(--color-primary);
    margin-bottom: 12px;
    display: block;
}
.pb-contact__title {
    font-family: var(--font-heading);
    font-size: 2.6rem;
    font-weight: 800;
    color: var(--color-text);
    margin-bottom: 40px;
    line-height: 1.2;
}

/* Contact info items */
.pb-contact__item {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    margin-bottom: 32px;
}
.pb-contact__icon {
    width: 56px;
    height: 56px;
    border-radius: var(--radius-md);
    background: var(--color-surface);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.pb-contact__icon i {
    font-size: 22px;
    color: var(--color-primary);
}
.pb-contact__label {
    font-family: var(--font-body);
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    color: var(--color-muted);
    display: block;
    margin-bottom: 6px;
}
.pb-contact__value {
    font-family: var(--font-body);
    font-size: 17px;
    color: var(--color-text);
    line-height: 1.7;
}
.pb-contact__value a {
    color: var(--color-text);
    text-decoration: none;
    transition: color 0.25s;
}
.pb-contact__value a:hover { color: var(--color-primary); }

/* Hours card */
.pb-contact__hours {
    background: var(--color-surface);
    border-radius: var(--radius-md);
    padding: 24px 28px;
    margin-top: 12px;
    margin-bottom: 36px;
}
.pb-contact__hours-label {
    font-family: var(--font-body);
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    color: var(--color-primary);
    display: block;
    margin-bottom: 8px;
}
.pb-contact__hours-text {
    font-family: var(--font-body);
    font-size: 17px;
    font-weight: 600;
    color: var(--color-text);
    margin: 0;
}

/* Social links */
.pb-contact__social {
    display: flex;
    align-items: center;
    gap: 14px;
}
.pb-contact__social-label {
    font-family: var(--font-body);
    font-size: 16px;
    font-weight: 600;
    color: var(--color-text);
}
.pb-contact__social a {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: var(--color-surface);
    color: var(--color-text);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    text-decoration: none;
    transition: background 0.3s, color 0.3s;
}
.pb-contact__social a:hover {
    background: var(--color-primary);
    color: #fff;
}

/* ── Form ── */
.pb-contact-form {
    background: var(--color-surface);
    border-radius: var(--radius-lg);
    padding: 48px;
}
.pb-contact-form__title {
    font-family: var(--font-heading);
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--color-text);
    margin-bottom: 32px;
}
.pb-contact-form .form-label {
    font-family: var(--font-body);
    font-size: 15px;
    font-weight: 600;
    color: var(--color-text);
    margin-bottom: 8px;
}
.pb-contact-form .form-control {
    font-family: var(--font-body);
    font-size: 16px;
    border: 1px solid #e0e4e8;
    border-radius: var(--radius-sm);
    padding: 14px 18px;
    height: auto;
    background: #fff;
    color: var(--color-text);
    transition: border-color 0.25s;
}
.pb-contact-form .form-control:focus {
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(0,119,182,0.08);
    outline: none;
}
.pb-contact-form .form-control::placeholder {
    color: var(--color-muted);
    font-size: 15px;
}
.pb-contact-form textarea.form-control {
    min-height: 160px;
}
.pb-contact-form__btn {
    font-family: var(--font-body);
    font-size: 16px;
    font-weight: 600;
    background: var(--color-primary);
    color: #fff;
    border: none;
    border-radius: var(--radius-pill);
    padding: 16px 48px;
    cursor: pointer;
    transition: background 0.3s;
}
.pb-contact-form__btn:hover {
    background: var(--color-primary-dk);
}
.pb-contact-form__btn:disabled {
    opacity: 0.75;
    cursor: not-allowed;
}
.pb-contact-form__spinner {
    display: inline-block;
    width: 16px;
    height: 16px;
    border: 2px solid rgba(255,255,255,0.4);
    border-top-color: #fff;
    border-radius: 50%;
    animation: pb-spin 0.7s linear infinite;
    vertical-align: middle;
    margin-right: 4px;
}
@keyframes pb-spin {
    to { transform: rotate(360deg); }
}

/* ── Map ── */
.pb-map iframe {
    width: 100%;
    height: 420px;
    border: 0;
    display: block;
}

/* ── Responsive ── */
@media (max-width: 991px) {
    .pb-page-header { padding: 48px 0 40px; }
    .pb-page-header__title { font-size: 2.4rem; }
    .pb-contact { padding: 70px 0 50px; }
    .pb-contact__title { font-size: 2rem; }
    .pb-contact-form { padding: 32px 28px; }
}
@media (max-width: 575px) {
    .pb-page-header__title { font-size: 2rem; }
    .pb-contact__title { font-size: 1.7rem; }
    .pb-contact-form { padding: 28px 20px; }
}
</style>

    <!-- Page Header -->
    <div class="pb-page-header">
        <div class="container">
            <h1 class="pb-page-header__title">Contact Us</h1>
            <ul class="pb-page-header__breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>

    <!-- Contact Section -->
    <section class="pb-contact">
        <div class="container">
            <div class="row gx-5">

                <!-- Left — Contact Info -->
                <div class="col-lg-5 mb-4">
                    <span class="pb-contact__subtitle">Get In Touch</span>
                    <h2 class="pb-contact__title">We'd Love to Hear From You</h2>

                    <div class="pb-contact__item">
                        <div class="pb-contact__icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <span class="pb-contact__label">Address</span>
                            <span class="pb-contact__value">139B Humewood Drive, Parklands, 7441, Cape Town</span>
                        </div>
                    </div>

                    <div class="pb-contact__item">
                        <div class="pb-contact__icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <span class="pb-contact__label">Phone</span>
                            <span class="pb-contact__value">
                                <a href="tel:0215574999">060 793 0520</a> / <a href="tel:0828989967">082 898 9967</a>
                            </span>
                        </div>
                    </div>

                    <div class="pb-contact__item">
                        <div class="pb-contact__icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <span class="pb-contact__label">Email</span>
                            <span class="pb-contact__value">
                                <a href="mailto:admin@peekaboodaycare.co.za">admin@peekaboodaycare.co.za</a>
                            </span>
                        </div>
                    </div>

                    <div class="pb-contact__hours">
                        <span class="pb-contact__hours-label">Operating Hours</span>
                        <p class="pb-contact__hours-text">Monday – Friday: 06:00 – 18:00</p>
                    </div>

                    <div class="pb-contact__social">
                        <span class="pb-contact__social-label">Follow Us</span>
                        <a href="https://facebook.com/peekaboodaycare" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://wa.me/27828989967" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                        <a href="mailto:admin@peekaboodaycare.co.za" aria-label="Email"><i class="fa-solid fa-envelope"></i></a>
                    </div>
                </div>

                <!-- Right — Form -->
                <div class="col-lg-7 mb-4">
                    @if(session('success'))
                        <div class="alert alert-success mb-3">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger mb-3">{{ session('error') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger mb-3">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="pb-contact-form">
                        <h3 class="pb-contact-form__title">Send Us a Message</h3>
                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="fname">First Name *</label>
                                    <input class="form-control @error('fname') is-invalid @enderror" type="text" name="fname" id="fname" placeholder="Your first name" value="{{ old('fname') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="lname">Last Name *</label>
                                    <input class="form-control @error('lname') is-invalid @enderror" type="text" name="lname" id="lname" placeholder="Your last name" value="{{ old('lname') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="email">Email Address *</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="you@example.com" value="{{ old('email') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="phone">Phone Number *</label>
                                    <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" id="phone" placeholder="082 000 0000" value="{{ old('phone') }}" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="message">Message *</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" placeholder="How can we help you?" rows="5" required>{{ old('message') }}</textarea>
                                </div>
                                {{-- Honeypot: hidden from real users, bots fill it in --}}
                                <div style="display:none" aria-hidden="true">
                                    <input type="text" name="website" tabindex="-1" autocomplete="off" value="">
                                </div>
                                {{-- reCAPTCHA v3 token (populated by JS before submit) --}}
                                <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                                <div class="col-12 mt-3">
                                    <button type="submit" class="pb-contact-form__btn" id="contactSubmitBtn">
                                        <span id="contactBtnText">Send Message</span>
                                        <span id="contactBtnLoader" style="display:none">
                                            <span class="pb-contact-form__spinner"></span> Sending…
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Map -->
    <div class="pb-map">
        <iframe src="https://maps.google.com/maps?width=600&amp;height=420&amp;hl=en&amp;q=139B%20Humewood%20Drive,%20Parklands,%20Cape%20Town&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                allowfullscreen loading="lazy"></iframe>
    </div>

<script>
document.querySelector('form[action="{{ route('contact.submit') }}"]').addEventListener('submit', function (e) {
    e.preventDefault();
    var form   = this;
    var btn    = document.getElementById('contactSubmitBtn');
    var text   = document.getElementById('contactBtnText');
    var loader = document.getElementById('contactBtnLoader');
    btn.disabled = true;
    text.style.display  = 'none';
    loader.style.display = 'inline';

    grecaptcha.ready(function () {
        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', { action: 'contact' }).then(function (token) {
            document.getElementById('recaptcha_token').value = token;
            form.submit();
        });
    });
});
</script>

@push('scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
@endpush

@endsection
