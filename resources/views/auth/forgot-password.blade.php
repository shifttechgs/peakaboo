<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reset Password - Peekaboo</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/peekaboo/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary: #0077B6;
            --primary-hover: #005a8c;
            --text: #0A2540;
            --text-secondary: #425466;
            --text-tertiary: #8898AA;
            --border: #E6E8EB;
            --border-focus: #0077B6;
            --bg: #F6F9FC;
            --white: #FFFFFF;
            --error-bg: #FEF2F2;
            --error-border: #FECACA;
            --error-text: #991B1B;
            --success-bg: #F0FDF4;
            --success-border: #BBF7D0;
            --success-text: #166534;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            -webkit-font-smoothing: antialiased;
        }

        body::before {
            content: '';
            position: fixed; top: -40%; right: -20%;
            width: 800px; height: 800px; border-radius: 50%;
            background: radial-gradient(circle, rgba(0,119,182,.05) 0%, transparent 70%);
            pointer-events: none; z-index: 0;
        }
        body::after {
            content: '';
            position: fixed; bottom: -30%; left: -15%;
            width: 600px; height: 600px; border-radius: 50%;
            background: radial-gradient(circle, rgba(0,180,216,.04) 0%, transparent 70%);
            pointer-events: none; z-index: 0;
        }

        .auth-wrapper { flex:1; display:flex; align-items:center; justify-content:center; padding:48px 24px 32px; position:relative; z-index:1; }
        .auth-container { width:100%; max-width:400px; }

        .auth-brand { text-align:center; margin-bottom:36px; }
        .auth-brand-logo { width:72px; height:72px; border-radius:16px; overflow:hidden; margin:0 auto 16px; box-shadow:0 1px 3px rgba(0,0,0,.08),0 8px 24px rgba(0,0,0,.04); border:1px solid rgba(0,0,0,.04); background:var(--white); display:flex; align-items:center; justify-content:center; }
        .auth-brand-logo img { width:85%; height:85%; object-fit:contain; }
        .auth-brand-name { font-size:1.125rem; font-weight:700; color:var(--text); letter-spacing:-0.3px; }

        .auth-card { background:var(--white); border-radius:12px; border:1px solid var(--border); box-shadow:0 1px 3px rgba(0,0,0,.04),0 6px 24px rgba(0,0,0,.03); padding:36px 32px 32px; }
        .auth-card-title { font-size:1rem; font-weight:600; color:var(--text); margin-bottom:4px; }
        .auth-card-subtitle { font-size:0.875rem; color:var(--text-secondary); margin-bottom:28px; line-height:1.5; }

        .auth-alert { padding:12px 14px; border-radius:8px; font-size:.8125rem; line-height:1.5; margin-bottom:20px; display:flex; align-items:flex-start; gap:10px; }
        .auth-alert-icon { flex-shrink:0; width:18px; height:18px; margin-top:1px; }
        .auth-alert--error { background:var(--error-bg); border:1px solid var(--error-border); color:var(--error-text); }
        .auth-alert--success { background:var(--success-bg); border:1px solid var(--success-border); color:var(--success-text); }

        .form-group { margin-bottom:20px; }
        .form-group:last-of-type { margin-bottom:24px; }
        .form-label { display:block; font-size:.8125rem; font-weight:500; color:var(--text); margin-bottom:6px; }
        .form-input { display:block; width:100%; height:44px; padding:0 12px; font-family:inherit; font-size:.875rem; color:var(--text); background:var(--white); border:1px solid var(--border); border-radius:8px; outline:none; transition:border-color .15s,box-shadow .15s; }
        .form-input::placeholder { color:var(--text-tertiary); }
        .form-input:hover { border-color:#C1C9D2; }
        .form-input:focus { border-color:var(--border-focus); box-shadow:0 0 0 3px rgba(0,119,182,.12),0 1px 2px rgba(0,0,0,.04); }

        .btn-auth { display:flex; align-items:center; justify-content:center; gap:8px; width:100%; height:44px; padding:0 20px; font-family:inherit; font-size:.875rem; font-weight:600; color:var(--white); background:var(--primary); border:none; border-radius:8px; cursor:pointer; transition:background .15s,box-shadow .15s,transform .1s; }
        .btn-auth:hover { background:var(--primary-hover); box-shadow:0 4px 12px rgba(0,119,182,.25),0 1px 3px rgba(0,0,0,.08); }
        .btn-auth:active { transform:scale(0.985); }
        .btn-auth svg { width:16px; height:16px; transition:transform .15s; }
        .btn-auth:hover svg { transform:translateX(2px); }

        .auth-footer { text-align:center; padding:24px 24px 32px; position:relative; z-index:1; }
        .auth-footer-links { display:flex; align-items:center; justify-content:center; gap:20px; }
        .auth-footer-links a { font-size:.75rem; color:var(--text-tertiary); text-decoration:none; transition:color .15s; }
        .auth-footer-links a:hover { color:var(--text-secondary); }
        .auth-footer-links span { color:var(--border); font-size:.5rem; }

        @media (max-width:480px) {
            .auth-wrapper { padding:32px 16px 24px; }
            .auth-card { padding:28px 20px 24px; }
            .auth-brand { margin-bottom:28px; }
        }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-container">

            <div class="auth-brand">
                <div class="auth-brand-logo">
                    <img src="{{ asset('assets/img/peekaboo/logo.png') }}" alt="Peekaboo">
                </div>
                <div class="auth-brand-name">Peekaboo</div>
            </div>

            <div class="auth-card">
                <div class="auth-card-title">Reset your password</div>
                <div class="auth-card-subtitle">Enter the email address linked to your account and we'll send you a reset link.</div>

                @if(session('status'))
                <div class="auth-alert auth-alert--success">
                    <svg class="auth-alert-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    <div>{{ session('status') }}</div>
                </div>
                @endif

                @if($errors->any())
                <div class="auth-alert auth-alert--error">
                    <svg class="auth-alert-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    <div>
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-input"
                            placeholder="you@example.com"
                            value="{{ old('email') }}" required autofocus autocomplete="email">
                    </div>

                    <button type="submit" class="btn-auth">
                        Send reset link
                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3.333 8h9.334M8.667 4l4 4-4 4"/></svg>
                    </button>
                </form>
            </div>

        </div>
    </div>

    <div class="auth-footer">
        <div class="auth-footer-links">
            <a href="{{ route('login') }}">← Back to sign in</a>
            <span>•</span>
            <a href="{{ route('home') }}">Privacy</a>
            <span>•</span>
            <a href="{{ route('home') }}">Terms</a>
        </div>
    </div>
</body>
</html>
