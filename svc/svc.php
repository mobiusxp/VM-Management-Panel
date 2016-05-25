<?php

  	// error_reporting(E_ALL);
  	// ini_set('display_errors', 1);

	require('./lib/connector.php');
	require("./listsvc.php");
	require("./ctrlsvc.php");

	$conn = connect();

	// Return AJAX calls as JSON, all method outputs go through prep before being returned
	function prepOutput($input){
		$output = json_encode($input);
		//echo $output;
		return $output;
	}

	function test(){
		return "ayy";
	}

	//echo "ayy";
	/*
		GET:
		svc - service name
		name - VM name (when required)
	*/

	// TODO: service for creating VMs
	if(isset($_GET["svc"])){
		$result = null;
		switch($_GET["svc"]){
			case "getAllVMs":
				$result = getAllVMs($conn);
				break;
			case "getVMByName":
				// Takes in an additional param, NAME
				$vm = getVMByName($conn, $_GET["name"]);
				$result = getVMInfo($vm);
				break;
			case "getVMStatus":
				$vm = getVMByName($conn, $_GET["name"]);
				$result = getVMState($vm);
				break;
			case "restartVM":
				$vm = getVMByName($conn, $_GET["name"]);
				$result = restartVM($vm);
				break;
			case "test":
				$result = test();
				break;
		}
		echo prepOutput($result);
	}




?>