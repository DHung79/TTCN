<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a href="{{ route('home') }}"><img class="logo" src="/bootstrap/img/LogoTruong.png" /></a>
        <a class="navbar-brand" href="{{ route('home') }}" title="Trang chủ">ĐHTTLL</a>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
            <button class="btn btn-secondary" type="button">Go!</button>
            </span>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                <a class="nav-link" href="dsdetai">Danh sách đề tài</a>
                </li>
                @if(Auth::check())
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('getduyetdt') }}" >Duyệt đề tài
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('getaddadmin') }}">Thêm admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Đăng xuất</a>
                </li>
                @else

                @endif
            </ul>
        </div>
    </div>
</nav>