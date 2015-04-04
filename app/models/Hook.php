<?php

class Hook extends \Eloquent {
	protected $table = 'hooks';

	protected $fillable = [];

	function hasNotification()
	{
		return $this->hasMany('Notification');
	}
}