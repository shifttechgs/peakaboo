<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_user_id', 'child_id', 'application_id',
        'amount', 'payment_date', 'reference', 'month_year',
        'pop_path', 'status', 'admin_note',
        'verified_by', 'verified_at',
    ];

    protected $casts = [
        'amount'       => 'decimal:2',
        'payment_date' => 'date',
        'verified_at'  => 'datetime',
    ];

    // ─── Relationships ──────────────────────────────────────────────────────

    public function parentUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'parent_user_id');
    }

    public function child(): BelongsTo
    {
        return $this->belongsTo(Child::class);
    }

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }

    public function verifiedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    // ─── Scopes ─────────────────────────────────────────────────────────────

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeVerified($query)
    {
        return $query->where('status', 'verified');
    }

    public function scopeForParent($query, int $userId)
    {
        return $query->where('parent_user_id', $userId);
    }

    // ─── Helpers ────────────────────────────────────────────────────────────

    public function popUrl(): string
    {
        return Storage::disk('public')->url($this->pop_path);
    }

    public function statusLabel(): string
    {
        return match ($this->status) {
            'verified' => 'Verified',
            'rejected' => 'Rejected',
            default    => 'Pending Review',
        };
    }

    public function statusColour(): string
    {
        return match ($this->status) {
            'verified' => '#16a34a',
            'rejected' => '#ef4444',
            default    => '#d97706',
        };
    }
}
