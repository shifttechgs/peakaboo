<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@peekaboo.co.za')],
            [
                'name'     => 'Peekaboo Admin',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'changeme123!')),
            ]
        );

        $admin->assignRole('admin');
    }
}
