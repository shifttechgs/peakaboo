@extends('layouts.public')

@section('title', 'Enrolment Form - Peekaboo Daycare')

@push('styles')
<style>
    .enrol-wizard {
        margin-top: 100px;
    }

    .step-indicator {
        display: flex;
        justify-content: center;
        margin-bottom: 40px;
    }

    .step-item {
        display: flex;
        align-items: center;
        position: relative;
    }

    .step-item:not(:last-child)::after {
        content: '';
        width: 60px;
        height: 3px;
        background: #e0e0e0;
        margin: 0 10px;
    }

    .step-item.completed:not(:last-child)::after {
        background: var(--pk-primary);
    }

    .step-circle {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e0e0e0;
        color: #666;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .step-item.active .step-circle,
    .step-item.completed .step-circle {
        background: var(--pk-primary);
        color: white;
    }

    .step-item.completed .step-circle {
        background: #28a745;
    }

    .step-content {
        display: none;
    }

    .step-content.active {
        display: block;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .form-section {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        margin-bottom: 30px;
    }

    .form-section h4 {
        color: var(--pk-primary);
        border-bottom: 2px solid var(--pk-soft-blue);
        padding-bottom: 15px;
        margin-bottom: 25px;
    }

    .form-label {
        font-weight: 600;
        color: var(--pk-dark);
        margin-bottom: 8px;
    }

    .form-control, .form-select {
        border-radius: 12px;
        padding: 12px 16px;
        border: 2px solid #e0e0e0;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--pk-primary);
        box-shadow: 0 0 0 3px rgba(0, 119, 182, 0.1);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .consent-box {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 15px;
    }

    .consent-box h6 {
        color: var(--pk-primary);
    }

    .file-upload-box {
        border: 2px dashed #ccc;
        border-radius: 12px;
        padding: 30px;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .file-upload-box:hover {
        border-color: var(--pk-primary);
        background: #f8f9fa;
    }

    .file-upload-box.dragover {
        border-color: var(--pk-primary);
        background: rgba(0, 119, 182, 0.05);
    }

    .signature-pad {
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        background: #fafafa;
        height: 150px;
        width: 100%;
    }

    .progress-bar-custom {
        height: 8px;
        background: #e0e0e0;
        border-radius: 4px;
        overflow: hidden;
        margin-bottom: 10px;
    }

    .progress-bar-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--pk-primary), var(--pk-primary-light));
        transition: width 0.5s ease;
    }

    .autosave-indicator {
        position: fixed;
        bottom: 20px;
        left: 20px;
        background: white;
        padding: 10px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        font-size: 0.9rem;
        z-index: 100;
    }

    @media (max-width: 768px) {
        .step-item:not(:last-child)::after {
            width: 20px;
        }
        .step-circle {
            width: 35px;
            height: 35px;
            font-size: 0.9rem;
        }
        .form-section {
            padding: 25px;
        }
    }
</style>
@endpush

@section('content')
<div class="enrol-wizard">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Progress Bar -->
                <div class="mb-4">
                    <div class="progress-bar-custom">
                        <div class="progress-bar-fill" id="progressBar" style="width: 14.28%;"></div>
                    </div>
                    <div class="d-flex justify-content-between small text-muted">
                        <span>Step <span id="currentStepNum">1</span> of 7</span>
                        <span id="progressPercent">14%</span>
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

                <form id="enrolmentForm" action="{{ route('enrol.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Step 1: Program Selection -->
                    <div class="step-content active" data-step="1">
                        <div class="form-section">
                            <h4><i class="fas fa-school me-2"></i> Program Selection</h4>
                            <p class="text-muted mb-4">Choose the program and fee option that suits your family.</p>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Preferred Start Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="start_date" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Program <span class="text-danger">*</span></label>
                                    <select class="form-select" name="program" required>
                                        <option value="">Select a program...</option>
                                        @foreach($programs as $program)
                                        <option value="{{ $program['id'] }}">{{ $program['name'] }} ({{ $program['age'] }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Fee Option <span class="text-danger">*</span></label>
                                    <div class="row g-3">
                                        @foreach($fees as $fee)
                                        @if(!isset($fee['addon']))
                                        <div class="col-md-6">
                                            <div class="form-check border rounded-3 p-4">
                                                <input class="form-check-input" type="radio" name="fee_option" id="fee_{{ $fee['id'] }}" value="{{ $fee['id'] }}" {{ $fee['popular'] ? 'checked' : '' }}>
                                                <label class="form-check-label w-100" for="fee_{{ $fee['id'] }}">
                                                    <strong>{{ $fee['name'] }}</strong>
                                                    <span class="badge bg-primary float-end">R{{ number_format($fee['price']) }}/month</span>
                                                    <br><small class="text-muted">{{ $fee['hours'] }}</small>
                                                </label>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
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
                            <h4><i class="fas fa-baby me-2"></i> Child's Information</h4>
                            <p class="text-muted mb-4">Please provide your child's details as per their birth certificate.</p>

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
                                <h4 class="mb-0"><i class="fas fa-user-plus me-2"></i> Second Child (Optional)</h4>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="hasSecondChild" name="has_second_child">
                                    <label class="form-check-label" for="hasSecondChild">Add another child</label>
                                </div>
                            </div>

                            <div id="secondChildFields" style="display: none;">
                                <div class="alert alert-success mb-4">
                                    <i class="fas fa-tags me-2"></i> Great news! Sibling discount applies for second child.
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
                            <h4><i class="fas fa-user me-2"></i> Mother/Guardian Information</h4>

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
                            <h4><i class="fas fa-user me-2"></i> Father/Guardian Information</h4>

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
                            <h4><i class="fas fa-home me-2"></i> Address</h4>

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
                            <h4><i class="fas fa-phone-alt me-2"></i> Emergency Contact</h4>
                            <p class="text-muted mb-4">Someone we can contact in an emergency if parents are unavailable.</p>

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
                            <h4><i class="fas fa-medkit me-2"></i> Medical Information</h4>

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
                            <h4><i class="fas fa-file-upload me-2"></i> Document Upload</h4>
                            <p class="text-muted mb-4">Upload required documents. You can also submit these later.</p>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Birth Certificate</label>
                                    <div class="file-upload-box">
                                        <input type="file" name="birth_certificate" class="d-none" id="birthCert" accept=".pdf,.jpg,.jpeg,.png">
                                        <label for="birthCert" class="mb-0 w-100 cursor-pointer">
                                            <i class="fas fa-cloud-upload-alt fa-2x text-muted mb-2"></i>
                                            <p class="mb-0 text-muted">Click to upload or drag & drop</p>
                                            <small class="text-muted">PDF, JPG, PNG (Max 5MB)</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Clinic Card</label>
                                    <div class="file-upload-box">
                                        <input type="file" name="clinic_card" class="d-none" id="clinicCard" accept=".pdf,.jpg,.jpeg,.png">
                                        <label for="clinicCard" class="mb-0 w-100 cursor-pointer">
                                            <i class="fas fa-cloud-upload-alt fa-2x text-muted mb-2"></i>
                                            <p class="mb-0 text-muted">Click to upload or drag & drop</p>
                                            <small class="text-muted">PDF, JPG, PNG (Max 5MB)</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Parent ID Copies</label>
                                    <div class="file-upload-box">
                                        <input type="file" name="parent_ids" class="d-none" id="parentIds" accept=".pdf,.jpg,.jpeg,.png" multiple>
                                        <label for="parentIds" class="mb-0 w-100 cursor-pointer">
                                            <i class="fas fa-cloud-upload-alt fa-2x text-muted mb-2"></i>
                                            <p class="mb-0 text-muted">Click to upload or drag & drop</p>
                                            <small class="text-muted">Multiple files allowed</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Proof of Address</label>
                                    <div class="file-upload-box">
                                        <input type="file" name="proof_address" class="d-none" id="proofAddress" accept=".pdf,.jpg,.jpeg,.png">
                                        <label for="proofAddress" class="mb-0 w-100 cursor-pointer">
                                            <i class="fas fa-cloud-upload-alt fa-2x text-muted mb-2"></i>
                                            <p class="mb-0 text-muted">Click to upload or drag & drop</p>
                                            <small class="text-muted">PDF, JPG, PNG (Max 5MB)</small>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-info mt-4 mb-0">
                                <i class="fas fa-info-circle me-2"></i>
                                Documents can be submitted later via email or WhatsApp if not available now.
                            </div>
                        </div>
                    </div>

                    <!-- Step 6: Consents -->
                    <div class="step-content" data-step="6">
                        <div class="form-section">
                            <h4><i class="fas fa-file-signature me-2"></i> Consent & Agreements</h4>
                            <p class="text-muted mb-4">Please read and accept the following agreements.</p>

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
                            <h4><i class="fas fa-check-double me-2"></i> Review & Submit</h4>
                            <p class="text-muted mb-4">Please review your application before submitting.</p>

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

                            <div class="alert alert-success">
                                <i class="fas fa-envelope me-2"></i>
                                <strong>Confirmation:</strong> After submitting, you will receive a confirmation email with your application reference number.
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4" id="prevBtn" style="display: none;">
                            <i class="fas fa-arrow-left me-2"></i> Previous
                        </button>
                        <button type="button" class="pk-btn-primary btn-lg px-4 ms-auto" id="nextBtn">
                            Next <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                        <button type="submit" class="pk-btn-primary btn-lg px-4 ms-auto" id="submitBtn" style="display: none;">
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
    <i class="fas fa-save me-2 text-success"></i> Progress saved
</div>
@endsection

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

    // Load saved data
    loadSavedData();

    // Second child toggle
    document.getElementById('hasSecondChild').addEventListener('change', function() {
        document.getElementById('secondChildFields').style.display = this.checked ? 'block' : 'none';
    });

    // Navigation
    nextBtn.addEventListener('click', function() {
        if (validateStep(currentStep)) {
            saveProgress();
            goToStep(currentStep + 1);
        }
    });

    prevBtn.addEventListener('click', function() {
        goToStep(currentStep - 1);
    });

    function goToStep(step) {
        if (step < 1 || step > totalSteps) return;

        // Update step content
        stepContents.forEach(content => content.classList.remove('active'));
        document.querySelector(`.step-content[data-step="${step}"]`).classList.add('active');

        // Update step indicators
        stepItems.forEach((item, index) => {
            item.classList.remove('active');
            if (index + 1 < step) {
                item.classList.add('completed');
            } else if (index + 1 === step) {
                item.classList.add('active');
            } else {
                item.classList.remove('completed');
            }
        });

        currentStep = step;

        // Update progress bar
        const progress = Math.round((step / totalSteps) * 100);
        progressBar.style.width = progress + '%';
        progressPercent.textContent = progress + '%';
        currentStepNum.textContent = step;

        // Update buttons
        prevBtn.style.display = step > 1 ? 'block' : 'none';
        nextBtn.style.display = step < totalSteps ? 'block' : 'none';
        submitBtn.style.display = step === totalSteps ? 'block' : 'none';

        // Generate review summary on last step
        if (step === totalSteps) {
            generateReviewSummary();
        }

        // Scroll to top
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function validateStep(step) {
        const stepContent = document.querySelector(`.step-content[data-step="${step}"]`);
        const requiredFields = stepContent.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                isValid = false;
            } else {
                field.classList.remove('is-invalid');
            }
        });

        // Check checkboxes on consent step
        if (step === 6) {
            const requiredChecks = stepContent.querySelectorAll('input[type="checkbox"][required]');
            requiredChecks.forEach(check => {
                if (!check.checked) {
                    check.classList.add('is-invalid');
                    isValid = false;
                } else {
                    check.classList.remove('is-invalid');
                }
            });
        }

        if (!isValid) {
            alert('Please fill in all required fields.');
        }

        return isValid;
    }

    function saveProgress() {
        const formData = new FormData(form);
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });
        localStorage.setItem('peekaboo_enrolment', JSON.stringify(data));

        // Show autosave indicator
        autosaveIndicator.style.display = 'block';
        setTimeout(() => {
            autosaveIndicator.style.display = 'none';
        }, 2000);
    }

    function loadSavedData() {
        const saved = localStorage.getItem('peekaboo_enrolment');
        if (saved) {
            const data = JSON.parse(saved);
            Object.keys(data).forEach(key => {
                const field = form.querySelector(`[name="${key}"]`);
                if (field) {
                    if (field.type === 'checkbox') {
                        field.checked = data[key] === 'on' || data[key] === true;
                    } else if (field.type === 'radio') {
                        const radio = form.querySelector(`[name="${key}"][value="${data[key]}"]`);
                        if (radio) radio.checked = true;
                    } else {
                        field.value = data[key];
                    }
                }
            });
        }
    }

    function generateReviewSummary() {
        const formData = new FormData(form);
        let html = '<div class="row g-4">';

        // Program Info
        html += `
            <div class="col-md-6">
                <div class="border rounded p-3">
                    <h6 class="text-primary mb-3"><i class="fas fa-school me-2"></i>Program</h6>
                    <p class="mb-1"><strong>Start Date:</strong> ${formData.get('start_date') || 'Not specified'}</p>
                    <p class="mb-1"><strong>Program:</strong> ${formData.get('program') || 'Not selected'}</p>
                    <p class="mb-0"><strong>Fee Option:</strong> ${formData.get('fee_option') || 'Not selected'}</p>
                </div>
            </div>
        `;

        // Child Info
        html += `
            <div class="col-md-6">
                <div class="border rounded p-3">
                    <h6 class="text-primary mb-3"><i class="fas fa-baby me-2"></i>Child</h6>
                    <p class="mb-1"><strong>Name:</strong> ${formData.get('child_name') || 'Not provided'}</p>
                    <p class="mb-1"><strong>DOB:</strong> ${formData.get('child_dob') || 'Not provided'}</p>
                    <p class="mb-0"><strong>ID:</strong> ${formData.get('child_id') || 'Not provided'}</p>
                </div>
            </div>
        `;

        // Mother Info
        html += `
            <div class="col-md-6">
                <div class="border rounded p-3">
                    <h6 class="text-primary mb-3"><i class="fas fa-user me-2"></i>Mother/Guardian</h6>
                    <p class="mb-1"><strong>Name:</strong> ${formData.get('mother_name') || 'Not provided'}</p>
                    <p class="mb-1"><strong>Cell:</strong> ${formData.get('mother_cell') || 'Not provided'}</p>
                    <p class="mb-0"><strong>Email:</strong> ${formData.get('mother_email') || 'Not provided'}</p>
                </div>
            </div>
        `;

        // Father Info
        html += `
            <div class="col-md-6">
                <div class="border rounded p-3">
                    <h6 class="text-primary mb-3"><i class="fas fa-user me-2"></i>Father/Guardian</h6>
                    <p class="mb-1"><strong>Name:</strong> ${formData.get('father_name') || 'Not provided'}</p>
                    <p class="mb-1"><strong>Cell:</strong> ${formData.get('father_cell') || 'Not provided'}</p>
                    <p class="mb-0"><strong>Email:</strong> ${formData.get('father_email') || 'Not provided'}</p>
                </div>
            </div>
        `;

        html += '</div>';

        document.getElementById('reviewSummary').innerHTML = html;
    }

    // Auto-save on field change
    form.addEventListener('change', function() {
        saveProgress();
    });

    // File upload styling
    document.querySelectorAll('.file-upload-box input[type="file"]').forEach(input => {
        input.addEventListener('change', function() {
            const label = this.closest('.file-upload-box').querySelector('label');
            if (this.files.length > 0) {
                label.innerHTML = `<i class="fas fa-check-circle fa-2x text-success mb-2"></i><p class="mb-0">${this.files[0].name}</p>`;
            }
        });
    });
});
</script>
@endpush
