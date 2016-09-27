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

app.factory('httpFactory', function($http){
    return {
        query : function(){
            return $http({
                url:'http://jwc.ecust.edu.cn/',
                method:'GET'
            })
        }
    }
});
app.controller('mainCtrl', ['$scope','$location','$http','httpFactory','ENV',
    function($scope,httpService,ENV){
    	httpFactory.query().success(function (data){
            $scope.content=data.result;
        });
    }])