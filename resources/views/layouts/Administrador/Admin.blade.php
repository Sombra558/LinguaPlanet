<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('dist/js/admin-app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="admin-app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <span class="w-50">
                    <a class="navbar-brand ml-3 mr-0 mr-md-5" href="{{ url('/home') }}">
                        <img style="width: 90px; height: 90px;" src="{{ asset('/images/logo.svg') }}" class="logo" alt="{{ config('app.name', 'Laravel') }}">
                    </a>
                    <button class="transparent-button ml-0 ml-lg-5" id="sidebarToggle" type="button">
                        <svg width="37" height="23" viewBox="0 0 37 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="37" height="5" rx="2.5" fill="#31348B"/>
                            <rect y="9" width="37" height="5" rx="2.5" fill="#31348B"/>
                            <rect y="18" width="37" height="5" rx="2.5" fill="#31348B"/>
                        </svg>
                    </button>
                </span>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <div class="globe-profile bg-plomo">
                        {{ Auth::user()->name[0].Auth::user()->lastname[0] }}
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item d-flex align-items-center justify-content-end">
                                <span class="mx-2">
                                    {{ Auth::user()->name.' '.Auth::user()->lastname }}
                                </span>
                                <a class="nav-link mx-2 d-none d-md-block">
                                    <div class="globe-profile bg-plomo">
                                        {{ Auth::user()->name[0].Auth::user()->lastname[0] }}
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item d-sm-none text-right">
                                <a class="nav-link mx-2" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="d-flex" id="wrapper">
            @include('layouts.Administrador.Sidebar')
            <div id="page-content-wrapper">
                <div class="container-fluid pt-4">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarToggle').on('click', (e) => {
                document.body.classList.toggle('sb-sidenav-toggled');
            });            
        });           
    </script>
</body>
</html>
