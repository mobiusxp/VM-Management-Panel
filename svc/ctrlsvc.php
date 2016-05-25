<?php

	/*
		This service is responsible for VM control, the startting and stopping and restarting of virtual machines. VMs are identified on the server using their names
	*/

	// Boot the VM
	function startVM($vm){
		$status = libvirt_domain_shutdown($vm);
		return $status;
	}

	// Stop the VM
	function stopVM($vm){
		$status = libvirt_domain_shutdown($vm);
		return $status;
	}

	// Restart the VM
	function restartVM($vm){
		$status = libvirt_domain_resume($vm);
		return $status;
	}

?>