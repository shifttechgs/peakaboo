<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Booking Received — {{ $lead->reference }}</title>
<!--[if mso]>
<noscript><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml></noscript>
<![endif]-->
</head>
<body style="margin:0;padding:0;background-color:#f4f4f5;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Helvetica Neue',Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;">

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
            <!-- Success icon -->
            <table cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 20px;" role="presentation">
              <tr>
                <td width="56" height="56" align="center" valign="middle" bgcolor="#f0f9ff" style="border-radius:50%;border:2px solid #bae6fd;text-align:center;font-size:28px;line-height:56px;">&#128197;</td>
              </tr>
            </table>
            <!-- Badge -->
            <table cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 16px;" role="presentation">
              <tr>
                <td style="background:#f0f9ff;border:1px solid #bae6fd;border-radius:100px;padding:5px 14px;font-size:11px;font-weight:600;color:#0077B6;letter-spacing:0.05em;text-transform:uppercase;">Received</td>
              </tr>
            </table>
            <h1 style="margin:0 0 8px;font-size:24px;font-weight:700;color:#18181b;letter-spacing:-0.025em;line-height:1.25;">Booking Received!</h1>
            <p style="margin:0;font-size:14px;color:#71717a;line-height:1.5;">We've got your request and will confirm within 24 hours.</p>
          </td>
        </tr>

        <tr><td style="padding:0 40px;"><table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td height="1" bgcolor="#e4e4e7" style="font-size:0;line-height:0;">&nbsp;</td></tr></table></td></tr>

        <!-- Body -->
        <tr>
          <td style="padding:28px 40px 32px;">

            <p style="margin:0 0 14px;font-size:15px;color:#3f3f46;">Hi <strong>{{ $lead->name }}</strong>,</p>
            <p style="margin:0 0 24px;font-size:14px;color:#52525b;line-height:1.7;">
              Thank you for your interest in Peekaboo Early Learning Centre. We have received your tour booking request and one of our team members will be in touch to confirm your visit.
            </p>

            <!-- Reference block -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#fafafa;border:1px solid #e4e4e7;border-radius:10px;margin-bottom:24px;" role="presentation">
              <tr>
                <td align="center" style="padding:24px;">
                  <p style="margin:0 0 10px;font-size:11px;font-weight:600;color:#a1a1aa;text-transform:uppercase;letter-spacing:0.06em;">Your Booking Reference</p>
                  <table cellpadding="0" cellspacing="0" border="0" style="margin:0 auto;" role="presentation">
                    <tr>
                      <td style="background:#f0f9ff;border:1px solid #bae6fd;border-radius:8px;padding:10px 28px;font-size:22px;font-weight:700;font-family:'SFMono-Regular','Consolas','Liberation Mono','Menlo',monospace;color:#0077B6;letter-spacing:2px;">{{ $lead->reference }}</td>
                    </tr>
                  </table>
                  <p style="margin:8px 0 0;font-size:12px;color:#a1a1aa;">Please keep this for your records</p>
                </td>
              </tr>
            </table>

            <!-- Booking Summary -->
            <p style="margin:0 0 10px;font-size:12px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;color:#a1a1aa;">Booking Summary</p>
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #e4e4e7;border-radius:8px;overflow:hidden;margin-bottom:24px;" role="presentation">
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="130" style="font-size:13px;color:#71717a;">Preferred Date</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $lead->preferred_date->format('l, d F Y') }}</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="130" style="font-size:13px;color:#71717a;">Preferred Time</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $lead->preferred_time }}</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="130" style="font-size:13px;color:#71717a;">Child's Name</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $lead->child_name }}</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="130" style="font-size:13px;color:#71717a;">Age Group</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $lead->child_age }}</td>
                  </tr></table>
                </td>
              </tr>
            </table>

            <!-- What happens next -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f0fdf4;border-left:3px solid #22c55e;border-radius:4px;margin-bottom:28px;" role="presentation">
              <tr>
                <td style="padding:16px 20px;">
                  <p style="margin:0 0 4px;font-size:13px;font-weight:600;color:#166534;">What happens next?</p>
                  <p style="margin:0;font-size:13px;color:#166534;line-height:1.6;">
                    Our team will call or email you to confirm the exact date and time. Please keep your reference number handy &mdash; you may need it when we get in touch.
                  </p>
                </td>
              </tr>
            </table>

            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:24px;" role="presentation"><tr><td height="1" bgcolor="#e4e4e7" style="font-size:0;line-height:0;">&nbsp;</td></tr></table>

            <p style="margin:0;font-size:14px;color:#52525b;line-height:1.8;">
              We look forward to welcoming you and {{ $lead->child_name }} to Peekaboo.<br><br>
              Warm regards,<br>
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
