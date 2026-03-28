<?php $__env->startSection('title', 'Payment Report'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.rpt-panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.07);
    border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 24px;
}
.rpt-panel-header {
    padding: 15px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.rpt-panel-header h6 { margin: 0; font-weight: 700; font-size: .88rem; color: #1a1f2e; }
.rpt-panel-body { padding: 22px; }

/* Stat tiles */
.rpt-stat-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 16px; margin-bottom: 24px; }
.rpt-stat {
    background: #fff; border-radius: 14px; border: 1px solid #f0f0f0;
    box-shadow: 0 1px 6px rgba(0,0,0,.06); padding: 18px 20px;
}
.rpt-stat-val { font-size: 1.05rem; font-weight: 800; color: #1a1f2e; line-height: 1; white-space: nowrap; }
.rpt-stat-lbl { font-size: .67rem; font-weight: 700; text-transform: uppercase; letter-spacing: .5px; color: #adb5bd; margin-top: 5px; }
.rpt-stat-sub { font-size: .74rem; color: #94a3b8; margin-top: 3px; }

/* Bar chart */
.bar-chart { display: flex; align-items: flex-end; gap: 6px; height: 130px; padding-bottom: 4px; }
.bar-wrap { flex: 1; display: flex; flex-direction: column; align-items: center; gap: 4px; height: 100%; justify-content: flex-end; }
.bar { width: 100%; border-radius: 5px 5px 0 0; min-height: 3px; transition: opacity .15s; }
.bar:hover { opacity: .8; }
.bar-lbl { font-size: .6rem; color: #adb5bd; white-space: nowrap; }
.bar-val { font-size: .6rem; font-weight: 700; color: #374151; }

/* Table */
.rpt-table { width: 100%; border-collapse: collapse; font-size: .82rem; }
.rpt-table th { padding: 10px 14px; text-align: left; font-size: .67rem; font-weight: 700; text-transform: uppercase; letter-spacing: .5px; color: #adb5bd; border-bottom: 2px solid #f3f4f6; white-space: nowrap; }
.rpt-table td { padding: 11px 14px; border-bottom: 1px solid #f8f9fa; color: #374151; vertical-align: middle; }
.rpt-table tr:last-child td { border-bottom: none; }
.rpt-table tr:hover td { background: #fafafa; }

/* Outstanding row */
.outstanding-row {
    display: flex; align-items: center; justify-content: space-between;
    padding: 10px 0; border-bottom: 1px solid #f8f9fa;
}
.outstanding-row:last-child { border-bottom: none; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-chart-line me-2" style="color:#16a34a;font-size:1.1rem;"></i>Payment Report
        </h4>
        <p style="font-size:.84rem;color:#94a3b8;margin:0;">Revenue overview, outstanding fees and payment trends &mdash; <?php echo e(now()->format('F Y')); ?></p>
    </div>
    <div class="d-flex gap-2">
        <a href="<?php echo e(route('admin.payments.index')); ?>"
           class="btn btn-sm rounded-pill px-3" style="background:#dcfce7;color:#16a34a;border:1px solid #86efac;font-size:.8rem;">
            <i class="fas fa-check-circle me-1"></i>Verify POPs
        </a>
        <a href="<?php echo e(route('admin.reports.index')); ?>"
           class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;font-size:.8rem;">
            <i class="fas fa-arrow-left me-1"></i>Back
        </a>
    </div>
</div>


<div class="rpt-stat-grid">
    <div class="rpt-stat">
        <div class="rpt-stat-val" style="color:#16a34a;">R <?php echo e(number_format($verifiedThisMonth, 2)); ?></div>
        <div class="rpt-stat-lbl">Collected This Month</div>
        <div class="rpt-stat-sub">Verified payments only</div>
    </div>
    <div class="rpt-stat">
        <div class="rpt-stat-val" style="color:<?php echo e($outstandingThisMonth > 0 ? '#ef4444' : '#16a34a'); ?>;">R <?php echo e(number_format($outstandingThisMonth, 2)); ?></div>
        <div class="rpt-stat-lbl">Outstanding This Month</div>
        <div class="rpt-stat-sub">Of R <?php echo e(number_format($monthlyExpected, 2)); ?> expected</div>
    </div>
    <div class="rpt-stat">
        <div class="rpt-stat-val">R <?php echo e(number_format($verifiedAllTime, 2)); ?></div>
        <div class="rpt-stat-lbl">Total Collected</div>
        <div class="rpt-stat-sub">All time, verified</div>
    </div>
    <div class="rpt-stat">
        <div class="rpt-stat-val" style="color:<?php echo e($pendingCount > 0 ? '#d97706' : '#16a34a'); ?>;"><?php echo e($pendingCount); ?></div>
        <div class="rpt-stat-lbl">Pending POPs</div>
        <div class="rpt-stat-sub">Awaiting verification</div>
    </div>
    <div class="rpt-stat">
        <div class="rpt-stat-val" style="color:#6c757d;"><?php echo e($outstandingParents->count()); ?></div>
        <div class="rpt-stat-lbl">Parents Not Paid</div>
        <div class="rpt-stat-sub"><?php echo e(now()->format('F Y')); ?></div>
    </div>
    <div class="rpt-stat">
        <div class="rpt-stat-val" style="color:#ef4444;"><?php echo e($rejectedCount); ?></div>
        <div class="rpt-stat-lbl">Rejected POPs</div>
        <div class="rpt-stat-sub">All time</div>
    </div>
</div>

<div class="row g-4">
<div class="col-lg-8">

    
    <div class="rpt-panel">
        <div class="rpt-panel-header">
            <h6><i class="fas fa-chart-bar me-2" style="color:#16a34a;"></i>Monthly Revenue — Last 12 Months</h6>
        </div>
        <div class="rpt-panel-body">
            <?php $maxRev = max(1, $revenueTrend->max()); ?>
            <div class="bar-chart">
                <?php $__currentLoopData = $revenueTrend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $pct = round(($amount / $maxRev) * 100); ?>
                <div class="bar-wrap" title="<?php echo e(\Carbon\Carbon::createFromFormat('Y-m', $month)->format('M Y')); ?>: R<?php echo e(number_format($amount)); ?>">
                    <?php if($amount > 0): ?><div class="bar-val">R<?php echo e(number_format($amount / 1000, 1)); ?>k</div><?php endif; ?>
                    <div class="bar" style="height:<?php echo e(max(4, $pct)); ?>%;background:<?php echo e($month === $currentMonth ? '#16a34a' : '#86efac'); ?>;"></div>
                    <div class="bar-lbl"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m', $month)->format('M')); ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div style="margin-top:12px;padding-top:12px;border-top:1px solid #f3f4f6;display:flex;gap:24px;font-size:.76rem;color:#94a3b8;">
                <span><span style="display:inline-block;width:10px;height:10px;border-radius:3px;background:#16a34a;margin-right:5px;"></span>Current month</span>
                <span><span style="display:inline-block;width:10px;height:10px;border-radius:3px;background:#86efac;margin-right:5px;"></span>Previous months</span>
            </div>
        </div>
    </div>

    
    <div class="rpt-panel">
        <div class="rpt-panel-header">
            <h6><i class="fas fa-check-circle me-2" style="color:#16a34a;"></i>Recent Verified Payments</h6>
            <a href="<?php echo e(route('admin.payments.statements')); ?>" style="font-size:.76rem;color:#0077B6;text-decoration:none;">View all</a>
        </div>
        <div style="overflow-x:auto;">
            <table class="rpt-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Parent</th>
                        <th>Reference</th>
                        <th>Month</th>
                        <th style="text-align:right;">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $recentPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td style="color:#94a3b8;"><?php echo e($pmt->payment_date->format('d M Y')); ?></td>
                        <td style="font-weight:600;color:#1a1f2e;"><?php echo e($pmt->parentUser?->name ?? '—'); ?></td>
                        <td><code style="font-size:.75rem;color:#0077B6;"><?php echo e($pmt->reference); ?></code></td>
                        <td style="color:#6c757d;"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m', $pmt->month_year)->format('M Y')); ?></td>
                        <td style="text-align:right;font-weight:700;color:#16a34a;">R <?php echo e(number_format($pmt->amount, 2)); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" style="text-align:center;color:#94a3b8;padding:24px;">No verified payments yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if($recentPayments->hasPages()): ?>
        <div style="padding:14px 20px;border-top:1px solid #f3f4f6;background:#fafafa;">
            <?php echo e($recentPayments->links()); ?>

        </div>
        <?php endif; ?>
    </div>

</div>
<div class="col-lg-4">

    
    <div class="rpt-panel">
        <div class="rpt-panel-header">
            <h6><i class="fas fa-calendar-check me-2" style="color:#16a34a;"></i><?php echo e(now()->format('F Y')); ?> Summary</h6>
        </div>
        <div class="rpt-panel-body">
            <?php
                $collectedPct = $monthlyExpected > 0 ? round($verifiedThisMonth / $monthlyExpected * 100) : 0;
            ?>
            <div style="margin-bottom:16px;">
                <div style="display:flex;justify-content:space-between;margin-bottom:6px;">
                    <span style="font-size:.78rem;font-weight:600;color:#374151;">Collection rate</span>
                    <span style="font-size:.78rem;font-weight:800;color:<?php echo e($collectedPct >= 80 ? '#16a34a' : ($collectedPct >= 50 ? '#d97706' : '#ef4444')); ?>;"><?php echo e($collectedPct); ?>%</span>
                </div>
                <div style="height:10px;background:#f3f4f6;border-radius:5px;overflow:hidden;">
                    <div style="height:100%;width:<?php echo e($collectedPct); ?>%;background:<?php echo e($collectedPct >= 80 ? '#16a34a' : ($collectedPct >= 50 ? '#d97706' : '#ef4444')); ?>;border-radius:5px;transition:width .3s;"></div>
                </div>
                <div style="display:flex;justify-content:space-between;margin-top:6px;font-size:.72rem;color:#94a3b8;">
                    <span>R <?php echo e(number_format($verifiedThisMonth, 2)); ?> collected</span>
                    <span>R <?php echo e(number_format($monthlyExpected, 2)); ?> expected</span>
                </div>
            </div>
            <div style="background:#f8faff;border-radius:10px;padding:14px;">
                <div style="display:flex;justify-content:space-between;margin-bottom:8px;">
                    <span style="font-size:.78rem;color:#6c757d;">Expected</span>
                    <span style="font-size:.8rem;font-weight:700;color:#1a1f2e;">R <?php echo e(number_format($monthlyExpected, 2)); ?></span>
                </div>
                <div style="display:flex;justify-content:space-between;margin-bottom:8px;">
                    <span style="font-size:.78rem;color:#6c757d;">Collected</span>
                    <span style="font-size:.8rem;font-weight:700;color:#16a34a;">R <?php echo e(number_format($verifiedThisMonth, 2)); ?></span>
                </div>
                <div style="display:flex;justify-content:space-between;padding-top:8px;border-top:1px solid #e5e7eb;">
                    <span style="font-size:.78rem;color:#6c757d;">Outstanding</span>
                    <span style="font-size:.8rem;font-weight:800;color:<?php echo e($outstandingThisMonth > 0 ? '#ef4444' : '#16a34a'); ?>;">R <?php echo e(number_format($outstandingThisMonth, 2)); ?></span>
                </div>
            </div>
        </div>
    </div>

    
    <div class="rpt-panel">
        <div class="rpt-panel-header">
            <h6><i class="fas fa-exclamation-circle me-2" style="color:#ef4444;"></i>Outstanding — <?php echo e(now()->format('M Y')); ?></h6>
            <span style="font-size:.72rem;font-weight:700;color:#ef4444;"><?php echo e($outstandingParents->count()); ?> parent<?php echo e($outstandingParents->count() === 1 ? '' : 's'); ?></span>
        </div>
        <div class="rpt-panel-body" style="padding:12px 22px;">
            <?php $__empty_1 = true; $__currentLoopData = $outstandingParents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="outstanding-row">
                <div>
                    <div style="font-size:.82rem;font-weight:600;color:#1a1f2e;"><?php echo e($app->parentUser?->name ?? $app->mother_name); ?></div>
                    <div style="font-size:.72rem;color:#94a3b8;"><?php echo e($app->child_name); ?></div>
                </div>
                <?php if($app->parentUser): ?>
                <a href="mailto:<?php echo e($app->parentUser->email); ?>"
                   style="font-size:.72rem;font-weight:600;color:#0077B6;text-decoration:none;">
                    <i class="fas fa-envelope"></i>
                </a>
                <?php endif; ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p style="font-size:.82rem;color:#16a34a;margin:8px 0;font-weight:600;">
                <i class="fas fa-check-circle me-1"></i>All parents have paid this month.
            </p>
            <?php endif; ?>
        </div>
        <?php if($outstandingParents->count() > 0): ?>
        <div style="padding:0 22px 16px;">
            <a href="<?php echo e(route('admin.payments.outstanding')); ?>"
               class="btn btn-sm rounded-pill px-3 w-100" style="background:#fee2e2;color:#ef4444;border:none;font-size:.78rem;font-weight:600;">
                <i class="fas fa-list me-1"></i>View Full Outstanding List
            </a>
        </div>
        <?php endif; ?>
    </div>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/admin/reports/payments.blade.php ENDPATH**/ ?>