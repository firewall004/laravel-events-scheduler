<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<span class="navbar-brand">Schedule Events</span>
	<span class="navbar-brand"> | </span>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Home</a>
			</li>
		</ul>
		<!-- TODO: To show this only when current page is not login or register page -->
		<ul class="navbar-nav my-2 my-lg-0">
			<li class="nav-item">
				<a class="nav-link" href="{{ route('auth.logout') }}">Logout</a>
			</li>
		</ul>
	</div>
</nav>
