<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Validator, Redirect;

class ReceptionistsController extends Controller
{
    public function index() {
    	return $receptionists = User::get();
    }

    public function create() {
    	return view('admin.receptionists.create');
    }

    public function store(Request $request) {
    	$rules = [
    		'name' 			=> 'required|between:3,100',
    		'email' 		=> 'email|required|max:255|unique:users,email',
    		'password'		=> 'confirmed|required',
    	];

        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $message = '';
        
        $user = new User;

        $user->name 	= $request->get('name');
	    $user->email 	= $request->get('email');
	    $user->password = bcrypt( $request->get('password') );

       if($user->save()) {
           	$message .= 'Receptionist added successfully !';
		}else{
			$message .= 'Failed !';
		}

        return Redirect::route('receptionist.index')->with('message', $message);
    }
}
