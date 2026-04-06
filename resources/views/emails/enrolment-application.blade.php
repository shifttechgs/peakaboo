<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>New Enrolment Application — {{ $applicationId }}</title>
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
            <h1 style="margin:0 0 6px;font-size:24px;font-weight:700;color:#18181b;letter-spacing:-0.025em;line-height:1.25;">New Enrolment Application</h1>
            <p style="margin:0;font-size:14px;color:#71717a;line-height:1.5;">A new enrolment application has been submitted through the website.</p>
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
                        <p style="margin:0 0 2px;font-size:11px;font-weight:600;color:#a1a1aa;text-transform:uppercase;letter-spacing:0.06em;">Application Reference</p>
                        <p style="margin:0;font-size:18px;font-weight:700;color:#0077B6;font-family:'SFMono-Regular','Consolas','Liberation Mono','Menlo',monospace;letter-spacing:0.5px;">{{ $applicationId }}</p>
                      </td>
                      <td align="right" valign="top" style="font-size:13px;color:#a1a1aa;">{{ now()->format('d M Y') }}<br>{{ now()->format('H:i') }}</td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

            <!-- Quick Summary -->
            <p style="margin:0 0 10px;font-size:12px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;color:#a1a1aa;">Quick Summary</p>
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #e4e4e7;border-radius:8px;overflow:hidden;margin-bottom:24px;" role="presentation">
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="140" style="font-size:13px;color:#71717a;">Child</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $data['child_name'] ?? 'Not specified' }} ({{ $data['child_dob'] ?? 'DOB not specified' }})</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="140" style="font-size:13px;color:#71717a;">Programme</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $data['program_name'] ?? $data['program'] ?? 'Not specified' }}</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="140" style="font-size:13px;color:#71717a;">Fee Option</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $data['fee_option_name'] ?? $data['fee_option'] ?? 'Not specified' }}</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="140" style="font-size:13px;color:#71717a;">Start Date</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $data['start_date'] ?? 'Not specified' }}</td>
                  </tr></table>
                </td>
              </tr>
            </table>

            <!-- Parent Contact -->
            <p style="margin:0 0 10px;font-size:12px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;color:#a1a1aa;">Parent Contact</p>
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #e4e4e7;border-radius:8px;overflow:hidden;margin-bottom:24px;" role="presentation">
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="140" style="font-size:13px;color:#71717a;">Name</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $data['mother_name'] ?? 'Not specified' }}</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;border-bottom:1px solid #f4f4f5;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="140" style="font-size:13px;color:#71717a;">Phone</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $data['mother_cell'] ?? 'Not specified' }}</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:12px 20px;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="140" style="font-size:13px;color:#71717a;">Email</td>
                    <td style="font-size:13px;font-weight:600;color:#18181b;">{{ $data['mother_email'] ?? 'Not provided' }}</td>
                  </tr></table>
                </td>
              </tr>
            </table>

            @if(!empty($data['allergies']))
            <!-- Allergy alert -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#fef2f2;border-left:3px solid #ef4444;border-radius:4px;margin-bottom:16px;" role="presentation">
              <tr>
                <td style="padding:14px 18px;font-size:13px;color:#991b1b;line-height:1.6;">
                  <strong>&#9888; Important:</strong> Child has allergies noted &mdash; please review full application.
                </td>
              </tr>
            </table>
            @endif

            @if(isset($data['has_second_child']) && $data['has_second_child'] === 'on')
            <!-- Sibling note -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f0fdf4;border-left:3px solid #22c55e;border-radius:4px;margin-bottom:16px;" role="presentation">
              <tr>
                <td style="padding:14px 18px;font-size:13px;color:#166534;line-height:1.6;">
                  <strong>Note:</strong> Sibling application included &mdash; sibling discount applies.
                </td>
              </tr>
            </table>
            @endif

            <!-- Attached documents -->
            <p style="margin:0 0 10px;font-size:12px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;color:#a1a1aa;">Attached Documents</p>
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #e4e4e7;border-radius:8px;overflow:hidden;margin-bottom:24px;" role="presentation">
              <tr>
                <td style="padding:14px 20px;font-size:13px;color:#52525b;line-height:1.8;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation">
                    <tr><td style="padding:3px 0;font-size:13px;color:#52525b;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" valign="top" style="padding-top:6px;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" bgcolor="#0077B6" style="border-radius:50%;font-size:0;line-height:0;">&nbsp;</td></tr></table></td><td style="padding-left:10px;">Application PDF &mdash; Complete application form</td></tr></table></td></tr>
                    <tr><td style="padding:3px 0;font-size:13px;color:#52525b;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" valign="top" style="padding-top:6px;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" bgcolor="#a1a1aa" style="border-radius:50%;font-size:0;line-height:0;">&nbsp;</td></tr></table></td><td style="padding-left:10px;">Birth Certificate (if uploaded)</td></tr></table></td></tr>
                    <tr><td style="padding:3px 0;font-size:13px;color:#52525b;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" valign="top" style="padding-top:6px;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" bgcolor="#a1a1aa" style="border-radius:50%;font-size:0;line-height:0;">&nbsp;</td></tr></table></td><td style="padding-left:10px;">Clinic Card (if uploaded)</td></tr></table></td></tr>
                    <tr><td style="padding:3px 0;font-size:13px;color:#52525b;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" valign="top" style="padding-top:6px;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" bgcolor="#a1a1aa" style="border-radius:50%;font-size:0;line-height:0;">&nbsp;</td></tr></table></td><td style="padding-left:10px;">Parent IDs (if uploaded)</td></tr></table></td></tr>
                    <tr><td style="padding:3px 0;font-size:13px;color:#52525b;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" valign="top" style="padding-top:6px;"><table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr><td width="6" height="6" bgcolor="#a1a1aa" style="border-radius:50%;font-size:0;line-height:0;">&nbsp;</td></tr></table></td><td style="padding-left:10px;">Proof of Address (if uploaded)</td></tr></table></td></tr>
                  </table>
                </td>
              </tr>
            </table>

            <!-- CTA -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:8px 0 28px;" role="presentation">
              <tr>
                <td align="center">
                  <a href="{{ route('admin.admissions.index') }}" style="display:inline-block;background:#0077B6;color:#ffffff;text-decoration:none;font-size:14px;font-weight:600;padding:14px 32px;border-radius:8px;text-align:center;">View in Admissions &rarr;</a>
                </td>
              </tr>
            </table>

            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:24px;" role="presentation"><tr><td height="1" bgcolor="#e4e4e7" style="font-size:0;line-height:0;">&nbsp;</td></tr></table>

            <!-- Next Steps -->
            <p style="margin:0 0 12px;font-size:12px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;color:#a1a1aa;">Next Steps</p>
            <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation">
              <tr>
                <td style="padding:10px 0;border-bottom:1px solid #f4f4f5;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="24" height="24" align="center" valign="middle" bgcolor="#0077B6" style="border-radius:50%;font-size:11px;font-weight:700;color:#ffffff;text-align:center;line-height:24px;">1</td>
                    <td style="padding-left:12px;font-size:13px;color:#52525b;line-height:1.5;">Review the attached application PDF for complete details.</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:10px 0;border-bottom:1px solid #f4f4f5;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="24" height="24" align="center" valign="middle" bgcolor="#0077B6" style="border-radius:50%;font-size:11px;font-weight:700;color:#ffffff;text-align:center;line-height:24px;">2</td>
                    <td style="padding-left:12px;font-size:13px;color:#52525b;line-height:1.5;">Check all supporting documents.</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:10px 0;border-bottom:1px solid #f4f4f5;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="24" height="24" align="center" valign="middle" bgcolor="#0077B6" style="border-radius:50%;font-size:11px;font-weight:700;color:#ffffff;text-align:center;line-height:24px;">3</td>
                    <td style="padding-left:12px;font-size:13px;color:#52525b;line-height:1.5;">Approve, waitlist, or request more information.</td>
                  </tr></table>
                </td>
              </tr>
              <tr>
                <td style="padding:10px 0;">
                  <table cellpadding="0" cellspacing="0" border="0" role="presentation"><tr>
                    <td width="24" height="24" align="center" valign="middle" bgcolor="#0077B6" style="border-radius:50%;font-size:11px;font-weight:700;color:#ffffff;text-align:center;line-height:24px;">4</td>
                    <td style="padding-left:12px;font-size:13px;color:#52525b;line-height:1.5;">Send parent portal invitation upon approval.</td>
                  </tr></table>
                </td>
              </tr>
            </table>

            <!-- Contact info -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#fafafa;border:1px solid #e4e4e7;border-radius:8px;margin-top:20px;" role="presentation">
              <tr>
                <td style="padding:14px 20px;">
                  <p style="margin:0 0 4px;font-size:12px;font-weight:600;color:#71717a;text-transform:uppercase;letter-spacing:0.04em;">Quick Contact</p>
                  <p style="margin:0;font-size:13px;color:#52525b;line-height:1.7;">
                    Call: {{ $data['mother_cell'] ?? $data['father_cell'] ?? 'Not provided' }}<br>
                    Email: {{ $data['mother_email'] ?? $data['father_email'] ?? 'Not provided' }}
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
              Sent automatically by Peekaboo's enrolment system.<br>
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
