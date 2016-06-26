<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Gd\Commands\ResetCommand;
use Validator;
use App\Users;
use App\Http\Requests;

class MessageController extends ApiController
{

    public function getList(Request $request){
        $message = \DB::table('messages')->select("messages.*")
                ->where('messages.sender_id',Auth::user()->id)
                ->Where('messages.reciver_id',$request->input('id'))
                ->orwhere('messages.sender_id',$request->input('id'))
                ->Where('messages.reciver_id',Auth::user()->id)
                ->orderBy('messages.created_at','ASC')
                ->paginate(10);

        $messageParse = $this->parseMessage($message);

        return $this->respondSuccess('success',$messageParse,200);
    }

    public function parseMessage(&$message){
        if(count($message)>0 ){
            foreach ($message as $key => $item){
                $message[$key]->sender_user_info = \App\Users::find($item->sender_id)->first();
                $message[$key]->reciver_user_info = \App\Users::find($item->reciver_id)->first();
            }
            return $message;
        }
    }

    public function store(Request $request){
        $data = $request->all();
        $message = new \App\Message();
        $message->is_read = 0;
        $message->fill($data);
        if($message->save()){
            return $this->respondSuccess('success',$message,200);
        }else{
            return $this->respondError('error');
        }
    }
}
