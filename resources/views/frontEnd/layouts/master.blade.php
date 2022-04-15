<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sayur Sembalun</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="eZryb-M3UD68Tgz1uRPkpRBS1V3NwHwVnqsMp0Qz5wY" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontEnd/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/icomon.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/style.css')}}">
    <link rel="icon" href="https://drive.google.com/thumbnail?id=1w1uXmC0H-T7benFKX3W44HRAYyuOh-Pt">
    <script>

      let details = navigator.userAgent;

      let regexp = /android|iphone|kindle|ipad/i;
      let isMobileDevice = regexp.test(details);

      if (!isMobileDevice) {
          alert('Saat ini website SayurSembalun versi Desktop/Laptop sedang dalam perbaikan. untuk pengalaman lebih baik dalam mengakses website SayurSembalun silahkan mengakses dengan menggunakan Smartphone anda.')
      } 
    </script>

  </head>
  <body class="goto-here">
    @include('frontEnd.layouts.header')
    @yield('content')
    <!-- @include('frontEnd.layouts.footer') -->
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="{{asset('frontEnd/js/jquery.min.js')}}"></script>
  <script src="{{asset('frontEnd/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('frontEnd/js/popper.min.js')}}"></script>
  <script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontEnd/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('frontEnd/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('frontEnd/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('frontEnd/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontEnd/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('frontEnd/js/aos.js')}}"></script>
  <script src="{{asset('frontEnd/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('frontEnd/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('frontEnd/js/scrollax.min.js')}}"></script>
  <script src="{{asset('frontEnd/js/google-map.js')}}"></script>
  <script src="{{asset('frontEnd/js/main.js')}}"></script>
    
  </body>
</html>