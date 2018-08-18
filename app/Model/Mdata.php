<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mdata extends Model
{
    protected $table = 'game_data';
    public $timestamps =false;
    public function rel(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function mes(){
        return $this->hasOne(Message::class,'id','mess_id');
    }
}
