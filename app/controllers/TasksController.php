<?php

class TasksController extends BaseController {
	public function index(Project $project)
	{
		$tasks = $project->tasks()->orderBy('created_at', 'DESC')->paginate(10);
		return View::make('tasks.index', compact('project', 'tasks'));
	}

	public function create()
	{
		return View::make('tasks.create');
	}

	public function store()
	{

	}

	public function show()
	{
		return View::make('tasks.show');
	}

	public function edit()
	{
		return View::make('tasks.edit');
	}

	public function update()
	{

	}

	public function destroy()
	{
		
	}
}