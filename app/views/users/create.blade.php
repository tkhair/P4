@extends('layouts.master')

@section('title')
Registration
@stop

@section('content')
<h1>Registration</h1>
{{ Form::open(['route' => 'users.store', 'method' => 'post']) }}
	@include('users/partials/_form', ['submit' => 'Register'])
	&nbsp;
	<a href="{{ route('login') }}">Already have an account?</a>
{{ Form::close() }}
@stop