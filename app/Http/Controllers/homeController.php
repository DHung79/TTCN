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
use Illuminate\Support\Str;

class homeController extends sharecontroller
{
    function __construct() { 
        view::share('stt','1');
        $user = user::get();
        $menu = loaitin::where('menu','1')->get();
        $gioithieu = loaitin::where('gioithieu','1')->firstOrFail();
        $menuGioiThieu = tintuc::where('idlt',$gioithieu->id)->get();
        $gtlist = loaitin::join('tintucs','loaitins.id','tintucs.idlt')->where('gioithieu','1')->get();
        $loaitin = loaitin::all();
        $tintuc = tintuc::join('loaitins','tintucs.idlt','loaitins.id')
        ->orderBy('created_at','desc')
        ->select('tintucs.id','tintucs.tieude','tintucs.img','loaitins.tenkhongdau','tintucs.slide','loaitins.tenloaitin','tintucs.created_at','tintucs.thongbaochinh')->get();
        view::share('tintuc',$tintuc);
        view::share('gtlist',$gtlist);
        view::share('loaitin',$loaitin);
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

    //tintuc
    public function getListtintuc(){
        return view('admin.tintuc.list');
    }

    public function showAdd(){
        $loaitin = loaitin::all();
        return view('admin.tintuc.add',['loaitin'=>$loaitin]);
    }

    public function addTin(Request $request){
        $this->validate($request,[
            'tieude'=>'required|min:5',
            'upload'=>'required',
            'tomtat'=>'required|min:5',
            'loaitin'=>'required',
            'noidung'=>'required'
        ],[
            'tieude.required'=>'Chưa Nhập Tiêu Đề',
            'tieude.min'=>'Tiêu Đề Cần Tối Thiểu 5 Ký Tự',
            'upload.required'=>'Chưa Chọn Hình Ảnh',
            'tomtat.required'=>'Chưa Nhập Tóm Tắt',
            'loaitin.required'=>'Chưa Chọn Loại Tin',
            'noidung.required'=>'Chưa Nhập Nội Dung'
        ]);
        $tintuc = new tintuc;
        $tintuc->tieude = $request->tieude;
        $tintuc->tenkhongdau = strtolower(convert_vi_to_en($request->tieude));
        $tintuc->tomtat = $request->tomtat;
        $tintuc->idlt = $request->loaitin;
        $tintuc->slide = 0;
        $tintuc->thongbaochinh = 0;
        $name = Str::random(10);
        $file = $request->file('upload');
        $file->move('img',$name.'.png');
        $tintuc->img = 'img/'.$name.'.png';
        $tintuc->noidung = $request->noidung;
        $tintuc->save();
        return redirect()->route('tintuc')->with('thongbao','Đã thêm thành công.');
    }

    public function showEdit($id){
        $tintuc = tintuc::find($id);
        $loaitin = loaitin::all();
        return view('admin.tintuc.edit',['tintuc'=>$tintuc,'loaitin'=>$loaitin]);
    }

    public function editTin(Request $request){
        $this->validate($request,[
            'tieude'=>'required|min:5',
            'tomtat'=>'required|min:5',
            'loaitin'=>'required',
            'noidung'=>'required'
        ],[
            'tieude.required'=>'Chưa Nhập Tiêu Đề',
            'tieude.min'=>'Tiêu Đề Cần Tối Thiểu 5 Ký Tự',
            'tomtat.required'=>'Chưa Nhập Tóm Tắt',
            'loaitin.required'=>'Chưa Chọn Loại Tin',
            'noidung.required'=>'Chưa Nhập Nội Dung'
        ]);
        $tintuc = tintuc::find($request->id);
        $tintuc->tieude = $request->tieude;
        $tintuc->tenkhongdau = strtolower(convert_vi_to_en($request->tieude));
        $tintuc->tomtat = $request->tomtat;
        $tintuc->idlt = $request->loaitin;
        if(isset($request->upload)){
            $name = Str::random(10);
            $file = $request->file('upload');
            $file->move('img',$name.'.png');
            $tintuc->img = 'img/'.$name.'.png';
        }
        $tintuc->noidung = $request->noidung;
        $tintuc->save();
        return redirect()->route('tintuc')->with('thongbao','Đã thêm thành công.');
    }
    public function viewTin($tieude){
        $id = getid($tieude);
        $tintuc = tintuc::findOrFail($id);
        $thongbaochinh = tintuc::where('thongbaochinh','1')->orderBy('created_at','desc')->take(6)->get();
        return view('noidung.view',['tintuc'=>$tintuc,'thongbaochinh'=>$thongbaochinh]);
    }

    public function listNews($tieude){
        $id = getid($tieude);
        $loaitin = loaitin::findOrFail($id);
        $thongbaochinh = tintuc::where('thongbaochinh','1')->orderBy('created_at','desc')->take(6)->get();
        $tintuc = tintuc::where('idlt',$id)->orderBy('created_at','desc')->paginate(10);
        return view('noidung.listnews',['loaitin'=>$loaitin,'tintuc'=>$tintuc,'thongbaochinh'=>$thongbaochinh]);
    }

    public function changeSlide(Request $request){
        $tintuc = tintuc::find($request->id);
        $tintuc->slide = $request->slide;
        $tintuc->save();
    }

    public function changeThongBao(Request $request){
        $tintuc = tintuc::find($request->id);
        $tintuc->thongbaochinh = $request->thongbaochinh;
        $tintuc->save();
    }
    //loaitin
    public function getListloaitin(){
        return view('admin.loaitin.list');
    }

    public function addLoaiTin(Request $request){
        $this->validate($request,[
            'tenloaitin' => 'required|min:5|max:255'
        ],[
            'tenloaitin.required' => 'Bạn chưa nhập tên loại tin',
            'tenloaitin.min' => 'Tên loại tin có tối thiểu 5 ký tự',
            'tenloaitin.max' => 'Tên loại tin có tối đa 255 ký tự'
        ]);
        $loaitin = new loaitin;
        $loaitin->tenloaitin = $request->tenloaitin;
        $loaitin->tenkhongdau = convert_vi_to_en($request->tenloaitin);
        $loaitin->menu = 0;
        $loaitin->gioithieu = 0;
        $loaitin->save();
        return redirect()->route('loaitin')->with('thongbao','Đã thêm thành công.');
    }

    public function changeMenu(Request $request){
        $loaitin = loaitin::find($request->id);
        $loaitin->menu = $request->menu;
        $loaitin->save();
    }

    public function changeGioiThieu(Request $request){
        $loaitin = loaitin::find($request->id);
        $loaitin->gioithieu = $request->gioithieu;
        $loaitin->save();	
    }

    public function editLoaiTin(Request $request){
        $loaitin = loaitin::find($request->id);
        $loaitin->tenloaitin = $request->tenloaitin;
        $loaitin->tenkhongdau = convert_vi_to_en($request->tenloaitin);
        $loaitin->save();
        return redirect()->route('loaitin')->with('thongbao','Đã cập nhật thành công.');
    }
}
