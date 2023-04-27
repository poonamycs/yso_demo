<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $fillable = [
        'stage_no', 'equipment_name','stage'
    ];
    
    public function attachments(){
    	return $this->hasMany(Attachment::class);
    }
    public function depts(){
        return $this->hasOne(Department::class,'id','department_id');
    }
}
