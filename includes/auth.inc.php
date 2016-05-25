<?php
	// This library covers auth and related auth functions

	/*
	Check the current page location and auth, 
	if user is not auth-ed, redirect after checking location to prevent infinite loop 
	*/
	function authRedirect($curLocation){
		if(isset($_SESSION['admin'])){
			if($curLocation != "admin"){
				// if user is authed, put them in the panel
				header("Location: admin.php");
			}
		}else{
			if($curLocation != "login"){
				// If user is not authed, force to login screen
				header("Location: index.php?login=failed");
			}
		}
	}

	/* 
	Authenticate the user against the Unix system
	return true if successful, false if failed
	*/
	function login($user, $pass){
		// Auth to unix by SSH
		$connection = ssh2_connect("localhost", 22);
		if(ssh2_auth_password($connection, $user, $pass)){
			unset($connection);
			return true;
		}else{
			unset($connection);
			return false;
		}

		unset($connection);
		return false;
	}


?>