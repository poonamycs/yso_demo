<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Stage;

class OrderStages extends Model
{
	protected $table = 'order_stages';

    public function stages(){
    	return $this->hasMany('App\Stage','stage');
    }
    public function depts(){
        return $this->hasOne(Department::class,'id','department_id');
    }
}
