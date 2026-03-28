<?php $__env->startSection('title', 'Enrolment Report'); ?>

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
.rpt-stat-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 16px; margin-bottom: 24px; }
.rpt-stat {
    background: #fff; border-radius: 14px; border: 1px solid #f0f0f0;
    box-shadow: 0 1px 6px rgba(0,0,0,.06); padding: 18px 20px;
}
.rpt-stat-val { font-size: 1.8rem; font-weight: 800; color: #1a1f2e; line-height: 1; }
.rpt-stat-lbl { font-size: .67rem; font-weight: 700; text-transform: uppercase; letter-spacing: .5px; color: #adb5bd; margin-top: 5px; }
.rpt-stat-sub { font-size: .74rem; color: #94a3b8; margin-top: 3px; }

/* Bar chart */
.bar-chart { display: flex; align-items: flex-end; gap: 6px; height: 120px; padding-bottom: 4px; }
.bar-wrap { flex: 1; display: flex; flex-direction: column; align-items: center; gap: 4px; height: 100%; justify-content: flex-end; }
.bar { width: 100%; border-radius: 5px 5px 0 0; min-height: 3px; transition: opacity .15s; }
.bar:hover { opacity: .8; }
.bar-lbl { font-size: .6rem; color: #adb5bd; white-space: nowrap; }
.bar-val { font-size: .65rem; font-weight: 700; color: #374151; }

/* Progress rows */
.prog-row { display: flex; align-items: center; gap: 12px; margin-bottom: 12px; }
.prog-row:last-child { margin-bottom: 0; }
.prog-label { font-size: .82rem; font-weight: 600; color: #374151; min-width: 140px; flex-shrink: 0; }
.prog-bar-wrap { flex: 1; height: 8px; background: #f3f4f6; border-radius: 4px; overflow: hidden; }
.prog-bar { height: 100%; border-radius: 4px; }
.prog-count { font-size: .78rem; font-weight: 700; color: #374151; min-width: 32px; text-align: right; flex-shrink: 0; }

/* Table */
.rpt-table { width: 100%; border-collapse: collapse; font-size: .82rem; }
.rpt-table th { padding: 10px 14px; text-align: left; font-size: .67rem; font-weight: 700; text-transform: uppercase; letter-spacing: .5px; color: #adb5bd; border-bottom: 2px solid #f3f4f6; white-space: nowrap; }
.rpt-table td { padding: 11px 14px; border-bottom: 1px solid #f8f9fa; color: #374151; vertical-align: middle; }
.rpt-table tr:last-child td { border-bottom: none; }
.rpt-table tr:hover td { background: #fafafa; }
.rpt-pill { font-size: .68rem; font-weight: 700; border-radius: 20px; padding: 3px 9px; display: inline-block; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-user-graduate me-2" style="color:#7c3aed;font-size:1.1rem;"></i>Enrolment Report
        </h4>
        <p style="font-size:.84rem;color:#94a3b8;margin:0;">Applications, approvals, rejections and programme breakdown</p>
    </div>
    <div class="d-flex gap-2">
        <a href="<?php echo e(route('admin.admissions.index')); ?>"
           class="btn btn-sm rounded-pill px-3" style="background:#f5f3ff;color:#7c3aed;border:1px solid #e9d5ff;font-size:.8rem;">
            <i class="fas fa-list me-1"></i>All Applications
        </a>
        <a href="<?php echo e(route('admin.reports.index')); ?>"
           class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;font-size:.8rem;">
            <i class="fas fa-arrow-left me-1"></i>Back
        </a>
    </div>
</div>


<?php
    $total     = $statusCounts->total ?? 0;
    $approved  = $statusCounts->approved ?? 0;
    $pending   = ($statusCounts->pending ?? 0) + ($statusCounts->under_review ?? 0);
    $waitlist  = $statusCounts->waitlist ?? 0;
    $rejected  = $statusCounts->rejected ?? 0;
    $monthDiff = $thisMonth - $lastMonth;
?>
<div class="rpt-stat-grid">
    <div class="rpt-stat">
        <div class="rpt-stat-val"><?php echo e($total); ?></div>
        <div class="rpt-stat-lbl">Total Applications</div>
        <div class="rpt-stat-sub">All time</div>
    </div>
    <div class="rpt-stat">
        <div class="rpt-stat-val" style="color:#16a34a;"><?php echo e($approved); ?></div>
        <div class="rpt-stat-lbl">Approved</div>
        <div class="rpt-stat-sub"><?php echo e($total > 0 ? round($approved / $total * 100) : 0); ?>% approval rate</div>
    </div>
    <div class="rpt-stat">
        <div class="rpt-stat-val" style="color:#d97706;"><?php echo e($pending); ?></div>
        <div class="rpt-stat-lbl">Actionable</div>
        <div class="rpt-stat-sub">Pending + under review</div>
    </div>
    <div class="rpt-stat">
        <div class="rpt-stat-val" style="color:#6c757d;"><?php echo e($waitlist); ?></div>
        <div class="rpt-stat-lbl">Waitlist</div>
        <div class="rpt-stat-sub">Awaiting capacity</div>
    </div>
    <div class="rpt-stat">
        <div class="rpt-stat-val" style="color:#ef4444;"><?php echo e($rejected); ?></div>
        <div class="rpt-stat-lbl">Rejected</div>
        <div class="rpt-stat-sub"><?php echo e($total > 0 ? round($rejected / $total * 100) : 0); ?>% rejection rate</div>
    </div>
    <div class="rpt-stat">
        <div class="rpt-stat-val"><?php echo e($thisMonth); ?></div>
        <div class="rpt-stat-lbl">This Month</div>
        <div class="rpt-stat-sub" style="color:<?php echo e($monthDiff >= 0 ? '#16a34a' : '#ef4444'); ?>;">
            <?php echo e($monthDiff >= 0 ? '+' : ''); ?><?php echo e($monthDiff); ?> vs last month
        </div>
    </div>
    <?php if($avgDaysToApproval): ?>
    <div class="rpt-stat">
        <div class="rpt-stat-val"><?php echo e(round($avgDaysToApproval)); ?></div>
        <div class="rpt-stat-lbl">Avg Days to Approve</div>
        <div class="rpt-stat-sub">From submission</div>
    </div>
    <?php endif; ?>
</div>

<div class="row g-4">
<div class="col-lg-8">

    
    <div class="rpt-panel">
        <div class="rpt-panel-header">
            <h6><i class="fas fa-chart-bar me-2" style="color:#7c3aed;"></i>Monthly Applications — Last 12 Months</h6>
        </div>
        <div class="rpt-panel-body">
            <?php $maxBar = max(1, $trend->max()); ?>
            <div class="bar-chart">
                <?php $__currentLoopData = $trend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $pct = round(($count / $maxBar) * 100); ?>
                <div class="bar-wrap" title="<?php echo e(\Carbon\Carbon::createFromFormat('Y-m', $month)->format('M Y')); ?>: <?php echo e($count); ?>">
                    <?php if($count > 0): ?><div class="bar-val"><?php echo e($count); ?></div><?php endif; ?>
                    <div class="bar" style="height:<?php echo e(max(4, $pct)); ?>%;background:<?php echo e($month === now()->format('Y-m') ? '#7c3aed' : '#e9d5ff'); ?>;"></div>
                    <div class="bar-lbl"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m', $month)->format('M')); ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    
    <div class="rpt-panel">
        <div class="rpt-panel-header">
            <h6><i class="fas fa-clock me-2" style="color:#7c3aed;"></i>Recent Applications</h6>
            <a href="<?php echo e(route('admin.admissions.index')); ?>" style="font-size:.76rem;color:#0077B6;text-decoration:none;">View all</a>
        </div>
        <div style="overflow-x:auto;">
            <table class="rpt-table">
                <thead>
                    <tr>
                        <th>Reference</th>
                        <th>Child</th>
                        <th>Programme</th>
                        <th>Status</th>
                        <th>Submitted</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $recentApps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $stColors = ['approved'=>['#dcfce7','#16a34a'],'rejected'=>['#fee2e2','#ef4444'],'pending'=>['#fff7ed','#d97706'],'under_review'=>['#f5f3ff','#7c3aed'],'waitlist'=>['#f3f4f6','#6c757d']];
                        [$stBg,$stC] = $stColors[$app->status] ?? ['#f3f4f6','#6c757d'];
                    ?>
                    <tr>
                        <td><a href="<?php echo e(route('admin.admissions.show', $app->id)); ?>" style="color:#0077B6;text-decoration:none;font-weight:600;font-size:.78rem;"><code><?php echo e($app->reference); ?></code></a></td>
                        <td style="font-weight:600;color:#1a1f2e;"><?php echo e($app->child_name); ?></td>
                        <td style="color:#6c757d;"><?php echo e($app->program_name ?? '—'); ?></td>
                        <td><span class="rpt-pill" style="background:<?php echo e($stBg); ?>;color:<?php echo e($stC); ?>;"><?php echo e($app->statusLabel()); ?></span></td>
                        <td style="color:#94a3b8;"><?php echo e($app->created_at->format('d M Y')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" style="text-align:center;color:#94a3b8;padding:24px;">No applications yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if($recentApps->hasPages()): ?>
        <div style="padding:14px 20px;border-top:1px solid #f3f4f6;background:#fafafa;">
            <?php echo e($recentApps->links()); ?>

        </div>
        <?php endif; ?>
    </div>

</div>
<div class="col-lg-4">

    
    <div class="rpt-panel">
        <div class="rpt-panel-header">
            <h6><i class="fas fa-tag me-2" style="color:#7c3aed;"></i>Status Breakdown</h6>
        </div>
        <div class="rpt-panel-body">
            <?php
                $statuses = [
                    'Approved'     => [$approved,  '#16a34a'],
                    'Under Review' => [$pending,   '#7c3aed'],
                    'Waitlist'     => [$waitlist,  '#6c757d'],
                    'Rejected'     => [$rejected,  '#ef4444'],
                ];
            ?>
            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => [$count, $colour]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="prog-row">
                <div class="prog-label"><?php echo e($label); ?></div>
                <div class="prog-bar-wrap">
                    <div class="prog-bar" style="width:<?php echo e($total > 0 ? round($count/$total*100) : 0); ?>%;background:<?php echo e($colour); ?>;"></div>
                </div>
                <div class="prog-count"><?php echo e($count); ?></div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <div class="rpt-panel">
        <div class="rpt-panel-header">
            <h6><i class="fas fa-graduation-cap me-2" style="color:#7c3aed;"></i>By Programme</h6>
        </div>
        <div class="rpt-panel-body">
            <?php
                $progColors = ['Baby Room (0–1)'=>'#f472b6','Toddlers (1–3)'=>'#fb923c','Preschool (3–4)'=>'#60a5fa','Grade R (5–6)'=>'#34d399'];
                $progMax = max(1, $byProgram->max());
            ?>
            <?php $__empty_1 = true; $__currentLoopData = $byProgram; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prog => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="prog-row">
                <div class="prog-label" style="font-size:.78rem;"><?php echo e($prog); ?></div>
                <div class="prog-bar-wrap">
                    <div class="prog-bar" style="width:<?php echo e(round($count/$progMax*100)); ?>%;background:<?php echo e($progColors[$prog] ?? '#7c3aed'); ?>;"></div>
                </div>
                <div class="prog-count"><?php echo e($count); ?></div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p style="font-size:.82rem;color:#94a3b8;margin:0;">No data yet.</p>
            <?php endif; ?>
        </div>
    </div>

    
    <?php if($bySource->count()): ?>
    <div class="rpt-panel">
        <div class="rpt-panel-header">
            <h6><i class="fas fa-share-alt me-2" style="color:#7c3aed;"></i>Lead Source (converted)</h6>
        </div>
        <div class="rpt-panel-body">
            <?php
                $srcColors = ['google'=>'#ef4444','facebook'=>'#3b82f6','instagram'=>'#d97706','referral'=>'#16a34a','other'=>'#6c757d'];
                $srcMax = max(1, $bySource->max());
            ?>
            <?php $__currentLoopData = $bySource; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $src => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="prog-row">
                <div class="prog-label" style="font-size:.78rem;"><?php echo e(ucfirst($src)); ?></div>
                <div class="prog-bar-wrap">
                    <div class="prog-bar" style="width:<?php echo e(round($count/$srcMax*100)); ?>%;background:<?php echo e($srcColors[$src] ?? '#6c757d'); ?>;"></div>
                </div>
                <div class="prog-count"><?php echo e($count); ?></div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/admin/reports/enrolment.blade.php ENDPATH**/ ?>