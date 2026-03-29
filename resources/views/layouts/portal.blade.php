<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Portal') - Peekaboo</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/img/peekaboo/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">

    <style>
        :root {
            --sidebar-w: 252px;
            --header-h: 56px;
            --primary: #0077B6;
            --primary-dark: #005a8c;
            --dark: #2D3436;
            --text: #1a1a2e;
            --text-secondary: #697386;
            --bg: #f7f8fa;
            --border: #eaedf0;
            --danger: #dc3545;
        }

        * { box-sizing: border-box; margin: 0; }
        body { font-family: 'Inter', -apple-system, system-ui, sans-serif; background: var(--bg); color: var(--text); }

        /* ───────────── SIDEBAR ───────────── */
        .sb {
            position: fixed; top: 0; left: 0;
            width: var(--sidebar-w); height: 100vh;
            background: #fff;
            border-right: 1px solid var(--border);
            display: flex; flex-direction: column;
            z-index: 1000;
            transition: transform .25s ease;
        }

        /* brand */
        .sb-brand {
            padding: 22px 20px 18px;
            border-bottom: 1px solid var(--border);
            display: flex; align-items: center; gap: 14px;
            background: linear-gradient(135deg, #f0f7ff 0%, #fef1f2 100%);
            position: relative;
            flex-shrink: 0;
        }
        .sb-brand::after {
            content: '';
            position: absolute; bottom: 0; left: 20px; right: 20px; height: 2px;
            background: linear-gradient(90deg, var(--primary), #00B4D8, #FFB5BA);
            border-radius: 2px;
        }
        .sb-brand-logo {
            width: 42px; height: 42px; border-radius: 12px; overflow: hidden;
            flex-shrink: 0; box-shadow: 0 2px 8px rgba(0,119,182,.15);
            border: 2px solid #fff; background: #fff;
            display: flex; align-items: center; justify-content: center;
        }
        .sb-brand-logo img { width: 100%; height: 100%; object-fit: contain; }
        .sb-brand-text { display: flex; flex-direction: column; gap: 1px; min-width: 0; }
        .sb-brand-title { font-weight: 800; font-size: 1.05rem; color: var(--dark); letter-spacing: -.3px; line-height: 1.2; }
        .sb-brand-subtitle { font-size: .65rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; color: var(--primary); line-height: 1.3; }

        /* scrollable nav */
        .sb-nav { flex: 1; overflow-y: auto; padding: 4px 0; scrollbar-width: none; }
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
        .sb-link.active { background: #f0f7ff; color: var(--primary); font-weight: 600; }
        .sb-link.active i { opacity: 1; color: var(--primary); }
        .sb-link.active::before {
            content: ''; position: absolute; left: -8px; top: 6px; bottom: 6px;
            width: 3px; border-radius: 0 3px 3px 0; background: var(--primary);
        }

        /* count badge */
        .sb-count {
            margin-left: auto; min-width: 18px; height: 18px; padding: 0 5px;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: .65rem; font-weight: 700; border-radius: 9px;
            background: #eff1f3; color: var(--text-secondary);
        }
        .sb-link.active .sb-count { background: #dbeafe; color: var(--primary); }

        /* divider */
        .sb-divider { height: 1px; background: var(--border); margin: 8px 20px; }

        /* footer */
        .sb-footer {
            border-top: 1px solid var(--border);
            padding: 14px 16px;
            display: flex; align-items: center; gap: 10px;
            flex-shrink: 0;
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
            border: 1px solid var(--border); background: #fff;
            display: flex; align-items: center; justify-content: center;
            color: #a3acb9; font-size: .7rem; cursor: pointer;
            transition: border-color .15s, color .15s;
        }
        .sb-logout:hover { border-color: #d1d5db; color: var(--danger); }

        /* ───────────── MAIN ───────────── */
        .portal-main { margin-left: var(--sidebar-w); min-height: 100vh; }

        .portal-header {
            position: sticky; top: 0; height: var(--header-h);
            background: rgba(255,255,255,.92);
            backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 0 28px; display: flex; align-items: center;
            justify-content: space-between; z-index: 100;
        }

        .portal-content { padding: 28px; }

        /* header left */
        .hdr-left { display: flex; align-items: center; gap: 16px; }

        /* header right */
        .hdr-right { display: flex; align-items: center; gap: 6px; }

        /* header icon button */
        .hdr-icon-btn {
            width: 36px; height: 36px; border-radius: 8px;
            border: 1px solid transparent; background: none;
            display: flex; align-items: center; justify-content: center;
            color: var(--text-secondary); font-size: .95rem; cursor: pointer;
            text-decoration: none; transition: background .15s, border-color .15s, color .15s;
        }
        .hdr-icon-btn:hover { background: #f4f5f7; border-color: var(--border); color: var(--text); }

        /* header divider */
        .hdr-divider { width: 1px; height: 24px; background: var(--border); margin: 0 8px; }

        /* header user */
        .hdr-user {
            display: flex; align-items: center; gap: 10px; cursor: pointer;
            padding: 4px 8px 4px 4px; border-radius: 8px;
            border: 1px solid transparent; transition: background .15s, border-color .15s;
        }
        .hdr-user:hover { background: #f4f5f7; border-color: var(--border); }
        .hdr-user-avatar {
            width: 32px; height: 32px; border-radius: 8px;
            background: linear-gradient(135deg, var(--primary) 0%, #00B4D8 100%);
            color: #fff; display: flex; align-items: center; justify-content: center;
            font-size: .7rem; font-weight: 700; flex-shrink: 0;
        }
        .hdr-user-name { font-size: .8125rem; font-weight: 600; color: var(--text); line-height: 1.2; }
        .hdr-user-role { font-size: .6875rem; color: #a3acb9; }
        .hdr-user-chevron { font-size: .55rem; color: #a3acb9; margin-left: 2px; transition: transform .2s; }
        .hdr-user[aria-expanded="true"] .hdr-user-chevron { transform: rotate(180deg); }

        /* dropdown */
        .hdr-dropdown {
            border-radius: 10px; border: 1px solid var(--border);
            box-shadow: 0 8px 30px rgba(0,0,0,.08), 0 1px 3px rgba(0,0,0,.04);
            margin-top: 6px; padding: 4px; min-width: 200px; overflow: hidden;
        }
        .hdr-dropdown .dropdown-item {
            font-size: .8125rem; padding: 8px 12px; border-radius: 6px;
            color: var(--text); display: flex; align-items: center; gap: 10px; transition: background .12s;
        }
        .hdr-dropdown .dropdown-item:hover { background: #f4f5f7; }
        .hdr-dropdown .dropdown-item i { width: 16px; text-align: center; font-size: .78rem; color: #a3acb9; }
        .hdr-dropdown .dropdown-divider { margin: 4px 0; border-color: var(--border); }
        .hdr-dropdown .dropdown-item.text-danger { color: var(--danger); }
        .hdr-dropdown .dropdown-item.text-danger i { color: var(--danger); }

        /* page title in header */
        .hdr-page-title { font-size: .9375rem; font-weight: 700; color: var(--text); }

        /* toast */
        .portal-toast {
            position: fixed; top: 70px; right: 28px; z-index: 9999;
            padding: 12px 20px; border-radius: 8px; color: #fff; font-weight: 500; font-size: .86rem;
            box-shadow: 0 6px 20px rgba(0,0,0,.12); animation: toastIn .3s ease;
        }
        .portal-toast.success { background: #059669; }
        .portal-toast.error   { background: #dc2626; }
        @@keyframes toastIn { from { transform: translateY(-12px); opacity: 0; } to { transform: none; opacity: 1; } }

        /* mobile */
        @@media (max-width: 992px) {
            .sb { transform: translateX(-100%); }
            .sb.show { transform: none; }
            .portal-main { margin-left: 0; }
            .mobile-toggle { display: block !important; }
        }
        .mobile-toggle { display: none; background: none; border: none; font-size: 1.3rem; color: var(--text); cursor: pointer; }
    </style>
    @stack('styles')
</head>
<body>

    {{-- ───── SIDEBAR ───── --}}
    <aside class="sb" id="sidebar">
        <div class="sb-brand">
            <div class="sb-brand-logo">
                <img src="{{ asset('assets/img/peekaboo/peekaboo_logo.png') }}" alt="Peekaboo"
                     onerror="this.src='{{ asset('assets/img/peekaboo/logo.png') }}'">
            </div>
            <div class="sb-brand-text">
                <span class="sb-brand-title">Peekaboo</span>
                <span class="sb-brand-subtitle">@yield('portal-name', 'Parent Portal')</span>
            </div>
        </div>

        <nav class="sb-nav">
            @yield('sidebar-nav')
        </nav>

        <div class="sb-footer">
            <div class="sb-avatar">{{ strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</div>
            <div class="sb-footer-info">
                <span class="sb-footer-name">{{ auth()->user()->name }}</span>
                <span class="sb-footer-role">{{ ucfirst(auth()->user()->getRoleNames()->first() ?? 'Parent') }}</span>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                @csrf
                <button type="submit" class="sb-logout" title="Sign out">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </aside>

    {{-- ───── MAIN ───── --}}
    <main class="portal-main">
        <header class="portal-header">
            <div class="hdr-left">
                <button class="mobile-toggle" onclick="document.getElementById('sidebar').classList.toggle('show')">
                    <i class="fas fa-bars"></i>
                </button>
                <span class="hdr-page-title">@yield('page-title', 'Dashboard')</span>
            </div>

            <div class="hdr-right">
                <div class="hdr-divider"></div>

                <div class="dropdown">
                    <div class="hdr-user" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="hdr-user-avatar">{{ strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</div>
                        <div class="d-none d-md-block">
                            <div class="hdr-user-name">{{ auth()->user()->name }}</div>
                            <div class="hdr-user-role">Parent</div>
                        </div>
                        <i class="fas fa-chevron-down hdr-user-chevron d-none d-md-block"></i>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end hdr-dropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('parent.profile') }}">
                                <i class="fas fa-user"></i> My Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('parent.fees.statements') }}">
                                <i class="fas fa-receipt"></i> Statements
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Sign out
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="portal-content">
            @yield('content')
        </div>
    </main>

    {{-- Toast --}}
    @if(session('success'))
    <div class="portal-toast success" id="toast"><i class="fas fa-check-circle me-2"></i>{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="portal-toast error" id="toast"><i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}</div>
    @endif

    <script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script>
        setTimeout(function() {
            var t = document.getElementById('toast');
            if (t) { t.style.opacity = '0'; t.style.transform = 'translateY(-8px)'; t.style.transition = 'all .25s'; setTimeout(function(){ t.remove(); }, 250); }
        }, 4500);
    </script>
    @stack('scripts')
</body>
</html>
