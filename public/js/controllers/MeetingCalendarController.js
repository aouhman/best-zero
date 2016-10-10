'use strict';

app.controller('MeetingCalendarController',
    function MeetingCalendarController($scope,$compile, $http) {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var currentView = "month";

        $scope.events=[];

        $http.get("/api/v1/calendar").then(function (response) {
            for(var i = 0; i < response.data.length; i++)
            {
                $scope.events[i] = {id:response.data[i].id, title: response.data[i].title,start: new Date(response.data[i].created_at), end: new Date(response.data[i].created_at),color:response.data[i].register,allDay: false};
            }
        });
        //with this you can handle the events that generated by clicking the day(empty spot) in the calendar
        $scope.dayClick = function( date, allDay, jsEvent, view ){
                $scope.alertMessage = ('Day Clicked ' + date);
        };


        //with this you can handle the events that generated by droping any event to different position in the calendar
        $scope.alertOnDrop = function(event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view){
                $scope.alertMessage = ('Event Droped to make dayDelta ' + dayDelta);
        };


        //with this you can handle the events that generated by resizing any event to different position in the calendar
        $scope.alertOnResize = function(event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view ){
                $scope.alertMessage = ('Event Resized to make dayDelta ' + minuteDelta);
        };



        //with this you can handle the click on the events
        $scope.eventClick = function(event){
                $scope.alertMessage = (event.title + ' is clicked');
                for(var i = 0; i <  $scope.eventSources[0].length; i++){
                    if( $scope.eventSources[0][i].id == event.id){
                        if(event.color=="#4BB815"){
                            $http.delete("/api/v1/meeting/registration/" + event.id, {}
                            ).then(function () {
                                    $scope.eventSources[0][i].title = event.title + ' ';
                                    $scope.eventSources[0][i].color = "";
                                });
                        }else{


                            $http.post("/api/v1/meeting/registration/", {
                                'meeting_id':event.id
                                }
                            ).then(function () {
                                    $scope.eventSources[0][i].color = "#4BB815";
                                    $scope.eventSources[0][i].title = event.title + ' ';
                                });

                        }


                        break;
                    }
                }


        };


        $scope.renderView = function(view){
            var date = new Date(view.calendar.getDate());
            $scope.currentDate = date.toDateString();
            //$scope.alertMessage = ('Page render with date '+ $scope.currentDate);

            $http.get("/api/v1/calendar").then(function (response) {
                for(var i = 0; i < response.data.length; i++)
                {
                    $scope.events[i] = {id:response.data[i].id, title: response.data[i].title,start: new Date(response.data[i].created_at), end: new Date(response.data[i].created_at),color:response.data[i].register,allDay: false};
                }
            });

        };


        //with this you can handle the events that generated when we change the view i.e. Month, Week and Day
        $scope.changeView = function(view,calendar) {
            alert('abdessamad');
            currentView = view;
            calendar.fullCalendar('changeView',view);
                $scope.alertMessage = ('You are looking at '+ currentView);
        };

        /* Render Tooltip */
        $scope.eventRender = function( event, element, view ) {
            element.attr({'title': event.title,
                'tooltip-append-to-body': true});
            $compile(element)($scope);
        };

        /* config object */
        $scope.uiConfig = {
            calendar:{
                height: 450,
                editable: true,
                header:{
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                dayClick: $scope.dayClick,
                eventDrop: $scope.alertOnDrop,
                eventResize: $scope.alertOnResize,
                eventClick: $scope.eventClick,
                viewRender: $scope.renderView,
                eventRender: $scope.eventRender
            }
        };

        /* event sources array*/
        $scope.eventSources = [$scope.events];
    });