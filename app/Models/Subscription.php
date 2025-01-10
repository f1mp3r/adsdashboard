<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start_period',
        'end_period',
    ];

    protected $casts = [
        'start_period' => 'datetime',
        'end_period' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive(Builder $builder, $active = true): Builder
    {
        return $active
            ? $builder->where(
                fn($query) => $query
                    ->whereNull('end_period')
                    ->orWhere('end_period', '>', now())
            )
            : $builder->where('end_period', '<=', now());
    }

    public function scopeActiveOn(Builder $builder, Carbon $date): Builder
    {
        return $builder->where(
            fn (Builder $query) => $query->where('start_period', '<=', $date)
                ->where(fn (Builder $subQuery) => $subQuery
                    ->whereNull('end_period')
                    ->orWhere('end_period', '>=', $date)
                )
        );
    }
}
