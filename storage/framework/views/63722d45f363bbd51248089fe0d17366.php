<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('portal-name', 'Teacher Portal'); ?>
<?php $__env->startSection('page-title', 'My Dashboard'); ?>

<?php $__env->startSection('sidebar-nav'); ?>
<a href="<?php echo e(route('teacher.dashboard')); ?>" class="nav-link active">
    <i class="fas fa-home"></i> Dashboard
</a>
<a href="<?php echo e(route('teacher.attendance')); ?>" class="nav-link">
    <i class="fas fa-clipboard-check"></i> Attendance
</a>
<a href="<?php echo e(route('teacher.class')); ?>" class="nav-link">
    <i class="fas fa-chalkboard-teacher"></i> My Class
</a>
<a href="<?php echo e(route('teacher.students')); ?>" class="nav-link">
    <i class="fas fa-users"></i> Students
</a>
<a href="<?php echo e(route('teacher.updates')); ?>" class="nav-link">
    <i class="fas fa-comment-dots"></i> Daily Updates
</a>
<a href="<?php echo e(route('teacher.gallery')); ?>" class="nav-link">
    <i class="fas fa-camera"></i> Photo Gallery
</a>

<div class="nav-section-title">Account</div>
<a href="<?php echo e(route('teacher.profile')); ?>" class="nav-link">
    <i class="fas fa-user-cog"></i> Profile
</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Welcome Banner -->
<div class="portal-card mb-4" style="background: linear-gradient(135deg, #B5D8EB 0%, #FFB5BA 100%);">
    <div class="portal-card-body">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h3 class="mb-2">Good <?php echo e(date('H') < 12 ? 'Morning' : (date('H') < 17 ? 'Afternoon' : 'Evening')); ?>, <?php echo e($teacher['name'] ?? 'Sarah'); ?>!</h3>
                <p class="mb-0"><?php echo e($teacher['class'] ?? 'Preschool'); ?> | Today is <?php echo e(date('l, F j, Y')); ?></p>
            </div>
            <div class="col-md-4 text-end d-none d-md-block">
                <img src="<?php echo e(asset('assets/img/peekaboo/logo.png')); ?>" alt="Peekaboo" style="height: 60px; opacity: 0.8;">
            </div>
        </div>
    </div>
</div>

<!-- Today's Stats -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="portal-card">
            <div class="portal-card-body text-center">
                <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                    <i class="fas fa-users fa-lg text-success"></i>
                </div>
                <div class="h3 fw-bold mb-0"><?php echo e($stats['present'] ?? 14); ?></div>
                <small class="text-muted">Present Today</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="portal-card">
            <div class="portal-card-body text-center">
                <div class="rounded-circle bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                    <i class="fas fa-user-times fa-lg text-danger"></i>
                </div>
                <div class="h3 fw-bold mb-0"><?php echo e($stats['absent'] ?? 2); ?></div>
                <small class="text-muted">Absent</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="portal-card">
            <div class="portal-card-body text-center">
                <div class="rounded-circle bg-warning bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                    <i class="fas fa-comment-dots fa-lg text-warning"></i>
                </div>
                <div class="h3 fw-bold mb-0"><?php echo e($stats['updates_sent'] ?? 12); ?></div>
                <small class="text-muted">Updates Sent</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="portal-card">
            <div class="portal-card-body text-center">
                <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                    <i class="fas fa-birthday-cake fa-lg text-primary"></i>
                </div>
                <div class="h3 fw-bold mb-0"><?php echo e($stats['birthdays'] ?? 1); ?></div>
                <small class="text-muted">Birthday Today</small>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions & Today's Tasks -->
