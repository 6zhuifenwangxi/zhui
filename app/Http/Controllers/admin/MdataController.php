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
            if($data1['user'] == 0 || $data1['game'] ==0){
                $message = ['code'=> '0','msg'=>'请选择正确的比赛获运动员!'];
                return response()->json($message);
            }
            $result = Mdata::whereRaw("user_id =".$data1['user']." and mess_id =".$data1['game'])->get()->toArray();
            if(empty($result)){
                $message = ['code'=> '1','msg'=>'暂无相关数据!'];
                return response()->json($message);
            }
            return response()->json($result);
        }else{
            $data = [];
            $user = DB::table("user")->get();
            $game_name = DB::table('message')->get();
            $data['user'] = $user;
            $data['game_name'] = $game_name;        
            return view('admin.Mdata.index',compact('data'));
        }
    }
    public function edit(){
        $id = Input::all()['id'];
        if(Input::method() == 'POST'){
            $data1 = Input::all();
    		unset($data1['_token']);
            if(Mdata::where('id',$id) -> update($data1)){
            	$data2 = Mdata::where('id',$id)->first();
    			$data2['show'] = '2';
            	return view('admin.Mdata.edit',compact('data2'));        
            }else{
             	$data2 = Mdata::where('id',$id)->first();
    			$data2['show'] = '1';
    			return view('admin.Mdata.edit' ,compact('data2'));
            }           
        }else{
            $data2 = Mdata::where('id',$id)->first();
            $data2['show'] = '0';
            return view('admin.Mdata.edit',compact('data2'));
        }
    }
    public function add(){
        if(Input::method() == 'POST'){
            $data = Input::all();
            unset($data['_token']);
            if(Mdata::insert($data)){
                $data = [];
                $user = DB::table("user")->get();
                $game_name = DB::table('message')->get();
                $data['user'] = $user;
                $data['game_name'] = $game_name;  
                $data['show'] = '2';
                return view('admin.Mdata.add',compact('data'));
             }else{
                 $data['show'] = '1'; 
                 return view('admin.Mdata.add' ,compact('data'));
             }
        }else{
            $data = [];
            $user = DB::table("user")->get();
            $game_name = DB::table('message')->get();
            $data['user'] = $user;
            $data['game_name'] = $game_name;  
            $data['show'] = '0';   
            return view('admin.Mdata.add',compact('data'));
        }
    }
}
