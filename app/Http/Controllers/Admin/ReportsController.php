<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Lead;
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
        return view('admin.reports.enrolment');
    }

    public function payments()
    {
        return view('admin.reports.payments');
    }

    public function attendance()
    {
        return view('admin.reports.attendance');
    }
}
