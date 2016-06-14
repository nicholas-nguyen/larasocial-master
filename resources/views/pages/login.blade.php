
@extends('layouts.master')

@section('content')
	<!-- <div class="panel-body"> -->
		<!-- <div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2"> -->
	        <div class="col-sm-9">
	        {{--@if (count($errors) > 0)--}}
			    {{--<div class="alert alert-danger">--}}
			        {{--<ul>--}}
			            {{--@foreach ($errors->all() as $error)--}}
			                {{--<li>{{ $error }}</li>--}}
			            {{--@endforeach--}}
			        {{--</ul>--}}
			    {{--</div>--}}
			{{--@endif--}}
				@if(Session::has('messages'))
					<div class="alert alert-success">{{ Session::get('messages') }}</div>
				@endif
	            <div class="panel panel-default">
	                <div class="panel-heading">Đăng nhập</div>
	                <div class="panel-body">
	                    <form class="form-horizontal" role="form" method="POST" action="{{ url('post-login') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                        <div class="form-group">
	                            <label class="col-md-4 control-label">E-Mail</label>

	                            <div class="col-md-6">
	                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

	                                @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong style="color: red">{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Mật khẩu</label>

	                            <div class="col-md-6">
	                                <input type="password" class="form-control" name="password">

	                                @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong style="color: red">{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <div class="col-md-6 col-md-offset-4">
	                                <div class="checkbox">
	                                    <label>
	                                        <input type="checkbox" name="remember" id="remember"> Nhớ tài khoản
	                                    </label>
	                                </div>
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <div class="col-md-6 col-md-offset-4">
	                                <button type="submit" class="btn btn-primary">
	                                    <i class="fa fa-btn fa-sign-in"></i>Đăng nhập
	                                </button>

	                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	            </div>
	        <!-- </div>
	    </div>
	</div> -->
<!-- </div> -->
@stop
		<!-- Scripts -->
<!-- 		<script src="{{url('public/js/jquery-2.2.1.min.js')}}"></script>
		<script src="{{url('public/js/bootstrap.min.js')}}"></script>
		<script src="{{url('public/css/bootstrap.min.css')}}"></script>
	</body>
</html> -->
