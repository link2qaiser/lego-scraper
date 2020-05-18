<?php
return  [ 
	"twitterassistant"=> 
						array(
						    'CONSUMER_KEY' => 'Fdjdzrthd9CqacV3sKpEMXle8',
							'CONSUMER_SECRET' => 'SjhOqa8eRgRgT2ePY6lvUzrfb6xncn8womWCTjMHsb64abAGx4',
							'ACCESS_TOKEN' => '520506617-JhGFuMZiMJ6jLorzqj9VGjHIrUVbwiauCmv6fbbz',
							'ACCESS_TOKEN_SECRET' => 'fbNFZfs4yo7XNXP23721flCJlkgKff570QmOdgjPSA3Ed',
							'OAUTH_CALLBACK' => 'http://localhost:8080/alltools/twitterassistant',
							'GOOGLE_API_KEY' => 'AIzaSyDgRdNrKGH-ltrq9gYhMRcK0tsnrzNi5ss',
							"module"=>"twitterassistant"
						),
	'roles' => array(
		1 => 'Admin',
		2 => 'User',
	),
	"mediamanagement"=> 
						array(
							"module"=>"mediamanagement"
						),

	"appmanangement"=> 
						array(
							"module"=>"appmanangement",
							'storage'=>'app_media',
							'brands'=> array(
											1=>array(
												'name'=>'Apple',
												'link'=>'',
											),
											2=>array(
												'name'=>'Google',
												'link'=>'',
											)
							)
						),


	"mediacategory"=> 
						array(
							"General",
							"Travel",
							"Tech",
							"Fun",
							"Food",
							"Lifestyle",
							"Health",
							"Quotes",
						),
	"ttsyt"=> 
						array(
							"module"=>"ttsyt",
							'storage'=>'ttsyt',
						),
	"articletovideo"=> 
						array(
							"module"=>"articletovideo",
							'storage'=>'articletovideo',
						),
	"amzranktracker"=> 
						array(
							"module"=>"amzranktracker",
							"title"=>"Amazon Rank Tracker",
							"table_prefix"=>"amzrt"
						),
	"seooutreach"=> 
						array(
							"module"=>"seooutreach",
							"title"=>"SEO Outreach Tool",
							"table_prefix"=>"seoout",
							'footprint_types'=>array(
								"Gust Post",
								"Forums",
							)
						),
	"seotracking"=> 
						array(
							"module"=>"seotracking",
							"title"=>"SEO Tracking Tool",
							"table_prefix"=>"seotra",
							'footprint_types'=>array(
								"Gust Post",
								"Forums",
							)
						),
	"seokeywordresearch"=> 
						array(
							"module"=>"seokeywordresearch",
							"title"=>"SEO Keyword Research Tool",
							"table_prefix"=>"seokwr"
						),
	"seositeaudit"=> 
						array(
							"module"=>"seositeaudit",
							"title"=>"SEO Keyword Research Tool",
							"table_prefix"=>"seosa"
						),
	"smsoutreach"=> 
						array(
							"module"=>"smsoutreach",
							"title"=>"SMS Outreach Tool",
							"table_prefix"=>"smsout"
						),
	"quizapp"=> 
						array(
							"module"=>"quizapp",
							'storage'=>'quizapp_media'

						),
	"amazondeals"=> 
						array(
							"module"=>"amazondeals"
						),
	"yelpoutreach"=> 
						array(
							"module"=>"yelpoutreach",
							"title"=>"Yelp Scraping and Outreach Tool",
							"view"=>"yelpoutreach",
							"table_prefix"=>"yelout"
						),
	"users"=> 
						array(
							"module"=>"users",
							"title"=>"Manange Users",
							"view"=>"users",
							"table_prefix"=>"",
							
						),
	'tools'=>array(
					"twitterassistant"=>"Twitter Assistant",
					"mediamanagement" => "Media Management",
					"appmanangement"  => "App Management",
					"seotracking"  => "SEO Tracking",
					"seooutreach"  => "Outreach",
					"users"  => "User Management",
					"seokeywordresearch"  => "Keyword Research",
					"yelpoutreach"  => "Yelp Outreach",
					"amzranktracker"  => "Rank Tracker",
					"smsoutreach"  => "Outreach",
					"quizapp"  => "Quize App",
				)

];