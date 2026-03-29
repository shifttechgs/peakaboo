<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Booking Received — {{ $lead->reference }}</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif;
    background-color: #f6f9fc; color: #1a1a2e;
    -webkit-font-smoothing: antialiased; font-size: 15px; line-height: 1.6;
  }
  .email-wrapper { background-color: #f6f9fc; padding: 48px 16px; }
  .email-card { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #e4e9f0; }
  .accent-bar { height: 4px; background: linear-gradient(90deg, #0077B6 0%, #00B4D8 100%); }
  .email-header { padding: 36px 40px 32px; border-bottom: 1px solid #f0f3f7; text-align: center; }
  .brand { display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 24px; }
  .brand-dot { width: 8px; height: 8px; background: #0077B6; border-radius: 50%; flex-shrink: 0; }
  .brand-name { font-size: 12px; font-weight: 700; color: #0077B6; letter-spacing: 0.08em; text-transform: uppercase; }
  .icon-circle {
    width: 56px; height: 56px; background: #eff8ff; border-radius: 50%;
    display: inline-flex; align-items: center; justify-content: center;
    margin-bottom: 20px; border: 1px solid #bfdbfe;
  }
  .email-header h1 { font-size: 22px; font-weight: 700; color: #0f172a; letter-spacing: -0.3px; line-height: 1.3; }
  .email-header .subtitle { margin-top: 8px; font-size: 14px; color: #64748b; }
  .email-body { padding: 32px 40px; }
  .greeting { font-size: 15px; color: #334155; margin-bottom: 14px; }
  .intro { font-size: 14px; color: #475569; line-height: 1.7; margin-bottom: 24px; }
  .ref-block { text-align: center; margin: 24px 0; padding: 20px; background: #f8fafc; border: 1px solid #e4e9f0; border-radius: 8px; }
  .ref-label { font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 10px; }
  .ref-code {
    display: inline-block; font-size: 20px; font-weight: 700;
    font-family: 'Courier New', Courier, monospace; color: #0077B6; letter-spacing: 1.5px;
    background: #eff8ff; border: 1px solid #bfdbfe; padding: 8px 24px; border-radius: 6px;
  }
  .section-label { font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #94a3b8; margin-bottom: 8px; margin-top: 24px; }
  .detail-block { background: #f8fafc; border: 1px solid #e4e9f0; border-radius: 6px; overflow: hidden; }
  .detail-row { display: flex; align-items: flex-start; padding: 11px 18px; border-bottom: 1px solid #f0f3f7; }
  .detail-row:last-child { border-bottom: none; }
  .detail-key { font-size: 13px; color: #64748b; min-width: 140px; flex-shrink: 0; }
  .detail-val { font-size: 13px; font-weight: 600; color: #1e293b; }
  .notice-box { margin: 24px 0 0; padding: 16px 18px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 6px; font-size: 13px; color: #166534; line-height: 1.6; }
  .divider { height: 1px; background: #f0f3f7; margin: 28px 0; }
  .closing { font-size: 14px; color: #475569; line-height: 1.8; }
  .closing strong { color: #1e293b; font-weight: 600; }
  .email-footer { padding: 20px 40px 28px; border-top: 1px solid #f0f3f7; }
  .footer-text { font-size: 12px; color: #94a3b8; line-height: 1.7; text-align: center; }
  @media (max-width: 600px) {
    .email-header, .email-body, .email-footer { padding-left: 20px; padding-right: 20px; }
    .detail-row { flex-direction: column; gap: 2px; }
    .detail-key { min-width: unset; }
  }
</style>
</head>
<body>
<div class="email-wrapper">
  <div class="email-card">

    <div class="accent-bar"></div>

    <div class="email-header">
      <div class="brand">
        <div class="brand-dot"></div>
        <span class="brand-name">Peekaboo Early Learning Centre</span>
      </div>
      <div class="icon-circle">
        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M5 13.5L10.5 19L21 8" stroke="#0077B6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <h1>Booking Received!</h1>
      <p class="subtitle">We've got your request and will confirm within 24 hours.</p>
    </div>

    <div class="email-body">

      <p class="greeting">Hi <strong>{{ $lead->name }}</strong>,</p>
      <p class="intro">
        Thank you for your interest in Peekaboo Early Learning Centre. We have received your tour booking request and one of our team members will be in touch to confirm your visit.
      </p>

      <div class="ref-block">
        <div class="ref-label">Your Booking Reference</div>
        <div class="ref-code">{{ $lead->reference }}</div>
      </div>

      <div class="section-label">Booking Summary</div>
      <div class="detail-block">
        <div class="detail-row">
          <span class="detail-key">Preferred Date</span>
          <span class="detail-val">{{ $lead->preferred_date->format('l, d F Y') }}</span>
        </div>
        <div class="detail-row">
          <span class="detail-key">Preferred Time</span>
          <span class="detail-val">{{ $lead->preferred_time }}</span>
        </div>
        <div class="detail-row">
          <span class="detail-key">Child's Name</span>
          <span class="detail-val">{{ $lead->child_name }}</span>
        </div>
        <div class="detail-row">
          <span class="detail-key">Age Group</span>
          <span class="detail-val">{{ $lead->child_age }}</span>
        </div>
      </div>

      <div class="notice-box">
        <strong>What happens next?</strong><br>
        Our team will call or email you to confirm the exact date and time. Please keep your reference number handy — you may need it when we get in touch.
      </div>

      <div class="divider"></div>

      <p class="closing">
        We look forward to welcoming you and {{ $lead->child_name }} to Peekaboo.<br><br>
        Warm regards,<br>
        <strong>The Peekaboo Team</strong>
      </p>

    </div>

    <div class="email-footer">
      <p class="footer-text">
        Peekaboo Early Learning Centre &bull; 139b Humewood Dr, Parklands, Cape Town, 7441<br>
        Reference: <strong>{{ $lead->reference }}</strong>
      </p>
    </div>

  </div>
</div>
</body>
</html>
