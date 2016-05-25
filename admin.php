<?php

	// Error reporting
	error_reporting(E_ALL);
  	ini_set('display_errors', 1);
  	include("./includes/auth.inc.php");
  	$curLocation = "admin";
	session_start();
	authRedirect($curLocation);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Panel - Thorium VM Management</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
	<script src="js/main.js"></script>
</head>
<body>


	<h1>Welcome, <?php echo $_SESSION['admin'] ?>! <a href="logout.php">Logout</a></h1>
	<div ng-app class="container-fluid">
		<p>1 + 2 = {{1+2}}</p>
	</div>
	



	</body>
</html>