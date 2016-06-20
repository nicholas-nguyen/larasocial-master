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
        $data = ['message' => Input::get('message'), 'user_id' => Input::get('user_id'), 'user_name' => Input::get('user_name'),'my_id' => Input::get('my_id')];
        $redis->publish('message', json_encode($data));
        return response()->json([]);
    }
}
