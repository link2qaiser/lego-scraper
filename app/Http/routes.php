<?php

Route::group(['middlewareGroups' => ['web']], function() {
    Route::auth();
    

    /* Token Validation */
	Route::post('/verifyToken/validate-token' , 'LoginController@validateToken');

	/*
	START TWITTER ASSISTANT ROUTES

	*/
    $module =  config('constants.twitterassistant.module');

	Route::get($module , $module.'\UserController@accountslist');
    Route::get($module.'/accounts/update/{id?}' , $module.'\UserController@update');
    Route::post($module.'/accounts/update/{id?}', [
        'as' => 'updatecat',
        'uses' => $module.'\UserController@update'
    ]);
    Route::get($module.'/accounts/delete/{id}', $module.'\UserController@delete');

    
    //CRON ROUTES
    Route::get($module.'/crons/feedtweets', $module.'\FeedTweets@index');
    Route::get($module.'/crons/posttweet', $module.'\PostTweet@index');
    /*
    END TWITTER ASSISTANT ROUTES
    */



});

