<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessInfo extends Model
{
    protected $table = 'business_info';

    protected $fillable = [
        'name', 'phone', 'mobile', 'email',
        'address', 'hours', 'registration_fee',
    ];

    /**
     * Always returns the single row, creating it with defaults if missing.
     */
    public static function instance(): static
    {
        return static::firstOrCreate([], [
            'name'             => 'Peekaboo Daycare & Preschool',
            'phone'            => '021 557 4999',
            'mobile'           => '082 898 9967',
            'email'            => 'peekaboodaycare@telkomsa.net',
            'address'          => '139B Humewood Drive, Parklands, 7441, Cape Town',
            'hours'            => '06:00 - 18:00',
            'registration_fee' => 500,
        ]);
    }
}

