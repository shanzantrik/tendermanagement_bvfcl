<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tender, App\Department, App\TenderType, App\DepartmentUser, App\PostTender;

use Validator, Redirect, Auth, DB, Crypt;

class TendersController extends Controller
{

    public function adminIndex() {
        $department_id = $tender_type_id = null;
        $departments        = [''=>'All Department'] + Department::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $tender_types       = [''=>'All Tender Type'] + TenderType::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $tenders    = Tender::whereStatus(1)->with('department', 'tender_type')->paginate(30);
        return view('admin.tenders.index', compact('tenders', 'departments', 'tender_types', 'department_id'));
    }


    public function index() {
        $user_id = Auth::user()->id;
        $department_id = DepartmentUser::where('user_id', $user_id)->first()->department_id;
        $tenders    = Tender::whereStatus(1)->where('department_id', $department_id)->with('department', 'tender_type')->paginate(30);
        return view('tenders.index', compact('tenders'));
    }

    
    public function adminCreate() {

        //get last tender id
        $max_tender_id = DB::table('tenders')->max('tender_id');
        $tender_id = $max_tender_id + 1;


        $tender_types    = [''=>'Select Tender Type'] + TenderType::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $departments    = [''=>'Select Department'] + Department::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        return view('admin.tenders.create', compact('departments', 'tender_types', 'tender_id'));
    }

    public function store(Request $request){
        $validator = Validator::make($data = $request->all(), Tender::$rules);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput()->with('message', 'Some fields has errors. Please correct it and then try again');
        $added_by = Auth::user()->id;
        $message = $this->storeTender($request, $added_by);
        
        return Redirect::route('tender.index')->with('message', $message);
    }

    public function admin_store(Request $request){
        $validator = Validator::make($data = $request->all(), Tender::$rules);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput()->with('message', 'Some fields has errors. Please correct it and then try again');
        $added_by = Auth::guard('admin')->user()->id;
        $message = $this->storeTender($request, $added_by);
        
        return Redirect::route('admin.tender.index')->with('message', $message);
    }

    private function storeTender($request = array(), $added_by) {

       $data = $request->all();
       
       if ($request->hasFile('nit')) {
            if ($request->file('nit')->isValid()){
                $nit_path = 'uploads/nit/'.date('Y-m-d');
                $destination_path = public_path( $nit_path );
                $fileName = $request->tender_id.'-'.time().'_nit.'.$request->file('nit')->getClientOriginalExtension();
                $request->file('nit')->move($destination_path, $fileName);
                $data['nit'] = $nit_path.'/'.$fileName;
            }
        }

        if ($request->hasFile('tender')) {
            if ($request->file('tender')->isValid()){
                $tender_path = 'uploads/tender/'.date('Y-m-d');
                $destination_path = public_path( $tender_path );
                $fileName = $request->tender_id.'-'.time().'_tender.'.$request->file('tender')->getClientOriginalExtension();
                $request->file('tender')->move($destination_path, $fileName);
                $data['tender'] = $tender_path.'/'.$fileName;
            }
        }

    
        $data['issue_from'] = date('Y-m-d H:i:s', strtotime($request->issue_from));
        $data['issue_to']   = date('Y-m-d H:i:s', strtotime($request->issue_to));
        $data['receipt_of_offer']       = date('Y-m-d H:i:s', strtotime($request->receipt_of_offer));
        $data['tender_opening_date']    = date('Y-m-d H:i:s', strtotime($request->tender_opening_date));
        $data['added_by'] = $added_by;
        $data['bid_type'] = $request->bid_type;
        $data['tender_class'] = $request->tender_class;
        $message = '';
        if(Tender::create($data)) {
            $message .= 'Tender created successfully !';
        }else{
            $message .= 'Unable to add tender!';
        } 

        return $message;
    }

