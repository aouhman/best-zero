'use strict';

app.controller('ContactController',
    function ContactController($scope, $http,$auth, $window) {

        //$http.get("/api/v1/contact").then(function (response) {
        //    $scope.countContact  = response.data.contacts.length;
        //});
        //
        //
        //$scope.logout = function __logout() {
        //    $auth.logout();
        //    $window.location.href = '/api/v1/#/login'; //redirect to home
        //};
        //
        //$scope.getContact = function (id) {
        //    return $http.get("/api/v1/contact/" + id, {}
        //    ).then(function (response) {
        //            $scope.results = response.data;
        //            $scope.contact = response.data.contact;
        //            $window.location.href = '/api/v1/#/contact/'; //
        //        });
        //};

        //$scope.saveContact = function (contact, editContactForm, id) {
        //
        //    if(editContactForm.$valid) {
        //        return $http.patch("/api/v1/contact/" + id, {
        //                "time": contact.time,
        //                "title": contact.title,
        //                "description": contact.description
        //            }
        //        ).then(function (response) {
        //
        //                $scope.results.msg = "Contact updated";
        //                $scope.results = response.data;
        //                $window.location.href = '/api/v1/#/contact/'+ id; //
        //            });
        //    }
        //};

        $scope.storeContact = function (contact, editContactForm) {
            if(editContactForm.$valid){
                return $http.post("/api/v1/contact", {
                        "firstName": contact.firstName,
                        "lastName": contact.lastName,
                        "company": contact.company
                    }
                ).then(function (response) {
                        $scope.results = response.data;
                        $scope.contact = {};
                    });

            }
        };

        //$scope.deleteContact = function (id) {
        //    //if (confirm('Really delete this?')) {
        //    return $http.delete("/api/v1/contact/" + id, {}
        //    ).then(function (response) {
        //
        //            $scope.contactData = response.data;
        //            $window.location.href = '/api/v1/#/contact'; //redirect to home  pour actualiser la liste des reunions dans le tableau
        //            $window.location.href = '/api/v1/#/contacts'; //
        //            $scope.contactData.class = "alert-success"
        //        },
        //        function(response){
        //            $scope.contactData = response.data;
        //            $scope.contactData.class = "alert-danger";
        //
        //        });
        //    //}
        //};





    });
