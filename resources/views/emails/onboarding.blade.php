<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Peekaboo Portal</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f6fa; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .header { background: #4A2559; color: white; padding: 32px 40px; text-align: center; }
        .header h1 { margin: 0; font-size: 1.5rem; }
        .header p { margin: 8px 0 0; opacity: 0.8; font-size: 0.9rem; }
        .body { padding: 32px 40px; }
        .body p { line-height: 1.7; margin: 0 0 14px; }
        .cta { text-align: center; margin: 28px 0; }
        .cta a { display: inline-block; background: #0c508e; color: white; text-decoration: none; padding: 14px 36px; border-radius: 8px; font-weight: 700; font-size: 1rem; }
        .features { margin: 24px 0; }
        .feature { display: flex; gap: 14px; padding: 12px 0; border-bottom: 1px solid #f0f0f0; }
        .feature:last-child { border-bottom: none; }
        .feature-icon { width: 36px; height: 36px; border-radius: 8px; background: #f0f4f8; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 1rem; }
        .feature-text { font-size: 0.9rem; color: #4a4a5a; line-height: 1.5; }
        .feature-text strong { color: #333; display: block; margin-bottom: 2px; }
        .footer { background: #f8f9fa; padding: 18px 40px; text-align: center; color: #888; font-size: 0.8rem; border-top: 1px solid #e9ecef; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Welcome to Peekaboo!</h1>
            <p>Your parent portal is ready</p>
        </div>
        <div class="body">
            <p>Hi <strong>{{ $user->name }}</strong>,</p>
            <p>
                Your account has been set up successfully! You now have full access to the
                <strong>Peekaboo Parent Portal</strong> — your hub for everything related to your child's experience at Peekaboo.
            </p>

            <div class="cta">
                <a href="{{ route('parent.dashboard') }}">Go to My Dashboard →</a>
            </div>

            <p>Here's what you can do from your portal:</p>

            <div class="features">
                <div class="feature">
                    <div class="feature-icon">📅</div>
                    <div class="feature-text">
                        <strong>Calendar & Events</strong>
                        Stay up to date with school events, holidays, and important dates.
                    </div>
                </div>
                <div class="feature">
                    <div class="feature-icon">💰</div>
                    <div class="feature-text">
                        <strong>Fees & Payments</strong>
                        View statements, download invoices, and upload proof of payment.
                    </div>
                </div>
                <div class="feature">
                    <div class="feature-icon">📸</div>
                    <div class="feature-text">
                        <strong>Photo Gallery</strong>
                        See photos of your child's day shared by teachers.
                    </div>
                </div>
                <div class="feature">
                    <div class="feature-icon">📰</div>
                    <div class="feature-text">
                        <strong>Newsletters</strong>
                        Read monthly newsletters and school updates.
                    </div>
                </div>
                <div class="feature">
                    <div class="feature-icon">💬</div>
                    <div class="feature-text">
                        <strong>Messages</strong>
                        Send messages directly to the admin team.
                    </div>
                </div>
            </div>

            <p style="margin-top:20px;">
                If you have any questions or need help getting started, please don't hesitate to contact us.
            </p>

            <p>We're so glad to have your family as part of the Peekaboo community!<br>
            <strong>The Peekaboo Team</strong></p>
        </div>
        <div class="footer">
            <p>Peekaboo Early Learning Centre &bull; 139b Humewood Dr, Parklands, Cape Town, 7441</p>
            <p>If you didn't expect this email, please contact us.</p>
        </div>
    </div>
</body>
</html>
