<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = [
        'news_category_id',
        'author_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'gallery',
        'video_url',
        'is_featured',
        'published_at',
    ];

    protected $casts = [
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getFeaturedImageUrlAttribute(): ?string
    {
        if (! $this->featured_image) {
            return null;
        }

        if (Str::startsWith($this->featured_image, ['http://', 'https://'])) {
            $path = parse_url($this->featured_image, PHP_URL_PATH);

            if (is_string($path) && preg_match('#/storage/(.+)$#', $path, $m)) {
                return asset('storage/'.$m[1]);
            }

            return $this->featured_image;
        }

        return asset('storage/'.$this->featured_image);
    }
}
