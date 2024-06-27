<?php

namespace App\Models;

use App\Enums\ProductStatusEnum;
use App\Http\Filters\Filterable;
use App\Http\Filters\ProductFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;
    use Filterable;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'serial_number',
        'quantity',
        'cash_price',
        'salesman_profit',
        'status',
    ];

    public $translatable = ['title', 'description'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => ProductStatusEnum::class,
    ];

    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = ProductFilter::class;

    public const MEDIA_COLLECTION_NAME = 'product_avatar';
    public const MEDIA_COLLECTION_URL = 'dashboard/images/product.png';

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MEDIA_COLLECTION_NAME)
            ->useFallbackUrl(asset(self::MEDIA_COLLECTION_URL))
            ->useFallbackPath(asset(self::MEDIA_COLLECTION_URL));
    }

    public function getImage()
    {
        return $this->getFirstMediaUrl(self::MEDIA_COLLECTION_NAME);
    }

    /**
     * @return HasMany
     */
    public function installments(): HasMany
    {
        return $this->hasMany(ProductInstallment::class);
    }

    /**
     * @return BelongsToMany
     */
    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class)->withPivot('quantity');
    }

    public function scopeActive($query)
    {
        return $query->where('status', ProductStatusEnum::ACTIVE);
    }
}
