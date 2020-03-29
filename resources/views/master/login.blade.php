<div class="box box-margin" style="height: 250px;">
	<span class="error-center">@if(count($errors)>0)
		@foreach($errors->all() as $err)
			{{$err}}</br>
		@endforeach
	@endif
	@if(session('status'))
		{{session('status')}}
	@endif</span>
	<h4>Đăng Nhập</h4>
	<form action="{{Route('login')}}" method="post" class="form-login">
	@csrf
		<label for="email">Email</label>
		<input type="text" name="email">
		<label for="password">Mật Khẩu</label>
		<input type="password" name="password">
		<button type="submit" class="login-btn">Đăng Nhập</button>
	</form>
</div>