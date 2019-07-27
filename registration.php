<?php

	session_start();
	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');

	$name = $_POST['name'];
	$username = $_POST['username'];
	$pwd = $_POST['password'];
	

	$imgName = $_FILES['img']['name'];
	$target_dir = "upload/";
	$target_file = $target_dir . basename($_FILES["img"]["name"]);

	// Select file type
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Valid file extensions
	$extensions_arr = array("jpg","jpeg","png","gif");

	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];

	
	$q = " select * from user where username='$username' ";
	$result = mysqli_query($con, $q);
	$num = mysqli_num_rows($result);

	if($num == 1)
	{
		echo "Username already taken";
	}
	else if( in_array($imageFileType,$extensions_arr) )
	{
		$reg = " insert into user(name, username, password, image, age, gender, email) values('$name', '$username', '$pwd', '$imgName', '$age', '$gender', '$email') ";
		mysqli_query($con, $reg);
		move_uploaded_file($_FILES['img']['tmp_name'],$target_dir.$imgName);
		header('location:confirmation.php');
		echo "Registration Successful";
	}



	//Delete record from database
	


	
?>