<?php
	
	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['admin']))
	{
		echo "Logged out";
		exit;
	}

	$con = mysqli_connect('localhost', 'username', '');

	mysqli_select_db($con, 'discussionforum');

	if(isset($_POST['reply']))
	{
		$id = $_POST['reply'];
		$desc = $_POST['resp'];
	}

	// $username = $_SESSION['username'];

	// $q2 = "select * from user where username = '$username' ";
	// $res2 = mysqli_query($con,$q2);

	// while($row1 = mysqli_fetch_assoc($res2))
	// {
	// 	$userid = $row1["id"];
	// }
	
	// // $qry = "insert into response(description, questionid, username) values('$desc', '$id', '$usrname')";
	// $qry = "insert into response(description, questionid, username) values('$desc', '$id', '$username')";
	// $result=mysqli_query($con,$qry);
	
	// if($result)
	// {

	// 	header('location:question.php?id='.$id);
	// }
	// else
	// {
	// 	echo "Query not executed";
	// }

	$usrname = $_SESSION['username'];

	$q2 = "select * from user where username = '$usrname' ";
	$res2 = mysqli_query($con,$q2);

	while($row1 = mysqli_fetch_assoc($res2))
	{
		$userid = $row1["id"];
	}
	$qry = "insert into response(description, questionid, userid) values('$desc', '$id', '$userid')";

	if(mysqli_query($con,$qry))
	{
		// $msg = "A response is entered";
		// mail("shivanisingh19498@yahoo.com","My subject",$msg);
		require 'PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$mail->SMTPDebug = false;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'shivaniuit2511@gmail.com';                 // SMTP username
		$mail->Password = 'shivani@1998';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('shivaniuit2511@gmail.com', 'Disscussion Forum admin');
		$mail->addAddress('shivanisingh19498@yahoo.com');     // Add a recipient
		

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = "A New Response by ".$usrname."";
		$mail->Body    = "A new response is entered by the user \r<b>".$desc."</b>";
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->SMTPOptions = array(
    	'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

		// if(!$mail->send()) {
		//     echo 'Message could not be sent.';
		//     echo 'Mailer Error: ' . $mail->ErrorInfo;
		// } else {
		//     echo 'Message has been sent';
		//     header('location:question.php?id='.$id);
		// }

		// if($mail->send())
		// {
		// 	header('location:question.php?id='.$id);
		// }

		$mail->send();
		header('location:question.php?id='.$id);

		
	}
	else
	{
		echo "Query not executed";
	}
?>