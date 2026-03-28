<?php $__env->startSection('title', 'Lead Pipeline — Kanban Board'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ── Page header ─────────────────────────────────────────────────────── */
.kb-header { margin-bottom: 24px; }
.kb-breadcrumb {
    list-style: none; padding: 0; margin: 0 0 8px;
    display: flex; gap: 6px; font-size: .76rem; color: #adb5bd;
}
.kb-breadcrumb a { color: #0077B6; text-decoration: none; }
.kb-breadcrumb a:hover { text-decoration: underline; }
.kb-breadcrumb li + li::before { content: '/'; margin-right: 6px; color: #d1d5db; }
.kb-header h4 { font-size: 1.35rem; font-weight: 800; color: #1a1f2e; margin: 0 0 4px; }
.kb-header p  { font-size: .86rem; color: #6c757d; margin: 0; }

/* ── Board layout ────────────────────────────────────────────────────── */
.kb-wrapper {
    margin: 0 -30px;
    padding: 0 30px 2rem;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}
.kb-board {
    display: flex; gap: 16px;
    min-width: 900px; width: 100%;
    align-items: flex-start;
}

/* ── Column ──────────────────────────────────────────────────────────── */
.kb-col {
    flex: 1 1 0; min-width: 0;
    background: #f8fafc;
    border-radius: 16px;
    border: 1px solid #f0f0f0;
    display: flex; flex-direction: column;
    overflow: hidden;
}

/* ── Column header ───────────────────────────────────────────────────── */
.kb-col-head {
    padding: 14px 16px 12px;
    display: flex; align-items: center; justify-content: space-between;
    border-bottom: 1px solid #edf0f4;
    position: relative;
}
.kb-col-head::before {
    content: '';
    position: absolute; top: 0; left: 0; right: 0;
    height: 3px; border-radius: 16px 16px 0 0;
    background: var(--col-color);
}
.kb-col-icon {
    width: 32px; height: 32px; border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    font-size: .8rem; flex-shrink: 0;
    background: color-mix(in srgb, var(--col-color) 12%, transparent);
    color: var(--col-color);
}
.kb-col-title { font-size: .82rem; font-weight: 800; color: #1a1f2e; line-height: 1.2; }
.kb-col-desc  { font-size: .64rem; color: #adb5bd; margin-top: 1px; }
.kb-col-badge {
    min-width: 24px; height: 24px; padding: 0 7px;
    border-radius: 12px; background: var(--col-color);
    color: #fff; font-size: .72rem; font-weight: 800;
    display: inline-flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.kb-col-all {
    font-size: .68rem; font-weight: 600; color: #adb5bd;
    text-decoration: none; transition: color .15s;
}
.kb-col-all:hover { color: #0077B6; }

/* ── Cards area ──────────────────────────────────────────────────────── */
.kb-cards {
    padding: 10px 10px 10px;
    min-height: 140px; flex: 1;
    transition: background .15s;
}
.kb-cards.drag-over {
    background: rgba(0,119,182,.05);
    outline: 2px dashed rgba(0,119,182,.25);
    outline-offset: -6px;
    border-radius: 0 0 16px 16px;
}

/* ── Card ────────────────────────────────────────────────────────────── */
.kb-card {
    position: relative;
    background: #fff; border-radius: 12px;
    border: 1px solid #edf0f4;
    box-shadow: 0 1px 4px rgba(0,0,0,.05);
    padding: 12px 13px 11px;
    margin-bottom: 8px;
    cursor: grab; transition: box-shadow .15s, transform .12s, border-color .15s;
    word-break: break-word; min-width: 0;
}
.kb-card:last-child { margin-bottom: 0; }
.kb-card:hover {
    box-shadow: 0 4px 16px rgba(0,0,0,.1);
    transform: translateY(-2px);
    border-color: #dbeafe;
}
.kb-card.dragging {
    opacity: .4; transform: rotate(1.5deg) scale(1.03);
    box-shadow: 0 10px 28px rgba(0,0,0,.18);
}
.kb-card.kb-card--overdue {
    border-left: 3px solid #ef4444;
    background: #fff8f8;
}

/* ── Card — overdue pulse dot ────────────────────────────────────────── */
.kb-overdue-dot {
    position: absolute; top: 12px; right: 12px;
    width: 8px; height: 8px; border-radius: 50%; background: #ef4444;
}
.kb-overdue-dot::before,
.kb-overdue-dot::after {
    content: ''; position: absolute; inset: 0;
    border-radius: 50%; background: #ef4444;
    animation: kb-ripple 2s ease-out infinite;
}
.kb-overdue-dot::after { animation-delay: .7s; }
@keyframes kb-ripple {
    0%   { transform: scale(1);   opacity: .7; }
    100% { transform: scale(3.5); opacity: 0;  }
}

/* ── Card — avatar initials ──────────────────────────────────────────── */
.kb-avatar {
    width: 28px; height: 28px; border-radius: 50%;
    display: inline-flex; align-items: center; justify-content: center;
    font-size: .68rem; font-weight: 800; color: #fff; flex-shrink: 0;
    background: var(--col-color);
}

/* ── Card — reference code ───────────────────────────────────────────── */
.kb-ref { font-size: .68rem; font-weight: 700; color: var(--col-color); }

/* ── Card — pills ────────────────────────────────────────────────────── */
.kb-pill {
    font-size: .62rem; font-weight: 700; border-radius: 20px;
    padding: 2px 8px; display: inline-block; white-space: nowrap;
}
.kb-pill--overdue   { background: #fee2e2; color: #ef4444; }
.kb-pill--followup  { background: #fef3c7; color: #d97706; }
.kb-pill--today     { background: #e0f7fa; color: #0097a7; }
.kb-pill--soon      { background: #fef3c7; color: #d97706; }
.kb-pill--app       { background: #dcfce7; color: #16a34a; }

/* source pills */
.kb-src { font-size: .62rem; font-weight: 700; border-radius: 20px; padding: 2px 7px; }
.kb-src--google    { background: #fee2e2; color: #ef4444; }
.kb-src--facebook  { background: #dbeafe; color: #3b82f6; }
.kb-src--instagram { background: #fef3c7; color: #d97706; }
.kb-src--referral  { background: #dcfce7; color: #16a34a; }
.kb-src--other     { background: #f3f4f6; color: #6c757d; }

/* ── Card — divider ──────────────────────────────────────────────────── */
.kb-card-divider { height: 1px; background: #f3f4f6; margin: 9px 0; }

/* ── Empty column ────────────────────────────────────────────────────── */
.kb-empty {
    text-align: center; padding: 28px 12px;
    color: #d1d5db; font-size: .78rem;
}
.kb-empty i { font-size: 1.6rem; margin-bottom: 8px; display: block; }

/* ── Hidden strip ────────────────────────────────────────────────────── */
.kb-hidden-strip {
    display: flex; align-items: center; gap: 10px;
    flex-wrap: wrap; margin-top: 18px;
}
.kb-hidden-label {
    font-size: .7rem; font-weight: 700; color: #adb5bd;
    text-transform: uppercase; letter-spacing: .5px;
}
.kb-hidden-pill {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 5px 13px; border-radius: 20px;
    font-size: .76rem; font-weight: 700;
    text-decoration: none; transition: opacity .15s;
    border: 1.5px solid;
}
.kb-hidden-pill:hover { opacity: .8; }
.kb-hidden-pill--waitlist { background: #f3f4f6; color: #6c757d; border-color: #e5e7eb; }
.kb-hidden-pill--lost     { background: #fee2e2; color: #ef4444; border-color: #fecaca; }

/* ── Toast ───────────────────────────────────────────────────────────── */
.kb-toast {
    position: fixed; top: 80px; right: 28px; z-index: 9999;
    display: flex; align-items: center; gap: 10px;
    padding: 13px 18px; border-radius: 12px;
    font-size: .84rem; font-weight: 600; color: #fff;
    box-shadow: 0 4px 20px rgba(0,0,0,.15);
    animation: kb-toast-in .25s ease; pointer-events: none;
}
.kb-toast--success { background: #16a34a; }
.kb-toast--error   { background: #ef4444; }
@keyframes kb-toast-in {
    from { opacity:0; transform: translateX(16px); }
    to   { opacity:1; transform: translateX(0); }
}

/* ── Responsive ──────────────────────────────────────────────────────── */
@media (max-width: 767px) {
    .kb-wrapper { margin: 0 -15px; padding: 0 15px 1.5rem; }
    .kb-board { flex-direction: column; min-width: unset; }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<?php
    $totalActive = collect($columns)->sum(fn($c) => $c->count());
?>
<div class="d-flex justify-content-between align-items-start kb-header">
    <div>
        <ul class="kb-breadcrumb">
            <li><a href="<?php echo e(route('admin.crm.index')); ?>">Lead Pipeline</a></li>
            <li>Kanban Board</li>
        </ul>
        <h4>
            <i class="fas fa-columns me-2" style="color:#0077B6;font-size:1.1rem;"></i>Kanban Board
            <span class="ms-2 rounded-pill px-2 py-1"
                  style="background:#e0f7fa;color:#0097a7;font-size:.72rem;font-weight:700;vertical-align:middle;">
                <?php echo e($totalActive); ?> active
            </span>
        </h4>
        <p>Drag cards between columns to update status instantly</p>
    </div>
    <div class="d-flex gap-2">
        <a href="<?php echo e(route('admin.crm.leads.create')); ?>"
           class="btn btn-sm rounded-pill px-3 text-white" style="background:#0077B6;">
            <i class="fas fa-plus me-1"></i>Add Lead
        </a>
        <a href="<?php echo e(route('admin.crm.leads')); ?>"
           class="btn btn-sm btn-outline-secondary rounded-pill px-3">
            <i class="fas fa-list me-1"></i>List View
        </a>
        <a href="<?php echo e(route('admin.crm.index')); ?>"
           class="btn btn-sm rounded-pill px-3" style="background:#f3f4f6;color:#374151;border:1px solid #e5e7eb;">
            <i class="fas fa-funnel-dollar me-1"></i>Lead Pipeline
        </a>
    </div>
</div>

<?php
    $kanbanColumns = [
        'new'            => ['label'=>'New',            'color'=>'#3b82f6', 'icon'=>'fas fa-star',           'desc'=>'Fresh enquiries'],
        'contacted'      => ['label'=>'Contacted',      'color'=>'#d97706', 'icon'=>'fas fa-phone-alt',      'desc'=>'Follow-up needed'],
        'tour_scheduled' => ['label'=>'Tour Scheduled', 'color'=>'#0097a7', 'icon'=>'fas fa-calendar-check', 'desc'=>'Upcoming tours'],
        'tour_completed' => ['label'=>'Tour Done',      'color'=>'#7c3aed', 'icon'=>'fas fa-flag-checkered', 'desc'=>'Awaiting decision'],
        'converted'      => ['label'=>'Converted',      'color'=>'#16a34a', 'icon'=>'fas fa-trophy',         'desc'=>'Enrolled'],
    ];
    $srcClass = [
        'google'    => 'kb-src--google',
        'facebook'  => 'kb-src--facebook',
        'instagram' => 'kb-src--instagram',
        'referral'  => 'kb-src--referral',
    ];
?>


<div class="kb-wrapper">
    <div class="kb-board">
        <?php $__currentLoopData = $kanbanColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="kb-col" data-status="<?php echo e($status); ?>" style="--col-color:<?php echo e($col['color']); ?>;">

            
            <div class="kb-col-head">
                <div class="d-flex align-items-center gap-10" style="gap:10px;">
                    <div class="kb-col-icon">
                        <i class="<?php echo e($col['icon']); ?>"></i>
                    </div>
                    <div>
                        <div class="kb-col-title"><?php echo e($col['label']); ?></div>
                        <div class="kb-col-desc"><?php echo e($col['desc']); ?></div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="kb-col-badge"><?php echo e($columns[$status]->count()); ?></span>
                    <a href="<?php echo e(route('admin.crm.leads', ['status'=>$status])); ?>" class="kb-col-all">all&nbsp;→</a>
                </div>
            </div>

            
            <div class="kb-cards" data-status="<?php echo e($status); ?>">
                <?php $__empty_1 = true; $__currentLoopData = $columns[$status]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $initials = collect(explode(' ', $lead->name))->map(fn($w)=>strtoupper($w[0]))->take(2)->implode('');
                    $daysUntil = now()->diffInDays($lead->preferred_date, false);
                ?>
                <div class="kb-card <?php echo e($lead->isOverdue() ? 'kb-card--overdue' : ''); ?>"
                     data-lead-id="<?php echo e($lead->id); ?>" draggable="true"
                     style="--col-color:<?php echo e($col['color']); ?>;">

                    <?php if($lead->isOverdue()): ?>
                        <div class="kb-overdue-dot"></div>
                    <?php endif; ?>

                    
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="kb-avatar" style="--col-color:<?php echo e($col['color']); ?>;"><?php echo e($initials); ?></div>
                        <div style="flex:1;min-width:0;">
                            <div class="fw-bold text-truncate" style="font-size:.83rem;color:#1a1f2e;line-height:1.2;"><?php echo e($lead->name); ?></div>
                            <div class="kb-ref"><?php echo e($lead->reference); ?></div>
                        </div>
                        
                        <?php if($lead->isOverdue()): ?>
                            <span class="kb-pill kb-pill--overdue">Overdue</span>
                        <?php elseif($lead->isFollowUpDue()): ?>
                            <span class="kb-pill kb-pill--followup"><i class="fas fa-bell me-1"></i>Due</span>
                        <?php elseif($status === 'tour_scheduled'): ?>
                            <?php if($daysUntil === 0): ?>
                                <span class="kb-pill kb-pill--today">Today</span>
                            <?php elseif($daysUntil > 0 && $daysUntil <= 2): ?>
                                <span class="kb-pill kb-pill--soon">In <?php echo e($daysUntil); ?>d</span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    
                    <div style="font-size:.74rem;color:#6c757d;margin-bottom:8px;">
                        <i class="fas fa-child me-1" style="color:#d1d5db;"></i>
                        <span style="color:#374151;"><?php echo e($lead->child_name); ?></span>
                        <span class="ms-1 kb-pill" style="background:#f3f4f6;color:#6c757d;padding:1px 7px;"><?php echo e($lead->child_age); ?></span>
                    </div>

                    <div class="kb-card-divider"></div>

                    
                    <div class="d-flex align-items-center justify-content-between" style="gap:6px;">
                        <span style="font-size:.7rem;color:#adb5bd;">
                            <i class="fas fa-calendar-alt me-1"></i><?php echo e($lead->preferred_date->format('d M')); ?>

                        </span>
                        <div class="d-flex align-items-center gap-1 flex-wrap justify-content-end">
                            <?php if($lead->relationLoaded('application') && $lead->application): ?>
                                <span class="kb-pill kb-pill--app"><i class="fas fa-file-alt me-1"></i>App</span>
                            <?php endif; ?>
                            <?php if($lead->source): ?>
                                <span class="kb-src <?php echo e($srcClass[$lead->source] ?? 'kb-src--other'); ?>"><?php echo e(ucfirst($lead->source)); ?></span>
                            <?php endif; ?>
                            <?php if($lead->assignee): ?>
                                <span style="font-size:.68rem;color:#adb5bd;" title="<?php echo e($lead->assignee->name); ?>">
                                    <i class="fas fa-user-circle me-1"></i><?php echo e(explode(' ', $lead->assignee->name)[0]); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if($lead->follow_up_date): ?>
                    <div class="mt-1" style="font-size:.68rem;<?php echo e($lead->isFollowUpDue() ? 'color:#ef4444;font-weight:700;' : 'color:#adb5bd;'); ?>">
                        <i class="fas fa-calendar-check me-1"></i>Follow-up <?php echo e($lead->follow_up_date->format('d M')); ?>

                    </div>
                    <?php endif; ?>

                    <a href="<?php echo e(route('admin.crm.leads.show', $lead)); ?>" class="stretched-link"></a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="kb-empty">
                    <i class="<?php echo e($col['icon']); ?>" style="color:<?php echo e($col['color']); ?>;opacity:.25;"></i>
                    No leads here
                </div>
                <?php endif; ?>
            </div>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>


<div class="kb-hidden-strip">
    <span class="kb-hidden-label"><i class="fas fa-eye-slash me-1"></i>Hidden from board:</span>
    <a href="<?php echo e(route('admin.crm.leads', ['status'=>'waitlist'])); ?>" class="kb-hidden-pill kb-hidden-pill--waitlist">
        <i class="fas fa-clock"></i>Waitlist
        <span style="opacity:.6;">(<?php echo e($hiddenCounts['waitlist']); ?>)</span>
    </a>
    <a href="<?php echo e(route('admin.crm.leads', ['status'=>'lost'])); ?>" class="kb-hidden-pill kb-hidden-pill--lost">
        <i class="fas fa-times-circle"></i>Lost
        <span style="opacity:.6;">(<?php echo e($hiddenCounts['lost']); ?>)</span>
    </a>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const cards   = document.querySelectorAll('.kb-card');
    const zones   = document.querySelectorAll('.kb-cards');
    const csrf    = document.querySelector('meta[name="csrf-token"]')?.content;

    /* ── Drag ── */
    cards.forEach(card => {
        card.addEventListener('dragstart', e => {
            card.classList.add('dragging');
            e.dataTransfer.setData('text/plain', card.dataset.leadId);
            e.dataTransfer.effectAllowed = 'move';
        });
        card.addEventListener('dragend', () => card.classList.remove('dragging'));
    });

    /* ── Drop zones ── */
    zones.forEach(zone => {
        zone.addEventListener('dragover',  e => { e.preventDefault(); e.dataTransfer.dropEffect = 'move'; zone.classList.add('drag-over'); });
        zone.addEventListener('dragleave', () => zone.classList.remove('drag-over'));
        zone.addEventListener('drop', e => {
            e.preventDefault();
            zone.classList.remove('drag-over');

            const leadId   = e.dataTransfer.getData('text/plain');
            const newStatus = zone.dataset.status;
            const card     = document.querySelector(`.kb-card[data-lead-id="${leadId}"]`);
            if (!card) return;

            // Move card in DOM
            const empty = zone.querySelector('.kb-empty');
            if (empty) empty.remove();
            zone.appendChild(card);

            // Refresh all column badges
            document.querySelectorAll('.kb-col').forEach(col => {
                const badge = col.querySelector('.kb-col-badge');
                if (badge) badge.textContent = col.querySelectorAll('.kb-card').length;
            });

            // AJAX update
            fetch(`/admin/crm/leads/${leadId}/status`, {
                method: 'PATCH',
                headers: { 'Content-Type':'application/json', 'X-CSRF-TOKEN':csrf, 'Accept':'application/json' },
                body: JSON.stringify({ status: newStatus }),
            })
            .then(r => r.json())
            .then(d => showToast(d.message ?? 'Status updated'))
            .catch(()  => showToast('Failed to update status', true));
        });
    });

    /* ── Toast ── */
    function showToast(msg, isError = false) {
        const existing = document.querySelector('.kb-toast');
        if (existing) existing.remove();
        const el = document.createElement('div');
        el.className = `kb-toast kb-toast--${isError ? 'error' : 'success'}`;
        el.innerHTML = `<i class="fas fa-${isError ? 'times-circle' : 'check-circle'}"></i> ${msg}`;
        document.body.appendChild(el);
        setTimeout(() => el.style.cssText += 'opacity:0;transition:opacity .3s;', 2500);
        setTimeout(() => el.remove(), 2900);
    }
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/admin/crm/kanban.blade.php ENDPATH**/ ?>