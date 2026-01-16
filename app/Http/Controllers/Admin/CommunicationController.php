<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Data\MockData;

class CommunicationController extends Controller
{
    public function index()
    {
        return view('admin.communication.index', [
            'announcements' => MockData::announcements(),
            'automations' => MockData::automations(),
        ]);
    }

    public function email()
    {
        return view('admin.communication.email', [
            'children' => MockData::enrolledChildren(),
            'classes' => MockData::classes(),
        ]);
    }

    public function sendEmail()
    {
        return redirect()->route('admin.communication.email')->with('success', 'Email sent successfully');
    }

    public function whatsapp()
    {
        return view('admin.communication.whatsapp', [
            'children' => MockData::enrolledChildren(),
        ]);
    }

    public function announcements()
    {
        return view('admin.communication.announcements', [
            'announcements' => MockData::announcements(),
        ]);
    }

    public function createAnnouncement()
    {
        return redirect()->route('admin.communication.announcements')->with('success', 'Announcement created');
    }

    public function automations()
    {
        return view('admin.communication.automations', [
            'automations' => MockData::automations(),
        ]);
    }
}
