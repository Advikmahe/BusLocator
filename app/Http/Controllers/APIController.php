<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Buses;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class APIController extends Controller
{
	/* Select user location*/
    public function index()
    {
        $userlocation = DB::table("userlocation")->lists("name","id");
        return view('buses.index',compact('userlocation'));
    }
	/* Retrieve list of busstop based on userlocation_id*/
    public function getBusStop(Request $request)
    {
        $busstop = DB::table("busstop")
                    ->where("userlocation_id",$request->userlocation_id)
                    ->lists("name","id");
        return response()->json($busstop);
    }
	/* Retrieve list of buses based on busstop_id*/
    public function getBusList(Request $request)
    {
        $buses = DB::table("buses")
                    ->where("busstop_id",$request->busstop_id)
                    ->lists("name","id");
        return response()->json($buses);
    }
	/* Form to Register a bus */
	public function create()
	{
	   $busstop = DB::table("busstop")                    
                   ->lists("name","id");
	   return view('buses.create',compact('busstop'));
	}
	/* Add Bus to Busstop*/
	public function store(Request $request)
	{
		
		$input = Input::only('Busno', 'busstop');
         $validator = Validator::make($input,
             array(
                 'Busno' => 'required',
                 'busstop' => 'required',
             )
         );

         if ($validator->fails())
         {
             return  redirect()->back()->with('errors', $validator->messages());
         } else {	
			 $name=$request->get('Busno');
		     $busstop_id=$request->get('busstop');		
		     DB::table('buses')->insert(
			 ['name' => $name, 'busstop_id' => $busstop_id]
			 );
		 }
	   //$request->session()->flash('alert-success', 'Bus was successful added!'); 	 
	   return redirect()->back()->with('status', 'Bus Registered Successfully!');
	}
	
}
