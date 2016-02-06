var issues = app.controller('issueController', function ($scope, $http, $routeParams) {
    $scope.title = "Issues";

    $http.get("issue/get").success(function (data) {
        $scope.issues = data;
    });

    $http.get("issue/get/projects").success(function (data) {
        $scope.projects = data;
    });

    $http.get("issue/get/types").success(function (data) {
        $scope.types = data;
    });

    $http.get("issue/get/priorities").success(function (data) {
        $scope.priorities = data;
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
                        when('/Type', {
                            templateUrl: 'app/views/issue/type/index.html',
                            controller: 'issueController'
                        }).
                        when('/Priorities', {
                            templateUrl: 'app/views/issue/edit.html',
                            controller: 'issueController'
                        }).
                        when('/edit/:edit_id', {
                            templateUrl: 'app/views/issue/edit.html',
                            controller: 'issueController'
                        }).
                        when('/details/:details_id', {
                            templateUrl: 'app/views/issue/details.html',
                            controller: 'issueController'
                        }).
                        when('/delete/:delete_id', {
                            templateUrl: 'app/views/issue/delete.html',
                            controller: 'issueController'
                        }).
                        when('/create', {
                            templateUrl: 'app/views/issue/create.html',
                            controller: 'issueController'
                        }).
                        otherwise({
                            redirectTo: '/'
                        });
            }
        ]);