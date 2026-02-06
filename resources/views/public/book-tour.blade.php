@extends('layouts.public')

@section('title', 'Book a Tour - Peekaboo Daycare')

@push('styles')
    <style>
        /* Form Styling */
        label {
            font-weight: 600;
            color: #4A2559;
            margin-bottom: 8px;
            font-size: 0.95rem;
            display: block;
        }

        .form-control, .form-select {
            border-radius: 8px;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            background: white;
            width: 100%;
        }

        .form-control:hover, .form-select:hover {
            border-color: #D18109;
        }

        .form-control:focus, .form-select:focus {
            border-color: #0c508e;
            box-shadow: 0 0 0 3px rgba(12,80,142,0.1);
            outline: none;
        }

        .form-group {
            margin-bottom: 24px;
        }

        /* Radio Time Slots */
        .time-slot-option {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 18px;
            transition: all 0.3s ease;
            cursor: pointer;
            background: white;
        }

        .time-slot-option:hover {
            border-color: #D18109;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .time-slot-option input[type="radio"]:checked ~ label,
        .time-slot-option:has(input[type="radio"]:checked) {
            border-color: #0c508e;
            background: rgba(12,80,142,0.05);
            box-shadow: 0 4px 16px rgba(12,80,142,0.15);
        }

        .form-check-input {
            width: 20px;
            height: 20px;
            border: 2px solid #D18109;
            cursor: pointer;
            margin-top: 4px;
        }

        .form-check-input:checked {
            background-color: #0c508e;
            border-color: #0c508e;
        }

        .form-check-label {
            cursor: pointer;
            padding-left: 8px;
        }

        /* Alerts */
        .alert {
            border-radius: 10px;
            border: none;
            padding: 16px 20px;
            font-weight: 500;
            margin-bottom: 24px;
        }

        .alert-success {
            background: rgba(16,185,129,0.1);
            border-left: 4px solid #10b981;
            color: #065f46;
        }

        .alert-danger {
            background: rgba(220,53,69,0.1);
            border-left: 4px solid #dc3545;
            color: #dc3545;
        }

        .text-danger {
            color: #dc3545 !important;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-control, .form-select {
                font-size: 16px; /* Prevents zoom on iOS */
            }
        }
    </style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, #B5D8EB 0%, #FFB5BA 100%); margin-top: 10px; position: relative; overflow: hidden;">
    <img src="{{ asset('assets/img/elements/service-ele-1.svg') }}" alt="decorative element" style="position: absolute; left: -50px; bottom: -20px; width: 150px; opacity: 0.3;">
    <img src="{{ asset('assets/img/elements/service-ele-2.svg') }}" alt="decorative element" style="position: absolute; right: -50px; top: -20px; width: 130px; opacity: 0.3;">
    <div class="container py-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                <span style="background: #0c508e; color: white; padding: 8px 18px; border-radius: 25px; display: inline-block; font-weight: 600; font-size: 13px; margin-bottom: 20px; letter-spacing: 0.5px;">
                    <i class="fas fa-calendar-check me-2"></i>SCHEDULE YOUR VISIT
                </span>
                <h1 class="fw-bold mb-3" style="color: #4A2559; font-size: 2.5rem; line-height: 1.2;">See Why Families Choose Peekaboo</h1>
                <p class="mb-0" style="color: #2d3748; font-size: 1.1rem; line-height: 1.6;">Tour our facilities, meet our qualified teachers, and see our learning programs in action.</p>
            </div>
            <div class="col-lg-6">
                <div style="position: relative; max-width: 450px; margin: 0 auto;">
                    <img src="{{ asset('assets/img/about/vs-about-h1-2.jpg') }}" alt="Peekaboo Daycare facilities" style="width: 100%; border-radius: 20px; box-shadow: 0 20px 50px rgba(0,0,0,0.15);">
                    <div style="position: absolute; bottom: -15px; right: -15px; background: white; padding: 18px 24px; border-radius: 12px; box-shadow: 0 10px 35px rgba(0,0,0,0.15);">
                        <div style="font-size: 2.2rem; font-weight: 700; color: #0c508e; line-height: 1;">{{ date('Y') - 2010 }}+</div>
                        <div style="color: #666; font-size: 0.85rem; font-weight: 600; letter-spacing: 0.5px;">YEARS OF CARE</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tour Booking Form Section -->
