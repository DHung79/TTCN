<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1 , height=device-height">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/register.css">
    </head>
    <body>
        <div class="box">
        <span class="text-center">Đăng ký</span>
        <div class="col">
            <p id="btnsv" class="formbtn" role="button">Sinhvien</p>
            <p id="btngv" class="formbtn" role="button">Giangvien</p>
        </div>
            <form id="dksv" method="POST" action="{{route('register')}}">
                @csrf
                @if(count($errors)>0)
                <center><span class="error-center">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                @endif
                @if(session('status'))
                    {{session('status')}}
                @endif</span></center>
                <div class="input-container">
                    <input class="ho" type='text' name='ho' placeholder='Họ'/>
                    <input class="space" type="text" disabled/>
                    <input class="ten" type='text' name='ten' placeholder='Tên'/>
                    <label></label>
                </div>
                <div class="input-container">
                    <input class="text" type='text' name='email' placeholder='Email'/>	
                    <label></label>  
                </div>
                <div class="input-container">
                    <input class="text" type='password' name='password' placeholder='Mật khẩu'/>	
                    <label></label>
                </div>
                <div class="input-container">
                    <label>Giới tính</label>  
                    <select class="gt" name='giotinh'>
                        <option value=""hidden>Giới tính</option>
                        <option value="1">Nam</option>
                        <option value="2">Nữ</option>
                        <option value="3">Khác</option>
                    </select>	
                </div>
                <div class="input-container">
                    <label>Ngày sinh</label>
                    <input class="date" type='date' name='ngaysinh'/>	
                </div>
                <div class="input-container">
                    <input class="text" type='text' name='diachi' placeholder='Địa chỉ'/>	
                    <label></label>
                </div>
                <div class="input-container">
                    <input class="text" type='text' name='quequan' placeholder='Quê quán'/>	
                    <label></label>
                </div>
                <div class="input-container">
                    <input class="text" type='tel' name='sodt' placeholder='Số điện thoại'/>	
                    <label></label>
                </div>
                <div class="input-container">
                    <label>Lớp</label>  
                    <select class="lop" name='lop'>
                        <option value=""hidden>Lớp</option>
                        @foreach($lop as $class)
                        <option value="{{$class->id}}">
                            {{$class->tenlop}}
                        </option>
                        @endforeach
                    </select>	
                </div>
                    <center><button type="submit" class="btn" name="dangky">Đăng ký</button></center>
            </form>
            <form id="dkgv" method="POST" action="{{route('addadmin')}}">
                @csrf
                {{-- <span class="text-center">Đăng ký</span> --}}
                @if(count($errors)>0)
                <span class="error-center">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                @endif
                @if(session('status'))
                    {{session('status')}}
                @endif</span>
                <div class="input-container">
                    <input class="text" type='text' name='magv' placeholder='Mã giảng viên'/>	
                    <label></label>  
                </div>
                <div class="input-container">
                    <input class="ho" type='text' name='ho' placeholder='Họ'/>
                    <input class="space" type="text" disabled/>
                    <input class="ten" type='text' name='ten' placeholder='Tên'/>
                    <label></label>
                </div>
                <div class="input-container">
                    <input class="text" type='text' name='email' placeholder='Email'/>	
                    <label></label>  
                </div>
                <div class="input-container">
                    <input class="text" type='password' name='password' placeholder='Mật khẩu'/>	
                    <label></label>
                </div>
                <div class="input-container">
                    <label>Giới tính</label>  
                    <select class="gt" name='giotinh'>
                        <option value=""hidden>Giới tính</option>
                        <option value="1">Nam</option>
                        <option value="2">Nữ</option>
                        <option value="3">Khác</option>
                    </select>	
                </div>
                <div class="input-container">
                    <label>Ngày sinh</label>
                    <input class="date" type='date' name='ngaysinh'/>	
                </div>
                <div class="input-container">
                    <input class="text" type='text' name='diachi' placeholder='Địa chỉ'/>	
                    <label></label>
                </div>
                <div class="input-container">
                    <input class="text" type='text' name='quequan' placeholder='Quê quán'/>	
                    <label></label>
                </div>
                <div class="input-container">
                    <input class="text" type='text' name='sodt' placeholder='Số điện thoại'/>	
                    <label></label>
                </div>
                <div class="input-container">
                    <label>Khoa</label>  
                    <select class='khoa' name='khoa'>
                        <option value=""hidden>Khoa</option>
                        @foreach($khoa as $k)
                        <option value="{{$k->id}}">
                            {{$k->tenkhoa}}
                        </option>
                        @endforeach
                    </select>	
                </div>
                <div class="input-container">
                    <label>Cấp</label>  
                    <select class='cap' name='cap'>
                        <option value=""hidden>Cấp</option>
                        @foreach($bangcap as $cap)
                        <option value="{{$cap->id}}">
                            {{$cap->tencap}}
                        </option>
                        @endforeach
                    </select>	
                </div>
                    <center><button type="submit" class="btn" name="themadmin">Đăng ký</button></center>
            </form>		
        </div>
<script src="http://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#dkgv').hide();
        $('#btnsv').on('click',function(){
            $('#dksv').show();
            $('#dkgv').hide();
        })
        $('#btngv').on('click',function(){
            $('#dksv').hide();
            $('#dkgv').show();
        })
    })
</script>
</body>
</html> 