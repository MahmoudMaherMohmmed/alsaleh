<?php

namespace App\Models;

use App\Enums\SaleInstallmentStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class SaleInstallment extends Model
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $fillable = [
        'sale_id',
        'title',
        'value',
        'due_date',
        'status',
    ];

    public $translatable = ['title'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => SaleInstallmentStatusEnum::class,
    ];

    /**
     * @return BelongsTo
     */
    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class)->withTrashed();
    }

    public function scopePaid($query)
    {
        return $query->where('status', SaleInstallmentStatusEnum::PAID);
    }

    public function scopeUnpaid($query)
    {
        return $query->where('status', SaleInstallmentStatusEnum::UNPAID);
    }
}
