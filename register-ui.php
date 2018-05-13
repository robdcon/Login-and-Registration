<?php
session_start();

// Database creation details are in query folder

include 'php/config.php';

include("header.php"); 

?>
	<!-- Registration Form -->

<div class="form-container">

<form id="register-form" action="php/register.php" method="POST">
		
		<fieldset>

		<legend>Registration Details</legend>

			<div class="field">
				<label class="visuallyhidden" for="first">First name</label>
				<input id="first" name="first" type="text" placeholder="first name">
				<div class="register-alert fname"></div>
			</div><!--field-->

			<div class="field">
				<label class="visuallyhidden" for="last">Last name</label>
				<input id="last" name="last" type="text" placeholder="surname">
				<div class="register-alert lname"></div>
			</div><!--field-->

			<div class="field">
				<label class="visuallyhidden" for="email">Email</label>
				<input id="email" name="email" type="email" placeholder="email">
				<div class="register-alert email"></div>
			</div><!--field-->

			<div class="field">
				<label class="visuallyhidden" for="usr">Username</label>
				<input id="usr" name="usr" type="text" placeholder="username">
				<div class="register-alert username"></div>
			</div><!--field-->

			<div class="field">
				<label class="visuallyhidden" for="psw">Password</label>
				<input id="psw" name="psw" type="password" placeholder="password">
				<div class="register-alert psw"></div>
			</div><!--field-->
			
		</fieldset>

		<button type="submit" id="reg-submit" class="btn btn-main">Sign Up</button>

		<div class="errormsg">

			<?php

				if (isset($_SESSION['error_msg'])) // If an error message has been set by register.php
				{
				
				echo "<span class='error'>".$_SESSION['error_msg']."</span>"; // Print the message to the DOM
				 unset($_SESSION['error_msg']);// Unset variable for future use
				
				}
			?>

		<div>

	</form>

</div><!--form-container-->

</body>

</html>