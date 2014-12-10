@extends('layouts.master')
@section('content')
	<a href="{{ route('projects.create') }}">Create new</a>
	You have {{ $projects->count() }} projects
	<ul>
		@forelse ( $projects as $project )
			<li><a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a></li>
		@empty
			No projects. <a href="{{ route('projects.create') }}">Create new</a>
		@endforelse
	</ul>
@stop