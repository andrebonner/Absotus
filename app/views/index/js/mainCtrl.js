app.controller('mainController', function($scope,$http){
    $scope.title = "- Objects";
    $http.get("config.json").then(function(response) {$scope.config = response.data.config;});
});