<?php $__env->startSection('title', 'Admissions'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ── Panel ───────────────────────────────────────────────────────────── */
.adm-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0;
    margin-bottom: 20px;
    position: relative;
}
.adm-panel-header {
    padding: 16px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.adm-panel-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }

/* ── Filter form ─────────────────────────────────────────────────────── */
.adm-filter { padding: 20px 22px; }
.adm-filter .form-label { font-size: .68rem; font-weight: 700; text-transform: uppercase; letter-spacing: .4px; color: #94a3b8; margin-bottom: 5px; }
.adm-filter .form-control,
.adm-filter .form-select {
    font-size: .84rem; border: 1px solid #e5e7eb; border-radius: 8px;
    padding: 9px 12px; height: auto; background: #fafafa; color: #374151; transition: border-color .2s;
}
.adm-filter .form-control:focus,
.adm-filter .form-select:focus { border-color: #0077B6; box-shadow: 0 0 0 3px rgba(0,119,182,.08); background: #fff; outline: none; }

/* ── Table ───────────────────────────────────────────────────────────── */
.adm-table-wrap { overflow-x: auto; overflow-y: visible; }
.adm-table th {
    font-size: .66rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; background: #fafafa;
    border-bottom: 1px solid #f0f0f0; padding: 10px 14px; white-space: nowrap;
}
.adm-table td { padding: 13px 14px; vertical-align: middle; border-bottom: 1px solid #f8f8f8; font-size: .84rem; color: #374151; }
.adm-table tbody tr:last-child td { border-bottom: none; }
.adm-table tbody tr:hover td { background: #fafcff; transition: background .1s; }
.adm-table tbody tr.adm-row-urgent td { background: #fffbf0; }
.adm-table tbody tr.adm-row-urgent:hover td { background: #fef9e7; }

/* ── Pills ───────────────────────────────────────────────────────────── */
.adm-pill { font-size: .68rem; font-weight: 700; border-radius: 20px; padding: 3px 10px; display: inline-block; white-space: nowrap; }
.adm-src  { font-size: .68rem; font-weight: 700; border-radius: 20px; padding: 2px 8px; display: inline-block; }
.adm-prog { font-size: .68rem; font-weight: 700; border-radius: 20px; padding: 3px 10px; display: inline-block; white-space: nowrap; }

/* ── Avatar ──────────────────────────────────────────────────────────── */
.adm-avatar {
    width: 34px; height: 34px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: .75rem; font-weight: 800; color: #fff; flex-shrink: 0;
}

/* ── Action button ───────────────────────────────────────────────────── */
.adm-btn {
    display: inline-flex; align-items: center; justify-content: center;
    width: 30px; height: 30px; border-radius: 8px; border: 1px solid transparent;
    font-size: .74rem; text-decoration: none; transition: all .15s; cursor: pointer;
    background: none;
}
.adm-btn:hover { transform: translateY(-1px); box-shadow: 0 2px 6px rgba(0,0,0,.1); }

/* ── Actions dropdown fix ────────────────────────────────────────────── */
.adm-actions-drop { position: static; }
.adm-actions-drop .dropdown-menu {
    position: fixed !important; z-index: 1055;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-user-plus me-2" style="color:#7c3aed;font-size:1.1rem;"></i>Admissions
            <span class="ms-2 rounded-pill px-2 py-1"
                  style="background:#f5f3ff;color:#7c3aed;font-size:.72rem;font-weight:700;vertical-align:middle;">
                <?php echo e($stats['total']); ?> application<?php echo e($stats['total'] !== 1 ? 's' : ''); ?>

            </span>
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Manage and review enrolment applications</p>
    </div>
    <div class="d-flex gap-2">
        <a href="<?php echo e(route('admin.admissions.index', array_merge(request()->query(), ['export' => 'csv']))); ?>"
           class="btn btn-outline-secondary btn-sm rounded-pill px-3">
            <i class="fas fa-file-excel me-1"></i>Export
        </a>
    </div>
</div>


<?php if(session('success')): ?>
<div style="background:#f0fdf4;border:1px solid #86efac;border-radius:12px;padding:13px 18px;font-size:.84rem;color:#16a34a;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
    <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
<?php if(session('error')): ?>
<div style="background:#fef2f2;border:1px solid #fca5a5;border-radius:12px;padding:13px 18px;font-size:.84rem;color:#ef4444;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
    <i class="fas fa-exclamation-circle"></i> <?php echo e(session('error')); ?>

</div>
<?php endif; ?>


<div class="row g-4 mb-4">
    
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value" style="color:#7c3aed;"><?php echo e($stats['total']); ?></div>
                    <div class="label">Total Applications</div>
                </div>
                <div class="icon" style="background:#f5f3ff;color:#7c3aed;">
                    <i class="fas fa-file-alt"></i>
                </div>
            </div>
            <div class="mt-2 small text-muted"><?php echo e($stats['this_month']); ?> received this month</div>
        </div>
    </div>

    
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-warning"><?php echo e($stats['actionable']); ?></div>
                    <div class="label">Needs Attention</div>
                </div>
                <div class="icon bg-warning bg-opacity-10 text-warning">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
            <div class="mt-2 small">
                <span class="text-warning fw-semibold"><?php echo e($stats['pending']); ?></span>
                <span class="text-muted"> pending · </span>
                <span class="text-warning fw-semibold"><?php echo e($stats['under_review']); ?></span>
                <span class="text-muted"> in review</span>
            </div>
        </div>
    </div>

    
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-success"><?php echo e($stats['approved']); ?></div>
                    <div class="label">Approved</div>
                </div>
                <div class="icon bg-success bg-opacity-10 text-success">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="mt-2 small text-muted">Ready to enrol</div>
        </div>
    </div>

    
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="value text-danger"><?php echo e($stats['rejected']); ?></div>
                    <div class="label">Rejected</div>
                </div>
                <div class="icon bg-danger bg-opacity-10 text-danger">
                    <i class="fas fa-times-circle"></i>
                </div>
            </div>
            <div class="mt-2 small">
                <span class="text-muted"><?php echo e($stats['waitlist']); ?> on </span>
                <span class="fw-semibold" style="color:#6c757d;">waitlist</span>
            </div>
        </div>
    </div>
</div>


<div class="adm-panel" style="overflow:hidden;">
    <div class="adm-panel-header">
        <h6><i class="fas fa-filter me-2" style="color:#94a3b8;"></i>Filter Applications</h6>
        <?php if(request()->hasAny(['status','program','search'])): ?>
            <a href="<?php echo e(route('admin.admissions.index')); ?>"
               class="btn btn-sm rounded-pill px-3" style="background:#fee2e2;color:#ef4444;border:none;font-size:.75rem;">
                <i class="fas fa-times me-1"></i>Clear Filters
            </a>
        <?php endif; ?>
    </div>
    <div class="adm-filter">
        <form method="GET" action="<?php echo e(route('admin.admissions.index')); ?>">
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="">All Statuses</option>
                        <?php $__currentLoopData = \App\Models\Application::STATUS_LABELS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($val); ?>" <?php echo e(request('status') === $val ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Programme</label>
                    <select name="program" class="form-select">
                        <option value="">All Programmes</option>
                        <?php $__currentLoopData = \App\Models\Application::PROGRAMS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($val); ?>" <?php echo e(request('program') === $val ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Search</label>
                    <div style="position:relative;">
                        <i class="fas fa-search" style="position:absolute;left:11px;top:50%;transform:translateY(-50%);color:#adb5bd;font-size:.8rem;pointer-events:none;"></i>
                        <input type="text" name="search" class="form-control" style="padding-left:32px;"
                               placeholder="Child name, parent, email, reference…"
                               value="<?php echo e(request('search')); ?>">
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-sm w-100 rounded-pill text-white" style="background:#0077B6;padding:9px;">
                        <i class="fas fa-search me-1"></i>Search
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="adm-panel">
    <div class="adm-panel-header">
        <h6>
            <i class="fas fa-list me-2" style="color:#94a3b8;"></i>Applications
            <span class="ms-2 rounded-pill px-2"
                  style="background:#f3f4f6;color:#6c757d;font-size:.7rem;font-weight:700;vertical-align:middle;padding-top:2px;padding-bottom:2px;">
                <?php echo e($applications->total()); ?>

            </span>
        </h6>
        <?php if($applications->hasPages()): ?>
            <span style="font-size:.75rem;color:#adb5bd;">
                Page <?php echo e($applications->currentPage()); ?> of <?php echo e($applications->lastPage()); ?>

            </span>
        <?php endif; ?>
    </div>
    <div class="adm-table-wrap">
        <table class="table adm-table mb-0">
            <thead>
                <tr>
                    <th style="width:130px;">Reference</th>
                    <th>Child</th>
                    <th>Parent / Guardian</th>
                    <th>Programme</th>
                    <th>Start Date</th>
                    <th>Source</th>
                    <th>Status</th>
                    <th style="width:110px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $stMap = [
                        'pending'      => ['#fff7ed','#d97706'],
                        'under_review' => ['#f5f3ff','#7c3aed'],
                        'approved'     => ['#dcfce7','#16a34a'],
                        'waitlist'     => ['#f3f4f6','#6c757d'],
                        'rejected'     => ['#fee2e2','#ef4444'],
                    ];
                    [$stBg,$stClr] = $stMap[$app->status] ?? ['#f3f4f6','#6c757d'];

                    $srcMap = [
                        'google'    => ['#fee2e2','#ef4444'],
                        'facebook'  => ['#dbeafe','#3b82f6'],
                        'instagram' => ['#fef3c7','#d97706'],
                        'referral'  => ['#dcfce7','#16a34a'],
                        'other'     => ['#f3f4f6','#6c757d'],
                    ];

                    $progMap = [
                        'baby-room' => ['#fce7f3','#be185d'],
                        'toddlers'  => ['#fff7ed','#d97706'],
                        'preschool' => ['#dbeafe','#1d4ed8'],
                        'grade-r'   => ['#dcfce7','#15803d'],
                    ];
                    [$pBg,$pClr] = $progMap[$app->program] ?? ['#f3f4f6','#6c757d'];

                    $daysWaiting = $app->daysWaiting();
                    $isUrgent    = $app->isActionable() && $daysWaiting >= 3;

                    // Avatar colour based on first letter
                    $avatarColors = ['#7c3aed','#0077B6','#16a34a','#d97706','#ef4444','#0097a7','#be185d'];
                    $avatarBg = $avatarColors[ord(strtoupper($app->child_name[0] ?? 'A')) % count($avatarColors)];
                    $initials  = strtoupper(substr($app->child_name, 0, 1));
                    if (str_contains($app->child_name, ' ')) {
                        $parts = explode(' ', $app->child_name);
                        $initials = strtoupper($parts[0][0] . end($parts)[0]);
                    }
                ?>
                <tr class="<?php echo e($isUrgent ? 'adm-row-urgent' : ''); ?>">
                    
                    <td>
                        <code style="font-size:.76rem;color:#0077B6;font-weight:700;letter-spacing:.3px;"><?php echo e($app->reference); ?></code>
                        <div style="font-size:.7rem;color:#adb5bd;margin-top:2px;">
                            <i class="fas fa-calendar-alt me-1"></i><?php echo e($app->created_at->format('d M Y')); ?>

                        </div>
                        <?php if($isUrgent): ?>
                            <div style="font-size:.65rem;color:#d97706;font-weight:700;margin-top:2px;">
                                <i class="fas fa-exclamation-triangle me-1"></i><?php echo e($daysWaiting); ?>d waiting
                            </div>
                        <?php endif; ?>
                    </td>

                    
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="adm-avatar" style="background:<?php echo e($avatarBg); ?>;"><?php echo e($initials); ?></div>
                            <div>
                                <div class="fw-semibold" style="color:#1a1f2e;line-height:1.2;"><?php echo e($app->child_name); ?></div>
                                <div style="font-size:.72rem;color:#adb5bd;margin-top:1px;">
                                    <i class="fas fa-birthday-cake me-1" style="font-size:.6rem;"></i><?php echo e($app->child_dob->format('d M Y')); ?>

                                </div>
                            </div>
                        </div>
                    </td>

                    
                    <td>
                        <div style="color:#1a1f2e;font-weight:600;font-size:.84rem;"><?php echo e($app->mother_name); ?></div>
                        <a href="mailto:<?php echo e($app->mother_email); ?>" style="font-size:.74rem;color:#0077B6;text-decoration:none;display:block;margin-top:1px;">
                            <i class="fas fa-envelope me-1" style="font-size:.6rem;color:#adb5bd;"></i><?php echo e($app->mother_email); ?>

                        </a>
                        <a href="tel:<?php echo e($app->mother_cell); ?>" style="font-size:.74rem;color:#adb5bd;text-decoration:none;">
                            <i class="fas fa-phone me-1" style="font-size:.6rem;"></i><?php echo e($app->mother_cell); ?>

                        </a>
                    </td>

                    
                    <td>
                        <span class="adm-prog" style="background:<?php echo e($pBg); ?>;color:<?php echo e($pClr); ?>;"><?php echo e($app->program_name); ?></span>
                        <div style="font-size:.72rem;color:#adb5bd;margin-top:4px;">
                            <i class="fas fa-tag me-1" style="font-size:.6rem;"></i><?php echo e(ucfirst($app->fee_option)); ?>

                        </div>
                    </td>

                    
                    <td>
                        <div style="color:#1a1f2e;font-weight:600;font-size:.83rem;"><?php echo e($app->start_date->format('d M Y')); ?></div>
                        <div style="font-size:.72rem;color:#adb5bd;margin-top:1px;"><?php echo e($app->start_date->format('l')); ?></div>
                    </td>

                    
                    <td>
                        <?php if($app->lead): ?>
                            <?php [$sBg,$sClr] = $srcMap[$app->lead->source] ?? ['#f3f4f6','#6c757d']; ?>
                            <a href="<?php echo e(route('admin.crm.leads.show', $app->lead)); ?>"
                               title="View Lead — <?php echo e($app->lead->reference); ?>" style="text-decoration:none;">
                                <span class="adm-src" style="background:<?php echo e($sBg); ?>;color:<?php echo e($sClr); ?>;">
                                    <?php echo e(ucfirst($app->lead->source ?? 'N/A')); ?>

                                </span>
                            </a>
                            <div style="font-size:.7rem;color:#adb5bd;margin-top:3px;">
                                <i class="fas fa-link me-1"></i>
                                <a href="<?php echo e(route('admin.crm.leads.show', $app->lead)); ?>"
                                   style="color:#adb5bd;text-decoration:none;"><?php echo e($app->lead->reference); ?></a>
                            </div>
                        <?php else: ?>
                            <span style="color:#d1d5db;font-size:.8rem;">—</span>
                        <?php endif; ?>
                    </td>

                    
                    <td>
                        <span class="adm-pill" style="background:<?php echo e($stBg); ?>;color:<?php echo e($stClr); ?>;">
                            <?php echo e($app->statusLabel()); ?>

                        </span>
                        <?php if($app->invited_at): ?>
                            <div style="font-size:.68rem;color:#0077B6;margin-top:4px;font-weight:600;">
                                <i class="fas fa-paper-plane me-1"></i>Invited
                                <span style="color:#adb5bd;font-weight:400;"><?php echo e($app->invited_at->format('d M')); ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if($app->approved_at && $app->status === 'approved'): ?>
                            <div style="font-size:.68rem;color:#adb5bd;margin-top:3px;">
                                <i class="fas fa-check me-1"></i><?php echo e($app->approved_at->format('d M')); ?>

                            </div>
                        <?php endif; ?>
                    </td>

                    
                    <td>
                        <div class="d-flex gap-1 flex-wrap align-items-center">
                            <a href="<?php echo e(route('admin.admissions.show', $app->id)); ?>"
                               class="adm-btn" title="View Application"
                               style="background:#eff6ff;color:#3b82f6;border-color:#dbeafe;">
                                <i class="fas fa-eye"></i>
                            </a>

                            <?php if($app->isActionable()): ?>
                            <div class="adm-actions-drop">
                                <button class="adm-btn" title="Actions"
                                        style="background:#f3f4f6;color:#374151;border-color:#e5e7eb;width:auto;padding:0 10px;"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="fas fa-ellipsis-h" style="font-size:.72rem;"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end"
                                    style="border-radius:12px;border:1px solid #f0f0f0;box-shadow:0 4px 20px rgba(0,0,0,.12);font-size:.82rem;min-width:170px;">
                                    <li class="dropdown-header" style="font-size:.65rem;color:#adb5bd;padding:8px 14px 4px;font-weight:700;text-transform:uppercase;letter-spacing:.4px;">
                                        <?php echo e($app->child_name); ?>

                                    </li>
                                    <li>
                                        <form action="<?php echo e(route('admin.admissions.approve', $app->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <button class="dropdown-item py-2" style="color:#16a34a;">
                                                <i class="fas fa-check-circle me-2"></i>Approve
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="<?php echo e(route('admin.admissions.waitlist', $app->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <button class="dropdown-item py-2" style="color:#6c757d;">
                                                <i class="fas fa-clock me-2"></i>Add to Waitlist
                                            </button>
                                        </form>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button class="dropdown-item py-2" style="color:#ef4444;"
                                                data-bs-toggle="modal" data-bs-target="#rejectModal<?php echo e($app->id); ?>">
                                            <i class="fas fa-times-circle me-2"></i>Reject
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <?php endif; ?>

                            <?php if($app->status === 'approved' && !$app->invited_at): ?>
                            <button class="adm-btn" title="Send Portal Invitation"
                                    style="background:#eff6ff;color:#0077B6;border-color:#dbeafe;"
                                    data-bs-toggle="modal" data-bs-target="#inviteModal<?php echo e($app->id); ?>">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>

                
                <?php if($app->isActionable()): ?>
                <div class="modal fade" id="rejectModal<?php echo e($app->id); ?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered" style="max-width:460px;">
                        <div class="modal-content" style="border:none;border-radius:16px;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,.15);">
                            <div class="modal-header border-0" style="padding:22px 24px 0;">
                                <div>
                                    <h5 class="modal-title fw-bold mb-1" style="font-size:.95rem;color:#1a1f2e;">
                                        <i class="fas fa-times-circle me-2" style="color:#ef4444;"></i>Reject Application
                                    </h5>
                                    <p style="font-size:.78rem;color:#adb5bd;margin:0;">
                                        <?php echo e($app->reference); ?> — <?php echo e($app->child_name); ?>

                                    </p>
                                </div>
                                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="<?php echo e(route('admin.admissions.reject', $app->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="modal-body" style="padding:18px 24px;">
                                    <label style="font-size:.72rem;font-weight:700;color:#6c757d;text-transform:uppercase;letter-spacing:.4px;margin-bottom:6px;display:block;">
                                        Reason <span style="color:#adb5bd;font-weight:400;text-transform:none;">(optional)</span>
                                    </label>
                                    <textarea name="reason" rows="3"
                                              style="font-size:.84rem;border:1.5px solid #e5e7eb;border-radius:10px;padding:10px 14px;background:#fafafa;width:100%;resize:vertical;outline:none;"
                                              placeholder="e.g. No capacity for the requested start date…"
                                              onfocus="this.style.borderColor='#ef4444'" onblur="this.style.borderColor='#e5e7eb'"></textarea>
                                </div>
                                <div class="modal-footer border-0" style="padding:0 24px 22px;gap:8px;">
                                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-sm rounded-pill px-4" style="background:#ef4444;color:#fff;border:none;">
                                        <i class="fas fa-times me-1"></i>Confirm Rejection
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                
                <?php if($app->status === 'approved' && !$app->invited_at): ?>
                <div class="modal fade" id="inviteModal<?php echo e($app->id); ?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered" style="max-width:460px;">
                        <div class="modal-content" style="border:none;border-radius:16px;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,.15);">
                            <div class="modal-header border-0" style="padding:22px 24px 0;">
                                <div>
                                    <h5 class="modal-title fw-bold mb-1" style="font-size:.95rem;color:#1a1f2e;">
                                        <i class="fas fa-paper-plane me-2" style="color:#0077B6;"></i>Send Portal Invitation
                                    </h5>
                                    <p style="font-size:.78rem;color:#adb5bd;margin:0;">
                                        <?php echo e($app->reference); ?> — <?php echo e($app->child_name); ?>

                                    </p>
                                </div>
                                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="<?php echo e(route('admin.admissions.invite', $app->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="modal-body" style="padding:18px 24px;">
                                    <div style="background:#eff6ff;border:1px solid #dbeafe;border-radius:10px;padding:12px 14px;margin-bottom:16px;font-size:.82rem;color:#1d4ed8;">
                                        <i class="fas fa-info-circle me-2"></i>
                                        A portal setup link will be emailed. The link expires in <strong>7 days</strong>.
                                    </div>
                                    <label style="font-size:.72rem;font-weight:700;color:#6c757d;text-transform:uppercase;letter-spacing:.4px;margin-bottom:6px;display:block;">Parent Email</label>
                                    <input type="email" name="email"
                                           style="font-size:.84rem;border:1.5px solid #e5e7eb;border-radius:10px;padding:10px 14px;background:#fafafa;width:100%;outline:none;transition:border-color .2s;"
                                           value="<?php echo e($app->mother_email); ?>" required
                                           onfocus="this.style.borderColor='#0077B6'" onblur="this.style.borderColor='#e5e7eb'">
                                </div>
                                <div class="modal-footer border-0" style="padding:0 24px 22px;gap:8px;">
                                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-sm rounded-pill px-4 text-white" style="background:#0077B6;border:none;">
                                        <i class="fas fa-paper-plane me-1"></i>Send Invitation
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8" class="text-center" style="padding:60px 20px;">
                        <div style="width:64px;height:64px;background:#f5f3ff;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:1.6rem;">
                            📭
                        </div>
                        <div class="fw-semibold" style="color:#1a1f2e;font-size:.95rem;margin-bottom:6px;">No applications found</div>
                        <div style="font-size:.82rem;color:#adb5bd;">
                            <?php if(request()->hasAny(['status','program','search'])): ?>
                                No applications match your current filters.
                                <a href="<?php echo e(route('admin.admissions.index')); ?>" style="color:#7c3aed;text-decoration:none;font-weight:600;">Clear filters</a>
                            <?php else: ?>
                                Applications will appear here once parents complete the enrolment form.
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if($applications->hasPages()): ?>
    <div class="p-4 d-flex justify-content-between align-items-center" style="border-top:1px solid #f3f4f6;">
        <div style="font-size:.8rem;color:#adb5bd;">
            Showing <?php echo e($applications->firstItem()); ?>–<?php echo e($applications->lastItem()); ?> of <?php echo e($applications->total()); ?> applications
        </div>
        <?php echo e($applications->links()); ?>

    </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/admin/admissions/index.blade.php ENDPATH**/ ?>