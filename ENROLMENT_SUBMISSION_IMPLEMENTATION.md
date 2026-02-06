# Enrolment Form Submission Implementation

## Overview

The enrolment form submission system has been fully implemented. When a parent submits the enrolment application:

1. **Form data is validated** - All required fields are checked
2. **Files are uploaded** - Documents are stored in `storage/app/public/enrolments/[APPLICATION_ID]/`
3. **PDF is generated** - Professional application PDF created from template
4. **Email is sent** - Admin receives email with PDF and all uploaded documents attached
5. **User is redirected** - Parent sees thank-you page with application ID

## Files Created/Modified

### New Files Created

1. **app/Mail/EnrolmentApplicationMail.php**
   - Mailable class for sending application emails
   - Handles attachment of PDF and uploaded documents
   - Subject: "New Enrolment Application - [APP-ID]"

2. **resources/views/emails/enrolment-application.blade.php**
   - Professional markdown email template
   - Displays all application information in organized sections
   - Shows program details, child info, parent/guardian info, medical info, consents

3. **resources/views/pdf/enrolment-application.blade.php**
   - Styled PDF template with brand colors
   - Color-coded sections (#0c508e, #D18109, #70167E, #e91e63)
   - Professional layout with Peekaboo branding
   - Shows all application data in organized tables

4. **config/dompdf.php**
   - Configuration file for DomPDF package
   - Sets font directories, permissions, security settings

5. **INSTALL_DOMPDF.md**
   - Installation instructions for DomPDF package
   - Troubleshooting guide

### Modified Files

1. **app/Http/Controllers/Public/EnrolmentController.php**
   - Updated imports (Mail, Pdf, Request, Storage)
   - Completely rewrote `submit()` method with:
     - Comprehensive validation (all form fields)
     - File upload handling (birth certificate, clinic card, parent IDs, proof of address)
     - PDF generation using blade template
     - Email sending with attachments
     - Error handling with try-catch
     - Application ID generation: `APP-YYYY-XXX` format

## Application Flow

### 1. Form Submission (POST /enrol/submit)

Parent fills out multi-step form and clicks "Submit Application"

### 2. Validation

All fields validated:
- Required fields: child info, parent info, emergency contact, doctor info, signature
- Optional fields: second child, medical conditions, allergies
- File uploads: max 5MB each, accepted formats: PDF, JPG, JPEG, PNG
- Consent checkboxes

### 3. File Processing

Uploaded documents saved to:
```
storage/app/public/enrolments/APP-2026-XXX/
  - birth_certificate_APP-2026-XXX.pdf
  - clinic_card_APP-2026-XXX.jpg
  - parent_ids_APP-2026-XXX.pdf
  - proof_address_APP-2026-XXX.pdf
```

### 4. PDF Generation

PDF created from blade template:
- Saved to: `storage/app/public/enrolments/APP-2026-XXX/Application-APP-2026-XXX.pdf`
- Professional styling with brand colors
- All application data included
- Peekaboo branding and contact info

### 5. Email Sending

Email sent to: **sales@shifttechgs.com** (configured in .env as CONTACT_EMAIL)

Email includes:
- Subject: "New Enrolment Application - APP-2026-XXX"
- Body: Professional markdown template with all application details
- Attachments:
  - Application PDF
  - Birth certificate (if uploaded)
  - Clinic card (if uploaded)
  - Parent IDs (if uploaded)
  - Proof of address (if uploaded)

### 6. Redirect

User redirected to: `/enrol/thank-you` with application ID in session

## What You Need to Do

### REQUIRED: Install DomPDF

The system requires the DomPDF package to generate PDFs. Install it by running:

```bash
composer require barryvdh/laravel-dompdf
```

See **INSTALL_DOMPDF.md** for detailed installation instructions.

### Optional: Configure Storage

Ensure storage is properly linked and writable:

```bash
php artisan storage:link
chmod -R 775 storage/
mkdir -p storage/fonts
chmod -R 775 storage/fonts
```

## Testing the System

1. **Test the form submission:**
   - Go to: http://your-domain/enrol/form
   - Fill out all required fields
   - Upload test documents
   - Submit the application

2. **Verify email delivery:**
   - Check inbox: sales@shifttechgs.com
   - Verify email contains all information
   - Check PDF attachment opens correctly
   - Verify uploaded documents are attached

3. **Check file storage:**
   - Navigate to: `storage/app/public/enrolments/`
   - Verify application folder created
   - Check PDF and uploaded files are present

## Configuration

### Email Settings (.env)

```env
MAIL_MAILER=smtp
MAIL_HOST=aab.managing.services
MAIL_PORT=465
MAIL_USERNAME=sales@shifttechgs.com
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=sales@shifttechgs.com
MAIL_FROM_NAME="Peekaboo Daycare"
CONTACT_EMAIL=sales@shifttechgs.com
```

### Application ID Format

Generated automatically: `APP-YYYY-XXX`
- YYYY: Current year (e.g., 2026)
- XXX: Random 3-digit number (001-999)

Example: `APP-2026-457`

## Error Handling

The system includes error handling:

1. **Validation errors**: User sees which fields need correction
2. **File upload errors**: Displays error message if file too large or wrong format
3. **Email sending errors**: Logged but doesn't fail submission (user still gets thank-you page)
4. **PDF generation errors**: Will display error if DomPDF not installed

Errors logged to: `storage/logs/laravel.log`

## File Size Limits

- Each file upload: **5MB maximum**
- Accepted formats: **PDF, JPG, JPEG, PNG**
- Total attachments per email: ~20MB (depending on email server limits)

## Security Features

1. **CSRF Protection**: Form includes @csrf token
2. **Input Validation**: All fields validated before processing
3. **File Type Validation**: Only allowed file types accepted
4. **File Size Limits**: Prevents excessive uploads
5. **Storage Path Security**: Files stored in protected directory
6. **DomPDF Chroot**: Prevents access to system files

## Color Scheme (PDF & Email)

- **Blue (#0c508e)**: Program selection, headers
- **Orange (#D18109)**: Child information
- **Purple (#70167E)**: Parent/guardian information
- **Pink (#e91e63)**: Emergency & medical information
- **Green (#10b981)**: Consent checkmarks

## Next Steps

1. **Install DomPDF** (see INSTALL_DOMPDF.md)
2. **Test submission** with sample data
3. **Verify email delivery** to admin
4. **Check PDF formatting** looks professional
5. **Test file uploads** with different file types
6. **Monitor error logs** during testing

## Support

If you encounter issues:
- Check `storage/logs/laravel.log` for errors
- Verify `.env` email settings are correct
- Ensure storage directories are writable
- Confirm DomPDF is installed: `composer show barryvdh/laravel-dompdf`

---

**Implementation complete!** The system is ready to accept enrolment applications once DomPDF is installed.
