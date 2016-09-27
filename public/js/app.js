var app = angular.module('app', ['ngSanitize', 'ngResource', 'ngRoute'])
    .config(function ($routeProvider, $locationProvider) {

        $routeProvider.when('/calendar',
            {
                templateUrl: '/templates/Calendar.html',
                controller: 'CalendarController'
            });

        $routeProvider.when('/meetings',
            {
                templateUrl: '/templates/MeetingList.html',
                controller: 'MeetingListController'
            });

        $routeProvider.when('/index',
            {
                templateUrl: '/templates/DefaultContent.html',
                controller: 'DefaultContentController'
            });


        $routeProvider.otherwise({redirectTo: '/'});
        //$locationProvider.html5Mode(true);
    });

app.controller('meetingController', function ($scope, $http, $window) {
    $scope.meeting = {};
    $scope.info = "Comment crriger ce bugue";

    $scope.storeMeeting = function (meeting, newMeetingForm) {
        return $http.post("/api/v1/meeting", {
                "time": meeting.time,
                "title": meeting.title,
                "description": meeting.description,
                "user_id": meeting.userId
            }
        ).then(function (response) {
                $scope.results = response.data;
            });
    };

    $scope.deleteMeeting = function (id) {
        if (confirm('Really delete this?')) {
                return $http.delete("/api/v1/meeting/" + id, {}
                ).then(function (response) {
                        $scope.deleteMeeting = response.data;
                        $window.location.href = '/api/v1/#/meetings'; //redirect to home
                    });
        }
    };

    $scope.cancelEdit = function () {
        window.location = "http://localhost:8000/api/v1/#/index";
    }

})

