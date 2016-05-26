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
	    });
});

