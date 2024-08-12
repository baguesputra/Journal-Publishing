<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Asia Pasific journal of Multidisciplinary Research</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo2.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            background-image: url('{{ asset('img/bg.jpg')}}');
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color:#580000">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:white;">
                <img src="{{ asset('img/logo2.png') }}" width="40" height="40">
                    Asia Pasific journal of Multidisciplinary Research
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item" >
                                <a class="nav-link" href="{{ route('welcome.front')}}" style="color:white;">Home</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('editorialboard.front')}}" style="color:white;">Editorial Board</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="" style="color:white;" class="nav-link dropdown-toggle" href="#pablo" id="archive"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Guidelines</a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="archive">
                                    <a class="dropdown-item" href="{{ route('authorguidelines.front')}}">{{ __('Author Guidelines') }}</a>
                                    <a class="dropdown-item" href="{{ route('reviewprocess.front')}}">{{ __('Review Process') }}</a>
                                </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="" style="color:white;" class="nav-link dropdown-toggle" href="#pablo" id="archive"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Archives</a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="archive">
                                    <a class="dropdown-item" href="{{ route('archive.front')}}">{{ __('Archives') }}</a>
                                    <a class="dropdown-item" href="{{ route('currentissue.front')}}">{{ __('Current Issue') }}</a>
                                </div>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('conferences.front')}}" style="color:white;">Conferences</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact.front')}}" style="color:white;">Contact</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color:white;">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color:white;">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
