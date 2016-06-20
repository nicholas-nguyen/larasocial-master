<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Users;
use DB;
use App\Http\Requests;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function getResults(){
        $keyword = Input::get('search_text');
//        if(!$keyword){
//            return redirect('dashboard');
//        }
        $result = Users::where(DB::raw("CONCAT(firstname,' ',lastname)"),"LIKE","%{$keyword}%")->get();

        return view('pages.results')->with('result',$result);
    }
}
