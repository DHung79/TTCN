<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bomon extends Model
{
    protected $table = "bomons";

    public function monhoc(){
        return $this-> hasMany('App\monhoc','idbomon','id');
    }
    public function giangvien(){
        return $this-> hasMany('App\giangvien','idbomon','id');
    }
}
