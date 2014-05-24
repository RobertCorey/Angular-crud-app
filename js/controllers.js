var customerAppControllers = angular.module('customerAppControllers',[]);

customerAppControllers.controller('CustomerListController', ['$scope','$http',
	function ($scope,$http) {
		$http.get('php/getCustomers.php').success(function(data){
			$scope.customers = data;
		});
		$scope.deleteCustomer = function(email){
			for (var i = 0; i < $scope.customers.length; i++) {
				if($scope.customers[i].email === email){
					$scope.customers.splice(i,1);
					break;
				}
			}
			$http.post('php/deleteCustomer.php',email).success
		}
	}
]);

customerAppControllers.controller('CustomerDetailController', ['$scope', function($scope){
	$scope.message = { text: 'Customer Details' };
}])