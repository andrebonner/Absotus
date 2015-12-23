app.controller('mainController', function ($scope, $http) {
    $scope.title = "Current Projects";
    $http.get("index/get").then(function (response) {
        $scope.data = response.data.dashboard;
    });
});