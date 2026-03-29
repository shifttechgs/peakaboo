<?php

namespace Database\Seeders;

use App\Models\BusinessInfo;
use App\Models\FeeStructure;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        // Business info — single row upsert
        BusinessInfo::updateOrCreate(['id' => 1], [
            'name'             => 'Peekaboo Daycare & Preschool',
            'phone'            => '021 557 4999',
            'mobile'           => '082 898 9967',
            'email'            => 'peekaboodaycare@telkomsa.net',
            'address'          => '139B Humewood Drive, Parklands, 7441, Cape Town',
            'hours'            => '06:00 - 18:00',
            'registration_fee' => 500,
        ]);

        // Fee structures
        $fees = [
            [
                'label'       => 'Half Day',
                'slug'        => 'half_day',
                'description' => '06:00 – 12:00 (Babies–3yrs) / 06:00 – 13:00 (4yrs–Gr.R)',
                'amount'      => 3800,
                'is_addon'    => false,
                'active'      => true,
                'sort_order'  => 1,
            ],
            [
                'label'       => 'Full Day',
                'slug'        => 'full_day',
                'description' => '06:00 – 18:00',
                'amount'      => 4200,
                'is_addon'    => false,
                'active'      => true,
                'sort_order'  => 2,
            ],
            [
                'label'       => 'Snack Box',
                'slug'        => 'snack_box',
                'description' => 'Monthly add-on',
                'amount'      => 400,
                'is_addon'    => true,
                'active'      => true,
                'sort_order'  => 3,
            ],
        ];

        foreach ($fees as $fee) {
            FeeStructure::updateOrCreate(['slug' => $fee['slug']], $fee);
        }
    }
}
