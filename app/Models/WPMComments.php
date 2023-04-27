<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WPMComments extends Model
{
    use HasFactory;
    protected $table = 'wpm_comments';
    public function wpm_comment(){
		return $this->hasMany('App\Models\WPM','wpm_id');
	}
}
