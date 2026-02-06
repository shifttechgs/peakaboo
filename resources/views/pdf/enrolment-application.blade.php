<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Enrolment Application - {{ $applicationId }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            line-height: 1.6;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #0c508e;
        }
        .header h1 {
            color: #0c508e;
            font-size: 24px;
            margin: 0 0 10px 0;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        .app-id {
            background: #0c508e;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin: 15px 0;
            font-weight: bold;
        }
        .section {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }
        .section-title {
            background: #0c508e;
            color: white;
            padding: 8px 15px;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .section-title.orange {
            background: #D18109;
        }
        .section-title.purple {
            background: #70167E;
        }
        .section-title.pink {
            background: #e91e63;
        }
        .field-group {
            margin-bottom: 15px;
        }
        .field-label {
            font-weight: bold;
            color: #0c508e;
            text-transform: uppercase;
            font-size: 9px;
            margin-bottom: 3px;
        }
        .field-value {
            color: #333;
            font-size: 11px;
            padding: 5px 0;
        }
        .two-column {
            display: table;
            width: 100%;
            margin-bottom: 15px;
        }
        .column {
            display: table-cell;
            width: 48%;
            vertical-align: top;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 5px;
        }
        .column:first-child {
            margin-right: 4%;
        }
        .highlight-box {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 10px;
            margin: 10px 0;
        }
        .alert-box {
            background: #f8d7da;
            border-left: 4px solid #dc3545;
            padding: 10px;
            margin: 10px 0;
        }
        .consent-list {
            list-style: none;
            padding: 0;
        }
        .consent-list li {
            padding: 5px 0;
            margin-bottom: 5px;
        }
        .consent-list li::before {
            content: "✓ ";
            color: #28a745;
            font-weight: bold;
            margin-right: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #0c508e;
            color: #666;
            font-size: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        td {
            padding: 8px;
            border-bottom: 1px solid #eee;
        }
        td:first-child {
            font-weight: bold;
            width: 40%;
            color: #0c508e;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🎓 Peekaboo Daycare & Preschool</h1>
        <p><strong>139B Humewood Drive, Parklands, 7441, Cape Town</strong></p>
        <p>Tel: 021 557 4999 / 082 898 9967 | Email: peekaboodaycare@telkomsa.net</p>
        <div class="app-id">Application ID: {{ $applicationId }}</div>
        <p><strong>Application Date:</strong> {{ now()->format('d F Y') }}</p>
    </div>

    <!-- Program Selection -->
    <div class="section">
        <div class="section-title">📚 Program Selection</div>
        <table>
            <tr>
                <td>Preferred Start Date:</td>
                <td>{{ $data['start_date'] ?? 'Not specified' }}</td>
            </tr>
            <tr>
                <td>Program:</td>
                <td>{{ $data['program_name'] ?? $data['program'] ?? 'Not specified' }}</td>
            </tr>
            <tr>
                <td>Fee Option:</td>
                <td>{{ $data['fee_option_name'] ?? $data['fee_option'] ?? 'Not specified' }}</td>
            </tr>
            @if(isset($data['snack_box']) && $data['snack_box'] === 'on')
            <tr>
                <td>Additional Services:</td>
                <td><strong>Snack Box included (+R400/month)</strong></td>
            </tr>
            @endif
        </table>
    </div>

    <!-- Child Information -->
    <div class="section">
        <div class="section-title orange">👶 Child's Information</div>
        <table>
            <tr>
                <td>Full Name:</td>
                <td>{{ $data['child_name'] ?? 'Not specified' }} @if(!empty($data['child_nickname']))({{ $data['child_nickname'] }})@endif</td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td>{{ $data['child_dob'] ?? 'Not specified' }}</td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>{{ ucfirst($data['child_gender'] ?? 'Not specified') }}</td>
            </tr>
            <tr>
                <td>ID/Passport Number:</td>
                <td>{{ $data['child_id'] ?? 'Not specified' }}</td>
            </tr>
            <tr>
                <td>Home Language:</td>
                <td>{{ $data['child_language'] ?? 'Not specified' }}</td>
            </tr>
            @if(!empty($data['child_religion']))
            <tr>
                <td>Religion:</td>
                <td>{{ $data['child_religion'] }}</td>
            </tr>
            @endif
            @if(!empty($data['previous_school']))
            <tr>
                <td>Previous School:</td>
                <td>{{ $data['previous_school'] }}</td>
            </tr>
            @endif
        </table>

        @if(isset($data['has_second_child']) && $data['has_second_child'] === 'on')
        <div class="highlight-box">
            <strong>Second Child Enrolled (Sibling Discount Applies)</strong>
        </div>
        <table>
            <tr>
                <td>Full Name:</td>
                <td>{{ $data['child2_name'] ?? 'Not specified' }} @if(!empty($data['child2_nickname']))({{ $data['child2_nickname'] }})@endif</td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td>{{ $data['child2_dob'] ?? 'Not specified' }}</td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>{{ ucfirst($data['child2_gender'] ?? 'Not specified') }}</td>
            </tr>
            <tr>
                <td>ID/Passport Number:</td>
                <td>{{ $data['child2_id'] ?? 'Not specified' }}</td>
            </tr>
        </table>
        @endif
    </div>

    <!-- Parent/Guardian Information -->
    <div class="section">
        <div class="section-title purple">👨‍👩‍👧 Parent/Guardian Information</div>

        <h4 style="color: #70167E; margin: 15px 0 10px 0;">Mother/Guardian</h4>
        <table>
            <tr>
                <td>Full Name:</td>
                <td>{{ $data['mother_name'] ?? 'Not specified' }}</td>
            </tr>
            <tr>
                <td>ID Number:</td>
                <td>{{ $data['mother_id'] ?? 'Not specified' }}</td>
            </tr>
            <tr>
                <td>Cell Number:</td>
                <td>{{ $data['mother_cell'] ?? 'Not specified' }}</td>
            </tr>
            @if(!empty($data['mother_work']))
            <tr>
                <td>Work Number:</td>
                <td>{{ $data['mother_work'] }}</td>
            </tr>
            @endif
            <tr>
                <td>Email:</td>
                <td>{{ $data['mother_email'] ?? 'Not specified' }}</td>
            </tr>
            @if(!empty($data['mother_occupation']))
            <tr>
                <td>Occupation:</td>
                <td>{{ $data['mother_occupation'] }}</td>
            </tr>
            @endif
        </table>

        <h4 style="color: #70167E; margin: 20px 0 10px 0;">Father/Guardian</h4>
        <table>
            <tr>
                <td>Full Name:</td>
                <td>{{ $data['father_name'] ?? 'Not specified' }}</td>
            </tr>
            <tr>
                <td>ID Number:</td>
                <td>{{ $data['father_id'] ?? 'Not specified' }}</td>
            </tr>
            <tr>
                <td>Cell Number:</td>
                <td>{{ $data['father_cell'] ?? 'Not specified' }}</td>
            </tr>
            @if(!empty($data['father_work']))
            <tr>
                <td>Work Number:</td>
                <td>{{ $data['father_work'] }}</td>
            </tr>
            @endif
            @if(!empty($data['father_email']))
            <tr>
                <td>Email:</td>
                <td>{{ $data['father_email'] }}</td>
            </tr>
            @endif
            @if(!empty($data['father_occupation']))
            <tr>
                <td>Occupation:</td>
                <td>{{ $data['father_occupation'] }}</td>
            </tr>
            @endif
        </table>

        <h4 style="color: #70167E; margin: 20px 0 10px 0;">Home Address</h4>
        <table>
            @if(!empty($data['home_tel']))
            <tr>
                <td>Home Telephone:</td>
                <td>{{ $data['home_tel'] }}</td>
            </tr>
            @endif
            <tr>
                <td>Physical Address:</td>
                <td>{{ $data['home_address'] ?? 'Not specified' }}</td>
            </tr>
        </table>
    </div>

    <!-- Emergency & Medical -->
    <div class="section">
        <div class="section-title pink">🚨 Emergency Contact & Medical Information</div>

        <h4 style="color: #e91e63; margin: 15px 0 10px 0;">Emergency Contact</h4>
        <table>
            <tr>
                <td>Contact Name:</td>
                <td>{{ $data['emergency_name'] ?? 'Not specified' }}</td>
            </tr>
            <tr>
                <td>Contact Number:</td>
                <td>{{ $data['emergency_tel'] ?? 'Not specified' }}</td>
            </tr>
        </table>

        <h4 style="color: #e91e63; margin: 20px 0 10px 0;">Medical Information</h4>
        <table>
            <tr>
                <td>Doctor's Name:</td>
                <td>{{ $data['doctor_name'] ?? 'Not specified' }}</td>
            </tr>
            <tr>
                <td>Doctor's Tel:</td>
                <td>{{ $data['doctor_tel'] ?? 'Not specified' }}</td>
            </tr>
            @if(!empty($data['medical_aid']))
            <tr>
                <td>Medical Aid:</td>
                <td>{{ $data['medical_aid'] }}</td>
            </tr>
            @endif
            @if(!empty($data['medical_aid_number']))
            <tr>
                <td>Membership Number:</td>
                <td>{{ $data['medical_aid_number'] }}</td>
            </tr>
            @endif
        </table>

        @if(!empty($data['allergies']))
        <div class="alert-box">
            <strong>⚠️ ALLERGIES:</strong><br>
            {{ $data['allergies'] }}
        </div>
        @endif

        @if(!empty($data['medical_info']))
        <div class="field-group">
            <div class="field-label">Medical Conditions/Medication:</div>
            <div class="field-value">{{ $data['medical_info'] }}</div>
        </div>
        @endif

        @if(!empty($data['operations']))
        <div class="field-group">
            <div class="field-label">Previous Operations/Accidents:</div>
            <div class="field-value">{{ $data['operations'] }}</div>
        </div>
        @endif

        @if(!empty($data['diseases']))
        <div class="field-group">
            <div class="field-label">Contagious Diseases Already Had:</div>
            <div class="field-value">{{ $data['diseases'] }}</div>
        </div>
        @endif

        @if(!empty($data['other_details']))
        <div class="field-group">
            <div class="field-label">Other Details:</div>
            <div class="field-value">{{ $data['other_details'] }}</div>
        </div>
        @endif
    </div>

    <!-- Consents -->
    <div class="section">
        <div class="section-title">✅ Consents & Agreements</div>
        <ul class="consent-list">
            @if(isset($data['consent_fees']) && $data['consent_fees'] === 'on')
            <li>Fee Agreement Accepted</li>
            @endif
            @if(isset($data['consent_medical']) && $data['consent_medical'] === 'on')
            <li>Emergency Medical Treatment Consent Given</li>
            @endif
            @if(isset($data['consent_indemnity']) && $data['consent_indemnity'] === 'on')
            <li>Indemnity Agreement Accepted</li>
            @endif
            @if(isset($data['consent_photos']) && $data['consent_photos'] === 'on')
            <li>Photo Consent Given (Optional)</li>
            @endif
            @if(isset($data['consent_sleepover']) && $data['consent_sleepover'] === 'on')
            <li>Sleepover Consent Given (Optional)</li>
            @endif
            @if(isset($data['consent_popia']) && $data['consent_popia'] === 'on')
            <li>POPIA Compliance Consent Given</li>
            @endif
        </ul>
    </div>

    <!-- Signature -->
    <div class="section">
        <div class="section-title">✍️ Digital Signature</div>
        <table>
            <tr>
                <td>Signed By:</td>
                <td><strong>{{ $data['signature'] ?? 'Not signed' }}</strong></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td>{{ $data['signature_date'] ?? now()->format('Y-m-d') }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p><strong>Peekaboo Daycare & Preschool</strong></p>
        <p>This document was generated electronically on {{ now()->format('d F Y \a\t H:i') }}</p>
        <p>© {{ date('Y') }} Peekaboo Daycare & Preschool. All rights reserved.</p>
    </div>
</body>
</html>
