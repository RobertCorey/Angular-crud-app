/*
* Simple wrapper for the $http object to handle application specific http requests
*/
var customerAppServer = angular.module('customerAppServer',[]);

customerAppServer.factory('Server',['$http', function ($http) {
	//the location of the REST server handling the requests
	var serverUrl = 'php/server.php/'; 
	return {
		//@return promise an array of all the json objects representing customers
		getAllCustomers : function () {
			var query = serverUrl + "?query=*";
			return $http.get(query);
		},
		//@param key the email of a customer
		//@return promise a json object representing a customer
		getCustomer: function (key) {
			var query = serverUrl + "?query=" + key;
			return $http.get(query);
		},
		//writes a customer json to the server
		writeCustomer : function (jsonCustomer){
			return $http.put(serverUrl,jsonCustomer);
		},
		//deletes a customer json from the server
		deleteCustomer: function (key){
			var filePath = serverUrl + key;
			return $http.delete(filePath);
		}
	};	
}]);