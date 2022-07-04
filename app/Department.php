<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = array('name');
	protected $table    = 'departments';
    protected $guarded  = ['_token'];
}
