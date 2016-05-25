<?php

	// Error reporting
	error_reporting(E_ALL);
  	ini_set('display_errors', 1);
  	include("auth.inc.php");

	if(!isset($title)){
		$title = "Thorium VM Management";
	}

	session_start();
	authRedirect($curLocation);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title ?></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<?php
		if(isset($stylesheets)){
			foreach($stylesheets as $stylesheet){
				echo "<link rel='stylesheet' href=\"styles/$stylesheet.css\"> \n\t";
			}
		}
	?>
</head>
<body>
