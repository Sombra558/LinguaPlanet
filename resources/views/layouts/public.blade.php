<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
 
    <!-- Fonts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .contenedor-padre{
            display:flex;
            justify-content: space-between;
        }
        .banderaselected{
            width: 58.03px;
            height: 36.39px;
            border-radius:50%;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="d-flex h-screen flex-column justify-content-between">        
        @include('layouts.navbar')

        <div id="app">
            <main class="py-4">
                @yield('content')            
            </main>
        </div>
        <footer class="d-flex flex-column align-items-center justify-content-center">
        <ul class="footer-list d-flex flex-row justify-content-around w-50 mb-0">
            <li>
                <a class="footer-link" href="https://lingua.alaxatech.com/">{{ __('Home') }}</a>
            </li>
            <li>
                <a class="footer-link" href="{{ route('courses.index') }}">{{ __('Courses') }}</a>
            </li>
            <li>
                <a class="footer-link" href="https://lingua.alaxatech.com/contactanos/">{{ __('About us') }}</a>
            </li>
            <li>
                <a class="footer-link" href="#">{{ __('Cookies policies') }}</a>
            </li>
            <li>
                <a class="footer-link" href="#">{{ __('Terms of use') }}</a>
            </li>
        </ul>
        <hr class="footer-divider mb-0">
        <span class="my-4">
            ©{{ Date('Y') }} Lingua Planet. {{ __('All rights reserved.') }}
        </span>
    </footer>
    </div>
    <script src="{{ asset('js/app.js') }}" ></script>
    @stack('scripts')
</body>
<script type="text/javascript">
  
    var url = "{{ route('changeLang') }}";
  
    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });
  
</script>

</html>
