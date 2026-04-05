<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory, SoftDeletes;

    // ── Simplified 3-step pipeline + 2 terminal states ──────────────────
    const STATUSES = [
        'tour_scheduled',
        'tour_completed',
        'converted',
        'waitlist',
        'lost',
    ];

    const STATUS_LABELS = [
        'tour_scheduled' => 'Tour Scheduled',
        'tour_completed' => 'Tour Completed',
        'converted'      => 'Converted',
        'waitlist'       => 'Waitlist',
        'lost'           => 'Lost',
    ];

    const STATUS_COLORS = [
        'tour_scheduled' => ['bg' => '#e0f7fa', 'color' => '#0097a7'],
        'tour_completed' => ['bg' => '#f5f3ff', 'color' => '#7c3aed'],
        'converted'      => ['bg' => '#dcfce7', 'color' => '#16a34a'],
        'waitlist'       => ['bg' => '#f3f4f6', 'color' => '#6c757d'],
        'lost'           => ['bg' => '#fee2e2', 'color' => '#ef4444'],
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

    public function statusLabel(): string
    {
        return self::STATUS_LABELS[$this->status] ?? ucwords(str_replace('_', ' ', $this->status));
    }

    public function statusColor(): array
    {
        return self::STATUS_COLORS[$this->status] ?? ['bg' => '#f3f4f6', 'color' => '#6c757d'];
    }

    public function isOverdue(): bool
    {
        // A tour_scheduled lead is overdue if the tour date has passed
        return $this->status === 'tour_scheduled'
            && $this->tourDate()
            && $this->tourDate()->isPast();
    }

    /** The effective tour date (confirmed or preferred). */
    public function tourDate(): ?\Carbon\Carbon
    {
        return $this->tour_scheduled_at ?? $this->preferred_date;
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

    /** The logical next status in the pipeline. */
    public function nextStatus(): ?string
    {
        return match ($this->status) {
            'tour_scheduled' => 'tour_completed',
            'tour_completed' => 'converted',
            default          => null,
        };
    }

    /** The next-step action label for the admin. */
    public function nextActionLabel(): ?string
    {
        return match ($this->status) {
            'tour_scheduled' => 'Mark Tour Complete',
            'tour_completed' => 'Send Enrolment Invitation',
            default          => null,
        };
    }
}
