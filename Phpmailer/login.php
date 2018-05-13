<?php
//Start session
session_start();

// Database creation details are in query folder

// Include test connection function
include ('config.php');

// If the username & password are set, store the values in  variables
$uid = (isset($_POST['username']) ? $_POST['username'] : null);
$psw = (isset($_POST['password']) ? $_POST['password'] : null);

//Create query to check details against database

//Prepare statement using pdo object methods
try
{
	$stmnt = $pdo->prepare("SELECT * FROM users WHERE user_username = :username");

	$stmnt->bindValue('username', $uid);
	
	
	
	$result = $stmnt->fetch(PDO::FETCH_ASSOC);
	$psw_db = $result['password'];	
	$psw_hash = password_hash($psw_db);
	print_r($psw_hash);
	
	
	

	if(!password_verify($psw, $psw_hash))
	{
		$_SESSION['login-status'] = "Your username or password is incorrect";
			
		//header("Location: ../login-ui.php"); 

	}
	else // If the matching row is found, set a username and current state message for this session
	{
			
		$_SESSION['username'] = $row['user_username'];
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['login-status'] = "Logged in as ".$_SESSION['username'];
		
		header("Location: ../index.php"); // Direct to main page as a logged in user
	}

}
catch(PDOException $error)
{
	print_r("Error: ".$error);
	echo "Error: ".$error;
}
