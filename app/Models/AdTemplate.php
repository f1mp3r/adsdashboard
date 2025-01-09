<?php

namespace App\Models;

use App\Enums\AdTemplateStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdTemplate extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'canva_url',
        'ad_id',
    ];

    protected $casts = [
        'status' => AdTemplateStatus::class,
    ];

    public function ad(): BelongsTo
    {
        return $this->belongsTo(Ad::class);
    }

    /**
     * Create an AdTemplate from the given Ad.
     */
    public static function createFromAd(Ad $ad): self
    {
        return self::create([
            'title' => $ad->title,
            'description' => $ad->description,
            'status' => AdTemplateStatus::Draft,
            'canva_url' => $ad->url,
            'ad_id' => $ad->id,
        ]);
    }
}
