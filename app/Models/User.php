<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'role',
        'email',
        'password',
        'address',
        'verify_code',
        'last_seen_at',
    ];

    public function isOnline($thresholdMinutes = 1): bool
    {
        if (!$this->last_seen_at) {
            return false; // User has never been seen
        }

        $lastSeen = Carbon::parse($this->last_seen_at);
        $now = Carbon::now();

        return $lastSeen->diffInMinutes($now) <= $thresholdMinutes;
    }

    public function lastSeenMinutesAgo(): int
    {
        if (!$this->last_seen_at) {
            return 0; // User has never been seen
        }

        $lastSeen = Carbon::parse($this->last_seen_at);
        $now = Carbon::now();

        return $lastSeen->diffInMinutes($now);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
