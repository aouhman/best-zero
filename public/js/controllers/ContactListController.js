'use strict';

app.controller('ContactListController',
    function ContactListController($scope, $http){
        return $http.get("/api/v1/contact").then(function (response) {
                $scope.results = response.data;
            });
    }
);

