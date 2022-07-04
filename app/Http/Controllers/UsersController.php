<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User, App\Department, App\DepartmentUser;
use Validator, Redirect, DB;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
   	}

   	public function create() {
   		$departments 	= [''=>'Select Department'] + Department::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
   		return view('master_entries.users.create', compact('departments'));
   	}

   	public function store(Request $request) {
     		$rules = [
     			'department_id' => 'required|exists:departments,id',
     			'name' 		=> 'required|min:2|max:255',
  		    'username' 	=> 'required|min:2|max:255|unique:users,username,:id',
  		    'password' 	=> 'required|max:255',
  	    ];
        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $user = new User;

        $user->name 	= $request->get('name');
  	    $user->username = $request->get('username');
  	    $user->password = bcrypt( $request->get('password') );

        $message = '';
        
        if($user->save()) {
    			DB::table('department_users')->insert(
    			    ['user_id' => $user->id, 'department_id' => $request->get('department_id')]
    			);
               	$message .= 'Operator added successfully !';
    		}else{
    			$message .= 'Failed !';
    		}


        return Redirect::route('department.index')->with('message', $message);
    }

    public function index() {
    	$results = DepartmentUser::with('user', 'department')->paginate(20);
    	return view('master_entries.users.list_all', compact('results'));
    }
}
