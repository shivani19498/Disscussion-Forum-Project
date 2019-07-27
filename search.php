<?php
	
	session_start();
	
	if(!isset($_SESSION['username']) && !isset($_SESSION['admin']))
	{
		echo "Logged out";
		exit;
	}

	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');

	if(isset($_POST['search']))
	{
		$find = $_POST['searchtext'];
	}


	$qry = "select * from question where title like \"%$find%\" ";
	$result = mysqli_query($con, $qry);

	$num = mysqli_num_rows($result);

	if($num == 0)
	{
		header('location:nosearchresult.php?find='.$find);
	}
	// else
	// {
	// 	header('location:searchResult.php');
	// }
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
		    <a href="logout.php" class="btn btn-info"> Logout </a>
		  </div>
		</nav>


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
							$i = 1;

							while($row1 = mysqli_fetch_assoc($result)): 
						?>
								<tr>
									<td><?php echo $i ?></td>
									<td><?php echo $row1["title"] ?></td>
									<td><?php echo $row1["timestamp"]; ?></td>
									<td>
										<button class="btn btn-primary"><a href="question.php?id=<?= $row1['id'] ?>" class="text-white"> Go to question </a></button>
									</td>
								</tr>
								<?php $i++; ?>
							<?php endwhile; ?>
					
				</tbody>
			</table>
		</div>
	</body>

</html>