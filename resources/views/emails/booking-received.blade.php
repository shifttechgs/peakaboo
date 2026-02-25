<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Booking Received</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f6fa; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .header { background: #0077B6; color: white; padding: 30px 40px; text-align: center; }
        .header h1 { margin: 0; font-size: 1.6rem; }
        .header p { margin: 8px 0 0; opacity: 0.85; font-size: 0.95rem; }
        .body { padding: 35px 40px; }
        .body p { line-height: 1.7; margin: 0 0 16px; }
        .detail-box { background: #f8f9fa; border-left: 4px solid #0077B6; border-radius: 6px; padding: 20px 25px; margin: 24px 0; }
        .detail-box .row { display: flex; margin-bottom: 10px; }
        .detail-box .row:last-child { margin-bottom: 0; }
        .detail-box .label { font-weight: 600; min-width: 140px; color: #555; }
        .detail-box .value { color: #222; }
        .reference { display: inline-block; background: #e8f4fd; color: #0077B6; font-weight: 700; font-size: 1.1rem; padding: 8px 20px; border-radius: 6px; letter-spacing: 1px; margin: 8px 0; font-family: monospace; }
        .footer { background: #f8f9fa; padding: 20px 40px; text-align: center; color: #888; font-size: 0.82rem; border-top: 1px solid #e9ecef; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Tour Booking Received!</h1>
            <p>Peekaboo Early Learning Centre</p>
        </div>
        <div class="body">
            <p>Hi <strong>{{ $lead->name }}</strong>,</p>
            <p>Thank you for booking a tour at Peekaboo Early Learning Centre! We've received your request and will confirm your appointment within 24 hours.</p>

            <p>Your booking reference is:</p>
            <div style="text-align: center;">
                <span class="reference">{{ $lead->reference }}</span>
            </div>

            <div class="detail-box">
                <div class="row">
                    <span class="label">📅 Preferred Date:</span>
                    <span class="value">{{ $lead->preferred_date->format('l, d F Y') }}</span>
                </div>
                <div class="row">
                    <span class="label">⏰ Preferred Time:</span>
                    <span class="value">{{ $lead->preferred_time }}</span>
                </div>
                <div class="row">
                    <span class="label">👶 Child's Name:</span>
                    <span class="value">{{ $lead->child_name }}</span>
                </div>
                <div class="row">
                    <span class="label">🎂 Age Group:</span>
                    <span class="value">{{ $lead->child_age }}</span>
                </div>
            </div>

            <p>We'll be in touch shortly to confirm the exact date and time. If you have any questions in the meantime, please don't hesitate to call or email us.</p>

            <p>We look forward to meeting you and {{ $lead->child_name }}!</p>

            <p>Warm regards,<br><strong>The Peekaboo Team</strong></p>
        </div>
        <div class="footer">
            <p>Peekaboo Early Learning Centre &bull; Please save your reference number: <strong>{{ $lead->reference }}</strong></p>
        </div>
    </div>
</body>
</html>
