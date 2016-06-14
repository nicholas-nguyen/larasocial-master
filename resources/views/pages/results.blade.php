@extends('layouts.master')

@section('post')
   <h3>Kết quả tìm kiếm cho "{{ Request::input('keyword') }}"</h3>
   <hr>
    @if(!$users->count())
        <p>Oops!!! Không tìm thấy kết quả!!!</p>
    @else
        <div class="col-lg-12">
            @foreach($users as $user)
                @include('partials.userblock')
            @endforeach
        </div>
    @endif
@stop

