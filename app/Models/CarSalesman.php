<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarSalesman extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'car_id',
        'salesman_id',
        'salesman_assistant_id',
        'start_date',
        'end_date'
    ];

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
}
