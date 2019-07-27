<?php
	session_start();

	if(!isset($_SESSION['username']) && !isset($_SESSION['admin']))
	{
		echo "Logged out";
		exit;
	}

	$userid = $_GET['id'];


	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');

	
	$qry = "select * from user where id='$userid' ";

	$result = mysqli_query($con, $qry);

	$num = mysqli_num_rows($result);

	if($num == 1)
	{
		$row = mysqli_fetch_assoc($result);
		$username = $row['username'];
		$name = $row['name'];
		$pwd = $row['password'];
		$image = $row['image'];
		$age = $row['age'];
		$gender = $row['gender'];
		$email = $row['email'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container" justify-content="center">
		<form action="updateuser.php" method="post" enctype='multipart/form-data' class="p-5">

	    <p class="h4 mb-4" >Sign up</p>

	    <label>Full Name</label>
	    <input type="text" name="name" class="form-control mb-4" placeholder="Full Name" value="<?= $name ?>" required>

	    <div class="form-row mb-4">
			<div class="col">
				<label>Username</label>
				<input type="text" name="username" class="form-control" placeholder="Username" value="<?= $username ?>" required>
			</div>
			<div class="col">
				<label>Password</label>
				<input type="Password" name="password" class="form-control" placeholder="Password" value="<?= $pwd ?>" required>
			</div>
		</div>

	    <div class="form-row mb-4">
			<div class="col">
				<label>Age</label>
				<input type="number" name="age" min="10" class="form-control" value="<?= $age ?>" required>
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
	    <input type="email" name="email" class="form-control" class="form-control mb-4" placeholder="E-mail" value="<?= $email ?>" required>

	    <!-- Sign up button -->
	    <button class="btn btn-info my-4 btn-block" name="update" type="submit">Update</button>

	    <hr>
	</form>
	</div>
</body>
</html>