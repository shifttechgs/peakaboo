<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - Peekaboo Admin</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/img/peekaboo/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">

    <style>
        :root {
            --sidebar-width: 260px;
            --header-height: 65px;
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
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 0;
        }

        /* Sidebar */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, var(--dark) 0%, #1a1f20 100%);
            color: white;
            z-index: 1000;
            overflow-y: auto;
            transition: transform 0.3s ease;
        }

        .sidebar-brand {
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-brand img {
            height: 45px;
            filter: brightness(0) invert(1);
        }

        .sidebar-brand span {
            font-weight: 700;
            font-size: 1.1rem;
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .nav-section {
            padding: 0 15px;
            margin-bottom: 10px;
        }

        .nav-section-title {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255,255,255,0.4);
            padding: 10px 15px;
            margin-bottom: 5px;
        }

        .nav-item {
            margin-bottom: 2px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-size: 0.9rem;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }

        .nav-link.active {
            background: var(--primary);
            color: white;
        }

        .nav-link i {
            width: 20px;
            text-align: center;
        }

        .nav-link .badge {
            margin-left: auto;
            font-size: 0.7rem;
        }

        /* Main Content */
        .admin-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        .admin-header {
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

        .admin-content {
            padding: 30px;
        }

        /* Cards */
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.04);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        .stat-card .icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .stat-card .value {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1;
        }

        .stat-card .label {
            color: var(--secondary);
            font-size: 0.85rem;
        }

        /* Tables */
        .admin-table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.04);
        }

        .admin-table .table {
            margin-bottom: 0;
        }

        .admin-table th {
            background: #f8f9fa;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--border);
        }

        .admin-table td {
            vertical-align: middle;
        }

        /* Badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-pending { background: #fff3cd; color: #856404; }
        .status-approved { background: #d4edda; color: #155724; }
        .status-rejected { background: #f8d7da; color: #721c24; }
        .status-waiting_list { background: #d1ecf1; color: #0c5460; }

        /* Buttons */
        .btn-admin {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .btn-admin-primary {
            background: var(--primary);
            color: white;
            border: none;
        }

        .btn-admin-primary:hover {
            background: var(--primary-dark);
            color: white;
        }

        /* Page Title */
        .page-title {
            margin-bottom: 30px;
        }

        .page-title h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
        }

        .page-title p {
            color: var(--secondary);
            margin: 5px 0 0;
            font-size: 0.9rem;
        }

        /* Charts placeholder */
        .chart-container {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.04);
        }

        /* User dropdown */
        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .user-dropdown img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Toast */
        .admin-toast {
            position: fixed;
            top: 80px;
            right: 30px;
            z-index: 9999;
            padding: 15px 25px;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            animation: slideInRight 0.3s ease;
        }

        .admin-toast.success { background: var(--success); }
        .admin-toast.error { background: var(--danger); }
        .admin-toast.info { background: var(--info); }

        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        /* Loading */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255,255,255,0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Mobile */
        @media (max-width: 992px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.show {
                transform: translateX(0);
            }
            .admin-main {
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
            color: var(--dark);
            cursor: pointer;
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <aside class="admin-sidebar" id="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('assets/img/peekaboo/logo.png') }}" alt="Peekaboo">
            <span>Admin Panel</span>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-section-title">Main</div>
                <div class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </div>
            </div>

            <div class="nav-section">
                <div class="nav-section-title">Management</div>
                <div class="nav-item">
                    <a href="{{ route('admin.admissions.index') }}" class="nav-link {{ request()->routeIs('admin.admissions.*') ? 'active' : '' }}">
                        <i class="fas fa-user-plus"></i> Admissions
                        <span class="badge bg-warning">5</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.crm.index') }}" class="nav-link {{ request()->routeIs('admin.crm.*') ? 'active' : '' }}">
                        <i class="fas fa-funnel-dollar"></i> CRM / Leads
                        <span class="badge bg-info">4</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.parents.index') }}" class="nav-link {{ request()->routeIs('admin.parents.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i> Parents & Children
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.payments.index') }}" class="nav-link {{ request()->routeIs('admin.payments.*') ? 'active' : '' }}">
                        <i class="fas fa-credit-card"></i> Payments
                        <span class="badge bg-danger">1</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.staff.index') }}" class="nav-link {{ request()->routeIs('admin.staff.*') ? 'active' : '' }}">
                        <i class="fas fa-chalkboard-teacher"></i> Staff & Classes
                    </a>
                </div>
            </div>

            <div class="nav-section">
                <div class="nav-section-title">Communication</div>
                <div class="nav-item">
                    <a href="{{ route('admin.communication.index') }}" class="nav-link {{ request()->routeIs('admin.communication.index') ? 'active' : '' }}">
                        <i class="fas fa-envelope"></i> Messages
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.communication.announcements') }}" class="nav-link {{ request()->routeIs('admin.communication.announcements') ? 'active' : '' }}">
                        <i class="fas fa-bullhorn"></i> Announcements
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.communication.automations') }}" class="nav-link {{ request()->routeIs('admin.communication.automations') ? 'active' : '' }}">
                        <i class="fas fa-robot"></i> Automations
                    </a>
                </div>
            </div>

            <div class="nav-section">
                <div class="nav-section-title">Reports</div>
                <div class="nav-item">
                    <a href="{{ route('admin.reports.index') }}" class="nav-link {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">
                        <i class="fas fa-chart-bar"></i> Reports
                    </a>
                </div>
            </div>

            <div class="nav-section">
                <div class="nav-section-title">System</div>
                <div class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}">
                        <i class="fas fa-cog"></i> Settings
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.settings.audit-log') }}" class="nav-link {{ request()->routeIs('admin.settings.audit-log') ? 'active' : '' }}">
                        <i class="fas fa-history"></i> Audit Log
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.settings.permissions') }}" class="nav-link {{ request()->routeIs('admin.settings.permissions') ? 'active' : '' }}">
                        <i class="fas fa-shield-alt"></i> Permissions
                    </a>
                </div>
            </div>

            <div class="nav-section mt-4">
                <div class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link" target="_blank">
                        <i class="fas fa-external-link-alt"></i> View Website
                    </a>
                </div>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="admin-main">
        <header class="admin-header">
            <div class="d-flex align-items-center gap-3">
                <button class="mobile-toggle" onclick="document.getElementById('sidebar').classList.toggle('show')">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="d-none d-md-block">
                    <input type="search" class="form-control" placeholder="Search..." style="width: 250px; border-radius: 8px;">
                </div>
            </div>

            <div class="d-flex align-items-center gap-4">
                <div class="position-relative">
                    <a href="{{ route('admin.communication.index') }}" class="text-dark">
                        <i class="fas fa-bell fa-lg"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">3</span>
                    </a>
                </div>

                <div class="dropdown">
                    <div class="user-dropdown" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/team/team-1-1.jpg') }}" alt="Admin">
                        <div class="d-none d-md-block">
                            <div class="fw-semibold">Sarah van der Merwe</div>
                            <small class="text-muted">Principal</small>
                        </div>
                        <i class="fas fa-chevron-down ms-2 text-muted"></i>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.settings.index') }}"><i class="fas fa-cog me-2"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="{{ route('home') }}"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="admin-content">
            @yield('content')
        </div>
    </main>

    <!-- Toast Container -->
    @if(session('success'))
    <div class="admin-toast success" id="toast">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="admin-toast error" id="toast">
        <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
    </div>
    @endif

    <script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <script>
        // Auto-hide toast
        setTimeout(function() {
            const toast = document.getElementById('toast');
            if (toast) {
                toast.style.animation = 'slideInRight 0.3s ease reverse';
                setTimeout(() => toast.remove(), 300);
            }
        }, 5000);
    </script>
    @stack('scripts')
</body>
</html>
