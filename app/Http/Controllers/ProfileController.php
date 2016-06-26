<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Http\Requests;
use App\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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

    public function editProfile(){
        $user = Users::find(Auth::user()->id);

        $user->firstname = Input::get("inputFirstname");
        $user->lastname = Input::get("inputLastname");
        $user->birthday = Input::get("inputBirthday");
        $user->gender = Input::get("selectGender");
        $user->hometown = Input::get("inputHometown");
        $user->currentcity = Input::get("inputCurentcity");

        $user->save();

        \Session::flash('messages',"User information have been changed");
        return redirect()->back();
    }

    public function postEdit(){

    }
}
