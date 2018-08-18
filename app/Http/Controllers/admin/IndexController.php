<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request){
        $data =$request->session()->get('user');
        $name =$data->username;
        return view('admin.index.index',compact('name'));
    }
    public function welcome(){
        return view('admin.index.welcome');
    }
}
