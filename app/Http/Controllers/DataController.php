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
            ['email' => 'lungthilinh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'tranducnam@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'phamninhdung@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'daotuthuan@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'lythibichlien@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'doquangminh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'lehoangbao@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'vomanhhung@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'caotrungthanh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'ngoanhtuan@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'phamngocthang@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'hongocha@gmail.com','level'=>3,'password'=> bcrypt('hung0403')]
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
            ['tieude' => 'Mùa Hè Xanh','tenkhongdau' => 'MuaHeXanh','noidung'=>'Mùa Hè Xanh','tomtat'=>'Mùa Hè Xanh','slide'=>1,'thongbaochinh'=>1,'video'=>'https://www.youtube.com/embed/FlvEyTgYQiM','img'=>'/img/1d2be58a6860c8692963c1b73c797f4743f507c0_00.gif','idlt'=>1],
            ['tieude' => 'Lập trình C#','tenkhongdau' => 'LapTrinhCSap','noidung'=>'Lập trình C#','tomtat'=>'Lập trình C#','slide'=>1,'thongbaochinh'=>1,'video'=>'https://www.youtube.com/embed/9kohr6pMwag','img'=>'/img/tenor (5).gif','idlt'=>2],
            ['tieude' => 'Luận văn tốt nghiệp DHCN3','tenkhongdau' => 'LuanVanTotNghiepDHCN3','noidung'=>'Luận văn tốt nghiệp DHCN3','tomtat'=>'Luận văn tốt nghiệp DHCN3','slide'=>1,'video'=>'https://www.youtube.com/embed/MPVLdZCkPlA','img'=>'/img/44118c6abe55f6909633380d14a5ef1d05089861_hq.gif','thongbaochinh'=>1,'idlt'=>3],
            ['tieude' => 'Điểm HK1 DHCN3','tenkhongdau' => 'DiemHK1DHCN3','noidung'=>'Điểm HK1 DHCN3','tomtat'=>'Điểm HK1 DHCN3','slide'=>1,'thongbaochinh'=>1,'video'=>'https://www.youtube.com/embed/IyvgDtkHaYo','img'=>'/img/source (7).gif','idlt'=>4],
            ['tieude' => 'Bài giảng lập trình PHP','tenkhongdau' => 'BaiGiangLapTrinhPHP','noidung'=>'Bài giảng lập trình PHP','tomtat'=>'Bài giảng lập trình PHP','slide'=>1,'thongbaochinh'=>1,'video'=>'https://www.youtube.com/embed/qusmHT5vNuw','img'=>'/img/source (6).gif','idlt'=>5]
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
            ['ho' => 'Lung','ten'=>'Thị Linh','idusers'=> 3,'idlop' => 1],
            ['ho' => 'Đào Lê','ten'=>'Duy Hùng','idusers'=> 1,'idlop' => 1],
            ['ho' => 'Trần','ten'=>'Đức Nam','idusers'=> 4,'idlop' => 1],
            ['ho' => 'Phạm','ten'=>'Ninh Dung','idusers'=> 5,'idlop' => 2],
            ['ho' => 'Đào','ten'=>'Tứ Thuận','idusers'=> 6,'idlop' => 2],
            ['ho' => 'Lý Thị','ten'=>'Bích Liên','idusers'=> 7,'idlop' => 3],
            ['ho' => 'Đỗ','ten'=>'Quang Minh','idusers'=> 8,'idlop' => 3],
            ['ho' => 'Lê','ten'=>'Hoàng Bảo','idusers'=> 9,'idlop' => 4],
            ['ho' => 'Võ','ten'=>'Mạnh Hùng','idusers'=> 10,'idlop' => 4],
            ['ho' => 'Cao','ten'=>'Trung Thành','idusers'=> 11,'idlop' => 5],
            ['ho' => 'Ngô','ten'=>'Anh Tuấn','idusers'=> 12,'idlop' => 5],
            ['ho' => 'Phạm','ten'=>'Ngọc Thắng','idusers'=> 13,'idlop' => 6],
            ['ho' => 'Hồ','ten'=>'Ngọc Hà','idusers'=> 14,'idlop' => 6]
        ]);
        giangvien::insert([ 
            ['ho' => 'Nguyễn','ten'=>'Văn Hoàn','idusers'=> 2]
        ]);
        
    }
}
