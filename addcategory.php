<?php

	session_start();
	if(!isset($_SESSION['admin']))
	{
		echo "Logged out";
		exit;
	}

	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');

	if(isset($_POST['add']))
	{
		$categoryname = $_POST['categoryname'];

		$qry = "insert into category(categoryname) values('$categoryname') ";

		if(mysqli_query($con,$qry))
		{
			header('location:home.php');
		}
	}
?>