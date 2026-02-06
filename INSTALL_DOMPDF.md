# DomPDF Installation Instructions

The enrolment form submission feature requires the DomPDF package to generate PDF applications.

## Installation Steps

1. Open your terminal/command prompt in the project directory:
   ```
   cd /mnt/c/wamp64_3.3.4/www/projects/peekaboo
   ```

2. Install the DomPDF package via Composer:
   ```
   composer require barryvdh/laravel-dompdf
   ```

3. The package will auto-register in Laravel 12. No additional configuration needed.

4. Ensure the storage directories are writable:
   ```
   php artisan storage:link
   chmod -R 775 storage/
   chmod -R 775 bootstrap/cache/
   ```

5. Create the fonts directory for DomPDF:
   ```
   mkdir -p storage/fonts
   chmod -R 775 storage/fonts
   ```

## What This Package Does

- **barryvdh/laravel-dompdf**: Converts HTML to PDF documents using the DomPDF library
- Used in `EnrolmentController@submit()` to generate application PDFs
- PDF template located at: `resources/views/pdf/enrolment-application.blade.php`

## Testing

After installation, test the enrolment form submission:

1. Go to: http://your-domain/enrol/form
2. Fill out the form completely
3. Upload required documents
4. Submit the application
5. Check that:
   - PDF is generated
   - Email is sent to: `sales@shifttechgs.com`
   - PDF and uploaded documents are attached to the email

## Troubleshooting

### If you get "Class 'Barryvdh\DomPDF\Facade\Pdf' not found"
- Run: `composer dump-autoload`
- Clear cache: `php artisan config:clear`

### If PDF generation fails
- Check storage permissions: `ls -la storage/`
- Ensure fonts directory exists: `mkdir -p storage/fonts`
- Check error logs: `tail -f storage/logs/laravel.log`

### If fonts don't render correctly
- DomPDF uses DejaVu Sans by default (specified in PDF template)
- Additional fonts can be installed if needed

## Package Documentation

Full documentation: https://github.com/barryvdh/laravel-dompdf
