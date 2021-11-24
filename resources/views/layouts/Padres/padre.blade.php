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
        .backdrop.show {
            position : fixed;
            top : 0;
            left : 0;
            width : 100vw;
            height : 100vh;
            z-index : 1040;
            backdrop-filter : blur(3px);
            transition : backdrop-filter 0.9s;
        }

        @unless(!request()->routeIs('padre.perfil'))
            #padre-app {
                background-image: url('/images/upper-background.svg');
                background-repeat : no-repeat;
            }
        @endunless
        
        body {
            font-family: "Nunito", sans-serif !important;
        }
    </style>
</head>
<body>    
    <div class="d-flex h-screen flex-column @unless(explode('.', request()->route()->action['as'])[0] === 'perfil-user') justify-content-between @endunless">

        @include('layouts.Padres.navbar')
        
        <div id="padre-app">
            <main class="d-flex flex-column mb-5">
                @yield('content')
            </main>
            <block-sidepanel :user="{{$user}}" />
        </div>
        @unless(explode('.', request()->route()->action['as'])[0] === 'perfil-user')
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
                    ©{{ Date('Y') }} Lingua Planet. {{ __('All rights reserved.') }}
                </h6>
            </footer>
        @endunless
    </div>
    <div class="backdrop"></div>
</body>
</html>
