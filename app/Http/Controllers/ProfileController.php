<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile($id){
        $user = Users::where('id', $id)->first();
        if(!$user){
            abort(404);
        }

        return view('users.profile-user')->with('user',$user);
    }

    public function getEdit(){
        return view('users.edit-profile');
    }

    public function postEdit(){

    }
}
