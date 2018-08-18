<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Count_score extends Model
{
    //
    protected $table ='count_score';
    public $timestamps =false;
    public function rel_id(){
        return $this->hasOne(Message::class,'id','mess_id');
    }
}
