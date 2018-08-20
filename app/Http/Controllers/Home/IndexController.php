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
        }
        //         dump(count($result));
        //         dump($result);
        //         // dump($result2);
        //         die;
        return view('home.index.index',compact('result'));
    }


    public function search(){
        $data = Input::all()['key'];      
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
            // dump($sql);
            // die;
            $result = Index::whereRaw($sql)->get()->toArray();
            // dump($result);
            // die;
            return  ['code'=>0,'msg'=>'','data'=>$result];
            // return view('home.index.index',compact('result'));
        }
        
    }
}
