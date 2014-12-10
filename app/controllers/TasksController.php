<?php

class ProjectsController extends BaseController {
	public function index()
	{
		return View::make('projects.index');
	}

	public function create()
	{
		return View::make('projects.create');
	}

	public function store()
	{

	}

	public function show()
	{
		return View::make('projects.show');
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