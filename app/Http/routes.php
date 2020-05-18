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

    //CATEGORY REOUTS
     
    Route::get($module.'/category', $module.'\CategoryController@view');
    Route::get($module.'/category/add', $module.'\CategoryController@add');
    Route::get($module.'/category/update/{id?}', $module.'\CategoryController@update');
    Route::get($module.'/category/delete/{id}', $module.'\CategoryController@delete');
    Route::post($module.'/category/add', [
        'as' => 'addcat',
        'uses' => $module.'\CategoryController@add'
    ]);
    Route::post($module.'/category/update/{id?}', [
        'as' => 'updatecat',
        'uses' => $module.'\CategoryController@update'
    ]);

    //RSS REOUTS
     
    Route::get($module.'/rss', $module.'\RSSController@view');
    Route::get($module.'/rss/add', $module.'\RSSController@add');
    Route::get($module.'/rss/update/{id?}', $module.'\RSSController@update');
    Route::get($module.'/rss/delete/{id}', $module.'\RSSController@delete');
    Route::post($module.'/rss/add', [
        'as' => 'addcat',
        'uses' => $module.'\RSSController@add'
    ]);
    Route::post($module.'/rss/update/{id?}', [
        'as' => 'updatecat',
        'uses' => $module.'\RSSController@update'
    ]);   
    
    //CRON ROUTES
    Route::get($module.'/crons/feedtweets', $module.'\FeedTweets@index');
    Route::get($module.'/crons/posttweet', $module.'\PostTweet@index');
    /*
    END TWITTER ASSISTANT ROUTES
    */


    /*
    START INSTAGRAM MEDIA MANAGEMENT ROUTES
    */ 
    //INSTAGRAM JSON
    $module =  config('constants.mediamanagement.module');
    Route::get($module , $module.'\MainController@index');
    Route::get($module."/delete/{id}" , $module.'\MainController@delete');

    Route::get($module.'/instagram/uploadjson', $module.'\InstagramController@uploadjson');

    Route::post($module.'/instagram/uploadjson', [
        'as' => 'uploadjson',
        'uses' => $module.'\InstagramController@uploadjson'
    ]);  
    Route::get($module.'/instagram/scrapmedia', $module.'\InstagramController@scrapmedia');


    /*
    APP MANAGEMENT ROUTES
    */
    $module =  config('constants.appmanangement.module');

    //STORE ROUTES
    Route::get($module , $module.'\StoreController@index');
    Route::get($module.'/store/add', $module.'\StoreController@add');
    Route::post($module.'/store/add', [
        'as' => 'storeadd',
        'uses' => $module.'\StoreController@add'
    ]);
    Route::get($module.'/store/delete/{id}', $module.'\StoreController@delete');
    Route::get($module.'/store/update/{id?}', $module.'\StoreController@update');
    Route::post($module.'/store/update/{id?}', [
        'as' => 'updatestore',
        'uses' => $module.'\StoreController@update'
    ]);  
    

    //APP CONTROLLER
    Route::get($module.'/app', $module.'\AppController@index');
    Route::post($module.'/add', $module.'\AppController@add');
    Route::post($module.'/app/add', [
        'as' => 'appadd',
        'uses' => $module.'\AppController@add'
    ]);
    Route::get($module.'/app/update/{id?}', $module.'\AppController@update');
    Route::post($module.'/app/update/{id?}', [
        'as' => 'updatestore',
        'uses' => $module.'\AppController@update'
    ]); 
    Route::get($module.'/app/delete/{id}', $module.'\AppController@delete');

    //CATEGORY CONTROLLER
    Route::get($module.'/category/{id?}', $module.'\CategoryController@index');
    Route::get($module.'/category/add/{id?}', $module.'\CategoryController@add');
    Route::post($module.'/category/add/{id?}', [
        'as' => 'categoryadd',
        'uses' => $module.'\CategoryController@add'
    ]);
    Route::get($module.'/category/update/{id?}', $module.'\CategoryController@update');
    Route::post($module.'/category/update/{id?}', [
        'as' => 'updatecategory',
        'uses' => $module.'\CategoryController@update'
    ]); 
    Route::get($module.'/category/delete/{id}', $module.'\CategoryController@delete');

    //POST CONTROLLER
    Route::get($module.'/post/{id?}', $module.'\PostController@index');
    Route::get($module.'/post/add/{id?}', $module.'\PostController@add');
    Route::post($module.'/post/add/{id?}', [
        'as' => 'postadd',
        'uses' => $module.'\PostController@add'
    ]);
    Route::get($module.'/post/update/{id?}', $module.'\PostController@update');
    Route::post($module.'/post/update/{id?}', [
        'as' => 'updatepost',
        'uses' => $module.'\PostController@update'
    ]); 
    Route::get($module.'/post/delete/{id}', $module.'\PostController@delete');


    //APP CONTROLLER
    $module =  config('constants.ttsyt.module');
    Route::get($module, $module.'\MainController@index');
    Route::post($module, $module.'\MainController@index');


    //ARTILE TO VIDEO
    $module =  config('constants.articletovideo.module');
    Route::get($module, $module.'\MainController@index');
    Route::get($module.'/scrapdata', $module.'\MainController@scrapData');


    /*
    USERS ROUTES
    */
    $module =  config('constants.users.module');
    //CAMPAIGN ROUTES
    Route::get($module , $module.'\UsersController@view');
    Route::get('modal/'.$module.'/create' , $module.'\UsersController@create');
    Route::post($module.'/create', $module.'\UsersController@create');

    Route::get('modal/'.$module.'/update' , $module.'\UsersController@update');
    Route::post($module.'/update/{id?}', $module.'\UsersController@update');

    Route::get($module.'/update-status/{status?}/{id?}', $module.'\UsersController@updateStatus');
    Route::get($module.'/delete/{id}', $module.'\UsersController@delete');
  
    /*
    SEO OUTREACH ROUTES
    */
    $module =  config('constants.seooutreach.module');
    //CAMPAIGN ROUTES
    Route::get($module , $module.'\CompaignController@view');
    Route::get('modal/'.$module.'/compaign/create' , $module.'\CompaignController@create');
    Route::post($module.'/compaign/create', $module.'\CompaignController@create');

    Route::get('modal/'.$module.'/compaign/update' , $module.'\CompaignController@update');
    Route::post($module.'/compaign/update/{id?}', $module.'\CompaignController@update');

    Route::get($module.'/compaign/update-status/{status?}/{id?}', $module.'\CompaignController@updateStatus');
    Route::get($module.'/compaign/delete/{id}', $module.'\CompaignController@delete');



    //FOOTPRINT ROUTE
    Route::get($module.'/footprint/view', $module.'\FootprintController@view');
    Route::get('modal/seooutreach/footprint/create' , $module.'\FootprintController@createModal');
    Route::post($module.'/footprint/add', $module.'\FootprintController@add');
    Route::get($module.'/footprint/delete/{id}', $module.'\FootprintController@delete');

    Route::get($module.'/footprint/export', $module.'\FootprintController@export');

    

    //KEYWORDS ROUTES
    Route::get($module.'/keyword/view' , $module.'\KeywordController@view');
    Route::get('modal/seooutreach/keyword/create/{id?}' , $module.'\KeywordController@create');
    Route::post($module.'/keyword/create/{id?}', $module.'\KeywordController@create');
    
    Route::get('modal/'.$module.'/keyword/export' , $module.'\KeywordController@exportModal');
    Route::post($module.'/keyword/export/{id}', $module.'\KeywordController@export');
    
    Route::get($module.'/keyword/delete/{id}', $module.'\KeywordController@delete');
    Route::get('cron/'.$module.'/load_to_couchbase', $module.'\KeywordController@loadToCouchbase');

    Route::post($module.'/keyword/update-tags', $module.'\KeywordController@updateTags');
    Route::post($module.'/keyword/update-note', $module.'\KeywordController@updateNotes');

    //LINKS ROUTES
    Route::get($module.'/link/export/{id}' , $module.'\LinksController@export');
    Route::post('cron/'.$module.'/link/create' , $module.'\LinksController@create');
    Route::get('cron/'.$module.'/link/extract' , $module.'\LinksController@extract');
    Route::get('cron/'.$module.'/link/extract_expire' , $module.'\LinksController@extractDeadLinks');
    
    

    //LINKS ROUTES
    Route::get('cron/'.$module.'/linkstats/update_mozstat' , $module.'\LinkStats@updateMozStat');

    //EMAIL CONTROLLER
    Route::get($module.'/email/view/{id?}' , $module.'\EmailController@view');
    Route::get($module.'/email/delete/{id?}' , $module.'\EmailController@delete');
    Route::get($module.'/email/export/{id}', $module.'\EmailController@export');
    Route::get('cron/'.$module.'/email/send' , $module.'\EmailController@send');

    //TEMLATE CONTROLLER
    Route::get($module.'/template/view' , $module.'\TemplateController@view');
    Route::get('modal/'.$module.'/template/create' , $module.'\TemplateController@createModal');
    Route::get('modal/'.$module.'/template/edit' , $module.'\TemplateController@editModal');
    Route::post($module.'/template/add', $module.'\TemplateController@add');
    Route::post($module.'/template/update/{id?}', $module.'\TemplateController@update');
    Route::get($module.'/template/delete/{id}', $module.'\TemplateController@delete');
    Route::get('modal/'.$module.'/shortcode/show' , $module.'\TemplateController@showShortCode');


    /*
    SEO OUTREACH ROUTES
    */
    $module =  config('constants.amzranktracker.module');
    //CAMPAIGN ROUTES
    Route::get($module , $module.'\ProductController@view');
    Route::get('modal/'.$module.'/product/create' , $module.'\ProductController@create');
    Route::post($module.'/product/create', $module.'\ProductController@create');

    Route::get('modal/'.$module.'/product/update' , $module.'\ProductController@update');
    Route::post($module.'/product/update/{id?}', $module.'\ProductController@update');

    Route::get($module.'/product/update-status/{status?}/{id?}', $module.'\ProductController@updateStatus');
    Route::get($module.'/product/delete/{id}', $module.'\ProductController@delete');



    //KEYWORDS ROUTES
    Route::get($module.'/keyword/view/{id?}' , $module.'\KeywordController@view');
    Route::get('modal/'.$module.'/keyword/create/{id?}' , $module.'\KeywordController@create');
    Route::post($module.'/keyword/create/{id?}', $module.'\KeywordController@create');

    
    Route::get('modal/'.$module.'/keyword/export' , $module.'\KeywordController@exportModal');
    Route::post($module.'/keyword/export/{id}', $module.'\KeywordController@export');
    
    Route::get($module.'/keyword/delete/{id}', $module.'\KeywordController@delete');
    Route::get('cron/'.$module.'/load_to_couchbase', $module.'\KeywordController@loadToCouchbase');

   
    
    

    



    /*
    URL TRACKING ROUTES
    */
    $module =  config('constants.seotracking.module');
    //CAMPAIGN ROUTES
    Route::get($module , $module.'\WebsiteController@view');
    Route::get('modal/seotracking/website/create' , $module.'\WebsiteController@createModal');
    Route::get('modal/seotracking/website/edit' , $module.'\WebsiteController@editModal');
    Route::post($module.'/website/add', $module.'\WebsiteController@add');
    Route::post($module.'/website/update/{id?}', $module.'\WebsiteController@update');
    Route::get($module.'/website/delete/{id}', $module.'\WebsiteController@delete');
    
    //KEYWORDS ROUTES
    Route::get($module.'/keyword/view/{id?}' , $module.'\KeywordController@view');
    Route::get('modal/'.$module.'/keyword/create/{id?}' , $module.'\KeywordController@createModal');
    Route::post($module.'/keyword/add/{id?}', $module.'\KeywordController@add');
    Route::get($module.'/keyword/delete/{id}', $module.'\KeywordController@delete');


    /*
    SMS OUTREACH ROUTES
    */
    $module =  config('constants.smsoutreach.module');
    //SMS CAMPAIGN ROUTES
    Route::get($module , $module.'\SmsController@view');
    Route::get('modal/smsoutreach/compaign/create' , $module.'\SmsController@createModal');
    Route::post($module.'/compaign/add', $module.'\SmsController@add');

    /*
    SEO KEYWORD RESEARCH ROUTES
    */
    $module =  config('constants.seokeywordresearch.module');
    //SEED KEYWORD ROUTES
    Route::get($module , $module.'\KeywordController@view');
    Route::get('modal/seokeywordresearch/seedkeyword/create' , $module.'\KeywordController@createModal');
    Route::get('modal/seokeywordresearch/seedkeyword/edit' , $module.'\KeywordController@editModal');
    Route::post($module.'/seedkeyword/add', $module.'\KeywordController@add');
    Route::post($module.'/seedkeyword/update/{id?}', $module.'\KeywordController@update');
    Route::get($module.'/seedkeyword/delete/{id}', $module.'\KeywordController@delete');
    //VIEW ALL KEYWORDS
    Route::get($module.'/seedkeyword/viewall/{id}', $module.'\KeywordController@viewAll');
    Route::get($module.'/seedkeyword/stared/{id}', $module.'\KeywordController@staredKeyword');
    Route::get($module.'/keywords/export/{id}' , $module.'\KeywordController@export');

    //SEED KEYWORD CRONS FOR PYTHON CODE
    Route::get("crons/".$module.'/getseedkeyword', $module.'\CronController@getSeedKeyword');
    Route::post("crons/".$module.'/storeseedkewyords', $module.'\CronController@storeSeedKewyords');

    //CRON ROUTES
    /*Route::get($module.'/crons/feedtweets', $module.'\FeedTweets@index');

    /*
    *
    QUIZ APPS
    *
    */
    $module =  config('constants.quizapp.module');
    //CATEGORY CONTROLLER
    Route::get($module , $module.'\CategoryController@index');
    Route::get($module.'/category', $module.'\CategoryController@index');
    Route::get($module.'/category/add', $module.'\CategoryController@add');
    Route::post($module.'/category/add', [
        'as' => 'categoryadd',
        'uses' => $module.'\CategoryController@add'
    ]);
    Route::get($module.'/category/update/{id?}', $module.'\CategoryController@update');
    Route::post($module.'/category/update/{id?}', [
        'as' => 'updatestore',
        'uses' => $module.'\CategoryController@update'
    ]); 
    Route::get($module.'/category/delete/{id}', $module.'\CategoryController@delete');
    //QUESTION ROUTES
    Route::get($module.'/question' , $module.'\QuestionController@index');
    Route::get($module.'/question/add', $module.'\QuestionController@add');
    Route::post($module.'/question/add', [
        'as' => 'questionadd',
        'uses' => $module.'\QuestionController@add'
    ]);
    Route::get($module.'/question/delete/{id}', $module.'\QuestionController@delete');


    //OPTIONS ROUTES
    Route::get($module.'/option/{id?}', $module.'\OptionController@index');
    Route::get($module.'/option/add/{id}', $module.'\OptionController@add');
    Route::post($module.'/option/add/{id}', [
        'as' => 'optionadd',
        'uses' => $module.'\OptionController@add'
    ]);
    
    Route::get($module.'/option/delete/{id}', $module.'\OptionController@delete');

    //RESULT ROUTES
    Route::get($module.'/result/{id?}' , $module.'\ResultController@index');
    Route::get($module.'/result/add/{id?}', $module.'\ResultController@add');
    Route::post($module.'/result/add/{id?}', [
        'as' => 'resultadd',
        'uses' => $module.'\ResultController@add'
    ]);
    Route::get($module.'/result/update/{id?}', $module.'\ResultController@update');
    Route::post($module.'/result/update/{id?}', [
        'as' => 'updateresult',
        'uses' => $module.'\ResultController@update'
    ]); 
    Route::get($module.'/result/delete/{id}', $module.'\ResultController@delete');
    /*
    *
    APP CONTROLLERS
    *
    */
    Route::get($module.'/app', $module.'\AppController@index');
    Route::post($module.'/add', $module.'\AppController@add');
    Route::post($module.'/app/add', [
        'as' => 'appadd',
        'uses' => $module.'\AppController@add'
    ]);
    Route::get($module.'/app/update/{id?}', $module.'\AppController@update');
    Route::post($module.'/app/update/{id?}', [
        'as' => 'updatestore',
        'uses' => $module.'\AppController@update'
    ]); 
    Route::get($module.'/app/delete/{id}', $module.'\AppController@delete');
   

    //POST CONTROLLER
    Route::get($module.'/post/{id?}', $module.'\PostController@index');
    Route::get($module.'/post/add/{id?}', $module.'\PostController@add');
    Route::post($module.'/post/add/{id?}', [
        'as' => 'postadd',
        'uses' => $module.'\PostController@add'
    ]);
    Route::get($module.'/post/update/{id?}', $module.'\PostController@update');
    Route::post($module.'/post/update/{id?}', [
        'as' => 'updatepost',
        'uses' => $module.'\PostController@update'
    ]); 
    Route::get($module.'/post/delete/{id}', $module.'\PostController@delete');
    /*
    DASHBAORD ROUTES
    */
    Route::get('/'          , 'DashboardController@index');
    Route::get('/dashboard' , 'DashboardController@index');

    /*
    AMAZON DEALS ROUTES
    */
    $module =  config('constants.amazondeals.module');
    Route::get($module.'/cron/update'          , $module.'\CronController@update');
    Route::get($module.'/cron/import'          , $module.'\CronController@importDataByJson');

    /*
    URL YELP TRACKING ROUTES
    */
    $module =  config('constants.yelpoutreach.module');
    //CAMPAIGN ROUTES
    Route::get($module , $module.'\YelpController@view');
    Route::get('modal/'.$module.'/link/add', $module.'\YelpController@add');
    Route::post($module.'/link/add', $module.'\YelpController@add');
    Route::get($module.'/link/delete', $module.'\YelpController@delete');
    //BUSINESS
    Route::get($module.'/business/export', $module.'\BusinessController@export');

});

