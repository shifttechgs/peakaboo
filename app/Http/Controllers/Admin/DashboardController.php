<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Data\MockData;
use App\Models\Application;
use App\Models\Lead;

class DashboardController extends Controller
{
    public function index()
    {
        // ── Leads pipeline KPI strip ────────────────────────────────────
        $pipeline = [];
        foreach (Lead::STATUSES as $status) {
            $pipeline[$status] = Lead::where('status', $status)->count();
        }
        $pipeline['total']   = Lead::count();
        $pipeline['overdue'] = Lead::whereIn('status', ['new', 'contacted'])
            ->where('created_at', '<', now()->subDays(3))
            ->count();

        // ── 1. TOUR CALENDAR ───────────────────────────────────────────
        // Fetch ALL tour_scheduled leads — past ones may not have been
        // marked complete yet and must still appear on the calendar.
        $allTours = Lead::where('status', 'tour_scheduled')
            ->orderByRaw('COALESCE(DATE(tour_scheduled_at), preferred_date) ASC')
            ->orderByRaw('COALESCE(TIME(tour_scheduled_at), preferred_time) ASC')
            ->get();

        // Build a date-keyed collection
        $toursByDate = $allTours->groupBy(function ($l) {
            return $l->tour_scheduled_at
                ? $l->tour_scheduled_at->format('Y-m-d')
                : $l->preferred_date->format('Y-m-d');
        });

        // Always show 7 days from today; also prepend any past dates that
        // still have unactioned tours so nothing is silently hidden.
        $futureDates = collect();
        for ($i = 0; $i < 7; $i++) {
            $futureDates->push(today()->addDays($i)->format('Y-m-d'));
        }

        $pastDates = $toursByDate->keys()->filter(
            fn($d) => $d < today()->format('Y-m-d')
        )->sort();

        $allDates = $pastDates->merge($futureDates)->unique()->sort();

        $weekDays = [];
        foreach ($allDates as $dateStr) {
            $date = \Carbon\Carbon::parse($dateStr);
            $weekDays[$dateStr] = [
                'date'  => $date,
                'leads' => $toursByDate[$dateStr] ?? collect(),
                'past'  => $date->isBefore(today()),
            ];
        }

        // ── 3. APPLICATIONS NEEDING ACTION ─────────────────────────────
        $actionableApps = Application::whereIn('status', ['pending', 'under_review'])
            ->latest()
            ->limit(8)
            ->get();

        $enrolmentStats = [
            'pending'      => Application::where('status', 'pending')->count(),
            'under_review' => Application::where('status', 'under_review')->count(),
            'approved'     => Application::where('status', 'approved')->count(),
            'waitlist'     => Application::where('status', 'waitlist')->count(),
            'rejected'     => Application::where('status', 'rejected')->count(),
        ];

        // ── Supporting: class capacity ──────────────────────────────────
        $classes = MockData::classes();

        return view('admin.dashboard', compact(
            'pipeline',
            'weekDays',
            'actionableApps',
            'enrolmentStats',
            'classes'
        ));
    }
}
