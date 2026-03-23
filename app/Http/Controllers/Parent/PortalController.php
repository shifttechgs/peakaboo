<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Data\MockData;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortalController extends Controller
{
    // ─── Helper: get the currently logged-in parent + their children ────────

    private function parentUser(): User
    {
        return Auth::user();
    }

    private function parentApplications()
    {
        return Application::where('parent_user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();
    }

    private function childrenFromApps($apps = null)
    {
        $apps = $apps ?? $this->parentApplications();
        return $apps->map(function ($app) {
            return [
                'id'               => $app->id,
                'name'             => $app->child_name,
                'full_name'        => $app->child_name,
                'dob'              => $app->child_dob?->format('d M Y') ?? '—',
                'dob_raw'          => $app->child_dob,
                'age'              => $app->child_dob ? $app->child_dob->age . ' yrs' : '—',
                'gender'           => ucfirst($app->child_gender ?? '—'),
                'program'          => $app->program_name ?? '—',
                'program_slug'     => $app->program,
                'fee_option'       => $app->fee_option_name ?? $app->fee_option ?? '—',
                'snack_box'        => $app->snack_box,
                'reference'        => $app->reference,
                'status'           => $app->status,
                'status_label'     => $app->statusLabel(),
                'start_date'       => $app->start_date?->format('d M Y'),
                'enrolled_date'    => $app->approved_at?->format('d M Y') ?? $app->created_at->format('d M Y'),
                'teacher'          => $this->teacherForProgram($app->program),
                'attendance_today' => 'Present',
                'attendance_rate'  => '95%',
                'days_this_month'  => now()->day > 1 ? now()->day - 1 : 0,
                'absent_days'      => 1,
                'allergies'        => $app->formValue('medical_allergies', 'None listed'),
                'medical_notes'    => $app->formValue('medical_conditions', ''),
                'documents'        => $app->documents ?? [],
                'application'      => $app,
            ];
        });
    }

    private function teacherForProgram(?string $program): string
    {
        return match ($program) {
            'baby-room' => 'Michelle Peters',
            'toddlers'  => 'Nomsa Dlamini',
            'preschool' => 'Thandi Nkosi',
            'grade-r'   => 'Lisa Thompson',
            default     => 'TBA',
        };
    }

    private function feeSummary($apps)
    {
        $totalMonthly = 0;
        foreach ($apps as $app) {
            if ($app->status === 'approved') {
                $fee = match ($app->fee_option) {
                    'half-day', 'Half Day' => 3800,
                    default                => 4200,
                };
                if ($app->snack_box) {
                    $fee += 400;
                }
                $totalMonthly += $fee;
            }
        }

        $nextDue = now()->copy()->startOfMonth()->addMonth();

        return [
            'monthly_fee'       => $totalMonthly,
            'last_payment'      => $totalMonthly,
            'last_payment_date' => now()->subMonth()->startOfMonth()->addDays(4)->format('d M Y'),
            'balance'           => 0,
            'next_due'          => $nextDue->format('d M Y'),
            'next_due_days'     => (int) now()->diffInDays($nextDue, false),
        ];
    }

    // ─── Dashboard ─────────────────────────────────────────────────────────

    public function index()
    {
        $user = $this->parentUser();
        $apps = $this->parentApplications();
        $children = $this->childrenFromApps($apps);
        $feeSummary = $this->feeSummary($apps);

        // Attention items
        $attentionItems = collect();

        if ($feeSummary['next_due_days'] <= 7 && $feeSummary['next_due_days'] >= 0) {
            $attentionItems->push([
                'type'    => 'warning',
                'icon'    => 'fa-exclamation-triangle',
                'title'   => 'Fees Due Soon',
                'message' => 'Next billing date is ' . $feeSummary['next_due'] . ' (in ' . $feeSummary['next_due_days'] . ' days). Please ensure payment is made on time.',
                'action'  => route('parent.fees'),
                'action_label' => 'View Fees',
            ]);
        }

        if ($feeSummary['balance'] > 0) {
            $attentionItems->push([
                'type'    => 'danger',
                'icon'    => 'fa-exclamation-circle',
                'title'   => 'Outstanding Balance',
                'message' => 'You have an outstanding balance of R' . number_format($feeSummary['balance'], 2) . '. Please upload proof of payment.',
                'action'  => route('parent.fees.statements'),
                'action_label' => 'View Statement',
            ]);
        }

        $pendingApps = $apps->whereIn('status', ['pending', 'under_review']);
        if ($pendingApps->count() > 0) {
            $attentionItems->push([
                'type'    => 'info',
                'icon'    => 'fa-clock',
                'title'   => 'Application Under Review',
                'message' => $pendingApps->count() . ' application(s) pending review. We\'ll notify you once a decision is made.',
                'action'  => route('parent.children'),
                'action_label' => 'View Applications',
            ]);
        }

        $announcements = MockData::announcements();
        $upcomingEvents = MockData::events();

        return view('parent.dashboard', [
            'parent'         => $user,
            'children'       => $children,
            'attentionItems' => $attentionItems,
            'announcements'  => $announcements,
            'upcomingEvents' => $upcomingEvents,
            'accountSummary' => $feeSummary,
            'albums'         => [],
        ]);
    }

    // ─── My Children ───────────────────────────────────────────────────────

    public function children()
    {
        $apps = $this->parentApplications();
        $children = $this->childrenFromApps($apps);

        return view('parent.children', ['children' => $children]);
    }

    public function childDetail($id)
    {
        $app = Application::where('parent_user_id', Auth::id())->findOrFail($id);
        $children = $this->childrenFromApps(collect([$app]));
        $child = $children->first();

        return view('parent.child-detail', [
            'child'      => $child,
            'attendance' => MockData::attendance(),
        ]);
    }

    // ─── Calendar ──────────────────────────────────────────────────────────

    public function calendar()
    {
        return view('parent.calendar', ['upcomingEvents' => MockData::events()]);
    }

    // ─── Newsletters ───────────────────────────────────────────────────────

    public function newsletters()
    {
        return view('parent.newsletters', [
            'newsletters' => [
                ['title' => 'March Newsletter', 'category' => 'Monthly', 'date' => 'Mar 15, 2026', 'excerpt' => 'Welcome to March! Here\'s what\'s happening this month at Peekaboo...', 'is_new' => true, 'content' => '<h4>March Madness!</h4><p>This month we\'re focusing on Easter themes and autumn activities.</p>'],
                ['title' => 'Important Updates', 'category' => 'Announcement', 'date' => 'Mar 10, 2026', 'excerpt' => 'Important information about upcoming field trips and schedule changes...', 'is_new' => true, 'content' => '<h4>Field Trip Information</h4><p>Please return permission slips by Friday.</p>'],
                ['title' => 'February Highlights', 'category' => 'Monthly', 'date' => 'Feb 20, 2026', 'excerpt' => 'What a wonderful February we had!', 'is_new' => false, 'content' => '<h4>February Fun!</h4><p>Thank you for joining our Valentine\'s party.</p>'],
            ],
        ]);
    }

    // ─── Gallery ───────────────────────────────────────────────────────────

    public function gallery()
    {
        $children = $this->childrenFromApps();

        return view('parent.gallery', [
            'children' => $children,
            'albums'   => [
                ['title' => 'Easter Art Activity', 'date' => 'Today', 'photo_count' => 12, 'photos' => [
                    ['src' => 'assets/img/testimonial/testi-1-1.jpg', 'caption' => 'Painting fun'],
                    ['src' => 'assets/img/testimonial/testi-1-2.jpg', 'caption' => 'Artwork display'],
                    ['src' => 'assets/img/testimonial/testi-1-3.jpg', 'caption' => 'Group activity'],
                ]],
                ['title' => 'Outdoor Play', 'date' => 'Yesterday', 'photo_count' => 8, 'photos' => [
                    ['src' => 'assets/img/testimonial/testi-1-2.jpg'],
                    ['src' => 'assets/img/testimonial/testi-1-3.jpg'],
                    ['src' => 'assets/img/testimonial/testi-1-1.jpg'],
                ]],
            ],
        ]);
    }

    // ─── Fees ──────────────────────────────────────────────────────────────

    public function fees()
    {
        $apps = $this->parentApplications();
        return view('parent.fees', [
            'children' => $this->childrenFromApps($apps),
            'payments' => MockData::payments(),
        ]);
    }

    public function statements()
    {
        $apps = $this->parentApplications();
        return view('parent.statements', [
            'children'       => $this->childrenFromApps($apps),
            'accountSummary' => $this->feeSummary($apps),
            'paymentHistory' => [],
        ]);
    }

    public function uploadPop()
    {
        return redirect()->route('parent.fees')->with('success', 'Proof of payment uploaded successfully.');
    }

    // ─── Messages ──────────────────────────────────────────────────────────

    public function messages()
    {
        return view('parent.messages');
    }

    public function sendMessage()
    {
        return redirect()->route('parent.messages')->with('success', 'Message sent.');
    }

    // ─── Holiday Care ──────────────────────────────────────────────────────

    public function holidayCare()
    {
        return view('parent.holiday-care', ['children' => $this->childrenFromApps()]);
    }

    public function bookHolidayCare()
    {
        return redirect()->route('parent.holiday-care')->with('success', 'Holiday care booked successfully.');
    }

    // ─── Extra Murals ──────────────────────────────────────────────────────

    public function extraMurals()
    {
        return view('parent.extra-murals', [
            'children' => $this->childrenFromApps(),
            'services' => MockData::services(),
        ]);
    }

    public function signupExtraMurals()
    {
        return redirect()->route('parent.extra-murals')->with('success', 'Signed up successfully.');
    }

    // ─── Snack Box ─────────────────────────────────────────────────────────

    public function snackBox()
    {
        return view('parent.snack-box', ['children' => $this->childrenFromApps()]);
    }

    public function signupSnackBox()
    {
        return redirect()->route('parent.snack-box')->with('success', 'Snack box subscription updated.');
    }

    // ─── Profile ───────────────────────────────────────────────────────────

    public function profile()
    {
        $user = $this->parentUser();
        $apps = $this->parentApplications();
        $children = $this->childrenFromApps($apps);

        return view('parent.profile', [
            'parent'   => $user,
            'children' => $children,
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = $this->parentUser();

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:30',
        ]);

        $user->update($request->only('name', 'email', 'phone'));

        return redirect()->route('parent.profile')->with('success', 'Profile updated successfully.');
    }

    // ─── Document Vault ────────────────────────────────────────────────────

    public function documents()
    {
        $apps = $this->parentApplications();
        $children = $this->childrenFromApps($apps);

        $allDocuments = [];
        foreach ($apps as $app) {
            $docs = $app->documents ?? [];
            foreach ($docs as $type => $path) {
                if ($path) {
                    $allDocuments[] = [
                        'child_name'  => $app->child_name,
                        'app_id'      => $app->id,
                        'reference'   => $app->reference,
                        'type'        => $type,
                        'label'       => $this->documentLabel($type),
                        'path'        => $path,
                        'uploaded_at' => $app->updated_at->format('d M Y'),
                    ];
                }
            }
        }

        return view('parent.documents', [
            'children'  => $children,
            'documents' => $allDocuments,
        ]);
    }

    private function documentLabel(string $type): string
    {
        return match ($type) {
            'birth_certificate'   => 'Birth Certificate',
            'clinic_card'         => 'Clinic / Immunisation Card',
            'medical_certificate' => 'Medical Certificate',
            'id_document'         => 'Parent ID Document',
            'proof_of_residence'  => 'Proof of Residence',
            'school_report'       => 'Previous School Report',
            'transfer_letter'     => 'Transfer Letter',
            default               => ucfirst(str_replace('_', ' ', $type)),
        };
    }

    // ─── School Reports ────────────────────────────────────────────────────

    public function reports()
    {
        $apps = $this->parentApplications();
        $children = $this->childrenFromApps($apps);

        $reports = [];
        foreach ($children as $child) {
            if ($child['status'] === 'approved') {
                $reports[] = [
                    'child_name' => $child['name'],
                    'term'       => 'Term 1, 2026',
                    'date'       => '24 Mar 2026',
                    'teacher'    => $child['teacher'],
                    'program'    => $child['program'],
                    'comment'    => $child['name'] . ' is settling in well and making great progress across all learning areas.',
                    'areas'      => [
                        ['area' => 'Language & Communication', 'rating' => 'Good',      'color' => '#16a34a'],
                        ['area' => 'Numeracy & Maths',        'rating' => 'Excellent',  'color' => '#0077B6'],
                        ['area' => 'Social Skills',            'rating' => 'Good',      'color' => '#16a34a'],
                        ['area' => 'Physical Development',     'rating' => 'Good',      'color' => '#16a34a'],
                        ['area' => 'Creative Arts',            'rating' => 'Excellent',  'color' => '#0077B6'],
                    ],
                ];
            }
        }

        return view('parent.reports', ['children' => $children, 'reports' => $reports]);
    }

    // ─── Activities ────────────────────────────────────────────────────────

    public function activities()
    {
        $children = $this->childrenFromApps();

        $availableActivities = [
            ['id' => 1, 'name' => 'Swimming Lessons',    'day' => 'Tuesday',   'time' => '10:00 - 10:45', 'cost' => 350, 'icon' => 'fa-person-swimming', 'enrolled' => true],
            ['id' => 2, 'name' => 'Ballet / Movement',   'day' => 'Wednesday', 'time' => '11:00 - 11:30', 'cost' => 300, 'icon' => 'fa-music',           'enrolled' => false],
            ['id' => 3, 'name' => 'Soccer Skills',       'day' => 'Thursday',  'time' => '10:00 - 10:45', 'cost' => 250, 'icon' => 'fa-futbol',           'enrolled' => true],
            ['id' => 4, 'name' => 'Art & Craft Workshop', 'day' => 'Friday',   'time' => '09:30 - 10:15', 'cost' => 200, 'icon' => 'fa-palette',          'enrolled' => false],
            ['id' => 5, 'name' => 'Music & Rhythm',      'day' => 'Monday',    'time' => '11:00 - 11:30', 'cost' => 280, 'icon' => 'fa-guitar',           'enrolled' => false],
            ['id' => 6, 'name' => 'Gymnastics',          'day' => 'Wednesday', 'time' => '09:30 - 10:15', 'cost' => 320, 'icon' => 'fa-dumbbell',         'enrolled' => false],
        ];

        return view('parent.activities', ['children' => $children, 'activities' => $availableActivities]);
    }

    public function registerActivity(Request $request)
    {
        return redirect()->route('parent.activities')->with('success', 'Your child has been registered for the activity. We\'ll confirm shortly.');
    }

    // ─── Sleepover ─────────────────────────────────────────────────────────

    public function sleepover()
    {
        $children = $this->childrenFromApps();

        $sleepovers = [
            ['id' => 1, 'title' => 'Movie Night Sleepover', 'date' => now()->addWeeks(2)->format('d M Y'), 'day' => now()->addWeeks(2)->format('l'), 'time' => '17:00 Fri – 08:00 Sat', 'cost' => 350, 'spots_left' => 8,  'theme' => 'Under the Sea',      'description' => 'Kids will enjoy an ocean-themed movie night with popcorn, games, and fun!'],
            ['id' => 2, 'title' => 'Pyjama Party',          'date' => now()->addWeeks(5)->format('d M Y'), 'day' => now()->addWeeks(5)->format('l'), 'time' => '17:00 Fri – 08:00 Sat', 'cost' => 350, 'spots_left' => 12, 'theme' => 'Pyjama Fun',         'description' => 'Wear your favourite PJs! Games, stories, and midnight snacks included.'],
            ['id' => 3, 'title' => 'Camping Adventure',     'date' => now()->addWeeks(8)->format('d M Y'), 'day' => now()->addWeeks(8)->format('l'), 'time' => '17:00 Fri – 08:00 Sat', 'cost' => 400, 'spots_left' => 6,  'theme' => 'Outdoor Explorers',  'description' => 'Indoor camping with tents, flashlight stories, and marshmallow roasting!'],
        ];

        return view('parent.sleepover', ['children' => $children, 'sleepovers' => $sleepovers]);
    }

    public function applySleepover(Request $request)
    {
        $request->validate([
            'child_id'     => 'required',
            'sleepover_id' => 'required',
        ]);

        return redirect()->route('parent.sleepover')->with('success', 'Sleepover application submitted! We\'ll confirm your spot shortly.');
    }
}
