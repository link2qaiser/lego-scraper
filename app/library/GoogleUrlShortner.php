<?php
namespace App\library;
// Declare the class
class GoogleUrlShortner {
	private $apiURL;
	// Constructor
	function __construct($key) {
		// Keep the API Url
		$apiURL = 'https://www.googleapis.com/urlshortener/v1/url';
		$this->apiURL = $apiURL.'?key='.$key;
	}
	
	// Shorten a URL
	function shorten($url) {
		// Send information along
		$response = $this->send($url);
		// Return the result
		return isset($response['id']) ? $response['id'] : false;
	}
	
	// Expand a URL
	function expand($url) {
		// Send information along
		$response = $this->send($url,false);
		// Return the result
		return isset($response['longUrl']) ? $response['longUrl'] : false;
	}
	
	// Send information to Google
	function send($url,$shorten = true) {

		// Create cURL
		$ch = curl_init();
		// If we're shortening a URL...
		if($shorten) {
			curl_setopt($ch,CURLOPT_URL,$this->apiURL);
			curl_setopt($ch,CURLOPT_POST,1);
			curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode(array("longUrl"=>$url)));
			curl_setopt($ch,CURLOPT_HTTPHEADER,array("Content-Type: application/json"));
		}
		else {
			curl_setopt($ch,CURLOPT_URL,$this->apiURL.'&shortUrl='.$url);
		}
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		// Execute the post
		$result = curl_exec($ch);
		// Close the connection
		curl_close($ch);
		//print_r($result); 
		// Return the result
		return json_decode($result,true);
	}		
}
/*// Create instance with key
$key = 'AIzaSyDgRdNrKGH-ltrq9gYhMRcK0tsnrzNi5ss';
$googer = new GoogleURLAPI($key);

// Test: Shorten a URL
$shortDWName = $googer->shorten("https://davidwalsh.name");
echo $shortDWName; // returns http://goo.gl/i002

// Test: Expand a URL
$longDWName = $googer->expand($shortDWName);
//echo $longDWName; // returns https://davidwalsh.name*/
?>