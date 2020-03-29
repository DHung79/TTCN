<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;
use App\Repositories\UserRepository;
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

class homeController extends sharecontroller
{
    function __construct() { 
        view::share('stt','1');
        $user = user::get();
        $menu = loaitin::where('menu','1')->get();
    	$gioithieu = loaitin::where('gioithieu','1')->firstOrFail();
		$menuGioiThieu = tintuc::where('idlt',$gioithieu->id)->get();
        view::share('user',$user);
        view::share('menu',$menu);
        view::share('gioithieu',$menuGioiThieu);
        $this->middleware(function ($request, $next) {
        $this->id = Auth::user();
        if($this->id!=null){
            $id = Auth::user()->id;
            $sinhvien = sinhvien::where('idusers',$id)->get();
            $giangvien = giangvien::where('idusers',$id)->get();    
            view::share('sinhvien',$sinhvien);
            view::share('giangvien',$giangvien);
            view::share('iduser',$id);
            return $next($request);
        }else{
            return $next($request);
        }
    });
    }
    public function getHome(){
        $slides = tintuc::where('slide','1')->orderBy('created_at','desc')->take(5)->get();
        $loaitin = loaitin::where('menu','1')->get();
        $thongbaochinh = tintuc::where('thongbaochinh','1')->orderBy('created_at','desc')->take(6)->get();
        $box = array();
        foreach($loaitin as $lt){
            $box[$lt->tenloaitin] = loaitin::find($lt->id)->tintuc->take(7);
        }
        return view('noidung.trangchu',['slides'=>$slides,'box'=>$box,'thongbaochinh'=>$thongbaochinh]);
    }
    //đề tài//
    public function alldt(){
        return view('pages.detai');
    }

    public function getdkdetai(){
        if(Auth::check())
        {   
            return view('pages.dangkydetai');
        }
        else{
            return redirect()->route('getlogin');
        }
    }

    public function dkdetai(Request $request){
        $this->validate($request,[
            'tendt'=> 'required'
        ],[
            'tendt.required'=>'Bạn chưa nhập tên đề tài'
        ]);
        $detai = new detai;
        $detai->idsinhvien = $request->idsinhvien;
        $detai->tendetai = $request->tendt;
        $detai->mota = $request->mota;
        $detai->daduyet = 0;
        $detai->thamkhao = 0;
        $detai->save();
        return redirect()->route('getdkdetai')->with('status',"Đăng ký đề tài thành công");
    }
    public function getduyetdt(){
        return view('pages.duyetdetai');
    }
    public function duyetdt(Request $request){
        $iddetai = $request->iddetai;
        $svdt = $request->svdt;
        $this->validate($request,[]);
        $duyetdt = detai::where('id',$iddetai);
        if ($request->duyet == 'duyet'){
            $daduyet = $duyetdt->update(['daduyet'=>1]);
            if($daduyet){
                return redirect()->route('getduyetdt')
                ->with('status',"Đã duyệt đề tài của sinh viên $svdt");
            }
            else{
            return redirect()->route('getduyetdt')
            ->with('status',"Duyệt thất bại");
            } 
        }
        if ($request->xoa == 'xoa'){
            $xoadt = $duyetdt->delete();
            if($xoadt){
                return redirect()->route('getduyetdt')
                ->with('status',"Đã xóa đề tài của sinh viên $svdt");
            }
            else{
            return redirect()->route('getduyetdt')
            ->with('status',"Xóa thất bại");
            }
        }
    }
    public function thamkhao(){
        return view('pages.thamkhao');
    }
}
