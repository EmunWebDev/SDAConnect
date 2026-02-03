<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function officers(): HasMany
    {
        return $this->hasMany(Officer::class);
    }
}
