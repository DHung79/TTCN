<!DOCTYPE html>
<html lang="en">

<head>
  @include('layout.user.header')

</head>

<body>
  <!-- Navigation -->
  @include('layout.user.menu')
    <!-- Page Content -->
  @yield('content')
    <!-- /.container -->
    <!-- Footer -->
  @include('layout.user.footer')
  <!-- Bootstrap core JavaScript -->
  <script src="bootstrap/startbootstrap-blog-post-gh-pages/vendor/jquery/jquery.min.js"></script>
  <script src="bootstrap/startbootstrap-blog-post-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  @yield('script')
</body>
</html>
