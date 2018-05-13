<?php
session_start();

// Database creation details are in query folder

include 'config.php';
	
// Variables for POST data from login.php
$usr = (isset($_POST['usr']) ? $_POST['usr'] : null);
$psw = (isset($_POST['psw']) ? $_POST['psw'] : null);
$first = (isset($_POST['first']) ? $_POST['first'] : null);
$last = (isset($_POST['last']) ? $_POST['last'] : null);
$email = (isset($_POST['email']) ? $_POST['email'] : null);

// Create encrypted vasrsion of posted password
$hashed_psw = password_hash($psw, PASSWORD_DEFAULT);

// Create verification code to be stored in temp_user & be sent to the users email for verification
$verification_code = password_hash(rand(0, 1000), PASSWORD_DEFAULT);

// Prepare statement with username placeholder
$regStmnt = $pdo->prepare("SELECT * FROM users WHERE user_username = :username");

// Bind a value to the placeholder 
$regStmnt->bindValue('username', $usr);

// Execute query with prepared statement
$regStmnt->execute();

// Get returned row count
$count = $regStmnt->rowCount();

if ($count > 0) // If any matching rows exist the username is taken
{ 
	$_SESSION['error_msg'] = "This username is already taken"; // Set the error message
	header("Location: ../register-ui.php");	// Refresh the page
}
else
{

	// Store details in a temporary table
	 
	// Prepare statement
	$temp_sql_stmnt = $pdo->prepare("INSERT INTO  temp_user(temp_fname, temp_lname, temp_user, temp_email, temp_password, temp_verify)
					VALUES(:first, :last, :username, :email, :password, :verification)");

	$temp_result = $temp_sql_stmnt->execute(['first'=>$first, 'last'=>$last, 'username'=>$usr, 'email'=>$email, 'password'=>$hashed_psw,  'verification'=>$verification_code]);

	if($temp_result)
	{
		$to = $email;
		$headers = "Rob <robdcon@gmail.com>";
		$subject = "Account Verification";
		$message = "Your Comfirmation link \r\nClick on this link to activate your account \r\nhttp://loginandregister.robdcon.co.uk/php/verify.php?passkey=$verification_code";

		$sent = mail($to,$subject,$message,$headers);

		if($sent)
		{
			echo "success";
		}
		else
		{
			echo "fail";
		}
	}
}


// Prepare statement with username placeholder
// $regStmnt = $pdo->prepare("SELECT * FROM users WHERE user_username = :username");

// // Bind a value to the placeholder 
// $regStmnt->bindValue('username', $usr);

// // Execute query with prepared statement
// $regStmnt->execute();

// // Get returned row count
// $count = $regStmnt->rowCount();

// if ($count > 0) // If any matching rows exist the username is taken
// { 
// 	$_SESSION['error_msg'] = "This username is already taken"; // Set the error message
// 	header("Location: ../register-ui.php");	// Refresh the page
// }
// else // Otherwise, continue to upload the details...
// {
// 	//Enter values into the appropriate table in mysql

// 	$query = $pdo->prepare("INSERT INTO users (user_username, user_fname, user_lname, user_email, user_password) 
// 	VALUES (:username,:fname, :lname, :email, :password)");

// 	$query->execute(['username'=>$usr, 'fname'=>$first, 'lname'=>$last, 'email'=>$email, 'password'=>$hashed_psw]);

// 	$result=$query->fetch();

// 	if($query) // If the query attemp returns true, direct to login screen to login
// 	{
// 		header("Location: ../login-ui.php");
// 	}
// 	else // If unsuccessful dispaly an error message and stay on this page
// 	{			
// 		$_SESSION['error_msg'] = "Sorry, there was a problem with your registration";
// 		header("Location: ../register-ui.php");	
// 	}
// }

?>
