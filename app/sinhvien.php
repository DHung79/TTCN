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
    public function detai(){
        return $this->hasMany('App\detai','idsinhvien','id');
    }
    public function gvhd()
    {
        return $this->hasMany('App\gvhd','idsinhvien','id');
    }
}
