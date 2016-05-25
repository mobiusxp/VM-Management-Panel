<?php

	// Get all provisioned VMs
	function getAllVMs($conn){
		$doms = libvirt_list_domains($conn);
		return $doms;
	}

	function getVMByName($conn, $name){
		$dom = libvirt_domain_lookup_by_name($conn, $name);
		return $dom;
	}

	function getVMInfo($vm){
		$info = libvirt_domain_get_info($vm);
		return $info;
	}

	function getVMstate($vm){
		$state = libvirt_domain_is_active($vm);
		return $state;
	}


?>

