<?php

class ProjectsController extends BaseController {
	
	public function index()
	{
		$projects = Project::orderBy('created_at', 'DESC')->paginate(10);

		return View::make('projects.index', compact('projects'));
	}

	public function create()
	{
		return View::make('projects.create');
	}

	public function store()
	{

	}

	public function show(Project $project)
	{
		$tasks = $project->tasks()->orderBy('created_at', 'DESC')->paginate(10);
		return View::make('projects.show', compact('project', 'tasks'));
	}

	public function edit()
	{
		return View::make('projects.edit');
	}

	public function update()
	{

	}

	public function destroy()
	{

	}
}