<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('app-assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('app-assets/js/pace.min.js')}}"></script>

	<link rel="stylesheet" href="{{asset('app-assets/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('app-assets/css/icons.css')}}" />
	<link rel="stylesheet" href="{{asset('app-assets/css/app.css')}}" />


	<link href="app-assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<link href="{{asset('app-assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />

    <link href="{{asset('app-assets/plugins/simplebar/css/simplebar.cs')}}s" rel="stylesheet" />
	<link href="{{asset('app-assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />

	
	<link rel="stylesheet" href="{{asset('app-assets/css/dark-header.css')}}" />
	<link rel="stylesheet" href="{{asset('app-assets/css/dark-theme.css')}}" />
</head>
<body>
    <div >
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
            <div id="app">

                @if(Auth::user())
                    <mainapp></mainapp>
                @else
                    @yield('content')
                @endif
                
            </div> 
        </main>

        <script src="{{ mix('js/app.js') }}"></script>
<script src="{{asset('app-assets/js/jquery.min.js')}}"></script>
<script src="{{asset('app-assets/js/popper.min.js')}}"></script>
<script src="{{asset('app-assets/js/bootstrap.min.js')}}"></script>
<!-- Vector map JavaScript -->
<script src="{{asset('app-assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script>
	new PerfectScrollbar('.dashboard-social-list');
	new PerfectScrollbar('.dashboard-top-countries');
</script>


<script src="{{asset('app-assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>

<script src="{{asset('app-assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('app-assets/plugins/vectormap/jquery-jvectormap-in-mill.js')}}"></script>
<script src="{{asset('app-assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
<script src="{{asset('app-assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js')}}"></script>
<script src="{{asset('app-assets/plugins/vectormap/jquery-jvectormap-au-mill.js')}}"></script>
{{-- <script src="{{asset('app-assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script> --}}
{{-- <script src="{{asset('app-assets/js/index2.js')}}"></script> --}}
<!-- App JS -->

{{-- <script src="{{asset('app-assets/js/index1.js')}}"></script> --}}
<script src="{{asset('app-assets/js/app.js')}}"></script>





	<script src="{{asset('app-assets/js/bs-custom-file-input.min.js')}}"></script>
	<script>
		 $(document).ready(function () {
			bsCustomFileInput.init()
		});
	</script>

	<script src="{{asset('app-assets/js/app.js')}}"></script>


    </div>
</body>
</html>
