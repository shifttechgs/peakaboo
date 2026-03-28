<?php $__env->startSection('title', 'Roles & Permissions'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.perm-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 20px;
}
.perm-panel-header {
    padding: 16px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.perm-panel-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }
.perm-panel-body { padding: 24px; }
.perm-table th {
    font-size: .66rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; background: #fafafa;
    border-bottom: 1px solid #f0f0f0; padding: 10px 16px;
}
.perm-table td { padding: 13px 16px; vertical-align: middle; border-bottom: 1px solid #f8f8f8; font-size: .84rem; }
.perm-table tbody tr:last-child td { border-bottom: none; }
.perm-table tbody tr:hover td { background: #fafcff; }
.perm-pill {
    font-size: .68rem; font-weight: 700; border-radius: 20px;
    padding: 3px 10px; display: inline-block; white-space: nowrap;
}
.perm-avatar {
    width: 34px; height: 34px; border-radius: 50%; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    font-size: .78rem; font-weight: 800; color: #fff;
}
.role-card {
    border: 1px solid #f0f0f0; border-radius: 12px; padding: 18px;
    background: #fafafa; transition: border-color .15s, background .15s;
}
.role-card:hover { background: #fff; border-color: #d0e4f5; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-shield-alt me-2" style="color:#ef4444;font-size:1.1rem;"></i>Roles &amp; Permissions
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Overview of system roles and the users assigned to each</p>
    </div>
    <a href="<?php echo e(route('admin.settings.index')); ?>"
       class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
        <i class="fas fa-arrow-left me-1"></i>Back to Settings
    </a>
</div>


<?php
    $roleConf = [
        'super_admin' => ['color'=>'#1a1f2e', 'bg'=>'#f3f4f6', 'icon'=>'fa-crown',              'desc'=>'Full unrestricted access to all system features'],
        'admin'       => ['color'=>'#ef4444', 'bg'=>'#fee2e2', 'icon'=>'fa-user-shield',        'desc'=>'Manage admissions, users, reports and settings'],
        'teacher'     => ['color'=>'#0097a7', 'bg'=>'#e0f7fa', 'icon'=>'fa-chalkboard-teacher', 'desc'=>'Access class register, student profiles and updates'],
        'parent'      => ['color'=>'#16a34a', 'bg'=>'#dcfce7', 'icon'=>'fa-user-friends',       'desc'=>'View child progress, fees and school communications'],
        'child'       => ['color'=>'#d97706', 'bg'=>'#fef3c7', 'icon'=>'fa-child',              'desc'=>'Access personalised schedule, gallery and updates'],
    ];
?>

<div class="row g-3 mb-4">
    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $conf = $roleConf[$role->name] ?? ['color'=>'#6c757d','bg'=>'#f3f4f6','icon'=>'fa-user','desc'=>'Custom role']; ?>
    <div class="col-sm-6 col-xl-4">
        <div class="role-card">
            <div class="d-flex align-items-center gap-12 mb-3" style="gap:12px;">
                <div style="width:42px;height:42px;border-radius:12px;background:<?php echo e($conf['bg']); ?>;color:<?php echo e($conf['color']); ?>;display:flex;align-items:center;justify-content:center;font-size:.95rem;flex-shrink:0;">
                    <i class="fas <?php echo e($conf['icon']); ?>"></i>
                </div>
                <div class="flex-grow-1">
                    <div style="font-size:.9rem;font-weight:800;color:#1a1f2e;">
                        <?php echo e(ucfirst(str_replace('_',' ', $role->name))); ?>

                    </div>
                    <div style="font-size:.72rem;color:#94a3b8;"><?php echo e($conf['desc']); ?></div>
                </div>
                <span style="font-size:1.3rem;font-weight:800;color:<?php echo e($conf['color']); ?>;">
                    <?php echo e($role->users_count); ?>

                </span>
            </div>
            <div style="font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#94a3b8;">
                <?php echo e($role->users_count); ?> user<?php echo e($role->users_count !== 1 ? 's' : ''); ?> assigned
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<div class="perm-panel">
    <div class="perm-panel-header">
        <h6><i class="fas fa-users me-2" style="color:#94a3b8;"></i>
            All Users &amp; Assigned Roles
            <span class="ms-2 rounded-pill px-2 py-1" style="background:#e0f7fa;color:#0097a7;font-size:.72rem;font-weight:700;vertical-align:middle;">
                <?php echo e($users->count()); ?>

            </span>
        </h6>
        <a href="<?php echo e(route('admin.users.index')); ?>"
           style="font-size:.74rem;font-weight:700;color:#0077B6;text-decoration:none;">
            Manage users <i class="fas fa-arrow-right ms-1"></i>
        </a>
    </div>
    <div class="table-responsive">
        <table class="table perm-table mb-0">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $role      = $user->getRoleNames()->first() ?? '—';
                    $conf      = $roleConf[$role] ?? ['color'=>'#6c757d','bg'=>'#f3f4f6','icon'=>'fa-user'];
                    $initial   = strtoupper(substr($user->name, 0, 1));
                    $bgColors  = ['#3b82f6','#16a34a','#0097a7','#d97706','#7c3aed','#ef4444','#0077B6','#e67e22'];
                    $idx       = ord($initial) % 8;
                    $isDeleted = $user->trashed();
                ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <div class="perm-avatar" style="background:<?php echo e($bgColors[$idx]); ?>"><?php echo e($initial); ?></div>
                            <div>
                                <div class="fw-semibold" style="color:#1a1f2e;"><?php echo e($user->name); ?></div>
                            </div>
                        </div>
                    </td>
                    <td style="color:#6c757d;font-size:.82rem;"><?php echo e($user->email); ?></td>
                    <td>
                        <span class="perm-pill" style="background:<?php echo e($conf['bg']); ?>;color:<?php echo e($conf['color']); ?>;">
                            <i class="fas <?php echo e($conf['icon']); ?> me-1" style="font-size:.6rem;"></i>
                            <?php echo e(ucfirst(str_replace('_',' ',$role))); ?>

                        </span>
                    </td>
                    <td>
                        <?php if($isDeleted): ?>
                            <span class="perm-pill" style="background:#fee2e2;color:#ef4444;">Deactivated</span>
                        <?php else: ?>
                            <span class="perm-pill" style="background:#dcfce7;color:#16a34a;">Active</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end">
                        <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>"
                           class="btn btn-sm rounded-pill px-3"
                           style="background:#eff6ff;color:#3b82f6;border:1px solid #bfdbfe;font-size:.76rem;">
                            <i class="fas fa-edit me-1"></i>Edit Role
                        </a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <i class="fas fa-users fa-3x text-muted opacity-25 mb-3 d-block"></i>
                        <p class="text-muted mb-0">No users found.</p>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/admin/settings/permissions.blade.php ENDPATH**/ ?>