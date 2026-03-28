<?php $__env->startSection('title', $child['name']); ?>
<?php $__env->startSection('portal-name', 'Parent Portal'); ?>
<?php $__env->startSection('page-title', $child['name']); ?>

<?php $__env->startSection('sidebar-nav'); ?>
<?php echo $__env->make('parent.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ─── Hero panel ───────────────────────────────────────────────────────── */
.hero-panel {
    background: #fff; border-radius: 16px;
    border: 1px solid #f0f0f0;
    box-shadow: 0 1px 8px rgba(0,0,0,.06);
    overflow: hidden; margin-bottom: 24px;
}
.hero-top {
    padding: 24px 26px 20px;
    background: linear-gradient(135deg, #f0f9ff 0%, #fef1f2 100%);
    border-bottom: 1px solid #f0f0f0;
    position: relative;
}
.hero-top::after {
    content: '';
    position: absolute; bottom: 0; left: 26px; right: 26px; height: 2px;
    background: linear-gradient(90deg, #0077B6, #00B4D8, #FFB5BA);
    border-radius: 2px;
}
.hero-avatar {
    width: 64px; height: 64px; border-radius: 16px;
    background: #fff; display: flex; align-items: center; justify-content: center;
    font-size: 1.6rem; font-weight: 800; color: #0077B6;
    box-shadow: 0 2px 10px rgba(0,119,182,.15);
    border: 2px solid #fff; flex-shrink: 0;
}
.hero-stats { display: flex; border-top: 1px solid #f3f4f6; }
.hero-stat {
    flex: 1; padding: 15px 14px 17px; text-align: center;
    border-right: 1px solid #f3f4f6;
}
.hero-stat:last-child { border-right: none; }
.hs-val { font-size: 1rem; font-weight: 800; color: #1a1f2e; line-height: 1; }
.hs-lbl { font-size: .62rem; font-weight: 600; text-transform: uppercase;
          letter-spacing: .5px; color: #94a3b8; margin-top: 4px; }

/* ─── Panel ────────────────────────────────────────────────────────────── */
.panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,.06);
    border: 1px solid #f0f0f0; overflow: hidden; margin-bottom: 20px;
}
.panel-header {
    padding: 15px 22px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.panel-header h6 { margin: 0; font-weight: 700; font-size: .88rem; color: #1a1f2e; }
.panel-body { padding: 6px 0; }

/* ─── Info rows ────────────────────────────────────────────────────────── */
.info-row {
    display: flex; align-items: baseline; gap: 10px;
    padding: 10px 22px; border-bottom: 1px solid #f9fafb;
}
.info-row:last-child { border-bottom: none; }
.info-lbl {
    font-size: .72rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .4px; color: #94a3b8; min-width: 150px; flex-shrink: 0;
}
.info-val { font-size: .87rem; font-weight: 600; color: #1a1f2e; }
.info-val.muted { color: #94a3b8; font-weight: 400; font-style: italic; }

/* ─── Section micro-label ──────────────────────────────────────────────── */
.micro-label {
    font-size: .63rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: 1.1px; color: #adb5bd; margin-bottom: 12px;
}

/* ─── Document rows ────────────────────────────────────────────────────── */
.doc-row {
    display: flex; align-items: center; gap: 12px;
    padding: 12px 22px; border-bottom: 1px solid #f9fafb;
}
.doc-row:last-child { border-bottom: none; }
.doc-icon {
    width: 34px; height: 34px; border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    font-size: .78rem; flex-shrink: 0;
}
.doc-icon.uploaded { background: #dcfce7; color: #16a34a; }
.doc-icon.missing  { background: #f3f4f6; color: #d1d5db; }
.doc-name { font-size: .83rem; font-weight: 600; color: #1a1f2e; flex: 1; }
.doc-status-pill {
    font-size: .7rem; font-weight: 700; border-radius: 999px;
    padding: 3px 10px; white-space: nowrap;
}
.doc-status-pill.uploaded { background: #dcfce7; color: #16a34a; }
.doc-status-pill.missing  { background: #f3f4f6; color: #94a3b8; }

/* ─── Contact card ─────────────────────────────────────────────────────── */
.contact-block {
    padding: 14px 22px; border-bottom: 1px solid #f9fafb;
}
.contact-block:last-child { border-bottom: none; }
.contact-role {
    font-size: .62rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: .8px; color: #94a3b8; margin-bottom: 6px;
}
.contact-name { font-size: .92rem; font-weight: 700; color: #1a1f2e; margin-bottom: 4px; }
.contact-detail {
    font-size: .78rem; color: #64748b; display: flex; align-items: center; gap: 6px;
    margin-bottom: 2px;
}
.contact-detail i { width: 14px; text-align: center; color: #94a3b8; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<div class="mb-4 d-flex align-items-center gap-2">
    <a href="<?php echo e(route('parent.dashboard')); ?>" class="text-decoration-none" style="font-size:.8rem;color:#94a3b8;">Dashboard</a>
    <i class="fas fa-chevron-right" style="font-size:.55rem;color:#d1d5db;"></i>
    <a href="<?php echo e(route('parent.children')); ?>" class="text-decoration-none" style="font-size:.8rem;color:#94a3b8;">My Children</a>
    <i class="fas fa-chevron-right" style="font-size:.55rem;color:#d1d5db;"></i>
    <span style="font-size:.8rem;color:#1a1f2e;font-weight:600;"><?php echo e($child['name']); ?></span>
</div>


<div class="hero-panel">
    <div class="hero-top">
        <div class="d-flex align-items-center gap-3">
            <div class="hero-avatar"><?php echo e(strtoupper(substr($child['name'], 0, 1))); ?></div>
            <div class="flex-grow-1">
                <div style="font-size:1.2rem;font-weight:800;color:#1a1f2e;line-height:1.2;">
                    <?php echo e($child['name']); ?>

                    <?php if($child['nickname']): ?>
                        <span style="font-size:.82rem;font-weight:500;color:#64748b;margin-left:6px;">"<?php echo e($child['nickname']); ?>"</span>
                    <?php endif; ?>
                </div>
                <div style="font-size:.8rem;color:#64748b;margin-top:3px;">
                    <?php echo e($child['program']); ?>

                    <?php if($child['dob'] !== '—'): ?> &bull; Born <?php echo e($child['dob']); ?> <?php endif; ?>
                    &bull; <?php echo e($child['gender']); ?>

                </div>
            </div>
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
            <span class="badge rounded-pill px-3 py-2"
                  style="background:<?php echo e($stBg); ?>;color:<?php echo e($stC); ?>;font-weight:700;font-size:.72rem;white-space:nowrap;">
                <?php echo e($child['status_label']); ?>

            </span>
        </div>
    </div>
    <div class="hero-stats">
        <div class="hero-stat">
            <div class="hs-val" style="font-size:.85rem;"><?php echo e($child['reference']); ?></div>
            <div class="hs-lbl">Reference</div>
        </div>
        <div class="hero-stat">
            <div class="hs-val"><?php echo e($child['age_years'] !== null ? $child['age_years'] : '—'); ?></div>
            <div class="hs-lbl">Age (yrs)</div>
        </div>
        <div class="hero-stat">
            <div class="hs-val" style="font-size:.85rem;"><?php echo e($child['fee_option']); ?></div>
            <div class="hs-lbl">Fee Plan</div>
        </div>
        <div class="hero-stat">
            <div class="hs-val" style="font-size:.85rem;"><?php echo e($child['start_date'] ?? '—'); ?></div>
            <div class="hs-lbl">Start Date</div>
        </div>
        <div class="hero-stat">
            <div class="hs-val" style="font-size:.85rem;"><?php echo e($child['enrolled_date']); ?></div>
            <div class="hs-lbl">Enrolled</div>
        </div>
    </div>
</div>


<div class="row g-4">

    
    <div class="col-lg-7">

        
        <div class="micro-label"><i class="fas fa-child me-1"></i> Child Details</div>
        <div class="panel">
            <div class="panel-body">
                <div class="info-row">
                    <div class="info-lbl">Full Name</div>
                    <div class="info-val"><?php echo e($child['full_name']); ?></div>
                </div>
                <?php if($child['nickname']): ?>
                <div class="info-row">
                    <div class="info-lbl">Nickname</div>
                    <div class="info-val"><?php echo e($child['nickname']); ?></div>
                </div>
                <?php endif; ?>
                <div class="info-row">
                    <div class="info-lbl">Date of Birth</div>
                    <div class="info-val"><?php echo e($child['dob']); ?></div>
                </div>
                <div class="info-row">
                    <div class="info-lbl">Age</div>
                    <div class="info-val"><?php echo e($child['age']); ?></div>
                </div>
                <div class="info-row">
                    <div class="info-lbl">Gender</div>
                    <div class="info-val"><?php echo e($child['gender']); ?></div>
                </div>
                <?php if($child['language']): ?>
                <div class="info-row">
                    <div class="info-lbl">Home Language</div>
                    <div class="info-val"><?php echo e($child['language']); ?></div>
                </div>
                <?php endif; ?>
                <?php if($child['id_number']): ?>
                <div class="info-row">
                    <div class="info-lbl">ID / Birth Reg No.</div>
                    <div class="info-val"><code style="color:#0077B6;font-size:.84rem;"><?php echo e($child['id_number']); ?></code></div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="micro-label"><i class="fas fa-clipboard-check me-1"></i> Enrolment</div>
        <div class="panel">
            <div class="panel-body">
                <div class="info-row">
                    <div class="info-lbl">Application Ref</div>
                    <div class="info-val"><code style="color:#0077B6;font-size:.84rem;"><?php echo e($child['reference']); ?></code></div>
                </div>
                <div class="info-row">
                    <div class="info-lbl">Programme</div>
                    <div class="info-val"><?php echo e($child['program']); ?></div>
                </div>
                <div class="info-row">
                    <div class="info-lbl">Fee Option</div>
                    <div class="info-val"><?php echo e($child['fee_option']); ?></div>
                </div>
                <div class="info-row">
                    <div class="info-lbl">Snack Box</div>
                    <div class="info-val">
                        <?php if($child['snack_box']): ?>
                            <span style="background:#dcfce7;color:#16a34a;font-size:.72rem;font-weight:700;padding:3px 10px;border-radius:999px;">
                                <i class="fas fa-check me-1"></i> Subscribed
                            </span>
                        <?php else: ?>
                            <span class="muted" style="font-size:.84rem;color:#94a3b8;font-style:italic;">Not subscribed</span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-lbl">Start Date</div>
                    <div class="info-val"><?php echo e($child['start_date'] ?? '—'); ?></div>
                </div>
                <div class="info-row">
                    <div class="info-lbl">Applied On</div>
                    <div class="info-val"><?php echo e($child['applied_date']); ?></div>
                </div>
                <div class="info-row">
                    <div class="info-lbl">Enrolled Since</div>
                    <div class="info-val"><?php echo e($child['enrolled_date']); ?></div>
                </div>
                <div class="info-row">
                    <div class="info-lbl">Status</div>
                    <div class="info-val">
                        <span class="badge rounded-pill px-3"
                              style="background:<?php echo e($stBg); ?>;color:<?php echo e($stC); ?>;font-weight:700;font-size:.72rem;">
                            <?php echo e($child['status_label']); ?>

                        </span>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="micro-label"><i class="fas fa-heartbeat me-1"></i> Medical Information</div>
        <div class="panel">
            <div class="panel-body">
                <div class="info-row">
                    <div class="info-lbl">Allergies</div>
                    <div class="info-val <?php echo e(!$child['allergies'] ? 'muted' : ''); ?>">
                        <?php echo e($child['allergies'] ?: 'None recorded'); ?>

                    </div>
                </div>
                <div class="info-row">
                    <div class="info-lbl">Medical Notes</div>
                    <div class="info-val <?php echo e(!$child['medical_notes'] ? 'muted' : ''); ?>">
                        <?php echo e($child['medical_notes'] ?: 'None recorded'); ?>

                    </div>
                </div>
            </div>
        </div>

    </div>

    
    <div class="col-lg-5">

        
        <div class="micro-label"><i class="fas fa-users me-1"></i> Parent / Guardian Contacts</div>
        <div class="panel">
            <div class="panel-body" style="padding: 0;">
                
                <?php if($child['mother_name']): ?>
                <div class="contact-block">
                    <div class="contact-role">Mother / Primary Guardian</div>
                    <div class="contact-name"><?php echo e($child['mother_name']); ?></div>
                    <?php if($child['mother_cell']): ?>
                    <div class="contact-detail">
                        <i class="fas fa-phone"></i>
                        <a href="tel:<?php echo e($child['mother_cell']); ?>" style="color:#0077B6;text-decoration:none;"><?php echo e($child['mother_cell']); ?></a>
                    </div>
                    <?php endif; ?>
                    <?php if($child['mother_email']): ?>
                    <div class="contact-detail">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:<?php echo e($child['mother_email']); ?>" style="color:#0077B6;text-decoration:none;"><?php echo e($child['mother_email']); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                
                <?php if($child['father_name']): ?>
                <div class="contact-block">
                    <div class="contact-role">Father / Secondary Guardian</div>
                    <div class="contact-name"><?php echo e($child['father_name']); ?></div>
                    <?php if($child['father_cell']): ?>
                    <div class="contact-detail">
                        <i class="fas fa-phone"></i>
                        <a href="tel:<?php echo e($child['father_cell']); ?>" style="color:#0077B6;text-decoration:none;"><?php echo e($child['father_cell']); ?></a>
                    </div>
                    <?php endif; ?>
                    <?php if($child['father_email']): ?>
                    <div class="contact-detail">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:<?php echo e($child['father_email']); ?>" style="color:#0077B6;text-decoration:none;"><?php echo e($child['father_email']); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <?php if(!$child['mother_name'] && !$child['father_name']): ?>
                <div class="contact-block">
                    <span style="font-size:.82rem;color:#94a3b8;font-style:italic;">No contact details on record.</span>
                </div>
                <?php endif; ?>
            </div>
        </div>

        
        <?php
            $requiredDocs = [
                'birth_certificate'   => 'Birth Certificate',
                'clinic_card'         => 'Clinic / Immunisation Card',
                'medical_certificate' => 'Medical Certificate',
                'id_document'         => 'Parent ID Document',
                'proof_of_residence'  => 'Proof of Residence',
                'school_report'       => 'Previous School Report',
                'transfer_letter'     => 'Transfer Letter',
            ];
            $uploaded = $child['documents'] ?? [];
        ?>
        <div class="micro-label"><i class="fas fa-folder-open me-1"></i> Documents</div>
        <div class="panel">
            <div class="panel-header">
                <h6>Required Documents</h6>
                <a href="<?php echo e(route('parent.documents')); ?>"
                   style="font-size:.76rem;font-weight:600;color:#0077B6;text-decoration:none;">
                    Manage <i class="fas fa-arrow-right ms-1" style="font-size:.6rem;"></i>
                </a>
            </div>
            <div class="panel-body" style="padding:0;">
                <?php $__currentLoopData = $requiredDocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $isUploaded = !empty($uploaded[$key]); ?>
                <div class="doc-row">
                    <div class="doc-icon <?php echo e($isUploaded ? 'uploaded' : 'missing'); ?>">
                        <i class="fas <?php echo e($isUploaded ? 'fa-check' : 'fa-file'); ?>"></i>
                    </div>
                    <div class="doc-name"><?php echo e($label); ?></div>
                    <?php if($isUploaded): ?>
                        <a href="<?php echo e(asset('storage/' . $uploaded[$key])); ?>" target="_blank"
                           class="doc-status-pill uploaded" style="text-decoration:none;">
                            <i class="fas fa-eye me-1" style="font-size:.62rem;"></i> View
                        </a>
                    <?php else: ?>
                        <span class="doc-status-pill missing">Missing</span>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php $missingCount = collect($requiredDocs)->keys()->filter(fn($k) => empty($uploaded[$k]))->count(); ?>
            <?php if($missingCount > 0): ?>
            <div style="padding:12px 22px;border-top:1px solid #f3f4f6;">
                <a href="<?php echo e(route('parent.documents')); ?>"
                   class="btn btn-sm w-100 rounded-pill"
                   style="background:#fff5f5;color:#b91c1c;border:1.5px solid #fecaca;font-weight:600;font-size:.78rem;">
                    <i class="fas fa-upload me-1"></i> Upload <?php echo e($missingCount); ?> Missing Document<?php echo e($missingCount > 1 ? 's' : ''); ?>

                </a>
            </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/parent/child-detail.blade.php ENDPATH**/ ?>