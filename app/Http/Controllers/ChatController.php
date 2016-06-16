<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use LRedis;
use Illuminate\Support\Facades\Input;

class ChatController extends Controller
{
    public function __construct()
    {
//        $this->middleware('guest');
    }
    public function sendMessage(){
        $redis = LRedis::connection();
        $data = ['message' => Input::get('message'), 'user' => Input::get('user')];
        $redis->publish('message', json_encode($data));
        return response()->json([]);
    }
}
