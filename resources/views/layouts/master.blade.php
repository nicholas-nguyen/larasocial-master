<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Faceboot - A Facebook style template for Bootstrap</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{{ url('public/csshome/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
      <script src="public/js/jquery-2.2.1.min.js"></script>
    <link href="{{ url('public/csshome/css/styles.css') }}" rel="stylesheet">
      <link href="{{ url('public/css/dropzone.min.css') }}" rel="stylesheet">
    {{--<link href="{{ url('public/csshome/css/app.css') }}" rel="stylesheet">--}}
  </head>
  <body>
<div class="wrapper">
    
            <div id="main"><!--class=column col-sm-10 col-xs-11-->
                
                <!-- top nav -->
                <div class="navbar navbar-blue navbar-static-top">  
                    <div class="navbar-header">
                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                      </button>
                      <a href="home" class="navbar-brand logo">b</a>
                    </div>
                    <nav  role="navigation"><!-- class="collapse navbar-collapse" -->
                    <form class="navbar-form navbar-left" method="post" action="{{ url('search') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group input-group-sm" style="max-width:360px;">
                          <input type="text" class="form-control" placeholder="Tìm kiếm.." name="keyword" id="keyword">
                          <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav">
                    @if (!Auth::check())
                      <li>
                        <a href="{{ url('login') }}"><i class="glyphicon glyphicon-log-in"></i> Đăng nhập</a>
                      </li>
                      <li>
                        <a href="{{ url('register') }}"><i class="glyphicon glyphicon-user"></i> Đăng ký</a>
                      </li>
                      @else
                      <li>
                        <a href="{{ url('dashboard') }}"><i class="glyphicon glyphicon-home"></i> Trang chủ</a>
                      </li>
                      <li>
                        <a href="{{ route('friends.index', ['id' => Auth::user()->id]) }}"><i class="glyphicon glyphicon-plus"></i> Bạn bè</a>
                      </li>
                      <li>
                        <a href="#"><span class="badge">badge</span></a>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                        <a href="#" data-target="#" data-toggle="dropdown" id="dropdownMenu" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                          <li><a href="{{ route('profile.index', ['id' => Auth::user()->id]) }}"><i class="glyphicon glyphicon-user"></i> Trang cá nhân</a></li>
                          <li><a href="{{ url('logout') }}"><i class="glyphicon glyphicon-log-out"></i> Đăng xuất</a></li>
                        </ul>
                      </li>
                    </ul>
                    
                    </nav>
                </div>
                <!-- /top nav -->
                <div class="padding">
                    <div class="full col-sm-9">
                      
                        <!-- content -->                      
                        <div class="row">
                         <!-- main col left -->
                          @yield('post')
                          
                       </div><!--/row-->
                      
                        <!-- <div class="row">
                          <div class="col-sm-6">
                            <a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
                          </div>
                        </div> -->
                      
                        <!-- <div class="row" id="footer">    
                          <div class="col-sm-6">
                          </div>
                        </div> -->
                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
          @endif
        <!-- </div> -->
    <!-- </div> -->
</div>
<div>
  <div class="padding">
    <div class="full col-sm-9">
                      
      <!-- content -->                      
      <div class="row">
        @yield('content')
      </div>
    </div>
  </div>
</div>

<!--post modal-->
<div id="postModal" class="modal fade postModal" tabindex="-1" aria-labelledby="postModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  Update Status
  </div>
  <div class="modal-body">
      <form class="form center-block" role="form" method="POST" action="{{ url('post-store') }}">
        <div class="form-group">
          <textarea rows="4" cols="20" class="form-control input-lg" autofocus="" placeholder="What do you want to share?" name="status"></textarea>
        </div>
        <div class="modal-footer">
      <div>
      <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true" type="submit">Post</button>
        <ul class="pull-left list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
  </div>  
  </div>
      </form>
  </div>
  
  </div>
  </div>
</div>
  <!-- script references -->
  <script src="public/js/dropzone.js"></script>
  <script src="public/csshome/js/bootstrap-theme.min.css"></script>
  <script src="public/csshome/js/analytics.js"></script>
  <script src="public/csshome/js/scripts.js"></script>
  <script src="public/js/app.js"></script>
    <script>
        $(document).ready(function(){

            $(".myBtn").click(function(){
                $("#postModal").modal('show');
            });
        });
    </script>

  </body>
</html>