<?php $__env->startSection('title', 'Children'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.pnl {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 20px;
}
.pnl-header {
    padding: 16px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.pnl-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }
.c-filter { padding: 20px 22px; }
.c-filter .form-label { font-size: .68rem; font-weight: 700; text-transform: uppercase; letter-spacing: .4px; color: #94a3b8; margin-bottom: 5px; }
.c-filter .form-control { font-size: .84rem; border: 1px solid #e5e7eb; border-radius: 8px; padding: 9px 12px; height: auto; background: #fafafa; }
.c-filter .form-control:focus { border-color: #0077B6; box-shadow: 0 0 0 3px rgba(0,119,182,.08); background: #fff; outline: none; }
.c-table th {
    font-size: .66rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; background: #fafafa;
    border-bottom: 1px solid #f0f0f0; padding: 10px 16px;
}
.c-table td { padding: 13px 16px; vertical-align: middle; border-bottom: 1px solid #f8f8f8; font-size: .85rem; }
.c-table tbody tr:last-child td { border-bottom: none; }
.c-table tbody tr:hover td { background: #fafcff; }
.c-avatar {
    width: 36px; height: 36px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: .8rem; font-weight: 800; color: #fff; flex-shrink: 0;
    background: #16a34a;
}
.c-pill {
    font-size: .68rem; font-weight: 700; border-radius: 20px;
    padding: 3px 10px; display: inline-block; white-space: nowrap;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-child me-2" style="color:#16a34a;font-size:1.1rem;"></i>Children
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">All children with portal accounts</p>
    </div>
    <a href="<?php echo e(route('admin.parents.index')); ?>"
       class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
        <i class="fas fa-arrow-left me-1"></i>Back to Parents
    </a>
</div>


<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-success"><?php echo e($stats['total']); ?></div>
                    <div class="label">Total Children</div>
                </div>
                <div class="icon bg-success bg-opacity-10 text-success"><i class="fas fa-child"></i></div>
            </div>
            <div class="mt-2 small text-muted"><?php echo e($stats['active']); ?> active accounts</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-primary"><?php echo e($stats['active']); ?></div>
                    <div class="label">Active Accounts</div>
                </div>
                <div class="icon bg-primary bg-opacity-10 text-primary"><i class="fas fa-check-circle"></i></div>
            </div>
            <div class="mt-2 small text-muted">Currently enrolled</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value" style="color:#0097a7;"><?php echo e($stats['with_apps']); ?></div>
                    <div class="label">With Applications</div>
                </div>
                <div class="icon" style="background:#e0f7fa;color:#0097a7;"><i class="fas fa-file-alt"></i></div>
            </div>
            <div class="mt-2 small text-muted">Linked to enrolment</div>
        </div>
    </div>
</div>


<div class="pnl">
    <div class="pnl-header">
        <h6><i class="fas fa-filter me-2" style="color:#94a3b8;"></i>Search Children</h6>
        <?php if(request('search')): ?>
            <a href="<?php echo e(route('admin.parents.children')); ?>"
               class="btn btn-sm rounded-pill px-3" style="background:#fee2e2;color:#ef4444;border:none;font-size:.75rem;">
                <i class="fas fa-times me-1"></i>Clear
            </a>
        <?php endif; ?>
    </div>
    <div class="c-filter">
        <form method="GET" action="<?php echo e(route('admin.parents.children')); ?>">
            <div class="row g-3 align-items-end">
                <div class="col-md-8">
                    <label class="form-label">Search</label>
                    <input type="text" name="search" class="form-control"
                           placeholder="Child name or email…" value="<?php echo e(request('search')); ?>">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-sm w-100 rounded-pill text-white" style="background:#0077B6;padding:9px;">
                        <i class="fas fa-search me-1"></i>Search
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="pnl">
    <div class="pnl-header">
        <h6><i class="fas fa-list me-2" style="color:#94a3b8;"></i>
            Children
            <span class="ms-2 rounded-pill px-2 py-1" style="background:#dcfce7;color:#16a34a;font-size:.72rem;font-weight:700;vertical-align:middle;">
                <?php echo e($children->total()); ?>

            </span>
        </h6>
    </div>
    <div class="table-responsive">
        <table class="table c-table mb-0">
            <thead>
                <tr>
                    <th>Child</th>
                    <th>Programme</th>
                    <th>Parent / Application</th>
                    <th>Status</th>
                    <th>Enrolled</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $initial  = strtoupper(substr($child->name, 0, 1));
                    $isActive = !$child->trashed();
                    $app      = $child->childApplications->first();
                ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <div class="c-avatar"><?php echo e($initial); ?></div>
                            <div>
                                <div class="fw-semibold" style="color:#1a1f2e;"><?php echo e($child->name); ?></div>
                                <?php if($app && $app->child_dob): ?>
                                    <div style="font-size:.76rem;color:#94a3b8;">
                                        <i class="fas fa-birthday-cake me-1" style="font-size:.6rem;"></i><?php echo e($app->child_dob->format('d M Y')); ?>

                                    </div>
                                <?php elseif(!str_contains($child->email, '@peekaboo.child')): ?>
                                    <div style="font-size:.76rem;color:#94a3b8;"><?php echo e($child->email); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <?php if($app && $app->program_name): ?>
                            <span class="c-pill" style="background:#eff6ff;color:#3b82f6;">
                                <?php echo e($app->program_name); ?>

                            </span>
                            <?php if($app->fee_option_name): ?>
                                <div style="font-size:.72rem;color:#94a3b8;margin-top:3px;"><?php echo e($app->fee_option_name); ?></div>
                            <?php endif; ?>
                        <?php else: ?>
                            <span style="color:#d1d5db;font-size:.78rem;">—</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($app): ?>
                            <div style="font-size:.83rem;color:#374151;">
                                <?php echo e($app->mother_name ?: $app->father_name ?: '—'); ?>

                            </div>
                            <div style="font-size:.72rem;color:#94a3b8;">
                                App #<?php echo e($app->reference); ?>

                                · <span class="c-pill" style="padding:1px 7px;font-size:.65rem;
                                    background:<?php echo e($app->status === 'approved' ? '#dcfce7' : '#fef3c7'); ?>;
                                    color:<?php echo e($app->status === 'approved' ? '#16a34a' : '#d97706'); ?>;">
                                    <?php echo e($app->statusLabel()); ?>

                                </span>
                            </div>
                        <?php else: ?>
                            <span style="color:#d1d5db;font-size:.78rem;">No application</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($isActive): ?>
                            <span class="c-pill" style="background:#dcfce7;color:#16a34a;">Active</span>
                        <?php else: ?>
                            <span class="c-pill" style="background:#fee2e2;color:#ef4444;">Deactivated</span>
                        <?php endif; ?>
                    </td>
                    <td style="font-size:.8rem;color:#94a3b8;">
                        <?php echo e($child->created_at->format('d M Y')); ?>

                    </td>
                    <td class="text-end">
                        <a href="<?php echo e(route('admin.parents.children.show', $child->id)); ?>"
                           class="btn btn-sm rounded-pill px-3"
                           style="background:#eff6ff;color:#3b82f6;border:1px solid #bfdbfe;font-size:.76rem;">
                            <i class="fas fa-eye me-1"></i>View
                        </a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <i class="fas fa-child fa-3x text-muted opacity-25 mb-3 d-block"></i>
                        <p class="text-muted mb-0">No children found.</p>
                        <?php if(request('search')): ?>
                            <a href="<?php echo e(route('admin.parents.children')); ?>" class="btn btn-sm btn-outline-secondary mt-2">Clear search</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if($children->hasPages()): ?>
    <div class="px-4 py-3 border-top">
        <?php echo e($children->links()); ?>

    </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/admin/parents/children.blade.php ENDPATH**/ ?>