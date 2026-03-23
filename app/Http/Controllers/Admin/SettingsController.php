<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessInfo;
use App\Models\FeeStructure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class SettingsController extends Controller
{
    public function index()
    {
        $business = BusinessInfo::instance();
        $fees     = FeeStructure::ordered()->get();

        $sysInfo = [
            'laravel_version' => app()->version(),
            'php_version'     => PHP_VERSION,
            'db_driver'       => DB::connection()->getDriverName(),
            'env'             => config('app.env'),
            'timezone'        => config('app.timezone'),
            'now'             => now()->format('d M Y H:i'),
        ];

        return view('admin.settings.index', compact('business', 'fees', 'sysInfo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'section'                 => 'required|in:business,fees',
            'name'                    => 'nullable|string|max:255',
            'phone'                   => 'nullable|string|max:30',
            'mobile'                  => 'nullable|string|max:30',
            'email'                   => 'nullable|email|max:255',
            'address'                 => 'nullable|string|max:500',
            'hours'                   => 'nullable|string|max:100',
            'registration_fee'        => 'nullable|integer|min:0',
            'fees.*.amount'           => 'nullable|integer|min:0',
            'fees.*.description'      => 'nullable|string|max:255',
        ]);

        if ($request->section === 'business') {
            $business = BusinessInfo::instance();
            $business->update($request->only([
                'name', 'phone', 'mobile', 'email',
                'address', 'hours', 'registration_fee',
            ]));
            return redirect()->route('admin.settings.index')
                ->with('success', 'Business information saved successfully.');
        }

        if ($request->section === 'fees') {
            foreach ($request->input('fees', []) as $id => $data) {
                FeeStructure::where('id', $id)->update([
                    'amount'      => $data['amount']      ?? null,
                    'description' => $data['description'] ?? null,
                    'active'      => isset($data['active']) ? 1 : 0,
                ]);
            }
            return redirect()->route('admin.settings.index')
                ->with('success', 'Fee structure saved successfully.');
        }

        return redirect()->route('admin.settings.index');
    }

    public function auditLog()
    {
        $recentUsers = User::withTrashed()
            ->orderByDesc('updated_at')
            ->limit(50)
            ->get(['id', 'name', 'email', 'updated_at', 'deleted_at', 'created_at']);

        return view('admin.settings.audit-log', compact('recentUsers'));
    }

    public function backup()
    {
        return view('admin.settings.backup');
    }

    public function permissions()
    {
        $roles = Role::withCount('users')->orderBy('name')->get();
        $users = User::with('roles')->orderBy('name')->get();

        return view('admin.settings.permissions', compact('roles', 'users'));
    }
}
