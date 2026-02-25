<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    const STATUSES = [
        'new',
        'contacted',
        'tour_scheduled',
        'tour_completed',
        'converted',
        'waitlist',
        'lost',
    ];

    protected $fillable = [
        'reference',
        'name',
        'email',
        'phone',
        'child_name',
        'child_nickname',
        'child_age',
        'preferred_date',
        'preferred_time',
        'message',
        'source',
        'status',
        'notes',
    ];

    protected $casts = [
        'preferred_date' => 'date',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function isOverdue(): bool
    {
        return in_array($this->status, ['new', 'contacted'])
            && $this->created_at->diffInDays(now()) > 3;
    }
}
