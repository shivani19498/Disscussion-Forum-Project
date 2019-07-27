<!-- <!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style type="text/css">
		body {
			background-image: url("charles-forerunner-378-unsplash.jpg");
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
		form {
			background-color: transparent;
			background: rgba(211,211,211,0.5);
			padding: 2% 5%;
			margin-top: 5%;
			margin-bottom: 5%;
		}
	</style>
</head>
<body>
	<div class="container">
		<form  action="registration.php" method="post">
			<div class="form-group">
				<label>Full Name</label>
				<input type="text" name="name" class="form-control" required>
			</div>

			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" required>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Password</label>
						<input type="Password" name="password" class="form-control" required>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>Display Picture</label>
				<input type="file" name="file" class="form-control" required>
			</div>

			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Age</label>
						<input type="number" name="age" value="10" min="10" class="form-control" required>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Gender</label>
						<br>
						<input type="radio" name="gender" value="male" checked> Male<br>
						<input type="radio" name="gender" value="female"> Female<br>
						<input type="radio" name="gender" value="other"> Other
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label>Email-Id</label>
				<input type="email" name="email" class="form-control"  required>
			</div>

			<button type="submit" class="btn btn-info btn-block my-4"> Register </button>
		</form>
	</div>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
		body {
			background-image: url("charles-forerunner-378-unsplash.jpg");
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
		form {
			width: 60%;
			justify-content: center;
			background-color: transparent;
			background: rgba(211,211,211,0.5);
			margin: 2rem 19%;

		}
	</style>
</head>
<body>
	<!-- Default form register -->
	<form action="registration.php" method="post" enctype='multipart/form-data' class="p-5">

	    <p class="h4 mb-4" >Sign up</p>

	    <label>Full Name</label>
	    <input type="text" name="name" class="form-control mb-4" placeholder="Full Name" required>

	    <div class="form-row mb-4">
			<div class="col">
				<label>Userame</label>
				<input type="text" name="username" class="form-control" placeholder="Username" required>
			</div>
			<div class="col">
				<label>Password</label>
				<input type="Password" name="password" class="form-control" placeholder="Password" required>
			</div>
		</div>

		<label>Display Picture</label>
		<input type="file" name="img" class="form-control mb-4" required>

	    <div class="form-row mb-4">
			<div class="col">
				<label>Age</label>
				<input type="number" name="age" value="10" min="10" class="form-control" required>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Gender</label>
					<br>
					<input type="radio" name="gender" value="male" checked> Male<br>
					<input type="radio" name="gender" value="female"> Female<br>
					<input type="radio" name="gender" value="other"> Other
				</div>
			</div>
		</div>


	     <!-- E-mail -->
	     <label>Email-Id</label>
	    <input type="email" name="email" class="form-control" class="form-control mb-4" placeholder="E-mail" required>

	    <!-- Sign up button -->
	    <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>

	    <!-- Social register -->

	    <hr>

	    <!-- Terms of service -->

	</form>
<!-- Default form register -->
</body>
</html>