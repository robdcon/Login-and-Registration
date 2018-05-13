<!doctype html>
<html>
<head>
	<title>Menu Creator</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--scripts-->

	<!--JQUERY  SCRIPTS-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!--BOOTSTRAP SCRIPTS-->
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- CUSTOM SCRIPTS -->

	<script src="js/jquery.validate.min.js"></script>

	<script src="js/validate.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	

<!--styles-->

	<!--BOOTSTRAP STYLES-->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- MAIN STYLES -->

	<link rel="stylesheet" type="text/css" href="css/main.css" media="screen">


</head>

<body>

<!--Skip Link Navigation for screen readers-->

<div id="skiplinks-container" tabindex="0" class="hide">
	<ul>
		<li><a href="#main" class="skiplink">main content</a></li> 
		<li><a href="#menucontrols" class="skiplink">menu controls</a></li> 
		<li><a href="#resultslist" class="skiplink">results section</a></li> 
		<li><a href="#menucontrols" class="skiplink">recipes page</a></li>
	</ul>
</div>

	<header class="header" role="banner">

		<!-- Collapsible Navigation -->
		<!--Built using Bootstrap Framework-->
	    <nav class="navbar" role="navigation">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>                        
		      </button>
		      <a class="navbar-brand" href="#">Login &amp; Registration Demo</a>
		    </div>

		     <div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav">

		        <li class="btn-theme btn btn-main active"><a href="#" class="btn-main">Home</a></li>
		        <li class="btn-theme btn btn-main"><a href="#" class="btn-main">Page 1</a></li>
		        <li class="btn-theme btn btn-main"><a href="#" class="btn-main">Page 2</a></li>

		      </ul>

		      <ul class="nav navbar-nav navbar-right">

		      	<?php
		      	
					if(isset($_SESSION['username'])) 
					{
						$username = ($_SESSION['username']);
						echo "<li class='btn btn-main'><a href='#' tabindex='0'  class='login btn-main'>&nbsp;<span class='glyphicon glyphicon-user'></span>&nbsp;$username</a></li>";
						echo "<li class='btn btn-main'><a href='php/logout.php' id='logout' class='logout' tabindex='0'>logout</a></li>";
						
					}
					else 
					{
						echo '<li  class="btn btn-main"><a href="register-ui.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>';
	        			echo '<li  class="btn btn-main"><a href="login-ui.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
						echo '<li  class="btn btn-main"><a href="login-ui.php"><span>You are not logged in</span></a></li>';
						
					}
				?>
		        
		      </ul>
		    </div>
		  </div>
		</nav>
	</header>

