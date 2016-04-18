<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator, Redirect,DB, Session, Hashids, Auth;
use App\Appointment, App\Designation;

class AppointmentsController extends Controller
{
    public function store(Request $request) {

    	$validator = Validator::make($data = $request->all(), Appointment::$rules);
     
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
    	$guest_name 	= $request->name;
    	$base64_string 	= $request->photoImg;
    	$output_file 	= 'guest_img/'.date('Y-m-d').'_'.uniqid().'_'.strtolower(str_replace(' ', '-', $guest_name)).'.jpg';
    	$image_path 	= $this->base64_to_jpeg($base64_string, $output_file);
    	$data['guest_photo'] = $image_path;
        $data['booked_by']  = Auth::user()->id;
        $data['in_time']    = date('Y-m-d H:i:s', strtotime($request->date.' '.$request->in_time));
        $data['out_time']   = date('Y-m-d H:i:s', strtotime($request->date.' '.$request->out_time));
     
        Appointment::create($data);
        $message = '';
        $message = 'Appointment Successful';

        $last_appt_id = Appointment::orderBy('created_at', 'DESC')->first()->id;
        return Redirect::route('appointment.view', $last_appt_id); 
        //return Redirect::route('appointment.create')->with('message', $message); 
    }

    private function base64_to_jpeg($base64_string, $output_file) {
	    $ifp = fopen($output_file, "wb"); 

	    $data = explode(',', $base64_string);

	    fwrite($ifp, base64_decode($data[1])); 
	    fclose($ifp); 

	    return $output_file; 
	}


    public function index(Request $request) {
        $where = [];

        $guest_name = '';
        if(trim($request->name) != '') {
            $guest_name = trim($request->name);
        }
        if($request->mobile != '') {
            $where['mobile'] = $request->mobile;
        }

        if($request->meet_persion != '') {
            $where['meet_persion'] = $request->meet_persion;
        }

        if($request->designation_id != '') {
            $where['designation_id'] = $request->designation_id;
        }

        $date_from = '1970-0-1 0:0:0'; $date_to = date('Y-m-d H:i:s');
        if($request->in_time) {
            $date_from = date('Y-m-d', strtotime($request->get('in_time')));
        }

        if($request->out_time) {
            $date_to = date('Y-m-d', strtotime($request->get('out_time')));
        }

        if($guest_name != '') {
           $appointments = Appointment::with('designation')->where('in_time' , '>=', $date_from)->where('out_time' , '<=', $date_to)->where('name', 'LIKE', $guest_name)->where($where)->orderBy('created_at', 'DESC')->paginate(20); 
        }else{
            $appointments = Appointment::with('designation')->where('in_time' , '>=', $date_from)->where('out_time' , '<=', $date_to)->where($where)->orderBy('created_at', 'DESC')->paginate(20); 
        }
        

        $designations    = [''=>'Any'] + Designation::orderBy('name')->lists('name', 'id')->toArray();
        
        return view('receptionists.appointments.list_all', compact('appointments', 'designations'));
    }

    public function view($id) {
        $result = Appointment::with('designation')->whereId($id)->first();
        $receptionist_name = Auth::user()->name;
        return view('receptionists.appointments.view', compact('result', 'receptionist_name'));
    }
}
