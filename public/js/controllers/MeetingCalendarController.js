'use strict';

app.controller('MeetingCalendarController',
    function MeetingCalendarController($scope, $http) {
          var meetingList;
           $http.get("/api/v1/meeting").then(function (response) {
               meetingList  = response.data;

               var meetings = {
                   meeting: []
               };
               for(var i in meetingList.meetings) {

                   var meeting = meetingList.meetings[i];
                   meetings.meeting.push({
                       "title" : meeting.title,
                       "start" : meeting.created_at,
                       "color" : 'tomato'
                   });
               }



               $('#calendar').fullCalendar({
                   header: {
                       left: 'prev,next today',
                       center: 'title',
                       right: 'month,agendaWeek,agendaDay'
                   },
                   defaultDate: Date.now(),
                   editable: true,
                   eventLimit: true, // allow "more" link when too many events
                   events: meetings.meeting
               });

           });


    }


);