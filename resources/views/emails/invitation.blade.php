<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>You've been invited to Peekaboo</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f6fa; margin: 0; padding: 0; }
        .wrapper { max-width: 600px; margin: 40px auto; background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,.08); }
        .header { background: #0077B6; padding: 32px 40px; text-align: center; }
        .header img { height: 50px; }
        .header h1 { color: #fff; margin: 16px 0 0; font-size: 22px; font-weight: 700; }
        .body { padding: 40px; }
        .body p { color: #444; font-size: 15px; line-height: 1.6; margin: 0 0 16px; }
        .role-badge { display: inline-block; background: #e8f4fd; color: #0077B6; font-weight: 700; padding: 4px 12px; border-radius: 20px; font-size: 14px; margin-bottom: 24px; }
        .cta { text-align: center; margin: 32px 0; }
        .cta a { background: #0077B6; color: #fff; text-decoration: none; padding: 14px 36px; border-radius: 8px; font-size: 16px; font-weight: 700; display: inline-block; }
        .cta a:hover { background: #005a8c; }
        .expiry { background: #fff8e1; border-left: 4px solid #ffc107; padding: 12px 16px; border-radius: 4px; font-size: 13px; color: #666; margin: 24px 0 0; }
        .footer { background: #f8f9fa; padding: 24px 40px; text-align: center; border-top: 1px solid #e9ecef; }
        .footer p { color: #999; font-size: 12px; margin: 0; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>Peekaboo Early Learning Centre</h1>
        </div>
        <div class="body">
            <p>Hello,</p>
            <p>You've been invited to join <strong>Peekaboo Early Learning Centre</strong> as:</p>
            <div><span class="role-badge">{{ $role }}</span></div>
            <p>Click the button below to set up your account and get started. Your invitation will expire on <strong>{{ $expiresAt }}</strong>.</p>
            <div class="cta">
                <a href="{{ $acceptUrl }}">Accept Invitation</a>
            </div>
            <p>If the button above doesn't work, copy and paste this link into your browser:</p>
            <p style="word-break:break-all; color:#0077B6; font-size:13px;">{{ $acceptUrl }}</p>
            <div class="expiry">
                <strong>Note:</strong> This invitation link expires on {{ $expiresAt }}. If you did not expect this email, you can safely ignore it.
            </div>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Peekaboo Early Learning Centre. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
