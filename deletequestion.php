<?php

	session_start();
	if(!isset($_SESSION['admin']))
	{
		echo "Logged out";
		exit;
	}

	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');

	$qid = $_GET['id'];
	$cid = $_GET['cid'];

	$qry = "delete from question where id = '$qid' ";

	if(mysqli_query($con,$qry))
	{
		header('location:category.php?id='.$cid);
	}
?>