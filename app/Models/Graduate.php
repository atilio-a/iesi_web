<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Graduate extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'community',
        'biography',
        'photo',
        'contact_info',
    ];

    protected $casts = [
        'contact_info' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function tourismServices(): HasMany
    {
        return $this->hasMany(TourismService::class);
    }
}
