<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sinhvien extends Model
{
    protected $table = "sinhvien";

    public function lop(){
        return $this->belongsTo('App\lop','idlop','id');
    }

    public function user(){
        return $this->belongsTo('App\User','idUser','id');
    }
    public function diem(){
        return $this-> hasMany('App\diem','idsv','id');
    }
}
