<div class="right-panel">
    @if(Auth::check())
    <div class="box box-margin">
        <form method="post" class="form-logon">
            @if(Auth::user()->level==3)
                <h4>Sinh viêm</h4>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('infor')}}" title="Trang cá nhân">
                    @foreach ($sinhvien as $sv)
                    {{$sv->ho}}
                    {{$sv->ten}}   
                    @endforeach
                </a>
                </li>
            @endif
            @if(Auth::user()->level==2)
                <h4>Giảng viên</h4>
                <li class="nav-item ">
                <a class="nav-link" href="{{ route('infor')}}" title="Trang cá nhân">
                    @foreach ($giangvien as $gv)
                    {{$gv->ho}}
                    {{$gv->ten}}   
                    @endforeach
                </a>
                </li>
            @endif
            @if(Auth::user()->level==1)
                <h4>Admin</h4>
            @endif
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('logout') }}">Đăng xuất</a>
            </li>
            </div>
        </form>
    @else
        @include('master.login')	
    @endif
    @if(Auth::user()->level==1)
        @include('master.danhmuc')
    @endif
    @if(Auth::user()->level==3||Auth::user()->level==2)
        @include('master.thongbaochinh')
    @endif
</div>
</div>