
app.controller('mainController', function ($scope, $http, $routeParams) {
    $scope.title = "Featured Projects";
    
    $http.get("index/get").success(function(data) {
        $scope.projects = data;

        $scope.projectIssues = function () {
            $scope.num=0;
            for (p in $scope.data) {
                $scope.num += $scope.data[p].issues;
            }
            return $scope.num;
        };
    });
    
     $http.get("index/get/issues").success(function(data) {
        $scope.issues = data;
    });
    
    $http.get("index/get/users").success(function(data) {
        $scope.users = data;
    });
    
    $scope.edit_id = $routeParams.edit_id;
    $scope.details_id = $routeParams.details_id-1;
});