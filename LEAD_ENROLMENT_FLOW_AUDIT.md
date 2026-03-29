# Lead → Enrolment Flow Audit

> Last updated: 23 March 2026

---

## Phase 4 — Top-tier CRM Gaps Closed

**Status: ✅ IMPLEMENTED**

### Gaps found vs top-tier CRMs (HubSpot / Pipedrive / Salesforce)

| # | Gap | Fix |
|---|-----|-----|
| 1 | No way to manually add a lead from admin | New `GET /leads/create` + `POST /leads` routes, `createLead()` / `storeLead()` methods, `lead-create.blade.php` form with all fields + status + follow-up date + assignment |
| 2 | No follow-up date field | Migration adds `follow_up_date DATE NULL`; `isFollowUpDue()` helper on model; follow-up panel on lead detail; follow-up column on leads list (bell icon when due); follow-up date shown on Kanban cards; field added to lead-edit form |
| 3 | No `last_activity_at` tracking | Migration adds `last_activity_at TIMESTAMP NULL`; stamped on every `logActivity()` call, status change, note save, contact action; shown as "X ago" in leads list replacing raw "Days Old" |
| 4 | No `converted_at` timestamp | Migration adds `converted_at TIMESTAMP NULL`; stamped when status first moves to `converted`; shown in lead info panel with days-to-convert calculation |
| 5 | No `tour_scheduled_at` timestamp | Migration adds `tour_scheduled_at TIMESTAMP NULL`; stamped by `updateLeadStatus()` and `notifyTour()`; shown in lead info panel |
| 6 | `contacted` stage hidden from Kanban | Added as full 5th column; `kanban()` now fetches 5 stages; hidden-status strip updated to remove it |
| 7 | Kanban cards had no follow-up or app indicators | Cards now show follow-up due badge (yellow bell) and a green file icon when application exists |
| 8 | `CrmController::leads()` didn't eager-load `application` | Added `'application'` to `with()` on the leads list query |
| 9 | `+ Add Lead` button missing from leads list and Kanban | Added to both page headers |

### New DB columns (migration: `2026_03_23_174110_add_crm_fields_to_leads_table`)
```
leads.follow_up_date      DATE NULL
leads.last_activity_at    TIMESTAMP NULL
leads.converted_at        TIMESTAMP NULL
leads.tour_scheduled_at   TIMESTAMP NULL
```

### New routes
```
GET  /admin/crm/leads/create          → createLead()
POST /admin/crm/leads                 → storeLead()
POST /admin/crm/leads/{lead}/follow-up → setFollowUpDate()
```

---

## Phase 3 — Fix Invitation → Parent User Linkage

**Status: ✅ IMPLEMENTED**

### Bugs found & fixed

| # | Bug | File(s) | Fix |
|---|-----|---------|-----|
| 1 | `Invitation` had no `application_id` column — no way to know *which application* an invite belonged to | `invitations` table | New migration adds nullable `application_id FK → applications` |
| 2 | `InvitationController::register()` never set `application.parent_user_id` after the parent registered | `InvitationController.php` | After `User::create()`, loads `$invitation->application` and calls `update(['parent_user_id' => $user->id])` |
| 3 | `AdmissionsController::sendInvite()` validated `unique:users,email` — would crash if parent already had an account | `AdmissionsController.php` | Case 1: existing user → link directly, assign role, no email. Case 2: new user → create invitation with `application_id`, delete any prior pending invite first |
| 4 | Invitation email was generic — no mention of child name or program | `InvitationMail.php`, `emails/invitation.blade.php` | Mail now passes `childName`, `programName`, `parentName`; email shows child card block when from admissions |
| 5 | Accept-invite page showed no application context | `auth/accept-invite.blade.php` | Banner shows child name + program; name field pre-filled from `application->mother_name` |
| 6 | Application show page: invite status was a single binary alert | `admissions/show.blade.php` | Three-state panel: **Not invited** → Send button; **Invited/pending** → amber warning + Re-send; **Registered** → green confirmed with Re-send |
| 7 | Invite modal was hidden after first send — resend was impossible | `admissions/show.blade.php` | Modal now always rendered for `approved` applications; button label adapts (Send / Re-send) |
| 8 | `\Log` used without import in `InvitationController` | `InvitationController.php` | Added `use Illuminate\Support\Facades\Log` |

### What the full flow looks like now

