<?php
	// Connect to the server 

	function connect(){
		$conn = libvirt_connect("qemu:///system");
		if($conn == false){
			// Error handling
		}else{
			// return the connection object
			return $conn; 
		}
	}


?>