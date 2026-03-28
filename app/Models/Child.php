<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_number',
        'name', 'nickname', 'dob', 'gender', 'id_number', 'language',
        'documents',
        'parent_user_id', 'child_user_id',
    ];

    protected $casts = [
        'dob'       => 'date',
        'documents' => 'array',
    ];

    // ─── Relationships ──────────────────────────────────────────────────────

    public function parentUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'parent_user_id');
    }

    public function childUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'child_user_id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function latestApplication()
    {
        return $this->applications()->latest()->first();
    }

    // ─── Child number generation ────────────────────────────────────────────

    /**
     * Generate a unique child number in the format PBK-{INITIALS}-{NNNN}.
     *
     * Examples:
     *   "Sarah Jane Smith"  → PBK-SJS-0001
     *   "Liam"              → PBK-L-0002
     *   "Mary-Jane Watson"  → PBK-MJW-0003
     */
    public static function generateChildNumber(string $childName): string
    {
        $initials = self::initials($childName);
        $next     = self::nextSequence($initials);

        return sprintf('PBK-%s-%04d', $initials, $next);
    }

    private static function initials(string $name): string
    {
        // Split on spaces and hyphens, take first letter of each part, uppercase
        $parts = preg_split('/[\s\-]+/', trim($name));
        $initials = '';
        foreach ($parts as $part) {
            if ($part !== '') {
                $initials .= strtoupper(mb_substr($part, 0, 1));
            }
        }
        return $initials ?: 'X';
    }

    private static function nextSequence(string $initials): int
    {
        // Count all child_numbers with this same initials segment to keep sequences
        // scoped per initials group, avoiding gaps from different initials
        $count = self::whereRaw("child_number LIKE ?", ["PBK-{$initials}-%"])->count();
        return $count + 1;
    }

    // ─── Helpers ────────────────────────────────────────────────────────────

    public function age(): string
    {
        return $this->dob ? $this->dob->age . ' yrs' : '—';
    }

    public function hasDocument(string $type): bool
    {
        return !empty(($this->documents ?? [])[$type]);
    }

    public function documentPath(string $type): ?string
    {
        return ($this->documents ?? [])[$type] ?? null;
    }
}
