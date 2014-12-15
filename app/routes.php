<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'ProjectsController@index']);

Route::get('login', ['as' => 'login', 'uses' => 'UsersController@login']);
Route::post('login', ['as' => 'login', 'uses' => 'UsersController@handleLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'UsersController@logout']);
Route::get('register', ['as' => 'register', 'uses' => 'UsersController@register']);

Route::post('ajax/task/{id}/toggle', ['as' => 'toggle-task', 'uses' => 'TasksController@toggle']);

Route::get('tasks/completed', ['as' => 'completed', 'uses' => 'TasksController@completed']);
Route::get('tasks/incomplete', ['as' => 'incomplete', 'uses' => 'TasksController@incomplete']);

Route::model('tasks', 'Task');
Route::model('projects', 'Project');

Route::resource('projects', 'ProjectsController');
Route::resource('projects.tasks', 'TasksController');

Route::resource('users', 'UsersController');

Route::filter('ajax', function(){
	if (!Request::ajax()){
		return Response::make('Wrong request type', 401);
	}
});