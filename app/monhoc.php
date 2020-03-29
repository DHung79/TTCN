<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class monhoc extends Model
{
    protected $table = "monhocs";

    public function bomon(){
        return $this->belongsTo('App\bomon','idbomon','id');
    }
    public function diem(){
        return $this-> hasMany('App\diem','idmonhoc','id');
    }
}
