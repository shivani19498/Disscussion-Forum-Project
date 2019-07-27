<?php
	session_start();

	if(!isset($_SESSION['username']) && !isset($_SESSION['admin']))
	{
		echo "Logged out";
		exit;
	}

	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');

	if(isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
	}
	if(!isset($_SESSION['pwd']))
	{
		header('location:home.php');
	}


	$qry = "select * from user where username='$username' ";

	$result = mysqli_query($con, $qry);

	$num = mysqli_num_rows($result);

	if($num == 1)
	{
		$row = mysqli_fetch_assoc($result);

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
	<title>Question</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/65efd163c4.js"></script>
	<style type="text/css">
		h1{
			font-size: 1000%;
			font-family: "Century Gothic";
			font-weight: 500;
		}
		span{
			justify-content: flex-end;
		}

		input.hidden {
		    position: absolute;
		    left: -9999px;
		}

		#profile-image1 {
		    cursor: pointer;
		  
		     width: 100px;
		    height: 100px;
			.title{ font-size:16px; font-weight:500;}
			 .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}

			
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
	    <a href="usermodule.php" class="btn btn-info">User-info</a>
	    <a href="logout.php" class="btn btn-info"> Logout </a>
	  </div>
	</nav>

	<div class="container">
		<div class="card" style="width: 30rem;align-self: center;margin-top: 10%;margin-left: 28%;">
			<img src="<?php echo "upload/".$image;  ?>" class="card-img-top" alt="User Pic" style="width: 50%;height: auto;margin-left: 24%;">
			<div class="card-body">
				<h5 class="card-title">  User Profile</h5>
				<div>
					<span class="col-sm-5 col-xs-6 title " >Name:</span><span class="col-sm-7"><?php echo $name;  ?></span>
				</div>
				<div>
					<span class="col-sm-5 col-xs-6 title " >Username:</span><span class="col-sm-7"><?php echo $username;  ?></span>
				</div>
				<div>
					<span class="col-sm-5 col-xs-6 title " >Age:</span><span class="col-sm-7"><?php echo $age;  ?></span>
				</div>
				<div>
					<span class="col-sm-5 col-xs-6 title " >Gender:</span><span class="col-sm-7"><?php echo $gender;  ?></span>
				</div>
				<div>
					<span class="col-sm-5 col-xs-6 title " >Email-Id:</span><span class="col-sm-7"><?php echo $email;  ?></span>
				</div>
				<a href="edituser.php?id=<?= $row['id'] ?>" class="btn btn-primary" style="margin-top: 3%;">Update</a>
			</div>
		</div>
	</div>


	    
		   
	
</body>

</html>