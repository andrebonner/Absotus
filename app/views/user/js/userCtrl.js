var users = app.controller('userController', function ($scope, $http, $routeParams) {
    $scope.title = "Users";

    $http.get("user/get").success(function (data) {
        $scope.users = data;
    });
    
    $http.get("user/get/roles").success(function (data) {
        $scope.roles = data;
    });
    $scope.edit_id = $routeParams.edit_id - 1;
    $scope.details_id = $routeParams.details_id - 1;
    $scope.delete_id = $routeParams.delete_id - 1;
})
        .config(['$routeProvider',
            function ($routeProvider) {
                $routeProvider.
                        /*when('/',{
                         template: '<br/>'
                         
                         }).*/
                        when('/edit/:edit_id', {
                            templateUrl: 'app/views/user/edit.html',
                            controller: 'userController'
                        }).
                        when('/details/:details_id', {
                            templateUrl: 'app/views/user/details.html',
                            controller: 'userController'
                        }).
                        when('/delete/:delete_id', {
                            templateUrl: 'app/views/user/delete.html',
                            controller: 'userController'
                        }).
                        when('/create', {
                            templateUrl: 'app/views/user/create.html',
                            controller: 'userController'
                        }).
                        otherwise({
                            redirectTo: '/'
                        });
            }
        ]);