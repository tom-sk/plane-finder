<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'startX',
        'startY',
        'endX',
        'endY',
        'speed',
        'code',
        'description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
