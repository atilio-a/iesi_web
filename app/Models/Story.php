<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Story extends Model
{
    protected $fillable = [
        'author_id',
        'type',
        'title',
        'slug',
        'content',
        'featured_image',
        'gallery',
        'video_url',
        'audio_url',
        'is_featured',
        'published_at',
    ];

    protected $casts = [
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getFeaturedImageUrlAttribute(): ?string
    {
        if (! $this->featured_image) {
            return null;
        }

        if (Str::startsWith($this->featured_image, ['http://', 'https://'])) {
            return $this->featured_image;
        }

        return asset('storage/'.$this->featured_image);
    }
}
