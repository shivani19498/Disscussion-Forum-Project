<?php

require_once('settings.php');

$login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
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
			background-image: url("helloquence-61190-unsplash.jpg");
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
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <div class="container">
	  	<a class="navbar-brand" href="#"><i class="far fa-comments"></i>      Disqus </a>
	  </div>
	</nav>
	<div class="jumbotron">
	  <h1 class="display-4">Discussion Forum</h1>
	  <p>A platform where you can ask and answer questions.</p>
	  <hr class="my-4">
	  <a class="btn btn-info btn-lg" href="login.php" role="button">Login</a>
	  <a class="btn btn-info btn-lg" href="register.php" role="button">Register</a>
	  <a class="btn btn-info btn-lg" href="adminlogin.php" role="button">Admin Login</a>
	  <a class="btn btn-info btn-lg" href="<?= $login_url ?>">Login with Google</a>
	</div>
</body>
</html>