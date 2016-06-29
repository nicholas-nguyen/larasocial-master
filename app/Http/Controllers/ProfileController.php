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
        $request = $user->friendRequests();

        $status_user = Status::where('user_id',$id)->orderBy('created_at', 'desc')->simplePaginate(10);;
        return view('users.profile-user')->with('user',$user)->with('status_user',$status_user)->with('request', $request);
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

    public function postAvatar(){
        if(Input::hasFile('images_avatar')){
                $user = Users::find(Auth::user()->id);
                $extension = Input::file('images_avatar')->getClientOriginalExtension();
                $filename = 'avatarUsers'.'-'.Auth::user()->id.'.'.$extension;
                $user->avatar_url = "public/images/avatar/".$filename;
                $user->save();
                Input::file('images_avatar')->move("public/images/avatar/", $filename);
//                    Storage::disk('local')->put($filename,File::get($file));
            \Session::flash('messages',"Avatar have been changed");
                return redirect()->back();
        }
        else {
            \Session::flash('messages',"Avatar haven't been changed");
            return redirect()->back();
        }
        return redirect()->back();
    }
}