```
Admin approves application
  └─► Status Panel shows "Send Portal Invitation" button

Admin clicks Send → inviteModal
  └─► Case A — email already has a User account
        → application.parent_user_id set immediately
        → application.invited_at = now()
        → No email sent (success flash explains this)

  └─► Case B — new email
        → Any prior pending invitation for this application deleted
        → New Invitation created with application_id FK
        → InvitationMail sent (subject + body shows child name)
        → application.invited_at = now()

Parent clicks link in email → /register/accept/{token}
  └─► accept-invite page shows child name + program (pre-fills name)
  └─► Parent submits name + password
        → User created & assigned 'parent' role
        → invitation.accepted_at = now()
        → application.parent_user_id = user.id  ← THE FIX
        → OnboardingMail sent
        → Redirected to parent dashboard

Admin views application
  └─► Status panel shows one of three states:
        🟢 Green  — Parent portal active (name + email shown)
        🟡 Amber  — Invitation pending (sent date + Re-send button)
        (none)    — Not yet invited (Send button shown above)
```

---

## Phase 2 — Cross-link CRM ↔ Admissions in Admin UI

**Status: ✅ IMPLEMENTED**

### What was done

#### 1. Lead Detail Page (`/admin/crm/leads/{lead}`)
**Added: "Enrolment Application" panel** (right column, below Status panel)

| Scenario | What shows |
|---|---|
| Lead has a linked application | Green-bordered panel: child name, reference, status badge, program, start date, doc count, **"View Full Application →"** link |
| Lead is `converted` but no application received | Amber panel with **"Re-send Enrolment Link"** button |

`CrmController::showLead()` eager-loads `'application'`.

#### 2. Application Show Page (`/admin/admissions/{id}`)
**Added: "Originated from CRM Lead" panel** (right column, above Documents)

Shows lead name, reference, status badge, phone, source badge, submission date, assigned staff, **"View CRM Lead →"** link.

`AdmissionsController::show()` eager-loads `'lead'`.

#### 3. Admissions Index Table (`/admin/admissions`)
**Added: "Source" column** — colour-coded source badge from the linked lead, each a direct link to the CRM lead. `AdmissionsController::index()` eager-loads `'lead'`.

### Data model
```
Lead  ──hasOne──►  Application  ──belongsTo──►  Lead
                       │
                       └──belongsTo──►  User (parent_user_id)
```


> Last updated: 23 March 2026

---

## Phase 2 — Cross-link CRM ↔ Admissions in Admin UI

**Status: ✅ IMPLEMENTED**

---

### What was done

#### 1. Lead Detail Page (`/admin/crm/leads/{lead}`) — `lead-detail.blade.php`

**Added: "Enrolment Application" panel** (right column, below Status panel)

| Scenario | What shows |
|---|---|
| Lead has a linked application | Green-bordered panel showing: child name, reference code, status badge, program + fee option, start date, document count, and a **"View Full Application →"** button linking to `admin.admissions.show` |
| Lead is `converted` but no application received yet | Amber-bordered warning panel with a **"Re-send Enrolment Link"** button that re-triggers `admin.crm.leads.start-enrol` |
| Lead not yet converted | No panel shown (not relevant) |

**Controller change** — `CrmController::showLead()` now eager-loads `'application'` alongside `'assignee'`.

---

#### 2. Application Show Page (`/admin/admissions/{id}`) — `show.blade.php`

**Added: "Originated from CRM Lead" panel** (right column, above Documents panel)

Shows (only when `$application->lead` exists):
- Lead name + reference code
- Lead status badge
- Phone (clickable `tel:`)
- Acquisition source badge (Google / Facebook / Instagram / Referral)
- Date submitted
- Assigned staff member (if any)
- **"View CRM Lead →"** button linking to `admin.crm.leads.show`

**Controller change** — `AdmissionsController::show()` now eager-loads `'lead'`.

---

#### 3. Admissions Index Table (`/admin/admissions`) — `index.blade.php`

**Added: "Source" column** between Documents and Status columns.

- Displays the acquisition source badge from the linked lead (colour-coded: Google=red, Facebook=blue, Instagram=yellow, Referral=green)
- Each badge is a direct link to `admin.crm.leads.show` for that lead
- Lead reference shown below the badge as a secondary link
- Shows `—` when no linked lead exists

**Controller change** — `AdmissionsController::index()` now eager-loads `'lead'` via `$query->with('lead')`.

---

### Data model reminder

The `applications` table has a `lead_id` FK column that links back to `leads`. The relationship is:

```
Lead  ──hasOne──►  Application
Application  ──belongsTo──►  Lead
```

Both sides are already declared in the models:
- `Lead::application()` → `hasOne(Application::class)`
- `Application::lead()` → `belongsTo(Lead::class)`

The CRM controller already uses `$lead->application()->exists()` as a guard to prevent duplicate enrolment emails. Phase 2 surfaces this relationship visually in the admin UI.

---

### What was NOT changed (out of scope for Phase 2)

- The enrolment token flow (already implemented in `CrmController::startEnrol()`)
- The `converted` status auto-trigger on application submission
- The public enrolment form pre-fill from `?token=`
- Parent portal invitation flow
- Reporting / analytics cross-referencing leads to applications



