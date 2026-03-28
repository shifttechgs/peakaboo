<?php $__env->startSection('title', 'All Leads'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ── Page header ────────────────────────────────────────────────────── */
.leads-header { margin-bottom: 28px; }
.leads-header h4 { font-size: 1.35rem; font-weight: 800; color: #1a1f2e; margin: 0 0 4px; }
.leads-header p  { font-size: .86rem; color: #6c757d; margin: 0; }

/* ── Panel ──────────────────────────────────────────────────────────── */
.leads-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden;
    margin-bottom: 20px;
}
.leads-panel-header {
    padding: 16px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.leads-panel-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }
.leads-panel-body { padding: 20px 22px; }

/* ── Filter form ────────────────────────────────────────────────────── */
.leads-filter .form-label {
    font-size: .68rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .4px; color: #94a3b8; margin-bottom: 5px;
}
.leads-filter .form-control,
.leads-filter .form-select {
    font-size: .84rem; border: 1px solid #e5e7eb;
    border-radius: 8px; padding: 9px 12px; height: auto;
    background: #fafafa; color: #374151; transition: border-color .2s;
}
.leads-filter .form-control:focus,
.leads-filter .form-select:focus {
    border-color: #0077B6;
    box-shadow: 0 0 0 3px rgba(0,119,182,.08);
    background: #fff; outline: none;
}

/* ── Bulk action bar ────────────────────────────────────────────────── */
.bulk-bar {
    background: #1a1f2e; border-radius: 12px;
    padding: 12px 20px; margin-bottom: 16px;
    display: flex; align-items: center; gap: 16px;
    animation: slideDown .2s ease;
}
@keyframes slideDown { from{opacity:0;transform:translateY(-8px)} to{opacity:1;transform:translateY(0)} }
.bulk-bar .bulk-count {
    font-size: .82rem; font-weight: 700; color: #fff;
    background: rgba(255,255,255,.1); padding: 4px 12px; border-radius: 20px;
}
.bulk-bar .form-select {
    font-size: .82rem; border: 1px solid rgba(255,255,255,.15);
    background: rgba(255,255,255,.08); color: #fff;
    border-radius: 8px; padding: 7px 12px;
}
.bulk-bar .form-select option { background: #1a1f2e; color: #fff; }

/* ── Leads table ────────────────────────────────────────────────────── */
.leads-table th {
    font-size: .66rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; background: #fafafa;
    border-bottom: 1px solid #f0f0f0; padding: 10px 14px;
}
.leads-table td {
    padding: 13px 14px; vertical-align: middle;
    border-bottom: 1px solid #f8f8f8; font-size: .84rem; color: #374151;
}
.leads-table tbody tr:last-child td { border-bottom: none; }
.leads-table tbody tr:hover td { background: #fafcff; transition: background .1s; }
.leads-table tbody tr.overdue-row td { background: #fff8f8; }
.leads-table tbody tr.overdue-row:hover td { background: #fff0f0; }

/* ── Inline status select ───────────────────────────────────────────── */
.status-select {
    font-size: .77rem; border: 1.5px solid #e5e7eb;
    border-radius: 8px; padding: 5px 8px; background: #fafafa;
    color: #374151; cursor: pointer; transition: border-color .2s; min-width: 130px;
}
.status-select:focus { border-color: #0077B6; outline: none; box-shadow: none; }

/* ── Pills ──────────────────────────────────────────────────────────── */
.src-pill, .st-pill {
    font-size: .68rem; font-weight: 700; border-radius: 20px;
    padding: 3px 9px; display: inline-block; white-space: nowrap;
}
.age-pill {
    font-size: .68rem; font-weight: 600; border-radius: 20px;
    padding: 2px 9px; background: #f3f4f6; color: #6c757d;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<div class="d-flex justify-content-between align-items-center leads-header">
    <div>
        <h4><i class="fas fa-users me-2" style="color:#0097a7;font-size:1.1rem;"></i>All Leads
            <span class="ms-2 rounded-pill px-2 py-1"
                  style="background:#e0f7fa;color:#0097a7;font-size:.72rem;font-weight:700;vertical-align:middle;">
                <?php echo e($leads->total()); ?> lead<?php echo e($leads->total() !== 1 ? 's' : ''); ?>

            </span>
        </h4>
        <p>Full pipeline — filter, bulk-action, and track every enquiry</p>
    </div>
    <div class="d-flex gap-2">
        <a href="<?php echo e(route('admin.crm.leads.export', request()->query())); ?>"
           class="btn btn-outline-secondary btn-sm rounded-pill px-3">
            <i class="fas fa-file-excel me-1"></i>Export
        </a>
        <a href="<?php echo e(route('admin.crm.kanban')); ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3">
            <i class="fas fa-columns me-1"></i>Kanban
        </a>
        <a href="<?php echo e(route('admin.crm.index')); ?>"
           class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
            <i class="fas fa-funnel-dollar me-1"></i>Lead Pipeline
        </a>
    </div>
</div>


<div class="leads-panel">
    <div class="leads-panel-header">
        <h6><i class="fas fa-filter me-2" style="color:#94a3b8;"></i>Filter Leads</h6>
        <?php if(request()->hasAny(['status','source','child_age','search','assigned_to'])): ?>
            <a href="<?php echo e(route('admin.crm.leads')); ?>"
               class="btn btn-sm rounded-pill px-3" style="background:#fee2e2;color:#ef4444;border:none;font-size:.75rem;">
                <i class="fas fa-times me-1"></i>Clear Filters
            </a>
        <?php endif; ?>
    </div>
    <div class="leads-panel-body leads-filter">
        <form method="GET" action="<?php echo e(route('admin.crm.leads')); ?>">
            <div class="row g-3 align-items-end">
                <div class="col-md-2">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="">All Statuses</option>
                        <?php $__currentLoopData = \App\Models\Lead::STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($s); ?>" <?php echo e(request('status') === $s ? 'selected' : ''); ?>>
                                <?php echo e(ucwords(str_replace('_', ' ', $s))); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Source</label>
                    <select name="source" class="form-select">
                        <option value="">All Sources</option>
                        <?php $__currentLoopData = \App\Models\Lead::SOURCES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $src): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($src); ?>" <?php echo e(request('source') === $src ? 'selected' : ''); ?>>
                                <?php echo e(ucfirst($src)); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Age Group</label>
                    <select name="child_age" class="form-select">
                        <option value="">All Ages</option>
                        <?php $__currentLoopData = ['0-1 years','1-2 years','2-3 years','3-4 years','4-5 years','5-6 years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $age): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($age); ?>" <?php echo e(request('child_age') === $age ? 'selected' : ''); ?>>
                                <?php echo e($age); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Assigned To</label>
                    <select name="assigned_to" class="form-select">
                        <option value="">All Staff</option>
                        <?php $__currentLoopData = $adminUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uid => $uname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($uid); ?>" <?php echo e(request('assigned_to') == $uid ? 'selected' : ''); ?>>
                                <?php echo e($uname); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Search</label>
                    <input type="text" name="search" class="form-control"
                           placeholder="Name, email, ref…" value="<?php echo e(request('search')); ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-sm w-100 rounded-pill text-white"
                            style="background:#0077B6;padding:9px;">
                        <i class="fas fa-search me-1"></i>Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="bulk-bar d-none" id="bulkBar">
    <span class="bulk-count"><span id="bulkCount">0</span> selected</span>
    <form method="POST" action="<?php echo e(route('admin.crm.leads.bulk-action')); ?>" id="bulkForm"
          class="d-flex gap-2 align-items-center flex-grow-1">
        <?php echo csrf_field(); ?>
        <div id="bulkIdsContainer"></div>
        <select name="action" class="form-select" style="max-width:200px;" required>
            <option value="">Choose action…</option>
            <optgroup label="Change Status">
                <?php $__currentLoopData = \App\Models\Lead::STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($s); ?>">Set: <?php echo e(ucwords(str_replace('_', ' ', $s))); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </optgroup>
            <optgroup label="Other">
                <option value="delete">Delete Selected</option>
            </optgroup>
        </select>
        <button type="submit" class="btn btn-sm rounded-pill px-3"
                style="background:#0077B6;color:#fff;font-size:.82rem;" id="bulkSubmit">
            Apply
        </button>
    </form>
    <button type="button" class="btn btn-sm ms-auto rounded-pill px-3"
            style="background:rgba(255,255,255,.1);color:#fff;font-size:.82rem;" id="bulkCancel">
        Cancel
    </button>
</div>


<div class="leads-panel">
    <div class="table-responsive">
        <table class="table leads-table mb-0">
            <thead>
                <tr>
                    <th style="width:35px;">
                        <input type="checkbox" class="form-check-input" id="selectAll">
                    </th>
                    <th>Reference</th>
                    <th>Lead</th>
                    <th>Child</th>
                    <th>Tour Date</th>
                    <th>Source</th>
                    <th>Assigned</th>
                    <th>Activity</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $srcMap = [
                        'google'    => ['#fee2e2','#ef4444'],
                        'facebook'  => ['#dbeafe','#3b82f6'],
                        'instagram' => ['#fef3c7','#d97706'],
                        'referral'  => ['#dcfce7','#16a34a'],
                        'other'     => ['#f3f4f6','#6c757d'],
                    ];
                    $stMap = [
                        'new'            => ['#dbeafe','#3b82f6'],
                        'contacted'      => ['#fef3c7','#d97706'],
                        'tour_scheduled' => ['#e0f7fa','#0097a7'],
                        'tour_completed' => ['#f5f3ff','#7c3aed'],
                        'converted'      => ['#dcfce7','#16a34a'],
                        'waitlist'       => ['#f3f4f6','#6c757d'],
                        'lost'           => ['#fee2e2','#ef4444'],
                    ];
                    [$srcBg, $srcClr] = $srcMap[$lead->source] ?? ['#f3f4f6','#6c757d'];
                    [$stBg,  $stClr]  = $stMap[$lead->status]  ?? ['#f3f4f6','#6c757d'];
                    $waNum = preg_replace('/[^0-9]/', '', $lead->phone);
                    if (str_starts_with($waNum, '0')) { $waNum = '27' . substr($waNum, 1); }
                ?>
                <tr class="<?php echo e($lead->isOverdue() ? 'overdue-row' : ''); ?>">
                    <td>
                        <input type="checkbox" class="form-check-input lead-checkbox" value="<?php echo e($lead->id); ?>">
                    </td>
                    <td>
                        <code style="font-size:.76rem;color:#0077B6;"><?php echo e($lead->reference); ?></code>
                        <?php if($lead->isOverdue()): ?>
                            <div style="font-size:.65rem;color:#ef4444;font-weight:700;margin-top:2px;">
                                <i class="fas fa-exclamation-triangle me-1"></i>Overdue
                            </div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="fw-semibold" style="color:#1a1f2e;"><?php echo e($lead->name); ?></div>
                        <a href="mailto:<?php echo e($lead->email); ?>" style="font-size:.74rem;color:#adb5bd;text-decoration:none;">
                            <?php echo e($lead->email); ?>

                        </a>
                        <div style="font-size:.74rem;color:#adb5bd;"><?php echo e($lead->phone); ?></div>
                    </td>
                    <td>
                        <div style="color:#374151;"><?php echo e($lead->child_name); ?></div>
                        <span class="age-pill mt-1 d-inline-block"><?php echo e($lead->child_age); ?></span>
                    </td>
                    <td>
                        <div style="color:#374151;font-weight:600;"><?php echo e($lead->preferred_date->format('d M Y')); ?></div>
                        <div style="font-size:.74rem;color:#adb5bd;"><?php echo e($lead->preferred_time); ?></div>
                    </td>
                    <td>
                        <?php if($lead->source): ?>
                            <span class="src-pill" style="background:<?php echo e($srcBg); ?>;color:<?php echo e($srcClr); ?>;"><?php echo e(ucfirst($lead->source)); ?></span>
                        <?php else: ?>
                            <span style="color:#d1d5db;">—</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($lead->assignee): ?>
                            <span style="font-size:.78rem;background:#f3f4f6;color:#374151;border-radius:20px;padding:3px 10px;font-weight:600;">
                                <i class="fas fa-user me-1" style="color:#94a3b8;font-size:.65rem;"></i><?php echo e($lead->assignee->name); ?>

                            </span>
                        <?php else: ?>
                            <span style="color:#d1d5db;font-size:.8rem;">—</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($lead->follow_up_date): ?>
                            <span style="font-size:.78rem;<?php echo e($lead->isFollowUpDue() ? 'color:#ef4444;font-weight:700;' : 'color:#adb5bd;'); ?>">
                                <?php echo e($lead->follow_up_date->format('d M')); ?>

                                <?php if($lead->isFollowUpDue()): ?> <i class="fas fa-bell ms-1"></i><?php endif; ?>
                            </span>
                        <?php elseif($lead->last_activity_at): ?>
                            <span style="font-size:.78rem;color:#adb5bd;"
                                  title="<?php echo e($lead->last_activity_at->format('d M Y H:i')); ?>">
                                <?php echo e($lead->last_activity_at->diffForHumans(null, true, true)); ?>

                            </span>
                        <?php else: ?>
                            <?php $daysOld = (int) $lead->created_at->diffInDays(now()); ?>
                            <span style="font-size:.78rem;<?php echo e($lead->isOverdue() ? 'color:#ef4444;font-weight:700;' : 'color:#adb5bd;'); ?>">
                                <?php echo e($daysOld === 0 ? 'Today' : $daysOld . 'd ago'); ?>

                            </span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <form method="POST" action="<?php echo e(route('admin.crm.leads.status', $lead->id)); ?>" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <select name="status" class="status-select" onchange="this.form.submit()">
                                <?php $__currentLoopData = \App\Models\Lead::STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($s); ?>" <?php echo e($lead->status === $s ? 'selected' : ''); ?>>
                                        <?php echo e(ucwords(str_replace('_', ' ', $s))); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </form>
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="<?php echo e(route('admin.crm.leads.show', $lead->id)); ?>"
                               class="btn btn-sm py-1 px-2"
                               style="background:#eff6ff;color:#3b82f6;border:1px solid #dbeafe;font-size:.74rem;">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="https://wa.me/<?php echo e($waNum); ?>" target="_blank" rel="noopener"
                               class="btn btn-sm py-1 px-2"
                               style="background:#f0fdf4;color:#16a34a;border:1px solid #dcfce7;font-size:.74rem;"
                               title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                            <a href="mailto:<?php echo e($lead->email); ?>"
                               class="btn btn-sm py-1 px-2"
                               style="background:#f3f4f6;color:#6c757d;border:1px solid #e5e7eb;font-size:.74rem;"
                               title="Email"><i class="fas fa-envelope"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="10" class="text-center py-5">
                        <div style="font-size:2rem;margin-bottom:10px;">🔍</div>
                        <div class="fw-semibold" style="color:#1a1f2e;font-size:.9rem;">No leads found</div>
                        <div style="font-size:.8rem;color:#adb5bd;margin-top:4px;">Try adjusting your filters</div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if($leads->hasPages()): ?>
    <div class="p-4" style="border-top:1px solid #f3f4f6;">
        <?php echo e($leads->links()); ?>

    </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var selectAll = document.getElementById('selectAll');
    var checkboxes = document.querySelectorAll('.lead-checkbox');
    var bulkBar = document.getElementById('bulkBar');
    var bulkCount = document.getElementById('bulkCount');
    var bulkForm = document.getElementById('bulkForm');
    var bulkIdsContainer = document.getElementById('bulkIdsContainer');
    var bulkCancel = document.getElementById('bulkCancel');

    function updateBulkBar() {
        var checked = document.querySelectorAll('.lead-checkbox:checked');
        bulkCount.textContent = checked.length;
        bulkBar.classList.toggle('d-none', checked.length === 0);
        bulkIdsContainer.innerHTML = '';
        checked.forEach(function(cb) {
            var inp = document.createElement('input');
            inp.type = 'hidden'; inp.name = 'lead_ids[]'; inp.value = cb.value;
            bulkIdsContainer.appendChild(inp);
        });
    }

    selectAll.addEventListener('change', function() {
        checkboxes.forEach(function(cb) { cb.checked = selectAll.checked; });
        updateBulkBar();
    });
    checkboxes.forEach(function(cb) { cb.addEventListener('change', updateBulkBar); });
    bulkCancel.addEventListener('click', function() {
        selectAll.checked = false;
        checkboxes.forEach(function(cb) { cb.checked = false; });
        updateBulkBar();
    });

    bulkForm.addEventListener('submit', function(e) {
        var action = bulkForm.querySelector('[name="action"]').value;
        var count  = document.querySelectorAll('.lead-checkbox:checked').length;
        if (action === 'delete') {
            e.preventDefault();
            showConfirm({
                title:     'Archive Leads',
                message:   'Archive ' + count + ' lead(s)? They can be restored later.',
                icon:      '🗂️',
                btnText:   'Archive',
                btnColor:  '#ef4444',
                onConfirm: function() { bulkForm.submit(); },
            });
        } else if (action) {
            e.preventDefault();
            showConfirm({
                title:     'Update Status',
                message:   'Update status for ' + count + ' lead(s)?',
                icon:      '✏️',
                btnText:   'Update',
                btnColor:  '#0077B6',
                onConfirm: function() { bulkForm.submit(); },
            });
        }
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/admin/crm/leads.blade.php ENDPATH**/ ?>