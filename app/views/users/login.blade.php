@extends('layouts.master')

@section('title')
Login
@stop

@section('content')
<h1>Login</h1>
{{ Form::open(['route' => 'login']) }}
	@include('users/partials/_form', ['submit' => 'Login'])
	&nbsp;
	<a href="{{ route('users.create') }}">Don't have an account?</a></li>
{{ Form::close() }}
@stop