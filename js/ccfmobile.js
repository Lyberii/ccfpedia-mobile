/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2016-09-25 18:21:39
 * @version $Id$
 */
var app = angular.module('main', ['ngResource']);
app.constant("ENV", {
    "name": "development",
    "debug": true,
    "urlBase":"",//开发环境
    "success":"SUCCESS",
    "fail":"FAIL",
    "error":"ERROR"
});
app.config(['$locationProvider', function ($locationProvider) {
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    });
}]);

app.factory('httpFactory', ["$resource","ENV",
    function($resource,ENV){
        return $resource(ENV.urlBase,{},
        {
            queryAll:{
                url: 'http://jwc.ecust.edu.cn/',
                method: 'GET',
                isArray: false,
                headers: {'Access-Control-Allow-Origin':"*",
                    'Access-Control-Allow-Methods':'GET, POST, OPTIONS, PUT, PATCH, DELETE'
                }
            }
        })
    }]);
app.controller('mainCtrl', ['$scope','$location','$http','httpFactory',
    function($scope,$location,$http,httpFactory){
        httpFactory.queryAll().$promise.then(function(response){
            if (response!=null) {
                $scope.content="http get ok！"
            };
        })
    }])