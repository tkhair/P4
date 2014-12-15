@extends('layouts.master')
@section('title')
 Incomplete Tasks
@stop

@section('content')
	<h1>Completed tasks</h1>
	<ul class="list-unstyled">
		@forelse ( $tasks as $task )
			@include('tasks/partials/_task', ['task' => $task, 'project' => $task->project, 'show_project_link' => true])
		@empty
			No tasks.
		@endforelse
	</ul>
	<div class="row">
		{{ $tasks->links() }}
	</div>
@stop