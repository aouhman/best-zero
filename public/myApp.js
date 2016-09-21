var app = angular.module('myApp', ['ngRoute']).config(function($routeProvider, $locationProvider) {
    $routeProvider.otherwise({redirectTo:'/index'});
    $locationProvider.html5Mode(true);
});


app.controller('meetingController', function ($scope, $http) {
    $scope.meeting = {};
    $scope.info = "Comment crriger ce bugue" ;

    $scope.storeMeeting = function (meeting, newMeetingForm) {
        alert('abdessamad')
        return $http.post("http://localhost:8000/api/v1/meeting", {
                "time": meeting.time,
                "title": meeting.title,
                "description": meeting.description,
                "user_id": meeting.userId
            }
        ).then(function (response) {
                $scope.tab = response.data;
            });
    };

    $scope.cancelEdit = function () {
        window.location = "http://localhost:8000/api/v1/#/index";
    }

}).directive('popover', function($compile, $timeout){
    return {
        restrict: 'A',
        link:function(scope, el, attrs){
            var content = $("#popover-content").html();
            var compiledContent = $compile(content)(scope);
            var options = {
                content: compiledContent,
                html: true
            };
            el.popover(options);
        }
    }
});


