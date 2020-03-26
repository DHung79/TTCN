<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;
use App\Repositories\UserRepository;
use Session;
use Auth;
use App\User;
use App\giangvien;
use App\sinhvien;
use App\lop;

class homeController extends sharecontroller
{
    function __construct() { 
        view::share('stt','1');
        $user = user::get();
        view::share('user',$user);

        // $this->middleware('auth')->except('logout');
        // if(auth::check()){
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
    public function gethome(){
        return view('pages.home');
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
