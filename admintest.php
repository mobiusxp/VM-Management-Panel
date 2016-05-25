<?php
	$curLocation = "admin";
	include("includes/header.php");
?>

<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>
</head>

<body>
	<h1>Welcome, <?php echo $_SESSION['admin'] ?>! <a href="logout.php">Logout</a></h1>
	<?php
		// echo exec("whoami");
		//$credentials=array(VIR_CRED_AUTHNAME=>"webvirt",VIR_CRED_PASSPHRASE=>"eAhs0nl4");
		$conn = libvirt_connect("qemu:///system");
		var_dump($conn);
		if($conn == false){

		}else{
	     $doms = libvirt_list_domains($conn);
	     print_r($doms);
	     // source(4) of type (Libvirt connection) Array ( [0] => vmtest [1] => vmWin7test2 [2] => khoavm1 ) Array ( [maxMem] => 1048576 [memory] => 0 [state] => 5 [nrVirtCpu] => 1 [cpuUsed] => 0 )
	     $res = libvirt_domain_lookup_by_name($conn,"khoavmtest3");
	     print_r(libvirt_domain_get_info($res));
	     var_dump(libvirt_domain_is_active($res));

	    }


	?>



</body>