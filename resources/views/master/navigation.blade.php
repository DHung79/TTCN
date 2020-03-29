<div class="navigation">
	<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
		<a class="navbar-brand" href="#"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="{{route('home')}}"><i class="fas fa-home"></i></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
						Giới Thiệu
					</a>
					<div class="dropdown-menu">
						@foreach($gtlist as $gt)
						<a class="dropdown-item" href="{{route('viewTin',['tentin'=>$gt->tenkhongdau.'-'.$gt->id])}}">{{$gt->tentin}}</a>
						@endforeach
					</div>
				</li>
				@foreach($menu as $list)
				<li class="nav-item">
					<a class="nav-link" href="{{route('listNews',['tentin'=>$list->tenkhongdau.'-'.$list->id])}}">{{$list->tenloaitin}}</a>
				</li>
				@endforeach
				@if(Auth::check())
					@if(Auth::user()->level==1)
					<li class="nav-item active">
						<a class="nav-link" href="{{ route('getaddadmin') }}">Thêm admin</a>
					</li>
					@endif
				@endif
			</ul>
		</div>  
	</nav>
</div>