<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Portal'); ?> - Peekaboo</title>

    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/peekaboo/logo.png')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/fontawesome.min.css')); ?>">

    <style>
        :root {
            --sidebar-width: 260px;
            --header-height: 65px;
            --primary: #0077B6;
            --primary-dark: #005a8c;
            --dark: #2D3436;
            --light: #f8f9fa;
            --border: #e9ecef;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f6fa;
            margin: 0;
        }

        .portal-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: white;
            border-right: 1px solid var(--border);
            z-index: 1000;
            overflow-y: auto;
            transition: transform 0.3s ease;
        }

        .sidebar-brand {
            padding: 22px 20px 18px;
            display: flex;
            align-items: center;
            gap: 14px;
            border-bottom: 1px solid var(--border);
            background: linear-gradient(135deg, #f0f9ff 0%, #fef1f2 100%);
            position: relative;
        }

        .sidebar-brand::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 20px;
            right: 20px;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), #00B4D8, #FFB5BA);
            border-radius: 2px;
        }

        .sidebar-brand-logo {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            overflow: hidden;
            flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(0, 119, 182, 0.15);
            border: 2px solid white;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .sidebar-brand-text {
            display: flex;
            flex-direction: column;
            gap: 1px;
            min-width: 0;
        }

        .sidebar-brand-title {
            font-weight: 800;
            font-size: 1.05rem;
            color: var(--dark);
            letter-spacing: -0.3px;
            line-height: 1.2;
        }

        .sidebar-brand-subtitle {
            font-size: 0.68rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--primary);
            line-height: 1.3;
        }

        .sidebar-nav {
            padding: 20px 15px;
        }

        .nav-section-title {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #999;
            padding: 10px 15px;
            margin-top: 15px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            color: #666;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.2s ease;
            font-size: 0.9rem;
            margin-bottom: 4px;
        }

        .nav-link:hover {
            background: #f5f5f5;
            color: var(--primary);
        }

        .nav-link.active {
            background: linear-gradient(135deg, var(--primary) 0%, #00B4D8 100%);
            color: white;
        }

        .nav-link i {
            width: 20px;
            text-align: center;
        }

        .portal-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        .portal-header {
            position: sticky;
            top: 0;
            background: white;
            height: var(--header-height);
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border);
            z-index: 100;
        }

        .portal-content {
            padding: 30px;
        }

        .portal-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.04);
            overflow: hidden;
        }

        .portal-card-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            font-weight: 600;
        }

        .portal-card-body {
            padding: 24px;
        }

        .child-card {
            background: linear-gradient(135deg, #B5D8EB 0%, #FFB5BA 100%);
            border-radius: 16px;
            padding: 24px;
            color: var(--dark);
        }

        .child-card h4 {
            margin-bottom: 5px;
        }

        .btn-portal {
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .btn-portal-primary {
            background: var(--primary);
            color: white;
            border: none;
        }

        .btn-portal-primary:hover {
            background: var(--primary-dark);
            color: white;
        }

        .quick-action {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 12px;
            text-decoration: none;
            color: var(--dark);
            transition: all 0.2s ease;
        }

        .quick-action:hover {
            background: #e9ecef;
            color: var(--primary);
            transform: translateY(-2px);
        }

        .quick-action .icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .portal-toast {
            position: fixed;
            top: 80px;
            right: 30px;
            z-index: 9999;
            padding: 15px 25px;
            border-radius: 10px;
            color: white;
            font-weight: 500;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            animation: slideIn 0.3s ease;
        }

        .portal-toast.success { background: #28a745; }

        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @media(max-width: 992px) {
            .portal-sidebar {
                transform: translateX(-100%);
            }
            .portal-sidebar.show {
                transform: translateX(0);
            }
            .portal-main {
                margin-left: 0;
            }
            .mobile-toggle {
                display: block !important;
            }
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <!-- Sidebar -->
    <aside class="portal-sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-brand-logo">
                <img src="<?php echo e(asset('assets/img/peekaboo/peekaboo_logo.png')); ?>" alt="Peekaboo" onerror="this.src='<?php echo e(asset('assets/img/peekaboo/logo.png')); ?>'">
            </div>
            <div class="sidebar-brand-text">
                <span class="sidebar-brand-title">Peekaboo</span>
                <span class="sidebar-brand-subtitle"><?php echo $__env->yieldContent('portal-name', 'Portal'); ?></span>
            </div>
        </div>

        <nav class="sidebar-nav">
            <?php echo $__env->yieldContent('sidebar-nav'); ?>

            <div class="nav-section-title" style="margin-top: 20px;">Session</div>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="nav-link text-danger w-100 border-0 bg-transparent text-start" style="cursor: pointer;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="portal-main">
        <header class="portal-header">
            <div class="d-flex align-items-center gap-3">
                <button class="mobile-toggle" onclick="document.getElementById('sidebar').classList.toggle('show')">
                    <i class="fas fa-bars"></i>
                </button>
                <h5 class="mb-0 fw-bold"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h5>
            </div>

            <div class="d-flex align-items-center gap-4">
                <?php echo $__env->yieldContent('header-actions'); ?>
                <div class="dropdown">
                    <div class="d-flex align-items-center gap-2" data-bs-toggle="dropdown" style="cursor: pointer;">
                        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center text-white fw-bold" style="width: 38px; height: 38px; font-size: 14px; flex-shrink: 0;">
                            <?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?>

                        </div>
                        <div class="d-none d-md-block">
                            <div class="fw-semibold" style="font-size: 14px; line-height: 1.2;"><?php echo e(auth()->user()->name); ?></div>
                            <div class="text-muted" style="font-size: 12px;"><?php echo e(ucfirst(auth()->user()->getRoleNames()->first() ?? 'User')); ?></div>
                        </div>
                        <i class="fas fa-chevron-down text-muted"></i>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="portal-content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

    <?php if(session('success')): ?>
    <div class="portal-toast success" id="toast">
        <i class="fas fa-check-circle me-2"></i> <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <script src="<?php echo e(asset('assets/js/vendor/jquery-3.7.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <script>
        setTimeout(function() {
            const toast = document.getElementById('toast');
            if (toast) {
                toast.style.animation = 'slideIn 0.3s ease reverse';
                setTimeout(() => toast.remove(), 300);
            }
        }, 5000);
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/layouts/portal.blade.php ENDPATH**/ ?>