<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * Automatically build full_name before saving so SQL Server NOT NULL won't fail.
     */
    protected static function booted(): void
    {
        static::saving(function (self $member) {
            $parts = array_filter([
                $member->first_name,
                $member->middle_name,
                $member->last_name,
                $member->suffix,
            ], fn ($v) => filled($v));

            $member->full_name = trim(preg_replace('/\s+/', ' ', implode(' ', $parts)));
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function officers(): HasMany
    {
        return $this->hasMany(Officer::class);
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }
}
