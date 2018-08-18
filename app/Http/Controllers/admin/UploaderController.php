<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class UploaderController extends Controller
{
    //
    public function webuploader(Request $request){
        if($request->file('file')->isValid()&& $request->hasFile('file')){
            $filename =sha1(time().rand(100000,999999)).'.'.$request->file('file')->getClientOriginalExtension();
           $res= Storage::disk('public')->put($filename,file_get_contents($request->file('file')->path()));
           if($res){
               $result =['code'=>0,'msg'=>'上传成功','filepath'=>'/storage/'.$filename];
           }else{
               $result =['code'=>1,'msg'=>$request->file('file')->getErrorMessage()];
           }
        }else{
            $result =['code'=>2,'msg'=>'非法上传文件!'];
        }
        return response()->json($result);
    }
}
