@component('mail::message')
# New Tour Booking Request

**Booking Reference:** {{ $bookingId }}
**Date Submitted:** {{ now()->format('d F Y, H:i') }}

---

A new tour booking has been submitted through the website.

## Tour Details

**Preferred Date:** {{ $data['preferred_date'] }}
**Preferred Time:** {{ $data['preferred_time'] }}

## Parent Information

**Name:** {{ $data['name'] }}
**Phone:** {{ $data['phone'] }}
**Email:** {{ $data['email'] }}

## Child Information

**Name:** {{ $data['child_name'] }}
@if(!empty($data['child_nickname']))
**Nickname:** {{ $data['child_nickname'] }}
@endif
**Age Group:** {{ $data['child_age'] }}

@if(!empty($data['message']))
## Special Requirements

{{ $data['message'] }}
@endif

@if(!empty($data['source']))
## Lead Source

How they heard about us: **{{ ucfirst($data['source']) }}**
@endif

---

@component('mail::button', ['url' => route('admin.crm.leads'), 'color' => 'primary'])
View in CRM
@endcomponent

### Next Steps

1. Review the tour request details
2. Contact the family to confirm the booking
3. Add to the tour schedule
4. Send confirmation to the family

**Contact Details:**
Phone: {{ $data['phone'] }}
Email: {{ $data['email'] }}

---

<small style="color: #6c757d;">This email was generated automatically by the {{ config('app.name') }} tour booking system.</small>

@endcomponent
