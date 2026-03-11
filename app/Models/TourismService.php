<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TourismService extends Model
{
    protected $fillable = [
        'graduate_id',
        'name',
        'description',
        'region',
        'images',
        'contact_info',
        'is_featured',
    ];

    protected $casts = [
        'images' => 'array',
        'contact_info' => 'array',
        'is_featured' => 'boolean',
    ];

    public function graduate(): BelongsTo
    {
        return $this->belongsTo(Graduate::class);
    }
}
