<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detai extends Model
{
    public function sinhvien(){
        return $this->belongsTo('App\sinhvien','idsinhvien','id');
    }
}
