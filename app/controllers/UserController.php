<?php

class UserController extends \BaseController {

	public function login()
	{
		$user = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		);

		if (Auth::attempt($user)) {
			return Redirect::to('/')
				->with('login_success', 'Hey ' . Auth::user()->first_name .' welcome back to Facer.');
		}

		// authentication failure! lets go back to the login page
		return Redirect::route('login')
			->with('login_error', 'Your Email or Password was incorrect, try again');
	}

	public function logout()
	{
		if(Auth::check())
		{
			Auth::logout();
			return Redirect::to('/')
				->with('login_notice','You have now been logged out');
		}
		{
			return Redirect::to('/');
		}
	}

	public function register()
	{
		$data = Input::only(['first_name', 'last_name', 'password','password_confirmation']);
		$data['email']= Input::get('register_email');
		$data['username'] = Input::get('first_name').'.'.Input::get('last_name');
		$validator = Validator::make(
			$data,
			[
				'first_name' => 'Required|Min:3|Max:20|Alpha',
				'last_name' => 'Required|Min:3|Max:20|Alpha',
				'email' => 'required|email|min:5',
				'password'  =>'Required|AlphaNum|Between:4,30|Confirmed',
				'password_confirmation'=>'Required|AlphaNum|Between:4,30'
			]
		);
		if($validator->fails()){
			return Redirect::to('/')->withErrors($validator)->withInput();
		}
		$newUser = User::create($data);
		if($newUser){
			Auth::login($newUser);
			return Redirect::to('/')->with('login_success', 'Hey ' . Auth::user()->first_name .' welcome to Facer.');;
		}
	}

	public function newFriendRequest($user_id)
	{
		Auth::user()->madeFriendRequest()->attach($user_id);
		return Redirect::to('/profile/'.$user_id);
	}

	public function declineFriendRequest($user_id)
	{
		Auth::user()->hasFriendRequest()->detach($user_id);
		return Redirect::to('/');
	}

	public function acceptFriendRequest($user_id)
	{
		Auth::user()->madeFriends()->attach($user_id);
		Auth::user()->hasFriendRequest()->detach($user_id);
		return Redirect::to('/');
	}

	public function createProfile($username)
	{
		$user = User::whereUsername($username)->firstOrFail();

		$friends = $user->hasFriends->merge($user->madeFriends);

		$posts = $user->posts;
		$posts = $posts->sortByDesc(function($post)
		{
			return $post->created_at;
		});

		$likes = Auth::user()->likes->map(function($like)
		{
			return $like->post_id;
		});

		return View::make('pages.profile', ['user' => $user, 'posts' => $posts, 'likes' => $likes,  'friends' => $friends]);
	}
}