@extends('layouts.master')

@section('post')
    <div class="col-lg-6">
        <h4>Yêu cầu kết bạn</h4>
        @if(!$request->count())
            <p>Không có yêu cầu kết bạn nào!!!</p>
        @else
            @foreach($request as $user)
                @include('partials.userblock')
            @endforeach
        @endif
    </div>
    <div class="col-lg-6">

        <h3>Bạn của {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h3>
        @if(!$friends->count())
            <p>Không có bạn nào!!!</p>
        @else
            @foreach($friends as $user)
                @include('partials.userblock')
            @endforeach
        @endif
    </div>
@stop

