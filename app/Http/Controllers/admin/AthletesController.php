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

    public function add(Request $request){
    	if(Input::method() == 'POST'){
    		$data = Input::all();
    		unset($data['_token']);
            $data['image'] = '/admin/img/a1.jpg';
			$data['add_time'] = date('Y-m-d H:i:s');
			$data['add_admin_id'] = $request -> session() ->all()['user']->id;
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
    public function edit(){
		$id = Input::all()['id'];
    	if (Input::method() == 'POST') {
    		$data1 = Input::all();
    		unset($data1['_token']);
   			$data1['image'] = '/admin/img/a1.jpg';
            $data1['add_time'] = date('Y-m-d H:i:s');

            if(Athletes::where('id',$id) -> update($data1)){
            	$data = Athletes::all();
            	return view('admin.athletes.index',compact('data'));        
            }else{
             	$data2 = Athletes::where('id',$id)->first() -> toArray();
    			$data2['show'] = '1';
    			return view('admin.athletes.edit' ,compact('data2'));
            }            
    	}else{    		
    		$data2 = Athletes::where('id',$id)->first() -> toArray();
    		$data2['show'] = '0';
    		return view('admin.athletes.edit' ,compact('data2'));
    	}  	
	}
	public  function del(){
		$id = Input::all()['id'];
    	if (Athletes::where('id',$id) -> delete()) {
    		$data = Athletes::all();
    		return view('admin.athletes.index',compact('data'));
		}
	}
}