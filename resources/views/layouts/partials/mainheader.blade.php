<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/dashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>D</b>SN</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Demo</b>Social Network</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">{{ trans('adminlte_lang::message.tabmessages') }}</li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <!-- User Image -->
                                            @if(Auth::user()->avatar_url != null)
                                                <img class="img-circle img-sm" src="{{URL::asset(Auth::user()->avatar_url) }}" alt="User Image" style="width: 160px;height: 160px;">
                                            @else
                                                <img class="img-circle img-sm" src="{{ \App\Users::where('id',Auth::user()->id)->first()->getAvatarUrl() }}" alt="User Image" style="width: 160px;height: 160px;">
                                            @endif
                                        </div>
                                        <!-- Message title and timestamp -->
                                        <h4>
                                            {{ trans('adminlte_lang::message.supteam') }}
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <!-- The message -->
                                        <p>{{ trans('adminlte_lang::message.awesometheme') }}</p>
                                    </a>
                                </li><!-- end message -->
                            </ul><!-- /.menu -->
                        </li>
                        <li class="footer"><a href="#">c</a></li>
                    </ul>
                </li><!-- /.messages-menu -->

                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Friend request">
                        <i class="fa  fa-users"></i>
                        @if(\App\Users::friendRequests()->count() != 0)
                            <span class="label label-warning">{{ \App\Users::friendRequests()->count() }}</span>
                        @else
                            <span class="label label-warning"></span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have {{  \App\Users::friendRequests()->count() }} friend request</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                @foreach(\App\Users::friendRequests() as $r)
                                    <li>
                                        <a href="{{ route('profile.index',['id' => $r->id])}}">
                                            @if($r->avatar_url != null)
                                                <img class="img-circle img-sm" src="{{ URL::asset($r->avatar_url) }}" alt="User Image" style="width: 160px;height: 160px;">
                                            @else
                                                <img class="img-circle img-sm" src="{{ $r->getAvatarUrl() }}" alt="User Image" style="width: 160px;height: 160px;">
                                            @endif
                                            <span class="hidden-xs">{{ $r->firstname }} {{ $r->lastname }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="footer"><a href="#">{{ trans('adminlte_lang::message.viewall') }}</a></li>
                    </ul>
                </li>
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="{{ url('/dashboard') }}" ><i class="glyphicon glyphicon-th-large"></i>
                        Dashboard
                    </a>
                </li>
                <!-- Tasks Menu -->
                {{--<li class="dropdown tasks-menu">--}}
                    {{--<!-- Menu Toggle Button -->--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{--<i class="fa fa-flag-o"></i>--}}
                        {{--<span class="label label-danger">9</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li class="header">{{ trans('adminlte_lang::message.tasks') }}</li>--}}
                        {{--<li>--}}
                            {{--<!-- Inner menu: contains the tasks -->--}}
                            {{--<ul class="menu">--}}
                                {{--<li><!-- Task item -->--}}
                                    {{--<a href="#">--}}
                                        {{--<!-- Task title and progress text -->--}}
                                        {{--<h3>--}}
                                            {{--{{ trans('adminlte_lang::message.tasks') }}--}}
                                            {{--<small class="pull-right">20%</small>--}}
                                        {{--</h3>--}}
                                        {{--<!-- The progress bar -->--}}
                                        {{--<div class="progress xs">--}}
                                            {{--<!-- Change the css width attribute to simulate progress -->--}}
                                            {{--<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
                                                {{--<span class="sr-only">20% {{ trans('adminlte_lang::message.complete') }}</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li><!-- end task item -->--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="footer">--}}
                            {{--<a href="#">{{ trans('adminlte_lang::message.alltasks') }}</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                @if (Auth::guest())
                    <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            @if(Auth::user()->avatar_url != null)
                                <img class="img-circle img-sm" src="{{ URL::asset(Auth::user()->avatar_url) }}" alt="User Image">
                            @else
                                <img class="img-circle img-sm" src="{{ \App\Users::where('id',Auth::user()->id)->first()->getAvatarUrl() }}" alt="User Image">
                            @endif
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">&nbsp;&nbsp;{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                @if(Auth::user()->avatar_url != null)
                                    <img class="img-circle" src="{{ URL::asset(Auth::user()->avatar_url) }}" alt="User Image">
                                @else
                                    <img class="img-circle" src="{{ \App\Users::where('id',Auth::user()->id)->first()->getAvatarUrl() }}" alt="User Image">
                                @endif
                                <p>
                                    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                                    <small>Member since {{ Auth::user()->created_at }}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="col-xs-6 text-center">
                                    <a href="#" data-toggle="modal" data-target="#changeavatarModal">Change <br>Avatar</a>
                                </div>
                                <div class="col-xs-6 text-center">
                                    <a href="#" data-toggle="modal" data-target="#changepassModal">Change
                                        <br>password</a>
                                </div>
                                {{--<div class="col-xs-4 text-center">--}}
                                    {{--<a href="#">{{ trans('adminlte_lang::message.friends') }}</a>--}}
                                {{--</div>--}}
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('profile.index',['id' => Auth::user()->id]) }}" class="btn btn-default btn-flat">{{ trans('adminlte_lang::message.profile') }}</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">{{ trans('adminlte_lang::message.signout') }}</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

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
<div class="modal" id="changeavatarModal" tabindex="-1" aria-labelledby="postModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Change Avatar</h4>
            </div>
            <form action="{{ url('/change/avatar') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="form-group" style="text-align: center;">
                        @if(Auth::user()->avatar_url != null)
                            <img class="text-center" src="{{ URL::asset(Auth::user()->avatar_url) }}" id="img_avatar"
                                 alt="User Image" style="width: 25%;height: auto;display: block;margin: auto;max-width: 100%;max-height: 100%;"">
                        @else
                            <img class="text-center" src="{{ \App\Users::find(Auth::user()->id)->getAvatarUrl() }}"
                                 id="img_avatar" alt="User Image"
                                 style="width: 25%;height: auto;display: block;margin: auto;max-width: 100%;max-height: 100%;"">
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <label class="btn btn-success">
                        Picture
                        <input type="file" accept="image/jpg,image/jpeg,image/png" name="images_avatar"
                               style="display: none;" onchange="readUrlAvatar(this);">
                    </label>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
    function readUrlAvatar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_avatar')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>