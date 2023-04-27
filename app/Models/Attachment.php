<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{	
	protected $table = 'attachments';
    protected $fillable = ['order_id','stage_id','attachments'];
}
