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
				->with('login_success', 'Hey ' . Auth::user()->first_name .' welcome back to facer.');
		}

		// authentication failure! lets go back to the login page
		return Redirect::route('login')
			->with('login_error', 'Your Email or Password was incorrect, try again')
			->withInput();
	}
}