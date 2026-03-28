<?php $__env->startSection('title', 'Lead — ' . $lead->reference); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ── Breadcrumb & header ────────────────────────────────────────────── */
.ld-header { margin-bottom: 28px; }
.ld-breadcrumb {
    list-style: none; padding: 0; margin: 0 0 8px;
    display: flex; gap: 6px; font-size: .76rem; color: #adb5bd;
}
.ld-breadcrumb a { color: #0077B6; text-decoration: none; }
.ld-breadcrumb a:hover { text-decoration: underline; }
.ld-breadcrumb li + li::before { content: '/'; margin-right: 6px; color: #d1d5db; }
.ld-header h4 { font-size: 1.35rem; font-weight: 800; color: #1a1f2e; margin: 0 0 4px; }
.ld-header p  { font-size: .82rem; color: #adb5bd; margin: 0; }

/* ── Shared panel ───────────────────────────────────────────────────── */
.ld-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden;
    margin-bottom: 20px;
}
.ld-panel-header {
    padding: 16px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.ld-panel-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }
.ld-panel-body { padding: 22px; }


/* ── Field grid inside info panels ─────────────────────────────────── */
.ld-field-label {
    font-size: .67rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; margin-bottom: 3px;
}
.ld-field-val { font-size: .88rem; color: #1a1f2e; font-weight: 600; }
.ld-field-val a { color: #0077B6; text-decoration: none; }
.ld-field-val a:hover { text-decoration: underline; }

/* section divider inside panel */
.ld-divider {
    height: 1px; background: #f3f4f6;
    margin: 18px 0;
}
.ld-section-label {
    font-size: .64rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: 1px; color: #adb5bd; margin-bottom: 14px;
}

/* ── Message / notes boxes ──────────────────────────────────────────── */
.ld-message-box {
    background: #f8fafc; border: 1px solid #e5e7eb;
    border-radius: 10px; padding: 14px 16px;
    font-size: .86rem; color: #374151; line-height: 1.6;
}
.ld-notes-box {
    background: #fffbeb; border: 1px solid #fde68a;
    border-radius: 10px; padding: 14px 16px;
    font-size: .86rem; color: #374151; line-height: 1.6;
}

/* ── Activity timeline ──────────────────────────────────────────────── */
.ld-timeline-item {
    display: flex; gap: 14px;
    padding-bottom: 16px; margin-bottom: 16px;
    border-bottom: 1px solid #f3f4f6;
    position: relative;
}
.ld-timeline-item:last-child { border-bottom: none; padding-bottom: 0; margin-bottom: 0; }
.ld-timeline-icon {
    width: 30px; height: 30px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; font-size: .75rem;
}
.ld-timeline-text { font-size: .84rem; font-weight: 600; color: #1a1f2e; }
.ld-timeline-meta { font-size: .72rem; color: #adb5bd; margin-top: 2px; }
.ld-timeline-changes { margin-top: 6px; display: flex; flex-wrap: wrap; gap: 6px; }
.ld-change-badge {
    font-size: .7rem; background: #f3f4f6; border-radius: 6px;
    padding: 3px 8px; color: #374151;
}

/* ── Sidebar form controls ──────────────────────────────────────────── */
.ld-form-label {
    font-size: .72rem; font-weight: 700; color: #6c757d;
    margin-bottom: 6px; display: block;
}
.ld-form-control, .ld-form-select {
    font-size: .84rem; border: 1.5px solid #e5e7eb;
    border-radius: 10px; padding: 10px 14px; background: #fafafa;
    color: #374151; transition: border-color .2s; width: 100%;
}
.ld-form-control:focus, .ld-form-select:focus {
    border-color: #0077B6;
    box-shadow: 0 0 0 3px rgba(0,119,182,.08);
    background: #fff; outline: none;
}
.ld-form-control::placeholder { color: #d1d5db; }
textarea.ld-form-control { min-height: 100px; resize: vertical; }

/* ── Sidebar action buttons ─────────────────────────────────────────── */
.ld-btn {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    width: 100%; padding: 11px 16px; border-radius: 10px;
    font-size: .84rem; font-weight: 700; cursor: pointer;
    border: none; transition: all .2s; text-decoration: none;
}
.ld-btn-primary   { background: #0077B6; color: #fff; }
.ld-btn-primary:hover { background: #005f93; color: #fff; }
.ld-btn-success   { background: #16a34a; color: #fff; }
.ld-btn-success:hover { background: #15803d; color: #fff; }
.ld-btn-amber     { background: #d97706; color: #fff; }
.ld-btn-amber:hover { background: #b45309; color: #fff; }
.ld-btn-teal      { background: #0097a7; color: #fff; }
.ld-btn-teal:hover { background: #00838f; color: #fff; }
.ld-btn-danger    { background: #ef4444; color: #fff; }
.ld-btn-danger:hover { background: #dc2626; color: #fff; }
.ld-btn-ghost {
    background: #f3f4f6; color: #374151;
    border: 1.5px solid #e5e7eb;
}
.ld-btn-ghost:hover { background: #e5e7eb; }
.ld-btn + .ld-btn  { margin-top: 8px; }

/* ── Linked enrolment card ──────────────────────────────────────────── */
.ld-enrol-card {
    background: #f0fdf4; border-radius: 12px;
    padding: 16px; margin-bottom: 14px;
    border: 1px solid #dcfce7;
}

/* ── Task rows ──────────────────────────────────────────────────────── */
.ld-task-row {
    display: flex; align-items: flex-start; gap: 10px;
    padding: 10px 0; border-bottom: 1px solid #f3f4f6;
}
.ld-task-row:last-child { border-bottom: none; padding-bottom: 0; }
.ld-task-toggle {
    background: none; border: none; padding: 2px; cursor: pointer; flex-shrink: 0; margin-top: 1px;
}
.ld-task-title { font-size: .84rem; color: #374151; }
.ld-task-due   { font-size: .72rem; color: #adb5bd; margin-top: 2px; }

/* ── Pills ──────────────────────────────────────────────────────────── */
.ld-pill {
    font-size: .7rem; font-weight: 700; border-radius: 20px;
    padding: 3px 10px; display: inline-block;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<?php
    $stMap = [
        'new'            => ['#dbeafe','#3b82f6'],
        'contacted'      => ['#fef3c7','#d97706'],
        'tour_scheduled' => ['#e0f7fa','#0097a7'],
        'tour_completed' => ['#f5f3ff','#7c3aed'],
        'converted'      => ['#dcfce7','#16a34a'],
        'waitlist'       => ['#f3f4f6','#6c757d'],
        'lost'           => ['#fee2e2','#ef4444'],
    ];
    [$stBg, $stClr] = $stMap[$lead->status] ?? ['#f3f4f6','#6c757d'];
    $daysOld = (int) $lead->created_at->diffInDays(now());
    $waPhone = preg_replace('/[^0-9]/', '', $lead->phone);
    if (str_starts_with($waPhone, '0')) { $waPhone = '27' . substr($waPhone, 1); }
    $waTemplates = [
        'follow_up' => [
            'label' => 'Follow Up',
            'text'  => "Hi {$lead->name}, this is Peekaboo Daycare. Thank you for your interest in our school! We'd love to schedule a tour for {$lead->child_name}. Would the {$lead->preferred_date->format('d M')} at {$lead->preferred_time} still work for you?",
        ],
        'tour_reminder' => [
            'label' => 'Tour Reminder',
            'text'  => "Hi {$lead->name}, just a friendly reminder about your tour at Peekaboo Daycare on {$lead->preferred_date->format('l, d F')} at {$lead->preferred_time}. Please arrive 5 minutes early. We look forward to meeting you and {$lead->child_name}! See you soon.",
        ],
        'post_tour' => [
            'label' => 'Post-Tour',
            'text'  => "Hi {$lead->name}, thank you for visiting Peekaboo Daycare today! We loved meeting {$lead->child_name}. If you have any questions or would like to proceed with enrolment, please don't hesitate to reach out. We'd love to have {$lead->child_name} join our family!",
        ],
        'waitlist' => [
            'label' => 'Waitlist Update',
            'text'  => "Hi {$lead->name}, we wanted to let you know that {$lead->child_name} is on our waitlist. We'll be in touch as soon as a spot opens up. Thank you for your patience!",
        ],
    ];
?>

<div class="d-flex justify-content-between align-items-start ld-header">
    <div>
        <ul class="ld-breadcrumb">
            <li><a href="<?php echo e(route('admin.crm.index')); ?>">Lead Pipeline</a></li>
            <li><a href="<?php echo e(route('admin.crm.leads')); ?>">Leads</a></li>
            <li><?php echo e($lead->reference); ?></li>
        </ul>
        <h4>
            <?php echo e($lead->name); ?>

            <span class="ld-pill ms-2" style="background:<?php echo e($stBg); ?>;color:<?php echo e($stClr); ?>;font-size:.72rem;">
                <?php echo e(ucwords(str_replace('_', ' ', $lead->status))); ?>

            </span>
            <?php if($lead->isOverdue()): ?>
                <span class="ld-pill ms-1" style="background:#fee2e2;color:#ef4444;font-size:.72rem;">
                    <i class="fas fa-exclamation-triangle me-1"></i>Overdue
                </span>
            <?php endif; ?>
        </h4>
        <p>
            <code style="font-size:.78rem;color:#0077B6;"><?php echo e($lead->reference); ?></code>
            &bull; Submitted <?php echo e($lead->created_at->format('d M Y, H:i')); ?>

        </p>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        
        <div class="dropdown">
            <button class="btn btn-sm rounded-pill px-3 dropdown-toggle"
                    style="background:#f0fdf4;color:#16a34a;border:1px solid #dcfce7;"
                    type="button" data-bs-toggle="dropdown">
                <i class="fab fa-whatsapp me-1"></i>WhatsApp
            </button>
            <ul class="dropdown-menu dropdown-menu-end" style="min-width:220px;border-radius:12px;border:1px solid #f0f0f0;box-shadow:0 4px 20px rgba(0,0,0,.1);">
                <li>
                    <a class="dropdown-item small" href="https://wa.me/<?php echo e($waPhone); ?>" target="_blank">
                        <i class="fab fa-whatsapp me-2 text-success"></i>Open Chat (blank)
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li class="dropdown-header" style="font-size:.68rem;font-weight:800;letter-spacing:.5px;color:#adb5bd;">QUICK TEMPLATES</li>
                <?php $__currentLoopData = $waTemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tpl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a class="dropdown-item small"
                       href="https://wa.me/<?php echo e($waPhone); ?>?text=<?php echo e(urlencode($tpl['text'])); ?>"
                       target="_blank">
                        <i class="fas fa-comment-dots me-2" style="color:#adb5bd;"></i><?php echo e($tpl['label']); ?>

                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <a href="<?php echo e(route('admin.crm.leads.edit', $lead->id)); ?>"
           class="btn btn-sm btn-outline-primary rounded-pill px-3">
            <i class="fas fa-edit me-1"></i>Edit
        </a>
        <a href="<?php echo e(route('admin.crm.index')); ?>"
           class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
            <i class="fas fa-funnel-dollar me-1"></i>Lead Pipeline
        </a>
    </div>
</div>

<div class="row g-4">

    
    <div class="col-lg-7">

        
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6><i class="fas fa-user me-2" style="color:#3b82f6;"></i>Lead Information</h6>
            </div>
            <div class="ld-panel-body">
                <div class="ld-section-label">Contact</div>
                <div class="row g-3 mb-0">
                    <div class="col-sm-6">
                        <div class="ld-field-label">Full Name</div>
                        <div class="ld-field-val"><?php echo e($lead->name); ?></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ld-field-label">Email</div>
                        <div class="ld-field-val"><a href="mailto:<?php echo e($lead->email); ?>"><?php echo e($lead->email); ?></a></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ld-field-label">Phone</div>
                        <div class="ld-field-val"><a href="tel:<?php echo e($lead->phone); ?>"><?php echo e($lead->phone); ?></a></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ld-field-label">Source</div>
                        <div class="ld-field-val">
                            <?php if($lead->source): ?>
                                <?php
                                    $srcMap = [
                                        'google'    => ['#fee2e2','#ef4444'],
                                        'facebook'  => ['#dbeafe','#3b82f6'],
                                        'instagram' => ['#fef3c7','#d97706'],
                                        'referral'  => ['#dcfce7','#16a34a'],
                                        'other'     => ['#f3f4f6','#6c757d'],
                                    ];
                                    [$srcBg, $srcClr] = $srcMap[$lead->source] ?? ['#f3f4f6','#6c757d'];
                                ?>
                                <span class="ld-pill" style="background:<?php echo e($srcBg); ?>;color:<?php echo e($srcClr); ?>;"><?php echo e(ucfirst($lead->source)); ?></span>
                            <?php else: ?>
                                <span style="color:#adb5bd;">Not specified</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="ld-divider"></div>
                <div class="ld-section-label">Child Details</div>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="ld-field-label">Child's Name</div>
                        <div class="ld-field-val"><?php echo e($lead->child_name); ?></div>
                    </div>
                    <?php if($lead->child_nickname): ?>
                    <div class="col-sm-6">
                        <div class="ld-field-label">Nickname</div>
                        <div class="ld-field-val"><?php echo e($lead->child_nickname); ?></div>
                    </div>
                    <?php endif; ?>
                    <div class="col-sm-6">
                        <div class="ld-field-label">Age Group</div>
                        <div class="ld-field-val">
                            <span class="ld-pill" style="background:#f3f4f6;color:#374151;"><?php echo e($lead->child_age); ?></span>
                        </div>
                    </div>
                </div>

                <div class="ld-divider"></div>
                <div class="ld-section-label">Tour Preference</div>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="ld-field-label">Preferred Date</div>
                        <div class="ld-field-val"><?php echo e($lead->preferred_date->format('l, d F Y')); ?></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ld-field-label">Preferred Time</div>
                        <div class="ld-field-val"><?php echo e($lead->preferred_time); ?></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ld-field-label">Days Since Submitted</div>
                        <div class="ld-field-val <?php echo e($lead->isOverdue() ? 'text-danger' : ''); ?>">
                            <?php echo e($daysOld === 0 ? 'Today' : $daysOld . ($daysOld === 1 ? ' day' : ' days') . ' ago'); ?>

                            <?php if($lead->isOverdue()): ?>
                                <span class="ld-pill ms-1" style="background:#fee2e2;color:#ef4444;">Overdue</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if($lead->follow_up_date): ?>
                    <div class="col-sm-6">
                        <div class="ld-field-label">Follow-up Date</div>
                        <div class="ld-field-val <?php echo e($lead->isFollowUpDue() ? 'text-danger' : ''); ?>">
                            <?php echo e($lead->follow_up_date->format('d M Y')); ?>

                            <?php if($lead->isFollowUpDue()): ?>
                                <span class="ld-pill ms-1" style="background:#fee2e2;color:#ef4444;">Due</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($lead->tour_scheduled_at): ?>
                    <div class="col-sm-6">
                        <div class="ld-field-label">Confirmed Tour</div>
                        <div class="ld-field-val" style="color:#0097a7;">
                            <?php echo e($lead->tour_scheduled_at->format('d M Y')); ?>

                            <span style="color:#adb5bd;font-weight:400;"> at <?php echo e($lead->tour_scheduled_at->format('H:i')); ?></span>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($lead->converted_at): ?>
                    <div class="col-sm-6">
                        <div class="ld-field-label">Converted</div>
                        <div class="ld-field-val" style="color:#16a34a;">
                            <?php echo e($lead->converted_at->format('d M Y')); ?>

                            <span style="color:#adb5bd;font-weight:400;font-size:.78rem;"> (<?php echo e($lead->daysToConvert()); ?>d to convert)</span>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($lead->last_activity_at): ?>
                    <div class="col-sm-6">
                        <div class="ld-field-label">Last Activity</div>
                        <div class="ld-field-val" title="<?php echo e($lead->last_activity_at->format('d M Y H:i')); ?>">
                            <?php echo e($lead->last_activity_at->diffForHumans()); ?>

                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <?php if($lead->message): ?>
                <div class="ld-divider"></div>
                <div class="ld-section-label">Message from Lead</div>
                <div class="ld-message-box"><?php echo e($lead->message); ?></div>
                <?php endif; ?>

                <?php if($lead->notes): ?>
                <div class="ld-divider"></div>
                <div class="ld-section-label">Internal Notes</div>
                <div class="ld-notes-box"><?php echo e($lead->notes); ?></div>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6><i class="fas fa-history me-2" style="color:#7c3aed;"></i>Activity Timeline</h6>
            </div>
            <div class="ld-panel-body">
                <?php
                    $iconConfig = [
                        'created'       => ['bg'=>'#dcfce7','icon'=>'fas fa-plus','color'=>'#16a34a'],
                        'status_change' => ['bg'=>'#dbeafe','icon'=>'fas fa-exchange-alt','color'=>'#3b82f6'],
                        'email_sent'    => ['bg'=>'#e0f7fa','icon'=>'fas fa-envelope','color'=>'#0097a7'],
                        'note'          => ['bg'=>'#fef3c7','icon'=>'fas fa-sticky-note','color'=>'#d97706'],
                        'edited'        => ['bg'=>'#f3f4f6','icon'=>'fas fa-edit','color'=>'#6c757d'],
                        'assigned'      => ['bg'=>'#f5f3ff','icon'=>'fas fa-user-tag','color'=>'#7c3aed'],
                    ];
                ?>
                <?php $__empty_1 = true; $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php $ic = $iconConfig[$activity->type] ?? ['bg'=>'#f3f4f6','icon'=>'fas fa-circle','color'=>'#adb5bd']; ?>
                <div class="ld-timeline-item">
                    <div class="ld-timeline-icon" style="background:<?php echo e($ic['bg']); ?>;">
                        <i class="<?php echo e($ic['icon']); ?>" style="color:<?php echo e($ic['color']); ?>;"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="ld-timeline-text"><?php echo e($activity->description); ?></div>
                        <div class="ld-timeline-meta">
                            <?php echo e($activity->created_at->format('d M Y, H:i')); ?>

                            &mdash; <?php echo e($activity->user ? $activity->user->name : 'System'); ?>

                        </div>
                        <?php if($activity->type === 'edited' && !empty($activity->metadata['changes'])): ?>
                        <div class="ld-timeline-changes">
                            <?php $__currentLoopData = $activity->metadata['changes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $change): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="ld-change-badge">
                                <?php echo e(ucwords(str_replace('_', ' ', $field))); ?>:
                                <span style="color:#ef4444;"><?php echo e(Str::limit($change['from'] ?? '—', 25)); ?></span>
                                &rarr;
                                <span style="color:#16a34a;"><?php echo e(Str::limit($change['to'] ?? '—', 25)); ?></span>
                            </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center py-4">
                    <div style="font-size:1.6rem;margin-bottom:6px;">📋</div>
                    <div style="font-size:.84rem;color:#adb5bd;">No activity recorded yet</div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <div class="col-lg-5">

        
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6><i class="fas fa-tag me-2" style="color:#3b82f6;"></i>Update Status</h6>
            </div>
            <div class="ld-panel-body">
                <form method="POST" action="<?php echo e(route('admin.crm.leads.status', $lead->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label class="ld-form-label">Current Status</label>
                        <select name="status" class="ld-form-select">
                            <?php $__currentLoopData = \App\Models\Lead::STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($s); ?>" <?php echo e($lead->status === $s ? 'selected' : ''); ?>>
                                    <?php echo e(ucwords(str_replace('_', ' ', $s))); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button type="submit" class="ld-btn ld-btn-primary">
                        <i class="fas fa-save"></i> Save Status
                    </button>
                </form>
            </div>
        </div>

        
        <?php if($lead->application): ?>
        <?php $app = $lead->application; ?>
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6><i class="fas fa-file-alt me-2" style="color:#16a34a;"></i>Enrolment Application</h6>
                <?php
                    $appBadgeMap = [
                        'pending'      => ['#fff7ed','#d97706'],
                        'under_review' => ['#e0f7fa','#0097a7'],
                        'approved'     => ['#dcfce7','#16a34a'],
                        'waitlist'     => ['#f3f4f6','#6c757d'],
                        'rejected'     => ['#fee2e2','#ef4444'],
                    ];
                    [$appBg, $appClr] = $appBadgeMap[$app->status] ?? ['#f3f4f6','#6c757d'];
                ?>
                <span class="ld-pill" style="background:<?php echo e($appBg); ?>;color:<?php echo e($appClr); ?>;"><?php echo e($app->statusLabel()); ?></span>
            </div>
            <div class="ld-panel-body">
                <div class="ld-enrol-card">
                    <div class="fw-semibold mb-1" style="color:#1a1f2e;"><?php echo e($app->child_name); ?></div>
                    <code style="font-size:.76rem;color:#16a34a;"><?php echo e($app->reference); ?></code>
                    <div class="mt-2" style="font-size:.8rem;color:#6c757d;">
                        <i class="fas fa-graduation-cap me-1"></i><?php echo e($app->program_name); ?>

                        &bull; <?php echo e(ucfirst($app->fee_option)); ?>

                    </div>
                    <div style="font-size:.8rem;color:#6c757d;margin-top:3px;">
                        <i class="fas fa-calendar me-1"></i>Start <?php echo e($app->start_date->format('d M Y')); ?>

                    </div>
                    <?php $dc = $app->documentsCount(); ?>
                    <div class="mt-2" style="font-size:.8rem;">
                        <i class="fas fa-folder-open me-1" style="color:#adb5bd;"></i>Documents:
                        <span style="color:<?php echo e($dc >= 3 ? '#16a34a' : ($dc > 0 ? '#d97706' : '#ef4444')); ?>;font-weight:700;">
                            <?php echo e($dc > 0 ? $dc.'/4 uploaded' : 'None uploaded'); ?>

                        </span>
                    </div>
                </div>
                <a href="<?php echo e(route('admin.admissions.show', $app->id)); ?>" class="ld-btn ld-btn-success">
                    <i class="fas fa-external-link-alt"></i> View Full Application
                </a>
            </div>
        </div>
        <?php elseif($lead->status === 'converted'): ?>
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6><i class="fas fa-file-alt me-2" style="color:#d97706;"></i>Enrolment Application</h6>
            </div>
            <div class="ld-panel-body">
                <p style="font-size:.82rem;color:#6c757d;margin-bottom:14px;">
                    This lead is <strong>Converted</strong> but no application has been received yet.
                </p>
                <form method="POST" action="<?php echo e(route('admin.crm.leads.start-enrol', $lead->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="ld-btn ld-btn-amber"
                            data-confirm="Send a new enrolment invitation link to <?php echo e($lead->email); ?>?"
                            data-confirm-title="Re-send Enrolment Invitation"
                            data-confirm-icon="📧"
                            data-confirm-btn="Send"
                            data-confirm-color="#d97706">
                        <i class="fas fa-paper-plane"></i>Re-send Enrolment Link
                    </button>
                </form>
            </div>
        </div>
        <?php endif; ?>

        
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6><i class="fas fa-user-tie me-2" style="color:#adb5bd;"></i>Assigned To</h6>
            </div>
            <div class="ld-panel-body">
                <form method="POST" action="<?php echo e(route('admin.crm.leads.assign', $lead->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <select name="assigned_to" class="ld-form-select">
                            <option value="">Unassigned</option>
                            <?php $__currentLoopData = $adminUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uid => $uname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($uid); ?>" <?php echo e($lead->assigned_to == $uid ? 'selected' : ''); ?>>
                                    <?php echo e($uname); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button type="submit" class="ld-btn ld-btn-ghost">
                        <i class="fas fa-save"></i> Update Assignment
                    </button>
                </form>
            </div>
        </div>

        
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6>
                    <i class="fas fa-calendar-alt me-2" style="color:#d97706;"></i>Follow-up Date
                    <?php if($lead->isFollowUpDue()): ?>
                        <span class="ld-pill ms-1" style="background:#fee2e2;color:#ef4444;font-size:.65rem;">Due</span>
                    <?php endif; ?>
                </h6>
            </div>
            <div class="ld-panel-body">
                <form method="POST" action="<?php echo e(route('admin.crm.leads.follow-up', $lead->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <input type="date" name="follow_up_date" class="ld-form-control"
                               value="<?php echo e($lead->follow_up_date?->format('Y-m-d')); ?>">
                        <div style="font-size:.72rem;color:#adb5bd;margin-top:5px;">
                            Set when this lead should next be contacted.
                        </div>
                    </div>
                    <button type="submit" class="ld-btn ld-btn-amber">
                        <i class="fas fa-save"></i> Save Follow-up Date
                    </button>
                </form>
                <?php if($lead->last_activity_at): ?>
                <div class="mt-3 pt-3" style="border-top:1px solid #f3f4f6;font-size:.76rem;color:#adb5bd;">
                    <i class="fas fa-clock me-1"></i>Last activity <?php echo e($lead->last_activity_at->diffForHumans()); ?>

                </div>
                <?php endif; ?>
            </div>
        </div>

        
        <?php if($lead->status === 'new'): ?>
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6><i class="fas fa-phone-alt me-2" style="color:#3b82f6;"></i>First Contact</h6>
            </div>
            <div class="ld-panel-body">
                <p style="font-size:.82rem;color:#6c757d;margin-bottom:14px;">
                    Record that you've made first contact with <?php echo e($lead->name); ?>.
                </p>
                <form method="POST" action="<?php echo e(route('admin.crm.leads.mark-contacted', $lead->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="ld-btn ld-btn-primary">
                        <i class="fas fa-check"></i>Mark as Contacted
                    </button>
                </form>
            </div>
        </div>
        <?php endif; ?>

        
        <?php if(in_array($lead->status, ['contacted', 'new', 'tour_scheduled'])): ?>
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6><i class="fas fa-calendar-check me-2" style="color:#0097a7;"></i>Tour Actions</h6>
            </div>
            <div class="ld-panel-body">
                <p style="font-size:.82rem;color:#6c757d;margin-bottom:14px;">
                    Set the confirmed tour date and time.
                    <?php if($lead->status !== 'tour_scheduled'): ?>
                        Status will automatically update to <strong>Tour Scheduled</strong>.
                    <?php endif; ?>
                </p>
                <form method="POST" action="<?php echo e(route('admin.crm.leads.tour-date', $lead->id)); ?>" class="mb-3">
                    <?php echo csrf_field(); ?>
                    <div class="row g-2 mb-3">
                        <div class="col-7">
                            <label class="ld-form-label">Tour Date <span style="color:#ef4444;">*</span></label>
                            <input type="date" name="tour_date" class="ld-form-control"
                                   value="<?php echo e($lead->tour_scheduled_at ? $lead->tour_scheduled_at->format('Y-m-d') : ($lead->preferred_date ? $lead->preferred_date->format('Y-m-d') : '')); ?>"
                                   required>
                        </div>
                        <div class="col-5">
                            <label class="ld-form-label">Time <span style="color:#ef4444;">*</span></label>
                            <input type="time" name="tour_time" class="ld-form-control"
                                   value="<?php echo e($lead->tour_scheduled_at ? $lead->tour_scheduled_at->format('H:i') : ''); ?>"
                                   required>
                        </div>
                    </div>
                    <button type="submit" class="ld-btn ld-btn-teal">
                        <i class="fas fa-calendar-alt"></i>
                        <?php echo e($lead->tour_scheduled_at ? 'Update Tour Date' : 'Set Tour Date'); ?>

                    </button>
                </form>
                <form method="POST" action="<?php echo e(route('admin.crm.leads.notify-tour', $lead->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="ld-btn ld-btn-ghost"
                            data-confirm="Send tour confirmation email to <?php echo e($lead->email); ?>?"
                            data-confirm-title="Send Confirmation Email"
                            data-confirm-icon="📧"
                            data-confirm-btn="Send Email"
                            data-confirm-color="#0097a7">
                        <i class="fas fa-paper-plane"></i>Send Confirmation Email
                    </button>
                </form>
            </div>
        </div>
        <?php endif; ?>

        
        <?php if($lead->status === 'tour_completed'): ?>
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6><i class="fas fa-graduation-cap me-2" style="color:#16a34a;"></i>Post-Tour Actions</h6>
            </div>
            <div class="ld-panel-body">
                <p style="font-size:.82rem;color:#6c757d;margin-bottom:14px;">
                    Tour is complete — what's the next step for <?php echo e($lead->child_name); ?>?
                </p>
                <form method="POST" action="<?php echo e(route('admin.crm.leads.start-enrol', $lead->id)); ?>" class="mb-0">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="ld-btn ld-btn-success"
                            data-confirm="Send enrolment invitation link to <?php echo e($lead->email); ?>?"
                            data-confirm-title="Start Enrolment"
                            data-confirm-icon="🎓"
                            data-confirm-btn="Send & Enrol"
                            data-confirm-color="#16a34a">
                        <i class="fas fa-user-plus"></i>Start Enrolment
                        <small style="font-size:.72rem;opacity:.8;font-weight:400;">Emails enrolment form link</small>
                    </button>
                </form>
                <form method="POST" action="<?php echo e(route('admin.crm.leads.waitlist', $lead->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="ld-btn ld-btn-amber">
                        <i class="fas fa-clock"></i>Add to Waitlist
                    </button>
                </form>
            </div>
        </div>
        <?php endif; ?>

        
        <?php if(!in_array($lead->status, ['lost', 'converted'])): ?>
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6><i class="fas fa-times-circle me-2" style="color:#ef4444;"></i>Mark as Lost</h6>
            </div>
            <div class="ld-panel-body">
                <p style="font-size:.82rem;color:#6c757d;margin-bottom:14px;">
                    Record why this lead didn't convert.
                </p>
                <button type="button" class="ld-btn ld-btn-danger" data-bs-toggle="modal" data-bs-target="#markLostModal">
                    <i class="fas fa-times"></i>Mark as Lost…
                </button>
            </div>
        </div>
        <?php endif; ?>

        
        <?php if($lead->status === 'lost' && $lead->lost_reason): ?>
        <div class="ld-panel">
            <div class="ld-panel-body">
                <div class="ld-field-label">Lost Reason</div>
                <div class="ld-field-val" style="color:#ef4444;">
                    <i class="fas fa-times-circle me-1"></i>
                    <?php echo e(\App\Models\Lead::LOST_REASONS[$lead->lost_reason] ?? $lead->lost_reason); ?>

                </div>
            </div>
        </div>
        <?php endif; ?>

        
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6><i class="fas fa-sticky-note me-2" style="color:#d97706;"></i>Internal Notes</h6>
            </div>
            <div class="ld-panel-body">
                <form method="POST" action="<?php echo e(route('admin.crm.leads.notes', $lead->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <textarea name="notes" class="ld-form-control" rows="4"
                                  placeholder="Add internal notes about this lead…"><?php echo e(old('notes', $lead->notes)); ?></textarea>
                    </div>
                    <button type="submit" class="ld-btn ld-btn-ghost">
                        <i class="fas fa-save"></i>Save Notes
                    </button>
                </form>
            </div>
        </div>

        
        <div class="ld-panel">
            <div class="ld-panel-header">
                <h6>
                    <i class="fas fa-tasks me-2" style="color:#6c757d;"></i>Tasks
                    <?php if($tasks->where('completed', false)->count() > 0): ?>
                        <span class="ld-pill ms-1" style="background:#fef3c7;color:#d97706;font-size:.65rem;">
                            <?php echo e($tasks->where('completed', false)->count()); ?> open
                        </span>
                    <?php endif; ?>
                </h6>
            </div>
            <div class="ld-panel-body">
                
                <form method="POST" action="<?php echo e(route('admin.tasks.store')); ?>" class="mb-4">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="lead_id" value="<?php echo e($lead->id); ?>">
                    <div class="row g-2">
                        <div class="col-8">
                            <input type="text" name="title" class="ld-form-control"
                                   placeholder="Add a task…" required>
                        </div>
                        <div class="col-4">
                            <input type="date" name="due_date" class="ld-form-control">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="ld-btn ld-btn-ghost" style="padding:8px;">
                                <i class="fas fa-plus"></i>Add Task
                            </button>
                        </div>
                    </div>
                </form>

                <?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="ld-task-row <?php echo e($task->isOverdue() ? 'text-danger' : ''); ?>" id="task-row-<?php echo e($task->id); ?>">
                    <button type="button" class="ld-task-toggle ajax-toggle-task" data-task-id="<?php echo e($task->id); ?>">
                        <i class="fas fa-<?php echo e($task->completed ? 'check-circle text-success' : 'circle'); ?>"
                           id="task-icon-<?php echo e($task->id); ?>"
                           style="<?php echo e($task->completed ? '' : 'color:#d1d5db;'); ?>" ></i>
                    </button>
                    <div class="flex-grow-1">
                        <div class="ld-task-title <?php echo e($task->completed ? 'text-decoration-line-through text-muted' : ''); ?>">
                            <?php echo e($task->title); ?>

                        </div>
                        <?php if($task->due_date): ?>
                        <div class="ld-task-due <?php echo e($task->isOverdue() ? 'text-danger' : ''); ?>">
                            <?php echo e($task->due_date->format('d M Y')); ?>

                        </div>
                        <?php endif; ?>
                    </div>
                    <button type="button" class="btn btn-sm p-0 border-0 bg-transparent"
                            style="color:#adb5bd;"
                            data-bs-toggle="modal" data-bs-target="#editLeadTask<?php echo e($task->id); ?>">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="POST" action="<?php echo e(route('admin.tasks.destroy', $task->id)); ?>" class="d-inline">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent"
                                style="color:#adb5bd;"
                                data-confirm="This task will be permanently deleted."
                                data-confirm-title="Delete Task"
                                data-confirm-icon="🗑️"
                                data-confirm-btn="Delete"
                                data-confirm-color="#ef4444">
                            <i class="fas fa-times"></i>
                        </button>
                    </form>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center py-3" style="font-size:.82rem;color:#adb5bd;">No tasks yet.</div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>


<?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="editLeadTask<?php echo e($task->id); ?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border:none;border-radius:16px;overflow:hidden;">
            <form method="POST" action="<?php echo e(route('admin.tasks.update', $task->id)); ?>">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                <div class="modal-header border-0" style="padding:20px 24px 0;">
                    <h5 class="modal-title fw-bold" style="font-size:.95rem;color:#1a1f2e;">Edit Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="padding:20px 24px;">
                    <div class="mb-3">
                        <label class="ld-form-label">Title <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="title" class="ld-form-control" value="<?php echo e($task->title); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="ld-form-label">Description</label>
                        <input type="text" name="description" class="ld-form-control" value="<?php echo e($task->description); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="ld-form-label">Due Date</label>
                        <input type="date" name="due_date" class="ld-form-control"
                               value="<?php echo e($task->due_date ? $task->due_date->format('Y-m-d') : ''); ?>">
                    </div>
                    <input type="hidden" name="lead_id" value="<?php echo e($lead->id); ?>">
                </div>
                <div class="modal-footer border-0" style="padding:0 24px 20px;">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm rounded-pill px-3 text-white" style="background:#0077B6;">
                        <i class="fas fa-save me-1"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<div class="modal fade" id="markLostModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border:none;border-radius:16px;overflow:hidden;">
            <form method="POST" action="<?php echo e(route('admin.crm.leads.mark-lost', $lead->id)); ?>">
                <?php echo csrf_field(); ?>
                <div class="modal-header border-0" style="padding:20px 24px 0;">
                    <h5 class="modal-title fw-bold" style="color:#ef4444;font-size:.95rem;">
                        <i class="fas fa-times-circle me-2"></i>Mark as Lost
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="padding:16px 24px 20px;">
                    <p style="font-size:.82rem;color:#6c757d;margin-bottom:14px;">
                        Select the reason this lead didn't convert to help improve follow-up patterns.
                    </p>
                    <div class="mb-3">
                        <label class="ld-form-label">Reason <span style="color:#ef4444;">*</span></label>
                        <select name="lost_reason" class="ld-form-select" required>
                            <option value="">Select a reason…</option>
                            <?php $__currentLoopData = \App\Models\Lead::LOST_REASONS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"><?php echo e($label); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-0" style="padding:0 24px 20px;">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm rounded-pill px-3"
                            style="background:#ef4444;color:#fff;border:none;">
                        <i class="fas fa-times me-1"></i>Mark as Lost
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    document.querySelectorAll('.ajax-toggle-task').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var taskId = this.dataset.taskId;
            var icon   = document.getElementById('task-icon-' + taskId);
            var row    = document.getElementById('task-row-' + taskId);
            var title  = row.querySelector('.ld-task-title');

            fetch('/admin/tasks/' + taskId + '/toggle', {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            }).then(r => r.json()).then(function(data) {
                var done = icon.classList.contains('fa-circle');
                icon.classList.toggle('fa-circle',       !done);
                icon.classList.toggle('fa-check-circle', done);
                icon.classList.toggle('text-success',    done);
                icon.style.color = done ? '' : '#d1d5db';
                if (title) {
                    title.classList.toggle('text-decoration-line-through', done);
                    title.classList.toggle('text-muted', done);
                }
                showToast(done ? 'Task completed' : 'Task reopened');
            }).catch(() => showToast('Failed to toggle task', 'error'));
        });
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/admin/crm/lead-detail.blade.php ENDPATH**/ ?>