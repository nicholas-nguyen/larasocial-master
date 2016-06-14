<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;
use Auth;
use App\Users;
use App\Http\Requests;

class FriendController extends Controller
{
    public function getIndex($id){
        $user = Users::where('id',$id)->first();
        $friends = $user->friends();
        $request = $user->friendRequests();

        return view('friends.index')->with('friends',$friends)->with('request',$request);
    }

    public function getAdd($id){
        $user = Users::where('id',$id)->first();
        $us = Users::where('id',Auth::user()->id)->first();
        if(!$user)
            return redirect('dashboard')->with('info','Người dùng không tồn tại!');

        if(Auth::user()->id === $user->id)
            return redirect('dashboard');

        if($us->hasFriendRequestsPending($user) || $user->hasFriendRequestsPending($us)){
            return redirect('profile.index',['id'=> $user->id])->with('info','Yêu cầu kết bạn đang chò!!');
        }

        if($us->isFriendsWith($user)){
            return redirect('profile.index',['id'=> $user->id])->with('info','Đã là bạn!!');
        }

        $us->addFriends($user);

        return redirect()->route('profile.index',['id'=> $id])->with('info','Đã gửi yêu cầu kết bạn!!');
    }

    public function getAccept($id){
        $user = Users::where('id',$id)->first();
        $us = Users::where('id',Auth::user()->id)->first();
        if(!$user)
            return redirect('dashboard')->with('info','Người dùng không tồn tại!');
        if(!$us->hasFriendRequestsReceived($user)){
            return redirect('dashboard');
        }
        $us->acceptFriendRequest($user);
        return redirect()->route('profile.index',['id'=> $id])->with('info','Đã chấp nhận yêu cầu kết bạn!!');
    }

    public function postDelete($friendId){
       /* $userdel = Users::where('id', $id)->first();
        $us = Users::where('id',Auth::user()->id)->first();

        if(!$us->isFriendsWith($userdel)){
            return redirect()->back();
        }
        $us->deleteFriend($userdel);*/
        $friend1 = Friend::where('user_id', Auth::user()->id)
            ->where('friend_id', $friendId);
        if($friend1){
            $friend1->delete();
        }
        $friend2 = Friend::where('user_id', $friendId)
            ->where('friend_id', Auth::user()->id);
        if($friend2){
            $friend2->delete();
        }

        return redirect()->back()->with('info','Đã hủy kết bạn!!');
    }
}
