<?php

class Task extends Eloquent {

	protected $fillable = ['name', 'description', 'user_id', 'project_id'];
	
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function project()
	{
		return $this->belongsTo('Project');
	}
}