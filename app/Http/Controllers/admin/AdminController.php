<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use Input;

class AdminController extends Controller
{
    public function index(){
    	$data = Admin::all();
    	return view('admin.admin.index',compact('data'));
    }
    public function add(){
    	if(Input::method() == 'POST'){
    		$data = Input::all();
    		unset($data['_token']);
    		if($data['username'] == '' || $data['userpwd'] == ''){
    			$mes = '1';
    			return view('admin.admin.add',compact('mes'));
    		}
    		if (count($data) == '3') {
    			$data['show'] = 1;
    		}else{
    			$data['show'] = 0;
    		}
    		if (Admin::insert($data)) {
    			$data = Admin::all();
    			return view('admin.admin.index',compact('data'));
    		}else{
    			$mes = '1';
    			return view('admin.admin.add',compact('mes'));
    		}
    	}else{
    		$mes = '';
    		return view('admin.admin.add' ,compact('mes'));
    	}
    }
    public function del(){
    	$id = Input::all()['id'];
    	if (Admin::where('id',$id) -> delete()) {
    		$data = Admin::all();
    		return view('admin.admin.index',compact('data'));
    	}else{

    	}
    }
}
