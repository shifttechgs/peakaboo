@extends('layouts.public')

@section('title', 'Application Status - Peekaboo Daycare')

@section('content')
<section class="pk-section" style="margin-top: 100px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bold">Application Status</h1>
                    <p class="text-muted">Track the progress of your application</p>
                </div>

                <div class="bg-white rounded-4 shadow-sm p-5 mb-5">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
                        <div>
                            <small class="text-muted">Application Reference</small>
                            <h3 class="fw-bold mb-0">{{ $application['id'] }}</h3>
                        </div>
                        <div>
                            @php
                                $statusColors = [
                                    'pending' => 'warning',
                                    'approved' => 'success',
                                    'rejected' => 'danger',
                                    'waiting_list' => 'info'
                                ];
                                $statusLabels = [
                                    'pending' => 'Under Review',
                                    'approved' => 'Approved',
                                    'rejected' => 'Not Approved',
                                    'waiting_list' => 'Waiting List'
                                ];
                            @endphp
                            <span class="badge bg-{{ $statusColors[$application['status']] }} fs-6 px-4 py-2">
                                {{ $statusLabels[$application['status']] }}
                            </span>
                        </div>
                    </div>

                    <hr>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <small class="text-muted">Child's Name</small>
                            <p class="fw-bold mb-0">{{ $application['child_name'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted">Program</small>
                            <p class="fw-bold mb-0">{{ $application['program'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted">Fee Option</small>
                            <p class="fw-bold mb-0">{{ $application['fee_option'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted">Submitted</small>
                            <p class="fw-bold mb-0">{{ date('d M Y', strtotime($application['submitted_at'])) }}</p>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted">Source</small>
                            <p class="fw-bold mb-0">{{ $application['source'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted">Documents</small>
                            <p class="fw-bold mb-0">
                                @if($application['documents_complete'])
                                    <span class="text-success"><i class="fas fa-check-circle me-1"></i> Complete</span>
                                @else
                                    <span class="text-warning"><i class="fas fa-exclamation-circle me-1"></i> Pending</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Application Timeline -->
                <div class="bg-white rounded-4 shadow-sm p-5 mb-5">
                    <h5 class="fw-bold mb-4">Application Timeline</h5>

                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Application Submitted</h6>
                                <small class="text-muted">{{ date('d M Y', strtotime($application['submitted_at'])) }}</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker {{ $application['status'] != 'pending' ? 'bg-success' : 'bg-warning' }}"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Under Review</h6>
                                <small class="text-muted">{{ $application['status'] == 'pending' ? 'In Progress...' : 'Completed' }}</small>
                            </div>
                        </div>
                        @if($application['status'] == 'approved')
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Application Approved</h6>
                                <small class="text-muted">Congratulations! Next steps sent via email.</small>
                            </div>
                        </div>
                        @elseif($application['status'] == 'waiting_list')
                        <div class="timeline-item">
                            <div class="timeline-marker bg-info"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Added to Waiting List</h6>
                                <small class="text-muted">We'll contact you when a spot opens.</small>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                @if($application['status'] == 'approved')
                <div class="alert alert-success">
                    <h5><i class="fas fa-check-circle me-2"></i> Congratulations!</h5>
                    <p class="mb-0">Your application has been approved. Please check your email for next steps including payment of the R500 registration fee.</p>
                </div>
                @elseif($application['status'] == 'pending')
                <div class="alert alert-info">
                    <h5><i class="fas fa-clock me-2"></i> Under Review</h5>
                    <p class="mb-0">We're reviewing your application. You'll receive an email within 48 hours with our decision.</p>
                </div>
                @endif

                <div class="text-center">
                    <a href="{{ route('home') }}" class="pk-btn-secondary me-2">
                        <i class="fas fa-home me-2"></i> Back to Home
                    </a>
                    <a href="https://wa.me/27828989967?text=Hi!%20I'd%20like%20to%20check%20on%20application%20{{ $application['id'] }}" class="pk-btn-primary" target="_blank">
                        <i class="fab fa-whatsapp me-2"></i> Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 8px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e0e0e0;
}

.timeline-item {
    position: relative;
    padding-bottom: 25px;
}

.timeline-item:last-child {
    padding-bottom: 0;
}

.timeline-marker {
    position: absolute;
    left: -26px;
    top: 5px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
}

.timeline-content {
    padding-left: 10px;
}
</style>
@endsection
