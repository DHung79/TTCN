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
                <a class="nav-link">
                    @foreach ($giangvien as $gv)
                    {{$gv->ho}}
                    {{$gv->ten}}   
                    @endforeach
                </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('loaitin') }}">Danh sách loại tin</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('tintuc') }}">Danh sách tin tức</a>
                </li>
            @endif
            @if(Auth::user()->level==1)
                <h4>Admin</h4>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('loaitin') }}">Danh sách loại tin</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('tintuc') }}">Danh sách tin tức</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('admin') }}">Quản lý người dùng</a>
                </li>
            @endif
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('logout') }}">Đăng xuất</a>
            </li>
            </div>
        </form>
    @else
        @include('master.login')
    @endif
    @include('master.thongbaochinh')	
</div>
</div>