<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.admin.header')
</head>

<body>
    <h1 class="site-heading text-center text-white d-none d-lg-block">
        <span class="site-heading-upper text-primary mb-3">A Free Bootstrap 4 Business Theme</span>
        <span class="site-heading-lower">Business Casual</span>
    </h1>
    <!-- Navigation -->
    @include('layout.admin.menu')

    @yield('content')

    @include('layout.admin.footer')
<!-- Bootstrap core JavaScript -->
<script src="bootstrap/startbootstrap-blog-post-gh-pages/vendor/jquery/jquery.min.js"></script>
<script src="bootstrap/startbootstrap-blog-post-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@yield('script')
</body>
</html>
