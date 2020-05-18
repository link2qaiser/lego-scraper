<?php

namespace App\Http\Controllers\twitterassistant;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\twitterassistant\Rss_Resource;
use App\Models\twitterassistant\Post;
use DB;
use PicoFeed\Reader\Reader;
use PicoFeed\PicoFeedException;
//use App\library\GoogleUrlShortner;
use App\Classes\GoogleShortUrl;

class FeedTweets extends Controller
{
	function googleShortUrl($url)
	{
		$key = 'AIzaSyCUShP_wXjSv2cisW4as2I7hQAkiigBPkA';
		$postData = array('longUrl' => $url);
		$curlObj = curl_init();
		$jsonData = json_encode($postData);
		curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key='.$key);
		curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlObj, CURLOPT_HEADER, 0);
		curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
		curl_setopt($curlObj, CURLOPT_POST, 1);
		curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
		curl_setopt($curlObj, CURLOPT_REFERER, 'www.dixeam.com');
		$response = curl_exec($curlObj);
		$json = json_decode($response);
		curl_close($curlObj);
		print_r($response);
		die();
		//return $json->id;
	}
	function getFeed($url){
        $rss = simplexml_load_file($url);
        $count = 0;
        $html = '<ul>';
        foreach($rss->channel->item as $item) {
            $count++;
            if($count > 7){
                break;
            }
            $html .= '<li><a href="'.htmlspecialchars($item->link).'">'.htmlspecialchars($item->title).'</a></li>';
        }
        $html .= '</ul>';
        echo $html;
    }
    public function index(){
    	
		ini_set('max_execution_time', 300);
		$val				=	RSS_Resource::where('last_check','<',date('Y-m-d'))->first();
		$key = 'AIzaSyCUShP_wXjSv2cisW4as2I7hQAkiigBPkA';

		//echo "<pre>"; print_r($val); die();
		if(isset($val->link)){
			try {
					//$this->getFeed($val->link); die();
					//$reader = new Reader;
				
					// Return a resource
					//$resource = $reader->download($val->link);

					// Return the right parser instance according to the feed format
					/*$parser = $reader->getParser(
						$resource->getUrl(),
						$resource->getContent(),
						$resource->getEncoding()
					);*/

				
					// Return a Feed object
					//$feed = $parser->execute();
					//echo "<pre>"; print_r($feed); die();
					$rss = simplexml_load_file($val->link);
					$data		=	array();
					//$googer 	= 	new GoogleUrlShortner("AIzaSyDgRdNrKGH-ltrq9gYhMRcK0tsnrzNi5ss");
					//$GoogleShortUrl = new GoogleShortUrl($key);
					//$GoogleShortUrl->shorten('https://developers.google.com/url-shortener/v1/getting_started');
					//die();
					$j	=	0;
					foreach($rss->channel->item as $item) {
						//echo "<pre>"; print_r($item); die();
						$is_save				=	Post::where('url','=',
													htmlspecialchars($item->link))
													->count();
						 
						 if($is_save == 0 && htmlspecialchars($item->title) != "" && htmlspecialchars($item->title) != "none")	{
							 $data[$j]['title'] 			=	htmlspecialchars($item->title);
							 $data[$j]['content'] 			=	trim(strip_tags($item->description));
							 $data[$j]['auther'] 			=	'';
							 $data[$j]['post_date'] 		=	htmlspecialchars($item->pubDate);
							 $data[$j]['url'] 				=	htmlspecialchars($item->link);
							 $data[$j]['c_id'] 				=	$val->c_id;
							 $data[$j]['rr_id'] 			=	$val->rr_id;

							 //$data[$j]['google_short']		=	$this->googleShortUrl(htmlspecialchars($item->link));
							 $data[$j]['google_short']		=	$item->link;
							 $data[$j]['user_id'] 			=	$val->user_id;
							 //$data[$j]['google_short']		=	$GoogleShortUrl->googleShortUrl(htmlspecialchars($item->link));
							 $j++;
						 }
						
					 }

					//echo "<pre>"; print_r($data); die();
					 
					 if(count($data) > 0){
						 Post::insert($data);
						 $rss_resource 						= 	RSS_Resource::find($val->rr_id);
						 $rss_resource->last_check			= 	date('Y-m-d');
						 $rss_resource->is_checked			= 	1;
						 
						 $rss_resource->save();
						 echo "News are updated \n";
					 }else {
						 $rss_resource 						= 	RSS_Resource::find($val->rr_id);
						 $rss_resource->last_check			= 	date('Y-m-d');
						 $rss_resource->is_checked			= 	1;
						 $rss_resource->save();
						 echo "No news found resource updated \n";
					 }
					 
				}
				catch (PicoFeedException $e) {
					echo $val->link."<br/>";
					$rss_resource 						= 	RSS_Resource::find($val->rr_id);
					$rss_resource->last_check			= 	date('Y-m-d');
					$rss_resource->is_checked			= 	1;
					//$rss_resource->save();
					die("Some error while parsing the resource");
						 
				}
		}else {
			die("All done today");
		}
		
	}
    public function handle()
    {
		$rss_row 		=	 Rss_Resource::where('is_checked','=',0)->take(1)->get();
		//echo "<pre>"; print_r($rss_row); die();
		if(count($rss_row) > 0){
			//echo "test";
			foreach($rss_row as $key=>$val)	{
				$this->saveNews($val);
			}
		}else {
			DB::table('rss_resources')->update(array('is_checked' => 0));
			echo "Reset the Resources";
		}
		
		
    }
}
