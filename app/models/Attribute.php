<?php

class Attribute extends \Eloquent {
	protected $table = 'attributes';

	protected $fillable = ['user_id', 'attribute_id', 'value'];

	public function hasUsers()
	{
		return $this->belongsToMany('User', 'user_attributes', 'user_id', 'attribute_id')->withTimestamps();
	}
}