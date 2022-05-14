<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" href="{{asset('css/utilities.css')}}">

		<link rel="stylesheet" href="{{asset('css/custom.css')}}">

		<link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}" type="text/css">
		<link rel="stylesheet" href="{{asset('css/slick.min.css')}}" type="text/css">
		<link rel="stylesheet" href="{{asset('css/vegas.min.css')}}" type="text/css">
		<link rel="stylesheet" href="{{asset('css/magnific-popup.min.css')}}" type="text/css">
		<link rel="stylesheet" href="{{asset('css/all.css')}}" type="text/css">
		<link rel="stylesheet" href="{{asset('css/all.min.css')}}" type="text/css">
		<link rel="stylesheet" href="{{asset('css/themify-icons.css')}}" type="text/css">

		<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,700%7COpen+Sans:400,700&display=swap" rel="stylesheet">

		<link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
</head>
<body>
    <div id="app sticky-top">
        <nav class="navbar navbar-expand-md navbar-light bg-light header-base style-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ 'Brain' }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="/useredit">My page - {{ Auth::user()->name }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Global mask -->
		<div class="global-mask hide-global-mask">
			<div class="overlay-inner bg-dark opacity-50"></div>
		</div>

        <main class="">
            @yield('content')
        </main>
    </div>
    
    	<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.easing.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="assets/js/jquery.smooth-scroll.min.js"></script>
		<script src="assets/js/isotope.pkgd.min.js"></script>
		<script src="assets/js/jquery.validate.min.js"></script>
		<script src="assets/js/jquery.form.min.js"></script>
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<script src="assets/js/jquery.countdown.min.js"></script>
		<script src="assets/js/imagesloaded.pkgd.min.js"></script>
		<script src="assets/js/granim.min.js"></script>
		<script src="assets/js/slick.min.js"></script>
		<script src="assets/js/vegas.min.js"></script>
		<script src="assets/js/main.js"></script>

    
</body>
</html>
