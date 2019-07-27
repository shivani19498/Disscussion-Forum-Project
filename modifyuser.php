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
	<title>Users</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/65efd163c4.js"></script>
	<style type="text/css">
		img{
			display: inline-block;
			width: 25%;
			height: auto;
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
	    <?php if(isset($_SESSION['admin'])): ?>
	    	<a href="modifyuser.php" class="btn btn-primary">Users</a>
			<a href="home.php" class="btn btn-primary" >Category</a>
	    <?php endif; ?>
	    <a href="logout.php" class="btn btn-info"> Logout </a>
	  </div>
	</nav>

	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>Display Picture</th>
					<th>Full Name</th>
					<th>Username</th>
					<th>Password</th>
					<th>Age</th>
					<th>Gender</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				
				<?php 
				$qry = " select * from user ";
				$result = mysqli_query($con, $qry);
				// $image = $row["image"];
				// $image_src = "upload/".$image;

				while($row = mysqli_fetch_assoc($result)): ?>
					<tr>
						<td><img src='<?php echo "upload/".$row["image"];  ?>'></td>
						<td><?php echo $row["name"] ?></td>
						<td><?php echo $row["username"] ?></td>
						<td><?php echo $row["password"] ?></td>
						<td><?php echo $row["age"] ?></td>
						<td><?php echo $row["gender"] ?></td>
						<td><?php echo $row["email"] ?></td>
						<td>
							<a href="deleteuser.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php endwhile; ?>
				
			</tbody>

		</table>
	</div>

	
	
	<script type="text/javascript">
		$(document).ready(function(){
			setTimeout(function(){
				$('.alert').remove();
			}, 3000);
		})
	</script>
	
</body>
</html>