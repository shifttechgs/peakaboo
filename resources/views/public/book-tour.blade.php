@extends('layouts.public')

@section('title', 'Book a Tour - Peekaboo Daycare')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #B5D8EB 0%, #FFB5BA 100%); margin-top: 10px;" data-bg-src="{{ asset('assets/img/class/class-bg.png') }}">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="display-4 fw-bold mb-4">Book a Tour</h1>
                <p class="lead mb-0">Come and see our facilities, meet our teachers, and discover why families love Peekaboo.</p>
            </div>
        </div>
    </div>
</section>

<section class="pk-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-white rounded-4 shadow-sm p-5">
                    <form action="{{ route('book-tour.submit') }}" method="POST">
                        @csrf

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Your Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg" name="name" required style="border-radius: 12px;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control form-control-lg" name="phone" required style="border-radius: 12px;">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control form-control-lg" name="email" required style="border-radius: 12px;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Child's Age <span class="text-danger">*</span></label>
                                <select class="form-select form-select-lg" name="child_age" required style="border-radius: 12px;">
                                    <option value="">Select age range...</option>
                                    <option value="0-1">0 - 1 year (Baby Room)</option>
                                    <option value="1-3">1 - 3 years (Toddlers)</option>
                                    <option value="3-4">3 - 4 years (Preschool)</option>
                                    <option value="5-6">5 - 6 years (Grade R)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Preferred Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control form-control-lg" name="preferred_date" required style="border-radius: 12px;" min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Preferred Time <span class="text-danger">*</span></label>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="form-check border rounded-3 p-3">
                                            <input class="form-check-input" type="radio" name="preferred_time" id="time1" value="09:00" checked>
                                            <label class="form-check-label w-100" for="time1">
                                                <strong>Morning</strong><br>
                                                <small class="text-muted">09:00 - 10:00</small>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check border rounded-3 p-3">
                                            <input class="form-check-input" type="radio" name="preferred_time" id="time2" value="11:00">
                                            <label class="form-check-label w-100" for="time2">
                                                <strong>Late Morning</strong><br>
                                                <small class="text-muted">11:00 - 12:00</small>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check border rounded-3 p-3">
                                            <input class="form-check-input" type="radio" name="preferred_time" id="time3" value="14:00">
                                            <label class="form-check-label w-100" for="time3">
                                                <strong>Afternoon</strong><br>
                                                <small class="text-muted">14:00 - 15:00</small>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Any Questions or Special Requirements?</label>
                                <textarea class="form-control" name="message" rows="4" style="border-radius: 12px;" placeholder="Tell us anything you'd like to know or see during your visit..."></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">How did you hear about us?</label>
                                <select class="form-select" name="source" style="border-radius: 12px;">
                                    <option value="">Select...</option>
                                    <option value="facebook">Facebook</option>
                                    <option value="google">Google Search</option>
                                    <option value="whatsapp">WhatsApp</option>
                                    <option value="referral">Friend/Family Referral</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit"
                                        style="
            width:100%;
            padding:16px 0;
            border-radius:50px;
            border:none;
            background:#0c508e;
            color:#fff;
            font-weight:600;
            font-size:1rem;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:10px;
            box-shadow:0 10px 25px rgba(13,110,253,.35);
            transition:all .25s ease;
            cursor:pointer;
        "
                                        onmouseover="this.style.background='#084298'; this.style.transform='translateY(-2px)';"
                                        onmouseout="this.style.background='#0d6efd'; this.style.transform='translateY(0)';"
                                >
                                    <i class="fas fa-calendar-check"></i> Request Tour
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="text-center mt-5">
                    <p class="text-muted mb-3">Can't wait? Call us directly:</p>
                    <a href="tel:0215574999" class="h4 text-primary text-decoration-none">
                        <i class="fas fa-phone-alt me-2"></i> 021 557 4999
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
