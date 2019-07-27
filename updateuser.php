<?php
	
	session_start();
	
	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');

	if(isset($_POST['update']))
	{
		$name = $_POST['name'];
		$username = $_POST['username'];
		$pwd = $_POST['password'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];

		$q = "UPDATE user SET name='$name', username='$username', password='$pwd', age='$age', gender='$gender', email='$email' WHERE username='$username' ";

		if(mysqli_query($con, $q))
		{ 
			
			header('location:usermodule.php'); 
		}
		else
		{
			echo "not executed";
		}
	}

?>