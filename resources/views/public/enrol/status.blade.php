@extends('layouts.public')

@section('title', 'Application Status - Peekaboo Daycare & Preschool')

@section('content')
<style>
/* ============================================================
   APPLICATION STATUS — Peekaboo
============================================================ */

/* ── Page Header ── */
.pb-page-header {
    background: var(--color-surface);
    padding: 64px 0 56px;
}
.pb-page-header__title {
    font-family: var(--font-heading);
    font-size: 3rem; font-weight: 800;
    color: var(--color-text); margin: 0 0 12px;
}
.pb-page-header__breadcrumb {
    list-style: none; padding: 0; margin: 0;
    display: flex; gap: 8px;
    font-family: var(--font-body); font-size: 16px; color: var(--color-muted);
}
.pb-page-header__breadcrumb a { color: var(--color-primary); text-decoration: none; }
.pb-page-header__breadcrumb li + li::before { content: '/'; margin-right: 8px; color: var(--color-muted); }

/* ── Section ── */
.pb-status { padding: 80px 0 80px; }

/* ── Left column intro ── */
.pb-status__subtitle {
    font-family: var(--font-body); font-size: 13px; font-weight: 700;
    text-transform: uppercase; letter-spacing: 2px;
    color: var(--color-primary); margin-bottom: 12px; display: block;
}
.pb-status__heading {
    font-family: var(--font-heading); font-size: clamp(1.8rem,3vw,2.6rem);
    font-weight: 800; color: var(--color-text);
    margin-bottom: 16px; line-height: 1.2;
}
.pb-status__lead {
    font-family: var(--font-body); font-size: 17px;
    color: var(--color-body); line-height: 1.75; margin-bottom: 40px;
}

/* ── Cards ── */
.pb-status__card {
    background: var(--color-surface);
    border-radius: var(--radius-lg); padding: 36px; margin-bottom: 24px;
}

/* ── Reference block (dark) ── */
.pb-status__ref-block {
    background: var(--color-text); border-radius: var(--radius-md);
    padding: 22px 28px; margin-bottom: 0;
}
.pb-status__ref-label {
    font-family: var(--font-body); font-size: 11px; font-weight: 700;
    color: rgba(255,255,255,.45); text-transform: uppercase;
    letter-spacing: 1.5px; display: block; margin-bottom: 5px;
}
.pb-status__ref-code {
    font-family: 'Courier New', monospace; font-size: 1.5rem;
    font-weight: 700; color: var(--color-warm); letter-spacing: 2.5px;
}
.pb-status__ref-date {
    font-family: var(--font-body); font-size: 13px;
    color: rgba(255,255,255,.45); margin-top: 3px;
}

/* ── Status badge pill ── */
.pb-status__badge-pill {
    display: inline-block; padding: 10px 22px;
    border-radius: var(--radius-pill); font-family: var(--font-body);
    font-weight: 700; font-size: 15px; white-space: nowrap;
}

/* ── Section title ── */
.pb-status__section-title {
    font-family: var(--font-heading); font-weight: 700; font-size: 1.05rem;
    color: var(--color-text); margin-bottom: 20px;
}

/* ── Detail grid ── */
.pb-status__detail-label {
    font-family: var(--font-body); font-size: 11px; font-weight: 700;
    color: var(--color-muted); text-transform: uppercase; letter-spacing: 1px;
    margin-bottom: 3px;
}
.pb-status__detail-value {
    font-family: var(--font-body); font-size: 15px;
    font-weight: 600; color: var(--color-text);
}

