<div class="post" id="post_status">
    <div class="user-block">
        @if($user->avatar_url != null)
            <img class="img-circle img-md" src="{{ URL::asset($user->avatar_url) }}" alt="User Image">
        @else
            <img class="img-circle img-md" src="{{ $user->getAvatarUrl() }}" alt="User Image">
        @endif

        <div class="username">
            <a href="{{ route('profile.index',['id' => $user->id]) }}">{{ $status->user->firstname }} {{ $status->user->lastname }}</a>
            @if(Auth::user()->id == $status->user->id)
                <a href="{{ route('/delete/article', ['id' => $status->id]) }}"
                   class="pull-right btn-box-tool" onclick="return accept()" alt="delete"><i class="fa fa-times"></i></a>
                <a href="" class="pull-right btn-box-tool btn-edit-status"><i
                            class="fa fa-edit" alt="edit"></i></a>
            @endif
        </div>
        <span class="description">{{ $status->created_at->diffForHumans() }}</span>
    </div>
    <!-- /.user-block -->
    <span id="body_status" style="margin-left: 40px;">
        {{ $status->body }}
        <input type="hidden" id="id_of_status" name="id_of_status" value="{{ $status->id }}">
    </span>
    <div style="clear: both"></div>
    @if($status->image_url != null)
        <div style="text-align:center;">
            <img style="width: 70%; height:auto;display: block;margin: auto;max-width: 100%;max-height: 100%;padding-top: 10px;"
                 src="{{URL::asset($status->image_url)}}" alt="Your Picture">
        </div>
    @endif
    <ul class="list-inline" style="padding-top: 10px;">
        {{--<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>--}}
        <li>
            <form method="POST" id="likeform" action="">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="status_id" value="{{ $status->id }}"/>
                @if($status->likes()->where('user_id', Auth::user()->id)->count() == 0)
                    <a href="" style="margin-left: 15px;" type="submit" class="link-black text-sm like-btn"
                       id="a_like_{{ $status->id }}"></i>Like &nbsp;</a>
                @else
                    <a href="" style="margin-left: 15px;" type="submit" class="link-black text-sm like-btn"
                       id="a_like_{{ $status->id }}">Dislike &nbsp;</a>
                @endif
                <span class="count count-{{ $status->id }}">({{ $status->likes->count() }}) <i class="fa fa-thumbs-o-up margin-r-5"></i></span>
            </form>

        </li>


        <li class="pull-right">
            <a class="link-black text-sm" data-toggle="collapse" data-target="#view-comments-{{$status->id}}"
               aria-expanded="false" aria-controls="view-comments-{{$status->id}}"><i
                        class="fa fa-comments-o margin-r-5"></i> Comments
                ({{ \App\Comment::where('status_id', $status->id)->count() }})</a></li>
    </ul>
    <div class="panel-footer clearfix">
        {!! Form::open(['url' => '/post/comment', 'class' => 'postform']) !!}
        {!! Form::hidden('status_comment',$status->id) !!}
        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        <div class="input-group list-inline">
            <input class="form-control" type="text" placeholder="Type a comment" id="comments" name="comments">
                      <span class="input-group-btn">
                          <button class="btn btn-block btn-default btn-flat" type="submit"><i
                                      class="fa fa-paper-plane-o"></i></button>
                      </span>
        </div>
        {!! Form::close() !!}

        <div class="collapse" id="view-comments-{{$status->id}}">
            @if($comments)
                @foreach($comments as $comment)

                    <div class="box-footer box-comments">
                        <div class="box-comment">
                            <!-- User image -->
                            @if(\App\Users::find($comment->user_id)->avatar_url != null)
                                <img class="img-circle img-md"
                                     src="{{URL::asset(\App\Users::find($comment->user_id)->avatar_url)}}"
                                     alt="User Image">
                            @else
                                <img class="img-circle img-md"
                                     src="{{URL::asset(\App\Users::find($comment->user_id)->getAvatarUrl() )}}"
                                     alt="User Image">
                            @endif
                            <div class="comment-text" id="comment-text">
                              <span class="username" style="margin-bottom: 15px;">
                                <a href="{{ route('profile.index',['id' => $user->id]) }}">{{ \App\Users::find($comment->user_id)->firstname }} {{ \App\Users::find($comment->user_id)->lastname }}</a>
                                  <span class="text-muted"> - {{ $comment->created_at->diffForHumans() }}</span>
                                  @if(Auth::user()->id == $comment->user->id)
                                      <a href="{{ route('/comment/delete', ['id' => $comment->id]) }}"
                                         class="pull-right btn-box-tool" onclick="return accept()" alt="delete"><i
                                                  class="fa fa-times"></i></a>
                                      <a href="" class="pull-right btn-box-tool btn-edit-comment" alt="edit"><i
                                                  class="fa fa-edit"></i></a>
                                  @endif
                              </span><!-- /.username -->

                                <span id="body_comment" style="margin-top: 20px;">
                                    {{ $comment->comment }}
                                    <input type="hidden" id="id_of_comment" name="id_of_comment" value="{{ $comment->id }}">
                                </span>
                            </div>
                            <div style="margin-left: 40px;">
                                <form method="POST" id="likecommentform" action="">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}"/>
                                    @if($comment->likes()->where('user_id', Auth::user()->id)->count() == 0)
                                        <a href="" id="a_like_cm_{{ $comment->id }}" type="submit"
                                           class="link-black text-sm like-comment-btn">Like &nbsp;</a>
                                    @else
                                        <a href="" id="a_like_cm_{{ $comment->id }}" type="submit"
                                           class="link-black text-sm like-comment-btn">Dislike &nbsp;</a>
                                    @endif
                                    <span class="count count-comment-{{ $comment->id }}"> ({{ $comment->likes->count() }})<i
                                                class="fa fa-thumbs-o-up margin-r-5"></i>
                                    </span>
                                </form>
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->
                    </div>
                @endforeach
            @else
            @endif
        </div>
    </div>
</div>

<!-- /.modal -->
<script type="text/javascript">
    function accept() {
        return confirm('Are you sure?');
    }
    ;

</script>
<style>
    .text-sm:hover {
        cursor: pointer;
        color: #00c0ef;
    }

    #area_edit_status {
        border: 1px #ddd solid;
        top: 5px;
        width: 100%;
        height: auto;
        left: 5px;
        font: 9pt Consolas;
        resize: none;
    }
    #area_edit_comment {
        border: 1px #ddd solid;
        top: 5px;
        width: 100%;
        height: auto;
        left: 5px;
        font: 9pt Consolas;
        resize: none;
    }
</style>
