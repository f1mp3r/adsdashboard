<?php

namespace App\Models;

use App\Enums\AdStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url',
        'status',
    ];

    protected $casts = [
        'status' => AdStatus::class,
    ];

    public function templates(): HasMany
    {
        return $this->hasMany(AdTemplate::class);
    }

    public function setStatus(AdStatus $status): static
    {
        $this->status = $status;
        $this->save();

        return $this;
    }
}
