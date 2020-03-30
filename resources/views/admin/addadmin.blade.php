@extends('master.master')

@section('noidung')
<section>
	<div class="row" style="margin: 0;">
		<div class="main">
			<div class="content1">			
				<div class="main-panel">
					<div class="box">
						<h3 class="type">Quản lý người dùng</h3>
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
									<button id="add" class="btn btn-primary btn-md" style="margin-top: 30px; width: auto; "><i class="fas fa-plus-circle"></i>&nbsp Thêm Admin</button>
								</div>
							</div>
							<div class="form-add">
								<form action="{{route('addUser')}}" method="post">
									@csrf
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
                                                <input type="text" name="email" placeholder="Email" class="form-control form-control-sm" required><br>
                                                <input type="password" name="password" placeholder="Mật Khẩu" class="form-control form-control-sm" required><br>
                                                <select name='level' class="form-control form-control-sm" required>
                                                    <option value=""hidden>Level</option>
                                                    <option value="1">SuperAdmin</option>
                                                    <option value="2">Admin</option>
                                                    <option value="3">User</option>
                                                </select>
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
								<form action="{{route('editUser')}}" method="post">
									@csrf
									<input type="hidden" name="id" id="id">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
                                                <input type="text" id="edit-name" name="email" placeholder="Email" class="form-control form-control-sm" required><br>
                                                <select name='level' class="form-control form-control-sm" required>
                                                    <option value=""hidden>Level</option>
                                                    <option value="1">SuperAdmin</option>
                                                    <option value="2">Admin</option>
                                                    <option value="3">User</option>
                                                </select>
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
										<th>Email</th>
										<th>Level</th>
										<th>Thao Tác</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($user as $list)
                                    @if(Auth::user()->id != $list->id)
									<tr>
										<td>{{$list->email}}</td>
                                        <td>
                                            @if($list->level == 1)
                                                Super Admin
                                            @endif
                                            @if($list->level == 2)
                                                Admin
                                            @endif
                                            @if($list->level == 3)
                                                User
                                            @endif
                                        </td>
										<td><a href="javascript:" data-id="{{$list->id}}" data-name="{{$list->tenloaitin}}"  class="badge badge-success edit-btn">Edit</a>
											<a href="{{route('delUser',['id'=>$list->id])}}"  class="badge badge-danger delete-btn">Delete</a>
										</td>
                                    </tr>
                                    @endif
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