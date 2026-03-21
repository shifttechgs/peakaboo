@extends('layouts.public')

@section('title', 'Application Status - Peekaboo Daycare & Preschool')

@section('content')
<style>
/* ============================================================
   APPLICATION STATUS — Peekaboo (Brand-consistent, flat design)
============================================================ */

.pb-status {
    padding: 100px 0 80px;
}
.pb-status__heading {
    font-family: var(--font-heading);
    font-size: 2.4rem;
    font-weight: 800;
    color: var(--color-text);
    margin-bottom: 8px;
}
.pb-status__subheading {
    font-family: var(--font-body);
    font-size: 16px;
    color: var(--color-body);
}

/* ── Cards ── */
.pb-status__card {
    background: #fff;
    border-radius: var(--radius-lg);
    padding: 36px;
    margin-bottom: 20px;
}

/* ── Reference ── */
.pb-status__ref-label {
    font-family: var(--font-body);
    font-size: 12px;
    font-weight: 700;
    color: var(--color-muted);
    text-transform: uppercase;
    letter-spacing: 1.2px;
    margin-bottom: 4px;
}
.pb-status__ref-code {
    font-family: 'Courier New', monospace;
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--color-text);
    letter-spacing: 2px;
}
.pb-status__ref-date {
    font-family: var(--font-body);
    font-size: 14px;
    color: var(--color-muted);
    margin-top: 2px;
}

/* ── Status Badge ── */
.pb-status__badge {
    display: inline-block;
    padding: 10px 20px;
    border-radius: var(--radius-pill);
    font-family: var(--font-body);
    font-weight: 700;
    font-size: 15px;
}

/* ── Detail Grid ── */
.pb-status__detail-label {
    font-family: var(--font-body);
    font-size: 12px;
    font-weight: 700;
    color: var(--color-muted);
    text-transform: uppercase;
    letter-spacing: 1px;
}
.pb-status__detail-value {
    font-family: var(--font-body);
    font-weight: 600;
    color: var(--color-text);
}

/* ── Timeline ── */
.pb-timeline {
    position: relative;
    padding-left: 28px;
}
.pb-timeline::before {
    content: '';
    position: absolute;
    left: 7px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e0e4e8;
}
.pb-timeline__item {
    position: relative;
    padding-bottom: 22px;
}
.pb-timeline__item:last-child {
    padding-bottom: 0;
}
.pb-timeline__marker {
    position: absolute;
    left: -25px;
    top: 4px;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    border: 2px solid #fff;
    outline: 2px solid #e0e4e8;
}
.pb-timeline__marker--active {
    outline-color: var(--color-primary);
}
.pb-timeline__title {
    font-family: var(--font-body);
    font-weight: 600;
    color: var(--color-text);
}
.pb-timeline__date {
    font-family: var(--font-body);
    font-size: 14px;
    color: var(--color-muted);
}

/* ── Status Alerts ── */
.pb-status__alert {
    border-radius: var(--radius-md);
    padding: 20px 24px;
    margin-bottom: 20px;
    border-left: 4px solid;
}
.pb-status__alert h5 {
    font-family: var(--font-heading);
    font-weight: 700;
    font-size: 1.2rem;
    margin-bottom: 8px;
}
.pb-status__alert p {
    font-family: var(--font-body);
    font-size: 16px;
    margin: 0;
}

