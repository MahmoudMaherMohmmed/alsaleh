<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use App\Enums\ClientTypeEnum;
use App\Enums\ClientStatusEnum;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Client extends Authenticatable implements HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use InteractsWithMedia;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'type',
        'status',
        'activation_code',
        'device_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'type' => ClientTypeEnum::class,
        'status' => ClientStatusEnum::class,
    ];

    public const AVATAR_COLLECTION_NAME = 'client_avatar';
    public const AVATAR_COLLECTION_URL = 'dashboard/images/client.png';

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::AVATAR_COLLECTION_NAME)
            ->useFallbackUrl(asset(self::AVATAR_COLLECTION_URL))
            ->useFallbackPath(asset(self::AVATAR_COLLECTION_URL));
    }

    public function getAvatar()
    {
        return $this->getFirstMediaUrl(self::AVATAR_COLLECTION_NAME);
    }

    public function scopeActive($query)
    {
        return $query->where('status', ClientStatusEnum::ACTIVE);
    }
}
