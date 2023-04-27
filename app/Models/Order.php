<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orderEquipments(){
		return $this->hasMany('App\Models\OrderEquipments','order_id');
	}

	public function paidpaymentcycles(){
		return $this->hasMany('App\Models\PaymentCashflow','order_id')->where('status','1');
	}

	public function AmendmentPayments(){
		return $this->hasMany('App\Models\PaymentCashflow','order_id')->where('payment_type','Amendment');
	}
}
