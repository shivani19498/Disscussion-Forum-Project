<?php

	session_start();
	if(!isset($_SESSION['admin']))
	{
		echo "Logged out";
		exit;
	}

	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');

	$rid = $_GET['rid'];
	$qid = $_GET['qid'];

	$qry = "delete from response where id = '$rid' ";

	if(mysqli_query($con,$qry))
	{
		header('location:question.php?id='.$qid);
	}
?>