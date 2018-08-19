<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use App\Model\Game_data;
use App\Model\Message;
use DB;
class ListController extends Controller
{
    public function list(){
        // $mess_id=Input::get('mess_id');
        $user_a=Message::where('id',14)->get()->first()->user_a;
        $user_b=Message::where('id',14)->get()->first()->user_b;
        $user_aname=DB::table('user')->where('id',$user_a)->get()->first()->user_name;
        $user_bname=DB::table('user')->where('id',$user_b)->get()->first()->user_name;
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
        $plate=['发球'=>'发球','第二板'=>'接发球','第三板'=>'第三板','第四板'=>'第四板','第五板'=>'第五板','第六板'=>'第六板','六板后'=>'相持'];
        $count=array();
        $pldata=array();
        $detailed=array();
        //获取字段为means数组的数据
        foreach ($means as $key => $value) {
            $get_a=Game_data::where([
                ['mess_id','=',14],['user_id','=',$user_a],['tool','=',$value],['get_lose','=','得']
            ])->count();
            $lose_a=Game_data::where([
                ['mess_id','=',14],['user_id','=',$user_a],['tool','=',$value],['get_lose','=','失']
            ])->count();
            $get_b=Game_data::where([
                ['mess_id','=',14],['user_id','=',$user_b],['tool','=',$value],['get_lose','=','得']
            ])->count();
            $lose_b=Game_data::where([
                ['mess_id','=',14],['user_id','=',$user_b],['tool','=',$value],['get_lose','=','失']
            ])->count();
            $count[]=[
                "get_a"=>$get_a,"lose_a"=>$lose_a,"means"=>$value,"get_b"=>$get_b,'lose_b'=>$lose_b
            ];
        }
        //获取字段为stage数组的数据
       foreach ($stage as $key => $value) {
            $get_a=Game_data::where([
                ['mess_id','=',14],['user_id','=',$user_a],['get_lose','=','得']
            ])->wherein('bat_number',$value)->count();
            $lose_a=Game_data::where([
                ['mess_id','=',14],['user_id','=',$user_a],['get_lose','=','失']
            ])->wherein('bat_number',$value)->count();
            $get_b=Game_data::where([
                ['mess_id','=',14],['user_id','=',$user_b],['get_lose','=','得']
            ])->wherein('bat_number',$value)->count();
            $lose_b=Game_data::where([
                ['mess_id','=',14],['user_id','=',$user_b],['get_lose','=','失']
            ])->wherein('bat_number',$value)->count();
            $count[]=[
                "get_a"=>$get_a,"lose_a"=>$lose_a,"means"=>$key,"get_b"=>$get_b,'lose_b'=>$lose_b
            ];
       }
       //获取字段为plate数组的数据
       foreach ($plate as $key => $value) {
        $get_a=Game_data::where([
            ['mess_id','=',14],['user_id','=',$user_a],['bat_number','=',$value],['get_lose','=','得']
        ])->count();
        $lose_a=Game_data::where([
            ['mess_id','=',14],['user_id','=',$user_a],['bat_number','=',$value],['get_lose','=','失']
        ])->count();
        $get_b=Game_data::where([
            ['mess_id','=',14],['user_id','=',$user_b],['bat_number','=',$value],['get_lose','=','得']
        ])->count();
        $lose_b=Game_data::where([
            ['mess_id','=',14],['user_id','=',$user_b],['bat_number','=',$value],['get_lose','=','失']
        ])->count();
        $pldata[]=[
            "get_a"=>$get_a,"lose_a"=>$lose_a,"means"=>$key,"get_b"=>$get_b,'lose_b'=>$lose_b
        ];
    }
        $get_a=array();
        $get_b=array();
        $lose_a=array();
        $lose_b=array();
        $Scoring=array();
        //求最大值和求柱形图的得分率
        foreach ($pldata as $key => $value) {
            $get_a[]=$value['get_a'];
            $get_b[] =$value['get_b'];
            $lose_a[]=$value['lose_a'];
            $lose_b[]=$value['lose_b'];
            $Scoring[]=$value['get_a']/($value['get_a']+$value['lose_a'])*100;
            $Scoring[]=$value['get_b']/($value['get_b']+$value['lose_b'])*100;
        }
        //取最大值
        $max_a=array_merge($get_a,$lose_a);
        $max_b=array_merge($get_b,$lose_b);
        $max_a=max($max_a);
        $max_b=max($max_b);
        // dump($count);
        // dump($pldata);
        // dump($user_aname);
        // die;
        // dump($Scoring);
        // die;
        // dump($max_b);
        // die;
        //得分趋势图的数据
        $count_a=0;
        $count_b=0;
        $dynamic=0;
        $sum_a=array();
        $sum_b=array();
        $keycount=array();
        $sum_a[]=0;
        $sum_b[]=0;
        $keycount[]=0;
        $data_a=Game_data::where([
            ['mess_id','=',14],['user_id','=',$user_a],['class','=',2]
        ])->get()->toArray();
        $data_b=Game_data::where([
            ['mess_id','=',14],['user_id','=',$user_b],['class','=',2]
        ])->get()->toArray();
        foreach ($data_a as $key => $value) {
            if($value['get_lose']=="得"){
                $count_a++;
            }
            $dynamic++;
            $keycount[]=$dynamic;
            $sum_a[]=$count_a;
        }
        foreach ($data_b as $key => $value) {
            if($value['get_lose']=="得"){
                $count_b++;
            }
            $sum_b[]=$count_b;
        }
        return view('home.index.list',compact('count','pldata','user_aname','user_bname','max_a','max_b','Scoring','sum_a','sum_b','keycount'));
    }
    public function find(){
        // $class =Input::get('class');
        // $mess_id=Input::get('mess_id');
        $user_a=Message::where('id',14)->get()->first()->user_a;
        $user_b=Message::where('id',14)->get()->first()->user_b;
        $count_a=0;
        $count_b=0;
        $dynamic=0;
        $sum_a=array();
        $sum_b=array();
        $keycount=array();
        $sum_a[]=0;
        $sum_b[]=0;
        $keycount[]=0;
        $data_a=Game_data::where([
            ['mess_id','=',14],['user_id','=',$user_a],['class','=',1]
        ])->get()->toArray();
        $data_b=Game_data::where([
            ['mess_id','=',14],['user_id','=',$user_b],['class','=',1]
        ])->get()->toArray();
        foreach ($data_a as $key => $value) {
            if($value['get_lose']=="得"){
                $count_a++;
            }
            $dynamic++;
            $keycount[]=$dynamic;
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
        dump($keycount);
        die;
    }
}
