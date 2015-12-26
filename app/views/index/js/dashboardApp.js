var app = angular.module('dashboard', ['ngRoute']);

app.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider.
                /*when('/',{
                    template: '<br/>'
            
                }).*/
                when('/edit/:edit_id', {
                    templateUrl: 'http://localhost/Absotus/app/views/index/edit.html',
                    controller: 'mainController'
                }).
                when('/details/:details_id', {
                    templateUrl: 'http://localhost/Absotus/app/views/index/details.html',
                    controller: 'mainController'
                }).
                otherwise({
                    redirectTo: '/'
                });
    }
]);
