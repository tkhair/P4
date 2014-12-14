@extends('layouts.master')
@section('title')
Create new project
@stop

@section('content')
	<h1>Create new project</h1>
	{{ Form::model(new Project, ['route' => ['projects.store']]) }}
		@include('projects/partials/_form', ['submit' => 'Create'])
	{{ Form::close() }}
@stop