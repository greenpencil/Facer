<?php

class Post extends \Eloquent {
	protected $table = 'posts';

	protected $fillable = [];

	public function comments()
	{
		return $this->hasMany('Comment', 'post_id');
	}

	public function likes()
	{
		return $this->hasMany('Like', 'post_id');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}