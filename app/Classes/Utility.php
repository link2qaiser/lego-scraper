<?php
namespace App\Classes;
use Excel;
class Utility {
	public static function export($data, $filename = "filename", $sheetname = "sheetname", $ext = 'xlsx')
    {
        ob_clean();
        \Excel::create($filename, function ($excel) use ($data, $sheetname) {
            $excel->getDefaultStyle()->getAlignment();
            $excel->sheet($sheetname, function ($sheet) use ($data) {
                $sheet->fromArray($data, null, 'A1', true, false);
                //$sheet->setAutoFilter();
                $sheet->setAutoSize(true);
                //$sheet->freezeFirstRowAndColumn();
                /*$sheet->row(1,function($row){
                    $row->setBackground('#A9A9A9'); 
                    $row->setFont(array( 'size' => '12','bold' => true));
                });*/
            });
        })->export($ext);
    }
	public static function arrayFilterRecursive($array) 
	{ 
	   /*foreach ($input as &$value) 
	    { 
	      if (is_array($value)) 
	      { 
	         $value = self::arrayFilterRecursive($value); 
	      }else {
	      	$value = strip_tags($value);
	      }
	   }     
	   return array_filter($input); */
	   $array = array_map(function($item) {
                return is_array($item) ? self::arrayFilterRecursive($item) : $item;
            }, $array);
	   return array_filter($array, function($item) {
	   	return $item !== "" && $item !== null && (!is_array($item) || count($item) > 0);
	   });
	}
	public static function removeQSArr($url, $key) { 
		
		$url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&'); 
		$url = substr($url, 0, -1); 

		parse_str($url, $url);
		$unset = ['q','sort_by','page','order_by','_','limit','amp'];
		foreach ($unset as $key => $value) {
			if(isset($url[$value])) unset($url[$value]);
		}
		
		
		
		$url = http_build_query($url, '');
		$url = str_replace("%3F", "", $url);

		return $url; 
	}
	public static function arrayFilterWithNULL($array) 
	{ 
	   /*foreach ($input as &$value) 
	    { 
	      if (is_array($value)) 
	      { 
	         $value = self::arrayFilterRecursive($value); 
	      }else {
	      	$value = strip_tags($value);
	      }
	   }     
	   return array_filter($input); */
	   $array = array_map(function($item) {
                return is_array($item) ? self::arrayFilterWithNULL($item) : $item;
            }, $array);
	   return array_filter($array, function($item) {
	   	return $item !== "" && $item !== null && (!is_array($item) || count($item) > 0);
	   });
	}
	public static function makeIntegerSearch(&$array)
	{
		$val = array('living_spaces-dot-year_built',
					"living_spaces-dot-bedrooms",
					"living_spaces-dot-bathrooms",
					"living_spaces-dot-basement_basic",
					"living_spaces-dot-num_fireplaces",
					"living_spaces-dot-heat_zones",
					"living_spaces-dot-num_ac_zones",
					"living_spaces-dot-num_rooms",
					"living_spaces-dot-new_construction",
					"living_spaces-dot-green_features",
					"living_spaces-dot-handicap_features",
					"living_spaces-dot-ww_carpet",
					"living_spaces-dot-elevator",
					"living_spaces-dot-smoking",
					"living_spaces-dot-skylight",
					"living_spaces-dot-house_style",
					"living_spaces-dot-num_stories",
					"openhouse-dot-oh_type",
					

					
					"rp_price-dot-rp_max_price",
					"rp_price-dot-rp_min_price",
					"rp_price-dot-cluster_available_days",

					"min_price",
					"max_price",
					"list_price",
					"pool",
					"room_for_pool",
					"pool_details",
					"pool_length",
					"pool_width",
					"sauna",
					"spa",
					"sprinkler_system",
					"outdoor_shower",
                    "approval_to_rent",
                    "beach",
                    "pets_allowed",
                    "patio_terrace",
                    "disclosure",
                    "sign_posted",
                    "internet_display",
                    "price_display",
                    "location_display",
                    "building_concierge",
                    "building_doorman",
                    "building_elevator_attendant",
                    "building_unattended_lobby",
                    "building_superintendent",
                    "near_bus_station",
                    "address_city"

				);
		if(isset($array['openhouse-dot-oh_type']) && @!empty($array['openhouse-dot-oh_type']))
           $array['openhouse-dot-oh_type'] = array_map('intval', $array['openhouse-dot-oh_type']);
       
	    if(is_array($array))
	    {
	        foreach($array as $key=>&$arrayElement)
	        {

	        	if(in_array($key, $val)){


	        		if(isset($array[$key]['range']['gte'])){
	        			$array[$key]['range']['gte'] = (int)trim(str_replace([",","$"], "", $arrayElement['range']['gte']));

	        		}
	        		if(isset($array[$key]['range']['lte'])){
	        			$array[$key]['range']['lte'] = (int)trim(str_replace([",","$"], "", $arrayElement['range']['lte']));
	        		}
	        		if(isset($array[$key]['wherein'])){
	        			$array[$key]['wherein'] = array_map('intval', $array[$key]['wherein']);
	        		}
	        		//echo "<pre>"; print_r($arrayElement); 
	            	if(is_array($arrayElement)){

	            		//$array[$key] = array_map('intval', $arrayElement);
	            		//echo "<pre>"; var_dump($arrayElement); 
	            	}else {

	            		$array[$key] =  (int)trim(str_replace([",","$"], "", $arrayElement));
	            	}
	        	}
	        }
	    }
	}
	public static function updatType(&$array,$indexs = NULL,$type = "integer")
	{
		if($indexs == NULL){
			$indexs = array(
					'year_built',
					'num_stories',
                    "bedrooms",
                    "bathrooms",
                    "basement_basic",
                    "num_fireplaces",
                    "heat_zones",
                    "num_ac_zones",
                    "num_rooms",
                    "new_construction",
                    "green_features",
                    "handicap_features",
                    "ww_carpet",
                    "elevator",
                    "smoking",
                    "skylight",
                    "house_style",
                    "rp_max_price",
                    "rp_min_price",
                    "cluster_available_days",
                    "min_price",
                    "max_price",
                    "pool",
                    "room_for_pool",
                    "pool_details",
                    "pool_length",
                    "pool_width",
                    "sauna",
                    "spa",
                    "sprinkler_system",
                    "outdoor_shower",
                    "approval_to_rent",
                    "beach",
                    "pets_allowed",
                    "patio_terrace",
                    "disclosure",
                    "sign_posted",
                    "internet_display",
                    "price_display",
                    "location_display",
                    "building_concierge",
                    "building_doorman",
                    "building_elevator_attendant",
                    "building_unattended_lobby",
                    "building_superintendent",
                    "near_bus_station",
            );
		}
		$sub_array = array("living_spaces","primary_living_space","owners");
		foreach($indexs as $key => $val) {
			foreach ($sub_array as $ik => $iv) {
				if(isset($array[$iv][$val]) && !is_array($array[$iv][$val])){
					$array[$iv][$val] = (int)($array[$iv][$val]);
				}
			}
			if(isset($array[$val]) && !is_array($array[$val])){
		   	  $array[$val] = (int)($array[$val]);
		    }
		} 
	}
	public static function hotsheetIntegerSearch(&$array){
		
		$arr = array("sale_detail","rental_detial");
		$arr2 = array("min_price","max_price","rp_price-dot-rp_min_price","rp_price-dot-rp_max_price","list_price");
		foreach ($arr as $key => $value) {
			foreach ($arr2 as $ikey => $ivalue) {
				if(isset($array[$value][$ivalue]['range']['gte'])){
        			$array[$value][$ivalue]['range']['gte'] = (int)trim(str_replace([",","$"], "", $array[$value][$ivalue]['range']['gte']));
        			if($array[$value][$ivalue]['range']['gte'] == 0)
        				 $array[$value][$ivalue]['range']['gte'] = '';
        		}
        		if(isset($array[$value][$ivalue]['range']['lte'])){
        			$array[$value][$ivalue]['range']['lte'] = (int)trim(str_replace([",","$"], "", $array[$value][$ivalue]['range']['lte']));
        			if($array[$value][$ivalue]['range']['lte'] == 0)
        				 $array[$value][$ivalue]['range']['lte'] = '';
        		}
			}
		}
	}
	public static function encryptDecrypt($action, $string) {
	    $output = false;
	    $encrypt_method = "AES-256-CBC";
	    $secret_key = 'presteegkey';
	    $secret_iv = 'presteegivkey';
	    // hash
	    $key = hash('sha256', $secret_key);
	    
	    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	    $iv = substr(hash('sha256', $secret_iv), 0, 16);
	    if ( $action == 'encrypt' ) {
	        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	        $output = base64_encode($output);
	    } else if( $action == 'decrypt' ) {
	        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	    }
	    return $output;
	}
	public static function unsetReq(&$req,$unset){
        foreach ($unset as $k=>$v) if(isset($req[$v])) unset($req[$v]);
    }
    public static function getIndexArray($arr,$id,$index='__id'){
        foreach ($arr as $k=>$v) {
            if(isset($v[$index]) && @$v[$index] == $id)
                return $arr[$k];
        }
        return false;
    }
    public static function getIndex($arr,$id,$index='__id'){
        foreach ($arr as $k=>$v) {
            if(isset($v[$index]) && @$v[$index] == $id)
                return $k;
        }
        return false;
    }
    public static function removeIndex(&$arr,$id,$index='__id'){
        foreach ($arr as $k=>$v) {
            if($v[$index] == $id)
                unset($arr[$k]);
        }
        $arr = array_values($arr);
    }
    public static function appendRoleArray(&$data,$user){
    	$arr = array('board_id','group_id','company_id');
    	foreach ($arr as $key => $value) {
    		if(isset($user[$value]))
    			$data[$value] = $user[$value];
    	}
    	if(isset($user['primary_office']))
        	$data['office_id'] = $user['primary_office'];
    }
    public static function regexMatch($string){
    	$regex = preg_match('/[0-9]+-[0-9]+/',
                $string);
		if(is_numeric($string) || $regex){
			return 0;
		}
		return 1;
    }
    /*
    *
    *IN MULT DIMENSIONAL ARRAY YOU CAN FIND THE VALUE BY KEY
    */
	public static function findValueByIndex($array, $key, $value)
	{
	    $results = array();

	    if (is_array($array)) {
	        if (isset($array[$key]) && $array[$key] == $value) {
	            $results[] = $array;
	        }

	        foreach ($array as $subarray) {
	            $results = array_merge($results, self::findValueByIndex($subarray, $key, $value));
	        }
	    }

	    return $results;
	}
	static function  extractEmails($string){

	    $pattern = '/[a-z0-9_\-\+]+@[a-z0-9\-]+\.([a-z]{2,3})(?:\.[a-z]{2})?/i';
	    preg_match_all($pattern, $string, $matches);
	    $email = [];
	    $block = [".jpg",".jpeg",".png"];
	    //$matches[0] = ['10098683_web1_ExpensiveProperties-300x200@2x.jpg','10098683_web1_ExpensiveProperties-300x200@2x.png','test@google.com','test@google.com','test@google.com','test@google.com'];
	    
	    if(@count($matches[0]) > 0) {
	    	
	    	foreach ($matches[0] as $key => $value) {
	    		$find = 0;
	    		foreach ($block as $ikey => $ivalue) {
		    		if(strpos($value, $ivalue) !== false){
		    			$find++;
		    		}
		    	}
		    	if($find == 0)
		    		$email[] = $value;
	    	}
	    	
	    }
	    return array_values(array_unique($email));
	   
	}
	static function extractLinks($string){
		
		preg_match_all('/<a[^>]+href=([\'"])(?<href>.+?)\1[^>]*>/i', $string, $result);
		return $result['href'];
		//return $output;
	}
	static function getTag($html,$tag = 'title',$attr = []){
		$doc = new \DOMDocument();
		@$doc->loadHTML($html);
		$nodes = $doc->getElementsByTagName($tag);
		if(isset($nodes->item(0)->nodeValue))
			return $nodes->item(0)->nodeValue;
		else 
			"";
	}
	static function getMeta($html){
		$doc = new \DOMDocument();
		@$doc->loadHTML($html);
		$metas = $doc->getElementsByTagName('meta');

		$meta_ar = [];
		for ($i = 0; $i < $metas->length; $i++)
		{
		    $meta = $metas->item($i);
		    if($meta->getAttribute('name') == 'description')
		        $meta_ar['page_description'] = $meta->getAttribute('content');
		    if($meta->getAttribute('name') == 'keywords')
		        $meta_ar['page_keywords']  = $meta->getAttribute('content');
		}
		return $meta_ar;
	}
	static function getMozStats( $sites ){
		
		// Get your access id and secret key here: https://moz.com/products/api/keys
		$accessID = "mozscape-1cc9e3ce6a";
		$secretKey = "e33aeef1571eab593a05224c06aa2975";

		// Set your expires times for several minutes into the future.
		// An expires time excessively far in the future will not be honored by the Mozscape API.
		$expires = time() + 300;

		// Put each parameter on a new line.
		$stringToSign = $accessID."\n".$expires;

		// Get the "raw" or binary output of the hmac hash.
		$binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);

