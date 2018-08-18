<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $table ='message';
    public $timestamps =false;

    public function rel_a(){
        return $this->hasOne(User::class,'id','user_a');
    }
    public function rel_b(){
        return $this->hasOne(User::class,'id','user_b');
    }
}
