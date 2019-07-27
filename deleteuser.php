<?php

	session_start();

	if(!isset($_SESSION['admin']))
	{
		echo "Logged out";
		exit;
	}

	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');

	$userid = $_GET['id'];

	$qry = "delete from user where id = '$userid' ";

	if(mysqli_query($con,$qry))
	{
		header('location:modifyuser.php');
	}
?>