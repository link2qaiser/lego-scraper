<?php
ini_set('max_execution_time', 0);
function makeCurl($url){
	$base_url = "http://atharandcoservice.com/alltools/";
    $url = $base_url.$url;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    curl_close ($ch);
    echo $server_output."<br/>";
}
function index(){
	$min = (int)date('i');
    $hour = (int)date('h');
    /*$min = "00";
    $hour = "00";*/
    

    echo $min.":".$hour."<br/>";

    try{
        if($min % 15 == 0){
            //makeCurl("mediamanagement/instagram/scrapmedia");
            echo ("Every 15 min cron executed<br/>");
        }
        if($min % 30 == 0){
	        makeCurl("twitterassistant/crons/posttweet");
            makeCurl("twitterassistant/crons/posttweet");
	        echo ("Every 30 min cron executed<br/>");
	   	}
        die();
    }catch(Exception $e){
    	print_r($e);
    }
    
}
index();