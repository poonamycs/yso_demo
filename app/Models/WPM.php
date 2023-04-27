<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WPM extends Model
{
    use HasFactory;
	protected $table = 'wpms';
    public function wpmEquipments(){
		return $this->hasMany('App\Models\OrderEquipments','order_id');
	}
    public function wpm_order(){
        return $this->hasOne(Order::class,'so','order_so');
    }
    public function wpm_equipment(){
        return $this->hasOne(Equipment::class,'id','equipment');
    }
    public function wpm_user(){
        return $this->hasOne(Admin::class,'id','action_user');
    }
}
