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
		} else {

		}

		return Redirect::route('projects.index')->with('message', 'Project successfully created');
	}

	public function show(Project $project)
	{
		$tasks = $project->tasks()->orderBy('created_at', 'DESC')->paginate(10);
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
		} else {

		}

		return Redirect::route('projects.index')->with('message', 'Project "' . $project->name . '" successfully updated');
	}

	public function destroy(Project $project)
	{
		
		$project->delete();
		return Redirect::route('projects.index')->with('message', 'Project successfully deleted');
	}

	public function checkAccess($route, $request)
	{
		if($route->parameter('projects')->user_id != $this->_user->id){
			return Redirect::route('projects.index')->with('message', 'Not allowed');
		}
	}
}