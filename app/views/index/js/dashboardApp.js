var app = angular.module('dashboard', ['ngRoute'])
        .config(['$routeProvider',
            function ($routeProvider) {
                $routeProvider.
                        /*when('/',{
                         template: '<br/>'
                         
                         }).*/
                        when('/project/edit/:edit_id', {
                            templateUrl: 'app/views/index/edit.html',
                            controller: 'mainController'
                        }).
                        when('/project/details/:details_id', {
                            templateUrl: 'app/views/index/details.html',
                            controller: 'mainController'
                        }).
                        otherwise({
                            redirectTo: '/'
                        });
            }
        ])
        .controller('menuController', function ($scope) {
            $scope.menu = [
                {
                    "title": "Projects",
                    "url": "project"
                },
                {
                    "title": "Issues",
                    "url": "issues"
                },
                {
                    "title": "Users",
                    "url": "user"
                }
            ];

            $scope.navside = [
                {
                    "title": "Overview",
                    "url": "#/"
                },
                {
                    "title": "Reports",
                    "url": "#/"
                },
                {
                    "title": "Analytics",
                    "url": "#/"
                },
                {
                    "title": "Export",
                    "url": "#/"
                }
            ];
        });
