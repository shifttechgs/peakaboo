<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Data\MockData;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'stats' => MockData::dashboardStats(),
            'applications' => array_slice(MockData::applications(), 0, 5),
            'payments' => array_slice(MockData::payments(), 0, 5),
            'leads' => array_slice(MockData::leads(), 0, 5),
            'attendance' => MockData::attendance(),
            'classes' => MockData::classes(),
            'announcements' => MockData::announcements(),
        ]);
    }
}
