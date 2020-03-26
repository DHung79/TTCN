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
use App\bangcaps;
use App\sinhvien;
use App\khoa;
use App\lop;
use App\detai;
class homeController extends sharecontroller
{
    function __construct() { 
        view::share('stt','1');
        $detai = detai::get();
        $user = user::get();
        $danhsachdt = detai::join('sinhvien','sinhvien.id','detais.idsinhvien')
        ->where('daduyet','1')->where('thamkhao','0')->get();
        $thamkhao = detai::join('sinhvien','sinhvien.id', 'detais.idsinhvien')
        ->where('daduyet','1')->where('thamkhao','1')->get();
        $duyet = sinhvien::join('detais','detais.idsinhvien', 'sinhvien.id')
        ->where('daduyet','0')->get();
        $capgv = giangvien::join('bangcaps','giangvien.idcap', 'bangcaps.id')
        ->get();
        view::share('detai',$detai);
        view::share('user',$user);
        view::share('danhsachdt',$danhsachdt);
        view::share('thamkhao',$thamkhao);
        view::share('duyet',$duyet);
        view::share('capgv',$capgv);
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
            $dkdt = detai::join('sinhvien','sinhvien.id', 'detais.idsinhvien')
            ->where('idusers',$id)->get();
            view::share('dkdt',$dkdt); 
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
