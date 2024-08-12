<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logo2.png')}}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo2.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- Extra details for Live View on GitHub Pages -->
    
    <title>
        {{ __('Dashboard') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('source/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('source/css/paper-dashboard.min.css')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
 

</head>

<body class="{{ $class }}">
    
    @auth()
        @include('layouts_author.page_templates.auth')
        
    @endauth
    
    @guest
        @include('layouts_author.page_templates.guest')
    @endguest

    <!--   Core JS Files   -->
    <script src="{{ asset('source/js/core/jquery.min.js')}}"></script>
    <script src="{{ asset('source/js/core/popper.min.js')}}"></script>
    <script src="{{ asset('source/js/core/bootstrap.min.js')}}"></script>
    <script src="{{ asset('source/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{ asset('source/js/plugins/chartjs.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('source/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('source/js/paper-dashboard.min.js?v=2.0.0')}}" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('source/demo/demo.js')}}"></script>
    <!-- Sharrre libray -->
    <script src="{{ asset('source/demo/jquery.sharrre.js')}}"></script>
    
    @stack('scripts')

    @include('layouts_author.navbars.fixed-plugin-js')
</body>

</html>
