@extends('layouts.master')
@section('title')
{{ $project->name }}
@stop

@section('content')
	<a href="{{ route('projects.index') }}">All projects</a> | 
	<a href="{{ route('projects.create') }}">Create new</a>
	<h1>{{ $project->name }}</h1>
	<ul>
		{{ Form::model(new Task, ['route' => ['projects.tasks.store', $project->id]]) }}
			@include('tasks/partials/_form', ['submit' => 'Create task'])
		{{ Form::close() }}

		@forelse ( $tasks as $task )
			<li><a href="{{ route('projects.tasks.show', $project->id, $task->id) }}">{{ $task->name }}</a></li>
		@empty
			No tasks.
		@endforelse
	</ul>
@stop