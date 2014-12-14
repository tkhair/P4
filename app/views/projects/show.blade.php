@extends('layouts.master')
@section('title')
{{ $project->name }}
@stop

@section('content')
	<h1>
		{{ $project->name }}
	</h1>

	{{ Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'DELETE', 'class' => 'inline']) }}
		<a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit Project</a>
		{{ Form::submit('Delete project', ['class' => 'btn btn-danger btn-sm']) }}
	{{ Form::close() }}
	<ul>
		{{ Form::model(new Task, ['route' => ['projects.tasks.store', $project->id]]) }}
			@include('tasks/partials/_form', ['submit' => 'Create task'])
		{{ Form::close() }}

		@forelse ( $tasks as $task )
			<li>
				<h3>
					<a href="{{ route('projects.tasks.show', [$project->id, $task->id]) }}">{{ $task->name }}</a>
				</h3>
			</li>
		@empty
			<h2>No tasks</h2>
		@endforelse
	</ul>
@stop