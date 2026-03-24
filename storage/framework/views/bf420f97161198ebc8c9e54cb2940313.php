<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Admin'); ?> - Peekaboo Admin</title>

    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/peekaboo/logo.png')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/fontawesome.min.css')); ?>">

    <style>
        :root {
            --sidebar-w: 252px;
            --header-h: 56px;
            --primary: #0077B6;
            --primary-dark: #005a8c;
            --secondary: #6c757d;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --info: #17a2b8;
            --dark: #2D3436;
            --light: #f8f9fa;
            --border: #e9ecef;
            --text: #1a1a2e;
            --text-secondary: #697386;
            --bg: #f7f8fa;
        }

        * { box-sizing: border-box; margin: 0; }
        body { font-family: 'Inter', -apple-system, system-ui, sans-serif; background: var(--bg); color: var(--text); }

        /* ───────────── SIDEBAR ───────────── */
        .sb {
            position: fixed; top: 0; left: 0;
            width: var(--sidebar-w); height: 100vh;
            background: #fff;
            border-right: 1px solid #eaedf0;
            display: flex; flex-direction: column;
            z-index: 1000;
            transition: transform .25s ease;
        }

        /* brand */
        .sb-brand {
            padding: 22px 20px 18px;
            border-bottom: 1px solid #eaedf0;
            display: flex;
            align-items: center;
            gap: 14px;
            background: linear-gradient(135deg, #f0f7ff 0%, #fef1f2 100%);
            position: relative;
        }
        .sb-brand::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 20px;
            right: 20px;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), #00B4D8, #FFB5BA);
            border-radius: 2px;
        }
        .sb-brand-logo {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            overflow: hidden;
            flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(0, 119, 182, 0.15);
            border: 2px solid #fff;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .sb-brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .sb-brand-text {
            display: flex;
            flex-direction: column;
            gap: 1px;
            min-width: 0;
        }
        .sb-brand-title {
            font-weight: 800;
            font-size: 1.05rem;
            color: var(--dark);
            letter-spacing: -0.3px;
            line-height: 1.2;
        }
        .sb-brand-subtitle {
            font-size: .65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--primary);
            line-height: 1.3;
        }

        /* scrollable nav */
        .sb-nav {
            flex: 1; overflow-y: auto; padding: 4px 0;
            scrollbar-width: none;
        }
        .sb-nav::-webkit-scrollbar { display: none; }

        /* section heading */
        .sb-heading {
            padding: 20px 20px 6px;
            font-size: .65rem; font-weight: 600; text-transform: uppercase;
            letter-spacing: .08em; color: #a3acb9;
        }
        .sb-heading:first-child { padding-top: 8px; }

        /* link */
        .sb-link {
            display: flex; align-items: center; gap: 10px;
            padding: 7px 20px; margin: 1px 8px;
            font-size: .835rem; font-weight: 500; color: var(--text-secondary);
            text-decoration: none; border-radius: 6px;
            transition: background .12s, color .12s;
            position: relative;
        }
        .sb-link i { width: 16px; text-align: center; font-size: .8rem; opacity: .55; transition: opacity .12s; }
        .sb-link:hover { background: #f4f5f7; color: var(--text); }
        .sb-link:hover i { opacity: .85; }

        .sb-link.active {
            background: #f0f7ff; color: var(--primary); font-weight: 600;
        }
        .sb-link.active i { opacity: 1; color: var(--primary); }
        .sb-link.active::before {
            content: ''; position: absolute; left: -8px; top: 6px; bottom: 6px;
            width: 3px; border-radius: 0 3px 3px 0; background: var(--primary);
        }

        /* count badge */
        .sb-count {
            margin-left: auto;
            min-width: 18px; height: 18px; padding: 0 5px;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: .65rem; font-weight: 700; border-radius: 9px;
            background: #eff1f3; color: var(--text-secondary);
        }
        .sb-link.active .sb-count { background: #dbeafe; color: var(--primary); }

        /* divider */
        .sb-divider { height: 1px; background: #eaedf0; margin: 8px 20px; }

        /* footer */
        .sb-footer {
            border-top: 1px solid #eaedf0;
            padding: 14px 16px;
            display: flex; align-items: center; gap: 10px;
        }
        .sb-avatar {
            width: 32px; height: 32px; border-radius: 50%;
            background: var(--primary); color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-size: .72rem; font-weight: 700; flex-shrink: 0;
        }
        .sb-footer-name { font-size: .8rem; font-weight: 600; color: var(--text); line-height: 1.2; }
        .sb-footer-role { font-size: .68rem; color: #a3acb9; }
        .sb-footer-info { flex: 1; min-width: 0; }
        .sb-footer-info > * { white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; }
        .sb-logout {
            width: 28px; height: 28px; border-radius: 6px;
            border: 1px solid #eaedf0; background: #fff;
            display: flex; align-items: center; justify-content: center;
            color: #a3acb9; font-size: .7rem; cursor: pointer;
            transition: border-color .15s, color .15s;
        }
        .sb-logout:hover { border-color: #d1d5db; color: var(--danger); }

        /* ───────────── MAIN ───────────── */
        .admin-main { margin-left: var(--sidebar-w); min-height: 100vh; }

        .admin-header {
            position: sticky; top: 0; height: var(--header-h);
            background: rgba(255,255,255,.92);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid #eaedf0;
            padding: 0 28px; display: flex; align-items: center;
            justify-content: space-between; z-index: 100;
        }

        .admin-content { padding: 28px; }

        /* header left */
        .hdr-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        /* breadcrumb */
        .hdr-breadcrumb {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: .8125rem;
            color: var(--text-secondary);
        }
        .hdr-breadcrumb a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: color .15s;
        }
        .hdr-breadcrumb a:hover { color: var(--primary); }
        .hdr-breadcrumb .separator {
            color: #d1d5db;
            font-size: .65rem;
        }
        .hdr-breadcrumb .current {
            color: var(--text);
            font-weight: 600;
        }

        /* header search */
        .hdr-search-wrap {
            position: relative;
        }
        .hdr-search-wrap .search-icon {
            position: absolute;
            left: 11px;
            top: 50%;
            transform: translateY(-50%);
            color: #a3acb9;
            font-size: .78rem;
            pointer-events: none;
            transition: color .15s;
        }
        .hdr-search {
            border: 1px solid #e3e5e8;
            border-radius: 8px;
            padding: 7px 12px 7px 32px;
            font-size: .8125rem;
            font-family: inherit;
            width: 240px;
            background: var(--bg);
            color: var(--text);
            transition: border-color .15s, background .15s, box-shadow .15s, width .2s;
        }
        .hdr-search:focus {
            outline: none;
            border-color: var(--primary);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(0,119,182,.08);
            width: 280px;
        }
        .hdr-search:focus + .search-icon,
        .hdr-search-wrap:focus-within .search-icon { color: var(--primary); }
        .hdr-search::placeholder { color: #a3acb9; }

        /* header right */
        .hdr-right {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* header icon button (bell, etc.) */
        .hdr-icon-btn {
            position: relative;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: 1px solid transparent;
            background: none;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            font-size: .95rem;
            cursor: pointer;
            text-decoration: none;
            transition: background .15s, border-color .15s, color .15s;
        }
        .hdr-icon-btn:hover {
            background: #f4f5f7;
            border-color: #eaedf0;
            color: var(--text);
        }
        .hdr-icon-btn .notif-dot {
            position: absolute;
            top: 7px;
            right: 7px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--danger);
            border: 2px solid #fff;
        }

        /* header divider */
        .hdr-divider {
            width: 1px;
            height: 24px;
            background: #eaedf0;
            margin: 0 8px;
        }

        /* header user */
        .hdr-user {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 4px 8px 4px 4px;
            border-radius: 8px;
            border: 1px solid transparent;
            transition: background .15s, border-color .15s;
        }
        .hdr-user:hover {
            background: #f4f5f7;
            border-color: #eaedf0;
        }
        .hdr-user-avatar {
            width: 32px; height: 32px; border-radius: 8px;
            background: linear-gradient(135deg, var(--primary) 0%, #00B4D8 100%);
            color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-size: .7rem; font-weight: 700; flex-shrink: 0;
        }
        .hdr-user-info {
            line-height: 1.2;
        }
        .hdr-user-name {
            font-size: .8125rem;
            font-weight: 600;
            color: var(--text);
        }
        .hdr-user-role {
            font-size: .6875rem;
            color: #a3acb9;
        }
        .hdr-user-chevron {
            font-size: .55rem;
            color: #a3acb9;
            margin-left: 2px;
            transition: transform .2s;
        }
        .hdr-user[aria-expanded="true"] .hdr-user-chevron {
            transform: rotate(180deg);
        }

        /* dropdown menu */
        .hdr-dropdown {
            border-radius: 10px;
            border: 1px solid #eaedf0;
            box-shadow: 0 8px 30px rgba(0,0,0,.08), 0 1px 3px rgba(0,0,0,.04);
            margin-top: 6px;
            padding: 4px;
            min-width: 200px;
            overflow: hidden;
        }
        .hdr-dropdown .dropdown-item {
            font-size: .8125rem;
            padding: 8px 12px;
            border-radius: 6px;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background .12s;
        }
        .hdr-dropdown .dropdown-item:hover {
            background: #f4f5f7;
        }
        .hdr-dropdown .dropdown-item i {
            width: 16px;
            text-align: center;
            font-size: .78rem;
            color: #a3acb9;
        }
        .hdr-dropdown .dropdown-divider {
            margin: 4px 0;
            border-color: #eaedf0;
        }
        .hdr-dropdown .dropdown-item.text-danger {
            color: var(--danger);
        }
        .hdr-dropdown .dropdown-item.text-danger i {
            color: var(--danger);
        }

        /* stat cards */
        .stat-card {
            background: #fff; border-radius: 10px; padding: 22px;
            border: 1px solid #eaedf0;
            transition: box-shadow .2s;
        }
        .stat-card:hover { box-shadow: 0 4px 16px rgba(0,0,0,.05); }
        .stat-card .icon {
            width: 44px; height: 44px; border-radius: 10px;
            display: flex; align-items: center; justify-content: center; font-size: 1.15rem;
        }
        .stat-card .value { font-size: 1.75rem; font-weight: 700; line-height: 1; }
        .stat-card .label { color: var(--text-secondary); font-size: .82rem; }

        /* tables */
        .admin-table { background: #fff; border-radius: 10px; overflow: hidden; border: 1px solid #eaedf0; }
        .admin-table .table { margin-bottom: 0; }
        .admin-table th {
            background: #fafbfc; font-weight: 600; font-size: .75rem;
            text-transform: uppercase; letter-spacing: .04em; color: #a3acb9;
            border-bottom: 1px solid #eaedf0;
        }
        .admin-table td { vertical-align: middle; }

        /* badges */
        .status-badge { padding: 5px 10px; border-radius: 6px; font-size: .72rem; font-weight: 600; }
        .status-pending { background: #fef9c3; color: #854d0e; }
        .status-approved { background: #dcfce7; color: #166534; }
        .status-rejected { background: #fee2e2; color: #991b1b; }
        .status-waiting_list { background: #e0f2fe; color: #075985; }

        /* buttons */
        .btn-admin { padding: 8px 16px; border-radius: 8px; font-weight: 600; font-size: .84rem; transition: all .15s; }
        .btn-admin-primary { background: var(--primary); color: #fff; border: none; }
        .btn-admin-primary:hover { background: var(--primary-dark); color: #fff; }

        /* page title */
        .page-title { margin-bottom: 28px; }
        .page-title h1 { font-size: 1.35rem; font-weight: 700; color: var(--text); margin: 0; }
        .page-title p { color: var(--text-secondary); margin: 4px 0 0; font-size: .86rem; }

        .chart-container { background: #fff; border-radius: 10px; padding: 22px; border: 1px solid #eaedf0; }

        .user-dropdown { display: flex; align-items: center; gap: 10px; cursor: pointer; }

        /* toast */
        .admin-toast {
            position: fixed; top: 70px; right: 28px; z-index: 9999;
            padding: 12px 20px; border-radius: 8px; color: #fff; font-weight: 500; font-size: .86rem;
            box-shadow: 0 6px 20px rgba(0,0,0,.12); animation: toastIn .3s ease;
        }
        .admin-toast.success { background: #059669; }
        .admin-toast.error { background: #dc2626; }
        .admin-toast.info { background: var(--primary); }
        @keyframes toastIn { from { transform: translateY(-12px); opacity: 0; } to { transform: none; opacity: 1; } }

        .loading-overlay {
            position: fixed; inset: 0; background: rgba(255,255,255,.85);
            display: flex; align-items: center; justify-content: center; z-index: 9999;
        }
        .spinner {
            width: 32px; height: 32px; border: 3px solid #eaedf0;
            border-top-color: var(--primary); border-radius: 50%; animation: spin .7s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        @media(max-width: 992px) {
            .sb { transform: translateX(-100%); }
            .sb.show { transform: none; }
            .admin-main { margin-left: 0; }
            .mobile-toggle { display: block !important; }
        }
        .mobile-toggle { display: none; background: none; border: none; font-size: 1.3rem; color: var(--text); cursor: pointer; }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

    
    <aside class="sb" id="sidebar">
        <div class="sb-brand">
            <div class="sb-brand-logo">
                <img src="<?php echo e(asset('assets/img/peekaboo/peekaboo_logo.png')); ?>" alt="Peekaboo" onerror="this.src='<?php echo e(asset('assets/img/peekaboo/logo.png')); ?>'">
            </div>
            <div class="sb-brand-text">
                <span class="sb-brand-title">Peekaboo</span>
                <span class="sb-brand-subtitle">Admin Portal</span>
            </div>
        </div>

        <nav class="sb-nav">
            <div class="sb-heading">Overview</div>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="sb-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                <i class="fas fa-th-large"></i> Dashboard
            </a>

            <div class="sb-heading">Manage</div>
            <a href="<?php echo e(route('admin.admissions.index')); ?>" class="sb-link <?php echo e(request()->routeIs('admin.admissions.*') ? 'active' : ''); ?>">
                <i class="fas fa-user-plus"></i> Admissions
                <?php $pendingAppsCount = \App\Models\Application::whereIn('status', ['pending', 'under_review'])->count(); ?>
                <?php if($pendingAppsCount > 0): ?><span class="sb-count"><?php echo e($pendingAppsCount); ?></span><?php endif; ?>
            </a>
            <a href="<?php echo e(route('admin.crm.index')); ?>" class="sb-link <?php echo e(request()->routeIs('admin.crm.*') ? 'active' : ''); ?>">
                <i class="fas fa-funnel-dollar"></i> Lead Pipeline
                <?php $newLeadsCount = \App\Models\Lead::where('status', 'new')->count(); ?>
                <?php if($newLeadsCount > 0): ?><span class="sb-count"><?php echo e($newLeadsCount); ?></span><?php endif; ?>
            </a>
            <a href="<?php echo e(route('admin.parents.index')); ?>" class="sb-link <?php echo e(request()->routeIs('admin.parents.*') ? 'active' : ''); ?>">
                <i class="fas fa-users"></i> Parents & Children
            </a>
            <a href="<?php echo e(route('admin.users.index')); ?>" class="sb-link <?php echo e(request()->routeIs('admin.users.*') ? 'active' : ''); ?>">
                <i class="fas fa-lock"></i> Users & Access
            </a>

            
            

            <div class="sb-heading">Insights</div>
            <a href="<?php echo e(route('admin.reports.index')); ?>" class="sb-link <?php echo e(request()->routeIs('admin.reports.*') ? 'active' : ''); ?>">
                <i class="fas fa-chart-bar"></i> Reports
            </a>

            <div class="sb-heading">Settings</div>
            <a href="<?php echo e(route('admin.settings.index')); ?>" class="sb-link <?php echo e(request()->routeIs('admin.settings.index') ? 'active' : ''); ?>">
                <i class="fas fa-cog"></i> General
            </a>
            <a href="<?php echo e(route('admin.settings.audit-log')); ?>" class="sb-link <?php echo e(request()->routeIs('admin.settings.audit-log') ? 'active' : ''); ?>">
                <i class="fas fa-scroll"></i> Audit Log
            </a>
            <a href="<?php echo e(route('admin.settings.permissions')); ?>" class="sb-link <?php echo e(request()->routeIs('admin.settings.permissions') ? 'active' : ''); ?>">
                <i class="fas fa-shield-alt"></i> Permissions
            </a>

            <div class="sb-divider"></div>
            <a href="<?php echo e(route('home')); ?>" class="sb-link" target="_blank">
                <i class="fas fa-external-link-alt"></i> View website
            </a>
        </nav>

        <div class="sb-footer">
            <div class="sb-avatar"><?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?></div>
            <div class="sb-footer-info">
                <span class="sb-footer-name"><?php echo e(auth()->user()->name); ?></span>
                <span class="sb-footer-role"><?php echo e(ucfirst(auth()->user()->getRoleNames()->first() ?? 'User')); ?></span>
            </div>
            <form method="POST" action="<?php echo e(route('logout')); ?>" style="margin:0;">
                <?php echo csrf_field(); ?>
                <button type="submit" class="sb-logout" title="Sign out"><i class="fas fa-sign-out-alt"></i></button>
            </form>
        </div>
    </aside>

    
    <main class="admin-main">
        <header class="admin-header">
            <div class="hdr-left">
                <button class="mobile-toggle" onclick="document.getElementById('sidebar').classList.toggle('show')">
                    <i class="fas fa-bars"></i>
                </button>

                <?php if (! empty(trim($__env->yieldContent('breadcrumb')))): ?>
                    <div class="hdr-breadcrumb d-none d-md-flex">
                        <?php echo $__env->yieldContent('breadcrumb'); ?>
                    </div>
                <?php else: ?>
                    <div class="hdr-search-wrap d-none d-md-block">
                        <input type="search" class="hdr-search" placeholder="Search anything…">
                        <i class="fas fa-search search-icon"></i>
                    </div>
                <?php endif; ?>
            </div>

            <div class="hdr-right">
                <div class="hdr-search-wrap d-none d-md-none">
                    
                </div>

                <a href="#" class="hdr-icon-btn" title="Notifications">
                    <i class="far fa-bell"></i>
                    <span class="notif-dot"></span>
                </a>

                <a href="<?php echo e(route('admin.settings.index')); ?>" class="hdr-icon-btn" title="Settings">
                    <i class="fas fa-cog"></i>
                </a>

                <div class="hdr-divider"></div>

                <div class="dropdown">
                    <div class="hdr-user" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="hdr-user-avatar"><?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?></div>
                        <div class="hdr-user-info d-none d-md-block">
                            <div class="hdr-user-name"><?php echo e(auth()->user()->name); ?></div>
                            <div class="hdr-user-role"><?php echo e(ucfirst(auth()->user()->getRoleNames()->first() ?? 'User')); ?></div>
                        </div>
                        <i class="fas fa-chevron-down hdr-user-chevron d-none d-md-block"></i>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end hdr-dropdown">
                        <li>
                            <a class="dropdown-item" href="<?php echo e(route('admin.profile')); ?>">
                                <i class="fas fa-user"></i> Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?php echo e(route('admin.settings.index')); ?>">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Sign out
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="admin-content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

    
    <?php if(session('success')): ?>
    <div class="admin-toast success" id="toast"><i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
    <div class="admin-toast error" id="toast"><i class="fas fa-exclamation-circle me-2"></i><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <script src="<?php echo e(asset('assets/js/vendor/jquery-3.7.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>

    <script>
        setTimeout(function() {
            var t = document.getElementById('toast');
            if (t) { t.style.opacity = '0'; t.style.transform = 'translateY(-8px)'; t.style.transition = 'all .25s'; setTimeout(function(){ t.remove(); }, 250); }
        }, 4500);

        window.showToast = function(msg, type) {
            type = type || 'success';
            var icon = type === 'success' ? 'check-circle' : (type === 'error' ? 'exclamation-circle' : 'info-circle');
            var old = document.getElementById('ajax-toast');
            if (old) old.remove();
            var d = document.createElement('div');
            d.id = 'ajax-toast'; d.className = 'admin-toast ' + type;
            d.innerHTML = '<i class="fas fa-' + icon + ' me-2"></i>' + msg;
            document.body.appendChild(d);
            setTimeout(function(){ d.style.opacity='0'; d.style.transform='translateY(-8px)'; d.style.transition='all .25s'; setTimeout(function(){ d.remove(); },250); }, 4000);
        };
    </script>

    
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width:380px;">
            <div class="modal-content" style="border:none;border-radius:14px;overflow:hidden;box-shadow:0 16px 48px rgba(0,0,0,.12);">
                <div class="modal-body p-4 text-center">
                    <div id="confirmModalIcon" style="font-size:1.6rem;margin-bottom:10px;"></div>
                    <div id="confirmModalTitle" style="font-weight:700;color:var(--text);font-size:.92rem;margin-bottom:6px;"></div>
                    <div id="confirmModalMessage" style="font-size:.82rem;color:var(--text-secondary);line-height:1.5;"></div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0 justify-content-center gap-2">
                    <button type="button" class="btn px-4"
                            style="background:#f4f5f7;color:var(--text);font-size:.82rem;border:1px solid #eaedf0;border-radius:8px;font-weight:600;"
                            data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="confirmModalBtn"
                            class="btn px-4 text-white"
                            style="font-size:.82rem;border:none;border-radius:8px;font-weight:600;"></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.showConfirm = function(o) {
            document.getElementById('confirmModalIcon').textContent = o.icon || '⚠️';
            document.getElementById('confirmModalTitle').textContent = o.title || 'Confirm';
            document.getElementById('confirmModalMessage').textContent = o.message || 'Are you sure?';
            var b = document.getElementById('confirmModalBtn');
            b.textContent = o.btnText || 'Confirm';
            b.style.background = o.btnColor || 'var(--primary)';
            var m = new bootstrap.Modal(document.getElementById('confirmModal'));
            b.onclick = function(){ m.hide(); (o.onConfirm || function(){})(); };
            m.show();
        };
        document.addEventListener('click', function(e) {
            var t = e.target.closest('[data-confirm]');
            if (!t) return;
            e.preventDefault();
            var f = t.closest('form');
            showConfirm({
                title: t.dataset.confirmTitle || 'Confirm Action',
                message: t.dataset.confirm,
                icon: t.dataset.confirmIcon || '⚠️',
                btnText: t.dataset.confirmBtn || 'Confirm',
                btnColor: t.dataset.confirmColor || 'var(--primary)',
                onConfirm: function(){ if (f) f.submit(); }
            });
        });
    </script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/layouts/admin.blade.php ENDPATH**/ ?>