<?php
	
	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['admin']))
	{
		echo "Logged out";
		exit;
	}

	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');

	// if(isset($_POST['goto']))
	// {
	// 	$id = $_POST['goto'];
	// 	$q1 = "select * from category where id='$id' ";
	// 	$result = mysqli_query($con, $q1);
	// 	while($row = mysqli_fetch_assoc($result))
	// 	{
	// 		$id = $row['id'];
	// 		$name = $row['categoryname'];
	// 	}
	// 	// echo $id;
	// 	// echo $name;
	// 	// exit;
	// }

	$id = $_GET['id'];
	$q1 = "select * from category where id='$id' ";
	$result = mysqli_query($con, $q1);
	while($row = mysqli_fetch_assoc($result))
	{
		$id = $row['id'];
		$name = $row['categoryname'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Category</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/65efd163c4.js"></script>
	<style type="text/css">
		h1{
			font-size: 1000%;
			font-family: "Century Gothic";
			font-weight: 500;
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
	    <?php if(isset($_SESSION['username'])): ?>
	    	<a href="usermodule.php" class="btn btn-info">User-info</a>
	    <?php endif; ?>
	    <?php if(isset($_SESSION['admin'])): ?>
	    	<a href="modifyuser.php" class="btn btn-primary">Users</a>
			<a href="home.php" class="btn btn-primary" >Category</a>
	    <?php endif; ?>
	    <a href="logout.php" class="btn btn-info"> Logout </a>
	  </div>
	</nav>
	<div class="jumbotron">
	  <div class="container">
	  	<h1 class="display-4"><?php echo $name; ?></h1>
	  </div>
	</div>

	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>S.no</th>
					<th>Question</th>
					<th>Asked on</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				<?php 
						$qry = " select * from question where categoryid = '$id' order by timestamp ";
						$result1 = mysqli_query($con, $qry);
						$i = 1;

						while($row1 = mysqli_fetch_assoc($result1)): 
					?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $row1["title"] ?></td>
								<td><?php echo $row1["timestamp"]; ?></td>
								<td>
									<a href="question.php?id=<?= $row1['id'] ?>" class="btn btn-primary"> Go to question </a>
									<?php if(isset($_SESSION['admin'])): ?>
										<a href="deletequestion.php?id=<?= $row1['id'] ?>&cid=<?= $id ?>" class="btn btn-danger"> Delete </a>
									<?php endif; ?>
								</td>
							</tr>
							<?php $i++; ?>
						<?php endwhile; ?>
				
			</tbody>
		</table>
	</div>
</body>
</html>