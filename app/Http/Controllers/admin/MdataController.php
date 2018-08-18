<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Mdata;
use Input;
use DB;

class MdataController extends Controller
{
    public function index(){
        if(Input::method() == 'POST'){
            $data1 = Input::all();
            dump($data1);
            die;
        }else{
            $data = [];
            $user = DB::table("user")->get();
            $game_name = DB::table('message')->get();
            $data['user'] = $user;
            $data['game_name'] = $game_name;        
            return view('admin.Mdata.index',compact('data'));
        }
    }
}
