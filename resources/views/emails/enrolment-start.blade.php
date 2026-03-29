<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Your Enrolment</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f6fa; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .header { background: #28a745; color: white; padding: 30px 40px; text-align: center; }
        .header h1 { margin: 0; font-size: 1.6rem; }
        .header p { margin: 8px 0 0; opacity: 0.85; }
        .body { padding: 35px 40px; }
        .body p { line-height: 1.7; margin: 0 0 16px; }
        .cta-button { display: block; text-align: center; margin: 30px 0; }
        .cta-button a { background: #0077B6; color: white; text-decoration: none; padding: 16px 40px; border-radius: 8px; font-weight: 700; font-size: 1.05rem; display: inline-block; }
        .docs-box { background: #f8f9fa; border-left: 4px solid #28a745; border-radius: 6px; padding: 20px 25px; margin: 24px 0; }
        .docs-box h3 { margin: 0 0 12px; color: #155724; font-size: 1rem; }
        .docs-box ul { margin: 0; padding-left: 20px; }
        .docs-box li { margin-bottom: 8px; line-height: 1.6; }
        .footer { background: #f8f9fa; padding: 20px 40px; text-align: center; color: #888; font-size: 0.82rem; border-top: 1px solid #e9ecef; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎊 Welcome to the Peekaboo Family!</h1>
            <p>We'd love to enrol {{ $lead->child_name }}</p>
        </div>
        <div class="body">
            <p>Hi <strong>{{ $lead->name }}</strong>,</p>
            <p>We're thrilled to welcome <strong>{{ $lead->child_name }}</strong> to Peekaboo Early Learning Centre! Please complete the enrolment application using the link below — it only takes a few minutes.</p>

            <div class="cta-button">
                <a href="{{ $enrolUrl }}">Complete Enrolment Form →</a>
            </div>

            <div class="docs-box">
                <h3>📋 Documents You'll Need</h3>
                <ul>
                    <li>Child's birth certificate (certified copy)</li>
                    <li>Parent/guardian ID document</li>
                    <li>Immunisation / Road to Health card</li>
                    <li>Recent photo of your child</li>
                    <li>Proof of address (not older than 3 months)</li>
                </ul>
            </div>

            <p style="font-size:0.85rem; color:#888; margin-top:24px;">
                <em>This link is personalised for you and will pre-fill your details. Please don't share it.</em>
            </p>

            <p>Once your application is submitted, our team will review it and be in touch to confirm your start date and any remaining details.</p>

            <p>If you have any questions at any stage, please don't hesitate to call us or reply to this email — we're here to help.</p>

            <p>We look forward to having {{ $lead->child_name }} with us!<br><strong>The Peekaboo Team</strong></p>
        </div>
        <div class="footer">
            <p>Peekaboo Early Learning Centre &bull; 139b Humewood Dr, Parklands, Cape Town, 7441</p>
            <p>{{ $lead->reference }}</p>
        </div>
    </div>
</body>
</html>
