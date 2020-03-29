<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Session;
use Auth;
use App\bomon;
use App\diem;
use App\giangvien;
use App\loaitin;
use App\lop;
use App\monhoc;
use App\sinhvien;
use App\tintuc;
use App\User;


class sharecontroller extends Controller
{
    function __construct()
    {
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
