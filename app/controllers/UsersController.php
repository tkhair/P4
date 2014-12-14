<?php 
class UsersController extends BaseController {

	private $_rules = [
		'email' => ['required', 'email'],
		'password' => ['required', 'min:4']
	];

	public function login()
	{
		return View::make('users.login');
	}

	public function handleLogin()
	{
		$input = Input::only(['email', 'password']);

		if(Auth::attempt(['email' => $input['email'], 'password' => $input['password']])){
			return Redirect::route('projects.index');
		} else {
			return Redirect::route('login')->withInput();
		}
	}

	public function logout()
	{
		if(Auth::check()){
			Auth::logout();
		}

		return Redirect::route('login');
	}

	public function create()
	{
		return View::make('users.create');
	}

	public function store()
	{
		$input = Input::only(['email', 'password']);
		$validator = Validator::make($input, $this->_rules);
		
		if ($validator->passes()){
			$user = User::create($input);
			if ($user){
				Auth::login($user);
				return Redirect::route('projects.index')->with('message', 'Registration successfull');
			}
		} else {
			return Redirect::route('users.create')->withInput();
		}
	}

}	