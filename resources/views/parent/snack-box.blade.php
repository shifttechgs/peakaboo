@extends('layouts.portal')

@section('title', 'Snack Box')
@section('portal-name', 'Parent Portal')
@section('page-title', 'Snack Box Service')

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
<a href="{{ route('parent.snack-box') }}" class="nav-link active">
    <i class="fas fa-apple-alt"></i> Snack Box
</a>

<div class="nav-section-title">Communication</div>
<a href="{{ route('parent.messages') }}" class="nav-link">
    <i class="fas fa-comments"></i> Messages
</a>

<div class="nav-section-title">Account</div>
<a href="{{ route('parent.profile') }}" class="nav-link">
    <i class="fas fa-user-cog"></i> Profile
</a>
@endsection

@section('content')
<!-- Service Overview -->
<div class="portal-card mb-4" style="background: linear-gradient(135deg, #B5D8EB 0%, #FFB5BA 100%);">
    <div class="portal-card-body">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h5 class="fw-bold mb-2">Healthy Snack Box Service</h5>
                <p class="mb-2">We prepare fresh, nutritious snacks daily. All dietary requirements catered for including allergies, vegetarian, halaal, and kosher.</p>
                <p class="mb-0"><strong>R400/month</strong> | Includes morning & afternoon snacks</p>
            </div>
            <div class="col-md-4 text-end d-none d-md-block">
                <i class="fas fa-apple-alt fa-5x opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<!-- Current Subscription -->
<div class="row g-4 mb-4">
    @foreach($children as $child)
    <div class="col-md-6">
        <div class="portal-card h-100">
            <div class="portal-card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="fw-bold mb-1">{{ $child['name'] }}</h6>
                        <small class="text-muted">{{ $child['program'] }}</small>
                    </div>
                    @if(isset($child['snack_box']) && $child['snack_box'])
                    <span class="badge bg-success">Active</span>
                    @else
                    <span class="badge bg-secondary">Not Subscribed</span>
                    @endif
                </div>
                @if(isset($child['snack_box']) && $child['snack_box'])
                <div class="mb-3">
                    <p class="mb-2"><strong>Dietary Preferences:</strong></p>
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <span class="badge bg-info">No Nuts</span>
                        <span class="badge bg-warning">Vegetarian</span>
                    </div>
                    <p class="small text-muted mb-0">Subscribed since: January 2025</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-sm btn-outline-primary flex-grow-1" data-bs-toggle="modal" data-bs-target="#editPreferencesModal">
                        <i class="fas fa-edit me-1"></i> Edit Preferences
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                </div>
                @else
                <p class="text-muted mb-3">{{ $child['name'] }} is not currently subscribed to the snack box service.</p>
                <button class="btn btn-portal btn-portal-primary w-100" data-bs-toggle="modal" data-bs-target="#subscribeModal">
                    <i class="fas fa-plus me-2"></i> Subscribe Now
                </button>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- This Week's Menu -->
