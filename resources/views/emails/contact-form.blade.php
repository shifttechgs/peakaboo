@component('mail::message')
# New Contact Form Submission

You have received a new message from your website contact form.

**Name:** {{ $data['fname'] }} {{ $data['lname'] }}

**Email:** {{ $data['email'] }}

**Phone:** {{ $data['phone'] }}

**Message:**

{{ $data['message'] }}

---

This is an automated message from your Peekaboo Daycare website contact form.

@endcomponent
