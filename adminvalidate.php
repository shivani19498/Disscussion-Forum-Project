<?php

	session_start();
	
	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');

	$name = $_POST['username'];
	$pwd = $_POST['password'];

	
	$q = "select * from admin where username = '$name' && password='$pwd' ";
	$result = mysqli_query($con,$q);
	$num = mysqli_num_rows($result);

	if($num == 1)
	{
		$_SESSION['admin'] = $name;
		header('location:home.php');
		echo "Logged In";
	}
	else
	{
		// header('location:login.php');
		echo "You are not registered";
	}

	
?>