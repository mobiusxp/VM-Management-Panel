var myapp = angular.module('adminpanel', []);

// Watch for changes in ListController and refresh VM Controller
myapp.factory("Service", function () {
    var vmname = "none";
     function getVM() {
        return vmname;
    }
    function setVM(name) {
        vmname = name;
    }
    return {
        getVM: getVM,
        setVM: setVM,
    }
});

myapp.controller("listController", function listController($scope, $http, Service){
	$scope.setVM = Service.setVM;

	$http({method:'GET', url:"./svc/svc.php?svc=getAllVMs"}).then(function successCallback(n){
		$scope.vmlist = n.data;
		// console.log(n);
	});

	$scope.setSelected = function() {
	   // console.log("show", arguments, this);
	   if ($scope.lastSelected) {
	     $scope.lastSelected.selected = '';
	   }
	   this.selected = 'selected';
	   $scope.lastSelected = this;
	}
});

myapp.controller("vmDetailController", function vmDetailController($scope, $http, Service){
	 $scope.$watch(function () { return Service.getVM();}, function (value) {
	 		//console.log(value);
	        $scope.vmname = value.vm;
			$http({method:'GET', url:"./svc/svc.php?svc=getVMByName&name=" + value.vm + ""}).then(function successCallback(n){
				if(n.data.state == 1){
					$scope.vmstatus = "Online";
				}else{
					$scope.vmstatus = "Offline";
				}
			});
	    });

	 $scope.testFunc = function(){
	 	console.log($scope.vmname);
	 };

	 $scope.startVM = function(){
	 	$http({method:'GET', url:"./svc/svc.php?svc=startVM&name=" + $scope.vmname + ""}).then(function successCallback(n){
	 		if(n.data){
	 			$scope.vmstatus = "Online";
	 			alert($scope.vmname + " was sucessfully started");
	 		}else{
	 			alert('Could not modify VM');
	 		}
		});
	 };

	 $scope.stopVM = function(){
	 	$http({method:'GET', url:"./svc/svc.php?svc=stopVM&name=" + $scope.vmname + ""}).then(function successCallback(n){
	 		if(n.data){
	 			$scope.vmstatus = "Offline";
	 			alert($scope.vmname + " was succesfully closed");
	 		}else{
	 			alert('Could not modify VM');
	 		}
		});
	 };

	 $scope.rebootVM = function(){
	 	$http({method:'GET', url:"./svc/svc.php?svc=restartVM&name=" + $scope.vmname + ""}).then(function successCallback(n){
	 		if(n.data){
	 			$scope.vmstatus = "Offline";
	 			alert($scope.vmname + " was succesfully restarted");
	 		}else{
	 			alert('Could not modify VM');
	 		}
		});

	 };

	 $scope.killVM = function(){
	 	$http({method:'GET', url:"./svc/svc.php?svc=killVM&name=" + $scope.vmname + ""}).then(function successCallback(n){
	 		if(n.data){
	 			$scope.vmstatus = "Offline";
	 			alert($scope.vmname + " was succesfully force closed");
	 		}else{
	 			alert('Could not modify VM');
	 		}
		});
	 };
});

