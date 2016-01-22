
app.controller('mainController', function ($scope, $http, $routeParams) {
    $scope.title = "Featured Projects";
    
    $http.get("index/get").success(function(data) {
        $scope.data = data;

        $scope.projectIssues = function () {
            $scope.num=0;
            for (p in $scope.data) {
                $scope.num += $scope.data[p].issues;
            }
            return $scope.num;
        };
    });
    $scope.edit_id = $routeParams.edit_id;
    $scope.details_id = $routeParams.details_id-1;
});