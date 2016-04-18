<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Scheme;

class SchemesController extends Controller
{
  	private $route    = 'schemes.';
  	private $view 	  = 'schemes.';

  	public function __construct(Scheme $scheme) {
    	$this->scheme = $scheme;
    }

    public function index() {
        $schemes = $this->department->whereStatus(1)->paginate(20);
        return view($this->view.'index', compact('schemes'));
    }

    public function create() {
    	return view($this->view.'create');
    }
}
