<?php

class PageController extends \BaseController {

	public function newsFeed()
	{
		$posts = Post::all()->sortBy('created_at');
		return View::make('pages.newsfeed', ['posts' => $posts]);
	}

	public function homePage()
	{
		return View::make('pages.home');
	}

}