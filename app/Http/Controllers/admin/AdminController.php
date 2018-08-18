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
			$data['add_time'] = time();
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
    	}
	}
	public function edit(){
		$id = Input::all()['id'];
		if(Input::method() == 'POST'){
			$data = Input::all();
			unset($data['_token']);
			unset($data['id']);
    		if($data['userpwd'] == ''){
				$data2 = Admin::where('id',$id)->first()->toArray();
    			$data2['msg'] = '1';
    			return view('admin.admin.edit',compact('data2'));
    		}
    		if (count($data) == '2') {
    			$data['show'] = 1;
    		}else{
    			$data['show'] = 0;
			}
			$data['add_time'] = time();
    		if (Admin::where('id',$id)->update($data)) {
    			$data = Admin::all();
    			return view('admin.admin.index',compact('data'));
    		}else{
    			$data2['msg'] = '1';
    			return view('admin.admin.edit',compact('data2'));
    		}
		}else{			
			$data2 = Admin::where('id',$id)->first()->toArray();
			$data2['msg'] = '0';
			return view('admin.admin.edit',compact('data2'));
		}
	}
}
