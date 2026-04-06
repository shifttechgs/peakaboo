<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Start Your Enrolment — Peekaboo</title>
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
            <!-- Celebration icon -->
            <table cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 20px;" role="presentation">
              <tr>
                <td width="56" height="56" align="center" valign="middle" bgcolor="#fef3c7" style="border-radius:50%;border:2px solid #fde68a;text-align:center;font-size:28px;line-height:56px;">&#127881;</td>
              </tr>
            </table>
            <!-- Badge -->
            <table cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 16px;" role="presentation">
              <tr>
                <td style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:100px;padding:5px 14px;font-size:11px;font-weight:600;color:#16a34a;letter-spacing:0.05em;text-transform:uppercase;">Tour Completed</td>
              </tr>
            </table>
            <h1 style="margin:0 0 8px;font-size:24px;font-weight:700;color:#18181b;letter-spacing:-0.025em;line-height:1.25;">Welcome to the Peekaboo Family!</h1>
            <p style="margin:0;font-size:14px;color:#71717a;line-height:1.5;">We'd love to enrol {{ $lead->child_name }}</p>
          </td>
        </tr>

        <tr><td style="padding:0 40px;"><table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td height="1" bgcolor="#e4e4e7" style="font-size:0;line-height:0;">&nbsp;</td></tr></table></td></tr>

        <!-- Body -->
        <tr>
          <td style="padding:28px 40px 32px;">

            <p style="margin:0 0 14px;font-size:15px;color:#3f3f46;">Hi <strong>{{ $lead->name }}</strong>,</p>
            <p style="margin:0 0 24px;font-size:14px;color:#52525b;line-height:1.7;">
              We're thrilled to welcome <strong>{{ $lead->child_name }}</strong> to Peekaboo Early Learning Centre! Please complete the enrolment application using the link below &mdash; it only takes a few minutes.
            </p>

            <!-- CTA -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:28px;" role="presentation">
              <tr>
                <td align="center">
                  <a href="{{ $enrolUrl }}" style="display:inline-block;background:#0077B6;color:#ffffff;text-decoration:none;font-size:15px;font-weight:600;padding:16px 40px;border-radius:8px;text-align:center;">Complete Enrolment Form &rarr;</a>
                </td>
              </tr>
            </table>

            <!-- Documents needed -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#fafafa;border:1px solid #e4e4e7;border-left:3px solid #0077B6;border-radius:4px;margin-bottom:24px;" role="presentation">
              <tr>
                <td style="padding:20px 24px;">
                  <p style="margin:0 0 12px;font-size:13px;font-weight:600;color:#18181b;">Documents You'll Need</p>
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation">
                    <tr>
                      <td style="padding:4px 0;font-size:13px;color:#52525b;line-height:1.5;">
                        <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                          <td width="6" height="6" valign="top" style="padding-top:6px;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" bgcolor="#0077B6" style="border-radius:50%;font-size:0;line-height:0;">&nbsp;</td></tr></table></td>
                          <td style="padding-left:10px;">Child's birth certificate (certified copy)</td>
                        </tr></table>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:4px 0;font-size:13px;color:#52525b;line-height:1.5;">
                        <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                          <td width="6" height="6" valign="top" style="padding-top:6px;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" bgcolor="#0077B6" style="border-radius:50%;font-size:0;line-height:0;">&nbsp;</td></tr></table></td>
                          <td style="padding-left:10px;">Parent/guardian ID document</td>
                        </tr></table>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:4px 0;font-size:13px;color:#52525b;line-height:1.5;">
                        <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                          <td width="6" height="6" valign="top" style="padding-top:6px;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" bgcolor="#0077B6" style="border-radius:50%;font-size:0;line-height:0;">&nbsp;</td></tr></table></td>
                          <td style="padding-left:10px;">Immunisation / Road to Health card</td>
                        </tr></table>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:4px 0;font-size:13px;color:#52525b;line-height:1.5;">
                        <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                          <td width="6" height="6" valign="top" style="padding-top:6px;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" bgcolor="#0077B6" style="border-radius:50%;font-size:0;line-height:0;">&nbsp;</td></tr></table></td>
                          <td style="padding-left:10px;">Recent photo of your child</td>
                        </tr></table>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:4px 0;font-size:13px;color:#52525b;line-height:1.5;">
                        <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                          <td width="6" height="6" valign="top" style="padding-top:6px;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" bgcolor="#0077B6" style="border-radius:50%;font-size:0;line-height:0;">&nbsp;</td></tr></table></td>
                          <td style="padding-left:10px;">Proof of address (not older than 3 months)</td>
                        </tr></table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

            <!-- Privacy note -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#fffbeb;border-left:3px solid #f59e0b;border-radius:4px;margin-bottom:24px;" role="presentation">
              <tr>
                <td style="padding:14px 18px;">
                  <p style="margin:0;font-size:12px;color:#92400e;line-height:1.6;">
                    <strong>Note:</strong> This link is personalised for you and will pre-fill your details. Please don't share it.
                  </p>
                </td>
              </tr>
            </table>

            <p style="margin:0 0 16px;font-size:14px;color:#52525b;line-height:1.7;">Once your application is submitted, our team will review it and be in touch to confirm your start date and any remaining details.</p>

            <p style="margin:0 0 16px;font-size:14px;color:#52525b;line-height:1.7;">If you have any questions at any stage, please don't hesitate to call us or reply to this email &mdash; we're here to help.</p>

            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:24px;" role="presentation"><tr><td height="1" bgcolor="#e4e4e7" style="font-size:0;line-height:0;">&nbsp;</td></tr></table>

            <p style="margin:0;font-size:14px;color:#52525b;line-height:1.8;">
              We look forward to having {{ $lead->child_name }} with us!<br><br>
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
