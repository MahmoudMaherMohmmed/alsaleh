<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
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
        'status',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'status' => UserStatusEnum::class,
    ];

    public const MEDIA_COLLECTION_NAME = 'user_avatar';
    public const MEDIA_COLLECTION_URL = 'dashboard/images/user.png';

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MEDIA_COLLECTION_NAME)
            ->useFallbackUrl(asset(self::MEDIA_COLLECTION_URL))
            ->useFallbackPath(asset(self::MEDIA_COLLECTION_URL));
    }

    public function getAvatar()
    {
        return $this->getFirstMediaUrl(self::MEDIA_COLLECTION_NAME);
    }

    /**
     * @return HasMany
     */
    public function warehouse_trackings(): HasMany
    {
        return $this->hasMany(WarehouseTracking::class);
    }

    /**
     * @return MorphMany
     */
    public function car_product_trackings(): MorphMany
    {
        return $this->morphMany(CarProductTracking::class, 'trackingable');
    }

    public function scopeActive($query)
    {
        return $query->where('status', UserStatusEnum::ACTIVE);
    }
}
