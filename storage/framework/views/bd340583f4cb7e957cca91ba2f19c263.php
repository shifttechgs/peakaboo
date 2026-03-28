<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('portal-name', 'Parent Portal'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('sidebar-nav'); ?>
<?php echo $__env->make('parent.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-actions'); ?>
<a href="<?php echo e(route('parent.messages')); ?>" class="position-relative text-muted">
    <i class="fas fa-bell fa-lg"></i>
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
</a>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ─── Page header ──────────────────────────────────────────────────────── */
.dash-greeting { font-size: 1.35rem; font-weight: 800; color: #1a1f2e; letter-spacing: -.3px; line-height: 1.2; }
.dash-date     { font-size: .82rem; color: #94a3b8; margin-top: 3px; }

/* ─── Attention banner ─────────────────────────────────────────────────── */
.attn-strip {
    border-radius: 14px; overflow: hidden;
    border: 1px solid transparent;
    margin-bottom: 10px;
}
.attn-strip.danger  { background: #fff5f5; border-color: #fecaca; }
.attn-strip.warning { background: #fffbeb; border-color: #fde68a; }
.attn-strip.info    { background: #eff6ff; border-color: #bfdbfe; }
.attn-inner {
    display: flex; align-items: center; gap: 14px;
    padding: 14px 18px;
}
.attn-icon {
    width: 36px; height: 36px; border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; font-size: .85rem;
}
.attn-strip.danger  .attn-icon { background: #fecaca; color: #b91c1c; }
.attn-strip.warning .attn-icon { background: #fde68a; color: #92400e; }
.attn-strip.info    .attn-icon { background: #bfdbfe; color: #1d4ed8; }
.attn-body  { flex: 1; min-width: 0; }
.attn-title { font-size: .84rem; font-weight: 700; color: #1a1f2e; }
.attn-msg   { font-size: .78rem; color: #6b7280; margin-top: 1px; }
.attn-btn {
    flex-shrink: 0; font-size: .77rem; font-weight: 600;
    padding: 6px 14px; border-radius: 999px; text-decoration: none;
    white-space: nowrap; transition: all .15s;
}
.attn-strip.danger  .attn-btn { background: #fee2e2; color: #b91c1c; }
.attn-strip.warning .attn-btn { background: #fef3c7; color: #92400e; }
.attn-strip.info    .attn-btn { background: #dbeafe; color: #1d4ed8; }
.attn-strip.danger  .attn-btn:hover { background: #fecaca; color: #991b1b; }
.attn-strip.warning .attn-btn:hover { background: #fde68a; color: #78350f; }
.attn-strip.info    .attn-btn:hover { background: #bfdbfe; color: #1e3a8a; }

/* ─── Section micro-label ──────────────────────────────────────────────── */
.micro-label {
    font-size: .64rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: 1.1px; color: #adb5bd; margin-bottom: 12px;
}

/* ─── Panel ────────────────────────────────────────────────────────────── */
.panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.06);
    border: 1px solid #f0f0f0; overflow: hidden;
}
.panel-header {
    padding: 16px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.panel-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }
.panel-body { padding: 22px; }

/* ─── Child card ───────────────────────────────────────────────────────── */
.child-panel {
    background: #fff; border-radius: 16px;
    border: 1px solid #f0f0f0;
    box-shadow: 0 1px 8px rgba(0,0,0,.06);
    overflow: hidden; height: 100%;
}
.child-panel-top {
    padding: 20px 22px 16px;
    background: linear-gradient(135deg, #f0f9ff 0%, #fef1f2 100%);
    border-bottom: 1px solid #f0f0f0;
    position: relative;
}
.child-panel-top::after {
    content: '';
    position: absolute; bottom: 0; left: 22px; right: 22px; height: 2px;
    background: linear-gradient(90deg, #0077B6, #00B4D8, #FFB5BA);
    border-radius: 2px;
}
.child-avatar {
    width: 52px; height: 52px; border-radius: 13px;
    background: white; display: flex; align-items: center; justify-content: center;
    font-size: 1.3rem; font-weight: 800; color: #0077B6;
    box-shadow: 0 2px 8px rgba(0,119,182,.15);
    border: 2px solid white; flex-shrink: 0;
}
.child-name  { font-size: 1rem; font-weight: 800; color: #1a1f2e; line-height: 1.2; }
.child-prog  { font-size: .77rem; color: #64748b; margin-top: 2px; }
.child-panel-stats {
    display: flex; padding: 4px 10px 4px;
}
.child-stat {
    flex: 1; padding: 14px 12px 16px; text-align: center;
    border-right: 1px solid #f3f4f6;
}
.child-stat:last-child { border-right: none; }
.child-stat-val { font-size: 1.1rem; font-weight: 800; color: #1a1f2e; line-height: 1; }
.child-stat-lbl { font-size: .63rem; font-weight: 600; text-transform: uppercase;
                  letter-spacing: .4px; color: #94a3b8; margin-top: 4px; }
.child-panel-footer {
    padding: 12px 22px; border-top: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}

/* ─── Account stat row ─────────────────────────────────────────────────── */
.acct-stats { display: flex; padding: 4px 10px 4px; }
.acct-divider { width: 1px; background: #f3f4f6; margin: 10px 0; flex-shrink: 0; }
.acct-tile {
    flex: 1; padding: 16px 14px 18px; text-decoration: none; display: block;
    border-radius: 10px; transition: background .15s;
}
.acct-tile:hover { background: #fafbff; }
.acct-tile-val  { font-size: 1.3rem; font-weight: 800; line-height: 1; color: #1a1f2e; margin-bottom: 5px; }
.acct-tile-lbl  { font-size: .68rem; font-weight: 600; text-transform: uppercase;
                  letter-spacing: .4px; color: #94a3b8; }
.acct-tile-sub  { font-size: .68rem; color: #adb5bd; margin-top: 3px; }
.acct-tile.good .acct-tile-val { color: #16a34a; }
.acct-tile.warn .acct-tile-val { color: #d97706; }
.acct-tile.bad  .acct-tile-val { color: #ef4444; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <div class="dash-greeting">
            Good <?php echo e(now()->hour < 12 ? 'morning' : (now()->hour < 17 ? 'afternoon' : 'evening')); ?>, <?php echo e($parent->name); ?> 👋
        </div>
        <div class="dash-date"><?php echo e(now()->format('l, d F Y')); ?></div>
    </div>
    <a href="<?php echo e(route('parent.documents')); ?>" class="btn btn-sm rounded-pill px-3"
       style="background:#f0f9ff;color:#0077B6;border:1.5px solid #bae6fd;font-weight:600;font-size:.8rem;">
        <i class="fas fa-folder-open me-1"></i> My Documents
    </a>
</div>


<?php if(isset($attentionItems) && $attentionItems->count()): ?>
<div class="mb-4">
    <div class="micro-label"><i class="fas fa-bell me-1"></i> Needs Your Attention</div>
    <?php $__currentLoopData = $attentionItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="attn-strip <?php echo e($item['type']); ?>">
        <div class="attn-inner">
            <div class="attn-icon"><i class="fas <?php echo e($item['icon']); ?>"></i></div>
            <div class="attn-body">
                <div class="attn-title"><?php echo e($item['title']); ?></div>
                <div class="attn-msg"><?php echo e($item['message']); ?></div>
            </div>
            <?php if(!empty($item['action'])): ?>
            <a href="<?php echo e($item['action']); ?>" class="attn-btn">
                <?php echo e($item['action_label'] ?? 'View'); ?> <i class="fas fa-arrow-right ms-1" style="font-size:.65rem;"></i>
            </a>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>


<div class="micro-label"><i class="fas fa-child me-1"></i> My Children</div>
<?php if($children->count()): ?>
<div class="row g-3 mb-4">
    <?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $stColors = [
            'approved'     => ['#dcfce7','#16a34a'],
            'pending'      => ['#fff7ed','#d97706'],
            'under_review' => ['#f5f3ff','#7c3aed'],
            'waitlist'     => ['#f3f4f6','#6c757d'],
            'rejected'     => ['#fee2e2','#ef4444'],
        ];
        [$stBg,$stC] = $stColors[$child['status']] ?? ['#f3f4f6','#6c757d'];
    ?>
    <div class="col-md-6">
        <div class="child-panel">
            <div class="child-panel-top">
                <div class="d-flex align-items-center gap-3">
                    <div class="child-avatar"><?php echo e(strtoupper(substr($child['name'], 0, 1))); ?></div>
                    <div class="flex-grow-1 min-w-0">
                        <div class="child-name"><?php echo e($child['name']); ?></div>
                        <div class="child-prog"><?php echo e($child['program']); ?> &bull; <?php echo e($child['gender']); ?><?php echo e($child['dob'] !== '—' ? ' &bull; ' . $child['dob'] : ''); ?></div>
                    </div>
                    <span class="badge rounded-pill px-3 py-2"
                          style="background:<?php echo e($stBg); ?>;color:<?php echo e($stC); ?>;font-weight:700;font-size:.69rem;white-space:nowrap;">
                        <?php echo e($child['status_label']); ?>

                    </span>
                </div>
            </div>
            <div class="child-panel-stats">
                <div class="child-stat">
                    <div class="child-stat-val"><?php echo e($child['age_years'] !== null ? $child['age_years'] : '—'); ?></div>
                    <div class="child-stat-lbl">Age (yrs)</div>
                </div>
                <div class="child-stat">
                    <div class="child-stat-val" style="font-size:.85rem;"><?php echo e($child['fee_option']); ?></div>
                    <div class="child-stat-lbl">Fee Plan</div>
                </div>
                <div class="child-stat">
                    <div class="child-stat-val" style="font-size:.85rem;"><?php echo e($child['start_date'] ?? '—'); ?></div>
                    <div class="child-stat-lbl">Start Date</div>
                </div>
            </div>
            <div class="child-panel-footer">
                <span style="font-size:.76rem;color:#94a3b8;">
                    <i class="fas fa-calendar-check me-1"></i> Since <?php echo e($child['enrolled_date']); ?>

                </span>
                <a href="<?php echo e(route('parent.children.show', $child['id'])); ?>"
                   class="btn btn-sm rounded-pill px-3"
                   style="background:#f0f9ff;color:#0077B6;border:1.5px solid #bae6fd;font-weight:600;font-size:.77rem;">
                    View Profile <i class="fas fa-arrow-right ms-1" style="font-size:.65rem;"></i>
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php else: ?>
<div class="panel mb-4">
    <div class="panel-body text-center py-5">
        <div style="width:56px;height:56px;background:#f0f9ff;border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
            <i class="fas fa-child fa-xl" style="color:#bae6fd;"></i>
        </div>
        <div style="font-weight:700;color:#1a1f2e;margin-bottom:6px;">No children enrolled yet</div>
        <p class="text-muted mb-0" style="font-size:.84rem;">Your children will appear here once an application is submitted and approved.</p>
    </div>
</div>
<?php endif; ?>


<div class="micro-label"><i class="fas fa-wallet me-1"></i> Account Summary</div>
<div class="panel mb-2">
    <div class="panel-header">
        <h6>Billing Overview</h6>
        <a href="<?php echo e(route('parent.fees.statements')); ?>"
           style="font-size:.78rem;font-weight:600;color:#0077B6;text-decoration:none;">
            Full Statement <i class="fas fa-arrow-right ms-1" style="font-size:.65rem;"></i>
        </a>
    </div>
    <div class="acct-stats">
        <div class="acct-tile">
            <div class="acct-tile-val">R <?php echo e(number_format($accountSummary['monthly_fee'], 2)); ?></div>
            <div class="acct-tile-lbl">Monthly Fees</div>
            <div class="acct-tile-sub">Current plan</div>
        </div>
        <div class="acct-divider"></div>
        <div class="acct-tile good">
            <div class="acct-tile-val">R <?php echo e(number_format($accountSummary['last_payment'], 2)); ?></div>
            <div class="acct-tile-lbl">Last Payment</div>
            <div class="acct-tile-sub"><?php echo e($accountSummary['last_payment_date'] ?? '—'); ?></div>
        </div>
        <div class="acct-divider"></div>
        <div class="acct-tile <?php echo e($accountSummary['balance'] > 0 ? 'bad' : 'good'); ?>">
            <div class="acct-tile-val">R <?php echo e(number_format($accountSummary['balance'], 2)); ?></div>
            <div class="acct-tile-lbl">Balance</div>
            <div class="acct-tile-sub"><?php echo e($accountSummary['balance'] > 0 ? 'Outstanding' : 'Up to date'); ?></div>
        </div>
        <div class="acct-divider"></div>
        <div class="acct-tile <?php echo e(isset($accountSummary['next_due_days']) && $accountSummary['next_due_days'] <= 7 ? 'warn' : ''); ?>">
            <div class="acct-tile-val" style="font-size:1rem;"><?php echo e($accountSummary['next_due']); ?></div>
            <div class="acct-tile-lbl">Next Due</div>
            <div class="acct-tile-sub">
                <?php if(isset($accountSummary['next_due_days']) && $accountSummary['next_due_days'] >= 0): ?>
                    in <?php echo e($accountSummary['next_due_days']); ?> day(s)
                <?php else: ?>
                    &mdash;
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div style="padding: 14px 22px; border-top: 1px solid #f3f4f6; display:flex; gap:10px;">
        <a href="<?php echo e(route('parent.fees.statements')); ?>"
           class="btn btn-sm rounded-pill px-4"
           style="background:#0077B6;color:#fff;font-weight:600;font-size:.8rem;border:none;">
            <i class="fas fa-download me-2"></i>View Statement
        </a>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/parent/dashboard.blade.php ENDPATH**/ ?>