<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Session;
use Auth;
use App\User;
use App\giangvien;
use App\bangcaps;
use App\sinhvien;
use App\khoa;
use App\lop;
use App\detai;

class sharecontroller extends Controller
{
    function __construct()
    {
        $detai = detai::get();
        $capgv = giangvien::join('bangcaps','giangvien.idcap','=', 'bangcaps.id')->get();
        view()->share('detai',$detai);
        view()->share('capgv',$capgv);
        if(Auth::check())
        {
            $id = Auth::user()->id;
            $sinhvien = sinhvien::where('idusers',$id)->get();
            $giangvien = giangvien::where('idusers',$id)->get();
            view()->share('id',$id);
            view()->share('sinhvien',$sinhvien);
            view()->share('giangvien',$giangvien);
        }
    }
}
