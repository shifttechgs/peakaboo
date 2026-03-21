@extends('layouts.public')

@section('title', 'Application Submitted - Peekaboo Daycare & Preschool')

@section('content')
<style>
.pb-thankyou {
    padding: 100px 0 80px;
}
.pb-thankyou__card {
    background: var(--color-surface);
    border-radius: var(--radius-lg);
    padding: 60px 48px;
    text-align: center;
    max-width: 640px;
    margin: 0 auto;
}
.pb-thankyou__icon {
    width: 80px;
    height: 80px;
    background: var(--color-success);
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 28px;
}
.pb-thankyou__icon i {
    font-size: 36px;
    color: #fff;
}
.pb-thankyou__title {
    font-family: var(--font-heading);
    font-size: 2rem;
    font-weight: 800;
    color: var(--color-text);
    margin-bottom: 12px;
}
.pb-thankyou__desc {
    font-family: var(--font-body);
    font-size: 17px;
    color: var(--color-body);
    line-height: 1.7;
    margin-bottom: 32px;
}
.pb-thankyou__ref {
    background: var(--color-text);
    border-radius: var(--radius-md);
    padding: 20px 28px;
    margin-bottom: 32px;
    display: inline-block;
}
.pb-thankyou__ref-label {
    font-family: var(--font-body);
    font-size: 12px;
    font-weight: 700;
    color: rgba(255,255,255,0.5);
    text-transform: uppercase;
    letter-spacing: 1.5px;
    display: block;
    margin-bottom: 6px;
}
.pb-thankyou__ref-code {
    font-family: 'Courier New', monospace;
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--color-warm);
    letter-spacing: 3px;
}
.pb-thankyou__alert {
    border-radius: var(--radius-md);
    padding: 14px 20px;
    font-family: var(--font-body);
    font-size: 15px;
    font-weight: 500;
    margin-bottom: 28px;
    border: none;
}
.pb-thankyou__alert--success {
    background: rgba(46,125,50,0.08);
    border-left: 4px solid var(--color-success);
    color: var(--color-success);
}
.pb-thankyou__alert--warning {
    background: rgba(255,193,7,0.1);
    border-left: 4px solid var(--color-warning);
    color: #856404;
}
.pb-thankyou__divider {
    border: none;
    border-top: 1px solid rgba(0,0,0,0.06);
    margin: 28px 0;
}
.pb-thankyou__contact-label {
    font-family: var(--font-body);
    font-size: 15px;
    color: var(--color-muted);
    margin-bottom: 16px;
}
.pb-thankyou__btns {
    display: flex;
    gap: 14px;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 24px;
}
.pb-thankyou__btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: var(--font-body);
    font-size: 15px;
    font-weight: 600;
    padding: 14px 32px;
    border-radius: var(--radius-pill);
    text-decoration: none;
    transition: background 0.3s;
}
.pb-thankyou__btn--primary {
    background: var(--color-primary);
    color: #fff;
}
.pb-thankyou__btn--primary:hover {
    background: var(--color-primary-dk);
    color: #fff;
}
.pb-thankyou__btn--whatsapp {
    background: var(--color-whatsapp);
    color: #fff;
}
.pb-thankyou__btn--whatsapp:hover {
    background: #1ebd5a;
    color: #fff;
}
.pb-thankyou__home {
    font-family: var(--font-body);
    font-size: 15px;
    font-weight: 600;
    color: var(--color-primary);
    text-decoration: none;
    transition: color 0.25s;
}
.pb-thankyou__home:hover { color: var(--color-primary-dk); }

@media (max-width: 575px) {
    .pb-thankyou__card { padding: 40px 24px; }
    .pb-thankyou__title { font-size: 1.6rem; }
}
</style>

<section class="pb-thankyou">
    <div class="container">
        <div class="pb-thankyou__card wow itfadeUp" data-wow-duration=".9s">

            <div class="pb-thankyou__icon">
                <i class="fa-solid fa-check"></i>
            </div>

            <h1 class="pb-thankyou__title">Thank You!</h1>
            <p class="pb-thankyou__desc">We have received your enrolment application and will be in touch within 48 hours.</p>

            @if(session('email_sent'))
                <div class="pb-thankyou__alert pb-thankyou__alert--success">
                    <i class="fa-solid fa-check-circle"></i> Our team has been notified
                </div>
            @elseif(session('email_error'))
                <div class="pb-thankyou__alert pb-thankyou__alert--warning">
                    <i class="fa-solid fa-circle-info"></i> Please call <a href="tel:0215574999" style="color: inherit; font-weight: 700;">021 557 4999</a> to confirm
                </div>
            @endif

            <div class="pb-thankyou__ref">
                <span class="pb-thankyou__ref-label">Application Reference</span>
                <span class="pb-thankyou__ref-code">{{ $applicationId }}</span>
            </div>
            <p style="font-family: var(--font-body); font-size: 13px; color: var(--color-muted); margin-bottom: 0;">Please save this reference number</p>

            <hr class="pb-thankyou__divider">

            <p class="pb-thankyou__contact-label">Questions? Contact us:</p>
            <div class="pb-thankyou__btns">
                <a href="tel:0215574999" class="pb-thankyou__btn pb-thankyou__btn--primary">
                    <i class="fa-solid fa-phone"></i> 021 557 4999
                </a>
                <a href="https://wa.me/27828989967" target="_blank" rel="noopener" class="pb-thankyou__btn pb-thankyou__btn--whatsapp">
                    <i class="fa-brands fa-whatsapp"></i> WhatsApp
                </a>
            </div>

            <a href="{{ route('home') }}" class="pb-thankyou__home">
                <i class="fa-solid fa-arrow-left"></i> Back to Home
            </a>

        </div>
    </div>
</section>
@endsection
