<?php

class PageController extends \BaseController {

	public function newsFeed()
	{
		$friends = Auth::user()->hasFriends->merge(Auth::user()->madeFriends);

		//THERE'S PROBABLY A MUCH BETTER WAY OF DOING THIS
		$posts = new \Illuminate\Database\Eloquent\Collection();
		foreach($friends as $friend)
		{
			$posts = $posts->merge($friend->posts);
		}
		$posts = $posts->merge(Auth::user()->posts);

		$posts = $posts->sortByDesc(function($post)
		{
			return $post->created_at;
		});

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