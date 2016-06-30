@extends('layouts.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    {{--<div class="content-wrapper">--}}
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

        <div class="row">
            @if(Session::has('messages'))
                <div class="alert alert-success">{{ Session::get('messages') }}</div>
            @endif
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        @if($user->avatar_url != null)
                            <img class="profile-user-img img-responsive img-circle"
                                 src="{{ URL::asset($user->avatar_url) }}" alt="User Image"
                                 style="width: 128px;height: 128px;">
                        @else
                            <img class="profile-user-img img-responsive img-circle" src="{{ $user->getAvatarUrl() }}"
                                 alt="User Image" style="width: 128px;height: 128px;">
                        @endif

                        <h3 class="profile-username text-center"
                            style="color: #3c8dbc;">{{ $user->firstname }} {{ $user->lastname }}</h3>

                        {{--<p class="text-muted text-center">Software Engineer</p>--}}

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Birthday</b> <a class="pull-right">{{ $user->birthday }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Gender</b> <a class="pull-right">{{ $user->gender }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="pull-right">{{ $user->friends()->count() }}</a>
                            </li>
                        </ul>
                        @if(Auth::user()->id === $user->id)
                            <a class="btn btn-info btn-block"><b>Your Profile</b></a>
                        @elseif(empty(App\Users::checkFriendStatus(Auth::user()->id,$user->id)) && empty(App\Users::checkFriendStatus($user->id,Auth::user()->id)))
                            <a href="{{ route('friends.add', ['id' => $user->id]) }}" class="btn btn-primary btn-block"><b>Add
                                    friend</b></a>
                        @elseif(App\Users::checkFriendStatus(Auth::user()->id,$user->id) == 1)
                            <a class="btn btn-info btn-block"><b>Waitting accept</b></a>
                        @elseif(App\Users::checkFriendStatus(Auth::user()->id,$user->id) == 3)
                            <a href="{{ route('friends.accept', ['id' => $user->id]) }}" class="btn btn-info btn-block"><b>Accept
                                    friend</b></a>
                        @elseif(
                            App\Users::checkFriendStatus(Auth::user()->id,$user->id) == 2 ||
                            App\Users::checkFriendStatus(Auth::user()->id,$user->id) == 4
                        )
                            <a href="{{ route('friends.delete', ['id' => $user->id]) }}"
                               class="btn btn-danger btn-block"><b>Unfriend</b></a>

                        @else
                        @endif
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="glyphicon glyphicon-home"></i> Hometown</strong>

                        <p class="text-muted" style="margin-left:17px; color: #00c0ef;">
                            @if($user->hometown)
                                {{ $user->hometown }}
                            @else
                                Unknown
                            @endif
                        </p>

                        <hr>

                        <strong><i class="glyphicon glyphicon-map-marker"></i> Current city</strong>

                        <p class="text-muted" style="margin-left:17px; color: #00c0ef;">
                            @if($user->currentcity)
                                {{ $user->currentcity }}
                            @else
                                Unknown
                            @endif
                        </p>

                        <hr>

                        <strong><i class="glyphicon glyphicon-book"></i> School</strong>

                        <p class="text-muted" style="margin-left:17px; color: #00c0ef;">
                            @if($user->school)
                                {{ $user->school }}
                            @else
                                Unknown
                            @endif
                        </p>

                        <hr>

                        <strong><i class="glyphicon glyphicon-wrench"></i> Skills</strong>

                        <p class="text-muted" style="margin-left:17px; color: #00c0ef;">
                            @if($user->skills)
                                {{ $user->skills }}
                            @else
                                Unknown
                            @endif
                        </p>

                        <hr>

                        <strong><i class="glyphicon glyphicon-tags"></i>&nbsp; Hobby</strong>

                        <p class="text-muted" style="margin-left:17px; color: #00c0ef;">
                            @if($user->hobby)
                                {{ $user->hobby }}
                            @else
                                Unknown
                            @endif
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                        {{--<li><a href="#timeline" data-toggle="tab">Timeline</a></li>--}}
                        @if(Auth::user()->id === $user->id)
                            <li><a href="#settings" data-toggle="tab">Settings</a></li>
                        @endif
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                        @foreach($status_user as $status)
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
                        {{ $status_user->render() }}
                        <!-- /.post -->
                        </div>
                        <!-- /.tab-pane -->


                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal" action="{{ url('/edit/user') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="inputFirstname" class="col-sm-2 control-label">Firstname</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputFirstname"
                                               name="inputFirstname"
                                               placeholder="Firsname" value="{{ $user->firstname }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputLastname" class="col-sm-2 control-label">Lastname</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputLastname" name="inputLastname"
                                               placeholder="Lastname" value="{{ $user->lastname }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputBirthday" class="col-sm-2 control-label">Birthday</label>

                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="inputBirthday" name="inputBirthday"
                                               placeholder="Birthday" value="{{ $user->birthday }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputGender" class="col-sm-2 control-label">Gender</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="inputGender" name="selectGender">
                                            @if( $user->gender === "Male")
                                                <option value="Male" selected>Male</option>
                                                <option value="Female">Female</option>
                                            @else
                                                <option value="Male">Male</option>
                                                <option value="Female" selected>Female</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputHometown" class="col-sm-2 control-label">Hometown</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputHometown" name="inputHometown"
                                               placeholder="Hometown" value="{{ $user->hometown }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputCurentcity" class="col-sm-2 control-label">Curent city</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputCurentcity"
                                               name="inputCurentcity"
                                               placeholder="Curent city" value="{{ $user->currentcity }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSchool" class="col-sm-2 control-label">School</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSchool" name="inputSchool"
                                               placeholder="School" value="{{ $user->school }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSkills" name="inputSkills"
                                               placeholder="Skills" value="{{ $user->skills }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputHobby" class="col-sm-2 control-label">Hobby</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputHobby" name="inputHobby"
                                               placeholder="Hobby" value="{{ $user->hobby }}">
                                    </div>
                                </div>
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
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Save change</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
    {{--</div>--}}
    <!-- /.content-wrapper -->

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
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

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
    <div class="modal" id="editModal" tabindex="-1" aria-labelledby="postModal" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ url('/edit/article') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit status</h4>
                    </div>
                    <div class="modal-body">
                        <textarea id="area_edit_status" name="area_edit_status"></textarea>
                        <input type="hidden" id="id_edit_status" name="id_edit_status" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveChangeStatus">Save changes</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal" id="editCommentModal" tabindex="-1" aria-labelledby="postModal" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ url('/edit/comment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit comment</h4>
                    </div>
                    <div class="modal-body">
                        <textarea id="area_edit_comment" name="area_edit_comment"></textarea>
                        <input type="hidden" id="id_edit_comment" name="id_edit_comment" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveChangeComment">Save changes</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@stop
