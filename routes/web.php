<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\InvitationController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\EnrolmentController;
use App\Http\Controllers\Public\SitemapController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdmissionsController;
use App\Http\Controllers\Admin\ParentsController as AdminParentsController;
use App\Http\Controllers\Admin\PaymentsController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\CommunicationController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\CrmController;
use App\Http\Controllers\Admin\TasksController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ParentPortalController as AdminParentPortalController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Parent\PortalController as ParentPortalController;
use App\Http\Controllers\Teacher\PortalController as TeacherPortalController;
use App\Http\Controllers\Child\PortalController as ChildPortalController;



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

// ── SEO: Sitemap & Robots ──────────────────────────────────────────────────
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', function () {
    $content = "User-agent: *\n"
             . "Allow: /\n"
             . "Disallow: /admin/\n"
             . "Disallow: /parent/\n"
             . "Disallow: /teacher/\n"
             . "Disallow: /child/\n"
             . "Disallow: /login\n"
             . "Disallow: /register/\n"
             . "Disallow: /forgot-password\n"
             . "Disallow: /reset-password\n"
             . "Disallow: /enrol/form\n"
             . "Disallow: /enrol/thank-you\n"
             . "Disallow: /enrol/status/\n"
             . "\n"
             . "Sitemap: " . route('sitemap') . "\n";
    return response($content, 200)->header('Content-Type', 'text/plain');
})->name('robots');

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

// ─── Auth Routes ─────────────────────────────────────────────────────────────

// Guest-only auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/forgot-password', [PasswordResetController::class, 'showForgot'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showReset'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');

});

// Invitation accept — outside guest middleware so logged-in admins can test links
Route::get('/register/accept/{token}', [InvitationController::class, 'accept'])->name('invitation.accept');
Route::post('/register/accept/{token}', [InvitationController::class, 'register'])->name('invitation.register');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// ─── Admin Routes ─────────────────────────────────────────────────────────────

