<?php

// Set PDO parameters for database connection (Currently experiencing a problem so have fallen back to original connection type instead of PDO for now)
// ini_set('display_errors',true);
// error_reporting(E_ALL);

$username = 'robdcon9';
$database = 'robdcon9_demo';
$password = 'Buck2?sgfast';
$host = 'localhost';
// Create DSN variable with the required information

$dsn = "mysql:host=$host;dbname=$database;'set names utf8'"; 

// Set option attributes 

$options = [

	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Use exception mode for debugging
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Set fetch mode to get associative arrays
	PDO::ATTR_EMULATE_PREPARES => false // Switch off emulate function as charset will be set by a parameter

];

// Create PDO object

	$pdo = new PDO($dsn, $username, $password, $options );

//Connect to the database using PDO object

//$conn = mysqli_connect('localhost', 'root', 'Buck2fast', 'menucreator');

//Check if the connection failed and if so, display an error message

// if (!$conn) 
// {
// die("Error: ".mysqli_connect_error());
// }

