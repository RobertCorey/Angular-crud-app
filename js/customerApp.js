var customerApp = angular.module('customerApp', [
	'ngRoute',
	'customerAppControllers',
	'customerAppServer'
]);
customerApp.config(['$routeProvider',function($routeProvider) {
	$routeProvider.
		//if nothing has been requested show the default listing view
		when('/cust', {
			templateUrl: 'templates/customer-list.html',
			controller: 'CustomerListController'
		}).
		//if a modify or the add new button has been clicked show the add/modify view
		when('/cust/:key', {
			templateUrl: 'templates/customer-detail.html',
			controller: 'CustomerModifyController'
		}).
		//redirect to listing view
		otherwise({
			redirectTo: '/cust'
		});
}]);
