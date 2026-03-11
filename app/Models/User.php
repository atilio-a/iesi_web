<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (User $user) {
            if (! $user->role_id) {
                $role = Role::where('slug', 'graduate')->first();
                $user->role_id = $role?->id;
            }
        });
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function graduate(): HasOne
    {
        return $this->hasOne(Graduate::class);
    }

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'author_id');
    }

    public function stories(): HasMany
    {
        return $this->hasMany(Story::class, 'author_id');
    }
}
