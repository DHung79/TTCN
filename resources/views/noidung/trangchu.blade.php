@extends('master.master')

@section('noidung')
<section>
	<div class="row" style="margin: 0;">
		<div class="main">
			<div class="main-slide">
				<div class="box">
					<h3 class="type">Tin Chính:</h3>
					<div class="content">
						<div id="demo" class="carousel slide" data-ride="carousel">
							<!-- The slideshow -->
							<div class="carousel-inner">
								@foreach($slides as $key=>$slide)
								<div class="carousel-item @if($key == 0) active @endif">
									<div class="row slide-height">
										<div class="col-md-6">
											@if($slide->img != null)
											<a href="{{route('viewTin',['tieude'=>$slide->tenkhongdau.'-'.$slide->id])}}"><img src="{{asset($slide->img)}}">
											</a>
											@endif
										</div>
										<div class="col-md-6">
											<div class="title">
												<a href="{{route('viewTin',['tieude'=>$slide->tenkhongdau.'-'.$slide->id])}}"><h3>{{$slide->tieude}}</h3>
												</a>
												<h5>{{$slide->tomtat}}</h5>
												@if($slide->video != null)
													<iframe src="{{asset($slide->video)}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
												@endif
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" style="left: -4%;" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" style="right: 48%;" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
						<div class="list-new" style="padding-top: 25px; ">
							<ul>
								@foreach($slides as $slide)
								<li><img src="{{asset('img/icon_new.png')}}"><a href="{{route('viewTin',['tieude'=>$slide->tenkhongdau.'-'.$slide->id])}}">{{$slide->tieude}}</a></li>
								<hr>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="content1">			
				<div class="main-panel">
					@foreach($box as $key=>$value)
					<div class="new-content">
						<span class="hot-new">{{$key}}</span>
						@if($value->count()>0)
						<div class="first-new">
							<div class="row">
								<div class="col-md-6">
									<a href="{{route('viewTin',['tieude'=>$value[0]->tenkhongdau.'-'.$value[0]->id])}}">
										@if ($value[0]->img != null)
										<img src="{{asset($value[0]->img)}}">
										@endif
									</a>
									<div class="title">
										<a href="{{route('viewTin',['tieude'=>$value[0]->tenkhongdau.'-'.$value[0]->id])}}">
											<h3>{{$value[0]->tieude}}</h3>
										</a>
										<h5>{{$value[0]->tomtat}}</h5>
									</div>
								</div>
								<div class="col-md-6">
									<div class="list-new">
										<ul>
											@if($value[0]->video != null)
											<iframe src="{{asset($value[0]->video)}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											@endif
											{{-- @foreach($value as $news)
												@if($news->id != $value[0]->id)
												<li><img src="{{asset('img/icon_new.png')}}"><a href="{{route('viewTin',['tieude'=>$news->tenkhongdau.'-'.$news->id])}}">{{$news->tieude}}</a></li>
												<hr>
												@endif
											@endforeach --}}
										</ul>
									</div>
								</div>
							</div>
						</div>
						@endif
					</div>
					@endforeach
					
				</div>
			</div>
		</div>
		@include('master.right-panel')
</section>

@endsection

{{-- @section('script')
	@include('master.script')
@endsection --}}