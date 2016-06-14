@extends('layouts.master')

@section('post')
    <div class="col-lg-5">
        @include('partials.userblock')
        <hr>

    </div>
    <div class="col-lg-4 col-lg-offset-3">
        @if(\App\Users::where('id',Auth::user()->id)->first()->hasFriendRequestsPending($user))
            <p>Đang chờ {{ $user->getNameOrFullName() }} chấp nhận yều kết bạn...</p>
        @elseif(\App\Users::where('id',Auth::user()->id)->first()->hasFriendRequestsReceived($user))
            <a href="{{ route('friends.accept', ['id' => $user->id]) }}" class="btn btn-xs btn-info">Chấp nhận</a>
        @elseif(\App\Users::where('id',Auth::user()->id)->first()->isFriendsWith($user))
            <p>Bạn và {{ $user->firstname }} {{ $user->lastname }} đã là bạn bè!!</p>
            <form  action="{{ route('friends.delete', ['id' => $user->id]) }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" value="Hủy kết bạn" class="btn btn-xs btn-danger">
            </form>
        @elseif(Auth::user()->id !== $user->id)
            <a href="{{ route('friends.add', ['id' => $user->id]) }}" class="btn btn-xs btn-info">Thêm bạn</a>
        @endif
        <h4 style="color: #3B5999">Bạn của {{ $user->firstname }} {{ $user->lastname }}</h4>
        @if(!$user->friends()->count())
            <p>Không có bạn nào!!!</p>
        @else
            @foreach($user->friends() as $user)
                @include('partials.userblock')
            @endforeach
        @endif
    </div>
@stop