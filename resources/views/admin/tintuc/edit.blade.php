@extends('master.master')

@section('noidung')
<section>
	<div class="row" style="margin: 0;">
		<div class="main">
			<div class="content1">			
				<div class="main-panel">
					<div class="box">
						<h3 class="type">Thêm Tin Tức</h3>
						<div class="content">
							<form action="{{route('editTin')}}" method="post" enctype="multipart/form-data">
								@csrf
								<input type="hidden" name="id" value="{{$tintuc->id}}">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="tieude">Tiêu Đề:</label>
											<textarea name="tieude" style="width: 100%; height: 100px;">{{$tintuc->tieude}}
											</textarea>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="upload">Hình Ảnh:</label>
											<input type="file" name="upload" class="form-control form-control-sm">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="loaitin">Loại Tin:</label>
											<select name="loaitin" class="form-control form-control-sm">
												@foreach($loaitin as $list)
													@if($list->id == $tintuc->idLoaiTin)
													<option value="{{$list->id}}" selected>{{$list->tenloaitin}}</option>
													@else
													<option value="{{$list->id}}">{{$list->tenloaitin}}</option>
													@endif
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="tomtat">Tóm Tắt:</label>
											<textarea name="tomtat" style="height: 200px; width: 100%">{{$tintuc->tomtat}}
											</textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="noidung">Nội Dung:</label>
											<textarea name="noidung" style="width: 100%;">
												{{$tintuc->noidung}}
											</textarea>
										</div>
									</div>
									<div class="col-md-2">
										<button type="submit" class="btn btn-success">Sửa</button>
									</div>
									<div class="col-md-2">
										<button type="button" class="btn btn-danger">Hủy</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="right-panel">
			@include('master.login')
			@include('master.danhmuc')
			@include('master.video')
		</div>
	</div>
</section>

@endsection

@section('script')
<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>    CKEDITOR.replace( 'noidung' );</script>
<script type="text/javascript" src="{{asset('js/jquery-1.12.0.min.js')}}"></script>
@include('master.script')
@endsection