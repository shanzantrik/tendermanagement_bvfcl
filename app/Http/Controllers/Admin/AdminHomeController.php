<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Admin;

class AdminHomeController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
   	}
	
	public function index(){
		return view('admin.home');
    }
}
