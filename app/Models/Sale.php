<?php

namespace App\Models;

use App\Enums\SaleStatusEnum;
use App\Enums\SaleTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'product_id',
        'date',
        'type',
        'price',
        'car_id',
        'salesman_id',
        'salesman_profit_percentage',
        'salesman_profit',
        'salesman_assistant_id',
        'salesman_assistant_profit_percentage',
        'salesman_assistant_profit',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => SaleTypeEnum::class,
        'status' => SaleStatusEnum::class,
    ];

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class)->withTrashed();
    }

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class)->withTrashed();
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
    public function salesman(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'salesman_id')->withTrashed();
    }

    /**
     * @return BelongsTo
     */
    public function salesman_assistant(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'salesman_assistant_id')->withTrashed();
    }

    /**
     * @return HasMany
     */
    public function installments(): HasMany
    {
        return $this->hasMany(SaleInstallment::class);
    }

    public function scopeInstallment($query)
    {
        return $query->where('type', SaleTypeEnum::INSTALLMENT);
    }

    public function scopeCash($query)
    {
        return $query->where('type', SaleTypeEnum::CASH);
    }
}
