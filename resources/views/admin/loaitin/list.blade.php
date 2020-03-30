@extends('master.master')

@section('noidung')
<section>
	<div class="row" style="margin: 0;">
		<div class="main">
			<div class="content1">			
				<div class="main-panel">
					<div class="box">
						<h3 class="type">Thể Loại</h3>
						<div class="content">
							<div class="row">
								<div class="col-md-3">
									<div class="search">
										<form action="" method="get">
											<div class="form-group">
												<label for="search">Search</label>
												<input type="search" name="search" class="form-control form-control-sm">
											</div>
										</form>
									</div>
								</div>
								<div class="col-md-3">
									<button id="add" class="btn btn-primary btn-md" style="margin-top: 30px; width: auto; "><i class="fas fa-plus-circle"></i>&nbspThêm Thể Loại</button>
								</div>
							</div>
							<div class="form-add">
								<form action="{{route('addLoaiTin')}}" method="post">
									@csrf
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="tentheloai">Tên Loại Tin:</label>
												<input type="text" name="tenloaitin" class="form-control form-control-sm">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2 col-6">
											<button type="submit" class="btn btn-primary btn-md btn-add" name="">Thêm</button>
										</div>
										<div class="col-md-2 col-6">
											<button type="button" id="cancel" class="btn btn-primary btn-md btn-add" style="background: #dc3545; border-color: #dc3545;">Hủy</button>
										</div>
									</div>
								</form>
							</div>
							<div class="form-edit">
								<form action="{{route('editLoaiTin')}}" method="post">
									@csrf
									<input type="hidden" name="id" id="id">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="tentheloai">Tên Loại Tin:</label>
												<input type="text" id="edit-name" name="tenloaitin" class="form-control form-control-sm">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2 col-6">
											<button type="submit" class="btn btn-primary btn-md btn-add" name="">Sửa</button>
										</div>
										<div class="col-md-2 col-6">
											<button type="button" id="cancel-edit" class="btn btn-primary btn-md btn-add" style="background: #dc3545; border-color: #dc3545;">Hủy</button>
										</div>
									</div>
								</form>
							</div>
							<table class="table" style="margin-top: 40px;">
								<thead class="thead-dark">
									<tr>
										<th>Tên Loại Tin</th>
										<th>Tên Không Dấu</th>
										<th>Menu</th>
										<th>Giới Thiệu</th>
										<th>Thao Tác</th>
									</tr>
								</thead>
								<tbody>
									@foreach($loaitin as $list)
									<tr>
										<td>{{$list->tenloaitin}}</td>
										<td>{{$list->tenkhongdau}}</td>
										<td>
											@if($list->menu == 0)
											<input type="checkbox" name="" class="menu" value="{{$list->id}}">
											@else
											<input type="checkbox" name="" class="menu" value="{{$list->id}}" checked>
											@endif
										</td>
										<td>
											@if($list->gioithieu == 0)
											<input type="checkbox" name="" class="gioithieu" value="{{$list->id}}">
											@else
											<input type="checkbox" name="" class="gioithieu" value="{{$list->id}}" checked>
											@endif
										</td>
										<td><a href="javascript:" data-id="{{$list->id}}" data-name="{{$list->tenloaitin}}"  class="badge badge-success edit-btn">Edit</a>
											<a href="{{route('deltl',['id'=>$list->id])}}"  class="badge badge-danger delete-btn">Delete</a>
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
		@include('master.right-panel')
	</div>
</section>

@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('.menu').click(function(){
			id = $(this).val();
			menu = 0;
			if($(this).prop('checked')){
				menu = 1;
			}
			else{
				menu = 0;
			}
			$.get("{{route('changeMenu')}}",{id:id,menu:menu}).fail(function(){
				alert('Không thể hoàn thành thao tác');
			});
		})
		$('.gioithieu').click(function(){
			id = $(this).val();
			gioithieu = 0;
			if($(this).prop('checked')){
				gioithieu = 1;
			}
			else{
				gioithieu = 0;
			}
			$.get("{{route('changeGioiThieu')}}",{id:id,gioithieu:gioithieu}).fail(function(){
				alert('Không thể hoàn thành thao tác');
			});
		})
	})
</script>
<script type="text/javascript" src="{{asset('js/changeLoaiTin.js')}}"></script>
@include('master.script')
@endsection