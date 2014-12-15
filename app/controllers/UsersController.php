<?php 
class UsersController extends BaseController {

	public function login()
	{
		return View::make('users.login');
	}

	public function handleLogin()
	{
		$input = Input::only(['email', 'password']);

		if(Auth::attempt(['email' => $input['email'], 'password' => $input['password']], true)){
			return Redirect::intended('projects')->with('success_message', 'Successfully logged in');
		} else {
			return Redirect::route('login')->withInput()->with('error_message', 'Wrong username or password');
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
		$validator = Validator::make($input, User::$rules);
		
		if ($validator->passes()){
			$input['password'] = Hash::make($input['password']);
			$user = User::create($input);
			if ($user){
				Auth::login($user);
				return Redirect::route('projects.index')->with('success_message', 'Registration successfull');
			}
		} else {
			return Redirect::route('users.create')->withInput()->with('error_message', 'Error registering new user');
		}
	}

}	