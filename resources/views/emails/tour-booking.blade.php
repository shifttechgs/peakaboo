<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>New Tour Booking — {{ $bookingId }}</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif;
    background-color: #f6f9fc;
    color: #1a1a2e;
    -webkit-font-smoothing: antialiased;
    font-size: 15px;
    line-height: 1.6;
  }
  .email-wrapper { background-color: #f6f9fc; padding: 48px 16px; }
  .email-card {
    max-width: 600px;
    margin: 0 auto;
    background: #ffffff;
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid #e4e9f0;
  }
  .accent-bar { height: 4px; background: linear-gradient(90deg, #0077B6 0%, #00B4D8 100%); }
  .email-header { padding: 32px 40px 28px; border-bottom: 1px solid #f0f3f7; }
  .brand { display: flex; align-items: center; gap: 10px; margin-bottom: 20px; }
  .brand-dot { width: 8px; height: 8px; background: #0077B6; border-radius: 50%; flex-shrink: 0; }
  .brand-name { font-size: 12px; font-weight: 700; color: #0077B6; letter-spacing: 0.08em; text-transform: uppercase; }
  .alert-badge {
    display: inline-flex; align-items: center; gap: 6px;
    background: #eff8ff; color: #0077B6;
    font-size: 11px; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase;
    padding: 4px 12px; border-radius: 20px; border: 1px solid #bfdbfe; margin-bottom: 14px;
  }
  .email-header h1 { font-size: 22px; font-weight: 700; color: #0f172a; letter-spacing: -0.3px; line-height: 1.3; }
  .email-header .subtitle { margin-top: 6px; font-size: 14px; color: #64748b; }
  .email-body { padding: 32px 40px; }
  .ref-row {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 28px; padding: 14px 18px;
    background: #f8fafc; border-radius: 6px; border: 1px solid #e4e9f0;
  }
  .ref-label { font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 3px; }
  .ref-value { font-size: 15px; font-weight: 700; color: #0077B6; font-family: 'Courier New', Courier, monospace; letter-spacing: 0.5px; }
  .ref-date { font-size: 12px; color: #94a3b8; text-align: right; }
  .section-label { font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #94a3b8; margin-bottom: 8px; margin-top: 22px; }
  .section-label:first-of-type { margin-top: 0; }
  .detail-block { background: #f8fafc; border: 1px solid #e4e9f0; border-radius: 6px; overflow: hidden; margin-bottom: 4px; }
  .detail-row { display: flex; align-items: flex-start; padding: 11px 18px; border-bottom: 1px solid #f0f3f7; }
  .detail-row:last-child { border-bottom: none; }
  .detail-key { font-size: 13px; color: #64748b; min-width: 160px; flex-shrink: 0; }
  .detail-val { font-size: 13px; font-weight: 600; color: #1e293b; }
  .detail-row.highlight { background: #eff8ff; }
  .detail-row.highlight .detail-val { color: #0077B6; }
  .message-box {
    background: #fffbeb; border: 1px solid #fde68a; border-radius: 6px;
    padding: 14px 18px; font-size: 13px; color: #78350f; line-height: 1.6; margin-bottom: 4px;
  }
  .cta-wrap { margin: 32px 0 28px; text-align: center; }
  .cta-btn {
    display: inline-block; background: #0077B6; color: #ffffff !important;
    text-decoration: none; font-size: 14px; font-weight: 600;
    padding: 13px 36px; border-radius: 6px; letter-spacing: 0.01em;
  }
  .divider { height: 1px; background: #f0f3f7; margin: 24px 0; }
  .steps-list { list-style: none; padding: 0; margin: 0; }
  .steps-list li { display: flex; align-items: flex-start; gap: 12px; font-size: 13px; color: #475569; padding: 8px 0; border-bottom: 1px solid #f0f3f7; }
  .steps-list li:last-child { border-bottom: none; }
  .step-num {
    min-width: 22px; height: 22px; background: #0077B6; color: #fff;
    border-radius: 50%; font-size: 11px; font-weight: 700;
    display: inline-flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 1px;
  }
  .email-footer { padding: 20px 40px 28px; border-top: 1px solid #f0f3f7; }
  .footer-text { font-size: 12px; color: #94a3b8; line-height: 1.7; text-align: center; }
  @media (max-width: 600px) {
    .email-header, .email-body, .email-footer { padding-left: 20px; padding-right: 20px; }
    .detail-row { flex-direction: column; gap: 2px; }
    .detail-key { min-width: unset; }
    .ref-row { flex-direction: column; gap: 6px; align-items: flex-start; }
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
      <div class="alert-badge">&#9679; New Booking</div>
      <h1>Tour Booking Request</h1>
      <p class="subtitle">A family has submitted a tour request through the website.</p>
    </div>

    <div class="email-body">

      <div class="ref-row">
        <div>
          <div class="ref-label">Booking Reference</div>
          <div class="ref-value">{{ $bookingId }}</div>
        </div>
        <div class="ref-date">{{ now()->format('d M Y') }}<br>{{ now()->format('H:i') }}</div>
      </div>

      <div class="section-label">Tour Details</div>
      <div class="detail-block">
        <div class="detail-row highlight">
          <span class="detail-key">Preferred Date</span>
          <span class="detail-val">{{ \Carbon\Carbon::parse($data['preferred_date'])->format('l, d F Y') }}</span>
        </div>
        <div class="detail-row highlight">
          <span class="detail-key">Preferred Time</span>
          <span class="detail-val">{{ $data['preferred_time'] }}</span>
        </div>
      </div>

      <div class="section-label" style="margin-top:20px;">Parent / Guardian</div>
      <div class="detail-block">
        <div class="detail-row">
          <span class="detail-key">Full Name</span>
          <span class="detail-val">{{ $data['name'] }}</span>
        </div>
        <div class="detail-row">
          <span class="detail-key">Email Address</span>
          <span class="detail-val">{{ $data['email'] }}</span>
        </div>
        <div class="detail-row">
          <span class="detail-key">Phone Number</span>
          <span class="detail-val">{{ $data['phone'] }}</span>
        </div>
        @if(!empty($data['source']))
        <div class="detail-row">
          <span class="detail-key">Heard About Us</span>
          <span class="detail-val">{{ ucfirst($data['source']) }}</span>
        </div>
        @endif
      </div>

      <div class="section-label" style="margin-top:20px;">Child Information</div>
      <div class="detail-block">
        <div class="detail-row">
          <span class="detail-key">Child's Name</span>
          <span class="detail-val">{{ $data['child_name'] }}</span>
        </div>
        @if(!empty($data['child_nickname']))
        <div class="detail-row">
          <span class="detail-key">Nickname</span>
          <span class="detail-val">{{ $data['child_nickname'] }}</span>
        </div>
        @endif
        <div class="detail-row">
          <span class="detail-key">Age Group</span>
          <span class="detail-val">{{ $data['child_age'] }}</span>
        </div>
      </div>

      @if(!empty($data['message']))
      <div class="section-label" style="margin-top:20px;">Special Requirements</div>
      <div class="message-box">{{ $data['message'] }}</div>
      @endif

      <div class="cta-wrap">
        <a href="{{ route('admin.crm.leads') }}" class="cta-btn">Open in Lead Pipeline</a>
      </div>

      <div class="divider"></div>

      <div class="section-label">Suggested Next Steps</div>
      <ul class="steps-list">
        <li><span class="step-num">1</span> Contact {{ $data['name'] }} to confirm the preferred date and time.</li>
        <li><span class="step-num">2</span> Add the tour to the schedule and assign a team member.</li>
        <li><span class="step-num">3</span> Send a tour confirmation email from the Lead Pipeline.</li>
        <li><span class="step-num">4</span> Follow up after the tour to progress the lead.</li>
      </ul>

    </div>

    <div class="email-footer">
      <p class="footer-text">
        Sent automatically by the {{ config('app.name') }} booking system.<br>
        Peekaboo Early Learning Centre &bull; 139b Humewood Dr, Parklands, Cape Town, 7441
      </p>
    </div>

  </div>
</div>
</body>
</html>
