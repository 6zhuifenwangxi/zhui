<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use App\Model\Message;
use Excel;
use App\MOdel\Game_data;
class ExcelController extends Controller
{
    //
    public function index(){
            $game =Message::get();
            $name =DB::table('user')->get();
            return view('admin.excel.index',compact('name','game'));
    }
    public function template(){
        if(Input::method()=="GET"){
            $cellData =[
            ['局数','得分','失分','发接轮次','拍数','手段','得失分']
        ];
        Excel::create('比赛数据模板',function($excel) use ($cellData){
            $excel->sheet('数据',function($sheet) use($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
        }else{
            $post =Input::all();
            $filePath ='.'.$post['excelpath'];
            Excel::load($filePath,function($reader) use($post){
                $data =$reader->getSheet(0)->toArray();
                $arr =[];
               foreach($data as $key =>$value){
                   if($key==0){
                       continue;
                   }
                   $arr[] =[
                       'user_id' => $post['user_id'],
                       'mess_id' => $post['message_id'],
                       'class'   => $value[0],
                       'score_first' => $value[1],
                       'send'  => $value[3],
                       'bat_number' => $value[4],
                       'tool' => $value[5],
                       'get_lose' => $value[6],
                       'score_last' => $value[2]
                   ];
               }
               if(Game_data::insert($arr)){
                    $response ='0';
                }else{
                    $response ='1';
                }
                echo $response;
            });
        }
    }
}
