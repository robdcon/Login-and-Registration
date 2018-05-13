<?php
session_start();

// Database creation details are in query folder

include 'config.php';
	//Enter values into the appropriate table in mysql
	
	// Get the verification code from the URL string
	// $url = 'http://www.mydomain.com/abc/';

	// print_r(parse_url($url));

	// echo parse_url($url, PHP_URL_PATH);
	$parts = parse_url($_SERVER['REQUEST_URI']);
	//$parts = parse_url($url);
	
	parse_str($parts['query'], $query);
	$user_ver_code = $query['passkey'];

	$usr = $first = $last = $email = $psw = "";

	// Check code against the one stored in the temporary database
	$check_code = $pdo->prepare("SELECT * FROM temp_user WHERE temp_verify = :user_ver_code");

	$check_code->execute(['user_ver_code'=>$user_ver_code]);
	$result = $check_code->fetch(PDO::FETCH_ASSOC);

	
	
	$usr = $result['temp_user'];
	$psw = $result['temp_password'];
	$fname = $result['temp_fname'];
	$lname = $result['temp_lname'];
	$email = $result['temp_email'];
		
	

	
	// Set the user details to copy to the main user table

	$query = $pdo->prepare("INSERT INTO users (user_username, user_fname, user_lname, user_email, user_password) 
	VALUES (:username,:fname, :lname, :email, :password)");

	$result = $query->execute(['username'=>$usr, 'fname'=>$fname, 'lname'=>$lname, 'email'=>$email, 'password'=>$psw]);

	if($result) // If the query attemp returns true, direct to login screen to login
	{
		// Delete the temporary record
		$delete_code = $pdo->prepare("DELETE FROM temp_user WHERE temp_user = :username");
		$done = $delete_code->execute(['username'=>$usr]);
		if($done)
		{
			// Direct to the login page
			header("Location: ../login-ui.php");
		}

	}
	else // If unsuccessful dispaly an error message and stay on this page
	{			
		$_SESSION['error_msg'] = "Sorry, there was a problem with your registration";

		// Direct back to registration screen
		header("Location: ../register-ui.php");	
	}
?>