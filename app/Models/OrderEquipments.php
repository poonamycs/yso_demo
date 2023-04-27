<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderEquipments extends Model
{
    use HasFactory;

    public function stages(){
		return $this->hasMany('App\Models\OrderStages','equip_id');
	}
}
