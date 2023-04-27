<?php

namespace App;
use App\Admin;
use View;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // protected $casts = [
    // 	'equipment_type' => 'array',
    // 	'equipment_name' => 'array',
    // 	'mfr' => 'array',
    // 	'tag' => 'array'
    // ];

    // protected $table = 'orders';

	public function stages(){
		return $this->hasMany('App\Stage','id');
	}

	protected $authRole;

	// public function __construct(){
	//     $this->authRole = Admin::all();
	//     View::share('auth', $this->authRole);
	// }
}
