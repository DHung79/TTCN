<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giangvien extends Model
{
    protected $table = "giangvien";

    public function user(){
        return $this->belongsTo('App\User','idUser','id');
    }
    public function bomon(){
        return $this->belongsTo('App\bomon','idbomon','id');
    }
    public function diem(){
        return $this-> hasMany('App\diem','idgv','id');
    }
}


