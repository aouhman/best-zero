'use strict';

app.controller('MeetingController', function MeetingController($scope, $http,$auth, $window) {

         $http.get("/api/v1/meeting").then(function (response) {
             $scope.countMeeting  = response.data.meetings.length;
        });


    $scope.logout = function __logout() {
        $auth.logout();
        $window.location.href = '/api/v1/#/login'; //redirect to home
    };


    $scope.getMeeting = function (id) {
        return $http.get("/api/v1/meeting/" + id, {}
        ).then(function (response) {
                $scope.results = response.data;
                $scope.meeting = response.data.meeting;
                $window.location.href = '/api/v1/#/meeting/'; //
            });
        };

    $scope.saveMeeting = function (meeting, editMeetingForm, id) {

        if(editMeetingForm.$valid) {
            return $http.patch("/api/v1/meeting/" + id, {
                    "time": meeting.time,
                    "title": meeting.title,
                    "description": meeting.description
                }
            ).then(function (response) {

                    $scope.results.msg = "Meeting updated";
                    $scope.results = response.data;
                    $window.location.href = '/api/v1/#/meeting/'+ id; //
                });
        }
    };

    $scope.storeMeeting = function (meeting, editMeetingForm) {
        if(editMeetingForm.$valid){
            return $http.post("/api/v1/meeting", {
                    "time": meeting.time,
                    "title": meeting.title,
                    "description": meeting.description
                }
            ).then(function (response) {
                    $scope.results = response.data;
                });
        }
    };

    $scope.deleteMeeting = function (id) {
        //if (confirm('Really delete this?')) {
        return $http.delete("/api/v1/meeting/" + id, {}
        ).then(function (response) {

                $scope.meetingData = response.data;
                $window.location.href = '/api/v1/#/meeting'; //redirect to home  pour actualiser la liste des reunions dans le tableau
                $window.location.href = '/api/v1/#/meetings'; //
                $scope.meetingData.class = "alert-success"
            },
            function(response){
                $scope.meetingData = response.data;
                $scope.meetingData.class = "alert-danger";

            });
        //}
    };



    $scope.cancelEdit = function () {
        $scope.meeting = {};
        $scope.results = {};
        window.location = "/api/v1/#/meeting";
    }

});
