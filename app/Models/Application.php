<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    const STATUSES = [
        'pending',
        'under_review',
        'approved',
        'waitlist',
        'rejected',
    ];

    const STATUS_LABELS = [
        'pending'      => 'Pending Review',
        'under_review' => 'Under Review',
        'approved'     => 'Approved',
        'waitlist'     => 'Waiting List',
        'rejected'     => 'Rejected',
    ];

    const PROGRAMS = [
        'baby-room' => 'Baby Room (0–1)',
        'toddlers'  => 'Toddlers (1–3)',
        'preschool' => 'Preschool (3–4)',
        'grade-r'   => 'Grade R (5–6)',
    ];

    protected $fillable = [
        'reference', 'status',
        'start_date', 'program', 'program_name', 'fee_option', 'fee_option_name', 'snack_box',
        'child_name', 'child_nickname', 'child_dob', 'child_gender', 'child_id_number', 'child_language',
        'mother_name', 'mother_email', 'mother_cell',
        'father_name', 'father_email', 'father_cell',
        'form_data', 'documents', 'pdf_path',
        'lead_id', 'admin_notes',
        'reviewed_at', 'approved_at', 'rejected_at', 'invited_at',
        'parent_user_id',
    ];

    protected $casts = [
        'start_date'   => 'date',
        'child_dob'    => 'date',
        'snack_box'    => 'boolean',
        'form_data'    => 'array',
        'documents'    => 'array',
        'reviewed_at'  => 'datetime',
        'approved_at'  => 'datetime',
        'rejected_at'  => 'datetime',
        'invited_at'   => 'datetime',
    ];

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    public function parentUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'parent_user_id');
    }

    public function statusLabel(): string
    {
        return self::STATUS_LABELS[$this->status] ?? ucfirst($this->status);
    }

    public function documentsCount(): int
    {
        return count($this->documents ?? []);
    }

    public function hasDocument(string $type): bool
    {
        return !empty(($this->documents ?? [])[$type]);
    }

    public function documentPath(string $type): ?string
    {
        return ($this->documents ?? [])[$type] ?? null;
    }

    public function daysWaiting(): int
    {
        return (int) $this->created_at->diffInDays(now());
    }

    public function isActionable(): bool
    {
        return in_array($this->status, ['pending', 'under_review']);
    }

    public function formValue(string $key, mixed $default = null): mixed
    {
        return ($this->form_data ?? [])[$key] ?? $default;
    }
}
