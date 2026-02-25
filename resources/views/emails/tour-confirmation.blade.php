<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Confirmed</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f6fa; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .header { background: #0077B6; color: white; padding: 30px 40px; text-align: center; }
        .header h1 { margin: 0; font-size: 1.6rem; }
        .header p { margin: 8px 0 0; opacity: 0.85; }
        .body { padding: 35px 40px; }
        .body p { line-height: 1.7; margin: 0 0 16px; }
        .detail-box { background: #e8f4fd; border-left: 4px solid #0077B6; border-radius: 6px; padding: 20px 25px; margin: 24px 0; }
        .detail-box .row { display: flex; margin-bottom: 10px; }
        .detail-box .row:last-child { margin-bottom: 0; }
        .detail-box .label { font-weight: 600; min-width: 140px; color: #555; }
        .detail-box .value { color: #222; font-weight: 500; }
        .what-to-expect { background: #f8f9fa; border-radius: 8px; padding: 20px 25px; margin: 24px 0; }
        .what-to-expect h3 { margin: 0 0 12px; color: #0077B6; font-size: 1rem; }
        .what-to-expect ul { margin: 0; padding-left: 20px; }
        .what-to-expect li { margin-bottom: 6px; line-height: 1.6; }
        .address-box { background: #fff3cd; border-radius: 8px; padding: 16px 20px; margin: 16px 0; font-size: 0.95rem; }
        .footer { background: #f8f9fa; padding: 20px 40px; text-align: center; color: #888; font-size: 0.82rem; border-top: 1px solid #e9ecef; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✅ Your Tour is Confirmed!</h1>
            <p>We can't wait to show you around</p>
        </div>
        <div class="body">
            <p>Hi <strong>{{ $lead->name }}</strong>,</p>
            <p>Great news — your tour of <strong>Peekaboo Early Learning Centre</strong> is confirmed! We're excited to meet you and {{ $lead->child_name }}.</p>

            <div class="detail-box">
                <div class="row">
                    <span class="label">📅 Date:</span>
                    <span class="value">{{ $lead->preferred_date->format('l, d F Y') }}</span>
                </div>
                <div class="row">
                    <span class="label">⏰ Time:</span>
                    <span class="value">{{ $lead->preferred_time }}</span>
                </div>
                <div class="row">
                    <span class="label">👶 Child:</span>
                    <span class="value">{{ $lead->child_name }} ({{ $lead->child_age }})</span>
                </div>
                <div class="row">
                    <span class="label">🔖 Reference:</span>
                    <span class="value" style="font-family: monospace; font-weight: 700;">{{ $lead->reference }}</span>
                </div>
            </div>

            <div class="what-to-expect">
                <h3>What to Expect on Your Visit</h3>
                <ul>
                    <li>A 45-minute guided tour of our facilities</li>
                    <li>Meet our experienced and caring teachers</li>
                    <li>See our classrooms, outdoor play areas, and facilities</li>
                    <li>Q&amp;A session — bring your questions!</li>
                    <li>Information on our programmes and fees</li>
                </ul>
            </div>

            <div class="address-box">
                📍 <strong>Address:</strong> Peekaboo Early Learning Centre<br>
                Please arrive 5 minutes before your scheduled time.
            </div>

            <p>If you need to reschedule or have any questions, please call or reply to this email.</p>

            <p>See you soon!<br><strong>The Peekaboo Team</strong></p>
        </div>
        <div class="footer">
            <p>Peekaboo Early Learning Centre &bull; Reference: <strong>{{ $lead->reference }}</strong></p>
        </div>
    </div>
</body>
</html>
