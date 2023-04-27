<?php

namespace App\Models;
use App\Models\Admin;
use App\Models\Role;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    public function admin(){
    	return $this->belongsTo(Admin::class);
    }

    public function role(){
    	return $this->belongsTo(Role::class);
    }
}
