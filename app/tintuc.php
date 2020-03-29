<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tintuc extends Model
{
    protected $table = 'tintucs';
    public function loaitin(){
        return $this->belongsTo('App\loaitin','idlt','id');
    }
}
