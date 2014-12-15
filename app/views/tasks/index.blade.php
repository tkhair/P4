@extends('layouts.master')
@section('title')
{{ $project->name }} | Tasks
@stop

@section('content')
	<h1>{{ $project->name }}</h1>
	<ul class="list-unstyled">
		@forelse ( $tasks as $task )
			@include('tasks/partials/_task', ['task' => $task, 'project' => $project])
		@empty
			No tasks. <a href="{{ route('projects.tasks.create', $project->id) }}">Create new task</a>
		@endforelse
	</ul>
	<div class="row">
		{{ $tasks->links() }}
	</div>
@stop