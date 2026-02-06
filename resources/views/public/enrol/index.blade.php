@extends('layouts.public')

@section('title', 'Enrol Your Child - Peekaboo Daycare')

@section('content')
<!-- Hero -->
<section class="py-2" style="background: linear-gradient(135deg, #B5D8EB 0%, #FFB5BA 100%); margin-top: 10px; position: relative; overflow: hidden;">
    <img src="{{ asset('assets/img/elements/service-ele-1.svg') }}" alt="decorative element" style="position: absolute; left: -50px; bottom: -20px; width: 150px; opacity: 0.3;">
    <img src="{{ asset('assets/img/elements/service-ele-2.svg') }}" alt="decorative element" style="position: absolute; right: -50px; top: -20px; width: 130px; opacity: 0.3;">
    <div class="container py-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 text-center text-lg-start mb-3 mb-lg-0 wow animate__fadeInUp" data-wow-delay="0.25s">
                <span style="background: #0c508e; color: white; padding: 6px 16px; border-radius: 25px; display: inline-block; font-weight: 600; font-size: 13px; margin-bottom: 15px;">
                    <i class="fas fa-heart me-2"></i>Join Our Peekaboo Family
                </span>
                <h1 class="fw-bold mb-3" style="color: #4A2559; font-size: 2.5rem;">Begin Your Child's Journey</h1>
                <p class="mb-4" style="color: #2d3748; font-size: 1.5rem;">Complete our simple online application in just 10 minutes. Your information is saved automatically.</p>
                <a href="{{ route('enrol.form') }}" class="vs-btn" style="display: inline-flex; align-items: center; gap: 10px;">
                    <span class="vs-btn__border"></span>
                    <i class="fas fa-paper-plane"></i>Start Application Now
                </a>
            </div>
            <div class="col-lg-6 wow animate__fadeInUp" data-wow-delay="0.35s">
                <div style="position: relative; max-width: 450px; margin: 0 auto;">
                    <img src="{{ asset('assets/img/about/vs-about-h1-2.jpg') }}" alt="Happy children at Peekaboo" style="width: 100%; border-radius: 20px; box-shadow: 0 15px 40px rgba(0,0,0,0.12);">
                    <div style="position: absolute; bottom: -15px; right: -15px; background: white; padding: 15px 20px; border-radius: 12px; box-shadow: 0 8px 30px rgba(0,0,0,0.12);">
                        <div style="font-size: 2rem; font-weight: 700; color: #0c508e; line-height: 1;">{{ date('Y') - 2010 }}+</div>
                        <div style="color: #666; font-size: 0.8rem; font-weight: 600;">Years of Care</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pre-Application Info -->
