<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_stage extends Model
{
    protected $fillable = [
        'sub_stage', 'equipment_name','stage','days'
    ];
}
