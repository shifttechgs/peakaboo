@extends('layouts.public')

@section('title', 'Enrol Your Child - Peekaboo Daycare')

@section('content')
<!-- Hero -->
<section class="py-5" style="background: linear-gradient(135deg, #B5D8EB 0%, #FFB5BA 100%); margin-top: 80px;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="display-4 fw-bold mb-4">Begin Your Child's Journey</h1>
                <p class="lead mb-0">Complete our simple online application in just 10 minutes. Your information is saved automatically.</p>
            </div>
        </div>
    </div>
</section>

<!-- Pre-Application Info -->
<section class="pk-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- What You'll Need -->
                <div class="bg-white rounded-4 shadow-sm p-5 mb-5">
                    <h3 class="fw-bold mb-4"><i class="fas fa-clipboard-list text-primary me-2"></i> What You'll Need</h3>
                    <p class="text-muted mb-4">Please have the following ready before starting your application:</p>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex gap-3">
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px;">
                                    <i class="fas fa-baby text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Child's Information</h6>
                                    <small class="text-muted">Full name, date of birth, ID/passport number</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex gap-3">
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px;">
                                    <i class="fas fa-user-friends text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Parent/Guardian Details</h6>
                                    <small class="text-muted">Contact info, ID numbers, occupation</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex gap-3">
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px;">
                                    <i class="fas fa-medkit text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Medical Information</h6>
                                    <small class="text-muted">Allergies, medical aid, doctor details</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex gap-3">
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px;">
                                    <i class="fas fa-file-upload text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Documents (Optional now)</h6>
                                    <small class="text-muted">Birth certificate, ID copies, proof of address</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fee Summary -->
                <div class="bg-white rounded-4 shadow-sm p-5 mb-5">
                    <h3 class="fw-bold mb-4"><i class="fas fa-calculator text-primary me-2"></i> Fee Options</h3>

                    <div class="row g-4">
                        @foreach($fees as $fee)
                        @if(!isset($fee['addon']))
                        <div class="col-md-6">
                            <div class="border rounded-3 p-4 h-100 {{ $fee['popular'] ? 'border-primary bg-primary bg-opacity-10' : '' }}">
                                @if($fee['popular'])
                                <span class="badge bg-primary mb-2">Recommended</span>
                                @endif
                                <h5 class="fw-bold">{{ $fee['name'] }}</h5>
                                <p class="text-muted small mb-2">{{ $fee['hours'] }}</p>
                                <div class="h3 text-primary fw-bold">R{{ number_format($fee['price']) }}<small class="text-muted fw-normal">/month</small></div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>

                    <div class="alert alert-info mt-4 mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Registration fee:</strong> R500 non-refundable deposit required upon acceptance.
                        <strong>Sibling discount</strong> available for families with multiple children.
                    </div>
                </div>

                <!-- Application Steps -->
                <div class="bg-white rounded-4 shadow-sm p-5 mb-5">
                    <h3 class="fw-bold mb-4"><i class="fas fa-route text-primary me-2"></i> Application Process</h3>

                    <div class="row">
                        <div class="col-md-3 text-center mb-4 mb-md-0">
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; font-size: 1.5rem;">1</div>
                            <h6 class="fw-bold">Complete Form</h6>
                            <small class="text-muted">Fill in child & parent details</small>
                        </div>
                        <div class="col-md-3 text-center mb-4 mb-md-0">
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; font-size: 1.5rem;">2</div>
                            <h6 class="fw-bold">Review</h6>
                            <small class="text-muted">We review your application</small>
                        </div>
                        <div class="col-md-3 text-center mb-4 mb-md-0">
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; font-size: 1.5rem;">3</div>
                            <h6 class="fw-bold">Visit</h6>
                            <small class="text-muted">Meet us & tour the school</small>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; font-size: 1.5rem;">4</div>
                            <h6 class="fw-bold">Enrol</h6>
                            <small class="text-muted">Complete registration</small>
                        </div>
                    </div>
                </div>

                <!-- Start Button -->
                <div class="text-center">
                    <a href="{{ route('enrol.form') }}" class="pk-btn-primary btn-lg px-5 py-3">
                        <i class="fas fa-play-circle me-2"></i> Start Application
                    </a>
                    <p class="text-muted mt-3 mb-0">
                        <i class="fas fa-shield-alt me-1"></i> Your data is secure and protected
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
