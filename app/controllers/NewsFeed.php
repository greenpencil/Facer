<?php

class NewsFeed extends \BaseController {

	public function show()
	{
		$posts = Post::all();
		return View::make('pages.newsfeed', ['posts' => $posts]);
	}

}