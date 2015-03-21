<?php

class Comment extends \Eloquent {
	protected $table = 'comments';

	protected $fillable = ['post_id', 'user_id', 'text'];

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function post()
	{
		return $this->belongsTo('Post');
	}
}