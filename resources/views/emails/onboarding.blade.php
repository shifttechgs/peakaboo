<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Welcome to Peekaboo Portal</title>
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
            <!-- Icon -->
            <table cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 20px;" role="presentation">
              <tr>
                <td width="56" height="56" align="center" valign="middle" bgcolor="#fef3c7" style="border-radius:50%;border:2px solid #fde68a;text-align:center;font-size:28px;line-height:56px;">&#127881;</td>
              </tr>
            </table>
            <!-- Badge -->
            <table cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 16px;" role="presentation">
              <tr>
                <td style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:100px;padding:5px 14px;font-size:11px;font-weight:600;color:#16a34a;letter-spacing:0.05em;text-transform:uppercase;">Account Ready</td>
              </tr>
            </table>
            <h1 style="margin:0 0 8px;font-size:24px;font-weight:700;color:#18181b;letter-spacing:-0.025em;line-height:1.25;">Welcome to Peekaboo!</h1>
            <p style="margin:0;font-size:14px;color:#71717a;line-height:1.5;">Your parent portal is ready</p>
          </td>
        </tr>

        <tr><td style="padding:0 40px;"><table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td height="1" bgcolor="#e4e4e7" style="font-size:0;line-height:0;">&nbsp;</td></tr></table></td></tr>

        <!-- Body -->
        <tr>
          <td style="padding:28px 40px 32px;">

            <p style="margin:0 0 14px;font-size:15px;color:#3f3f46;">Hi <strong>{{ $user->name }}</strong>,</p>
            <p style="margin:0 0 24px;font-size:14px;color:#52525b;line-height:1.7;">
              Your account has been set up successfully! You now have full access to the
              <strong>Peekaboo Parent Portal</strong> &mdash; your hub for everything related to your child's experience at Peekaboo.
            </p>

            <!-- CTA -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:28px;" role="presentation">
              <tr>
                <td align="center">
                  <a href="{{ route('parent.dashboard') }}" style="display:inline-block;background:#0077B6;color:#ffffff;text-decoration:none;font-size:15px;font-weight:600;padding:16px 40px;border-radius:8px;text-align:center;">Go to My Dashboard &rarr;</a>
                </td>
              </tr>
            </table>

            <p style="margin:0 0 16px;font-size:14px;color:#52525b;">Here's what you can do from your portal:</p>

            <!-- Features -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #e4e4e7;border-radius:8px;overflow:hidden;margin-bottom:24px;" role="presentation">
              <tr>
                <td style="padding:14px 20px;border-bottom:1px solid #f4f4f5;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="36" height="36" align="center" valign="middle" bgcolor="#f0f9ff" style="border-radius:8px;font-size:16px;text-align:center;">&#128197;</td>
                    <td style="padding-left:14px;">
                      <p style="margin:0 0 2px;font-size:13px;font-weight:600;color:#18181b;">Calendar &amp; Events</p>
                      <p style="margin:0;font-size:13px;color:#71717a;line-height:1.5;">Stay up to date with school events, holidays, and important dates.</p>
                    </td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:14px 20px;border-bottom:1px solid #f4f4f5;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="36" height="36" align="center" valign="middle" bgcolor="#f0f9ff" style="border-radius:8px;font-size:16px;text-align:center;">&#128176;</td>
                    <td style="padding-left:14px;">
                      <p style="margin:0 0 2px;font-size:13px;font-weight:600;color:#18181b;">Fees &amp; Payments</p>
                      <p style="margin:0;font-size:13px;color:#71717a;line-height:1.5;">View statements, download invoices, and upload proof of payment.</p>
                    </td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:14px 20px;border-bottom:1px solid #f4f4f5;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="36" height="36" align="center" valign="middle" bgcolor="#f0f9ff" style="border-radius:8px;font-size:16px;text-align:center;">&#128248;</td>
                    <td style="padding-left:14px;">
                      <p style="margin:0 0 2px;font-size:13px;font-weight:600;color:#18181b;">Photo Gallery</p>
                      <p style="margin:0;font-size:13px;color:#71717a;line-height:1.5;">See photos of your child's day shared by teachers.</p>
                    </td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:14px 20px;border-bottom:1px solid #f4f4f5;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="36" height="36" align="center" valign="middle" bgcolor="#f0f9ff" style="border-radius:8px;font-size:16px;text-align:center;">&#128240;</td>
                    <td style="padding-left:14px;">
                      <p style="margin:0 0 2px;font-size:13px;font-weight:600;color:#18181b;">Newsletters</p>
                      <p style="margin:0;font-size:13px;color:#71717a;line-height:1.5;">Read monthly newsletters and school updates.</p>
                    </td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:14px 20px;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="36" height="36" align="center" valign="middle" bgcolor="#f0f9ff" style="border-radius:8px;font-size:16px;text-align:center;">&#128172;</td>
                    <td style="padding-left:14px;">
                      <p style="margin:0 0 2px;font-size:13px;font-weight:600;color:#18181b;">Messages</p>
                      <p style="margin:0;font-size:13px;color:#71717a;line-height:1.5;">Send messages directly to the admin team.</p>
                    </td>
                  </tr></table>
                </td>
              </tr>
            </table>

            <p style="margin:0 0 14px;font-size:14px;color:#52525b;line-height:1.7;">
              If you have any questions or need help getting started, please don't hesitate to contact us.
            </p>

            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:24px;" role="presentation"><tr><td height="1" bgcolor="#e4e4e7" style="font-size:0;line-height:0;">&nbsp;</td></tr></table>

            <p style="margin:0;font-size:14px;color:#52525b;line-height:1.8;">
              We're so glad to have your family as part of the Peekaboo community!<br><br>
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
              If you didn't expect this email, please contact us.
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
