@extends('layouts.master')
@section('content')
	<a href="{{ route('projects.index') }}">All projects</a> | 
	<a href="{{ route('projects.create') }}">Create new</a>
	<h1>Create new project</h1>
	{{ Form::model(new Project, ['route' => ['projects.store']]) }}
		@include('projects/partials/_form', ['submit' => 'Create'])
	{{ Form::close() }}
@stop