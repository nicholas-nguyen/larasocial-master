<div class="panel panel-default">
    <div class="panel-heading" >
        <a href="{{ route('profile.index', ['id' => $user->id]) }}"><h4 style="color: #3B5999; font-weight: bold">{{ $status->user->firstname }} {{ $status->user->lastname }}</h4></a>
        <div class="info" style="font-style: italic;font-size: 83%">{{ $status->created_at->diffForHumans() }}</div>
    </div>
    <div class="panel-body">
        <p>{{ $status->body }}</p>
    </div>
    <div class="col-md-12">
        <hr>
        <ul class="list-unstyled list-inline">
            <span class="count count-{{ $status->id }}">{{ $status->likes->count() }}</span> <i class="glyphicon glyphicon-thumbs-up"></i>
            <li>{{ $comments_count }} <i class="glyphicon glyphicon-comment"></i></li>
        </ul>
        <ul class="list-unstyled list-inline">
            <li>
                <form method="POST" id="likeform" action="">
                    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="status_id" value="{{ $status->id }}" />
                    <button type="submit" class="btn btn-xs btn-info like-btn">Thích</button>
                </form>
            </li>
            <li>
                <button class="btn btn-xs btn-info" type="button" data-toggle="collapse" data-target="#view-comments-{{$status->id}}" aria-expanded="false" aria-controls="view-comments-{{$status->id}}">
                <i class="glyphicon glyphicon-comment"></i> Bình luận
                </button>
            </li>
        </ul>
    </div>

    <div class="panel-footer clearfix">
        {!! Form::open(['url' => '/post/comment', 'class' => 'postform']) !!}
        {!! Form::hidden('status_comment',$status->id) !!}
        <div class="input-group">
            <input type="text" class="form-control" name="comments" id="comments" placeholder="Viết bình luận...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-send"></i></button>
            </span>
        </div>
        {!! Form::close() !!}

        <div class="collapse" id="view-comments-{{$status->id}}">
            {{--<div class="row">--}}
            @if($comments)
                @foreach($comments as $comment)
                    <hr>
                    <div class="list-inline list-unstyled">
                        <div class="col-md-1">
                            <img src="" class="img-responsive">
                        </div>
                        <div class="col-md-11">
                            <ul class="list-inline list-unstyled">
                                <li>
                                    <a style="font-size: 12px; color: #3B5999; font-weight: bold" href="">{{ \App\Users::find($comment->user_id)->firstname }} {{ \App\Users::find($comment->user_id)->lastname }}</a>
                                </li>
                                <li style="font-size: 11px !important;">
                                    - {{ $comment->created_at->diffForHumans() }}
                                </li>
                            </ul>
                            <p style="font-size: 12px;">{{ $comment->comment }}</p>
                            <ul class="list-inline list-unstyled">
                                <li>
                                        {{--<a href="{{ route('comment.like',[ 'like_comment' => $comment->id]) }}"><i class="glyphicon glyphicon-thumbs-up"></i> Like</a>--}}
                                    <form method="POST" id="likecommentform" action="">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                                        <button type="submit" class="btn btn-xs btn-info like-comment-btn">Thích</button>
                                    </form>
                                </li>
                                <li>
                                   <span class="count count-comment-{{ $comment->id }}">{{ $comment->likes->count() }}</span> <i class="glyphicon glyphicon-thumbs-up"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            @else
            @endif
        </div>
    </div>
</div>
