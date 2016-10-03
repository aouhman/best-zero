var app = angular.module('app',
    ['ngSanitize', 'ngResource', 'ngRoute', 'satellizer'])
    .config(function ($routeProvider,  $authProvider) {
        $authProvider.loginUrl = '/api/v1/user/signin';



        $routeProvider.when('/contacts',
            {
                templateUrl: '/templates/ContactList.html',
                controller: 'ContactListController'
            });

        $routeProvider.when('/MeetingCalendar',
            {
                templateUrl: '/templates/MeetingCalendar.html',
                controller: 'MeetingCalendarController'
            });

        $routeProvider.when('/meetings',
            {
                templateUrl: '/templates/MeetingList.html',
                controller: 'MeetingListController'
            });

        $routeProvider.when('/index',
            {
                templateUrl: '/templates/NewMeeting.html',
                controller: 'NewMeetingController'
            });
        $routeProvider.when('/login',
            {
                templateUrl: '/templates/login.html',
                controller: 'HomeController'
            });


        $routeProvider.otherwise({redirectTo: '/login'});
        //$locationProvider.html5Mode(true);
    });

app.controller('meetingController', function ($scope, $http,$auth, $window) {


    $scope.meeting = {};
    $scope.countMeeting = 2;


    $scope.logout = function __logout() {
        $auth.logout();
        $window.location.href = '/api/v1/#/login'; //redirect to home
    };



   $scope.storeMeeting = function (meeting, newMeetingForm) {
        return $http.post("/api/v1/meeting", {
                "time": meeting.time,
                "title": meeting.title,
                "description": meeting.description
            }
        ).then(function (response) {
                $scope.results = response.data;
                $window.location.href = '/api/v1/#/meetings'; //redirect to home
                $window.location.href = '/api/v1/#/index'; //redirect to home
            });
    };

    $scope.deleteMeeting = function (id) {
        //if (confirm('Really delete this?')) {
                return $http.delete("/api/v1/meeting/" + id, {}
                ).then(function (response) {

                        $scope.meetingInfo = response.data;
                        $window.location.href = '/api/v1/#/'; //redirect to home  pour actualiser la liste des reunions dans le tableau
                        $window.location.href = '/api/v1/#/meetings'; //
                        $scope.meetingInfo.class = "alert-success"
                    },
                    function(response){
                        $scope.meetingInfo = response.data;
                        $scope.meetingInfo.class = "alert-danger";

                    });
        //}
    };



    $scope.cancelEdit = function () {
        window.location = "http://localhost:8000/api/v1/#/index";
    }

});

