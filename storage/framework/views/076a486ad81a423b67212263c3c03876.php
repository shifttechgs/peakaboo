<?php $__env->startSection('title', 'Attendance Report'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 style="font-size:1.35rem;font-weight:800;color:#1a1f2e;margin:0 0 4px;">
            <i class="fas fa-clipboard-check me-2" style="color:#0097a7;font-size:1.1rem;"></i>Attendance Report
        </h4>
        <p style="font-size:.86rem;color:#6c757d;margin:0;">Daily attendance patterns, absenteeism and class occupancy</p>
    </div>
    <a href="<?php echo e(route('admin.reports.index')); ?>"
       class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
        <i class="fas fa-arrow-left me-1"></i>Back to Reports
    </a>
</div>
<div style="background:#fff;border-radius:16px;border:1px solid #f0f0f0;box-shadow:0 1px 8px rgba(0,0,0,.07);padding:48px;text-align:center;">
    <div style="width:64px;height:64px;border-radius:16px;background:#e0f7fa;color:#0097a7;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin:0 auto 20px;">
        <i class="fas fa-tools"></i>
    </div>
    <h5 style="font-weight:800;color:#1a1f2e;margin-bottom:8px;">Coming Soon</h5>
    <p style="color:#94a3b8;font-size:.86rem;margin-bottom:24px;">The detailed attendance report is under construction.<br>Daily register and class occupancy tracking coming soon.</p>
    <a href="<?php echo e(route('admin.reports.index')); ?>"
       class="btn btn-sm rounded-pill px-4 text-white" style="background:#0097a7;">
        <i class="fas fa-chart-bar me-1"></i>Back to Analytics
    </a>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/admin/reports/attendance.blade.php ENDPATH**/ ?>