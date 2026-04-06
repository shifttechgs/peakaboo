<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>New Tour Booking — {{ $bookingId }}</title>
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
          <td style="padding:32px 40px 24px;">
            <table cellpadding="0" cellspacing="0" border="0" style="margin-bottom:16px;" role="presentation">
              <tr>
                <td style="background:#fef3c7;color:#92400e;font-size:11px;font-weight:600;letter-spacing:0.05em;text-transform:uppercase;padding:5px 12px;border-radius:100px;">Admin Notification</td>
              </tr>
            </table>
            <h1 style="margin:0 0 6px;font-size:24px;font-weight:700;color:#18181b;letter-spacing:-0.025em;line-height:1.25;">New Tour Booking</h1>
            <p style="margin:0;font-size:14px;color:#71717a;line-height:1.5;">A family has submitted a tour request through the website.</p>
          </td>
        </tr>

        <tr><td style="padding:0 40px;"><table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td height="1" bgcolor="#e4e4e7" style="font-size:0;line-height:0;">&nbsp;</td></tr></table></td></tr>

        <!-- Body -->
        <tr>
          <td style="padding:24px 40px 32px;">

            <!-- Reference -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#fafafa;border:1px solid #e4e4e7;border-radius:8px;margin-bottom:24px;" role="presentation">
              <tr>
                <td style="padding:16px 20px;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation">
                    <tr>
                      <td>
                        <p style="margin:0 0 2px;font-size:11px;font-weight:600;color:#a1a1aa;text-transform:uppercase;letter-spacing:0.06em;">Booking Reference</p>
                        <p style="margin:0;font-size:18px;font-weight:700;color:#0077B6;font-family:'SFMono-Regular','Consolas','Liberation Mono','Menlo',monospace;letter-spacing:0.5px;">{{ $bookingId }}</p>
                      </td>
                      <td align="right" valign="top" style="font-size:13px;color:#a1a1aa;">{{ now()->format('d M Y') }}<br>{{ now()->format('H:i') }}</td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

            <!-- Tour Details -->
            <p style="margin:0 0 10px;font-size:12px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;color:#a1a1aa;">Tour Details</p>
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #e4e4e7;border-radius:8px;overflow:hidden;margin-bottom:24px;" role="presentation">
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;background:#fafafa;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="140" style="font-size:13px;color:#71717a;">Preferred Date</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ \Carbon\Carbon::parse($data['preferred_date'])->format('l, d F Y') }}</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;background:#fafafa;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="140" style="font-size:13px;color:#71717a;">Preferred Time</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $data['preferred_time'] }}</td>
                  </tr></table>
                </td>
              </tr>
            </table>

            <!-- Parent / Guardian -->
            <p style="margin:0 0 10px;font-size:12px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;color:#a1a1aa;">Parent / Guardian</p>
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #e4e4e7;border-radius:8px;overflow:hidden;margin-bottom:24px;" role="presentation">
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="140" style="font-size:13px;color:#71717a;">Full Name</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $data['name'] }}</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="140" style="font-size:13px;color:#71717a;">Email</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $data['email'] }}</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;{{ !empty($data['source']) ? 'border-bottom:1px solid #f4f4f5;' : '' }}">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="140" style="font-size:13px;color:#71717a;">Phone</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $data['phone'] }}</td>
                  </tr></table>
                </td>
              </tr>
              @if(!empty($data['source']))
              <tr>
                <td style="padding:12px 20px;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="140" style="font-size:13px;color:#71717a;">Heard About Us</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ ucfirst($data['source']) }}</td>
                  </tr></table>
                </td>
              </tr>
              @endif
            </table>

            <!-- Child Information -->
            <p style="margin:0 0 10px;font-size:12px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;color:#a1a1aa;">Child Information</p>
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #e4e4e7;border-radius:8px;overflow:hidden;margin-bottom:24px;" role="presentation">
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="140" style="font-size:13px;color:#71717a;">Child's Name</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $data['child_name'] }}</td>
                  </tr></table>
                </td>
              </tr>
              @if(!empty($data['child_nickname']))
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="140" style="font-size:13px;color:#71717a;">Nickname</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $data['child_nickname'] }}</td>
                  </tr></table>
                </td>
              </tr>
              @endif
              <tr>
                <td style="padding:12px 20px;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="140" style="font-size:13px;color:#71717a;">Age Group</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $data['child_age'] }}</td>
                  </tr></table>
                </td>
              </tr>
            </table>

            @if(!empty($data['message']))
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#fffbeb;border-left:3px solid #f59e0b;border-radius:4px;margin-bottom:24px;" role="presentation">
              <tr>
                <td style="padding:14px 18px;">
                  <p style="margin:0 0 4px;font-size:12px;font-weight:600;color:#92400e;text-transform:uppercase;letter-spacing:0.04em;">Special Requirements</p>
                  <p style="margin:0;font-size:13px;color:#78350f;line-height:1.6;">{{ $data['message'] }}</p>
                </td>
              </tr>
            </table>
            @endif

            <!-- CTA -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:8px 0 28px;" role="presentation">
              <tr>
                <td align="center">
                  <a href="{{ route('admin.crm.leads') }}" style="display:inline-block;background:#0077B6;color:#ffffff;text-decoration:none;font-size:14px;font-weight:600;padding:14px 32px;border-radius:8px;text-align:center;">Open Lead Pipeline &rarr;</a>
                </td>
              </tr>
            </table>

            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:24px;" role="presentation"><tr><td height="1" bgcolor="#e4e4e7" style="font-size:0;line-height:0;">&nbsp;</td></tr></table>

            <!-- Next Steps -->
            <p style="margin:0 0 12px;font-size:12px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;color:#a1a1aa;">Suggested Next Steps</p>
            <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation">
              <tr>
                <td style="padding:10px 0;border-bottom:1px solid #f4f4f5;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="24" height="24" align="center" valign="middle" bgcolor="#0077B6" style="border-radius:50%;font-size:11px;font-weight:700;color:#ffffff;text-align:center;line-height:24px;">1</td>
                    <td style="padding-left:12px;font-size:13px;color:#52525b;line-height:1.5;">Contact {{ $data['name'] }} to confirm the preferred date and time.</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:10px 0;border-bottom:1px solid #f4f4f5;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="24" height="24" align="center" valign="middle" bgcolor="#0077B6" style="border-radius:50%;font-size:11px;font-weight:700;color:#ffffff;text-align:center;line-height:24px;">2</td>
                    <td style="padding-left:12px;font-size:13px;color:#52525b;line-height:1.5;">Add the tour to the schedule and assign a team member.</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:10px 0;border-bottom:1px solid #f4f4f5;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="24" height="24" align="center" valign="middle" bgcolor="#0077B6" style="border-radius:50%;font-size:11px;font-weight:700;color:#ffffff;text-align:center;line-height:24px;">3</td>
                    <td style="padding-left:12px;font-size:13px;color:#52525b;line-height:1.5;">Send a tour confirmation email from the Lead Pipeline.</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:10px 0;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="24" height="24" align="center" valign="middle" bgcolor="#0077B6" style="border-radius:50%;font-size:11px;font-weight:700;color:#ffffff;text-align:center;line-height:24px;">4</td>
                    <td style="padding-left:12px;font-size:13px;color:#52525b;line-height:1.5;">Follow up after the tour to progress the lead.</td>
                  </tr></table>
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
              Sent automatically by Peekaboo's booking system.<br>
              Peekaboo Early Learning Centre &bull; 139b Humewood Dr, Parklands, Cape Town, 7441
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
