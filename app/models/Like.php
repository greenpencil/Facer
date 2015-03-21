<?php

class Like extends \Eloquent {
	protected $table = 'likes';

	protected $fillable = ['post_id','user_id'];

	public function post()
	{
		return $this->belongsTo('Post');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}