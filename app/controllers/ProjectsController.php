<?php

class ProjectsController extends BaseController {

	private $_user = null;

	public function __construct()
	{
		$this->beforeFilter('auth');

		if(Auth::check()){
			$this->_user = Auth::user();
		}
		$this->beforeFilter('@checkAccess', ['only' => ['show', 'edit', 'update', 'destroy']]);
		
		parent::__construct();
	}
	
	public function index()
	{
		$projects = $this->_user->projects()->orderBy('created_at', 'DESC')->paginate(10);

		return View::make('projects.index', compact('projects'));
	}

	public function create()
	{
		return View::make('projects.create');
	}

	public function store()
	{
		$input = Input::all();
		$input['user_id'] = $this->_user->id;
		$validator = Validator::make($input, Project::$rules);
		
		if ($validator->passes()){
			Project::create($input);
			return Redirect::route('projects.index')->with('success_message', 'Project successfully created');
		} else {
			return Redirect::route('projects.create')->withInput()->with('error_message', 'Errors while creating project');

		}
	}

	public function show(Project $project)
	{
		$tasks = $project->tasks()->orderBy('completed_at')->orderBy('created_at', 'DESC')->paginate(10);
		return View::make('projects.show', compact('project', 'tasks'));
	}

	public function edit(Project $project)
	{
		return View::make('projects.edit', compact('project'));
	}

	public function update(Project $project)
	{
		$input = Input::all();
		$input['user_id'] = $this->_user->id;
		$validator = Validator::make($input, Project::$rules);

		if($validator->passes()){
			$project->update($input);
			return Redirect::route('projects.index')->with('success_message', 'Project "' . $project->name . '" successfully updated');
		} else {
			return Redirect::route('projects.edit', $project->id)->withInput()->with('error_message', 'Error updating project "' . $project->name);
		}

	}

	public function destroy(Project $project)
	{
		$project->delete();
		return Redirect::route('projects.index')->with('success_message', 'Project successfully deleted');
	}

	public function checkAccess($route, $request)
	{
		if($route->parameter('projects')->user_id != $this->_user->id){
			return Redirect::route('projects.index')->with('error_message', 'Not allowed');
		}
	}
}