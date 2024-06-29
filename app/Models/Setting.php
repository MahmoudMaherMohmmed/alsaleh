<?php

namespace App\Models;

use App\Http\Resources\SettingResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Setting extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'whatsapp_number',
        'calling_number',
        'info_email',
        'support_email',
        'salesman_profit_percentage',
        'salesman_assistant_profit_percentage',
        'maximum_period_salesman_can_delete_sale',
    ];

    public $translatable = ['title', 'description'];

    /**
     * @return SettingResource
     */
    public function getResource(): SettingResource
    {
        return new SettingResource($this->fresh());
    }

    public const MEDIA_COLLECTION_NAME = 'setting_image';
    public const MEDIA_COLLECTION_URL = 'dashboard/images/setting.png';

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
}
