@extends('layouts.master')
@section('title')
Projects list
@stop

@section('content')
	<h2>You have {{ $projects->count() }} projects</h2>
	<ul>
		@forelse ( $projects as $project )
			<li><h2><a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a></h2></li>
		@empty
			No projects.
		@endforelse
	</ul>
	<a href="{{ route('projects.create') }}" class="btn btn-success">Create new</a>
@stop