var app = angular.module('app',  ['ngSanitize','ngResource' ,'ngRoute'])
    .config(function($routeProvider, $locationProvider) {

    $routeProvider.when('/calendar',
   {
    templateUrl: '/templates/Calendar.html',
    controller:  'CalendarController'
    });

    $routeProvider.when('/index',
   {
    templateUrl: '/templates/DefaultContent.html',
    controller:  'DefaultContentController'
    });

   $routeProvider.otherwise({redirectTo:'/index'});
    //$locationProvider.html5Mode(true);
});

app.controller('meetingController', function ($scope, $http) {
    $scope.meeting = {};
    $scope.info = "Comment crriger ce bugue" ;

    $scope.storeMeeting = function (meeting, newMeetingForm) {
        return $http.post("http://localhost:8000/api/v1/meeting", {
                "time": meeting.time,
                "title": meeting.title,
                "description": meeting.description,
                "user_id": meeting.userId
            }
        ).then(function (response) {
                $scope.results = response.data;
            });
    };

    $scope.cancelEdit = function () {
        window.location = "http://localhost:8000/api/v1/#/index";
    }

})

