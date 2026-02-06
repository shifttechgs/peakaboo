<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\EnrolmentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdmissionsController;
use App\Http\Controllers\Admin\ParentsController as AdminParentsController;
use App\Http\Controllers\Admin\PaymentsController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\CommunicationController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\CrmController;
use App\Http\Controllers\Parent\PortalController as ParentPortalController;
use App\Http\Controllers\Teacher\PortalController as TeacherPortalController;
use Barryvdh\DomPDF\Facade\Pdf;

// TEMPORARY TEST ROUTE - DELETE AFTER TESTING
Route::get('/test-pdf', function () {
    $testData = [
        'start_date' => '2026-03-01',
        'program' => 'full-day',
        'program_name' => 'Full Day Program',
        'fee_option' => 'monthly',
        'fee_option_name' => 'Monthly Payment',
        'child_name' => 'Test Child',
        'child_dob' => '2022-05-15',
        'child_gender' => 'male',
        'child_id' => '1234567890123',
        'child_language' => 'English',
        'mother_name' => 'Test Mother',
        'mother_id' => '9876543210987',
        'mother_cell' => '0821234567',
        'mother_email' => 'test@example.com',
        'father_name' => 'Test Father',
        'father_id' => '1112223334445',
        'father_cell' => '0829876543',
        'home_address' => '123 Test Street, Cape Town',
        'emergency_name' => 'Emergency Contact',
        'emergency_tel' => '0821111111',
        'doctor_name' => 'Dr. Test',
        'doctor_tel' => '0212222222',
        'signature' => 'Test Parent',
        'signature_date' => '2026-02-05',
    ];
    $applicationId = 'APP-2026-TEST';
    try {
        $pdf = Pdf::loadView('pdf.enrolment-application', [
            'data' => $testData,
            'applicationId' => $applicationId,
        ]);
        return $pdf->download('test-application.pdf');
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ], 500);
    }
});

// Public Website Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/programs', [HomeController::class, 'programs'])->name('programs');
Route::get('/programs/{slug}', [HomeController::class, 'programDetail'])->name('program.detail');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/fees', [HomeController::class, 'fees'])->name('fees');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');


// Enrolment Form Routes
Route::prefix('enrol')->name('enrol.')->group(function () {
    Route::get('/', [EnrolmentController::class, 'index'])->name('index');
    Route::get('/form', [EnrolmentController::class, 'form'])->name('form');
    Route::post('/save-step', [EnrolmentController::class, 'saveStep'])->name('save-step');
    Route::post('/submit', [EnrolmentController::class, 'submit'])->name('submit');
    Route::get('/thank-you', [EnrolmentController::class, 'thankYou'])->name('thank-you');
    Route::get('/status/{id}', [EnrolmentController::class, 'status'])->name('status');
});

// Book Tour
Route::get('/book-tour', [HomeController::class, 'bookTour'])->name('book-tour');
Route::post('/book-tour', [HomeController::class, 'submitTour'])->name('book-tour.submit');

// Admin Dashboard Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Admissions
    Route::prefix('admissions')->name('admissions.')->group(function () {
        Route::get('/', [AdmissionsController::class, 'index'])->name('index');
        Route::get('/{id}', [AdmissionsController::class, 'show'])->name('show');
        Route::post('/{id}/approve', [AdmissionsController::class, 'approve'])->name('approve');
        Route::post('/{id}/reject', [AdmissionsController::class, 'reject'])->name('reject');
        Route::post('/{id}/waitlist', [AdmissionsController::class, 'waitlist'])->name('waitlist');
        Route::post('/{id}/notes', [AdmissionsController::class, 'addNotes'])->name('notes');
    });

    // CRM / Leads
    Route::prefix('crm')->name('crm.')->group(function () {
        Route::get('/', [CrmController::class, 'index'])->name('index');
        Route::get('/leads', [CrmController::class, 'leads'])->name('leads');
        Route::get('/leads/{id}', [CrmController::class, 'showLead'])->name('leads.show');
        Route::post('/leads/{id}/status', [CrmController::class, 'updateLeadStatus'])->name('leads.status');
        Route::post('/leads/{id}/notes', [CrmController::class, 'addLeadNotes'])->name('leads.notes');
    });

    // Parents / Children
    Route::prefix('parents')->name('parents.')->group(function () {
        Route::get('/', [AdminParentsController::class, 'index'])->name('index');
        Route::get('/children', [AdminParentsController::class, 'children'])->name('children');
        Route::get('/children/{id}', [AdminParentsController::class, 'showChild'])->name('children.show');
        Route::get('/{id}', [AdminParentsController::class, 'show'])->name('show');
        Route::post('/{id}/message', [AdminParentsController::class, 'sendMessage'])->name('message');
    });

    // Payments
    Route::prefix('payments')->name('payments.')->group(function () {
        Route::get('/', [PaymentsController::class, 'index'])->name('index');
        Route::get('/outstanding', [PaymentsController::class, 'outstanding'])->name('outstanding');
        Route::get('/statements', [PaymentsController::class, 'statements'])->name('statements');
        Route::post('/record', [PaymentsController::class, 'record'])->name('record');
        Route::post('/{id}/confirm', [PaymentsController::class, 'confirm'])->name('confirm');
    });

    // Staff
    Route::prefix('staff')->name('staff.')->group(function () {
        Route::get('/', [StaffController::class, 'index'])->name('index');
        Route::get('/classes', [StaffController::class, 'classes'])->name('classes');
        Route::get('/{id}', [StaffController::class, 'show'])->name('show');
    });

    // Communication
    Route::prefix('communication')->name('communication.')->group(function () {
        Route::get('/', [CommunicationController::class, 'index'])->name('index');
        Route::get('/email', [CommunicationController::class, 'email'])->name('email');
        Route::post('/email/send', [CommunicationController::class, 'sendEmail'])->name('email.send');
        Route::get('/whatsapp', [CommunicationController::class, 'whatsapp'])->name('whatsapp');
        Route::get('/announcements', [CommunicationController::class, 'announcements'])->name('announcements');
        Route::post('/announcements', [CommunicationController::class, 'createAnnouncement'])->name('announcements.create');
        Route::get('/automations', [CommunicationController::class, 'automations'])->name('automations');
    });

    // Reports
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/', [ReportsController::class, 'index'])->name('index');
        Route::get('/enrolment', [ReportsController::class, 'enrolment'])->name('enrolment');
        Route::get('/payments', [ReportsController::class, 'payments'])->name('payments');
        Route::get('/attendance', [ReportsController::class, 'attendance'])->name('attendance');
    });

    // Settings
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('index');
        Route::post('/update', [SettingsController::class, 'update'])->name('update');
        Route::get('/audit-log', [SettingsController::class, 'auditLog'])->name('audit-log');
        Route::get('/backup', [SettingsController::class, 'backup'])->name('backup');
        Route::get('/permissions', [SettingsController::class, 'permissions'])->name('permissions');
    });
});

