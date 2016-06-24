@extends('layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

    <body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/home') }}"><b>Demo</b>Social Network</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{ trans('adminlte_lang::message.registermember') }}</p>
            <form action="{{ url('post-register') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="{{ trans('adminlte_lang::message.firstname') }}" name="Firstname" value="{{ old('Firstname') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('Firstname'))
                        <span class="help-block">
	                        <strong style="color: red">{{ $errors->first('Firstname') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="{{ trans('adminlte_lang::message.lastname') }}" name="Lastname" value="{{ old('Lastname') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('Lastname'))
                        <span class="help-block">
	                        <strong style="color: red">{{ $errors->first('Lastname') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="date" class="form-control" placeholder="{{ trans('adminlte_lang::message.firstname') }}" name="Birthday" value="{{ old('Birthday') }}"/>
                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    @if ($errors->has('Birthday'))
                        <span class="help-block">
	                        <strong style="color: red">{{ $errors->first('Birthday') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <select class="form-control" name="Gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>

                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="Email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('Email'))
                        <span class="help-block">
	                        <strong style="color: red">{{ $errors->first('Email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="Password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('Password'))
                        <span class="help-block">
	                        <strong style="color: red">{{ $errors->first('Password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.retrypepassword') }}" name="Password_confirmation"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('Password_confirmation'))
                        <span class="help-block">
	                        <strong style="color: red">{{ $errors->first('Password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-1">
                        <label>
                            <div class="checkbox_register icheck">
                                <label>
                                    <input type="checkbox" name="terms">
                                </label>
                            </div>
                        </label>
                    </div><!-- /.col -->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">{{ trans('adminlte_lang::message.terms') }}</button>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4 col-xs-push-1">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.register') }}</button>
                    </div><!-- /.col -->
                </div>
            </form>

            @include('auth.partials.social_login')

            <a href="{{ url('/login') }}" class="text-center">{{ trans('adminlte_lang::message.membreship') }}</a>
        </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    @include('layouts.partials.scripts_auth')

    @include('auth.terms')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
