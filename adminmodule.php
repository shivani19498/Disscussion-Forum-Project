<?php

	session_start();

	if(!isset($_SESSION['admin']))
	{
		echo "Logged out";
		exit;
	}

	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Module</title>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://kit.fontawesome.com/65efd163c4.js"></script>
		<style type="text/css">
			#user{
				width: 14%;
				height: 14%;
				padding-top: 2%;
			}
		</style>
	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <div class="container">
		  	<a class="navbar-brand" href="home.php"><i class="far fa-comments"></i> Disqus </a>
		  	<form action="search.php" method="post" class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchtext">
		      <button class="btn btn-success my-2 my-sm-0" type="submit" name="search">Search</button>
		    </form>
		    <a href="questionForm.php" class="btn btn-info"> Ask a Question </a>
		    <a href="logout.php" class="btn btn-info"> Logout </a>
		  </div>
		</nav>

		<a href="modifyuser.php" class="btn btn-primary">Users</a>
		<a href="home.php" class="btn btn-primary" >Category</a>
	</body>

</html>