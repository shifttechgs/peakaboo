# Peekaboo CRM & Enrolment System
### Technical Reference — Last updated: 23 March 2026

---

## Table of Contents

1. [System Overview](#1-system-overview)
2. [Database Schema](#2-database-schema)
3. [Lead Pipeline](#3-lead-pipeline)
4. [Enrolment / Admissions](#4-enrolment--admissions)
5. [Invitation → Parent User Linkage](#5-invitation--parent-user-linkage)
6. [Admin Dashboard](#6-admin-dashboard)
7. [Admin Navigation Badges](#7-admin-navigation-badges)
8. [CRM ↔ Admissions Cross-links](#8-crm--admissions-cross-links)
9. [Routes Reference](#9-routes-reference)
10. [Models & Relationships](#10-models--relationships)
11. [Known Limitations & Next Steps](#11-known-limitations--next-steps)

---

## 1. System Overview

The Peekaboo admin panel covers the complete **lead-to-enrolled-child** journey:

```
Public Website
  │
  ├─ /book-tour  ──────► Lead created (status: new)
  │                           │
  │                     CRM Pipeline
  │                     new → contacted → tour_scheduled → tour_completed
  │                                                              │
  │                                                        startEnrol()
  │                                                              │
  ├─ /enrol  ──────────────────────────────────► Application submitted
  │   (pre-filled via enrolment_token)                          │
  │                                                       Admissions review
  │                                                       pending → under_review
  │                                                              │
  │                                                    approve / waitlist / reject
  │                                                              │
  │                                                    Send Portal Invitation
  │                                                              │
  └─ /register/accept/{token}  ────────────────► Parent User account created
                                                  application.parent_user_id set ✓
```

---

## 2. Database Schema

### `leads` table
| Column | Type | Notes |
|--------|------|-------|
| `id` | bigint PK | |
| `reference` | string unique | `TOUR-2026-001` |
| `name` | string | Parent name |
| `email` | string | |
| `phone` | string | |
| `child_name` | string | |
| `child_nickname` | string nullable | |
| `child_age` | string | e.g. `2-3 years` |
| `preferred_date` | date | Requested tour date |
| `preferred_time` | string | `09:00`, `11:00` etc. |
| `message` | text nullable | |
| `source` | string nullable | `google`, `facebook`, `instagram`, `referral`, `other` |
| `status` | string | See pipeline statuses below |
| `notes` | text nullable | Internal admin notes |
| `lost_reason` | string nullable | See `Lead::LOST_REASONS` |
| `assigned_to` | FK → users | |
| `enrolment_token` | string nullable | One-time token for pre-filled enrolment URL |
| `follow_up_date` | date nullable | When staff should next contact this lead |
| `last_activity_at` | timestamp nullable | Stamped on every CRM action |
| `converted_at` | timestamp nullable | When status first moved to `converted` |
| `tour_scheduled_at` | timestamp nullable | When status first moved to `tour_scheduled` |
| `deleted_at` | timestamp nullable | Soft delete |

### `applications` table
| Column | Type | Notes |
|--------|------|-------|
| `id` | bigint PK | |
| `reference` | string unique | `APP-2026-001` |
| `status` | string | `pending`, `under_review`, `approved`, `waitlist`, `rejected` |
| `start_date` | date | |
| `program` | string | `baby-room`, `toddlers`, `preschool`, `grade-r` |
| `program_name` | string | Display name |
| `fee_option` | string | `monthly`, `termly`, `annually` |
| `fee_option_name` | string | Display name |
| `snack_box` | boolean | |
| `child_name` | string | |
| `child_nickname` | string nullable | |
| `child_dob` | date | |
| `child_gender` | string | |
| `child_id_number` | string nullable | |
| `child_language` | string nullable | |
| `mother_name` | string | |
| `mother_email` | string | |
| `mother_cell` | string | |
| `father_name` | string nullable | |
| `father_email` | string nullable | |
| `father_cell` | string nullable | |
| `form_data` | json | Full validated form — all other fields |
| `documents` | json nullable | `{ birth_certificate: "path", … }` |
| `pdf_path` | string nullable | |
| `lead_id` | FK → leads nullable | `nullOnDelete` |
| `admin_notes` | text nullable | |
| `reviewed_at` | timestamp nullable | |
| `approved_at` | timestamp nullable | |
| `rejected_at` | timestamp nullable | |
| `invited_at` | timestamp nullable | When portal invitation was sent |
| `parent_user_id` | FK → users nullable | Set when parent registers |

### `invitations` table
| Column | Type | Notes |
|--------|------|-------|
| `id` | bigint PK | |
| `email` | string | |
| `role` | string | `parent`, `admin`, `teacher`, `child` |
| `token` | string(64) unique | |
| `invited_by` | FK → users | |
| `application_id` | FK → applications nullable | `nullOnDelete` — links invite to enrolment |
| `expires_at` | timestamp | Default: +7 days |
| `accepted_at` | timestamp nullable | Set when parent registers |

### `lead_activities` table
| Column | Type | Notes |
|--------|------|-------|
| `id` | bigint PK | |
| `lead_id` | FK → leads | |
| `user_id` | FK → users nullable | null = system action |
| `type` | string | `created`, `status_change`, `email_sent`, `note`, `edited`, `assigned` |
| `description` | string | Human-readable summary |
| `metadata` | json nullable | e.g. `{ from: 'new', to: 'contacted' }` |

### `tasks` table
| Column | Type | Notes |
|--------|------|-------|
| `id` | bigint PK | |
| `lead_id` | FK → leads nullable | |
| `title` | string | |
| `description` | string nullable | |
| `due_date` | date nullable | |
| `completed` | boolean | |
| `completed_at` | timestamp nullable | |
| `created_by` | FK → users | |

---

## 3. Lead Pipeline

### Statuses (`Lead::STATUSES`)
```
new → contacted → tour_scheduled → tour_completed → converted
                                                  ↘ waitlist
                              (any non-terminal) → lost
```

| Status | Meaning | Auto-triggered by |
|--------|---------|-------------------|
| `new` | Fresh tour booking, no contact yet | Public `/book-tour` form |
| `contacted` | First contact made | `markContacted()` one-click action |
| `tour_scheduled` | Tour confirmed & email sent | `notifyTour()` / status dropdown |
| `tour_completed` | Tour took place | Manual status update |
| `converted` | Enrolment invitation sent | `startEnrol()` — sends `EnrolmentStartMail` |
| `waitlist` | No capacity right now | `addToWaitlist()` |
| `lost` | Lead gone cold | `markLost()` — requires reason |

### Overdue logic
A lead is **overdue** when:
- status is `new` or `contacted` **AND**
- `created_at` is more than 3 days ago

`Lead::isOverdue()` — used for dashboard warnings, table row highlighting, Kanban badges.

### Follow-up date
- Stored in `leads.follow_up_date`
- Set via the **Follow-up Date panel** on the lead detail page, or when creating a lead manually
- `Lead::isFollowUpDue()` — returns `true` when `follow_up_date ≤ today()`
- Shown as a bell icon in the leads list and as a badge on Kanban cards
- Surfaces in **Widget 4** of the dashboard (Follow-ups Due table)

### Activity timeline
Every CRM action stamps `leads.last_activity_at` **and** creates a `lead_activities` row. Types:

| Type | When |
|------|------|
| `created` | Lead manually created by admin |
| `status_change` | Any status transition |
| `email_sent` | Tour confirmation or enrolment start email |
| `note` | Notes saved / follow-up date set |
| `edited` | Lead fields edited (diff stored in metadata) |
| `assigned` | `assigned_to` changed |

### Lost reasons (`Lead::LOST_REASONS`)
```
no_response  → No response after follow-up
price        → Price / fees too high
distance     → Location / distance
competitor   → Chose a competitor
not_ready    → Not ready to enrol
full         → No availability / full
other        → Other
```

### Manually adding a lead
Admins can create leads directly via:
```
GET  /admin/crm/leads/create   → createLead()
POST /admin/crm/leads          → storeLead()
```
Reference is auto-generated: `TOUR-{year}-{padded count}`.

---

## 4. Enrolment / Admissions

### Application statuses
```
pending → under_review → approved → (invite sent) → parent registers
                       ↘ waitlist
                       ↘ rejected
```

| Status | Set by |
|--------|--------|
| `pending` | Application submitted via public form |
| `under_review` | Auto-set when admin first opens the application |
| `approved` | `AdmissionsController::approve()` |
| `waitlist` | `AdmissionsController::waitlist()` |
| `rejected` | `AdmissionsController::reject()` — reason saved to `admin_notes` |

### Document uploads
Documents are stored in `Storage::disk('public')` under `enrolments/{reference}/`.  
The `documents` JSON column holds:
```json
{
  "birth_certificate": "enrolments/APP-2026-001/birth_cert.pdf",
  "clinic_card":       "enrolments/APP-2026-001/clinic_card.pdf",
  "parent_ids":        "enrolments/APP-2026-001/parent_ids.pdf",
  "proof_address":     "enrolments/APP-2026-001/proof_address.pdf"
}
```
`Application::documentsCount()` counts non-null entries. The UI shows green ≥3, amber 1–2, red 0.

### Enrolment token flow
When `startEnrol()` is called on a converted lead:
1. A `Str::random(64)` token is stored in `leads.enrolment_token`
2. `EnrolmentStartMail` is sent containing `route('enrol.form', ['token' => $token])`
3. The public form reads `?token=` and pre-fills parent/child data from the lead
4. On submit, `lead_id` is stored on the new `applications` row and `lead.status` → `converted`

---

## 5. Invitation → Parent User Linkage

### The complete flow
```
Admin: Application approved
  └─► Click "Send Portal Invitation"
        │
        ├─ Email already has a User?
        │    YES → application.parent_user_id = user.id immediately
        │          application.invited_at = now()
        │          No email sent
        │
        └─ New email
             → Delete any prior pending invitation for this application
             → Create Invitation { application_id, role:'parent', token, expires: +7d }
             → Send InvitationMail (subject + body shows child name + programme)
             → application.invited_at = now()

Parent clicks link → /register/accept/{token}
  └─► accept-invite page
        - Shows child name + programme (from invitation.application)
        - Pre-fills name from application.mother_name
        - Parent enters password

  └─► InvitationController::register()
        → User::create() with role 'parent'
        → invitation.accepted_at = now()
        → application.parent_user_id = user.id   ← THE KEY LINKAGE
        → OnboardingMail sent
        → Redirect to parent dashboard
```

### Three-state invitation panel (application show page)
| State | Condition | Display |
|-------|-----------|---------|
| Not invited | `invited_at` null | "Send Portal Invitation" button |
| Pending | `invited_at` set, `parent_user_id` null | Amber panel — sent date + Re-send button |
| Registered | `parent_user_id` set | Green panel — name, email, Re-send button |

### Invitation email context
When `invitation.application_id` is set, the email:
- Subject: `"Your Peekaboo parent portal invitation — {child_name}"`
- Body: shows a child info card with name and programme
- CTA button: `"Set Up My Account →"`

When no `application_id` (e.g. staff invite from Users & Access):
- Subject: `"You've been invited to join Peekaboo"`
- Body: generic role badge

---

## 6. Admin Dashboard

### Layout structure
```
┌─────────────────────────────────────────────────────────┐
│  Pipeline KPI strip  (6 stat cards)                     │
│  New | Contacted | Tour Sched | Tour Done | Converted | Overdue
├─────────────────┬───────────────────────────────────────┤
│ Widget 1        │ Widget 2                               │
│ TODAY'S TOURS   │ THIS WEEK'S TOUR CALENDAR             │
│ col-4           │ col-8  (7-day strip + daily list)     │
├─────────────────┴──────────────────┬────────────────────┤
│ Widget 3                           │ Enrolment Status   │
│ APPLICATIONS NEEDING A DECISION    │ sidebar col-4      │
│ col-8  (pending + under_review)    │ (counts + conv %)  │
├────────────────────────────────────┴────────────────────┤
│ Widget 4                           │ Quick Actions      │
│ FOLLOW-UPS DUE                     │ Class Capacity     │
│ col-8                              │ Lead Tasks Due     │
│                                    │ col-4              │
└────────────────────────────────────┴────────────────────┘
```

### Widget 1 — Today's Tours
**Query:** `status = tour_scheduled AND preferred_date = today()`, ordered by `preferred_time`

Each row shows: time badge, child name, parent name, age group, WhatsApp button, Call button, View button.

Empty state shows a count of upcoming scheduled tours with a link.

### Widget 2 — This Week's Tour Calendar
**Query:** `status = tour_scheduled AND preferred_date BETWEEN today AND today+6`

- 7-day strip: each cell shows day name, date number, tour count
  - Today's cell: blue border + blue text
  - Days with tours (not today): cyan border
  - Empty days: `—`
- Below the strip: a grouped list by day showing each tour's time, child name, parent name

### Widget 3 — Applications Needing a Decision
**Query:** `status IN ('pending', 'under_review')`, latest first, limit 8

Columns: Child / Parent, Programme, Start Date, Docs (count), Status (with age), Actions (View + inline Approve).

Empty state: green "No applications waiting" message.

### Widget 4 — Follow-ups Due
**Two sources combined:**

1. `follow_up_date <= today AND status NOT IN (converted, lost, waitlist)` — ordered by `follow_up_date`
   - Today's date → amber `Today` badge
   - Past date → red `Xd overdue` badge
   - Row highlight: pink background

2. `status IN (new, contacted) AND follow_up_date IS NULL AND created_at < 3 days ago`
   - Shows as `Xd no contact` red badge
   - Also pink background

De-duplicated by `$shownIds` array so a lead never appears twice.

### Supporting widgets (right col-4)
- **Quick Actions** — Add Lead, Kanban, Applications (with pending count badge), Tours (with count)
- **Class Capacity** — progress bars per class, green/amber/red by fill %, from `MockData::classes()`
- **Lead Tasks Due** — incomplete tasks linked to leads, soonest due first

---

## 7. Admin Navigation Badges

All three nav badges are **live database queries** executed on every page load:

| Nav Item | Query | Badge colour |
|----------|-------|--------------|
| Admissions | `Application::whereIn('status', ['pending', 'under_review'])->count()` | Yellow |
| CRM / Leads | `Lead::where('status', 'new')->count()` | Cyan |
| Tasks | `Task::where('completed', false)->count()` | Yellow |

Badges are hidden with `@if($count > 0)` — they disappear when nothing needs attention.

> **Previous bug:** Admissions showed hardcoded `5`, Payments showed hardcoded `1`. Both fixed.

---

## 8. CRM ↔ Admissions Cross-links

### Lead detail page → Application
When `$lead->application` exists, a **green "Enrolment Application" panel** appears in the right column showing:
- Child name + reference code
- Status badge
- Programme + fee option
- Start date + submission date
- Document count (green/amber/red)
- **"View Full Application →"** link

When lead is `converted` but no application received yet, an amber panel with **"Re-send Enrolment Link"** button.

### Application show page → Lead
When `$application->lead` exists, a **blue "Originated from CRM Lead" panel** appears showing:
- Lead name + reference
- Lead status badge
- Phone (clickable)
- Acquisition source badge (colour-coded)
- Submission date
- Assigned staff member
- **"View CRM Lead →"** link

### Admissions index table → Source column
A **Source** column between Documents and Status shows:
- Colour-coded source badge from the linked lead
- Each badge links directly to `admin.crm.leads.show`
- Lead reference shown below as secondary link
- `—` when no linked lead

---

## 9. Routes Reference

### CRM / Leads
```
GET    /admin/crm                            → CrmController@index         (dashboard)
GET    /admin/crm/leads                      → CrmController@leads         (list + filters)
GET    /admin/crm/kanban                     → CrmController@kanban        (5-col board)
GET    /admin/crm/leads/create               → CrmController@createLead
POST   /admin/crm/leads                      → CrmController@storeLead
GET    /admin/crm/leads/export               → CrmController@export        (.xlsx)
POST   /admin/crm/leads/bulk-action          → CrmController@bulkAction
GET    /admin/crm/leads/{lead}               → CrmController@showLead
GET    /admin/crm/leads/{lead}/edit          → CrmController@editLead
PUT    /admin/crm/leads/{lead}               → CrmController@updateLead
DELETE /admin/crm/leads/{lead}               → CrmController@destroyLead   (soft)
POST   /admin/crm/leads/{lead}/status        → CrmController@updateLeadStatus
PATCH  /admin/crm/leads/{lead}/status        → CrmController@ajaxUpdateStatus (kanban drag)
POST   /admin/crm/leads/{lead}/notes         → CrmController@addLeadNotes
POST   /admin/crm/leads/{lead}/follow-up     → CrmController@setFollowUpDate
POST   /admin/crm/leads/{lead}/assign        → CrmController@assignLead
POST   /admin/crm/leads/{lead}/mark-contacted→ CrmController@markContacted
POST   /admin/crm/leads/{lead}/mark-lost     → CrmController@markLost
POST   /admin/crm/leads/{lead}/notify-tour   → CrmController@notifyTour
POST   /admin/crm/leads/{lead}/start-enrol   → CrmController@startEnrol
POST   /admin/crm/leads/{lead}/waitlist      → CrmController@addToWaitlist
POST   /admin/crm/leads/{id}/restore         → CrmController@restoreLead
DELETE /admin/crm/leads/{id}/force           → CrmController@forceDeleteLead
```

### Admissions
```
GET    /admin/admissions                     → AdmissionsController@index
GET    /admin/admissions/{id}                → AdmissionsController@show
POST   /admin/admissions/{id}/approve        → AdmissionsController@approve
POST   /admin/admissions/{id}/reject         → AdmissionsController@reject
POST   /admin/admissions/{id}/waitlist       → AdmissionsController@waitlist
POST   /admin/admissions/{id}/notes          → AdmissionsController@addNotes
POST   /admin/admissions/{id}/invite         → AdmissionsController@sendInvite
GET    /admin/admissions/{id}/document/{type}→ AdmissionsController@downloadDocument
```

### Auth / Invitation
```
GET    /register/accept/{token}              → InvitationController@accept
POST   /register/accept/{token}              → InvitationController@register
```

### Dashboard
```
GET    /admin                                → DashboardController@index
```

---

## 10. Models & Relationships

### `Lead`
```php
Lead::hasMany(Task::class)
Lead::hasMany(LeadActivity::class)
Lead::belongsTo(User::class, 'assigned_to')     // assignee()
Lead::hasOne(Application::class)

// Helpers
isOverdue(): bool          // new/contacted + created > 3 days ago
isFollowUpDue(): bool      // follow_up_date set and <= today
daysToConvert(): ?int      // created_at → converted_at
touchActivity(): void      // updates last_activity_at without bumping updated_at
```

### `Application`
```php
Application::belongsTo(Lead::class)
Application::belongsTo(User::class, 'parent_user_id')   // parentUser()

// Helpers
statusLabel(): string
documentsCount(): int
hasDocument(string $type): bool
documentPath(string $type): ?string
daysWaiting(): int
isActionable(): bool       // status in [pending, under_review]
formValue(string $key, $default): mixed
```

### `Invitation`
```php
Invitation::belongsTo(User::class, 'invited_by')    // invitedBy()
Invitation::belongsTo(Application::class)           // application()

// Scope
scopeValid(): whereNull('accepted_at')->where('expires_at', '>', now())
```

### `User`
```php
User::hasMany(Invitation::class, 'invited_by')    // invitations()
User::hasMany(Application::class, 'parent_user_id') // applications()
```

### `Task`
```php
Task::belongsTo(Lead::class)
Task::belongsTo(User::class, 'created_by')   // creator()

isOverdue(): bool   // !completed && due_date && due_date->isPast()
```

### `LeadActivity`
```php
LeadActivity::belongsTo(Lead::class)
LeadActivity::belongsTo(User::class)
```

---

## 11. Known Limitations & Next Steps

| Area | Current state | Suggested next step |
|------|--------------|---------------------|
| **Class capacity** | Uses `MockData::classes()` — static data | Create `classes` table + `ClassController`; link `Application` to a class on approval |
| **Notification bell** | Hardcoded `3` badge in header | Query unread messages or system events |
| **Payments badge** | Removed (was hardcoded `1`) | Add `payments` table; badge on outstanding balances |
| **Reports** | Mock data only | Wire `ReportsController` to real `Lead` + `Application` aggregates; add time-to-convert chart |
| **Search bar** | Renders but does nothing | Implement global search across leads + applications |
| **Follow-up reminders** | Manual / visual only | Add a scheduled job (`php artisan schedule:run`) that emails assignees when `follow_up_date = today` |
| **Duplicate leads** | No email uniqueness on `leads` | Add unique index or a merge-duplicate workflow |
| **Kanban drag scroll on mobile** | Horizontal scroll works, drag may be inconsistent | Test on touch devices; consider a simplified mobile view |
| **Two-child applications** | `form_data.has_second_child` stored but no dedicated UI | Add second-child section to admissions index filter |

---

## Migrations Chronology

| Migration | What it adds |
|-----------|-------------|
| `2026_02_26_000000_create_leads_table` | Base leads table |
| `2026_02_26_000001_create_tasks_table` | Tasks linked to leads |
| `2026_02_26_100000_create_applications_table` | Applications + `lead_id`, `parent_user_id` |
| `2026_03_23_000000_create_lead_activities_table` | Activity timeline |
| `2026_03_23_000001_add_assigned_to_to_leads_table` | `assigned_to` FK |
| `2026_03_23_100000_add_soft_deletes_to_leads_table` | `deleted_at` |
| `2026_03_23_110000_add_lost_reason_to_leads_table` | `lost_reason` |
| `2026_03_23_120000_add_enrolment_token_to_leads_table` | `enrolment_token` |
| `2026_03_23_161526_add_application_id_to_invitations_table` | `application_id` FK on invitations |
| `2026_03_23_174110_add_crm_fields_to_leads_table` | `follow_up_date`, `last_activity_at`, `converted_at`, `tour_scheduled_at` |

