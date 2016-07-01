<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Users;
use App\Http\Requests;

class UserController extends Controller
{
    public function postRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'Firstname' => 'required|max:90',
            'Lastname' => 'required|max:90',
            'Birthday' => 'required',
            'Gender' => 'required',
            'Email' => 'required|unique:users',
            'Password' => 'required|min:6',
            'Password_confirmation' => 'required|same:Password',
        ]);


        if ($validator->passes()) {

            $dulieu_dk = $request->all();

            $users = new Users;

            $users->firstname = $dulieu_dk["Firstname"];
            $users->lastname = $dulieu_dk["Lastname"];
            $users->birthday = $dulieu_dk["Birthday"];
            $users->gender = $dulieu_dk["Gender"];
            $users->email = $dulieu_dk["Email"];
            $users->password = Hash::make($dulieu_dk["Password"]);

            $users->save();
           \Session::flash('messages','Regster success!!!');
            return redirect('login');
            Auth::login($users);
        } else {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function changePassword(Request $request){
        $user = Users::find(Auth::user()->id);

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required',
            'retype_password' => 'required|same:new_password'
        ]);

        if ($validator->fails())
        {
            \Session::flash('messages',$validator);
            return redirect()->back();
        }
        else
        {

            if (!Hash::check(Input::get('current_password'), $user->password))
            {
                \Session::flash('messages','Your old password does not match');
                return redirect()->back();
            }
            else
            {
                $user ->password = Hash::make(Input::get('new_password'));
                $user -> save();
                \Session::flash('messages',"Password have been changed");
                return redirect()->back();
            }
        }
    }
}
