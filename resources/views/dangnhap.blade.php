<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 , height=device-height">
        <title></title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/login.css">
    </head>
    <body>
        <div class="box">
            <form method="POST" action="{{Route('login')}}">
                @csrf
                <span class="text-center">Đăng nhập</span>
                <div class="input-container">
                    <input class="text" type="text" name='email' placeholder='Email'
					value="@if(session('email')){{session('email')}}@endif"/>
                    <label></label>
				</div>
                <div class="input-container">
                    <input class="text" type='password' name='password' placeholder='Mật khẩu' 
					value="@if(session('password')){{session('password')}}@endif"/>	
                    <label></label>
				</div>
				<span class="error-center">@if(count($errors)>0)
					@foreach($errors->all() as $err)
						{{$err}}</br>
					@endforeach
				@endif
				@if(session('status'))
					{{session('status')}}
				@endif</span>
                    <center><button type="submit" class="btn" name="dangnhap">Đăng Nhập</button></center>
                    <center><span class="ask">Chưa có tài khoản? 
                        <a class="" href="{{ route('getregister') }}">Đăng ký</a>
                    </span></center>
            </form>	
        </div>
	
	
</body>
</html>