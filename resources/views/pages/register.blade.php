
@extends('layouts.master')

@section('content')

		<div class="col-md-9">
		{{--@if (count($errors) > 0)--}}
		    {{--<div class="alert alert-danger">--}}
		        {{--<ul>--}}
		            {{--@foreach ($errors->all() as $error)--}}
		                {{--<li>{{ $error }}</li>--}}
		            {{--@endforeach--}}
		        {{--</ul>--}}
		    {{--</div>--}}
		{{--@endif--}}
			<div class="panel panel-default">
				<div class="panel-heading">Đăng ký</div>
				<div class="panel-body">

					<form class="form-horizontal" role="form" method="POST" action="{{ url('post-register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Tên</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="Firstname" >
								@if ($errors->has('Firstname'))
									<span class="help-block">
	                                        <strong style="color: red">{{ $errors->first('Firstname') }}</strong>
	                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Họ</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="Lastname" >
								@if ($errors->has('Lastname'))
									<span class="help-block">
	                                        <strong style="color: red">{{ $errors->first('Lastname') }}</strong>
	                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Ngày sinh</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="Birthday" >
								@if ($errors->has('Birthday'))
									<span class="help-block">
	                                        <strong style="color: red">{{ $errors->first('Birthday') }}</strong>
	                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Giới tính</label>
							<div class="col-md-6">
								<select class="form-control" name="Gender">
									<option value="Nam">Nam</option>
									<option value="Nữ">Nữ</option>
								</select>
								@if ($errors->has('Gender'))
									<span class="help-block">
	                                        <strong style="color: red">{{ $errors->first('Gender') }}</strong>
	                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="Email" >
								@if ($errors->has('Email'))
									<span class="help-block">
	                                        <strong style="color: red">{{ $errors->first('Email') }}</strong>
	                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Mật khẩu</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="Password">
								@if ($errors->has('Password'))
									<span class="help-block">
	                                        <strong style="color: red">{{ $errors->first('Password') }}</strong>
	                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Xác nhận mật khẩu</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="Password_confirmation">
								@if ($errors->has('Password_confirmation'))
									<span class="help-block">
	                                        <strong style="color: red">{{ $errors->first('Password_confirmation') }}</strong>
	                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Đăng ký
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		@stop
	<!-- </div>
</div>
</div> -->
		<!-- <script src="{{url('public/js/jquery-2.2.1.min.js')}}"></script>
		<script src="{{url('public/js/bootstrap.min.js')}}"></script>
		<script src="{{url('public/css/bootstrap.min.css')}}"></script>
		<script src="{{url('public/css/bootstrap-theme.min.css')}}"></script>
</body>
</html> -->