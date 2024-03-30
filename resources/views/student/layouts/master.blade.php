<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>General Dashboard &mdash; Suraj Yadav</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('backened/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backened/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('backened/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backened/assets/modules/weather-icon/css/weather-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backened/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backened/assets/modules/summernote/summernote-bs4.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('backened/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('backened/assets/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      {{-- Navbar content  --}}
      @include('student.layouts.navbar')
      {{-- Navbar content end --}}

      {{-- Sidebar Content  --}}
      @include('student.layouts.sidebar')
      {{-- Sidebar Content end --}}


      <!-- Main Content -->
      <div class="main-content">
       @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2024 <div class="bullet"></div> Design with ❤️ by <a href="https://www.linkedin.com/in/suraj-yadav-00b715273/">Suraj Yadav</a>
        </div>
        {{-- <div class="footer-right">
        </div> --}}
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('backened/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('backened/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('backened/assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('backened/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('backened/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('backened/assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('backened/assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('backened/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
  <script src="{{ asset('backened/assets/modules/chart.min.js') }}"></script>
  <script src="{{ asset('backened/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('backened/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('backened/assets/modules/summernote/summernote-bs4.js') }}"></script>
  <script src="{{ asset('backened/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('backened/assets/js/page/index-0.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('backened/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('backened/assets/js/custom.js') }}"></script>
</body>
</html>




