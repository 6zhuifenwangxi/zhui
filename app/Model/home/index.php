<?php

namespace App\Model\home;

use Illuminate\Database\Eloquent\Model;
use App\Model\Count_score;
use App\Model\User;

class Index extends Model
{
    protected $table ='message';
    public $timestamps =false;
    public function rel_a(){
        return $this->hasOne(User::class,'id','user_a');
    }
    public function rel_b(){
        return $this->hasOne(User::class,'id','user_b');
    }
    public function count_score(){
        return $this->hasOne(Count_score::class,'mess_id','id');
    }
}
