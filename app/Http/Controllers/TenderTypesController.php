<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TenderType;
use DB,Redirect,Validator;

class TenderTypesController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
   	}

   	public function create() {
   		return view('master_entries.tender_types.create');
   	}

   	public function store(Request $request) {
   		$rules = [
		    'name' => 'required|max:255',
	    ];
        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $message = '';
        
        if(TenderType::create($data)) {
            $message .= 'Tender Type added successfully !';
         }else{
           $message .= 'Unable to add Tender Type!';
         }

        return Redirect::route('tender_type.index')->with('message', $message);
    }

    public function index() {
    	$results = TenderType::paginate(20);
    	return view('master_entries.tender_types.list_all', compact('results'));
    }
}
