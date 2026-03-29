# Parent Portal — Feature Documentation

> **Last updated:** 24 March 2026  
> **Status:** ✅ Implemented  
> **Access URL:** `/parent` (requires `parent` role login)

---

## Table of Contents

1. [Overview](#overview)
2. [Authentication & Security](#authentication--security)
3. [Parent-Facing Portal](#parent-facing-portal)
   - [Dashboard](#1-dashboard)
   - [My Children](#2-my-children)
   - [Child Detail](#3-child-detail)
   - [Document Vault](#4-document-vault)
   - [School Reports](#5-school-reports)
   - [Activities](#6-activities)
   - [Sleepover Application](#7-sleepover-application)
   - [Calendar](#8-calendar)
   - [Newsletters](#9-newsletters)
   - [Photo Gallery](#10-photo-gallery)
   - [Fee Schedule & Statements](#11-fee-schedule--statements)
   - [Holiday Care](#12-holiday-care)
   - [Extra Murals](#13-extra-murals)
   - [Snack Box](#14-snack-box)
   - [Messages](#15-messages)
   - [Profile](#16-profile)
4. [Admin Portal Management](#admin-portal-management)
5. [Technical Architecture](#technical-architecture)
6. [Routes Reference](#routes-reference)
7. [File Structure](#file-structure)

---

## Overview

The Parent Portal is a secure, authenticated area where enrolled parents can:

- View **only their own** personal details and their children's information
- Track **enrolment status** for each child application
- See a personalised **dashboard with attention items** (fees due, pending applications, announcements)
- Access a **Document Vault** with all uploaded enrolment documents
- View **School Reports** with term-by-term progress and teacher comments
- Browse and register children for **extra-mural activities**
- Apply for **sleepover nights** at the school
- View **fee schedules**, download **statements**, and upload **proof of payment**
- Receive **announcements** and **newsletters** from the school
- **Message teachers** directly from the portal
- Book **holiday care** and manage **snack box** subscriptions
- Update their **profile** details and manage **emergency contacts**

The portal is also fully manageable from the **Admin Panel** (`/admin/parent-portal`) where staff can create accounts, send invitations, activate/deactivate access, and track invitation status.

---

## Authentication & Security

| Aspect | Implementation |
|---|---|
| **Login** | Standard Laravel auth at `/login` |
| **Role required** | `parent` (via Spatie `role:parent\|admin\|super_admin` middleware) |
| **Data scoping** | Every query filters by `Auth::id()` via `parent_user_id` on the `applications` table |
| **Child isolation** | `childDetail($id)` uses `Application::where('parent_user_id', Auth::id())->findOrFail($id)` — parents can **only** see their own children |
| **Invitation flow** | Admins send portal invitations → parent clicks link → sets password → gains access |
| **Account control** | Admins can activate/deactivate portal accounts and reset passwords |

---

## Parent-Facing Portal

### 1. Dashboard
**Route:** `GET /parent` → `parent.dashboard`

The main landing page after login. Displays a personalised greeting and:

#### Needs Your Attention
Smart alert cards that appear when action is required:
- **⚠️ Fees Due Soon** — appears when the next billing date is within 7 days
- **🔴 Outstanding Balance** — appears if the parent has an unpaid balance
- **ℹ️ Application Under Review** — appears when any child application is still pending or under review

#### Children Cards
One card per child showing:
- Child name, programme, age, gender
- Enrolment status badge (Approved / Pending Review / Under Review / Waiting List)
- Attendance rate, fee plan, assigned teacher
- "View Details" button linking to the full child profile

#### Quick Actions (6 buttons)
- View Statement
- Document Vault
- School Reports
- Sleepover (apply)
- Activities (register)
- Message Teacher

#### Announcements
School announcements displayed with type badges (Info / Warning / Success) and dates.

#### Upcoming Events
Calendar events with date blocks and time details.

#### Account Summary
- Monthly fees total (calculated from approved applications)
- Last payment amount and date
- Current balance
- Next payment due date with countdown warning if ≤ 7 days

---

### 2. My Children
**Route:** `GET /parent/children` → `parent.children`

Lists all children linked to the parent's applications. Each child card shows:
- Photo placeholder, name, programme badge, **enrolment status badge**
- Today's attendance status
- Child info table: Full Name, DOB, Age, Class, Teacher, **Fee Option, Reference, Start Date**
- Monthly attendance stats (present/absent/rate)
- Medical info: Allergies, Medical Conditions, Dietary Requirements
- Emergency contacts
- **"View Full Details"** button linking to child detail page

---

### 3. Child Detail
**Route:** `GET /parent/children/{id}` → `parent.children.show`

Full profile for a single child, scoped to the logged-in parent:

**Left column:**
- **Enrolment Information** — Application reference, programme, fee option, snack box status, start date, enrolled since, status
- **Child Details** — Full name, DOB, age, gender, class teacher
- **Medical Information** — Allergies, medical notes
- **Uploaded Documents** — List of documents from the application (birth certificate, clinic card, etc.) with view/download links

**Right column:**
- **This Month's Attendance** — Present / Absent / Rate stats with today's status
- **Quick Actions** — School Report, Activities, Sleepover, Document Vault, Message Teacher

---

### 4. Document Vault
**Route:** `GET /parent/documents` → `parent.documents`

A centralised place for all documents uploaded during enrolment:
- Documents grouped by child name
- Each document shows: type label, upload date, application reference
- File type icon (PDF / Image / Other)
- View/download button linking to storage
- Document types legend explaining all supported types:
  - Birth Certificate, Clinic / Immunisation Card, Medical Certificate, Parent ID Document, Proof of Residence, School Reports

**Data source:** Extracted from `documents` JSON column on the `applications` table.

---

### 5. School Reports
**Route:** `GET /parent/reports` → `parent.reports`

Term reports for each enrolled (approved) child:
- Child name, programme, term label, date
- Teacher name
- **Learning Area Ratings** displayed in styled cards:
  - Language & Communication
  - Numeracy & Maths
  - Social Skills
  - Physical Development
  - Creative Arts
  - Each with a rating (Good / Excellent) and colour-coded badge
- **Teacher's Comment** — highlighted comment block with the teacher's narrative feedback

> **Note:** Currently populated with structured mock data. Ready for a `school_reports` table in a future phase.

---

### 6. Activities
**Route:** `GET /parent/activities` → `parent.activities`  
**Route:** `POST /parent/activities/register` → `parent.activities.register`

Browse and register for extra-mural activities:

**Currently Enrolled** section — shows activities the child is already signed up for with green badges.

**Available Activities** grid (6 activities):
| Activity | Day | Time | Cost/month |
|---|---|---|---|
| Swimming Lessons | Tuesday | 10:00 - 10:45 | R350 |
| Ballet / Movement | Wednesday | 11:00 - 11:30 | R300 |
| Soccer Skills | Thursday | 10:00 - 10:45 | R250 |
| Art & Craft Workshop | Friday | 09:30 - 10:15 | R200 |
| Music & Rhythm | Monday | 11:00 - 11:30 | R280 |
| Gymnastics | Wednesday | 09:30 - 10:15 | R320 |

Each card shows: icon, name, day, time, cost, and a **Register** button with child selector dropdown (only approved children).

---

### 7. Sleepover Application
**Route:** `GET /parent/sleepover` → `parent.sleepover`  
**Route:** `POST /parent/sleepover/apply` → `parent.sleepover.apply`

Parents can apply for their children to attend supervised sleepover nights:

**How It Works** — info block explaining the process (17:00 Fri – 08:00 Sat, children must be 3+).

**Upcoming Sleepovers** — displayed as cards:
- Title, theme badge, description
- Date, day, time, cost per child
- Spots remaining counter
- Child selector dropdown + **"Apply for Sleepover"** button

**What to Bring** checklist:
- Pyjamas & change of clothes
- Sleeping bag or blanket
- Toothbrush & toiletries
- Favourite teddy or comfort item
- Any medications (labelled)
- Labelled water bottle

---

### 8. Calendar
**Route:** `GET /parent/calendar` → `parent.calendar`

School calendar with upcoming events including celebrations, meetings, holidays, and graduation dates.

---

### 9. Newsletters
**Route:** `GET /parent/newsletters` → `parent.newsletters`

Monthly newsletters and announcements from the school with read/unread status and expandable content.

---

### 10. Photo Gallery
**Route:** `GET /parent/gallery` → `parent.gallery`

Photo albums shared by teachers showing children's activities, art projects, and outdoor play.

---

### 11. Fee Schedule & Statements
**Route:** `GET /parent/fees` → `parent.fees`  
**Route:** `GET /parent/fees/statements` → `parent.fees.statements`  
**Route:** `POST /parent/fees/upload-pop` → `parent.fees.upload-pop`

**Fee Schedule** — Shows fee structure per child based on their enrolled programme.

**Statements** — Account summary with:
- Monthly fee total (auto-calculated: Full Day R4,200 / Half Day R3,800 / +R400 snack box)
- Last payment amount and date
- Current balance
- Next payment due date

**Upload Proof of Payment** — Modal form to submit POP with amount, date, bank reference, and file upload (JPG/PNG/PDF).

> **Note:** No online payments. Parents pay via EFT and upload proof. Admin confirms payments.

---

### 12. Holiday Care
**Route:** `GET /parent/holiday-care` → `parent.holiday-care`  
**Route:** `POST /parent/holiday-care/book` → `parent.holiday-care.book`

Book children for school holiday care programmes with date selection and per-child booking.

---

### 13. Extra Murals
**Route:** `GET /parent/extra-murals` → `parent.extra-murals`  
**Route:** `POST /parent/extra-murals/signup` → `parent.extra-murals.signup`

Browse and sign up for extra-mural services offered by the school.

---

### 14. Snack Box
**Route:** `GET /parent/snack-box` → `parent.snack-box`  
**Route:** `POST /parent/snack-box/signup` → `parent.snack-box.signup`

Manage snack box subscription (R400/month add-on for healthy daily snacks).

---

### 15. Messages
**Route:** `GET /parent/messages` → `parent.messages`  
**Route:** `POST /parent/messages/send` → `parent.messages.send`

Direct messaging between parents and teachers/admin.

---

### 16. Profile
**Route:** `GET /parent/profile` → `parent.profile`  
**Route:** `POST /parent/profile/update` → `parent.profile.update`

Parent can manage their account:
- **Personal Information** — Edit full name, email, phone number, home address (form POSTs to real update endpoint with validation)
- **Emergency Contacts** — View and manage emergency contacts with add/edit/remove
- **Change Password** — Update login password
- **Account Status** — Shows active status, member-since date, enrolled children count, account balance
- **Notification Preferences** — Toggle email, SMS, WhatsApp, and newsletter notifications
- **Quick Actions** — Download statement, view contract, help & support

---

## Admin Portal Management

**URL:** `/admin/parent-portal`  
**Nav:** Sidebar → "Parent Portal" (under Management)

### Admin Dashboard (`admin.parent-portal.index`)
- **Stats:** Total accounts, Active, Unverified email, Pending invitations
- **Filter:** Search by name/email/phone, filter by status (Active / Deactivated / Unverified)
- **Table:** All parent portal accounts with avatar, contact, children/apps count, email verified, status, join date
- **Row actions:** View, Deactivate/Reactivate, Resend invitation
- **Create Account modal:** Name, email, phone + optional "send invitation immediately"

### Account Detail (`admin.parent-portal.show`)
- Full account info: contact details, email verification status, role, user ID
- Pending invitation notice with resend button
- Linked enrolment applications with status and "Send Portal Invite" for approved apps
- Portal access history timeline (created → verified → invitation → deactivated)
- **Portal Preview** — links to open the parent portal pages
- **Actions:** Send email, WhatsApp, edit account, resend invitation, deactivate/reactivate, reset password

### Invitations Tracker (`admin.parent-portal.invitations`)
- **Stats:** Total sent, Pending, Accepted, Expired
- **Filter:** Search by email, filter by status
- **Table:** All invitations with status (Pending / Accepted / Expired), sent by, dates
- **Actions:** Cancel pending invitations, link to parent account

### Admin Actions Available
| Action | Description |
|---|---|
| **Create Account** | Manually create a parent portal account |
| **Send Invitation** | Email portal access invitation to a parent |
| **Resend Invitation** | Expire old invite and send a fresh one |
| **Send Invite from App** | Invite a parent directly from an approved application |
| **Activate** | Restore a deactivated portal account |
| **Deactivate** | Soft-delete to disable portal access |
| **Reset Password** | Generate a temporary password |
| **Cancel Invitation** | Expire a pending invitation |

---

## Technical Architecture

### Controller
```
app/Http/Controllers/Parent/PortalController.php   → 25 routes (parent-facing)
app/Http/Controllers/Admin/ParentPortalController.php → 10 routes (admin management)
```

### Data Flow
```
Parent logs in → Auth::user() (User model with 'parent' role)
                     ↓
         Application::where('parent_user_id', Auth::id())
                     ↓
         childrenFromApps() maps each Application → child data array
                     ↓
         Views receive: $parent (User), $children (Collection), page-specific data
```

### Key Helper Methods (PortalController)
| Method | Purpose |
|---|---|
| `parentUser()` | Returns `Auth::user()` (the logged-in parent) |
| `parentApplications()` | Queries applications linked to this parent |
| `childrenFromApps()` | Maps Application records into structured child arrays |
| `teacherForProgram()` | Resolves teacher name from programme slug |
| `feeSummary()` | Calculates monthly fees from approved apps (Full Day R4200, Half Day R3800, +R400 snack box) |
| `documentLabel()` | Converts document type slugs to human labels |

### Fee Calculation Logic
```
For each approved application:
  Full Day  → R4,200/month
  Half Day  → R3,800/month
  + Snack Box → +R400/month

Next billing date = 1st of next month
Attention alert when ≤ 7 days until due
```

---

## Routes Reference

### Parent Portal (25 routes)

| Method | URI | Name | Action |
|---|---|---|---|
| GET | `/parent` | `parent.dashboard` | Dashboard with attention items |
| GET | `/parent/children` | `parent.children` | List all children |
| GET | `/parent/children/{id}` | `parent.children.show` | Child detail page |
| GET | `/parent/calendar` | `parent.calendar` | School calendar |
| GET | `/parent/newsletters` | `parent.newsletters` | Newsletters list |
| GET | `/parent/gallery` | `parent.gallery` | Photo gallery |
| GET | `/parent/fees` | `parent.fees` | Fee schedule |
| GET | `/parent/fees/statements` | `parent.fees.statements` | Account statements |
| POST | `/parent/fees/upload-pop` | `parent.fees.upload-pop` | Upload proof of payment |
| GET | `/parent/documents` | `parent.documents` | Document vault |
| GET | `/parent/reports` | `parent.reports` | School reports |
| GET | `/parent/activities` | `parent.activities` | Activities list |
| POST | `/parent/activities/register` | `parent.activities.register` | Register for activity |
| GET | `/parent/sleepover` | `parent.sleepover` | Sleepover dates |
| POST | `/parent/sleepover/apply` | `parent.sleepover.apply` | Apply for sleepover |
| GET | `/parent/holiday-care` | `parent.holiday-care` | Holiday care booking |
| POST | `/parent/holiday-care/book` | `parent.holiday-care.book` | Book holiday care |
| GET | `/parent/extra-murals` | `parent.extra-murals` | Extra murals list |
| POST | `/parent/extra-murals/signup` | `parent.extra-murals.signup` | Sign up for extra murals |
| GET | `/parent/snack-box` | `parent.snack-box` | Snack box subscription |
| POST | `/parent/snack-box/signup` | `parent.snack-box.signup` | Update snack box |
| GET | `/parent/messages` | `parent.messages` | Messages inbox |
| POST | `/parent/messages/send` | `parent.messages.send` | Send message |
| GET | `/parent/profile` | `parent.profile` | Profile page |
| POST | `/parent/profile/update` | `parent.profile.update` | Update profile |

### Admin Portal Management (10 routes)

| Method | URI | Name | Action |
|---|---|---|---|
| GET | `/admin/parent-portal` | `admin.parent-portal.index` | Accounts overview |
| GET | `/admin/parent-portal/invitations` | `admin.parent-portal.invitations` | Invitation tracker |
| POST | `/admin/parent-portal/store` | `admin.parent-portal.store` | Create account |
| GET | `/admin/parent-portal/{id}` | `admin.parent-portal.show` | Account detail |
| POST | `/admin/parent-portal/{id}/resend-invite` | `admin.parent-portal.resend-invite` | Resend invitation |
| POST | `/admin/parent-portal/{id}/activate` | `admin.parent-portal.activate` | Reactivate account |
| DELETE | `/admin/parent-portal/{id}/deactivate` | `admin.parent-portal.deactivate` | Deactivate account |
| POST | `/admin/parent-portal/{id}/reset-password` | `admin.parent-portal.reset-password` | Reset password |
| POST | `/admin/parent-portal/app/{appId}/send-invite` | `admin.parent-portal.send-invite-app` | Invite from application |
| DELETE | `/admin/parent-portal/invitations/{id}/cancel` | `admin.parent-portal.cancel-invite` | Cancel invitation |

---

## File Structure

```
app/
  Http/Controllers/
    Parent/
      PortalController.php              ← 25 actions, real auth data
    Admin/
      ParentPortalController.php        ← 10 actions, admin management

resources/views/
  parent/
    partials/
      sidebar.blade.php                 ← Shared nav (included in all 17 views)
    dashboard.blade.php                 ← Main dashboard with attention items
    children.blade.php                  ← Children list with status badges
    child-detail.blade.php             ← Full child profile (NEW)
    documents.blade.php                ← Document vault (NEW)
    reports.blade.php                  ← School reports (NEW)
    activities.blade.php               ← Activities registration (NEW)
    sleepover.blade.php                ← Sleepover application (NEW)
    calendar.blade.php                 ← School calendar
    newsletters.blade.php              ← Newsletters
    gallery.blade.php                  ← Photo gallery
    fees.blade.php                     ← Fee schedule
    statements.blade.php               ← Account statements
    holiday-care.blade.php             ← Holiday care booking
    extra-murals.blade.php             ← Extra murals
    snack-box.blade.php                ← Snack box subscription
    messages.blade.php                 ← Messaging
    profile.blade.php                  ← Profile management
  admin/
    parent-portal/
      index.blade.php                  ← Admin portal accounts dashboard
      show.blade.php                   ← Admin account detail
      invitations.blade.php            ← Admin invitation tracker
  layouts/
    portal.blade.php                   ← Portal layout (sidebar + header + content)
    admin.blade.php                    ← Admin layout (includes Portal nav link)

routes/
  web.php                              ← 25 parent + 10 admin routes
```

---

## Design Decisions

1. **No mock data for parent-specific content** — Dashboard, children, fees, and documents all come from the real `applications` table scoped to `Auth::id()`
2. **Shared sidebar partial** — `parent/partials/sidebar.blade.php` is included in all 17 views via `@include()`, eliminating duplication and making nav changes single-file
3. **Active link highlighting** — Sidebar uses `request()->routeIs()` for automatic active state
4. **Fee calculation is code-based** — Derived from application `fee_option` and `snack_box` fields rather than a separate billing table
5. **School reports use structured mock data** — Ready for a `school_reports` database table in a future phase
6. **Activities and sleepovers use structured arrays** — Ready for database tables when the school starts managing them through the admin panel
7. **South African formatting** — Rand (R) currency, `dd MMM YYYY` dates, WhatsApp links with `+27` prefix