    public function search_tender() {
        $department_id = $tender_type_id = null;
        $departments    = [''=>'All Department'] + Department::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $tender_types    = [''=>'All Tender Type'] + TenderType::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $yesterday = date('Y-m-d', strtotime(' -1 day'));
        $results = Tender::with('department', 'tender_type')->where('tender_opening_date', '>', $yesterday)->orderBy('tender_opening_date', 'DESC')->paginate(20);

        return view('tenders.search_tender', compact('tender_types', 'departments', 'department_id', 'tender_type_id', 'results'));
    }

    public function tender_search_result(Request $request) {
        
        $departments    = [''=>'All Department'] + Department::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $tender_types    = [''=>'All Tender Type'] + TenderType::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $department_id = $tender_type_id = NULL;

        $yesterday = date('Y-m-d', strtotime(' -1 day'));
        $matchThese = [];
        if($request->department_id != '') {
            $matchThese['department_id'] = $department_id = $request->department_id;
        }
        if($request->tender_type_id != '') {
            $matchThese['tender_type_id'] = $tender_type_id = $request->tender_type_id;
        }

        $results = Tender::where($matchThese)->where('tender_opening_date', '>', $yesterday)->with('department', 'tender_type')->orderBy('tender_opening_date', 'DESC')->paginate(20);
        return view('tenders.tender_search_result', compact('tender_types', 'departments', 'results', 'department_id', 'tender_type_id'));
    }

    public function details($id = NULL) {
        $details = Tender::where('id', $id)->with('department', 'tender_type')->first();
        return view('tenders.details', compact('details'));
    }

    public function addCorrigendum() {
        $tenders    = [''=>'Select Tender ID'] + Tender::whereStatus(1)->orderBy('created_at', 'DESC')->lists('tender_id', 'id')->toArray();
        return view('tenders.add_corrigendum', compact('tenders'));
    }

    public function storeCorrigendum(Request $request) {
        if ($request->hasFile('corrigendum')) {
            $tender_id = $request->tender_id;
            $tender = Tender::findOrFail($tender_id);

            if ($request->file('corrigendum')->isValid()){
                $tender_path = 'uploads/corrigendum/'.date('Y-m-d');
                $destination_path = public_path( $tender_path );
                $fileName = $request->tender_id.'-'.time().'_corrigendum.'.$request->file('corrigendum')->getClientOriginalExtension();
                $request->file('corrigendum')->move($destination_path, $fileName);  
                $tender->corrigendum = $tender_path.'/'.$fileName;
                $tender->save();
                $message = 'Corrigendum uploaded successfully'; 
                return Redirect::route('corrigendum_tender.create')->with('message', $message);
            }
        }else{
            $message = 'No file selected'; 
            return Redirect::route('corrigendum_tender.create')->with('message', $message);
        }
    }

    public function addUserCorrigendum() {

        $user_id = Auth::user()->id;
        $department_id = DepartmentUser::where('user_id', $user_id)->first()->department_id;

        $tenders    = [''=>'Select Tender ID'] + Tender::whereStatus(1)->where('department_id', $department_id)->orderBy('created_at', 'DESC')->lists('tender_id', 'id')->toArray();
        return view('tenders.add_user_corrigendum', compact('tenders'));
    }


    public function storeUserCorrigendum(Request $request) {
        if ($request->hasFile('corrigendum')) {
            $tender_id = $request->tender_id;
            $tender = Tender::findOrFail($tender_id);

            if ($request->file('corrigendum')->isValid()){
                $tender_path = 'uploads/corrigendum/'.date('Y-m-d');
                $destination_path = public_path( $tender_path );
                $fileName = $request->tender_id.'-'.time().'_corrigendum.'.$request->file('corrigendum')->getClientOriginalExtension();
                $request->file('corrigendum')->move($destination_path, $fileName);  
                $tender->corrigendum = $tender_path.'/'.$fileName;
                $tender->save();
                $message = 'Corrigendum uploaded successfully'; 
                return Redirect::route('tender.index')->with('message', $message);
            }
        }else{
            $message = 'No file selected'; 
            return Redirect::route('corrigendum_tender.create')->with('message', $message);
        }
    }

