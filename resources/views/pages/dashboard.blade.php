<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Demo Social Network | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="public/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<script src="{{ asset('public/css/jquery-ui.css') }}"></script>
<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
<script src="{{ asset('public/js/jquery-2.2.1.min.js') }}"></script>
<script src="{{ asset('public/js/jquery-migrate-1.4.1.min.js') }}"></script>
<script src="{{ asset('public/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/js/tool.js') }}"></script>
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('dashboard') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>D</b>SN</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Demo</b>Social Network</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="public/img/user2-160x160.jpg" class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="public/img/user3-128x128.jpg" class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <h4>
                                                AdminLTE Design Team
                                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="public/img/user4-128x128.jpg" class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <h4>
                                                Developers
                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="public/img/user3-128x128.jpg" class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <h4>
                                                Sales Department
                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="public/img/user4-128x128.jpg" class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <h4>
                                                Reviewers
                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> Very long description here that
                                            may not fit into the
                                            page and may cause design problems
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                     role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                     aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Create a nice theme
                                                <small class="pull-right">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%"
                                                     role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                     aria-valuemax="100">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Some task I need to do
                                                <small class="pull-right">60%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-red" style="width: 60%"
                                                     role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                     aria-valuemax="100">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Make beautiful transitions
                                                <small class="pull-right">80%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 80%"
                                                     role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                     aria-valuemax="100">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="public/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="public/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                                    <small>Member since {{ Auth::user()->created_at }}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#" data-toggle="modal" data-target="#changepassModal">Change
                                            password</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('profile.index',['id' => Auth::user()->id])}}"
                                       class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <!-- search form -->
            <form action="{{ url('search') }}" method="post" class="sidebar-form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-group">
                    <input type="text" id="search_text" name="search_text" class="form-control" placeholder="Search...">
                      <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-search"><i
                                    class="fa fa-search"></i>
                        </button>
                      </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" id="result">

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <div class="row">

                <div class="col-md-9">
                    <!---->

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                            {{--<li><a href="#timeline" data-toggle="tab">Timeline</a></li>--}}
                            {{--<li><a href="#settings" data-toggle="tab">Settings</a></li>--}}
                        </ul>


                    </div>
                    <!---->
                    <div class="nav-tabs-custom">
                        <!--<ul class="nav nav-tabs">
                          <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                          <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                          <li><a href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>-->
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <!-- Horizontal Form -->
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Update your status</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form class="form-horizontal" method="post" action="{{ url('/post/article') }}" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="box-body">
                                            <textarea id="textareastatus" name="status"
                                                      placeholder="What are you thinking?"></textarea>
                                        </div>
                                        <img id="blah" src="" alt="" style="padding-left: 10px;"/>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <label class="btn btn-success">
                                                Picture
                                                <input type="file" name="images_upload" style="display: none;" onchange="readURL(this);">
                                            </label>
                                            <button type="submit" class="btn btn-info pull-right">Post</button>
                                        </div>
                                        <!-- /.box-footer -->
                                    </form>
                                </div>

                                @foreach($statuses as $status)
                                    {!!
                                       view('pages.status',[
                                          'status' => $status,
                                          'user' => \App\Users::find($status->user_id),
                                          'comments' => \App\Comment::where('status_id', $status->id)->orderBy('created_at','DESC')->get(),
                                          //'comments_count' => \App\Comment::where('status_id', $status->id)->count(),
                                          //'likes_count' => \App\Like::where('status_id', $status->id)->count()
                                       ])
                                    !!}
                                @endforeach
                                {{ $statuses->render() }}
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <ul class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-envelope bg-blue"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email
                                            </h3>

                                            <div class="timeline-body">
                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                quora plaxo ideeli hulu weebly balihoo...
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs">Read more</a>
                                                <a class="btn btn-danger btn-xs">Delete</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-user bg-aqua"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                            <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted
                                                your friend request
                                            </h3>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-comments bg-yellow"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post
                                            </h3>

                                            <div class="timeline-body">
                                                Take me to your leader!
                                                Switzerland is small and neutral!
                                                We are more like Germany, ambitious and misunderstood!
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-camera bg-purple"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos
                                            </h3>

                                            <div class="timeline-body">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <li>
                                        <i class="fa fa-clock-o bg-gray"></i>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.tab-pane -->

                            {{--<div class="tab-pane" id="settings">--}}
                            {{--<form class="form-horizontal">--}}
                            {{--<div class="form-group">--}}
                            {{--<label for="inputFirstname" class="col-sm-2 control-label">Firstname</label>--}}

                            {{--<div class="col-sm-10">--}}
                            {{--<input type="text" class="form-control" id="inputFirstname"--}}
                            {{--placeholder="Firsname">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--<label for="inputLastname" class="col-sm-2 control-label">Lastname</label>--}}

                            {{--<div class="col-sm-10">--}}
                            {{--<input type="text" class="form-control" id="inputLastname"--}}
                            {{--placeholder="Lastname">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--<label for="inputBirthday" class="col-sm-2 control-label">Birthday</label>--}}

                            {{--<div class="col-sm-10">--}}
                            {{--<input type="date" class="form-control" id="inputBirthday"--}}
                            {{--placeholder="Birthday">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--<label for="inputGender" class="col-sm-2 control-label">Gender</label>--}}

                            {{--<div class="col-sm-10">--}}
                            {{--<select class="form-control" id="inputGender">--}}
                            {{--<option value="Male">Male</option>--}}
                            {{--<option value="Female">Female</option>--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--<label for="inputHometown" class="col-sm-2 control-label">Hometown</label>--}}

                            {{--<div class="col-sm-10">--}}
                            {{--<input type="text" class="form-control" id="inputHometown"--}}
                            {{--placeholder="Hometown">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--<label for="inputCurentcity" class="col-sm-2 control-label">Curent city</label>--}}

                            {{--<div class="col-sm-10">--}}
                            {{--<input type="text" class="form-control" id="inputCurentcity"--}}
                            {{--placeholder="Curent city">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--<label for="inputSkills" class="col-sm-2 control-label">Skills</label>--}}

                            {{--<div class="col-sm-10">--}}
                            {{--<input type="text" class="form-control" id="inputSkills"--}}
                            {{--placeholder="Skills">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--<div class="col-sm-offset-2 col-sm-10">--}}
                            {{--<div class="checkbox">--}}
                            {{--<label>--}}
                            {{--<input type="checkbox"> I agree to the <a href="#">terms and--}}
                            {{--conditions</a>--}}
                            {{--</label>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--<div class="col-sm-offset-2 col-sm-10">--}}
                            {{--<button type="submit" class="btn btn-danger">Submit</button>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</form>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>

                <div class="col-md-3">

                    <!-- /.box -->


                    <div class="box box-default collapsed-box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">FRIENDS CHAT</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @foreach($friends as $friend)
                                <div class="list-group-item">
                                    <a>
                                        <img class="img-circle img-sm" src="public/img/user3-128x128.jpg"
                                             alt="User Image">
                                        <span class="username">
                                        {{ $friend->firstname }} {{ $friend->lastname }}
                                        </span>
                                        <input type="hidden" id="friend_id" value="{{ $friend->id }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        {{--<!-- /.box-body -->--}}
                    </div>

                    <!-- /.sidebar -->
                    {{--</aside>--}}

                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.3
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                ipt <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>

<div class="modal" id="changepassModal" tabindex="-1" aria-labelledby="postModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Change Password</h4>
            </div>
            <form action="{{ url('/change-password') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Current password:</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                        @if ($errors->has('current_password'))
                            <span class="help-block">
	                        <strong style="color: red">{{ $errors->first('current_password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">New Password:</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                        @if ($errors->has('new_password'))
                            <span class="help-block">
	                        <strong style="color: red">{{ $errors->first('new_password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Retype Password:</label>
                        <input type="password" class="form-control" id="retype_password" name="retype_password">
                        @if ($errors->has('retype_password'))
                            <span class="help-block">
	                        <strong style="color: red">{{ $errors->first('retype_password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->

<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('public/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/js/app.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/js/demo.js') }}"></script>
<script src="{{ asset('public/js/jquery.autogrowtextarea.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#textareastatus').autoGrow();
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<style type="text/css">
    /*.margin-5 {*/
    /*margin-right: 15px;*/
    /*}*/
    #textareastatus {
        border: 1px #ddd solid;
        top: 5px;
        width: 100%;
        height: auto;
        left: 5px;
        font: 9pt Consolas;
        resize: none;
    }
    .list-group-item a:hover{
        cursor:pointer;
    }

</style>

<div id="chat-popup" style="
    position: fixed;
    height: auto;
    right: 0;
    bottom: 0;
    z-index: 999999999;">
    <div id="temp" class="pop-item hidden" style="width: 270px;">
        <div class="box box-primary direct-chat direct-chat-primary" style="margin-bottom: 0px;">
            <div class="box-header with-border">
                <h3 class="box-title">Direct Chat</h3>

                <div class="box-tools pull-right">
                    {{--<span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span>--}}
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                            data-widget="chat-pane-toggle">
                        <i class="fa fa-comments"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- Conversations are loaded here -->
                <div id="chat-body" class="direct-chat-messages" style="width: 270px; height: -300px; overflow: auto;">
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg left">
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                    </div>

                    <!-- /.direct-chat-msg -->
                </div>
                <!--/.direct-chat-messages-->


            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <form id="chat_form" action="" method="post">
                    <div class="input-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="my_id" name="my_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="chat_id" id="user_recived" value="">
                        <input type="hidden" name="user_name" value="{{ Auth::user()->firstname }}">
                        <input type="text" name="msg" placeholder="Type Message ..."
                               class="form-control msg msg-box-chat">
                      <span class="input-group-btn">
						  <input type="button" value="Send" class="btn btn-primary btn-flat send-msg">
                      </span>
                    </div>
                </form>
            </div>
            <!-- /.box-footer-->
        </div>
    </div>
</div>
<input type="hidden" value="{{ url('/') }}" id="baseUrl">
<input type="hidden" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}" id="myID">
<script type="text/javascript">

    //Open chat box
    $(document).on('click', '.list-group-item', function () {
        var $temp_pop = $('#temp');
        //Remove other pop
        $('#chat-popup').find('.pop-item:not(:hidden)').remove();

        //Clone pop
        var $clone = $temp_pop.clone();
        $clone.removeClass('hidden');
        $clone.attr('id', '');
        var chatid = $(this).find('#friend_id').val();
        console.log(chatid);
        //$clone.find('span.direct-chat-name').text(chatid);
        //$clone.find("#user_recived").val(chatid);

        var text = $(this).find('.username').text();
        $clone.find('h3.box-title').text(text);
        $('#chat-popup').append($clone);
        $("#chat-popup").find("#user_recived").val(chatid);

        var baseUrl = $("#baseUrl").val()+ "/message/list";
        var myID = $("#myID").val();
        $.ajax({
            url: baseUrl,
            type: 'GET',
            dataType: 'json',
            data: { 'id':chatid },
            success: function (obj) {
                console.log(obj);
                $("#chat-popup").find(".direct-chat-messages").empty();
                var messages = "";
                $.each(obj.data.data,function(index,item){
                    if(item.sender_id == myID) {
                        messages += "<div class='direct-chat-msg left'> <div style='clear: both;'></div><div class='direct-chat-info clearfix'> <span class='direct-chat-name pull-left' id='user'>"
                                + "You" + "</span> </div>"
                                + "<img class='direct-chat-img' src='http://lorempixel.com/50/50/' alt='Message User Image'><div class='direct-chat-text'>" + item.message + "</div> </div>";
                    }
                    else
                    {
                        messages += "<div class='direct-chat-msg right'> <div style='clear: both;'></div><div class='direct-chat-info clearfix'> <span class='direct-chat-name pull-right' id='user'>"
                                + item.reciver_user_info.firstname + "</span> </div>"
                                + "<img class='direct-chat-img' src='http://lorempixel.com/50/50/' alt='Message User Image'><div class='direct-chat-text'>" + item.message + "</div> </div>";
                    }
                });

                $("#chat-popup").find(".direct-chat-messages").append(messages);
            }
        })
    });

    //Remove chat box
    $(document).on('click', 'button[data-widget="remove"]', function () {
        var $this = $(this);
        var $box = $this.closest('div.box');
        $box.remove();
    });

    //
    var socket = io.connect('http://localhost:8890');
    socket.on('message', function (data) {
        data = jQuery.parseJSON(data);
        console.log(data);
        var chatid = $("#chat-popup").find("#user_recived").val();
        if (parseInt(data.user_id) == parseInt($("input[name='my_id']").val()) && parseInt(data.my_id) == parseInt(chatid)) {
            var message = "<div class='direct-chat-msg right'> <div style='clear: both;'></div><div class='direct-chat-info clearfix'> <span class='direct-chat-name pull-right' id='user'>"
                    + data.user_name + "</span> </div>"
                    + "<img class='direct-chat-img' src='http://lorempixel.com/50/50/' alt='Message User Image'><div class='direct-chat-text'>" + data.message + "</div> </div>";

            $("#chat-popup").find(".direct-chat-messages").append(message);
        }
    });
    $(document).on('click', ".send-msg", function (e) {
        e.preventDefault();
        $this = $(this).closest("#chat-popup");
        var token = $($this).find("input[name='_token']").val();
        var my_id = $($this).find("input[name='my_id']").val();
        var user_id = $($this).find("input[name='chat_id']").val();
        var user_name = $($this).find("input[name='user_name']").val();
        var msg = $(this).parent().prev().val();
        if (msg != '') {
            $.ajax({
                type: "POST",
                url: '{!! URL::to("sendmessage") !!}',
                dataType: "json",
                data: {'_token': token, 'message': msg, 'user_name': user_name, 'user_id': user_id, 'my_id': my_id},
                success: function (data) {
                    $(".msg").val('');
                    var message = "<div class='direct-chat-msg left'> <div style='clear: both;'></div><div class='direct-chat-info clearfix'> <span class='direct-chat-name pull-left' id='user'>"
                            + "You" + "</span> </div>"
                            + "<img class='direct-chat-img' src='http://lorempixel.com/50/50/' alt='Message User Image'><div class='direct-chat-text'>" + msg + "</div> </div>";
                    $("#chat-popup").find(".direct-chat-messages").append(message);
                }
            });
        } else {
            alert("Please Add Message!");
        }
    })


</script>
</body>
</html>
