
app.controller('mainController', function ($scope, $http) {
    $scope.title = "Featured Projects";
    $http.get("index/get").success(function(data) {
        $scope.data = data.dashboard;

        $scope.projectIssues = function () {
            $scope.num=0;
            for (p in $scope.data.projects) {
                $scope.num += $scope.data.projects[p].issues.length;
            }
            return $scope.num;
        };
    });
});