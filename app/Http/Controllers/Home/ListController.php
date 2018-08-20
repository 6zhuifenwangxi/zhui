<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use App\Model\Game_data;
use App\Model\Message;
use DB;
class ListController extends Controller
{
    public function list(Request $request){
        // $mess_id=Input::get('mess_id');
        $mess_id=15;
        if(!$request->session()->has('lang')){
            $lang ='chinese';
            $y='chinese';
        }else if($request->session()->get('lang')=='english'){
            $lang=$request->session()->get('lang');
            $y='english';
        }else{
            $lang ='chinese';
            $y='chinese';
        }
        //取出字典数据
        $words =DB::table('dic')->select($lang)->get()->toArray();
        // dump($y);
        // dump($words);
        // die;
        $user_a=Message::where('id',$mess_id)->get()->first()->user_a;
        $user_b=Message::where('id',$mess_id)->get()->first()->user_b;
        $user_aname=DB::table('user')->where('id',$user_a)->get()->first()->user_name;
        $user_bname=DB::table('user')->where('id',$user_b)->get()->first()->user_name;
        $means=array($words[0]->$y=>'发球',$words[1]->$y=>'正手',$words[2]->$y=>'反手',$words[3]->$y=>'侧身',$words[4]->$y=>'控制');
        $stage=[
            $words[5]->$y=>[
                '发球','第三板'
            ],
            $words[6]->$y=>[
                '接发球','第四板'
            ],
            $words[7]->$y=>[
                '第五板','第六板'
            ],
            $words[8]->$y=>[
                '相持'
            ]
        ];
        $plate=[$words[13]->$y=>'发球',$words[14]->$y=>'接发球',$words[15]->$y=>'第三板',$words[16]->$y=>'第四板',$words[17]->$y=>'第五板',$words[18]->$y=>'第六板',$words[19]->$y=>'相持'];
        $count=array();//表单数组
        $pldata=array();//拍数数组
        //语言包
        $L_pack=[
            $words[9]->$y,$words[10]->$y,$words[11]->$y,$words[12]->$y
        ];
        $word_count=count($words);
        for ($i=20; $i <$word_count ; $i++) { 
            $L_pack[]=$words[$i]->$y;
        }
        // dump($L_pack);
        // die;
        //获取字段为means数组的数据
        foreach ($means as $key => $value) {
            $get_a=Game_data::where([
                ['mess_id','=',$mess_id],['user_id','=',$user_a],['tool','=',$value],['get_lose','=','得']
            ])->count();
            $lose_a=Game_data::where([
                ['mess_id','=',$mess_id],['user_id','=',$user_a],['tool','=',$value],['get_lose','=','失']
            ])->count();
            $get_b=Game_data::where([
                ['mess_id','=',$mess_id],['user_id','=',$user_b],['tool','=',$value],['get_lose','=','得']
            ])->count();
            $lose_b=Game_data::where([
                ['mess_id','=',$mess_id],['user_id','=',$user_b],['tool','=',$value],['get_lose','=','失']
            ])->count();
            $count[]=[
                "get_a"=>$get_a,"lose_a"=>$lose_a,"means"=>$key,"get_b"=>$get_b,'lose_b'=>$lose_b
            ];
        }
        //获取字段为stage数组的数据
       foreach ($stage as $key => $value) {
            $get_a=Game_data::where([
                ['mess_id','=',$mess_id],['user_id','=',$user_a],['get_lose','=','得']
            ])->wherein('bat_number',$value)->count();
            $lose_a=Game_data::where([
                ['mess_id','=',$mess_id],['user_id','=',$user_a],['get_lose','=','失']
            ])->wherein('bat_number',$value)->count();
            $get_b=Game_data::where([
                ['mess_id','=',$mess_id],['user_id','=',$user_b],['get_lose','=','得']
            ])->wherein('bat_number',$value)->count();
            $lose_b=Game_data::where([
                ['mess_id','=',$mess_id],['user_id','=',$user_b],['get_lose','=','失']
            ])->wherein('bat_number',$value)->count();
            $count[]=[
                "get_a"=>$get_a,"lose_a"=>$lose_a,"means"=>$key,"get_b"=>$get_b,'lose_b'=>$lose_b
            ];
       }
       //获取字段为plate数组的数据
       foreach ($plate as $key => $value) {
        $get_a=Game_data::where([
            ['mess_id','=',$mess_id],['user_id','=',$user_a],['bat_number','=',$value],['get_lose','=','得']
        ])->count();
        $lose_a=Game_data::where([
            ['mess_id','=',$mess_id],['user_id','=',$user_a],['bat_number','=',$value],['get_lose','=','失']
        ])->count();
        $get_b=Game_data::where([
            ['mess_id','=',$mess_id],['user_id','=',$user_b],['bat_number','=',$value],['get_lose','=','得']
        ])->count();
        $lose_b=Game_data::where([
            ['mess_id','=',$mess_id],['user_id','=',$user_b],['bat_number','=',$value],['get_lose','=','失']
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
            ['mess_id','=',$mess_id],['user_id','=',$user_a],['class','=',1]
        ])->get()->toArray();
        $data_b=Game_data::where([
            ['mess_id','=',$mess_id],['user_id','=',$user_b],['class','=',1]
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
        return view('home.index.list',compact('count','pldata','user_aname','user_bname','max_a','max_b','Scoring','sum_a','sum_b','keycount','mess_id','L_pack'));
    }
    public function find(){
        $class =Input::get('class');
        $mess_id=Input::get('mess_id');
        $user_a=Message::where('id',$mess_id)->get()->first()->user_a;
        $user_b=Message::where('id',$mess_id)->get()->first()->user_b;
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
            ['mess_id','=',$mess_id],['user_id','=',$user_a],['class','=',$class]
        ])->get()->toArray();
        $data_b=Game_data::where([
            ['mess_id','=',$mess_id],['user_id','=',$user_b],['class','=',$class]
        ])->get()->toArray();
        if($data_a!=[]){
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
            $final=[
                $sum_a,
                $sum_b,
                $keycount
            ];
        }else{
            $final=["此局无数据"];
        }
       
        // dump($sum_a);
        // dump($sum_b);
        // dump($keycount);
        // die;
      
        return response()->json($final);
    }
}
