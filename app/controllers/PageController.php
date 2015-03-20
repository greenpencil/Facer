<?php

class PageController extends \BaseController {

	public function newsFeed()
	{
		$posts = Post::orderBy('created_at', 'DESC')->get();
		return View::make('pages.newsfeed', ['posts' => $posts]);
	}

	public function homePage()
	{
		return View::make('pages.home');
	}

}