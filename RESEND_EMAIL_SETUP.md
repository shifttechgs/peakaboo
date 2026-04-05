# Resend Email Setup

Transactional email is sent via [Resend](https://resend.com) using the `resend/resend-laravel` package. All emails originate from `admin@peekaboodaycare.co.za`.

---

## Package

```bash
composer require resend/resend-laravel
```

The package auto-registers a Resend transport via Laravel's service provider. No manual provider registration needed.

---

## Environment Variables

```env
MAIL_MAILER=resend
RESEND_API_KEY=re_your_api_key_here
MAIL_FROM_ADDRESS="admin@peekaboodaycare.co.za"
MAIL_FROM_NAME="${APP_NAME}"
CONTACT_EMAIL=admin@peekaboodaycare.co.za
```

> The `RESEND_API_KEY` is read by `config/services.php` (`services.resend.key`) and picked up by the `resend/resend-laravel` transport. No other mail vars (`MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`) are needed.

---

## How It Works

Laravel's `Mail` facade routes all outgoing mail through the driver set in `MAIL_MAILER`. Switching to `resend` means all 9 Mailable classes deliver via the Resend API with zero code changes to those classes.

| Mailable | Recipient | Trigger |
|----------|-----------|---------|
| `ContactFormMail` | Admin (`CONTACT_EMAIL`) | Contact form submission |
| `TourBookingMail` | Admin (`CONTACT_EMAIL`) | Tour booking form |
| `BookingReceivedMail` | Client | Tour booking acknowledgement |
| `EnrolmentApplicationMail` | Admin (`CONTACT_EMAIL`) | Enrolment form submission |
| `ApplicationReceivedMail` | Client | Enrolment acknowledgement |
| `EnrolmentStartMail` | Client (lead) | Admin triggers enrolment invite |
| `TourConfirmationMail` | Client (lead) | Admin confirms tour date |
| `InvitationMail` | Client / Staff | Admin sends portal invite |
| `OnboardingMail` | New portal user | User completes registration |

---

## Deploying to Production (cPanel)

The `.env` on the server is not managed by git. Update it manually:

1. SSH into the server or use cPanel File Manager → navigate to the project root.
2. Edit `.env`:
   - Change `MAIL_MAILER=resend`
   - Add `RESEND_API_KEY=re_your_api_key_here`
   - Remove `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_SCHEME`
3. Clear the config cache:
   ```bash
   php artisan config:clear
   ```

---

## Verification

**Quick smoke test via Tinker:**
```bash
php artisan tinker
```
```php
Mail::raw('Test from Resend', fn($m) => $m->to('you@example.com')->subject('Resend test'));
```

Then check:
- Resend dashboard → **Emails** → confirm delivery status and that the sender shows `admin@peekaboodaycare.co.za`
- `storage/logs/laravel.log` — no mail exceptions

**End-to-end test:** Submit the contact form on the live site and confirm the admin receives the email via Resend.
