<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>You've been invited to Peekaboo</title>
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
                <td width="56" height="56" align="center" valign="middle" bgcolor="#f0f9ff" style="border-radius:50%;border:2px solid #bae6fd;text-align:center;font-size:28px;line-height:56px;">&#128274;</td>
              </tr>
            </table>
            <!-- Badge -->
            <table cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 16px;" role="presentation">
              <tr>
                <td style="background:#f0f9ff;border:1px solid #bae6fd;border-radius:100px;padding:5px 14px;font-size:11px;font-weight:600;color:#0077B6;letter-spacing:0.05em;text-transform:uppercase;">Invitation</td>
              </tr>
            </table>
            <h1 style="margin:0 0 8px;font-size:24px;font-weight:700;color:#18181b;letter-spacing:-0.025em;line-height:1.25;">You're Invited to Peekaboo</h1>
            <p style="margin:0;font-size:14px;color:#71717a;line-height:1.5;">Set up your account to get started</p>
          </td>
        </tr>

        <tr><td style="padding:0 40px;"><table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td height="1" bgcolor="#e4e4e7" style="font-size:0;line-height:0;">&nbsp;</td></tr></table></td></tr>

        <!-- Body -->
        <tr>
          <td style="padding:28px 40px 32px;">

            <p style="margin:0 0 16px;font-size:15px;color:#3f3f46;">Hi{!! $parentName ? ' <strong>' . e($parentName) . '</strong>' : '' !!},</p>

            @if($childName)
            <p style="margin:0 0 20px;font-size:14px;color:#52525b;line-height:1.7;">
              Congratulations! <strong>{{ $childName }}'s</strong> enrolment application has been approved. You're one step away from accessing your parent portal.
            </p>
            <!-- Child card -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f0f9ff;border:1px solid #bae6fd;border-radius:10px;margin-bottom:24px;" role="presentation">
              <tr>
                <td style="padding:18px 22px;">
                  <p style="margin:0 0 4px;font-size:13px;color:#52525b;">Child: <strong style="font-size:15px;color:#0077B6;">{{ $childName }}</strong></p>
                  @if($programName)
                  <p style="margin:0;font-size:13px;color:#52525b;">Programme: <strong style="color:#0077B6;">{{ $programName }}</strong></p>
                  @endif
                </td>
              </tr>
            </table>
            @else
            <p style="margin:0 0 20px;font-size:14px;color:#52525b;line-height:1.7;">You've been invited to join <strong>Peekaboo Early Learning Centre</strong> as:</p>
            <table cellpadding="0" cellspacing="0" border="0" style="margin-bottom:24px;" role="presentation">
              <tr>
                <td style="background:#f0f9ff;border:1px solid #bae6fd;border-radius:100px;padding:6px 18px;font-size:14px;font-weight:600;color:#0077B6;">{{ $role }}</td>
              </tr>
            </table>
            @endif

            <p style="margin:0 0 28px;font-size:14px;color:#52525b;line-height:1.7;">
              Click the button below to set up your account and get access to the {{ $role }} portal. Your invitation expires on <strong>{{ $expiresAt }}</strong>.
            </p>

            <!-- CTA -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:28px;" role="presentation">
              <tr>
                <td align="center">
                  <a href="{{ $acceptUrl }}" style="display:inline-block;background:#0077B6;color:#ffffff;text-decoration:none;font-size:15px;font-weight:600;padding:16px 40px;border-radius:8px;text-align:center;">Set Up My Account &rarr;</a>
                </td>
              </tr>
            </table>

            <p style="margin:0 0 8px;font-size:13px;color:#71717a;">If the button above doesn't work, copy and paste this link into your browser:</p>
            <p style="margin:0 0 24px;word-break:break-all;font-size:12px;color:#0077B6;font-family:'SFMono-Regular','Consolas','Liberation Mono','Menlo',monospace;">{{ $acceptUrl }}</p>

            <!-- Expiry notice -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#fffbeb;border-left:3px solid #f59e0b;border-radius:4px;margin-bottom:24px;" role="presentation">
              <tr>
                <td style="padding:14px 18px;">
                  <p style="margin:0;font-size:12px;color:#92400e;line-height:1.6;">
                    <strong>Note:</strong> This invitation link expires on <strong>{{ $expiresAt }}</strong>. If you did not expect this email, you can safely ignore it.
                  </p>
                </td>
              </tr>
            </table>

          </td>
        </tr>

        <!-- Footer -->
        <tr><td style="padding:0 40px;"><table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td height="1" bgcolor="#e4e4e7" style="font-size:0;line-height:0;">&nbsp;</td></tr></table></td></tr>
        <tr>
          <td style="padding:20px 40px 28px;">
            <p style="margin:0;font-size:12px;color:#a1a1aa;line-height:1.7;text-align:center;">
              &copy; {{ date('Y') }} Peekaboo Early Learning Centre. All rights reserved.<br>
              139b Humewood Dr, Parklands, Cape Town, 7441
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
