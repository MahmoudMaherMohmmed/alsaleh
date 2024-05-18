<?php

namespace App\Models;

use App\Enums\CarStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Car extends Model
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'chassis_number',
        'license_number',
        'status',
    ];

    public $translatable = ['title', 'description'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => CarStatusEnum::class,
    ];

    public function scopeActive($query)
    {
        return $query->where('status', CarStatusEnum::ACTIVE);
    }
}
