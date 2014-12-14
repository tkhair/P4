@extends('layouts.master')

@section('title')
Edit project {{ $project->name }}
@stop

@section('content')
	<h1>Edit project <em>{{ $project->name }}</em></h1>
	{{ Form::model($project, ['route' => ['projects.update', $project->id], 'method' => 'PATCH']) }}
		@include('projects/partials/_form', ['submit' => 'Edit'])
	{{ Form::close() }}
@stop