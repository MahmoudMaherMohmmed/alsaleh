<?php

namespace App\Models;

use App\Enums\CustomerStatusEnum;
use App\Http\Filters\CustomerFilter;
use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Customer extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use Filterable;
    use SoftDeletes;

    protected $fillable = [
        'salesman_id',
        'reference_id',
        'name',
        'phone',
        'phone_2',
        'area_id',
        'address',
        'lat',
        'lng',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => CustomerStatusEnum::class,
    ];

    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = CustomerFilter::class;

    public const MEDIA_VOICE_ADDRESS_NAME = 'customer_address';

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MEDIA_VOICE_ADDRESS_NAME);
    }

    public function getVoiceAddress()
    {
        return $this->getFirstMediaUrl(self::MEDIA_VOICE_ADDRESS_NAME);
    }

    /**
     * @return BelongsTo
     */
    public function salesman(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'salesman_id')->withTrashed();
    }

    /**
     * @return BelongsTo
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class)->withTrashed();
    }

    public function scopeActive($query)
    {
        return $query->where('status', CustomerStatusEnum::ACTIVE);
    }
}
