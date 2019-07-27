<?php
	
	session_start();

	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Category</title>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://kit.fontawesome.com/65efd163c4.js"></script>
		<style type="text/css">
			body, html {
			  height: 100%;
			  margin: 0;
			}
			body
			{
				text-align: center;
				height: 100%;
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
			}
			.center{
			    height: 100vh;
			    display: flex;
			    justify-content: center;
			    align-items: center;
			}
			h1{
				font-size: 1000%;
				font-family: "Century Gothic";
				font-weight: 500;
			}
			.jumbotron {
			    background: none;
			    padding: 9rem 2rem;
			}
			p {
				font-size: 150%;
			}
			#greentick {
				width: 7%;
				height: 7%;
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

		<div class="jumbotron">
		  <h1 class="display-4"><img id="greentick" src="greentick.png">No Results Found!</h1>
		  <hr class="my-4">
		</div>
	</body>



</html>