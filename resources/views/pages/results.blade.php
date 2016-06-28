@extends('layouts.app')

@section('main-content')
    <div class="row">

        <div class="col-md-9">
            <h2>Result</h2>
            <hr>
            @foreach($result as $u)
                <div class="media">
                    <div class="list-inline">
                        <div class="col-xs-12 col-md-1 text-right">
                        @if($u->avatar_url != null)
                            <img class="img-circle img-md" src="{{URL::asset($u->avatar_url) }}" alt="User Image">
                        @else
                            <img class="img-circle img-md" src="{{ $u->getAvatarUrl() }}" alt="User Image">
                        @endif
                        </div>
                        <div class="col-xs-12 col-md-11 text-left">
                        <a href="{{ route('profile.index',['id' => $u->id])}}">
                                <span class="username">
                                    <h5><strong>{{ $u->firstname }} {{ $u->lastname }}</strong></h5>
                                </span>
                        </a>
                        @if($u->currentcity)
                            <span> - {{ $u->currentcity }}</span>
                        @endif
                            </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
            @endforeach
        </div>
    </div>
@stop
