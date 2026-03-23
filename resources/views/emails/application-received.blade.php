<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Received</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f6fa; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .header { background: #0c508e; color: white; padding: 32px 40px; text-align: center; }
        .header h1 { margin: 0; font-size: 1.5rem; }
        .header p { margin: 8px 0 0; opacity: 0.8; font-size: 0.9rem; }
        .body { padding: 32px 40px; }
        .body p { line-height: 1.7; margin: 0 0 14px; }
        .ref-box { background: #f0f4f8; border-left: 4px solid #0c508e; border-radius: 6px; padding: 18px 24px; text-align: center; margin: 24px 0; }
        .ref-box .label { font-size: 0.72rem; font-weight: 700; color: #6c757d; text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 6px; }
        .ref-box .ref { font-family: 'Courier New', monospace; font-size: 1.6rem; font-weight: 700; color: #0c508e; letter-spacing: 3px; }
        .timeline { margin: 24px 0; }
        .timeline-item { display: flex; gap: 14px; padding: 10px 0; border-bottom: 1px solid #f0f0f0; }
        .timeline-item:last-child { border-bottom: none; }
        .step-num { width: 28px; height: 28px; border-radius: 50%; background: #0c508e; color: white; font-size: 0.75rem; font-weight: 700; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 1px; }
        .step-text { font-size: 0.9rem; color: #4a4a5a; line-height: 1.5; }
        .step-text strong { color: #333; }
        .footer { background: #f8f9fa; padding: 18px 40px; text-align: center; color: #888; font-size: 0.8rem; border-top: 1px solid #e9ecef; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Application Received!</h1>
            <p>Peekaboo Early Learning Centre</p>
        </div>
        <div class="body">
            <p>Hi <strong>{{ $application->mother_name }}</strong>,</p>
            <p>
                Thank you for submitting an enrolment application for <strong>{{ $application->child_name }}</strong>.
                We have received your application and our team will review it within <strong>2–3 business days</strong>.
            </p>

            <div class="ref-box">
                <div class="label">Application Reference</div>
                <div class="ref">{{ $application->reference }}</div>
                <div style="font-size:0.78rem;color:#9ca3af;margin-top:4px;">Please keep this for your records</div>
            </div>

            <p>Here's what happens next:</p>

            <div class="timeline">
                <div class="timeline-item">
                    <div class="step-num">1</div>
                    <div class="step-text"><strong>Application Review (1–2 days)</strong><br>Our admin team reviews your child's details and documents.</div>
                </div>
                <div class="timeline-item">
                    <div class="step-num">2</div>
                    <div class="step-text"><strong>Decision Notification</strong><br>You'll receive an email with our decision — approved, waitlisted, or if we need more info.</div>
                </div>
                <div class="timeline-item">
                    <div class="step-num">3</div>
                    <div class="step-text"><strong>Portal Access (if approved)</strong><br>You'll receive a separate email to set up your parent portal login and get started.</div>
                </div>
                <div class="timeline-item">
                    <div class="step-num">4</div>
                    <div class="step-text"><strong>Welcome to Peekaboo!</strong><br>{{ $application->child_name }} joins us on {{ $application->start_date->format('d F Y') }}.</div>
                </div>
            </div>

            <p>
                You can check your application status at any time at:<br>
                <a href="{{ url('/enrol/status/' . $application->reference) }}" style="color:#0c508e;">
                    {{ url('/enrol/status/' . $application->reference) }}
                </a>
            </p>

            <p>Questions? Don't hesitate to contact us.</p>
            <p>Warm regards,<br><strong>The Peekaboo Team</strong></p>
        </div>
        <div class="footer">
            <p>Peekaboo Early Learning Centre &bull; 139b Humewood Dr, Parklands, Cape Town, 7441</p>
            <p>Reference: <strong>{{ $application->reference }}</strong></p>
        </div>
    </div>
</body>
</html>
