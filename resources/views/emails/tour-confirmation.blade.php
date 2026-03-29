<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Tour Confirmed — {{ $lead->reference }}</title>
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
    width: 60px; height: 60px; background: #eff8ff; border-radius: 50%;
    display: inline-flex; align-items: center; justify-content: center;
    margin-bottom: 20px; border: 1px solid #bfdbfe;
  }
  .confirmed-badge {
    display: inline-flex; align-items: center; gap: 6px;
    background: #f0fdf4; color: #16a34a;
    font-size: 11px; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase;
    padding: 4px 12px; border-radius: 20px; border: 1px solid #bbf7d0; margin-bottom: 14px;
  }
  .email-header h1 { font-size: 22px; font-weight: 700; color: #0f172a; letter-spacing: -0.3px; line-height: 1.3; }
  .email-header .subtitle { margin-top: 8px; font-size: 14px; color: #64748b; }
  .email-body { padding: 32px 40px; }
  .greeting { font-size: 15px; color: #334155; margin-bottom: 14px; }
  .intro { font-size: 14px; color: #475569; line-height: 1.7; margin-bottom: 24px; }
  .confirmed-block {
    background: #eff8ff; border: 1px solid #bfdbfe; border-radius: 8px;
    padding: 24px; margin-bottom: 24px; text-align: center;
  }
  .confirmed-block .date-large { font-size: 20px; font-weight: 700; color: #0077B6; margin-bottom: 4px; }
  .confirmed-block .time-large { font-size: 15px; font-weight: 500; color: #334155; }
  .confirmed-block .ref-small { margin-top: 12px; font-size: 12px; color: #64748b; }
  .confirmed-block .ref-small strong { font-family: 'Courier New', Courier, monospace; color: #0077B6; font-size: 13px; }
  .section-label { font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #94a3b8; margin-bottom: 8px; margin-top: 24px; }
  .detail-block { background: #f8fafc; border: 1px solid #e4e9f0; border-radius: 6px; overflow: hidden; }
  .detail-row { display: flex; align-items: flex-start; padding: 11px 18px; border-bottom: 1px solid #f0f3f7; }
  .detail-row:last-child { border-bottom: none; }
  .detail-key { font-size: 13px; color: #64748b; min-width: 140px; flex-shrink: 0; }
  .detail-val { font-size: 13px; font-weight: 600; color: #1e293b; }
  .expect-list { list-style: none; padding: 0; margin: 0; background: #f8fafc; border: 1px solid #e4e9f0; border-radius: 6px; overflow: hidden; }
  .expect-list li { display: flex; align-items: flex-start; gap: 12px; padding: 10px 18px; border-bottom: 1px solid #f0f3f7; font-size: 13px; color: #475569; }
  .expect-list li:last-child { border-bottom: none; }
  .expect-dot { min-width: 6px; height: 6px; background: #0077B6; border-radius: 50%; margin-top: 7px; flex-shrink: 0; }
  .address-block {
    margin-top: 16px; padding: 16px 18px;
    background: #fffbeb; border: 1px solid #fde68a; border-radius: 6px;
    font-size: 13px; color: #78350f; line-height: 1.7;
  }
  .address-block strong { font-weight: 600; display: block; margin-bottom: 2px; }
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
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect x="4" y="7" width="20" height="17" rx="2" stroke="#0077B6" stroke-width="2" fill="none"/>
          <path d="M4 12H24" stroke="#0077B6" stroke-width="2"/>
          <path d="M9 4V8M19 4V8" stroke="#0077B6" stroke-width="2" stroke-linecap="round"/>
          <path d="M9 17L12 20L19 14" stroke="#0077B6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <div class="confirmed-badge">&#10003; Confirmed</div>
      <h1>Your Tour is Confirmed</h1>
      <p class="subtitle">We can't wait to show you around Peekaboo.</p>
    </div>

    <div class="email-body">

      @php
        $tourDate = $lead->tour_scheduled_at ?? $lead->preferred_date;
        $tourTime = $lead->tour_scheduled_at ? $lead->tour_scheduled_at->format('H:i') : $lead->preferred_time;
      @endphp

      <p class="greeting">Hi <strong>{{ $lead->name }}</strong>,</p>
      <p class="intro">
        Great news — your tour of Peekaboo Early Learning Centre is confirmed! We look forward to meeting you and {{ $lead->child_name }}.
      </p>

      <!-- Confirmed date/time block -->
      <div class="confirmed-block">
        <div class="date-large">{{ $tourDate->format('l, d F Y') }}</div>
        <div class="time-large">at {{ $tourTime }}</div>
        <div class="ref-small">Reference: <strong>{{ $lead->reference }}</strong></div>
      </div>

      <!-- Visit summary -->
      <div class="section-label">Your Visit</div>
      <div class="detail-block">
        <div class="detail-row">
          <span class="detail-key">Date</span>
          <span class="detail-val">{{ $tourDate->format('l, d F Y') }}</span>
        </div>
        <div class="detail-row">
          <span class="detail-key">Time</span>
          <span class="detail-val">{{ $tourTime }}</span>
        </div>
        <div class="detail-row">
          <span class="detail-key">Child</span>
          <span class="detail-val">{{ $lead->child_name }} &mdash; {{ $lead->child_age }}</span>
        </div>
      </div>

      <!-- What to expect -->
      <div class="section-label" style="margin-top:20px;">What to Expect</div>
      <ul class="expect-list">
        <li><span class="expect-dot"></span>A guided tour of our classrooms and outdoor play areas</li>
        <li><span class="expect-dot"></span>Meet our experienced teachers and care team</li>
        <li><span class="expect-dot"></span>Learn about our programmes, curriculum, and daily routines</li>
        <li><span class="expect-dot"></span>A Q&amp;A session — please bring your questions!</li>
        <li><span class="expect-dot"></span>Information on fees, availability, and the enrolment process</li>
      </ul>

      <!-- Address -->
      <div class="address-block">
        <strong>Venue Address</strong>
        Peekaboo Early Learning Centre<br>
        139b Humewood Dr, Parklands, Cape Town, 7441<br>
        <span style="margin-top:6px;display:block;font-size:12px;opacity:0.8;">Please arrive 5 minutes before your scheduled time.</span>
      </div>

      <div class="divider"></div>

      <p class="closing">
        If you need to reschedule or have any questions, please call us or simply reply to this email.<br><br>
        See you soon,<br>
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
