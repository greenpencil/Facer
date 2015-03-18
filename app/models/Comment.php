<?php

class Comment extends \Eloquent {
	protected $table = 'comments';

	protected $fillable = [];

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function post()
	{
		return $this->belongsTo('Post');
	}
}