/* ── Buttons ── */
.pb-status__btn {
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
.pb-status__btn--primary {
    background: var(--color-primary);
    color: #fff;
}
.pb-status__btn--primary:hover {
    background: var(--color-primary-dk);
    color: #fff;
}
.pb-status__btn--whatsapp {
    background: var(--color-whatsapp);
    color: #fff;
}
.pb-status__btn--whatsapp:hover {
    background: #1ebd5a;
    color: #fff;
}

/* ── Not Found ── */
.pb-status__empty {
    background: #fff;
    border-radius: var(--radius-lg);
    padding: 60px 40px;
    text-align: center;
}
.pb-status__empty i {
    color: #e0e4e8;
    margin-bottom: 20px;
}
.pb-status__empty h4 {
    font-family: var(--font-heading);
    color: var(--color-text);
    font-weight: 700;
    margin-bottom: 12px;
}
.pb-status__empty p {
    font-family: var(--font-body);
    color: var(--color-body);
    margin-bottom: 24px;
}

/* ── Responsive ── */
@media (max-width: 575px) {
    .pb-status { padding: 80px 0 60px; }
    .pb-status__heading { font-size: 1.8rem; }
    .pb-status__card { padding: 28px 20px; }
}
</style>

<section class="pb-status">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">

                <div class="text-center mb-5 wow itfadeUp" data-wow-duration=".9s">
                    <h1 class="pb-status__heading">Application Status</h1>
                    <p class="pb-status__subheading">Track the progress of your enrolment application</p>
                </div>

                @if(isset($notFound) && $notFound)
                {{-- Not found state --}}
                <div class="pb-status__empty wow itfadeUp" data-wow-duration=".9s">
                    <i class="fas fa-search fa-3x"></i>
                    <h4>Application Not Found</h4>
                    <p>We couldn't find an application with that reference. Please check the reference number and try again.</p>
                    <a href="{{ route('home') }}" class="pb-status__btn pb-status__btn--primary">
                        <i class="fas fa-home"></i> Back to Home
                    </a>
                </div>

                @elseif($application)
                {{-- Application found --}}
                @php
                    $statusConfig = [
                        'pending'      => ['color' => '#856404', 'bg' => 'rgba(209,129,9,0.1)', 'label' => 'Pending Review'],
                        'under_review' => ['color' => 'var(--color-primary)', 'bg' => 'rgba(0,119,182,0.08)', 'label' => 'Under Review'],
                        'approved'     => ['color' => 'var(--color-success)', 'bg' => 'rgba(46,125,50,0.08)', 'label' => 'Approved ✓'],
                        'waitlist'     => ['color' => '#0c5460', 'bg' => 'rgba(13,202,240,0.08)', 'label' => 'Waiting List'],
                        'rejected'     => ['color' => '#721c24', 'bg' => 'rgba(220,53,69,0.08)', 'label' => 'Not Approved'],
                    ];
                    $sc = $statusConfig[$application->status] ?? ['color' => 'var(--color-muted)', 'bg' => 'var(--color-surface)', 'label' => ucfirst($application->status)];
                @endphp

                {{-- Header card --}}
                <div class="pb-status__card wow itfadeUp" data-wow-duration=".9s">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
                        <div>
                            <div class="pb-status__ref-label">Application Reference</div>
                            <div class="pb-status__ref-code">{{ $application->reference }}</div>
                            <div class="pb-status__ref-date">Submitted {{ $application->created_at->format('d F Y') }}</div>
                        </div>
                        <div>
                            <span class="pb-status__badge" style="background: {{ $sc['bg'] }}; color: {{ $sc['color'] }};">
                                {{ $sc['label'] }}
                            </span>
                        </div>
                    </div>

                    <hr style="border-color: #e0e4e8;">

                    <div class="row g-3">
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
                                @php $dc = $application->documentsCount(); @endphp
                                @if($dc >= 3)
                                    <span style="color: var(--color-success);"><i class="fas fa-check-circle me-1"></i>{{ $dc }}/4 uploaded</span>
                                @else
                                    <span style="color: var(--color-warm);"><i class="fas fa-exclamation-circle me-1"></i>{{ $dc }}/4 uploaded</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pb-status__detail-label">Days Since Applied</div>
                            <div class="pb-status__detail-value">{{ $application->daysWaiting() === 0 ? 'Today' : $application->daysWaiting() . ' days' }}</div>
                        </div>
                    </div>
                </div>

                {{-- Timeline --}}
                <div class="pb-status__card wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".1s">
                    <h5 style="font-family: var(--font-heading); font-weight: 700; color: var(--color-text); margin-bottom: 24px;">Application Timeline</h5>
                    <div class="pb-timeline">
                        <div class="pb-timeline__item">
                            <div class="pb-timeline__marker pb-timeline__marker--active" style="background: var(--color-primary);"></div>
                            <div>
                                <div class="pb-timeline__title">Application Submitted</div>
                                <div class="pb-timeline__date">{{ $application->created_at->format('d M Y H:i') }}</div>
                            </div>
                        </div>
                        <div class="pb-timeline__item">
                            <div class="pb-timeline__marker {{ $application->reviewed_at ? 'pb-timeline__marker--active' : '' }}" style="background: {{ $application->reviewed_at ? 'var(--color-primary)' : '#e0e4e8' }};"></div>
                            <div>
                                <div class="pb-timeline__title {{ !$application->reviewed_at ? 'text-muted' : '' }}">Under Review</div>
                                <div class="pb-timeline__date">
                                    @if($application->reviewed_at)
                                        {{ $application->reviewed_at->format('d M Y') }}
                                    @else
                                        Awaiting review — usually within 2 business days
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if($application->approved_at)
                        <div class="pb-timeline__item">
                            <div class="pb-timeline__marker pb-timeline__marker--active" style="background: var(--color-success);"></div>
                            <div>
                                <div class="pb-timeline__title">Application Approved</div>
                                <div class="pb-timeline__date">{{ $application->approved_at->format('d M Y') }}</div>
                            </div>
                        </div>
                        @elseif($application->rejected_at)
                        <div class="pb-timeline__item">
                            <div class="pb-timeline__marker" style="background: #dc3545;"></div>
                            <div>
                                <div class="pb-timeline__title" style="color: #dc3545;">Not Approved</div>
                                <div class="pb-timeline__date">{{ $application->rejected_at->format('d M Y') }}</div>
                            </div>
                        </div>
                        @elseif($application->status === 'waitlist')
                        <div class="pb-timeline__item">
                            <div class="pb-timeline__marker" style="background: #0dcaf0;"></div>
                            <div>
                                <div class="pb-timeline__title">Added to Waiting List</div>
                                <div class="pb-timeline__date">We'll contact you when a place becomes available.</div>
                            </div>
                        </div>
                        @else
                        <div class="pb-timeline__item">
                            <div class="pb-timeline__marker" style="background: #e0e4e8;"></div>
                            <div>
                                <div class="pb-timeline__title text-muted">Awaiting Decision</div>
                                <div class="pb-timeline__date">You will be notified by email.</div>
                            </div>
                        </div>
                        @endif

                        @if($application->invited_at)
                        <div class="pb-timeline__item">
                            <div class="pb-timeline__marker pb-timeline__marker--active" style="background: var(--color-accent);"></div>
                            <div>
                                <div class="pb-timeline__title">Portal Invitation Sent</div>
                                <div class="pb-timeline__date">{{ $application->invited_at->format('d M Y') }} — check your email inbox</div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- Status message --}}
                @if($application->status === 'approved')
                <div class="pb-status__alert" style="background: rgba(46,125,50,0.06); border-color: var(--color-success);">
                    <h5 style="color: var(--color-success);"><i class="fas fa-check-circle me-2"></i>Congratulations!</h5>
                    <p style="color: var(--color-success);">
                        Your application has been approved.
                        @if($application->invited_at)
                            Please check your email for the portal invitation to set up your parent account.
                        @else
                            You will shortly receive a portal invitation to set up your parent account.
                        @endif
                    </p>
                </div>
                @elseif(in_array($application->status, ['pending', 'under_review']))
                <div class="pb-status__alert" style="background: rgba(0,119,182,0.06); border-color: var(--color-primary);">
                    <h5 style="color: var(--color-primary);"><i class="fas fa-clock me-2"></i>Under Review</h5>
                    <p style="color: var(--color-primary);">We're reviewing your application and will notify you by email within 2–3 business days.</p>
                </div>
                @elseif($application->status === 'waitlist')
                <div class="pb-status__alert" style="background: rgba(13,202,240,0.06); border-color: #0dcaf0;">
                    <h5 style="color: #0c5460;"><i class="fas fa-list me-2"></i>On the Waiting List</h5>
                    <p style="color: #0c5460;">Your child is on our waiting list. We will contact you as soon as a place becomes available.</p>
                </div>
                @elseif($application->status === 'rejected')
                <div class="pb-status__alert" style="background: rgba(220,53,69,0.06); border-color: #dc3545;">
                    <h5 style="color: #721c24;"><i class="fas fa-info-circle me-2"></i>Application Outcome</h5>
                    <p style="color: #721c24;">We were unable to accept your application at this time. Please contact us if you have questions or would like to reapply.</p>
                </div>
                @endif

                <div class="text-center d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ route('home') }}" class="pb-status__btn pb-status__btn--primary">
                        <i class="fas fa-home"></i> Back to Home
                    </a>
                    <a href="https://wa.me/27828989967?text=Hi!%20Checking%20on%20application%20{{ $application->reference }}"
                       class="pb-status__btn pb-status__btn--whatsapp" target="_blank" rel="noopener">
                        <i class="fab fa-whatsapp"></i> Contact Us
                    </a>
                </div>
                @endif

            </div>
        </div>
    </div>
</section>
@endsection