Route::middleware(['auth', 'role:admin|super_admin'])->prefix('admin')->name('admin.')->group(function () {
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
        Route::post('/{id}/invite', [AdmissionsController::class, 'sendInvite'])->name('invite');
        Route::get('/{id}/document/{type}', [AdmissionsController::class, 'downloadDocument'])->name('document');
    });

    // CRM / Leads
    Route::prefix('crm')->name('crm.')->group(function () {
        Route::get('/', [CrmController::class, 'index'])->name('index');
        Route::get('/leads', [CrmController::class, 'leads'])->name('leads');
        Route::get('/kanban', [CrmController::class, 'kanban'])->name('kanban');

        // Static paths MUST come before {lead} wildcard routes
        Route::get('/leads/export', [CrmController::class, 'export'])->name('leads.export');
        Route::post('/leads/bulk-action', [CrmController::class, 'bulkAction'])->name('leads.bulk-action');
        Route::get('/leads/create', [CrmController::class, 'createLead'])->name('leads.create');
        Route::post('/leads', [CrmController::class, 'storeLead'])->name('leads.store');

        // Wildcard {lead} routes
        Route::patch('/leads/{lead}/status', [CrmController::class, 'ajaxUpdateStatus'])->name('leads.ajax-status');
        Route::get('/leads/{lead}', [CrmController::class, 'showLead'])->name('leads.show');
        Route::get('/leads/{lead}/edit', [CrmController::class, 'editLead'])->name('leads.edit');
        Route::put('/leads/{lead}', [CrmController::class, 'updateLead'])->name('leads.update');
        Route::delete('/leads/{lead}', [CrmController::class, 'destroyLead'])->name('leads.destroy');
        Route::post('/leads/{lead}/status', [CrmController::class, 'updateLeadStatus'])->name('leads.status');
        Route::post('/leads/{lead}/notes', [CrmController::class, 'addLeadNotes'])->name('leads.notes');
        Route::post('/leads/{lead}/follow-up', [CrmController::class, 'setFollowUpDate'])->name('leads.follow-up');
        Route::post('/leads/{lead}/tour-date', [CrmController::class, 'updateTourDate'])->name('leads.tour-date');
        Route::post('/leads/{lead}/notify-tour', [CrmController::class, 'notifyTour'])->name('leads.notify-tour');
        Route::post('/leads/{lead}/start-enrol', [CrmController::class, 'startEnrol'])->name('leads.start-enrol');
        Route::post('/leads/{lead}/waitlist', [CrmController::class, 'addToWaitlist'])->name('leads.waitlist');
        Route::post('/leads/{lead}/assign', [CrmController::class, 'assignLead'])->name('leads.assign');
        Route::post('/leads/{lead}/mark-contacted', [CrmController::class, 'markContacted'])->name('leads.mark-contacted');
        Route::post('/leads/{lead}/mark-lost', [CrmController::class, 'markLost'])->name('leads.mark-lost');

        // Soft-delete recovery
        Route::post('/leads/{id}/restore', [CrmController::class, 'restoreLead'])->name('leads.restore');
        Route::delete('/leads/{id}/force', [CrmController::class, 'forceDeleteLead'])->name('leads.force-delete');
    });

    // Tasks
    Route::prefix('tasks')->name('tasks.')->group(function () {
        Route::get('/', [TasksController::class, 'index'])->name('index');
        Route::post('/', [TasksController::class, 'store'])->name('store');
        Route::put('/{task}', [TasksController::class, 'update'])->name('update');
        Route::patch('/{task}/toggle', [TasksController::class, 'toggle'])->name('toggle');
        Route::delete('/{task}', [TasksController::class, 'destroy'])->name('destroy');
    });

    // Parents / Children
    Route::prefix('parents')->name('parents.')->group(function () {
        Route::get('/', [AdminParentsController::class, 'index'])->name('index');
        Route::get('/children', [AdminParentsController::class, 'children'])->name('children');
        Route::get('/children/{id}', [AdminParentsController::class, 'showChild'])->name('children.show');
        Route::get('/{id}', [AdminParentsController::class, 'show'])->name('show');
        Route::post('/{id}/message', [AdminParentsController::class, 'sendMessage'])->name('message');
    });

    // Parent Portal Management: disabled
    // Route::prefix('parent-portal')->name('parent-portal.')->group(function () {
    //     Route::get('/',                                [AdminParentPortalController::class, 'index'])->name('index');
    //     Route::get('/invitations',                     [AdminParentPortalController::class, 'invitations'])->name('invitations');
    //     Route::post('/store',                          [AdminParentPortalController::class, 'storeAccount'])->name('store');
    //     Route::get('/{id}',                            [AdminParentPortalController::class, 'show'])->name('show');
    //     Route::post('/{id}/resend-invite',             [AdminParentPortalController::class, 'resendInvite'])->name('resend-invite');
    //     Route::post('/{id}/activate',                  [AdminParentPortalController::class, 'activate'])->name('activate');
    //     Route::delete('/{id}/deactivate',              [AdminParentPortalController::class, 'deactivate'])->name('deactivate');
    //     Route::post('/{id}/reset-password',            [AdminParentPortalController::class, 'resetPassword'])->name('reset-password');
    //     Route::post('/app/{appId}/send-invite',        [AdminParentPortalController::class, 'sendInviteToApp'])->name('send-invite-app');
    //     Route::delete('/invitations/{inviteId}/cancel',[AdminParentPortalController::class, 'cancelInvite'])->name('cancel-invite');
    // });

    // Payments
    Route::prefix('payments')->name('payments.')->group(function () {
        Route::get('/', [PaymentsController::class, 'index'])->name('index');
        Route::get('/outstanding', [PaymentsController::class, 'outstanding'])->name('outstanding');
        Route::get('/statements', [PaymentsController::class, 'statements'])->name('statements');
        Route::post('/record', [PaymentsController::class, 'record'])->name('record');
        Route::post('/{payment}/verify', [PaymentsController::class, 'verify'])->name('verify');
        Route::post('/{payment}/reject', [PaymentsController::class, 'reject'])->name('reject');
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

    // Users & Access
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/',              [UsersController::class, 'index'])->name('index');
        Route::get('/create',        [UsersController::class, 'create'])->name('create');
        Route::post('/',             [UsersController::class, 'store'])->name('store');
        Route::get('/{user}/edit',   [UsersController::class, 'edit'])->name('edit');
        Route::put('/{user}',        [UsersController::class, 'update'])->name('update');
        Route::delete('/{user}',     [UsersController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/restore', [UsersController::class, 'restore'])->name('restore');
        Route::delete('/{id}/force', [UsersController::class, 'forceDelete'])->name('force-delete');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    // Settings
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('index');
        Route::post('/update', [SettingsController::class, 'update'])->name('update');
        Route::get('/audit-log', [SettingsController::class, 'auditLog'])->name('audit-log');
        Route::get('/backup', [SettingsController::class, 'backup'])->name('backup');
        Route::get('/permissions', [SettingsController::class, 'permissions'])->name('permissions');
    });
});

// ─── Parent Portal Routes ─────────────────────────────────────────────────────

Route::middleware(['auth', 'role:parent|admin|super_admin'])->prefix('parent')->name('parent.')->group(function () {
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
    Route::get('/documents', [ParentPortalController::class, 'documents'])->name('documents');
    Route::post('/documents/upload', [ParentPortalController::class, 'uploadDocument'])->name('documents.upload');
    Route::get('/reports', [ParentPortalController::class, 'reports'])->name('reports');
    Route::get('/activities', [ParentPortalController::class, 'activities'])->name('activities');
    Route::post('/activities/register', [ParentPortalController::class, 'registerActivity'])->name('activities.register');
    Route::get('/sleepover', [ParentPortalController::class, 'sleepover'])->name('sleepover');
    Route::post('/sleepover/apply', [ParentPortalController::class, 'applySleepover'])->name('sleepover.apply');
});

// ─── Teacher Portal Routes ────────────────────────────────────────────────────

Route::middleware(['auth', 'role:teacher|admin|super_admin'])->prefix('teacher')->name('teacher.')->group(function () {
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

// ─── Child Portal Routes ──────────────────────────────────────────────────────

Route::middleware(['auth', 'role:child|admin|super_admin'])->prefix('child')->name('child.')->group(function () {
    Route::get('/', [ChildPortalController::class, 'index'])->name('dashboard');
    Route::get('/schedule', [ChildPortalController::class, 'schedule'])->name('schedule');
    Route::get('/gallery', [ChildPortalController::class, 'gallery'])->name('gallery');
    Route::get('/updates', [ChildPortalController::class, 'updates'])->name('updates');
});
