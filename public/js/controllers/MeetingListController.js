'use strict';

app.controller('MeetingListController',
    function MeetingListController($scope, $http){

        return $http.get("/api/v1/meeting").then(function (response) {
                $scope.results = response.data;
            });

    }

);

