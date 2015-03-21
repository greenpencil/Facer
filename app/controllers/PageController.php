<?php

class PageController extends \BaseController {

	public function newsFeed()
	{
		$posts = Post::orderBy('created_at', 'DESC')->get();

		$likes = Auth::user()->likes->map(function($like)
		{
			return $like->post_id;
		});
		return View::make('pages.newsfeed', ['posts' => $posts,'likes' => $likes]);

		//return var_dump(Auth::user()->likes->toArray());
	}

	public function homePage()
	{
		return View::make('pages.home');
	}

}