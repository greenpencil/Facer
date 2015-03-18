<?php

class Like extends \Eloquent {
	protected $table = 'likes';

	protected $fillable = [];

	public function post()
	{
		return $this->belongsTo('Post');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}