<section class="space overflow-hidden" data-bg-src="{{ asset('assets/img/about/vs-about-h1-bg.png') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- What You'll Need -->
                <div class="bg-white rounded-4 shadow-sm p-5 mb-5 wow animate__fadeInUp" data-wow-delay="0.25s" style="border: 2px solid #f9f6f2;">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <span class="vs-service__icon" style="flex-shrink: 0;">
                            <img src="{{ asset('assets/img/icons/service-icon-1-1.svg') }}" alt="checklist icon" style="width: 60px; height: 60px;">
                        </span>
                        <div>
                            <h3 class="fw-bold mb-0" style="color: #4A2559;">What You'll Need</h3>
                            <p class="text-muted mb-0">Have these ready before starting</p>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex gap-3 p-3 rounded-3" style="background: #f9f6f2; border-left: 4px solid #0c508e; transition: all 0.3s;" onmouseover="this.style.transform='translateX(5px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)';" onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow='none';">
                                <div style="width: 50px; height: 50px; background: #0c508e; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <i class="fas fa-baby" style="color: white; font-size: 1.4rem;"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1" style="color: #4A2559;">Child's Information</h6>
                                    <small class="text-muted">Full name, date of birth, ID/passport number</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex gap-3 p-3 rounded-3" style="background: #f9f6f2; border-left: 4px solid #D18109; transition: all 0.3s;" onmouseover="this.style.transform='translateX(5px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)';" onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow='none';">
                                <div style="width: 50px; height: 50px; background: #D18109; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <i class="fas fa-user-friends" style="color: white; font-size: 1.4rem;"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1" style="color: #4A2559;">Parent/Guardian Details</h6>
                                    <small class="text-muted">Contact info, ID numbers, occupation</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex gap-3 p-3 rounded-3" style="background: #f9f6f2; border-left: 4px solid #70167E; transition: all 0.3s;" onmouseover="this.style.transform='translateX(5px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)';" onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow='none';">
                                <div style="width: 50px; height: 50px; background: #70167E; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <i class="fas fa-medkit" style="color: white; font-size: 1.4rem;"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1" style="color: #4A2559;">Medical Information</h6>
                                    <small class="text-muted">Allergies, medical aid, doctor details</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex gap-3 p-3 rounded-3" style="background: #f9f6f2; border-left: 4px solid #e91e63; transition: all 0.3s;" onmouseover="this.style.transform='translateX(5px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)';" onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow='none';">
                                <div style="width: 50px; height: 50px; background: #e91e63; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <i class="fas fa-file-upload" style="color: white; font-size: 1.4rem;"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1" style="color: #4A2559;">Documents (Optional now)</h6>
                                    <small class="text-muted">Birth certificate, ID copies, proof of address</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fee Summary with Image -->
                <div class="bg-white rounded-4 shadow-sm p-5 mb-5 wow animate__fadeInUp" data-wow-delay="0.35s" style="border: 2px solid #f9f6f2;">
                    <div class="row align-items-center mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="d-flex align-items-center gap-3">
                                <span class="vs-service__icon" style="flex-shrink: 0;">
                                    <img src="{{ asset('assets/img/icons/service-icon-1-3.svg') }}" alt="calculator icon" style="width: 60px; height: 60px;">
                                </span>
                                <div>
                                    <h3 class="fw-bold mb-0" style="color: #4A2559;">Fee Options</h3>
                                    <p class="text-muted mb-0">Affordable, quality care</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('assets/img/service/s-1-4.jpg') }}" alt="Children learning" style="width: 100%; height: 150px; object-fit: cover; border-radius: 16px;">
                        </div>
                    </div>

                    <div class="row g-4">
                        @foreach($fees as $fee)
                            @if(!isset($fee['addon']))
                                <div class="col-md-6">
                                    <div style="border-radius: 20px; padding: 30px; height: 100%; border: {{ $fee['popular'] ? '3px solid #0c508e' : '2px solid #e8e5ef' }}; background: {{ $fee['popular'] ? '#f9f6f2' : '#fff' }}; box-shadow: 0 8px 30px rgba(0,0,0,{{ $fee['popular'] ? '0.1' : '0.05' }}); position: relative; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 16px 48px rgba(12,80,142,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 30px rgba(0,0,0,{{ $fee['popular'] ? '0.1' : '0.05' }})';">

                                        @if($fee['popular'])
                                            <span style="position: absolute; top: -14px; right: 20px; background: #0c508e; color: #fff; padding: 8px 20px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; box-shadow: 0 4px 16px rgba(12,80,142,0.3); letter-spacing: 0.5px;">
                                                <i class="fas fa-star me-1"></i>Recommended
                                            </span>
                                        @endif

                                        <h5 class="fw-bold" style="margin-top: {{ $fee['popular'] ? '24px' : '0' }}; color: #4A2559; font-size: 1.4rem; margin-bottom: 8px;">
                                            {{ $fee['name'] }}
                                        </h5>
                                        <p class="text-muted mb-3">{{ $fee['hours'] }}</p>
                                        <div style="font-size: 2.2rem; font-weight: 700; color: #0c508e; line-height: 1;">
                                            R{{ number_format($fee['price']) }}
                                            <small style="font-size: 1rem; color: #999; font-weight: 500;">/month</small>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="mt-4 p-4 rounded-3" style="background: linear-gradient(135deg, rgba(181,216,235,0.2), rgba(255,181,186,0.2)); border-left: 4px solid #0c508e;">
                        <i class="fas fa-info-circle me-2" style="color: #0c508e; font-size: 1.3rem;"></i>
                        <strong style="color: #4A2559;">Registration fee:</strong> R500 non-refundable deposit required upon acceptance.
                        <strong style="color: #4A2559;">Sibling discount</strong> available for families with multiple children.
                    </div>
                </div>

                <!-- Application Steps -->
                <div class="bg-white rounded-4 shadow-sm p-5 mb-5 wow animate__fadeInUp" data-wow-delay="0.45s" style="border: 2px solid #f9f6f2;">
                    <div class="d-flex align-items-center gap-3 mb-5">
                        <span class="vs-service__icon" style="flex-shrink: 0;">
                            <img src="{{ asset('assets/img/icons/service-icon-1-2.svg') }}" alt="process icon" style="width: 60px; height: 60px;">
                        </span>
                        <div>
                            <h3 class="fw-bold mb-0" style="color: #4A2559;">Application Process</h3>
                            <p class="text-muted mb-0">Four simple steps to enrolment</p>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-3 text-center">
                            <div style="width: 80px; height: 80px; background: #0c508e; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 20px; font-size: 2rem; font-weight: 700; color: white; box-shadow: 0 10px 30px rgba(12,80,142,0.3); transition: all 0.4s;" onmouseover="this.style.transform='scale(1.1) rotate(5deg)';" onmouseout="this.style.transform='scale(1) rotate(0deg)';">1</div>
                            <h6 class="fw-bold mb-2" style="color: #4A2559;">Complete Form</h6>
                            <small class="text-muted">Fill in child & parent details</small>
                        </div>
                        <div class="col-md-3 text-center">
                            <div style="width: 80px; height: 80px; background: #D18109; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 20px; font-size: 2rem; font-weight: 700; color: white; box-shadow: 0 10px 30px rgba(209,129,9,0.3); transition: all 0.4s;" onmouseover="this.style.transform='scale(1.1) rotate(5deg)';" onmouseout="this.style.transform='scale(1) rotate(0deg)';">2</div>
                            <h6 class="fw-bold mb-2" style="color: #4A2559;">Review</h6>
                            <small class="text-muted">We review your application</small>
                        </div>
                        <div class="col-md-3 text-center">
                            <div style="width: 80px; height: 80px; background: #70167E; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 20px; font-size: 2rem; font-weight: 700; color: white; box-shadow: 0 10px 30px rgba(112,22,126,0.3); transition: all 0.4s;" onmouseover="this.style.transform='scale(1.1) rotate(5deg)';" onmouseout="this.style.transform='scale(1) rotate(0deg)';">3</div>
                            <h6 class="fw-bold mb-2" style="color: #4A2559;">Visit</h6>
                            <small class="text-muted">Meet us & tour the school</small>
                        </div>
                        <div class="col-md-3 text-center">
                            <div style="width: 80px; height: 80px; background: #10b981; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 20px; font-size: 2rem; font-weight: 700; color: white; box-shadow: 0 10px 30px rgba(16,185,129,0.3); transition: all 0.4s;" onmouseover="this.style.transform='scale(1.1) rotate(5deg)';" onmouseout="this.style.transform='scale(1) rotate(0deg)';">
                                <i class="fas fa-check"></i>
                            </div>
                            <h6 class="fw-bold mb-2" style="color: #10b981;">Enrol</h6>
                            <small class="text-muted">Complete registration</small>
                        </div>
                    </div>

                    <!-- Step connector line -->
                    <div class="d-none d-md-block" style="position: relative; margin-top: -120px; margin-bottom: 100px; height: 4px; background: linear-gradient(90deg, #0c508e, #D18109, #70167E, #10b981); border-radius: 4px; max-width: 80%; margin-left: auto; margin-right: auto; opacity: 0.2;"></div>
                </div>

                <!-- CTA Section -->
                <div class="text-center wow animate__fadeInUp" data-wow-delay="0.55s" style="margin-top: 3rem;">
                    <a href="{{ route('enrol.form') }}" class="vs-btn" style="font-size: 1.1rem; padding: 18px 48px;">
                        <span class="vs-btn__border"></span>
                        <i class="fas fa-paper-plane me-2"></i>Start Application
                    </a>
                    <p style="margin-top: 20px; color: #666; font-size: 1rem;">
                        <i class="fas fa-lock me-2" style="color: #0c508e;"></i>
                        Your information is secure & confidential
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
