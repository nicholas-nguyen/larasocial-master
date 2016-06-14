<?php

namespace App\Http\Controllers;

use App\LikeComment;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Hash;
use Validator;
use App\Users;
use App\Like;
use App\Status;
use App\Comment;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

class PostController extends Controller
{
    public function postStatus(Request $request)
    {
//        If(Input::has('status')){
//            $text = e(Input::get('status'));
//
//            $status = new Status();
//            $status->body = $text;
//            $status->user_id = Auth::user()->id;
//
//            $status->save();
//            return redirect('dashboard');
//        }


//        If(Input::has('like_status')) {
//            $stalike = Input::get('like_status');
//
//            $selStatus = Status::find($stalike);
//            $like = new Like();
//            $like->user_id = Auth::user()->id;
//            $like->status_id = $stalike;
//            $like->save();
//            
//            return redirect('dashboard');
//        }

        $statuses = Status::where(function ($query) {
            return $query->where('user_id', Auth::user()->id)->orWhereIn('user_id', Users::where('id', Auth::user()->id)->first()->friends()->lists('id'));
        })->orderBy('created_at', 'desc')->paginate(11);

        return view('pages.dashboard')->with('statuses', $statuses);
    }

    public function postArticle()
    {
        If (Input::has('status')) {
            $text = e(Input::get('status'));
            if ($text != null) {
                $status = new Status();
                $status->body = $text;
                $status->user_id = Auth::user()->id;

                $status->save();
                return redirect('dashboard');
            } else {
                return redirect()->back();
            }
        }
        return redirect()->back();
    }

    public function postComment()
    {
        If (Input::has('status_comment')) {
            $stacomment = Input::get('status_comment');
            $comment = Input::get('comments');
            if ($comment != null) {
                $selStatus = Status::find($stacomment);
                $comm = new Comment();
                $comm->comment = $comment;
                $comm->user_id = Auth::user()->id;
                $comm->status_id = $stacomment;
                $comm->save();

                return redirect('dashboard');
            } else {
                return redirect()->back();
            }
        }
        return redirect()->back();
    }

    public function deleteArticle($id){
        $delArticle = Status::where('id',$id)->first();
        $delArticle -> delete();

        return redirect()->back();
    }
    /**
     * @return mixed
     */
    public function postLike()
    {
        $statusID = Input::get('status_id');
        $seStatus = Status::find($statusID);
        if (!$seStatus) {
            return Response::json(array('aa' => $statusID));
        }
//        if(!Users::where('id',Auth::user()->id)->first()->isFriendsWith($seStatus->user)) {
//            return redirect('dashboard');
//        }

        if (Users::where('id', Auth::user()->id)->first()->hasLikedStatus($seStatus)) {
            $delike = Like::where(function ($q) {
                return $q->where('status_id', Input::get('status_id'))
                    ->where('user_id', Auth::user()->id);
            });
            $delike->delete();
            $response = $seStatus->likes->count();
            return Response::json(array('count_like' => $response));
        } else {
            $like = new Like();
            $like->user_id = Auth::user()->id;
            $like->status_id = $statusID;
            $like->save();
        }

        $response = $seStatus->likes->count();
        return Response::json(array('count_like' => $response));
        //return redirect()->back();
    }

    public function postLikeComment()
    {
        $commentID = Input::get('comment_id');
        $selComment = Comment::find($commentID);
        if (!$selComment) {
            return Response::json(array('a' => $commentID));
        }
//        if(!Users::where('id',Auth::user()->id)->first()->isFriendsWith($selStatus->user)) {
//            return redirect('dashboard');
//        }

        if (Users::where('id', Auth::user()->id)->first()->hasLikedComment($selComment)) {
            $delikecm = LikeComment::where(function ($q) {
                return $q->where('comment_id', Input::get('comment_id'))
                    ->where('user_id', Auth::user()->id);
            });
            $delikecm->delete();
            $response = $selComment->likes->count();
            return Response::json(array('count_like' => $response));
        } else {
            $likecm = new LikeComment();
            $likecm->user_id = Auth::user()->id;
            $likecm->comment_id = $commentID;
            $likecm->save();
        }

        $response = $selComment->likes->count();
        return Response::json(array('count_like' => $response));
    }

}
