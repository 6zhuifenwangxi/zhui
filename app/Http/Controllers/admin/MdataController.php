<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MdataController extends Controller
{
    //
    public function index(){
        return view('admin.Mdata.index');
    }
}
