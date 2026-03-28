<?php $__env->startSection('title', 'Settings'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.s-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 20px;
}
.s-panel-header {
    padding: 16px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; gap: 12px;
}
.s-panel-header-icon {
    width: 34px; height: 34px; border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    font-size: .85rem; flex-shrink: 0;
}
.s-panel-header h6 { margin: 0; font-weight: 700; font-size: .92rem; color: #1a1f2e; }
.s-panel-header p  { margin: 0; font-size: .74rem; color: #94a3b8; }
.s-panel-body { padding: 24px; }
.s-label {
    font-size: .68rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #94a3b8; margin-bottom: 6px; display: block;
}
.s-control {
    font-size: .87rem; border: 1px solid #e5e7eb; border-radius: 10px;
    padding: 10px 14px; background: #fafafa; color: #374151;
    transition: border-color .2s, box-shadow .2s; width: 100%;
}
.s-control:focus {
    border-color: #0077B6; box-shadow: 0 0 0 3px rgba(0,119,182,.08);
    background: #fff; outline: none;
}
textarea.s-control { resize: vertical; }
.s-divider { border-color: #f3f4f6; margin: 20px 0; }

/* Tool link cards */
.s-tool-card {
    display: flex; align-items: center; gap: 14px;
    padding: 14px 16px; border-radius: 12px; text-decoration: none;
    border: 1px solid #f0f0f0; background: #fafafa;
    transition: background .15s, border-color .15s, transform .15s;
    margin-bottom: 10px;
}
.s-tool-card:last-child { margin-bottom: 0; }
.s-tool-card:hover { background: #fff; border-color: #d0e4f5; transform: translateX(3px); }
.s-tool-card__icon {
    width: 38px; height: 38px; border-radius: 10px; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center; font-size: .9rem;
}
.s-tool-card__title { font-size: .86rem; font-weight: 700; color: #1a1f2e; margin-bottom: 1px; }
.s-tool-card__desc  { font-size: .72rem; color: #94a3b8; }

/* Sys info rows */
.s-info-row { display: flex; justify-content: space-between; align-items: center;
    padding: 9px 0; border-bottom: 1px solid #f5f6f8; font-size: .83rem; }
.s-info-row:last-child { border-bottom: none; }
.s-info-label { color: #94a3b8; font-weight: 600; font-size: .76rem; }
.s-info-value { color: #374151; font-weight: 600; }

/* Toggle switches */
.s-toggle-row { display: flex; align-items: center; justify-content: space-between;
    padding: 12px 0; border-bottom: 1px solid #f5f6f8; }
.s-toggle-row:last-child { border-bottom: none; }
.s-toggle-label { font-size: .85rem; color: #374151; font-weight: 500; }
.s-toggle-sub   { font-size: .73rem; color: #94a3b8; margin-top: 1px; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-cog me-2" style="color:#0077B6;font-size:1.1rem;"></i>Settings
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Configure system preferences and business information</p>
    </div>
    <span style="font-size:.76rem;color:#94a3b8;background:#f3f4f6;padding:6px 14px;border-radius:20px;">
        <i class="fas fa-circle me-1" style="color:#16a34a;font-size:.5rem;vertical-align:middle;"></i>
        <?php echo e(ucfirst($sysInfo['env'])); ?> environment
    </span>
</div>


<?php if(session('success')): ?>
<div style="background:#f0fdf4;border:1px solid #86efac;border-radius:12px;padding:13px 18px;font-size:.84rem;color:#16a34a;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
    <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<div class="row g-4">
    
    <div class="col-lg-8">

        
        <div class="s-panel">
            <div class="s-panel-header">
                <div class="s-panel-header-icon" style="background:#eff6ff;color:#3b82f6;">
                    <i class="fas fa-building"></i>
                </div>
                <div>
                    <h6>Business Information</h6>
                    <p>School name, contact details and address</p>
                </div>
            </div>
            <div class="s-panel-body">
                <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="section" value="business">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="s-label">Business Name</label>
                            <input type="text" name="name" class="s-control"
                                   value="<?php echo e(old('name', $business->name)); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="s-label">Phone</label>
                            <input type="tel" name="phone" class="s-control"
                                   value="<?php echo e(old('phone', $business->phone)); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="s-label">Mobile / WhatsApp</label>
                            <input type="tel" name="mobile" class="s-control"
                                   value="<?php echo e(old('mobile', $business->mobile)); ?>">
                        </div>
                        <div class="col-12">
                            <label class="s-label">Email Address</label>
                            <input type="email" name="email" class="s-control"
                                   value="<?php echo e(old('email', $business->email)); ?>">
                        </div>
                        <div class="col-12">
                            <label class="s-label">Physical Address</label>
                            <textarea name="address" class="s-control" rows="2"><?php echo e(old('address', $business->address)); ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="s-label">Operating Hours</label>
                            <input type="text" name="hours" class="s-control"
                                   value="<?php echo e(old('hours', $business->hours)); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="s-label">Registration Fee (R)</label>
                            <input type="number" name="registration_fee" class="s-control"
                                   value="<?php echo e(old('registration_fee', $business->registration_fee)); ?>">
                        </div>
                    </div>
                    <hr class="s-divider">
                    <button type="submit" class="btn btn-sm rounded-pill px-4 text-white" style="background:#0077B6;padding:10px 20px;">
                        <i class="fas fa-save me-2"></i>Save Business Info
                    </button>
                </form>
            </div>
        </div>

        
        <div class="s-panel">
            <div class="s-panel-header">
                <div class="s-panel-header-icon" style="background:#dcfce7;color:#16a34a;">
                    <i class="fas fa-tags"></i>
                </div>
                <div>
                    <h6>Fee Structure</h6>
                    <p>Monthly programme and add-on fees</p>
                </div>
            </div>
            <div class="s-panel-body">
                <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="section" value="fees">
                    <div class="row g-3">
                        <?php $__currentLoopData = $fees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <label class="s-label mb-0"><?php echo e($fee->label); ?></label>
                                <div class="form-check form-switch mb-0" title="Active">
                                    <input class="form-check-input" type="checkbox"
                                           name="fees[<?php echo e($fee->id); ?>][active]"
                                           <?php echo e($fee->active ? 'checked' : ''); ?>

                                           style="width:2em;height:1.1em;">
                                </div>
                            </div>
                            <div style="display:flex;align-items:center;border:1px solid #e5e7eb;border-radius:10px;overflow:hidden;background:#fafafa;">
                                <span style="padding:10px 12px;background:#f3f4f6;border-right:1px solid #e5e7eb;font-size:.82rem;font-weight:700;color:#6c757d;flex-shrink:0;">R</span>
                                <input type="number" name="fees[<?php echo e($fee->id); ?>][amount]"
                                       value="<?php echo e(old('fees.'.$fee->id.'.amount', $fee->amount)); ?>"
                                       style="border:none;padding:10px 12px;font-size:.87rem;background:transparent;color:#374151;width:100%;outline:none;">
                            </div>
                            <input type="text" name="fees[<?php echo e($fee->id); ?>][description]"
                                   value="<?php echo e(old('fees.'.$fee->id.'.description', $fee->description)); ?>"
                                   placeholder="Description"
                                   style="margin-top:6px;font-size:.74rem;color:#94a3b8;border:1px solid #e5e7eb;border-radius:8px;padding:5px 10px;width:100%;background:#fafafa;outline:none;">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <hr class="s-divider">
                    <button type="submit" class="btn btn-sm rounded-pill px-4 text-white" style="background:#16a34a;padding:10px 20px;">
                        <i class="fas fa-save me-2"></i>Save Fee Structure
                    </button>
                </form>
            </div>
        </div>

        
        <div class="s-panel">
            <div class="s-panel-header">
                <div class="s-panel-header-icon" style="background:#fef3c7;color:#d97706;">
                    <i class="fas fa-bell"></i>
                </div>
                <div>
                    <h6>Notification Preferences</h6>
                    <p>Control which system events trigger alerts</p>
                </div>
            </div>
            <div class="s-panel-body">
                <?php
                    $toggles = [
                        ['id'=>'notif_new_app',   'label'=>'New application received',   'sub'=>'Email admin when a new enrolment form is submitted', 'checked'=>true],
                        ['id'=>'notif_payment',   'label'=>'Payment received',            'sub'=>'Alert when a POP is uploaded or payment confirmed',  'checked'=>true],
                        ['id'=>'notif_approved',  'label'=>'Application approved',        'sub'=>'Notify parent when their application is approved',    'checked'=>true],
                        ['id'=>'notif_daily',     'label'=>'Daily summary report',        'sub'=>'Receive a daily digest of activity each morning',    'checked'=>false],
                    ];
                ?>
                <?php $__currentLoopData = $toggles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="s-toggle-row">
                    <div>
                        <div class="s-toggle-label"><?php echo e($t['label']); ?></div>
                        <div class="s-toggle-sub"><?php echo e($t['sub']); ?></div>
                    </div>
                    <div class="form-check form-switch mb-0">
                        <input class="form-check-input" type="checkbox" id="<?php echo e($t['id']); ?>" <?php echo e($t['checked'] ? 'checked' : ''); ?>

                               style="width:2.4em;height:1.3em;">
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <hr class="s-divider">
                <button type="button" class="btn btn-sm rounded-pill px-4 text-white" style="background:#d97706;padding:10px 20px;">
                    <i class="fas fa-save me-2"></i>Save Preferences
                </button>
            </div>
        </div>

    </div>

    
    <div class="col-lg-4">

        
        <div class="s-panel">
            <div class="s-panel-header">
                <div class="s-panel-header-icon" style="background:#f5f3ff;color:#7c3aed;">
                    <i class="fas fa-tools"></i>
                </div>
                <div>
                    <h6>System Tools</h6>
                    <p>Administration &amp; access control</p>
                </div>
            </div>
            <div class="s-panel-body">
                <a href="<?php echo e(route('admin.settings.audit-log')); ?>" class="s-tool-card">
                    <div class="s-tool-card__icon" style="background:#eff6ff;color:#3b82f6;">
                        <i class="fas fa-history"></i>
                    </div>
                    <div>
                        <div class="s-tool-card__title">Audit Log</div>
                        <div class="s-tool-card__desc">Track all system activity and changes</div>
                    </div>
                    <i class="fas fa-chevron-right ms-auto" style="color:#d1d5db;font-size:.75rem;"></i>
                </a>
                <a href="<?php echo e(route('admin.settings.permissions')); ?>" class="s-tool-card">
                    <div class="s-tool-card__icon" style="background:#fee2e2;color:#ef4444;">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div>
                        <div class="s-tool-card__title">Roles &amp; Permissions</div>
                        <div class="s-tool-card__desc">Manage user roles and access rights</div>
                    </div>
                    <i class="fas fa-chevron-right ms-auto" style="color:#d1d5db;font-size:.75rem;"></i>
                </a>
                <a href="<?php echo e(route('admin.users.index')); ?>" class="s-tool-card">
                    <div class="s-tool-card__icon" style="background:#dcfce7;color:#16a34a;">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <div>
                        <div class="s-tool-card__title">User Management</div>
                        <div class="s-tool-card__desc">Create, edit and deactivate users</div>
                    </div>
                    <i class="fas fa-chevron-right ms-auto" style="color:#d1d5db;font-size:.75rem;"></i>
                </a>
            </div>
        </div>

        
        <div class="s-panel">
            <div class="s-panel-header">
                <div class="s-panel-header-icon" style="background:#e0f7fa;color:#0097a7;">
                    <i class="fas fa-server"></i>
                </div>
                <div>
                    <h6>System Information</h6>
                    <p>Runtime environment details</p>
                </div>
            </div>
            <div class="s-panel-body">
                <div class="s-info-row">
                    <span class="s-info-label">Laravel Version</span>
                    <span class="s-info-value"><?php echo e($sysInfo['laravel_version']); ?></span>
                </div>
                <div class="s-info-row">
                    <span class="s-info-label">PHP Version</span>
                    <span class="s-info-value"><?php echo e($sysInfo['php_version']); ?></span>
                </div>
                <div class="s-info-row">
                    <span class="s-info-label">Database</span>
                    <span class="s-info-value"><?php echo e(strtoupper($sysInfo['db_driver'])); ?></span>
                </div>
                <div class="s-info-row">
                    <span class="s-info-label">Environment</span>
                    <span class="s-info-value">
                        <span style="font-size:.72rem;font-weight:700;border-radius:20px;padding:2px 10px;
                            background:<?php echo e($sysInfo['env'] === 'production' ? '#dcfce7' : '#fef3c7'); ?>;
                            color:<?php echo e($sysInfo['env'] === 'production' ? '#16a34a' : '#d97706'); ?>;">
                            <?php echo e(ucfirst($sysInfo['env'])); ?>

                        </span>
                    </span>
                </div>
                <div class="s-info-row">
                    <span class="s-info-label">Timezone</span>
                    <span class="s-info-value"><?php echo e($sysInfo['timezone']); ?></span>
                </div>
                <div class="s-info-row">
                    <span class="s-info-label">Server Time</span>
                    <span class="s-info-value"><?php echo e($sysInfo['now']); ?></span>
                </div>
            </div>
        </div>

        
        <div class="s-panel" style="border-color:#fecaca;">
            <div class="s-panel-header" style="border-bottom-color:#fecaca;">
                <div class="s-panel-header-icon" style="background:#fee2e2;color:#ef4444;">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div>
                    <h6 style="color:#ef4444;">Danger Zone</h6>
                    <p>Irreversible actions — proceed with caution</p>
                </div>
            </div>
            <div class="s-panel-body">
                <p style="font-size:.8rem;color:#94a3b8;margin-bottom:16px;">
                    These actions cannot be undone. Make sure you have a backup before proceeding.
                </p>
                <button type="button" class="btn btn-sm w-100 rounded-pill"
                        style="background:#fee2e2;color:#ef4444;border:1px solid #fecaca;padding:10px;font-weight:700;"
                        onclick="return confirm('Are you sure? This cannot be undone.')">
                    <i class="fas fa-trash me-2"></i>Clear All Mock Data
                </button>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>