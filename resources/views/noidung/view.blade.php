@extends('master.master')

@section('noidung')
	<section>
			<div class="row" style="margin: 0;">
				<div class="main" style="padding-top: 0px;">
					<div class="content1" style="margin-top: 20px;">			
						<div class="main-panel">
							<div class="news">
								<div class="news-title">
									<h3><span style="text-align: justify;font-size: 20px;">{{$tintuc->tieude}}</span></h3>
								</div>
								<div class="time-up">
									<span>{{date('l d-m-yy h:i A',strtotime($tintuc->created_at)+7*60*60)}}</span>
								</div>
								<div class="index">
									{!!$tintuc->noidung!!}
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="right-panel">
					@include('master.login')
					@include('master.thongbaochinh')
					@include('master.video')
				</div>
			</div>
		</section>
@endsection

@section('script')
	@include('master.script')
@endsection

@section('style')
<style type="text/css">
	.content1 img{
		max-width: 100%;
		height: auto;
	}
</style>
@endsection