<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Tour Confirmed — {{ $lead->reference }}</title>
<!--[if mso]>
<noscript><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml></noscript>
<![endif]-->
</head>
<body style="margin:0;padding:0;background-color:#f4f4f5;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Helvetica Neue',Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;">

@php
  $tourDate = $lead->tour_scheduled_at ?? $lead->preferred_date;
  $tourTime = $lead->tour_scheduled_at ? $lead->tour_scheduled_at->format('H:i') : $lead->preferred_time;
@endphp

<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f4f4f5" role="presentation">
  <tr>
    <td align="center" style="padding:40px 16px;">

      <!-- Logo -->
      <table width="600" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;width:100%;margin-bottom:24px;" role="presentation">
        <tr>
          <td align="center">
            <img src="{{ asset('assets/img/peekaboo/logo.png') }}" alt="Peekaboo" width="140" style="display:block;border:0;outline:none;" />
          </td>
        </tr>
      </table>

      <!-- Card -->
      <table width="600" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 1px 3px rgba(0,0,0,0.08),0 1px 2px rgba(0,0,0,0.06);" role="presentation">

        <tr><td height="4" style="background:#0077B6;font-size:0;line-height:0;">&nbsp;</td></tr>

        <!-- Header -->
        <tr>
          <td align="center" style="padding:36px 40px 28px;">
            <!-- Confirmed icon -->
            <table cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 20px;" role="presentation">
              <tr>
                <td width="56" height="56" align="center" valign="middle" bgcolor="#f0fdf4" style="border-radius:50%;border:2px solid #bbf7d0;text-align:center;font-size:28px;line-height:56px;">&#10003;</td>
              </tr>
            </table>
            <!-- Confirmed badge -->
            <table cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 16px;" role="presentation">
              <tr>
                <td style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:100px;padding:5px 14px;font-size:11px;font-weight:600;color:#16a34a;letter-spacing:0.05em;text-transform:uppercase;">Confirmed</td>
              </tr>
            </table>
            <h1 style="margin:0 0 8px;font-size:24px;font-weight:700;color:#18181b;letter-spacing:-0.025em;line-height:1.25;">Your Tour is Confirmed</h1>
            <p style="margin:0;font-size:14px;color:#71717a;line-height:1.5;">We can't wait to show you around Peekaboo.</p>
          </td>
        </tr>

        <tr><td style="padding:0 40px;"><table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td height="1" bgcolor="#e4e4e7" style="font-size:0;line-height:0;">&nbsp;</td></tr></table></td></tr>

        <!-- Body -->
        <tr>
          <td style="padding:28px 40px 32px;">

            <p style="margin:0 0 14px;font-size:15px;color:#3f3f46;">Hi <strong>{{ $lead->name }}</strong>,</p>
            <p style="margin:0 0 24px;font-size:14px;color:#52525b;line-height:1.7;">
              Great news &mdash; your tour of Peekaboo Early Learning Centre is confirmed! We look forward to meeting you and {{ $lead->child_name }}.
            </p>

            <!-- Tour date/time highlight -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f0f9ff;border:1px solid #bae6fd;border-radius:10px;margin-bottom:24px;" role="presentation">
              <tr>
                <td align="center" style="padding:28px 24px;">
                  <p style="margin:0 0 4px;font-size:22px;font-weight:700;color:#0077B6;letter-spacing:-0.02em;">{{ $tourDate->format('l, d F Y') }}</p>
                  <p style="margin:0 0 14px;font-size:16px;font-weight:500;color:#3f3f46;">at {{ $tourTime }}</p>
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation">
                    <tr>
                      <td style="background:#fafafa;border:1px solid #e4e4e7;border-radius:6px;padding:6px 16px;">
                        <p style="margin:0;font-size:12px;color:#71717a;">Reference: <strong style="font-family:'SFMono-Regular','Consolas','Liberation Mono','Menlo',monospace;color:#0077B6;font-size:13px;">{{ $lead->reference }}</strong></p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

            <!-- Your Visit -->
            <p style="margin:0 0 10px;font-size:12px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;color:#a1a1aa;">Your Visit</p>
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #e4e4e7;border-radius:8px;overflow:hidden;margin-bottom:24px;" role="presentation">
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="120" style="font-size:13px;color:#71717a;">Date</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $tourDate->format('l, d F Y') }}</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="120" style="font-size:13px;color:#71717a;">Time</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $tourTime }}</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="120" style="font-size:13px;color:#71717a;">Child</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $lead->child_name }} &mdash; {{ $lead->child_age }}</td>
                  </tr></table>
                </td>
              </tr>
            </table>

            <!-- What to Expect -->
            <p style="margin:0 0 10px;font-size:12px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;color:#a1a1aa;">What to Expect</p>
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #e4e4e7;border-radius:8px;overflow:hidden;margin-bottom:24px;" role="presentation">
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="6" height="6" valign="top" style="padding-top:6px;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" bgcolor="#0077B6" style="border-radius:50%;font-size:0;line-height:0;">&nbsp;</td></tr></table></td>
                    <td style="padding-left:12px;font-size:13px;color:#52525b;line-height:1.5;">A guided tour of our classrooms and outdoor play areas</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="6" height="6" valign="top" style="padding-top:6px;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" bgcolor="#0077B6" style="border-radius:50%;font-size:0;line-height:0;">&nbsp;</td></tr></table></td>
                    <td style="padding-left:12px;font-size:13px;color:#52525b;line-height:1.5;">Meet our experienced teachers and care team</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="6" height="6" valign="top" style="padding-top:6px;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" bgcolor="#0077B6" style="border-radius:50%;font-size:0;line-height:0;">&nbsp;</td></tr></table></td>
                    <td style="padding-left:12px;font-size:13px;color:#52525b;line-height:1.5;">Learn about our programmes, curriculum, and daily routines</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="6" height="6" valign="top" style="padding-top:6px;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" bgcolor="#0077B6" style="border-radius:50%;font-size:0;line-height:0;">&nbsp;</td></tr></table></td>
                    <td style="padding-left:12px;font-size:13px;color:#52525b;line-height:1.5;">A Q&amp;A session &mdash; please bring your questions!</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="6" height="6" valign="top" style="padding-top:6px;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" bgcolor="#0077B6" style="border-radius:50%;font-size:0;line-height:0;">&nbsp;</td></tr></table></td>
                    <td style="padding-left:12px;font-size:13px;color:#52525b;line-height:1.5;">Information on fees, availability, and the enrolment process</td>
                  </tr></table>
                </td>
              </tr>
            </table>

            <!-- Address -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#fafafa;border:1px solid #e4e4e7;border-left:3px solid #0077B6;border-radius:4px;margin-bottom:28px;" role="presentation">
              <tr>
                <td style="padding:16px 20px;">
                  <p style="margin:0 0 4px;font-size:12px;font-weight:600;color:#71717a;text-transform:uppercase;letter-spacing:0.04em;">Venue Address</p>
                  <p style="margin:0;font-size:13px;color:#3f3f46;line-height:1.7;">
                    Peekaboo Early Learning Centre<br>
                    139b Humewood Dr, Parklands, Cape Town, 7441
                  </p>
                  <p style="margin:8px 0 0;font-size:12px;color:#a1a1aa;">Please arrive 5 minutes before your scheduled time.</p>
                </td>
              </tr>
            </table>

            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:24px;" role="presentation"><tr><td height="1" bgcolor="#e4e4e7" style="font-size:0;line-height:0;">&nbsp;</td></tr></table>

            <p style="margin:0;font-size:14px;color:#52525b;line-height:1.8;">
              If you need to reschedule or have any questions, please call us or simply reply to this email.<br><br>
              See you soon,<br>
              <strong style="color:#18181b;">The Peekaboo Team</strong>
            </p>

          </td>
        </tr>

        <!-- Footer -->
        <tr><td style="padding:0 40px;"><table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td height="1" bgcolor="#e4e4e7" style="font-size:0;line-height:0;">&nbsp;</td></tr></table></td></tr>
        <tr>
          <td style="padding:20px 40px 28px;">
            <p style="margin:0;font-size:12px;color:#a1a1aa;line-height:1.7;text-align:center;">
              Peekaboo Early Learning Centre &bull; 139b Humewood Dr, Parklands, Cape Town, 7441<br>
              Reference: <strong>{{ $lead->reference }}</strong>
            </p>
          </td>
        </tr>

      </table>

      <table width="600" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;width:100%;margin-top:20px;" role="presentation">
        <tr><td align="center"><p style="margin:0;font-size:11px;color:#a1a1aa;">&copy; {{ date('Y') }} Peekaboo Early Learning Centre. All rights reserved.</p></td></tr>
      </table>

    </td>
  </tr>
</table>

</body>
</html>
