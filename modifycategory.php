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
	    <a href="logout.php" class="btn btn-info"> Logout </a>
	  </div>
	</nav>

	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>S.no</th>
					<th>Category Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				
				<?php 
				$qry = " select * from category ";
				$result = mysqli_query($con, $qry);
				$i = 1;
				// $image = $row["image"];
				// $image_src = "upload/".$image;

				while($row = mysqli_fetch_assoc($result)): ?>
					<tr>
						<td><?php echo $i;  ?></td>
						<td><?php echo $row["categoryname"] ?></td>
						
						<td>
							<a href="admincategory.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Go To Category</a>
							<a href="deletecategory.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php $i++; ?>
				<?php endwhile; ?>


			</tbody>

		</table>


		<form action="addcategory.php" method="post">
			<input type="text" name="categoryname" class="form-control mb-4" placeholder="Category Name" required>
	    	<button type="submit" name="add" class="btn btn-primary">Add Category</button>
		</form>
				
	</div>

	
	
	
	
</body>
</html>