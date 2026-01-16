<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Data\MockData;

class PortalController extends Controller
{
    private function getCurrentTeacher()
    {
        $staff = MockData::staff();
        return $staff[1]; // Thandi Nkosi - Head Teacher
    }

    public function index()
    {
        return view('teacher.dashboard', [
            'teacher' => [
                'name' => 'Sarah van der Merwe',
                'first_name' => 'Sarah',
                'last_name' => 'van der Merwe',
                'email' => 'sarah.vdm@peekaboo.co.za',
                'phone' => '082 123 4567',
                'class' => 'Preschool',
            ],
            'stats' => [
                'present' => 14,
                'absent' => 2,
                'updates_sent' => 12,
                'birthdays' => 1,
            ],
        ]);
    }

    public function attendance()
    {
        return view('teacher.attendance', [
            'teacher' => [
                'class' => 'Preschool',
            ],
        ]);
    }

    public function markAttendance()
    {
        return redirect()->route('teacher.attendance')->with('success', 'Attendance recorded');
    }

    public function classView()
    {
        return view('teacher.class', [
            'teacher' => [
                'name' => 'Sarah van der Merwe',
                'class' => 'Preschool',
            ],
        ]);
    }

    public function students()
    {
        return view('teacher.students', [
            'children' => MockData::enrolledChildren(),
        ]);
    }

    public function studentDetail($id)
    {
        $children = MockData::enrolledChildren();
        $child = collect($children)->firstWhere('id', $id) ?? $children[0];

        return view('teacher.student-detail', [
            'child' => $child,
        ]);
    }

    public function updates()
    {
        return view('teacher.updates', [
            'classes' => MockData::classes(),
        ]);
    }

    public function createUpdate()
    {
        return redirect()->route('teacher.updates')->with('success', 'Update posted successfully');
    }

    public function gallery()
    {
        return view('teacher.gallery');
    }

    public function uploadPhoto()
    {
        return redirect()->route('teacher.gallery')->with('success', 'Photo uploaded successfully');
    }

    public function profile()
    {
        return view('teacher.profile', [
            'teacher' => [
                'name' => 'Sarah van der Merwe',
                'first_name' => 'Sarah',
                'last_name' => 'van der Merwe',
                'email' => 'sarah.vdm@peekaboo.co.za',
                'phone' => '082 123 4567',
                'class' => 'Preschool',
            ],
        ]);
    }
}