    public function userEdit($id) {

        $user_id = Auth::user()->id;
        $department_id = DepartmentUser::where('user_id', $user_id)->first()->department_id;
        $tender_types    = [''=>'Select Tender Type'] + TenderType::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $departments    = [''=>'Select Department'] + Department::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $tender = Tender::findOrFail($id);

        $tender_id = null; 
        return view('tenders.user_edit', compact('tender_types', 'departments', 'tender', 'department_id', 'tender_id'));
    }

    public function userUpdate(Request $request, $id){
        /*$validator = Validator::make($data = $request->all(), Tender::$rules);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput()->with('message', 'Some fields has errors. Please correct it and then try again');*/


        $data = $request->all();
        $tender = Tender::findOrFail($id);
        if ($request->hasFile('nit')) {
            if ($request->file('nit')->isValid()){
                $nit_path = 'uploads/nit/'.date('Y-m-d');
                $destination_path = public_path( $nit_path );
                $fileName = $request->tender_id.'-'.time().'_nit.'.$request->file('nit')->getClientOriginalExtension();
                $request->file('nit')->move($destination_path, $fileName);
                $data['nit'] = $nit_path.'/'.$fileName;
            }
        }

        if ($request->hasFile('tender')) {
            if ($request->file('tender')->isValid()){
                $tender_path = 'uploads/tender/'.date('Y-m-d');
                $destination_path = public_path( $tender_path );
                $fileName = $request->tender_id.'-'.time().'_tender.'.$request->file('tender')->getClientOriginalExtension();
                $request->file('tender')->move($destination_path, $fileName);
                $data['tender'] = $tender_path.'/'.$fileName;
            }
        }

    
        $data['issue_from'] = date('Y-m-d H:i:s', strtotime($request->issue_from));
        $data['issue_to']   = date('Y-m-d H:i:s', strtotime($request->issue_to));
        $data['receipt_of_offer']       = date('Y-m-d H:i:s', strtotime($request->receipt_of_offer));
        $data['tender_opening_date']    = date('Y-m-d H:i:s', strtotime($request->tender_opening_date));
       // $data['added_by'] = $added_by;
        $message = '';
        $tender->fill($data);
        if($tender->save()) {
            $message .= 'Tender created successfully !';
        }else{
            $message .= 'Unable to add tender!';
        }
        
        return Redirect::route('tender.index')->with('message', $message);
    }

    public function adminEdit($id) {
        $tender_types    = [''=>'Select Tender Type'] + TenderType::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $departments    = [''=>'Select Department'] + Department::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $tender = Tender::findOrFail($id);
        $tender_id = null;

        return view('admin.tenders.admin_edit', compact('tender_types', 'departments', 'tender', 'tender_id'));
    }

    public function adminUpdate(Request $request, $id){
        /*$validator = Validator::make($data = $request->all(), Tender::$rules);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput()->with('message', 'Some fields has errors. Please correct it and then try again');*/


        $data = $request->all();
        $tender = Tender::findOrFail($id);
        if ($request->hasFile('nit')) {
            if ($request->file('nit')->isValid()){
                $nit_path = 'uploads/nit/'.date('Y-m-d');
                $destination_path = public_path( $nit_path );
                $fileName = $request->tender_id.'-'.time().'_nit.'.$request->file('nit')->getClientOriginalExtension();
                $request->file('nit')->move($destination_path, $fileName);
                $data['nit'] = $nit_path.'/'.$fileName;
            }
        }

        if ($request->hasFile('tender')) {
            if ($request->file('tender')->isValid()){
                $tender_path = 'uploads/tender/'.date('Y-m-d');
                $destination_path = public_path( $tender_path );
                $fileName = $request->tender_id.'-'.time().'_tender.'.$request->file('tender')->getClientOriginalExtension();
                $request->file('tender')->move($destination_path, $fileName);
                $data['tender'] = $tender_path.'/'.$fileName;
            }
        }

    
        $data['issue_from'] = date('Y-m-d H:i:s', strtotime($request->issue_from));
        $data['issue_to']   = date('Y-m-d H:i:s', strtotime($request->issue_to));
        $data['receipt_of_offer']       = date('Y-m-d H:i:s', strtotime($request->receipt_of_offer));
        $data['tender_opening_date']    = date('Y-m-d H:i:s', strtotime($request->tender_opening_date));
       // $data['added_by'] = $added_by;
        $message = '';
        $tender->fill($data);
        if($tender->save()) {
            $message .= 'Tender created successfully !';
        }else{
            $message .= 'Unable to add tender!';
        }
        
        return Redirect::route('admin.tender.index')->with('message', $message);
    }


