<?php

	/*
		This service is responsible for VM control, the startting and stopping and restarting of virtual machines. VMs are identified on the server using their names
	*/

	// Boot the VM
	function startVM($vm){
		$status = libvirt_domain_create($vm);
		return $status;
	}

	// Stop the VM
	function stopVM($vm){
		$status = libvirt_domain_shutdown($vm);
		return $status;
	}

	// Restart the VM
	function restartVM($vm){
		$status = libvirt_domain_reboot($vm);
		return $status;
	}

	// Force shutdown
	function killVM($vm){
		$status = libvirt_domain_destroy($vm);
		return $status;
	}

?>