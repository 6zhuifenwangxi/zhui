<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\home\Index;
use App\Model\Count_score;
use DB;
use Input;

class IndexController extends Controller
{
    public function index(){
        // $result = DB::table('message')
        //             ->join('count_score','message.id',"=",'count_score.mess_id')
        //             ->join('user','message.user_a',"=",'user.id')
        //             ->get()->toArray();
        // $result2 = DB::table('message')
        //             ->join('count_score','message.id',"=",'count_score.mess_id')
        //             ->join('user','message.user_b',"=",'user.id')
        //             ->get()->toArray();
        // for($i = 0; $i<count($result); $i++){
        //     $result[$i]->user_name_b = $result2[$i]->user_name;
        // }
        //         dump(count($result));
        //         dump($result);
        //         // dump($result2);
        //         die;
        // $result3 = json_encode(['code'=>0,'msg'=>'','data'=>$result]);
        return view('home.index.index');
    }


    public function search(){
        if(count(Input::all()) <= 2){
            $result = DB::table('message')
                ->join('count_score','message.id',"=",'count_score.mess_id')
                ->join('user','message.user_a',"=",'user.id')
                ->get()->toArray();
            $result2 = DB::table('message')
                ->join('count_score','message.id',"=",'count_score.mess_id')
                ->join('user','message.user_b',"=",'user.id')
                ->get()->toArray();
            for($i = 0; $i<count($result); $i++){
                $result[$i]->user_name_b = $result2[$i]->user_name;
                $result[$i]->id = $result[$i]->mess_id;
            }
            // dump($result);
            // die;
            return ['code'=>0,'msg'=>'','data'=>$result];
        }
        $data = Input::all()['key'];
        // dump($data);
        // die;     
        $a = ['game_date','game_name','city','user_id','user_id2','hand','play','bat','game_stage','game_project'];
        for($i = 0; $i<=9; $i++){
            if($data[$a[$i]] == null){
                unset($data[$a[$i]]);
                unset($a[$i]);
            }
        }
        if(count($data) != 0){
            $sql = "";
            for($j = 0; $j<count($data); $j++){
                $sql .= $a[$j] ." = '". $data[$a[$j]]."' and ";
            }
            $sql = rtrim($sql,' and ');
            $result3 = Index::whereRaw($sql)->get()->toArray();
            $score = DB::table('count_score')->get()->toArray();
            $arrMess_id = [];
           
            for($j = 0; $j<count($score); $j++){
                $arrMess_id[$j] = $score[$j]->mess_id;
            }
            if(in_array($result3[0]['id'],$arrMess_id)){
                $big = DB::table('count_score') -> where('mess_id', "=", $result3[0]['id'])->get()[0]->big;
                $small = DB::table('count_score') -> where('mess_id', "=", $result3[0]['id'])->get()[0]->small;;
                $user_a = DB::table('user')->where("id","=",$result3[0]['user_a'])->get()[0]->user_name;
                $user_b = DB::table('user')->where("id","=",$result3[0]['user_b'])->get()[0]->user_name;
                $result3[0]['user_a'] = $user_a;
                $result3[0]['user_b'] = $user_b;
                $result3[0]['big'] = $big;
                $result3[0]['small'] = $small;
            }
            // dump($result3[0]);
            // die;
            return  ['code'=>0,'msg'=>'','data'=>$result3];
           
        }else{
            return ['code'=>0,'msg'=>'没有相关数据','data'=>""];
        }
        
    }
}
