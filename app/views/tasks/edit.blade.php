@extends('layouts.master')

@section('title')
Edit task {{ $task->name }}
@stop

@section('content')
	<h1>Edit task <em>{{ $task->name }}</em></h1>
	{{ Form::model($task, ['route' => ['projects.tasks.update', $project->id, $task->id], 'method' => 'PATCH']) }}
		@include('tasks/partials/_form', ['submit' => 'Edit']) or <a href="{{ route('projects.show', $project->id) }}">back to project</a>
	{{ Form::close() }}
@stop