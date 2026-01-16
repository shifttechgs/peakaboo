# Peekaboo Daycare - Portal Access Guide

## How to Access the Portals

### Prerequisites
1. Start your Laravel development server:
   ```bash
   php artisan serve
   ```
   The application will run at `http://127.0.0.1:8000`

---

## Public Website

**Homepage**: http://127.0.0.1:8000

### Available Public Pages:
- **Home**: http://127.0.0.1:8000
- **Programs**: http://127.0.0.1:8000/programs
- **Fees**: http://127.0.0.1:8000/fees
- **Contact**: http://127.0.0.1:8000/contact
- **FAQ**: http://127.0.0.1:8000/faq
- **Gallery**: http://127.0.0.1:8000/gallery
- **Book Tour**: http://127.0.0.1:8000/book-tour
- **Enrolment Form**: http://127.0.0.1:8000/enrol/form

---

## Parent Portal

**Access URL**: http://127.0.0.1:8000/parent

### All Parent Portal Pages:
- **Dashboard**: http://127.0.0.1:8000/parent
- **My Children**: http://127.0.0.1:8000/parent/children
- **Calendar**: http://127.0.0.1:8000/parent/calendar
- **Newsletters**: http://127.0.0.1:8000/parent/newsletters
- **Photo Gallery**: http://127.0.0.1:8000/parent/gallery
- **Fee Schedule**: http://127.0.0.1:8000/parent/fees
- **Statements**: http://127.0.0.1:8000/parent/fees/statements
- **Messages**: http://127.0.0.1:8000/parent/messages
- **Holiday Care**: http://127.0.0.1:8000/parent/holiday-care
- **Extra Murals**: http://127.0.0.1:8000/parent/extra-murals
- **Snack Box**: http://127.0.0.1:8000/parent/snack-box
- **Profile**: http://127.0.0.1:8000/parent/profile

**Features:**
- View children's attendance and progress
- Receive daily updates from teachers
- Manage fee payments and view statements
- Book holiday care and extra murals
- Message teachers directly
- View photo galleries

---

## Teacher Portal

**Access URL**: http://127.0.0.1:8000/teacher

### All Teacher Portal Pages:
- **Dashboard**: http://127.0.0.1:8000/teacher
- **Attendance Register**: http://127.0.0.1:8000/teacher/attendance
- **My Class**: http://127.0.0.1:8000/teacher/class
- **Students**: http://127.0.0.1:8000/teacher/students
- **Daily Updates**: http://127.0.0.1:8000/teacher/updates
- **Photo Gallery**: http://127.0.0.1:8000/teacher/gallery
- **Profile**: http://127.0.0.1:8000/teacher/profile

**Features:**
- Mark daily attendance with moods
- Send updates to parents
- Upload photos to class galleries
- View student profiles and medical info
- Manage class schedules and activities

---

## Admin Dashboard

**Access URL**: http://127.0.0.1:8000/admin

### All Admin Pages:

#### Main Dashboard
- **Dashboard**: http://127.0.0.1:8000/admin

#### Admissions
- **All Applications**: http://127.0.0.1:8000/admin/admissions

#### CRM
- **Leads**: http://127.0.0.1:8000/admin/crm/leads

#### Parents & Children
- **Parents List**: http://127.0.0.1:8000/admin/parents
- **Children List**: http://127.0.0.1:8000/admin/parents/children

#### Payments
- **All Payments**: http://127.0.0.1:8000/admin/payments
- **Outstanding**: http://127.0.0.1:8000/admin/payments/outstanding
- **Statements**: http://127.0.0.1:8000/admin/payments/statements

#### Staff
- **Staff List**: http://127.0.0.1:8000/admin/staff
- **Classes**: http://127.0.0.1:8000/admin/staff/classes

#### Communication
- **Overview**: http://127.0.0.1:8000/admin/communication
- **Email**: http://127.0.0.1:8000/admin/communication/email
- **WhatsApp**: http://127.0.0.1:8000/admin/communication/whatsapp
- **Announcements**: http://127.0.0.1:8000/admin/communication/announcements
- **Automations**: http://127.0.0.1:8000/admin/communication/automations

#### Reports
- **Overview**: http://127.0.0.1:8000/admin/reports
- **Enrolment**: http://127.0.0.1:8000/admin/reports/enrolment
- **Payments**: http://127.0.0.1:8000/admin/reports/payments
- **Attendance**: http://127.0.0.1:8000/admin/reports/attendance

#### Settings
- **Settings**: http://127.0.0.1:8000/admin/settings
- **Audit Log**: http://127.0.0.1:8000/admin/settings/audit-log
- **Backup**: http://127.0.0.1:8000/admin/settings/backup
- **Permissions**: http://127.0.0.1:8000/admin/settings/permissions

**Features:**
- Manage all applications and enrollments
- Track payments and send statements
- Send bulk communications (Email, SMS, WhatsApp)
- View detailed reports and analytics
- Manage staff and class assignments

---

## Quick Testing Links

### Start Here:
1. **Public Website**: http://127.0.0.1:8000
2. **Parent Portal**: http://127.0.0.1:8000/parent
3. **Teacher Portal**: http://127.0.0.1:8000/teacher
4. **Admin Dashboard**: http://127.0.0.1:8000/admin

### Important Notes:
- No authentication is required (mock data only)
- All data is simulated using MockData.php
- Forms will submit but not save to a database
- All portals have full CRUD operations mocked

---

## Design Features

### Premium UI Elements:
- **Pastel gradients**: B5D8EB → FFB5BA
- **Clean, minimal layouts**
- **Responsive mobile design**
- **Real-world South African data**
- **Professional color system**
- **Context-aware interactions**

### Production-Ready:
- Form validation
- Loading states
- Toast notifications
- Empty states
- Error handling
- Mobile responsive
- POPIA compliance mentions

---

## Demo User Accounts (Mock)

### Parent Portal
- **Name**: Sarah Thompson
- **Email**: sarah.thompson@email.com
- **Children**: Emma Thompson (4 years, Preschool)

### Teacher Portal
- **Name**: Sarah van der Merwe
- **Email**: sarah.vdm@peekaboo.co.za
- **Class**: Preschool (3-4 years)

### Admin Dashboard
- **Access**: Direct URL access (no login required in demo)

---

## Need Help?

All routes are defined in: `routes/web.php`
All controllers are in: `app/Http/Controllers/`
All views are in: `resources/views/`

Enjoy exploring the Peekaboo Daycare Management System!