<section class="space" style="background: #f9f9f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="row">
                    <!-- Form Column -->
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <div class="vs-blog blog-single">
                            <div class="blog-content">

                                @if(session('success'))
                                <div class="alert alert-success">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <strong>Thank you!</strong> {{ session('success') }}

                                    @if(session('booking_id'))
                                    <div style="margin-top: 12px; padding-top: 12px; border-top: 1px solid rgba(16,185,129,0.3);">
                                        <strong>Your Booking Reference:</strong> <span style="font-family: 'Courier New', monospace; font-weight: 700;">{{ session('booking_id') }}</span>
                                    </div>
                                    @endif

                                    @if(session('email_sent'))
                                    <div style="margin-top: 8px; color: #065f46; font-size: 0.9rem;">
                                        <i class="fas fa-check-circle me-1"></i>Our team has been notified
                                    </div>
                                    @elseif(session('email_error'))
                                    <div style="margin-top: 8px; color: #d97706; font-size: 0.9rem;">
                                        <i class="fas fa-info-circle me-1"></i>Please call us at <a href="tel:0215574999" style="color: #d97706; text-decoration: underline;">021 557 4999</a> to confirm
                                    </div>
                                    @endif
                                </div>
                                @endif

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0" style="padding-left: 20px;">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <h3 class="mb-4" style="color: #4A2559; font-weight: 700;">Request a Tour</h3>

                                <form action="{{ route('book-tour.submit') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <!-- Parent Name -->
                                        <div class="col-md-6 form-group">
                                            <label>Parent/Guardian Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                        </div>

                                        <!-- Phone -->
                                        <div class="col-md-6 form-group">
                                            <label>Phone Number <span class="text-danger">*</span></label>
                                            <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" required>
                                        </div>

                                        <!-- Email -->
                                        <div class="col-12 form-group">
                                            <label>Email Address <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        </div>

                                        <!-- Child Name -->
                                        <div class="col-md-8 form-group">
                                            <label>Child's Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="child_name" value="{{ old('child_name') }}" required>
                                        </div>

                                        <!-- Nickname -->
                                        <div class="col-md-4 form-group">
                                            <label>Nickname</label>
                                            <input type="text" class="form-control" name="child_nickname" value="{{ old('child_nickname') }}">
                                        </div>

                                        <!-- Child Age -->
                                        <div class="col-md-6 form-group">
                                            <label>Child's Age <span class="text-danger">*</span></label>
                                            <select class="form-select" name="child_age" required>
                                                <option value="">Select age range...</option>
                                                <option value="0-1" {{ old('child_age') == '0-1' ? 'selected' : '' }}>0-1 year (Baby Room)</option>
                                                <option value="1-3" {{ old('child_age') == '1-3' ? 'selected' : '' }}>1-3 years (Toddlers)</option>
                                                <option value="3-4" {{ old('child_age') == '3-4' ? 'selected' : '' }}>3-4 years (Preschool)</option>
                                                <option value="5-6" {{ old('child_age') == '5-6' ? 'selected' : '' }}>5-6 years (Grade R)</option>
                                            </select>
                                        </div>

                                        <!-- Preferred Date -->
                                        <div class="col-md-6 form-group">
                                            <label>Preferred Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="preferred_date" value="{{ old('preferred_date') }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                                        </div>

                                        <!-- Preferred Time -->
                                        <div class="col-12 form-group">
                                            <label>Preferred Time <span class="text-danger">*</span></label>
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <div class="time-slot-option">
                                                        <input class="form-check-input" type="radio" name="preferred_time" id="time1" value="09:00" {{ old('preferred_time', '09:00') == '09:00' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="time1">
                                                            <div style="font-weight: 700; color: #4A2559; font-size: 1.05rem;">Morning</div>
                                                            <small style="color: #6c757d;">09:00 - 10:00</small>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="time-slot-option">
                                                        <input class="form-check-input" type="radio" name="preferred_time" id="time2" value="11:00" {{ old('preferred_time') == '11:00' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="time2">
                                                            <div style="font-weight: 700; color: #4A2559; font-size: 1.05rem;">Late Morning</div>
                                                            <small style="color: #6c757d;">11:00 - 12:00</small>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="time-slot-option">
                                                        <input class="form-check-input" type="radio" name="preferred_time" id="time3" value="14:00" {{ old('preferred_time') == '14:00' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="time3">
                                                            <div style="font-weight: 700; color: #4A2559; font-size: 1.05rem;">Afternoon</div>
                                                            <small style="color: #6c757d;">14:00 - 15:00</small>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Message -->
                                        <div class="col-12 form-group">
                                            <label>Questions or Special Requirements?</label>
                                            <textarea class="form-control" name="message" rows="4" placeholder="Tell us anything you'd like to know or see during your visit...">{{ old('message') }}</textarea>
                                        </div>

                                        <!-- Source -->
                                        <div class="col-12 form-group">
                                            <label>How did you hear about us?</label>
                                            <select class="form-select" name="source">
                                                <option value="">Select...</option>
                                                <option value="facebook" {{ old('source') == 'facebook' ? 'selected' : '' }}>Facebook</option>
                                                <option value="google" {{ old('source') == 'google' ? 'selected' : '' }}>Google Search</option>
                                                <option value="instagram" {{ old('source') == 'instagram' ? 'selected' : '' }}>Instagram</option>
                                                <option value="referral" {{ old('source') == 'referral' ? 'selected' : '' }}>Friend/Family Referral</option>
                                                <option value="other" {{ old('source') == 'other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="col-12">
                                            <button type="submit" class="vs-btn" style="padding: 14px 32px;">
                                                <span class="vs-btn__border"></span>
                                                <i class="fas fa-calendar-check me-2"></i>Request Tour
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Column -->
                    <div class="col-lg-4">
                        <!-- Tour Info -->
                        <div class="vs-blog blog-single mb-4">
                            <div class="blog-content">
                                <h4 class="blog-title" style="color: #4A2559; font-weight: 700;">Tour Information</h4>
                                <div class="checklist">
                                    <ul style="list-style: none; padding: 0;">
                                        <li style="margin-bottom: 12px;"><i class="far fa-check-circle" style="color: #0c508e; margin-right: 10px;"></i> 30-45 minute facility tour</li>
                                        <li style="margin-bottom: 12px;"><i class="far fa-check-circle" style="color: #0c508e; margin-right: 10px;"></i> Meet our qualified teachers</li>
                                        <li style="margin-bottom: 12px;"><i class="far fa-check-circle" style="color: #0c508e; margin-right: 10px;"></i> See classrooms in action</li>
                                        <li style="margin-bottom: 12px;"><i class="far fa-check-circle" style="color: #0c508e; margin-right: 10px;"></i> Ask questions about programs</li>
                                        <li style="margin-bottom: 0;"><i class="far fa-check-circle" style="color: #0c508e; margin-right: 10px;"></i> Review fees and enrollment</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="vs-blog blog-single">
                            <div class="blog-content text-center">
                                <h5 class="mb-3" style="color: #4A2559; font-weight: 700;">Need Help?</h5>
                                <p class="mb-4" style="font-size: 14px; color: #6c757d;">Call us directly to schedule your tour</p>
                                <a href="tel:0215574999" class="vs-btn mb-3" style="display: inline-block; width: 100%;">
                                    <span class="vs-btn__border"></span>
                                    <i class="fas fa-phone me-2"></i>021 557 4999
                                </a>
                                <a href="https://wa.me/27828989967" target="_blank" class="vs-btn style4" style="display: inline-block; width: 100%;">
                                    <span class="vs-btn__border"></span>
                                    <i class="fab fa-whatsapp me-2"></i>WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
