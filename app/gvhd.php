<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gvhd extends Model
{
    public function giangvien(){
        return $this->belongsTo('App\giangvien','idgiangvien','id');
    }

    public function sinhvien(){
        return $this->belongsTo('App\sinhvien','idsinhvien','id');
    }
}
