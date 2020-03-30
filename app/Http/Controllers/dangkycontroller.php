<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Session;
use App\bomon;
use App\diem;
use App\giangvien;
use App\loaitin;
use App\lop;
use App\monhoc;
use App\sinhvien;
use App\tintuc;
use App\User;


class dangkycontroller extends Controller
{
    function __construct() { 
        $lop = lop::get();
        $giangvien = giangvien::get();
        view::share('lop',$lop);
        view::share('giangvien',$giangvien);
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
}
