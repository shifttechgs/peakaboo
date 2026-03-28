<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Lead;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
    {
        $totalParents  = User::whereHas('roles', fn($q) => $q->where('name', 'parent'))->count();
        $totalChildren = User::whereHas('roles', fn($q) => $q->where('name', 'child'))->count();
        $totalUsers    = User::count();

        // Applications breakdown
        $appStats = Application::selectRaw("
            COUNT(*) as total,
            SUM(CASE WHEN status = 'pending'      THEN 1 ELSE 0 END) as pending,
            SUM(CASE WHEN status = 'under_review' THEN 1 ELSE 0 END) as under_review,
            SUM(CASE WHEN status = 'approved'     THEN 1 ELSE 0 END) as approved,
            SUM(CASE WHEN status = 'waitlist'     THEN 1 ELSE 0 END) as waitlist,
            SUM(CASE WHEN status = 'rejected'     THEN 1 ELSE 0 END) as rejected
        ")->first();

        // Monthly application trend (last 6 months)
        $trend = Application::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as total")
            ->where('created_at', '>=', now()->subMonths(6)->startOfMonth())
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Programme breakdown
        $byProgram = Application::selectRaw('program_name, COUNT(*) as total')
            ->whereNotNull('program_name')
            ->groupBy('program_name')
            ->orderByDesc('total')
            ->pluck('total', 'program_name')
            ->toArray();

        // Lead stats
        $leadStats = Lead::selectRaw("
            COUNT(*) as total,
            SUM(CASE WHEN status = 'new'       THEN 1 ELSE 0 END) as new,
            SUM(CASE WHEN status = 'converted' THEN 1 ELSE 0 END) as converted
        ")->first();

        $conversionRate = $leadStats->total > 0
            ? round(($leadStats->converted / $leadStats->total) * 100)
            : 0;

        // New this month vs last month
        $appsThisMonth = Application::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)->count();
        $appsLastMonth = Application::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)->count();

        $stats = [
            'total_parents'    => $totalParents,
            'total_children'   => $totalChildren,
            'total_users'      => $totalUsers,
            'apps_total'       => $appStats->total ?? 0,
            'apps_pending'     => $appStats->pending ?? 0,
            'apps_approved'    => $appStats->approved ?? 0,
            'apps_waitlist'    => $appStats->waitlist ?? 0,
            'apps_rejected'    => $appStats->rejected ?? 0,
            'apps_actionable'  => ($appStats->pending ?? 0) + ($appStats->under_review ?? 0),
            'apps_this_month'  => $appsThisMonth,
            'apps_last_month'  => $appsLastMonth,
            'leads_total'      => $leadStats->total ?? 0,
            'leads_new'        => $leadStats->new ?? 0,
            'leads_converted'  => $leadStats->converted ?? 0,
            'conversion_rate'  => $conversionRate,
            'by_program'       => $byProgram,
            'trend'            => $trend,
        ];

        return view('admin.reports.index', compact('stats'));
    }

    public function enrolment()
    {
        // Status breakdown
        $statusCounts = Application::selectRaw("
            SUM(CASE WHEN status = 'pending'      THEN 1 ELSE 0 END) as pending,
            SUM(CASE WHEN status = 'under_review' THEN 1 ELSE 0 END) as under_review,
            SUM(CASE WHEN status = 'approved'     THEN 1 ELSE 0 END) as approved,
            SUM(CASE WHEN status = 'waitlist'     THEN 1 ELSE 0 END) as waitlist,
            SUM(CASE WHEN status = 'rejected'     THEN 1 ELSE 0 END) as rejected,
            COUNT(*) as total
        ")->first();

        // Monthly trend — last 12 months
        $months = collect();
        for ($i = 11; $i >= 0; $i--) {
            $months->push(now()->subMonths($i)->format('Y-m'));
        }
        $rawTrend = Application::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as total")
            ->where('created_at', '>=', now()->subMonths(11)->startOfMonth())
            ->groupBy('month')
            ->pluck('total', 'month');
        $trend = $months->mapWithKeys(fn($m) => [$m => (int)($rawTrend[$m] ?? 0)]);

        // Programme breakdown
        $byProgram = Application::selectRaw('program_name, COUNT(*) as total')
            ->whereNotNull('program_name')
            ->groupBy('program_name')
            ->orderByDesc('total')
            ->pluck('total', 'program_name');

        // Source breakdown (from linked leads)
        $bySource = Application::join('leads', 'applications.lead_id', '=', 'leads.id')
            ->selectRaw('leads.source, COUNT(*) as total')
            ->whereNotNull('leads.source')
            ->groupBy('leads.source')
            ->orderByDesc('total')
            ->pluck('total', 'source');

        // This month vs last month
        $thisMonth = Application::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
        $lastMonth = Application::whereMonth('created_at', now()->subMonth()->month)->whereYear('created_at', now()->subMonth()->year)->count();

        // Average days to approval
        $avgDaysToApproval = Application::whereNotNull('approved_at')
            ->selectRaw('AVG(DATEDIFF(approved_at, created_at)) as avg_days')
            ->value('avg_days');

        // Recent applications
        $recentApps = Application::with('lead')->latest()->paginate(10);

        return view('admin.reports.enrolment', compact(
            'statusCounts', 'trend', 'byProgram', 'bySource',
            'thisMonth', 'lastMonth', 'avgDaysToApproval', 'recentApps'
        ));
    }

    public function payments()
    {
        $currentMonth = now()->format('Y-m');

        // Top-level stats
        $verifiedThisMonth  = Payment::verified()->where('month_year', $currentMonth)->sum('amount');
        $verifiedAllTime    = Payment::verified()->sum('amount');
        $pendingCount       = Payment::pending()->count();
        $rejectedCount      = Payment::where('status', 'rejected')->count();

        // Monthly fee expected (all approved applications)
        $approvedApps = Application::where('status', 'approved')->get();
        $monthlyExpected = $approvedApps->sum(function ($app) {
            $base = match ($app->fee_option) { 'half-day', 'Half Day' => 3800, default => 4200 };
            return $base + ($app->snack_box ? 400 : 0);
        });
        $outstandingThisMonth = max(0, $monthlyExpected - $verifiedThisMonth);

        // Monthly revenue trend — last 12 months
        $months = collect();
        for ($i = 11; $i >= 0; $i--) {
            $months->push(now()->subMonths($i)->format('Y-m'));
        }
        $rawRevenue = Payment::verified()
            ->selectRaw('month_year, SUM(amount) as total')
            ->where('month_year', '>=', now()->subMonths(11)->format('Y-m'))
            ->groupBy('month_year')
            ->pluck('total', 'month_year');
        $revenueTrend = $months->mapWithKeys(fn($m) => [$m => (float)($rawRevenue[$m] ?? 0)]);

        // Outstanding parents this month (approved, no verified payment)
        $verifiedParentIds = Payment::verified()->where('month_year', $currentMonth)->pluck('parent_user_id');
        $outstandingParents = Application::with('parentUser')
            ->where('status', 'approved')
            ->whereNotNull('parent_user_id')
            ->whereNotIn('parent_user_id', $verifiedParentIds)
            ->get()
            ->unique('parent_user_id');

        // Recent verified payments
        $recentPayments = Payment::with(['parentUser', 'application'])
            ->verified()
            ->latest('payment_date')
            ->paginate(15);

        return view('admin.reports.payments', compact(
            'verifiedThisMonth', 'verifiedAllTime', 'pendingCount', 'rejectedCount',
            'monthlyExpected', 'outstandingThisMonth', 'revenueTrend',
            'outstandingParents', 'recentPayments', 'currentMonth'
        ));
    }

    public function attendance()
    {
        return view('admin.reports.attendance');
    }
}
