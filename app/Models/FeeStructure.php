<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    protected $fillable = [
        'label', 'slug', 'description',
        'amount', 'is_addon', 'active', 'sort_order',
    ];

    protected $casts = [
        'is_addon' => 'boolean',
        'active'   => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public function getFormattedAmountAttribute(): string
    {
        return 'R ' . number_format($this->amount);
    }
}

