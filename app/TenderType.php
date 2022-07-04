<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenderType extends Model
{
    protected $fillable = array('name');
	protected $table    = 'tender_types';
    protected $guarded  = ['_token'];
}
