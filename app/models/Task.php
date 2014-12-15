<?php

class Task extends Eloquent {

	protected $fillable = ['name', 'description', 'user_id', 'project_id'];

	public static $rules = [
		'name' => ['required', 'min:3'],
		'user_id' => ['required', 'integer'],
		'project_id' => ['required', 'integer'],
	];
	
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function project()
	{
		return $this->belongsTo('Project');
	}
}