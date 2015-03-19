<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
if(Auth::check()) {
    Route::get('/', array('as' => 'newsfeed', 'uses' => 'PageController@newsFeed'));
}else{
    Route::get('/', array('as' => 'login', 'uses' => 'PageController@homePage'));
}
