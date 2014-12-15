<html>
	<head>
		<title>@yield('title')</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</head>	
	<body>
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container">
				<div class="navbar-header"><a class="navbar-brand" href="{{ route('projects.index') }}">ToDo</a></div>
				<div class="navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="{{ route('projects.index') }}">All Projects</a></li>
						<li><a href="{{ route('projects.create') }}">Create Project</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						@if (Auth::check())
							<li><a href="{{ route('logout') }}">Logout</a></li>
						@else
							<li><a href="{{ route('login') }}">Login</a></li>
							<li><a href="{{ route('users.create') }}">Register</a></li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			@if (Session::has('message'))
				<div class="alert alert-info" role="alert">{{ Session::get('message') }}</div>
			@endif
			@if (Session::has('success_message'))
				<div class="alert alert-success" role="alert">{{ Session::get('success_message') }}</div>
			@endif
			@if (Session::has('error_message'))
				<div class="alert alert-danger" role="alert">{{ Session::get('error_message') }}</div>
			@endif
			@yield('content')
		</div>
	</body>
</html>