<?php
namespace App\Classes;
class Curl  {
	private $proxy;
	private $user_agent;
	private $pages = 20;
	public function getProxies(){
		$url = "http://www.proxyhulk.com/list/getmylist.php?type=http&user=proxy5SR4ka";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$output = curl_exec($ch);
		curl_close($ch);
		echo $output;
	}
	function makePostCall($url,$post){
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($post));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$output = curl_exec ($ch);

		$info 	= curl_getinfo($ch);
		curl_close($ch);
		if($info['http_code'] == 301)
			return $info;
		return $output;
	}
	function checkUrl($url) {
		$file_headers = @get_headers($url);
		if(isset($file_headers[0])) {
			if($file_headers[0] == 'HTTP/1.1 302 Found'){
				return 302;
			}else if($file_headers[0]  == 'HTTP/1.1 404 Not Found'){
				return 404;
			}
		}
		return 200;
	}
	
	function makecall($url,$getcode = false){
		
		$this->updateUseragent();
		//$this->updateProxy();
		//echo "Proxy:".$this->proxy['ip'].":".$this->proxy['port'].": Useragent".$this->user_agent."<br/>";
		//die();
		if (!function_exists('curl_init')){
			die('Sorry cURL is not installed!');
		}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);
		//curl_setopt($ch, CURLOPT_PROXYPORT, $this->proxy['port']);
		curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
		//curl_setopt($ch, CURLOPT_PROXY, $this->proxy['ip']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$output = curl_exec($ch);
		$info 	= curl_getinfo($ch);
		curl_close($ch);
		if($getcode == true)
			return $info['http_code'];
		if($info['http_code'] == 301)
			return $info;
		//print_r($info); die();
		//echo $output; die();
		return $output;
	}
	static function simpleCurl($url){
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}

	
	function updateProxy()	{
		$proxies 	= 	file_get_contents("proxies.txt");
		$proxies 	= 	explode("\n", $proxies);
		$index 		=  	array_rand($proxies);
		$proxies 	=	explode(":", $proxies[$index]);
		$this->proxy['ip']		=	$proxies[0];
		$this->proxy['port']	=	$proxies[1];
		
	}
	function updateUseragent()	{
		$agent	=	array("Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML like Gecko) Chrome/41.0.2227.1 Safari/537.36",
"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML like Gecko) Chrome/41.0.2227.0 Safari/537.36",
"Mozilla/5.0 (Windows NT 6.4; WOW64) AppleWebKit/537.36 (KHTML like Gecko) Chrome/41.0.2225.0 Safari/537.36",
"Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML like Gecko) Chrome/41.0.2225.0 Safari/537.36",
"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML like Gecko) Chrome/36.0.1985.67 Safari/537.36",
"Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML like Gecko) Chrome/36.0.1985.67 Safari/537.36",
"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) AppleWebKit/537.36 (KHTML like Gecko) Chrome/36.0.1944.0 Safari/537.36",
"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_0) AppleWebKit/537.36 (KHTML like Gecko) Chrome/32.0.1664.3 Safari/537.36",
"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_0) AppleWebKit/537.36 (KHTML like Gecko) Chrome/32.0.1664.3 Safari/537.36",
"Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.0",
"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10; rv:33.0) Gecko/20100101 Firefox/33.0",
"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20130401 Firefox/31.0",
"Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0",
"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20120101 Firefox/29.0",
"Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:25.0) Gecko/20100101 Firefox/29.0",
"Mozilla/5.0 (Windows NT 6.1; rv:27.3) Gecko/20130101 Firefox/27.3",
"Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0) Opera 12.14",);
		$index =  array_rand($agent);
		$this->user_agent		=	$agent[$index];
	}
}
