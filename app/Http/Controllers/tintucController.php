<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tintuc;
use App\loaitin;
use Illuminate\Support\Str;

class tintucController extends Controller
{
    public function getList(){
    	$tintuc = tintuc::join('loaitin','tintuc.idLoaiTin','loaitin.id')
    			->orderBy('created_at','desc')
    			->select('tintuc.id','tintuc.tieude','tintuc.img','tintuc.tenkhongdau','tintuc.slide','loaitin.tenloaitin','tintuc.created_at','tintuc.thongbaochinh')->get();
    	return view('admin.tintuc.list',['tintuc'=>$tintuc]);
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
    	$tintuc->idLoaiTin = $request->loaitin;
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
    	$tintuc->idLoaiTin = $request->loaitin;
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
        $tintuc = tintuc::where('idLoaiTin',$id)->orderBy('created_at','desc')->paginate(10);
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
}
