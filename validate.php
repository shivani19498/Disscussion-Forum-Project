<?php
	
	require_once('settings.php');
	require_once('google-login-api.php');
	session_start();

	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');

	// Google passes a parameter 'code' in the Redirect Url
	if(isset($_GET['code'])) {
		try {
			// Get the access token 
			$data = GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);

			// Access Token
			$access_token = $data['access_token'];
			
			// Get user information
			$user_info = GetUserProfileInfo($access_token);

			$_SESSION['username'] = $user_info['name'];
			

			//echo implode(',', $user_info);
			header('location:home.php');


		}
		catch(Exception $e) {
			echo $e->getMessage();
			exit();
		}
	}

	else
	{
		$name = $_POST['username'];
		$pwd = $_POST['password'];

		
		$q = "select * from user where username = '$name' && password='$pwd' ";
		$result = mysqli_query($con,$q);
		$num = mysqli_num_rows($result);

		if($num == 1)
		{
			echo "Found";
			$_SESSION['username'] = $name;
			$_SESSION['pwd'] = $pwd;
			header('location:home.php');
			echo "Logged In";
		}
		else
		{
			// header('location:login.php');
			echo "You are not registered";
		}
	}

	
?>