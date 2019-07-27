<?php

	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['admin']))
	{
		echo "Logged out";
		exit;
	}

	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');



	$category = $_POST["category"];
	$title = $_POST["title"];
	$description = $_POST["description"];

	$q1 = "select * from category where categoryname='$category' ";
	$res1 = mysqli_query($con,$q1);

	while($row = mysqli_fetch_assoc($res1))
	{
		$catid = $row["id"];
	}

	
	$usrname = $_SESSION['username'];

	$q2 = "select * from user where username = '$usrname' ";
	$res2 = mysqli_query($con,$q2);

	while($row1 = mysqli_fetch_assoc($res2))
	{
		$userid = $row1["id"];
	}

	$n = 0;

	$qry = "insert into question(title, description, userid, categoryid, no_of_responses) values ('$title', '$description', '$userid' , '$catid', '$n') ";
	if(mysqli_query($con, $qry))
	{
		echo "executed";
		header('location:home.php');
	}
	else
	{
		echo "not executed";
	}

?>