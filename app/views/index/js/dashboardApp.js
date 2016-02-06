var app = angular.module('dashboard', ['ngRoute'])
        .config(['$routeProvider',
            function ($routeProvider) {
                $routeProvider.
                        /*when('/',{
                         template: '<br/>'
                         
                         }).*/
                        when('/project#/edit/:edit_id', {
                            templateUrl: 'app/views/index/edit.html',
                            controller: 'projectController'
                        }).
                        when('/project#/details/:details_id', {
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
                    "url": "project",
                    "submenu": null
                },
                {
                    "title": "Issues",
                    "url": "issue",
                    "submenu": [
                        {
                            "title": "Issue Types", 
                            "url": "#/Type"}, 
                        {
                            "title": "Issue Priorities", 
                            "url": "#/Priorities"
                        }
                    ]
                },
                {
                    "title": "Users",
                    "url": "user",
                    "submenu":null
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
