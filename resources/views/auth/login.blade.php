<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Peekaboo</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/peekaboo/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <style>
        :root { --primary: #0077B6; --primary-dark: #005a8c; }
        * { box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0077B6 0%, #005a8c 50%, #003d5c 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .auth-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,.2);
            width: 100%;
            max-width: 420px;
            padding: 48px 40px;
        }
        .auth-logo {
            text-align: center;
            margin-bottom: 32px;
        }
        .auth-logo img { height: 60px; }
        .auth-logo h1 { font-size: 20px; font-weight: 700; color: #2D3436; margin: 12px 0 4px; }
        .auth-logo p { font-size: 13px; color: #6c757d; margin: 0; }
        .form-label { font-size: 13px; font-weight: 600; color: #444; }
        .form-control {
            border-radius: 8px;
            padding: 10px 14px;
            border: 1.5px solid #dee2e6;
            font-size: 14px;
            transition: border-color .2s;
        }
        .form-control:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(0,119,182,.12); }
        .btn-auth {
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 15px;
            font-weight: 600;
            width: 100%;
            cursor: pointer;
            transition: background .2s;
        }
        .btn-auth:hover { background: var(--primary-dark); }
        .forgot-link { text-align: center; margin-top: 16px; }
        .forgot-link a { font-size: 13px; color: var(--primary); text-decoration: none; }
        .forgot-link a:hover { text-decoration: underline; }
        .alert-error { background: #fff5f5; border: 1px solid #f5c6cb; color: #721c24; border-radius: 8px; padding: 10px 14px; font-size: 13px; margin-bottom: 20px; }
        .alert-success { background: #d4edda; border: 1px solid #c3e6cb; color: #155724; border-radius: 8px; padding: 10px 14px; font-size: 13px; margin-bottom: 20px; }
        .mb-3 { margin-bottom: 16px; }
        .mb-4 { margin-bottom: 24px; }
    </style>
</head>
<body>
    <div class="auth-card">
        <div class="auth-logo">
            <img src="{{ asset('assets/img/peekaboo/logo.png') }}" alt="Peekaboo" onerror="this.style.display='none'">
            <h1>Peekaboo</h1>
            <p>Early Learning Centre</p>
        </div>

        @if(session('status'))
            <div class="alert-success">{{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control"
                    value="{{ old('email') }}" required autofocus autocomplete="email">
            </div>
            <div class="mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control"
                    required autocomplete="current-password">
            </div>
            <button type="submit" class="btn-auth">Sign In</button>
        </form>

        <div class="forgot-link">
            <a href="{{ route('password.request') }}">Forgot your password?</a>
        </div>
    </div>
</body>
</html>
