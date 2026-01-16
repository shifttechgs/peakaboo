<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Data\MockData;

class StaffController extends Controller
{
    public function index()
    {
        return view('admin.staff.index', [
            'staff' => MockData::staff(),
            'classes' => MockData::classes(),
        ]);
    }

    public function classes()
    {
        return view('admin.staff.classes', [
            'classes' => MockData::classes(),
            'children' => MockData::enrolledChildren(),
        ]);
    }

    public function show($id)
    {
        $staff = MockData::staff();
        $member = collect($staff)->firstWhere('id', $id) ?? $staff[0];

        return view('admin.staff.show', [
            'staff' => $member,
        ]);
    }
}
