var projects = app.controller('projectController', function ($scope, $http, $routeParams) {
    $scope.title = "Projects";

    $http.get("project/get").success(function (data) {
        $scope.data = data.dashboard;
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
                            templateUrl: 'app/views/project/edit.html',
                            controller: 'projectController'
                        }).
                        when('/details/:details_id', {
                            templateUrl: 'app/views/project/details.html',
                            controller: 'projectController'
                        }).
                        when('/delete/:delete_id', {
                            templateUrl: 'app/views/project/delete.html',
                            controller: 'projectController'
                        }).
                        otherwise({
                            redirectTo: '/'
                        });
            }
        ]);