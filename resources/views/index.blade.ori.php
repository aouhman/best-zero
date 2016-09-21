<!DOCTYPE html>
<html ng-app="myApp">

<!-- Mirrored from themes.vivantdesigns.com/streamlined/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Jun 2016 09:54:55 GMT -->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Streamlined - Contact Management/CRM Template</title>
        <base href="/"/>

<!-- Compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="/css/bootstrap-theme.min.css">

<!-- Compiled and minified FontAwesome CSS -->
<link rel="stylesheet" href="/css/font-awesome.min.css">

<link rel="stylesheet" media="screen" href="/css/style.css" />
</head>
<body>
    <div id="wrapper"  ng-controller="meetingController">
        <header>
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="dashboard.html">Streamlined</a>
                    </div>


                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul id="main-nav" class="nav navbar-nav">
                            <li class="action">
                                <button class="btn btn-primary navbar-btn" data-toggle="popover" data-title="Add new contact" data-placement="bottom" data-content='                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                First Name<br />
                                                <input class="form-control" type="text" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                Last Name<br />
                                                <input class="form-control" type="text" /><br />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                Company<br />
                                                <input class="form-control" type="text" />
                                            </div>
                                        </div>
                                        <hr />
                                        <button class="btn btn-primary" type="button">Add contact</button>
                                        <button class="btn btn-default popover-close" type="button">Cancel</button>
                                    </form>
'><i class="fa fa-plus-circle"></i> New Contact</button>
    <button class="btn btn-primary navbar-btn" data-toggle="popover" data-title="Add new meeting" data-placement="bottom" data-content='
                                        @{{tab.msg}}
                                       <form action="" name="NewMeetingForm" class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                Meeting Title<br />
                                                <input class="form-control"  id="meetingTitle" ng-model="meeting.title" type="text" placeholder="Title of your Meeting"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                User<br />
                                                <input class="form-control"  id="meetingUserId" ng-model="meeting.userId" type="text" placeholder="User by default"/><br />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                Meeting Time<br />
                                                <input class="form-control" id="meetingTime" ng-model="meeting.time" type="text" placeholder="Start and end time ..."/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                Meeting Description<br />
                                                <input class="form-control" id="meetingDescription" ng-model="meeting.description" type="text" placeholder="Description of your Meeting"/>
                                            </div>
                                        </div>
                                        <hr />
                                        <button type="submit" ng-click="storeMeeting(meeting,newMeetingForm)" class="btn btn-primary">Save</button>
                                        <button type="button" ng-click="cancelEdit()" class="btn btn-default">Cancel</button>

                                    </form>
'><i class="fa fa-plus-circle"></i> New meeting</button>
                            </li>
                            <li class="action">
                                <button class="btn btn-primary navbar-btn" data-toggle="popover" data-title="Add new contact" data-placement="bottom" data-content='                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                When it&#39;s due?<br />
                                                <input class="form-control" type="date" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                What category?<br/>
                                                <select class="form-control"><option>None</option></select>
                                            </div>
                                        </div>
                                        <hr />
                                        <button class="btn btn-primary" type="button">Add task</button>
                                        <button class="btn btn-default popover-close" type="button">Cancel</button>
                                    </form>
'><i class="fa fa-plus-circle"></i> New Task</button>
                            </li>
                            <li class="active"><a href="dashboard.html">Dashboard</a></li>
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="calendar.html">Calendar</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administrator <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Account</a></li>
                                    <li><a href="#">Users</a></li>
                                    <li><a href="#">Groups</a></li>
                                    <li><a href="#">Sign out</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-right">
                            <div class="form-group">
                                <input type="text" class="form-control search" placeholder="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </header>

        <section>
            <div class="container">
                <div class="row">

                    <!-- Sidebar -->

                    <aside class="col-md-3 no-padding">

                        <nav class="global">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="dashboard.html"><i class="fa fa-home"></i> Overview</a></li>
                                <li><a href="activity.html"><i class="fa fa-heartbeat"></i> Latest Activity</a></li>
                                <li><a href="contacts.html"><i class="fa fa-book"></i>  Contacts <span class="badge pull-right">2</span></a></li>
                                <li><a href="tasks.html"><i class="fa fa-tasks"></i> Tasks <span class="badge bg-warning pull-right">1</span></a></li>
                                <li><a href="notes.html"><i class="fa fa-file-text"></i> Notes</a></li>
                            </ul>
                        </nav>

                        <nav class="subnav recent">
                            <h4>Recent Contacts</h4>
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a class="contact" href="profile.html" data-toggle="popover" data-trigger="hover" title="Profile Summary" data-content='<span class="avatar">
                                        </span>
                                        <p>John Doe<br>
                                        <small class="text-muted">Some Company LTD</small></p>
                                        <address>123 Some Street, LA</address>
'><h5>John Doe</h5><h6>Some Company LTD</h6></a>
                                </li>
                                <li>
                                    <a class="contact" href="profile.html" data-toggle="popover" data-trigger="hover" title="Profile Summary" data-content='<span class="avatar">
                                        </span>
                                        <p>Jane Roe<br>
                                        <small class="text-muted">Some Company LTD</small></p>
                                        <address>123 Some Street, LA</address>
