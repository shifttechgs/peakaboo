@extends('layouts.public')

@section('title', 'Application Status - Peekaboo Early Learning Centre')

@section('content')
<section style="margin-top: 100px; padding: 60px 0 80px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">

                <div class="text-center mb-5">
                    <h1 class="fw-bold" style="color:#4A2559;">Application Status</h1>
                    <p style="color:#6c757d;">Track the progress of your enrolment application</p>
                </div>

                @if(isset($notFound) && $notFound)
                {{-- Not found state --}}
                <div class="text-center py-5" style="background:white;border-radius:16px;padding:40px;box-shadow:0 2px 20px rgba(0,0,0,0.07);">
                    <i class="fas fa-search fa-3x mb-3" style="color:#dee2e6;"></i>
                    <h4 style="color:#4A2559;">Application Not Found</h4>
                    <p style="color:#6c757d;">We couldn't find an application with that reference. Please check the reference number and try again.</p>
                    <a href="{{ route('home') }}" class="vs-btn" style="display:inline-block;">
                        <span class="vs-btn__border"></span>
                        <i class="fas fa-home me-2"></i>Back to Home
                    </a>
                </div>

                @elseif($application)
                {{-- Application found --}}
                @php
                    $statusConfig = [
                        'pending'      => ['color' => '#D18109', 'bg' => '#fff3cd', 'label' => 'Pending Review'],
                        'under_review' => ['color' => '#0c508e', 'bg' => '#e8f0f8', 'label' => 'Under Review'],
                        'approved'     => ['color' => '#155724', 'bg' => '#d4edda', 'label' => 'Approved ✓'],
                        'waitlist'     => ['color' => '#0c5460', 'bg' => '#d1ecf1', 'label' => 'Waiting List'],
                        'rejected'     => ['color' => '#721c24', 'bg' => '#f8d7da', 'label' => 'Not Approved'],
                    ];
                    $sc = $statusConfig[$application->status] ?? ['color' => '#6c757d', 'bg' => '#f8f9fa', 'label' => ucfirst($application->status)];
                @endphp

                {{-- Header card --}}
                <div style="background:white;border-radius:16px;padding:32px;box-shadow:0 2px 20px rgba(0,0,0,0.07);margin-bottom:20px;">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
                        <div>
                            <div style="font-size:0.75rem;color:#9ca3af;font-weight:600;text-transform:uppercase;letter-spacing:1px;margin-bottom:4px;">Application Reference</div>
                            <div style="font-family:'Courier New',monospace;font-size:1.4rem;font-weight:700;color:#4A2559;letter-spacing:2px;">
                                {{ $application->reference }}
                            </div>
                            <div style="font-size:0.82rem;color:#9ca3af;margin-top:2px;">
                                Submitted {{ $application->created_at->format('d F Y') }}
                            </div>
                        </div>
                        <div>
                            <span style="background:{{ $sc['bg'] }};color:{{ $sc['color'] }};padding:10px 20px;border-radius:25px;font-weight:700;font-size:0.9rem;display:inline-block;">
                                {{ $sc['label'] }}
                            </span>
                        </div>
                    </div>

                    <hr style="border-color:#f0f0f5;">

                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div style="font-size:0.75rem;color:#9ca3af;">Child</div>
                            <div class="fw-semibold">{{ $application->child_name }}</div>
                        </div>
                        <div class="col-sm-6">
                            <div style="font-size:0.75rem;color:#9ca3af;">Programme</div>
                            <div class="fw-semibold">{{ $application->program_name }}</div>
                        </div>
                        <div class="col-sm-6">
                            <div style="font-size:0.75rem;color:#9ca3af;">Fee Option</div>
                            <div class="fw-semibold">{{ $application->fee_option_name }}</div>
                        </div>
                        <div class="col-sm-6">
                            <div style="font-size:0.75rem;color:#9ca3af;">Requested Start</div>
                            <div class="fw-semibold">{{ $application->start_date->format('d F Y') }}</div>
                        </div>
                        <div class="col-sm-6">
                            <div style="font-size:0.75rem;color:#9ca3af;">Documents</div>
                            <div class="fw-semibold">
                                @php $dc = $application->documentsCount(); @endphp
                                @if($dc >= 3)
                                    <span style="color:#155724;"><i class="fas fa-check-circle me-1"></i>{{ $dc }}/4 uploaded</span>
                                @else
                                    <span style="color:#856404;"><i class="fas fa-exclamation-circle me-1"></i>{{ $dc }}/4 uploaded</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div style="font-size:0.75rem;color:#9ca3af;">Days Since Applied</div>
                            <div class="fw-semibold">{{ $application->daysWaiting() === 0 ? 'Today' : $application->daysWaiting() . ' days' }}</div>
                        </div>
                    </div>
                </div>

                {{-- Timeline --}}
                <div style="background:white;border-radius:16px;padding:32px;box-shadow:0 2px 20px rgba(0,0,0,0.07);margin-bottom:20px;">
                    <h5 class="fw-bold mb-4" style="color:#4A2559;">Application Timeline</h5>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker" style="background:#0c508e;"></div>
                            <div class="timeline-content">
                                <div class="fw-semibold">Application Submitted</div>
                                <small style="color:#9ca3af;">{{ $application->created_at->format('d M Y H:i') }}</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker" style="background:{{ $application->reviewed_at ? '#0c508e' : '#dee2e6' }};"></div>
                            <div class="timeline-content">
                                <div class="fw-semibold {{ !$application->reviewed_at ? 'text-muted' : '' }}">Under Review</div>
                                <small style="color:#9ca3af;">
                                    @if($application->reviewed_at)
                                        {{ $application->reviewed_at->format('d M Y') }}
                                    @else
                                        Awaiting review — usually within 2 business days
                                    @endif
                                </small>
                            </div>
                        </div>
                        @if($application->approved_at)
                        <div class="timeline-item">
                            <div class="timeline-marker" style="background:#28a745;"></div>
                            <div class="timeline-content">
                                <div class="fw-semibold">Application Approved</div>
                                <small style="color:#9ca3af;">{{ $application->approved_at->format('d M Y') }}</small>
                            </div>
                        </div>
                        @elseif($application->rejected_at)
                        <div class="timeline-item">
                            <div class="timeline-marker" style="background:#dc3545;"></div>
                            <div class="timeline-content">
                                <div class="fw-semibold text-danger">Not Approved</div>
                                <small style="color:#9ca3af;">{{ $application->rejected_at->format('d M Y') }}</small>
                            </div>
                        </div>
                        @elseif($application->status === 'waitlist')
                        <div class="timeline-item">
                            <div class="timeline-marker" style="background:#17a2b8;"></div>
                            <div class="timeline-content">
                                <div class="fw-semibold">Added to Waiting List</div>
                                <small style="color:#9ca3af;">We'll contact you when a place becomes available.</small>
                            </div>
                        </div>
                        @else
                        <div class="timeline-item">
                            <div class="timeline-marker" style="background:#dee2e6;"></div>
                            <div class="timeline-content text-muted">
                                <div class="fw-semibold">Awaiting Decision</div>
                                <small>You will be notified by email.</small>
                            </div>
                        </div>
                        @endif

                        @if($application->invited_at)
                        <div class="timeline-item">
                            <div class="timeline-marker" style="background:#4A2559;"></div>
                            <div class="timeline-content">
                                <div class="fw-semibold">Portal Invitation Sent</div>
                                <small style="color:#9ca3af;">{{ $application->invited_at->format('d M Y') }} — check your email inbox</small>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- Status message --}}
                @if($application->status === 'approved')
                <div style="background:#d4edda;border-left:4px solid #28a745;border-radius:10px;padding:20px 24px;margin-bottom:20px;">
                    <h5 style="color:#155724;"><i class="fas fa-check-circle me-2"></i>Congratulations!</h5>
                    <p style="color:#155724;margin:0;">
                        Your application has been approved.
                        @if($application->invited_at)
                            Please check your email for the portal invitation to set up your parent account.
                        @else
                            You will shortly receive a portal invitation to set up your parent account.
                        @endif
                    </p>
                </div>
                @elseif(in_array($application->status, ['pending', 'under_review']))
                <div style="background:#e8f0f8;border-left:4px solid #0c508e;border-radius:10px;padding:20px 24px;margin-bottom:20px;">
                    <h5 style="color:#0c508e;"><i class="fas fa-clock me-2"></i>Under Review</h5>
                    <p style="color:#0c508e;margin:0;">We're reviewing your application and will notify you by email within 2–3 business days.</p>
                </div>
                @elseif($application->status === 'waitlist')
                <div style="background:#d1ecf1;border-left:4px solid #17a2b8;border-radius:10px;padding:20px 24px;margin-bottom:20px;">
                    <h5 style="color:#0c5460;"><i class="fas fa-list me-2"></i>On the Waiting List</h5>
                    <p style="color:#0c5460;margin:0;">Your child is on our waiting list. We will contact you as soon as a place becomes available.</p>
                </div>
                @elseif($application->status === 'rejected')
                <div style="background:#f8d7da;border-left:4px solid #dc3545;border-radius:10px;padding:20px 24px;margin-bottom:20px;">
                    <h5 style="color:#721c24;"><i class="fas fa-info-circle me-2"></i>Application Outcome</h5>
                    <p style="color:#721c24;margin:0;">We were unable to accept your application at this time. Please contact us if you have questions or would like to reapply.</p>
                </div>
                @endif

                <div class="text-center d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ route('home') }}" class="vs-btn style4" style="display:inline-block;">
                        <span class="vs-btn__border"></span>
                        <i class="fas fa-home me-2"></i>Back to Home
                    </a>
                    <a href="https://wa.me/27828989967?text=Hi!%20Checking%20on%20application%20{{ $application->reference }}"
                       class="vs-btn" style="display:inline-block;" target="_blank">
                        <span class="vs-btn__border"></span>
                        <i class="fab fa-whatsapp me-2"></i>Contact Us
                    </a>
                </div>
                @endif

            </div>
        </div>
    </div>
</section>

<style>
.timeline { position: relative; padding-left: 28px; }
.timeline::before { content: ''; position: absolute; left: 7px; top: 0; bottom: 0; width: 2px; background: #e9ecef; }
.timeline-item { position: relative; padding-bottom: 22px; }
.timeline-item:last-child { padding-bottom: 0; }
.timeline-marker { position: absolute; left: -25px; top: 4px; width: 14px; height: 14px; border-radius: 50%; border: 2px solid white; box-shadow: 0 0 0 2px #dee2e6; }
</style>
@endsection
