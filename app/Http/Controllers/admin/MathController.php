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
}
