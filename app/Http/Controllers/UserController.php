<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
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
            \Session::flash('messages','Bạn đã đăng ký thành công!!! Hãy đăng nhập ngay bây giờ!!!');
            return redirect('login');

        } else {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }
    }
}
