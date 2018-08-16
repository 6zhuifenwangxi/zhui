<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Symfony\Component\HttpFoundation\Session\Session;
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
    	$user = DB::table('user')->where('name', $data['username'])->first();
    	if ($user) {
    		$session = new Session;
    		$session->set('user',$user);
    		var_dump($session->get('user'));
    		return redirect(route('index.index'));
    	}else{
    		return redirect(route('login'))->withErrors(['error'=>'用户名或密码错误']);
    	}
    }
}
