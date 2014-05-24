var customerApp = angular.module('customerApp', [
	'ngRoute',
	'customerAppControllers'
	]);
customerApp.config(['$routeProvider',function($routeProvider) {
	$routeProvider.
		when('/', {
			templateUrl: 'templates/customer-list.html',
			controller: 'CustomerListController'
		}).
		when('/:email', {
			templateURL: 'templates/customer-detail.html',
			controller: 'CustomerDetailController'
		}).
		otherwise({
			redirectTo: '/'
		});
}]);	