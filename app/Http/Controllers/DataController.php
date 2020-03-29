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


class DataController extends Controller
{
    public function defaultdata(){
        user::insert([ 
            ['email' => 'daoleduyhung@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenvanhoan@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'lungthilinh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')]
        ]);
        user::insert([ 
        ['id'=>0,'email' => 'admin','level'=>1,'password'=> bcrypt('hung0403')]
        ]);
        loaitin::insert([ 
            ['tenloaitin' => 'Sự kiện','tenkhongdau'=>'SuKien','menu'=>1,'gioithieu'=>1],
            ['tenloaitin' => 'Khóa học','tenkhongdau'=>'KhoaHoc','menu'=>1,'gioithieu'=>1],
            ['tenloaitin' => 'Lịch biểu','tenkhongdau'=>'LichBieu','menu'=>1,'gioithieu'=>1],
            ['tenloaitin' => 'Bảng điểm','tenkhongdau'=>'BangDiem','menu'=>1,'gioithieu'=>1],
            ['tenloaitin' => 'Tài liệu','tenkhongdau'=>'TaiLieu','menu'=>1,'gioithieu'=>1]
        ]);
        tintuc::insert([ 
            ['tentin' => 'Mùa Hè Xanh','nd'=>'Mùa Hè Xanh','tomtat'=>'Mùa Hè Xanh','slide'=>1,'thongbaochinh'=>1,'idlt'=>1],
            ['tentin' => 'Lập trình C#','nd'=>'Lập trình C#','tomtat'=>'Lập trình C#','slide'=>1,'thongbaochinh'=>1,'idlt'=>2],
            ['tentin' => 'Luận văn tốt nghiệp DHCN3','nd'=>'Luận văn tốt nghiệp DHCN3','tomtat'=>'Luận văn tốt nghiệp DHCN3','slide'=>1,'thongbaochinh'=>1,'idlt'=>3],
            ['tentin' => 'Điểm HK1 DHCN3','nd'=>'Điểm HK1 DHCN3','tomtat'=>'Điểm HK1 DHCN3','slide'=>1,'thongbaochinh'=>1,'idlt'=>4],
            ['tentin' => 'Bài giảng lập trình PHP','nd'=>'Bài giảng lập trình PHP','tomtat'=>'Bài giảng lập trình PHP','slide'=>1,'thongbaochinh'=>1,'idlt'=>5]
        ]);
        lop::insert([
            ['tenlop' => 'ĐHCN3A'],
            ['tenlop' => 'ĐHCN3B'],
            ['tenlop' => 'ĐHCN4A'],
            ['tenlop' => 'ĐHCN4B'],
            ['tenlop' => 'ĐHVT3A'],
            ['tenlop' => 'ĐHVT3B'],
            ['tenlop' => 'ĐHVT4A'],
            ['tenlop' => 'ĐHVT4B']
        ]);
        sinhvien::insert([ 
            ['ho' => 'Lung','ten'=>'Thị Linh','idusers'=> 3,'idlop' => 2],
            ['ho' => 'Đào Lê','ten'=>'Duy Hùng','idusers'=> 1,'idlop' => 1]
        ]);
        giangvien::insert([ 
            ['ho' => 'Nguyễn','ten'=>'Văn Hoàn','idusers'=> 2]
        ]);
        
    }
}
