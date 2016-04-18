<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
	 protected $fillable =  ['name', 'mobile', 'purpose', 'meet_persion', 'designation_id', 'in_time', 'out_time', 'booked_by', 'guest_photo'];
    public static $rules = [
      'name'    		=>  'required|min:3|max:50',
      'mobile'   		=>  'required|digits:10|numeric',
      'purpose'      =>  'required',
      'meet_persion' 	=>  'required|min:3|max:50',
      'designation_id'  =>  'required|exists:designations,id',
      'in_time' 		=> 'required',
      'out_time' 		=> 'required',
  ];

  public function designation()
  {
    return $this->belongsTo('App\Designation', 'designation_id');
  }
}
