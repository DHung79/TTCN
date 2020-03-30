@extends('master.master')

@section('noidung')
<section>
	<div class="row" style="margin: 0;">
		<div class="main">
			<div class="content1">			
				<div class="main-panel">
					<div class="box">
						<h3 class="type">Tin Tức</h3>
						<div class="content">
							<div class="row">
								<div class="col-md-3">
									<div class="search">
										<form action="" method="get">
											<div class="form-group">
												<label for="search">Search:</label>
												<input type="search" name="search" class="form-control form-control-sm">
											</div>
										</form>
									</div>
								</div>
								<div class="col-md-3">
									<a href="{{route('showAddTin')}}">
										<button id="add" class="btn btn-primary btn-md" style="margin-top: 30px; width: auto; "><i class="fas fa-plus-circle"></i>&nbspThêm Tin Tức
										</button>
									</a>
								</div>
							</div>
							<div style="overflow: auto;">
								<table class="table" style="margin-top: 40px;">
									<thead class="thead-dark">
										<tr>
											<th>Tiêu Đề</th>
											<th>Hình Ảnh</th>
											<th>Slide</th>
											<th>Video</th>
											<th>Thông Báo</th>
											<th>Loại Tin</th>
											<th>Thao Tác</th>
										</tr>
									</thead>
									<tbody>
										@foreach($tintuc as $list)
										<tr>
											@if(strlen($list->tieude)>100)
											<td>{{substr($list->tieude,0,100).'...'}}</td>
											@else
											<td>{{$list->tieude}}</td>
											@endif
											<td><img src="{{asset($list->img)}}" style="width: 180px; height: auto;"></td>
											<td class="video"><iframe src="{{($list->video)}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</td>
											<td>
												@if($list->slide == 0)
												<input type="checkbox" name="" class="check-slide" value="{{$list->id}}">
												@else
												<input type="checkbox" name="" class="check-slide" value="{{$list->id}}" checked>
												@endif
											</td>
											<td>
												@if($list->thongbaochinh == 0)
												<input type="checkbox" name="" class="thongbao" value="{{$list->id}}">
												@else
												<input type="checkbox" name="" class="thongbao" value="{{$list->id}}" checked>
												@endif
											</td>
											<td>{{$list->tenloaitin}}</td>
											<td><a href="{{route('showEditTin',['id'=>$list->id])}}"  class="badge badge-success edit-btn">Edit</a>
												<a href="{{route('deltin',['id'=>$list->id])}}" class="badge badge-danger delete-btn">Delete</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('master.right-panel')
	</div>
</section>

@endsection

@section('script')
	@include('master.script')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.check-slide').click(function(){
				id = $(this).val();
				slide = 0;
				if($(this).prop('checked')){
					slide = 1;
				}
				else{
					slide = 0;
				}
				$.get("{{route('changeSlide')}}",{id:id,slide:slide}).fail(function(){
					alert('Không thể hoàn thành thao tác');
				});
			})
			$('.thongbao').click(function(){
				id = $(this).val();
				thongbaochinh = 0;
				if($(this).prop('checked')){
					thongbaochinh = 1;
				}
				else{
					thongbaochinh = 0;
				}
				$.get("{{route('changeThongBao')}}",{id:id,thongbaochinh:thongbaochinh}).fail(function(){
					alert('Không thể hoàn thành thao tác');
				});
			})
		})
	</script>
@endsection