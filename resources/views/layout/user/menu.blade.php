<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a href="{{ route('home') }}"><img class="logo" src="/bootstrap/img/LogoTruong.png" /></a>
        <a class="navbar-brand" href="{{ route('home') }}" title="Trang chủ">ĐHTTLL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
            <a class="nav-link" href="
            {{-- {{route('dsdetai')}} --}}
            ">Giới thiệu</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="">Tin tức - Sự kiện</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="">Bộ môn</a>
                <ul class="navbar-item">    
                    <li class="nav-item active">
                        <a class="nav-link" href="">Phần mềm</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="">Mạng</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="">Học liệu điện tử</a>
            </li>
            @if(Auth::check())
            @if(Auth::user()->level==1)
              <li class="nav-item active">
                <a class="nav-link" href="
                {{ route('getduyetdt') }}
                " >Duyệt đề tài
                </a>
              </li>
              <li class="nav-item active">
                  <a class="nav-link" href="{{ route('getaddadmin') }}">Thêm admin</a>
              </li>
            @endif
            <li class="nav-item ">
              <a class="nav-link" href="{{ route('logout') }}">Đăng xuất</a>
            </li>
          @else 
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('getlogin') }}" >Đăng nhập
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('getregister') }}">Đăng ký</a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
  