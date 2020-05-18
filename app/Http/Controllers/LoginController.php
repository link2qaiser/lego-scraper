<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class LoginController extends Controller
{
   	public function login()
   	{
   		return view('auth/login');
   	}

   	public function validateToken(Request $request){
   		$token   =  $request->get('token');
   		$result  =  User::where('job_token',$token)->get();
   		if( $result->count() > 0){
   			$data['validate'] = true;
   			return json_encode($data);
   		}else{
   			$data['validate'] = false;
   			return json_encode($data);
   		}
   	}
}
