<!DOCTYPE html>
<html ng-app="app">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Best-zero</title>
<base href=""/>

<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/css/font-awesome.min.css">

<link rel="stylesheet" media="screen" href="/css/style.css" />
<link rel="stylesheet" media="screen" href="/css/fullcalendar.min.css" />
</head>
<body ng-controller="meetingController">
    <div id="wrapper">
        <header ng-if="!navigationValue">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="/api/v1/#/index">Best-zero</a>
                    </div>


                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul id="main-nav" class="nav navbar-nav">
                            <li class="action">
                                <button class="btn btn-primary navbar-btn" data-toggle="popover" data-title="Add new contact" data-placement="bottom" data-content=' <form class="form-horizontal">
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
    <button popover id="popover-content"  class="btn btn-primary navbar-btn" data-toggle="popover" data-title="Add new meeting" data-placement="bottom" data-content='
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
                            <li><a href="/api/v1/#/MeetingCalendar">Calendar</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administrator <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Account</a></li>
                                    <li><a href="#">Users</a></li>
                                    <li><a href="#">Groups</a></li>
                                    <li><a ng-click="logout()">Sign out</a></li>
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

                    <aside ng-if="!navigationValue" class="col-md-3 no-padding">

                        <nav class="global">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="dashboard.html"><i class="fa fa-home"></i> Overview</a></li>
                                <li><a href="activity.html"><i class="fa fa-heartbeat"></i> Latest Activity</a></li>
                                <li><a href="contacts.html"><i class="fa fa-book"></i>  Contacts <span class="badge pull-right">2</span></a></li>
                                <li><a href="tasks.html"><i class="fa fa-tasks"></i> Tasks <span class="badge bg-warning pull-right">1</span></a></li>
                                <li><a href="notes.html"><i class="fa fa-file-text"></i> Notes</a></li>
                                <li><a href="/api/v1/#/meetings"><i class="fa fa-users"></i> Meetings <span class="badge bg-warning pull-right"> @{{countMeeting}}</span></a></li>
                            </ul>
                        </nav>
lorem
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
                    </aside >
                    <!-- Sidebar End -->
                 <ng-view></ng-view>
                </div>
            </div>
            <div id="push"></div>
        </section>

    </div>

    <footer ng-if="!navigationValue">
        <div id="footer-inner" class="container">
            <div><span class="pull-right"><a href="#">Documentation</a> | <a href="#">Feedback</a></span>Last account activity view- <a href="#">Details</a> | &copy; 2016. All rights reserved.</div>
        </div>
    </footer>

    <script src="/vendor/jquery.min.js"></script>
    <script src="/vendor/bootstrap.min.js"></script>
    <script src="/vendor/global.js"></script>
    <script src="/vendor/underscore-1.4.4.min.js"></script>
    <script src="/vendor/angular/angular.js"></script>
    <script src="/vendor/angular/angular.min.js"></script>
    <script src="/vendor/angular/angular-route.js"></script>
    <script src="/vendor/angular/angular-route.min.js"></script>
    <script src="/vendor/angular/angular-resource.js"></script>
    <script src="/vendor/angular/angular-sanitize.js"></script>
    <script src="/vendor/satellizer/satellizer.min.js"></script>
    <script src="/vendor/moment.min.js"></script>
    <script src="/vendor/fullcalendar.min.js"></script>

    <script src="/js/app.js"></script>
    <script src="/js/controllers/DefaultContentController.js"></script>
    <script src="/js/controllers/MeetingCalendarController.js"></script>
    <script src="/js/controllers/MeetingListController.js"></script>
    <script src="/js/directives/meetingThumbnail.js"></script>
    <script src="/js/controllers/HomeController.js"></script>
</body>

</html>