/* ── Timeline ── */
.pb-timeline { position: relative; padding-left: 30px; }
.pb-timeline::before {
    content: ''; position: absolute; left: 8px; top: 6px; bottom: 6px;
    width: 2px; background: rgba(0,0,0,.08);
}
.pb-timeline__item { position: relative; padding-bottom: 24px; }
.pb-timeline__item:last-child { padding-bottom: 0; }
.pb-timeline__dot {
    position: absolute; left: -26px; top: 4px;
    width: 16px; height: 16px; border-radius: 50%;
    border: 3px solid var(--color-surface);
    box-shadow: 0 0 0 2px rgba(0,0,0,.1);
}
.pb-timeline__dot--done    { box-shadow: 0 0 0 2px var(--color-primary); }
.pb-timeline__dot--success { box-shadow: 0 0 0 2px var(--color-success); }
.pb-timeline__dot--danger  { box-shadow: 0 0 0 2px var(--color-error); }
.pb-timeline__dot--accent  { box-shadow: 0 0 0 2px var(--color-accent); }
.pb-timeline__title {
    font-family: var(--font-body); font-weight: 700; font-size: 15px; color: var(--color-text);
}
.pb-timeline__title--muted { color: var(--color-muted); font-weight: 500; }
.pb-timeline__meta {
    font-family: var(--font-body); font-size: 14px; color: var(--color-muted);
    margin-top: 2px; line-height: 1.5;
}

/* ── Status alert ── */
.pb-status__alert {
    border-radius: var(--radius-md); padding: 20px 24px;
    margin-bottom: 24px; border-left: 4px solid;
}
.pb-status__alert h5 {
    font-family: var(--font-heading); font-weight: 700;
    font-size: 1.05rem; margin-bottom: 6px;
}
.pb-status__alert p { font-family: var(--font-body); font-size: 15px; margin: 0; line-height: 1.7; }

/* ── Contact items (matches contact page) ── */
.pb-status__contact-item {
    display: flex; align-items: flex-start; gap: 16px; margin-bottom: 24px;
}
.pb-status__contact-icon {
    width: 52px; height: 52px; border-radius: var(--radius-md);
    background: #fff; display: flex; align-items: center;
    justify-content: center; flex-shrink: 0;
}
.pb-status__contact-icon i { font-size: 20px; color: var(--color-primary); }
.pb-status__contact-label {
    font-family: var(--font-body); font-size: 12px; font-weight: 700;
    text-transform: uppercase; letter-spacing: 1.2px;
    color: var(--color-muted); display: block; margin-bottom: 4px;
}
.pb-status__contact-value {
    font-family: var(--font-body); font-size: 16px;
    color: var(--color-text); line-height: 1.6;
}
.pb-status__contact-value a { color: var(--color-text); text-decoration: none; }
.pb-status__contact-value a:hover { color: var(--color-primary); }

