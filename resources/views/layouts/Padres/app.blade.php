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
    <script src="{{ asset('dist/js/padre-app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <style type="text/css">
        #padre-app {
            backdrop-filter: blur(10px);
        }

        body {
            font-family: "Nunito", sans-serif !important;
        }
    </style>
</head>
<body>
    <div class="d-flex h-screen flex-column justify-content-between">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container d-flex">
                <button class="w-10 toggle-father-details img-btn">
                    <img class="iz-60"  src="{{ asset('/images/bgray-lock.svg') }}">
                </button>
                <a class="navbar-brand m-0" href="{{ url('/') }}">
                    <img style="width: 90px; height: 90px;" src="{{ asset('/images/logo.svg') }}" class="logo" alt="{{ config('app.name', 'Laravel') }}">
                </a>
                <button class="w-10 btn-logout" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                    <img src="{{ asset('storage/images/logout.svg') }}">
                </button>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
        <div id="padre-app" class="h-100">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <div class="left-panel container bg-primary">
            <div class="row py-3">
                <div class="col-12 text-right">
                    <label class="mb-0" for="check">
                        <button class="toggle-father-details img-btn">
                            <img class="iz-100"  src="{{ asset('/images/exit-icon.svg') }}">
                        </button>                    
                    </label>                
                </div>
            </div>                    
            <div class="row panel-content">
                <div class="col-12 text-center">
                    <img class="iz-40 mb-4" src="{{ asset('/images/bwhite-lock.svg') }}">
                    <h2 class="bold">Solo para adultos</h2>
                    <span>Para continuar por favor ingresa</span>
                    <div class="my-5">
                        <h2 class="color-yellow mb-4">Siete, Cuatro, Cinco</h2>
                        <input class="input-validation-father" type="text" name="number">
                        <input class="input-validation-father" type="text" name="number">
                        <input class="input-validation-father" type="text" name="number">
                    </div>
                    <button class="btn btn-primary-red"><span class="h4 px-2">Acceder</span></button>
                </div>
            </div>
        </div>
        <footer class="d-flex flex-column align-items-center justify-content-center">
            <ul class="footer-list d-flex flex-row justify-content-around w-50 mb-0">
                <li>
                    <a class="footer-link" href="#">{{ __('Home') }}</a>
                </li>
                <li>
                    <a class="footer-link" href="#">{{ __('Courses') }}</a>
                </li>
                <li>
                    <a class="footer-link" href="#">{{ __('About') }}</a>
                </li>
                <li>
                    <a class="footer-link" href="#">{{ __('Cookies policies') }}</a>
                </li>
                <li>
                    <a class="footer-link" href="#">{{ __('Terms of use') }}</a>
                </li>
            </ul>
            <hr class="footer-divider mb-0">
            <h6 class="my-4">
                ??{{ Date('Y') }} Lingua Planet. {{ __('All rights reserved.') }}
            </h6>
        </footer>
    </div>
    <script type="text/javascript">
        $('.toggle-father-details').on('click', (e) => {
            $('.left-panel').toggleClass('show');
        });
    </script>
</body>
</html>
