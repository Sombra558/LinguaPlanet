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
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: "Nunito", sans-serif !important;
        }
    </style>
</head>
<body class="bg-primary @if(request()->routeIs('student.premios') || request()->routeIs('student.armario')) background-component @endif">
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
        
        <div id="hijo-app" class="h-100 d-flex justify-content-center align-items-center">
            <main class="flex-grow-1">
                @yield('content')
            </main>
            <block-sidepanel :user="{{$user}}"/>
        </div>
    </div>
    <div class="backdrop"></div>
</body>
</html>
