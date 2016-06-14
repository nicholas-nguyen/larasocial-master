@extends('layouts.master')

@section('post')
<div class="col-sm-7 col-md-offset-0">
    {!! Form::open(['url' => '/post/article', 'class' => 'regform']) !!}
  <div class="well">
      <div class="panel-heading">
          <h4><i class=" glyphicon glyphicon-edit"></i> Cập nhật trạng thái</h4>
      </div>
              <div class="form-group">
                  <textarea cols="20" rows="10" class="form-control message" placeholder="Chú em nghĩ gì?" id="status" name="status" style="height: 62px; overflow: hidden;"></textarea>

              </div>
          <button class="btn btn-primary pull-right" type="submit">Đăng</button><ul class="list-inline"><li>
              <div class="uploadFile timelineUploadBG">
                  <input type="file" multiple="" name="photoimg" id="bgphotoimg">
              </div>
          </li></ul>
  </div>
    {!! Form::close() !!}

    @foreach($statuses as $status)
        {!!
           view('pages.show-status',[
              'status' => $status,
              'user' => \App\Users::find($status->user_id),
              'comments' => \App\Comment::where('status_id', $status->id)->orderBy('created_at','DESC')->get(),
              'comments_count' => \App\Comment::where('status_id', $status->id)->count(),
              //'likes_count' => \App\Like::where('status_id', $status->id)->count()
           ])
        !!}
    @endforeach
</div>
    {{--<style>--}}
        {{--.timelineUploadBG {--}}
            {{--position: absolute;--}}
            {{--height: 32px;--}}
            {{--width: 32px;--}}
        {{--}--}}

        {{--.uploadFile {--}}
            {{--background: url('/public/image/imgbr/iconcamera.png') no-repeat;--}}
            {{--height: 32px;--}}
            {{--width: 32px;--}}
            {{--overflow: hidden;--}}
            {{--cursor: pointer;--}}
        {{--}--}}
        {{--.uploadFile input {--}}
            {{--filter: alpha(opacity=0);--}}
            {{--opacity: 0;--}}
            {{--margin-left: -110px;--}}
        {{--}--}}

        {{--.custom-file-input {--}}
            {{--height: 25px;--}}
            {{--cursor: pointer;--}}
        {{--}--}}
    {{--</style>--}}

@stop

