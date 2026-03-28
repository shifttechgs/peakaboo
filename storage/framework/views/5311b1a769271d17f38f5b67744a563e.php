<?php $__env->startSection('title', 'Payment Statements'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <div style="font-size:1.1rem;font-weight:800;color:#1a1f2e;">Payment Statements</div>
        <div style="font-size:.82rem;color:#94a3b8;margin-top:2px;">All verified payments — full ledger</div>
    </div>
    <a href="<?php echo e(route('admin.payments.index')); ?>" class="btn btn-sm rounded-pill px-3"
       style="background:#f0f9ff;color:#0077B6;border:1.5px solid #bae6fd;font-weight:600;font-size:.8rem;">
        <i class="fas fa-arrow-left me-1"></i> Back to Payments
    </a>
</div>

<div style="background:#fff;border-radius:14px;border:1px solid #f0f0f0;box-shadow:0 1px 6px rgba(0,0,0,.05);overflow:hidden;">
    <?php if($payments->isEmpty()): ?>
    <div style="padding:48px 24px;text-align:center;">
        <div style="font-size:.84rem;color:#94a3b8;">No verified payments yet.</div>
    </div>
    <?php else: ?>
    <table class="table mb-0" style="font-size:.84rem;">
        <thead>
            <tr style="background:#fafafa;">
                <th style="padding:11px 20px;font-size:.67rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#adb5bd;border-bottom:1px solid #f0f0f0;border-top:none;">Date</th>
                <th style="padding:11px 20px;font-size:.67rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#adb5bd;border-bottom:1px solid #f0f0f0;border-top:none;">Child</th>
                <th style="padding:11px 20px;font-size:.67rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#adb5bd;border-bottom:1px solid #f0f0f0;border-top:none;">Parent</th>
                <th style="padding:11px 20px;font-size:.67rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#adb5bd;border-bottom:1px solid #f0f0f0;border-top:none;">Reference</th>
                <th style="padding:11px 20px;font-size:.67rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#adb5bd;border-bottom:1px solid #f0f0f0;border-top:none;" class="text-end">Amount</th>
                <th style="padding:11px 20px;font-size:.67rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#adb5bd;border-bottom:1px solid #f0f0f0;border-top:none;">Verified By</th>
                <th style="padding:11px 20px;font-size:.67rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#adb5bd;border-bottom:1px solid #f0f0f0;border-top:none;">POP</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f9fafb;color:#64748b;white-space:nowrap;"><?php echo e($pmt->payment_date->format('d M Y')); ?></td>
                <td style="padding:12px 20px;border-bottom:1px solid #f9fafb;">
                    <div style="font-weight:700;color:#1a1f2e;"><?php echo e($pmt->child?->name ?? $pmt->application?->child_name ?? '—'); ?></div>
                    <code style="font-size:.72rem;color:#0077B6;"><?php echo e($pmt->child?->child_number ?? '—'); ?></code>
                </td>
                <td style="padding:12px 20px;border-bottom:1px solid #f9fafb;color:#374151;"><?php echo e($pmt->parentUser?->name ?? '—'); ?></td>
                <td style="padding:12px 20px;border-bottom:1px solid #f9fafb;">
                    <code style="font-size:.78rem;color:#64748b;"><?php echo e($pmt->reference); ?></code>
                </td>
                <td style="padding:12px 20px;border-bottom:1px solid #f9fafb;" class="text-end">
                    <span style="font-weight:700;color:#16a34a;">R <?php echo e(number_format($pmt->amount, 2)); ?></span>
                </td>
                <td style="padding:12px 20px;border-bottom:1px solid #f9fafb;font-size:.78rem;color:#64748b;">
                    <?php echo e($pmt->verifiedBy?->name ?? '—'); ?><br>
                    <span style="color:#adb5bd;"><?php echo e($pmt->verified_at?->format('d M Y H:i')); ?></span>
                </td>
                <td style="padding:12px 20px;border-bottom:1px solid #f9fafb;">
                    <?php if($pmt->pop_path): ?>
                        <a href="<?php echo e(Storage::disk('public')->url($pmt->pop_path)); ?>" target="_blank"
                           style="font-size:.74rem;font-weight:600;color:#0077B6;text-decoration:none;">
                            <i class="fas fa-file me-1"></i> View
                        </a>
                    <?php else: ?>
                        <span style="font-size:.74rem;color:#d1d5db;">Manual</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-end" style="padding:12px 20px;font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;color:#94a3b8;background:#f8faff;border-top:2px solid #e0eeff;">
                    Total Verified
                </td>
                <td class="text-end" style="padding:12px 20px;background:#f8faff;border-top:2px solid #e0eeff;">
                    <span style="font-size:1rem;font-weight:800;color:#16a34a;">
                        R <?php echo e(number_format($payments->sum('amount'), 2)); ?>

                    </span>
                </td>
                <td colspan="2" style="background:#f8faff;border-top:2px solid #e0eeff;"></td>
            </tr>
        </tfoot>
    </table>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/admin/payments/statements.blade.php ENDPATH**/ ?>