<div class="portal-card mb-4">
    <div class="portal-card-header">
        <i class="fas fa-calendar-week me-2"></i> This Week's Menu ({{ date('d M') }} - {{ date('d M', strtotime('+4 days')) }})
    </div>
    <div class="portal-card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class="bg-light">
                    <tr>
                        <th>Day</th>
                        <th>Morning Snack</th>
                        <th>Afternoon Snack</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-semibold">Monday</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-apple-alt text-danger"></i>
                                Fresh fruit platter & crackers
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-cookie text-warning"></i>
                                Homemade oat cookies & milk
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Tuesday</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-cheese text-warning"></i>
                                Cheese cubes & grapes
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-bread-slice text-warning"></i>
                                Mini sandwiches & juice
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Wednesday</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-carrot text-danger"></i>
                                Veggie sticks & hummus
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-ice-cream text-info"></i>
                                Frozen yogurt pops
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Thursday</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-egg text-warning"></i>
                                Boiled eggs & toast soldiers
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-candy-cane text-danger"></i>
                                Rice cakes & nut-free spread
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Friday</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-seedling text-success"></i>
                                Fresh fruit smoothie & muffin
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-pizza-slice text-danger"></i>
                                Mini pizzas (Friday treat!)
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- What's Included -->
<div class="portal-card">
    <div class="portal-card-header">
        <i class="fas fa-check-circle me-2"></i> What's Included
    </div>
    <div class="portal-card-body">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center p-3">
                    <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-leaf fa-2x text-success"></i>
                    </div>
                    <h6 class="fw-bold">Fresh Daily</h6>
                    <p class="small text-muted mb-0">All snacks prepared fresh each morning using quality ingredients</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-3">
                    <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-heartbeat fa-2x text-primary"></i>
                    </div>
                    <h6 class="fw-bold">Nutritious</h6>
                    <p class="small text-muted mb-0">Balanced snacks approved by our nutritionist with no artificial additives</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-3">
                    <div class="rounded-circle bg-warning bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-allergies fa-2x text-warning"></i>
                    </div>
                    <h6 class="fw-bold">Allergy Safe</h6>
                    <p class="small text-muted mb-0">All allergies and dietary requirements carefully accommodated</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-3">
                    <div class="rounded-circle bg-info bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-calendar-alt fa-2x text-info"></i>
                    </div>
                    <h6 class="fw-bold">Weekly Menus</h6>
                    <p class="small text-muted mb-0">New menu shared every Friday for the week ahead</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-3">
                    <div class="rounded-circle bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-carrot fa-2x text-danger"></i>
                    </div>
                    <h6 class="fw-bold">Variety</h6>
                    <p class="small text-muted mb-0">Rotating menu ensures kids don't get bored and try new foods</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-3">
                    <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-money-bill-wave fa-2x text-success"></i>
                    </div>
                    <h6 class="fw-bold">Great Value</h6>
                    <p class="small text-muted mb-0">Just R400/month for 2 snacks daily - cancel anytime</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Subscribe Modal -->
<div class="modal fade" id="subscribeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Subscribe to Snack Box</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Child</label>
                        <select class="form-select" required>
                            <option value="">Select child...</option>
                            @foreach($children as $child)
                            <option value="{{ $child['id'] ?? $loop->index }}">{{ $child['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dietary Requirements</label>
                        <div class="border rounded p-3 bg-light">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="vegetarian">
                                <label class="form-check-label" for="vegetarian">Vegetarian</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="halaal">
                                <label class="form-check-label" for="halaal">Halaal</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="kosher">
                                <label class="form-check-label" for="kosher">Kosher</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="lactose">
                                <label class="form-check-label" for="lactose">Lactose Free</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Allergies</label>
                        <input type="text" class="form-control" placeholder="e.g., Peanuts, Tree nuts, Eggs">
                        <small class="text-muted">Separate multiple allergies with commas</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Additional Notes (Optional)</label>
                        <textarea class="form-control" rows="2" placeholder="Any other dietary preferences or information..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Start Date</label>
                        <input type="date" class="form-control" min="{{ date('Y-m-d', strtotime('next monday')) }}" required>
                    </div>
                    <div class="bg-light rounded p-3">
                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold">Monthly Fee:</span>
                            <span class="fw-bold text-primary h5 mb-0">R 400.00</span>
                        </div>
                        <small class="text-muted">Includes 2 snacks daily, Monday to Friday</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-portal btn-portal-primary">
                    <i class="fas fa-check me-2"></i> Subscribe
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Preferences Modal -->
<div class="modal fade" id="editPreferencesModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Edit Dietary Preferences</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dietary Requirements</label>
                        <div class="border rounded p-3 bg-light">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="edit_vegetarian" checked>
                                <label class="form-check-label" for="edit_vegetarian">Vegetarian</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="edit_halaal">
                                <label class="form-check-label" for="edit_halaal">Halaal</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="edit_kosher">
                                <label class="form-check-label" for="edit_kosher">Kosher</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="edit_lactose">
                                <label class="form-check-label" for="edit_lactose">Lactose Free</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Allergies</label>
                        <input type="text" class="form-control" value="Peanuts, Tree nuts" placeholder="e.g., Peanuts, Tree nuts, Eggs">
                        <small class="text-muted">Separate multiple allergies with commas</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Additional Notes (Optional)</label>
                        <textarea class="form-control" rows="2" placeholder="Any other dietary preferences or information..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-portal btn-portal-primary">
                    <i class="fas fa-save me-2"></i> Save Changes
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
