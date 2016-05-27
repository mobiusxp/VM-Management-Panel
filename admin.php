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
	<link rel="stylesheet" href="./styles/admin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
	<script src="js/app.js"></script>
</head>
<body>

	<div class="container-fluid">
		<div class="row header">
			<p>Thorium VM Management</p>
		</div>
		<div class="row subheader">
			<p>Welcome, <?php echo $_SESSION['admin'] ?>! <a href="logout.php">(Logout)</a></p>
		</div>
		<!--angular application-->
		<div ng-app="adminpanel" class="row application">
				<!--VM List-->

				<div ng-controller="listController" class="vmlist col-md-3">
					<div class="row vmsearch">
						<input type="text" ng-model="$ctrl.query" class="form-control" placeholder="Search">
					</div>
					<!--
					<div class="row vmlisting">
						<p> + Add a VM</p>
					</div>
					-->
					<div ng-repeat="vm in vmlist | filter: $ctrl.query" class="row vmlisting {{selected}}" ng-click="setSelected(this);setVM(this)">
							{{vm}}
					</div>

				</div>

				<!--VM Detail window-->
				<div ng-controller="vmDetailController" class="details col-md-9">
				<h1>{{vmname}}</h1>
				<h2>{{vmstatus}}</h2>
				<div>
					<input type=button class="btn btn-primary" value="Start" ng-click="startVM()">
					<input type=button class="btn btn-danger" value="Stop" ng-click="stopVM()">
					<input type=button class="btn btn-warning" value="Restart" ng-click="rebootVM()">
					<input type=button class="btn btn-danger" value="FORCE SHUTDOWN" ng-click="killVM()">
				</div>
			</div>
		</div>
	</div>
	



	</body>
</html>