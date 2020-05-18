<?php
namespace App\Http\Controllers\twitterassistant;



use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models\twitterassistant\User_Account;
use App\Models\twitterassistant\Category;
use DB;
use Hash;
use Auth;

class UserController extends Controller
{
	private $twitter;
	private $module = "";
	public function __construct()	{
		$this->module = config('constants.twitterassistant.module');
	}
	


	public function accountslist(Request $request)	{

		$config = config('constants.twitterassistant');
		
		//TWITTER CODE TO GET THE ADD ACCOUNT LINK
		
		\Codebird\Codebird::setConsumerKey($config['CONSUMER_KEY'], $config['CONSUMER_SECRET']); 
		$cb 	= 	\Codebird\Codebird::getInstance();
		$cb->setToken($config['ACCESS_TOKEN'],$config['ACCESS_TOKEN_SECRET']);
		
		if($request->input('oauth_token')){

			$setting		=	false;
			$cb->setToken(session('oauth_token'),session('oauth_token_secret'));
			// get the access token
			$reply = $cb->oauth_accessToken([
				'oauth_verifier' => $request->input('oauth_verifier')
			 ]);
			session(['oauth_token' => $reply->oauth_token,
				'oauth_token_secret'=>$reply->oauth_token_secret,
				//'oauth_verify'=>true
				]);
			$is_save					= User_Account::where('screen_name','=',
												$reply->screen_name)
												->get();
			
			if(count($is_save) > 0)	{
				$ua							=	$is_save[0];
				$category 					= 	User_Account::find($ua->ua_id);			
				
			}else {
				$category 					= 	new User_Account;
				$setting					=	true;
			}
			$category->oauth_token  		= 	session('oauth_token');
			$category->oauth_token_secret 	=  	session('oauth_token_secret');
			$category->get_oauth_token  	= 	$request->input('oauth_token');
			$category->get_oauth_verifier 	=  	$request->input('oauth_verifier');
			
			$category->screen_name 			= 	$reply->screen_name;
			$category->u_id 				=	Auth::user()->id;
			$category->save();
			if($setting) 
				return redirect($this->module.'/accounts/update/'.$category->ua_id."?welcome=1");
			else
				return redirect($this->module);
		
			$cb->setToken(session('oauth_token'), session('oauth_token_secret'));
			$reply = $cb->statuses_update('status=#facebook will look over the @twitter!');
		}
		$data = array(
            "page_title"   => "Twitter Assistance User list",
            "page_heading" => "Twitter Assistance User list",
            "module" => $this->module,
            "breadcrumbs"  => array("dashboard" => "Home", "#" => "twitterassistant"),
        );
		$data['list']	=	User_Account::where('u_id','=',Auth::user()->id)->get();
		
		
		$reply = $cb->oauth_requestToken([
			'oauth_callback' => $config['OAUTH_CALLBACK']
	  	]);
	
	  	// store the token
	  	$cb->setToken($reply->oauth_token, $reply->oauth_token_secret);
		session(['oauth_token' => $reply->oauth_token,
				'oauth_token_secret'=>$reply->oauth_token_secret,
				//'oauth_verify'=>true
				]);
				
	  	// redirect to auth website
	  	$data['twitter_link'] = $cb->oauth_authorize();

		return view($this->module.'.user.accountlist', $data);
	}
	public function delete($id)	{
		$acc 	= new User_Account;
		$acc		=	$acc->find($id);
		User_Account::destroy($id);
		return redirect($this->module);
	}
	function update($id = 0,Request $request)	{
		if($id == 0){
			die('Oops: You are on the wrong place go back :(');
		}
		if($request->input('active')){
			$account 				= User_Account::find($id);
	        $account->active  		= $request->input('active');
	        if(is_array($request->input('categories')))
				$account->categories  	= implode(",", $request->input('categories'));
			$account->save();
			
			return redirect($this->module);
		}
		$data = array(
            "page_title"   => "Account Setting",
            "page_heading" => "Account Setting",
            "module" => $this->module,
            "breadcrumbs"  => array("dashboard" => "Home", "#" => "twitterassistant"),
        );
		$data['setting']		= User_Account::find($id);
		$data['cat_list'] 		= Category::where("user_id",Auth::id())->get();
		$data['id'] 			= $id;
		return view($this->module.'.user.accountseettingview', $data);
	}
	public function tweets($id = NULL)	{
		$data 					=  array();
		$ac_wh	=	($id != NULL)?' uc.ua_id = '.$id.' ':"";
		$data['tweets']			=  DB::select(DB::raw('SELECT * FROM user_posts up, user_accounts uc WHERE up.u_id = '.Auth::user()->id.' AND up.ua_id = uc.ua_id ORDER BY up.up_id DESC'));
		

		return view('user.tweetslist', $data);
	}
	
}
