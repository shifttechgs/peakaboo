@extends('layouts.public')

@section('title', 'Application Submitted - Peekaboo Daycare')

@section('content')
<section class="pk-section" style="margin-top: 100px; min-height: 80vh; display: flex; align-items: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="mb-5">
                    <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                        <i class="fas fa-check fa-4x"></i>
                    </div>
                    <h1 class="display-4 fw-bold mb-3">Application Submitted!</h1>
                    <p class="lead text-muted mb-4">Thank you for choosing Peekaboo Daycare & Preschool. We've received your application and will be in touch soon.</p>
                </div>

                <div class="bg-white rounded-4 shadow-sm p-5 mb-5">
                    <h4 class="mb-4">Your Application Reference</h4>
                    <div class="bg-primary bg-opacity-10 rounded-3 p-4 mb-4">
                        <span class="h2 text-primary fw-bold">{{ $applicationId }}</span>
                    </div>
                    <p class="text-muted mb-0">Please save this reference number for tracking your application status.</p>
                </div>

                <div class="bg-white rounded-4 shadow-sm p-5 mb-5">
                    <h4 class="mb-4">What Happens Next?</h4>
                    <div class="row g-4 text-start">
                        <div class="col-md-4">
                            <div class="d-flex gap-3">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">1</div>
                                <div>
                                    <h6 class="fw-bold">Email Confirmation</h6>
                                    <small class="text-muted">You'll receive an email confirmation shortly</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex gap-3">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">2</div>
                                <div>
                                    <h6 class="fw-bold">Application Review</h6>
                                    <small class="text-muted">We'll review your application within 48 hours</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex gap-3">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">3</div>
                                <div>
                                    <h6 class="fw-bold">We'll Contact You</h6>
                                    <small class="text-muted">To schedule a tour and discuss next steps</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="{{ route('home') }}" class="pk-btn-secondary">
                        <i class="fas fa-home me-2"></i> Back to Home
                    </a>
                    <a href="{{ route('enrol.status', $applicationId) }}" class="pk-btn-primary">
                        <i class="fas fa-search me-2"></i> Track Application
                    </a>
                </div>

                <p class="mt-5 text-muted">
                    Questions? Contact us at <a href="tel:0215574999">021 557 4999</a> or
                    <a href="https://wa.me/27828989967" target="_blank">WhatsApp us</a>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
