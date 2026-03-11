<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibraryItem extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'file_path',
        'external_url',
        'category',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
