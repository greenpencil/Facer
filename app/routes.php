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

// Routes for the authentication system
Route::post('login', array('uses' => 'UserController@login'));
Route::post('register', array('uses' => 'UserController@register'));
Route::get('logout', array('uses' => 'UserController@logout'));

// Routes for the post system
Route::post('post/new', array('before' => 'auth', 'uses' => 'PostController@create'));
Route::get('view/{post_id}', array('before' => 'auth', 'uses' => 'PostController@makePost'));
//Route::post('/post/delete', array('before' => 'auth','uses' => 'PostController@remove'));

// Routes for the comment system
Route::post('comment/new/{post_id}', array('before' => 'auth', 'uses' => 'PostController@comment'));
//Route::get('/comment/remove/{post_id}', array('before' => 'auth', 'uses' => 'PostController@unlike'));

// Routes for liking posts
Route::get('like/{post_id}', array('before' => 'auth', 'uses' => 'PostController@like'));
Route::get('unlike/{post_id}', array('before' => 'auth', 'uses' => 'PostController@unlike'));

// Routes for notifications
Route::get('notification/remove/{notification_id}', array('before' => 'auth', 'uses' => 'NotificationController@remove'));


// Routes for friends
Route::get('acceptfriend/{user_id}', array('before' => 'auth', 'uses' => 'UserController@acceptFriendRequest'));
Route::get('declinefriend/{user_id}', array('before' => 'auth', 'uses' => 'UserController@declineFriendRequest'));
Route::get('newfriend/{user_id}', array('before' => 'auth', 'uses' => 'UserController@newFriendRequest'));

//Routes for profiles
Route::get('profile/{username}', array('before' => 'auth', 'uses' => 'UserController@createProfile'));

// This is all very confusing
Route::get('test', function()
{
    foreach(User::find(11)->hasAttributes()->get() as $attribute)
    {
        echo "<i class='fa ".$attribute->icon."'></i>".str_replace("%".strtoupper($attribute->name)."%", $attribute->pivot->value, $attribute->profile_text)."</br>";
    }
});