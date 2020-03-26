<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1 , height=device-height">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/admin.css">
    </head>
    <body>
        <div class="box">
            <form method="POST" action="{{route('addadmin')}}">
                @csrf
                <span class="text-center">Thêm admin</span>
                <span class="error-center">@if(count($errors)>0)
                    @foreach($errors->all() as $err)
                        {{$err}}</br>
                    @endforeach
                @endif
                @if(session('status'))
                    {{session('status')}}
                @endif</span>
                <div class="input-container">
                    <input class="text" type='text' name='email' placeholder='Email'/>	
                    <label></label>  
                </div>
                <div class="input-container">
                    <input class="text" type='password' name='password' placeholder='Mật khẩu'/>	
                    <label></label>
                </div>
                <div class="input-container">
                    <select class="level" name='level'>
                        <option value=""hidden>Level</option>
                        <option value="2">Admin</option>
                        <option value="1">SuperAdmin</option>
                    </select>	
                </div>
                    <center><button type="submit" class="btn" name="themadmin">Thêm admin</button></center>
            </form>	
        </div>
</body>
</html>