<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Data\MockData;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index', [
            'business' => MockData::businessInfo(),
            'fees' => MockData::fees(),
        ]);
    }

    public function update()
    {
        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully');
    }

    public function auditLog()
    {
        return view('admin.settings.audit-log', [
            'logs' => MockData::auditLog(),
        ]);
    }

    public function backup()
    {
        return view('admin.settings.backup');
    }

    public function permissions()
    {
        return view('admin.settings.permissions', [
            'staff' => MockData::staff(),
        ]);
    }
}
