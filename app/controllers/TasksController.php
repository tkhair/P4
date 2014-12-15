<?php

class TasksController extends BaseController {

	private $_user = null;

	public function __construct()
	{
		$this->beforeFilter('auth');

		if(Auth::check()){
			$this->_user = Auth::user();
		}
		$this->beforeFilter('@checkAccess', ['only' => ['show', 'edit', 'update', 'destroy']]);
		$this->beforeFilter('ajax', ['only' => ['toggle']]);
		
		parent::__construct();
	}

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
		$input['user_id'] = $this->_user->id;
		$input['project_id'] = $project->id;
		$validator = Validator::make($input, Task::$rules);
		
		if ($validator->passes()){
			Task::create($input);
		}

		return Redirect::route('projects.show', $project->id)->with('success_message', 'Task successfully created');

	}

	public function show()
	{
		return View::make('tasks.show');
	}

	public function edit(Project $project, Task $task)
	{
		return View::make('tasks.edit', compact('project', 'task'));
	}

	public function update(Project $project, Task $task)
	{
		$input = Input::all();
		$input['user_id'] = $this->_user->id;
		$input['project_id'] = $project->id;
		$validator = Validator::make($input, Task::$rules);

		if($validator->passes()){
			$task->update($input);
		} else {

		}

		return Redirect::route('projects.show', $project->id)->with('success_message', 'Task "' . $task->name . '" successfully updated');
	}

	public function destroy(Project $project, Task $task)
	{
		$task->delete();
		return Redirect::route('projects.show', $project->id)->with('success_message', 'Task successfully deleted');
	}

	public function toggle($id)
	{
		$task = Task::find($id);

		if ($task->project->user_id != $this->_user->id){
			return Response::make('Unauthorized', 401);
		}

		if($task->completed_at){
			$task->completed_at = null;
		} else {
			$task->completed_at = new DateTime;
		}
		$task->save();

		return Response::json([
			'task' => $task
		]);
	}

	public function checkAccess($route, $request)
	{
		if($route->parameter('projects')->user_id != $this->_user->id){
			return Redirect::route('projects.index')->with('error_message', 'Not allowed');
		}
	}
}