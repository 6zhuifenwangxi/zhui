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
        $user=Message::where('id',$id)->get()->toArray();
        $user_a=$user[0]['user_a'];
        $data =Game_data::where([['mess_id','=',$id],['user_id','=',$user_a]])->get()->toArray();
        if($data ==[]){
            echo "没有数据";
            die();
        }
        $arr =array();
        $arr1 =array();
        $arr2 =array();
        $arr3 =array();
        $arr4 =array();
        $arr5 =array();
        $arr6 =array();
       foreach ($data as $key => $value) {
           if($value['class'] ==1){
               $arr[] =$value;
           }
           if($value['class'] ==2){
            $arr1[] =$value;
        }
            if($value['class'] ==3){
                $arr2[] =$value;
            }
            if($value['class'] ==4){
                $arr3[] =$value;
            }
            if($value['class'] ==5){
                $arr4[] =$value;
            }
            if($value['class'] ==6){
                $arr5[] =$value;
            }
            if($value['class'] ==7){
                $arr6[] =$value;
            }
       }
       $count =0;
       $count_lose=0;
       if($arr !=[]){
            if($arr[count($arr)-1]['get_lose'] =="得"){
                $de =$arr[count($arr)-1]['score_first']+1;
                $shi =$arr[count($arr)-1]['score_last'];
                $small =$de."—".$shi.",";
                $count++;
        }else if($arr[count($arr)-1]['get_lose'] =="失"){
                $de =$arr[count($arr)-1]['score_first'];
                $shi =$arr[count($arr)-1]['score_last']+1;
                $small =$de."—".$shi.",";
                $count_lose--;
        }
       }
       if($arr1 !=[]){
            if($arr1[count($arr1)-1]['get_lose'] =="得"){
                    $de =$arr1[count($arr1)-1]['score_first']+1;
                    $shi =$arr1[count($arr1)-1]['score_last'];
                    $small .=$de."—".$shi.",";
                    $count++;
            }else if($arr1[count($arr1)-1]['get_lose'] =="失"){
                    $de =$arr1[count($arr1)-1]['score_first'];
                    $shi =$arr1[count($arr1)-1]['score_last']+1;
                    $small .=$de."—".$shi.",";
                    $count_lose--;
            }
       }
       if($arr2 !=[]){
            if($arr2[count($arr2)-1]['get_lose'] =="得"){
                    $de =$arr2[count($arr2)-1]['score_first']+1;
                    $shi =$arr2[count($arr2)-1]['score_last'];
                    $small .=$de."—".$shi.",";
                    $count++;
            }else if($arr2[count($arr2)-1]['get_lose'] =="失"){
                    $de =$arr2[count($arr2)-1]['score_first'];
                    $shi =$arr2[count($arr2)-1]['score_last']+1;
                    $small .=$de."—".$shi.",";
                    $count_lose--;
            }
       }
         if($arr3 !=[]){
                if($arr3[count($arr3)-1]['get_lose'] =="得"){
                    $de =$arr3[count($arr3)-1]['score_first']+1;
                    $shi =$arr3[count($arr3)-1]['score_last'];
                    $small .=$de."—".$shi.",";
                    $count++;
            }else if($arr3[count($arr3)-1]['get_lose'] =="失"){
                    $de =$arr3[count($arr3)-1]['score_first'];
                    $shi =$arr3[count($arr3)-1]['score_last']+1;
                    $small .=$de."—".$shi.",";
                    $count_lose--;
            }
         }
        if($arr4 !=[]){
                if($arr4[count($arr4)-1]['get_lose'] =="得"){
                    $de =$arr4[count($arr4)-1]['score_first']+1;
                    $shi =$arr4[count($arr4)-1]['score_last'];
                    $small .=$de."—".$shi.",";
                    $count++;
            }else if($arr4[count($arr4)-1]['get_lose'] =="失"){
                    $de =$arr4[count($arr4)-1]['score_first'];
                    $shi =$arr4[count($arr4)-1]['score_last']+1;
                    $small .=$de."—".$shi.",";
                    $count_lose--;
            }
        }
        if($arr5 !=[]){
                if($arr5[count($arr5)-1]['get_lose'] =="得"){
                    $de =$arr5[count($arr5)-1]['score_first']+1;
                    $shi =$arr5[count($arr5)-1]['score_last'];
                    $small .=$de."—".$shi.",";
                    $count++;
            }else if($arr5[count($arr5)-1]['get_lose'] =="失"){
                    $de =$arr5[count($arr5)-1]['score_first'];
                    $shi =$arr5[count($arr5)-1]['score_last']+1;
                    $small .=$de."—".$shi.",";
                    $count_lose--;
            }
        }
        if($arr6 !=[]){
                if($arr6[count($arr6)-1]['get_lose'] =="得"){
                    $de =$arr6[count($arr6)-1]['score_first']+1;
                    $shi =$arr6[count($arr6)-1]['score_last'];
                    $small .=$de."—".$shi.",";
                    $count++;
            }else if($arr6[count($arr6)-1]['get_lose'] =="失"){
                    $de =$arr6[count($arr6)-1]['score_first'];
                    $shi =$arr6[count($arr6)-1]['score_last']+1;
                    $small .=$de."—".$shi.",";
                    $count_lose--;
            }
        }
        $count_sum=$count.'—'.$count_lose;
        $small=rtrim($small,',');
        $data =array('mess_id'=>$id,'big'=>$count_sum,'small'=>$small);
        if(Count_score::insert($data)){
            echo '0';
            die();
        }else{
            echo '1';
            die();
        }
    }
}
