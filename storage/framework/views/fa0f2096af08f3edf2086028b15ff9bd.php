<?php $__env->startSection('title', 'Statements'); ?>
<?php $__env->startSection('portal-name', 'Parent Portal'); ?>
<?php $__env->startSection('page-title', 'Statements'); ?>

<?php $__env->startSection('sidebar-nav'); ?>
<?php echo $__env->make('parent.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ─── Micro label ──────────────────────────────────────────────────────── */
.micro-label {
    font-size: .63rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: 1.1px; color: #adb5bd; margin-bottom: 12px;
}

/* ─── Panel ────────────────────────────────────────────────────────────── */
.panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.06);
    border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 24px;
}
.panel-header {
    padding: 15px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.panel-header h6 { margin: 0; font-weight: 700; font-size: .9rem; color: #1a1f2e; }

/* ─── Summary bar ──────────────────────────────────────────────────────── */
.summary-bar {
    background: #fff; border-radius: 16px;
    border: 1px solid #f0f0f0; box-shadow: 0 1px 8px rgba(0,0,0,.06);
    display: flex; overflow: hidden; margin-bottom: 24px;
}
.summary-tile {
    flex: 1; padding: 18px 16px 20px; text-align: center;
    border-right: 1px solid #f3f4f6;
}
.summary-tile:last-child { border-right: none; }
.st-val { font-size: 1.5rem; font-weight: 800; line-height: 1; color: #1a1f2e; }
.st-lbl { font-size: .67rem; font-weight: 600; text-transform: uppercase;
          letter-spacing: .5px; color: #94a3b8; margin-top: 5px; }
.st-sub { font-size: .68rem; color: #adb5bd; margin-top: 3px; }
.st-val.good { color: #16a34a; }
.st-val.warn { color: #d97706; }
.st-val.bad  { color: #ef4444; }

/* ─── POP upload card ──────────────────────────────────────────────────── */
.pop-card {
    border-radius: 16px; border: 2px dashed #bae6fd;
    background: #f0f9ff; padding: 32px 28px; text-align: center;
    transition: border-color .15s, background .15s;
}
.pop-card:hover { border-color: #0077B6; background: #e0f2fe; }

/* ─── Transaction table ────────────────────────────────────────────────── */
.txn-table th {
    font-size: .68rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; background: #fafafa;
    border-bottom: 1px solid #f0f0f0; padding: 11px 20px; border-top: none;
}
.txn-table td {
    padding: 12px 20px; vertical-align: middle;
    border-bottom: 1px solid #f8f8f8; font-size: .85rem; color: #374151;
}
.txn-table tbody tr:last-child td { border-bottom: none; }
.txn-table tbody tr:hover td { background: #fafcff; transition: background .1s; }
.txn-table tfoot td {
    padding: 13px 20px; background: #f8faff;
    border-top: 2px solid #e0eeff; border-bottom: none; font-size: .86rem;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <div style="font-size:1.1rem;font-weight:800;color:#1a1f2e;letter-spacing:-.2px;">Account Statement</div>
        <div style="font-size:.82rem;color:#94a3b8;margin-top:2px;">
            <?php echo e(now()->format('F Y')); ?> &mdash; balance overview & proof of payment
        </div>
    </div>
    <a href="<?php echo e(route('parent.fees')); ?>"
       class="btn btn-sm rounded-pill px-3"
       style="background:#f0f9ff;color:#0077B6;border:1.5px solid #bae6fd;font-weight:600;font-size:.8rem;">
        <i class="fas fa-arrow-left me-1"></i> Fee Schedule
    </a>
</div>


<div class="summary-bar">
    <div class="summary-tile">
        <div class="st-val">R <?php echo e(number_format($accountSummary['monthly_fee'], 0)); ?></div>
        <div class="st-lbl">Monthly Fee</div>
        <div class="st-sub">Current plan</div>
    </div>
    <div class="summary-tile">
        <div class="st-val good">R <?php echo e(number_format($accountSummary['last_payment'], 0)); ?></div>
        <div class="st-lbl">Last Payment</div>
        <div class="st-sub"><?php echo e($accountSummary['last_payment_date'] ?? '—'); ?></div>
    </div>
    <div class="summary-tile">
        <div class="st-val <?php echo e($accountSummary['balance'] > 0 ? 'bad' : 'good'); ?>">
            R <?php echo e(number_format($accountSummary['balance'], 0)); ?>

        </div>
        <div class="st-lbl">Balance</div>
        <div class="st-sub"><?php echo e($accountSummary['balance'] > 0 ? 'Outstanding' : 'Up to date'); ?></div>
    </div>
    <div class="summary-tile">
        <div class="st-val <?php echo e(isset($accountSummary['next_due_days']) && $accountSummary['next_due_days'] <= 7 ? 'warn' : ''); ?>"
             style="font-size:1rem;">
            <?php echo e($accountSummary['next_due']); ?>

        </div>
        <div class="st-lbl">Next Due</div>
        <div class="st-sub">
            <?php if(isset($accountSummary['next_due_days']) && $accountSummary['next_due_days'] >= 0): ?>
                in <?php echo e($accountSummary['next_due_days']); ?> day(s)
            <?php else: ?> &mdash; <?php endif; ?>
        </div>
    </div>
</div>


<div class="micro-label"><i class="fas fa-upload me-1"></i> Proof of Payment</div>
<div class="panel">
    <div class="panel-header">
        <h6>Upload Proof of Payment (POP)</h6>
        <span style="font-size:.74rem;color:#94a3b8;">PDF, JPG or PNG &mdash; max 5 MB</span>
    </div>
    <div style="padding:22px 24px;">
        <form method="POST" action="<?php echo e(route('parent.fees.upload-pop')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label" style="font-size:.78rem;font-weight:700;color:#374151;">Payment Amount</label>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text" style="font-weight:600;background:#f8faff;border-color:#e0eeff;color:#0077B6;">R</span>
                        <input type="number" name="amount" class="form-control form-control-sm <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               placeholder="0.00" step="0.01" min="1"
                               style="border-color:#e0eeff;"
                               value="<?php echo e(old('amount')); ?>" required>
                    </div>
                    <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback d-block" style="font-size:.74rem;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-md-3">
                    <label class="form-label" style="font-size:.78rem;font-weight:700;color:#374151;">Payment Date</label>
                    <input type="date" name="date" class="form-control form-control-sm <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           style="border-color:#e0eeff;"
                           value="<?php echo e(old('date', date('Y-m-d'))); ?>" required>
                    <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback" style="font-size:.74rem;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-md-3">
                    <label class="form-label" style="font-size:.78rem;font-weight:700;color:#374151;">Bank Reference</label>
                    <input type="text" name="reference" class="form-control form-control-sm <?php $__errorArgs = ['reference'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           placeholder="e.g. EFT-123456"
                           style="border-color:#e0eeff;font-family:monospace;"
                           value="<?php echo e(old('reference')); ?>" required>
                    <?php $__errorArgs = ['reference'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback" style="font-size:.74rem;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-md-3">
                    <label class="form-label" style="font-size:.78rem;font-weight:700;color:#374151;">POP File</label>
                    <input type="file" name="pop_file" class="form-control form-control-sm <?php $__errorArgs = ['pop_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           accept=".pdf,.jpg,.jpeg,.png"
                           style="border-color:#e0eeff;" required>
                    <?php $__errorArgs = ['pop_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback" style="font-size:.74rem;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            
            <div class="d-flex align-items-center justify-content-between mt-3 pt-3" style="border-top:1px solid #f3f4f6;">
                <div style="font-size:.76rem;color:#94a3b8;">
                    <i class="fas fa-info-circle me-1" style="color:#bae6fd;"></i>
                    Use <strong style="color:#374151;font-family:monospace;"><?php echo e($children->first()['child_number'] ?? $children->first()['reference'] ?? 'your child number'); ?></strong> as your EFT reference.
                    We'll verify and update your account within <strong style="color:#374151;">1–2 business days</strong>.
                </div>
                <button type="submit" class="btn btn-sm rounded-pill px-4 ms-3"
                        style="background:#0077B6;color:#fff;border:none;font-weight:600;font-size:.8rem;white-space:nowrap;flex-shrink:0;">
                    <i class="fas fa-upload me-1"></i> Submit POP
                </button>
            </div>
        </form>
    </div>
</div>


<div class="micro-label"><i class="fas fa-university me-1"></i> Payment Details</div>
<div class="panel">
    <div style="display:flex;flex-wrap:wrap;padding:4px 0 4px;">
        <?php $__currentLoopData = [
            ['Bank',           'First National Bank (FNB)'],
            ['Account Name',   'Peekaboo Daycare'],
            ['Account Number', '62123456789'],
            ['Branch Code',    '250655'],
            ['Reference',      $children->first()['child_number'] ?? $children->first()['reference'] ?? 'Your Child Number'],
        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$lbl, $val]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="flex:1;min-width:140px;padding:14px 22px;border-right:1px solid #f3f4f6;">
            <div style="font-size:.63rem;font-weight:800;text-transform:uppercase;letter-spacing:.8px;color:#94a3b8;margin-bottom:3px;"><?php echo e($lbl); ?></div>
            <div style="font-size:.87rem;font-weight:700;color:#<?php echo e($lbl === 'Reference' ? '0077B6' : '1a1f2e'); ?>;<?php echo e(in_array($lbl, ['Account Number','Branch Code']) ? 'font-family:monospace;letter-spacing:.5px;' : ''); ?>">
                <?php echo e($val); ?>

            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>


<div class="micro-label"><i class="fas fa-file-invoice me-1"></i> <?php echo e(now()->format('F Y')); ?> Statement</div>
<div class="panel">
    <div class="panel-header">
        <h6>Transaction History</h6>
        <span style="font-size:.74rem;color:#94a3b8;">
            Balance:
            <strong style="color:<?php echo e($accountSummary['balance'] > 0 ? '#ef4444' : '#16a34a'); ?>;">
                R <?php echo e(number_format($accountSummary['balance'], 2)); ?>

                <?php echo e($accountSummary['balance'] == 0 ? '(Paid up)' : ($accountSummary['balance'] < 0 ? 'CR' : 'Outstanding')); ?>

            </strong>
        </span>
    </div>
    <?php
        // Build transaction lines: fee charges + real payment records
        $transactions = [];

        // Current month fee debits
        foreach ($accountSummary['fee_lines'] as $line) {
            $transactions[] = [
                'date'   => now()->startOfMonth()->format('Y-m-d'),
                'desc'   => $line['desc'] . ' — ' . now()->format('F Y'),
                'ref'    => $line['reference'],
                'debit'  => $line['amount'],
                'credit' => 0,
                'status' => 'charge',
            ];
        }

        // Real payment rows (verified + pending + rejected)
        foreach ($payments as $pmt) {
            $transactions[] = [
                'date'   => $pmt->payment_date->format('Y-m-d'),
                'desc'   => match($pmt->status) {
                    'verified' => 'Payment Received — Thank you',
                    'pending'  => 'POP Submitted — Awaiting Verification',
                    'rejected' => 'Payment Rejected — ' . ($pmt->admin_note ? strip_tags($pmt->admin_note) : 'Contact admin'),
                    default    => 'Payment',
                },
                'ref'    => $pmt->reference,
                'debit'  => 0,
                'credit' => $pmt->status === 'verified' ? (float) $pmt->amount : 0,
                'status' => $pmt->status,
            ];
        }

        // Sort all rows by date ascending
        usort($transactions, fn($a, $b) => strcmp($a['date'], $b['date']));

        $runningBalance = 0;
    ?>
    <table class="table txn-table mb-0">
        <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Reference</th>
                <th class="text-end">Debit</th>
                <th class="text-end">Credit</th>
                <th class="text-end">Balance</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $txn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $runningBalance = $runningBalance + $txn['debit'] - $txn['credit']; ?>
            <tr>
                <td style="color:#64748b;white-space:nowrap;"><?php echo e(\Carbon\Carbon::parse($txn['date'])->format('d M Y')); ?></td>
                <td style="font-weight:600;color:#1a1f2e;">
                    <?php echo e($txn['desc']); ?>

                    <?php if(($txn['status'] ?? '') === 'pending'): ?>
                        <span style="font-size:.67rem;font-weight:700;background:#fff7ed;color:#d97706;border-radius:999px;padding:2px 8px;margin-left:6px;">Under Review</span>
                    <?php elseif(($txn['status'] ?? '') === 'rejected'): ?>
                        <span style="font-size:.67rem;font-weight:700;background:#fee2e2;color:#ef4444;border-radius:999px;padding:2px 8px;margin-left:6px;">Rejected</span>
                    <?php endif; ?>
                </td>
                <td><code style="font-size:.78rem;color:#64748b;"><?php echo e($txn['ref']); ?></code></td>
                <td class="text-end">
                    <?php if($txn['debit'] > 0): ?>
                        <span style="color:#ef4444;font-weight:600;">R <?php echo e(number_format($txn['debit'], 2)); ?></span>
                    <?php else: ?>
                        <span style="color:#d1d5db;">—</span>
                    <?php endif; ?>
                </td>
                <td class="text-end">
                    <?php if($txn['credit'] > 0): ?>
                        <span style="color:#16a34a;font-weight:600;">R <?php echo e(number_format($txn['credit'], 2)); ?></span>
                    <?php else: ?>
                        <span style="color:#d1d5db;">—</span>
                    <?php endif; ?>
                </td>
                <td class="text-end">
                    <span style="font-weight:700;color:<?php echo e($runningBalance > 0 ? '#ef4444' : '#16a34a'); ?>;">
                        R <?php echo e(number_format(abs($runningBalance), 2)); ?>

                        <?php if($runningBalance < 0): ?> <small>CR</small> <?php endif; ?>
                    </span>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-end" style="font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:#94a3b8;">
                    Closing Balance
                </td>
                <td colspan="2" class="text-end">
                    <span style="font-size:1rem;font-weight:800;color:<?php echo e($runningBalance > 0 ? '#ef4444' : '#16a34a'); ?>;">
                        R <?php echo e(number_format(abs($runningBalance), 2)); ?>

                        <?php echo e($runningBalance == 0 ? '(Paid up)' : ($runningBalance < 0 ? 'CR' : '')); ?>

                    </span>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/parent/statements.blade.php ENDPATH**/ ?>