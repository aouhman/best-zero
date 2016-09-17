
<html lang="en" ng-app="myApp">  
    <head>
        <meta charset="UTF8">
        <base href="/"/>
        <title>let it go</title>
        <!-- Add the usual things here -->
    </head>
    <body>
        <div id="maincontent" ng-controller="meetingController">
        <div class="class">
            <h1>New Meeting</h1>
            <hr/>
            <form action="" name="NewMeetingForm">
                <fieldset>
                    <label for="meetingTitle">Meeting Title</label>
                    <input id="meetingTitle" ng-model="meeting.title" type="text" placeholder="Title of your Meeting"/>

                    <label for="meetingUserId">User </label>
                    <input id="meetingUserId" ng-model="meeting.userId" type="text" placeholder="User by default"/>

                    <label for="meetingTime">Meeting Time</label>
                    <input id="meetingTime" ng-model="meeting.time" type="text" placeholder="Start and end time ..."/>

                     <label for="meetingDescription">Meeting Description</label>
                    <input id="meetingDescription" ng-model="meeting.description" type="text" placeholder="Description of your Meeting" required/>


                <br/>
                <button type="submit" ng-click="storeMeeting(meeting,newMeetingForm)" class="btn btn-primary">Save</button>
                <button type="button" ng-click="cancelEdit()" class="btn btn-default">Cancel</button>
                </fieldset>
            </form>
        </div>
        @{{messages.msg}}
       </div>
        <script src="/vendor/angular/angular.min.js">

        </script>
        <script src="/vendor/angular/angular-route.min.js"></script>
        <script src="/myApp.js"></script>

    </body>
</html>  