<?php

namespace App\Http\Controllers\twitterassistant;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use App\Models\twitterassistant\User_Account;
use App\Models\twitterassistant\Category;
use App\Models\twitterassistant\User_Post;

use DB;
use App\library\PosTagger;

class PostTweet extends Controller
{
    function printTag($tags) {
		foreach($tags as $t) {
                echo $t['token'] . "/" . $t['tag'] .  " ";
        }
        echo "\n";
        
	}
	public function makeTweet($text,$ival){
		$text	=	substr($text,0,110);
		$text	=	str_replace("'","{{twit9comma}}",$text);
		$text	=	str_replace("-","{{twit9dash}}",$text);
		//echo $text; die();
		$tagger = new PosTagger('app/library/lexicon.txt');
		$tags = $tagger->tag($text);
		//$this->printTag($tags); die();
		$string		=	array();
		$hash_pre	=	array('NP','NPS','NP$','NPS$','NNS','NN');
		$rand_keys = array_rand($hash_pre, 2);
		$hash = [];
		$hash[] = $hash_pre[$rand_keys[0]];
		$hash[] = $hash_pre[$rand_keys[1]];
		//echo "<pre>"; print_r($hash); die();
		foreach($tags as $t) {
			$t['tag']  =	trim($t['tag']);
			if(in_array($t['tag'],$hash)== true && !is_int($t['token'])){	
                $string[]	 =	"#".$t['token'];
			}else {
				$string[]	 =	$t['token'];
			}
        }
	 	//print_r($string); die();
		
		$string		 =	implode(" ",$string);
		$string		 =	str_replace(" twit9comma ","'",$string);
		$string		 =	str_replace("twit9dash","-",$string);
		//die($string);
		$string 	.=  " ".$ival->google_short;
		//die($string);
		return $string;
	}
	public function saveUserPost($tweet,$id,$ival,$val){
		if($id == false) return;
		
		$userpost 				= new User_Post;
        $userpost->u_id  		= $val->u_id;
		$userpost->ua_id  		= $val->ua_id;
		$userpost->tw_id  		= $id;
		if($id == 187){
			$userpost->is_posted  		= 0;
			echo "\nTweet is duplicate\n";
		}
		$userpost->p_id  		= $ival->post_id;
		$userpost->contant  	= $tweet;
		$userpost->save();
	}
	public function publishTweet($tweet,$val)	{
		$config = config('constants.twitterassistant');

		\Codebird\Codebird::setConsumerKey($config['CONSUMER_KEY'], $config['CONSUMER_SECRET']); 
		$cb 	= 	\Codebird\Codebird::getInstance();
		$cb->setToken($config['ACCESS_TOKEN'],$config['ACCESS_TOKEN_SECRET']);
		
		session(['oauth_token' => $val->get_oauth_token,
				'oauth_token_secret'=>$val->get_oauth_token_secret
		]);
		$cb->setToken($val->oauth_token, $val->oauth_token_secret);
		$reply = $cb->statuses_update('status='.$tweet);
		if(isset($reply->errors[0])){
			$code 	=	$reply->errors[0];
			return $code->code;
		}
		if(isset($reply->id)){
			return $reply->id;
		}
		return false;
			 
			
	}

    public function index()
    {
    	
		$account		=		User_Account::where('is_check','=',0)->take(10)->get();
		//echo "<pre>"; print_r($account); die();
		$log			=		"";
		if($account){
			foreach($account as $val)	{
				if($val->categories != "") {
					//echo "<pre>"; print_r($val->posted_id); die();
					$cat 		=	($val->categories != "")?' AND  p.c_id IN ('.$val->categories.')':"";
					$sql 		=	'SELECT *,p.p_id as post_id FROM twas_posts p WHERE p.p_id > '.$val->posted_id.'
								 '.$cat.' ORDER BY p.p_id ASC  LIMIT 1';
					//echo $sql."<br>"; 
					$news 		=	 DB::select(DB::raw($sql));
					//echo "<pre>"; print_r($news); die();
					if($news){
						foreach($news as $ival)	{
							$tweet =	$this->makeTweet($ival->title,$ival);
							
							/*
							*
							*POST THE TWEET
							*
							*/
							//echo $tweet; die();
							$id =	$this->publishTweet($tweet,$val);
							/*
							*
							*UPDAT THE ACCOUNT TABLE
							*
							*/
							$account = User_Account::find($val->ua_id);
							$account->posted_id = $ival->p_id;
							$account->save();
							
							$log .= "<br/>Tweet: ".$tweet."<br/>User: ".$val->screen_name;
							echo $log;
						}
					}
			   }
		   }
		   die("<br/>End of code</br>");
	   }
	  
    }
}
