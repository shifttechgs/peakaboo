# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

**Peekaboo Daycare & Preschool** — a Laravel 12 multi-portal management system for a Cape Town daycare. It serves four distinct user roles (admin, parent, teacher, child) through separate portal UIs, plus a public-facing marketing site and enrolment flow.

## Commands

```bash
# First-time setup
composer run setup

# Full dev environment (server + queue + logs + vite, all concurrently)
composer run dev

# Run tests
composer run test

# Run a single test file
php artisan test --filter ExampleTest

# Lint PHP
./vendor/bin/pint

# Build frontend assets
npm run build

# Cache clearing (also available at /reboot route)
php artisan optimize:clear

# Run migrations (also available at /migrate route)
php artisan migrate --seed
```

## Architecture

### Multi-Portal Structure

The app is split into five controller namespaces under `app/Http/Controllers/`:

| Namespace | Middleware | Purpose |
|---|---|---|
| `Public/` | none | Marketing site + enrolment form |
| `Auth/` | none | Login, password reset, invitation |
| `Admin/` | `auth`, `role:admin\|super_admin` | Full management dashboard |
| `Parent/` | `auth`, `role:parent\|admin\|super_admin` | Parent self-service portal |
| `Teacher/` | `auth`, `role:teacher\|admin\|super_admin` | Teacher portal |
| `Child/` | `auth`, `role:child\|admin\|super_admin` | Child portal (view-only) |

Roles are managed by **Spatie Laravel Permission** (`spatie/laravel-permission`). Always assign the correct role middleware when adding new routes.

### Views Mirror Controllers

`resources/views/` is organised to match controller namespaces: `admin/`, `parent/`, `teacher/`, `child/`, `public/`, `auth/`. Shared layouts live in `resources/views/layouts/` (`admin.blade.php`, `portal.blade.php`, `public.blade.php`, `master.blade.php`).

### MockData is Static Website Content

`app/Data/MockData.php` holds all static content displayed on the public site — business info, fees, programs, staff bios, testimonials, FAQs — as plain PHP arrays. This is **not** seeder data; it is read directly by `HomeController` and `EnrolmentController` on every request. Update this file when business details change.

### Enrolment Flow

1. Public user lands on `/enrol` — multi-step Blade form in `resources/views/public/enrol/form.blade.php`
2. Submission hits `EnrolmentController@submit` — validates, stores an `Application` record + uploaded documents, sends confirmation emails via Resend, and creates a `Lead` in the CRM
3. Admin reviews applications in `Admin/AdmissionsController`

### CRM / Leads

Leads track prospective enrolments through statuses: `new → tour_scheduled → converted / lost / waiting_list`. The `LeadActivity` model provides a full audit trail. The Kanban view (`admin/crm/`) uses drag-and-drop status updates via AJAX.

### File Uploads

All uploaded documents (birth certificates, parent IDs, proof of address, proof of payment) are stored via Laravel's `Storage` facade on the `local` disk. Validation is enforced in the controller — currently **20 MB max**, `pdf,jpg,jpeg,png` only.

### Email

All transactional email uses **Resend** (`resend/resend-laravel`). Mail classes are in `app/Mail/`. Configure `RESEND_API_KEY` in `.env`.

### GeoBlocking

`app/Http/Middleware/GeoBlock.php` restricts contact form and tour booking POSTs to South Africa (ISO `ZA`). It reads a MaxMind GeoLite2 database from `storage/app/geoip/GeoLite2-Country.mmdb`. It fails open — missing DB or unknown IP passes through. Toggle with `services.geoblock.enabled` in `config/services.php`.

### PDF Generation

`barryvdh/laravel-dompdf` renders enrolment application PDFs from `resources/views/pdf/enrolment-application.blade.php`.

### Frontend

Vite + Tailwind CSS 4. Entry points are in `resources/js/` and `resources/css/`. Most portal pages use inline `<style>` and `<script>` blocks in Blade rather than separate asset files — keep new work consistent with whichever pattern the surrounding view already uses.

## Key Files

- `routes/web.php` — all routes in one file, grouped by portal
- `app/Data/MockData.php` — all static public-site content
- `app/Http/Middleware/GeoBlock.php` — geo-restriction logic
- `database/migrations/` — authoritative schema source
- `config/services.php` — third-party service keys and feature flags
