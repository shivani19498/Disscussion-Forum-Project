<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
		body {
			background-image: url("mario-gogh-1140530-unsplash.jpg");
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
		form {
			width: 40%;
			justify-content: center;
			background-color: transparent;
			background: rgba(211,211,211,0.5);
			margin: 9rem 28%;
		}
	</style>
</head>
<body>
	<!-- Default form login -->
<form action="adminvalidate.php" method="post" class="text-center p-5">

    <p class="h4 mb-4">Sign in</p>

    <!-- Email -->
    <input type="text" name="username" class="form-control mb-4" placeholder="Username">

    <!-- Password -->
    <input type="password" name="password" class="form-control mb-4" placeholder="Password">

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

</form>
<!-- Default form login -->
</body>
</html>4