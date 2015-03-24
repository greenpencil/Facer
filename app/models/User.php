<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	protected $fillable = ['first_name','last_name','username','email','password'];


	public function posts()
	{
		return $this->hasMany('Post', 'user_id');
	}

	public function comments()
	{
		return $this->hasMany('Comment', 'user_id');
	}

	public function likes()
	{
		return $this->hasMany('Like', 'user_id');
	}

	public function hasFriends()
	{
		return $this->belongsToMany('User', 'friends', 'user_id', 'user_id_2')->withTimestamps();
	}

	public function madeFriends()
	{
		return $this->belongsToMany('User', 'friends', 'user_id_2', 'user_id')->withTimestamps();

	}

	public function hasFriendRequest()
	{
		return $this->belongsToMany('User', 'frequests', 'user_id', 'user_id_2')->withTimestamps();
	}

	public function madeFriendRequest()
	{
		return $this->belongsToMany('User', 'frequests', 'user_id_2', 'user_id')->withTimestamps();
	}

	public function hasAttributes()
	{
		return $this->belongsToMany('Attribute', 'user_attributes', 'attribute_id', 'user_id')->withTimestamps();
	}
}
