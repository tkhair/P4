@extends('layouts.master')
@section('title')
Projects list
@stop

@section('content')
	<h2>You have {{ $projects->count() }} {{ Str::plural('project', $projects->count()) }}</h2>
	<ul class="list-unstyled">
		@foreach ( $projects as $project )
			<li><h3><a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a></h3></li>
		@endforeach
	</ul>
	<a href="{{ route('projects.create') }}" class="btn btn-success">Create new</a>
@stop