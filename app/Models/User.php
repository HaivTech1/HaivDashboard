<?php

namespace App\Models;

use App\Traits\HasPoints;
use App\Traits\HasFollows;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Mpociot\Teamwork\Traits\UserHasTeams;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use UserHasTeams; 
    use HasPoints;
    use HasFollows;

    const TABLE = 'users';
    protected $table = self::TABLE;

    const ADMIN = 1;
    const MANAGER = 2;
    const WRITER = 3;
    const AGENT = 4;
    const DEFAULT = 5;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password', 'google_id', 'type', 'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'boolean'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'author_id');
    }

    public function pioneer(): HasOne
    {
        return $this->hasOne(Pioneer::class, 'author_id');
    }

    public function id(): string
    {
        return (string) $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function image(): ?string
    {
        return $this->profile_photo_path;
    }

    public function type(): int
    {
        return (int) $this->type;
    }

    public function isAdmin(): bool
    {
        return $this->type() === self::ADMIN;
    }

    public function isWriter(): bool
    {
        return $this->type() === self::WRITER;
    }

    public function isManager(): bool
    {
        return $this->type() === self::MANAGER;
    }

    public function isAgent(): bool
    {
        return $this->type() === self::AGENT;
    }

    public function isDefault(): bool
    {
        return $this->type() === self::DEFAULT;
    }


    public function getAvailableBadgeAttribute()
    {

        $verify = [
            '0' => 'Not Available',
            '1' => 'Available',
        ];

        return $verify[$this->status];
    }

    public function scopeLoad(Builder $query, $count = 5)
    {
        return $query->inRandomOrder()
            ->paginate($count);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        return $query->where(function($query) use ($term) {
            $query->where('name', 'like', $term);
        });
    }

    public function getUserTypeAttribute()
    {

        $state = [
            '1' => 'Administrator',
            '2' => 'Manager',
            '3' => 'Writer',
            '4' => 'Agent',
            '5' => 'Default',
        ];

        return $state[$this->type];
    }
}