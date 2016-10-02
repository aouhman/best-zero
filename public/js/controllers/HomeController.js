'use strict';

app.controller('HomeController',
    function AuthController($scope, $http,$auth,$window){
        $scope.user = {};
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


        var vm = this;
        vm.login = function() {
            var credentials = {
                email: vm.email,
                password: vm.password
            };

            // Use Satellizer's $auth service to login
            $auth.login(credentials).then(function(data) {
                $window.location.href = '/api/v1/#/meetings'; //redirect to home
            });
        };
        $scope.vm = vm;
    }



);