    public function adminCreatePostTender() {
        $departments        = Department::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        return view('admin.tenders.post_tender_create', compact('departments'));
    }

    public function adminStorePostTender(Request $request) {
        $validator = Validator::make($data = $request->all(), PostTender::$rules);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput()->with('message', 'Some fields has errors. Please correct it and then try again');

        if ($request->hasFile('tender')) {
            if ($request->file('tender')->isValid()){
                $tender_path = 'uploads/post-tender/'.date('Y-m-d');
                $destination_path = public_path( $tender_path );
                $fileName = $request->name.'-'.time().'_tender.'.$request->file('tender')->getClientOriginalExtension();
                $request->file('tender')->move($destination_path, $fileName);
                $data['tender'] = $tender_path.'/'.$fileName;
            }
        }

    
        $data['upload_date']    = date('Y-m-d', strtotime($request->upload_date));
        $data['monthyear']      = date('Y-m-d', strtotime($request->monthyear));

        $data['added_by']       = 'admin';
        $message = '';
        if(PostTender::create($data)) {
            $message .= 'Post Tender created successfully !';
        }else{
            $message .= 'Unable to add tender!';
        } 

        return Redirect::route('admin.post_tender.create')->with('message', $message);
    }

    public function viewPostTenders(Request $request) {
        $where['status'] = 1;
        if($request->department_id != '') {
            $department_id = $request->department_id;
            $where['department_id'] = $department_id;
        }
        $results = PostTender::where($where)->with('department')->orderBy('upload_date', 'DESC')->paginate(30);
        $departments = Department::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        return view('tenders.view_post_tenders', compact('results', 'departments'));
    }

    public function adminViewAllPosttenders() {
        $results = PostTender::orderBy('upload_date', 'DESC')->paginate(20);
        return view('admin.tenders.post_tender_view', compact('results'));
    }

    public function adminEditPosttenders($id) {
        $post_tender = PostTender::findOrFail($id);
        $post_tender['monthyear'] = date('F y', strtotime($post_tender['monthyear']));
        return view('admin.tenders.post_tender_edit', compact('post_tender'));
    }

    public function adminUpdatePosttenders(Request $request, $id) {
        $post_tender = PostTender::findOrFail($id);

        $data = $request->all();


        if ($request->hasFile('tender')) {
            if ($request->file('tender')->isValid()){
                $tender_path = 'uploads/post-tender/'.date('Y-m-d');
                $destination_path = public_path( $tender_path );
                $fileName = $request->name.'-'.time().'_tender.'.$request->file('tender')->getClientOriginalExtension();
                $request->file('tender')->move($destination_path, $fileName);
                $data['tender'] = $tender_path.'/'.$fileName;
            }
        }

    
        $data['upload_date'] = date('Y-m-d', strtotime($request->upload_date));
        $data['monthyear']      = date('Y-m-d', strtotime($request->monthyear));

        $message = 'Updated successfully';
        $post_tender->fill($data);
        if($post_tender->save()) { 
            return Redirect::route('admin.post_tender.view_all')->with('message', $message);
        }
    }

    public function adminDeletePostTenders($id) {
        //PostTender::destroy($id);
        $post_tender = PostTender::findOrFail($id);
        $post_tender->status = 0;
        $post_tender->save();
        
        $message = 'Removed successfully';
        return Redirect::route('admin.post_tender.view_all')->with('message', $message);
    }


