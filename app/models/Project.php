<?php

class Project extends Eloquent {

	protected $fillable = ['name', 'user_id'];

	public static $rules = [
		'name' => ['required', 'min:3'],
		'user_id' => ['required', 'integer']
	];

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function tasks()
	{
		return $this->hasMany('Task');
	}
}