		// Base64-encode it and then url-encode that.
		$urlSafeSignature = urlencode(base64_encode($binarySignature));

		// Add up all the bit flags you want returned.
		// Learn more here: https://moz.com/help/guides/moz-api/mozscape/api-reference/url-metrics
		$cols = "103616137252";

		// Put it all together and you get your request URL.
		$requestUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/?Cols=".$cols."&AccessID=".$accessID."&Expires=".$expires."&Signature=".$urlSafeSignature;

		// Put your URLS into an array and json_encode them.
		$batchedDomains = $sites;
		$encodedDomains = json_encode($batchedDomains);
//echo $encodedDomains;die;
		// Use Curl to send off your request.
		// Send your encoded list of domains through Curl's POSTFIELDS.
		$options = array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POSTFIELDS     => $encodedDomains
			);

		$ch = curl_init($requestUrl);
		curl_setopt_array($ch, $options);
		$content = curl_exec($ch);
		curl_close( $ch );
		
		return json_decode($content,true);

		// $contents = json_decode($content);
		// print_r($contents);
	}
	static function isImage($string){
		$block = [".jpg",".jpeg",".png"];
		foreach ($block as $key => $value) {
            if(strpos( $string, $value))
                return true;
        }
        return false;
	}
	static function inBlockSite($link){
		$block_sites = ['google.com','youtube.com','facebook.com',"twitter.com",'wikipedia.org','imdb.com','instagram.com','stackoverflow.com','pinterest','linkedin.com'];
        foreach ($block_sites as $key => $value) {
            if(strpos( $link, $value))
                return true;
        }
        return false;
    }
    static function isExpired($domain) {
    	/*$dns = dns_get_record($domain);
    	if(empty($dns))
    		return true;
    	else 
    		return false;*/
    	if ( gethostbyname($domain) != $domain ) {
    		return false;
		}
		else {
		  return true;
		}
    }
    /**
	 * @param string $domain Pass $_SERVER['SERVER_NAME'] here
	 * @param bool $debug
	 *
	 * @debug bool $debug
	 * @return string
	 */
	static function extractRootDomain($link, $debug = false)
	{
		$host = parse_url($link);

		if(!isset($host['host']))
			return $link;
		$domain = $host['host'];
		
		$original = $domain = strtolower($domain);
		if (filter_var($domain, FILTER_VALIDATE_IP)) { return $domain; }
		$debug ? print('<strong style="color:green">&raquo;</strong> Parsing: '.$original) : false;
		$arr = array_slice(array_filter(explode('.', $domain, 4), function($value){
			return $value !== 'www';
		}), 0); //rebuild array indexes
		if (count($arr) > 2)
		{
			$count = count($arr);
			$_sub = explode('.', $count === 4 ? $arr[3] : $arr[2]);
			$debug ? print(" (parts count: {$count})") : false;
			if (count($_sub) === 2) // two level TLD
			{
				$removed = array_shift($arr);
				if ($count === 4) // got a subdomain acting as a domain
				{
					$removed = array_shift($arr);
				}
				$debug ? print("<br>\n" . '[*] Two level TLD: <strong>' . join('.', $_sub) . '</strong> ') : false;
			}
			elseif (count($_sub) === 1) // one level TLD
			{
				$removed = array_shift($arr); //remove the subdomain
				if (strlen($_sub[0]) === 2 && $count === 3) // TLD domain must be 2 letters
				{
					array_unshift($arr, $removed);
				}
				else
				{
					// non country TLD according to IANA
					$tlds = array(
						'aero',
						'arpa',
						'asia',
						'biz',
						'cat',
						'com',
						'coop',
						'edu',
						'gov',
						'info',
						'jobs',
						'mil',
						'mobi',
						'museum',
						'name',
						'net',
						'org',
						'post',
						'pro',
						'tel',
						'travel',
						'xxx',
					);
					if (count($arr) > 2 && in_array($_sub[0], $tlds) !== false) //special TLD don't have a country
					{
						array_shift($arr);
					}
				}
				$debug ? print("<br>\n" .'[*] One level TLD: <strong>'.join('.', $_sub).'</strong> ') : false;
			}
			else // more than 3 levels, something is wrong
			{
				for ($i = count($_sub); $i > 1; $i--)
				{
					$removed = array_shift($arr);
				}
				$debug ? print("<br>\n" . '[*] Three level TLD: <strong>' . join('.', $_sub) . '</strong> ') : false;
			}
		}
		elseif (count($arr) === 2)
		{
			$arr0 = array_shift($arr);
			if (strpos(join('.', $arr), '.') === false
				&& in_array($arr[0], array('localhost','test','invalid')) === false) // not a reserved domain
			{
				$debug ? print("<br>\n" .'Seems invalid domain: <strong>'.join('.', $arr).'</strong> re-adding: <strong>'.$arr0.'</strong> ') : false;
				// seems invalid domain, restore it
				array_unshift($arr, $arr0);
			}
		}
		$debug ? print("<br>\n".'<strong style="color:gray">&laquo;</strong> Done parsing: <span style="color:red">' . $original . '</span> as <span style="color:blue">'. join('.', $arr) ."</span><br>\n") : false;
		return join('.', $arr);
	}
	static public function arrayUniqueByKey($array,$key){
		$tempArr = array_unique(array_column($array, $key));
		return array_intersect_key($array, $tempArr);
	}



}