    public function createPostTender() {
        $departments        = Department::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        return view('department.post_tenders.create', compact('departments'));
    }

    public function submitPostTender(Request $request) {
        $user_id = Auth::user()->id;
        $department_id = DepartmentUser::where('user_id', $user_id)->first()->department_id;
        $data = $request->all();
        $data['department_id'] = $department_id;

        $validator = Validator::make($data, PostTender::$rules);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput()->with('message', 'Some fields has errors. Please correct it and then try again');

        if ($request->hasFile('tender')) {
            if ($request->file('tender')->isValid()){
                $tender_path = 'uploads/post-tender/'.date('Y-m-d');
                $destination_path = public_path( $tender_path );
                $fileName = $request->name.'-'.time().'_tender.'.$request->file('tender')->getClientOriginalExtension();
                $request->file('tender')->move($destination_path, $fileName);
                $data['tender'] = $tender_path.'/'.$fileName;
            }
        }

    
        $data['upload_date']    = date('Y-m-d', strtotime($request->upload_date));
        $data['monthyear']      = date('Y-m-d', strtotime($request->monthyear));
        $message = '';
        if(PostTender::create($data)) {
            $message .= 'Post Tender created successfully !';
        }else{
            $message .= 'Unable to add tender!';
        } 

        return Redirect::route('department.post_tender.add')->with('message', $message);
    }

    public function viewPostTender() {
        $user_id = Auth::user()->id;
        $department_id = DepartmentUser::where('user_id', $user_id)->first()->department_id;
        $results = PostTender::where('department_id', $department_id)->where('status', 1)->where('added_by', 'user')->paginate(30);

        return view('department.post_tenders.view_all', compact('results'));
    }

    public function editPostTender($id) {
        $id = Crypt::decrypt($id);
        $post_tender = PostTender::findOrFail($id);
        $post_tender['monthyear'] = date('F y', strtotime($post_tender['monthyear']));
        return view('department.post_tenders.edit', compact('post_tender'));
    }

    public function updatePostTender(Request $request, $id) {
        $id = Crypt::decrypt($id);
        $post_tender = PostTender::findOrFail($id);

        $data = $request->all();


        if ($request->hasFile('tender')) {
            if ($request->file('tender')->isValid()){
                $tender_path = 'uploads/post-tender/'.date('Y-m-d');
                $destination_path = public_path( $tender_path );
                $fileName = $request->name.'-'.time().'_tender.'.$request->file('tender')->getClientOriginalExtension();
                $request->file('tender')->move($destination_path, $fileName);
                $data['tender'] = $tender_path.'/'.$fileName;
            }
        }

    
        $data['upload_date'] = date('Y-m-d', strtotime($request->upload_date));
        $data['monthyear']      = date('Y-m-d', strtotime($request->monthyear));

        $message = 'Updated successfully';
        $post_tender->fill($data);
        if($post_tender->save()) { 
            return Redirect::route('department.post_tender.view_all')->with('message', $message);
        }
    }

    public function removePostTender($id) {
        $id = Crypt::decrypt($id);
        $post_tender = PostTender::findOrFail($id);

        $post_tender->status = 0;

        if($post_tender->save()) { 
            $message = 'Removed successfully';
            return Redirect::route('department.post_tender.view_all')->with('message', $message);
        }
    }











    public function adminDelete($id) {
        Tender::destroy($id);
        $message = 'Removed successfully';
        return Redirect::route('admin.tender.index')->with('message', $message);
    }

    public function userDelete($id) {

        $user_id = Auth::user()->id;
        $department_id = DepartmentUser::where('user_id', $user_id)->first()->department_id;
        $tender = Tender::findOrFail($id);
        if($tender->department_id == $department_id) {
            Tender::destroy($id);
            $message = 'Removed successfully';
        }else{
            $message = 'Removed un-successfully ;)';
        }
        
        return Redirect::route('tender.index')->with('message', $message);
    }
}