// Parent Portal Routes
Route::prefix('parent')->name('parent.')->group(function () {
    Route::get('/', [ParentPortalController::class, 'index'])->name('dashboard');
    Route::get('/children', [ParentPortalController::class, 'children'])->name('children');
    Route::get('/children/{id}', [ParentPortalController::class, 'childDetail'])->name('children.show');
    Route::get('/calendar', [ParentPortalController::class, 'calendar'])->name('calendar');
    Route::get('/newsletters', [ParentPortalController::class, 'newsletters'])->name('newsletters');
    Route::get('/gallery', [ParentPortalController::class, 'gallery'])->name('gallery');
    Route::get('/fees', [ParentPortalController::class, 'fees'])->name('fees');
    Route::get('/fees/statements', [ParentPortalController::class, 'statements'])->name('fees.statements');
    Route::post('/fees/upload-pop', [ParentPortalController::class, 'uploadPop'])->name('fees.upload-pop');
    Route::get('/messages', [ParentPortalController::class, 'messages'])->name('messages');
    Route::post('/messages/send', [ParentPortalController::class, 'sendMessage'])->name('messages.send');
    Route::get('/holiday-care', [ParentPortalController::class, 'holidayCare'])->name('holiday-care');
    Route::post('/holiday-care/book', [ParentPortalController::class, 'bookHolidayCare'])->name('holiday-care.book');
    Route::get('/extra-murals', [ParentPortalController::class, 'extraMurals'])->name('extra-murals');
    Route::post('/extra-murals/signup', [ParentPortalController::class, 'signupExtraMurals'])->name('extra-murals.signup');
    Route::get('/snack-box', [ParentPortalController::class, 'snackBox'])->name('snack-box');
    Route::post('/snack-box/signup', [ParentPortalController::class, 'signupSnackBox'])->name('snack-box.signup');
    Route::get('/profile', [ParentPortalController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [ParentPortalController::class, 'updateProfile'])->name('profile.update');
});

// Teacher Portal Routes
Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/', [TeacherPortalController::class, 'index'])->name('dashboard');
    Route::get('/attendance', [TeacherPortalController::class, 'attendance'])->name('attendance');
    Route::post('/attendance/mark', [TeacherPortalController::class, 'markAttendance'])->name('attendance.mark');
    Route::get('/class', [TeacherPortalController::class, 'classView'])->name('class');
    Route::get('/students', [TeacherPortalController::class, 'students'])->name('students');
    Route::get('/students/{id}', [TeacherPortalController::class, 'studentDetail'])->name('students.show');
    Route::get('/updates', [TeacherPortalController::class, 'updates'])->name('updates');
    Route::post('/updates/create', [TeacherPortalController::class, 'createUpdate'])->name('updates.create');
    Route::get('/gallery', [TeacherPortalController::class, 'gallery'])->name('gallery');
    Route::post('/gallery/upload', [TeacherPortalController::class, 'uploadPhoto'])->name('gallery.upload');
    Route::get('/profile', [TeacherPortalController::class, 'profile'])->name('profile');
});
