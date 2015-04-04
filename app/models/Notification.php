<?php

class Notification extends \Eloquent {
	protected $table = 'notifications';

	protected $fillable = ['user_id', 'poster_id', 'hook_id', 'post_id', 'comment_id'];

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function poster()
	{
		return $this->belongsTo('User','poster_id');
	}

	public function post()
	{
		return $this->belongsTo('Post','post_id');
	}

	public function hook()
	{
		return $this->belongsTo('Hook');
	}
}