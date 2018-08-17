<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Count_score;
class AchievementController extends Controller
{
    //
    public function index(){
        $date =Count_score::get();
        return view('admin.achievement.index',compact('date'));
    }
}
