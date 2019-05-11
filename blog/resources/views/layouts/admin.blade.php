<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome {{ Auth::user()->name }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container"> 
  <div class="col-md-12">
	<h2>Welcome {{ Auth::user()->name }}</h2>
	<nav class="navbar navbar-expand-sm bg-light">
	<!-- Links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" href="/admin">Home</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/addAdmin">Add Posts</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/addUser">Add Users</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/removedPosts">Removed Posts</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/logout">Log Out</a>
		</li>
	</ul>
	</nav>

	<div class="container">
		@yield('content')
	</div>
	</body>
</html>