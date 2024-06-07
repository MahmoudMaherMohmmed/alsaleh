<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Cast variables to specified data types
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string'
    ];
}