<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <div class="portal-card h-100">
            <div class="portal-card-header">
                <i class="fas fa-bolt me-2 text-warning"></i> Quick Actions
            </div>
            <div class="portal-card-body">
                <div class="row g-3">
                    <div class="col-6">
                        <a href="<?php echo e(route('teacher.attendance')); ?>" class="quick-action">
                            <div class="icon bg-success bg-opacity-10">
                                <i class="fas fa-clipboard-check text-success"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">Take Attendance</div>
                                <small class="text-muted">Mark present/absent</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="<?php echo e(route('teacher.updates')); ?>" class="quick-action">
                            <div class="icon bg-primary bg-opacity-10">
                                <i class="fas fa-comment-dots text-primary"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">Send Update</div>
                                <small class="text-muted">Message parents</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="<?php echo e(route('teacher.gallery')); ?>" class="quick-action">
                            <div class="icon bg-warning bg-opacity-10">
                                <i class="fas fa-camera text-warning"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">Upload Photos</div>
                                <small class="text-muted">Add to gallery</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="<?php echo e(route('teacher.students')); ?>" class="quick-action">
                            <div class="icon bg-info bg-opacity-10">
                                <i class="fas fa-users text-info"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">View Students</div>
                                <small class="text-muted">Class roster</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="portal-card h-100">
            <div class="portal-card-header">
                <i class="fas fa-tasks me-2 text-primary"></i> Today's Tasks
            </div>
            <div class="portal-card-body p-0">
                <?php
                    $tasks = [
                        ['title' => 'Complete attendance register', 'done' => false, 'time' => '09:00'],
                        ['title' => 'Send daily updates to all parents', 'done' => false, 'time' => '15:00'],
                        ['title' => 'Prepare art supplies for tomorrow', 'done' => false, 'time' => '16:00'],
                        ['title' => 'Update learning journal - Emma', 'done' => true, 'time' => '14:00'],
                    ];
                ?>
                <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="d-flex gap-3 p-3 border-bottom align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" <?php echo e($task['done'] ? 'checked' : ''); ?>>
                    </div>
                    <div class="flex-grow-1">
                        <div class="<?php echo e($task['done'] ? 'text-decoration-line-through text-muted' : ''); ?>"><?php echo e($task['title']); ?></div>
                    </div>
                    <small class="text-muted"><?php echo e($task['time']); ?></small>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<!-- Class Overview & Reminders -->
<div class="row g-4">
    <div class="col-lg-8">
        <div class="portal-card">
            <div class="portal-card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-users me-2"></i> My Class - <?php echo e($teacher['class'] ?? 'Preschool'); ?></span>
                <a href="<?php echo e(route('teacher.class')); ?>" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="portal-card-body">
                <div class="row g-3">
                    <?php
                        $students = [
                            ['name' => 'Emma Thompson', 'status' => 'present', 'mood' => 'happy'],
                            ['name' => 'Liam Johnson', 'status' => 'present', 'mood' => 'happy'],
                            ['name' => 'Ava Williams', 'status' => 'absent', 'mood' => null],
                            ['name' => 'Noah Brown', 'status' => 'present', 'mood' => 'okay'],
                            ['name' => 'Sophia Davis', 'status' => 'present', 'mood' => 'happy'],
                            ['name' => 'Oliver Wilson', 'status' => 'present', 'mood' => 'happy'],
                        ];
                    ?>
                    <?php $__currentLoopData = array_slice($students, 0, 6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="border rounded p-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-<?php echo e($student['status'] == 'present' ? 'success' : 'danger'); ?> bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fas fa-user text-<?php echo e($student['status'] == 'present' ? 'success' : 'danger'); ?>"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold small"><?php echo e($student['name']); ?></div>
                                    <small class="text-muted"><?php echo e(ucfirst($student['status'])); ?></small>
                                </div>
                                <?php if($student['mood']): ?>
                                <div>
                                    <?php if($student['mood'] == 'happy'): ?>
                                    <i class="fas fa-smile text-success"></i>
                                    <?php elseif($student['mood'] == 'okay'): ?>
                                    <i class="fas fa-meh text-warning"></i>
                                    <?php else: ?>
                                    <i class="fas fa-frown text-danger"></i>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="portal-card">
            <div class="portal-card-header">
                <i class="fas fa-bell me-2"></i> Reminders
            </div>
            <div class="portal-card-body p-0">
                <div class="p-3 border-bottom">
                    <div class="d-flex gap-2 align-items-start">
                        <i class="fas fa-birthday-cake text-primary"></i>
                        <div>
                            <div class="fw-semibold small">Emma's Birthday</div>
                            <small class="text-muted">Today - Remember to celebrate!</small>
                        </div>
                    </div>
                </div>
                <div class="p-3 border-bottom">
                    <div class="d-flex gap-2 align-items-start">
                        <i class="fas fa-exclamation-triangle text-warning"></i>
                        <div>
                            <div class="fw-semibold small">Allergy Alert</div>
                            <small class="text-muted">Liam - Severe nut allergy</small>
                        </div>
                    </div>
                </div>
                <div class="p-3 border-bottom">
                    <div class="d-flex gap-2 align-items-start">
                        <i class="fas fa-bus text-info"></i>
                        <div>
                            <div class="fw-semibold small">Field Trip</div>
                            <small class="text-muted">Friday - Cape Point Nature Reserve</small>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <div class="d-flex gap-2 align-items-start">
                        <i class="fas fa-calendar-alt text-success"></i>
                        <div>
                            <div class="fw-semibold small">Parent Meeting</div>
                            <small class="text-muted">Next Wednesday at 4pm</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/teacher/dashboard.blade.php ENDPATH**/ ?>