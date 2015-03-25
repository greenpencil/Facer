<?php

class Attribute extends \Eloquent {
	protected $table = 'attributes';

	protected $fillable = ['user_id', 'attribute_id', 'value'];

	public function hasUsers()
	{
		return $this->belongsToMany('User', 'users_attributes', 'attribute_id', 'user_id')->withPivot('value')->withTimestamps();
	}
}