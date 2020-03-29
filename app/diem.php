<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diem extends Model
{
    protected $table = "diems";

    public function giangvien(){
        return $this->belongsTo('App\giangvien','idgv','id');
    }
    public function monhoc(){
        return $this->belongsTo('App\monhoc','idmonhoc','id');
    }
    public function sinhvien(){
        return $this->belongsTo('App\sinhvien','idsv','id');
    }
}
