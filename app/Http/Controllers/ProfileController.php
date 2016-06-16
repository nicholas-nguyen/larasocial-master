<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Http\Requests;
use App\Status;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile($id){
        $user = Users::where('id', $id)->first();
        if(!$user){
            abort(404);
        }
        $status_user = Status::where('user_id',$id)->orderBy('created_at', 'desc')->get();
        return view('users.profile-user')->with('user',$user)->with('status_user',$status_user);
    }

    public function getEdit(){
        return view('users.edit-profile');
    }

    public function postEdit(){

    }
}
