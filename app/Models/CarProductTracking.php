<?php

namespace App\Models;

use App\Enums\CarProductTrackingTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class CarProductTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'trackingable_id',
        'trackingable_type',
        'car_id',
        'product_id',
        'quantity',
        'type'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => CarProductTrackingTypeEnum::class,
    ];

    /**
     * @return MorphTo
     */
    public function trackingable(): MorphTo
    {
        return $this->morphTo()->withTrashed();
    }

    /**
     * @return BelongsTo
     */
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class)->withTrashed();
    }

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }
}
