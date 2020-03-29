<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
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

class dangnhapController extends Controller
{
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
            return redirect('admin')->with('email',$email)->with('password',$password);
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
            $id = Auth::user()->id;
            $sinhvien = sinhvien::where('idusers',$id)->get();
            $giangvien = giangvien::where('idusers',$id)->get();
            view()->share('id',$id);
            view()->share('sinhvien',$sinhvien);
            view()->share('giangvien',$giangvien);
        }
        return view('pages.inforuser');
    }
}




