<?php
	 session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Matcha</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<body>
	
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand text-danger">Matcha</a>
	<button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon "></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link text-danger" href="index.php">Home<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-danger" href="#">Features</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-danger" href="#">Pricing</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle text-danger bg-dark" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown link</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item text-danger" href="#">Action</a>
					<a class="dropdown-item text-danger" href="#">Another action</a>
					<a class="dropdown-item text-danger" href="#">Something else here</a>
				</div>
			</li>
		</ul>
	</div>
	<form>
		<div class="form-row">
			<div class="col">
				<input type="text" class="form-control" placeholder="Username">
			</div>
			<div class="col">
				<input type="password" class="form-control" placeholder="Password">
			</div>
			<button type="button" class="btn btn-outline-danger">Login</button>
			<a href="signup.php" class="nav-link text-danger">Signup</a>
		</div>
	</form> 
</nav>