<?php

class Project extends Eloquent {

	protected $fillable = ['name', 'user_id'];

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function tasks()
	{
		return $this->hasMany('Task');
	}
}