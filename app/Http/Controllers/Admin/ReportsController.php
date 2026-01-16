<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Data\MockData;

class ReportsController extends Controller
{
    public function index()
    {
        return view('admin.reports.index', [
            'stats' => MockData::dashboardStats(),
        ]);
    }

    public function enrolment()
    {
        return view('admin.reports.enrolment', [
            'applications' => MockData::applications(),
            'children' => MockData::enrolledChildren(),
            'classes' => MockData::classes(),
        ]);
    }

    public function payments()
    {
        return view('admin.reports.payments', [
            'payments' => MockData::payments(),
            'children' => MockData::enrolledChildren(),
            'stats' => MockData::dashboardStats(),
        ]);
    }

    public function attendance()
    {
        return view('admin.reports.attendance', [
            'attendance' => MockData::attendance(),
            'classes' => MockData::classes(),
        ]);
    }
}
