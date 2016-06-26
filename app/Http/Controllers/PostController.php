<?php

namespace App\Http\Controllers;

use LRedis;
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

        $user = Users::where('id',Auth::user()->id)->first();
        $friends = $user->friends();
        $statuses = Status::where(function ($query) {
            return $query->where('user_id', Auth::user()->id)->orWhereIn('user_id', Users::where('id', Auth::user()->id)->first()->friends()->lists('id'));
        })->orderBy('created_at', 'desc')->simplePaginate(10);

        return view('pages.dashboard')->with('statuses', $statuses)->with('friends',$friends);
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
//        if(Input::hasFile('images')){
//            $file = Input::file('images');
//            $file->move('images', $file->getClientOriginalName());
//            $image = Image::make(sprintf('images/%s', $file->getClientOriginalName()))->resize(200, 200)->save();
//            return 'hahahah';
//        }
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

    public function editArticle(Request $request){
        $edit_id = Input::get("id_edit_status");
        $status = Status::find($edit_id);


        $status->body = Input::get("area_edit_status");
        $status->save();

        \Session::flash('messages',"Status have been changed");
        return redirect()->back();
//        return response()->json(array('newbody' => $status->body),200);
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

        if (Users::where('id', Auth::user()->id)->first()->hasLikedStatus($seStatus)) {
            $delike = Like::where(function ($q) {
                return $q->where('status_id', Input::get('status_id'))
                    ->where('user_id', Auth::user()->id);
            });
            $delike->delete();
            $response = $seStatus->likes->count();
            $redis = LRedis::connection();
            $data = ['like' => $response, 'status_id' => Input::get('status_id')];
            $redis->publish('like', json_encode($data));
            return response()->json([]);
        } else {
            $like = new Like();
            $like->user_id = Auth::user()->id;
            $like->status_id = $statusID;
            $like->save();
        }

        $response = $seStatus->likes->count();
        $redis = LRedis::connection();
        $data = ['like' => $response, 'status_id' => Input::get('status_id')];
        $redis->publish('like', json_encode($data));
        return response()->json([]);
        //return Response::json(array('count_like' => $response));
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
            $redis = LRedis::connection();
            $data = ['likecm' => $response, 'comment_id' => Input::get('comment_id')];
            $redis->publish('likecm', json_encode($data));
            return response()->json([]);
        } else {
            $likecm = new LikeComment();
            $likecm->user_id = Auth::user()->id;
            $likecm->comment_id = $commentID;
            $likecm->save();
        }

        $response = $selComment->likes->count();
        $redis = LRedis::connection();
        $data = ['likecm' => $response, 'comment_id' => Input::get('comment_id')];
        $redis->publish('likecm', json_encode($data));
        return response()->json([]);
    }

}
