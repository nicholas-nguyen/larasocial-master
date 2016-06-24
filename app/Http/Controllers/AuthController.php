<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

class AuthController extends Controller
{
    public function getLogin(){
        return view('pages.login');
    }

    public function getRegister(){
        return view('auth.register');
    }

    public function postLogin(Request $request){
        $remember = (Input::has('remember')) ? true : false;
        $validator = Validator::make($request->all(), [
            'Email' => 'required|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9-][a-z0-9]+)*(\.[a-z]{2,4}){1,2}$/',
            'Password' => 'required|min:6',
        ]);

        if ($validator->passes()) {

            if (Auth::attempt(['email' => $request['Email'], 'password' => $request['Password']],$remember)) {
                // Authentication passed...
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('login');
            }

        } else {
            return redirect('login')
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function postLogout(){
        Auth::logout();

        return redirect()->intended('login');
    }
}
