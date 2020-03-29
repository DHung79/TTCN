<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Khoa Công Nghệ Thông Tin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    @yield('style')
</head>
<body>
	<div class="container">
		<header class="header">
			<div class="logo">
				<img src="https://www.khanhhoa.gov.vn/Resources/ImagesPortal/HomePage/imgs/Logo.png">
			</div>
			<div id="nav">
				
			</div>
		</header>
		@yield('noidung')
		@include('master.footer')
	</div>
</body>
</html>