<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Auth;
use App\Admin;

class Employee extends Controller
{
	public function __construct(){
        $this->middleware('admin');
   }
	
	public function index(){
		return view('admin.home');
    }
}