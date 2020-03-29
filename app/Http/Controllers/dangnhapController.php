<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
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


class dangnhapController extends Controller
{
    function __construct() { 
        view::share('stt','1');
        $user = user::get();
        view::share('user',$user);
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
    function getadmin() {
        return view('admin');
    }

    public function getLogin(){
        return view('dangnhap');
    }

    public function login(Request $request){
        $this->validate($request,[
        'email' =>'required',
        'password' => 'required|min:6'
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu chứa ít nhất 6 ký tự',
        ]);
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            return redirect('home')->with('status', 'đăng nhập thành công');
        }else {
            return redirect()->back()->with('status', 'email hoặc password không chính xác');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('home');
    }

    public function infor(){
        if(Auth::check())
        {
            return view('pages.inforuser');
        }
    }
}




