<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Admin permissions
        $adminPermissions = [
            'manage-users',
            'manage-admissions',
            'manage-payments',
            'manage-staff',
            'manage-reports',
            'manage-settings',
            'manage-communication',
            'manage-crm',
            'send-invitations',
        ];

        // Teacher permissions
        $teacherPermissions = [
            'view-students',
            'mark-attendance',
            'add-updates',
            'manage-gallery',
            'view-class',
        ];

        // Parent permissions
        $parentPermissions = [
            'view-children',
            'view-fees',
            'view-messages',
            'view-calendar',
            'view-gallery',
            'view-newsletter',
        ];

        // Child permissions
        $childPermissions = [
            'view-own-schedule',
            'view-own-gallery',
            'view-own-updates',
        ];

        // Create all permissions
        $allPermissions = array_merge($adminPermissions, $teacherPermissions, $parentPermissions, $childPermissions);
        foreach ($allPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles and assign permissions
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        // super_admin gets all permissions via Gate::before in a policy — no direct assignment needed

        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->syncPermissions($adminPermissions);

        $teacher = Role::firstOrCreate(['name' => 'teacher', 'guard_name' => 'web']);
        $teacher->syncPermissions($teacherPermissions);

        $parent = Role::firstOrCreate(['name' => 'parent', 'guard_name' => 'web']);
        $parent->syncPermissions($parentPermissions);

        $child = Role::firstOrCreate(['name' => 'child', 'guard_name' => 'web']);
        $child->syncPermissions($childPermissions);
    }
}
