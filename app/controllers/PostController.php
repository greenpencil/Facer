<?php

class PostController extends \BaseController {

	public function create()
	{
		$data['text'] = Input::get('text');
		$data['user_id']= Auth::user()->id;
		$validator = Validator::make(
			$data,
			[
				'text' => 'Required|Min:3|Max:300',
			]
		);
		if($validator->fails()){
			return Redirect::to('/')->withErrors($validator)->withInput();
		}
		Post::create($data);
		return Redirect::to('/');
	}

	public function like($post_id)
	{
		Like::create(array(
			'post_id' => $post_id,
			'user_id' => Auth::user()->id
		));
		return Redirect::to('/');
	}

	public function unlike($post_id)
	{
		Like::where('post_id', '=', $post_id)->where('user_id', '=', Auth::user()->id)->delete();
		return Redirect::to('/');
	}

}