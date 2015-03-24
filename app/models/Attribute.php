<?php

class Attribute extends \Eloquent {
	protected $table = 'attributes';

	protected $fillable = ['name', 'profile_text', 'desc', 'icon'];

	public function hasUsers()
	{
		return $this->belongsToMany('User')->withPivot('value');
	}
}