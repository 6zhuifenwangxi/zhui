<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Athletes;
use Input;
use DB;
class AthletesController extends Controller
{
    public function index(){
    	$data = Athletes::all();
    	return view('admin.athletes.index',compact('data'));
    }

    public function add(){
    	if(Input::method() == 'POST'){
    		$data = Input::all();
    		unset($data['_token']);
            $data['image'] = '/admin/img/a1.jpg';
            $data['add_time'] = date('Y-m-d H:i:s');
            if(Athletes::insert($data)){
               $data =  Athletes::all();
                return view('admin.athletes.index',compact('data'));
            }else{
                $mes = '1';
                return view('admin.athletes.add' ,compact('mes'));
            }
    	}else{
            $mes = '';
    		return view('admin.athletes.add',compact('mes'));
    	}
    }
}
