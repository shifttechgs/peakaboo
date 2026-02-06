@extends('layouts.public')

@section('title', 'Application Submitted - Peekaboo Daycare')

@section('content')
<!-- Breadcrumb -->


<!-- Thank You Section -->
<section class="space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">

                <!-- Single Card -->
                <div class="vs-blog blog-single">
                    <div class="blog-content text-center" style="padding: 60px 40px;">

                        <div class="mb-4">
                            <div style="width: 80px; height: 80px; background: #10b981; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 30px;">
                                <i class="fas fa-check" style="font-size: 40px; color: white;"></i>
                            </div>
                        </div>

                        <h3 class="sec-title mb-3">Thank You!</h3>
                        <p class="sec-text mb-4">We have received your enrolment application and will be in touch within 48 hours.</p>

                        @if(session('email_sent'))
                        <div class="alert alert-success mb-4" style="border-left: 4px solid #10b981;">
                            <i class="fas fa-check-circle me-2"></i>Our team has been notified
                        </div>
                        @elseif(session('email_error'))
                        <div class="alert alert-warning mb-4" style="border-left: 4px solid #ffc107;">
                            <i class="fas fa-info-circle me-2"></i>Please call <a href="tel:0215574999">021 557 4999</a> to confirm
                        </div>
                        @endif

                        <div class="mb-4">
                            <p style="color: #0c508e; font-weight: 600; text-transform: uppercase; font-size: 13px; letter-spacing: 1px; margin-bottom: 10px;">Application Reference</p>
                            <div style="background: #0c508e; color: white; padding: 20px; border-radius: 10px;">
                                <h3 style="color: white; font-family: 'Courier New', monospace; letter-spacing: 3px; margin: 0; font-size: 28px;">{{ $applicationId }}</h3>
                            </div>
                            <p style="color: #777; font-size: 14px; margin-top: 10px;">Please save this reference number</p>
                        </div>

                        <hr class="my-4">

                        <p class="mb-3" style="color: #6c757d;">Questions? Contact us:</p>
                        <div class="d-flex gap-3 justify-content-center flex-wrap">
                            <a href="tel:0215574999" class="vs-btn">
                                <span class="vs-btn__border"></span>
                                <i class="fas fa-phone me-2"></i>021 557 4999
                            </a>
                            <a href="https://wa.me/27828989967" target="_blank" class="vs-btn style4">
                                <span class="vs-btn__border"></span>
                                <i class="fab fa-whatsapp me-2"></i>WhatsApp
                            </a>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('home') }}" style="color: #0c508e; text-decoration: none; font-weight: 600;">
                                <i class="fas fa-home me-2"></i>Back to Home
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
