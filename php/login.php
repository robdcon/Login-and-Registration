
<?php
//Start session
session_start();

// Database creation details are in query folder

// Include test connection function
include ('config.php');

// If the username & password are set, store the values in  variables
$usr = (isset($_POST['username']) ? $_POST['username'] : null);
$psw = (isset($_POST['password']) ? $_POST['password'] : null);

//Create query to check details against database

//Prepare statement using pdo object methods
try
{
	$stmnt = $pdo->prepare("SELECT * FROM users WHERE user_username = :username");

	$stmnt->execute(['username'=>$usr]);

	$result = $stmnt->fetch(PDO::FETCH_ASSOC);

	$psw_db = $result['user_password'];

	
	$verified = password_verify($psw, $psw_db);
	
	// if ($verified) 
	// {
	// 	echo 'success';
	// }
	// else
	// {
	// 	echo 'fail';
	// }

	if(!$verified)
	{
		$_SESSION['login-status'] = "Your username or password is incorrect";
			
		header("Location: ../login-ui.php");
	

		//Bind username & password values to their respective identifiers
		// $stmnt->bindValue('username', $uid);
		// $stmnt->bindValue('password', $psw);

		//Execute statement with given variables
		// $stmnt->execute();

		// $row = $stmnt->fetch();

		//if(!$row) // If no rows are found that match the criteria, set the appropriate error msg
		//{
			// $_SESSION['login-status'] = "Your username or password is incorrect";
			
			// header("Location: ../login-ui.php"); // Refresh the login page
		// }
		// else // If the matching row is found, set a username and current state message for this session
		// {
				
			// $_SESSION['username'] = $row['user_username'];
			// $_SESSION['user_id'] = $row['user_id'];
			// $_SESSION['login-status'] = "Logged in as ".$_SESSION['username'];
			
			// header("Location: ../index.php"); // Direct to main page as a logged in user

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
