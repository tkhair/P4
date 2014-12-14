<?php

class ProjectsController extends BaseController {

	private $_rules = [
		'name' => ['required', 'min:3'],
		'user_id' => ['required', 'integer']
	];

	private $_user_id = null;

	public function __construct()
	{
		parent::__construct();
		$this->_user_id = User::first()->id;
		//$this->_user_id = Auth::user()->id;
	}
	
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
		$input = Input::all();
		$input['user_id'] = $this->_user_id;
		$validator = Validator::make($input, $this->_rules);
		
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
		$input['user_id'] = $this->_user_id;
		$validator = Validator::make($input, $this->_rules);

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
}