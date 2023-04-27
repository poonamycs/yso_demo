<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = 'enquiry';

    protected $casts = [
    	'enq_labels' => 'array'
    ];
    protected $fillable = [
        'qrn','so no','customer_name','city','region','enq_date','qte_date','engineer','description','price','status','contact_person','email','phone'
    ];
    public function assignee_enq(){
        return $this->hasOne(Admin::class,'id','assignee');
    }
}
