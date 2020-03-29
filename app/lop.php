<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lop extends Model
{
    protected $table = "lop";

    public function sinhvien(){
        return $this-> hasMany('App\sinhvien','idlop','id');
    }
}
