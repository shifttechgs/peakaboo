@extends('layouts.portal')

@section('title', 'Profile')
@section('portal-name', 'Parent Portal')
@section('page-title', 'My Profile')

@section('sidebar-nav')
<a href="{{ route('parent.dashboard') }}" class="nav-link">
    <i class="fas fa-home"></i> Dashboard
</a>
<a href="{{ route('parent.children') }}" class="nav-link">
    <i class="fas fa-child"></i> My Children
</a>
<a href="{{ route('parent.calendar') }}" class="nav-link">
    <i class="fas fa-calendar-alt"></i> Calendar
</a>
<a href="{{ route('parent.newsletters') }}" class="nav-link">
    <i class="fas fa-newspaper"></i> Newsletters
</a>
<a href="{{ route('parent.gallery') }}" class="nav-link">
    <i class="fas fa-images"></i> Photo Gallery
</a>

<div class="nav-section-title">Billing</div>
<a href="{{ route('parent.fees') }}" class="nav-link">
    <i class="fas fa-file-invoice-dollar"></i> Fee Schedule
</a>
<a href="{{ route('parent.statements') }}" class="nav-link">
    <i class="fas fa-receipt"></i> Statements
</a>

<div class="nav-section-title">Services</div>
<a href="{{ route('parent.holiday-care') }}" class="nav-link">
    <i class="fas fa-umbrella-beach"></i> Holiday Care
</a>
<a href="{{ route('parent.extra-murals') }}" class="nav-link">
    <i class="fas fa-futbol"></i> Extra Murals
</a>
<a href="{{ route('parent.snack-box') }}" class="nav-link">
    <i class="fas fa-apple-alt"></i> Snack Box
</a>

<div class="nav-section-title">Communication</div>
<a href="{{ route('parent.messages') }}" class="nav-link">
    <i class="fas fa-comments"></i> Messages
</a>

<div class="nav-section-title">Account</div>
<a href="{{ route('parent.profile') }}" class="nav-link active">
    <i class="fas fa-user-cog"></i> Profile
</a>
@endsection

@section('content')
<div class="row g-4">
    <div class="col-lg-8">
        <!-- Personal Information -->
        <div class="portal-card mb-4">
            <div class="portal-card-header">
                <i class="fas fa-user me-2"></i> Personal Information
            </div>
            <div class="portal-card-body">
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">First Name</label>
                            <input type="text" class="form-control" value="{{ $parent['first_name'] ?? 'Sarah' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Last Name</label>
                            <input type="text" class="form-control" value="{{ $parent['last_name'] ?? 'Thompson' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email" class="form-control" value="{{ $parent['email'] ?? 'sarah.thompson@email.com' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Phone Number</label>
                            <input type="tel" class="form-control" value="{{ $parent['phone'] ?? '082 898 9967' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Home Address</label>
                            <input type="text" class="form-control mb-2" placeholder="Street address" value="123 Main Street">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Suburb" value="Parklands">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="City" value="Cape Town">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="Postal Code" value="7441">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-portal btn-portal-primary">
                                <i class="fas fa-save me-2"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Emergency Contacts -->
        <div class="portal-card mb-4">
            <div class="portal-card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-phone-alt me-2"></i> Emergency Contacts</span>
                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addContactModal">
                    <i class="fas fa-plus me-1"></i> Add Contact
                </button>
            </div>
            <div class="portal-card-body">
                @php
                    $emergencyContacts = [
                        ['name' => 'John Thompson', 'relation' => 'Father', 'phone' => '082 123 4567', 'email' => 'john@email.com'],
                        ['name' => 'Mary Johnson', 'relation' => 'Grandmother', 'phone' => '021 555 1234', 'email' => 'mary@email.com'],
                    ];
                @endphp
                @foreach($emergencyContacts as $contact)
                <div class="border rounded p-3 {{ !$loop->last ? 'mb-3' : '' }}">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="fw-bold mb-1">{{ $contact['name'] }}</h6>
                            <p class="text-muted small mb-2">{{ $contact['relation'] }}</p>
                            <p class="small mb-0">
                                <i class="fas fa-phone text-primary me-2"></i>{{ $contact['phone'] }}<br>
                                <i class="fas fa-envelope text-primary me-2"></i>{{ $contact['email'] }}
                            </p>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i> Edit</a></li>
                                <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Remove</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Change Password -->
        <div class="portal-card">
            <div class="portal-card-header">
                <i class="fas fa-lock me-2"></i> Change Password
            </div>
            <div class="portal-card-body">
                <form>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Current Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">New Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Confirm New Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-portal btn-portal-primary">
                                <i class="fas fa-key me-2"></i> Update Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Account Status -->
        <div class="portal-card mb-4">
            <div class="portal-card-header">Account Status</div>
            <div class="portal-card-body text-center">
                <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <i class="fas fa-check-circle fa-3x text-success"></i>
                </div>
                <h6 class="fw-bold">Account Active</h6>
                <p class="text-muted small mb-3">Member since January 2025</p>
                <div class="border-top pt-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Children Enrolled:</span>
                        <span class="fw-semibold">{{ count($children) }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted small">Account Balance:</span>
                        <span class="fw-semibold text-success">R 0.00</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notification Preferences -->
        <div class="portal-card mb-4">
            <div class="portal-card-header">
                <i class="fas fa-bell me-2"></i> Notifications
            </div>
            <div class="portal-card-body">
                <div class="mb-3">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="emailNotif" checked>
                        <label class="form-check-label" for="emailNotif">Email Notifications</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="smsNotif" checked>
                        <label class="form-check-label" for="smsNotif">SMS Notifications</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="whatsappNotif">
                        <label class="form-check-label" for="whatsappNotif">WhatsApp Updates</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="newsletterNotif" checked>
                        <label class="form-check-label" for="newsletterNotif">Monthly Newsletter</label>
                    </div>
                </div>
                <button class="btn btn-sm btn-portal btn-portal-primary w-100">
                    <i class="fas fa-save me-2"></i> Save Preferences
                </button>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="portal-card">
            <div class="portal-card-header">Quick Actions</div>
            <div class="portal-card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('parent.statements') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-download me-2"></i> Download Statement
                    </a>
                    <a href="#" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-file-pdf me-2"></i> View Contract
                    </a>
                    <a href="#" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-question-circle me-2"></i> Help & Support
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Emergency Contact Modal -->
<div class="modal fade" id="addContactModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Add Emergency Contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Full Name</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Relationship</label>
                        <select class="form-select" required>
                            <option value="">Select relationship...</option>
                            <option>Father</option>
                            <option>Mother</option>
                            <option>Grandfather</option>
                            <option>Grandmother</option>
                            <option>Aunt</option>
                            <option>Uncle</option>
                            <option>Family Friend</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Phone Number</label>
                        <input type="tel" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email Address</label>
                        <input type="email" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-portal btn-portal-primary">
                    <i class="fas fa-plus me-2"></i> Add Contact
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
