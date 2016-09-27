/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2016-09-25 18:21:39
 * @version $Id$
 */
var app = angular.module('main', ['ngRoute','ngResource']);
app.constant("ENV", {
    "name": "development",
    "debug": true,
    "urlBase":"",
    "success":"200",
    "fail":"FAIL",
    "error":"ERROR"
});
app.config(['$locationProvider', function ($locationProvider) {
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    });
}]);
app.factory('httpService', ['$resource','ENV',
    function($resource,ENV){
        return $resource(ENV.urlBase,{},{
            query:{
                method:"GET",
                url:ENV.urlBase+"http://web.juhe.cn:8080/finance/exchange/rmbquot?key=62d687a8ce6c67b0a6fa316805807883"
            }
        })
}]);
app.controller('mainCtrl', ['$scope','httpService','ENV',
    function($scope,httpService,ENV){
    	httpService.query().$promise.then(function (response){
            if (response != null && response.resultcode == ENV.success) {
                $scope.content=response.result;
            };
        });
    }])