<?php
	
	session_start();
	
	if(!isset($_SESSION['admin']))
	{
		echo "Logged out";
		exit;
	}

	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');


	// if(isset($_POST['goto']))
	// {
	// 	$id = $_POST['goto'];
	// 	$q1 = "select * from question where id='$id' ";
	// 	$result = mysqli_query($con, $q1);
	// 	while($row = mysqli_fetch_assoc($result))
	// 	{
	// 		$id = $row['id'];
	// 		$title = $row['title'];
	// 		$desc = $row['description'];
	// 	}
	// 	// echo $id;
	// 	// echo $name;
	// 	// exit;
	// }
	
	$id = $_GET['id'];
	$q1 = "select * from question where id='$id' ";
	$result = mysqli_query($con, $q1);
	while($row = mysqli_fetch_assoc($result))
	{
		$id = $row['id'];
		$title = $row['title'];
		$desc = $row['description'];
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
	  <div class="container">
	  	<h1 class="display-4"><?php echo $title; ?></h1>
	  	<p><?php echo $desc; ?></p>
	  </div>
	</div>

	<div class="container">
		<ul class="list-group list-group-flush">
			<?php 
				$qry = " select * from response where questionid = '$id' order by timestamp ";
				$result1 = mysqli_query($con, $qry);
				$i = 1;

				while($row1 = mysqli_fetch_assoc($result1)): 
			?>
					<li class="list-group-item">
						<p><?php echo $row1["description"]; ?></p>
						<p><span><?php echo $row1["username"],"  ",substr($row1["timestamp"], 2, 18); ?></span></p>
						<a href="deleteresponse.php?rid=<?= $row1['id'] ?>&qid=<?= $id ?>" class="btn btn-danger">Delete</a>
					</li>
					
				<?php endwhile; ?>


				<form action="addResponse.php" method="post">
					<textarea rows = "5" cols = "50" class="form-control mb-4" name = "resp" placeholder="Add a response" required></textarea>
					<button class="btn btn-info" name="reply" value="<?php echo $id; ?>" type="submit">Reply</button>
				</form>
		</ul>
	</div>
	
</body>

</html>