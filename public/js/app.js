var app = angular.module('app',
    ['ngSanitize', 'ngResource', 'ngRoute', 'satellizer','ui.calendar'])
    .config(function ($routeProvider,  $authProvider) {
        $authProvider.loginUrl = '/api/v1/user/signin';

        $routeProvider.when('/contacts',
            {
                templateUrl: '/templates/ContactList.html',
                controller: 'ContactListController'
            });

        $routeProvider.when('/meetingCalendar',
            {
                templateUrl: '/templates/MeetingCalendar.html',
                controller: 'MeetingCalendarController'
            });

        $routeProvider.when('/meetings',
            {
                templateUrl: '/templates/MeetingList.html',
                controller: 'MeetingListController'
            });

        $routeProvider.when('/meeting',
            {
                templateUrl: '/templates/Meeting.html',
                controller: 'MeetingController'
            });
        $routeProvider.when('/meeting/:id',
            {
                templateUrl: '/templates/Meeting.html',
                controller: 'MeetingController'
            });

        $routeProvider.when('/login',
            {
                templateUrl: '/templates/login.html',
                controller: 'HomeController'
            });


        //$routeProvider.otherwise({redirectTo: '/login'});
        //$locationProvider.html5Mode(true);
    });


