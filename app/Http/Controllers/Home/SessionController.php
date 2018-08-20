<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
class SessionController extends Controller
{
    public function index(Request $request){
        $lang =Input::get('lang');
        $request->session()->put("lang",$lang);
        echo 0;
    }
}
