<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesmanExpense extends Model
{
    use HasFactory;

    protected $fillable = [
        'salesman_id',
        'title',
        'description',
        'value'
    ];

    /**
     * @return BelongsTo
     */
    public function salesman(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'salesman_id')->withTrashed();
    }
}
