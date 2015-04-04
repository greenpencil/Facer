<?php

class HookController extends \BaseController
{
	function newComment($user_id, $poster_id, $post_id)
	{
		Notification::create(array(
			"user_id" => $user_id,
			"poster_id" => $poster_id,
			"hook_id" => "1",
			"post_id" => $post_id
		));
	}

	function newLike($user_id, $poster_id, $post_id)
	{
		Notification::create(array(
			"user_id" => $user_id,
			"poster_id" => $poster_id,
			"hook_id" => "2",
			"post_id" => $post_id
		));
	}

	function acceptedRequest($user_id, $poster_id)
	{
		Notification::create(array(
			"user_id" => $user_id,
			"poster_id" => $poster_id,
			"hook_id" => "3"
		));
	}

	function alsoReplied($user_id, $poster_id, $post_id)
	{
		Notification::create(array(
			"user_id" => $user_id,
			"poster_id" => $poster_id,
			"hook_id" => "4",
			"post_id" => $post_id
		));
	}
}