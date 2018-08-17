<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Message;
use Input;
use DB;
class MathController extends Controller
{
    //
    public function index(){
        $date = Message::get();
        return view('admin.math.index',compact('date'));
    }
    public function add(){
        if(Input::method()=="GET"){
            $name =DB::table('user')->get();
            $stage =Message::get();
            return view('admin.math.add',compact('name','stage'));
        }
        $date =Input::all();
        unset($date['_token']);
        $date['add_time'] =date('Y-m-d h:i:s',time());
        if(Message::insert($date)){
            return redirect(route('math.index'))->withErrors(['error'=>'添加成功']);
        }else{
            return redirect(route('math.index'))->withErrors(['error'=>'添加失败']);
        }
        
    }
    public function dlt(){
        $id =Input::get('id');
        if(Message::where('id',$id)->delete()){
            $response =['code'=> '0','msg'=>'删除成功！'];
        }else{
            $response =['code'=> '0','msg'=>'删除失败！'];
        }
        return response()->json($response);
    }
    public function edit(){
        $id =Input::get('id');
        if(Input::method()=="GET"){
            $name =DB::table('user')->get();
            $stage =Message::get();
            $info =Message::where('id',$id)->first();
            return view('admin.math.edit',compact('name','stage','info'));
        }else{
            
            $date =Input::all();
            unset($date['_token']);
            $date['add_time'] =date('Y-m-d h:i:s',time());
            if(Message::where('id',$id)->update($date)){
                sleep(1);
            return redirect(route('math.index'))->withErrors(['error'=>'修改成功']);
        } else{
            return redirect(route('math.index'))->withErrors(['error'=>'修改失败']);
        }
        }
    }
}
