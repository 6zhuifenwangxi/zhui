<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use App\Model\Game_data;
use App\Model\Message;
class ListController extends Controller
{
    public function list(){
        // $mess_id=Input::get('mess_id');
        // $user_a =Input::get('user_a');
        // $user_b =Input::get('user_b');
        $means=array('发球','正手','反手','侧身','控制');
        $stage=[
            "发抢段"=>[
                '发球','第三板'
            ],
            '接抢段'=>[
                '接发球','第四板'
            ],
            '转换段'=>[
                '第五板','第六板'
            ],
            '相持段'=>[
                '相持'
            ]
        ];
        $plate=['发球'=>'发球','第二板'=>'第二板','接发球'=>'接发球','第四板'=>'第四板','第五板'=>'第五板','第六版'=>'第六版','六板后'=>'相持'];
        $count=array();
        $pldata=array();
        foreach ($means as $key => $value) {
            $get_a=Game_data::where([
                ['mess_id','=',14],['user_id','=',19],['tool','=',$value],['get_lose','=','得']
            ])->count();
            $lose_a=Game_data::where([
                ['mess_id','=',14],['user_id','=',19],['tool','=',$value],['get_lose','=','失']
            ])->count();
            $get_b=Game_data::where([
                ['mess_id','=',14],['user_id','=',20],['tool','=',$value],['get_lose','=','得']
            ])->count();
            $lose_b=Game_data::where([
                ['mess_id','=',14],['user_id','=',20],['tool','=',$value],['get_lose','=','失']
            ])->count();
            $count[]=[
                "get_a"=>$get_a,"lose_a"=>$lose_a,"means"=>$value,"get_b"=>$get_b,'lose_b'=>$lose_b
            ];
        }
       foreach ($stage as $key => $value) {
            $get_a=Game_data::where([
                ['mess_id','=',14],['user_id','=',19],['get_lose','=','得']
            ])->wherein('bat_number',$value)->count();
            $lose_a=Game_data::where([
                ['mess_id','=',14],['user_id','=',19],['get_lose','=','失']
            ])->wherein('bat_number',$value)->count();
            $get_b=Game_data::where([
                ['mess_id','=',14],['user_id','=',20],['get_lose','=','得']
            ])->wherein('bat_number',$value)->count();
            $lose_b=Game_data::where([
                ['mess_id','=',14],['user_id','=',20],['get_lose','=','失']
            ])->wherein('bat_number',$value)->count();
            $count[]=[
                "get_a"=>$get_a,"lose_a"=>$lose_a,"means"=>$key,"get_b"=>$get_b,'lose_b'=>$lose_b
            ];
       }
       foreach ($plate as $key => $value) {
        $get_a=Game_data::where([
            ['mess_id','=',14],['user_id','=',19],['bat_number','=',$value],['get_lose','=','得']
        ])->count();
        $lose_a=Game_data::where([
            ['mess_id','=',14],['user_id','=',19],['bat_number','=',$value],['get_lose','=','失']
        ])->count();
        $get_b=Game_data::where([
            ['mess_id','=',14],['user_id','=',20],['bat_number','=',$value],['get_lose','=','得']
        ])->count();
        $lose_b=Game_data::where([
            ['mess_id','=',14],['user_id','=',20],['bat_number','=',$value],['get_lose','=','失']
        ])->count();
        $pldata[]=[
            "get_a"=>$get_a,"lose_a"=>$lose_a,"means"=>$key,"get_b"=>$get_b,'lose_b'=>$lose_b
        ];
    }
        dump($count);
        dump($pldata);
        die;
    }
    public function find(){
        // $class =Input::get('class');
        // $mess_id=Input::get('mess_id');
        // $user_a=Message::where('id',$mess_id)->get()->user_a;
        // $user_b=Message::where('id',$mess_id)->get()->user_b;
        $count_a=0;
        $count_b=0;
        $sum_a=array();
        $sum_b=array();
        $data_a=Game_data::where([
            ['mess_id','=',14],['user_id','=',19],['class','=',1]
        ])->get()->toArray();
        $data_b=Game_data::where([
            ['mess_id','=',14],['user_id','=',20],['class','=',1]
        ])->get()->toArray();
        foreach ($data_a as $key => $value) {
            if($value['get_lose']=="得"){
                $count_a++;
            }
            $sum_a[]=$count_a;
        }
        foreach ($data_b as $key => $value) {
            if($value['get_lose']=="得"){
                $count_b++;
            }
            $sum_b[]=$count_b;
        }
        dump($sum_a);
        dump($sum_b);
        die;
    }
}
