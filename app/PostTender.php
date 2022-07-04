<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTender extends Model
{
    protected $fillable = array('name','department_id', 'upload_date', 'monthyear', 'tender');
	protected $table    = 'post_tenders';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 			=>  'required|min:3',
    	'department_id' =>  'required|exists:departments,id',
        'upload_date'  	=>  'required|date',
        'monthyear'     =>  'required|date',
        'tender'  		=>  'required|mimes:jpg,jpeg,png,bmp,wbmp,pdf,doc,docx,zip|max:2048'
      ];

    public function department()
	{
	  return $this->belongsTo('App\Department', 'department_id');
	}
}
