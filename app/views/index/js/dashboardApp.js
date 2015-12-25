var app = angular.module('dashboard', ['ngRoute']);

app.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider.
                when('/edit', {
                    templateUrl: 'http://localhost/Absotus/app/views/index/edit.html',
                    controller: 'mainController'
                }).
                when('/delete', {
                    templateUrl: 'delete.html',
                    controller: 'mainController'
                }).
                otherwise({
                    redirectTo: '/'
                });
    }
]);
