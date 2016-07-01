<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use LRedis;
use App\LikeComment;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Hash;
use File;
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

    public function postArticle(Request $request)
    {
        if(Input::hasFile('images_upload')){
                $text = e(Input::get('status'));
                if ($text != null) {
                    $status = new Status();
                    $status->body = $text;
                    $status->user_id = Auth::user()->id;
                    $extension = Input::file('images_upload')->getClientOriginalExtension();
                    $filename = rand(11111,99999).'_'.rand(11111,99999).'.'.$extension;
                    $status->image_url = "public/images/".$filename;
                    $status->save();
                    Input::file('images_upload')->move("public/images", $filename);
                    \Session::flash('messages',"Post status success");
                    return redirect()->back();
                } else {
                    $status = new Status();
                    $status->user_id = Auth::user()->id;
                    $extension = Input::file('images_upload')->getClientOriginalExtension();
                    $filename = rand(11111,99999).'_'.rand(11111,99999).'.'.$extension;
                    $status->image_url = "public/images/".$filename;
                    $status->save();
                    Input::file('images_upload')->move("public/images", $filename);
//                    Storage::disk('local')->put($filename,File::get($file));
                    \Session::flash('messages',"Post status success");
                    return redirect()->back();
                }

        }
        else {
                $text = e(Input::get('status'));
                if ($text != null) {
                    $status = new Status();
                    $status->body = $text;
                    $status->user_id = Auth::user()->id;

                    $status->save();
                    \Session::flash('messages',"Post status success");
                    return redirect()->back();
                } else {
                    return redirect()->back();
                }

        }
        \Session::flash('messages',"Post status failure");
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

                \Session::flash('messages',"Post comment success");
                return redirect()->back();
            } else {
                \Session::flash('messages',"Post comment failure");
                return redirect()->back();
            }
        }
        return redirect()->back();
    }

    public function deleteArticle($id){
        $delArticle = Status::where('id',$id)->first();
        $images = $delArticle->image_url;
        File::delete($images);

        $delArticle -> delete();
        \Session::flash('messages',"Status have been delete");
        return redirect()->back();
    }

    public function deleteComment($id){
        $delComment = Comment::where('id',$id)->first();
        $delComment -> delete();

        \Session::flash('messages',"Comment have been delete");
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

    public function editComment(Request $request){
        $edit_id = Input::get("id_edit_comment");
        $comment = Comment::find($edit_id);


        $comment->comment = Input::get("area_edit_comment");
        $comment->save();

        \Session::flash('messages',"Comment have been changed");
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
            $islike = Status::find($statusID)->likes()->where('user_id', Auth::user()->id)->count();
            $redis = LRedis::connection();
            $data = ['like' => $response, 'status_id' => Input::get('status_id'),'islike' => $islike];
            $redis->publish('like', json_encode($data));
            return response()->json([]);
        } else {
            $like = new Like();
            $like->user_id = Auth::user()->id;
            $like->status_id = $statusID;
            $like->save();
        }

        $response = $seStatus->likes->count();
        $islike = Status::find($statusID)->likes()->where('user_id', Auth::user()->id)->count();
        $redis = LRedis::connection();
        $data = ['like' => $response, 'status_id' => Input::get('status_id'),'islike' => $islike];
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
            $islike = Comment::find($commentID)->likes()->where('user_id', Auth::user()->id)->count();
            $redis = LRedis::connection();
            $data = ['likecm' => $response, 'comment_id' => Input::get('comment_id'),'islike' => $islike];
            $redis->publish('likecm', json_encode($data));
            return response()->json([]);
        } else {
            $likecm = new LikeComment();
            $likecm->user_id = Auth::user()->id;
            $likecm->comment_id = $commentID;
            $likecm->save();
        }

        $response = $selComment->likes->count();
        $islike = Comment::find($commentID)->likes()->where('user_id', Auth::user()->id)->count();
        $redis = LRedis::connection();
        $data = ['likecm' => $response, 'comment_id' => Input::get('comment_id'),'islike' => $islike];
        $redis->publish('likecm', json_encode($data));
        return response()->json([]);
    }

}
