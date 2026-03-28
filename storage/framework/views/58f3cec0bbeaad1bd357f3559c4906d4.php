<?php $__env->startSection('title', 'Child — ' . $child->name); ?>

<?php $__env->startPush('styles'); ?>
<style>
.cd-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 20px;
}
.cd-panel-header {
    padding: 15px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.cd-panel-header h6 { margin: 0; font-weight: 700; font-size: .88rem; color: #1a1f2e; }
.cd-panel-body { padding: 22px; }

.cd-field-label {
    font-size: .67rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; margin-bottom: 3px;
}
.cd-field-val { font-size: .88rem; color: #1a1f2e; font-weight: 600; }
.cd-field-val a { color: #0077B6; text-decoration: none; }
.cd-field-val a:hover { text-decoration: underline; }

.cd-divider { height: 1px; background: #f3f4f6; margin: 18px 0; }
.cd-section-label {
    font-size: .64rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: 1px; color: #adb5bd; margin-bottom: 14px;
}

.cd-btn {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    width: 100%; padding: 11px 16px; border-radius: 10px;
    font-size: .84rem; font-weight: 700; cursor: pointer;
    border: none; transition: all .2s; text-decoration: none; margin-bottom: 8px;
}
.cd-btn:last-child { margin-bottom: 0; }
.cd-btn-primary { background: #0077B6; color: #fff; }
.cd-btn-primary:hover { background: #005f93; color: #fff; }
.cd-btn-success { background: #16a34a; color: #fff; }
.cd-btn-success:hover { background: #15803d; color: #fff; }
.cd-btn-ghost { background: #f3f4f6; color: #374151; border: 1.5px solid #e5e7eb; }
.cd-btn-ghost:hover { background: #e5e7eb; }

.cd-pill {
    font-size: .7rem; font-weight: 700; border-radius: 20px;
    padding: 3px 10px; display: inline-block;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<?php
    $progMap = ['baby-room'=>['#fce7f3','#be185d'],'toddlers'=>['#fff7ed','#d97706'],'preschool'=>['#dbeafe','#1d4ed8'],'grade-r'=>['#dcfce7','#15803d']];
    [$pBg,$pClr] = $latestApp ? ($progMap[$latestApp->program] ?? ['#f3f4f6','#6c757d']) : ['#f3f4f6','#6c757d'];
?>
<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <ul style="list-style:none;padding:0;margin:0 0 8px;display:flex;gap:6px;font-size:.76rem;color:#adb5bd;">
            <li><a href="<?php echo e(route('admin.parents.index')); ?>" style="color:#0077B6;text-decoration:none;">Parents &amp; Families</a></li>
            <li>/ <a href="<?php echo e(route('admin.parents.children')); ?>" style="color:#0077B6;text-decoration:none;">Children</a></li>
            <li>/ <?php echo e($child->name); ?></li>
        </ul>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <?php echo e($child->name); ?>

            <?php if($latestApp): ?>
                <span class="cd-pill ms-2" style="background:<?php echo e($pBg); ?>;color:<?php echo e($pClr); ?>;font-size:.72rem;">
                    <?php echo e($latestApp->program_name); ?>

                </span>
            <?php endif; ?>
            <span class="cd-pill ms-1"
                  style="background:<?php echo e($child->trashed() ? '#fee2e2' : '#dcfce7'); ?>;color:<?php echo e($child->trashed() ? '#ef4444' : '#16a34a'); ?>;font-size:.72rem;">
                <?php echo e($child->trashed() ? 'Deactivated' : 'Active'); ?>

            </span>
        </h4>
        <p style="font-size:.82rem;color:#adb5bd;margin:0;">
            Child
            <?php if($latestApp && $latestApp->child_dob): ?>
                &bull; Born <?php echo e($latestApp->child_dob->format('d M Y')); ?>

                (<?php echo e(now()->diffInYears($latestApp->child_dob)); ?> yrs)
            <?php endif; ?>
            <?php if($parent): ?>
                &bull; Parent: <a href="<?php echo e(route('admin.parents.show', $parent->id)); ?>" style="color:#0077B6;text-decoration:none;"><?php echo e($parent->name); ?></a>
            <?php endif; ?>
        </p>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        <?php if($parent): ?>
        <a href="<?php echo e(route('admin.parents.show', $parent->id)); ?>"
           class="btn btn-sm rounded-pill px-3" style="background:#eff6ff;color:#3b82f6;border:1px solid #bfdbfe;">
            <i class="fas fa-user me-1"></i>View Parent
        </a>
        <?php endif; ?>
        <?php if($latestApp): ?>
        <a href="<?php echo e(route('admin.admissions.show', $latestApp->id)); ?>"
           class="btn btn-sm rounded-pill px-3" style="background:#f5f3ff;color:#7c3aed;border:1px solid #e9d5ff;">
            <i class="fas fa-file-alt me-1"></i>Application
        </a>
        <?php endif; ?>
        <a href="<?php echo e(route('admin.parents.children')); ?>"
           class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
            <i class="fas fa-arrow-left me-1"></i>Back
        </a>
    </div>
</div>

<div class="row g-4">

    
    <div class="col-lg-7">

        
        <div class="cd-panel">
            <div class="cd-panel-header">
                <h6><i class="fas fa-child me-2" style="color:#16a34a;"></i>Child Details</h6>
            </div>
            <div class="cd-panel-body">
                <div class="cd-section-label">Personal</div>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="cd-field-label">Full Name</div>
                        <div class="cd-field-val"><?php echo e($child->name); ?></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="cd-field-label">Status</div>
                        <div class="cd-field-val">
                            <span class="cd-pill" style="background:<?php echo e($child->trashed() ? '#fee2e2' : '#dcfce7'); ?>;color:<?php echo e($child->trashed() ? '#ef4444' : '#16a34a'); ?>;">
                                <?php echo e($child->trashed() ? 'Deactivated' : 'Active'); ?>

                            </span>
                        </div>
                    </div>
                    <?php if($latestApp): ?>
                    <div class="col-sm-6">
                        <div class="cd-field-label">Date of Birth</div>
                        <div class="cd-field-val"><?php echo e($latestApp->child_dob?->format('d F Y') ?? '—'); ?></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="cd-field-label">Gender</div>
                        <div class="cd-field-val"><?php echo e($latestApp->child_gender ? ucfirst($latestApp->child_gender) : '—'); ?></div>
                    </div>
                    <?php if($latestApp->child_language): ?>
                    <div class="col-sm-6">
                        <div class="cd-field-label">Home Language</div>
                        <div class="cd-field-val"><?php echo e($latestApp->child_language); ?></div>
                    </div>
                    <?php endif; ?>
                    <?php if($latestApp->child_id_number): ?>
                    <div class="col-sm-6">
                        <div class="cd-field-label">ID Number</div>
                        <div class="cd-field-val"><?php echo e($latestApp->child_id_number); ?></div>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                    <div class="col-sm-6">
                        <div class="cd-field-label">Enrolled On</div>
                        <div class="cd-field-val"><?php echo e($child->created_at->format('d F Y')); ?></div>
                    </div>
                </div>

                <?php if($latestApp): ?>
                <div class="cd-divider"></div>
                <div class="cd-section-label">Programme</div>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="cd-field-label">Programme</div>
                        <div class="cd-field-val">
                            <span class="cd-pill" style="background:<?php echo e($pBg); ?>;color:<?php echo e($pClr); ?>;"><?php echo e($latestApp->program_name); ?></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="cd-field-label">Fee Option</div>
                        <div class="cd-field-val"><?php echo e($latestApp->fee_option_name ?? '—'); ?></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="cd-field-label">Start Date</div>
                        <div class="cd-field-val"><?php echo e($latestApp->start_date?->format('d F Y') ?? '—'); ?></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="cd-field-label">Snack Box</div>
                        <div class="cd-field-val">
                            <?php if($latestApp->snack_box): ?>
                                <span style="color:#16a34a;"><i class="fas fa-check-circle me-1"></i>Included</span>
                            <?php else: ?>
                                <span style="color:#adb5bd;">Not included</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        
        <?php if($latestApp): ?>
        <div class="cd-panel">
            <div class="cd-panel-header">
                <h6><i class="fas fa-file-alt me-2" style="color:#7c3aed;"></i>Enrolment Application</h6>
                <a href="<?php echo e(route('admin.admissions.show', $latestApp->id)); ?>"
                   style="font-size:.78rem;color:#7c3aed;text-decoration:none;">
                    <i class="fas fa-external-link-alt me-1"></i>Open full application
                </a>
            </div>
            <div class="cd-panel-body">
                <?php
                    $stC = ['approved'=>['#dcfce7','#16a34a'],'rejected'=>['#fee2e2','#ef4444'],'pending'=>['#fff7ed','#d97706'],'under_review'=>['#f5f3ff','#7c3aed'],'waitlist'=>['#f3f4f6','#6c757d']];
                    [$stBg,$stClr] = $stC[$latestApp->status] ?? ['#f3f4f6','#6c757d'];
                ?>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="cd-field-label">Reference</div>
                        <div class="cd-field-val"><code style="color:#0077B6;"><?php echo e($latestApp->reference); ?></code></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="cd-field-label">Status</div>
                        <div class="cd-field-val">
                            <span class="cd-pill" style="background:<?php echo e($stBg); ?>;color:<?php echo e($stClr); ?>;"><?php echo e($latestApp->statusLabel()); ?></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="cd-field-label">Submitted</div>
                        <div class="cd-field-val"><?php echo e($latestApp->created_at->format('d F Y')); ?></div>
                    </div>
                    <?php if($latestApp->approved_at): ?>
                    <div class="col-sm-6">
                        <div class="cd-field-label">Approved</div>
                        <div class="cd-field-val" style="color:#16a34a;"><?php echo e($latestApp->approved_at->format('d F Y')); ?></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>

    
    <div class="col-lg-5">

        
        <div class="cd-panel">
            <div class="cd-panel-header">
                <h6><i class="fas fa-user me-2" style="color:#3b82f6;"></i>Parent / Guardian</h6>
                <?php if($parent): ?>
                <a href="<?php echo e(route('admin.parents.show', $parent->id)); ?>"
                   style="font-size:.78rem;color:#0077B6;text-decoration:none;">
                    <i class="fas fa-external-link-alt me-1"></i>View profile
                </a>
                <?php endif; ?>
            </div>
            <div class="cd-panel-body">
                <?php if($parent): ?>
                <div class="cd-section-label">Linked Account</div>
                <div class="row g-3">
                    <div class="col-12">
                        <div class="cd-field-label">Name</div>
                        <div class="cd-field-val">
                            <a href="<?php echo e(route('admin.parents.show', $parent->id)); ?>"><?php echo e($parent->name); ?></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="cd-field-label">Email</div>
                        <div class="cd-field-val"><a href="mailto:<?php echo e($parent->email); ?>"><?php echo e($parent->email); ?></a></div>
                    </div>
                    <?php if($parent->phone): ?>
                    <div class="col-12">
                        <div class="cd-field-label">Phone</div>
                        <div class="cd-field-val"><a href="tel:<?php echo e($parent->phone); ?>"><?php echo e($parent->phone); ?></a></div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="cd-divider"></div>
                <div class="d-flex gap-2 flex-wrap">
                    <a href="<?php echo e(route('admin.parents.show', $parent->id)); ?>"
                       class="btn btn-sm rounded-pill px-3" style="background:#eff6ff;color:#3b82f6;border:1px solid #bfdbfe;font-size:.76rem;">
                        <i class="fas fa-eye me-1"></i>Parent Profile
                    </a>
                    <?php if($parent->phone): ?>
                    <?php $wa = '27' . ltrim(preg_replace('/[^0-9]/', '', $parent->phone), '0'); ?>
                    <a href="https://wa.me/<?php echo e($wa); ?>" target="_blank"
                       class="btn btn-sm btn-success rounded-pill px-3" style="font-size:.76rem;">
                        <i class="fab fa-whatsapp me-1"></i>WhatsApp
                    </a>
                    <?php endif; ?>
                    <a href="mailto:<?php echo e($parent->email); ?>"
                       class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;font-size:.76rem;">
                        <i class="fas fa-envelope me-1"></i>Email
                    </a>
                </div>
                <?php elseif($latestApp): ?>
                <div style="background:#fffbeb;border:1px solid #fde68a;border-radius:10px;padding:12px 14px;margin-bottom:16px;font-size:.82rem;color:#92400e;">
                    <i class="fas fa-exclamation-circle me-2" style="color:#d97706;"></i>No portal account linked yet.
                </div>
                <div class="cd-section-label">From Application</div>
                <div class="row g-3">
                    <?php if($latestApp->mother_name): ?>
                    <div class="col-12">
                        <div class="cd-field-label">Mother</div>
                        <div class="cd-field-val"><?php echo e($latestApp->mother_name); ?></div>
                    </div>
                    <?php endif; ?>
                    <?php if($latestApp->mother_email): ?>
                    <div class="col-12">
                        <div class="cd-field-label">Mother Email</div>
                        <div class="cd-field-val"><a href="mailto:<?php echo e($latestApp->mother_email); ?>"><?php echo e($latestApp->mother_email); ?></a></div>
                    </div>
                    <?php endif; ?>
                    <?php if($latestApp->mother_cell): ?>
                    <div class="col-12">
                        <div class="cd-field-label">Mother Cell</div>
                        <div class="cd-field-val"><a href="tel:<?php echo e($latestApp->mother_cell); ?>"><?php echo e($latestApp->mother_cell); ?></a></div>
                    </div>
                    <?php endif; ?>
                    <?php if($latestApp->father_name): ?>
                    <div class="col-12">
                        <div class="cd-field-label">Father</div>
                        <div class="cd-field-val"><?php echo e($latestApp->father_name); ?></div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php else: ?>
                <p style="font-size:.84rem;color:#adb5bd;margin:0;">No parent information found.</p>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="cd-panel">
            <div class="cd-panel-header">
                <h6><i class="fas fa-bolt me-2" style="color:#0097a7;"></i>Actions</h6>
            </div>
            <div class="cd-panel-body">
                <a href="<?php echo e(route('admin.users.edit', $child->id)); ?>" class="cd-btn cd-btn-ghost">
                    <i class="fas fa-user-edit"></i>Edit Child Account
                </a>
                <?php if($latestApp): ?>
                <a href="<?php echo e(route('admin.admissions.show', $latestApp->id)); ?>" class="cd-btn cd-btn-ghost">
                    <i class="fas fa-file-alt"></i>View Application
                </a>
                <?php endif; ?>
                <?php if($parent): ?>
                <a href="<?php echo e(route('admin.parents.show', $parent->id)); ?>" class="cd-btn cd-btn-primary">
                    <i class="fas fa-user"></i>View Parent
                </a>
                <?php endif; ?>
                <a href="<?php echo e(route('admin.parents.children')); ?>" class="cd-btn cd-btn-ghost">
                    <i class="fas fa-arrow-left"></i>Back to Children
                </a>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/admin/parents/child-detail.blade.php ENDPATH**/ ?>