<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        'parent_user_id', 'child_user_id', 'child_id',
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

    public function child(): BelongsTo
    {
        return $this->belongsTo(Child::class);
    }

    public function parentUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'parent_user_id');
    }

    public function childUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'child_user_id');
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

    /**
     * Create a child User record from the application data and assign the 'child' role.
     * Skips if a child user is already linked.
     */
    public function createChildUser(): ?User
    {
        // Already linked — don't duplicate
        if ($this->child_user_id) {
            return $this->childUser;
        }

        // Build a unique email for the child (children don't log in, but email is required on users table)
        $childEmail = 'child_' . Str::slug($this->child_name, '.') . '_' . $this->id . '@peekaboo.child';

        $child = User::create([
            'name'     => $this->child_name,
            'email'    => $childEmail,
            'password' => Hash::make(Str::random(32)), // unusable random password
            'phone'    => null,
        ]);

        $child->assignRole('child');

        $this->update(['child_user_id' => $child->id]);

        return $child;
    }
}
