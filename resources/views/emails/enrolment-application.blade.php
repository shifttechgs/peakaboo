@component('mail::message')
# New Enrolment Application

**Application Reference:** {{ $applicationId }}
**Date Submitted:** {{ now()->format('d F Y, H:i') }}

---

A new enrolment application has been submitted through the website.

## Quick Summary

**Child:** {{ $data['child_name'] ?? 'Not specified' }} ({{ $data['child_dob'] ?? 'DOB not specified' }})
**Program:** {{ $data['program_name'] ?? $data['program'] ?? 'Not specified' }}
**Fee Option:** {{ $data['fee_option_name'] ?? $data['fee_option'] ?? 'Not specified' }}
**Start Date:** {{ $data['start_date'] ?? 'Not specified' }}

**Parent Contact:**
{{ $data['mother_name'] ?? 'Not specified' }} - {{ $data['mother_cell'] ?? 'Not specified' }}
{{ $data['mother_email'] ?? 'Email not provided' }}

@if(!empty($data['allergies']))
⚠️ **Important:** Child has allergies noted
@endif

@if(isset($data['has_second_child']) && $data['has_second_child'] === 'on')
👨‍👩‍👧‍👦 **Note:** Sibling application included (Sibling discount applies)
@endif

---

## 📋 Complete Details

**All application details, medical information, and supporting documents are attached to this email:**

- **Application PDF** - Complete application form
- **Birth Certificate** (if uploaded)
- **Clinic Card** (if uploaded)
- **Parent IDs** (if uploaded)
- **Proof of Address** (if uploaded)

@component('mail::button', ['url' => route('admin.admissions.index'), 'color' => 'primary'])
View in Admin Dashboard
@endcomponent

---

### Next Steps

1. Review the attached application PDF for complete details
2. Check all supporting documents
3. Contact the family to schedule a facility tour
4. Process application in the admin dashboard

**Need to contact the family?**
Call: {{ $data['mother_cell'] ?? $data['father_cell'] ?? 'Not provided' }}
Email: {{ $data['mother_email'] ?? $data['father_email'] ?? 'Not provided' }}

---

<small style="color: #6c757d;">This email was generated automatically by the {{ config('app.name') }} online enrolment system.</small>

@endcomponent
