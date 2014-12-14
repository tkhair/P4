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

	public function store(Project $project)
	{
		$input = Input::all();
		$input['user_id'] = User::first()->id;
		$input['project_id'] = $project->id;
		$validator = Validator::make(
			$input,
			[
				'name' => ['required', 'min:3'],
				'user_id' => ['required', 'integer'],
				'project_id' => ['required', 'integer'],
			]
		);
		if ($validator->passes()){
			
			Task::create($input);
		}

		return Redirect::route('projects.tasks.index', $project->id)->with('message', 'Task successfully created');

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