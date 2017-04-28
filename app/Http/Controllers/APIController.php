<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Usersprofile;
use Illuminate\Support\Facades\View;
use Response;

class APIController extends Controller
{
	/* Select list of user profile*/
    public function index()
    {
        try{

            $response = [
                'users' => []
            ];
            $statusCode = 200;
            $users = Usersprofile::all();

            foreach($users as $user){

                $response['users'][] = [
                    'id' => $user->id,
                    'username' => $user->name,
                    'email' => $user->email,
                    'image' => $user->profilepic,
					'phone' => $user->phone
                ];


            }


        }catch (Exception $e){
            $statusCode = 404;
        }finally{
            return Response::json($response, $statusCode);
        }
    }
	/* Select user profile*/
	public function show($id)
	{
	    try{

            $response = [
                'user' => []
            ];
            $statusCode = 200;
            
            $user = Usersprofile::find($id);
    
            $response = [
					'id' => $user->id,
                    'username' => $user->name,
                    'email' => $user->email,
                    'image' => $user->profilepic,
					'phone' => $user->phone
            ];
            
        }catch (Exception $e){
            $statusCode = 404;
        }finally{
            return Response::json($response, $statusCode);
        }

	}
	
}
