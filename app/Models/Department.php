<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name'
    ];
    // public function stage_dept()
    // {
    //     return $this->belongsTo(Stage::class);
    // }
}
