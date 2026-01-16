@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<div class="page-title">
    <h1>Settings</h1>
    <p>Configure system preferences</p>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <!-- Business Information -->
        <div class="admin-table mb-4">
            <div class="p-4 border-bottom">
                <h5 class="mb-0 fw-bold">Business Information</h5>
            </div>
            <div class="p-4">
                <form>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Business Name</label>
                            <input type="text" class="form-control" value="Peekaboo Daycare & Preschool">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Phone</label>
                            <input type="tel" class="form-control" value="021 557 4999">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Mobile</label>
                            <input type="tel" class="form-control" value="082 898 9967">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control" value="peekaboodaycare@telkomsa.net">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Address</label>
                            <textarea class="form-control" rows="2">139B Humewood Drive, Parklands, 7441, Cape Town</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Operating Hours</label>
                            <input type="text" class="form-control" value="06:00 - 18:00">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Registration Fee</label>
                            <div class="input-group">
                                <span class="input-group-text">R</span>
                                <input type="number" class="form-control" value="500">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-admin btn-admin-primary">
                                <i class="fas fa-save me-2"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Fee Settings -->
        <div class="admin-table mb-4">
            <div class="p-4 border-bottom">
                <h5 class="mb-0 fw-bold">Fee Structure</h5>
            </div>
            <div class="p-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fee Type</th>
                                <th>Amount</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-semibold">Half Day</td>
                                <td>
                                    <div class="input-group input-group-sm" style="max-width: 150px;">
                                        <span class="input-group-text">R</span>
                                        <input type="number" class="form-control" value="3800">
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">Update</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Full Day</td>
                                <td>
                                    <div class="input-group input-group-sm" style="max-width: 150px;">
                                        <span class="input-group-text">R</span>
                                        <input type="number" class="form-control" value="4200">
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">Update</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Snack Box</td>
                                <td>
                                    <div class="input-group input-group-sm" style="max-width: 150px;">
                                        <span class="input-group-text">R</span>
                                        <input type="number" class="form-control" value="400">
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">Update</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Notification Settings -->
        <div class="admin-table">
            <div class="p-4 border-bottom">
                <h5 class="mb-0 fw-bold">Notification Preferences</h5>
            </div>
            <div class="p-4">
                <div class="mb-3">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="emailNotif" checked>
                        <label class="form-check-label" for="emailNotif">Email notifications for new applications</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="smsNotif" checked>
                        <label class="form-check-label" for="smsNotif">SMS alerts for urgent matters</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="paymentNotif" checked>
                        <label class="form-check-label" for="paymentNotif">Payment received notifications</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="dailyReport">
                        <label class="form-check-label" for="dailyReport">Daily summary reports</label>
                    </div>
                </div>
                <button class="btn btn-admin btn-admin-primary">
                    <i class="fas fa-save me-2"></i> Save Preferences
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Quick Links -->
        <div class="admin-table mb-4">
            <div class="p-4 border-bottom">
                <h5 class="mb-0 fw-bold">System Tools</h5>
            </div>
            <div class="p-4">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.settings.audit-log') }}" class="btn btn-outline-primary">
                        <i class="fas fa-history me-2"></i> Audit Log
                    </a>
                    <a href="{{ route('admin.settings.backup') }}" class="btn btn-outline-success">
                        <i class="fas fa-database me-2"></i> Backup & Restore
                    </a>
                    <a href="{{ route('admin.settings.permissions') }}" class="btn btn-outline-warning">
                        <i class="fas fa-user-shield me-2"></i> User Permissions
                    </a>
                </div>
            </div>
        </div>

        <!-- System Info -->
        <div class="admin-table">
            <div class="p-4 border-bottom">
                <h5 class="mb-0 fw-bold">System Information</h5>
            </div>
            <div class="p-4">
                <div class="mb-3">
                    <small class="text-muted">Version</small>
                    <div class="fw-semibold">1.0.0</div>
                </div>
                <div class="mb-3">
                    <small class="text-muted">Last Backup</small>
                    <div class="fw-semibold">{{ date('d M Y H:i') }}</div>
                </div>
                <div class="mb-3">
                    <small class="text-muted">Database Size</small>
                    <div class="fw-semibold">45.2 MB</div>
                </div>
                <div>
                    <small class="text-muted">Storage Used</small>
                    <div class="fw-semibold">1.2 GB / 10 GB</div>
                    <div class="progress mt-1" style="height: 6px;">
                        <div class="progress-bar bg-primary" style="width: 12%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
