<?php

namespace App\Models;

use App\Enums\ExpenseCategoryStatusEnum;
use App\Enums\ExpenseCategoryTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ExpenseCategory extends Model
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'type',
        'status',
    ];

    public $translatable = ['title', 'description'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => ExpenseCategoryTypeEnum::class,
        'status' => ExpenseCategoryStatusEnum::class,
    ];

    public function scopeActive($query)
    {
        return $query->where('status', ExpenseCategoryStatusEnum::ACTIVE);
    }
}
