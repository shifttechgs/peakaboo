<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory, SoftDeletes;

    const STATUSES = [
        'new',
        'contacted',
        'tour_scheduled',
        'tour_completed',
        'converted',
        'waitlist',
        'lost',
    ];

    const SOURCES = [
        'google',
        'facebook',
        'instagram',
        'referral',
        'other',
    ];

    const LOST_REASONS = [
        'no_response' => 'No response after follow-up',
        'price'       => 'Price / fees too high',
        'distance'    => 'Location / distance',
        'competitor'  => 'Chose a competitor',
        'not_ready'   => 'Not ready to enrol',
        'full'        => 'No availability / full',
        'other'       => 'Other',
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
        'lost_reason',
        'assigned_to',
        'enrolment_token',
        'follow_up_date',
        'last_activity_at',
        'converted_at',
        'tour_scheduled_at',
    ];

    protected $casts = [
        'preferred_date'    => 'date',
        'follow_up_date'    => 'date',
        'last_activity_at'  => 'datetime',
        'converted_at'      => 'datetime',
        'tour_scheduled_at' => 'datetime',
    ];

    // ── Relationships ──────────────────────────────────────────────────────────

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function activities()
    {
        return $this->hasMany(LeadActivity::class);
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function application()
    {
        return $this->hasOne(Application::class);
    }

    // ── Computed helpers ───────────────────────────────────────────────────────

    public function isOverdue(): bool
    {
        return in_array($this->status, ['new', 'contacted'])
            && $this->created_at->diffInDays(now()) > 3;
    }

    /** True if a follow-up date is set and is today or in the past. */
    public function isFollowUpDue(): bool
    {
        return $this->follow_up_date && $this->follow_up_date->isPast();
    }

    /** Days from creation to conversion (null if not yet converted). */
    public function daysToConvert(): ?int
    {
        if (! $this->converted_at) {
            return null;
        }
        return (int) $this->created_at->diffInDays($this->converted_at);
    }

    /** Touch last_activity_at — called by CrmController on any interaction. */
    public function touchActivity(): void
    {
        $this->timestamps = false;
        $this->update(['last_activity_at' => now()]);
        $this->timestamps = true;
    }
}
