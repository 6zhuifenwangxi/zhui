<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class PublicController extends Controller
{
    public function login(){
    	return view('admin/public/login');
    }

    public function check(Request $request){
    	$this -> validate($request,[
    		'username'  =>  'required|min:3|max:20',
    		'password'  =>  'required|min:6',
    	]);
    	$data = $request -> only(['username','password']);
    	$user = DB::table('admin')->where('username', $data['username'])->first(); 	
    	if ($user->userpwd == md5($data['password'])) {
    		$request -> session() ->put('user',$user);
    		return redirect(route('index.index'));
    	}else{  		
    		return redirect(route('admin.public.index'))->withErrors(['error'=>'用户名或密码错误']);
    	}
    }
}
