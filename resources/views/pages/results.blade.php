@extends('layouts.app')

@section('main-content')
    <div class="row">

        <div class="col-md-9">
            <h2>Result</h2>
            <hr>
            @foreach($result as $u)
                <div class="media">
                    <img class="img-circle img-sm" src="public/img/user3-128x128.jpg"
                         alt="User Image">
                    <div class="media-body">
                        <a href="{{ route('profile.index',['id' => $u->id])}}">
                        <span class="username">
                            <strong>{{ $u->firstname }} {{ $u->lastname }}</strong>
                        </span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
