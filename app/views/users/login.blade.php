@extends('layouts.master')

@section('title')
Login
@stop

@section('content')
<h1>Login</h1>
{{ Form::open(['route' => 'login']) }}
	@include('users/partials/_form', ['submit' => 'Login'])
{{ Form::close() }}
@stop