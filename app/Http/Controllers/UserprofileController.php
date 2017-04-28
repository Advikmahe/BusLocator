<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Usersprofile;
use Illuminate\Support\Facades\View;

class UserprofileController extends Controller
{
	 /**
     * Display a listing of the user profiles.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request)
    {
		
        $usersprofile=Usersprofile::orderBy('id','DESC')->paginate(10);
        //return view('usersprofile.index',compact(userlocation));
		//return view('buses.index',compact('userlocation'));
		 return View::make('usersprofile.index', compact('usersprofile')) ->with('i', ($request->input('page', 1) - 1) * 10);;
    }
	
	 /**
     * Show the form for creating a new user profile.
     *
     * @return \Illuminate\Http\Response
     */
	public function create(){
		if(isset($id)){
			$userprofile=Usersprofile::find($id);
			return view('usersprofile.form',compact('userprofile'));
		}else{
			$userprofile=array();
			return view('usersprofile.form',$userprofile);
		}
	}
	
	 /**
     * Store a newly created profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function store(Request $request){
		$input = Input::only('Name', 'Email','Profileimage','Phone');
		$validator = Validator::make($input,
             array(
                 'Name' => 'required',
                 'Email' => 'required',
				 'Profileimage' => 'required',
                 'Phone' => 'required',
             )
         );
		 if ($validator->fails())
         {
             return  redirect()->back()->with('errors', $validator->messages());
         }
		 else{
			 $name=$request->get('Name');
			 $email=$request->get('Email');
			 $profileimage=$request->file('Profileimage');
			 $phone=$request->get('Phone');
			 $image=$profileimage->getClientOriginalName();
			 $profileimage->move(public_path('uploads'),$profileimage->getClientOriginalName());	
			 DB::table('usersprofile')->insert(['name'=>$name,'email'=>$email,'profilepic'=>$image,'phone'=>$phone]);
			 return redirect()->back()->with('status', 'User Profile Created Successfully!');
			 
		 }
	}
	
	 /**
     * Display the specified user profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function show($id){
		 $userprofile=Usersprofile::find($id);
		 return view('usersprofile.show',compact('userprofile'));
	 }
	 
	  /**
     * Show the form for editing the specified user profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function edit($id){
		 $userprofile=Usersprofile::find($id);
		 return view('usersprofile.edit',compact('userprofile'));
	 }
	 
	 /**
     * Update the specified user profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function update(Request $request){
		  $this->validate($request, [
           'Name' => 'required',
           'Email' => 'required',
		   'Phone' => 'required',
        ]);
		
		$userid=$request->get('userid');
		$profile=Usersprofile::find($userid);
		$profile->name=$request->get('Name');
		$profile->email=$request->get('Email');
		$profileimage=$request->file('Profileimage');
		$profile->phone=$request->get('Phone');
		if(isset($profileimage)){
			$image=$profileimage->getClientOriginalName();
			if($image!=$profile->profilepic){
				$profile->profilepic=$image;
				$profileimage->move(public_path('uploads'),$image);
			}
	    }	
		
		$profile->save();
		return redirect()->route('Userprofile.index')
                        ->with('success','User Profile Updated successfully');		
	 }
}
