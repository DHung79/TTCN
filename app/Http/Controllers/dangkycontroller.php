<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Session;
use App\User;
use App\giangvien;
use App\bangcaps;
use App\sinhvien;
use App\khoa;
use App\lop;
use app\detai;

class dangkycontroller extends Controller
{
    function __construct() { 
        $lop = lop::get();
        $giangvien = giangvien::get();
        $bangcap = bangcaps::get();
        $khoa = khoa::get();
        view::share('lop',$lop);
        view::share('giangvien',$giangvien);
        view::share('bangcap',$bangcap);
        view::share('khoa',$khoa);
    }
    public function getRegister(){
    	return view('dangky');
    }

    public function Register(Request $request){
        $this->validate($request,[
            'ho'=> 'required',
            'ten'=> 'required',
            'sodt'=>'numeric',
            'password'=> 'required|min:6|max:32',
            'email'=>'required|email|unique:users,email'
        ],[
            'ho.required'=>'Bạn chưa nhập họ',
            'ten.required'=>'Bạn chưa nhập tên',
            'sodt.numeric'=>'Số điện thoại phải là một dãy số',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min:6'=>'Mật khẩu phải chứa nhiều hơn 6 ký tự và ít hơn 32 ký tự',
            'password.max:32'=>'Mật khẩu phải chứa nhiều hơn 6 ký tự và ít hơn 32 ký tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email của bạn đã có người đăng ký'
        ]);
        $user = new User;
        $user->password = bcrypt($request->password);
        $user->email= $request->email;
        $user->level= 3;
        $user->save();
        $sv = new sinhvien;
        $sv->idusers = $user->id;
        $sv->idlop = $request->lop;
        $sv->ho = $request->ho;
        $sv->ten = $request->ten;
        $sv->gioitinh = $request->giotinh;
        $sv->ngaysinh = $request->ngaysinh;
        $sv->quequan = $request->quequan;
        $sv->diachi = $request->diachi;
        $sv->sodt = $request->sodt;
        $sv->save();
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            return redirect('admin');
        }else {
            return redirect()->back()->with('status', 'Xãy ra lỗi trong quá trình đăng ký');
        }
    }

    public function getaddadmin(){
    	return view('addadmin');
    }

    public function addadmin(Request $request){
        $this->validate($request,[
            'magv'=>'required',
            'ho'=> 'required',
            'ten'=> 'required',
            'password'=> 'required|min:6|max:32',
            'email'=>'required|email|unique:users,email',
            // 'level'=>'required'
        ],[
            'magv.required'=>'Chưa nhập mã giảng viên',
            'ho.required'=>'Bạn chưa nhập họ',
            'ten.required'=>'Bạn chưa nhập tên',
            'password.required'=>'Chưa nhập mật khẩu',
            'password.min:6'=>'Mật khẩu phải chứa nhiều hơn 6 ký tự và ít hơn 32 ký tự',
            'password.max:32'=>'Mật khẩu phải chứa nhiều hơn 6 ký tự và ít hơn 32 ký tự',
            'email.required'=>'Chưa nhập email',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã có người đăng ký',
            // 'idkhoa.required'=>'Chưa chọn khoa ',
            // 'level.required'=>'Chưa chọn cấp'
        ]);
        $user = new User;
        $user->password = bcrypt($request->password);
        $user->email= $request->email;
        $user->level= 2;
        $user->save();
        $gv = new giangvien;
        $gv->ho = $request->ho;
        $gv->ten = $request->ten;
        $gv->idusers = $user->id;
        $gv->gioitinh = $request->giotinh;
        $gv->idkhoa = $request->khoa;
        $gv->idcap = $request->cap;
        $gv->ngaysinh = $request->ngaysinh;
        $gv->quequan = $request->quequan;
        $gv->diachi = $request->diachi;
        $gv->sodt = $request->sodt;
        $gv->save();
        if(isset($magv)){
            if(Auth::attempt(['email'=>$email,'password'=>$password])){
                return redirect('admin');
            }else {
                return redirect()->back()->with('status', 'Xãy ra lỗi trong quá trình đăng ký');
            }
        }else{
            return redirect()->back()->with('status', 'Mã giảng viên không chính xác');
        }
    }
    public function defaultdata(){
        user::insert([ 
            ['email' => 'daoleduyhung@gmail.com','level'=>1,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenvanhoan@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'lungthilinh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')]
        ]);
        bangcaps::insert([
            ['tencap' => 'Thạc sĩ'],
            ['tencap' => 'Tiến sĩ']
        ]);
        khoa::insert([
            ['tenkhoa' => 'CNTT'],
            ['tenkhoa' => 'ĐTVT']
        ]);
        lop::insert([
            ['tenlop' => 'ĐHCN3A','idkhoa'=>1],
            ['tenlop' => 'ĐHCN3B','idkhoa'=>1],
            ['tenlop' => 'ĐHCN3C','idkhoa'=>1],
            ['tenlop' => 'ĐHVT3A','idkhoa'=>2],
            ['tenlop' => 'ĐHVT3B','idkhoa'=>2],
            ['tenlop' => 'ĐHVT3C','idkhoa'=>2]
        ]);
    }
}
