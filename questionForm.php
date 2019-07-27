<?php
	
	session_start();

	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Question Form</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/65efd163c4.js"></script>
	<style type="text/css">
		form {
			
			justify-content: center;
			background-color: transparent;
			background: rgba(211,211,211,0.5);
			margin: 9rem 28%;
		}
	</style>
</head>
<body>
	<div class="container">
		<form action="addQuestion.php" method="post" enctype='multipart/form-data' class="p-5">

		    <p class="h4 mb-4" >Ask Question</p>

		    <div class="form-group">
				<label>Category</label>
				<br>
				<?php
					$q1 = "select * from category";
					$res1 = mysqli_query($con,$q1);

					while($row = mysqli_fetch_assoc($res1)):
				?>
				<input type="radio" name="category" value="<?php echo $row["categoryname"]; ?>"><?php echo $row["categoryname"]; ?><br>
					<?php endwhile; ?>
			</div>

		    <input type="text" name="title" class="form-control mb-4" placeholder="Title" required>

		    <textarea rows = "5" cols = "50" class="form-control mb-4" name = "description" placeholder="Description" required></textarea>

		    <button class="btn btn-info my-4 btn-block" type="submit">Ask</button>

		    <hr>

		</form>
	</div>
</body>
</html>