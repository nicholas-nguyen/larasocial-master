<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Users;
use DB;
use App\Http\Requests;

class SearchController extends Controller
{
    public function getResults(Request $request){
        $keyword = Input::get('keyword');
        if(!$keyword){
            return redirect('dashboard');
        }
        $users = Users::where(DB::raw("CONCAT(firstname,' ',lastname)"),"LIKE","%{$keyword}%")->get();

        return view('pages.results')->with('users',$users);
    }
}
