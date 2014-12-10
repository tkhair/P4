@extends('layouts.master')
@section('content')
	<a href="{{ route('projects.index') }}">All projects</a> | 
	<a href="{{ route('projects.create') }}">Create new</a>
	<h1>{{ $project->name }}</h1>
	<ul>
		@forelse ( $tasks as $task )
			<li><a href="{{ route('projects.tasks.show', $project->id, $task->id) }}">{{ $task->name }}</a></li>
		@empty
			No tasks. <a href="{{ route('projects.tasks.create', $project->id) }}">Create new task</a>
		@endforelse
	</ul>
@stop