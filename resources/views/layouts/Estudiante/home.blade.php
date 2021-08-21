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
    <script src="{{ asset('dist/js/hijo-app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="position: relative;">
    <style type="text/css">

        .left-panel.show {
            left : 0;
        }

        .panel-content {
            height : 80%;
            display : flex;
            align-items : center;
            justify-content : center;
            color : white;
        }

        .input-validation-father {
            width: 20%;
            margin: 0 0.5rem 0 0.5rem;
            padding: 0.6rem 0.55rem;
            background: #FFFFFF;
            border: 1px solid #31348B;
            box-sizing: border-box;
            border-radius: 12px;
        }

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
    </style>
    <div class="d-flex h-screen flex-column justify-content-between">
        
        @include('layouts/Estudiante/header')
        
        <div id="hijo-app" class="h-100">
            <main class="d-flex flex-column h-100">
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
    </div>
    <script type="text/javascript">
        $('.toggle-father-details').on('click', (e) => {
            $('.backdrop').toggleClass('show');
            $('.left-panel').toggleClass('show');
        });
    </script>
    <div class="backdrop"></div>
</body>
</html>
