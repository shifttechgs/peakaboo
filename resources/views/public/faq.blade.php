@extends('layouts.public')

@section('title', 'FAQ - Peekaboo Daycare & Preschool')
@section('description', 'Answers to the most common questions about Peekaboo Daycare in Parklands, Cape Town — hours, fees, policies, curriculum, and more.')

@section('content')
<style>
/* ============================================================
   FAQ PAGE
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

/* ── FAQ Section ── */
.pb-faq-page { padding: 90px 0 100px; background: #fff; }

.pb-faq__item {
    background: var(--color-card); border-radius: var(--radius-md);
    margin-bottom: 12px; overflow: hidden;
}
.pb-faq__btn {
    background: transparent; border: none; width: 100%; text-align: left;
    font-family: var(--font-heading); font-size: 17px; font-weight: 700;
    color: var(--color-text); padding: 22px 28px; cursor: pointer;
    display: flex; justify-content: space-between; align-items: center; gap: 16px;
    transition: color 0.25s;
}
.pb-faq__btn:not(.collapsed) { color: var(--color-primary); }
.pb-faq__btn-icon {
    width: 32px; height: 32px; border-radius: 50%; flex-shrink: 0;
    background: var(--color-surface); display: flex; align-items: center; justify-content: center;
    font-size: 14px; color: var(--color-primary); transition: transform 0.3s, background 0.3s;
}
.pb-faq__btn:not(.collapsed) .pb-faq__btn-icon {
    background: var(--color-primary); color: #fff; transform: rotate(45deg);
}
.pb-faq__body {
    padding: 0 28px 22px;
    font-family: var(--font-body); font-size: 16px; color: var(--color-body); line-height: 1.8;
}

/* Category pill */
.pb-faq__cat-label {
    font-family: var(--font-body); font-size: 13px; font-weight: 700; letter-spacing: 2px;
    text-transform: uppercase; color: var(--color-warm); display: block; margin-bottom: 12px;
}
.pb-faq__cat-title {
    font-family: var(--font-heading); font-size: clamp(1.4rem,2.5vw,2rem); font-weight: 900;
    color: var(--color-text); margin-bottom: 28px;
}

/* Still have questions bar */
.pb-faq-contact {
    background: linear-gradient(135deg, #0E2A46 0%, #0c3a5e 100%);
    border-radius: var(--radius-lg); padding: 52px 48px; text-align: center;
    margin-top: 60px;
}
.pb-faq-contact__title {
    font-family: var(--font-heading); font-size: clamp(1.6rem,2.5vw,2.2rem); font-weight: 900;
    color: #fff; margin-bottom: 12px;
}
.pb-faq-contact__desc {
    font-family: var(--font-body); font-size: 17px; color: rgba(255,255,255,0.75);
    max-width: 480px; margin: 0 auto 32px;
}
.pb-faq-contact__btn {
    display: inline-flex; align-items: center; gap: 10px;
    font-family: var(--font-body); font-size: 15px; font-weight: 700;
    padding: 14px 32px; border-radius: var(--radius-pill); text-decoration: none;
    transition: all 0.3s; margin: 6px;
}
.pb-faq-contact__btn--whatsapp {
    background: #25D366; color: #fff; border: 2px solid #25D366;
}
.pb-faq-contact__btn--whatsapp:hover { background: #1fb85a; border-color: #1fb85a; color: #fff; transform: translateY(-2px); }
.pb-faq-contact__btn--tour {
    background: transparent; color: #fff; border: 2px solid rgba(255,255,255,0.5);
}
.pb-faq-contact__btn--tour:hover { background: rgba(255,255,255,0.1); border-color: #fff; color: #fff; transform: translateY(-2px); }
</style>

<!-- Page Header -->
<div class="pb-page-header">
    <div class="container">
        <h1 class="pb-page-header__title">Frequently Asked Questions</h1>
        <ul class="pb-page-header__breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>FAQ</li>
        </ul>
    </div>
</div>

<!-- FAQ Content -->
<section class="pb-faq-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">

                <!-- General -->
                <div class="mb-5 wow itfadeUp">
                    <span class="pb-faq__cat-label">General Questions</span>
                    <h2 class="pb-faq__cat-title">Hours, Policies & Daily Life</h2>

                    <div class="accordion" id="faqGeneral">
                        @foreach($faqs as $i => $faq)
                        <div class="pb-faq__item">
                            <button class="pb-faq__btn accordion-button {{ $i > 0 ? 'collapsed' : '' }}"
                                type="button" data-bs-toggle="collapse" data-bs-target="#faqG{{ $i }}">
                                {{ $faq['question'] }}
                                <span class="pb-faq__btn-icon"><i class="fa-solid fa-plus"></i></span>
                            </button>
                            <div id="faqG{{ $i }}" class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}" data-bs-parent="#faqGeneral">
                                <div class="pb-faq__body">{{ $faq['answer'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Enrolment -->
                <div class="mb-5 wow itfadeUp">
                    <span class="pb-faq__cat-label">Enrolment</span>
                    <h2 class="pb-faq__cat-title">Getting Started at Peekaboo</h2>

                    <div class="accordion" id="faqEnrol">
                        @php
                        $enrolFaqs = [
                            ['question' => 'How do I apply for a place?', 'answer' => 'Simply click "Enrol Now" on our website and complete the online application form. It takes about 10 minutes. You\'ll receive a confirmation email once submitted, and our team will be in touch within 1-2 business days.'],
                            ['question' => 'How much notice do I need to give to secure a place?', 'answer' => 'We recommend applying as early as possible, especially for the Baby Room, which fills quickly. Once your application is reviewed and approved, you\'ll be asked to pay the R500 registration deposit to secure the place.'],
                            ['question' => 'What documents do I need to enrol?', 'answer' => 'You\'ll need a certified copy of your child\'s birth certificate, clinic card (Road to Health Booklet), parent/guardian ID documents, and proof of address. These can all be uploaded during the online application.'],
                            ['question' => 'Can I visit the school before applying?', 'answer' => 'Absolutely — we encourage it! Book a free tour through our website and one of our teachers will show you around, answer all your questions, and help you decide if Peekaboo is the right fit for your family.'],
                            ['question' => 'What happens after I submit the application?', 'answer' => 'Our admin team reviews your application and responds within 1-2 business days. Once approved, you\'ll pay the registration fee and receive your starting date, welcome pack, and parent portal login details.'],
                        ];
                        @endphp
                        @foreach($enrolFaqs as $i => $faq)
                        <div class="pb-faq__item">
                            <button class="pb-faq__btn accordion-button {{ $i > 0 ? 'collapsed' : '' }}"
                                type="button" data-bs-toggle="collapse" data-bs-target="#faqE{{ $i }}">
                                {{ $faq['question'] }}
                                <span class="pb-faq__btn-icon"><i class="fa-solid fa-plus"></i></span>
                            </button>
                            <div id="faqE{{ $i }}" class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}" data-bs-parent="#faqEnrol">
                                <div class="pb-faq__body">{{ $faq['answer'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Programs -->
                <div class="mb-5 wow itfadeUp">
                    <span class="pb-faq__cat-label">Programs & Learning</span>
                    <h2 class="pb-faq__cat-title">Curriculum & Development</h2>

                    <div class="accordion" id="faqPrograms">
                        @php
                        $progFaqs = [
                            ['question' => 'What curriculum do you follow?', 'answer' => 'Our Grade R programme is fully aligned with the South African CAPS (Curriculum and Assessment Policy Statement) curriculum. All other age groups follow age-appropriate, play-based developmental programmes that prepare children progressively for formal learning.'],
                            ['question' => 'At what age can my baby start?', 'answer' => 'We accept babies from 3 months old into our Baby Room. Each baby receives individual care based on their own routine, and our baby room teacher-to-child ratio is 1:4 to ensure attentive, personal care.'],
                            ['question' => 'Will my child be ready for Grade 1 after your Grade R programme?', 'answer' => 'Yes — our Grade R programme has an excellent track record for school readiness. Graduates leave Peekaboo confident in reading, writing, mathematics fundamentals, and life skills. We issue formal end-of-term reports and conduct readiness assessments.'],
                            ['question' => 'Are you a Christian school?', 'answer' => 'Yes, Peekaboo Daycare operates with a Christian ethos. Christian values of kindness, respect, honesty, and gratitude form part of our daily culture. Morning circle time includes a short prayer and character education.'],
                        ];
                        @endphp
                        @foreach($progFaqs as $i => $faq)
                        <div class="pb-faq__item">
                            <button class="pb-faq__btn accordion-button {{ $i > 0 ? 'collapsed' : '' }}"
                                type="button" data-bs-toggle="collapse" data-bs-target="#faqP{{ $i }}">
                                {{ $faq['question'] }}
                                <span class="pb-faq__btn-icon"><i class="fa-solid fa-plus"></i></span>
                            </button>
                            <div id="faqP{{ $i }}" class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}" data-bs-parent="#faqPrograms">
                                <div class="pb-faq__body">{{ $faq['answer'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Contact / Still Need Help -->
                <div class="pb-faq-contact wow itfadeUp">
                    <h3 class="pb-faq-contact__title">Still Have a Question?</h3>
                    <p class="pb-faq-contact__desc">Our team is always happy to help. Reach out via WhatsApp for a quick reply, or book a tour to see us in person.</p>
                    <div>
                        <a href="https://wa.me/27828989967?text=Hi!%20I%20have%20a%20question%20about%20Peekaboo%20Daycare." target="_blank" rel="noopener" class="pb-faq-contact__btn pb-faq-contact__btn--whatsapp">
                            <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
                        </a>
                        <a href="{{ route('book-tour') }}" class="pb-faq-contact__btn pb-faq-contact__btn--tour">
                            <i class="fa-regular fa-calendar-check"></i> Book a Tour
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

