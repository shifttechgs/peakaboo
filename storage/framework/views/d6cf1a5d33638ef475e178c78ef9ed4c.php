<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ─── Overview bar ─────────────────────────────────────────────────────── */
.overview-bar {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,0.07);
    border: 1px solid #f0f0f0;
    overflow: hidden;
    margin-bottom: 24px;
}
.overview-bar-header {
    padding: 16px 24px 4px;
    display: flex; justify-content: space-between; align-items: center;
    border-bottom: 1px solid #f3f4f6;
}
.overview-bar-header .bar-section-label {
    font-size: .65rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: 1.2px; color: #94a3b8;
    display: flex; align-items: center; gap: 5px;
}
.overview-stats {
    display: flex; padding: 4px 12px 4px;
}
.overview-divider {
    width: 1px; background: #f3f4f6; margin: 12px 0;
    flex-shrink: 0;
}
.stat-tile {
    flex: 1; padding: 16px 16px 20px;
    text-decoration: none; display: block;
    border-radius: 10px; transition: background .15s;
    position: relative;
}
.stat-tile:hover { background: #fafbff; }
.stat-tile .st-val {
    font-size: 1.85rem; font-weight: 800; line-height: 1;
    color: #1a1f2e; margin-bottom: 5px;
}
.stat-tile .st-label {
    font-size: .72rem; font-weight: 600; color: #6c757d;
    text-transform: uppercase; letter-spacing: .4px;
}
.stat-tile .st-trend {
    font-size: .68rem; color: #adb5bd; margin-top: 3px;
}
.stat-tile.st-alert .st-val { color: #ef4444; }
.stat-tile.st-warn  .st-val { color: #d97706; }
.stat-tile.st-good  .st-val { color: #16a34a; }
.stat-tile.st-info  .st-val { color: #0097a7; }
.stat-tile.st-blue  .st-val { color: #3b82f6; }
.stat-tile.st-violet .st-val { color: #7c3aed; }
/* pulsing dot for urgent tiles — ripple wave */
.st-dot {
    position: absolute; top: 18px; right: 14px;
    width: 9px; height: 9px; border-radius: 50%;
}
.st-dot::before,
.st-dot::after {
    content: '';
    position: absolute;
    inset: 0; border-radius: 50%;
    background: inherit;
    animation: st-ripple 2s ease-out infinite;
}
.st-dot::after { animation-delay: .7s; }
@keyframes st-ripple {
    0%   { transform: scale(1);   opacity: .7; }
    100% { transform: scale(3.2); opacity: 0;  }
}

/* section divider between Leads and Enrolments */
.overview-section-sep {
    display: flex; flex-direction: column; align-items: center;
    justify-content: center; padding: 12px 10px; flex-shrink: 0;
}
.overview-section-sep .sep-line {
    width: 2px; flex: 1;
    background: linear-gradient(to bottom, transparent, #cbd5e1, transparent);
    min-height: 60px;
}

/* tint each section of the overview bar */
.stat-tile.leads-tile { background: transparent; }
.stat-tile.leads-tile:hover { background: #fafbff; }
.stat-tile.enrol-tile { background: transparent; }
.stat-tile.enrol-tile:hover { background: #fafbff; }

/* progress mini-bar inside stat tiles */
.st-bar-track { background: #f3f4f6; border-radius: 4px; height: 3px; margin-top: 6px; overflow: hidden; }
.st-bar-fill  { height: 3px; border-radius: 4px; }

/* ─── Panel cards ──────────────────────────────────────────────────────── */
.panel {
    background: #fff; border-radius: 16px;
    box-shadow: 0 1px 8px rgba(0,0,0,0.07);
    border: 1px solid #f0f0f0; overflow: hidden;
}
.panel-header {
    padding: 18px 24px; border-bottom: 1px solid #f3f4f6;
    display: flex; align-items: center; justify-content: space-between;
}
.panel-header h6 { margin: 0; font-weight: 700; font-size: .93rem; color: #1a1f2e; }
.panel-body { padding: 20px 24px; }

/* ─── Tour day strip ───────────────────────────────────────────────────── */
.tour-day {
    flex: 1; border-radius: 10px; padding: 10px 4px;
    text-align: center; border: 1.5px solid #f0f0f0;
    background: #fafafa; transition: all .2s;
}
.tour-day.today     { border-color: #0077B6; background: #f0f8ff; }
.tour-day.has-tours { border-color: #0dcaf0; background: #f0feff; }
.tour-day.overdue-day { border-color: #ef4444; background: #fff0f0; }
.tour-day-name  { font-size: .57rem; text-transform: uppercase; letter-spacing: .5px; color: #adb5bd; }
.tour-day-num   { font-size: 1.05rem; font-weight: 800; line-height: 1.3; color: #1a1f2e; }
.tour-day.today .tour-day-num { color: #0077B6; }
.tour-day-count { font-size: .6rem; font-weight: 700; margin-top: 2px; color: #0dcaf0; }

/* ─── Day selector buttons ─────────────────────────────────────────────── */
.cal-day-btn {
    display: flex; align-items: center; gap: 10px;
    background: #fafafa; color: #374151;
    border: 1.5px solid #f0f0f0;
    border-radius: 10px; padding: 9px 14px;
    cursor: pointer; text-align: left;
    width: 160px; transition: all .15s;
    position: relative;
}
.cal-day-btn:hover:not(.active) {
    background: #f0f8ff;
    border-color: #bfdbfe;
    color: #1a1f2e;
}
.cal-day-btn.active {
    background: #0077B6;
    border-color: #0077B6;
    color: #fff;
    box-shadow: 0 3px 10px rgba(0,119,182,.22);
}
.cal-day-btn.overdue-btn {
    border-color: #fca5a5 !important;
    background: #fff5f5 !important;
    color: #374151 !important;
}
.cal-day-btn.active.overdue-btn {
    background: #ef4444 !important;
    border-color: #ef4444 !important;
    color: #fff !important;
}
.cal-day-btn__date {
    flex-shrink: 0; text-align: center; width: 32px;
}
.cal-day-btn__dow {
    font-size: .58rem; text-transform: uppercase;
    letter-spacing: .5px; opacity: .7; line-height: 1;
}
.cal-day-btn__num {
    font-size: 1.1rem; font-weight: 800; line-height: 1.2;
}
.cal-day-btn__mon {
    font-size: .58rem; opacity: .6;
}
.cal-day-btn__info {
    flex: 1; min-width: 0;
}
.cal-day-btn__count {
    font-size: .75rem; font-weight: 700;
}
.cal-day-btn__empty {
    font-size: .72rem; opacity: .45;
}
.cal-day-btn__overdue {
    font-size: .65rem; color: #ef4444;
}
.cal-day-btn.active .cal-day-btn__overdue {
    color: rgba(255,255,255,.85);
}
.cal-day-btn.active .cal-day-btn__empty,
.cal-day-btn.active .cal-day-btn__dow,
.cal-day-btn.active .cal-day-btn__mon {
    opacity: .75;
}

/* ─── Tour row ─────────────────────────────────────────────────────────── */
.tour-row { display: flex; align-items: center; gap: 10px; padding: 10px 0; border-bottom: 1px solid #f5f5f5; }
.tour-row:last-child { border-bottom: none; }
.tour-time-pill {
    background: #e8f4fd; color: #0077B6; font-weight: 700;
    font-size: .7rem; border-radius: 6px; padding: 4px 9px;
    min-width: 46px; text-align: center; flex-shrink: 0;
}

/* ─── Enrolment status rows ────────────────────────────────────────────── */
.enrol-row { display: flex; align-items: center; justify-content: space-between; padding: 9px 0; border-bottom: 1px solid #f5f5f5; }
.enrol-row:last-child { border-bottom: none; }
.enrol-dot { width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0; }
.enrol-pill { font-weight: 700; font-size: .8rem; border-radius: 20px; padding: 3px 11px; text-decoration: none; }

/* ─── Applications table ───────────────────────────────────────────────── */
.app-table th {
    font-size: .7rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #adb5bd; background: #fafafa;
    border-bottom: 1px solid #f0f0f0; padding: 11px 16px;
}
.app-table td { padding: 13px 16px; vertical-align: middle; border-bottom: 1px solid #f8f8f8; font-size: .86rem; }
.app-table tbody tr:last-child td { border-bottom: none; }
.app-table tbody tr:hover td { background: #fafcff; transition: background .12s; }

/* ─── Capacity bars ────────────────────────────────────────────────────── */
.cap-row { margin-bottom: 18px; }
.cap-row:last-child { margin-bottom: 0; }

/* ─── Section micro-label ──────────────────────────────────────────────── */
.micro-label { font-size: .64rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; color: #adb5bd; margin-bottom: 10px; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1" style="color:#1a1f2e;">
            Good <?php echo e(now()->hour < 12 ? 'morning' : (now()->hour < 17 ? 'afternoon' : 'evening')); ?> 👋
        </h4>
        <p class="text-muted mb-0" style="font-size:.88rem;">
            <?php echo e(now()->format('l, d F Y')); ?> &mdash; here's everything that needs your attention.
        </p>
    </div>
    <div class="d-flex gap-2">
        <a href="<?php echo e(route('admin.crm.leads.create')); ?>" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
            <i class="fas fa-plus me-1"></i>Add Lead
        </a>
        <a href="<?php echo e(route('admin.crm.kanban')); ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3">
            <i class="fas fa-columns me-1"></i>Kanban
        </a>
        <a href="<?php echo e(route('admin.admissions.index')); ?>" class="btn btn-sm rounded-pill px-3 text-white" style="background:#0077B6;">
            <i class="fas fa-user-plus me-1"></i>Applications
        </a>
    </div>
</div>



<?php
    $convRate  = $pipeline['total'] > 0 ? round(($pipeline['converted'] / $pipeline['total']) * 100) : 0;
    $totalApps = array_sum($enrolmentStats);
    $approvalRate = $totalApps > 0 ? round(($enrolmentStats['approved'] / $totalApps) * 100) : 0;
?>

<div class="overview-bar">
    <div class="overview-bar-header">
        <span class="bar-section-label">
            <i class="fas fa-circle me-1" style="color:#3b82f6;font-size:.45rem;vertical-align:middle;"></i>Leads Pipeline
        </span>
        <span class="bar-section-label">
            <i class="fas fa-circle me-1" style="color:#7c3aed;font-size:.45rem;vertical-align:middle;"></i>Enrolments
        </span>
    </div>

    <div class="overview-stats">

        
        <a href="<?php echo e(route('admin.crm.leads', ['status'=>'new'])); ?>" class="stat-tile st-blue leads-tile">
            <?php if($pipeline['new'] > 0): ?><div class="st-dot" style="background:#3b82f6;"></div><?php endif; ?>
            <div class="st-val"><?php echo e($pipeline['new']); ?></div>
            <div class="st-label">New Leads</div>
            <div class="st-trend">Awaiting contact</div>
        </a>

        <div class="overview-divider"></div>

        <a href="<?php echo e(route('admin.crm.leads', ['status'=>'tour_scheduled'])); ?>" class="stat-tile st-info leads-tile">
            <div class="st-val"><?php echo e($pipeline['tour_scheduled']); ?></div>
            <div class="st-label">Tours Booked</div>
            <div class="st-trend">This pipeline</div>
        </a>

        <div class="overview-divider"></div>

        <a href="<?php echo e(route('admin.crm.leads', ['status'=>'new'])); ?>" class="stat-tile leads-tile <?php echo e($pipeline['overdue'] > 0 ? 'st-alert' : ''); ?>">
            <?php if($pipeline['overdue'] > 0): ?><div class="st-dot" style="background:#ef4444;"></div><?php endif; ?>
            <div class="st-val" style="<?php echo e($pipeline['overdue'] === 0 ? 'color:#adb5bd;' : ''); ?>"><?php echo e($pipeline['overdue']); ?></div>
            <div class="st-label">Overdue</div>
            <div class="st-trend">&gt; 3 days no contact</div>
        </a>

        <div class="overview-divider"></div>

        <a href="<?php echo e(route('admin.crm.leads', ['status'=>'converted'])); ?>" class="stat-tile st-good leads-tile">
            <div class="st-val"><?php echo e($pipeline['converted']); ?></div>
            <div class="st-label">Converted</div>
            <div class="st-bar-track">
                <div class="st-bar-fill" style="width:<?php echo e($convRate); ?>%;background:#16a34a;"></div>
            </div>
            <div class="st-trend"><?php echo e($convRate); ?>% rate</div>
        </a>

        
        <div class="overview-section-sep">
            <div class="sep-line"></div>
        </div>

        
        <a href="<?php echo e(route('admin.admissions.index', ['status'=>'pending'])); ?>" class="stat-tile st-warn enrol-tile">
            <?php if($enrolmentStats['pending'] > 0): ?><div class="st-dot" style="background:#d97706;"></div><?php endif; ?>
            <div class="st-val" style="<?php echo e($enrolmentStats['pending'] === 0 ? 'color:#adb5bd;' : ''); ?>"><?php echo e($enrolmentStats['pending']); ?></div>
            <div class="st-label">Pending Review</div>
            <div class="st-trend">Needs decision</div>
        </a>

        <div class="overview-divider"></div>

        <a href="<?php echo e(route('admin.admissions.index', ['status'=>'under_review'])); ?>" class="stat-tile st-violet enrol-tile">
            <?php if($enrolmentStats['under_review'] > 0): ?><div class="st-dot" style="background:#7c3aed;"></div><?php endif; ?>
            <div class="st-val" style="<?php echo e($enrolmentStats['under_review'] === 0 ? 'color:#adb5bd;' : ''); ?>"><?php echo e($enrolmentStats['under_review']); ?></div>
            <div class="st-label">Under Review</div>
            <div class="st-trend">In progress</div>
        </a>

        <div class="overview-divider"></div>

        <a href="<?php echo e(route('admin.admissions.index', ['status'=>'approved'])); ?>" class="stat-tile st-good enrol-tile">
            <div class="st-val"><?php echo e($enrolmentStats['approved']); ?></div>
            <div class="st-label">Approved</div>
            <div class="st-bar-track">
                <div class="st-bar-fill" style="width:<?php echo e($approvalRate); ?>%;background:#16a34a;"></div>
            </div>
            <div class="st-trend"><?php echo e($approvalRate); ?>% approval</div>
        </a>

        <div class="overview-divider"></div>

        <a href="<?php echo e(route('admin.admissions.index', ['status'=>'waitlist'])); ?>" class="stat-tile enrol-tile">
            <div class="st-val" style="color:#6c757d;"><?php echo e($enrolmentStats['waitlist']); ?></div>
            <div class="st-label">Waitlist</div>
            <div class="st-trend">Holding</div>
        </a>

    </div>
</div>


<div class="row g-4 mb-4">

    
    <div class="col-lg-8">
        <div class="panel h-100">
            <div class="panel-header">
                <h6>
                    <i class="fas fa-calendar-week me-2" style="color:#0097a7;"></i>Tour Calendar
                    <?php $totalTours = collect($weekDays)->sum(fn($d) => $d['leads']->count()); ?>
                    <?php if($totalTours > 0): ?>
                        <span class="rounded-pill ms-2 px-2 py-1" style="background:#e0f7fa;color:#0097a7;font-size:.65rem;font-weight:700;"><?php echo e($totalTours); ?> scheduled</span>
                    <?php endif; ?>
                </h6>
                <a href="<?php echo e(route('admin.crm.leads', ['status'=>'tour_scheduled'])); ?>"
                   class="btn btn-sm btn-outline-secondary rounded-pill px-3" style="font-size:.75rem;">View All</a>
            </div>
            <div class="panel-body">

                
                <?php
                    $tourJson = [];
                    foreach ($weekDays as $dateStr => $dayData) {
                        $tourJson[$dateStr] = $dayData['leads']->map(function($lead) {
                            $tourTime = $lead->tour_scheduled_at
                                ? $lead->tour_scheduled_at->format('H:i')
                                : $lead->preferred_time;
                            $wa = preg_replace('/[^0-9]/','', $lead->phone);
                            if(str_starts_with($wa,'0')) $wa = '27'.substr($wa,1);
                            return [
                                'child'   => $lead->child_name,
                                'parent'  => $lead->name,
                                'age'     => $lead->child_age,
                                'time'    => $tourTime,
                                'wa'      => $wa,
                                'url'     => route('admin.crm.leads.show', $lead->id),
                            ];
                        })->values()->toArray();
                    }
                    $todayKey = today()->format('Y-m-d');
                ?>

                <div class="d-flex gap-3">

                    
                    <div style="flex-shrink:0;">
                        <div class="micro-label mb-2">Select a day</div>
                        <div class="d-flex flex-column gap-1" id="cal-day-list">
                            <?php $__currentLoopData = $weekDays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dateStr => $dayData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $hasTours = $dayData['leads']->count() > 0;
                                $isPast   = $dayData['past'];
                                $isToday  = $dayData['date']->isToday();
                            ?>
                            <button type="button"
                                class="cal-day-btn <?php echo e($isToday ? 'active' : ''); ?> <?php echo e(($isPast && $hasTours && !$isToday) ? 'overdue-btn' : ''); ?>"
                                data-date="<?php echo e($dateStr); ?>">
                                <div class="cal-day-btn__date">
                                    <div class="cal-day-btn__dow"><?php echo e($isToday ? 'Today' : $dayData['date']->format('D')); ?></div>
                                    <div class="cal-day-btn__num"><?php echo e($dayData['date']->format('d')); ?></div>
                                    <div class="cal-day-btn__mon"><?php echo e($dayData['date']->format('M')); ?></div>
                                </div>
                                <div class="cal-day-btn__info">
                                    <?php if($hasTours): ?>
                                        <div class="cal-day-btn__count">
                                            <?php echo e($dayData['leads']->count()); ?> tour<?php echo e($dayData['leads']->count()!==1?'s':''); ?>

                                        </div>
                                        <?php if($isPast && !$isToday): ?>
                                            <div class="cal-day-btn__overdue">⚠ overdue</div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="cal-day-btn__empty">No tours</div>
                                    <?php endif; ?>
                                </div>
                            </button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    
                    <div style="flex:1;min-width:0;">
                        <div class="micro-label mb-2" id="cal-pane-label">Today's Tours</div>
                        <div id="cal-tour-pane">
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    
    <div class="col-lg-4">
        <div class="panel h-100">
            <div class="panel-header">
                <h6><i class="fas fa-graduation-cap me-2" style="color:#7c3aed;"></i>Enrolment Status</h6>
                <a href="<?php echo e(route('admin.admissions.index')); ?>"
                   class="btn btn-sm btn-outline-secondary rounded-pill px-3" style="font-size:.75rem;">View All</a>
            </div>
            <div class="panel-body">
                <?php $__currentLoopData = [
                    ['key'=>'pending',      'label'=>'Pending Review', 'color'=>'#d97706', 'bg'=>'#fff7ed'],
                    ['key'=>'under_review', 'label'=>'Under Review',   'color'=>'#7c3aed', 'bg'=>'#f5f3ff'],
                    ['key'=>'approved',     'label'=>'Approved',       'color'=>'#16a34a', 'bg'=>'#f0fdf4'],
                    ['key'=>'waitlist',     'label'=>'Waiting List',   'color'=>'#6c757d', 'bg'=>'#f8f9fa'],
                    ['key'=>'rejected',     'label'=>'Rejected',       'color'=>'#ef4444', 'bg'=>'#fff0f0'],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="enrol-row">
                    <div class="d-flex align-items-center gap-2">
                        <div class="enrol-dot" style="background:<?php echo e($row['color']); ?>;"></div>
                        <span style="font-size:.84rem;color:#374151;"><?php echo e($row['label']); ?></span>
                    </div>
                    <a href="<?php echo e(route('admin.admissions.index', ['status'=>$row['key']])); ?>"
                       class="enrol-pill" style="background:<?php echo e($row['bg']); ?>;color:<?php echo e($row['color']); ?>;">
                        <?php echo e($enrolmentStats[$row['key']] ?? 0); ?>

                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="mt-4 pt-3" style="border-top:1px solid #f3f4f6;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span style="font-size:.8rem;color:#6c757d;">Total Applications</span>
                        <strong style="font-size:.9rem;color:#1a1f2e;"><?php echo e($totalApps); ?></strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span style="font-size:.8rem;color:#6c757d;">Approval Rate</span>
                        <strong style="font-size:.9rem;color:#16a34a;"><?php echo e($approvalRate); ?>%</strong>
                    </div>

                    <div class="micro-label mb-2">Lead Conversion</div>
                    <?php $lostPct = $pipeline['total'] > 0 ? round(($pipeline['lost']/$pipeline['total'])*100) : 0; ?>
                    <?php $__currentLoopData = [
                        ['label'=>'Converted', 'pct'=>$convRate,  'color'=>'#16a34a', 'val'=>$pipeline['converted']],
                        ['label'=>'Lost',      'pct'=>$lostPct,   'color'=>'#ef4444', 'val'=>$pipeline['lost']],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span style="width:60px;font-size:.74rem;color:#6c757d;"><?php echo e($bar['label']); ?></span>
                        <div class="flex-grow-1" style="background:#f3f4f6;border-radius:4px;height:6px;overflow:hidden;">
                            <div style="width:<?php echo e(max($bar['pct'],0)); ?>%;height:6px;border-radius:4px;background:<?php echo e($bar['color']); ?>;"></div>
                        </div>
                        <span style="width:18px;font-size:.74rem;font-weight:700;color:#1a1f2e;text-align:right;"><?php echo e($bar['val']); ?></span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="text-center mt-3">
                        <span style="font-size:1.3rem;font-weight:800;color:#16a34a;"><?php echo e($convRate); ?>%</span>
                        <span style="font-size:.76rem;color:#adb5bd;"> conversion rate</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row g-4">
    <div class="col-lg-12">
        <div class="panel h-100">
            <div class="panel-header">
                <h6>
                    <i class="fas fa-file-alt me-2" style="color:#d97706;"></i>Applications Needing a Decision
                    <?php if(($enrolmentStats['pending'] + $enrolmentStats['under_review']) > 0): ?>
                    <span class="rounded-pill ms-2 px-2 py-1" style="background:#fff7ed;color:#d97706;font-size:.62rem;font-weight:700;">
                        <?php echo e($enrolmentStats['pending'] + $enrolmentStats['under_review']); ?> pending
                    </span>
                    <?php endif; ?>
                </h6>
                <a href="<?php echo e(route('admin.admissions.index', ['status'=>'pending'])); ?>"
                   class="btn btn-sm btn-outline-secondary rounded-pill px-3" style="font-size:.75rem;">View All →</a>
            </div>
            <table class="table app-table mb-0">
                <thead>
                    <tr>
                        <th>Child &amp; Parent</th>
                        <th>Programme</th>
                        <th>Start</th>
                        <th>Docs</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $actionableApps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <div class="fw-semibold" style="color:#1a1f2e;"><?php echo e($app->child_name); ?></div>
                            <div style="font-size:.76rem;color:#adb5bd;"><?php echo e($app->mother_name); ?></div>
                        </td>
                        <td>
                            <div style="color:#374151;font-size:.85rem;"><?php echo e($app->program_name); ?></div>
                            <div style="font-size:.74rem;color:#adb5bd;"><?php echo e(ucfirst($app->fee_option)); ?></div>
                        </td>
                        <td style="color:#374151;font-size:.85rem;"><?php echo e($app->start_date->format('d M Y')); ?></td>
                        <td>
                            <?php $dc = $app->documentsCount(); ?>
                            <?php if($dc >= 3): ?>
                                <span style="color:#16a34a;font-size:.8rem;"><i class="fas fa-check-circle me-1"></i><?php echo e($dc); ?>/4</span>
                            <?php elseif($dc > 0): ?>
                                <span style="color:#d97706;font-size:.8rem;"><i class="fas fa-exclamation-circle me-1"></i><?php echo e($dc); ?>/4</span>
                            <?php else: ?>
                                <span style="color:#ef4444;font-size:.8rem;"><i class="fas fa-times-circle me-1"></i>None</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="rounded-pill px-2 py-1" style="<?php echo e($app->status==='pending' ? 'background:#fff7ed;color:#d97706;' : 'background:#f5f3ff;color:#7c3aed;'); ?>font-size:.71rem;font-weight:600;">
                                <?php echo e($app->statusLabel()); ?>

                            </span>
                            <div style="font-size:.7rem;color:#adb5bd;margin-top:3px;"><?php echo e($app->created_at->diffForHumans(null,true,true)); ?></div>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="<?php echo e(route('admin.admissions.show', $app->id)); ?>"
                                   class="btn btn-sm py-1 px-2" style="background:#eff6ff;color:#3b82f6;border:1px solid #dbeafe;font-size:.74rem;">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="<?php echo e(route('admin.admissions.approve', $app->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-sm py-1 px-2" style="background:#f0fdf4;color:#16a34a;border:1px solid #dcfce7;font-size:.74rem;"
                                            onclick="return confirm('Approve <?php echo e($app->child_name); ?>?')">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div style="font-size:2rem;margin-bottom:8px;">✅</div>
                            <div class="fw-semibold" style="color:#1a1f2e;font-size:.9rem;">All caught up!</div>
                            <div style="font-size:.8rem;color:#adb5bd;margin-top:4px;">No applications waiting for a decision</div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    





























</div>

<?php $__env->startPush('scripts'); ?>
<script>
(function () {
    const tours   = <?php echo json_encode($tourJson, 15, 512) ?>;
    const todayKey = '<?php echo e($todayKey); ?>';

    function renderPane(dateKey) {
        const list  = tours[dateKey] || [];
        const btn   = document.querySelector(`.cal-day-btn[data-date="${dateKey}"]`);
        const label = document.getElementById('cal-pane-label');
        const pane  = document.getElementById('cal-tour-pane');

        // Update label
        const d = new Date(dateKey + 'T00:00:00');
        const opts = { weekday:'long', day:'numeric', month:'long' };
        const isToday = dateKey === todayKey;
        const isPast  = dateKey < todayKey;
        label.innerHTML = isToday
            ? '📅 Today &mdash; ' + d.toLocaleDateString('en-ZA', { day:'numeric', month:'long' })
            : (isPast ? '⚠️ ' : '') + d.toLocaleDateString('en-ZA', opts);
        label.style.color = isPast && !isToday ? '#ef4444' : '';

        if (list.length === 0) {
            pane.innerHTML = `
                <div style="text-align:center;padding:32px 0;">
                    <div style="font-size:1.8rem;margin-bottom:8px;">🌟</div>
                    <div style="font-weight:600;color:#1a1f2e;font-size:.9rem;">No tours on this day</div>
                    <div style="font-size:.78rem;color:#adb5bd;margin-top:4px;">Select another day or book a new tour</div>
                </div>`;
            return;
        }

        pane.innerHTML = list.map(t => `
            <div class="tour-row">
                <div class="tour-time-pill" style="${isPast ? 'background:#fff0f0;color:#ef4444;' : ''}">${t.time}</div>
                <div style="flex:1;min-width:0;">
                    <div style="font-weight:600;font-size:.85rem;color:#1a1f2e;">${t.child}</div>
                    <div style="font-size:.74rem;color:#adb5bd;">${t.parent} &bull; ${t.age}</div>
                </div>
                <div style="display:flex;gap:4px;flex-shrink:0;">
                    <a href="https://wa.me/${t.wa}" target="_blank"
                       style="background:#f0fdf4;color:#16a34a;border:1px solid #dcfce7;font-size:.7rem;padding:2px 8px;border-radius:6px;text-decoration:none;">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="${t.url}"
                       style="background:#eff6ff;color:#3b82f6;border:1px solid #dbeafe;font-size:.7rem;padding:2px 8px;border-radius:6px;text-decoration:none;">
                        View
                    </a>
                </div>
            </div>`).join('');
    }

    // Highlight active button
    function setActive(dateKey) {
        document.querySelectorAll('.cal-day-btn').forEach(btn => {
            const isThis  = btn.dataset.date === dateKey;
            const isPast  = btn.dataset.date < todayKey;
            const hasTours = (tours[btn.dataset.date] || []).length > 0;

            btn.classList.toggle('active', isThis);
            btn.classList.toggle('overdue-btn', isPast && hasTours && btn.dataset.date !== todayKey);
        });
    }

    // Wire up clicks
    document.querySelectorAll('.cal-day-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const dateKey = btn.dataset.date;
            setActive(dateKey);
            renderPane(dateKey);
        });
    });

    // Default: show today
    setActive(todayKey);
    renderPane(todayKey);
})();
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>