'><h5>Jane Roe</h5><h6>Other Company Inc.</h6></a>
                                </li>
                            </ul>
                        </nav>

                        <nav class="subnav">
                            <h4>Style Templates</h4>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="layouts.html">Layouts</a></li>
                                <li><a href="styles.html">Styles</a></li>
                                <li><a href="forms.html">Forms</a></li>
                                <li><a href="tables.html">Tables</a></li>
                            </ul>
                        </nav>
                    </aside>

                    <!-- Sidebar End -->


                    <!-- Main Section -->

                    <section class="col-md-9 no-padding">
                        <div class="main-section">

                            <div class="main-content panel panel-default">
                                <header class="panel-heading clearfix">
                                    <a data-target="documentation/index.html" href="#" class="btn btn-default pull-right" rel="#overlay"><i class="fa fa-question-circle"></i></a>
                                    <h2 class="panel-title">
                                        Welcome to Streamlined!
                                    </h2>
                                </header>
                                <section class="panel-body container-fluid">
                                    <div class="row">
                                      <div class="col-md-12">
                                          <div class="alert alert-info text-center">
                                              <h4>Get started: <a href="#">Add contacts to your account</a></h4>
                                              <p>Vestibulum ultrices vehicula leo ac tristique. Mauris id nisl nibh. Cras egestas vestibulum nisl, nec eleifend nunc pulvinar non.</p>
                                          </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                        <hgroup class="col-md-12 text-center">
                                            <h2>Sed magna enim, tempus eu rutrum ornare.</h2>
                                            <h4>Donec suscipit fermentum turpis, a feugiat felis tincidunt eu</h4>
                                        </hgroup>
                                    </div>

                                    <div class="row">
                                        <figure class="col-md-4 text-center">
                                            <img src="images/asset1.jpg" width="100%" />
                                            <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet massa at lorem molestie egestas. Donec ipsum purus, consequat ac gravida sed, volutpat ut velit.</p>
                                        </figure>
                                        <figure class="col-md-4 text-center">
                                            <img src="images/asset2.jpg" width="100%" />
                                            <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet massa at lorem molestie egestas. Donec ipsum purus, consequat ac gravida sed, volutpat ut velit.</p>
                                        </figure>
                                        <figure class="col-md-4 text-center">
                                            <img src="images/asset3.jpg" width="100%" />
                                            <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet massa at lorem molestie egestas. Donec ipsum purus, consequat ac gravida sed, volutpat ut velit.</p>
                                        </figure>
                                    </div>

                                    <div class="other-options">
                                        <h3 class="other">Other things to do...</h3>
                                        <ul>
                                            <li>
                                                <h4><a href="#">Lorem Ipsum Dolor Sit Amet</a></h4>
                                                <p>Nam sit amet massa at lorem molestie egestas.</p>
                                            </li>
                                            <li>
                                                <h4><a href="#">Lorem Ipsum Dolor Sit Amet</a></h4>
                                                <p>Nam sit amet massa at lorem molestie egestas.</p>
                                            </li>
                                            <li>
                                                <h4><a href="#">Lorem Ipsum Dolor Sit Amet</a></h4>
                                                <p>Nam sit amet massa at lorem molestie egestas.</p>
                                            </li>
                                        </ul>
                                    </div>
                                </section>
                            </div>
                        </div>

                    </section>

                    <!-- Main Section End -->

                </div>
            </div>
            <div id="push"></div>
        </section>
    </div>

    <footer>
        <div id="footer-inner" class="container">
            <div><span class="pull-right"><a href="#">Documentation</a> | <a href="#">Feedback</a></span>Last account activity from 127.0.0.1 - <a href="#">Details</a> | &copy; 2010. All rights reserved. Theme design by VivantDesigns</div>
        </div>
    </footer>


    <!-- render blocking scripts -->

    <!-- jQuery JS -->
    <script src="/js/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- Main Script -->
    <script src="/js/global.js"></script>
    <script src="/vendor/angular/angular.min.js"></script>
    <script src="/vendor/angular/angular-route.min.js"></script>
    <script src="/myApp.js"></script>


</body>

<!-- Mirrored from themes.vivantdesigns.com/streamlined/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Jun 2016 09:55:04 GMT -->
</html>



{{--<html lang="en" ng-app="myApp">--}}
    {{--<head>--}}
        {{--<meta charset="UTF8">--}}
        {{--<base href="/"/>--}}
        {{--<title>let it go</title>--}}
        {{--<!-- Add the usual things here -->--}}
    {{--</head>--}}
    {{--<body>--}}
        {{--<div id="maincontent" ng-controller="meetingController">--}}
        {{--<div class="class">--}}
            {{--<h1>New Meeting</h1>--}}
            {{--<hr/>--}}
            {{--<form action="" name="NewMeetingForm">--}}
                {{--<fieldset>--}}
                    {{--<label for="meetingTitle">Meeting Title</label>--}}
                    {{--<input id="meetingTitle" ng-model="meeting.title" type="text" placeholder="Title of your Meeting"/>--}}

                    {{--<label for="meetingUserId">User </label>--}}
                    {{--<input id="meetingUserId" ng-model="meeting.userId" type="text" placeholder="User by default"/>--}}

                    {{--<label for="meetingTime">Meeting Time</label>--}}
                    {{--<input id="meetingTime" ng-model="meeting.time" type="text" placeholder="Start and end time ..."/>--}}

                     {{--<label for="meetingDescription">Meeting Description</label>--}}
                    {{--<input id="meetingDescription" ng-model="meeting.description" type="text" placeholder="Description of your Meeting" required/>--}}


                {{--<br/>--}}
                {{--<button type="submit" ng-click="storeMeeting(meeting,newMeetingForm)" class="btn btn-primary">Save</button>--}}
                {{--<button type="button" ng-click="cancelEdit()" class="btn btn-default">Cancel</button>--}}
                {{--</fieldset>--}}
            {{--</form>--}}
        {{--</div>--}}
        {{--@{{messages.msg}}--}}
       {{--</div>--}}
        {{--<script src="/vendor/angular/angular.min.js">--}}

        {{--</script>--}}
        {{--<script src="/vendor/angular/angular-route.min.js"></script>--}}
        {{--<script src="/myApp.js"></script>--}}

    {{--</body>--}}
{{--</html>--}}