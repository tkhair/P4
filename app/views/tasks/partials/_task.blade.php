<li class="task-holder">
	@if(isset($show_project_link) && $show_project_link)
		<h2>Project: <a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a></h2>
	@endif
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
			{{ Form::submit('Delete task', ['class' => 'btn btn-danger btn-xs pull-right']) }}
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