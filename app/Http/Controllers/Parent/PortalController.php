<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Data\MockData;
use App\Models\Application;
use App\Models\Child;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            // Prefer data from the canonical Child record when available
            $childRecord = $app->child;

            return [
                // Identity
                'id'               => $app->id,
                'child_id'         => $childRecord?->id,
                'child_number'     => $childRecord?->child_number,          // PBK-SJS-0001
                'name'             => $app->child_name,
                'full_name'        => $app->child_name,
                'nickname'         => $app->child_nickname,
                'dob'              => $app->child_dob?->format('d M Y') ?? '—',
                'dob_raw'          => $app->child_dob,
                'age'              => $app->child_dob ? $app->child_dob->age . ' yrs' : '—',
                'age_years'        => $app->child_dob ? $app->child_dob->age : null,
                'gender'           => ucfirst($app->child_gender ?? '—'),
                'id_number'        => $app->child_id_number,
                'language'         => $app->child_language,

                // Enrolment
                'program'          => $app->program_name ?? '—',
                'program_slug'     => $app->program,
                'fee_option'       => $app->fee_option_name ?? $app->fee_option ?? '—',
                'snack_box'        => $app->snack_box,
                'reference'        => $app->reference,                      // APP-2026-001 (admin/CRM use)
                'status'           => $app->status,
                'status_label'     => $app->statusLabel(),
                'start_date'       => $app->start_date?->format('d M Y'),
                'enrolled_date'    => $app->approved_at?->format('d M Y') ?? $app->created_at->format('d M Y'),
                'applied_date'     => $app->created_at->format('d M Y'),

                // Parent contacts
                'mother_name'      => $app->mother_name,
                'mother_email'     => $app->mother_email,
                'mother_cell'      => $app->mother_cell,
                'father_name'      => $app->father_name,
                'father_email'     => $app->father_email,
                'father_cell'      => $app->father_cell,

                // Medical
                'allergies'        => $app->formValue('medical_allergies', null),
                'medical_notes'    => $app->formValue('medical_conditions', null),

                // Documents — prefer child record docs, fall back to application docs
                'documents'        => $childRecord?->documents ?? $app->documents ?? [],

                // Raw models
                'application'      => $app,
                'child_record'     => $childRecord,
            ];
        });
    }

    private function feeSummary($apps)
    {
        $totalMonthly = 0;
        $feeLines     = [];

        foreach ($apps as $app) {
            if ($app->status === 'approved') {
                $baseFee = match ($app->fee_option) {
                    'half-day', 'Half Day' => 3800,
                    default                => 4200,
                };

                // child_number is the bank EFT reference; fall back to APP ref for pending
                $payRef = $app->child?->child_number ?? $app->reference;

                // Programme fee line
                $feeLines[] = [
                    'child'        => $app->child_name,
                    'child_number' => $payRef,
                    'reference'    => $payRef,
                    'desc'         => ($app->fee_option_name ?? $app->fee_option) . ' — ' . ($app->program_name ?? $app->program),
                    'amount'       => $baseFee,
                ];

                // Snack box add-on line (only if enrolled)
                if ($app->snack_box) {
                    $feeLines[] = [
                        'child'        => $app->child_name,
                        'child_number' => $payRef,
                        'reference'    => $payRef,
                        'desc'         => 'Snack Box — ' . $app->child_name,
                        'amount'       => 400,
                    ];
                }

                $totalMonthly += $baseFee + ($app->snack_box ? 400 : 0);
            }
        }

        // ── Real payment data ──────────────────────────────────────────────
        $currentMonth = now()->format('Y-m');

        // Verified payments this month
        $verifiedThisMonth = Payment::forParent(Auth::id())
            ->verified()
            ->where('month_year', $currentMonth)
            ->sum('amount');

        // Balance = what's owed this month minus what's been verified
        $balance = max(0, $totalMonthly - $verifiedThisMonth);

        // Most recent verified payment (any month)
        $lastPayment = Payment::forParent(Auth::id())
            ->verified()
            ->latest('payment_date')
            ->first();

        // Pending POP count (parent can see their submission is in review)
        $pendingPop = Payment::forParent(Auth::id())
            ->pending()
            ->count();

        $nextDue = now()->copy()->startOfMonth()->addMonth();

        return [
            'monthly_fee'       => $totalMonthly,
            'fee_lines'         => $feeLines,
            'last_payment'      => $lastPayment ? (float) $lastPayment->amount : 0,
            'last_payment_date' => $lastPayment ? $lastPayment->payment_date->format('d M Y') : null,
            'balance'           => $balance,
            'pending_pop'       => $pendingPop,
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

        // Check for missing required documents — use child record when available (more up-to-date)
        foreach ($apps as $app) {
            $uploaded = array_merge($app->documents ?? [], $app->child?->documents ?? []);
            $missing  = [];
            foreach (self::REQUIRED_DOCS as $key => $label) {
                if (empty($uploaded[$key])) {
                    $missing[] = $label;
                }
            }
            if (!empty($missing)) {
                $attentionItems->push([
                    'type'         => 'danger',
                    'icon'         => 'fa-file-upload',
                    'title'        => 'Missing Documents — ' . $app->child_name,
                    'message'      => 'Please upload the following required document(s): ' . implode(', ', $missing) . '.',
                    'action'       => route('parent.documents'),
                    'action_label' => 'Upload Now',
                ]);
            }
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
        $apps     = $this->parentApplications();
        $children = $this->childrenFromApps($apps);

        // Build per-child fee breakdown from real application data
        $feeLines = $apps->map(function ($app) {
            $base = match ($app->fee_option) {
                'half-day', 'Half Day' => 3800,
                default                => 4200,
            };
            return [
                'name'        => $app->child_name,
                'program'     => $app->program_name ?? $app->program,
                'fee_option'  => $app->fee_option_name ?? $app->fee_option,
                'base_fee'    => $base,
                'snack_box'   => $app->snack_box,
                'snack_fee'   => $app->snack_box ? 400 : 0,
                'total'       => $base + ($app->snack_box ? 400 : 0),
                'status'      => $app->status,
            ];
        });

        return view('parent.fees', [
            'children'   => $children,
            'feeLines'   => $feeLines,
            'feeSummary' => $this->feeSummary($apps),
        ]);
    }

    public function statements()
    {
        $apps = $this->parentApplications();

        // Real payments for this parent — last 3 months, newest first
        $payments = Payment::forParent(Auth::id())
            ->whereIn('month_year', [
                now()->format('Y-m'),
                now()->subMonth()->format('Y-m'),
                now()->subMonths(2)->format('Y-m'),
            ])
            ->orderByDesc('payment_date')
            ->orderByDesc('created_at')
            ->get();

        return view('parent.statements', [
            'children'       => $this->childrenFromApps($apps),
            'accountSummary' => $this->feeSummary($apps),
            'payments'       => $payments,
        ]);
    }

    public function uploadPop(Request $request)
    {
        $request->validate([
            'amount'    => 'required|numeric|min:1',
            'date'      => 'required|date',
            'reference' => 'required|string|max:100',
            'pop_file'  => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $user = $this->parentUser();
        $path = $request->file('pop_file')->store(
            'proof-of-payments/' . $user->id,
            'public'
        );

        // Resolve the child/application for this parent
        $approvedApp = $this->parentApplications()
            ->where('status', 'approved')
            ->first();

        Payment::create([
            'parent_user_id' => $user->id,
            'child_id'       => $approvedApp?->child_id,
            'application_id' => $approvedApp?->id,
            'amount'         => $request->amount,
            'payment_date'   => $request->date,
            'reference'      => $request->reference,
            'month_year'     => \Carbon\Carbon::parse($request->date)->format('Y-m'),
            'pop_path'       => $path,
            'status'         => 'pending',
        ]);

        return redirect()->route('parent.fees.statements')
            ->with('success', 'Proof of payment submitted. We will verify and update your account within 1–2 business days.');
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

        // Password change flow
        if ($request->filled('current_password')) {
            $request->validate([
                'current_password'      => ['required', 'current_password'],
                'password'              => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $user->update(['password' => bcrypt($request->password)]);
            return redirect()->route('parent.profile')->with('success', 'Password updated successfully.');
        }

        // Profile details flow
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:30',
        ]);

        $user->update($request->only('name', 'email', 'phone'));

        return redirect()->route('parent.profile')->with('success', 'Profile updated successfully.');
    }

    // ─── Document Vault ────────────────────────────────────────────────────

    const REQUIRED_DOCS = [
        'birth_certificate' => 'Birth Certificate',
        'clinic_card'       => 'Clinic / Immunisation Card',
        'parent_ids'        => 'Parent ID Document',
        'proof_address'     => 'Proof of Address',
    ];

    public function documents()
    {
        $apps = $this->parentApplications();
        $children = $this->childrenFromApps($apps);

        // Build per-child document checklist
        $childDocs = [];
        foreach ($apps as $app) {
            // Prefer documents from the canonical child record; fall back to application
            $docSource = $app->child ?? $app;
            $uploaded  = $docSource->documents ?? [];
            $docs = [];
            foreach (self::REQUIRED_DOCS as $type => $label) {
                $path = $uploaded[$type] ?? null;
                $docs[] = [
                    'type'        => $type,
                    'label'       => $label,
                    'path'        => $path,
                    'uploaded'    => (bool) $path,
                    'uploaded_at' => $path ? $docSource->updated_at->format('d M Y') : null,
                    'ext'         => $path ? strtolower(pathinfo($path, PATHINFO_EXTENSION)) : null,
                ];
            }
            $childDocs[] = [
                'app_id'       => $app->id,
                'child_id'     => $app->child_id,
                'child_name'   => $app->child_name,
                'child_number' => $app->child?->child_number,
                'reference'    => $app->reference,
                'docs'         => $docs,
                'uploaded'     => collect($docs)->where('uploaded', true)->count(),
                'total'        => count($docs),
            ];
        }

        return view('parent.documents', [
            'children'  => $children,
            'childDocs' => $childDocs,
        ]);
    }

    public function uploadDocument(Request $request)
    {
        $request->validate([
            'app_id'   => 'required|integer',
            'doc_type' => 'required|string|in:' . implode(',', array_keys(self::REQUIRED_DOCS)),
            'file'     => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $app = Application::where('parent_user_id', Auth::id())
            ->findOrFail($request->app_id);

        $folder = $app->child?->child_number ?? $app->reference;
        $path = $request->file('file')->store(
            'enrolments/' . $folder,
            'public'
        );

        // Save to canonical child record when available; also keep on application
        if ($app->child) {
            $documents = $app->child->documents ?? [];
            $documents[$request->doc_type] = $path;
            $app->child->update(['documents' => $documents]);
        } else {
            $documents = $app->documents ?? [];
            $documents[$request->doc_type] = $path;
            $app->update(['documents' => $documents]);
        }

        return redirect()->route('parent.documents')
            ->with('success', self::REQUIRED_DOCS[$request->doc_type] . ' uploaded successfully.');
    }

    /**
     * Stream a document inline so it opens in the browser tab.
     * Works without the public/storage symlink on production.
     */
    public function viewDocument(Application $application, string $type)
    {
        // Ensure the parent owns this application
        if ($application->parent_user_id !== Auth::id()) {
            abort(403);
        }

        $allowed = array_keys(self::REQUIRED_DOCS);
        if (!in_array($type, $allowed)) {
            abort(404);
        }

        $childDocs = $application->child?->documents ?? [];
        $appDocs   = $application->documents ?? [];
        $path = $childDocs[$type] ?? $appDocs[$type] ?? null;

        if (!$path || !Storage::disk('public')->exists($path)) {
            return redirect()->back()->with('error', 'Document not found.');
        }

        $mime     = Storage::disk('public')->mimeType($path);
        $filename = basename($path);

        return response()->stream(
            fn () => fpassthru(Storage::disk('public')->readStream($path)),
            200,
            [
                'Content-Type'        => $mime,
                'Content-Disposition' => "inline; filename=\"{$filename}\"",
            ]
        );
    }

    /**
     * Stream the proof-of-payment file inline for the parent.
     */
    public function viewPop(Payment $payment)
    {
        if ($payment->parent_user_id !== Auth::id()) {
            abort(403);
        }

        if (!$payment->pop_path || !Storage::disk('public')->exists($payment->pop_path)) {
            abort(404, 'Proof of payment file not found.');
        }

        $mime     = Storage::disk('public')->mimeType($payment->pop_path);
        $filename = basename($payment->pop_path);

        return response()->stream(
            fn () => fpassthru(Storage::disk('public')->readStream($payment->pop_path)),
            200,
            [
                'Content-Type'        => $mime,
                'Content-Disposition' => "inline; filename=\"{$filename}\"",
            ]
        );
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
                    'teacher'    => 'TBA',
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
