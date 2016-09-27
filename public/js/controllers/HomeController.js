'use strict';

app.controller('HomeController',
    function Controller($scope, $http){
        $scope.user = {

        };

        $scope.storeUser = function (user) {
            return $http.post("/api/v1/user", {
                    "password": user.password,
                    "name": user.name,
                    "email": user.email

                }
            ).then(function (response) {
                    $scope.results = response.data;
                });
        };
    }
);
