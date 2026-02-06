@extends('layouts.public')

@section('title', 'Enrolment Form - Peekaboo Daycare')

@push('styles')
<style>
    .enrol-wizard {
        margin-top: 80px;
        background: #f9f6f2;
        min-height: 100vh;
        padding-bottom: 60px;
    }

    .step-indicator {
        display: flex;
        justify-content: center;
        margin-bottom: 40px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .step-item {
        display: flex;
        align-items: center;
        position: relative;
    }

    .step-item:not(:last-child)::after {
        content: '';
        width: 40px;
        height: 4px;
        background: #e8e5ef;
        margin: 0 8px;
        border-radius: 2px;
    }

    .step-item.completed:not(:last-child)::after {
        background: #0c508e;
    }

    .step-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        color: #999;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.4s ease;
        border: 3px solid #e8e5ef;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .step-item:nth-child(1).active .step-circle,
    .step-item:nth-child(1).completed .step-circle {
        background: #0c508e;
        color: white;
        border-color: #0c508e;
        box-shadow: 0 6px 20px rgba(12,80,142,0.3);
    }

    .step-item:nth-child(2).active .step-circle,
    .step-item:nth-child(2).completed .step-circle {
        background: #D18109;
        color: white;
        border-color: #D18109;
        box-shadow: 0 6px 20px rgba(209,129,9,0.3);
    }

    .step-item:nth-child(3).active .step-circle,
    .step-item:nth-child(3).completed .step-circle {
        background: #70167E;
        color: white;
        border-color: #70167E;
        box-shadow: 0 6px 20px rgba(112,22,126,0.3);
    }

    .step-item:nth-child(4).active .step-circle,
    .step-item:nth-child(4).completed .step-circle {
        background: #e91e63;
        color: white;
        border-color: #e91e63;
        box-shadow: 0 6px 20px rgba(233,30,99,0.3);
    }

    .step-item:nth-child(5).active .step-circle,
    .step-item:nth-child(5).completed .step-circle {
        background: #0c508e;
        color: white;
        border-color: #0c508e;
        box-shadow: 0 6px 20px rgba(12,80,142,0.3);
    }

    .step-item:nth-child(6).active .step-circle,
    .step-item:nth-child(6).completed .step-circle {
        background: #D18109;
        color: white;
        border-color: #D18109;
        box-shadow: 0 6px 20px rgba(209,129,9,0.3);
    }

    .step-item:nth-child(7).active .step-circle,
    .step-item:nth-child(7).completed .step-circle {
        background: #10b981;
        color: white;
        border-color: #10b981;
        box-shadow: 0 6px 20px rgba(16,185,129,0.3);
    }

    .step-item.completed .step-circle::after {
        content: '✓';
        position: absolute;
        font-size: 1.2rem;
    }

    .step-item.completed .step-circle {
        font-size: 0;
    }

    .step-content {
        display: none;
    }

    .step-content.active {
        display: block;
        animation: fadeInUp 0.5s ease;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-section {
        background: white;
        border-radius: 24px;
        padding: 50px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        margin-bottom: 30px;
        border: 2px solid #f9f6f2;
        transition: all 0.3s ease;
    }

    .form-section:hover {
        box-shadow: 0 12px 40px rgba(12,80,142,0.12);
    }

    .form-section h4 {
        color: #4A2559;
        font-weight: 700;
        font-size: 1.6rem;
        padding-bottom: 20px;
        margin-bottom: 30px;
        border-bottom: 3px solid #0c508e;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .form-section h4 i {
        width: 45px;
        height: 45px;
        background: #0c508e;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
    }

    .step-content[data-step="2"] .form-section h4 i {
        background: #D18109;
    }

    .step-content[data-step="3"] .form-section h4 i {
        background: #70167E;
    }

    .step-content[data-step="4"] .form-section h4 i {
        background: #e91e63;
    }

    .step-content[data-step="5"] .form-section h4 i {
        background: #0c508e;
    }

    .step-content[data-step="6"] .form-section h4 i {
        background: #D18109;
    }

    .step-content[data-step="7"] .form-section h4 i {
        background: #10b981;
    }

    .form-label {
        font-weight: 600;
        color: #4A2559;
        margin-bottom: 10px;
        font-size: 0.95rem;
    }

    .form-control, .form-select {
        border-radius: 12px;
        padding: 14px 18px;
        border: 2px solid #e8e5ef;
        transition: all 0.3s ease;
        font-size: 0.95rem;
        background: white;
    }

    .form-control:hover, .form-select:hover {
        border-color: #D18109;
    }

    .form-control:focus, .form-select:focus {
        border-color: #0c508e;
        box-shadow: 0 0 0 4px rgba(12,80,142,0.1);
        outline: none;
    }

    .form-control.is-invalid {
        border-color: #dc3545;
        box-shadow: 0 0 0 4px rgba(220,53,69,0.1);
    }

    .consent-box {
        background: rgba(12,80,142,0.05);
        border-radius: 16px;
        padding: 25px;
        margin-bottom: 20px;
        border-left: 4px solid #0c508e;
        transition: all 0.3s ease;
    }

    .consent-box:hover {
        transform: translateX(5px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    }

    .consent-box h6 {
        color: #4A2559;
        font-weight: 700;
        margin-bottom: 12px;
        font-size: 1.1rem;
    }

    .consent-box h6 i {
        color: #0c508e;
        margin-right: 8px;
    }

    .file-upload-box {
        border: 3px dashed #D18109;
        border-radius: 16px;
        padding: 40px 30px;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
        background: white;
    }

    .file-upload-box:hover {
        border-color: #0c508e;
        background: #f9f6f2;
        transform: scale(1.02);
    }

    .file-upload-box.dragover {
        border-color: #0c508e;
        background: rgba(12,80,142,0.05);
        transform: scale(1.05);
    }

    .file-upload-box i {
        color: #D18109;
        transition: all 0.3s ease;
    }

    .file-upload-box:hover i {
        color: #0c508e;
        transform: scale(1.1);
    }

    .file-upload-box.has-file {
        border-color: #10b981;
        background: rgba(16,185,129,0.05);
    }

    .file-upload-box.has-file i {
        color: #10b981;
    }

    .file-name-display {
        margin-top: 10px;
        padding: 10px 15px;
        background: white;
        border-radius: 8px;
        border: 2px solid #10b981;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .file-name-display .file-info {
        display: flex;
        align-items: center;
        gap: 10px;
        flex: 1;
    }

    .file-name-display .remove-file {
        background: #e91e63;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 6px 12px;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-name-display .remove-file:hover {
        background: #c2185b;
        transform: scale(1.05);
    }

    .signature-pad {
        border: 2px solid #e8e5ef;
        border-radius: 16px;
        background: #f9f6f2;
        height: 150px;
        width: 100%;
    }

    .progress-bar-custom {
        height: 12px;
        background: #e8e5ef;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 15px;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
    }

    .progress-bar-fill {
        height: 100%;
        background: #0c508e;
        transition: width 0.5s ease;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(12,80,142,0.3);
    }

    .autosave-indicator {
        position: fixed;
        bottom: 30px;
        left: 30px;
        background: #10b981;
        color: white;
        padding: 15px 25px;
        border-radius: 50px;
        box-shadow: 0 6px 24px rgba(16,185,129,0.4);
        font-size: 0.95rem;
        font-weight: 600;
        z-index: 1000;
        animation: slideInLeft 0.4s ease;
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-100px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .form-check-input {
        width: 22px;
        height: 22px;
        border: 2px solid #D18109;
        cursor: pointer;
    }

    .form-check-input:checked {
        background-color: #0c508e;
        border-color: #0c508e;
    }

    .form-check-input:focus {
        border-color: #D18109;
        box-shadow: 0 0 0 4px rgba(209,129,9,0.1);
    }

    .form-check-label {
        cursor: pointer;
        color: #4A2559;
        font-weight: 500;
    }

    .alert {
        border-radius: 16px;
        border: none;
        padding: 20px;
        font-weight: 500;
    }

    .alert-success {
        background: rgba(16,185,129,0.1);
        border-left: 4px solid #10b981;
        color: #065f46;
    }

    .alert-info {
        background: rgba(12,80,142,0.1);
        border-left: 4px solid #0c508e;
        color: #0c508e;
    }

    .text-danger {
        color: #e91e63 !important;
    }

    @media (max-width: 768px) {
        .step-item:not(:last-child)::after {
            width: 15px;
        }
        .step-circle {
            width: 40px;
            height: 40px;
            font-size: 0.9rem;
        }
        .form-section {
            padding: 30px 20px;
        }
        .form-section h4 {
            font-size: 1.3rem;
        }
        .autosave-indicator {
            bottom: 15px;
            left: 15px;
            font-size: 0.85rem;
            padding: 12px 20px;
        }
    }
</style>
@endpush

@section('content')
<div class="enrol-wizard">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Welcome Banner -->
                <div class="text-center mb-5 wow animate__fadeInUp" data-wow-delay="0.1s">
                    <span style="background: #0c508e; color: white; padding: 8px 20px; border-radius: 25px; display: inline-block; font-weight: 600; font-size: 14px; margin-bottom: 15px;">
                        <i class="fas fa-paper-plane me-2"></i>Online Enrolment Form
                    </span>
                    <h2 class="fw-bold mb-2" style="color: #4A2559; font-size: 2rem;">Welcome to Peekaboo!</h2>
                    <p class="text-muted mb-0">Complete all 7 steps to submit your application. Your progress is saved automatically.</p>
                </div>

                <!-- Progress Bar -->
                <div class="mb-5">
                    <div class="progress-bar-custom">
                        <div class="progress-bar-fill" id="progressBar" style="width: 14.28%;"></div>
                    </div>
                    <div class="d-flex justify-content-between" style="font-size: 0.95rem; font-weight: 600;">
                        <span style="color: #0c508e;">Step <span id="currentStepNum">1</span> of 7</span>
                        <span style="color: #D18109;"><span id="progressPercent">14%</span> Complete</span>
                    </div>
                </div>

                <!-- Step Indicators -->
                <div class="step-indicator flex-wrap">
                    <div class="step-item active" data-step="1">
                        <div class="step-circle">1</div>
                    </div>
                    <div class="step-item" data-step="2">
                        <div class="step-circle">2</div>
                    </div>
                    <div class="step-item" data-step="3">
                        <div class="step-circle">3</div>
                    </div>
                    <div class="step-item" data-step="4">
                        <div class="step-circle">4</div>
                    </div>
                    <div class="step-item" data-step="5">
                        <div class="step-circle">5</div>
                    </div>
                    <div class="step-item" data-step="6">
                        <div class="step-circle">6</div>
                    </div>
                    <div class="step-item" data-step="7">
                        <div class="step-circle">7</div>
                    </div>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom: 20px;">
                    <h4 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>Validation Errors</h4>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <form id="enrolmentForm"
                      action="{{ route('enrol.submit') }}"
                      method="POST"
                      enctype="multipart/form-data"
                      novalidate>
                    @csrf

                    <!-- Step 1: Program Selection -->
                    <div class="step-content active" data-step="1">
                        <div class="form-section">
                            <h4><i class="fas fa-school"></i> Program Selection</h4>
                            <p class="text-muted mb-4" style="font-size: 1.05rem;">
                                <i class="fas fa-info-circle me-2" style="color: #0c508e;"></i>
                                Choose the program and fee option that best suits your family's needs.
                            </p>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Preferred Start Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="start_date" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Program <span class="text-danger">*</span></label>
                                    <select class="form-select" name="program" id="programSelect" required>
                                        <option value="">Select a program...</option>
                                        @foreach($programs as $program)
                                        <option value="{{ $program['id'] }}" data-name="{{ $program['name'] }}">{{ $program['name'] }} ({{ $program['age'] }})</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="program_name" id="programName">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Fee Option <span class="text-danger">*</span></label>

                                    <div class="row g-3">

                                        @foreach($fees as $fee)
                                            @if(!isset($fee['addon']))

                                                <div class="col-md-6">

                                                    <div class="form-check border-3 rounded-4 p-4"
                                                         style="
                    cursor:pointer;
                    transition:all .3s ease;
                    border-color: {{ $fee['popular'] ? '#0c508e' : '#e8e5ef' }};
                    background: {{ $fee['popular'] ? 'rgba(12,80,142,0.05)' : 'white' }};
                    position: relative;
                 "
                                                         onmouseover="this.style.borderColor='#0c508e'; this.style.boxShadow='0 8px 24px rgba(12,80,142,.2)'; this.style.transform='translateY(-4px)'"
                                                         onmouseout="this.style.borderColor='{{ $fee['popular'] ? '#0c508e' : '#e8e5ef' }}'; this.style.boxShadow='none'; this.style.transform='translateY(0)'"
                                                    >
                                                        @if($fee['popular'])
                                                            <span style="position: absolute; top: -12px; right: 20px; background: #0c508e; color: white; padding: 6px 16px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; box-shadow: 0 4px 12px rgba(12,80,142,0.3);">
                                                                <i class="fas fa-star me-1"></i>Recommended
                                                            </span>
                                                        @endif

                                                        <input class="form-check-input fee-option-radio"
                                                               type="radio"
                                                               name="fee_option"
                                                               id="fee_{{ $fee['id'] }}"
                                                               value="{{ $fee['id'] }}"
                                                               data-name="{{ $fee['name'] }}"
                                                               {{ $fee['popular'] ? 'checked' : '' }}
                                                               style="margin-top:4px; width: 24px; height: 24px; cursor: pointer;"
                                                        >

                                                        <label class="form-check-label w-100 ms-2"
                                                               for="fee_{{ $fee['id'] }}"
                                                               style="cursor:pointer;"
                                                        >

                                                            <div style="
                        display:flex;
                        justify-content:space-between;
                        align-items:center;
                        margin-bottom:8px;
                        margin-top: {{ $fee['popular'] ? '12px' : '0' }};
                    ">

                                                                <strong style="font-size:1.1rem; color:#4A2559;">
                                                                    {{ $fee['name'] }}
                                                                </strong>

                                                                <span style="
                            background:#0c508e;
                            color:#fff;
                            padding:8px 16px;
                            border-radius:24px;
                            font-size:.9rem;
                            font-weight:700;
                            box-shadow: 0 4px 12px rgba(12,80,142,0.3);
                        ">
                            R{{ number_format($fee['price']) }}/mo
                        </span>

                                                            </div>

                                                            <small style="
                        color:#6c757d;
                        display:block;
                        font-size: 0.95rem;
                    ">
                                                                <i class="fas fa-clock me-1" style="color:#D18109;"></i>{{ $fee['hours'] }}
                                                            </small>

                                                        </label>

                                                    </div>

                                                </div>

                                            @endif
                                        @endforeach

                                    </div>
                                    <input type="hidden" name="fee_option_name" id="feeOptionName">
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="snack_box" id="snackBox">
                                        <label class="form-check-label" for="snackBox">
                                            Add Snack Box (R400/month) - Healthy snacks provided throughout the day
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Child Information -->
                    <div class="step-content" data-step="2">
                        <div class="form-section">
                            <h4><i class="fas fa-baby"></i> Child's Information</h4>
                            <p class="text-muted mb-4" style="font-size: 1.05rem;">
                                <i class="fas fa-info-circle me-2" style="color: #D18109;"></i>
                                Please provide your child's details exactly as they appear on their birth certificate.
                            </p>

                            <div class="row g-4">
                                <div class="col-md-8">
                                    <label class="form-label">Full Name (as per birth certificate) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="child_name" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Nickname</label>
                                    <input type="text" class="form-control" name="child_nickname">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="child_dob" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                    <select class="form-select" name="child_gender" required>
                                        <option value="">Select...</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">ID/Passport Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="child_id" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Home Language <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="child_language" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Religion</label>
                                    <input type="text" class="form-control" name="child_religion">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Previous School Attended (if any)</label>
                                    <input type="text" class="form-control" name="previous_school">
                                </div>
                            </div>
                        </div>

                        <!-- Second Child (Optional) -->
                        <div class="form-section">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="mb-0"><i class="fas fa-user-plus"></i> Second Child (Optional)</h4>
                                <div class="form-check form-switch" style="padding-left: 0;">
                                    <input class="form-check-input" type="checkbox" id="hasSecondChild" name="has_second_child" style="width: 60px; height: 30px; cursor: pointer;">
                                    <label class="form-check-label ms-3" for="hasSecondChild" style="cursor: pointer; font-weight: 600; color: #4A2559;">Add another child</label>
                                </div>
                            </div>

                            <div id="secondChildFields" style="display: none;">
                                <div class="alert alert-success mb-4" style="background: rgba(16,185,129,0.1); border-left: 5px solid #10b981;">
                                    <i class="fas fa-tags me-2" style="font-size: 1.2rem;"></i>
                                    <strong>Great news!</strong> Sibling discount applies for your second child.
                                </div>
                                <div class="row g-4">
                                    <div class="col-md-8">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="child2_name">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Nickname</label>
                                        <input type="text" class="form-control" name="child2_nickname">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" name="child2_dob">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" name="child2_gender">
                                            <option value="">Select...</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">ID/Passport Number</label>
                                        <input type="text" class="form-control" name="child2_id">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Parent/Guardian Information -->
                    <div class="step-content" data-step="3">
                        <div class="form-section">
                            <h4><i class="fas fa-user"></i> Mother/Guardian Information</h4>
                            <p class="text-muted mb-4" style="font-size: 1.05rem;">
                                <i class="fas fa-info-circle me-2" style="color: #70167E;"></i>
                                We need contact details for both parents/guardians for emergency situations.
                            </p>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mother_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">ID/Passport Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mother_id" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Cell Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="mother_cell" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Work Number</label>
                                    <input type="tel" class="form-control" name="mother_work">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="mother_email" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Occupation</label>
                                    <input type="text" class="form-control" name="mother_occupation">
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h4><i class="fas fa-user"></i> Father/Guardian Information</h4>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="father_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">ID/Passport Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="father_id" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Cell Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="father_cell" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Work Number</label>
                                    <input type="tel" class="form-control" name="father_work">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="father_email">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Occupation</label>
                                    <input type="text" class="form-control" name="father_occupation">
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h4><i class="fas fa-home"></i> Home Address</h4>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Home Telephone</label>
                                    <input type="tel" class="form-control" name="home_tel">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Physical Home Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="home_address" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4: Medical & Emergency -->
                    <div class="step-content" data-step="4">
                        <div class="form-section">
                            <h4><i class="fas fa-phone-alt"></i> Emergency Contact</h4>
                            <p class="text-muted mb-4" style="font-size: 1.05rem;">
                                <i class="fas fa-info-circle me-2" style="color: #e91e63;"></i>
                                Provide an emergency contact person we can reach if parents are unavailable.
                            </p>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Contact Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="emergency_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="emergency_tel" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h4><i class="fas fa-medkit"></i> Medical Information</h4>
                            <p class="text-muted mb-4" style="font-size: 1.05rem;">
                                <i class="fas fa-heartbeat me-2" style="color: #e91e63;"></i>
                                Help us keep your child safe by providing complete medical information.
                            </p>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Doctor's Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="doctor_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Doctor's Tel Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="doctor_tel" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Medical Aid Name</label>
                                    <input type="text" class="form-control" name="medical_aid">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Membership Number</label>
                                    <input type="text" class="form-control" name="medical_aid_number">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Medical Information (chronic conditions, medication)</label>
                                    <textarea class="form-control" name="medical_info" rows="3" placeholder="Any chronic conditions, regular medication, etc."></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Allergies (food, medication, environmental)</label>
                                    <textarea class="form-control" name="allergies" rows="3" placeholder="List any known allergies..."></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Previous Operations/Accidents</label>
                                    <textarea class="form-control" name="operations" rows="2"></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Contagious Diseases Already Had</label>
                                    <textarea class="form-control" name="diseases" rows="2" placeholder="e.g., Chickenpox, Measles, etc."></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Any Other Necessary Details</label>
                                    <textarea class="form-control" name="other_details" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 5: Documents -->
                    <div class="step-content" data-step="5">
                        <div class="form-section">
                            <h4><i class="fas fa-file-upload"></i> Document Upload</h4>
                            <p class="text-muted mb-4" style="font-size: 1.05rem;">
                                <i class="fas fa-cloud-upload-alt me-2" style="color: #0c508e;"></i>
                                Upload required documents now or submit them later via email or WhatsApp.
                            </p>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Birth Certificate</label>
                                    <div class="file-upload-wrapper">
                                        <div class="file-upload-box" id="birthCertBox">
                                            <input type="file" name="birth_certificate" class="d-none file-input" id="birthCert" accept=".pdf,.jpg,.jpeg,.png">
                                            <label for="birthCert" class="mb-0 w-100 cursor-pointer">
                                                <i class="fas fa-cloud-upload-alt fa-2x mb-2"></i>
                                                <p class="mb-0 text-muted"><strong>Click to upload</strong> or drag & drop</p>
                                                <small class="text-muted">PDF, JPG, PNG (Max 5MB)</small>
                                            </label>
                                        </div>
                                        <div class="file-name-display" id="birthCertDisplay" style="display: none;">
                                            <div class="file-info">
                                                <i class="fas fa-file-check" style="color: #10b981; font-size: 1.3rem;"></i>
                                                <div>
                                                    <strong class="file-name" style="color: #4A2559;"></strong>
                                                    <small class="file-size d-block text-muted"></small>
                                                </div>
                                            </div>
                                            <button type="button" class="remove-file" onclick="removeFile('birthCert')">
                                                <i class="fas fa-times me-1"></i>Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Clinic Card</label>
                                    <div class="file-upload-wrapper">
                                        <div class="file-upload-box" id="clinicCardBox">
                                            <input type="file" name="clinic_card" class="d-none file-input" id="clinicCard" accept=".pdf,.jpg,.jpeg,.png">
                                            <label for="clinicCard" class="mb-0 w-100 cursor-pointer">
                                                <i class="fas fa-cloud-upload-alt fa-2x mb-2"></i>
                                                <p class="mb-0 text-muted"><strong>Click to upload</strong> or drag & drop</p>
                                                <small class="text-muted">PDF, JPG, PNG (Max 5MB)</small>
                                            </label>
                                        </div>
                                        <div class="file-name-display" id="clinicCardDisplay" style="display: none;">
                                            <div class="file-info">
                                                <i class="fas fa-file-check" style="color: #10b981; font-size: 1.3rem;"></i>
                                                <div>
                                                    <strong class="file-name" style="color: #4A2559;"></strong>
                                                    <small class="file-size d-block text-muted"></small>
                                                </div>
                                            </div>
                                            <button type="button" class="remove-file" onclick="removeFile('clinicCard')">
                                                <i class="fas fa-times me-1"></i>Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Parent ID Copies</label>
                                    <div class="file-upload-wrapper">
                                        <div class="file-upload-box" id="parentIdsBox">
                                            <input type="file" name="parent_ids" class="d-none file-input" id="parentIds" accept=".pdf,.jpg,.jpeg,.png" multiple>
                                            <label for="parentIds" class="mb-0 w-100 cursor-pointer">
                                                <i class="fas fa-cloud-upload-alt fa-2x mb-2"></i>
                                                <p class="mb-0 text-muted"><strong>Click to upload</strong> or drag & drop</p>
                                                <small class="text-muted">Multiple files allowed</small>
                                            </label>
                                        </div>
                                        <div class="file-name-display" id="parentIdsDisplay" style="display: none;">
                                            <div class="file-info">
                                                <i class="fas fa-file-check" style="color: #10b981; font-size: 1.3rem;"></i>
                                                <div>
                                                    <strong class="file-name" style="color: #4A2559;"></strong>
                                                    <small class="file-size d-block text-muted"></small>
                                                </div>
                                            </div>
                                            <button type="button" class="remove-file" onclick="removeFile('parentIds')">
                                                <i class="fas fa-times me-1"></i>Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Proof of Address</label>
                                    <div class="file-upload-wrapper">
                                        <div class="file-upload-box" id="proofAddressBox">
                                            <input type="file" name="proof_address" class="d-none file-input" id="proofAddress" accept=".pdf,.jpg,.jpeg,.png">
                                            <label for="proofAddress" class="mb-0 w-100 cursor-pointer">
                                                <i class="fas fa-cloud-upload-alt fa-2x mb-2"></i>
                                                <p class="mb-0 text-muted"><strong>Click to upload</strong> or drag & drop</p>
                                                <small class="text-muted">PDF, JPG, PNG (Max 5MB)</small>
                                            </label>
                                        </div>
                                        <div class="file-name-display" id="proofAddressDisplay" style="display: none;">
                                            <div class="file-info">
                                                <i class="fas fa-file-check" style="color: #10b981; font-size: 1.3rem;"></i>
                                                <div>
                                                    <strong class="file-name" style="color: #4A2559;"></strong>
                                                    <small class="file-size d-block text-muted"></small>
                                                </div>
                                            </div>
                                            <button type="button" class="remove-file" onclick="removeFile('proofAddress')">
                                                <i class="fas fa-times me-1"></i>Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-info mt-5 mb-0" style="font-size: 1rem;">
                                <i class="fas fa-lightbulb me-2" style="font-size: 1.2rem;"></i>
                                <strong>Don't have documents ready?</strong> No problem! You can submit them later via email or WhatsApp.
                            </div>
                        </div>
                    </div>

                    <!-- Step 6: Consents -->
                    <div class="step-content" data-step="6">
                        <div class="form-section">
                            <h4><i class="fas fa-file-signature"></i> Consent & Agreements</h4>
                            <p class="text-muted mb-4" style="font-size: 1.05rem;">
                                <i class="fas fa-shield-alt me-2" style="color: #D18109;"></i>
                                Please read and accept the following agreements. Required consents are marked with *.
                            </p>

                            <!-- Fee Agreement -->
                            <div class="consent-box">
                                <h6><i class="fas fa-money-check-alt me-2"></i> Fee Agreement</h6>
                                <p class="small mb-3">We, the undersigned, are responsible for the payment of school fees. A full month's notice in writing is required for withdrawal. Fees are payable in advance by the 1st of each month. A R50/day late fee applies.</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="consent_fees" id="consentFees" required>
                                    <label class="form-check-label" for="consentFees">
                                        I accept the fee payment terms and conditions <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Medical Consent -->
                            <div class="consent-box">
                                <h6><i class="fas fa-heartbeat me-2"></i> Emergency Medical Treatment Consent</h6>
                                <p class="small mb-3">I authorize Peekaboo Daycare & Preschool to consent to emergency medical treatment on my behalf should my child require it and I cannot be reached. I accept responsibility for any medical costs incurred.</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="consent_medical" id="consentMedical" required>
                                    <label class="form-check-label" for="consentMedical">
                                        I consent to emergency medical treatment <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Indemnity -->
                            <div class="consent-box">
                                <h6><i class="fas fa-shield-alt me-2"></i> Letter of Indemnity</h6>
                                <p class="small mb-3">I indemnify the principal and staff of Peekaboo Daycare & Preschool from any liability against incidents or accidents which might occur while my child is in their care. I understand that all reasonable precautions will be taken for the safety of my child.</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="consent_indemnity" id="consentIndemnity" required>
                                    <label class="form-check-label" for="consentIndemnity">
                                        I accept the indemnity agreement <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Photo Consent -->
                            <div class="consent-box">
                                <h6><i class="fas fa-camera me-2"></i> Photo Consent</h6>
                                <p class="small mb-3">I consent to photos/images of my child being shared on Peekaboo's Facebook page and WhatsApp class groups. Photos will be watermarked and will not include identifying information.</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="consent_photos" id="consentPhotos">
                                    <label class="form-check-label" for="consentPhotos">
                                        I consent to photo sharing (optional)
                                    </label>
                                </div>
                            </div>

                            <!-- Sleepover Indemnity -->
                            <div class="consent-box">
                                <h6><i class="fas fa-moon me-2"></i> Sleepover Indemnity</h6>
                                <p class="small mb-3">I consent to my child participating in school sleepovers and indemnify Peekaboo Daycare & Preschool from any liability during these events.</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="consent_sleepover" id="consentSleepover">
                                    <label class="form-check-label" for="consentSleepover">
                                        I consent to sleepover participation (optional)
                                    </label>
                                </div>
                            </div>

                            <!-- POPIA -->
                            <div class="consent-box">
                                <h6><i class="fas fa-lock me-2"></i> POPIA Compliance</h6>
                                <p class="small mb-3">Your personal information will be processed in accordance with the Protection of Personal Information Act (POPIA). We will only use your information for school-related purposes.</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="consent_popia" id="consentPopia" required>
                                    <label class="form-check-label" for="consentPopia">
                                        I consent to the processing of my personal information <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 7: Review & Submit -->
                    <div class="step-content" data-step="7">
                        <div class="form-section">
                            <h4><i class="fas fa-check-double"></i> Review & Submit</h4>
                            <p class="text-muted mb-4" style="font-size: 1.05rem;">
                                <i class="fas fa-clipboard-check me-2" style="color: #10b981;"></i>
                                Please review your application details before final submission.
                            </p>

                            <div id="reviewSummary">
                                <!-- Summary will be populated by JavaScript -->
                            </div>

                            <hr class="my-4">

                            <!-- Digital Signature -->
                            <div class="mb-4">
                                <label class="form-label">Digital Signature <span class="text-danger">*</span></label>
                                <p class="text-muted small mb-3">Type your full name below as your digital signature.</p>
                                <input type="text" class="form-control" name="signature" required placeholder="Type your full name here">
                                <input type="hidden" name="signature_date" value="{{ date('Y-m-d') }}">
                            </div>

                            <div class="alert alert-success" style="font-size: 1rem;">
                                <i class="fas fa-envelope me-2" style="font-size: 1.2rem;"></i>
                                <strong>What happens next?</strong> After submitting, you'll receive a confirmation email with your application reference number. We'll review your application and contact you within 2-3 business days.
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="d-flex justify-content-between mt-5 gap-3">

                        <!-- Previous -->
                        <button type="button"
                                id="prevBtn"
                                class="btn-nav-prev"
                                style="
            display:none;
            padding:16px 40px;
            border-radius:50px;
            border:3px solid #70167E;
            background:white;
            color:#70167E;
            font-weight:700;
            font-size:1rem;
            transition:all .3s ease;
            box-shadow: 0 4px 15px rgba(112,22,126,0.2);
        "
                                onmouseover="this.style.background='#70167E'; this.style.color='#fff'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 25px rgba(112,22,126,0.3)'"
                                onmouseout="this.style.background='white'; this.style.color='#70167E'; this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(112,22,126,0.2)'"
                        >
                            <i class="fas fa-arrow-left me-2"></i> Previous
                        </button>

                        <!-- Next -->
                        <button type="button"
                                id="nextBtn"
                                style="
            padding:16px 48px;
            border-radius:50px;
            border:none;
            background:#0c508e;
            color:#fff;
            font-weight:700;
            font-size:1rem;
            box-shadow:0 6px 24px rgba(12,80,142,.4);
            transition:all .3s ease;
            margin-left:auto;
        "
                                onmouseover="this.style.background='#0a4070'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 32px rgba(12,80,142,.5)'"
                                onmouseout="this.style.background='#0c508e'; this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 24px rgba(12,80,142,.4)'"
                        >
                            Next Step <i class="fas fa-arrow-right ms-2"></i>
                        </button>

                        <!-- Submit -->
                        <button type="submit"
                                id="submitBtn"
                                onclick="console.log('Submit button clicked!')"
                                style="
            display:none;
            padding:16px 48px;
            border-radius:50px;
            border:none;
            background:#10b981;
            color:#fff;
            font-weight:700;
            font-size:1rem;
            box-shadow:0 6px 24px rgba(16,185,129,.4);
            transition:all .3s ease;
            margin-left:auto;
        "
                                onmouseover="this.style.background='#059669'; this.style.transform='translateY(-3px) scale(1.05)'; this.style.boxShadow='0 10px 32px rgba(16,185,129,.5)'"
                                onmouseout="this.style.background='#10b981'; this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 6px 24px rgba(16,185,129,.4)'"
                        >
                            <i class="fas fa-paper-plane me-2"></i> Submit Application
                        </button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Autosave Indicator -->
<div class="autosave-indicator" id="autosaveIndicator" style="display: none;">
    <i class="fas fa-check-circle me-2"></i> Progress Saved Automatically
</div>
@endsection

@push('styles')
<style>
@keyframes slideIn {
    from {
        transform: translateX(400px);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOut {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(400px);
        opacity: 0;
    }
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
    20%, 40%, 60%, 80% { transform: translateX(5px); }
}

.field-error {
    animation: shake 0.5s;
}

/* Custom radio button styling */
.fee-option-radio {
    accent-color: #0c508e;
    transform: scale(1.2);
}

.fee-option-radio:checked + label {
    font-weight: 600;
}

/* Selected fee option card pulse effect */
@keyframes selectedPulse {
    0% { box-shadow: 0 8px 32px rgba(12,80,142,0.3); }
    50% { box-shadow: 0 8px 32px rgba(12,80,142,0.5); }
    100% { box-shadow: 0 8px 32px rgba(12,80,142,0.3); }
}
</style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const form = document.getElementById('enrolmentForm');
            const stepContents = document.querySelectorAll('.step-content');
            const stepItems = document.querySelectorAll('.step-item');
            const progressBar = document.getElementById('progressBar');
            const progressPercent = document.getElementById('progressPercent');
            const currentStepNum = document.getElementById('currentStepNum');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const submitBtn = document.getElementById('submitBtn');
            const autosaveIndicator = document.getElementById('autosaveIndicator');

            let currentStep = 1;
            const totalSteps = 7;

            loadSavedData();

            // Update hidden fields when program is selected
            const programSelect = document.getElementById('programSelect');
            const programNameInput = document.getElementById('programName');
            if (programSelect && programNameInput) {
                programSelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const programName = selectedOption.getAttribute('data-name') || selectedOption.text.split('(')[0].trim();
                    programNameInput.value = programName;
                    console.log('Program selected:', this.value, 'Name:', programName);
                });
                // Set initial value if already selected
                if (programSelect.value) {
                    programSelect.dispatchEvent(new Event('change'));
                }
            }

            // Update hidden field when fee option is selected
            const feeOptionInputs = document.querySelectorAll('.fee-option-radio');
            const feeOptionNameInput = document.getElementById('feeOptionName');

            function updateFeeOptionStyles() {
                document.querySelectorAll('.fee-option-radio').forEach(radio => {
                    const container = radio.closest('.form-check');
                    if (radio.checked) {
                        container.style.borderColor = '#0c508e';
                        container.style.borderWidth = '4px';
                        container.style.background = 'rgba(12,80,142,0.1)';
                        container.style.boxShadow = '0 8px 32px rgba(12,80,142,0.3)';
                        container.style.transform = 'scale(1.02)';
                    } else {
                        container.style.borderColor = '#e8e5ef';
                        container.style.borderWidth = '3px';
                        container.style.background = 'white';
                        container.style.boxShadow = 'none';
                        container.style.transform = 'scale(1)';
                    }
                });
            }

            if (feeOptionInputs.length && feeOptionNameInput) {
                feeOptionInputs.forEach(radio => {
                    radio.addEventListener('change', function() {
                        const feeName = this.getAttribute('data-name');
                        feeOptionNameInput.value = feeName;
                        console.log('Fee option selected:', this.value, 'Name:', feeName);
                        updateFeeOptionStyles();
                    });
                });
                // Set initial value for checked radio
                const checkedRadio = document.querySelector('.fee-option-radio:checked');
                if (checkedRadio) {
                    feeOptionNameInput.value = checkedRadio.getAttribute('data-name');
                }
                // Apply initial styling
                updateFeeOptionStyles();
            }

            // Safe toggle
            const secondChildToggle = document.getElementById('hasSecondChild');
            if (secondChildToggle) {
                secondChildToggle.addEventListener('change', function () {
                    document.getElementById('secondChildFields')
                        .style.display = this.checked ? 'block' : 'none';
                });
            }

            nextBtn.addEventListener('click', () => {
                if (validateCurrentStep()) {
                    saveProgress();
                    goToStep(currentStep + 1);
                }
            });

            prevBtn.addEventListener('click', () => {
                goToStep(currentStep - 1);
            });

            // Form submission handler
            form.addEventListener('submit', function(e) {
                console.log('Form submit triggered');

                if (!validateAllSteps()) {
                    e.preventDefault();
                    console.log('Validation failed - form submission prevented');
                    alert('Please fill in all required fields before submitting.');
                    return false;
                }

                console.log('Form validation passed - submitting...');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Submitting...';
            });

            function validateCurrentStep() {
                const currentStepElement = document.querySelector(`.step-content[data-step="${currentStep}"]`);
                const requiredFields = currentStepElement.querySelectorAll('[required]');
                let isValid = true;
                let missingFields = [];

                requiredFields.forEach(field => {
                    let fieldValid = false;
                    let fieldLabel = field.closest('.mb-4')?.querySelector('label')?.textContent ||
                                    field.previousElementSibling?.textContent ||
                                    field.name ||
                                    field.placeholder ||
                                    'Unknown field';

                    // Remove previous error styling
                    field.style.border = '';
                    field.style.outline = '';

                    // Check different field types
                    if (field.type === 'checkbox') {
                        fieldValid = field.checked;
                    } else if (field.type === 'radio') {
                        const radioGroup = currentStepElement.querySelectorAll(`input[name="${field.name}"]`);
                        fieldValid = Array.from(radioGroup).some(radio => radio.checked);
                    } else if (field.tagName === 'SELECT') {
                        fieldValid = field.value && field.value !== '';
                    } else {
                        fieldValid = field.value && field.value.trim() !== '';
                    }

                    if (!fieldValid) {
                        isValid = false;
                        field.style.border = '3px solid #dc3545';
                        field.style.outline = '3px solid rgba(220, 53, 69, 0.25)';
                        missingFields.push(fieldLabel.trim());
                    } else {
                        field.style.border = '2px solid #10b981';
                    }
                });

                if (!isValid) {
                    console.log('Step ' + currentStep + ' validation failed. Missing:', missingFields);

                    // Scroll to first error
                    const firstError = currentStepElement.querySelector('[style*="dc3545"]');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstError.focus();
                    }

                    // Show error alert
                    const alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-danger';
                    alertDiv.style.cssText = 'position: fixed; top: 100px; right: 20px; z-index: 9999; max-width: 400px; animation: slideIn 0.3s ease;';
                    alertDiv.innerHTML = `
                        <h5><i class="fas fa-exclamation-triangle me-2"></i>Required Fields Missing</h5>
                        <ul class="mb-0 small">
                            ${missingFields.map(f => `<li>${f}</li>`).join('')}
                        </ul>
                    `;
                    document.body.appendChild(alertDiv);

                    setTimeout(() => {
                        alertDiv.style.animation = 'slideOut 0.3s ease';
                        setTimeout(() => alertDiv.remove(), 300);
                    }, 5000);
                }

                return isValid;
            }

            function validateAllSteps() {
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;
                let missingFields = [];

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        const label = field.closest('.mb-4')?.querySelector('label')?.textContent || field.name;
                        missingFields.push(label);
                    }
                });

                if (!isValid) {
                    console.log('Form validation failed. Missing required fields:', missingFields);
                }

                return isValid;
            }

            function goToStep(step) {

                if (step < 1 || step > totalSteps) return;

                stepContents.forEach(c => c.classList.remove('active'));
                document.querySelector(`.step-content[data-step="${step}"]`)
                    ?.classList.add('active');

                stepItems.forEach((item, index) => {
                    item.classList.remove('active', 'completed');
                    if (index + 1 < step) item.classList.add('completed');
                    if (index + 1 === step) item.classList.add('active');
                });

                currentStep = step;

                const progress = Math.round((step / totalSteps) * 100);
                progressBar.style.width = progress + '%';
                progressPercent.textContent = progress + '%';
                currentStepNum.textContent = step;

                prevBtn.style.display = step > 1 ? 'block' : 'none';
                nextBtn.style.display = step < totalSteps ? 'block' : 'none';
                submitBtn.style.display = step === totalSteps ? 'block' : 'none';

                if (step === totalSteps) generateReviewSummary();

                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            function saveProgress() {

                const fd = new FormData(form);
                const data = {};

                fd.forEach((value, key) => {

                    // 🚫 Skip files
                    if (value instanceof File) return;

                    data[key] = value;
                });

                localStorage.setItem('peekaboo_enrolment', JSON.stringify(data));

                autosaveIndicator.style.display = 'block';
                setTimeout(() => {
                    autosaveIndicator.style.display = 'none';
                }, 1500);
            }

            function loadSavedData() {

                const saved = localStorage.getItem('peekaboo_enrolment');
                if (!saved) return;

                const data = JSON.parse(saved);

                Object.keys(data).forEach(key => {

                    const field = form.querySelector(`[name="${key}"]`);
                    if (!field) return;

                    if (field.type === 'file') return;

                    if (field.type === 'checkbox') {
                        field.checked = data[key] === 'on' || data[key] === true;
                    }

                    else if (field.type === 'radio') {
                        const radio = form.querySelector(
                            `[name="${key}"][value="${data[key]}"]`
                        );
                        if (radio) radio.checked = true;
                    }

                    else {
                        field.value = data[key];
                    }
                });
            }

            function generateReviewSummary() {

                const fd = new FormData(form);

                // Get selected program details
                const programSelect = document.querySelector('[name="program"]');
                const programText = programSelect.options[programSelect.selectedIndex]?.text || 'Not selected';

                // Get selected fee option details
                const feeOption = document.querySelector('[name="fee_option"]:checked');
                const feeLabel = feeOption?.closest('.form-check')?.querySelector('strong')?.textContent || 'Not selected';
                const feePrice = feeOption?.closest('.form-check')?.querySelector('span[style*="background"]')?.textContent || '';
                const feeHours = feeOption?.closest('.form-check')?.querySelector('small')?.textContent || '';

                let html = '<div class="row g-4">';

                // Program Card
                html += `
                <div class="col-md-6 d-flex">
                    <div style="background: white; border: 3px solid #0c508e; border-radius: 20px; padding: 30px; box-shadow: 0 8px 24px rgba(12,80,142,0.15); width: 100%; display: flex; flex-direction: column;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                            <div style="width: 50px; height: 50px; background: #0c508e; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-school" style="color: white; font-size: 1.5rem;"></i>
                            </div>
                            <h5 style="color: #4A2559; font-weight: 700; margin: 0;">Program Selection</h5>
                        </div>

                        <div style="margin-bottom: 15px;">
                            <label style="color: #6c757d; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; display: block; margin-bottom: 5px;">Start Date</label>
                            <p style="color: #4A2559; font-weight: 600; font-size: 1.1rem; margin: 0;">${fd.get('start_date') || 'Not specified'}</p>
                        </div>

                        <div style="margin-bottom: 15px;">
                            <label style="color: #6c757d; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; display: block; margin-bottom: 5px;">Program</label>
                            <p style="color: #4A2559; font-weight: 600; font-size: 1.1rem; margin: 0;">${programText}</p>
                        </div>

                        <div style="background: rgba(12,80,142,0.05); padding: 15px; border-radius: 12px; border-left: 4px solid #0c508e;">
                            <label style="color: #6c757d; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; display: block; margin-bottom: 8px;">Fee Option</label>
                            <p style="color: #4A2559; font-weight: 700; font-size: 1.2rem; margin: 0 0 5px 0;">${feeLabel}</p>
                            <p style="color: #0c508e; font-weight: 700; font-size: 1.3rem; margin: 0 0 5px 0;">${feePrice}</p>
                            <p style="color: #6c757d; font-size: 0.9rem; margin: 0;"><i class="fas fa-clock me-1" style="color: #D18109;"></i>${feeHours}</p>
                            ${fd.get('snack_box') === 'on' ? '<p style="color: #10b981; font-weight: 600; margin-top: 10px; margin-bottom: 0;"><i class="fas fa-check-circle me-1"></i>Snack Box included (+R400/month)</p>' : ''}
                        </div>
                    </div>
                </div>`;

                // Child Card
                html += `
                <div class="col-md-6 d-flex">
                    <div style="background: white; border: 3px solid #D18109; border-radius: 20px; padding: 30px; box-shadow: 0 8px 24px rgba(209,129,9,0.15); width: 100%; display: flex; flex-direction: column;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                            <div style="width: 50px; height: 50px; background: #D18109; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-baby" style="color: white; font-size: 1.5rem;"></i>
                            </div>
                            <h5 style="color: #4A2559; font-weight: 700; margin: 0;">Child's Details</h5>
                        </div>

                        <div style="margin-bottom: 15px;">
                            <label style="color: #6c757d; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; display: block; margin-bottom: 5px;">Full Name</label>
                            <p style="color: #4A2559; font-weight: 600; font-size: 1.1rem; margin: 0;">${fd.get('child_name') || 'Not specified'}</p>
                            ${fd.get('child_nickname') ? `<small style="color: #6c757d;">(${fd.get('child_nickname')})</small>` : ''}
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                            <div>
                                <label style="color: #6c757d; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; display: block; margin-bottom: 5px;">Date of Birth</label>
                                <p style="color: #4A2559; font-weight: 600; margin: 0;">${fd.get('child_dob') || '-'}</p>
                            </div>
                            <div>
                                <label style="color: #6c757d; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; display: block; margin-bottom: 5px;">Gender</label>
                                <p style="color: #4A2559; font-weight: 600; margin: 0;">${fd.get('child_gender') ? fd.get('child_gender').charAt(0).toUpperCase() + fd.get('child_gender').slice(1) : '-'}</p>
                            </div>
                        </div>

                        <div style="margin-bottom: 15px;">
                            <label style="color: #6c757d; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; display: block; margin-bottom: 5px;">ID/Passport Number</label>
                            <p style="color: #4A2559; font-weight: 600; margin: 0;">${fd.get('child_id') || '-'}</p>
                        </div>

                        <div style="background: rgba(209,129,9,0.05); padding: 15px; border-radius: 12px; border-left: 4px solid #D18109;">
                            <div style="margin-bottom: 8px;">
                                <label style="color: #6c757d; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; display: block; margin-bottom: 3px;">Home Language</label>
                                <p style="color: #4A2559; font-weight: 600; font-size: 0.95rem; margin: 0;">${fd.get('child_language') || '-'}</p>
                            </div>
                            ${fd.get('child_religion') ? `
                            <div>
                                <label style="color: #6c757d; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; display: block; margin-bottom: 3px;">Religion</label>
                                <p style="color: #4A2559; font-weight: 600; font-size: 0.95rem; margin: 0;">${fd.get('child_religion')}</p>
                            </div>
                            ` : ''}
                        </div>

                        ${fd.get('has_second_child') === 'on' ? `
                        <div style="margin-top: 15px; padding: 12px; background: rgba(16,185,129,0.1); border-radius: 10px; border: 2px solid #10b981;">
                            <p style="color: #10b981; font-weight: 600; margin: 0; font-size: 0.9rem;">
                                <i class="fas fa-users me-2"></i>Second child included: ${fd.get('child2_name') || 'Details provided'}
                            </p>
                        </div>
                        ` : ''}
                    </div>
                </div>`;

                // Parent/Guardian Information
                html += `
                <div class="col-12">
                    <div style="background: white; border: 3px solid #70167E; border-radius: 20px; padding: 30px; box-shadow: 0 8px 24px rgba(112,22,126,0.15);">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                            <div style="width: 50px; height: 50px; background: #70167E; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-user-friends" style="color: white; font-size: 1.5rem;"></i>
                            </div>
                            <h5 style="color: #4A2559; font-weight: 700; margin: 0;">Parent/Guardian Contact</h5>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div style="background: rgba(112,22,126,0.05); padding: 20px; border-radius: 12px; height: 100%;">
                                    <h6 style="color: #70167E; font-weight: 700; margin-bottom: 15px;">Mother/Guardian</h6>
                                    <p style="color: #4A2559; font-weight: 600; font-size: 1.05rem; margin-bottom: 8px;">${fd.get('mother_name') || 'Not specified'}</p>
                                    <p style="color: #6c757d; margin-bottom: 5px; font-size: 0.9rem;"><i class="fas fa-phone me-2" style="color: #70167E;"></i>${fd.get('mother_cell') || '-'}</p>
                                    <p style="color: #6c757d; margin-bottom: 0; font-size: 0.9rem;"><i class="fas fa-envelope me-2" style="color: #70167E;"></i>${fd.get('mother_email') || '-'}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="background: rgba(112,22,126,0.05); padding: 20px; border-radius: 12px; height: 100%;">
                                    <h6 style="color: #70167E; font-weight: 700; margin-bottom: 15px;">Father/Guardian</h6>
                                    <p style="color: #4A2559; font-weight: 600; font-size: 1.05rem; margin-bottom: 8px;">${fd.get('father_name') || 'Not specified'}</p>
                                    <p style="color: #6c757d; margin-bottom: 5px; font-size: 0.9rem;"><i class="fas fa-phone me-2" style="color: #70167E;"></i>${fd.get('father_cell') || '-'}</p>
                                    <p style="color: #6c757d; margin-bottom: 0; font-size: 0.9rem;"><i class="fas fa-envelope me-2" style="color: #70167E;"></i>${fd.get('father_email') || '-'}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;

                // Emergency Contact & Medical Summary
                html += `
                <div class="col-md-6">
                    <div style="background: white; border: 3px solid #e91e63; border-radius: 20px; padding: 30px; box-shadow: 0 8px 24px rgba(233,30,99,0.15); height: 100%;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                            <div style="width: 50px; height: 50px; background: #e91e63; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-phone-alt" style="color: white; font-size: 1.5rem;"></i>
                            </div>
                            <h5 style="color: #4A2559; font-weight: 700; margin: 0;">Emergency Contact</h5>
                        </div>
                        <p style="color: #4A2559; font-weight: 600; font-size: 1.05rem; margin-bottom: 8px;">${fd.get('emergency_name') || 'Not specified'}</p>
                        <p style="color: #6c757d; margin: 0;"><i class="fas fa-phone me-2" style="color: #e91e63;"></i>${fd.get('emergency_tel') || '-'}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div style="background: white; border: 3px solid #e91e63; border-radius: 20px; padding: 30px; box-shadow: 0 8px 24px rgba(233,30,99,0.15); height: 100%;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                            <div style="width: 50px; height: 50px; background: #e91e63; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-medkit" style="color: white; font-size: 1.5rem;"></i>
                            </div>
                            <h5 style="color: #4A2559; font-weight: 700; margin: 0;">Medical Information</h5>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label style="color: #6c757d; font-size: 0.85rem; font-weight: 600; text-transform: uppercase;">Doctor</label>
                            <p style="color: #4A2559; font-weight: 600; margin: 0;">${fd.get('doctor_name') || 'Not specified'}</p>
                            <small style="color: #6c757d;">${fd.get('doctor_tel') || ''}</small>
                        </div>
                        ${fd.get('medical_aid') ? `
                        <div style="margin-top: 10px;">
                            <label style="color: #6c757d; font-size: 0.85rem; font-weight: 600; text-transform: uppercase;">Medical Aid</label>
                            <p style="color: #4A2559; font-weight: 600; margin: 0;">${fd.get('medical_aid')}</p>
                            ${fd.get('medical_aid_number') ? `<small style="color: #6c757d;">${fd.get('medical_aid_number')}</small>` : ''}
                        </div>
                        ` : ''}
                        ${fd.get('allergies') ? `
                        <div style="margin-top: 15px; padding: 10px; background: rgba(233,30,99,0.1); border-radius: 8px;">
                            <p style="color: #e91e63; font-weight: 600; margin: 0; font-size: 0.9rem;"><i class="fas fa-exclamation-triangle me-2"></i>Has allergies noted</p>
                        </div>
                        ` : ''}
                    </div>
                </div>`;

                html += '</div>';

                document.getElementById('reviewSummary').innerHTML = html;
            }

            form.addEventListener('change', saveProgress);

            // File upload handlers
            document.querySelectorAll('.file-input').forEach(input => {
                input.addEventListener('change', function(e) {
                    const inputId = this.id;
                    const boxId = inputId + 'Box';
                    const displayId = inputId + 'Display';
                    const files = this.files;

                    if (files.length > 0) {
                        // Show file info
                        const box = document.getElementById(boxId);
                        const display = document.getElementById(displayId);

                        if (files.length === 1) {
                            // Single file
                            const file = files[0];
                            const fileName = file.name;
                            const fileSize = formatFileSize(file.size);

                            display.querySelector('.file-name').textContent = fileName;
                            display.querySelector('.file-size').textContent = fileSize;
                        } else {
                            // Multiple files
                            display.querySelector('.file-name').textContent = `${files.length} files selected`;
                            const totalSize = Array.from(files).reduce((sum, file) => sum + file.size, 0);
                            display.querySelector('.file-size').textContent = formatFileSize(totalSize);
                        }

                        // Hide upload box and show file display
                        box.style.display = 'none';
                        display.style.display = 'flex';
                    }
                });
            });

        });

        // Helper function to format file size
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
        }

        // Remove file function
        function removeFile(inputId) {
            const input = document.getElementById(inputId);
            const box = document.getElementById(inputId + 'Box');
            const display = document.getElementById(inputId + 'Display');

            // Clear the input
            input.value = '';

            // Show upload box and hide file display
            box.style.display = 'block';
            display.style.display = 'none';
        }
    </script>

@endpush
