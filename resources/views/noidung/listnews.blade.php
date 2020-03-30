@extends('master.master')

@section('noidung')
		<section>
			<div class="row" style="margin: 0;">
				<div class="main">
					<div class="content1">			
						<div class="main-panel">
							<h3 style="font-size: 14px;padding-bottom: 20px;">{{$loaitin->tenloaitin}}:</h3>
							@foreach($tintuc as $news)
							<div class="news">
								<div class="row">
									<div class="col-md-4">
										<a href="{{route('viewTin',['tieude'=>$news->tenkhongdau.'-'.$news->id])}}">
											<img src="{{asset($news->img)}}">
										</a>
									</div>
									<div class="col-md-8">
										<div class="title">
											<a href="{{route('viewTin',['tieude'=>$news->tenkhongdau.'-'.$news->id])}}">
												<h3>{{$news->tieude}}</h3>
											</a>
											<span class="review">{{$news->tomtat}}</span>
										</div>
										@if($news->video!=null)
										<iframe src="{{asset($news->video)}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										@endif
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
				@include('master.right-panel')
			</div>
		</section>
@endsection

{{-- @section('script')
	@include('master.script')
@endsection --}}

@section('style')
<style type="text/css">
	.content1 img{
		height: auto;
	}
</style>
@endsection