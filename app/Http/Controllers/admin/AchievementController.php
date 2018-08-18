<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Count_score;
use App\MOdel\Message;
use App\MOdel\Game_data;
use Input;
class AchievementController extends Controller
{
    //
    public function index(){
        $date =Count_score::get();
        $game =Message::get();
        $id_c =array();
        foreach ($date as $key => $value) {
            $id_c[] =$value->mess_id;
        }
        $id_m=array();
        foreach ($game as $key => $value) {
           $id_m[] =$value->id;
        }
        $id =array();
        foreach ($id_m as $key => $value) {
           if(!in_array($value,$id_c)){
               $id[]=$value;
           }
        }
        //$game =DB::table('message')->whereIn('id',$id)->get();
        $game =Message::whereIn('id',$id)->get();
        return view('admin.achievement.index',compact('date','game'));
    }
    public function add(){
        $id =Input::get('id');
        $data =Game_data::where('mess_id',1)->get()->toArray();
        if($data ==[]){
            echo "没有数据";
            die();
        }
       foreach ($data as $key => $value) {
           if($value['score_first'])
       }
    }
}
