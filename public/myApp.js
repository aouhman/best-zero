var app = angular.module('myApp', ['ngRoute']).config(function($routeProvider, $locationProvider) {
    $routeProvider.otherwise({redirectTo:'/index'});
    $locationProvider.html5Mode(true);
});


app.controller('meetingController', function ($scope, $http) {
    $scope.meeting = {};
    $scope.storeMeeting = function (meeting, newMeetingForm) {
        return $http.post("http://localhost:8000/api/v1/meeting", {
                "time": meeting.time,
                "title": meeting.title,
                "description": meeting.description,
                "user_id": meeting.userId
            }
        ).then(function (response) {
                $scope.messages = response.data;
            });
    };

    $scope.cancelEdit = function () {
        window.location = "http://localhost:8000/api/v1/#/index";
    }

});

