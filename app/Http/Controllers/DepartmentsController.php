<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Department;

use Validator, Redirect;

class DepartmentsController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
   	}

   	public function create() {
   		return view('master_entries.departments.create');
   	}

   	public function store(Request $request) {
   		$rules = [
		    'name' => 'required|max:255',
	    ];
        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $message = '';
        
        if(Department::create($data)) {
            $message .= 'Department added successfully !';
         }else{
           $message .= 'Unable to add department!';
         }

        return Redirect::route('department.index')->with('message', $message);
    }

    public function index() {
    	$results = Department::paginate(20);
    	return view('master_entries.departments.list_all', compact('results'));
    }
}
