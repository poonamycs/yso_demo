<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SETarget extends Model
{
    use HasFactory;

    protected $table = 'se_target';

    protected $casts = [
        'region' => 'array',
        'sengg' => 'array',
        'per' => 'array',
    ];
}
