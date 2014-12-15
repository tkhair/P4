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
	<ul class="task-list list-unstyled">
		{{ Form::model(new Task, ['route' => ['projects.tasks.store', $project->id]]) }}
			@include('tasks/partials/_form', ['submit' => 'Create task'])
		{{ Form::close() }}

		@forelse ( $tasks as $task )
			<li>
				<h3 class="task
					@if($task->completed_at)
						task-completed
					@else
						task-incomplete
					@endif
					"
					data-task="{{ $task->id }}"
				>
					{{ Form::open(['route' => ['projects.tasks.destroy', $project->id, $task->id], 'method' => 'DELETE', 'class' => 'inline']) }}
						<input type="checkbox" 
							value="{{ $task->id }}" 
							data-task-toggle-url="{{ route('toggle-task', $task->id) }}" 
							@if($task->completed_at)
								checked="checked"
							@endif
						>
						<a href="{{ route('projects.tasks.edit', [$project->id, $task->id]) }}">{{ $task->name }}</a>
						{{ Form::submit('Delete task', ['class' => 'btn btn-danger btn-xs']) }}
					{{ Form::close() }}
				</h3>
				<div class="task-details">
					<p class="task-timestamps">
						<small>
							<em>Created:</em> {{ $task->created_at }}
							<span data-completed-task="{{ $task->id }}"
								@if(!$task->completed_at)
									class="hidden"
								@endif
							> | <em>Completed:</em> <span data-completed-at="{{ $task->id }}">{{ $task->completed_at }}</span></small></p>
						</small>
					</p>
					@if($task->description)
						<p class="task-description">{{ $task->description }}</p>
					@endif	
				</div>
			</li>
		@empty
			<h2>No tasks</h2>
		@endforelse
	</ul>
@stop