@extends('layouts.master')
@section('title')
Projects list
@stop

@section('content')
	<h2>You have {{ $projects->count() }} projects</h2>
	<ul>
		@forelse ( $projects as $project )
			<li><a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a></li>
		@empty
			No projects. <a href="{{ route('projects.create') }}">Create new</a>
		@endforelse
	</ul>
@stop