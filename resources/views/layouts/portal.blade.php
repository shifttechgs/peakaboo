<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Portal') - Peekaboo</title>

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
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid var(--border);
        }

        .sidebar-brand img {
            height: 45px;
        }

        .sidebar-brand span {
            font-weight: 700;
            font-size: 1rem;
            color: var(--dark);
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

        @media (max-width: 992px) {
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
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <aside class="portal-sidebar" id="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('assets/img/peekaboo/logo.png') }}" alt="Peekaboo">
            <span>@yield('portal-name', 'Portal')</span>
        </div>

        <nav class="sidebar-nav">
            @yield('sidebar-nav')
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="portal-main">
        <header class="portal-header">
            <div class="d-flex align-items-center gap-3">
                <button class="mobile-toggle" onclick="document.getElementById('sidebar').classList.toggle('show')">
                    <i class="fas fa-bars"></i>
                </button>
                <h5 class="mb-0 fw-bold">@yield('page-title', 'Dashboard')</h5>
            </div>

            <div class="d-flex align-items-center gap-4">
                @yield('header-actions')
                <div class="dropdown">
                    <div class="d-flex align-items-center gap-2 cursor-pointer" data-bs-toggle="dropdown" style="cursor: pointer;">
                        <img src="{{ asset('assets/img/testimonial/testi-1-1.jpg') }}" alt="User" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                        <i class="fas fa-chevron-down text-muted"></i>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="{{ route('home') }}"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="portal-content">
            @yield('content')
        </div>
    </main>

    @if(session('success'))
    <div class="portal-toast success" id="toast">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
    </div>
    @endif

    <script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script>
        setTimeout(function() {
            const toast = document.getElementById('toast');
            if (toast) {
                toast.style.animation = 'slideIn 0.3s ease reverse';
                setTimeout(() => toast.remove(), 300);
            }
        }, 5000);
    </script>
    @stack('scripts')
</body>
</html>
