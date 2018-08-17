<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request){
        return view('admin.index.index');
    }
    public function welcome(){
        return view('admin.index.welcome');
    }
}