/* ── Buttons ── */
.pb-status__btn {
    display: inline-flex; align-items: center; gap: 8px;
    font-family: var(--font-body); font-size: 15px; font-weight: 700;
    padding: 14px 32px; border-radius: var(--radius-pill);
    text-decoration: none; transition: background .25s, color .25s;
}
.pb-status__btn--primary { background: var(--color-primary); color: #fff; }
.pb-status__btn--primary:hover { background: var(--color-primary-dk); color: #fff; }
.pb-status__btn--whatsapp { background: var(--color-whatsapp); color: #fff; }
.pb-status__btn--whatsapp:hover { background: #1ebd5a; color: #fff; }
.pb-status__btn--ghost {
    background: transparent; color: var(--color-primary);
    border: 2px solid var(--color-primary);
}
.pb-status__btn--ghost:hover { background: var(--color-primary); color: #fff; }

/* ── Not Found ── */
.pb-status__empty {
    background: var(--color-surface); border-radius: var(--radius-lg);
    padding: 60px 40px; text-align: center;
}

/* ── Responsive ── */
@media (max-width: 991px) {
    .pb-page-header { padding: 48px 0 40px; }
    .pb-page-header__title { font-size: 2.2rem; }
    .pb-status { padding: 60px 0 60px; }
}
@media (max-width: 575px) {
    .pb-page-header__title { font-size: 1.8rem; }
    .pb-status__card { padding: 24px 20px; }
    .pb-status__ref-block { padding: 18px 20px; }
}
</style>

{{-- ── Page Header (matches contact page) ─────────────────────────────── --}}
<div class="pb-page-header">
    <div class="container">
        <h1 class="pb-page-header__title">Application Status</h1>
        <ul class="pb-page-header__breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('enrol.index') }}">Enrol</a></li>
            <li>Application Status</li>
        </ul>
    </div>
</div>

<section class="pb-status">
    <div class="container">

        @if(isset($notFound) && $notFound)
        {{-- ── Not found ─────────────────────────────────────────────────── --}}
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="pb-status__empty wow itfadeUp" data-wow-duration=".9s">
                    <div style="width:72px;height:72px;background:rgba(0,0,0,.05);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
                        <i class="fas fa-search fa-xl" style="color:var(--color-muted);"></i>
                    </div>
                    <h4 style="font-family:var(--font-heading);font-weight:700;color:var(--color-text);margin-bottom:10px;">Application Not Found</h4>
                    <p style="font-family:var(--font-body);color:var(--color-body);margin-bottom:28px;">
                        We couldn't find an application with that reference.<br>Please check the reference number and try again.
                    </p>
                    <a href="{{ route('home') }}" class="pb-status__btn pb-status__btn--primary">
                        <i class="fas fa-home"></i> Back to Home
                    </a>
                </div>
            </div>
        </div>

        @elseif($application)
        @php
            $sc = [
                'pending'      => ['color'=>'#92400e', 'bg'=>'rgba(217,119,6,.09)',  'label'=>'Pending Review'],
                'under_review' => ['color'=>'var(--color-primary)', 'bg'=>'rgba(0,119,182,.07)', 'label'=>'Under Review'],
                'approved'     => ['color'=>'var(--color-success)', 'bg'=>'rgba(46,125,50,.08)', 'label'=>'Approved ✓'],
                'waitlist'     => ['color'=>'#0c5460', 'bg'=>'rgba(13,202,240,.07)', 'label'=>'Waiting List'],
                'rejected'     => ['color'=>'#7f1d1d', 'bg'=>'rgba(220,53,69,.07)', 'label'=>'Not Approved'],
            ][$application->status] ?? ['color'=>'var(--color-muted)', 'bg'=>'var(--color-card)', 'label'=>ucfirst($application->status)];
            $dc = $application->documentsCount();
        @endphp

        <div class="row gx-5">

            {{-- ════ LEFT — Details + Timeline ════ --}}
            <div class="col-lg-7 mb-5 mb-lg-0 wow itfadeUp" data-wow-duration=".9s">

                <span class="pb-status__subtitle">Enrolment Application</span>
                <h2 class="pb-status__heading">{{ $application->child_name }}</h2>
                <p class="pb-status__lead">
                    Track your enrolment application below. You'll be notified by email at each stage of the review process.
                </p>

                {{-- Details card --}}
                <div class="pb-status__card">
                    <div class="pb-status__section-title">Enrolment Details</div>
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <div class="pb-status__detail-label">Child</div>
                            <div class="pb-status__detail-value">{{ $application->child_name }}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pb-status__detail-label">Programme</div>
                            <div class="pb-status__detail-value">{{ $application->program_name }}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pb-status__detail-label">Fee Option</div>
                            <div class="pb-status__detail-value">{{ $application->fee_option_name }}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pb-status__detail-label">Requested Start</div>
                            <div class="pb-status__detail-value">{{ $application->start_date->format('d F Y') }}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pb-status__detail-label">Documents</div>
                            <div class="pb-status__detail-value">
                                @if($dc >= 4)
                                    <span style="color:var(--color-success);"><i class="fas fa-check-circle me-1"></i>Complete ({{ $dc }}/4)</span>
                                @elseif($dc > 0)
                                    <span style="color:var(--color-warm);"><i class="fas fa-exclamation-circle me-1"></i>{{ $dc }}/4 uploaded</span>
                                @else
                                    <span style="color:var(--color-muted);"><i class="fas fa-minus-circle me-1"></i>None uploaded</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pb-status__detail-label">Days Since Applied</div>
                            <div class="pb-status__detail-value">
                                {{ $application->daysWaiting() === 0 ? 'Today' : $application->daysWaiting() . ' day' . ($application->daysWaiting() === 1 ? '' : 's') }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Timeline card --}}
                <div class="pb-status__card wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".1s">
                    <div class="pb-status__section-title">Application Timeline</div>
                    <div class="pb-timeline">

                        <div class="pb-timeline__item">
                            <div class="pb-timeline__dot pb-timeline__dot--done" style="background:var(--color-primary);"></div>
                            <div class="pb-timeline__title">Application Submitted</div>
                            <div class="pb-timeline__meta">{{ $application->created_at->format('d M Y, H:i') }}</div>
                        </div>

                        <div class="pb-timeline__item">
                            <div class="pb-timeline__dot {{ $application->reviewed_at ? 'pb-timeline__dot--done' : '' }}"
                                 style="background:{{ $application->reviewed_at ? 'var(--color-primary)' : '#e5e7eb' }};"></div>
                            <div class="pb-timeline__title {{ !$application->reviewed_at ? 'pb-timeline__title--muted' : '' }}">Under Review</div>
                            <div class="pb-timeline__meta">
                                @if($application->reviewed_at) {{ $application->reviewed_at->format('d M Y') }}
                                @else Awaiting review — usually within 2 business days
                                @endif
                            </div>
                        </div>

                        @if($application->approved_at)
                        <div class="pb-timeline__item">
                            <div class="pb-timeline__dot pb-timeline__dot--success" style="background:var(--color-success);"></div>
                            <div class="pb-timeline__title" style="color:var(--color-success);">Application Approved</div>
                            <div class="pb-timeline__meta">{{ $application->approved_at->format('d M Y') }}</div>
                        </div>
                        @elseif($application->rejected_at)
                        <div class="pb-timeline__item">
                            <div class="pb-timeline__dot pb-timeline__dot--danger" style="background:var(--color-error);"></div>
                            <div class="pb-timeline__title" style="color:var(--color-error);">Not Approved</div>
                            <div class="pb-timeline__meta">{{ $application->rejected_at->format('d M Y') }}</div>
                        </div>
                        @elseif($application->status === 'waitlist')
                        <div class="pb-timeline__item">
                            <div class="pb-timeline__dot" style="background:#0097a7;box-shadow:0 0 0 2px #0097a7;"></div>
                            <div class="pb-timeline__title" style="color:#0097a7;">Added to Waiting List</div>
                            <div class="pb-timeline__meta">We'll contact you when a place becomes available.</div>
                        </div>
                        @else
                        <div class="pb-timeline__item">
                            <div class="pb-timeline__dot" style="background:#e5e7eb;"></div>
                            <div class="pb-timeline__title pb-timeline__title--muted">Awaiting Decision</div>
                            <div class="pb-timeline__meta">You will be notified by email.</div>
                        </div>
                        @endif

                        @if($application->invited_at)
                        <div class="pb-timeline__item">
                            <div class="pb-timeline__dot pb-timeline__dot--accent" style="background:var(--color-accent);"></div>
                            <div class="pb-timeline__title" style="color:var(--color-accent);">Portal Invitation Sent</div>
                            <div class="pb-timeline__meta">{{ $application->invited_at->format('d M Y') }} — check your email inbox</div>
                        </div>
                        @endif

                    </div>
                </div>

            </div>

            {{-- ════ RIGHT — Reference, Status alert, Contact ════ --}}
            <div class="col-lg-5 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".15s">

                {{-- Reference + status --}}
                <div class="pb-status__card">
                    <div class="pb-status__ref-block mb-4">
                        <span class="pb-status__ref-label">Application Reference</span>
                        <div class="pb-status__ref-code">{{ $application->reference }}</div>
                        <div class="pb-status__ref-date">Submitted {{ $application->created_at->format('d F Y') }}</div>
                    </div>
                    <div class="pb-status__section-title" style="margin-bottom:12px;">Current Status</div>
                    <span class="pb-status__badge-pill" style="background:{{ $sc['bg'] }};color:{{ $sc['color'] }};">
                        {{ $sc['label'] }}
                    </span>
                </div>

                {{-- Status message --}}
                @if($application->status === 'approved')
                <div class="pb-status__alert" style="background:rgba(46,125,50,.06);border-color:var(--color-success);">
                    <h5 style="color:var(--color-success);"><i class="fas fa-check-circle me-2"></i>Congratulations!</h5>
                    <p style="color:var(--color-success);">Your application has been approved.
                        @if($application->invited_at) Please check your email for the portal invitation to set up your parent account.
                        @else You will shortly receive a portal invitation to set up your parent account.
                        @endif
                    </p>
                </div>
                @elseif(in_array($application->status, ['pending', 'under_review']))
                <div class="pb-status__alert" style="background:rgba(0,119,182,.06);border-color:var(--color-primary);">
                    <h5 style="color:var(--color-primary);"><i class="fas fa-clock me-2"></i>In Review</h5>
                    <p style="color:var(--color-primary);">We're reviewing your application and will notify you by email within 2–3 business days.</p>
                </div>
                @elseif($application->status === 'waitlist')
                <div class="pb-status__alert" style="background:rgba(0,151,167,.06);border-color:#0097a7;">
                    <h5 style="color:#0c5460;"><i class="fas fa-list me-2"></i>On the Waiting List</h5>
                    <p style="color:#0c5460;">Your child is on our waiting list. We will contact you as soon as a place becomes available.</p>
                </div>
                @elseif($application->status === 'rejected')
                <div class="pb-status__alert" style="background:rgba(220,53,69,.06);border-color:var(--color-error);">
                    <h5 style="color:#7f1d1d;"><i class="fas fa-info-circle me-2"></i>Application Outcome</h5>
                    <p style="color:#7f1d1d;">We were unable to accept your application at this time. Please contact us if you have questions or would like to discuss reapplying.</p>
                </div>
                @endif

                {{-- Contact us card (matches contact page style) --}}
                <div class="pb-status__card">
                    <div class="pb-status__section-title">Need Help?</div>

                    <div class="pb-status__contact-item">
                        <div class="pb-status__contact-icon">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <div>
                            <span class="pb-status__contact-label">WhatsApp</span>
                            <div class="pb-status__contact-value">
                                <a href="https://wa.me/27828989967?text=Hi!%20I%20have%20a%20question%20about%20application%20{{ $application->reference }}"
                                   target="_blank" rel="noopener">082 898 9967</a>
                            </div>
                        </div>
                    </div>

                    <div class="pb-status__contact-item">
                        <div class="pb-status__contact-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <span class="pb-status__contact-label">Phone</span>
                            <div class="pb-status__contact-value">
                                <a href="tel:0215574999">021 557 4999</a>
                            </div>
                        </div>
                    </div>

                    <div class="pb-status__contact-item" style="margin-bottom:0;">
                        <div class="pb-status__contact-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <span class="pb-status__contact-label">Email</span>
                            <div class="pb-status__contact-value">
                                <a href="mailto:info@peekaboodaycare.co.za">info@peekaboodaycare.co.za</a>
                            </div>
                        </div>
                    </div>

                    <hr style="border-color:rgba(0,0,0,.07);margin:24px 0;">

                    <div class="d-flex flex-column gap-3">
                        <a href="https://wa.me/27828989967?text=Hi!%20I%20have%20a%20question%20about%20application%20{{ $application->reference }}"
                           class="pb-status__btn pb-status__btn--whatsapp w-100 justify-content-center" target="_blank" rel="noopener">
                            <i class="fab fa-whatsapp"></i> Contact Us on WhatsApp
                        </a>
                        <a href="{{ route('home') }}" class="pb-status__btn pb-status__btn--ghost w-100 justify-content-center">
                            <i class="fas fa-home"></i> Back to Home
                        </a>
                    </div>
                </div>

            </div>
        </div>
        @endif

    </div>
</section>
@endsection
