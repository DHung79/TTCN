<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bangcaps extends Model
{
    public function giangvien()
    {
        return $this->hasMany('App\giangvien','idcap','id');
    }
}
