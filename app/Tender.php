<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{

	protected $fillable = array('department_id','tender_number', 'name_of_the_work', 'bid_type', 'tender_class','tender_id', 'tender_type_id', 'cost_of_work', 'ernest_money_deposit', 'cost_of_tender', 'completion_period', 'validity_of_offer', 'issue_from', 'issue_to', 'receipt_of_offer', 'tender_opening_date', 'nit', 'tender', 'corrigendum', 'added_by');
	protected $table    = 'tenders';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'department_id' 		=>  'required|exists:departments,id',
    	'tender_id'     		=>  'required|unique:tenders,tender_id',
    	'tender_number' 		=>  'required',
        'name_of_the_work' 		=>  'required',
        'bid_type' => 'required|in:SingleStage,TwoStage',
        'tender_class' => 'required|in:OpenTender,LimitedTender,SingleTender',
        'tender_type_id'  	    =>  'required|exists:tender_types,id',
        'cost_of_work'  		=>  'required|numeric|min:0',
        'ernest_money_deposit'  =>  'required|numeric|min:0',
        'cost_of_tender'  		=>  'required|numeric|min:0',
        'completion_period'  	=>  'required|numeric',
        'validity_of_offer'  	=>  'required|numeric',
        'issue_from'  			=>  'required|date',
        'issue_to'  			=>  'required|date',
        'receipt_of_offer'  	=>  'required|date',
        'tender_opening_date'  	=>  'required|date',
        'nit'  					=>  'required|mimes:jpg,jpeg,png,bmp,wbmp,pdf,doc,docx,zip|max:2048',
        'tender'   				=>  'required|mimes:jpg,jpeg,png,bmp,wbmp,pdf,doc,docx,zip|max:2048',
        'corrigendum'           =>  'mimes:jpg,jpeg,png,bmp,wbmp,pdf,doc,docx,zip|max:2048'
      ];

    public function user()
    {
      return $this->belongsTo('App\User', 'added_by');
    }

    public function department()
    {
      return $this->belongsTo('App\Department', 'department_id');
    }

    public function tender_type()
    {
      return $this->belongsTo('App\TenderType', 'tender_type_id');
    }
}
